<?php
namespace frontend\core\base;

use ports\ContextPort;

abstract class Component {
    protected ContextPort $context;

    public function __construct(ContextPort $context) {
        $this->context = $context;
    }

    public function render(array $props = []): string {
        return "Componente no implementado";
    }

    protected function component(
        string|array $componentClass,
        array $props = [],
        ?ContextPort $withContext = null
    ): string {
        $context = $withContext ?? $this->context;
        return (new $componentClass($context))->render($props);
    }

    protected function parseChildren(mixed $children): ?string {
        if (is_array($children)) {
            return array_reduce($children, function ($carry, $child) {
                return $carry . $child;
            }, "");
        }

        return $children;
    }

    protected function withContext(callable $callback, array $withContext): string|array {
        $context = clone $this->context;
        
        foreach ($withContext as $key => $value) {
            $context->registerValue($key, $value);
        }

        $current = $this;

        return $callback(
            function (
                string|array $componentClass,
                array $props = []
            ) use (
                $current,
                $context
            ): string {
                return $current->component($componentClass, $props, $context);
            }
        );
    }
}