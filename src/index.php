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

class Bootstrap {
    public function __construct() {
        $this->initialize();
    }

    private function initialize() {
        $context = new Context();
        $context->registerStringValue("app:name", "Aura CRM");
        $context->registerStringValue("app:version", "b-0.0.1");

        $assetManager = new AssetManager();
        $context->registerAdapter(AssetManagerPort::class, $assetManager);

        $router = new Router;

        $apiRoutes = new ApiRoutes($context);
        $router->registerGroup($apiRoutes);

        $landingRoutes = new LandingRoutes($context);
        $router->registerGroup($landingRoutes);

        $crmRoutes = new CrmRoutes($context);
        $router->registerGroup($crmRoutes);

        $router->handleRequest();
    }
}

new Bootstrap;