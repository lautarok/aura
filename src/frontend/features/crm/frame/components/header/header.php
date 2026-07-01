<?php
namespace frontend\features\crm\frame\components\header;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\features\crm\frame\components\user_card\UserCard;
use frontend\shared\html\Header as HtmlHeader;
use frontend\shared\html\Nav;
use frontend\shared\html\Div;
use frontend\shared\html\P;

class Header extends Component {
    public function render($props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/frame/components/header/header.css");

        return $this->component(HtmlHeader::class, [
            "children" => [
                $this->component(Div::class, [
                    "className" => "text",
                    "children" => [
                        $this->component(P::class, [
                            "value" => $this->context->stringValue("app:name")
                        ]),
                        $this->component(P::class, [
                            "value" => "Versión " . $this->context->stringValue("app:version")
                        ])
                    ]
                ]),
                $this->component(Nav::class, [
                    "children" => $this->component(UserCard::class)
                ])
            ]
        ]);
    }
}