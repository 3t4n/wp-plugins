<?php

/**
 * Example file to start webserver
 * Start with 'php -S localhost:8000'
 */


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\API\Controller\TransactionController;
use Attrace\Connector\API\Storage\MysqlStorage;
use Attrace\Connector\API\Storage\StaticStorage;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\Router;
use Attrace\Connector\Util\Tracking;


require_once dirname(dirname(__FILE__)). '/config.php';
require_once dirname(dirname(__FILE__)). '/vendor/autoload.php';


//MySql Storage
global $config, $seeds;


try {
    switch ($config['storage_type']) {
        case 'Mysql':
            //config MySql Storage
            $storage = new MysqlStorage(
                $config['storage_config']['db_servername'],
                $config['storage_config']['db_username'],
                $config['storage_config']['db_password'],
                $config['storage_config']['db_name'],
                $config['storage_config']['db_port']
            );
            $storage->initConfig();
            $storage->initIntegrationConfig();
            $storage->initTransaction();
            break;
        case 'Static':
            $storage = new StaticStorage($seeds['config'], $seeds['integrationConfigs']);
            break;
        default:
            throw new AttraceException(AttraceException::NOT_SUPPORTED, "This \$config['storage_type'] is not supported");
    }

    //init storages
    ConfigController::getInstance()->setStorage($storage);
    TransactionController::getInstance()->setStorage($storage);
    IntegrationConfigController::getInstance()->setStorage($storage);

    //Set server side cookies, if you can
    Tracking::handleRequest();

    $handler = Router::getRouteHandler();
    if (!$handler) {
        echo "Welcome @ Attrace Connector";
        exit;
    }

    $handler->handleRequest();

//done

} catch (AttraceException $e) {
    echo "<pre>" . PHP_EOL;
    echo $e->getCode() . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    echo $e->getFile() . PHP_EOL;
    echo $e->getLine() . PHP_EOL;
    print_r($e->getTrace());
    echo "</pre>" . PHP_EOL;
}
