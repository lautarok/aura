<?php
namespace frontend\features\crm;

use adapters\in\router\base\RouterGroup;
use frontend\features\crm\modules\home\CrmHomeHandler;
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