<?php
namespace api;

use adapters\in\router\base\RouterGroup;
use api\health\HealthHandler;

class ApiRoutes extends RouterGroup {
    public function getPrefix(): string {
        return "/api/v1";
    }

    public function setupRoutes(): void {
        $this->registerHandler(new HealthHandler($this->context));
    }

    public function handleNotFound(): void {
        echo "Método no encontrado";
    }
}