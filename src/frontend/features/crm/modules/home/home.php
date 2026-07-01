<?php
namespace frontend\features\crm\modules\home;

use frontend\features\crm\frame\CrmFrame;
use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\shared\html\H1;
use frontend\features\crm\modules\home\components\banner\Banner;
use frontend\shared\html\Div;
use frontend\shared\card\Card;

class Home extends Component {
    public function getPath(): string {
        return "/";
    }

    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/modules/home/home.css");

        return $this->component(CrmFrame::class, [
            "title" => "Inicio",
            "children" => $this->component(Div::class, [
                "className" => "home-layout",
                "children" => [
                    $this->component(Banner::class),
                    $this->component(Div::class, [
                        "className" => "cards",
                        "children" => [
                            $this->component(Card::class),
                            $this->component(Card::class),
                            $this->component(Card::class),
                            $this->component(Card::class)
                        ]
                    ])
                ]
            ])
        ]);
    }
}