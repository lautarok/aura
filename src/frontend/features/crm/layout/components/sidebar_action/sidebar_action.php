<?php
namespace frontend\features\crm\layout\components\sidebar_action;

use frontend\core\base\Component;
use frontend\shared\html\Link;
use frontend\shared\ripple\Ripple;
use frontend\shared\html\Span;
use frontend\shared\html\Div;
use ports\AssetManagerPort;

class SidebarAction extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/layout/components/sidebar_action/sidebar_action.css");

        $icon = $this->parseChildren($props["icon"]);
        $component = $props["component"] ?? Link::class;
        $href = $props["href"] ?? null;
        $label = $props["label"] ?? null;
        
        return $this->component(Ripple::class, [
            "borderRadius" => ".8em",
            "children" => $this->component(Div::class, [
                "className" => "sidebar_link",
                "children" => [
                    $this->component($component, [
                        "href" => $href,
                        "children" => $icon
                    ]),
                    $label ? (
                        $this->component(Span::class, [
                            "className" => "sidebar_link__tooltip",
                            "value" => $label
                        ])
                    ) : null
                ]
            ])
        ]);
    }
}