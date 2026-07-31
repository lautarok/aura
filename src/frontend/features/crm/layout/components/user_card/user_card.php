<?php
namespace frontend\features\crm\layout\components\user_card;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\shared\ripple\Ripple;
use frontend\shared\avatar\Avatar;
use frontend\shared\html\Div;
use frontend\shared\html\Button;
use frontend\shared\html\P;
use frontend\shared\dropdown\Dropdown;

class UserCard extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/layout/components/user_card/user_card.css");

        return $this->component(Dropdown::class, [
            "title" => "Mi cuenta",
            "menuWidth" => "20em",
            "action" => $this->component(Div::class, [
                "className" => "user-card",
                "children" => $this->component(Ripple::class, [
                    "borderRadius" => "1000px",
                    "children" => $this->component(Button::class, [
                        "children" => [
                            $this->component(Div::class, [
                                "children" => [
                                    $this->component(P::class, [
                                        "value" => "Aura Admin"
                                    ]),
                                    $this->component(P::class, [
                                        "value" => "@imaura"
                                    ])
                                ]
                            ]),
                            $this->component(Avatar::class, [
                                "letters" => "Aura Admin"
                            ])
                        ]
                    ])
                ])
            ])
        ]);
    }
}