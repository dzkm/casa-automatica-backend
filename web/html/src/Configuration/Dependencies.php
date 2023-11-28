<?php
declare(strict_types=1);
use Medoo\Medoo;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;

return function(ContainerBuilder $container) {
    $container->addDefinitions([
        'logger' => function (ContainerInterface $container) {
            $settings = $container->get("settings");

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $loggerUidProcessor = new UidProcessor();
            $logger->pushProcessor($loggerUidProcessor);

            $loggerStreamHandler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($loggerStreamHandler);

            return $logger;
        },
        'medoo' => function(ContainerInterface $container){
            $settings = $container->get('settings');
            $dbSettings = $settings["database"];

            $database = new Medoo([
                "type" => $dbSettings["driver"],
                "host" => $dbSettings["host"],
                "port" => $dbSettings["port"],
                "database" => $dbSettings["database"],
                "username" => $dbSettings["username"],
                "password" => $dbSettings["password"],

                "charset" => "utf8mb4",
                "collation" => "utf8mb4_general_ci",
                "error" => PDO::ERRMODE_EXCEPTION,
                
            ]);

            return $database;
        }
    ]);
};