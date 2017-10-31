<?php

namespace Entity\Model;

interface ModelInterface
{
    /**
     * @param $id
     *
     * @return self
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return array
     */
    public function toArray();
}