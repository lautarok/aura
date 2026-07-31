<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Link extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $className = $props["className"] ?? null;
        $href = $props["href"] ?? "#";
        $component = $props["component"] ?? null;

        return <<<HTML
            <a href="$href" class="$className" data-component="$component">
                $children
            </a>
        HTML;
    }
}