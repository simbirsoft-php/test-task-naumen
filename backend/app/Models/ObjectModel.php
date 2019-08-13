<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin ObjectModel
 */
class ObjectModel extends Model
{
    protected $guarded = [];
    protected $table = 'objects';

    /**
     * @return HasMany
     */
    public function values()
    {
        return $this->hasMany(ObjectValue::class, 'object_id');
    }

    /**
     * @return BelongsTo
     */
    public function objectType()
    {
        return $this->belongsTo(ObjectType::class);
    }

    /**
     * @return array
     */
    public function list()
    {
        $attrs = [
            'title' => $this->title,
            'uuid'  => $this->uuid
        ];
        $attrs += $this->values->pluck('value', 'field.name')->toArray();

        return $attrs;
    }

    public function setArchive()
    {
        $this->is_archive = true;
        $this->save();
    }

    public function removeArchive()
    {
        $this->is_archive = false;
        $this->save();
    }

}
