<?php
//Add twb_aweber_optin_widget
class twb_aweber_optin_widget extends WP_Widget
{
    //Register Widget
    function __construct()
    {
        parent::__construct('twb_aw_widget', // Base ID
            __('Simple Aweber Optin Widget - Lite Version', 'text_domain'), // Name
            array(
            'description' => __('Custom Widget that adds an aweber optin form on site. You can add an unlimited number of forms using this widget plugin. The form design and look can be easily controlled in the widget settings. Its Responsive , very Easy to Use and comes with Powerful Features. The aweber forms created by this widget plugin are completely responsive and does not load javascripts and css from aweber server.', 'twb_aweber_optin_widget', 'text_domain')
        ) // Args
            );
    }
    public function widget($args, $instance)
    {
        $twb_bg_color            = strip_tags($instance['twb_bg_color']);
        $twb_top_img             = $instance['twb_top_img'];
        $twb_main_title          = $instance['twb_main_title'];
        $twb_sub_title           = $instance['twb_sub_title'];
        $twb_list_name           = strip_tags($instance['twb_list_name']);
        $twb_ty_link             = strip_tags($instance['twb_ty_link']);
        $twb_onlist_redirect_url = strip_tags($instance['twb_onlist_redirect_url']);
        $twb_name_check          = strip_tags($instance['twb_name_check'] ? 'true' : 'false');
        $twb_ph_name             = strip_tags($instance['twb_ph_name']);
        $twb_ph_email            = strip_tags($instance['twb_ph_email']);
        $twb_btn_check           = strip_tags($instance['twb_btn_check'] ? 'true' : 'false');
        $twb_btn_img             = $instance['twb_btn_img'];
        $twb_ph_btn              = strip_tags($instance['twb_ph_btn']);
        $twb_ph_btn_color        = strip_tags($instance['twb_ph_btn_color']);
        $twb_ph_btn_txt_color    = strip_tags($instance['twb_ph_btn_txt_color']);
        echo $args['before_widget'];
        $twb_widget_ID = $this->id_base . '-' . $this->number;
?>
<script>
		jQuery(document).ready(function($) {
			$('form#<?php
        echo $twb_widget_ID;
?>').each(function() {
        		$(this).validate({       // initialize plugin on each form
        		});
    		});
		});
	</script>
<style type="text/css">
.widget_twb_aw_widget .twb_sub_title p {
	font-size: 20px;
color:<?php
        echo esc_attr('#f4f4f4');
?>;
}
</style>
<div class="twb_widget_wrapper">
  <div class="twb_widget" style="background:<?php
        echo esc_attr($twb_bg_color);
?>">
    <div class="twb_main_title" style="color:<?php
        echo esc_attr('#ffffff');
?>; font-size:<?php
        echo esc_attr('30px');
?>;"> <?php
        echo $twb_main_title;
?></div>
    <div class="twb_sub_title" style="color:<?php
        echo esc_attr('#f4f4f4');
?>;"><?php
        echo $twb_sub_title;
?></div>
    <?php
        $output = '<form class="twb_wrapper" id="' . $twb_widget_ID . '" method="post" name="' . $twb_widget_ID . '"  action="//www.aweber.com/scripts/addlead.pl">';
        $output .= '<div style="display: none;">
			<input type="hidden" name="meta_split_id" value="" />
			<input type="hidden" name="listname" value="' . $twb_list_name . '" />
			<input type="hidden" name="redirect" value="' . $twb_ty_link . '" id="" />
			<input type="hidden" name="meta_redirect_onlist" value="' . $twb_onlist_redirect_url . '" /></div>';
        if ($twb_name_check == 'true') {
            $output .= '<input type="text" id="" name="name" placeholder="' . $twb_ph_name . '"class="twb_name" value="" minlength=3 />';
        }
        $output .= '<input type="email" class="twb_email" id="" name="email" placeholder="' . $twb_ph_email . '" minlength=3 required />';
        if (!"" == $twb_btn_img) {
            $output .= '<input type="image" name="submit" class="twb_btn_img" src="' . $twb_btn_img . '" style="margin:5px auto; padding:5px 0;" />';
        } else {
            $output .= '<input type="submit" name="submit" style="background:' . $twb_ph_btn_color . '; color:' . $twb_ph_btn_txt_color . '; margin:5px 0; padding:15px;" class="twb_btn" value="' . $twb_ph_btn . '" />';
        }
        $output .= '<div class="spam-notice" style="color:#ffffff">We hate spam as much as you do!</div></form>';
        echo $output;
?>
  </div>
</div>
<?php
        echo $args['after_widget'];
    }
    //Previously saved values from database.
    public function form($instance)
    {
        $instance                = wp_parse_args((array) $instance, array(
            'twb_bg_color' => '#F60',
            'twb_top_img' => '',
            'twb_main_title' => 'Want to Learn How to Use Wordpress?',
            'twb_sub_title' => '<p>Enter Your Email Below to Get Started!</p>',
            'twb_list_name' => '',
            'twb_ty_link' => '',
            'twb_name_check' => 'off',
            'twb_ph_name' => 'Enter Your Name',
            'twb_ph_email' => 'Enter Your Best Email',
            'twb_btn_check' => 'off',
            'twb_btn_img' => '',
            'twb_ph_btn' => 'Yes! Let Me In',
            'twb_ph_btn_color' => '#000000',
            'twb_ph_btn_txt_color' => '#ffffff',
            'twb_onlist_redirect_url' => ''
        ));
        $twb_bg_color            = strip_tags($instance['twb_bg_color']);
        $twb_top_img             = $instance['twb_top_img'];
        $twb_main_title          = $instance['twb_main_title'];
        $twb_sub_title           = $instance['twb_sub_title'];
        $twb_list_name           = strip_tags($instance['twb_list_name']);
        $twb_ty_link             = strip_tags($instance['twb_ty_link']);
        $twb_name_check          = strip_tags($instance['twb_name_check'] ? 'true' : 'false');
        $twb_ph_name             = strip_tags($instance['twb_ph_name']);
        $twb_ph_email            = strip_tags($instance['twb_ph_email']);
        $twb_btn_check           = strip_tags($instance['twb_btn_check'] ? 'true' : 'false');
        $twb_btn_img             = $instance['twb_btn_img'];
        $twb_ph_btn              = strip_tags($instance['twb_ph_btn']);
        $twb_ph_btn_color        = strip_tags($instance['twb_ph_btn_color']);
        $twb_ph_btn_txt_color    = strip_tags($instance['twb_ph_btn_txt_color']);
        $twb_onlist_redirect_url = strip_tags($instance['twb_onlist_redirect_url']);
?>
<style type="text/css">
.twbheader{
	background:#efefef; padding:10px; color:#000;
	display:block;
	margin:20px 0;
}

.twbsection {
	display:block;
	margin-bottom:15px;
}

.twbsection input{
	margin:5px 0;
}

.twbcheck1, .twbcheck2, .twbcheck3, .twbcheck4  {
  display: none;
}

.twb_check1:checked + label + .twbcheck1,
.twb_check2:checked + label + .twbcheck2,
.twb_check3:checked + label + .twbcheck3,
.twb_check4:checked + label + .twbcheck4 {
  display: block;
}

.twb_check4:checked + label + .twbcheck4 + .twbcheck4hide {
	display:none;
}

</style>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		function initColorPicker( widget ) {
			widget.find( '.twb_color_picker' ).wpColorPicker( {
					change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
					}, 3000 )
			});
		}

		function onFormUpdate( event, widget ) {
			initColorPicker( widget );
		}

		$( document ).on( 'widget-added widget-updated', onFormUpdate );

		$( document ).ready( function() {
			$( '#widgets-right .widget:has(.twb_color_picker)' ).each( function () {
					initColorPicker( $( this ) );
			});
		});
	});
