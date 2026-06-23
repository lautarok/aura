<?php
namespace frontend\core\base;

abstract class Component {
    public function render(array $props = []): string {
        return "Componente no implementado";
    }
}