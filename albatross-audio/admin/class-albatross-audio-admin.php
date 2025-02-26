<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.badlittlerobot.com
 * @since      1.0.0
 *
 * @package    albatross-audio
 * @subpackage albatross-audio/admin
 */

class ALBAAU_Albatross_Audio_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function albaau_albatross_audio_enqueue_admin_styles($hook) {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/albatross-audio-admin.css', array(), $this->version, 'all' );
        
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function albaau_albatross_audio_enqueue_admin_scripts($hook) {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/albatross-audio-admin.js', array( 'jquery' ), $this->version, false );
        
        // localize home_url() to use for player placeholder img 
        wp_localize_script( $this->plugin_name, 'wpData', array(
            'pluginUrl' => esc_url( plugins_url() ),
        ) ); 
        
	}



/*================================================================
* albatross_audio post type
==================================================================*/

      public function albaau_albatross_audio() {
        
        $labels = array(
            'name' => __('Albatross Audio', 'albatross-audio'),
            'singular_name' => __('Playlist', 'albatross-audio'),
            'add_new' => __('New Playlist', 'albatross-audio'),
            'add_new_item' => __('New Playlist', 'albatross-audio'),
            'edit_item' => __('Edit Playlist', 'albatross-audio'),
            'new_item' => __('New Playlist', 'albatross-audio'),
            'all_items' => __('Playlists', 'albatross-audio'),
            'view_item' => __('View Playlist', 'albatross-audio'),
            'search_items' => __('Search Playlists', 'albatross-audio'),
            'not_found' => __('Nothing Found', 'albatross-audio'),
            'not_found_in_trash' => __('Nothing Found In Trash', 'albatross-audio'),
            'remove_featured_image' => __('Remove Image', 'albatross-audio'),
            'parent_item_colon' => '',
            'menu_name' => 'Albatross'
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'hierarchical' => true,
            'show_in_menu'  => true,
            'menu_position' => 11,
            'menu_icon' =>  'dashicons-playlist-audio',
            'supports' => array( 'title', 'thumbnail' ),
            'show_in_nav_menus' => true,
            'has_archive' => 'albatross-audio',
            'show_in_rest' => true,
            'with_front' => false,
            'rewrite' => array(
                'slug' => 'albatross-audio', 
            ) ,
        );
        register_post_type('albatross-audio', $args);
    }	
    



/*================================================================
* albatross_audio Taxonomy
==================================================================*/

    public function albaau_albatross_audio_taxonomy() {
      
      $labels = array(
        'name' => __( 'Albatross Audio Categories', 'albatross-audio' ),
        'singular_name' => __( 'Category', 'albatross-audio' ),
        'search_items' =>  __( 'Search Categories', 'albatross-audio' ),
        'all_items' => __( 'All Categories', 'albatross-audio' ),
        'parent_item' => __( 'Parent Category', 'albatross-audio' ),
        'parent_item_colon' => __( 'Parent Category:', 'albatross-audio' ),
        'edit_item' => __( 'Edit Category', 'albatross-audio' ), 
        'update_item' => __( 'Update Category', 'albatross-audio' ),
        'add_new_item' => __( 'Add New Category', 'albatross-audio' ),
        'new_item_name' => __( 'New Category Name', 'albatross-audio' ),
        'menu_name' => __( 'Categories', 'albatross-audio' ),
      );    
      
    // register taxonomy
      register_taxonomy('albatross_audio_categories',array('albatross-audio'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'category' ),
      ));
      
    }




