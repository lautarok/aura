<?php
namespace frontend\shared\html;

use frontend\core\base\Component;

class H1 extends Component {
    public function render(array $props = []): string {
        return <<<HTML
            <h1>{$props["value"]}</h1>
        HTML;
    }
}