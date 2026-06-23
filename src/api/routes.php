<?php
namespace api;

include_once __DIR__ . "/../adapters/in/router/base/router_group.php";
use adapters\in\router\base\RouterGroup;

include_once __DIR__ . "/health/health.php";
use api\health\HealthHandler;

class ApiRoutes extends RouterGroup {
    public function getPrefix(): string {
        return "/api/v1";
    }

    public function setupRoutes(): void {
        $this->addHandler(new HealthHandler);
    }

    public function handleNotFound(): void {
        echo "Método no encontrado";
    }
}