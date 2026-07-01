<?php
namespace adapters\out\asset_manager;

require_once __DIR__ . "/../../../ports/asset_manager.php";
use ports\AssetManagerPort;

class AssetManager implements AssetManagerPort {
    private array $loadedList = [];

    private $mimeTypeMap = [
        "css"   => "text/css",
        "js"    => "text/javascript"
    ];

    private function getMimeType(string $path): string | null {
        $ext = array_last(explode(".", $path));
        return $this->mimeTypeMap[$ext];
    }

    public function load(string $path): self {
        if (in_array($path, $this->loadedList)) {
            return $this;
        }

        $this->loadedList[] = $path;
        
        return $this;
    }

    public function getLoadedList(): array {
        return array_map(function ($srcPath) {
            $mimeType = $this->getMimeType($srcPath);

            return [
                "path" => $srcPath,
                "mime" => $mimeType
            ];
        }, $this->loadedList);
    }

    public function toHtml(): string {
        $outputHtml = "";

        foreach ($this->loadedList as $srcPath) {
            $mimeType = $this->getMimeType($srcPath);
            $outputHtml .= $this->srcToHtml($mimeType, $srcPath);
        }

        return $outputHtml;
    }

    private function srcToHtml($mimeType, $srcPath) {
        if ($mimeType === "text/css") {
            return <<<HTML
                <link
                    rel="stylesheet"
                    type="text/css"
                    href="$srcPath"
                />
            HTML;
        } else if ($mimeType === "text/javascript") {
            return <<<HTML
                <script
                    type="module"
                    src="$srcPath"
                ></script>
            HTML;
        }

        return null;
    }
}