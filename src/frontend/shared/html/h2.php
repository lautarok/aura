<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class H2 extends Component {
    public function render(array $props = []): string {
        return <<<HTML
            <h2>{$props["value"]}</h2>
        HTML;
    }
}