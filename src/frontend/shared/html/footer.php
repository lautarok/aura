<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Footer extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $component = $props["component"] ?? null;

        return <<<HTML
            <footer data-component="$component">
                $children
            </footer>
        HTML;
    }
}