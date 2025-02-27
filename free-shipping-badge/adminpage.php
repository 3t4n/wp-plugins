<?php
/** REGISTER SITTINGS OPTIONS**/
function register_fsb_settings() {
	//register admin page settings
	register_setting( 'fsb-settings-group', 'fsb_limit_price_option' );
	register_setting( 'fsb-settings-group', 'fsb_badge_text_option' );
	register_setting( 'fsb-settings-group', 'fsb_badge_color' );
	register_setting( 'fsb-settings-group', 'fsb_badge_text_color' );
    register_setting( 'fsb-settings-group', 'fsb_badge_product_with_tag' );
    register_setting( 'fsb-settings-group', 'fsb_badge_hide_product_with_tag' );
    register_setting( 'fsb-settings-group', 'fsb_hide_badge_shop_page' );
	register_setting( 'fsb-settings-group', 'fsb_hide_badge_category_page' );
	register_setting( 'fsb-settings-group', 'fsb_hide_badge_single_page' );
    register_setting( 'fsb-settings-group', 'fsb_hide_badge_crossup_page' );
    register_setting( 'fsb-settings-group', 'fsb_badge_border' );
    register_setting( 'fsb-settings-group', 'fsb_margin_top_option' );
    register_setting( 'fsb-settings-group', 'fsb_margin_bottom_option' );
    register_setting( 'fsb-settings-group', 'fsb_padding_top_option' );
    register_setting( 'fsb-settings-group', 'fsb_padding_bottom_option' );

}	

function fsb_settings_page() {
    wp_register_style( 'view-style', plugins_url('/view/fsb_badge_style.css', __FILE__) );
    wp_register_style( 'view-style', plugins_url('/view/fontawesome.css', __FILE__) );
    wp_enqueue_style( 'view-style' ); 
?>

<div class="wrap">
<h1>FREE SHIPPING BADGE</h1>
<p> If price higher of limit price Fee Shipping Badge will be showed below the product price.</p>
<form method="POST" action="options.php">
    <?php settings_fields( 'fsb-settings-group' ); ?>
    <?php do_settings_sections( 'fsb-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Limit Price</th>
        <td><input type="number" name="fsb_limit_price_option" value="<?php echo esc_attr( get_option('fsb_limit_price_option') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row" class="" >Show Badge on Products with this tag</th>
        <td><input type="text" name="fsb_badge_product_with_tag" value="<?php echo esc_attr( get_option('fsb_badge_product_with_tag') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row" class="" >Hide Badge on Products with this tag (even their price is higher then limit price)</th>
        <td><input type="text" name="fsb_badge_hide_product_with_tag" value="<?php echo esc_attr( get_option('fsb_badge_hide_product_with_tag') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row" class="" >Badge Text</th>
        <td><input type="text" name="fsb_badge_text_option" value="<?php echo esc_attr( get_option('fsb_badge_text_option') ); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row" class="" >Badge Color</th>
        <td><input type="color" name="fsb_badge_color" value="<?php echo esc_attr( get_option('fsb_badge_color') ); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row" class="" >Badge Text Color</th>
        <td><input type="color" name="fsb_badge_text_color" value="<?php echo esc_attr( get_option('fsb_badge_text_color') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row" class="" >Badge Border Color</th>
        <td><input type="color" name="fsb_badge_border" value="<?php echo esc_attr( get_option('fsb_badge_border') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row" class="" >Margin top</th>
        <td><input type="text" name="fsb_margin_top_option" value="<?php echo esc_attr( get_option('fsb_margin_top_option') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row" class="" >Mrgin bottom</th>
        <td><input type="text" name="fsb_margin_bottom_option" value="<?php echo esc_attr( get_option('fsb_margin_bottom_option') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row" class="" >Padding top</th>
        <td><input type="text" name="fsb_padding_top_option" value="<?php echo esc_attr( get_option('fsb_padding_top_option') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row" class="" >Padding bottom</th>
        <td><input type="text" name="fsb_padding_bottom_option" value="<?php echo esc_attr( get_option('fsb_padding_bottom_option') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row" class="" >Don`t show Badge on Shop Page</th>
        <td><input type="checkbox" class=" " id="fsb_hide_badge_shop_page" name="fsb_hide_badge_shop_page" value="1" <?php echo ((int)get_option('fsb_hide_badge_shop_page') === 1) ? 'checked' : ''; ?>></td>
        </tr>
        
        <tr valign="top">
        <th scope="row" class="" >Don`t show Badge on Category Archive Page</th>
        <td><input type="checkbox" class=" " id="fsb_hide_badge_category_page" name="fsb_hide_badge_category_page" value="1" <?php echo ((int) get_option('fsb_hide_badge_category_page') === 1) ? 'checked' : ''; ?>></td>
        </tr>
        
        <tr valign="top">
        <th scope="row" class="" >Don`t show Badge on Single Product Page</th>
        <td><input type="checkbox" class=" " id="fsb_hide_badge_single_page" name="fsb_hide_badge_single_page" value="1" <?php echo ((int) get_option('fsb_hide_badge_single_page') === 1) ? 'checked' : ''; ?>></td>
        </tr>

        <tr valign="top">
        <th scope="row" class="" >Don`t show Badge on Ralated an Upselling products</th>
        <td><input type="checkbox" class=" " id="fsb_hide_badge_crossup_page" name="fsb_hide_badge_crossup_page" value="1" <?php echo ((int) get_option('fsb_hide_badge_crossup_page') === 1) ? 'checked' : ''; ?>></td>
        </tr>
    </table>
<?php submit_button(); ?>
</form>

</div>
<?php
$fsb_limit_price_preview = esc_attr( get_option('fsb_limit_price_option') );

?>
BADGE PREVIEW
    <fsb_badge class="fsb_badge_view fsb_badge_view_single" 
    style="background-color:<?php echo esc_attr( get_option('fsb_badge_color') ); ?>; 
    border:1px solid <?php echo esc_attr( get_option('fsb_badge_border') ); ?>;
    color:<?php echo esc_attr( get_option('fsb_badge_text_color') ); ?>; 
    margin-top:'<?php echo esc_attr( get_option('fsb_margin_top_option') ); ?>; 
    margin-bottom:<?php echo esc_attr( get_option('fsb_margin_bottom_option') ); ?>; 
    padding-top: <?php echo esc_attr( get_option('fsb_padding_top_option') ); ?>; 
    padding-bottom:<?php echo esc_attr( get_option('fsb_padding_bottom_option') ); ?>; ">
    <i class="fa fa-truck"> </i>&nbsp<span><?php echo esc_attr( get_option('fsb_badge_text_option') ); ?></span></fsb_badge>

<?php } ?>