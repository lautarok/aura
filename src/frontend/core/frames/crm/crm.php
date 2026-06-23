<?php
    namespace frontend\core\frames\crm;

    require_once __DIR__ . "/../../../../ports/asset_loader.php";
    use ports\AssetLoaderPort;

    require_once __DIR__ . "/../../base/component.php";
    use frontend\core\base\Component;

    require_once __DIR__ . "/../../../shared/button/button.php";
    use frontend\shared\button\Button;

    class CrmFrame extends Component {
        private AssetLoaderPort $assetLoader;

        public function __construct(AssetLoaderPort $assetLoader) {
            $this->assetLoader = $assetLoader;
        }

        public function render(array $props = []): string {
            $pageTitle = $props["title"] ?? "Aura CRM";
            $pageContent = $props["content"] ?? null;

            $this->assetLoader->load(__DIR__ . "/crm.css");
            $this->assetLoader->load(__DIR__ . "/../../styles/_normalize.css");
            $assetsHtml = $this->assetLoader->toHtml();

            return <<<HTML
                <!DOCTYPE html>
                <html>
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
                        <aside>
                            <p class="logo">Aura CRM</p>
                            <nav>
                                <button>
                            </nav>
                        </aside>
                        <main>
                            $pageContent
                        </main>
                    </body>
                </html>
            HTML;
        }
    }