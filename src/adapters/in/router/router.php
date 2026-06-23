<?php
    namespace adapters\in\router;
    
    require_once __DIR__ . "/base/router_group.php";
    use adapters\in\router\base\RouterGroup;

    class Router {
        private array $groupList = [];

        public function registerGroup(RouterGroup $group): void {
            $this->groupList[] = $group;
        }

        public function handleRequest(): void {
            $requestPath = $_SERVER["REQUEST_URI"];

            foreach ($this->groupList as $groupItem) {
                $matchPathPrefix = $groupItem->getPrefix();

                if (!str_ends_with($requestPath, "/")) {
                    $requestPath .= "/";
                }
                
                if (!str_starts_with($requestPath, $matchPathPrefix)) {
                    continue;
                }

                $matchPath = substr($requestPath, strlen($matchPathPrefix), 100);
                $matchHandler = $groupItem->getHandler($matchPath);

                if (!is_null($matchHandler)) {
                    $matchHandler->handle();
                    return;
                }

                if (method_exists($groupItem, "handleNotFound")) {
                    $groupItem->handleNotFound();
                    return;
                }
            }

            echo "Página no encontrada";
        }
    }