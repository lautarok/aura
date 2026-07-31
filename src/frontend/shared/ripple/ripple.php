<?php
namespace frontend\shared\ripple;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\shared\html\Div;

class Ripple extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/shared/ripple/ripple.css");
        $assetManager->load("/frontend/shared/ripple/ripple.js");

        $children = $this->parseChildren($props["children"] ?? null);
        $borderRadius = $props["borderRadius"] ?? "1em";
        $primary = $props["primary"] ?? false;

        $className = $props["className"] ?? "";
        $className .= $primary ? " primary" : "";

        return $this->component(Div::class, [
            "component" => "ripple",
            "className" => $className,
            "children" => [
                $this->component(Div::class, [
                    "className" => "effect_container",
                    "style" => "border-radius: $borderRadius;"
                ]),
                $children
            ]
        ]);
    }
}