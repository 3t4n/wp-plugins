<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.
if ( !class_exists('ARMICN_MENU_METAS')) {
    class ARMICN_MENU_METAS {

        function __construct(){

            
            add_action( 'admin_footer', array( $this, 'armicn_modal' ) );
            add_action( 'wp_nav_menu_item_custom_fields', array( $this, 'add_armicn_icon_option_inside_menu_item' ), 10, 2 );
        
        }

        function add_armicn_icon_option_inside_menu_item( $item_id, $item ) {

           
            $ar_menu_icons = get_post_meta( $item_id, 'ar_menu_icons', true );
            $armicn_icon_source = isset($ar_menu_icons['content']['icon_source']) ? $ar_menu_icons['content']['icon_source'] : '';
            $armicn_icon = isset($ar_menu_icons['content']['icon']) ? $ar_menu_icons['content']['icon'] : '';
            $icon_html = '';

            if(!empty($armicn_icon_source) && !empty($armicn_icon)){

                if($armicn_icon_source == 'dashicon' || $armicn_icon_source == 'fontawesome' || $armicn_icon_source == 'themify'){
                    $icon_html = '<span class="'.$armicn_icon.'"></span>';
                }
                
            }
            
                ?>
                    <div class="armicn_saved_icon_wrapper <?php echo !empty($armicn_icon) ? esc_attr( 'has-icon') : '' ?>" style="clear: both;">
                        <?php 
                            if($armicn_icon_source == 'dashicon' || $armicn_icon_source == 'fontawesome' || $armicn_icon_source == 'themify' || $armicn_icon_source == ''){ ?>
                                 <div class="armicn_saved_icon"><?php echo wp_kses_post( $icon_html )?></div> 
                            <?php }
                        ?>
                       
                        <div class="armicn_saved_icon_actions">
                            <button type="button" class="armicn_set_icon_toggle_in_nav_item" data-icon_source ="<?php echo esc_attr( $armicn_icon_source )?>" data-menu_item_id="<?php echo esc_attr($item_id); ?>"><?php echo !empty($armicn_icon) && ($armicn_icon_source == 'dashicon' || $armicn_icon_source == 'fontawesome' || $armicn_icon_source == 'themify') ? 'Change' : 'Add Icon'; ?></button>
                            
                            <button type="button" class="armicn_remove_icon_toggle_in_nav_item" data-icon_source ="<?php echo esc_attr( $armicn_icon_source )?>" data-menu_item_id="<?php echo esc_attr($item_id); ?>"><?php echo esc_html_e('Remove', 'ar-menu-icons'); ?></button>
                        </div>
                    </div>
                <?php
            

        }

        public function armicn_modal(){
            ob_start();
            $contents = ob_get_clean();

            ?>
                <div id="armicn-modal" style="display: none;">
                    <div class="armicn-overlay"></div>
                    <div class="armicn-modal-body">
                        <div class="ajax-loader"><img src="<?php echo esc_url(ARMICN_DIR_URL.'admin/assets/img/ajax-loader.gif'); ?>" alt="Ajax Loader"></div>
                        <button type="button" class="armicn-modal-closer"><span class="dashicons dashicons-no"></span></button>
                        <div class="armicn-modal-content">
                                <?php                 
                                 include_once ARMICN_DIR_PATH . 'admin/templates/icon-modal-content.php'; // Extracted HTML into a separate file for better structure
                                 ?>
                        </div>
                        <div class="action-bar">
                            <p class="form-status"></p>
                            <button type="button" class="button armicn-save button-primary" action="save_close" disabled >Save & Close</button>
                        </div>
                    </div>
                </div>

            <?php
            
            echo esc_html($contents);
            
        }

       
    }
    $ARMICN_MENU_METAS = new ARMICN_MENU_METAS();
}








