<?php
namespace frontend\features\landing;

use adapters\in\router\base\RouterGroup;
use frontend\features\landing\LandingPage;

class LandingRoutes extends RouterGroup {
    public function setupRoutes(): void {
        $this->registerHandler("/", LandingPage::class, [$this->context]);
    }

    public function handleNotFound(): void {
        echo "Esta ruta no existe en la página de atterrizaje";
    }
}