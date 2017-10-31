<?php

namespace HTTP;

class Request
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $requestURI;

    public function __construct(array $server)
    {
        if (isset($server['REQUEST_METHOD'])) {
            $this->method = $server['REQUEST_METHOD'];
        }

        if (isset($server['REQUEST_URI'])) {
            $this->requestURI = $server['REQUEST_URI'];
        }
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getRequestURI()
    {
        return $this->requestURI;
    }
}