<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ObjectValue extends Model
{
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function field()
    {
        return $this->belongsTo(ObjectField::class);
    }

    /**
     * @return BelongsTo
     */
    public function object()
    {
        return $this->belongsTo(ObjectModel::class);
    }

}
