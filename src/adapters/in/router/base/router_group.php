<?php
namespace adapters\in\router\base;

use ports\ContextPort;
use adapters\in\router\base\Handler;
use frontend\core\base\Component;

abstract class RouterGroup {
    protected ContextPort $context;

    public array $handlerList = [];

    public function __construct(ContextPort $context) {
        $this->context = $context;

        $this->setupRoutes(); 
    }

    public function getPrefix(): string {
        return "/";
    }

    public function registerHandler(Handler|Component $handler): void {
        $this->handlerList[$handler->getPath()] = $handler;
    }

    public function getHandler(string $path): Handler|Component | null {
        return $this->handlerList[$path] ?? null;
    }

    public function handleNotFound(): void {
        echo "Página no encontrada";
    }

    public function setupRoutes(): void {}
}