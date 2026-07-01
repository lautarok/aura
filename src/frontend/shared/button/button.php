<?php
namespace frontend\shared\button;

use frontend\core\base\Component;
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