class Container {
    #services = new WeakMap()

    service(service) {
        let matchService = this.#services.get(service)

        if (!matchService) {
            matchService = new service
            this.#services.set(service, matchService)
        }

        return matchService
    }
}

export default new Container()