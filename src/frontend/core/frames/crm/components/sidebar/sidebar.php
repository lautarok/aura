<?php
namespace frontend\core\frames\crm\components\sidebar;

use frontend\core\base\Component;
use ports\AssetLoaderPort;
use frontend\core\frames\crm\components\sidebar_action\SidebarAction;
use frontend\shared\ripple\Ripple;

class Sidebar extends Component {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
    }

    public function render(array $props = []): string {
        $this->assetLoader->load(__DIR__ . "/sidebar.css");

        $links = "";

        $settingsButton = (new SidebarAction($this->assetLoader))->render([
            "tag" => "button"
        ]);
        $settingsButton = (new Ripple($this->assetLoader))->render([
            "children" => $settingsButton
        ]);

        if ($props["links"]) {
            foreach ($props["links"] as $link) {
                $linkHtml = (new SidebarAction($this->assetLoader))->render($link);
                $rippleHtml = (new Ripple($this->assetLoader)->render([
                    "children" => $linkHtml
                ]));

                $links .= $rippleHtml;
            }
        }

        return <<<HTML
            <aside>
                <div class="box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ai ai-Plant"><path d="M11.964 6.97s-3.075.306-4.685-1.035C5.669 4.593 6.036 2.03 6.036 2.03s3.075-.306 4.686 1.035c1.61 1.342 1.242 3.905 1.242 3.905z"/><path d="M12.036 6.97s3.075.306 4.685-1.035c1.61-1.342 1.243-3.905 1.243-3.905s-3.075-.306-4.685 1.035c-1.61 1.342-1.243 3.905-1.243 3.905z"/><path d="M4 11a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-2z"/><path d="M5 14h14l-2 8H7l-2-8z"/></svg>
                </div>
                <div class="box">
                    $links
                </div>
                <div class="box">
                    $settingsButton
                </div>
            </aside>
        HTML;
    }
}