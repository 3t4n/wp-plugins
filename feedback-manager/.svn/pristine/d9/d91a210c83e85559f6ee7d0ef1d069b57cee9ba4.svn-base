<?php
/*
Plugin Name: Feedback Plugin
Plugin URI: https://bizchatbox.com
Description: Feedback Plugin.
Version: 1.0
Author: bizchatbox.com
Author URI: https://www.bizchatbox.com/
*/

$znfp_domain = plugins_url();
add_action('init', 'znfp_init');
add_action('admin_notices', 'znfp_notice');
add_filter('plugin_action_links', 'znfp_plugin_actions', 10, 2);
add_action('wp_footer', 'znfp_insert',4);

add_action('wp_enqueue_scripts', 'znfp_register_plugin_fontstyles');
add_action('wp_enqueue_scripts', 'znfp_register_plugin_styles');
add_action('wp_enqueue_scripts', 'znfp_add_validate_js' );


function znfp_add_validate_js() {
   	wp_enqueue_script('feedbackvalidationJs', plugins_url('js/jQuery.Validate.min.js',__FILE__),'','',true);
}

function znfp_register_plugin_fontstyles() {
	wp_register_style('feedbackAwCss', plugins_url('css/font-awesome.min.css',__FILE__));
	wp_enqueue_style('feedbackAwCss');
}

function znfp_register_plugin_styles() {
	wp_register_style('feedbackStyle', plugins_url('css/feedback.css',__FILE__));
	wp_enqueue_style('feedbackStyle');
}

function znfp_init() {
    if(function_exists('current_user_can') && current_user_can('manage_options')) {
        add_action('admin_menu', 'znfp_add_settings_page');
    }
}

function znfp_insert() {
    global $current_user;

?>
<?php if(get_option('znfp_widgetID')!="") { ?>
<a id="un-button" href="javascript:void(0)" class="un-bottom css3" style="background: <?php echo(get_option('znfp_tab_color')) ?> !important;"> <i class="icon-list-alt"></i> <?php echo(get_option('znfp_tab_text')) ?></a>
<?php } ?>
<script>
jQuery(document).ready(function($) {
	jQuery('#window').hide();
	jQuery('#un-feedback-form-wrapper').show(); 
	jQuery('#un-button').click(function($) {
	  jQuery('#window').after("<div id='un-overlay'></div>");
	  jQuery('#window').show();	
	  jQuery('#un-feedback-form-wrapper').show();
	  jQuery('#un-thankyou').hide(); 
	  return false;  
	});
	
	jQuery("#window-close").click(function() {
     	jQuery("#un-overlay").fadeOut(function() {
          jQuery("#un-overlay").remove();
        });
        jQuery("#un-loading").remove();
       	jQuery("#window").fadeOut("fast");
      return false;
    });
	
	$(".un-feedback-type").on( "click", function() {
		$(".un-feedback-type").removeClass('selected');
		$(this).addClass('selected');
		$('#fb-tickettype').val($(this).attr('data-type'));
	});
	  
	
	 $("#frmfeedback").validate({
	 	 submitHandler: function(form) {
				$('#un-feedback-loader').show();
				var fbtitle= $('#fb-title').val();
				var fbemail= $('#fb-email').val();
				var fbtickettype= $('#fb-tickettype').val();
				var fbdescription= $('#fb-description').val();
				var url = $('#frmfeedback').attr('action');
				$.ajax({
				   type: 'POST',
				   url: url,
				   
				 data: { "method":"AddTicket", "Authtoken":"<?php echo(get_option('znfp_widgetID')) ?>", "assignedto":"Dennis", "status":"Open", "Priority":"Very+High", "from":fbemail, "sendto":"feedback+cneter", "tickettype":fbtickettype, "subject":fbtickettype+": ["+fbtitle+"]", "body":fbdescription }, 
					 
					 
					success: function(json) {
						
					if (json !='') {
						$('#un-feedback-loader').hide(); 
						$('#un-feedback-form-wrapper').hide(); 
						$('#un-thankyou').show(); 
					}
					else {
						$('#un-feedback-loader').hide(); 
						$('#un-feedback-form-wrapper').hide(); 
						$('#un-thankyou').show(); 
					}
					},
					error: function(e) {
					   
					}
			  });
		  }
	 });
	
	

});
</script>
<div class="css3 arial" id="window" style="margin-top: -225.5px; margin-left: -210px;display:none"> <a title="Close" href="#" id="window-close">Close</a>
  <div class="clearfix" id="viewport">
    <div id="un-feedback-wrapper">
      <div id="un-feedback-form-wrapper">
        <h2> <?php echo(get_option('znfp_header_text')) ?> </h2>
        <p><?php echo(get_option('znfp_intro_text')) ?></p>
        <form class="un-feedback-form" id="frmfeedback" method="post" action="<?php echo plugins_url( 'submitfeedback.php', __FILE__ ); ?>">
          <div class="un-types-wrapper"> 
          	<a data-type="idea" class="un-feedback-type selected" href="#"><i class="icon-lightbulb"></i>Idea</a> 
            <a data-type="question" class="un-feedback-type" href="#"><i class="icon-question-sign"></i>Question</a> 
            <a data-type="problem" class="un-feedback-type" href="#"><i class="icon-exclamation-sign"></i>Problem</a> 
            <a data-type="praise" class="un-feedback-type" href="#"><i class="icon-heart"></i>Praise</a>
            <input type="hidden" name="fbtickettype" value="praise" id="fb-tickettype" />
          </div>
          <textarea name="fbdescription" class="text text-empty required" id="fb-description" placeholder="Your feedback"></textarea>
          
          <input type="text" name="fbtitle" value="" class="text text-empty required" id="fb-title" placeholder="Short summary"/>
          
          <input type="text" name="fbemail" value="" class="text text-empty required email" id="fb-email" placeholder="Your email (will not be published)" />
          
          <input type="submit" id="fb-feedback-submit" value="Submit feedback" class="un-submit">
          
          &nbsp;<img style="display: none;" class="loader" id="un-feedback-loader" src="<?php echo plugins_url( 'images/loader.gif',__FILE__);?>">
          <div style="display: none;" class="un-feedback-errors-wrapper">
            <div class="un-errors"></div>
          </div>
        </form>
      </div>
      <div style="display: none;" id="un-thankyou">
        <h2>Thank you</h2>
        <p> Your feedback has been received. </p>
        <a id="un-feedback-close" href="#"><img width="32" height="32" alt="Close" id="thankyou-image" src="<?php echo plugins_url( 'images/ok.png',__FILE__);?>"></a> </div>
    </div>
  </div>
</div>

<?php
}

