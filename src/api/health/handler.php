<?php
namespace api\health;

use adapters\in\router\base\Handler;

class HealthHandler extends Handler {
    public function handle(): void {
        echo "Hola mundo :D";
    }
}