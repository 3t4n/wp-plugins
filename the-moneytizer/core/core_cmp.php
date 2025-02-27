<?php
/*
Function to setup auto CMP
*/
function themoneytizer_auto_cmp($internal_action = null) {
    if(!$internal_action){

        if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'auto_cmp') ) {
            return;
        }

        if(!current_user_can( 'manage_options' )){
            return 0;
        }

    }

    $response = new stdClass();
    $response->status = 'error';
    if($_POST['value'] =='auto'||$internal_action == 'auto'){
        $response_cmp = get_req('https://www.themoneytizer.com/cmp.php?code=1');
        if (is_array($response_cmp)) {
            $body = $response_cmp['body'];
            $plugin_name = get_plugin_data( __DIR__."/../themoneytizer.php")['TextDomain'];
            if(!$plugin_name){
                $plugin_name = "the-moneytizer";
            }
            $fp = fopen('../wp-content/plugins/'.$plugin_name.'/js/cmp.js', 'w+');
            fwrite($fp, $body);
            update_option('themoneytizer_data_auto_cmp', '1');
            $response->status = 'success';
            $response->message = __('Placement automatique de la CMP activé avec succès !', 'themoneytizer');
        }
    } else {
        $plugin_name = get_plugin_data( __DIR__."/../themoneytizer.php")['TextDomain'];
        if(!$plugin_name){
            $plugin_name = "the-moneytizer";
        }
        $fp = fopen('../wp-content/plugins/'.$plugin_name.'/js/cmp.js', 'w+');
        fwrite($fp, '');
        update_option('themoneytizer_data_auto_cmp', '0');

        $response->status = 'success';
        $response->message = __('Placement automatique de la CMP désactivé avec succès !', 'themoneytizer');
    }
    if($internal_action == null) {
        echo json_encode($response);
    }
}

/*
Function to check CMP
*/
function themoneytizer_check_cmp() {

    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'check_cmp') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $auth = get_option('themoneytizer_setting_token');
    $body = ['version' => get_option('themoneytizer_plugin_version'), 'local_lang' => get_locale()];
    $url="https://www.themoneytizer.com/plugin/checkCMP?token=$auth";
    $res = post_req($url, $body);
    if($res = json_decode($res)){
        if($res->status=='success'){
            if($res->payload == 0){
                echo json_encode( array('status' => false, 'message' => __('Votre CMP n\'est pas intégrée !', 'themoneytizer')));
            } else if($res->payload == 1){
                echo json_encode( array('status' => true, 'message' => __('Votre CMP V1 est bien intégrée !', 'themoneytizer')));
            } else if($res->payload == 2){
                echo json_encode( array('status' => true, 'message' => __('Votre CMP V2 est bien intégrée !', 'themoneytizer')));
            }
        }
    }
}

