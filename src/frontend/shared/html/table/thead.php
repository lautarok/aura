<?php
namespace frontend\shared\html\table;

use frontend\core\base\Component;

class Thead extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $className = $props["className"] ?? null;

        return <<<HTML
            <thead class="$className">
                $children
            </thead>
        HTML;
    }
}