/*================================================================
* albatross_audio Admin Columns
==================================================================*/

     public function albaau_albatross_audio_admin_columns( $columns ) {

        $columns = array(
          'cb' => $columns['cb'],
          'title' => __( 'Title', 'albatross-audio' ),
          'songs' => __( 'Songs', 'albatross-audio' ),
          'cats' => __( 'Categories', 'albatross-audio' ),
          'shortcode' => __( 'Shortcode', 'albatross-audio' ),
          'date' => $columns['date'],
        );

      return $columns;

    }

        
    public function albaau_albatross_audio_admin_columns_data( $column, $post_id ) {

    // songs column
    if ( 'songs' === $column ) {
      $songs = get_post_meta($post_id, 'albatross_audio_songs', true );
      if($songs) {
        echo '<span class="albatross-admin-col-value">'.count($songs).'</span>';
      } else {
        echo '<span class="albatross-admin-col-value">0</span>';
      }
    }     

    // shortcode column
    if ( 'shortcode' === $column ) {
          
        echo '<span class="albatross-admin-col-value">[albatross-audio id='.esc_html(get_the_ID()).']</span>';
      
    }
    
    // cats column
    if ( 'cats' === $column ) {
      $terms = get_the_terms( get_the_ID(), 'albatross_audio_categories' );
        if( ! empty($terms) ) {
             echo '<span class="albatross-admin-col-value">';
        if( is_array($terms) ) {
            foreach($terms as $term) {
              echo '<a href="'.esc_html(get_edit_term_link($term)).'">'.esc_html($term->name).'</a>';
              if (next($terms )) {
                    echo  ', ';
                }
            }
        } else {
              if (!is_wp_error($terms)) {
                  if (!is_wp_error($terms)) {
                      if (!is_wp_error($terms)) {
                          if (!is_wp_error($terms) && isset($terms->name)) {
                              echo esc_html($terms->name);
                          }
                      }
                  }
              }
        }
        echo '</span>';
      }
    }

}

    
    

/*================================================================
* albatross_audio metabox
==================================================================*/

public function albaau_albatross_audio_songs_metabox() {  
    add_meta_box(  
        /**
         * Metabox ID for the Albatross Audio plugin.
         *
         * This ID is used to register the metabox for Albatross songs in the WordPress admin area.
         *
         * @var string $blr_albatross_songs_metabox
         */
        'blr_albatross_songs_metabox', // Metabox ID  
        __('Songs', 'albatross-audio'), // Metabox title  
        array($this, 'albaau_albatross_metabox_callback'),
        'albatross-audio', // Post type  
        'normal', // Context  
        'high' // Priority  
    );  
}

public function albaau_albatross_metabox_callback() {
    // Get the current post ID  
    $post_id = get_the_ID(); 
    
    // Nonce for security  
    wp_nonce_field('albaau_albatross_audio_metabox_nonce', 'albaau_albatross_audio_metabox_nonce');
    $songs = get_post_meta($post_id, 'albatross_audio_songs', true );
    
    // Retrieve stored warnings and display them
    $warnings = get_option('albaau_albatross_audio_warnings', []);
    if (!empty($warnings)) {
        foreach ($warnings as $warning) {
            echo '<div class="notice notice-warning is-dismissible"><p>' . esc_html($warning) . '</p></div>';
        }
        // Clear warnings after displaying
        delete_option('blr_albatross_audio_warnings');
    }
    ?>
    <div class="albatross-wrap">
        <button type="button" class="button button-primary albatross-add-song-btn" id="albatross-add-song-field">Add Song</button>
        <button type="button" class="button button-secondary" id="albatross-collapse">Collapse All</button>
        <div id="albatross-song-fields">
            <?php
            if ($songs) {
                $field_count = count($songs);
                for ($i = 0; $i < max(1, $field_count); $i++) { 
                    $this->render_song_fields($songs[$i], $i);
                }
            } else {
                $this->render_song_fields(null, 0);
            }
            ?>
        </div>
    </div>
    <?php
}

