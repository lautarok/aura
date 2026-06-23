<?php
    namespace frontend\core\frames\crm;

    require_once __DIR__ . "/../../../../ports/asset_loader.php";
    use ports\AssetLoaderPort;

    require_once __DIR__ . "/../../base/component.php";
    use frontend\core\base\Component;

    require_once __DIR__ . "/../../../shared/button/button.php";
    use frontend\shared\button\Button;

    require_once __DIR__ . "/components/sidebar/sidebar.php";
    use frontend\core\frames\crm\components\sidebar\Sidebar;

    class CrmFrame extends Component {
        private AssetLoaderPort $assetLoader;

        public function __construct(AssetLoaderPort $assetLoader) {
            $this->assetLoader = $assetLoader;
        }

        public function render(array $props = []): string {
            $pageTitle = $props["title"] ?? "Aura CRM";
            $pageContent = $props["content"] ?? null;

            $sidebarHtml = (new Sidebar($this->assetLoader))->render([
                "links" => [
                    [
                        "href"  => "#",
                        "label" => null,
                        "icon"  => null
                    ],
                    [
                        "href"  => "#",
                        "label" => null,
                        "icon"  => null
                    ],
                    [
                        "href"  => "#",
                        "label" => null,
                        "icon"  => null
                    ]
                ]
            ]);

            $this->assetLoader->load(__DIR__ . "/crm.css");
            $this->assetLoader->load(__DIR__ . "/../../styles/_normalize.css");

            $assetsHtml = $this->assetLoader->toHtml();

            return <<<HTML
                <!DOCTYPE html>
                <html lang="es">
                    <head>
                        <meta charset="utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                        <title>$pageTitle</title>
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                        $assetsHtml
                    </head>
                    <body>
                        $sidebarHtml
                        <main>
                            <p>Aura CRM</p>
                            $pageContent
                        </main>
                    </body>
                </html>
            HTML;
        }
    }