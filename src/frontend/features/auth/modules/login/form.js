import Component from "/frontend/core/base/component.js"
import DomEventManager from "/frontend/core/services/dom_event_manager/dom_event_manager.js"
import Router from "/frontend/core/services/router/router.js"
import Container from "/frontend/core/services/container/container.js"

class LoginForm extends Component {
    domEventManager = Container.service(DomEventManager)
    router = Container.service(Router)

    mount() {
        const formElement = document.querySelector("[data-component=\"login_form\"]")

        this.domEventManager.listen(formElement, "submit", (event) => {
            this.router.navigate("/crm")
        })
    }
}

new LoginForm