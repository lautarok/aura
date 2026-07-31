<?php
namespace frontend\features\auth\modules\login;

use frontend\core\base\Component;
use frontend\shared\html\Form;
use frontend\shared\input\Input;
use frontend\shared\button\Button;
use frontend\shared\html\H2;
use frontend\shared\html\P;
use frontend\shared\html\Div;
use frontend\shared\icons\catalog\Mention as MentionIcon;
use frontend\shared\icons\catalog\Key as KeyIcon;
use ports\AssetManagerPort;

class LoginForm extends Component {
    public function render(array $props = []): string {
        $assetManager = $this->context->adapter(AssetManagerPort::class);
        $assetManager->load("/frontend/features/auth/modules/login/form.css");
        $assetManager->load("/frontend/features/auth/modules/login/form.js");

        return $this->component(Form::class, [
            "component" => "login_form",
            "children" => [
                $this->component(Div::class, [
                    "className" => "text_container",
                    "children" => [
                        $this->component(H2::class, [
                            "value" => "Iniciar sesión"
                        ]),
                        $this->component(P::class, [
                            "value" => "Ingresa tus credenciales para continuar"
                        ])
                    ]
                ]),
                $this->component(Div::class, [
                    "className" => "fields",
                    "children" => [
                        $this->component(Input::class, [
                            "label" => "Correo electrónico",
                            "type" => "email",
                            "prefix" => $this->component(MentionIcon::class)
                        ]),
                        $this->component(Input::class, [
                            "label" => "Contraseña",
                            "type" => "password",
                            "prefix" => $this->component(KeyIcon::class)
                        ]),
                    ]
                ]),
                $this->component(Button::class, [
                    "value" => "Ingresar"
                ])
            ]
        ]);
    }
}