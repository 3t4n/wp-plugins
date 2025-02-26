<?php
/*
Plugin Name: Aspose Contact Form
Plugin URI:
Description: Aspose Contact Form Plugin for WordPress allows site administrators/ownwers to create interactive forms using Microsoft Excel files
Version: 1.0
Author: aspose.cloud Marketplace
Author URI: https://www.aspose.cloud/

*/

require __DIR__.'/vendor/autoload.php';

use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Token;

function aspose_contact_form_register_menu_page() {
    add_menu_page( 
		'Aspose Contact Form',
		'Aspose Form',
		'edit_published_posts',
		'aspose-contact-form',
		'aspose_contact_form_formbuilder_page',
		'dashicons-admin-page',
		30 
	);

    add_submenu_page(
        'aspose-contact-form',
        'Form using MS Excel',
        'Form using MS Excel',
        'manage_options',
        'aspose-contact-form/excel-to-form-admin.php',
        'aspose_contact_form_admin_page'
    );
     add_options_page(
		'Aspose Contact Form',
		__('Aspose Contact Form', 'aspose-contact-form'),
		'activate_plugins',
		'apc-excel-to-form-settings',
		'aspose_contact_form_admin_content'
	); 
}

/**
* Aspose.Forms builder page
*
*/

function aspose_contact_form_formbuilder_page() {
    // check if aspose app sid is valid	
	$ape_sid = get_option('aspose-cloud-app-sid');
    $ape_key = get_option('aspose-cloud-app-key');

    if(empty($ape_sid) || empty($ape_key)) {
        echo '<div><h2 style="color: red">Please enter Aspose SID and Key on plugin settings page.</h2></div>';
     //   return;
    }
	
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
	
	global $wpdb;
	$table_name = $wpdb->prefix . 'aspose_forms';
    if (isset($_POST['asposeFormSubmit'])) {
		
		$formName = sanitize_text_field($_POST['asposeFormName']);
		$formContents = sanitize_textarea_field($_POST['asposeFormContents']);
		
		if(!empty($formContents)){
			$wpdb->query("INSERT INTO $table_name(form_name,form_contents) VALUES('$formName','$formContents')");
		} else {
			echo "<script>location.replace('admin.php?page=aspose-contact-form&err=Empty Form Contents');</script>";
		}
		
		
	}
	
	if (isset($_POST['uptFormSubmit'])) {
		$formId 		= sanitize_text_field($_POST['utpFormId']);		
		$formName 		= sanitize_text_field($_POST['uptFormName']);
		$formContents 	= sanitize_textarea_field($_POST['uptFormContents']);
		if(!empty($formId) && is_numeric($formId)){
			if(!empty($formContents)){
				$wpdb->query("UPDATE $table_name SET form_name='$formName',form_contents='$formContents' WHERE form_id='$formId'");
			}else{
				echo "<script>location.replace('admin.php?page=aspose-contact-form&tab=editForm&err=Empty Form Contents');</script>";
			}
			
		}else{
			echo "<script>location.replace('admin.php?page=aspose-contact-form&tab=editForm&err=Form Id not found');</script>";
		}		
		
		echo "<script>location.replace('admin.php?page=aspose-contact-form&tab=editForm');</script>";
    }
	
	if (isset($_GET['del'])) {
      $del_id = $_GET['del'];
      $wpdb->query("DELETE FROM $table_name WHERE form_id='$del_id'");
      
      echo "<script>location.replace('admin.php?page=aspose-contact-form&tab=editForm');</script>";
    }
	
	if (isset($_GET['contactus'])) {
      
      echo "<script>location.replace('admin.php?page=aspose-contact-form&tab=forms');</script>";
    }
	if (isset($_GET['feedback'])) {
      
      echo "<script>location.replace('admin.php?page=aspose-contact-form&tab=forms');</script>";
    }
	if (isset($_GET['inquiry'])) {
      
      echo "<script>location.replace('admin.php?page=aspose-contact-form&tab=forms');</script>";
    }	
	
	
	//Admin page html callback
	//Print out html for admin page

	  //Get the active tab from the $_GET param
	  $default_tab = null;
	  $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
	
	
    ?>

	<script>
	jQuery(document).ready(function($){ 
		$.fn.setCursorPosition = function(pos) {
			this.each(function(index, elem) {
				if (elem.setSelectionRange) {
					elem.setSelectionRange(pos, pos);
				} else if (elem.createTextRange) {
					var range = elem.createTextRange();
					range.collapse(true);
					range.moveEnd('character', pos);
					range.moveStart('character', pos);
					range.select();
				}
			});
			return this;
		};
		$( 'input[type=button]' ).on('click', function(){
            var cursorPos = $('#asposeFormContents').prop('selectionStart');
            var v = $('#asposeFormContents').val();
            var textBefore = v.substring(0,  cursorPos );
            var textAfter  = v.substring( cursorPos, v.length );
			var shortCode = "";
			switch($(this).val()){
				case "Text":
					shortCode = "[afText id='txtID' name='txtName']";
					break;
				case "Textarea":
					shortCode = "[afTextarea id='taID' name='taName']";
					break;
				case "Dropdown":
					shortCode = "[afDropdown id='ID' name='Name' options='one, two, three']";
					break;

			}
            $('#asposeFormContents').val( textBefore + shortCode + textAfter );
			var lnt = cursorPos + shortCode.length;
			$('#asposeFormContents').setCursorPosition(lnt);
			$('#asposeFormContents').focus();
        });
	});
	
	function load_contactus()
	{
		var txt = "<label> Your name [afText id='yourName' name='Your Name' type='text' isrequired='yes' minlength='8']</label>\r\r" +  
				"<label> Your email [afText id='yourEmail' name='Your Email' type='email' isrequired='Yes'] </label>\r\r" +
				"<label> Subject [afText id='subject' name='Subject'] </label>\r\r" +
				"<label> Your message [afTextarea id='message' name='Message' cols='3' rows='5' isrequired='Yes'] </label>";
		document.getElementById("asposeFormName").value="ContactUSForm";		
		document.getElementById("asposeFormContents").value=txt;
	}
   	function load_feedback()
	{
		var txt = "<label> Your name [afText id='yourName' name='Your Name' type='text' isrequired='yes' minlength='8']</label>\r\r" +
				"<label> Your email [afText id='yourEmail' name='Your Email' type='email' isrequired='yes'] </label>\r\r" +
				"<label>How do you rate our last Newsletter[afDropdown id='ID' name='Name' options='Very Satisfied,Satisfied,Unsatisfied,Very Unsatisfied']</label>\r\r" +
				"<label>How do you rate our last Blog post[afDropdown id='ID' name='Name' options='Very Satisfied,Satisfied,Unsatisfied,Very Unsatisfied']</label>\r\r" +
				"<label> Additional Feedback [afTextarea id='feedback' name='Feedback' cols='3' rows='5' isrequired='yes'] </label>\r\r";
		document.getElementById("asposeFormName").value="FeedbackForm";
		document.getElementById("asposeFormContents").value=txt;
	}
	function load_inquiry()
	{
				var txt = "<label> Your name [afText id='yourName' name='Your Name' type='text' isrequired='yes' minlength='8']</label>\r\r" +
				"<label> Your email [afText id='yourEmail' name='Your Email' type='email' isrequired='yes'] </label>\r\r" +
				"<label> Your phone [afText id='yourPhone' name='Your Phone' type='tel'] </label>\r\r" +
				"<label> Your Occupation [afText id='yourOccupation' name='Your Occupation'] </label>\r\r" +
				"<label> Inquiry Type [afText id='yourInquiry' name='Your Inquiry'  type='text' isrequired='yes'] </label>\r\r" +
				"<label>Can we contact you[afDropdown id='ID' name='Can we Contact you' options='Yes, No']</label>\r\r" +
				"<label>Best Time to call[afText id='calltime' name='Call Time'  type='time']</label>\r\r" +
				"<label> Details [afTextarea id='Details' name='Details' cols='3' rows='5' isrequired='yes'] </label>\r\r";
		document.getElementById("asposeFormName").value="InquiryForm";
		document.getElementById("asposeFormContents").value=txt;
	}

	</script>
    <div class="wrap">
<div id="welcome-panel" class="welcome-panel">
	<div class="welcome-panel-content">
		<h2>Aspose Contact Form</h2>
		<p class="about-description">Using form builder</p>
		<div class="welcome-panel-column-container">
			<div class="welcome-panel-column" style="width:25%;">
				<h3>Get Started</h3>
				<ul>
					<li><b>Creating</b> a new Form is very simple, we have created a <b>Sample Form</b> that you can use as is by pressing <b>Save form</b> button bellow in <b>Add New</b> tab</li>
					<li>You can <b>edit</b> this Form anytime by pressing <b>Edit</b> button</li>
					<li><b>DELETE</b> button will delete the Form</li>
					<li><b>Sample Forms</b> are also included for quickly creating different forms</li>
				</ul>
			</div>

			<div class="welcome-panel-column" style="width:25%;">
				<h3>Available Form Elements</h3>
				<ul>
					<li>[afText id="ID" name="Name" type="Text"]</li>
					<li>[afDropdown id="ID" name="Name" options="one, two, three"]</li>
					<li>[afTextarea id="ID" name="Name"]</li>
					<li><b>*Note:</b><i>type</i> parameter in afText can have following values<br>
					"date", "email", "month", "number", "password", "tel", "text", "time", "url", "week"
					</li>
				</ul>
			</div>	
			<div class="welcome-panel-column" style="width:25%;">
				<h3>Easy to Use Form Validations</h3>
				<ul>
					<li><b>Required</b> isrequired (Yes, No)</li>
					<li><b>Minimum Length</b> minlength (1 to as required)</li>
					<li><b>Email</b> type=email in afText field</li>
					<li><b>Url, Number, Tel, Date, Time, Month, Week</b> can also be used in Type for respective validations</li>
				</ul>
			</div>			
			<div class="welcome-panel-column welcome-panel-last" style="width:25%;">
				<h3>How to Use</h3>
				<ul>
					<li><b>Create</b> new Page</li>
					<li>Add <b>shortcode</b> of your desired <b>Form</b> as following</li>
					<li>[afForm name="SimpleForm"]</li>
					<li><b>Save</b> the Page</li>
				</ul>
			</div>
		</div>
	</div>
</div>	

    <!-- tabs -->
    <nav class="nav-tab-wrapper">
      <a href="?page=aspose-contact-form" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Add New</a>
      <a href="?page=aspose-contact-form&tab=forms" class="nav-tab <?php if($tab==='forms'):?>nav-tab-active<?php endif; ?>">Forms</a>
      <a href="?page=aspose-contact-form&tab=editForm" class="nav-tab <?php if($tab==='editForm'):?>nav-tab-active<?php endif; ?>">Edit Forms</a>
    </nav>

    <div class="tab-content">
    <?php switch($tab) :
      case 'forms':
		if (isset($_GET['err'])){
			echo sprintf(
				'<div id="Error" class="notice notice-error"><p>%s</p></div>',
				esc_html( $_GET['err'] )
			);
		}	  
	?>
  <table class="wp-list-table widefat striped">
    <thead>
      <tr>
        <th width="5%">Form ID</th>
        <th width="15%">Form Name</th>
        <th width="25%">Shortcodes</th>
		<th width="55%">Contents</th>
      </tr>
    </thead>
    <tbody>

        <?php
          $result = $wpdb->get_results("SELECT * FROM $table_name");
          foreach ($result as $form) {
            echo "
              <tr>
                <td width='5%'>$form->form_id</td>
                <td width='15%'>$form->form_name</td>
                <td width='25%'>[afForm id=\"$form->form_id\" name=\"$form->form_name\"]</td>
                <td width='55%'><code> $form->form_contents</code></td>
              </tr>
            ";
          }
        ?>	
    </tbody>
  </table>	
	
	<?php
		break;
      case 'editForm':
		if (isset($_GET['err'])){
			echo sprintf(
				'<div id="Error" class="notice notice-error"><p>%s</p></div>',
				esc_html( $_GET['err'] )
			);
		}
	  
	  ?>
  <table class="wp-list-table widefat striped">
    <thead>
      <tr>
        <th width="5%">Form ID</th>
        <th width="15%">Form Name</th>
        <th width="65%">Shortcodes</th>
		<th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>

        <?php
          $result = $wpdb->get_results("SELECT * FROM $table_name");
          foreach ($result as $form) {
            echo "
              <tr>
                <td width='5%'>$form->form_id</td>
                <td width='15%'>$form->form_name</td>
                <td width='65%'>[afForm id=\"$form->form_id\" name=\"$form->form_name\"]</td>
                <td width='15%'><a href='admin.php?page=aspose-contact-form&upt=$form->form_id&tab=editForm'><button type='button'>EDIT</button></a> <a href='admin.php?page=aspose-contact-form&del=$form->form_id&tab=forms'><button type='button'>DELETE</button></a></td>
              </tr>
            ";
          }
        ?>	
    </tbody>
  </table>	
    
	<?php
		break;
      default:
	  	if (isset($_GET['err'])){
			echo sprintf(
				'<div id="Error" class="notice notice-error"><p>%s</p></div>',
				esc_html( $_GET['err'] )
			);
		}	
	?>
	<div id="templateside">
	<h2 id="theme-files-label">Sample Forms</h2>
	<ul role="tree" aria-labelledby="theme-files-label">
		<li role="treeitem" tabindex="-1" aria-expanded="true" aria-level="1" aria-posinset="1" aria-setsize="1">
			<ul role="group">
				<li role="none" class=""><a role="treeitem" href="javascript:;" onclick="load_contactus();" ><span class="notice notice-info">Contact us</span></a></li>
				<li role="none" class=""><a role="treeitem" href="javascript:;" onclick="load_feedback();"><span class="notice notice-info">Feedback Form</span></a></li>
				<li role="none" class=""><a role="treeitem" href="javascript:;" onclick="load_inquiry();"><span class="notice notice-info">General Inquiry</span></a></li>
			</ul>
		</li>	
	</ul>
</div>
<form name="template" id="template" method="post">
	<div>
	<br><input id="textField" type="button" class="button" value="Text" /> <input type="button" id="textArea" class="button" value="Textarea"/> <input type="button" id="dropdown" class="button" value="Dropdown"/><hr>
		<label for="newcontent" id="theme-plugin-editor-label">Form ID:</label>
<input type="text" size="1" value="#" disabled>
	<label for="newcontent" id="theme-plugin-editor-label">Form Name:</label>
<input type="text" id="asposeFormName" name="asposeFormName" value="SimpleForm">
	<label for="newcontent" id="theme-plugin-editor-label">Form Contents:</label>
	<textarea cols="70" rows="15" name="asposeFormContents" id="asposeFormContents" style="">	
<label> Your name [afText id='yourName' name='Your Name'] </label>

<label> Your email [afText id='yourEmail' name='Your Email'] </label>

<label> Subject [afText id='subject' name='Subject'] </label>

<label> Your message [afTextarea id='message' name='Message' cols='3' rows='5'] </label>
	
	</textarea>
	
	<button id="asposeFormSubmit" name="asposeFormSubmit" class="button button-primary" type="submit">Save Form</button>
	</div>
	      </form>	
		<?php	
        break;
    endswitch; ?>
    </div>

      <br>
    <br>
    <?php
      if (isset($_GET['upt'])) {
        $upt_id = $_GET['upt'];
        $result = $wpdb->get_results("SELECT * FROM $table_name WHERE form_id='$upt_id'");
        foreach($result as $form) {
          $name = $form->form_name;
          $email = $form->form_contents;
        }
	  	if (isset($_GET['err'])){
			echo sprintf(
				'<div id="Error" class="notice notice-error"><p>%s</p></div>',
				esc_html( $_GET['err'] )
			);
		}
        echo "
        <table class='wp-list-table widefat striped'>
          <thead>
            <tr>
              <th width='5%'>Form ID</th>
              <th width='15%'>Form Name</th>
              <th width='65%'>Form Contents</th>
              <th width='15%'>Actions</th>
            </tr>
          </thead>
          <tbody>
            <form action='' method='post'>
              <tr>
                <td width='5%'>$form->form_id <input type='hidden' id='utpFormId' name='utpFormId' value='$form->form_id'></td>
                <td width='15%'><input type='text' id='uptFormName' name='uptFormName' value='$form->form_name'></td>
                <td width='65%'><textarea id='uptFormContents' cols='70' rows='15' name='uptFormContents' style=\"width:500px;\">$form->form_contents</textarea></td>
                <td width='15%'><button id='uptFormSubmit' name='uptFormSubmit' type='submit'>SAVE</button> <a href='admin.php?page=aspose-contact-form&tab=editForm'><button type='button'>CANCEL</button></a></td>
              </tr>
            </form>
          </tbody>
        </table>";
      }
    ?>
    </div>
    <?php
}

function aspose_contact_form_admin_page() {

    $ape_sid = get_option('aspose-cloud-app-sid');
    $ape_key = get_option('aspose-cloud-app-key');

    if(empty($ape_sid) || empty($ape_key)) {
        echo '<div><h2 style="color: red">Please enter Aspose SID and Key on plugin settings page.</h2></div>';
     //   return;
    }

    if(isset($_POST['apc_generate_short_code'])) {

        $post_params = $_POST;

        require_once('apc-sdk-calls.php');

    }

    require_once('aspose-contact-form-admin-main.php');
}

add_action( 'admin_menu', 'aspose_contact_form_register_menu_page' );


// Defineing the Activator URL
if (!defined("ASPOSE_CLOUD_MARKETPLACE_ACTIVATOR_URL")) {
	define("ASPOSE_CLOUD_MARKETPLACE_ACTIVATOR_URL","https://activator.marketplace.aspose.cloud/activate");
}
// Setting up Secret key	
if(!get_option("aspose-cloud-activation-secret")){
	update_option("aspose-cloud-activation-secret", bin2hex(random_bytes(64)));						
}
function aspose_contact_form_enqueue_scripts() {

    // using thickbox for media uploader popup
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');

    // register plugin script file
	wp_register_script( 'aspose_contact_form_script', plugins_url( 'js/script.js', __FILE__ ), array('jquery') );
	wp_enqueue_script( 'aspose_contact_form_script' );

	wp_register_script( 'aspose_contact_form_jqValidation', plugins_url( 'js/jquery.validate.js', __FILE__ ), array('jquery') );
	wp_enqueue_script( 'aspose_contact_form_jqValidation' );

}

add_action('admin_init', 'aspose_contact_form_enqueue_scripts');



/**
 * Plugin settings page
 * @param no-param
 * @return jwt based token
 */	
    function aspose_contact_form_getToken() {
        if (!array_key_exists("token", $_REQUEST) || !get_option("aspose-cloud-activation-secret")) {
            return null;
        }
        try {
            //print_r($_REQUEST["token"]);
            $token = (new Parser())->parse($_REQUEST["token"]);
        } catch (Exception $x) {
            return null;
        }
        if (!($token->hasClaim("iss")) || (trim($token->getClaim("iss")) !== "https://activator.marketplace.aspose.cloud/")) {
            return null;
        }
        $signer = new Sha256();
        $key = new Key(get_option("aspose-cloud-activation-secret"));
		
        if (!$token->verify($signer, $key)) {
            update_option("aspose-cloud-activation-secret", null);
            wp_die("Unable to verify token signature.");
        }
        return $token;
    }	

/**
 * Pluing settings page
 * @param no-param
 * @return no-return
 */
function aspose_contact_form_admin_content() {

    // Creating the admin configuration interface
    ?>
    <div class="wrap">
    <h2><?php echo __('Aspose.Cells Forms Options', 'aspose-contact-form');?></h2>
    <br class="clear" />

    <div class="metabox-holder has-right-sidebar" id="poststuff">
    <div class="inner-sidebar" id="side-info-column">
        <div class="meta-box-sortables ui-sortable" id="side-sortables">
            <div id="AsposePostsExporterOptions" class="postbox">
                <div title="Click to toggle" class="handlediv"><br /></div>
                <h3 class="hndle"><?php echo __('Support / Manual', 'aspose-contact-form'); ?></h3>
                <div class="inside">
                    <p style="margin:15px 0px;"><?php echo __('For any suggestion / query / issue / requirement, please feel free to drop an email to', 'aspose-contact-form'); ?> <a href="/cdn-cgi/l/email-protection#87eae6f5ece2f3f7ebe6e4e2c7e6f4f7e8f4e2a9e4e8eab8f4f2e5ede2e4f3bac6f4f7e8f4e2a7c3e8e4a7c2fff7e8f5f3e2f5">marketplace@aspose.com</a>.</p>
                    <p style="margin:15px 0px;"><?php echo __('Get the', 'aspose-contact-form'); ?> <a href="#" target="_blank"><?php echo __('Manual here', 'aspose-contact-form'); ?></a>.</p>

                </div>
            </div>

            <div id="AsposePostsExporterOptions" class="postbox">
                <div title="Click to toggle" class="handlediv"><br /></div>
                <h3 class="hndle"><?php echo __('Review', 'aspose-contact-form'); ?></h3>
                <div class="inside">
                    <p style="margin:15px 0px;">
                        <?php echo __('Please feel free to add your reviews on', 'aspose-contact-form'); ?> <a href="http://wordpress.org/support/view/plugin-reviews/aspose-contact-form" target="_blank"><?php echo __('Wordpress', 'aspose-contact-form');?></a>.</p>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div id="post-body">
        <div id="post-body-content">
            <div class="postbox">
                <h3 class="hndle">aspose.cloud Subscription</h3>
                <div class="inside">
                    <p>
                        <?php
                        if (array_key_exists("token", $_REQUEST) ){
                            if (!(aspose_contact_form_getToken()->hasClaim("aspose-cloud-app-sid")) || !(aspose_contact_form_getToken()->hasClaim("aspose-cloud-app-key"))) {
                                wp_die("The token has some invalid data");
                            }
                            update_option("aspose-cloud-app-sid", aspose_contact_form_getToken()->getClaim("aspose-cloud-app-sid"));
                            update_option("aspose-cloud-app-key", aspose_contact_form_getToken()->getClaim("aspose-cloud-app-key"));
                            update_option("aspose-cloud-activation-secret", null);
                    	}
                    	?>                            
                    </p>
                    <?php if (strlen(get_option("aspose-cloud-app-sid")) < 1): ?>
                    <p>
                        <a class="button-primary" href="<?php echo ASPOSE_CLOUD_MARKETPLACE_ACTIVATOR_URL; ?>?callback=<?php echo urlencode(site_url()."/wp-admin/options-general.php?page=apc-excel-to-form-settings"); ?>&secret=<?php echo get_option("aspose-cloud-activation-secret"); ?>">
                            <b>Enable FREE and Unlimited Access</b>
                        </a>
                    </p>
                    <p style="font-size: xx-small">
                        Your website URL
                        <i><?php echo site_url(); ?></i>
                        and admin email
                        <i><?php echo get_bloginfo("admin_email"); ?></i>
                        will be sent to
                        <i>aspose.cloud</i>
                        during the process.
                    </p>
                    <?php else: ?>
                    <h4>
                        <button disabled="disabled">FREE Unlimited Access is enabled</button>                                
                    </h4>
                    <p style="font-size: xx-small">
                        App SID:<?php echo get_option("aspose-cloud-app-sid"); ?><br>
                        You can disable FREE Unlimited Access by deactivating/uninstalling the plugin.
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
}

add_filter('plugin_action_links', 'AsposePostsExporterPluginLinks', 10, 2);

/**
 * Create the settings link for this plugin
 * @param $links array
 * @param $file string
 * @return $links array
 */
function AsposePostsExporterPluginLinks($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="' . admin_url('options-general.php?page=apc-excel-to-form-settings') . '">' . __('Settings', 'aspose-contact-form') . '</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}


/**
 * For removing options
 * @param no-param
 * @return no-return
 */
function UnsetOptionsAsposePostsExporter() {
    
    // Deleting the older setting options on plugin uninstall
    delete_option('aspose_cloud_excel_to_form_app_sid');
    delete_option('aspose_cloud_excel_to_form_app_key');

    // Deleting the added options on plugin uninstall
    delete_option('aspose-cloud-app-sid');
    delete_option('aspose-cloud-app-key');

}

register_uninstall_hook(__FILE__, 'UnsetOptionsAsposePostsExporter');

function AsposePostsExporterAdminRegisterSettings() {

    global $wpdb;

    $create_new_table = '
        CREATE TABLE IF NOT EXISTS `'.$wpdb->prefix.'apc_shortcodes` (
        `id` int(11) NOT NULL,
          `filename` text NOT NULL,
          `head_row` text NOT NULL
        ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
        ';

    $wpdb->query($create_new_table);
    // Registering the settings

    register_setting('aspose_posts_exporter_options', 'aspose-cloud-app-sid');
    register_setting('aspose_posts_exporter_options', 'aspose-cloud-app-key');


}

add_action('admin_init', 'AsposePostsExporterAdminRegisterSettings');


function AsposeFormsDBCreation() {

    global $wpdb;

    $create_new_table = '	
	CREATE TABLE IF NOT EXISTS `'.$wpdb->prefix. 'aspose_forms` (
		`form_id` int(11) NOT NULL AUTO_INCREMENT,
		`form_name` varchar(256) NOT NULL,
		`form_contents` varchar(9999) NOT NULL,
		PRIMARY KEY (`form_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
	';

    $wpdb->query($create_new_table);
    // Registering the settings
}

add_action('admin_init', 'AsposeFormsDBCreation');


if (check_upload_aspose_excel_context('APC-Select-Excel-File')) {


    add_filter('media_upload_tabs', 'apc_excel_to_form_builder_uploader_tabs', 10, 1);
    add_filter('attachment_fields_to_edit', 'apc_excel_to_form_builder_uploader_action_button', 20, 2);
    add_filter('media_send_to_editor', 'apc_excel_to_form_builder_uploader_file_selected', 10, 3);
//    add_filter('upload_mimes', 'apc_excel_to_form_builder_uploader_upload_mimes', 10, 3);

}

function apc_excel_to_form_builder_uploader_tabs($_default_tabs) {

    unset($_default_tabs['type_url']);
    return($_default_tabs);
}

function apc_excel_to_form_builder_uploader_upload_mimes ( $existing_mimes=array() ) {


    $existing_mimes = array();
    $existing_mimes['doc'] = 'application/msword';
    $existing_mimes['docx'] = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';

    return $existing_mimes;
}

function apc_excel_to_form_builder_uploader_action_button($form_fields, $post) {

    $send = "<input type='submit' class='button-primary' name='send[$post->ID]' value='" . esc_attr__( 'Use this File For Form Builder' ) . "' />";

    $form_fields['buttons'] = array('tr' => "\t\t<tr class='submit'><td></td><td class='savesend'>$send</td></tr>\n");
    $form_fields['context'] = array( 'input' => 'hidden', 'value' => 'APC-Select-Excel-File' );
    return $form_fields;
}


function apc_excel_to_form_builder_uploader_file_selected($html, $send_id) {

    $file_url = wp_get_attachment_url($send_id);
    $file_url = basename($file_url);
    ?>
    <script type="text/javascript">
        /* <![CDATA[ */
        var win = window.dialogArguments || opener || parent || top;

        win.jQuery( '#excel_file_name' ).val('<?php echo $file_url;?>');

        win.jQuery('.tb-close-icon').trigger('click');

    </script>
    <?php
    return '';
}

function add_aspose_excel_context_to_url($url, $type) {
    //if ($type != 'image') return $url;
    if (isset($_REQUEST['context'])) {
        $url = add_query_arg('context', $_REQUEST['context'], $url);
    }
    return $url;
}


function check_upload_aspose_excel_context($context) {
    if (isset($_REQUEST['context']) && $_REQUEST['context'] == $context) {
        add_filter('media_upload_form_url', 'add_aspose_excel_context_to_url', 10, 2);
        return TRUE;
    }
    return FALSE;
}

 
add_action('wp_mail_failed', 'aspose_contact_form_log_mailer_errors', 10, 1);
function aspose_contact_form_log_mailer_errors( $wp_error ){
  $fn = ABSPATH . '/mail.log'; // say you've got a mail.log file in your server root
  $fp = fopen($fn, 'a');
  fputs($fp, "Mailer Error: " . $wp_error->get_error_message() ."\n");
  fclose($fp);
}


require_once('apc-shortcodes.php');
