<?php
namespace frontend\features\auth\modules\login;

use frontend\core\base\Component;
use frontend\features\auth\layout\AuthLayout;
use frontend\features\auth\modules\login\LoginForm;
use frontend\shared\card\Card;

class Login extends Component {
    public function render(array $props = []): string {
        return $this->component(AuthLayout::class, [
            "children" => $this->component(Card::class, [
                "style" => "width: 24em;",
                "children" => $this->component(LoginForm::class)
            ])
        ]);
    }
}