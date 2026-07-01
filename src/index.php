<?php
include_once __DIR__ . "/autoloader.php";
new Autoloader;

use adapters\in\router\Router;
use frontend\features\crm\CrmRoutes;
use adapters\out\asset_loader\AssetLoader;
use api\ApiRoutes;

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