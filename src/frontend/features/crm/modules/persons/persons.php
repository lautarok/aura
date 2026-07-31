<?php
namespace frontend\features\crm\modules\persons;

use frontend\features\crm\layout\CrmLayout;
use frontend\core\base\Component;
use ports\ContextPort;
use ports\AssetManagerPort;
use frontend\shared\html\H1;
use frontend\shared\card\Card;
use frontend\shared\icons\catalog\Home as HomeIcon;

class Persons extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/modules/persons/persons.css");

        return $this->component(CrmLayout::class, [
            "title" => "Personas",
            "children" => [
                $this->component(H1::class, [
                    "value" => "Hola mundo"
                ])
            ]
        ]);
    }
}