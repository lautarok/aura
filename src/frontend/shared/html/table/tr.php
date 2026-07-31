<?php
namespace frontend\shared\html\table;

use frontend\core\base\Component;

class Tr extends Component {
    public function render(array $props = []): string {
        $children = $this->parseChildren($props["children"] ?? null);
        $className = $props["className"] ?? null;

        return <<<HTML
            <tr class="$className">
                $children
            </tr>
        HTML;
    }
}