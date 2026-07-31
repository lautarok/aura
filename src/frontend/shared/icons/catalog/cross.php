<?php
namespace frontend\shared\icons\catalog;

use frontend\shared\icons\base\Icon;

class Cross extends Icon {
    protected function path(array $props = []): string {
        return <<<XML
            <path d="M20 20L4 4m16 0L4 20"/>
        XML;
    }
}