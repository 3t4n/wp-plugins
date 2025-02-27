<?php
/*
 * Plugin Name:		External url as post Featured Thumbnail Image
 * Description:		Users can set an external url as post thumbnail (Featured image). Supports youtube videos & urls.
 * Text Domain:		external-url-as-post-featured-image-thumbnail
 * Domain Path:		/languages
 * Version:		2.08
 * WordPress URI:	https://wordpress.org/plugins/external-url-as-post-featured-image-thumbnail/
 * Plugin URI:		https://puvox.software/software/wordpress-plugins/?plugin=external-url-as-post-featured-image-thumbnail
 * Contributors: 	puvoxsoftware,ttodua
 * Author:		Puvox.software
 * Author URI:		https://puvox.software/
 * Donate Link:		https://paypal.me/Puvox
 * License:		GPL-3.0
 * License URI:		https://www.gnu.org/licenses/gpl-3.0.html
 
 * @copyright:		Puvox.software
*/


namespace ExternalUrlAsPostFeaturedImageThumbnail
{
  if (!defined('ABSPATH')) exit;
  require_once( __DIR__."/library.php" );
  require_once( __DIR__."/library_wp.php" );
  
  require_once( __DIR__."/youtube_images.php" );
	
  class PluginClass extends \Puvox\wp_plugin
  {

	public function declare_settings()
	{
		$this->initial_static_options	= 
		[
			'has_pro_version'        => 0, 
            'show_opts'              => true, 
            'show_rating_message'    => true, 
            'show_donation_footer'   => true, 
            'show_donation_popup'    => true, 
            'menu_pages'             => [
                'first' =>[
                    'title'           => 'External Thumbnail Url', 
                    'default_managed' => 'network',            // network | singlesite
                    'required_role'   => 'install_plugins',
                    'level'           => 'submenu', 
                    'page_title'      => 'External url as post Featured Thumbnail Image',
                    'tabs'            => [],
                ],
            ]
		];
		
		$this->initial_user_options	=
		[	
			'show_column_images' => true
		]; 
		
		// Youtube-Thumbnail functionality:
		$this->youtube= new YoutubeClass($this);
		$this->initial_user_options = array_merge($this->initial_user_options, $this->youtube->default_opts);
		add_action('plugins_loaded', function(){ $this->youtube->__construct_my(); }, 1);
	}

	private $prefix_ ='EUAPFIT_';	

	
	public function __construct_my()
	{
		// These methods are responses to various WP functionalities (most frequently used by themes or plugins)
		$this->METHOD_1();
		$this->METHOD_2();	 
		$this->METHOD_3();
		$this->METHOD_4();
		$this->METHOD_5();
		$this->METHOD_6();
		$this->METHOD_7();
		$this->METHOD_8();
		$this->METHOD_9();
		//
		
		add_action('init', [$this, 'showAdminColumnsImages'] );
		
		//admin funcs
		add_filter( 'admin_post_thumbnail_html',	[$this, 'field']		); 
		add_filter( 'save_post',					[$this, 'save' ]		, 10, 2	);
	}

	// ============================================================================================================== //
	// ============================================================================================================== //
	
	private $negativeHint = -100000;
	private $negativeHint2 = -10000000;
	private function create_simulated_ID_for_attachment($post_id){ return $this->negativeHint - $post_id;  }
	private function is_simulated_ID_of_attachment($post_id)	 { return $post_id < $this->negativeHint;  }
	private function get_post_id_from_attachment_simulated_ID($num)	{ return abs($num-$this->negativeHint);  }
	

	
	private function METHOD_1()
	{
		/******************** Response for: has_post_thumbnail() ********************
			* https://developer.wordpress.org/reference/functions/has_post_thumbnail/#source
			* NOTES:
		*/

		add_filter( 'has_post_thumbnail', [$this, 'METHOD_1_helper_A'], 20, 3);
	} 
			public function METHOD_1_helper_A($has_thumbnail, $post=null, $thumbnail_id=null){
				remove_filter( 'has_post_thumbnail', [$this, 'METHOD_1_helper_A'], 20);
				if ( empty ( $has_thumbnail ) )
				{
					$post = get_post($post);
					if ( !empty( $post ) ) 
					{
						$postid = $post->ID;
						if ( empty($has_thumbnail) ){ 
							$external_url = trim( $this->get_post_external_thumbnail_url($postid) ) ; 
							$has_thumbnail = $external_url; // let it be non-empty, because inside `has_post_thumbnail` is just checks against boolean
						}
					}
				}
				add_filter	 ( 'has_post_thumbnail', [$this, 'METHOD_1_helper_A'], 20, 3);
				return $has_thumbnail;
			}
			


