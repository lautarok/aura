export default class RouterEvents {
    loadEndListeners = []
    destroyListeners = []

    constructor() {
        window.addEventListener("DOMContentLoaded", () => {
            this.notifyLoadEnd()
        })
    }

    listenLoadEnd(callback) {
        this.loadEndListeners.push(callback)
    }

    notifyLoadEnd() {
        this.loadEndListeners.forEach(listener => {
            const onDestroy = listener()
            if (onDestroy) {
                this.destroyListeners.push(onDestroy)
            }
        })
    }

    listenDestroy(callback) {
        this.destroyListeners.push(callback)
    }

    notifyDestroy() {
        this.destroyListeners.forEach(listener => {
            listener()
        })
        this.destroyListeners.length = 0;
    }
}