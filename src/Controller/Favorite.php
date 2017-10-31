<?php

namespace Controller;

use Entity\Model;
use HTTP;

class Favorite extends ControllerAbstract
{
    /**
     * @param int $idUser
     *
     * @return Model\Song[]
     */
    public function getFavorites($idUser)
    {
        $favorites = $this->mapperUser->findFavoriteSongs((int)$idUser);
        $favorites = array_map(function($favorite) { return $favorite->toArray(); }, $favorites);

        $response = new HTTP\Response($this->formatter);
        $response
            ->setHTTPCode(HTTP\Response::HTTP_CODE_SUCCESS)
            ->setBody($favorites)
        ;

        $response->render();
    }

    /**
     * @param int $idUser
     * @param int $idSong
     *
     * @return bool
     */
    public function addFavorite($idUser, $idSong)
    {
        $response = new HTTP\Response($this->formatter);

        $user = $this->mapperUser->find((int)$idUser);
        if (!$user->getId()) {
            $response
                ->setHTTPCode(HTTP\Response::HTTP_CODE_BAD_REQUEST)
                ->setBody(['message' => 'Unknown user']);
            $response->render();
            return;
        }

        $song = $this->mapperSong->find((int)$idSong);
        if (!$song->getId()) {
            $response
                ->setHTTPCode(HTTP\Response::HTTP_CODE_BAD_REQUEST)
                ->setBody(['message' => 'Unknown song']);
            $response->render();
            return;
        }

        $this->mapperUser->addFavorite(
            (int)$idUser,
            (int)$idSong
        );

        $response
            ->setHTTPCode(HTTP\Response::HTTP_CODE_CREATED)
            ->setBody(['message' => 'Favorite successfully added']);

        $response->render();
    }

    /**
     * @param int $idUser
     * @param int $idSong
     *
     * @return bool
     */
    public function deleteFavorite($idUser, $idSong)
    {
        $response = new HTTP\Response($this->formatter);

        $user = $this->mapperUser->find((int)$idUser);
        if (!$user->getId()) {
            $response
                ->setHTTPCode(HTTP\Response::HTTP_CODE_BAD_REQUEST)
                ->setBody(['message' => 'Unknown user']);
            $response->render();
            return;
        }

        $song = $this->mapperSong->find((int)$idSong);
        if (!$song->getId()) {
            $response
                ->setHTTPCode(HTTP\Response::HTTP_CODE_BAD_REQUEST)
                ->setBody(['message' => 'Unknown song']);
            $response->render();
            return;
        }

        $this->mapperUser->removeFavorite(
            (int)$idUser,
            (int)$idSong
        );

        $response
            ->setHTTPCode(HTTP\Response::HTTP_CODE_SUCCESS)
            ->setBody(['message' => 'Favorite successfully removed']);

        $response->render();
    }
}