function znfp_notice() {
    if(!get_option('znfp_widgetID')) echo('<div class="error"><p><strong>'.sprintf(__('Your Feedback Plugin is disabled. Please go to the <a href="%s">plugin settings</a>.   If you already register please login and get widget key.  New to Bizchatbox.com?  <a href="http://www.Bizchatbox.com" target="_blank">Sign up !</a>' ), admin_url('options-general.php?page=user-feedback')).'</strong></p></div>');
}

function znfp_plugin_actions($links, $file) {
    static $this_plugin;
    if(!$this_plugin) $this_plugin = plugin_basename(__FILE__);
    if($file == $this_plugin && function_exists('admin_url')) {
        $settings_link = '<a href="'.admin_url('options-general.php?page=user-feedback').'">'.__('Settings', $znfp_domain).'</a>';
        array_unshift($links, $settings_link);
    }
    return($links);
}

function znfp_add_settings_page() {
    function znfp_settings_page() {
        global $znfp_domain ?>
<div class="wrap">
  <?php screen_icon() ?>
  <h2>
    <?php _e('Feedback Plugin', $znfp_domain) ?>
  </h2>
  <div class="metabox-holder meta-box-sortables ui-sortable pointer">
    <div class="postbox" style="float:left;width:30em;margin-right:10px">
      <h3 class="hndle"><span>
        <?php _e('User Feedback Settings', $znfp_domain) ?>
        </span></h3>
      <div class="inside" style="padding: 0 10px">
        <form id="saveSettings" method="post" action="options.php">
          <p style="text-align:center">
            <?php wp_nonce_field('update-options') ?>
            <a href="http://www.bizchatbox.com" title="Feedback Plugin that help grow your business"> <?php echo '<img src="'.plugins_url( 'logo.png' , __FILE__ ).'" height="150"  "/> ';?></a></p>
          <p>
            <label for="znfp_widgetID"><?php printf(__('BizChatBox Feedback Plugin is a user feedback platform that helps you engage visitors and grow your business with simple, effective plugins. Please visit <a href=\'http://www.Bizchatbox.com\' target=\'_blank\'>Bizchatbox.com</a>  to learn more.<br>', $znfp_domain), '<strong><a href="http://www.Bizchatbox.com/" title="', '">', '</a></strong>') ?></label>
            <br />
            
            <input type="text" name="znfp_widgetID" id="znfp_widgetID" placeholder="Your Widget Key" value="<?php echo(get_option('znfp_widgetID')) ?>" style="width:100%; display:none; " />

    <?php if(get_option('znfp_widgetID')!="") { ?> 
     <script>
      jQuery(document).ready(function($) { 
       $("#znfp_widgetID").attr("disabled", "disabled");  });
    </script>

<?php } ?>

            <input type="hidden" name="znfp_tab_text" id="znfp_tab_text" value="Leave Feedback"/>
          <p class="submit" style="padding:0">
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="znfp_widgetID,znfp_tab_text" />
            <input type="submit" style="display: none;" name="znfp_submit" id="znfp_submit" value="<?php _e('Save Settings', $znfp_domain) ?>" class="button-primary" />
          </p>
        </form>
      </div>
    </div>
    <div class="postbox" style="float:left;width:38em">
      <h3 class="hndle"><span id="znfp_noAccountSpan">
        <?php _e('Sign in', $znfp_domain) ?>
        </span></h3>
      <div id="znfp_register" class="inside" style="padding: -30px 10px">
        <p><?php printf(__('Your Feedback Plugin is disabled. If you already register please login and get widget key. New to Bizchatbox.com?  <a href="http://www.Bizchatbox.com" target="_blank">Sign up !</a>', $znfp_domain), '<a href="
http://www.Bizchatbox.com/" title="', '">', '</a>') ?></p>
        <b>Sign IN!</b> <br>
        <input type="text" name="znfp_email" id="znfp_email" value="<?php echo(get_option('admin_email')) ?>" placeholder="Your Email" style="width:50%;margin:3px;" />
        <input type="password" name="znfp_password" id="znfp_password" value="" placeholder="Your Password" style="width:50%;margin:3px;" />
        <br>
        <input type="button" name="znfp_inputRegister" id="znfp_inputRegister" value="Login" class="button-primary" style="margin:3px;" />
      </div>
      <div id="znfp_registerComplete" class="inside" style="padding: -20px 10px;display:none;">
        <p>View user feedback responses and customize text, language, feedback categories, and CSS styles on our website at <a href='http://www.Bizchatbox.com'>www.Bizchatbox.com</a> </p>
        <form id='saveDetailSettings' method="post" action="options.php">
          <?php wp_nonce_field('update-options') ?>
          <input type="hidden" name="action" value="update" />
          <input type="hidden" name="page_options" value="znfp_background_img, znfp_rounded_corners, znfp_popup_width, znfp_popup_height, znfp_tab_text,znfp_tab_placement,znfp_header_text,znfp_intro_text,znfp_rating_text,znfp_feedback_text,znfp_time_on_page,znfp_tab_color" />
          <table width="100%" >
            <tr>
              <td width="25%">Tab Text: </td>
              <td ><?php
		if(get_option('znfp_tab_text') ) {
     		?>
                <input type="text" name="znfp_tab_text" id="znfp_tab_text" value="<?php echo(get_option('znfp_tab_text')) ?>" style="margin:3px;width:100%;" />
                <?php 
			} else {
   		?>
                <input type="text" name="znfp_tab_text" id="znfp_tab_text" value="Leave Feedback" style="margin:3px;width:100%;" />
                <?php 
			}
   		?></td>
            </tr>
            <tr>
              <td width="25%">Tab Color: </td>
              <td ><?php
		if(get_option('znfp_tab_color') && get_option('znfp_tab_color') != '') {
     		?>
                <input type="text" name="znfp_tab_color" id="znfp_tab_color" value="<?php echo(get_option('znfp_tab_color')) ?>" style="margin:3px;width:100%;" />
                <?php 
			} else {
   		?>
                <input type="text" name="znfp_tab_color" id="znfp_tab_color" value="#4eb478" style="margin:3px;width:100%;" />
                <?php 
			}
   		?></td>
            </tr>
           
           
            <tr>
              <td>Header Text: </td>
              <td><?php 
		if(get_option('znfp_header_text') && get_option('znfp_header_text') != '') {
     		?>
                <input type="text" name="znfp_header_text" id="znfp_header_text" value="<?php echo(get_option('znfp_header_text')) ?>" style="margin:3px;width:100%;" />
                <?php 
			} else {
   		?>
                <input type="text" name="znfp_header_text" id="znfp_header_text" value="Have Feedback For Us?" style="margin:3px;width:100%;" />
                <?php 
			}
   		?></td>
            </tr>
            <tr>
              <td>Intro Text: </td>
              <td><?php 
		if(get_option('znfp_intro_text') && get_option('znfp_intro_text') != '') {
     		?>
                <textarea rows="2" name="znfp_intro_text" id="znfp_intro_text" style="margin:3px;width:100%;"><?php echo(get_option('znfp_intro_text')) ?></textarea>
                <?php 
			} else {
   		?>
                <textarea rows="2" name="znfp_intro_text" id="znfp_intro_text" style="margin:3px;width:100%;">Please tell us what do you think, any kind of feedback is highly appreciated.</textarea>
                <?php 
			}
   		?></td>
            </tr>
           
              </td>
            
            <tr>
              <td></td>
              <td><input id='znfp_inputSaveSettings' type="button" value="<?php _e('Save Settings', $znfp_domain) ?>" class="button-primary" />
                <br>
                <small >If you don't see your latest settings reflected in your site, please refresh your browser cache
                or close and open the browser. </small></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
jQuery(document).ready(function($) {

var znfp_wid= $('#znfp_widgetID').val();
if (znfp_wid=='') 
{}
else
{
	$( "#znfp_register" ).hide();
	$( "#znfp_registerComplete" ).show();
        $( "#znfp_widgetID" ).show();
       
	$( "#znfp_noAccountSpan" ).html("Configure your User Feedback Widget");

}
$(document).on("click", "#znfp_inputSaveSettings", function () {

var znfp_wid= $('#znfp_widgetID').val();
var znfp_tt= $('#znfp_tab_text').val();
var znfp_ht= encodeURIComponent($('#znfp_header_text').val());
var znfp_intro= encodeURIComponent($('#znfp_intro_text').val());
var znfp_rating= $('#znfp_rating_text').val();
var znfp_fb= encodeURIComponent($('#znfp_feedback_text').val());

var znfp_ww= $('#znfp_popup_width').val();
var znfp_wh= $('#znfp_popup_height').val();
var znfp_rc= $('#znfp_rounded_corners').val();
var znfp_bi= encodeURIComponent($('#znfp_background_img').val());

var znfp_tp= $('#znfp_tab_placement').val();
var znfp_top= $('#znfp_time_on_page').val();
var url = 'https://www.Bizchatbox.com/json/jsonSaveFeedbackSettings.jsp?tt='+znfp_tt+'&ht='+znfp_ht+'&wid='+znfp_wid+'&intro='+znfp_intro+'&rate='+znfp_rating+'&fb='+znfp_fb+'&wh='+znfp_wh+'&ww='+znfp_ww+'&rc='+znfp_rc+'&bi='+znfp_bi
+'&tp='+znfp_tp+'&top='+znfp_top+'&callback=?';
sessionStorage.removeItem("si_settings");

$( "#saveDetailSettings" ).submit();



  });

$(document).on("click", "#znfp_inputRegister", function () {

var znfp_email= $('#znfp_email').val();
var znfp_password= $('#znfp_password').val();
var url = '<?php echo plugins_url( 'getresponse.php', __FILE__ ); ?>'; 
$.ajax({
   type: 'POST',
   url: url,
   
   data: { "method": "GetAuthtoken", "username": znfp_email, "password": znfp_password },
    
    success: function(json) {
		
	if (json !='') {
         	$('#znfp_widgetID').val(json);
		alert("Thanks for Login!");
		$( "#saveSettings" ).submit();
		 
	}
	else {
		alert(json);
	}
    },
    error: function(e) {
       
    }
});

});

});

</script>
<?php }

$icon_url = plugins_url( 'favicon.ico', __FILE__ );

add_menu_page('Feedback Setting', 'Feedback Setting', 'manage_options', 'user-feedback', 'znfp_settings_page', $icon_url, 76);

}?>