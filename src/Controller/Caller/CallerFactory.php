<?php

namespace Controller\Caller;

use Service;

class CallerFactory extends Service\ServiceAbstract
{
    public function create(array $appConf)
    {
        /** @var \Routes\Router $router */
        $router = $this->serviceManager->get('router');
        $request = new \HTTP\Request($_SERVER);
        $route = $router->getRoute($request);

        $controllerName = $route->getController();

        $controller =  new $controllerName(
            new \Entity\Mapper\User($this->serviceManager->get('db_adapter')),
            new \Entity\Mapper\Song($this->serviceManager->get('db_adapter')),
            $request,
            $this->serviceManager->get('formatter')
        );

        return new Caller($controller, $route->getAction(), $route->getParameters());
    }
}