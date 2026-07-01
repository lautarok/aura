<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Button extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $className = $props["className"] ?? null;

        return <<<HTML
            <button class="$className">
                $children
            </button>
        HTML;
    }
}