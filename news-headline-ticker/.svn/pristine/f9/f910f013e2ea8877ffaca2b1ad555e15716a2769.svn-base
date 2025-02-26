<?php
function registernhtPage() {
	add_submenu_page( 'edit.php?post_type=headline', 'News Headline Settings', 'Ticker Settings', 'manage_options', 'news-headline', 'newsHeadLineFunction' ); 
}
add_action('admin_menu', 'registernhtPage');

function newsHeadLineFunction() {
	?>
	
	<div class="newsWrap">
		<h1><?php esc_html_e( 'Headline Newsticker Configurations','nht') ?></h1> 


<div id="nhtLeft">
  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <div class="inside">
      <h3><?php esc_html_e( 'Insert your text & background color','nht') ?></h3>
      <p><?php esc_html_e( 'Just copy and paste <strong>if(function_exists(‘newsHeadLineTkr’)){headLinePost();}</strong> in the template code or <strong>[News-Ticker]</strong> in the post/page where you want to display news head line.','nht') ?></p>
      <table class="form-table">
        <tr>
          <th><label for="nht_effect"><?php _e( 'Effect Type','nht') ?></label></th>
          <td><select name="nht_effect" id="nht_effect">
              <option value="typing" <?php if( get_option('nht_effect') == 'typing'){ echo 'selected="selected"'; } ?>><?php _e( 'Typing','nht') ?></option>
              <option value="fade" <?php if( get_option('nht_effect') == 'fade'){ echo 'selected="selected"'; } ?>><?php _e( 'Fade','nht') ?></option>
              <option value="slide" <?php if( get_option('nht_effect') == 'slide'){ echo 'selected="selected"'; } ?>><?php _e( 'Slide','nht') ?></option>
            </select></td>
        </tr>
        <tr>
          <th><label for="nht_border_radius"><?php _e( 'Border Radius','nht') ?></label></th>
          <td><input type="text" name="nht_border_radius" value="<?php $nht_border_radius = get_option('nht_border_radius'); if(!empty($nht_border_radius)) {echo $nht_border_radius;} else {echo "15";}?>">
            px;</td>
        </tr>
        <tr>
          <th><label for="nht_label"><?php _e( 'Label Text','nht') ?></label></th>
          <td><input type="text" name="nht_label" value="<?php $nht_label = get_option('nht_label'); if(!empty($nht_label)) {echo $nht_label;} else {echo "Breaking News:";}?>"></td>
        </tr>
        <tr>
          <th><label for="nht_label_color"><?php _e( 'Label Text Color','nht') ?></label></th>
          <td><input type="text" name="nht_label_color" id="scrollbar_color" value="<?php $nht_label_color = get_option('nht_label_color'); if(!empty($nht_label_color)) {echo $nht_label_color;} else {echo "#FFF";}?>" class="color-picker nht_label_color" /></td>
        </tr>
        <tr>
          <th><label for="nht_bg_color"><?php _e( 'Background Color','nht') ?> <span>*</span></label></th>
          <td><input type="text" name="nht_bg_color" id="scrollbar_color" value="<?php $nht_bg_color = get_option('nht_bg_color'); if(!empty($nht_bg_color)) {echo $nht_bg_color;} else {echo "#2d81c8";}?>" class="color-picker nht_bg_color" /></td>
        </tr>
        <tr>
          <th><label for="nht_text_color"><?php _e( 'Text Color','nht') ?> <span>*</span></label></th>
          <td><input type="text" name="nht_text_color" id="scrollbar_color" value="<?php $nht_text_color = get_option('nht_text_color'); if(!empty($nht_text_color)) {echo $nht_text_color;} else {echo "#FFF";}?>" class="color-picker nht_text_color" /></td>
        </tr>
        <tr>
          <th><label for="nht_hover_color"><?php _e( 'Text Hover Color','nht') ?></label></th>
          <td><input type="text" name="nht_hover_color" id="scrollbar_color" value="<?php $nht_hover_color = get_option('nht_hover_color'); if(!empty($nht_hover_color)) {echo $nht_hover_color;} else {echo "#FFF";}?>" class="color-picker nht_hover_color" /></td>
        </tr>
      </table>
      <input type="hidden" name="action" value="update" />
      <input type="hidden" name="page_options" value="nht_effect, nht_border_radius, nht_label,  nht_label_color, nht_bg_color, nht_text_color, nht_hover_color" />
      <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Save Changes','nht') ?>" class="button button-primary" />
      </p>
    </div>
  </form>
</div>
<div id="nhtRight">
  <div class="nhtWidget">
    <h3><?php _e('Donate and support the development.','nht') ?></h3>
    <p><?php _e('With your help I can make Simple Fields even better! $5, $10, $100 – any amount is fine! :)','nht') ?></p>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="82C6LTLMFLUFW">
      <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
    </form>
  </div>
  <div class="nhtWidget">
    <h3><?php _e('About the Plugin','nht') ?></h3>
    <p>You can make my day by submitting a positive review on <a href="https://wordpress.org/support/view/plugin-reviews/news-headline-ticker" target="_blank"><strong>WordPress.org!</strong> <img src="<?php bloginfo('url' ); echo"/wp-content/plugins/news-headline-ticker/img/review.png"; ?>" alt="review" class="review"/></a></p>
    <p><strong>View live demo & support of <a href="http://www.e2soft.com/blog/news-headline-ticker/" target="_blank">News Headline Ticker</a> and <a href="https://www.youtube.com/watch?v=1dAKqB-Dr3E/" target="_blank">video tutorial.</a></strong></p>
    <div class="clrFix"></div>
  </div>
  <div class="nhtWidget">
    <div class="clrFix"></div>
    <h3><?php _e('About the Author','nht') ?></h3>
    <p>My name is <strong><a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">S M Hasibul Islam</a></strong> and I am a <strong><a href="http://www.e2soft.com/" target="_blank">Web Developer, Expert WordPress Developer</a></strong>. I am regularly available for interesting freelance projects. If you ever need my help, do not hesitate to get in touch <a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">me</a>.<br />
      <strong>Skype:</strong> cse.hasib<br />
      <strong>Email:</strong> info@e2soft.com<br />
      <strong>Web:</strong> <a href="http://www.e2soft.com/">www.e2soft.com</a><br />
    <div class="clrFix"></div>
  </div>
  <div class="nhtWidget">
    <h3><?php _e('Our Services','nht') ?></h3>
    <?php
	//bdonlinebazar.com
	$bdo_url = array("http://www.bdonlinebazar.com/","http://www.bdonlinebazar.com/products/clothing/","http://www.bdonlinebazar.com/products/electronics/","http://www.bdonlinebazar.com/products/watches/","http://www.bdonlinebazar.com/products/home-living");
	$bdo_random_urls = array_rand($bdo_url);
	
	//e2soft.com
	$e2_url = array("http://www.e2soft.com/web-design/","http://www.e2soft.com/web-design/","http://www.e2soft.com/web-design/","http://www.e2soft.com/portfolio","http://www.e2soft.com/");
	$e2_random_urls = array_rand($e2_url);
	
	//bdtrips.com
	$bdtrips_url = array("http://bdtrips.com/","http://bdtrips.com/hotels/","http://bdtrips.com/tour-packages/","http://bdtrips.com/car-rentals/","http://bdtrips.com/tourist-spots/","http://bdtrips.com/contact/");
	$bdtrips_random_urls = array_rand($bdtrips_url);
	?>
    <a href="<?php echo $e2_url["$e2_random_urls"]; ?>" target="_blank">Website Design & Development</a><br />
    <a href="<?php echo $bdtrips_url["$bdtrips_random_urls"]; ?>" target="_blank">Book your Trips Online</a><br />
    <a href="<?php echo $bdo_url["$bdo_random_urls"]; ?>" target="_blank">Online Shopping Bangladesh</a><br />
    <!--<iframe class="border_1" src="<?php echo $bdo_url["$bdo_random_urls"]; ?>" width="320" height="300"> </iframe>-->
    <div class="clrFix"></div>
  </div>
</div>
<div class="clrFix"></div>
<?php		
	echo '</div>';
}


