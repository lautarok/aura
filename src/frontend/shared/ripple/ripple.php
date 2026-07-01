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
        $light = $props["light"] ?? false;

        $className = $props["className"] ?? "";
        $className .= $light ? "light" : "";

        return $this->component(Div::class, [
            "className" => "$className ripple",
            "children" => [
                $this->component(Div::class, [
                    "className" => "ripple-effect-container",
                    "style" => "border-radius: $borderRadius;"
                ]),
                $children
            ]
        ]);
    }
}