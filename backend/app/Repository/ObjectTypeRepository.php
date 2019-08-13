<?php

namespace App\Repository;

use App\Models\ObjectModel;
use App\Models\ObjectType;
use App\Traits\RepositoryTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ObjectTypeRepository
{
    use RepositoryTrait;

    /**
     * @param ObjectType $entity
     */
    public function __construct(ObjectType $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @param $name
     * @return ObjectType
     */
    public function findByName($name)
    {
        return $this->entity->whereName($name)->first();
    }

    /**
     * @param ObjectType $objectType
     * @return array
     */
    public function lists(ObjectType $objectType): array
    {
        $list = [];
        foreach ($objectType->objectsActual as $object) {
            $list[] = $object->list();
        }
        return $list;
    }

    /**
     * @param ObjectType $objectType
     * @return array
     */
    public function archive(ObjectType $objectType): array
    {
        $list = [];
        foreach ($objectType->objectsArchive as $object) {
            $list[] = $object->list();
        }
        return $list;
    }

    /**
     * @param ObjectType $objectType
     * @param $uuid
     * @return ObjectModel
     */
    public function findObjectByUuid(ObjectType $objectType, $uuid)
    {
        return $objectType->objects->where('uuid', $uuid)->first();
    }

}
