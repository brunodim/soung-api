<?php

final class Application
{
    public function run()
    {
        $servicesConf = require CONF_PATH . '/services.php';
        $appConf = require CONF_PATH . '/application.php';

        $serviceManager = new \Service\ServiceManager(
            $servicesConf,
            $appConf
        );

        try {

            /** @var \Controller\Caller\Caller $controllerCaller */
            $controllerCaller = $serviceManager->get('controller_caller');
            $controllerCaller->call();

        } catch (\Exception\BadRequestException $e) {

            $response = new HTTP\Response($serviceManager->get('formatter'));
            $response
                ->setHTTPCode(HTTP\Response::HTTP_CODE_BAD_REQUEST)
                ->setBody(['message' => $e->getMessage()])
                ->render();

        } catch (\Exception $e) {

            $response = new HTTP\Response($serviceManager->get('formatter'));
            $response
                ->setHTTPCode(HTTP\Response::HTTP_CODE_INTERNAL_SERVER_ERROR)
                ->setBody(['message' => $e->getMessage()])
                ->render();

        }
    }
}