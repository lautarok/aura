<?php
namespace frontend\shared\icons\base;

use frontend\core\base\Component;

abstract class Icon extends Component {
    private function getSize(array $props = []): int {
        $prop = $props["size"] ?? null;
        if (!is_null($prop)) {
            return $prop;
        }

        $context = $this->context->intValue("theme:icon:size");
        if (!is_null($context)) {
            return $context;
        }

        return 24;
    }

    public function render(array $props = []): string {
        $size = $this->getSize($props);
        $path = $this->path($props);

        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="$size" height="$size" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                $path
            </svg>
        HTML;
    }

    abstract protected function path(array $props = []): string;
}