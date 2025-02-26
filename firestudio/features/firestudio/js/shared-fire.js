(function(window) {
    window.firestudio = window.firestudio || {};

    window.firestudio.cookie = {
        /**
         * Returns a cookie value.
         *
         * @param {string} name The name of the cookie
         * @return {string|null}
         */
        get: function getCookie(name) {
            var cookies = document.cookie.split('; ');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                if (cookie.indexOf(name + '=') !== -1) {
                    return cookie.replace(name + '=', '');
                }
            }
            return null;
        },

        /**
         * Sets a cookie value with an expiration.
         *
         * @param {string} name The name of the cookie
         * @param {mixed} value The value of the cookie
         * @param {int} expiration The number of milliseconds until the cookie should expire.
         *                       If no expiration is passed in, it will set the cookie to expire
         *                       in 30 days.
         */
        set: function setCookie(name, value, expiration) {
            var expireMs = expiration || 1000 * 60 * 60 * 24 * 30;
            var now = new Date().getTime();
            var expiresIn = new Date();
            if (expireMs === -1) {
                expiresIn.setTime(-1);
            } else {
                expiresIn.setTime(now + expireMs);
            }
            document.cookie = name + '=' + value + ';expires=' + expiresIn.toGMTString() + ';path=/';
        },

        /**
         * Deletes a cookie.
         *
         * @param {string} name The name of the cookie
         */
        delete: function deleteCookie(name) {
            this.set(name, '', -1);
        },

        /**
         * Returns the cookie value as an object.
         *
         * @param {string} name The name of the cookie
         * @return {object|string}
         */
        getObject: function getObject(name) {
            var value = this.get(name);
            if (value) {
                return JSON.parse(decodeURIComponent(value));
            }
            return null;
        },

        /**
         * Accepts an object as a value and writes it to a cookie as a string value.
         *
         * @param {string} name
         * @param {object} value
         * @param {int} expiration
         */
        setObject(name, value, expiration) {
            var val = encodeURIComponent(JSON.stringify(value));
            this.set(name, val, expiration);
        }
    };

    var readyCallbacks = [];
    window.firestudio.ready = function(fn) {
        readyCallbacks.push(fn);
    }

    document.addEventListener('DOMContentLoaded', function domLoaded() {
        for (var i=0; i < readyCallbacks.length; i++) {
            readyCallbacks[i]();
        }
    });
})(window);