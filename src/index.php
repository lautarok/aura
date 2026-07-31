<?php
include_once __DIR__ . "/autoloader.php";
new Autoloader;

use adapters\in\router\Router;
use frontend\features\crm\CrmRoutes;
use frontend\features\landing\LandingRoutes;
use adapters\out\asset_manager\AssetManager;
use adapters\out\context\Context;
use api\ApiRoutes;
use ports\AssetManagerPort;
use frontend\features\auth\AuthRoutes;

class Bootstrap {
    public function __construct() {
        $this->initialize();
    }

    private function initialize() {
        $context = new Context();
        $context->registerStringValue("app:name", "Aura");
        $context->registerStringValue("app:version", "b-0.0.1");

        $context->registerAdapter(AssetManagerPort::class, AssetManager::class);

        $router = new Router;

        $router->registerGroup("/api/v1", ApiRoutes::class, [$context]);
        $router->registerGroup("/", LandingRoutes::class, [$context]);
        $router->registerGroup("/crm", CrmRoutes::class, [$context]);
        $router->registerGroup("/auth", AuthRoutes::class, [$context]);

        $router->handleRequest();
    }
}

new Bootstrap;