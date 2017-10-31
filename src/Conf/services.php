<?php

return [
    'db_adapter'        => '\Db\AdapterFactory',
    'router'            => '\Routes\RouterFactory',
    'controller_caller' => '\Controller\Caller\CallerFactory',
    'formatter'         => '\HTTP\Formatter\FormatterFactory',
];