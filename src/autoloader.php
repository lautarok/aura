<?php

class AutoLoader {
    public function __construct() {
        $this->register();
    }

    private function register() {
        spl_autoload_register(function($class) {
            $classPath = __DIR__ . "/" . $this->namespaceToPath($class);
            if (file_exists($classPath)) {
                include_once $classPath;
                return;
            }

            $classPathVariant = preg_replace("/([a-zA-Z0-9-]+_)(\w+\.php)$/", "$2", $classPath);
            if (file_exists($classPathVariant)) {
                include_once $classPathVariant;
                return;
            }
        });
    }

    static function namespaceToPath(string $namespace) {
        $namespace = str_replace("\\", "/", $namespace);
        $namespace = preg_replace('/(?<!^)[A-Z]/', '_$0', $namespace);
        $namespace = str_replace("/_", "/", $namespace);
        $namespace = strtolower($namespace);
        $namespace = $namespace . ".php";
        return $namespace;
    }
}