<?php
namespace adapters\in\router\base;

require_once __DIR__ . "/handler.php";

abstract class RouterGroup {
    public array $handlerList = [];

    public function __construct() {
        $this->setupRoutes();
    }

    public function getPrefix(): string {
        return "/";
    }

    public function addHandler(Handler $handler): void {
        $this->handlerList[$handler->getPath()] = $handler;
    }

    public function getHandler(string $path): Handler | null {
        return $this->handlerList[$path] ?? null;
    }

    public function handleNotFound(): void {
        echo "Página no encontrada";
    }

    public function setupRoutes(): void {}
}