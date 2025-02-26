<?php
//exit if directly accessed
if (!defined('ABSPATH')) {
exit;
}?>
<?php
//function to add shortcode
function customclientshowcase_fun($atts = [], $sp_ret = null)
{
  wp_enqueue_script('jquery');
  wp_register_script('owl_js', CCSCCS_PLUGIN_PATH.'owl-carousel/owl.carousel.min.js', array('jquery'));
  wp_enqueue_script('owl_js');
  wp_register_script('spspsp_own', CCSCCS_PLUGIN_PATH.'js/spspsp-moneyme.js', array('jquery','owl_js'));
  wp_enqueue_script('spspsp_own');
  wp_register_style('owl_css', CCSCCS_PLUGIN_PATH.'owl-carousel/owl.carousel.css', array());
  wp_enqueue_style('owl_css');
  wp_register_style('owl_theme', CCSCCS_PLUGIN_PATH.'owl-carousel/owl.theme.default.min.css', array());
  wp_enqueue_style('owl_theme');
  wp_register_style('custom_css_owl', CCSCCS_PLUGIN_PATH.'css/owl.theme.css', array());
  wp_enqueue_style('custom_css_owl');

  wp_register_style('custom_css_moneyme', CCSCCS_PLUGIN_PATH.'css/spspsp-moneyme.css', array('owl_css'));
  wp_enqueue_style('custom_css_moneyme');
  
  $sp_ret = '<!-- Carousel starts here mf -->
  <div id="owlimgslider-spspsp" class="owl-carousel">';
  $query = array('post_type' => 'spspsp_client');
  $loop = new WP_Query($query);
  while ($loop->have_posts()) {
                    $loop->the_post();
                    $sp_ret .= '<div class="item-spspsp">
                        <div class="container-spspsp">
                          <img src="'.get_the_post_thumbnail_url().'" alt="image" class="image-spspsp">
                          <div class="middle-spspsp">
                            <div class="text-spspsp"><a href="'.get_the_permalink().'" class="visit-mf-spspsp">Visit</a></div>
                          </div>
                        </div>
                      </div>';
                }
   $sp_ret .= '</div>
  <!-- Carousel ends here mf -->';
  return $sp_ret;


}
add_shortcode('spcarousel_show' , 'customclientshowcase_fun');
?>