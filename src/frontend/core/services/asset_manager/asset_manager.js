export default class AssetManager {
    async load(assets = []) {
        await Promise.all(
            assets.map(({path, mimeType}) => new Promise(resolve => {
                if (mimeType === "text/css") {
                    const exists = !!document.querySelector(`link[href="${path}"]`)
                    if (exists) {
                        resolve()
                        return
                    }

                    const linkElement = document.createElement("link")
                    linkElement.setAttribute("rel", "stylesheet")
                    linkElement.setAttribute("type", mimeType)
                    linkElement.setAttribute("href", path)

                    document.head.appendChild(linkElement)

                    linkElement.addEventListener("load", () => resolve())
                } else if (mimeType === "text/javascript") {
                    const exists = !!document.querySelector(`script[src="${path}"]`)
                    if (exists) {
                        resolve()
                        return
                    }

                    const scriptElement = document.createElement("script")
                    scriptElement.setAttribute("type", "module")
                    scriptElement.setAttribute("src", path)

                    document.head.appendChild(scriptElement)

                    scriptElement.addEventListener("load", () => resolve())
                }
            }))
        )
    }
}