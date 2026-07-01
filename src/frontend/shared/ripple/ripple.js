import Router from "/frontend/core/scripts/router/router.js"
    
Router.get().routerEvents.listenLoadEnd(() => {
    const rippleElementList = document.querySelectorAll(".ripple")

    const pointerDownListeners = new WeakMap()

    const handlePointerDown = (event, element) => requestAnimationFrame(() => {
        if (!element) return

        const rippleContainerElement = element.querySelector(":scope > .ripple-effect-container"),
            elementRect = element.getBoundingClientRect(),
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
    })

    const handlePointerUp = event => {
        const rippleEffectElementList = document.querySelectorAll(".ripple-effect")

        rippleEffectElementList.forEach(element => requestAnimationFrame(() => {
            setTimeout(() => {
                element.classList.add("out")
                setTimeout(() => {
                    element.remove()
                }, 1050)
            }, 205)
        }))
    }

    rippleElementList.forEach(element => {
        const listener = (event) => handlePointerDown(event, element)
        pointerDownListeners.set(element, listener)
        element.addEventListener("pointerdown", listener)
    })

    window.addEventListener("pointerup", handlePointerUp)
    window.addEventListener("dragend", handlePointerUp)

    return () => {
        rippleElementList.forEach(element => {
            const listener = pointerDownListeners.get(element)
            if (!listener) return
            element.removeEventListener("pointerdown", listener)
        })

        window.removeEventListener("pointerup", handlePointerUp)
        window.removeEventListener("dragend", handlePointerUp)
    }
})