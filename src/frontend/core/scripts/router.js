class Router {
    constructor() {
        this.initialize()
    }

    initialize() {
        document.querySelectorAll("a").forEach(element => {
            element.addEventListener("click", event => {
                event.preventDefault()
            })
        })
    }
}

new Router