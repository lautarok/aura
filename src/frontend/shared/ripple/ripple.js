const rippleElementList = document.querySelectorAll(".ripple")

rippleElementList.forEach(element => {
    const rippleContainerElement = element.querySelector(":scope > .ripple-effect-container")

    element.addEventListener("pointerdown", event => requestAnimationFrame(() => {
        const elementRect = element.getBoundingClientRect(),
            elementTop = elementRect.top,
            elementLeft = elementRect.left,
            elementSize = Math.max(elementRect.width, elementRect.height) * 2.5,
            mouseY = event.pageY,
            mouseX = event.pageX

        const rippleEffectElement = document.createElement("div")
        rippleEffectElement.classList.add("ripple-effect")

        rippleEffectElement.style.setProperty("top", `${(mouseY - elementTop) - (elementSize / 2)}px` )
        rippleEffectElement.style.setProperty("left", `${(mouseX - elementLeft) - (elementSize / 2)}px` )

        rippleEffectElement.style.setProperty("width", `${elementSize}px` )
        rippleEffectElement.style.setProperty("height", `${elementSize}px` )

        rippleContainerElement.appendChild(rippleEffectElement)
    }))
})

window.addEventListener("pointerup", () => {
    const rippleEffectElementList = document.querySelectorAll(".ripple-effect")

    rippleEffectElementList.forEach(element => requestAnimationFrame(() => {
        setTimeout(() => {
            element.classList.add("out")
            setTimeout(() => {
                element.remove()
            }, 1050)
        }, 205)
    }))
})