import Component from "/frontend/core/base/component.js"
import DomEventManager from "/frontend/core/services/dom_event_manager/dom_event_manager.js"
import Container from "/frontend/core/services/container/container.js"

class Ripple extends Component {
    domEventManager = Container.service(DomEventManager)

    handlePointerDown(event) {
        const target = event.currentTarget

        return requestAnimationFrame(() => {
            if (!target) return

            const effectContainerElement = target
                .querySelector(":scope .effect_container")

            const elementRect = target.getBoundingClientRect(),
                elementTop = elementRect.top,
                elementLeft = elementRect.left,
                elementSize = Math.max(elementRect.width, elementRect.height) * 2.5,
                mouseY = event.pageY,
                mouseX = event.pageX

            const effectElement = document.createElement("div")
                effectElement.classList.add("effect_container__effect")

                effectElement.style
                    .setProperty("top", `${(mouseY - elementTop) - (elementSize / 2)}px` )
                effectElement.style
                    .setProperty("left", `${(mouseX - elementLeft) - (elementSize / 2)}px` )
                effectElement.style
                    .setProperty("width", `${elementSize}px` )
                effectElement.style
                    .setProperty("height", `${elementSize}px` )

                effectContainerElement.appendChild(effectElement)
        })
    }

    handleCancel(event) {
        document.querySelectorAll("[data-component=ripple] .effect_container__effect")
            .forEach(element => requestAnimationFrame(() => {
                setTimeout(() => {
                    element.classList.add("effect_container__effect--out")
                    setTimeout(() => {
                        element.remove()
                    }, 1050)
                }, 25)
            }))
    }

    mount() {
        document.querySelectorAll("[data-component=ripple]")
            .forEach(rippleElement => {
                this.domEventManager.listen(
                    rippleElement,
                    "pointerdown",
                    this.handlePointerDown.bind(this)
                )
            })

        this.domEventManager.listen(window, "pointerup", this.handleCancel.bind(this))
        this.domEventManager.listen(window, "dragend", this.handleCancel.bind(this))
    }
}

new Ripple