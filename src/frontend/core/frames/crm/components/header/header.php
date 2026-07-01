<?php
namespace frontend\core\frames\crm\components\header;

use frontend\core\base\Component;
use ports\AssetLoaderPort;
use frontend\core\frames\crm\components\user_card\UserCard;

class Header extends Component {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
    }

    public function render($props = []): string {
        $this->assetLoader->load(__DIR__ . "/header.css");

        $userCardHtml = (new UserCard($this->assetLoader))->render();

        return <<<HTML
            <header>
                <div class="text">
                    <h1>Aura CRM</h1>
                    <p>Bienvenido</p>
                </div>
                <nav>
                    $userCardHtml
                </nav>
            </header>
        HTML;
    }
}