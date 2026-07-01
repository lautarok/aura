<?php
namespace frontend\features\crm\modules\home\components\banner;

use frontend\core\base\Component;
use frontend\shared\html\Div;
use ports\AssetManagerPort;

class Banner extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/modules/home/components/banner/banner.css");

        return $this->component(Div::class, [
            "className" => "banner"
        ]);
    }
}