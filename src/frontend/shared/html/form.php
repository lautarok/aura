<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class Form extends Component {
    public function render(array $props = []): string {
        $component = $props["component"] ?? null;
        $children = $this->parseChildren($props["children"] ?? null);

        return <<<HTML
            <form
                novalidate
                data-component="$component"
                onsubmit="event.preventDefault()"
            >
                $children
            </form>
        HTML;
    }
}