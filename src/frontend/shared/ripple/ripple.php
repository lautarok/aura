<?php
namespace frontend\shared\ripple;

include_once __DIR__ . "/../../core/base/component.php";
use frontend\core\base\Component;

include_once __DIR__ . "/../../../ports/asset_loader.php";
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
            <div class="ripple $className" style="border-radius: $borderRadius;">
                $children
            </div>
        HTML;
    }
}