	private function METHOD_2()
	{		
		/******************** Response for: get_post_thumbnail_id() **************************
			* https://developer.wordpress.org/reference/functions/get_metadata_raw/#source
			* NOTES:
		*/
		// this seems to have no way for hook, so we address to "helper_A" method

		$this->METHOD_2_helper_A();
	}
	
	
	public function METHOD_2_helper_A()
	{
		/************************ Response for: get_post_meta() ******************************
			* https://developer.wordpress.org/reference/functions/get_metadata_raw/#source (get_post_meta -> get_metadata -> get_metadata_raw  )
			* NOTES:
		*/

		add_filter( "get_post_metadata", [$this, 'METHOD_2_helper_A_filter'], 15, 5 );   //used by METHOD_3 too
		
	}
			public function METHOD_2_helper_A_filter( $value, $object_id, $meta_key, $single, $meta_type=null  )
			{
				// the below causes bug: pastebin_com/Wd5CTDsz
				// if (!isset($value) || is_null($value)) $value ="null";
				remove_filter( 'get_post_metadata', [$this,'METHOD_2_helper_A_filter'], 15);
				if($meta_key=="_thumbnail_id")
				{
					$postid = $object_id; // its post-id mainly with our cases
					$result = $this->get_post_external_thumbnail_url($postid);

					if ( ! empty( $result ) )
					{
						// NOTE: as this function is mostly used by "get-post-thumbnail-id" (and it converts result to INT), we can have to return the INT number of thumbnail ID (or ARRAY where [0] should be that)
						$id= $this->create_simulated_ID_for_attachment($postid);
						$value = $id;
					}
				}
				add_filter( 'get_post_metadata', [$this,'METHOD_2_helper_A_filter'], 15,	5);
				return $value;
			}
	
	
	
	
	private function METHOD_3()
	{
		/****************** Response for: get_the_post_thumbnail_url() & wp_get_attachment_image_url() ******************
			* https://developer.wordpress.org/reference/functions/get_the_post_thumbnail_url/#source 
			* https://developer.wordpress.org/reference/functions/wp_get_attachment_image_url/#source 
			* NOTES: 
		*/
		
		// this seems to have no way for hook, so we address to "helper_A" or "helper_B" method
		//$this->METHOD_2_helper_A();     //already used from METHOD_2
		$this->METHOD_3_helper_A();
	}
	

	public function METHOD_3_helper_A()
	{		

		/******************** Response for: wp_get_attachment_image_src() **************************
			* https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/#source 
			* NOTES: this function is mostly used in themes, i.e. Twenty-Seventeen or etc:
			//	$thumbnail = wp-get-attachment-image-src( get-post-thumbnail-id( $post->ID )  );  
			//	where	$thumbnail[0]=imageurl;  $thumbnail[1]=width;  $thumbnail[2]=height; 
		*/
		
		add_filter( 'wp_get_attachment_image_src',	[$this, 'METHOD_3_helper_A_filter'], 50, 4 ); 
		
	}

