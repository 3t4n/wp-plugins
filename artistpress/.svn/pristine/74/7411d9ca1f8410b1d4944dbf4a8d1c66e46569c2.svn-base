<?php
namespace ArtistPress\Administration\Update;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class V151 extends Controller
{
	public function upgradeArtistSettings()
    {
        $options = \get_option('artistpress_artist_settings');

        if (is_array($options) && \array_key_exists('artist_use_artist_stylesheet', $options)) {
            $options['artist_use_stylesheet'] = $options['artist_use_artist_stylesheet'];
            unset($options['artist_use_artist_stylesheet']);  
        }

        if (is_array($options) && \array_key_exists('artist_use_artist_shortcode', $options)) {
            $options['artist_use_shortcode'] = $options['artist_use_artist_shortcode'];
            unset($options['artist_use_artist_shortcode']);  
        }

        \update_option('artistpress_artist_settings', $options);
    }

    public function upgradeGallerySettings()
    {
        $options = \get_option('artistpress_gallery_settings');

        if (is_array($options) && \array_key_exists('gallery_use_gallery_stylesheet', $options)) {
            $options['gallery_use_stylesheet'] = $options['gallery_use_gallery_stylesheet'];
            unset($options['gallery_use_gallery_stylesheet']);  
        }

        \update_option('artistpress_gallery_settings', $options);
    }
	
	public function run()
    {        
        \error_log(\print_r(intval($this->existingVersion), true));
        
        if (intval($this->existingVersion) > 1.5) {
			return;
		}

        \error_log(\print_r('Will Be Upgraded', true));
        
        $this->upgradeArtistSettings();
        $this->upgradeGallerySettings();
		
        \update_option('artistpress_version', $this->version);
    }
}
