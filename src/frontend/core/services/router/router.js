import Container from "/frontend/core/services/container/container.js"
import RouterEvents from "/frontend/core/services/router/router_events.js"
import DomEventManager from "/frontend/core/services/dom_event_manager/dom_event_manager.js"
import AssetManager from "/frontend/core/services/asset_manager/asset_manager.js"

export default class Router {
    events = Container.service(RouterEvents)
    domEventManager = Container.service(DomEventManager)
    assetManager = Container.service(AssetManager)

    constructor() {
        this.initialize()
    }
    
    initialize() {
        this.handleAnchorEvent()
    }

    handleAnchorEvent() {
        this.events.listenLoadEnd(() => {
            const clickListeners = new WeakMap()

            const anchorElementList = document.querySelectorAll("a[href]")

            anchorElementList.forEach(anchorElement => {
                const listener = this.handleAnchorClick
                this.domEventManager.listen(
                    anchorElement,
                    "click",
                    listener.bind(this)
                )
            })
        })
    }

    handleAnchorClick(event) {
        event.preventDefault()

        const fragmentUrl = event.currentTarget.getAttribute("href")
        this.navigate(fragmentUrl, true)        
    }

    async navigate(url, partial = false) {
        window.history.pushState({}, "", url)

        this.fetchFragment(url, partial).then(async response => {
            const outletElement = partial ? document.querySelector("[data-router=outlet]")
                : document.body
        
            await this.assetManager.load(response.sources)
            this.events.notifyDestroy()
            outletElement.innerHTML = response.fragment
            document.title = response.title
            this.events.notifyLoadEnd()
        })
    }

    async fetchFragment(url, partial = true) {
        if (this.abortController) {
            this.abortController.abort()
        }

        this.abortController = new AbortController

        return await fetch(url, {
            method: "GET",
            signal: this.abortController.signal,
            headers: {
                "X-Fragment": partial || "body"
            }
        }).then(response => {
            this.abortController = undefined
            return response.json()
        })
    }
}