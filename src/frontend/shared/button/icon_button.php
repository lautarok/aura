<?php
namespace frontend\shared\button;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\shared\html\Button as HtmlButton;
use frontend\shared\html\Span;
use frontend\shared\html\Div;
use frontend\shared\ripple\Ripple;

class IconButton extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/shared/button/button.css");

        $children = $this->parseChildren($props["children"] ?? null);

        return $this->component(Div::class, [
            "component" => "button",
            "className" => "--icon",
            "children" => $this->component(Ripple::class, [
                "width" => "fit-content",
                "height" => "fit-content",
                "children" => $this->component(HtmlButton::class, [
                    "children" => $children
                ])
            ])
        ]);
    }
}