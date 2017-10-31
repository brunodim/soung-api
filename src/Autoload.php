<?php

class Autoload
{
    public function load($className)
    {
        $libPath = dirname(__FILE__);
        $filename = sprintf(
            '%s/../src/%s.php',
            $libPath,
            str_replace('\\', '/', $className)
        );
        
        if (file_exists($filename)) {
            require_once $filename;
        }
    }
}