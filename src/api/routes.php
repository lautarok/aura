<?php
namespace api;

use adapters\in\router\base\RouterGroup;
use api\health\HealthHandler;

class ApiRoutes extends RouterGroup {
    public function setupRoutes(): void {
        $this->registerHandler("/health", HealthHandler::class, [$this->context]);
    }

    public function handleNotFound(): void {
        echo "Método no encontrado";
    }
}