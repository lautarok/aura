<?php
namespace frontend\shared\icons\catalog;

use frontend\shared\icons\base\Icon;

class ChevronDownIcon extends Icon {
    public function path(array $props = []): string {
        return <<<XML
            <path d="M4 9l8 8 8-8"/>
        XML;
    }
}