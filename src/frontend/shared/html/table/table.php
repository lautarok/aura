<?php
namespace frontend\shared\html\table;

use frontend\core\base\Component;

class Table extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $className = $props["className"] ?? null;
        $component = $props["component"] ?? null;

        return <<<HTML
            <table class="$className" data-component="$component">
                $children
            </table>
        HTML;
    }
}