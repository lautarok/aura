<?php

require_once __DIR__ . "/adapters/in/router/router.php";
use adapters\in\router\Router;

require_once __DIR__ . "/frontend/features/crm/routes.php";
use frontend\features\crm\CrmRoutes;

require_once __DIR__ . "/adapters/out/asset_loader/asset_loader.php";
use adapters\out\asset_loader\AssetLoader;

require_once __DIR__ . "/api/routes.php";
use \api\ApiRoutes;

class Bootstrap {
    public function __construct() {
        $this->initialize();
    }

    private function initialize() {
        $assetLoader = new AssetLoader();

        $router = new Router;

        $apiRoutes = new ApiRoutes;
        $router->registerGroup($apiRoutes);

        $crmRoutes = new CrmRoutes($assetLoader);
        $router->registerGroup($crmRoutes);

        $router->handleRequest();
    }
}

new Bootstrap;