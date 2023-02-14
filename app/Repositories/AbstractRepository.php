<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Entities\AbstractEntity;

abstract class AbstractRepository
{
    public function createEntity($entity, $model)
    {
        $entityInstance = $entity;
        if (is_string($entity)) {
            $entityInstance = new $entity();
        }
        
        $inputArray = $model;
        if ($model instanceof Model) {
            $inputArray = $model->getAttributes();
        }
        
        foreach ($inputArray as $inputKey => $inputValue) {
            $key = $entityInstance->getKeyFromRight($inputKey);
            $entityInstance->set($key, $inputValue);
        }
        return $entityInstance;

    }

    public function createEntityCollection($entity, Collection $collection)
    {
        $outputCollection = new Collection();
        foreach ($collection as $model) {
            $entityInstance = $this->createEntity($entity, $model);
            $outputCollection->add($entityInstance);
        }
        return $outputCollection;
    }
}