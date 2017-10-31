<?php
ini_set('display_errors', 1);

define('CONF_PATH', dirname(__FILE__) . '/../src/Conf');

require dirname(__FILE__) . '/../src/Autoload.php';
spl_autoload_register([new \Autoload, 'load']);

$application = new \Application();
$application->run();