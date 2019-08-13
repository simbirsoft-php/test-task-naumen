<?php

namespace App\Traits;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\AdminException;
use Eloquent;

/**
 * Class RepositoryTrait
 */
trait RepositoryTrait
{
    /** @var Eloquent */
    protected $entity;

    /**
     * @return Collection|static[]
     */
    public function getAll(): Collection
    {
        return $this->entity->all();
    }

    /**
     * @param integer $id
     * @return \Illuminate\Support\Collection|static
     */
    public function requireById(int $id)
    {
        try {
            return $this->entity->findOrFail($id);
        } catch (Exception $e) {
            throw new AdminException("Not found parent_id:$id");
        }
    }

    /**
     * @param integer $id
     * @return \Illuminate\Support\Collection|static
     */
    public function getById(int $id)
    {
        return $this->entity->find($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function save($data)
    {
        if ($data instanceOf Model)
            return $this->storeEloquentModel($data);

        if (is_array($data))
            return $this->storeArray($data);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data)
    {
        $model->fill($data);
        $model->save();

        return $model;
    }

    /**
     * @param Model $model
     * @return Model
     */
    protected function storeEloquentModel(Model $model)
    {
        if ($model->getDirty()) {
            $model->save();
        } elseif ($model->timestamps) {
            $model->touch();
        }

        return $model;
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function storeArray($data)
    {
        $model = $this->getNew($data);
        return $this->storeEloquentModel($model);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function getNew($attributes = array())
    {
        return $this->entity->newInstance($attributes);
    }

    /**
     * @param $attributes
     *
     * @return Eloquent
     */
    public function firstOrNew(array $attributes)
    {
        try {
            return $this->entity->firstOrNew($attributes);
        } catch (Exception $e) {
            throw new AdminException("Not found model by attributes");
        }
    }

    /**
     * @param Model $model
     * @return bool|null
     * @throws Exception
     */
    public function delete(Model $model)
    {
        return $model->delete();

    }
}
