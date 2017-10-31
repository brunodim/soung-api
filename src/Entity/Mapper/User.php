<?php

namespace Entity\Mapper;

use Entity;
use Entity\Model;

class User extends MapperAbstract
{
    /**
     * @param int $userId
     *
     * @return Model\User
     */
    public function find($userId)
    {
        $query = 'SELECT u.* FROM user u WHERE u.id = ?';

        $result = $this->dbAdapter->selectOne($query, [$userId]);
        $user = new Model\User();

        $hydrator = new Entity\Hydrator();
        $hydrator->hydrate($user, $result);

        return $user;
    }

    /**
     * @param int $userId
     *
     * @return Model\Song[]
     */
    public function findFavoriteSongs($userId)
    {
        $query = 'SELECT s.* FROM user u JOIN user_song us ON u.id = us.id_user '.
                 'JOIN song s ON s.id = us.id_song WHERE u.id = ?';

        $results = $this->dbAdapter->select($query, [$userId]);

        $hydrator = new Entity\Hydrator();
        $return = [];

        foreach ($results as $result) {
            $return[] = $hydrator->hydrate(new Model\Song(), $result);
        }

        return $return;
    }

    /**
     * @param int $userId
     * @param int $songId
     *
     * @return bool
     */
    public function addFavorite($userId, $songId)
    {
        $query = 'INSERT IGNORE INTO user_song VALUES (?, ?)';

        return $this->dbAdapter->exec($query, [$userId, $songId]);
    }

    /**
     * @param int $userId
     * @param int $songId
     *
     * @return bool
     */
    public function removeFavorite($userId, $songId)
    {
        $query = 'DELETE FROM user_song WHERE id_user = ? AND id_song = ?';

        return $this->dbAdapter->exec($query, [$userId, $songId]);
    }
}