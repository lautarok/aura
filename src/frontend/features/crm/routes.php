<?php
namespace frontend\features\crm;

require_once __DIR__ . "/../../../adapters/in/router/base/router_group.php";
use adapters\in\router\base\RouterGroup;

require_once __DIR__ . "/modules/home/home.php";
use frontend\features\crm\modules\home\CrmHomeHandler;

require_once __DIR__ . "/../../../ports/asset_loader.php";
use ports\AssetLoaderPort;

class CrmRoutes extends RouterGroup {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
        parent::__construct();
    }

    public function getPrefix(): string {
        return "/crm";
    }

    public function setupRoutes(): void {
        $this->addHandler(new CrmHomeHandler($this->assetLoader));
    }

    public function handleNotFound(): void {
        echo "Esta ruta no existe en el CRM";
    }
}