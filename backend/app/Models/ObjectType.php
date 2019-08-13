<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin ObjectType
 */
class ObjectType extends Model
{
    protected $guarded = [];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return HasMany
     */
    public function fields()
    {
        return $this->hasMany(ObjectField::class);
    }

    /**
     * @return HasMany
     */
    public function objects()
    {
        return $this->hasMany(ObjectModel::class);
    }

    /**
     * @return HasMany
     */
    public function objectsActual()
    {
        return $this->hasMany(ObjectModel::class)->where('is_archive', false);
    }

    /**
     * @return HasMany
     */
    public function objectsArchive()
    {
        return $this->hasMany(ObjectModel::class)->where('is_archive', true);
    }

    /**
     * @return HasMany
     */
    public function attrs()
    {
        return $this->hasMany(Attribute::class);
    }

    /**
     * @return array
     */
    public function getAttributeMeta()
    {
        $ret = [];
        foreach ($this->attrs as $one) {
            $ret[$one->name] = null;
        }
        return $ret;
    }

    /**
     * Возвращающий список атрибутов ObjectType
     * @return array
     */
    public function getMeta()
    {
        $attributesMeta = $this->getAttributeMeta();

        $metas = [];
        foreach ($this->fields as $field) {
            $meta = $attributesMeta;

            if ($meta) {
                foreach ($field->attributeValues as $one) {
                    $name = $one->attribute->name;

                    if (array_has($meta, $name)) {
                        $meta[$name] = $one->getValue();
                    }
                }
            }

            $meta['code'] = $field->name;

            $metas[] = $meta;
        }

        return $metas;
    }

    /**
     * @return array
     */
    public function getRulesValidationObject()
    {
        $rules = [];
        $fields = $this->fields()
            ->with(['attributeValues' => function($query) {
                $query
                    ->join('attributes', 'attributes.id','=','attribute_id')
                    ->where('attributes.name', 'type');
            }])
            ->get();

        foreach ($fields as $field) {
            if ($field->allowedEditable()) {

                if ($field->attributeValues) {
                    /** @var ObjectAttributeValue $attributeValue */
                    $attributeValue = $field->attributeValues[0];
                    $rule = 'nullable';

                    switch ($attributeValue->value) {
                        case 'string':
                            $rule .= '|string|max:500';
                            break;
                        case 'image':
                        case 'text':
                            $rule .= '|string';
                            break;
                        case 'date':
                            $rule .= '|date';
                            break;
                    }

                    if ($rule) {
                        $rules[$field->name] = $rule;
                    }
                }
            }
        }

        return $rules;
    }
}
