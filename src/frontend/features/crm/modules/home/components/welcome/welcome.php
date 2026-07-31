<?php
namespace frontend\features\crm\modules\home\components\welcome;

use frontend\core\base\Component;
use frontend\shared\html\Div;
use ports\AssetManagerPort;
use frontend\shared\html\H2;
use frontend\shared\html\P;
use frontend\shared\avatar\Avatar;
use frontend\features\crm\modules\home\components\welcome\ActivityList;

class Welcome extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/modules/home/components/welcome/welcome.css");

        $appName = $this->context->stringValue("app:name");

        return $this->component(Div::class, [
            "component" => "welcome",
            "children" => $this->component(Div::class, [
                "className" => "content",
                "children" => [
                    $this->component(Avatar::class, [
                        "letters" => "Au"
                    ]),
                    $this->component(Div::class, [
                        "className" => "text",
                        "children" => [
                            $this->component(H2::class, [
                                "value" => "Hola, Aura."
                            ]),
                            $this->component(P::class, [
                                "value" => "Te damos la bienvenida a $appName."
                            ])
                        ]
                    ])
                ]
            ])
        ]);
    }
}