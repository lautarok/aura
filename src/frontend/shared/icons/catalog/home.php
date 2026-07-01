<?php
namespace frontend\shared\icons\catalog;

use frontend\shared\icons\base\Icon;

class HomeIcon extends Icon {
    protected function path(array $props = []): string {
        return <<<XML
            <path d="M21 19v-6.733a4 4 0 0 0-1.245-2.9L13.378 3.31a2 2 0 0 0-2.755 0L4.245 9.367A4 4 0 0 0 3 12.267V19a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2z"/>
            <path d="M9 15a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6H9v-6z"/>
        XML;
    }
}