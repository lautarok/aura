<?php
namespace frontend\features\crm\modules\home;

require_once __DIR__ . "/../../../../core/frames/crm/crm.php";
use frontend\core\frames\crm\CrmFrame;

require_once __DIR__ . "/../../../../../adapters/in/router/base/handler.php";
use adapters\in\router\base\Handler;

require_once __DIR__ . "/../../../../../ports/asset_loader.php";
use ports\AssetLoaderPort;

require_once __DIR__ . "/../../../../shared/button/button.php";
use frontend\shared\button\Button;

require_once __DIR__ . "/../../../../shared/ripple/ripple.php";
use frontend\shared\ripple\Ripple;

class CrmHomeHandler extends Handler {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
    }

    public function handle(): void {
        echo $this->render();
    }

    private function render(): string {
        $crmFrame = new CrmFrame($this->assetLoader);

        $buttonElement = (new Button($this->assetLoader))->render();
        $rippleElement = (new Ripple($this->assetLoader))->render([
            "children"      => $buttonElement,
            "borderRadius"  => "1000em"
        ]);
        $rippleElement2 = (new Ripple($this->assetLoader))->render([
            "children"      => $buttonElement,
            "borderRadius"  => "1000em"
        ]);

        $this->assetLoader->load(__DIR__ . "/home.css");

        return $crmFrame->render([
            "content" => <<<HTML
                <h1>Bienvenido</h1>
                <div style="width: fit-content;">$rippleElement</div>
                <div style="width: fit-content;">$rippleElement2</div>
            HTML
        ]);
    }
}