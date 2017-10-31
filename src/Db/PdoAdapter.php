<?php

namespace Db;

class PdoAdapter implements AdapterInterface
{
    private $db;

    public function __construct(array $conf)
    {
        $db = new \Pdo(
            $conf['dsn'],
            $conf['username'],
            $conf['password']
        );

        $this->db = $db;
    }

    /**
     * @param string $query
     * @param array $params
     *
     * @return array
     */
    public function select($query, array $params)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    /**
     * @param string $query
     * @param array $params
     *
     * @return array
     */
    public function selectOne($query, array $params)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        return $stmt->fetch();
    }

    /**
     * @param string $query
     * @param array $params
     *
     * @return bool
     */
    public function exec($query, array $params)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        return $stmt->execute($params);
    }

    /**
     * @param string $query
     * @param array $params
     *
     * @return array
     */
    public function query($query, array $params)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll($params);
    }
}