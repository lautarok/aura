<?php
    namespace frontend\core\frames\crm;

    use ports\AssetLoaderPort;
    use frontend\core\base\Component;
    use frontend\shared\button\Button;
    use frontend\core\frames\crm\components\sidebar\Sidebar;
    use frontend\core\frames\crm\components\header\Header;

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
            $this->assetLoader->load(__DIR__ . "/../../scripts/router.js");

            $headerHtml = (new Header($this->assetLoader))->render();

            $sidebarHtml = (new Sidebar($this->assetLoader))->render([
                "links" => [
                    [
                        "href"  => "/crm",
                        "label" => "Inicio",
                        "icon"  => <<<HTML
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ai ai-HomeAlt1"><path d="M21 19v-6.733a4 4 0 0 0-1.245-2.9L13.378 3.31a2 2 0 0 0-2.755 0L4.245 9.367A4 4 0 0 0 3 12.267V19a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2z"/><path d="M9 15a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6H9v-6z"/></svg>
                        HTML
                    ],
                    [
                        "href"  => "/crm/peoples",
                        "label" => "Personas",
                        "icon"  => <<<HTML
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ai ai-PeopleMultiple"><circle cx="7" cy="6" r="3"/><path d="M10 13H5.818a3 3 0 0 0-2.964 2.537L2.36 18.69A2 2 0 0 0 4.337 21H9"/><path d="M21.64 18.691l-.494-3.154A3 3 0 0 0 18.182 13h-2.364a3 3 0 0 0-2.964 2.537l-.493 3.154A2 2 0 0 0 14.337 21h5.326a2 2 0 0 0 1.976-2.309z"/><circle cx="17" cy="6" r="3"/></svg>
                        HTML
                    ],
                    [
                        "href"  => "/crm/contracts",
                        "label" => "Contratos",
                        "icon"  => <<<HTML
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ai ai-File"><path d="M4 4v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.342a2 2 0 0 0-.602-1.43l-4.44-4.342A2 2 0 0 0 13.56 2H6a2 2 0 0 0-2 2z"/><path d="M9 13h6"/><path d="M9 17h3"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/></svg>
                        HTML
                    ]
                ]
            ]);

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
                            $headerHtml
                            $pageContent
                        </main>
                    </body>
                </html>
            HTML;
        }
    }