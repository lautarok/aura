<?php
namespace adapters\in\router;

use adapters\in\router\base\RouterGroup;
use adapters\in\router\base\Handler;
use frontend\core\base\Component;

class Router {
    private array $groupList = []; 

    public function registerGroup(RouterGroup $group): void {
        $this->groupList[] = $group;
    }

    public function handleRequest(): void {
        $requestPath = $_SERVER["REQUEST_URI"];
        $requestPath = parse_url($requestPath, PHP_URL_PATH);

        if (str_ends_with($requestPath, ".js") || str_ends_with($requestPath, ".css")) {
            if (str_ends_with($requestPath, ".js")) {
                header("Content-Type: text/javascript");
            } else {
                header("Content-Type: text/css");
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

        usort($this->groupList, function($a, $b) {
            return strlen($a->getPrefix()) < strlen($b->getPrefix());
        });

        foreach ($this->groupList as $groupItem) {
            $matchPathPrefix = $groupItem->getPrefix();

            if (!str_ends_with($requestPath, "/")) {
                $requestPath .= "/";
            }
            
            if (!str_starts_with($requestPath, $matchPathPrefix)) {
                continue;
            }

            $matchPath = substr($requestPath, strlen($matchPathPrefix), 100);
            if (strlen($matchPath) > 0 && !str_starts_with($matchPath, "/")) {
                var_dump($matchPath);die;
                continue;
            } if (!str_ends_with($matchPath, "/")) {
                $matchPath .= "/";
            }

            $matchHandler = $groupItem->getHandler($matchPath);

            if (!is_null($matchHandler)) {
                if ($matchHandler instanceof Handler) {
                    $matchHandler->handle();
                } else if ($matchHandler instanceof Component) {
                    echo $matchHandler->render();
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