<?php
namespace frontend\shared\html;

use frontend\core\base\Component;
use ports\AssetManagerPort;

class Document extends Component {
    public function render(array $props = []): string {
        $title = $props["title"] ?? $this->getDefaultTitle();
        $children = $this->parseChildren($props["children"] ?? null);

        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $sourcesHtml = $assetManager->toHtml();

        $body = $this->component(Body::class, [
            "children" => $children
        ]);

        return <<<HTML
            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <title>$title</title>
                    $sourcesHtml
                </head>
                $body
            </html>
        HTML;
    }

    private function getDefaultTitle(): string {
        $appName = $this->context->stringValue("app:name");
        $appVersion = $this->context->stringValue("app:version");

        return "$appName - $appVersion";
    }
}