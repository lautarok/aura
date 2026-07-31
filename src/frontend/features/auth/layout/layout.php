<?php
namespace frontend\features\auth\layout;

use frontend\core\base\Component;
use frontend\shared\html\Document;
use frontend\shared\html\Header;
use frontend\shared\html\Footer;
use frontend\shared\html\Div;
use frontend\shared\html\H1;
use frontend\shared\html\Span;
use frontend\shared\html\P;
use frontend\shared\button\Link;
use ports\AssetManagerPort;

class AuthLayout extends Component {
    public function render(array $props = []): string {
        $appName = $this->context->stringValue("app:name");
        $appVersion = $this->context->stringValue("app:version");
        $pageTitle = $props["title"] ?? $appName;
        $children = $this->parseChildren($props["children"] ?? null);
        $action = $props["action"] ?? null;

        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/core/styles/variables.css");
        $assetManager->load("/frontend/core/styles/_normalize.css");
        $assetManager->load("/frontend/features/auth/layout/layout.css");

        $children = $this->parseChildren($props["children"] ?? null);

        if (isset($_SERVER["HTTP_X_FRAGMENT"]) && $_SERVER["HTTP_X_FRAGMENT"] === "body") {
            header("Content-Type: application/json");
            return json_encode([
                "title" => $pageTitle,
                "sources" => $assetManager->getLoadedList(),
                "fragment" => $this->component(Body::class, [
                    "children" => $children
                ])
            ]);
        }

        return $this->component(Document::class, [
            "title" => $pageTitle,
            "children" => $this->component(Div::class, [
                "component" => "auth_layout",
                "children" => [
                    $this->component(Div::class, [
                        "className" => "welcome",
                        "children" => [
                            $this->component(H1::class, [
                                "value" => "Hola..."
                            ]),
                            $this->component(P::class, [
                                "value" => "Te damos la bienvenida a " . $this->context->stringValue("app:name")
                            ])
                        ]
                    ]),
                    $this->component(Div::class, [
                        "className" => "content",
                        "children" => [
                            $this->component(Header::class, [
                                "children" => $this->component(Span::class, [
                                    "value" => "Versión $appVersion"
                                ])
                            ]),
                            $this->component(Div::class, [
                                "className" => "center",
                                "children" => $children
                            ]),
                            $this->component(Footer::class, [
                                "children" => $action ? (
                                    $this->component(Link::class, [
                                        "href" => $action["href"],
                                        "value" => $action["value"]
                                    ])
                                ) : (
                                    $this->component(Span::class, [
                                        "value" => $appName
                                    ])
                                )
                            ])
                        ]
                    ])
                ]
            ])
        ]);
    }
}