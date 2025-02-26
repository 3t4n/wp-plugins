<?php
ob_start();
global $wp_filter;
global $post;

/****************************************************/
/* GLOBAL OPTIONS */
/****************************************************/
// get the options
$this->g_use_menu = $this->fpc1_options['use_menu'];
$this->g_menu_name = $this->fpc1_options['menu_name'];
$this->g_show_menu = $this->fpc1_options['show_menu'];
$this->g_debug = $this->fpc1_options['debug'];
$this->g_fp_url = $this->fpc1_options['fpurl'];
$this->g_autofit = $this->fpc1_options['autofit'];
$this->g_fpogtitle = $this->fpc1_options['fpogtitle'];
$this->g_fpogtype = $this->fpc1_options['fpogtype'];
$this->g_fpogurl = $this->fpc1_options['fpogurl'];
$this->g_fpogimg = $this->fpc1_options['fpogimg'];
$this->g_fpogname = $this->fpc1_options['fpogname'];

// premium options
if($this->plugin_level == 'pro'){
  $this->link_luv = $this->fpc1_options['link_luv'];
  $this->clickbank_id = $this->fpc1_options['cbid'];
  $this->header_filters = $this->fpc1_options['header_filters'];
  $this->content_filters = $this->fpc1_options['content_filters'];
  $this->footer_filters = $this->fpc1_options['footer_filters'];
} else {
  $this->link_luv = 1;
  $this->clickbank_id = '';
  $this->header_filters = array();
  $this->content_filters = array();
  $this->footer_filters = array();
}

/****************************************************/
/* PAGE META */
/****************************************************/
$meta = get_post_meta($post->ID, '_fbfp', true);
// free variables
$this->admins = $meta['admins'];
$this->fbappid = $meta['appid'];
$this->fbappsecret = $meta['appsecret'];
$this->fbcss = $meta['css'];
$this->fbcsslink = $meta['csslink'];
$this->fbfootercontent = $meta['footer'];
$this->fpogtitle = $meta['fpogtitle'];
$this->fpogtype = $meta['fpogtype'];
$this->fpogimg = $meta['fpogimg'];
$this->fpogurl = $meta['fpogurl'];
$this->fpogname = $meta['fpogname'];
$this->fpurl = $meta['fpurl'];
$this->google_fonts = $meta['google_fonts'];
$this->google_plus = $meta['google_plus'];
$this->fbheadercontent = $meta['header'];
$this->isfanpage = $meta['isfanpage'];
$this->lang = (isset($meta['lang']))? $meta['lang'] : 'en_US';
$this->menu = $meta['menu'];
$this->show_menu = $meta['show_menu'];
$this->pop_links = $meta['pop_links'];
$this->pop_forms = $meta['pop_forms'];
$this->show_menu = $meta['show_menu'];
$this->fbtemplate = $meta['template'];
$this->use_menu = $meta['use_menu'];
// premium variables
$this->fbcustomcontent = $meta['custom'];
$this->fbredirect = $meta['redirect'];
$this->show_comments = $meta['show_comments'];

// deal with overrides
$this->g_use_menu = (!empty($this->use_menu) && $this->use_menu != 'defer')? $this->use_menu : $this->g_use_menu;
$this->g_show_menu = (!empty($this->show_menu) && $this->show_menu != 'defer')? $this->show_menu : $this->g_show_menu;
$this->g_menu_name = (!empty($this->menu))? $this->menu : $this->g_menu_name;
$this->g_fp_url = (!empty($this->fpurl))? $this->fpurl : $this->g_fp_url;
if(!empty($this->fpogtitle) || !empty($this->fpogtype) || !empty($this->fpogurl) ||
  !empty($this->fpogimg) || !empty($this->fpogname)){
  $this->g_fpogtitle = $this->fpogtitle;
  $this->g_fpogtype = $this->fpogtype;
  $this->g_fpogurl = $this->fpogurl;
  $this->g_fpogimg = $this->fpogimg;
  $this->g_fpogname = $this->fpogname;
}