		public function METHOD_3_helper_A_filter($imageArray, $attachment_id, $size, $icon){
			remove_filter( 'wp_get_attachment_image_src', [$this,'METHOD_3_helper_A_filter'], 50);
			
			if( $this->is_simulated_ID_of_attachment( $attachment_id ) ) 
			{
				$post_id = $this->get_post_id_from_attachment_simulated_ID($attachment_id);
				$src_external  = $this->get_post_external_thumbnail_url( $post_id );
				$imageArr  =  !empty( $src_external ) ? [$src_external, $width=100, $height=100, false] : $imageArray;	
				$imageArray = $imageArr;
			}
			add_filter	 ( 'wp_get_attachment_image_src', [$this,'METHOD_3_helper_A_filter'], 50, 4);
			return $imageArray;
		}
	
	
	private function METHOD_4()
	{		
		/******************** Response for: get_the_post_thumbnail() *******************************
			* https://developer.wordpress.org/reference/functions/get_the_post_thumbnail/#source
			* NOTES:
		*/
	
		add_filter( 'post_thumbnail_html', [$this, 'METHOD_4_filter'],	6,	5 );
	}
			public function METHOD_4_filter($html, $post_ID, $post_thumbnail_id, $size, $attr)
			{
				remove_filter( 'post_thumbnail_html', [$this,'METHOD_4_filter'], 6);
				$src_external = $this->get_post_external_thumbnail_url($post_ID);
				if( ! empty( $src_external ) )
				{
					$html = preg_replace('/\<img(.*?)class\=\"/','<img'.'$1'.'class="external_img_url ', $html);
				}
				add_filter	 ( 'post_thumbnail_html', [$this,'METHOD_4_filter'], 6,	5);
				return $html;
			}



	
	private function METHOD_5()
	{		
		/******************** Response for: wp_get_attachment_image() *******************************
			* https://developer.wordpress.org/reference/functions/wp_get_attachment_image/#source
			* NOTES:
		*/
		add_filter( 'wp_get_attachment_image', [$this, 'METHOD_5_filter'], 10, 5 );
	}
			public function METHOD_5_filter($html, $attachment_id, $size, $icon, $attr)
			{
				remove_filter( 'wp_get_attachment_image', [$this,'METHOD_5_filter'], 10);
				if ( empty( $html ) ) //this will never happen, as wp-get-attachment-image-src is used in that func
				{
					$html = 'EXCEPTION BY: '. __NAMESPACE__ ;	
				}
				add_filter( 'wp_get_attachment_image', [$this,'METHOD_5_filter'],	10,	5);
				return $html;
			}
	
	
	

	private function METHOD_6()
	{
		/*************************** Response for: wp_get_attachment_url() **************************
			* https://developer.wordpress.org/reference/functions/wp_get_attachment_url/#source
			* NOTES:  this is done for ATTACHMENT post types 
		*/
		add_filter( 'wp_get_attachment_url', [$this, 'METHOD_6_filter'], 10, 2 );
	}
			public function METHOD_6_filter($url, $post_ID)
			{
				try{
					remove_filter( 'wp_get_attachment_url', [$this,'METHOD_6_filter'],	10); 
					if ( ! $url )
					{
						if (is_numeric($post_ID))
							$url = $this->get_post_external_thumbnail_url($post_ID);
					}
					add_filter( 'wp_get_attachment_url', [$this,'METHOD_6_filter'],	10,	2);
				} catch (Exception $e) {
					echo($this->moduleNAME . ' err348975: ' .$e->getMessage());
				}
				return $url;
			}
	
	private function METHOD_7()
	{		
		/**************************** Response for: is_attachment()  *****************************
			* https://developer.wordpress.org/reference/functions/is_attachment/#source
			* NOTES:  this is done for ATTACHMENT post types // 
				//Some themes (i.e. Elementor's  LayersWP) use: if (is_attachment()) {}  else echo layers_post_featured_media()  
				//	func layers_post_featured_media() { return apply_filters('layers_post_featured_media', $output); }
		*/

		// TODO
			//$meta_list = $wpdb->get_results( "SELECT $column, meta_key, meta_value FROM $table WHERE $column IN ($id_list) ORDER BY $id_column ASC", ARRAY_A );
	}


	
	private function METHOD_8()
	{		
		/***************************** Response for: wp_attachment_is( 'image', $image_id ) ***********************
			* NOTES:  Some functions/etc use them.
		*/
		
		// TODO
	}


	
	private function METHOD_9()
	{		
		/************************ Response for: get_attachment_image_html(  $settings, $setting_key) *************************
			* https://code.elementor.com/classes/elementor-group_control_image_size/
			* NOTES:  Elementor uses this function
		*/
		
		
		add_filter( 'elementor/image_size/get_attachment_image_html', [$this, 'METHOD_9_filter'], 10, 4 );
	}
			public function METHOD_9_filter($html, $settings, $image_size_key, $image_key)
			{
				try{
						
					remove_filter( 'elementor/image_size/get_attachment_image_html', [$this,'METHOD_6_filter'],	10); 
									//$image_size_key  --- archive_cards_thumbnail_size
					//$image_key  (will be same)
					$image_id= $settings[ $image_key ]['id']; //i.e. -12345
					if(is_numeric($image_id))
					{
						$post_id = $this->get_post_id_from_attachment_simulated_ID($image_id);
						$src_external  = $this->get_post_external_thumbnail_url( $post_id );
						if(!empty( $src_external )){
							$html = $this->customImageHtml($src_external);
						}
					}
					add_filter( 'elementor/image_size/get_attachment_image_html', [$this,'METHOD_6_filter'],	10,	2);
				}
				catch (Exception $e) {
					echo($this->moduleNAME . ' err356975: ' .$e->getMessage());
				}
				return $html;
			}

