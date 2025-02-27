(function (scope, origin, clientId, authRedirect) {
    var popup = null;
    var timeoutRef = null;
    var loginCallback = noop();

    function noop() {}
    function isFunc (variable) {
        return typeof variable === 'function'
    }
    function createPopup () {
        var width = 500;
        var height = 650;
        var y = window.top.outerHeight / 2 + window.top.screenY - ( height / 2);
        var x = window.top.outerWidth / 2 + window.top.screenX - ( width / 2);

        var url = new URL(origin)
        url.searchParams.set('client_id', clientId)
        url.searchParams.set('utm_source', 'wordpress.org')
        url.searchParams.set('response_type', 'token')
        url.searchParams.set('expires_in', '3600')
        url.searchParams.set('redirect_uri', authRedirect)

        popup = window.open(
            url.toString(),
            'ChatBot',
            ['resizable=no', 'width='+width, 'height='+height, 'top='+y, 'left='+x].join(','));

        window.addEventListener('message', onMessage);
        recursivePopupCheck();
    }
    function destroyPopup () {
        if (popup && typeof isFunc(popup.close)) {
            popup.close();
        }

        popup = null;
        window.removeEventListener('message', onMessage);
        clearTimeout(timeoutRef);
    }
    function recursivePopupCheck () {
        if (!popup || popup.closed || !popup.window) {
            destroyPopup();
            return loginCallback();
        }

        timeoutRef = setTimeout(recursivePopupCheck, 100);
    }
    function onMessage (event) {
        var access_token =
            event &&
            event.data &&
            event.data.access_token

        if (!access_token) {
            return
        }

        loginCallback({ access_token: access_token })
        destroyPopup();
    }
    function login (callback) {
        if (!isFunc(callback)) {
            return;
        }

        if (popup && typeof isFunc(popup.focus)) {
            return popup.focus();
        }

        loginCallback = callback;
        createPopup();
    }

    scope.login = login;
})(
    window.loginSDK = {},
    window.wpSdkConfig.origin,
    window.wpSdkConfig.clientId,
    window.wpSdkConfig.authRedirect,
);
