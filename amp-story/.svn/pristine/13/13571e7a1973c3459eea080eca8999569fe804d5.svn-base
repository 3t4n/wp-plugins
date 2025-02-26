<?php
global $post;
?>
<!doctype html>
<html ⚡>
<head>
  <meta charset="utf-8">
  <title><?php echo get_the_title(); ?></title>
  <link rel="canonical" href="<?php echo get_permalink(); ?>">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
  <meta name="amp-experiments-opt-in" content="experiment-a,experiment-b">
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-element="amp-video"
  src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
  <script async custom-element="amp-story"
  src="https://cdn.ampproject.org/v0/amp-story-1.0.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400" rel="stylesheet">
  <?php   $amp_pages = vp_metabox('amp_story_vp_metabox.amp_group'); ?>
  <style amp-custom>
  amp-story {
    font-family: 'Oswald',sans-serif;
    color: #fff;
  }
  amp-story-page {
    background-color: #000;
  }
  h1 {
    font-weight: bold;
    font-size: 2.875em;
    font-weight: normal;
    line-height: 1.174;
  }
  p {
    font-weight: normal;
    font-size: 1.3em;
    line-height: 1.5em;
    color: #fff;
  }
  q {
    font-weight: 300;
    font-size: 1.1em;
  }

  amp-story-grid-layer.bottom {
    align-content:end;
  }
  amp-story-grid-layer.top {
    align-content:top;
  }
  amp-story-grid-layer.center {
    align-content:center;
  }
  
  amp-story-grid-layer.noedge {
    padding: 0px;
  }
  amp-story-grid-layer.center-text {
    align-content: center;
  }
  .wrapper {
    display: grid;
    grid-template-columns: 50% 50%;
    grid-template-rows: 50% 50%;
  }
  .banner-text {
    text-align: center;
    background-color: #000;
    line-height: 2em;
  }
  amp-story-cta-layer{
    text-align: center;

  }
  <?php 

  foreach ($amp_pages as $key => $page) {
//     var_dump($page);
    $page_id = "page-" . $key;
    foreach ($page['amp_story_blocks'] as $block_key => $block) {
      if(!empty($block['amp_story_block_tb_url'])){
          $block_id = $page_id .  "-block-" . $block_key;
         echo 'amp-story-cta-layer#' . esc_attr($block_id) . ' a{';
         echo 'color:' . esc_attr($block['amp_story_block_color']) . ';';
         echo 'font-size:' . esc_attr($block['amp_story_block_text_size']) . 'px;';
         if(esc_attr($block['amp_story_block_tg_bold'])=='1')
          echo 'font-weight: bold;';
        echo '} ';
      }else{
         $block_id = $page_id .  "-block-" . $block_key;
         echo 'amp-story-grid-layer#' . esc_attr($block_id) . ' p{';
         echo 'color:' . esc_attr($block['amp_story_block_color']) . ';';
         echo 'font-size:' . esc_attr($block['amp_story_block_text_size']) . 'px;';
         if(esc_attr($block['amp_story_block_tg_bold'])=='1')
          echo 'font-weight: bold;';
        echo '} ';
      }
     
         // var_dump($block);
    }
  }
     // die();
  ?>
