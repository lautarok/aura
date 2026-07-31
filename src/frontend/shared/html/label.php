<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Label extends Component {
    public function render(array $props = []): string {
        $component = $props["component"] ?? null;
        $children = $this->parseChildren($props["children"] ?? null);

        return <<<HTML
            <label data-component="$component">$children</label>
        HTML;
    }
}