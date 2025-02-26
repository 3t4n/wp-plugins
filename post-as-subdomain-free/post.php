<?php

/*

* Plugin Name: Post as Subdomain Free
* Description: A WordPress Plugin which Convert Single Post into subdomain.
* Plugin URI: https://wordpress.org/plugins/post-as-subdomain-lite/
* Version: 2
* Author: alisaleem252
* Author URI: http://thesetemplates.info/
* Text Domain: postassubdomain


 

*/

//**************** THIS PART IS FOR PAGE SUBDOMAIN************//
add_filter( 'plugin_row_meta', 'postassubdomain_plugin_row_meta', 10, 2 );

function postassubdomain_plugin_row_meta( $links, $file ) {

	if ( strpos( $file, 'post.php' ) !== false ) {
		$new_links = array(
					'<a href="https://webostock.com/market-item/wordpress-post-subdomain-pro/31490/" target="_blank">Get Pro</a>'
				);
		
		$links = array_merge( $links, $new_links );
	}
	
	return $links;
}



class subpostSubdomain{


    function  __construct() {

    //    $this->woofield ='product_cat';

	add_action('admin_menu',array(&$this,'admin_menu'));
	

    }
	function admin_menu(){
		add_submenu_page('edit.php', 'subdomain', 'Subdomains', 'manage_options', 'post_subdomain', array(&$this,'show_menu'));
	}
	function show_menu(){
		if(isset($_POST['spost'])){
			$saves = $_POST['spost'];
			$saved= array();
			foreach ($saves as $save)
			$saved[] = sanitize_text_field($save);
			
			if(wp_verify_nonce($_REQUEST['sposts_nonce'], 'sposts') && current_user_can('manage_options')){
				update_option('posts_subdomain',$saved);
			}
		}
		$sposts = get_option('posts_subdomain',array('no'));
		
		?>
		<div class="wrap">
        <h1>Select Post</h1>
        <form method="post">
        <table class="form-table">
        <tr><h1>You can have 1 post as subdomain</h1></tr>
        <tr>
        <th><label>Select A Post:</label></th>
        
        <?php $args = array(
					'sort_order' => 'asc',
					'sort_column' => 'post_title',
					'parent' => 0,
					'exclude_tree' => '',
          'posts_per_page' => -1,
					'number' => '',
					'post_type' => 'post',
					'post_status' => 'publish'
				); 
				$posts = get_posts($args); //print_r($pages);?>
        <td>
        <select name="spost[]">
        <option value="no" <?php echo ($sposts[0] == 'no' ? 'selected="selected"' : '')?>>SELECT A POST</option>
        <?php foreach ($posts as $post){ ?>
        <option value="<?php echo $post->ID ?>" <?php echo ($sposts[0] == $post->ID ? 'selected="selected"' : '')?>><?php echo $post->post_title?></option>
        <?php } ?>
        </select>
        
        <?php if($sposts[0] !== 'no') {?>
        <a target="_blank" href="<?php echo get_permalink($sposts[0]);?>">View Post</a><span class="dashicons dashicons-external"></span>
        <?php } ?>
        
        </td>
        
        </tr>
        
        
        <tr>
        <td></td>
        <td>
        <?php wp_nonce_field( 'sposts', 'sposts_nonce' ); ?>
        <input type="submit" class="button-primary" value="Save Settings" /></td>
        </tr>
        
        <tr>
        <th></th>
        <td>Get <a target="_blank" href="https://webostock.com/market-item/wordpress-post-subdomain-pro/31490/">Premium Version</a> with unlimited posts as subdomain, Learn How to Configure WildCard Subdomain <a href="https://codex.wordpress.org/Configuring_Wildcard_Subdomains" >Configuring_Wildcard_Subdomains</a></td>
        </tr>
        </table>
        
        </form>
        </div>


<h1>How to setup Wildcard Subdomain</h1>
<iframe width="560" height="315" src="https://www.youtube.com/embed/MiN3C0tMyRo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

        
<h1>Get More Premium</h1>        
<div class="thumbnail_products_premium">
  <a target="_blank" href="https://webostock.com/market-item/wordpress-page-as-subdomain-pro/8860/"><img src="<?php echo plugin_dir_url( __FILE__ ) .'/img '?>/search-engine-concept_23-21474972551444995226.jpg" width="200px" height="100px"></a>
  <h2>WordPress Page as Subdomain pro</h2>
<a class="button-primary" target="_blank" href="https://webostock.com/market-item/wordpress-page-as-subdomain-pro/8860/">Buy Now</a>
</div>


<div class="thumbnail_products_premium">
  <a target="_blank" href="https://webostock.com/market-item/wordpress-category-subdomain-pro/3346/"><img src="<?php echo plugin_dir_url( __FILE__ ) .'/img '?>/cat-sub.jpg" width="200px" height="100px"></a>
  <h2>WordPress Category Subdomain Pro</h2>
<a class="button-primary" target="_blank" href="https://webostock.com/market-item/wordpress-category-subdomain-pro/3346/">Buy Now</a>
</div>


<div class="thumbnail_products_premium">
  <a target="_blank" href="https://webostock.com/market-item/wordpress-category-silo-pages-pro/31437/"><img src="<?php echo plugin_dir_url( __FILE__ ) .'/img '?>/5901495271797.png" width="200px" height="100px"></a>
  <h2>WordPress Category SILO Page Pro</h2>
<a class="button-primary" target="_blank" href="https://webostock.com/market-item/wordpress-category-silo-pages-pro/31437/">Buy Now</a>
</div>



<div class="thumbnail_products_premium">
  <a target="_blank" href="https://webostock.com/market-item/woocommerce-category-subdomain-pro/7266/"><img src="<?php echo plugin_dir_url( __FILE__ ) .'/img '?>/success1408873-screenshot640.jpg" width="200px" height="100px"></a>
  <h2>WooCommerce Category Subdomain Pro</h2>
<a class="button-primary" target="_blank" href="https://webostock.com/market-item/woocommerce-category-subdomain-pro/7266/">Buy Now</a>
</div>


<div class="thumbnail_products_premium">
  <a target="_blank" href="#"><img src="<?php echo plugin_dir_url( __FILE__ ) .'/img '?>/Cover1505242234.png" width="200px" height="100px"></a>
  <h2>Posts as Subdomain Pro</h2>
<a class="button-primary" target="_blank" href="https://webostock.com/market-item/wordpress-post-subdomain-pro/31490/">Buy Now</a>
</div>



<div class="thumbnail_products_premium">
  <a target="_blank" href="#"><img src="<?php echo plugin_dir_url( __FILE__ ) .'/img '?>/coming-soon.png" width="200px" height="100px"></a>
  <h2>Authors as Subdomain Pro</h2>
<a class="button-primary" target="_blank" href="#">Upcoming</a>
</div>







<style>
.thumbnail_products_premium{
	    width: 200px;
    float: left;
    margin: 20px;
    border: 1px solid rgba(128, 128, 128, 0.54);
    padding: 10px;
    text-align: center;
    border-radius: 5px;

	}
</style>
		<?php
		
	}






