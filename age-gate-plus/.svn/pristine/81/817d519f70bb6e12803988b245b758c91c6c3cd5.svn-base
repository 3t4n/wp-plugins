window.getLocalData = function () {
    return JSON.parse(localStorage.getItem('age-gator'))
}

window.setLocalData = function (data) {
    localStorage.setItem('age-gator', JSON.stringify(data))
}

window.timestampIsExpired = function (timestamp, days) {
    let now = Date.now()
    let expirationTime = days * 24 * 60 * 60 * 1000
    let timePassed = now - timestamp
    let hasExpired = timePassed > expirationTime

    return hasExpired
}

window.deepClone = function (original) {
    return JSON.parse(JSON.stringify(original))
}

/**
 * Function to map over an object.
 * @param {*} obj An object to map over
 * @param {*} callback
 */
window.objectMap = function (original, callback) {
    let obj = window.deepClone(original)
    for (let key in obj) {
      obj[key] = callback(key, obj[key])
    }
    return obj
}  