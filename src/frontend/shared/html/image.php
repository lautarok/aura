<?php
namespace frontend\shared\html;

use frontend\base\Component;

class Image extends Component {
    public function render(array $props = []): string {
        $src = $props["src"] ?? null;
        $with = $props["width"] ?? null;
        $height = $props["height"] ?? null;
        $alt = $props["alt"] ?? null;

        return <<<HTML
            <img
                src="$src"
                width="$width"
                height="$height"
                alt="$alt"
            />
        HTML;
    }
}