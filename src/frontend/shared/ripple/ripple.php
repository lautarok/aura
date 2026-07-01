<?php
namespace frontend\shared\ripple;

use frontend\core\base\Component;
use ports\AssetLoaderPort;

class Ripple extends Component {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
    }

    public function render(array $props = []): string {
        $this->assetLoader->load(__DIR__ . "/ripple.css");
        $this->assetLoader->load(__DIR__ . "/ripple.js");

        $children = $props["children"] ?? null;
        $borderRadius = $props["borderRadius"] ?? "1em";
        $light = $props["light"] ?? false;

        $className = $light ? "light" : "";

        return <<<HTML
            <div class="ripple $className">
                <div class="ripple-effect-container" style="border-radius: $borderRadius;">
                </div>
                $children
            </div>
        HTML;
    }
}