<?php

namespace Entity\Model;

abstract class ModelAbstract implements ModelInterface
{
    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}