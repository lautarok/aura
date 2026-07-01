<?php
namespace api;

use adapters\in\router\base\RouterGroup;
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