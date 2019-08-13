<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Models\ObjectAttributeValue;
use App\Models\ObjectType;
use App\Repository\ObjectTypeRepository;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    /**
     * @var ObjectTypeRepository
     */
    protected $objectTypes;

    public function __construct(ObjectTypeRepository $objectTypes)
    {
        $this->objectTypes = $objectTypes;
    }

    /**
     * @param $type
     * @return ObjectType
     * @throws ApiException
     */
    protected function findObjectType($type)
    {
        $objectType = $this->objectTypes->findByName($type);

        if (!$objectType)
            throw new ApiException("Not found meta type:$type");

        return $objectType;
    }

    /**
     * @param string $type
     * @return JsonResponse
     */
    public function meta($type)
    {
        try {
            $objectType = $this->findObjectType($type);

            return response()->json($objectType->getMeta());
        } catch (ApiException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @param string $type
     * @return JsonResponse
     */
    public function list($type)
    {
        try {
            $objectType = $this->findObjectType($type);
            $list = $this->objectTypes->lists($objectType);

            return response()->json($list);
        } catch (ApiException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @param string $type
     * @return JsonResponse
     */
    public function archive($type)
    {
        try {
            $objectType = $this->findObjectType($type);
            $list = $this->objectTypes->archive($objectType);

            return response()->json($list);
        } catch (ApiException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @param string $type
     * @param string $uuid
     * @return JsonResponse
     * @throws Exception
     */
    public function updateObject($type, $uuid)
    {
        try {
            $objectType = $this->findObjectType($type);
            $object = $this->objectTypes->findObjectByUuid($objectType, $uuid);

            if (!$object)
                throw new ApiException("Not found object uuid:$uuid");

            $rules = $objectType->getRulesValidationObject();
            $validator = \Validator::make(request()->post(), $rules);

            if ($validator->fails()) {
                $json = ['errors' => $validator->errors()];
            } else {
                try {
                    DB::beginTransaction();

                    foreach ($rules as $field => $rule) {
                        if (!request()->has($field)) continue;

                        /** @var ObjectAttributeValue $attrValue */
                        $attrValue = $object->values->where('field.name', $field)->first();
                        if ($attrValue) {
                            $value = request($field);
                            if ($attrValue->field->isDate()) {
                                $value = Carbon::parse($value)->timestamp;
                            }
                            $attrValue->value = $value;
                            $attrValue->save();
                        }
                    }

                    DB::commit();

                    $json = $object->list();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw new ApiException("Error server for update object");
                }
            }

            return response()->json($json);
        } catch (ApiException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @param string $type
     * @param string $uuid
     * @return JsonResponse
     */
    public function setArchive($type, $uuid)
    {
        try {
            $objectType = $this->findObjectType($type);
            $object = $this->objectTypes->findObjectByUuid($objectType, $uuid);

            if (!$object)
                throw new ApiException("Not found object uuid:$uuid");

            $object->setArchive();

            return response()->json(['message' => 'ok']);
        } catch (ApiException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @param string $type
     * @param string $uuid
     * @return JsonResponse
     */
    public function removeArchive($type, $uuid)
    {
        try {
            $objectType = $this->findObjectType($type);
            $object = $this->objectTypes->findObjectByUuid($objectType, $uuid);

            if (!$object)
                throw new ApiException("Not found object uuid:$uuid");

            $object->removeArchive();

            return response()->json(['message' => 'ok']);
        } catch (ApiException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

}
