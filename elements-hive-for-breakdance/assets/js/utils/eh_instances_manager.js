;(function () {
	class EhInstancesManager {
		constructor() {
			this.instances = {}
		}

		elementExists(elementName) {
			return this.instances[elementName] ? true : false
		}

		addElement(elementName) {
			if (!this.elementExists(elementName)) {
				this.instances[elementName] = []
			}
		}

		instanceExists = (elementName, instanceId) => {
			if (this.elementExists(elementName)) {
				if (this.instances[elementName][instanceId]) {
					return true
				} else {
					return false
				}
			} else {
				return false
			}
		}

		addInstance(elementName, instanceId, instance) {
			// if (!this.instanceExists(elementName, instanceId)) {
			// 	this.instances[elementName][instanceId] = instance
			// }

			//override if it exists
			this.instances[elementName][instanceId] = instance
		}

		deleteInstance = (elementName, instanceId) => {
			if (this.instanceExists(elementName, instanceId)) {
				delete this.instances[elementName][instanceId]
			}
		}

		registerInstance = (elementName, instanceId, instance) => {
			if (!this.elementExists(elementName)) {
				this.addElement(elementName)
			}

			this.addInstance(elementName, instanceId, instance)
		}

		getInstance = (elementName, instanceId) => {
			return this.instances[elementName][instanceId]
		}
	}

	if (!window.EhInstancesManager) window.EhInstancesManager = new EhInstancesManager()
})()