</script> 

<!-- General Settings -->
<div class="twbheader">(1) <a href="javascript:;" onclick="jQuery(this).parent().next('div').slideToggle();"><strong>Settings</strong></a></div>
<div>
  <div class="twbsection">
    <label for="<?php
        echo $this->get_field_id('twb_list_name');
?>">
      <?php
        _e('Aweber List ID *(Required)');
?>
    </label>
    <br />
    <input type="text" id="<?php
        echo $this->get_field_id('twb_list_name');
?>" name="<?php
        echo $this->get_field_name('twb_list_name');
?>" value="<?php
        echo $instance['twb_list_name'];
?>" style="width:60%;" />
    <br>
    Input Unique List ID <a target="_blank" href="https://help.aweber.com/hc/en-us/articles/204028426-What-Is-The-Unique-List-ID-">Click Here to see where to find it.</a> </div>
  <div class="twbsection">
    <label>
      <?php
        _e('Top Image URL');
?>
    </label>
    <input type="text" disabled style="width:90%;" />
    <br />
    <strong>Available in Pro Version!</strong></div>
  <div class="twbsection">
    <label for="<?php
        echo $this->get_field_id('twb_main_title');
?>">
      <?php
        _e('Main Title');
?>
    </label>
    <input id="<?php
        echo $this->get_field_id('twb_main_title');
