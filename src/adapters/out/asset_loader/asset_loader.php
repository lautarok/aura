<?php
namespace adapters\out\asset_loader;

require_once __DIR__ . "/../../../ports/asset_loader.php";
use ports\AssetLoaderPort;

class AssetLoader implements AssetLoaderPort {
    protected array $loadedList = [];

    private $mimeTypeMap = [
        "css"   => "text/css",
        "js"    => "text/javascript"
    ];

    protected function getMimeType(string $path): string | null {
        $ext = array_last(explode(".", $path));
        return $this->mimeTypeMap[$ext];
    }

    protected function toBase64(string $path): string {
        if (!file_exists($path)) {
            throw new \Exception("No existe el asset \"$path\"");
        }

        $mimeType = $this->getMimeType($path);

        $contents = file_get_contents($path);
        $base64Data = base64_encode($contents);

        return "data:" . $mimeType . ";base64," . $base64Data;
    }

    public function load(string $path): void {
        if (in_array($path, $this->loadedList)) {
            return;
        }

        $this->loadedList[] = $path;
    }

    public function toHtml(): string {
        $outputHtml = "";

        foreach ($this->loadedList as $assetPath) {
            $mimeType = $this->getMimeType($assetPath);
            $assetBlob = $this->toBase64($assetPath);

            if ($mimeType === "text/css") {
                $outputHtml .= <<<HTML
                    <link
                        rel="stylesheet"
                        type="text/css"
                        href="$assetBlob"
                    />
                HTML;
            } else if ($mimeType === "text/javascript") {
                $outputHtml .= <<<HTML
                    <script
                        type="module"
                        src="$assetBlob"
                    ></script>
                HTML;
            }
        }

        return $outputHtml;
    }
}