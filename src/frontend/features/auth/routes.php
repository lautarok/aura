<?php
namespace frontend\features\auth;

use adapters\in\router\base\RouterGroup;
use frontend\features\auth\modules\login\Login;
use frontend\features\auth\modules\logout\Logout;

class AuthRoutes extends RouterGroup {
    public function setupRoutes(): void {
        $this->registerHandler("/", Login::class, [$this->context]);
    }

    public function handleNotFound(): void {
        http_response_code(404);
        echo "Esta ruta no existe en autenticador";
    }
}