private function render_song_fields($song = null, $index = 0) {

    // Placeholder image URL
    $placeholder_img = esc_url(plugin_dir_url(__FILE__)) . 'img/placeholder.png';  
    $thumb_img = !empty($song['song_thumb']) ? esc_url($song['song_thumb']) : $placeholder_img;
    
    $defaults = [
        'song_title'  => '',
        'song_artist' => '',
        'song_thumb'  => esc_url(plugin_dir_url(__FILE__)) . 'img/placeholder.png',
        'song_file'   => '',
        'song_links'   => '',
    ];
    $song = wp_parse_args($song, $defaults);
    ?>
    <div class="song-field-group">
            <!-- Use a unique ID for the postbox using the $index -->
            <div id="albatross-postbox-<?php echo esc_html($index); ?>" class="albatross-postbox">
                
                <h2 class="albatross-hndle">
                    <span><?php echo esc_html(($index + 1)) . '. ' . esc_attr($song['song_title']); ?></span>
                </h2>
                
                <div class="albatross-inside inside-<?php echo esc_html($index); ?>">
                    <div class="main">
                        <div class="albatross-inside-wrap">
                            <div class="albatross-img-col">
                                <div class="albatross-thumb-preview" id="albatross_thumb_preview_<?php echo esc_html($index); ?>">
                                    <img src="<?php echo esc_html($thumb_img); ?>" />
                                </div>
                                <input type="hidden" name="albatross_song_thumb[]" id="albatross_song_thumb_<?php echo esc_html($index); ?>" value="<?php echo esc_attr($song['song_thumb']); ?>" />
                            </div>
                            <table class="form-table albatross-form-col">
                                <tr>
                                    <th class="albatross-admin-th" scope="row">
                                        <label class="albatross-input-label" for="albatross_song_title_<?php echo esc_html($index); ?>">Title:</label>
                                    </th>
                                    <td class="albatross-admin-td">
                                        <input type="text" class="form-control" name="albatross_song_title[]" id="albatross_song_title_<?php echo esc_html($index); ?>" value="<?php echo esc_attr($song['song_title']); ?>" />
                                    </td>  
                                </tr>
                                
                                <tr>
                                    <th class="albatross-admin-th" scope="row">
                                        <label class="albatross-input-label" for="albatross_song_artist_<?php echo esc_html($index); ?>">Artist:</label>
                                    </th>
                                    <td class="albatross-admin-td">
                                        <input type="text" class="form-control" name="albatross_song_artist[]" id="albatross_song_artist_<?php echo esc_html($index); ?>" value="<?php echo esc_attr($song['song_artist']); ?>" />
                                    </td>  
                                </tr>
                                
                                <tr>
                                    <th class="albatross-admin-th" scope="row">
                                        <label class="albatross-input-label" for="albatross_song_file_<?php echo esc_html($index); ?>">URL:</label>
                                    </th>
                                    <td class="albatross-admin-td">
                                        <input type="text" name="albatross_song_file[]" id="albatross_song_file_<?php echo esc_html($index); ?>" class="form-control" value="<?php echo esc_attr($song['song_file']); ?>" />
                                    </td>  
                                </tr>
                                
                                
                            <?php
                            if( $song['song_links'] ) {
                                $song_links = $song['song_links'];
                                foreach ($song_links as $key => $value ) {    
                            ?>

                            <tr>
                                <th class="albatross-admin-th" scope="row">
                                    <label class="albatross-input-label" for="albatross_song_link_<?php echo esc_html($key).'_'.esc_html($index); ?>"><?php echo esc_html(ucwords(str_replace('-', ' ', $key))); ?>:</label>
                                </th>
                                <td class="albatross-admin-td">
                                    <input type="text" name="albatross_song_link[<?php echo esc_html($key); ?>][]" id="albatross_song_link_<?php echo esc_html($key.'_'.$index); ?>" class="form-control" value="<?php echo esc_html($value); ?>" disabled />
                                </td>  
                            </tr>

                            <?php            
                                }
                            }
                            ?>
                                
                            </table>
                        </div>

                        <?php
                        /**
                         * Allow other plugins to add custom fields inside the song field group.
                         */
                        do_action('albatross_audio_additional_fields', $index, $song);
                        ?>
                        
                        <div class="albatross-song-btns">          
                        
                            <button type="button" class="button button-primary albatross-btn albatross-upload-thumb-button" data-index="<?php echo esc_html($index); ?>" <?php echo ! empty($song['song_thumb']) ? 'style="display: none;"' : ''; ?>><span class="btn-inside"><span class="dashicons dashicons-format-image"></span>Select Image</span></button>
                            <button type="button" class="button button-primary albatross-btn albatross-remove-thumb-button" data-index="<?php echo esc_html($index); ?>" <?php echo empty($song['song_thumb']) ? 'style="display: none;"' : ''; ?>><span class="btn-inside"><span class="dashicons dashicons-no-alt"></span>Remove Image</span></button>
                            <button type="button" class="button button-primary albatross-btn albatross-upload-button"><span class="btn-inside"><span class="dashicons dashicons-format-audio"></span>Select Audio</span></button>
                            
                            
                            <button type="button" class="button button-primary albatross-btn remove-song-btn"><span class="btn-inside"><span class="dashicons dashicons-no-alt"></span>Remove Song</span></button>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>  
    <?php
}



