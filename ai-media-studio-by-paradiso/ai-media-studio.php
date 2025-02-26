<?php

/**
 * 
 * Plugin Name:     AI Media Studio by Paradiso
 * Plugin URI:      https://www.paradiso.ai/ai-media-studio
 * Description:     AI Media Studio by Paradiso plugin integrates Paradiso AI platform with WordPress. So you have access to all the features of Paradiso AI right from the WordPress without having to sign in separately.
 * Version:         1.0.1
 * Author:          Paradiso AI
 * Text Domain:     ai-media-studio
 * Author URI:      https://www.paradiso.ai/
 * License:         GPLv2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * You should have received a copy of the GNU General Public License
 * along with All In One Course Review. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class AI_Media_Studio {
    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'admin_menu',                               [ $this, 'add_menu_page' ]                      );
        add_action( 'admin_enqueue_scripts',                    [ $this, 'ai_media_studio_enqueue_scripts' ]    );
        add_action( 'wp_ajax_paradiso_ai_redirect_ajax',        [ $this, 'paradiso_ai_redirect_ajax' ]          );
        add_action( 'wp_ajax_nopriv_paradiso_ai_redirect_ajax', [ $this, 'paradiso_ai_redirect_ajax' ]          );
    }

    /**
     * 
     * Ajax Call back
     * 
     */

    public function paradiso_ai_redirect_ajax() {

        if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'ai_media_studio_sso_nonce' ) ) {
            wp_send_json_error( 'Invalid nonce' );
            wp_die();
        }else{
            global $current_user;
            if ( ! is_user_logged_in() ) {
                wp_send_json_error( 'Please log in to access this feature.' );
            }
            $email = $current_user->user_email;
            $timestamp = time();
            $secret_key = 'Paradiso@123';
            $platform = 'E-com';
            $salt_token = md5( $timestamp . $email . $secret_key );
            $sso_url = 'https://app.paradiso.ai/sso?email=' . $email . '&salt_token=' . $salt_token . '&timestamp=' . $timestamp.'&platform='.$platform;
            wp_send_json_success( array( 'redirect_url' => esc_url_raw( $sso_url ) ) );
        }
        wp_die();
    }

    /**
     * Enqueue plugin scripts, ajax and styles.
     */
    public function ai_media_studio_enqueue_scripts() {
        wp_enqueue_script( 'ai-media-studio-script', plugin_dir_url( __FILE__ ) . 'assets/js/ai-media-studio.js', array(), filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/ai-media-studio.js' ), true );

        wp_localize_script( 'ai-media-studio-script', 'ai_media_studio_ajax_object', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'ai_media_studio_sso_nonce' )
        ) );
        wp_enqueue_style( 'ai-media-studio-style', plugin_dir_url( __FILE__ ) . 'assets/css/ai-media-studio.css', array(), filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/ai-media-studio.css' ), 'all' );
    }


    /**
     * Add the menu page.
     */
    public function add_menu_page() {
        add_menu_page(
            __( 'AI Media Studio', 'ai-media-studio' ),
            __( 'AI Media Studio', 'ai-media-studio' ),
            'manage_options',
            'ai-media-studio',
            [ $this, 'ai_studio_main_plugin_page' ],
            plugin_dir_url( __FILE__ ). 'assets/images/fav-icon.png',
            3
        );
    }


    /**
     * Render the main page.
     */

    public function ai_studio_main_plugin_page() {

        $nonce = wp_create_nonce( 'ai_media_studio_sso_nonce' );
        ?>
        <div class="sds-main-page">
            <h1 class="sds-page-heading">
                <?php printf( __( 'Introducing <a href="%s" target="_blank">Paradiso AI Media Studio</a>', 'ai-media-studio' ), 'https://app.paradiso.ai/register' ); ?>
            </h1>
            <p><?php esc_html_e( 'The ultimate all-in-one media creation and editing platform that empowers users to easily create and edit text, images, and videos with a human-like spokesperson, human-sounding voice-overs, and translations in over 75 languages.', 'ai-media-studio' ); ?></p>
            <p><?php esc_html_e( 'With Paradiso AI, you can create engaging articles, generate stunning YouTube videos, translate your eLearning course into different languages, or even create internal communication videos with your digital avatar - the possibilities are truly endless! And the best part? You can get started for free and harness the power of AI to create high-quality content that stands out.', 'ai-media-studio' ); ?></p>
            <?php 

                if ( is_user_logged_in() ) { 
                    $button_text = esc_html__( 'Create videos Instantly just video?', 'ai-media-studio' );
                    printf( '<button type="button" class="pds-sso-login paradiso-top-sso" data-nonce="%s">%s</button>', esc_attr( $nonce ), esc_html( $button_text ) );
                } 
            ?>
            <h2 class="sds-subheading"><?php esc_html_e( 'Features', 'ai-media-studio' ); ?></h2>
            <ul class="sds-feature-list">
                <li><?php esc_html_e( 'Explore the AI Platform for a variety of tools to Create engaging content with app.paradiso.ai :', 'ai-media-studio' ); ?></li>
                <li><?php esc_html_e( 'Paradiso AI tools:', 'ai-media-studio' ); ?>
                    
                    <ul class="sds-feature-lists">
                        <li><?php esc_html_e( 'AI video generator', 'ai-media-studio' ); ?></li>  
                        <li><?php esc_html_e( 'AI text generator', 'ai-media-studio' ); ?></li>  
                        <li><?php esc_html_e( 'AI image generator', 'ai-media-studio' ); ?></li>  
                        <li><?php esc_html_e( 'AI voice-over generator', 'ai-media-studio' ); ?></li>  
                        <li><?php esc_html_e( 'AI translator', 'ai-media-studio' ); ?></li> 
                        <li><?php esc_html_e( 'Screen recording', 'ai-media-studio' ); ?></li> 
                        <li><?php esc_html_e( 'AI video editor', 'ai-media-studio' ); ?></li>
                    </ul>
                </li>
                <li><?php esc_html_e( 'Create templates for everything you do, from content creation to internal communication videos.', 'ai-media-studio' ); ?></li>
                <li><?php esc_html_e( 'Create high-quality content in over 50 languages, making it easy to expand your reach and connect with diverse audiences worldwide.', 'ai-media-studio' ); ?></li>
                <li><?php esc_html_e( 'Utilize the internal API to integrate Paradiso AI Media Studio into your applications and create customized solutions.', 'ai-media-studio' ); ?></li>
                <li><?php esc_html_e( 'Understand with ease with the multilingual feature ', 'ai-media-studio' ); ?>
                    
                    <ul class="sds-feature-lists">
                        <li><?php esc_html_e( '12 Languages for Live Transcribe for Speech to Text', 'ai-media-studio' ); ?></li> 
                        <li><?php esc_html_e( '+144 Languages and Dialects for Text to Speech', 'ai-media-studio' ); ?></li> 
                        <li><?php esc_html_e( '+170 Languages & Dialects for Speech to Text', 'ai-media-studio' ); ?></li> 
                    </ul> 
                </li>
                <li><?php esc_html_e( 'Create audio files with any document file ', 'ai-media-studio' ); ?>
                    <ul class="sds-feature-lists">
                        <li><?php esc_html_e( '900+ Different voices and accents ', 'ai-media-studio' ); ?></li> 
                        <li><?php esc_html_e( 'Mix up to 20 voices in a single text synthesize task ', 'ai-media-studio' ); ?></li> 
                        <li><?php esc_html_e( 'Multiple voice combinations for standard & neural voices ', 'ai-media-studio' ); ?></li>
                    </ul>
                </li>
                <li><?php esc_html_e( 'Stay tuned for upcoming features that will enhance your content creation experience even further. ', 'ai-media-studio' ); ?></li>
            </ul>
            <p>
                <?php printf( __( '<a href="%s" target="_blank">Paradiso AI Media Studio </a>accelerate your content transformation and reduce your production costs like never before. So why wait?', 'ai-media-studio' ), 'https://app.paradiso.ai/register' ); ?>
            </p>
            <p class="ft-text-pds">
                <?php esc_html_e( 'Try out the Paradiso AI Media Studio for Free today and experience the power of AI for yourself! ', 'ai-media-studio' ); ?></p>
            <?php 

                if ( is_user_logged_in() ) { 
                    $button_text = esc_html__( 'Access your account for free', 'ai-media-studio' );
                    printf( '<button type="button" class="pds-sso-login paradiso-bottom-sso" data-nonce="%s">%s</button>', esc_attr( $nonce ), esc_html( $button_text ) );
                }
            ?>
        </div>
        <?php
    }
}new AI_Media_Studio();
