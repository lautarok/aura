<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Button extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $className = $props["className"] ?? null;
        $component = $props["component"] ?? null;

        return <<<HTML
            <button data-component="$component" class="$className">
                $children
            </button>
        HTML;
    }
}