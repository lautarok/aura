class Router {
    constructor() {
        this.initialize()
    }

    initialize() {
        window.addEventListener("navigate", event => {
            event.preventDefault()
        })
    }
}