?>" name="<?php
        echo $this->get_field_name('twb_main_title');
?>" value="<?php
        echo esc_attr($twb_main_title);
?>" style="width:90%;" />
  </div>
  <div class="twbsection">
    <label for="<?php
        echo $this->get_field_id('twb_sub_title');
?>">
      <?php
        _e('Sub Title');
?>
      (HTML is allowed)</label>
    <textarea rows="10" id="<?php
        echo $this->get_field_id('twb_sub_title');
?>" name="<?php
        echo $this->get_field_name('twb_sub_title');
?>" style="width:90%;" ><?php
        echo wpautop($instance['twb_sub_title']);
?> 
</textarea>
  </div>
  <div class="twbsection">
    <label for="<?php
        echo $this->get_field_id('twb_ty_link');
?>">
      <?php
        _e('Link to the Thank you page');
?>
    </label>
    <input id="<?php
        echo $this->get_field_id('twb_ty_link');
?>" name="<?php
        echo $this->get_field_name('twb_ty_link');
?>" value="<?php
        echo $instance['twb_ty_link'];
?>" style="width:90%;" />
    <br />
    Leave empty if you want to use Aweber's default thank you page. </div>
</div>
<!-- General Settings --> 

<!-- Optin Look -->
<div class="twbheader">(2) <a href="javascript:;" onclick="jQuery(this).parent().next('div').slideToggle();"><strong>Design and Look</strong></a></div>
<div>
  <div class="twbsection">
    <label style="display:block; padding-bottom:5px;" for="<?php
        echo $this->get_field_id('twb_bg_color');
?>">
      <?php
        _e('Optin Background Color');
?>
    </label>
    <input class="twb_color_picker twb-bg-color" id="<?php
        echo $this->get_field_id('twb_bg_color');
?>" name="<?php
        echo $this->get_field_name('twb_bg_color');
?>" type="text" value="<?php
        echo $instance['twb_bg_color'];
?>" />
    <div class="twb_bg_color" rel="<?php
        echo $this->get_field_id('twb_bg_color');
?>"></div>
  </div>
  <div class="twbsection">
    <label>
      <?php
        _e('Main Title Color');
?>
    </label>
    <br>
    <input type="text" value="#ffffff" disabled />
    <br>
    <strong>Available in Pro Version!</strong> </div>
  <div class="twbsection">
    <label>
      <?php
        _e('Main Title Font Size');
?>
    </label>
    <input type="text" value="30px" disabled style="width:90%;" />
    <br>
    <strong>Available in Pro Version!</strong> </div>
  <div class="twbsection">
    <label>
      <?php
        _e('Sub Title Color');
?>
    </label>
    <br>
    <input type="text" value="#f4f4f4" disabled/>
    <br>
    <strong>Available in Pro Version!</strong> </div>
  <div class="twbsection">
    <label>
      <?php
        _e('Inputs Fields Height');
?>
    </label>
    <input type="text" value="45px" disabled style="width:90%;" />
    <br>
    <strong>Available in Pro Version!</strong> </div>
  <div class="twbsection">
    <input class="" type="checkbox" id="" name="" disabled checked />
    <label>
      <?php
        _e('Email Field (Always enabled)');
?>
    </label>
  </div>
  <div class="twbsection">
    <label for="<?php
        echo $this->get_field_id('twb_ph_email');
?>">
      <?php
        _e('Placeholder Text For Email Field');
?>
    </label>
    <input type="text" id="<?php
        echo $this->get_field_id('twb_ph_email');
?>" name="<?php
        echo $this->get_field_name('twb_ph_email');
