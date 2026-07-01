<?php
namespace frontend\shared\icons\catalog;

use frontend\shared\icons\base\Icon;

class PeopleMultipleIcon extends Icon {
    protected function path(array $props = []): string {
        return <<<XML
            <circle cx="7" cy="6" r="3"/><path d="M10 13H5.818a3 3 0 0 0-2.964 2.537L2.36 18.69A2 2 0 0 0 4.337 21H9"/><path d="M21.64 18.691l-.494-3.154A3 3 0 0 0 18.182 13h-2.364a3 3 0 0 0-2.964 2.537l-.493 3.154A2 2 0 0 0 14.337 21h5.326a2 2 0 0 0 1.976-2.309z"/><circle cx="17" cy="6" r="3"/>
        XML;
    }
}