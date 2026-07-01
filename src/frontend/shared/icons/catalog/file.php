<?php
namespace frontend\shared\icons\catalog;

use frontend\shared\icons\base\Icon;

class FileIcon extends Icon {
    protected function path(array $props = []): string {
        return <<<XML
            <path d="M4 4v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.342a2 2 0 0 0-.602-1.43l-4.44-4.342A2 2 0 0 0 13.56 2H6a2 2 0 0 0-2 2z"/><path d="M9 13h6"/><path d="M9 17h3"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/>
        XML;
    }
}