<?php
namespace frontend\features\crm\frame;

use ports\ContextPort;
use ports\AssetManagerPort;
use frontend\core\base\Component;
use frontend\shared\button\Button;
use frontend\features\crm\frame\components\sidebar\Sidebar;
use frontend\features\crm\frame\components\header\Header;
use frontend\core\components\router_outlet\RouterOutlet;
use frontend\shared\html\Document;
use frontend\shared\html\Main;

class CrmFrame extends Component {
    public function render(array $props = []): string {
        $appName = $this->context->stringValue("app:name");
        $pageTitle = $props["title"] ?? $appName;
        $children = $this->parseChildren($props["children"] ?? null);

        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/core/styles/variables.css");
        $assetManager->load("/frontend/core/styles/_normalize.css");
        $assetManager->load("/frontend/features/crm/frame/frame.css");
        $assetManager->load("/frontend/core/scripts/common/default.js");
        $assetManager->load("/frontend/features/crm/frame/frame.js");

        if (isset($_SERVER["HTTP_X_FRAGMENT"]) && $_SERVER["HTTP_X_FRAGMENT"]) {
            header("Content-Type: application/json");
            return json_encode([
                "title" => $pageTitle,
                "sources" => $assetManager->getLoadedList(),
                "fragment" => $children
            ]);
        }

        return $this->component(Document::class, [
            "title" => "$pageTitle",
            "children" => [
                $this->component(Sidebar::class),
                $this->component(Main::class, [
                    "children" => [
                        $this->component(Header::class),
                        $this->component(RouterOutlet::class, [
                            "children" => $children
                        ])
                    ]
                ])
            ]
        ]);
    }
}