?>" value="<?php
        echo $instance['twb_ph_email'];
?>" style="width:90%;" />
  </div>
  <div class="twbsection">
    <input class="twb_check1" type="checkbox" <?php
        checked($instance['twb_name_check'], 'on');
?> id="<?php
        echo $this->get_field_id('twb_name_check');
?>" name="<?php
        echo $this->get_field_name('twb_name_check');
?>" />
    <label for="<?php
        echo $this->get_field_id('twb_name_check');
?>">
      <?php
        _e('Enable Full Name Field');
?>
    </label>
    <div class="twbcheck1">
      <label for="<?php
        echo $this->get_field_id('twb_ph_name');
?>">
        <?php
        _e('Placeholder Text For Full Name Field');
?>
      </label>
      <input type="text" id="<?php
        echo $this->get_field_id('twb_ph_name');
?>" name="<?php
        echo $this->get_field_name('twb_ph_name');
?>" value="<?php
        echo $instance['twb_ph_name'];
?>" style="width:90%;" />
    </div>
  </div>
  <div class="twbsection"><strong>OR</strong></div>
  <div class="twbsection">
    <input type="checkbox" disabled checked />
    <label>
      <?php
        _e('Enable First Name Field');
?>
    </label>
    <br>
    <strong>Available in Pro Version!</strong> </div>
  <div class="twbsection">
    <input type="checkbox" disabled checked />
    <label>
      <?php
        _e('Enable Last Name Field');
?>
    </label>
    <br>
    <strong>Available in Pro Version!</strong> </div>
  <div class="twbsection">
    <input type="checkbox" checked disabled />
    <label>
      <?php
        _e('Custom Fields (Coming Soon)');
?>
    </label>
  </div>
  <div class="twbsection">
    <input class="twb_check4" type="checkbox" <?php
        checked($instance['twb_btn_check'], 'on');
?> id="<?php
        echo $this->get_field_id('twb_btn_check');
?>" name="<?php
        echo $this->get_field_name('twb_btn_check');
?>" />
    <label for="<?php
        echo $this->get_field_id('twb_btn_check');
?>">
      <?php
        _e('Use Button Image Instead');
?>
    </label>
    <div class="twbcheck4">
      <input id="<?php
        echo $this->get_field_id('twb_btn_img');
?>" name="<?php
        echo $this->get_field_name('twb_btn_img');
?>" value="<?php
        echo esc_attr($twb_btn_img);
?>" placeholder="Button Image URL" style="width:90%;" />
      <br />
      You can generate a free button image <a target="_blank" href="http://buttonoptimizer.com/">HERE</a> </div>
    <div class="twbcheck4hide" style="margin-top:15px;">
      <label for="<?php
        echo $this->get_field_id('twb_ph_btn');
?>">
        <?php
        _e('Submit Button Text');
?>
      </label>
      <input type="text" id="<?php
        echo $this->get_field_id('twb_ph_btn');
?>" name="<?php
        echo $this->get_field_name('twb_ph_btn');
?>" value="<?php
        echo $instance['twb_ph_btn'];
?>" style="width:90%;" />
      <label style="display:block; padding-top:5px; padding-bottom:5px;" for="<?php
        echo $this->get_field_id('twb_ph_btn_color');
?>">
        <?php
        _e('Button Color:');
?>
      </label>
      <input class="twb_color_picker twb" id="<?php
        echo $this->get_field_id('twb_ph_btn_color');
?>" name="<?php
        echo $this->get_field_name('twb_ph_btn_color');
?>" type="text" value="<?php
        echo $instance['twb_ph_btn_color'];
?>" />
      <div class="twb_btn_color" rel="<?php
        echo $this->get_field_id('twb_ph_btn_color');
?>"></div>
      <label style="display:block; padding-bottom:5px;" for="<?php
        echo $this->get_field_id('twb_ph_btn_txt_color');
?>">
        <?php
        _e('Button Text Color:');
?>
      </label>
      <input class="twb_color_picker twb-btn-txt-color" id="<?php
        echo $this->get_field_id('twb_ph_btn_txt_color');
?>" name="<?php
        echo $this->get_field_name('twb_ph_btn_txt_color');
?>" type="text" value="<?php
        echo $instance['twb_ph_btn_txt_color'];
