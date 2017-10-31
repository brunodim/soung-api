<?php

namespace Controller;

use Entity\Mapper;
use Entity\Model;
use HTTP;

abstract class ControllerAbstract
{
    /**
     * @var Mapper\User
     */
    protected $mapperUser;

    /**
     * @var Mapper\Song
     */
    protected $mapperSong;

    /**
     * @var HTTP\Request
     */
    protected $request;

    /**
     * @var HTTP\Formatter\
     */
    protected $formatter;

    public function __construct(
        Mapper\User $mapperUser,
        Mapper\Song $mapperSong,
        HTTP\Request $request,
        HTTP\Formatter\FormatterInterface $formatter
    )
    {
        $this->mapperUser = $mapperUser;
        $this->mapperSong = $mapperSong;
        $this->request = $request;
        $this->formatter = $formatter;
    }
}