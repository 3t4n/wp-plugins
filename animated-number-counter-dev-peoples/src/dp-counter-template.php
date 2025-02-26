<?php
/**
* Template Name: Counter
*
*/

add_action('wp_enqueue_scripts', 'dp_counter_load_scripts', 900);
function dp_counter_load_scripts() {
  
  wp_enqueue_style('fontawesome', DP_COUNTER_URI . 'assets/libs/fontawesome/css/fontawesome.css');
	wp_enqueue_style('dv-counter', DP_COUNTER_URI . 'assets/css/main.css');
 
	wp_enqueue_script('tween-lite', DP_COUNTER_URI . 'assets/libs/TweenLite.min.js');
	wp_enqueue_script('round-props-plugin', DP_COUNTER_URI . 'assets/libs/RoundPropsPlugin.min.js');
  wp_enqueue_script('odometer', DP_COUNTER_URI . 'assets/libs/odometr/odometer.min.js', ['jquery'], '1.0.0', true);
  wp_enqueue_script('dv-counter', DP_COUNTER_URI . 'assets/js/counter.js', ['jquery', 'odometer'], '1.0.0', true);
}

$all_options = get_option('dv_counter_options');

$title = $all_options['title'];
$desc  = $all_options['desc'];
$video = $all_options['video'];
$video = (empty($video)) ? DP_COUNTER_URI . 'assets/video/bubbles.mp4' : $video;

?>
<head>
<meta charset="utf-8">
<title><?php echo get_the_title(); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta property="og:image" content="path/to/image.jpg">
<link rel="shortcut icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon">

<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#000">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#000">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#000">

<?php wp_head(); ?>
</head>
<body>

  <main>
    <video width="1920" height="1080" id="videoBg" muted="muted" preload="auto" autoplay="autoplay" loop="loop">
      <source src="<?php echo $video; ?>" type="video/mp4">
    </video>
    <div id="statistic">
      <div class="content">
        <h1><?php echo $title; ?></h1>
        <p class="info"><?php echo $desc; ?></p>
      </div>
      <div class="counter">
        <div class="number" id="score"></div>
      </div>
    </div>
  </main>

  <?php wp_footer(); ?>
</body>
</html>
