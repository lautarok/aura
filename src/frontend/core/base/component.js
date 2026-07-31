import Container from "/frontend/core/services/container/container.js"
import Router from "/frontend/core/services/router/router.js"
import RouterEvents from "/frontend/core/services/router/router_events.js"

export default class Component {
    router = Container.service(Router)

    constructor() {
        const routerEvents = Container.service(RouterEvents)

        routerEvents.listenLoadEnd(() => {
            this.mount()

            return () => {
                this.unmount()
            }
        })
    }

    mount() {}
    unmount() {}
}