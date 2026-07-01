<?php
namespace frontend\core\frames\crm\components\sidebar_action;

use frontend\core\base\Component;
use ports\AssetLoaderPort;

class SidebarAction extends Component {
    private AssetLoaderPort $assetLoader;

    public function __construct(AssetLoaderPort $assetLoader) {
        $this->assetLoader = $assetLoader;
    }

    public function render(array $props = []): string {
        $label = $props["label"] ?? "Sección";
        $tag = $props["tag"] ?? "a";
        $href = $props["href"] ?? null;
        $onClick = $props["onClick"] ?? null;
        $icon = $props["icon"] ?? <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ai ai-Planet"><circle cx="12" cy="12" r="8"/><path d="M8.399 4.849C5.372 2.582 2.972 1.489 2.23 2.23c-1.174 1.174 2.248 6.5 7.643 11.895 5.396 5.395 10.722 8.817 11.895 7.643.431-.43.243-1.421-.435-2.769"/></svg>
        HTML;

        $this->assetLoader->load(__DIR__ . "/sidebar_action.css");
        
        return <<<HTML
            <$tag
                class="sidebar-link"
                onClick="$onClick"
                href="$href"
            >
                $icon
                <span class="tooltip">$label</span>
            </$tag>
        HTML;
    }
}