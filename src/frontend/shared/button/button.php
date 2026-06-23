<?php
namespace frontend\shared\button;

include_once __DIR__ . "/../../core/base/component.php";
use frontend\core\base\Component;

include_once __DIR__ . "/../../../ports/asset_loader.php";
use ports\AssetLoaderPort;

class Button extends Component {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
    }

    public function render(array $props = []): string {
        $this->assetLoader->load(__DIR__ . "/button.css");

        return <<<HTML
            <button class="button">Touch me</button>
        HTML;
    }
}