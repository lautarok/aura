import RouterEvents from "/frontend/core/scripts/router/router-events.js"

let instance = null

export default class Router {
    constructor() {
        this.routerEvents = new RouterEvents()
        this.initialize()
    }

    static get() {
        if (instance) {
            return instance
        }

        instance = new Router
        return instance
    }

    initialize() {
        this.handleAnchorEvent()
    }

    handleAnchorEvent() {
        let anchorElementList;

        this.routerEvents.listenLoadEnd(() => {
            const clickListeners = new WeakMap()

            anchorElementList = document.querySelectorAll("a[href]")

            anchorElementList.forEach(anchorElement => {
                const listener = this.handleAnchorClick.bind(this)
                clickListeners.set(anchorElement, listener)
                anchorElement.addEventListener("click", listener)
            })

            return () => {
                anchorElementList.forEach(anchorElement => {
                    const listener = clickListeners.get(anchorElement)
                    anchorElement.removeEventListener("click", listener)
                })
            }
        })
    }

    handleAnchorClick(event) {
        event.preventDefault()

        const fragmentUrl = event.currentTarget.getAttribute("href")
        if (
            fragmentUrl.replace(/\/$/g, "") === window.location.pathname.replace(/\/$/g, "")
        ) {
            return
        }

        const outletElement = document.querySelector("[data-router=outlet]")

        this.fetchFragment(
            fragmentUrl
        ).then(response => {
            this.routerEvents.notifyDestroy()
            window.history.pushState({}, "", fragmentUrl)

            outletElement.innerHTML = response.fragment

            response.sources.
                filter(src => document.head.querySelector(`:scope > link[href="${src.path}"], :scope > script[src="${src.path}"]`) === null).
                forEach(src => {
                    const path = src.path,
                        mimeType = src.mime

                    if (mimeType === "text/javascript") {
                        const scriptElement = document.createElement("script")
                        scriptElement.type = "module"
                        scriptElement.src = path

                        document.head.appendChild(scriptElement)
                    } else if (mimeType === "text/css") {
                        const linkElement = document.createElement("link")
                        linkElement.rel = "stylesheet"
                        linkElement.type = "text/css"
                        linkElement.href = path

                        document.head.appendChild(linkElement)
                    }
                })

            document.title = response.title
            this.routerEvents.notifyLoadEnd()
        })
    }

    async fetchFragment(url) {
        return await fetch(url, {
            method: "GET",
            headers: {
                "X-Fragment": true
            }
        }).then(response => response.json())
    }
}