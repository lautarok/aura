<?php
namespace adapters\in\router;

use adapters\in\router\base\Handler;
use frontend\core\base\Component;

class Router {
    private array $groupList = []; 

    public function registerGroup(string $path, string $routerGroup, array $params = []): void {
        $this->groupList[$path] = [
            "class" => $routerGroup,
            "params" => $params
        ];
    }

    public function handleRequest(): void {
        $requestPath = $_SERVER["REQUEST_URI"];
        $requestPath = parse_url($requestPath, PHP_URL_PATH);

        if (
            str_ends_with($requestPath, ".js")
            || str_ends_with($requestPath, ".css")
            || str_ends_with($requestPath, ".webp")
            || str_ends_with($requestPath, ".jpg")
        ) {
            if (str_ends_with($requestPath, ".js")) {
                header("Content-Type: text/javascript");
            } else if (str_ends_with($requestPath, ".css")) {
                header("Content-Type: text/css");
            } else if (str_ends_with($requestPath, ".webp")) {
                header("Content-Type: image/webp");
            } else if (str_ends_with($requestPath, ".jpg")) {
                header("Content-Type: image/jpg");
            }

            $filePath = __DIR__ . "/../../.." . $requestPath;

            if (file_exists($filePath)) {
                echo file_get_contents($filePath);
                return;
            }

            http_response_code(404);
            echo "Not found file: $requestPath";
            
            return;
        }

        uksort($this->groupList, function($a, $b) {
            return strlen($a) < strlen($b);
        });

        foreach ($this->groupList as $prefix => $groupItem) {
            if (!str_ends_with($requestPath, "/")) {
                $requestPath .= "/";
            }
            
            if (!str_starts_with($requestPath, $prefix)) {
                continue;
            }

            $matchPath = substr($requestPath, strlen($prefix), 100);
            if (str_ends_with($matchPath, "/") && strlen($matchPath) > 1) {
                $matchPath = substr($matchPath, 0, strlen($matchPath) - 1);
            } else if (strlen($matchPath) === 0) {
                $matchPath = "/";
            }

            $groupItem = new $groupItem["class"](...$groupItem["params"]);
            $matchHandler = $groupItem->getHandler($matchPath);

            if (!is_null($matchHandler)) {
                $matchHandler = new $matchHandler["class"](...$matchHandler["params"]);

                if ($matchHandler instanceof Handler) {
                    $matchHandler->handle();
                } else if ($matchHandler instanceof Component) {
                    $response = $matchHandler->render();
                    echo $response;
                    return;
                }

                return;
            }

            $groupItem->handleNotFound();
            return;
        }

        echo "Página no encontrada";
    }
} 