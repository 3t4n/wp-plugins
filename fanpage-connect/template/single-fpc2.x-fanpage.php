<?php
ob_start();
global $wp_filter;
global $post;

// get meta
$meta = get_post_meta($post->ID, '_fpcpage', true);
$app = $this->get_app_meta($meta['app']);

// remove header/content/footer filers
if(isset($app['header_filters'])){
  foreach($wp_filter["wp_head"] as $priority => $filters){
    foreach($filters as $name => $details){
      $p[$name] = $priority;
    }
  }
  foreach($app['header_filters'] as $filter){
    remove_filter('wp_head',$filter,$p[$filter]);
  }
}
if(isset($app['content_filters'])){
  foreach($wp_filter["the_content"] as $priority => $filters){
    foreach($filters as $name => $details){
      $p[$name] = $priority;
    }
  }
  foreach($app['content_filters'] as $filter){
    remove_filter('the_content',$filter,$p[$filter]);
  }
}
if(isset($app['footer_filters'])){
  foreach($wp_filter["wp_footer"] as $priority => $filters){
    foreach($filters as $name => $details){
      $p[$name] = $priority;
    }
  }
  foreach($app['footer_filters'] as $filter){
    remove_filter('wp_footer',$filter,$p[$filter]);
  }
}

if(!empty($app['cbid'])){
  $link_luv_url = 'http://'.$app['cbid'].'.fbmarketer.hop.clickbank.net';
} else {
  $link_luv_url = 'http://www.fanpageconnect.com';
}

if(!isset($meta['use_menu'])) { $meta['use_menu'] = false; }
if(!isset($meta['show_menu'])) { $meta['show_menu'] = 'liked'; }

// setup widgets
$has_header_widget = false;
$has_side_widget = false;
$has_footer_widget = false;
$side_widget_class = '';
if(!empty($app['num_widgets']) && isset($app['widget_base'])){
  // header
  $has_header_widget = (isset($meta['header_widget']))? is_active_sidebar($meta['header_widget']) : false;
  $has_side_widget = (isset($meta['side_widget']))? is_active_sidebar($meta['side_widget']) : false;
  $has_footer_widget = (isset($meta['footer_widget']))? is_active_sidebar($meta['footer_widget']) : false;
}
if($has_side_widget){
  $side_widget_class = 'fpc-sidebar-'.$meta['side_widget_lr'];
}

