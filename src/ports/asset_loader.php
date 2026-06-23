<?php
namespace ports;

interface AssetLoaderPort {
    public function load(string $path): void;
    public function toHtml(): string;
}