<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Aside extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);

        return <<<HTML
            <aside>
                $children
            </aside>
        HTML;
    }
}