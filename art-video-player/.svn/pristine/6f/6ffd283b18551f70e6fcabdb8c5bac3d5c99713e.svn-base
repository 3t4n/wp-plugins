<?php
/*
* Plugin Name: Art Video Player
* Plugin URI: whizdevs.com
* Description: Art Video Player is a modern and full featured HTML5 video player.
* Version: 1.0
* Author: Eleas Kanchon
* Author URI: https://github.com/Eleaswebdev
* License: GPLv3
* Text Domain: whizdevs
* Domain Path: /languages
*/

/*Some Set-up*/
define('ARTVP_PLUGIN_DIR', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' ); 
define('ARTVP_VER','1.0' ); 

function artplayer_enqueue_script() {   
    wp_enqueue_script('art_player_script', ARTVP_PLUGIN_DIR.'assets/js/artplayer.js', array('jquery'), ARTVP_VER, false); 
}
add_action('wp_enqueue_scripts', 'artplayer_enqueue_script');

//shortcode

function artvp_register_shortcodes(){
    add_shortcode('art_player', 'art_player_content');
  }
  add_action( 'init', 'artvp_register_shortcodes');

  function art_player_content( $atts ) {
  
     extract(shortcode_atts(array(
        'url' => null,
        'container' => uniqid(),
        'poster' => null,
        'volume' => 1.0,
        'title' => 'How to use art video player',
        'setting' => "true",
        'flip' => "true",
        'loop' => "false",
        'rotate' => "true",
        'screenshot' => "true",
        'playbackRate'    => "true",
        'aspectRatio'     => "true",
        'fullscreen'      => "true",
        'fullscreenWeb'   => "true",
        'subtitleOffset'  => "true",
        'miniProgressBar' => "true",
        'localVideo'      => "true",
        'localSubtitle'   => "true",
        'muted'           => "false",
         'pip'            => "true",
         'autoSize'       => "true",  
     ), $atts));
    
  
  ?>
  

  <div style="background: #3a3a3a; padding: 10px; <?php if(empty($url)){echo "display:block;";}else{echo "display:none;";} ?>"> 
  <h2 style="color: #d21616;"> You must push a video url link in the url attribute of the shortCode</h2>
  <p style="color: #fff;">example: [art_player url="https://cdn.jsdelivr.net/npm/big-buck-bunny-1080p@0.0.6/video.mp4"]</p>
  </div>
  <div style="width:100%; height:400px;<?php if(empty($url)){echo "display:none;";}else{echo "display:block;";} ?>" class="a<?php echo $container ?>" > </div>

        <script>
            
            var art = new Artplayer({
                container: '.a<?php echo $container; ?>',
                url: '<?php echo $url; ?>',
                title: '<?php echo $title; ?>',
                poster: '<?php echo $poster; ?>',
                volume: <?php echo $volume; ?>,
                setting: <?php echo $setting; ?>,
                loop: <?php echo $loop; ?>,
                flip: <?php echo $flip; ?>,
                rotate: <?php echo $rotate ?>,
                screenshot: <?php echo $screenshot ?>,
                playbackRate: <?php echo $playbackRate ?>,
                aspectRatio: <?php echo $aspectRatio ?>,
                fullscreen: <?php echo $fullscreen ?>,
                fullscreenWeb: <?php echo $fullscreenWeb ?>,
                subtitleOffset: <?php echo $subtitleOffset ?>,
                miniProgressBar: <?php echo $miniProgressBar ?>,
                localVideo: <?php echo $localVideo ?>,
                localSubtitle: <?php echo $localSubtitle ?>,
                muted: <?php echo $muted ?>,
                pip: <?php echo $pip ?>,
                autoSize: <?php echo $autoSize ?>,
            });
        </script>
  <?php 
  }