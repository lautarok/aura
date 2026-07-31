<?php
namespace frontend\shared\input;

use frontend\core\base\Component;
use frontend\shared\html\Div;
use frontend\shared\html\Label;
use frontend\shared\html\P;
use frontend\shared\html\Input as HtmlInput;
use ports\AssetManagerPort;

class Input extends Component {
    public function render(array $props = []): string {
        $label = $props["label"] ?? null;
        $autocomplete = $props["autocomplete"] ?? false;
        $prefix = $this->parseChildren($props["prefix"] ?? null);
        $suffix = $this->parseChildren($props["suffix"] ?? null);
        $type = $props["type"] ?? null;

        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/shared/input/input.css");

        return $this->component(Label::class, [
            "component" => "input",
            "children" => [
                $label ? (
                    $this->component(P::class, [
                        "value" => $label
                    ])
                ) : null,
                $this->component(Div::class, [
                    "className" => "box",
                    "children" => [
                        $prefix ? (
                            $this->component(Div::class, [
                                "className" => "prefix",
                                "children" => $prefix
                            ])
                        ) : null,
                        $this->component(HtmlInput::class, [
                            "autocomplete" => $autocomplete ? "on" : "off",
                            "type" => $type
                        ]),
                        $suffix ? (
                            $this->component(Div::class, [
                                "className" => "suffix",
                                "children" => $suffix
                            ])
                        ) : null
                    ]
                ])
            ]
        ]);
    }
}