</style>
</head>
<body>


  <?php 
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  if (!empty($image[0])) {
    $publisher_logo = $image[0]; 
  }else{
    $publisher_logo = get_site_url() . "wp-content/plugins/amp-story/google-amp-logo.png";
  }

  $cover_title = vp_metabox('amp_story_vp_metabox.amp_story_cover_title_tb');
  $cover_sub = vp_metabox('amp_story_vp_metabox.amp_story_cover_sub_tb');
  $cover_background = vp_metabox('amp_story_vp_metabox.amp_story_cover_upload');

  ?>
  <!-- Cover page -->
  <amp-story standalone title="<?php echo esc_attr($cover_title); ?>"
    publisher="<?php echo get_site_url(); ?>"
    publisher-logo-src="<?php echo esc_attr($publisher_logo); ?>"
    poster-portrait-src="<?php echo esc_attr($cover_background); ?>">
    <amp-story-page id="cover">
      <amp-story-grid-layer template="fill">
        <amp-img src="<?php echo esc_attr($cover_background); ?>"
          width="720" height="1280"
          layout="responsive">
        </amp-img>
      </amp-story-grid-layer>
      <amp-story-grid-layer template="vertical">
        <h1><?php echo esc_attr($cover_title); ?></h1>
        <p><?php echo esc_attr($cover_sub); ?></p>
      </amp-story-grid-layer>
    </amp-story-page>


    <?php 
    foreach ($amp_pages as $key => $page) {
      $page_id = "page-" . $key;
      if (!empty($page['amp_story_audio_up'])) {
        $audio =  "background-audio='" . esc_attr($page['amp_story_audio_up']) . "'";
      }else{
        $audio = ""; 
      }
      ?>
      <amp-story-page id="page<?php echo esc_attr($key); ?>" <?php echo $audio; ?>>

        <!-- BEGIN BACKGROUND -->
        <amp-story-grid-layer template="fill">
          <?php
          if (end(explode(".",$page['amp_story_up_1'])) =="mp4") {
           ?>   
           <amp-video autoplay loop
           width="720" height="1280"
           poster="<?php echo esc_attr($page['amp_story_poster_up']); ?>"
           layout="responsive">
           <source src="<?php echo esc_attr($page['amp_story_up_1']); ?>" type="video/mp4">
           </amp-video>
           <?php
         }else{ 
          ?>

          <amp-img src="<?php echo esc_attr($page['amp_story_up_1']); ?>" 
            width="720" height="1280"
            layout="responsive">
          </amp-img>

          <?php 
        }
        ?>
      </amp-story-grid-layer>
      <!-- END BACKGROUND -->
      <!-- BEGIN BLOCKS -->
      <?php 

      if($page['amp_story_tg_title'] == '1'){
       echo '<amp-story-grid-layer template="vertical">';
       echo '<h1>' .  esc_attr($page['amp_story_tb_1']) . '</h1>';
       echo '</amp-story-grid-layer>';

     }  
    $output_link = '';
    
     foreach ($page['amp_story_blocks'] as $block_key => $block) {
      // var_dump($page);die();
      $block_id = $page_id .  "-block-" . $block_key;
      if(empty($block['amp_story_block_rb_position']))$block['amp_story_block_rb_position'] = 'bottom';
      if (empty(esc_attr($block['amp_story_block_text_animation'])) || esc_attr($block['amp_story_block_text_animation']) == 'none' ) {
        $animate = '';
      }else{
        $animate = 'animate-in="' . esc_attr($block['amp_story_block_text_animation']) . '"';
      }


      $output = esc_attr($block['amp_story_block_ta']);

      if( !empty($block['amp_story_block_tb_url']) ){ 
        $output = '<a target="_blank" href="' . $block['amp_story_block_tb_url'] . '">' . $block['amp_story_block_tb_url_text'] . '</a>';
        $output_link .= '<amp-story-cta-layer id="' . esc_attr($block_id) .'"  class="button '. esc_attr($block['amp_story_block_rb_position']).'">';
         $output_link .= $output;
         $output_link .= ' </amp-story-cta-layer>';
      }else{
        echo '<amp-story-grid-layer id="' . esc_attr($block_id) .'" template="vertical" class="'. esc_attr($block['amp_story_block_rb_position']).'">';
        echo '<p '. $animate .'>' . $output  . '</p>';
        echo ' </amp-story-grid-layer>';
      }


      
    }
    echo  $output_link;
    ?>


    <!-- END BLOCKS -->
  </amp-story-page>
  <?php
}
?>




</amp-story>
</body>
</html>
