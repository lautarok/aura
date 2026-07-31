<?php
namespace frontend\shared\dropdown\dropdown_menu;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\shared\card\Card;
use frontend\shared\html\Span;
use frontend\shared\html\Div;
use frontend\shared\icons\catalog\Cross as CrossIcon;
use frontend\shared\button\IconButton;

class DropdownMenu extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/shared/dropdown/dropdown_menu/dropdown_menu.css");

        $children = $this->parseChildren($props["children"] ?? null);
        $title = $props["title"] ?? null;
        $position = $props["position"] ?? "top-right";
        $width = $props["width"] ?? "auto";
        $height = $props["height"] ?? "auto";

        return $this->component(Card::class, [
            "component" => "dropdown_menu",
            "className" => "dropdown__menu--$position",
            "style" => "width: $width; height: $height;",
            "children" => [
                $title ? $this->component(Div::class, [
                    "className" => "dropdown__menu__header",
                    "children" => [
                        $this->component(Span::class, [
                            "className" => "dropdown__menu__header__title",
                            "value" => $title
                        ]),
                        $this->Component(IconButton::class, [
                            "children" => $this->component(CrossIcon::class)
                        ])
                    ]
                ]) : null,
                $children
            ]
        ]);
    }
}