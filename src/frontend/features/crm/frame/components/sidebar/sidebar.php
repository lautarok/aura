<?php
namespace frontend\features\crm\frame\components\sidebar;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\features\crm\frame\components\sidebar_action\SidebarAction;
use frontend\shared\html\Aside;
use frontend\shared\html\Div;
use frontend\shared\html\Button;
use frontend\shared\icons\catalog\PlantIcon;
use frontend\shared\icons\catalog\HomeIcon;
use frontend\shared\icons\catalog\GearIcon;
use frontend\shared\icons\catalog\PeopleMultipleIcon;
use frontend\shared\icons\catalog\FileIcon;
use frontend\shared\icons\catalog\CircleCheckIcon;

class Sidebar extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/frame/components/sidebar/sidebar.css");

        return $this->component(Aside::class, [
            "children" => [
                $this->component(Div::class, [
                    "className" => "box",
                    "children" => [
                        $this->component(PlantIcon::class)
                    ]
                ]),
                $this->renderLinks($props),
                $this->component(Div::class, [
                    "className" => "box",
                    "children" => [
                        $this->component(SidebarAction::class, [
                            "component" => Button::class,
                            "icon" => $this->component(GearIcon::class),
                            "label" => "Preferencias"
                        ])
                    ]
                ])
            ]
        ]);
    }

    private function renderLinks(array $props = []): string {
        return $this->component(Div::class, [
            "className" => "box",
            "children" => $this->withContext(function ($component) {
                return [
                    $component(SidebarAction::class, [
                        "href" => "/crm",
                        "label" => "Inicio",
                        "icon" => $component(HomeIcon::class)
                    ]),
                    $component(SidebarAction::class, [
                        "href" => "/crm/persons",
                        "label" => "Personas",
                        "icon" => $component(PeopleMultipleIcon::class)
                    ]),
                    $component(SidebarAction::class, [
                        "href" => "/crm/tasks",
                        "label" => "Tareas",
                        "icon" => $component(CircleCheckIcon::class)
                    ]),
                    $component(SidebarAction::class, [
                        "href" => "/crm/agreements",
                        "label" => "Contratos",
                        "icon" => $component(FileIcon::class)
                    ])
                ];
            }, ["theme:icon:size" => 20])
        ]);
    }
}