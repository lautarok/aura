<?php
namespace frontend\shared\icons\catalog;

use frontend\shared\icons\base\Icon;

class Key extends Icon {
    protected function path(array $props = []): string {
        return <<<XML
            <path d="M8 18l2-2h2l1.36-1.36a6.5 6.5 0 1 0-3.997-3.992L2 18v4h4l2-2v-2z"/>
            <circle cx="17" cy="7" r="1"/>
        XML;
    }
}