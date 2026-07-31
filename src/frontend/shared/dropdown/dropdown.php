<?php
namespace frontend\shared\dropdown;

use frontend\core\base\Component;
use frontend\shared\html\Div;
use ports\AssetManagerPort;
use frontend\shared\dropdown\dropdown_menu\DropdownMenu;

class Dropdown extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/shared/dropdown/dropdown.css");
        $assetManager->load("/frontend/shared/dropdown/dropdown.js");

        $action = $this->parseChildren($props["action"] ?? null);
        $content = $this->parseChildren($props["content"] ?? null);
        $title = $props["title"] ?? null;

        $menuPosition = $props["menuPosition"] ?? null;
        $menuWidth = $props["menuWidth"] ?? null;
        $menuHeight = $props["menuHeight"] ?? null;

        return $this->component(Div::class, [
            "component" => "dropdown",
            "children" => [
                $this->component(Div::class, [
                    "className" => "dropdown__action",
                    "children" => $action
                ]),
                $this->component(DropdownMenu::class, [
                    "title" => $title,
                    "position" => $menuPosition,
                    "width" => $menuWidth,
                    "height" => $menuHeight,
                    "children" => $content
                ])
            ]
        ]);
    }
}