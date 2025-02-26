//初始化
jQuery(document).ready(function () {
    const server_domain = 'https://app.buttonify.net';
    //检查是否已经链接 buttonify_connected=1
    const buttonify_connected = jQuery("#buttonify_connected").val();
    const buttonify_user_id = jQuery("#buttonify_user_id").val();
    const buttonify_shop_url = jQuery("#buttonify_shop_url").val();
    const buttonify_store_token = jQuery("#buttonify_store_token").val();
    const domain = window.location.host;

    console.log(buttonify_connected)

    if (buttonify_connected == 1) {
        jQuery("#Go_to_Buttonify_DIV").show();
        if (buttonify_store_token == null || buttonify_store_token == '' || buttonify_store_token.length == '') {
            //已链接
            const url = server_domain + '/oauth/authorize/woocommerce?domain=' + domain + '&user_id=' + buttonify_user_id;
            //无token，未授权
            jQuery("#go_to_url").attr("href", url); //更换去授权的链接
            jQuery("#go_to_url").html("Connect to Buttonify"); //更换去授权的链接
            jQuery("#Go_to_Buttonify_tip").html("You are currently not connected to your Buttonify account.");
        }
    } else {
        //未链接,可刷新+加用key链接
        jQuery("#Go_to_Buttonify_DIV").hide();
        jQuery("#DisconnectIV").hide();
        jQuery("#Connect_to_Buttonify").attr("href", server_domain + "/oauth/authorize/woocommerce?domain=" + domain);
        jQuery("#buttonify_connect_keyDIV").show();
    }
});

let BUTTONIFY_ERROR_MSG = 'Network error, please try again or contact Buttonify';

//清掉eprolo_connected
function buttonify_disconnect() {
    //删除本地key等值，调用服务器API（清除key等值，注销账号，加入操作记录）
    var buttonify_user_id = jQuery("#buttonify_user_id").val();
    var buttonify_store_token = jQuery("#buttonify_store_token").val();
    jQuery.ajax({
        type: 'POST',
        url: ajax_startup.ajaxUrl, // ajaxurl为内置js变量，值为"/wp-admin/admin-ajax.php"
        data: {
            'action': 'buttonify_disconnect',
            'user_id': buttonify_user_id,
            'domain': window.location.host,
            'buttonify_store_token': buttonify_store_token,
            'buttonify_nonce_field': jQuery("#buttonify_nonce_field").val()
        },
        success: function (data) {
            if (data.data.code === 200) {
                alert(data.data.msg);
                location.reload();
            } else {
                alert(data.data.msg || BUTTONIFY_ERROR_MSG);
                if (data.data.code === 400) {
                    location.reload();
                }
            }
        },
        error: function (data) {
            console.log(data);
        }
    });

}

function buttonify_connect_key() {
    var user_id = jQuery("#buttonify_connect_key").val();
    if (user_id === '') {
        alert('Auth key is required');
        return;
    }
    jQuery.ajax({
        type: 'POST',
        url: ajax_startup.ajaxUrl, // ajaxurl为内置js变量，值为"/wp-admin/admin-ajax.php"
        data: {
            'action': 'buttonify_connect_key',
            'user_id': user_id,
            'domain': window.location.host,
            'buttonify_nonce_field': jQuery("#buttonify_nonce_field").val()
        },
        success: function (data) {
            handle_success(data)
        },
        error: function (data) {
            console.log(data);
        }
    });
}


function buttonify_refresh() {
    // 根据user_id刷新token,刷新domain
    var buttonify_user_id = jQuery("#buttonify_user_id").val();
    var buttonify_store_token = jQuery("#buttonify_store_token").val();
    jQuery.ajax({
        type: 'POST',
        url: ajax_startup.ajaxUrl, // ajaxurl为内置js变量，值为"/wp-admin/admin-ajax.php"
        data: {
            'action': 'buttonify_refresh',
            'user_id': buttonify_user_id,
            'domain': window.location.host,
            'buttonify_store_token': buttonify_store_token,
            'buttonify_nonce_field': jQuery("#buttonify_nonce_field").val()
        },
        success: function (data) {
            handle_success(data)
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function handle_success(data) {
    console.log(data);
    if (data.data.code === 200) {
        alert(data.data.msg);
        jQuery("#buttonify_connect_keyDIV").hide();
        location.reload();
    } else {
        alert(data.data.msg || BUTTONIFY_ERROR_MSG);
        if (data.data.code === 400) {
            location.reload();
        }
    }
}
