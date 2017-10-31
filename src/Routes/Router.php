<?php

namespace Routes;

use HTTP;

class Router
{
    /**
     * @var Route[]
     */
    protected $routes = [];

    public function __construct(array $appConf)
    {
        $routesConf = $appConf['routes'];
        $routesPrefix = isset($appConf['routes_prefix']) ? $appConf['routes_prefix'] : '';

        foreach ($routesConf as $routConf) {
            $route = (new Route())
                ->setAction($routConf['action'])
                ->setMethod($routConf['method'])
                ->setRoute(sprintf('%s%s', $routesPrefix, $routConf['route']))
                ->setController($routConf['controller']);

            $this->routes[] = $route;
        }
    }


    /**
     * @param HTTP\Request $request
     *
     * @return Route
     *
     * @throws \Exception
     */
    public function getRoute(HTTP\Request $request)
    {
        foreach ($this->routes as $route) {
            if($route->getMethod() !== strtolower($request->getMethod())) {
                continue;
            }

            if (!preg_match($route->getRoute(), $request->getRequestURI(), $matches)) {
                continue;
            }

            array_shift($matches);

            return $route->setParameters($matches);
        }

        throw new \Exception\BadRequestException('Failed to find route');
    }
}