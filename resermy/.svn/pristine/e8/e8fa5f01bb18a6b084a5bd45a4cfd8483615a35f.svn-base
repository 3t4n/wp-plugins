setTimeout(function () {
    var divString = '<div id="resermy_error_panel" style="background: white;padding: 14px 16px 18px;margin: 36px 0 8px;border-radius: 3px;border: 1px solid #ddd;border-bottom: 3px solid #ccc;">' +
        '<h4 style="font-size: 14px; margin: 6px 0 4px;">Oops... That&apos;s embarrassing...</h4>' +
        'Something went wrong while loading the <b>Resermy</b> plugin on your site.<br/>' +
        'Please contact the developer or drop a message&nbsp;<a href="https://resermy.com/support" target="_blank" style="color: #673ab7;">here</a>&nbsp;.&nbsp;' +
        'We&apos;d love to help!</div>';

    var $resermy_wp_body_div = document.querySelector("#wpbody .wrap");
    if ($resermy_wp_body_div) {
        var $resermy_error_panel_div = document.createElement("div");
        $resermy_error_panel_div.innerHTML = divString;
        $resermy_wp_body_div.insertBefore($resermy_error_panel_div, $resermy_wp_body_div.firstChild);
    }
}, 1);