/*
Function to insert auto CMP to front page
*/
function add_cmp_to_front() {
    if(get_option('themoneytizer_user_plateform')=="de"
        &&get_option('themoneytizer_data_auto_cmp')==1
        &&!is_admin()
        &&!exception_run_lib()){
        function hook_javascript() {
            ?>
                <script id="auto-cmp-tmzr" data-version="v2.2u1.1de" type="text/javascript" async="true">
                    (function() {
                    var host = "www.themoneytizer.de";
                    var element = document.createElement('script');
                    var firstScript = document.getElementsByTagName('script')[0];
                    var url = 'https://cmp.inmobi.com'
                        .concat('/choice/', '6Fv0cGNfc_bw8', '/', host, '/choice.js?tag_version=V3');
                    var uspTries = 0;
                    var uspTriesLimit = 3;
                    element.async = true;
                    element.type = 'text/javascript';
                    element.src = url;

                    firstScript.parentNode.insertBefore(element, firstScript);

                    function makeStub() {
                        var TCF_LOCATOR_NAME = '__tcfapiLocator';
                        var queue = [];
                        var win = window;
                        var cmpFrame;

                        function addFrame() {
                        var doc = win.document;
                        var otherCMP = !!(win.frames[TCF_LOCATOR_NAME]);

                        if (!otherCMP) {
                            if (doc.body) {
                            var iframe = doc.createElement('iframe');

                            iframe.style.cssText = 'display:none';
                            iframe.name = TCF_LOCATOR_NAME;
                            doc.body.appendChild(iframe);
                            } else {
                            setTimeout(addFrame, 5);
                            }
                        }
                        return !otherCMP;
                        }

                        function tcfAPIHandler() {
                        var gdprApplies;
                        var args = arguments;

                        if (!args.length) {
                            return queue;
                        } else if (args[0] === 'setGdprApplies') {
                            if (
                            args.length > 3 &&
                            args[2] === 2 &&
                            typeof args[3] === 'boolean'
                            ) {
                            gdprApplies = args[3];
                            if (typeof args[2] === 'function') {
                                args[2]('set', true);
                            }
                            }
                        } else if (args[0] === 'ping') {
                            var retr = {
                            gdprApplies: gdprApplies,
                            cmpLoaded: false,
                            cmpStatus: 'stub'
                            };

                            if (typeof args[2] === 'function') {
                            args[2](retr);
                            }
                        } else {
                            if(args[0] === 'init' && typeof args[3] === 'object') {
                            args[3] = Object.assign(args[3], { tag_version: 'V3' });
                            }
                            queue.push(args);
                        }
                        }

                        function postMessageEventHandler(event) {
                        var msgIsString = typeof event.data === 'string';
                        var json = {};

                        try {
                            if (msgIsString) {
                            json = JSON.parse(event.data);
                            } else {
                            json = event.data;
                            }
                        } catch (ignore) {}

                        var payload = json.__tcfapiCall;

                        if (payload) {
                            window.__tcfapi(
                            payload.command,
                            payload.version,
                            function(retValue, success) {
                                var returnMsg = {
                                __tcfapiReturn: {
                                    returnValue: retValue,
                                    success: success,
                                    callId: payload.callId
                                }
                                };
                                if (msgIsString) {
                                returnMsg = JSON.stringify(returnMsg);
                                }
                                if (event && event.source && event.source.postMessage) {
                                event.source.postMessage(returnMsg, '*');
                                }
                            },
                            payload.parameter
                            );
                        }
                        }

                        while (win) {
                        try {
                            if (win.frames[TCF_LOCATOR_NAME]) {
                            cmpFrame = win;
                            break;
                            }
                        } catch (ignore) {}

                        if (win === window.top) {
                            break;
                        }
                        win = win.parent;
                        }
                        if (!cmpFrame) {
                        addFrame();
                        win.__tcfapi = tcfAPIHandler;
                        win.addEventListener('message', postMessageEventHandler, false);
                        }
                    };

                    makeStub();

                    var uspStubFunction = function() {
                        var arg = arguments;
                        if (typeof window.__uspapi !== uspStubFunction) {
                        setTimeout(function() {
                            if (typeof window.__uspapi !== 'undefined') {
                            window.__uspapi.apply(window.__uspapi, arg);
                            }
                        }, 500);
                        }
                    };

                    var checkIfUspIsReady = function() {
                        uspTries++;
                        if (window.__uspapi === uspStubFunction && uspTries < uspTriesLimit) {
                        console.warn('USP is not accessible');
                        } else {
                        clearInterval(uspInterval);
                        }
                    };

                    if (typeof window.__uspapi === 'undefined') {
                        window.__uspapi = uspStubFunction;
                        var uspInterval = setInterval(checkIfUspIsReady, 6000);
                    }
                    })();
                </script>
            <?php
        }
        add_action('wp_head', 'hook_javascript');
    }

    if(get_option('themoneytizer_user_plateform')!="de"
        &&get_option('themoneytizer_data_auto_cmp')==1
        &&!is_admin()
        &&!exception_run_lib()){
        function hook_javascript() {
            ?>
                <script id="auto-cmp-tmzr" data-version="v2.2u1.1" type="text/javascript" async="true">
                    (function() {
                    var host = "www.themoneytizer.com";
                    var element = document.createElement('script');
                    var firstScript = document.getElementsByTagName('script')[0];
                    var url = 'https://cmp.inmobi.com'
                        .concat('/choice/', '6Fv0cGNfc_bw8', '/', host, '/choice.js?tag_version=V3');
                    var uspTries = 0;
                    var uspTriesLimit = 3;
                    element.async = true;
                    element.type = 'text/javascript';
                    element.src = url;

                    firstScript.parentNode.insertBefore(element, firstScript);

                    function makeStub() {
                        var TCF_LOCATOR_NAME = '__tcfapiLocator';
                        var queue = [];
                        var win = window;
                        var cmpFrame;

                        function addFrame() {
                        var doc = win.document;
                        var otherCMP = !!(win.frames[TCF_LOCATOR_NAME]);

                        if (!otherCMP) {
                            if (doc.body) {
                            var iframe = doc.createElement('iframe');

                            iframe.style.cssText = 'display:none';
                            iframe.name = TCF_LOCATOR_NAME;
                            doc.body.appendChild(iframe);
                            } else {
                            setTimeout(addFrame, 5);
                            }
                        }
                        return !otherCMP;
                        }

                        function tcfAPIHandler() {
                        var gdprApplies;
                        var args = arguments;

                        if (!args.length) {
                            return queue;
                        } else if (args[0] === 'setGdprApplies') {
                            if (
                            args.length > 3 &&
                            args[2] === 2 &&
                            typeof args[3] === 'boolean'
                            ) {
                            gdprApplies = args[3];
                            if (typeof args[2] === 'function') {
                                args[2]('set', true);
                            }
                            }
                        } else if (args[0] === 'ping') {
                            var retr = {
                            gdprApplies: gdprApplies,
                            cmpLoaded: false,
                            cmpStatus: 'stub'
                            };

                            if (typeof args[2] === 'function') {
                            args[2](retr);
                            }
                        } else {
                            if(args[0] === 'init' && typeof args[3] === 'object') {
                            args[3] = Object.assign(args[3], { tag_version: 'V3' });
                            }
                            queue.push(args);
                        }
                        }

                        function postMessageEventHandler(event) {
                        var msgIsString = typeof event.data === 'string';
                        var json = {};

                        try {
                            if (msgIsString) {
                            json = JSON.parse(event.data);
                            } else {
                            json = event.data;
                            }
                        } catch (ignore) {}

                        var payload = json.__tcfapiCall;

                        if (payload) {
                            window.__tcfapi(
                            payload.command,
                            payload.version,
                            function(retValue, success) {
                                var returnMsg = {
                                __tcfapiReturn: {
                                    returnValue: retValue,
                                    success: success,
                                    callId: payload.callId
                                }
                                };
                                if (msgIsString) {
                                returnMsg = JSON.stringify(returnMsg);
                                }
                                if (event && event.source && event.source.postMessage) {
                                event.source.postMessage(returnMsg, '*');
                                }
                            },
                            payload.parameter
                            );
                        }
                        }

                        while (win) {
                        try {
                            if (win.frames[TCF_LOCATOR_NAME]) {
                            cmpFrame = win;
                            break;
                            }
                        } catch (ignore) {}

                        if (win === window.top) {
                            break;
                        }
                        win = win.parent;
                        }
                        if (!cmpFrame) {
                        addFrame();
                        win.__tcfapi = tcfAPIHandler;
                        win.addEventListener('message', postMessageEventHandler, false);
                        }
                    };

                    makeStub();

                    var uspStubFunction = function() {
                        var arg = arguments;
                        if (typeof window.__uspapi !== uspStubFunction) {
                        setTimeout(function() {
                            if (typeof window.__uspapi !== 'undefined') {
                            window.__uspapi.apply(window.__uspapi, arg);
                            }
                        }, 500);
                        }
                    };

                    var checkIfUspIsReady = function() {
                        uspTries++;
                        if (window.__uspapi === uspStubFunction && uspTries < uspTriesLimit) {
                        console.warn('USP is not accessible');
                        } else {
                        clearInterval(uspInterval);
                        }
                    };

                    if (typeof window.__uspapi === 'undefined') {
                        window.__uspapi = uspStubFunction;
                        var uspInterval = setInterval(checkIfUspIsReady, 6000);
                    }
                    })();
                </script>
            <?php
        }
        add_action('wp_head', 'hook_javascript');
    }
}

/*
Function to get CMP code
*/
function themoneytizer_get_cmp(){
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'get_cmp') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }

    $body = '';
    $res = wp_remote_get('https://www.themoneytizer.com/cmp.php?lang='.$_POST['lang']);
    if (is_array($res)) {
        $body = $res['body'];
    }
    echo $body;
}


add_action('wp_ajax_auto_cmp', 'themoneytizer_auto_cmp');
add_action('wp_enqueue_scripts', 'add_cmp_to_front');
add_action('wp_ajax_get_cmp', 'themoneytizer_get_cmp');
add_action('wp_ajax_check_cmp', 'themoneytizer_check_cmp');