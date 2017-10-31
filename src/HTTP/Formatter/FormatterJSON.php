<?php

namespace HTTP\Formatter;

class FormatterJSON implements FormatterInterface
{
    protected $contentType = 'application/json';

    /**
     * @param mixed $content
     *
     * @return string
     */
    public function format($content)
    {
        return json_encode($content);
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }
}