<?php 

if( !function_exists("atomica_vision_data_tab_content") ) { 
    function atomica_vision_data_tab_content_styles() {
        wp_register_style( 'atomica_vision_button_css', plugins_url( 'atomica_vision_data_tab_content_styles.css', __FILE__  ), [], '1.0.0');
        wp_enqueue_style( 'atomica_vision_button_css' );
    }
    add_action( 'admin_enqueue_scripts', 'atomica_vision_data_tab_content_styles' );
}


if( !function_exists("atomica_vision_data_tab_content") ) { 
    function atomica_vision_data_tab_content() {
        global $post;
    
        ?>
         
        <div id="atomica_vision_data_tab_content" class="panel woocommerce_options_panel">
      
            <div class="inline notice woocommerce-message " style="margin: 10px;padding: 10px;" >
            You can find generator here: <a href="https://vision.atomicagroup.com/documentation?module=wp" target="blank">https://vision.atomicagroup.com/documentation</a>
            </div>
          
            <?php
                //Create some fields
                woocommerce_wp_text_input( array(
                    'id' => 'atomica_vision_product_color',
                    'name' => 'atomica_vision_product_color', 
                    'value' => get_post_meta( $post->ID, 'atomica_vision_product_color', true ),
                    'label' => 'Color',
                    'placeholder' => '01,02,03,04,05',
                    'description' => 'Select color from generator then copy and paste color here.',
                    'desc_tip' => false, 
                ) );
                wp_nonce_field(atomica_vision_product_color_key(),'atomicavision_nonce',)
            ?>
             
        </div>
        <?php
    }

}