<?php
namespace frontend\shared\button;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\shared\html\Link as HtmlLink;
use frontend\shared\html\Span;

class Link extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/shared/button/button.css");

        $value = $props["value"] ?? null;
        $href = $props["href"] ?? null;

        return $this->component(HtmlLink::class, [
            "component" => "button",
            "href" => $href,
            "children" => $this->component(Span::class, [
                "value" => $value
            ])
        ]);
    }
}