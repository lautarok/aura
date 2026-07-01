<?php
namespace frontend\shared\icons\catalog;

use frontend\shared\icons\base\Icon;

class CircleCheckIcon extends Icon {
    protected function path(array $props = []): string {
        return <<<XML
            <path d="M8 12.5l3 3 5-6"/><circle cx="12" cy="12" r="10"/>
        XML;
    }
}