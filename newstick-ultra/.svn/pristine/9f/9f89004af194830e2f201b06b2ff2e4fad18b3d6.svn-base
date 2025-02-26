<?php

if (!defined('ABSPATH')) {
  die;
}
wp_enqueue_style('NSWUP_one', plugins_url( 'css/one.css', dirname(__FILE__) ));
?>

<style>


.NSWUP_marquee ul li a {
  color: <?php echo get_option('NSWUP_col_not'); ?>;
  font:16px/20px Georgia, Garamond, Serif;
  font-weight:500;	
	
}
	
.NSWUP_marquee ul li span {
  color: <?php echo get_option('NSWUP_col_not'); ?>;
}
	
li::after {
  content: ".";
  color: green;
  font-size: 18pt;	
  margin:5px;
  font-weight: 900;
}

.NSWUP_marquee a:visited {
  color: <?php echo get_option('NSWUP_col_not'); ?>;
  text-decoration: none;
}

.NSWUP_marquee a:hover {
  color: <?php echo get_option('NSWUP_col_link'); ?>!important;
  text-decoration: none;
}

.NSWUP-sitewidth {
  background: <?php echo get_option('NSWUP_col_bar'); ?>;
  border-color: <?php echo get_option('NSWUP_col_bar'); ?>	
  border-left: 0px solid !important;
 border-radius:4px;
  position: relative;
  overflow: hidden;
  margin-bottom: 0px;
  margin-top: 0px;
  padding: 5px 10px;
  left: 3px;
  top: 0px;
  height: 38px;
}
	
.NSWUP-title{
  border: solid 1px black;
  border-right: 0 solid!important;
  font-weight:700 !important;	
  color: <?php echo get_option('NSWUP_col_tit'); ?>;
  background-color: <?php echo get_option('NSWUP_col_bar_tit'); ?>;
}

	.NSWUP_design {
		border-color:get_option('NSWUP_col_bar'); ?>
	}
	
#NSWUP_tbox{
  width: <?php echo get_option('NSWUP_dim_barra');?>% ;
}
</style>

<script>

jQuery(function () {
    jQuery('.NSWUP_marquee').marquee({

        allowCss3Support: true,
        speed: 50,
        duplicated: true,
        gap: 60,
        startVisible: true,
        pauseOnHover: true
    });
});

</script>

<?php
    $more_posts = $recent_posts;
    if(count($recent_posts) < 5 )
    {
      $diff = 5/count($recent_posts);
      $diff = intval($diff);
      for($i = 0; $i < $diff; $i++)
      {
        $more_posts = array_merge($more_posts, $recent_posts);
      }
    }
?>
<section id="NSWUP-plist">
  <div id="NSWUP_tbox" class="container NSWUP_design">
    <div class="NSWUP-title"><?php echo get_option('NSWUP_title_content');?></div>
    <div class="NSWUP-sitewidth">
      <div class = "NSWUP_marquee">
        <ul class = "NSWUP_ul">
    <?php if (get_option('NSWUP_text') != "") { 
      echo "<li><span>" . get_option('NSWUP_text') . "</span></li>" ;
    } else {  foreach ($more_posts as $key => $value) : ?>
            <li><a href=<?php echo get_post_permalink($value->ID); ?> > <?php echo $value->post_title; ?></a></li>
            <?php endforeach; }?>
        </ul>
      </div>
    </div>
  </div>
</section>