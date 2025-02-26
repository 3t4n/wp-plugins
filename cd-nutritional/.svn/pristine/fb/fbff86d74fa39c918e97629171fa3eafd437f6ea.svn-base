<?php
/**
 * Plugin Name: CDUK Nutritional Plugin
 * Description: Channel Digital Nutritional Plugin.
 * Version: 0.3 Lite
 * Author: Channel Digital
 * Author URI: http://www.channeldigital.co.uk
 */
if ( !session_id() ){ session_start(); }

if (!defined( 'CD_NUTRITIONAL_VERSION' ) )
{define( 'CD_NUTRITIONAL_VERSION', '0.2L' ); }
if (!defined( 'CD_NUTRITIONAL_PLUGIN_DIR' ) )
{define( 'CD_NUTRITIONAL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); }
if (!defined( 'CD_NUTRITIONAL_PLUGIN_BASENAME' ) )
{define( 'CD_NUTRITIONAL_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); }
if (!defined( 'CD_NUTRITIONAL_PLUGIN_DIRNAME' ) )
{define( 'CD_NUTRITIONAL_PLUGIN_DIRNAME', dirname( CD_NUTRITIONAL_PLUGIN_BASENAME ) ); }
if (!defined( 'CD_NUTRITIONAL_PLUGIN_URL' ) )
{define( 'CD_NUTRITIONAL_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); }
if (!defined( 'CD_NUTRITIONAL_PLUGIN_CSS_URL' ) )
{define( 'CD_NUTRITIONAL_PLUGIN_CSS_URL', CD_NUTRITIONAL_PLUGIN_URL . 'css/' ); }
// Set the common style

//wp_register_style( 'styles', CD_NUTRITIONAL_PLUGIN_CSS_URL . 'styles.css', false, false , 'screen' );
//wp_enqueue_style( 'styles' );

wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/styles.css',false,'1.1','all');


// $us_base_nut = array('servingsize','servings','calories','totalfat','satfat','transfat','cholesterol','sodium','potassium','carbohydrates','fiber','sugars','protein');
global $uk_base_nut;
$uk_base_nut = array('Nutritional Values', 'energy (kJ)','energy (kcal)','fat','saturates','carbohydrate','sugars','protein','salt');

function cduk_nutritional_product_tab( $tabs ) {
    global $post;
    $product = wc_get_product( $post->ID );
    $_extra = $product->get_meta('checkbox_extra_tab');
    if($_extra=="yes") {
        $tabs['custom_tab'] = array(
            'title' => __('Nutritional Information', 'textdomain'),
            'callback' => 'cduk_nutritional_tab_content',
            'priority' => 50,
        );
        return $tabs;
    }
}

function cduk_nutritional_tab_content( $slug, $tab) {
    $uk_base_nut = array('Nutritional Values', 'energy (kJ)','energy (kcal)','fat','saturates','carbohydrate','sugars','protein','salt');
    global $post;
    $product = wc_get_product( $post->ID );
    $_header = $product->get_meta('checkbox_field_header');
    if($_header=="yes"){
    ?><h2><?php echo wp_kses_post( $tab['title'] ); ?></h2>
    <?php
    }
    $i=0;
        echo "<div class='n-label'>";
        echo "<div class='heading'>Nutritional Facts</div>";
        do {
            $title = $product->get_meta('nutritional_' . $i);
            if ($title) {
	            if($i!=0){
	                echo '<div class="item_row"><strong>' . $uk_base_nut[$i] . '</strong> ' . $title . '</div>';
                } else {
                    echo '<div class="item_row">' . $uk_base_nut[$i] . ' ' . $title . '</div>';
	            }
            }
            $i++;
        } while ($i <= 9);
        echo "</div>";
}

function cduk_after_display_nut_field()
{
    $uk_base_nut = array('Nutritional Values', 'energy (kJ)','energy (kcal)','fat','saturates','carbohydrate','sugars','protein','salt');
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $_inbody = $product->get_meta('checkbox_in_body');

    if ($_inbody == "yes") {
        $i = 0;
        echo "<div class='n-label'>";
        echo "<div class='heading'>Nutritional Facts</div>";
        do {
            $title = $product->get_meta('nutritional_' . $i);
            if ($title) {
                if($i!=0){
                    echo '<div class="item_row"><strong>' . $uk_base_nut[$i] . '</strong> ' . $title . '</div>';
                } else {
                    echo '<div class="item_row">' . $uk_base_nut[$i] . ' ' . $title . '</div>';
                }
            }
            $i++;
        } while ($i <= 9);
        echo "</div>";
    }
}

function cduk_save_nutritional_field( $post_id ) {
    $product = wc_get_product( $post_id );
    $i = 0;
    do {
        $title = isset( $_POST['nutritional_'.$i] ) ? $_POST['nutritional_'.$i] : '';
        $product->update_meta_data( 'nutritional_'.$i, sanitize_text_field( $title ) );
        $i++;
    } while ($i<=9);
    $product->save();
}
add_action( 'woocommerce_process_product_meta', 'cduk_save_nutritional_field' );

add_filter( 'woocommerce_product_data_tabs', 'cduk_add_nutritional_data_tab' , 99 , 1 );
function cduk_add_nutritional_data_tab( $product_data_tabs ) {
    $product_data_tabs['my-custom-tab'] = array(
        'label' => __( 'Nutritional Info', 'my_text_domain' ),
        'target' => 'nutritional_product_data',
    );
    return $product_data_tabs;
}

add_action( 'woocommerce_product_data_panels', 'cduk_add_my_custom_product_data_fields' );

function cduk_add_my_custom_product_data_fields() {
    global $woocommerce, $post;
    ?>
    <div id="nutritional_product_data" class="panel woocommerce_options_panel">
    <?php
    $i = 0;
    $uk_base_nut = array('Nutritional Values', 'energy (kJ)','energy (kcal)','fat','saturates','carbohydrate','sugars','protein','salt');
    $uk_base_help = array('E.g. per 100ml','','','','','','','','','Free text field');
    do {
        $args = array(
            'id' => 'nutritional_'.$i,
            'label' => __($uk_base_nut[$i]),
            'class' => 'custom-field',
            'desc_tip' => true,
            'description' => __($uk_base_help[$i], '')
        );
        woocommerce_wp_text_input($args);
        $i++;
    } while ($i<=9);
        woocommerce_wp_checkbox(
            array(
                'id'            => 'checkbox_field_header',
                'label'         => __('Header Title', 'woocommerce' )
            )
        );
       woocommerce_wp_checkbox(
            array(
                'id'            => 'checkbox_extra_tab',
                'label'         => __('Extra Tab', 'woocommerce' )
            )
        );
        woocommerce_wp_checkbox(
            array(
                'id'            => 'checkbox_in_body',
                'label'         => __('In Body', 'woocommerce' )
            )
        );
?> </div> <?php
}

add_action( 'woocommerce_process_product_meta', 'woocommerce_process_product_meta_fields_save' );
function woocommerce_process_product_meta_fields_save( $post_id ){
$woo_checkbox = isset( $_POST['checkbox_field_header'] ) ? 'yes' : 'no';
update_post_meta( $post_id, 'checkbox_field_header', $woo_checkbox );
 $woo_checkbox_a = isset( $_POST['checkbox_extra_tab'] ) ? 'yes' : 'no';
    update_post_meta( $post_id, 'checkbox_extra_tab', $woo_checkbox_a );
    $woo_checkbox_b = isset( $_POST['checkbox_in_body'] ) ? 'yes' : 'no';
    update_post_meta( $post_id, 'checkbox_in_body', $woo_checkbox_b );
}

add_filter( 'woocommerce_product_tabs', 'cduk_nutritional_product_tab' );
add_action( 'woocommerce_before_add_to_cart_button', 'cduk_after_display_nut_field' );

