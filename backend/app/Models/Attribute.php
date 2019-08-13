<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attribute extends Model
{
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function objectType()
    {
        return $this->belongsTo(ObjectType::class);
    }

}
