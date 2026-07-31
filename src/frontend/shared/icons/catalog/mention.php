<?php
namespace frontend\shared\icons\catalog;

use frontend\shared\icons\base\Icon;

class Mention extends Icon {
    protected function path(array $props = []): string {
        return <<<XML
            <circle cx="12" cy="12" r="4"/>
            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10c2.252 0 4.33-.744 6.001-2"/>
            <path d="M16 8v4c0 1 .6 3 3 3s3-2 3-3"/>
        XML;
    }
}