<?php
namespace frontend\core\components\router_outlet;

use frontend\core\base\Component;

class RouterOutlet extends Component {
    public function render($props = []): string {
        $childrenHtml = $props["children"] ?? null;

        if (isset($props["originalContent"])) {
            $childrenHtml = $props["originalContent"];
        }

        $htmlContent = <<<HTML
            <div data-router="outlet" style="width: 100%; height: 100%">
                $childrenHtml
            </div>
        HTML;

        return $htmlContent;
    }
}