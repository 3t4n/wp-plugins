<div id="anychat-livechat-admin-root"></div>
<script type="text/javascript">
  var anychatWidget = window.anychatWidget || {
    mainButton: true,
    widgetID: '<?php echo AnyChatTools::escJsString($generalConfig->widget_id) ?>',
    apiKey: '<?php echo AnyChatTools::escJsString($generalConfig->api_key) ?>',
    showNewMessagePopup: true,
    moduleCongigUrl: '<?php echo AnyChatTools::escJsString($pluginConfigUrl) ?>'
  };
  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s); js.id = id;
    js.src = 'https://api.anychat.one/widget/<?php echo AnyChatTools::escJsString($generalConfig->widget_id) ?>/admin-livechat-js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'contactus-jssdk'));
</script>