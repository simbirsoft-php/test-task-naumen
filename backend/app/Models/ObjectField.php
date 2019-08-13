<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ObjectField extends Model
{
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function objectType()
    {
        return $this->belongsTo(ObjectType::class);
    }

    /**
     * @return HasMany
     */
    public function attributeValues()
    {
        return $this->hasMany(ObjectAttributeValue::class, 'field_id');
    }

    /**
     * @return bool
     */
    public function allowedEditable()
    {
        return $this->attributeValues()
            ->join('attributes', 'attributes.id', '=', 'attribute_id')
            ->where('attributes.name', 'editable')
            ->where('value', 'true')
            ->count() > 0;
    }

    /**
     * @return bool
     */
    public function isDate()
    {
        return $this->attributeValues()
            ->join('attributes', 'attributes.id', '=', 'attribute_id')
            ->where('attributes.name', 'type')
            ->where('value', 'date')
            ->count() > 0;
    }

}
