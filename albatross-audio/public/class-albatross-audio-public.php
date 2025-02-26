<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.badlittlerobot.com
 * @since      1.0.0
 *
 * @package    albatross-audio
 * @subpackage albatross-audio/public
 */

class ALBAAU_Albatross_Audio_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function albaau_albatross_audio_enqueue_public_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Albatross_Audio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Albatross_Audio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_enqueue_style( 'icomoon',  plugin_dir_url( __FILE__ ) . 'css/icomoon.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'bootstrap-grid',  plugin_dir_url( __FILE__ ) . 'css/bootstrap-grid.css', array(), '5.3.3', 'all' );
        wp_enqueue_style( 'albatross-audio-jplayer', plugin_dir_url( __FILE__ ) . 'css/jplayer.css', array(), '2.9.2', 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/albatross-audio-public.css', array(), $this->version, 'all' );
        
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function albaau_albatross_audio_enqueue_public_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Albatross_Audio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Albatross_Audio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_enqueue_script( 'jplayer-js', plugin_dir_url( __FILE__ ) . 'js/jquery.jplayer.min.js', array('jquery'), '2.9.2', true );
        wp_enqueue_script( 'player-playlist', plugin_dir_url( __FILE__ ) . 'js/jplayer.playlist.js', array('jquery'), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/albatross-audio-public.js', array( 'jquery' ), $this->version, false );
        
	}


/*================================================================
* Audio Archive Page Templates
==================================================================*/

    public function albaau_albatross_audio_archive_template( $blr_audio_archive ) {
        if ( is_post_type_archive('albatross-audio')) {
                // Check for the archive template in the theme folder first
                $theme_template = locate_template('albatross-audio/archive-albatross_audio.php');
                
                if ($theme_template) {
                    // If the template exists in the theme folder, use it
                    return $theme_template;
                }
                
                // If no template in the theme folder, fallback to the plugin folder
                $plugin_template = plugin_dir_path( dirname( __FILE__ ) ) . 'public/albatross-audio/archive-albatross_audio.php';
                
                if (file_exists($plugin_template)) {
                    // If the template exists in the plugin folder, use it
                    return $plugin_template;
                }
        }
        return $blr_audio_archive;
    }



/*================================================================
* Audio Single Page Template
==================================================================*/

    public function albaau_albatross_audio_single_template($albatross_audio_single) {
        if (is_singular('albatross-audio')) {
            // Check for the single template in the theme folder first
            $theme_template = locate_template('albatross-audio/single-albatross_audio.php');
            
            if ($theme_template) {
                // If the template exists in the theme folder, use it
                return $theme_template;
            }
            
            // If no template in the theme folder, fallback to the plugin folder
            $plugin_template = plugin_dir_path( dirname( __FILE__ ) ) . 'public/albatross-audio/single-albatross_audio.php';
            
            if (file_exists($plugin_template)) {
                // If the template exists in the plugin folder, use it
                return $plugin_template;
            }    
        }
        return $albatross_audio_single;
    }
    


/*================================================================
* Loop begin and end
==================================================================*/

    public function albaau_albatross_audio_loop_begin_logic() {
        
        $queried_object = get_queried_object();
        $queried_object_name = $queried_object->name;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array( 'post_type'    => $queried_object_name, 'post_status' => 'publish', 'paged' => $paged, );
		$albatross_audio_loop = new WP_Query( $args );

    }

    public function blr_albatross_audio_loop_end_logic() {

        wp_reset_postdata();
        
    }
    
    
    
} // end class ALBAAU_Albatross_Audio_Public