	// ========================================================================================== //

 
 
 


	// test anywhere by calling :  $GLOBALS["ExternalUrlAsPostFeaturedImageThumbnail"]->testOutputs();
	public function testOutputs($postId=null)
	{
		$postId = $postId ?: get_post()->ID;
		$thumbId=get_post_thumbnail_id($postId);
		//if ( ! is_numeric ( $thumbId ) ) 
		var_dump( "get_post_thumbnail_id():       ". $thumbId );
		var_dump( "has_post_thumbnail():          ". has_post_thumbnail($postId) );
		var_dump( "get_the_post_thumbnail():      ". get_the_post_thumbnail($postId) );
		// get_the_post_thumbnail_url && wp_get_attachment_image_url depends on: wp_get_attachment_image_src
		var_dump( "wp_get_attachment_image_src(): ". wp_get_attachment_image_src( $thumbId )[0] );
		var_dump( "wp_get_attachment_url():       ". wp_get_attachment_url( $thumbId ) );
		var_dump( "wp_get_attachment_image():     ". wp_get_attachment_image( $thumbId, 'large' ) );
		exit("");
	}
 
	public function customImageHtml($src){
		return '<img src="'.$src.'" class="'.$this->prefix_.'_ext_image" title="" alt="" />';
	}
 

	// ========================= admin visual side ============================//
	public function field( $html ) {
		global $post;
		$value = get_post_meta( $post->ID, '_thumbnail_ext_url', TRUE ) ?: "";
		$final_img = ! empty($value)  ? $value : 'data:null';
		$html .= 
			'<div>'.
				'<p>' . __('Or<br/>Enter the url for external featured image', 'social-feeds-grabber' ) . '</p>'.
				'<p><input id="ext_url_fld" type="url" name="thumbnail_ext_url" value="' . $value . '"></p>'.
				'<p><img style="max-width:150px;" src="' . esc_url($value) . '"><br/>'. __( 'Leave url blank to remove.', 'social-feeds-grabber' ) . '</p>'	.
			'</div>';
		return $html;
	}

	public function save( $pid, $post ) {
		$cap = $post->post_type === 'page' ? 'edit_page' : 'edit_post';
		if ( !is_admin() || empty($_POST['post_title']) || !isset($_POST['thumbnail_ext_url']) || ! current_user_can( $cap, $pid )  || ! post_type_supports( $post->post_type, 'thumbnail' )  || defined( 'DOING_AUTOSAVE' ) )  return;
		$url	= filter_var($_POST['thumbnail_ext_url'], FILTER_VALIDATE_URL);	
		update_post_meta( $pid, '_thumbnail_ext_url',  (! empty( $url ) ?  esc_url($url) : "" )  )  ;
	}
	// =========================================================================//





