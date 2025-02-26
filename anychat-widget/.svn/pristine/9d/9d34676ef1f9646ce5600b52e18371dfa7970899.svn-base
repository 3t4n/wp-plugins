<?php if ($generalConfig->integration_type == 2) { ?>
<script>(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = 'https://api.anychat.one/widget/<?php echo AnyChatTools::escJsString($generalConfig->widget_id) ?>?r=' + encodeURIComponent(window.location);
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'contactus-jssdk'));</script>
<?php } else { ?>
<script>(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = 'https://api.anychat.one/widget/<?php echo AnyChatTools::escJsString($generalConfig->widget_id) ?>/livechat-js?r=' + encodeURIComponent(window.location);
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'contactus-jssdk'));</script>
<?php }