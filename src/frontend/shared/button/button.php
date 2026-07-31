<?php
namespace frontend\shared\button;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\shared\html\Button as HtmlButton;
use frontend\shared\html\Span;
use frontend\shared\html\Div;
use frontend\shared\ripple\Ripple;

class Button extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/shared/button/button.css");

        $value = $props["value"] ?? null;

        return $this->component(Div::class, [
            "component" => "button",
            "children" => $this->component(Ripple::class, [
                "primary" => true,
                "children" => $this->component(HtmlButton::class, [
                    "children" => $this->component(Span::class, [
                        "value" => $value
                    ])
                ])
            ])
        ]);
    }
}