	// ========================= columns for image ============================//
	public function showAdminColumnsImages()
	{
		if ( $this->opts['show_column_images'] )
		{
			foreach( get_post_types() as $postType ){
				add_filter( 'manage_'.$postType.'_posts_columns', 		[$this,'featuredimg_column_data'] );
				add_action( 'manage_'.$postType.'_posts_custom_column', [$this,'featuredimg_column_content'], 10, 2 ); 
			}
			add_action('admin_head', function(){ ?> <style> .<?php echo $this->prefix_;?>feature_img img {width:60px; height:auto; } </style> <?php } );
		}
	}
	public function featuredimg_column_data( $defaults ) {
		$defaults[ $this->prefix_ .'feature_img'] = 'Featured Image';
		return $defaults;
	}
	
	public function featuredimg_column_content( $column_name, $post_ID ) {
		if ($column_name == $this->prefix_ .'feature_img') {
			the_post_thumbnail();
		}
	}
	// =========================================================================//






	// ========================= base func ============================//
	private $opened_processings_for_thumb_ids = [];

	public function get_post_external_thumbnail_url( $object_id, $re_filter = true ){ 
		$external_url_existing = $this->get_post_external_thumbnail_url_raw($object_id);		
		//avoid recursion self-trigger hook
		if ( empty($this->opened_processings_for_thumb_ids[$object_id]) )
		{
			$this->opened_processings_for_thumb_ids[$object_id]=true;
			$external_url_existing = apply_filters( $this->prefix_ . 'currenturl', $external_url_existing, $object_id );
			unset($this->opened_processings_for_thumb_ids[$object_id]);
		}
		return  $external_url_existing;
	}

	public function get_post_external_thumbnail_url_raw( $object_id ){ 
		return get_post_meta( $object_id, '_thumbnail_ext_url', TRUE );
	}
	// ========================================================================= //



	public function opts_page_output()
	{  
		$this->settings_page_part("start", 'first');
		?> 

		<style> 
		p.submit { text-align:center; }
		p.warning { color:pink; }
		</style> 

		<?php if ($this->active_tab=="Options") 
		{
			//if form updated
			if( $this->checkSubmission() ) { 
				$this->opts['show_column_images'] = !empty($_POST[ $this->plugin_slug ]['show_column_images']) ; 
				$this->youtube->YT_admin_updates();
				$this->update_opts(); 
			}
			?>

			<p class="warning"><?php _e("Note: this plugin doesn't support gutenberg editor and is only available in Classic Editor pages:", 'external-url-as-post-featured-image-thumbnail');?></p>
			
			<form class="mainForm" method="post" action="">

			<p><?php _e('Note, this plugin uses "external url reference" approach (so, if that external source deletes/changes that image from their site, you will be affected too ) as opposed to other plugins, which save image on your site and thus, you are more safe. So, you should decide which approach you want. The goal of our plugin is not to download & save external images inside your site files, instead a wrapper to be able to set external thumbnail images on the fly & programatically.', 'external-url-as-post-featured-image-thumbnail');?></p>
			
			<table class="form-table"> 
				<tr>
					<td>
						<?php _e("to get thumbnail url with function:", 'external-url-as-post-featured-image-thumbnail');?>
					</td>
					<td>
						<code>$GLOBALS['<?php echo __NAMESPACE__;?>']->get_post_external_thumbnail_url( $post_id );</code>
					</td>
				</tr>
				<tr>
					<td>
						<?php _e("To set thumbnails programatically:", 'external-url-as-post-featured-image-thumbnail');?>
					</td>
					<td>
						<code>
						add_filter("<?php echo $this->prefix_;?>currenturl", "func_2", 20, 2);
						<br/>function func_2( $external_url_existing, $object_id ){ return  ...; }
						</code>
					</td>
				</tr>
				
				<tr>
					<td>
						<?php _e("Show Featured Image column in ALL POSTS page", 'external-url-as-post-featured-image-thumbnail');?>
					</td>
					<td>
						<input name="<?php echo $this->plugin_slug;?>[show_column_images]" type="checkbox" value="1" <?php checked($this->opts['show_column_images'], true);?> />
					 
					</td>
				</tr>
			
				<?php
				$this->youtube->YT_admin_output();
				?>
			</table>
			
			<?php $this->nonceSubmit(); ?>

			</form>

		<?php 
		}
		$this->settings_page_part("end", '');
		
	} 





  } // End Of Class

  $GLOBALS[__NAMESPACE__] = new PluginClass();

} // End Of NameSpace

?>