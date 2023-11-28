<?php
declare(strict_types=1);
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    $rootPath = realpath(__DIR__ . "/..");
    $enableDebug = true;
    $isDockerEnvironment = true;

    $containerBuilder->addDefinitions([
        "settings" => [
            "base_path" => '',
            "debug" => $enableDebug,

            "logger" => [
                "name" => "casa-automatica-backend",
                "path" => $isDockerEnvironment ? 'php://stdout' : $rootPath . '/var/log/app.log',
                "level" => $enableDebug ? Logger::DEBUG : Logger::INFO,
            ],

            "database" => [
                "username" => "casa_automatica",
                "password" => "viniccius13",
                "database" => "casa_automatica",
                "charset" => "utf8mb4",
                "driver" => "mysql",
                "host" => "mariadb",
                "port" => 3306,
            ],
        ],
    ],);
};