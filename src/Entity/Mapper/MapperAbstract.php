<?php

namespace Entity\Mapper;

use Db\AdapterInterface;

abstract class MapperAbstract
{
    /**
     * @var AdapterInterface
     */
    protected $dbAdapter;

    /**
     * User constructor
     *
     * @param AdapterInterface $dbAdapter
     */
    public function __construct(AdapterInterface $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }
}