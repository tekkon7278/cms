<?php

namespace App\Entities;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractEntity extends \ArrayObject
{
    protected $propertyKeyMap = [];

    public function __call($key, $value)
    {
        if (substr($key, 0, 3) === 'set') {
            $propertyName = Str::lcfirst(substr($key, 3));
            $this->set($propertyName, array_pop($value));
            return $this;
        } else {
            $propertyName = $key;
            if (substr($key, 0, 3) === 'get') {
                $propertyName = Str::lcfirst(Str::substr($key, 3));
            }
            return $this->get($propertyName);
        }
    }

    public function set($key, $value)
    {
        if (!$this->has($key)) {
            return false;
        }
        $this->offsetSet($key, $value);
    }

    public function get($key)
    {
        if (!$this->has($key) || !$this->isFilled($key)) {
            return null;
        }
        return $this->offsetGet($key);
    }

    public function has($key)
    {
        return Arr::has($this->propertyKeyMap, $key);
    }

    public function getKeyFromRight($rightkey)
    {
        return array_search($rightkey, $this->propertyKeyMap);
    }

    public function isFilled($key)
    {
        return $this->offsetExists($key);
    }
}