/*******************************************************************************
Get playlist duration
*******************************************************************************/

    public function albaau_albatross_audio_playlist_duration($songs) {
        $play_times = array();
        if (!empty($songs)) {
            foreach ($songs as $song) {
                $song_file = $song['song_file'];
                if ($song_file) {
                    $song_id = attachment_url_to_postid($song_file);
                    $song_metadata = wp_get_attachment_metadata($song_id);
                    if (isset($song_metadata['length_formatted'])) {
                        $play_times[] = $song_metadata['length_formatted'];
                    }
                }
            }
        }
        return $this->albaau_albatross_AddPlayTime($play_times);
    }


/*******************************************************************************
Get playlist total play time
*******************************************************************************/

    public function albaau_albatross_AddPlayTime($play_times) {
        $minutes = 0;
        if (!empty($play_times)) {
            foreach ($play_times as $time) {
                if (preg_match('/^\d{2}:\d{2}$/', $time)) {
                    list($hour, $minute) = explode(':', $time);
                } else {
                    $hour = 0;
                    $minute = 0;
                }
                $minutes += $hour * 60 + $minute;
            }
        }
        $hours = floor($minutes / 60);
        $minutes -= $hours * 60;
    
        return sprintf('%02d:%02d', $hours, $minutes);
    }
    


/*******************************************************************************
Set first thumb as featured image if not set 
*******************************************************************************/


public function albaau_modify_featured_image_text($content, $post_id) {
    $post_type = get_post_type($post_id);

    if ($post_type === 'albatross-audio') {
        $content = $content.'<div class="owl-thumb-notice"><p>If empty, the featured image will be set with the first available song thumbnail when post is saved.</p></div>';
    }

    return $content;
} 

public function albaau_update_featured_image_from_song_thumbnail($post_id) {
        // Check if a featured image is already set
        if (has_post_thumbnail($post_id)) {
            return;
        }
        
        // Get the songs metadata
        $songs = get_post_meta($post_id, 'albatross_audio_songs', true);
        
        if (!empty($songs) && is_array($songs)) {
            foreach ($songs as $song) {
                if (!empty($song['song_thumb'])) {
                    $thumbnail_url = esc_url(plugin_dir_url(__FILE__)) . 'img/placeholder.png';
                    if ($thumbnail_url) {
                        set_post_thumbnail($post_id, $thumbnail_url);
                    }
                    return; // Stop after setting the first valid image
                }
            }
        } else {
            if (!empty($songs) && is_array($songs)) {
                $song = $songs[0];
                $thumbnail_url = esc_url(plugin_dir_url(__FILE__)) . 'img/placeholder.png';
                if ($thumbnail_url) {
                    set_post_thumbnail($post_id, $thumbnail_url);
                }
            }
            return;
        }


    }





