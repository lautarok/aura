<?php
namespace ports;

interface AssetManagerPort {
    public function load(string $path): self;
    public function toHtml(): string;
    public function getLoadedList(): array;
}