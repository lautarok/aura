<?php
namespace frontend\shared\button;

use frontend\core\base\Component;
use ports\AssetLoaderPort;
use frontend\shared\ripple\Ripple;

class Button extends Component {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
    }

    public function render(array $props = []): string {
        $this->assetLoader->load(__DIR__ . "/button.css");

        $rippleHtml = (new Ripple($this->assetLoader))->render([
            "borderRadius" => "1000em",
            "children" => <<<HTML
                <button class="button">Touch me</button>
            HTML
        ]);

        return $rippleHtml;
    }
}