$this->added_like = false;
$pos = strpos($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'],'wp-admin/edit.php',0);
$doc_protocol = (empty($_SERVER['HTTPS']))? 'http://' : 'https://';
$this->parm_prefix = (strpos($app['pageurl'],'?') === false)? '?' : '&';
$this->g_fp_url = (isset($app['pageurl']))? $app['pageurl'] : the_permalink();
$this->custom_content = $meta['custom'];

// send a header for IE
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

// facebook!
if(!class_exists("FacebookApiException")){
  require FPC_PLUGIN_DIR . '/util/facebook/facebook.php';
}

// create facebook object
$facebook = new Facebook(array(
  'appId'  => $app['appid'],
  'secret' => $app['appsecret'],
  'cookie' => TRUE
));

// get the signed request
try {
  $signed_request = $facebook->getSignedRequest();
}catch (FacebookApiException $e) {
  $this->fb_error = $e;
  $signed_request = null;
}

// get facebook user
$user = $facebook->getUser();
if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

if(empty($signed_request)){
  if(isset($_COOKIE['fpc_cookie']['page_id'])){
    $this->page_id = $_COOKIE['fpc_cookie']['page_id'];
    $this->page_liked = $_COOKIE['fpc_cookie']['page_liked'];
    $this->page_admin = $_COOKIE['fpc_cookie']['page_admin'];
    $this->user_country = $_COOKIE['fpc_cookie']['user_country'];
    $this->user_locale = $_COOKIE['fpc_cookie']['user_locale'];
    $this->user_id = $_COOKIE['fpc_cookie']['user_id'];
    $this->app_data = $_COOKIE['fpc_cookie']['app_data'];
    $this->algorithm = $_COOKIE['fpc_cookie']['algorithm'];
    $this->expires = $_COOKIE['fpc_cookie']['expires'];
    $this->issued_at = $_COOKIE['fpc_cookie']['issued_at'];
    $this->oauth_token = $_COOKIE['fpc_cookie']['oauth_token'];
  }
  $this->page_liked = !empty($this->page_liked);
  $this->page_admin = !empty($this->page_admin);
} else {
  $this->page_id = trim($signed_request["page"]["id"]);
  $this->page_liked = trim($signed_request["page"]["liked"]);
  $this->page_admin = trim($signed_request["page"]["admin"]);
  $this->user_country = trim($signed_request["user"]["country"]);
  $this->user_locale = trim($signed_request["user"]["locale"]);
  $this->user_id = trim($signed_request["user_id"]);
  $this->app_data = trim($signed_request["app_data"]);
  $this->algorithm = trim($signed_request["algorithm"]);
  $this->expires = trim($signed_request["expires"]);
  $this->issued_at = trim($signed_request["issued_at"]);
  $this->oauth_token = trim($signed_request["oauth_token"]);

  $this->page_liked = !empty($this->page_liked);
  $this->page_admin = !empty($this->page_admin);

  setcookie('fpc_cookie[page_id]', $this->page_id, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[page_liked]', $this->page_liked, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[page_admin]', $this->page_admin, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[user_country]', $this->user_country, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[user_locale]', $this->user_locale, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[user_id]', $this->user_id, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[app_data]', $this->app_data, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[algorithm]', $this->algorithm, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[expires]', $this->expires, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[issued_at]', $this->issued_at, time()+1200, '/', $this->domain);
  setcookie('fpc_cookie[oauth_token]', $this->oauth_token, time()+1200, '/', $this->domain);
}

/* redirect if we have a redirect defined and we're liked! */
if($this->page_liked && !empty($meta['redirect'])){
  header('Location: '.$meta['redirect']);
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" xmlns:fb="http://ogp.me/ns/fb#"><!--<![endif]-->
<head>
    <!-- This page Generated by Fanpage Connect Pro v<?php echo FPC_PLUGIN_VERSION; ?>: http://www.fanpageconnect.com/pro -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta property="og:title" content="<?php echo $meta['ogtitle']; ?>">
    <meta property="og:type" content="<?php echo $meta['ogtype']; ?>">
    <meta property="og:url" content="<?php echo the_permalink(); ?>">
    <meta property="og:image" content="<?php echo $meta['ogimg']; ?>">
    <meta property="og:site_name" content="<?php echo $meta['ogtitle']; ?>">
    <meta property="fb:app_id" content="<?php echo $app['appid']; ?>">
    <meta property="fb:admins" content="<?php echo $app['appid']; ?><?php if(!empty($app['admins'])){echo ",".$app['admins'];} ?>">
    <title><?php if(!empty($meta['ogtitle'])){ echo $meta['ogtitle']; } else { bloginfo('name');?> - <?php is_home() ? bloginfo('description') : wp_title(''); } ?></title>
    <?php if(!empty($app['gplus'])){ ?><link rel="author" href="<?php echo $app['gplus']; ?>"><?php } ?>
    <?php if(!empty($app['pageurl']) && !empty($app['appid']) && empty($meta['drop_iframe'])){ ?><script type="text/javascript">if(parent.frames.length <= 0){window.location.replace("<?php echo $app['pageurl'].$this->parm_prefix.'sk=app_'.$app['appid']; ?>");}</script><?php } ?>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo FPC_TEMPLATE_URL; ?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?php echo FPC_TEMPLATE_URL; ?>/css/fanpage-connect.css" type="text/css" media="screen">
    <?php if(!empty($meta['template'])){ ?><link rel="stylesheet" href="<?php echo FPC_PLUGIN_URL; ?>/templates/<?php echo $meta['template'];?>/default.css" type="text/css"><?php } ?>
    <?php if(!empty($meta['csslink'])){?><link rel="stylesheet" href="<?php echo $meta['csslink']; ?>" type="text/css" media="screen"><?php } ?>
    <?php if(!empty($meta['google_fonts'])){ ?><link rel="stylesheet" href="<?php echo $doc_protocol;?>fonts.googleapis.com/css?family=<?php echo $meta['google_fonts']; ?>" type="text/css"><?php } ?>
    <?php if(!empty($meta['css'])){?><style type="text/css"><?php echo $meta['css']; ?></style><?php } ?>
    <!-- force iFrame autofit -->
    <style type="text/css">body { width:790px; overflow:hidden; margin:0 auto; padding:0; border:0; }</style>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo FPC_TEMPLATE_URL; ?>/js/modernizr.js"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">
	You are using an <strong>outdated</strong> browser.
	Please <a href="http://browsehappy.com/">upgrade your browser</a> or
	<a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a>
	to improve your experience.
</p>
<![endif]-->
<!-- make sure the OG image is the first image available for thumbnails! -->
<?php if(isset($meta['ogimg'])): ?><img src="<?php echo $meta['ogimg']; ?>" alt="<?php if(isset($meta['ogtitle'])){ echo $meta['ogtitle']; } else { bloginfo('name');?> - <?php is_home() ? bloginfo('description') : wp_title(''); } ?>" class="fpc-ogimg"><?php endif;?>

<div id="fpc-wrapper">
  <div id="fpc-header-area" class="full-width">
      <header id="fpc-header" role="banner">

        <div id="fpc-header-content">

            <?php echo do_shortcode(shortcode_unautop($meta['header_content'])); ?>
            <?php if ($has_header_widget): ?>
            <div id="fpc-header-widget">
              <ul class="fpc-header-widget-ul">
                  <?php if(dynamic_sidebar($meta['header_widget'])){} ?>
              </ul>
            </div>
            <?php endif; ?>

        </div><!-- fpc-header-content -->

        <?php if(isset($meta['menu']) && $meta['use_menu'] == 'true') { ?>
          <?php if(($meta['show_menu'] == 'liked' && $this->page_liked) || $meta['show_menu'] == 'always'){ ?>
            <nav id="fpc-menu" role="navigation">
              <?php wp_nav_menu(array('menu' => $meta['menu'],'container_class' => 'menu-header')); ?>
            </nav><!-- fpc-menu -->
          <?php } ?>
        <?php } ?>

      </header><!-- fpc-header -->
  </div><!-- fpc-header-area -->

  <div id="fpc-content-area" class="full-width">

      <div id="fpc-columns">

        <section id="fpc-content" class="<?php echo $side_widget_class; ?>" role="main">

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_content(''); ?>
          <!--<div style="clear:both;display:block;margin-bottom:1px;padding-top:1px;"></div>-->
          <?php endwhile; else: ?>
          <h2>Oops! There are no posts.</h2>
          <?php endif; ?>

          <?php
          // debug info
          if($app['debug'] == 'true'){
            echo '<p>';
            echo '<strong>Debug Info:</strong><br>';
            echo '<strong>Page Id:</strong> ' . $this->page_id . '<br>';
            echo '<strong>App Id:</strong> ' . $app['appid'] . '<br>';
            echo '<strong>Is Liked:</strong> ' . $this->page_liked . '<br>';
            echo '<strong>Is Admin:</strong> ' . $this->page_admin . '<br>';
            echo '<strong>Country:</strong> ' . $this->user_country . '<br>';
            echo '<strong>Locale:</strong> ' . $this->user_locale . '<br>';
            echo '<strong>User Id:</strong> ' . $this->user_id . '<br>';
            echo '<strong>App Data:</strong> ' . $this->app_data . '<br>';
            echo '<strong>Algorithm:</strong> ' . $this->algorithm . '<br>';
            echo '<strong>Expires:</strong> ' . $this->expires . '<br>';
            echo '<strong>Issued At:</strong> ' . $this->issued_at . '<br>';
            echo '<strong>Oauth Token:</strong> ' . $this->oauth_token . '<br>';
            echo '<strong>Referrer:</strong> ' . $_SERVER['HTTP_REFERER'] . '<br>';
            echo '<strong>Base Domain:</strong> '. $this->domain . '<br>';
            echo '<strong>FPC Cookie:</strong> ';
            print_r($_COOKIE['fpc_cookie']);
            echo '<br> ';
            echo '<strong>User Agent:</strong> '. $_SERVER['HTTP_USER_AGENT'] . '<br>';
            if(!empty($this->fb_error)){
              echo '<strong>Facebook Exception:</strong> ';
              print_r($this->fb_error, true);
            }
            echo '</p>';
          }
          ?>

          <?php if(comments_open($post->ID) && (($meta['show_comments'] == 'liked' && $this->page_liked) || $meta['show_comments'] == 'always')){ ?>
          <div id="fpc-comments">
            <fb:comments href="<?php echo the_permalink(); ?>" num_posts="10" width="470"></fb:comments>
          </div>
          <?php } ?>

        </section><!-- fpc-content -->

        <?php if ($has_side_widget): ?>
        <aside id="fpc-sidebar" class="widget-area <?php echo $side_widget_class; ?>" role="complementary">
          <ul class="fpc-sidebar-ul">
              <?php if(dynamic_sidebar($meta['side_widget'])){} ?>
          </ul>
        </aside><!-- fpc-sidebar -->
        <?php endif; ?>

      </div><!-- fpc-columns -->

  </div><!-- fpc-content-area -->

  <div id="fpc-footer-area" class="full-width">
      <div id="fpc-footer">
        <?php echo do_shortcode(shortcode_unautop($meta['footer_content'])); ?>
        <?php if ($has_footer_widget): ?>
        <div id="fpc-footer-widget">
          <ul class="fpc-footer-widget-ul">
              <?php if(dynamic_sidebar($meta['footer_widget'])){} ?>
          </ul>
        </div>
        <?php endif; ?>
        <?php if($app['link_luv'] == 'true'){ ?>
        <div id="fpc-linkluv">
          This page generated by <a href="<?php echo $link_luv_url; ?>" target="_blank">Fanpage Connect</a>
        </div>
        <?php } ?>
      </div><!-- fpc-footer -->
  </div><!-- fpc-footer-area -->

</div><!-- fpc-wrapper -->

<div id="hidden-footer"><?php wp_footer(); ?></div>

<div id="fb-root"></div>
<script>
var appId = '<?php echo $app['appid']; ?>';
var fbPageURL = '<?php echo $app['pageurl']; ?>';
var dropiFrame = '<?php echo $meta['drop_iframe']; ?>';
var popLinks = '<?php echo (isset($meta['pop_links'])); ?>';
var popForms = '<?php echo (isset($meta['pop_forms'])); ?>';

window.fbAsyncInit = function() {
  FB.init({ appId: '<?php echo $app['appid']; ?>', channelUrl : '', status: true, xfbml: true, oauth: true });
  FB.Canvas.setAutoGrow(100);
  <?php if(!empty($app['appid']) && !empty($app['pageurl']) && empty($meta['drop_iframe'])):?>
  FB.Event.subscribe('edge.create', function(response) { top.location.href = "<?php echo $app['pageurl'].$this->parm_prefix.'sk=app_'.$app['appid']; ?>"; });
  FB.Event.subscribe('edge.remove', function(response) { top.location.href = "<?php echo $app['pageurl'].$this->parm_prefix.'sk=app_'.$app['appid']; ?>"; });
  <?php endif; ?>
  if(typeof commentKarma == 'object'){
    FB.Event.subscribe('comment.create', function(response) {
      if(response.commentID != ''){ fbKarmaGates(commentKarma.dest,commentKarma.targ); }
    });
  }
  if(typeof sendKarma == 'object'){
    FB.Event.subscribe('message.send', function(response) {
      if(response != ''){ fbKarmaGates(sendKarma.dest,sendKarma.targ); }
    });
  }
};
// autoFit canvas on page size change
function sizeChangeCallback() { FB.Canvas.setAutoGrow(100); }
// Load the SDK asynchronously
(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/<?php echo $app['lang'];?>/all.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript" src="<?php echo FPC_PLUGIN_URL; ?>/template/js/fpc.js"></script>
<?php if(!empty($meta['google_plus'])){ ?><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><?php } ?>
</body>
</html>
<?php ob_end_flush(); ?>