?>" />
      <div class="twb_btn_txt_color" rel="<?php
        echo $this->get_field_id('twb_ph_btn_txt_color');
?>"></div>
    </div>
  </div>
  <div class="twbsection">
    <label>
      <?php
        _e('Privacy Text');
?>
    </label>
    <input type="text" value="We hate spam as much as you do!" disabled style="width:90%;" />
    <br>
    <strong>Available in Pro Version!</strong> </div>
  <div class="twbsection">
    <label>
      <?php
        _e('Privacy Text Color:');
?>
    </label>
    <br>
    <input type="text" value="#ffffff" disabled />
    <br>
    <strong>Available in Pro Version!</strong> </div>
</div>
<!-- Optin Design --> 

<!-- Advanced -->
<div class="twbheader">(4) <a href="javascript:;" onclick="jQuery(this).parent().next('div').slideToggle();"><strong>Advanced Options</strong></a></div>
<div>
  <div class="twbsection">
    <label>
      <?php
        _e('Aweber Form ID');
?>
    </label>
    <br />
    <input type="text" disabled style="width:50%;" />
    <br>
    If you want to associate optins with a specific form<br />
    <strong>Available in Pro Version!</strong> </div>
  <div class="twbsection">
    <label>
      <?php
        _e('Meta Tracking ID');
?>
    </label>
    <br />
    <input type="text" disabled style="width:90%;" />
    Add meta tracking ID here<br>
    <strong>Available in Pro Version!</strong> </div>
  <div class="twbsection">
    <label for="<?php
        echo $this->get_field_id('twb_onlist_redirect_url');
?>">
      <?php
        _e('Redirect Already Subscribed Users to Following URL');
?>
    </label>
    <br />
    <input id="<?php
        echo $this->get_field_id('twb_onlist_redirect_url');
?>" name="<?php
        echo $this->get_field_name('twb_onlist_redirect_url');
?>" value="<?php
        echo $instance['twb_onlist_redirect_url'];
?>" style="width:90%;" />
  </div>
  <div class="twbsection">
    <label>
      <?php
        _e('Custom CSS');
?>
    </label>
    <br />
    <textarea disabled rows="5" style="width:90%;padding: 10px;background-color: #FDFDFD;">Available in Pro Version!</textarea>
  </div>
</div>
<!-- Advanced -->

<div style="clear:both; padding-bottom:10px;"></div>
<a href="//plugins.theweb-designs.com/simple-aweber-optin-widget/" target="_blank" title="Buy Pro Version">
  <h2>Buy Pro Version $7 only!</h2>
</a>
<div style="clear:both; padding-bottom:30px;"></div>
<?php
    }
    //Sanitize widget form values as they are saved.
    public function update($new_instance, $old_instance)
    {
        $instance                            = array();
        $instance['twb_bg_color']            = strip_tags($new_instance['twb_bg_color']);
        $instance['twb_top_img']             = $new_instance['twb_top_img'];
        $instance['twb_main_title']          = $new_instance['twb_main_title'];
        $instance['twb_sub_title']           = wpautop($new_instance['twb_sub_title']);
        $instance['twb_list_name']           = strip_tags($new_instance['twb_list_name']);
        $instance['twb_ty_link']             = $new_instance['twb_ty_link'];
        $instance['twb_name_check']          = $new_instance['twb_name_check'];
        $instance['twb_ph_name']             = strip_tags($new_instance['twb_ph_name']);
        $instance['twb_ph_email']            = strip_tags($new_instance['twb_ph_email']);
        $instance['twb_btn_check']           = $new_instance['twb_btn_check'];
        $instance['twb_btn_img']             = $new_instance['twb_btn_img'];
        $instance['twb_ph_btn']              = strip_tags($new_instance['twb_ph_btn']);
        $instance['twb_ph_btn_color']        = strip_tags($new_instance['twb_ph_btn_color']);
        $instance['twb_ph_btn_txt_color']    = strip_tags($new_instance['twb_ph_btn_txt_color']);
        $instance['twb_onlist_redirect_url'] = strip_tags($new_instance['twb_onlist_redirect_url']);
        return $instance;
    }
} // class twb_aweber_optin_widget
function twb_aweber_optin()
{
    register_widget('twb_aweber_optin_widget');
}
add_action('widgets_init', 'twb_aweber_optin');
