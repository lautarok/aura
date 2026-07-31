<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Input extends Component {
    public function render(array $props = []): string {
        $placeholder = $props["placeholder"] ?? null;
        $value = $props["value"] ?? null;
        $type = $props["type"] ?? "text";
        $name = $props["name"] ?? null;
        $autocomplete = $props["autocomplete"] ?? null;

        return <<<HTML
            <input
                type="$type"
                placeholder="$placeholder"
                value="$value"
                autocomplete="$autocomplete"
                name="name"
            />
        HTML;
    }
}