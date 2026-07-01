<?php
namespace frontend\core\frames\crm\components\user_card;

use frontend\core\base\Component;
use ports\AssetLoaderPort;
use frontend\shared\ripple\Ripple;
use frontend\shared\avatar\Avatar;

class UserCard extends Component {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
    }

    public function render(array $props = []): string {
        $this->assetLoader->load(__DIR__ . "/user_card.css");

        $avatarHtml = (new Avatar($this->assetLoader))->render();

        $buttonHtml = (new Ripple($this->assetLoader))->render([
            "light" => true,
            "children" => <<<HTML
                <button>
                    <div>
                        <p>Augusto Lautaro Kazalukian</p>
                        <p>@lautarok</p>
                    </div>
                    $avatarHtml
                </button>
            HTML
        ]);

        return <<<HTML
            <div class="user-card">
                $buttonHtml
            </div>
        HTML;
    }
}