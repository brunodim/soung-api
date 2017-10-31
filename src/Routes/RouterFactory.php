<?php

namespace Routes;

use HTTP;
use Service;

class RouterFactory extends Service\ServiceAbstract
{
    public function create(array $conf)
    {
        return new Router($conf);
    }
}