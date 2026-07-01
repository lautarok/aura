<?php
namespace ports;

interface ContextPort {
    public function adapter(string $key): mixed;
    public function stringValue(string $key): ?string;
    public function intValue(string $key): ?int;
    public function registerAdapter(string $key, mixed $adapter): void;
    public function registerStringValue(string $key, string $value): void;
    public function registerIntValue(string $key, int $value): void;
    public function registerValue(string $key, string|int $value): void;
}