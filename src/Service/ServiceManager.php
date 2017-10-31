<?php

namespace Service;

final class ServiceManager
{
    /**
     * @var array
     */
    private $servicesConf;

    /**
     * @var array
     */
    private $appConf;

    /**
     * @var array
     */
    private $services;

    /**
     * Manager constructor.
     *
     * @param array $servicesConf
     * @param array $appConf
     */
    public function __construct(array $servicesConf, array $appConf)
    {
        $this->servicesConf = $servicesConf;
        $this->appConf = $appConf;
    }

    /**
     * @param string $serviceName
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function get($serviceName)
    {
        if (isset($this->services[$serviceName])) {
            return $this->services[$serviceName];
        }

        if (!isset($this->servicesConf[$serviceName])) {
            throw new \Exception(sprintf('Unknow service %s', $serviceName));
        }

        $serviceFactoryClass = $this->servicesConf[$serviceName];

        if (!class_exists($serviceFactoryClass)) {
            throw new \Exception(sprintf('Unknow class %s', $serviceFactoryClass));
        }

        $this->services[$serviceName] = call_user_func(
            [new $serviceFactoryClass($this), 'create'],
            $this->appConf
        );

        return $this->services[$serviceName];
    }
}