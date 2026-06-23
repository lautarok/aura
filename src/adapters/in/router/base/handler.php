<?php
namespace adapters\in\router\base;

abstract class Handler {
    public function getPath(): string {
        return "/";
    }

    public function handle(): void {
        echo "No implementado";
    }
}