<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Main extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);

        return <<<HTML
            <main>
                $children
            </main>
        HTML;
    }
}