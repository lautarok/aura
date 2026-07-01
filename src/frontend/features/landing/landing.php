<?php
namespace frontend\features\landing;

use adapters\in\router\base\Handler;
use ports\AssetManagerPort;

class LandingPage extends Handler {
    public function handle(): void {
        echo <<<HTML
            <h1>Hola, <a href="/crm">ingresa al CRM</a></h1>
        HTML;
    }
}