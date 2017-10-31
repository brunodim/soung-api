<?php

namespace HTTP;

use HTTP\Formatter;

class Response
{
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var string
     */
    protected $body;

    /**
     * @var int
     */
    protected $HTTPCode;

    const HTTP_CODE_SUCCESS = 200;
    const HTTP_CODE_CREATED = 201;
    const HTTP_CODE_NO_CONTENT = 204;
    const HTTP_CODE_NOT_MODIFIED = 304;
    const HTTP_CODE_BAD_REQUEST = 400;
    const HTTP_CODE_FORBIDDEN = 403;
    const HTTP_CODE_NOT_FOUND = 404;
    const HTTP_CODE_CONFLICT = 409;
    const HTTP_CODE_INTERNAL_SERVER_ERROR = 500;

    /**
     * @var Formatter\FormatterInterface
     */
    protected $formatter;

    public function __construct(Formatter\FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
        $this->addHeader('Content-Type', $formatter->getContentType());
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return self
     */
    public function addHeader($name, $value)
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * @param $name
     *
     * @return self
     */
    public function removeHeader($name)
    {
        unset($this->headers[$name]);

        return $this;
    }

    /**
     * @param int $HTTPCode
     *
     * @return self
     */
    public function setHTTPCode($HTTPCode)
    {
        $this->HTTPCode = $HTTPCode;

        return $this;
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return void
     */
    public function render()
    {
        http_response_code($this->HTTPCode);

        foreach($this->headers as $name => $value) {
            header(sprintf('%s: %s', $name, $value));
        }

        echo $this->formatter->format($this->body);
    }
}