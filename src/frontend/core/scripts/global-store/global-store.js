let instance = null

export default class GlobalStore {
    static get() {
        if (instance) {
            return instance
        }

        instance = new GlobalStore
        return instance
    }
}