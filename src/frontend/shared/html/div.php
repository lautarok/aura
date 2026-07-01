<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Div extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $className = $props["className"] ?? null;
        $style = $props["style"] ?? null;

        return <<<HTML
            <div class="$className" style="$style">
                $children
            </div>
        HTML;
    }
}