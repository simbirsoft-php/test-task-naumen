<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin ObjectAttributeValue
 */
class ObjectAttributeValue extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * @return BelongsTo
     */
    public function field()
    {
        return $this->belongsTo(ObjectField::class, 'object_id');
    }

    /**
     * @return string|boolean|integer
     */
    public function getValue()
    {
        switch ($this->attribute->type) {
            case 'integer':
                $value = intval($this->value);
                break;
            case 'boolean':
                $value = strtolower($this->value) === 'true' ? true : false;
                break;
            case 'string':
            default :
                $value = $this->value;
        }

        return $value;
    }

}
