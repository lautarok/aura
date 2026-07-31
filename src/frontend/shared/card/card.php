<?php
namespace frontend\shared\card;

use frontend\core\base\Component;
use frontend\shared\html\Div;
use ports\AssetManagerPort;

class Card extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/shared/card/card.css");

        $component = $props["component"] ?? null;

        return $this->component(Div::class, [
            "component" => $component,
            "className" => "card " . ($props["className"] ?? ""),
            "style" => $props["style"] ?? null,
            "children" => $this->parseChildren($props["children"] ?? null)
        ]);
    }
}