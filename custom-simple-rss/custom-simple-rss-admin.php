<?php
define('CUSTOM_SIMPLE_RSS_VERSION', '2.1.4');
define('CUSTOM_SIMPLE_RSS_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('CUSTOM_SIMPLE_RSS_PLUGIN_ADMIN_FILE', plugin_dir_path(__FILE__)."custom-simple-rss-admin.php" );
define('CUSTOM_SIMPLE_RSS_PLUGIN_ALLOWED_TAGS', '<img><a><b><strong><i><li><left><center><right><del><strike><ol><ul><u><sup><pre><code><sub><hr><h1><h2><h3><h4><h5><h6><big><small><font><p><br><span><div><script><video><audio><dd><dl><iframe>');

//============ wp_enqueue_style and scripts and options page =================//

//register admin menu
function custom_simple_rss_admin_menu() {
	add_options_page( 'Custom Simple Rss Plugin Options', 'Custom Simple Rss Plugin', 'manage_options', 'custom-simple-rss-admin-options', 'custom_simple_rss_options' );
	add_menu_page(
		 'Custom Simple RSS',
		 'Custom Rss',
		 'manage_options',
		 'custom-simple-rss-admin-options',
		 'custom_simple_rss_options',
		 'dashicons-rss',
		 100
	);	
}
add_action( 'admin_menu', 'custom_simple_rss_admin_menu' );

//register styles
function custom_simple_rss_admin_init() {
	wp_register_style( 'custom-simple-rss-admin-css', plugins_url('custom-simple-rss-admin.css', __FILE__),array(),time() );
	wp_enqueue_style( 'custom-simple-rss-admin-css' );
	wp_enqueue_script('custom-simple-rss-js', plugins_url('custom-simple-rss.js', __FILE__), array(), '1.1'.time());
}
add_action( 'admin_enqueue_scripts', 'custom_simple_rss_admin_init' );

function custom_simple_rss_admin_href($params){
   return '<a href="'. site_url() .'?call_custom_simple_rss=1'.$params.'" target="_blank">'.site_url() .'?call_custom_simple_rss=1'.$params.'</a><br>';
}

function custom_simple_rss_options(){
   if( isset($_GET['page']) && $_GET['page'] != '' ){
       $csrp_admin_page = sanitize_text_field($_GET["page"]);
   }
	custom_simple_rss_get_form_data();
	
	$custom_simple_rss_options = get_option('custom_simple_rss_options');
	if(is_array($custom_simple_rss_options)===false){
		//set defaults and return array
		$custom_simple_rss_options = custom_simple_rss_set_defults();
	}
	extract($custom_simple_rss_options);
	
	$show_content_arr = array(
		'1'=>'show content as is(no filters)',
		'2'=>'show clean html',
		'0'=>'hide content',
	);
	$show_description_arr = array(
		'1'=>'show description',
		'2'=>'show excerpt',
		'0'=>'hide always',
	);	
	$csrp_xml_type_arr = array(
		'1'=>'xml by DOM ',
		'0'=>'xml by srting',
	);	
   ?>
	<div class="wrap" id="custom-simple-rss-admin-wrapper" style="direction:ltr;">
		<div class="custom-simple-rss-admin-notice csrp_notice">
			<p>
				
				<strong>Please notice,</strong><br>
				According to WordPress guidelines, <strong>it is not allowed to display "private" posts without proper password protection</strong>.
				therefore, in order to to use the plugin for displaying private posts OR any sensitive posts, you must protect your feeds with a key.<br>
				meaning: in order for "private" posts to show in feed - the "csrp_post_status" query parameter must be combined with the "csrp_key" and the right key from plugin settings<br>
				for example: <strong>"?call_custom_simple_rss=1&csrp_post_status=private&csrp_key={the key from settings}"</strong>
				
			</p>
		</div>	
	<?php if($csrp_admin_page == 'custom-simple-rss-admin-options') : ?>
   
		<div class="tabs">		
			<div class="tab on" id="3"><h2>Settings and Defaults</h2></div>
			<div class="tab" id="2"><h2>Tutorial and Examples</h2></div>
			<div class="tab" id="1"><h2>Change Log and updates</h2></div>
		</div>
		<div class="postbox" id="postbox_1">
			<div class="inside">
				<?php include plugin_dir_path( __FILE__ ) . 'custom-simple-rss-log.php'; ?>
			</div>	
		</div>	
		<div class="postbox" id="postbox_2">
			<div class="inside">
				<?php include plugin_dir_path( __FILE__ ) . 'custom-simple-rss-tutorial.php'; ?>
				<?php include plugin_dir_path( __FILE__ ) . 'custom-simple-rss-examples.php'; ?>
			</div>	
		</div>
		<div class="postbox on" id="postbox_3">				
			<div class="inside">
				<?php include plugin_dir_path( __FILE__ ) . 'custom-simple-rss-defaults.php'; ?>	
			</div>		
		</div>
	
		
		<?php endif; ?>
		<?php if($csrp_admin_page == 'custom-simple-rss-admin-url-builder') : ?>
		<div class="postbox on" id="postbox_4">
			<div class="inside ">
				<?php include plugin_dir_path( __FILE__ ) . 'custom-simple-rss-url-builder.php'; ?>
			</div>
		</div>
		<?php endif; ?> 		
	</div>
<?php
}

function custom_simple_rss_get_form_data(){  
    if($_POST && isset( $_POST['action'] ) && $_POST['action'] == 'custom_simple_rss_form_submit'){        
		if ( ! isset( $_POST['csrp_update_options_nonce'] )  || ! wp_verify_nonce( $_POST['csrp_update_options_nonce'], 'csrp_update_options_nonce_action' ) ) {

            print '<div id="error-page" class="custom-simple-rss-admin-row"><p>Sorry, you are not allowed to access this page.</p></div>';
            exit;

        }else{
            //print_r($_POST);
			$custom_simple_rss_options = array(
			
				'csrp_post_type'=> sanitize_text_field( $_POST["csrp_post_type"] ),
				'csrp_post_status'=> sanitize_text_field( $_POST["csrp_post_status"] ),
				'csrp_posts_per_page'=> intval( $_POST["csrp_posts_per_page"] ),
				'csrp_show_meta'=> intval( $_POST["csrp_show_meta"] ),
				'csrp_show_thumbnail'=> intval( $_POST["csrp_show_thumbnail"] ),
				'csrp_show_content'=> intval( $_POST["csrp_show_content"] ),
				'csrp_show_description'=> intval( $_POST["csrp_show_description"] ),
				'csrp_allowed_tags'=> preg_replace("/[^a-zA-Z0-9<>]+/", "", $_POST["csrp_allowed_tags"]),
				'csrp_secret_key'=> sanitize_text_field( $_POST["csrp_secret_key"] ),
				'csrp_xml_type'=>intval( $_POST["csrp_xml_type"] ),
				'csrp_pubdate_date_format'=> sanitize_text_field( $_POST["csrp_pubdate_date_format"] ),
		
			);
        	update_option('custom_simple_rss_options',$custom_simple_rss_options);
		}       
    }
};