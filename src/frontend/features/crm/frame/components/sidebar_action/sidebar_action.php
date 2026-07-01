<?php
namespace frontend\features\crm\frame\components\sidebar_action;

use frontend\core\base\Component;
use frontend\shared\html\Link;
use frontend\shared\ripple\Ripple;
use frontend\shared\html\Span;
use ports\AssetManagerPort;

class SidebarAction extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/frame/components/sidebar_action/sidebar_action.css");

        $icon = $this->parseChildren($props["icon"]);
        $component = $props["component"] ?? Link::class;
        $href = $props["href"] ?? null;
        $label = $props["label"] ?? "Sección";
        
        return $this->component(Ripple::class, [
            "borderRadius" => ".8em",
            "children" => $this->component($component, [
                "href" => $href,
                "className" => "sidebar-link",
                "children" => [
                    $icon,
                    $this->component(Span::class, [
                        "className" => "tooltip",
                        "value" => $label
                    ])
                ]
            ])
        ]);
    }
}