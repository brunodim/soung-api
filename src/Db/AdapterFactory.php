<?php

namespace Db;

use Service;

class AdapterFactory extends Service\ServiceAbstract
{
    const DRIVER_PDO = 'pdo';

    /**
     * @param array $conf
     *
     * @return AdapterInterface
     *
     * @throws \Exception
     */
    public function create(array $conf)
    {
        if (!isset($conf['db'])) {
            throw new \Exception(sprintf(
                '%s can not create adapter because db conf is not provided',
                __METHOD__
            ));
        }

        if (!isset($conf['db']['driver'])) {
            throw new \Exception(sprintf(
                '%s can not create adapter because driver is not provided',
                __METHOD__
            ));
        }

        if (self::DRIVER_PDO === $conf['db']['driver']) {
            return new PdoAdapter($conf['db']);
        }

        throw new \Exception(sprintf(
            '%s can not create adapter because driver %s is not handled',
            __METHOD__,
            $conf['driver']
        ));
    }
}