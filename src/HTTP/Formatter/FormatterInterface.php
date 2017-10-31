<?php

namespace HTTP\Formatter;

interface FormatterInterface
{
    /**
     * @param mixed $content
     *
     * @return string
     */
    public function format($content);

    /**
     * @return string
     */
    public function getContentType();
}