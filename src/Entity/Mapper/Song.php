<?php

namespace Entity\Mapper;

use Entity;
use Entity\Model;

class Song extends MapperAbstract
{
    /**
     * @param int $songId
     *
     * @return Model\Song
     */
    public function find($songId)
    {
        $query = 'SELECT s.* FROM song s WHERE s.id = ?';

        $result = $this->dbAdapter->selectOne($query, [$songId]);
        $song = new Model\Song();

        $hydrator = new Entity\Hydrator();
        $hydrator->hydrate($song, $result);

        return $song;
    }
}