<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class P extends Component {
    public function render(array $props = []): string {
        $value = $props["value"] ?? null;
        $className = $props["className"] ?? null;

        return <<<HTML
            <p class="$className">$value</p>
        HTML;
    }
}