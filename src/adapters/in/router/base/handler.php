<?php
namespace adapters\in\router\base;

use ports\ContextPort;

abstract class Handler {
    protected ContextPort $context;

    public function __construct(ContextPort $context) {
        $this->context = $context;
    }

    public function getPath(): string {
        return "/";
    }

    public function handle(): void {
        echo "No implementado";
    }
}