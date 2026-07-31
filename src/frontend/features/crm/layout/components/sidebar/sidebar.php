<?php
namespace frontend\features\crm\layout\components\sidebar;

use frontend\core\base\Component;
use ports\AssetManagerPort;
use frontend\features\crm\layout\components\sidebar_action\SidebarAction;
use frontend\shared\html\Aside;
use frontend\shared\html\Div;
use frontend\shared\html\Button;
use frontend\shared\icons\catalog\Plant as PlantIcon;
use frontend\shared\icons\catalog\Home as HomeIcon;
use frontend\shared\icons\catalog\Gear as GearIcon;
use frontend\shared\icons\catalog\PeopleMultiple as PeopleMultipleIcon;
use frontend\shared\icons\catalog\File as FileIcon;
use frontend\shared\icons\catalog\CircleCheck as CircleCheckIcon;
use frontend\shared\dropdown\Dropdown;

class Sidebar extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/crm/layout/components/sidebar/sidebar.css");

        return $this->component(Aside::class, [
            "children" => [
                $this->component(Div::class, [
                    "className" => "box",
                    "children" => [
                        $this->component(PlantIcon::class, [
                            "size" => "26"
                        ])
                    ]
                ]),
                $this->renderLinks($props),
                $this->component(Div::class, [
                    "className" => "box",
                    "children" => [
                        $this->component(Dropdown::class, [
                            "title" => "Preferencias",
                            "menuPosition" => "left-bottom",
                            "action" => $this->component(SidebarAction::class, [
                                "component" => Button::class,
                                "icon" => $this->component(GearIcon::class)
                            ])
                        ])
                    ]
                ])
            ]
        ]);
    }

    private function renderLinks(array $props = []): string {
        return $this->component(Div::class, [
            "className" => "box",
            "children" => [
                $this->component(SidebarAction::class, [
                    "href" => "/crm",
                    "label" => "Inicio",
                    "icon" => $this->component(HomeIcon::class)
                ]),
                $this->component(SidebarAction::class, [
                    "href" => "/crm/persons",
                    "label" => "Personas",
                    "icon" => $this->component(PeopleMultipleIcon::class)
                ]),
                $this->component(SidebarAction::class, [
                    "href" => "/crm/tasks",
                    "label" => "Tareas",
                    "icon" => $this->component(CircleCheckIcon::class)
                ]),
                $this->component(SidebarAction::class, [
                    "href" => "/crm/agreements",
                    "label" => "Contratos",
                    "icon" => $this->component(FileIcon::class)
                ])
            ]
        ]);
    }
}