// remove header/content/footer filers
foreach($wp_filter["wp_head"] as $priority => $filters){
  foreach($filters as $name => $details){
    $p[$name] = $priority;
  }
}
foreach($this->header_filters as $filter){
  remove_filter('wp_head',$filter,$p[$filter]);
}
foreach($wp_filter["the_content"] as $priority => $filters){
  foreach($filters as $name => $details){
    $p[$name] = $priority;
  }
}
foreach($this->content_filters as $filter){
  remove_filter('the_content',$filter,$p[$filter]);
}
foreach($wp_filter["wp_footer"] as $priority => $filters){
  foreach($filters as $name => $details){
    $p[$name] = $priority;
  }
}
foreach($this->footer_filters as $filter){
  remove_filter('wp_footer',$filter,$p[$filter]);
}

if(!empty($this->clickbank_id)){
  $link_luv_url = 'http://'.$this->clickbank_id.'.fbmarketer.hop.clickbank.net';
} else {
  $link_luv_url = 'http://www.fanpageconnect.com';
}

if(empty($this->g_use_menu)) { $this->g_use_menu = false; }
if(empty($this->g_show_menu)) { $this->g_show_menu = 'liked'; }

$this->added_like = false;

$pos = strpos($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'],'wp-admin/edit.php',0);
$doc_protocol = (empty($_SERVER['HTTPS']))? 'http://' : 'https://';
$this->parm_prefix = (strpos($this->g_fp_url,'?') === false)? '?' : '&';

// send a header for IE
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

// facebook!
if(!class_exists("FacebookApiException")){
  require FPC_PLUGIN_DIR . '/util/facebook/facebook.php';
}

// create facebook object
$facebook = new Facebook(array(
  'appId'  => $this->fbappid,
  'secret' => $this->fbappsecret,
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
if($this->page_liked && !empty($this->fbredirect)){
  header('Location: '.$this->fbredirect);
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" xmlns:fb="http://ogp.me/ns/fb#"><!--<![endif]-->
<head>
    <!-- This page Generated by Fanpage Connect Pro v<?php echo FPC_PLUGIN_VERSION; ?>: http://www.fanpageconnect.com/pro -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta property="og:title" content="<?php echo $this->g_fpogtitle; ?>">
    <meta property="og:type" content="<?php echo $this->g_fpogtype; ?>">
    <meta property="og:url" content="<?php echo the_permalink(); ?>">
    <meta property="og:image" content="<?php echo $this->g_fpogimg; ?>">
    <meta property="og:site_name" content="<?php echo $this->g_fpogname; ?>">
    <meta property="fb:app_id" content="<?php echo $this->fbappid; ?>">
    <meta property="fb:admins" content="<?php echo $this->fbappid; ?><?php if(!empty($this->admins)){echo ",".$this->admins;} ?>">
    <title><?php if(!empty($this->g_fpogname)){ echo $this->g_fpogname; } else { bloginfo('name'); ?> - <?php is_home() ? bloginfo('description') : wp_title(''); } ?></title>
    <?php if(!empty($this->g_fp_url) && !empty($this->fbappid) && empty($meta['drop_iframe'])){ ?><script type="text/javascript">if(parent.frames.length <= 0){window.location.replace("<?php echo $this->g_fp_url.$this->parm_prefix.'sk=app_'.$this->fbappid; ?>");}</script><?php } ?>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo FPC_TEMPLATE_URL; ?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?php echo FPC_TEMPLATE_URL; ?>/css/fanpage-connect.css" type="text/css" media="screen" />
    <?php if(!empty($this->fbtemplate)){ ?><link rel="stylesheet" href="<?php echo FPC_PLUGIN_URL; ?>/templates/<?php echo $this->fbtemplate;?>/default.css" type="text/css"><?php } ?>
    <?php if(!empty($this->fbcsslink)){?><link rel="stylesheet" href="<?php echo $this->fbcsslink; ?>" type="text/css" media="screen" /><?php } ?>
    <?php if(!empty($this->google_fonts)){ ?><link rel="stylesheet" href="<?php echo $doc_protocol;?>fonts.googleapis.com/css?family=<?php echo $this->google_fonts; ?>" type="text/css"><?php } ?>
    <?php if(!empty($this->fbcss)){?><style type="text/css"><?php echo $this->fbcss; ?></style><?php } ?>
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
<?php if(!empty($this->g_fpogimg)): ?><img src="<?php echo $this->g_fpogimg; ?>" alt="<?php if(!empty($this->g_fpogname)){ echo $this->g_fpogname; } else { bloginfo('name'); ?> - <?php is_home() ? bloginfo('description') : wp_title(''); } ?>" style="display:none;" /><?php endif;?>

<div id="fpc-wrapper">
  <div id="fpc-header-area" class="full-width">
      <header id="fpc-header" role="banner">
        <div id="fpc-header-content">
            <?php echo do_shortcode(shortcode_unautop($this->fbheadercontent)); ?>
        </div><!-- fpc-header-content -->
        <?php if(!empty($this->g_menu_name) && $this->g_use_menu == 'true') { ?>
          <?php if(($this->g_show_menu == 'liked' && $this->page_liked) || $this->g_show_menu == 'always'){ ?>
            <nav id="fpc-menu" role="navigation">
              <?php wp_nav_menu(array('menu' => $this->g_menu_name,'container_class' => 'menu-header')); ?>
            </nav><!-- fpc-menu -->
          <?php } ?>
        <?php } ?>
      </header><!-- fpc-header -->
  </div><!-- fpc-header-area -->

  <div id="fpc-content-area" class="full-width">

      <div id="fpc-columns">

        <section id="fpc-content" class="" role="main">

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_content(''); ?>
          <!--<div style="clear:both;display:block;margin-bottom:1px;padding-top:1px;"></div>-->
          <?php endwhile; else: ?>
          <h2>Oops! There are no posts.</h2>
          <?php endif; ?>

          <?php
          // debug info
          if($this->g_debug == 'true'){
            echo '<p>';
            echo '<strong>Debug Info:</strong><br>';
            echo '<strong>Page Id:</strong> ' . $this->page_id . '<br>';
            echo '<strong>App Id:</strong> ' . $this->fbappid . '<br>';
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

          <?php if(comments_open($post->ID) && (($this->show_comments == 'liked' && $this->page_liked) || $this->show_comments == 'always')){ ?>
          <div id="fpc-comments">
            <fb:comments href="<?php echo the_permalink(); ?>" num_posts="10" width="470"></fb:comments>
          </div>
          <?php } ?>

        </section><!-- fpc-content -->
        <aside id="fpc-sidebar" class="widget-area" role="complementary">
        </aside><!-- fpc-sidebar -->

      </div><!-- fpc-columns -->

  </div><!-- fpc-content-area -->

  <div id="fpc-footer-area" class="full-width">
      <div id="fpc-footer">
        <?php echo do_shortcode(shortcode_unautop($this->fbfootercontent)); ?>
        <?php if(!empty($this->link_luv)){ ?>
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
var appId = '<?php echo $this->fbappid; ?>';
var popLinks = '<?php echo (!empty($this->pop_links)); ?>';
var popForms = '<?php echo (!empty($this->pop_forms)); ?>';
var dropiFrame = '<?php echo $meta['drop_iframe']; ?>';

window.fbAsyncInit = function() {
  FB.init({ appId: '<?php echo $this->fbappid; ?>', channelUrl : '', status: true, xfbml: true, oauth: true });
  FB.Canvas.setAutoGrow(100);
  <?php if(!empty($this->fbappid) && !empty($this->g_fp_url) && empty($meta['drop_iframe'])):?>
  FB.Event.subscribe('edge.create', function(response) { top.location.href = "<?php echo $this->g_fp_url.$this->parm_prefix.'sk=app_'.$this->fbappid; ?>"; });
  FB.Event.subscribe('edge.remove', function(response) { top.location.href = "<?php echo $this->g_fp_url.$this->parm_prefix.'sk=app_'.$this->fbappid; ?>"; });
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
   js.src = "//connect.facebook.net/<?php echo $this->lang;?>/all.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript" src="<?php echo FPC_PLUGIN_URL; ?>/js/fpc.js"></script>
<?php if(!empty($this->google_plus)){ ?><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><?php } ?>
</body>
</html>
<?php ob_end_flush(); ?>