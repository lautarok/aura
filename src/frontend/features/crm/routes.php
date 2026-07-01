<?php
namespace frontend\features\crm;

use adapters\in\router\base\RouterGroup;
use frontend\features\crm\modules\home\Home;
use frontend\features\crm\modules\persons\Persons;

class CrmRoutes extends RouterGroup {
    public function getPrefix(): string {
        return "/crm";
    }

    public function setupRoutes(): void {
        $this->registerHandler(new Home($this->context));
        $this->registerHandler(new Persons($this->context));
    }

    public function handleNotFound(): void {
        http_response_code(404);
        echo "Esta ruta no existe en el CRM";
    }
}