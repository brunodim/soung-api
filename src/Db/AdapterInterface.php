<?php

namespace Db;

interface AdapterInterface
{
    /**
     * @param string $query
     * @param array $params
     *
     * @return array
     */
    public function select($query, array $params);

    /**
     * @param string $query
     * @param array $params
     *
     * @return array
     */
    public function selectOne($query, array $params);

    /**
     * @param string $query
     * @param array $params
     *
     * @return bool
     */
    public function exec($query, array $params);

    /**
     * @param string $query
     * @param array $params
     *
     * @return array
     */
    public function query($query, array $params);
}