import Component from "/frontend/core/base/component.js"
import DomEventManager from "/frontend/core/services/dom_event_manager/dom_event_manager.js"
import Container from "/frontend/core/services/container/container.js"

class Dropdown extends Component {
    domEventManager = Container.service(DomEventManager)

    handleClick(menuElement) {
        menuElement.classList.toggle("dropdown__menu--visible")
    }

    handleClose(menuElement) {
        menuElement.classList.remove("dropdown__menu--visible")
    }

    handleOutsideClick(event, dropdownElement, menuElement) {
        if (dropdownElement.contains(event.target)) {
            return
        }

        menuElement.classList.remove("dropdown__menu--visible")
    }

    mount() {
        document.querySelectorAll("[data-component=dropdown]")
            .forEach(dropdownElement => {
                const actionElement = dropdownElement.querySelector(":scope .dropdown__action"),
                    menuElement = actionElement.nextElementSibling,
                    closeButton = dropdownElement.querySelector(":scope .dropdown__menu__header button")

                this.domEventManager.listen(
                    actionElement,
                    "click",
                    () => this.handleClick(menuElement)
                )
                this.domEventManager.listen(
                    document,
                    "click",
                    event => this.handleOutsideClick(event, dropdownElement, menuElement)
                )
                this.domEventManager.listen(
                    closeButton,
                    "click",
                    () => this.handleClose(menuElement)
                )
            })
    }
}

new Dropdown