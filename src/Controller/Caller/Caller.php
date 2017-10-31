<?php

namespace Controller\Caller;

class Caller
{
    /**
     * @var \Controller\ControllerAbstract
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @param \Controller\ControllerAbstract $controller
     * @param string $action
     * @param array $parameters
     *
     * @throws \Exception\BadRequestException
     */
    public function __construct(
        \Controller\ControllerAbstract $controller,
        $action,
        array $parameters
    ) {
        if (!is_callable([$controller, $action])) {
            throw new \Exception\BadRequestException('Not callable');
        }

        $this->controller = $controller;
        $this->action = $action;
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function call()
    {
        return call_user_func_array(
            [$this->controller, $this->action],
            $this->parameters
        );
    }
}