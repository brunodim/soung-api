<?php

namespace Service;

abstract class ServiceAbstract implements ServiceInterface
{
    protected $serviceManager;

    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }
}