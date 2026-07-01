<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Link extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $className = $props["className"] ?? null;
        $href = $props["href"] ?? "#";

        return <<<HTML
            <a href="$href" class="$className">
                $children
            </a>
        HTML;
    }
}