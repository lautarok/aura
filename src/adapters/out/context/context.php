<?php
namespace adapters\out\context;

use ports\ContextPort;

class Context implements ContextPort {
    private array $adapters = [];
    private array $stringValues = [];
    private array $intValues = [];

    public function registerAdapter(string $key, mixed $adapter): void {
        $this->adapters[$key] = $adapter;
    }

    public function registerStringValue(string $key, string $value): void {
        $this->stringValues[$key] = $value;
    }

    public function registerIntValue(string $key, int $value): void {
        $this->intValues[$key] = $value;
    }

    public function registerValue(string $key, int|string $value): void {
        if (is_int($value)) {
            $this->intValues[$key] = $value;
        } else {
            $this->stringValues[$key] = $value;
        }
    }

    public function adapter(string $key): mixed {
        return $this->adapters[$key] ?? null;
    }

    public function stringValue(string $key): ?string {
        return $this->stringValues[$key] ?? null;
    }

    public function intValue(string $key): ?int {
        return $this->intValues[$key] ?? null;
    }
}