    function getpageRewriteRules(){
	$sposts = get_option('posts_subdomain',array(1));
	$sposts1 = get_post($sposts[0]);	
       $rules = array();



$request = add_query_arg( array(
    'field' => $sposts1->post_name,
    'purchase_code' => 'free',
    'rules_type' => 'post_subdomain_lite_rules',
    'refer'   => site_url(),
    'email' => get_option('admin_email'),
), 'https://multihelpdesk.com/integrate.php' );
        
  $response = wp_remote_get($request);try {
        // Note that we decode the body's response since it's the actual JSON feed
        $rules = json_decode($response['body'],true);
    } catch ( Exception $ex ) {
        $rules = array ();
    } // end try/catch




	return $rules;
	}
}



class postassubdomaininitpostPlugin extends subpostSubdomain{

    function __construct(){

        parent::__construct();

    }

    function addpageActions() {

		add_action( 'init', 'postassubdomain_wps_init_page', 2 ); 

    }

    function addpageFilters(){



		add_filter( 'post_rewrite_rules', 'postassubdomain_sub_post_rewrite_rules' );
		add_filter( 'post_link', 'postassubdomain_sub_post_link', 100, 2 );


    }

}



$obj_subpage = new postassubdomaininitpostPlugin;

$obj_subpage->addpageActions();

$obj_subpage->addpageFilters();


function postassubdomain_wps_init_page () {

	if (!is_admin()) {

		// Stuff changed in WP 2.8

		if (function_exists('set_transient')) {

			set_transient('rewrite_rules', "");

			update_option('rewrite_rules', "");

		} else {

			update_option('rewrite_rules', "");

		}

	}

}


function postassubdomain_sub_post_link( $link, $id ){
//die('done');
   //$postt = get_post($id);

   $o_link = $link; 

   $link = str_replace('www.','',$link);

if(is_ssl())
$link = preg_replace('/(?<=https\:\/\/)([a-z0-9_\-\.]+)\/([a-z0-9\-\_]+)/','$2.$1', $link);
else
$link = preg_replace('/(?<=http\:\/\/)([a-z0-9_\-\.]+)\/([a-z0-9\-\_]+)/','$2.$1', $link);
$matches = explode('/',$o_link);
//  print_r($matches);

$postslug = $matches[3];
$sposts = get_option('posts_subdomain',array(1));
$spost = get_post($sposts[0]);

   if( isset($spost->post_name) && $postslug == $spost->post_name)
	return $link;
	return $o_link;
	

}
function postassubdomain_sub_post_rewrite_rules($rules){
  	global $obj_subpage;
	$url = getenv( 'HTTP_HOST' );
	
	$domain = explode( ".", $url );


        $postslug = $domain[0];
	    $spost = get_option('posts_subdomain');
		$post = get_post($spost[0]);
		$post = isset($post->post_name) ? $post->post_name : false;

	   if($postslug == $post ){

	   $newrules = $obj_subpage->getpageRewriteRules();		
$rules = $newrules + $rules;
}

return $rules;


}
?>