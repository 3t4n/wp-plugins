<?php
namespace ExternalUrlAsPostFeaturedImageThumbnail
{
	if (!defined('ABSPATH')) exit;

	class YoutubeClass
	{

		public function __construct($class)
		{
			$this->parent = $class;
			$this->setFeaturedImagesYoutube();
		}

		public function __construct_my()
		{
			$this->attachKeyName = $this->parent->opts['youtube_meta_key'];
		}

		public $default_opts = [
			'youtube_meta_key' 			=> 'yt_meta_key',
			'youtube_default_resolution'=> 'hqdefault'
		];
		
		public function YT_admin_updates()
		{ 
			$this->parent->opts['youtube_meta_key']		= sanitize_key($_POST[ $this->parent->plugin_slug ]['youtube_meta_key']) ; 
			$this->parent->opts['youtube_default_resolution'] = sanitize_key($_POST[ $this->parent->plugin_slug ]['youtube_default_resolution']) ; 
		}
		
		public function YT_admin_output()
		{ ?>
			<tr>
				<td colspan="2" style="text-align:center;"><img src="https://www.youtube.com/favicon.ico" width=30/></td>
			</tr> 
			<tr>
				<td>
					<?php _e("[Automatic Youtube thumbnails]", 'external-url-as-post-featured-image-thumbnail');?>
				</td>
				<td>
					<p class="description">* As written above, this plugin's behavior is opposed to <b><a href="https://wordpress.org/plugins/youtube-thumbnail-to-featured-image/">Youtube Thumbnail as Featured Image</a></b> plugin (which saves that image in your site). So, you might choose that plugin over my plugin depending on your needs.</p>
					<br/>
					<?php _e("To automatically set youtube thumbnails for post, you should have a 'custom field' where you save youtube links. For example, if you save youtube urls in custom field with meta-key <code>my_youtube_url_metakey</code>, then insert it here (leave empty to disable this feature at all)", 'external-url-as-post-featured-image-thumbnail');?>
					<input name="<?php echo $this->parent->plugin_slug;?>[youtube_meta_key]" type="text" placeholder="my_youtube_url_metakey" value="<?php echo $this->parent->opts['youtube_meta_key'];?>" />
					<?php _e("Choose default resolution to be used amont <code>mqdefault,hqdefault,maxresdefault,0,1,2,3</code>(we don't recommend to use high resolution for thumbnails)", 'external-url-as-post-featured-image-thumbnail');?>
					<br/><input name="<?php echo $this->parent->plugin_slug;?>[youtube_default_resolution]" type="text" placeholder="hqdefault" value="<?php echo $this->parent->opts['youtube_default_resolution'];?>" />
				</td>
			</tr>
		 <?php
		}




		//  EXTERNAL URL
		public function setFeaturedImagesYoutube()
		{
			add_filter("EUAPFIT_currenturl",  [$this, "curr_url"], 20, 2);
		} 

		public function get_youtube_id_from_url($url) {
			preg_match('/(http(s|):|)\/\/(www\.|)youtu(be\.com|\.be)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results); 
			return (isset($results[6]) ? $results[6] : false);
		}

		public function curr_url($external_url_existing, $object_id ){
			if ( empty( $external_url_existing ) )
			{
				if ( !empty($this->attachKeyName) )
				{
					$yout_link_or_id = trim( get_post_meta($object_id, $this->attachKeyName, true) );
					if (!empty($yout_link_or_id))
					{
						$id = strlen($yout_link_or_id)==11 ? $yout_link_or_id : $this->get_youtube_id_from_url($yout_link_or_id); 
						if (!empty($id))
						{
							$external_url_existing = $this->parent->helpers->get_youtube_thumbnail($id, $this->parent->opts['youtube_default_resolution']);
						}
					}
				}
			}
			return $external_url_existing;
		}




	}
}