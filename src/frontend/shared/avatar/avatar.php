<?php
namespace frontend\shared\avatar;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\shared\html\Div;
use frontend\shared\html\Span;

class Avatar extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/shared/avatar/avatar.css");

        $letters = "Aa";
        if (isset($props["letters"])) {
            $letters = substr($props["letters"], 0, 2);
        }

        return $this->component(Div::class, [
            "className" => "avatar",
            "children" => $this->component(Span::class, [
                "value" => $letters
            ])
        ]);
    }
}