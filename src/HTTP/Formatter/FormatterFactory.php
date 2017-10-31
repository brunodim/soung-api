<?php

namespace HTTP\Formatter;

use Service;

class FormatterFactory extends Service\ServiceAbstract
{
    /**
     * @param array $appConf
     *
     * @return FormatterInterface
     *
     * @throws \Exception
     */
    public function create(array $appConf)
    {
        if (!isset($appConf['format'])) {
            throw new \Exception('Response format not setted');
        }

        if ('json' === $appConf['format']) {
            return new FormatterJSON();
        }

        throw new \Exception('Unknown format');
    }
}