/*******************************************************************************
Save Functions
*******************************************************************************/

      public function albaau_albatross_audio_save_metabox($post_id) {

               // Check if our nonce is set.  
               if ( ! isset($_POST['albaau_albatross_audio_metabox_nonce']) ) {  
                  return;  
               }  
                
               // Verify that the nonce is valid.  
               if ( ! wp_verify_nonce( wp_unslash(sanitize_key($_POST['albaau_albatross_audio_metabox_nonce'])), 'albaau_albatross_audio_metabox_nonce') ) {  
                  return;  
               }  
                
               // If this is an autosave, our form has not been submitted, so we don't want to do anything.  
               if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {  
                  return;  
               }  
                
               // Check the user's permissions.  
               if ( ! current_user_can('edit_post', $post_id) ) {  
                    return;  
                }
                
                
                // Audio
                $songs = [];
                $warnings = [];
                
if (!empty($_POST['albatross_song_title'])) {
    $count = count($_POST['albatross_song_title']);
    
    for ($i = 0; $i < $count; $i++) {
        
        $song_title = isset( $_POST['albatross_song_title'][$i] ) 
        ? sanitize_text_field( wp_unslash( $_POST['albatross_song_title'][$i] ) ) 
        : '';
    
    $song_artist = isset( $_POST['albatross_song_artist'][$i] ) 
        ? sanitize_text_field( wp_unslash( $_POST['albatross_song_artist'][$i] ) ) 
        : '';
    
    $song_file = isset( $_POST['albatross_song_file'][$i] ) 
        ? esc_url_raw( wp_unslash( $_POST['albatross_song_file'][$i] ) ) 
        : '';
    
    $song_thumb = isset( $_POST['albatross_song_thumb'][$i] ) 
        ? esc_url_raw( wp_unslash( $_POST['albatross_song_thumb'][$i] ) ) 
        : '';
        

        





        $songs[$i] = [
            'song_title'  => $song_title,
            'song_artist' => $song_artist,
            'song_file'   => $song_file,
            'song_thumb'  => $song_thumb,
        ];
        
        // Validate URL
        if (!$this->albaau_is_valid_url($song_file)) {
            $warnings[] = "Warning: Invalid URL on song \"$song_title\". This song will not be included in the playlist.";
        } elseif (!$this->albaau_is_playable_url($song_file)) {
            $warnings[] = "Warning: The song \"$song_title\" is not playable. This song will not be included in the playlist.";
        }

        // Allow plugins to modify or add extra fields before saving
        $songs[$i] = apply_filters('albatross_audio_save_song_data', $songs[$i], $i, $post_id);
    }

    // Save the 'albatross_audio_songs' array as a serialized string
    update_post_meta($post_id, 'albatross_audio_songs', $songs);

    if (!empty($warnings)) {
        update_option('albaau_albatross_audio_warnings', $warnings);
    }
}

        } // end blr_save_songs_metabox
        
        
    
    // Validate URL
    public function albaau_is_valid_url($url) {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
    
    // Check if URL is playable
    public function albaau_is_playable_url($url) {
        $headers = @get_headers($url, 1);
        if (!$headers || strpos($headers[0], '200') === false) {
            return false;
        }
        return isset($headers['Content-Type']) && (strpos($headers['Content-Type'], 'audio/') !== false);
    }


    // Display admin notices
    public function albaau_blr_display_song_file_warnings() {
        
        $warnings = get_option('blr_song_file_warnings', []);
    
        if (!empty($warnings)) {
            foreach ($warnings as $warning) {
                echo esc_html("<div class='notice notice-warning is-dismissible'><p>'.esc_html($warning).'</p></div>");
            }
    
            // Clear the warnings after displaying
            delete_option('blr_song_file_warnings');
        }
    }



} // end class ALBAAU_Albatross_Audio_Admin