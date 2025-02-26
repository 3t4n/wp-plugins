<?php

$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-config.php';
require_once $path;
require_once 'twitteroauth/twitteroauth.php';
$temporaryToken = get_transient('ttoken');
delete_transient('ttoken');
$connection = new TwitterOAuth(ck, cs, $temporaryToken['oauth_token'], $temporaryToken['oauth_token_secret']);
$token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

set_transient('token', array(
    'oauth_token' => $token['oauth_token'],
    'oauth_token_secret' => $token['oauth_token_secret']
));

close_page();

function close_page() {
    ?>
    <script type="text/javascript">
        window.close();
    </script>
    <?php

}
?>