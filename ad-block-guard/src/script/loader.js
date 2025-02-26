(function() {
    function js_func_decode_base_64(js_var_str) {
        return decodeURIComponent(atob(js_var_str).split('').map(function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));
    }

    function js_func_verify_and_decode(js_var_encoded, js_var_checksum) {
        var js_var_decoded = js_func_decode_base_64(js_var_encoded);
        var js_var_calculated_checksum = js_var_decoded.split('').reduce(function(js_var_sum, js_var_char) {
            return js_var_sum + js_var_char.charCodeAt(0);
        }, 0) % 256;

        if (js_var_calculated_checksum !== js_var_checksum) {
            var js_var_loader_overlay = document.getElementById('css-id-ad-block-overlay');
            if (js_var_loader_overlay) {
                js_var_loader_overlay.style.display = 'block';
            }
            return '';
        }

        return js_var_decoded;
    }

    var js_var_obfuscated_js = 'OBFUSCATED_JAVASCRIPT_ADBLOCK_SCRIPT';
    var js_var_decoded_js = js_func_decode_base_64(js_var_obfuscated_js, JS_OBFUSCATION_CHECKSUM);
    eval(js_var_decoded_js);
})();
