<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Span extends Component {
    public function render(array $props = []): string {
        $value = $props["value"] ?? null;
        $className = $props["className"] ?? null;

        return <<<HTML
            <span class="$className">$value</span>
        HTML;
    }
}