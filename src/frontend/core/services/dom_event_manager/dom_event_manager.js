import Container from "/frontend/core/services/container/container.js"
import RouterEvents from "/frontend/core/services/router/router_events.js"

export default class DomEventManager {
    listeners = new Map()
    routerEvents = Container.service(RouterEvents)

    constructor() {
        this.initialize()
    }

    listen(element, eventName, handler) {
        if (!element) return
        element.addEventListener(eventName, handler)
        this.listeners.set(element, {eventName, handler})
    }

    initialize() {
        this.routerEvents.listenDestroy(() => {
            this.listeners.forEach(({eventName, handler}, element) => {
                element?.removeEventListener(eventName, handler)
            })
            this.listeners.clear()
        })
    }
}