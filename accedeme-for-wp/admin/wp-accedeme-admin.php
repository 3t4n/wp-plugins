<?php

/**
 * Admin main page.
 *
 * This class defines all code necessary to display admin's main page.
 *
 * @package    wp_accedeme
 * @subpackage wp_accedeme/admin
 * @author     Accedeme
 */
class wp_accedeme_admin
{
    public function __construct()
    {
        add_action('admin_menu', array( $this, 'accedeme_admin_menu_script' ) );
    }

    function accedeme_admin_menu_script(){
        add_options_page( 'Accedeme for WP', 'Accedeme for WP', 'manage_options', 'accedeme-plugin-option', array( $this, 'accedeme_options_menu_script' ) );
    }

    function accedeme_options_menu_script(){
        
        if ( !current_user_can('manage_options') ){
                
            wp_die( __('No tiene suficientes permisos para acceder a esta página.','wp-accedeme') );
            
        }	
        if( !defined( 'ABSPATH' ) ) exit;
    
        $imageUrl = ACCEDEME_URL .'/assets/images/logo_accedeme.png';
    
        $handle = 'accedeme_wp.css';
        $src = ACCEDEME_URL . '/assets/css/accedeme_wp.css';
    
        require_once ACCEDEME_DIR . 'includes/wp-accedeme-helpers.php';
        $helpers = new wp_accedeme_helpers();

		$website_key = $helpers->accedemeGetWebsiteKey();
    
        wp_enqueue_style( $handle, $src );
        ?>
        <div class="accedeme-wrap">
    
            <h2><?php _e('WP Accedeme &raquo; Settings','wp-accedeme'); ?></h2>
            
            <div class="accedeme-container">
                <a id="accedeme-logo" href="<?php echo esc_attr( 'https://accedeme.com/login' ); ?>" target="_blank">
                    <img src="<?php echo esc_url( $imageUrl ); ?>" alt="Logo de Accedeme">
                </a>
                <?php 
                    if ( $website_key ) 
                    {
                        echo '<a id="accedeme-btn_panel" href="'.esc_attr( 'https://accedeme.com/login' ).'" target="_blank">';
                        echo '<div>';
                        _e('Panel de control','wp-accedeme');
                        echo '</div>';
                        echo '</a>';
                        echo '<div id="accedeme-reviews_text">';
                        echo '<a id="accedeme-btn_review" href="'.esc_attr( 'https://wordpress.org/plugins/accedeme-for-wp/#reviews' ).'" target="_blank">';
                        _e('Si te ha gustado no dejes de poner una reseña.', 'wp-accedeme');
                        echo '</a>';
                        echo '</div>';
                    }  
                    else 
                    {
                        echo '<div id="accedeme-reg_text">';
                        _e('Ya sólo queda registrar tu dominio en accedeme.com', 'wp-accedeme');
                        echo '</div>';
                        echo '<a id="accedeme-btn_register" href="'.esc_attr( 'https://accedeme.com/register' ).'" target="_blank">';
                        echo '<div>';
                        _e('Registra tu dominio ahora','wp-accedeme');
                        echo '</div>';
                        echo '</a>';
                    }
                ?>
            </div>
        </div>
    <?php
    }
}