<?php
namespace frontend\shared\avatar;

use frontend\core\base\Component;
use ports\AssetLoaderPort;

class Avatar extends Component {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
    }

    public function render(array $props = []): string {
        $this->assetLoader->load(__DIR__ . "/avatar.css");

        $letters = "AK";
        if (isset($props["letters"])) {
            $letters = $props["letters"];
        }

        return <<<HTML
            <div class="avatar">
                <span>{$letters[0]}{$letters[1]}</span>
            </div>
        HTML;
    }
}