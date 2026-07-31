<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Header extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $component = $props["component"] ?? null;

        return <<<HTML
            <header data-component="$component">
                $children
            </header>
        HTML;
    }
}