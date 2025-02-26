<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      2.0.7
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/admin
 */

class whmcm_lightmenusettings
{

    public function __construct()
    {
        add_action('admin_init', array($this,'whmc__menu_setting'
        ));
    }

    /**
     * This function is Register settings,add_settings_section and add_settings_field
     */

    public function whmc__menu_setting()
    {

        register_setting("whmc_menu", "whmc_menu");

        add_settings_section("section_setting", " ", array(
        $this,
        'settting_sec_func'
        ) , 'whmc_admin_sec');

        add_settings_field("wmhc_bag_icon", esc_html__("Choose Icon", "mini-cart-for-woocommerce") , array(
        $this,"wmhc_bag_icon") , 'whmc_admin_sec', "section_setting");

        add_settings_field("wmhc_menu_cart_style", esc_html__("Choose a Design.", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_menu_cart_style"
        ) , 'whmc_admin_sec', "section_setting");

        add_settings_field("wmhc_menuamntbehav", esc_html__("Amount behavior", "mini-cart-for-woocommerce") , array(
        $this,"wmhc_menuamntbehav") , 'whmc_admin_sec', "section_setting", array('class'=>'menutxtcolord oaopprr'));


        add_settings_field("wmhc_hide_text_color", esc_html__("Remove Amount", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_hide_text_color"
        ) , 'whmc_admin_sec', "section_setting", array('class'=>'menutxtcolord'));


        add_settings_field("wmhc_header_bubble_color", esc_html__("Icon Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_header_bubble_color"
        ) , 'whmc_admin_sec', "section_setting");
        add_settings_field("wmhc_header_text_color", esc_html__("Amount Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_header_text_color"
        ) , 'whmc_admin_sec', "section_setting", array('class'=>'menutxtcolord'));

        add_settings_field("wmhch_bubbles_color", esc_html__("Count background", "mini-cart-for-woocommerce") , array($this,"wmhch_bubbles_color") , 'whmc_admin_sec', "section_setting", array('class'=>'bbmenutxtcolord'));

        add_settings_field("wmhch_bubbles_txt", esc_html__("Count  Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhch_bubbles_txt"
        ) , 'whmc_admin_sec', "section_setting", array('class'=>'bbmenutxtcolord'));

        add_settings_field("wmhch_countnumber", esc_html__("Count behavior", "mini-cart-for-woocommerce") , array($this,"fcp_countbegavior") , 'whmc_admin_sec', "section_setting", array('class'=>'bbmenutxtcolord'));

        add_settings_field("fcp_menu_cart_size", esc_html__("Icon Size", "mini-cart-for-woocommerce") , array(
        $this,
        "fcp_menu_cart_size"
        ) , 'whmc_admin_sec', "section_setting");
        add_settings_field("fcp_menu_txt_size", esc_html__("Text Size", "mini-cart-for-woocommerce") , array(
        $this,
        "fcp_menu_txt_size"
        ) , 'whmc_admin_sec', "section_setting", array('class'=>'menutxtcolord'));
        add_settings_field("whmc_menu_choose", esc_html__("Choose Menu", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_menu_choose"
        ) , 'whmc_admin_sec', "section_setting");

        add_settings_field("whmc_meiconbeha", esc_html__("Behaviour", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_meiconbeha"
        ) , 'whmc_admin_sec', "section_setting");

        add_settings_field("fcp_cart_shortcode", esc_html__("Shortcode", "mini-cart-for-woocommerce") , array(
        $this,
        "fcp_cart_shortcode"
        ) , 'whmc_admin_sec', "section_setting");


    }


    /**
     * This function is a callback function of  add seeting section
     */

    public function settting_sec_func()
    {

        return true;
    }


    /**
     * This function is a callback function of  add seeting field
     */

   public function whmc_menu_choose()
    {

        $options = get_option('whmc_menu');;
        $value = isset($options['whmc_menu_choose']) ? $options['whmc_menu_choose'] : '';

    ?>

        <select id="whmc_menu_choose" name="whmc_menu[whmc_menu_choose]">
            <option value="">--</option>';
        <?php
        $menus = wp_get_nav_menus();

        foreach ( $menus as $menu /** @var WP_Term $menu */ ) {
        if($value == $menu->term_id){
            $selected = 'selected';
        }else{
           $selected = '';
        }
           echo  '<option value="'.esc_attr($menu->term_id).'" '.esc_attr($selected).'>' . esc_html($menu->name) . '</option>';
        }


        ?>
  
        </select>
           <p class="whmc_description"><?php echo esc_html__('Select the menu where you can add a court icon. In premium version you can add cart icon from menu section', 'mini-cart-for-woocommerce') ?><a href="https://woominicart.dipashi.com/wp-admin/nav-menus.php?action=edit&menu=38"> <?php echo esc_html__('Live Demo', 'mini-cart-for-woocommerce') ?></a></p>

    <?php
}
  /**
     * This function is a callback function of  add seeting field
     */

   public function whmc_meiconbeha()
    {

        $options = get_option('whmc_menu');;
        $value = isset($options['whmc_meiconbeha']) ? $options['whmc_meiconbeha'] : 'sidebar';

    ?>

    <select id="whmc_meiconbeha" name="whmc_menu[whmc_meiconbeha]">
    <option value="sidebar" <?php
        echo esc_attr($value) == 'sidebar' ? 'selected' : '';?>><?php
        echo esc_html__('Open Side Cart' , 'mini-cart-for-woocommerce')?></option>
    <option value="cartpage" <?php
        echo esc_attr($value) == 'cartpage' ? 'selected' : '';?>><?php
        echo esc_html__('Redirect To Cart Page' , 'mini-cart-for-woocommerce')?></option>
  
        </select>
           <p class="whmc_description"><?php echo esc_html__('Choose icon link behavior', 'mini-cart-for-woocommerce') ?></p>

    <?php
    }



    public function wmhc_bag_icon()
    {

        $options = get_option('whmc_menu');;
        $fcp_icon_option = isset($options['fcp_icon_option']) ? $options['fcp_icon_option'] : 'fcp_icon_2';

    ?>

    <select id="fcp_icon_option"  class="default" name="whmc_menu[fcp_icon_option]">
    
    <option value="fcp_icon_1" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_1" ? 'selected' : '';?>>Icon 1</option>    
    <option value="fcp_icon_2" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_2" ? 'selected' : '';?>>Icon 2</option>    
    <option value="fcp_icon_3" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_3" ? 'selected' : '';?>>Icon 3</option>    
    <option value="fcp_icon_4" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_4" ? 'selected' : '';?>>Icon 4</option>    
    <option value="fcp_icon_5" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_5" ? 'selected' : '';?>>Icon 5</option>    
    <option value="fcp_icon_6" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_6" ? 'selected' : '';?>>Icon 6</option>    
    <option value="fcp_icon_7" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_7" ? 'selected' : '';?>>Icon 7</option>    
    <option value="fcp_icon_8" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_8" ? 'selected' : '';?>>Icon 8</option>

    <option value="fcp_icon_11" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_11" ? 'selected' : '';?>>Icon 9</option>   

    <option value="icon_45" <?php
        echo esc_attr($fcp_icon_option) == "icon_45" ? 'selected' : '';?>>Icon 10</option>  

    <option value="icon_38" <?php
        echo esc_attr($fcp_icon_option) == "icon_38" ? 'selected' : '';?>>Icon 11</option>
   
    <option value="icon_39" <?php
        echo esc_attr($fcp_icon_option) == "icon_39" ? 'selected' : '';?>>Icon 12</option>
   
    <option value="icon_40" <?php
        echo esc_attr($fcp_icon_option) == "icon_40" ? 'selected' : '';?>>Icon 13</option>

    <option value="icon_41" <?php
        echo esc_attr($fcp_icon_option) == "icon_41" ? 'selected' : '';?>>Icon 14</option>

    <option value="fcp_icon_9" <?php echo esc_attr($fcp_icon_option) == "fcp_icon_9" ? 'selected' : '';?>>Icon 15</option> 

    <option value="fcp_icon_10" <?php
        echo esc_attr($fcp_icon_option) == "fcp_icon_10" ? 'selected' : '';?>>Icon 16</option>  
    <option value="fcp_icon_12">Premium Icon</option>    
    <option value="fcp_icon_13">Premium Icon</option>    
    <option value="fcp_icon_14">Premium Icon</option>    
    <option value="fcp_icon_15">Premium Icon</option>    
    <option value="fcp_icon_16">Premium Icon</option>    
    <option value="fcp_icon_17">Premium Icon</option>    
    <option value="fcp_icon_18">Premium Icon</option>    
    <option value="fcp_icon_19">Premium Icon</option>          
    <option value="fcp_icon_20">Premium Icon</option>
         
    <option value="icon_19">Premium Icon</option>

    <option value="icon_20">Premium Icon</option>        
    <option value="icon_21">Premium Icon</option>               
    <option value="icon_254">Premium Icon</option>        
      
    <option value="icon_25">Premium Icon</option>  
              
    <option value="icon_26">Premium Icon</option>        
    <option value="icon_27">Premium Icon</option>        
    <option value="icon_28">Premium Icon</option>        
    <option value="icon_29">Premium Icon</option>    

    <option value="icon_30">Premium Icon</option>
    
    <option value="icon_31">Premium Icon</option>  
  
    <option value="icon_34">Premium Icon</option>
    
    <option value="icon_35">Premium Icon</option>

    <option value="icon_37">Premium Icon</option>
    
    <option value="icon_43">Premium Icon</option>
 
    <option value="icon_46">Premium Icon</option> 
    <option value="icon_44">Premium Icon</option> 
  </select>

            <?php
    }
    public function fcp_cart_shortcode()
    {
        printf('<input type="text"  value="[whmc_mini_cart]" readonly="readonly">');

    }
    

    /**
     * This function is a callback function of  add seeting field
     */

    public function wmhc_menu_cart_style()
    {

        $options = get_option('whmc_menu');

        $fcp_menu_style = isset($options['fcp_menu_cart_style']) ? $options['fcp_menu_cart_style'] : 'fcp_menu_0';

        $fcp_icon_option = isset($options['fcp_icon_option']) ? $options['fcp_icon_option'] : 'fcp_icon_2';

        $icon_1 = WHMC_LIGHT_URL . 'assets/admin/img/style-one.jpg';
        $icon_2 = WHMC_LIGHT_URL . 'assets/admin/img/style-two.jpg';
        $icon_3 = WHMC_LIGHT_URL . 'assets/admin/img/style-three.jpg';
        $icon_0 = WHMC_LIGHT_URL . 'assets/admin/img/image.PNG';

    ?>
    <ul class="iconstylmc"><li>     
            <input type="radio" id="menu-0" class="fcp_menu_cart_style"  name="whmc_menu[fcp_menu_cart_style]" value="fcp_menu_0" <?php
        echo esc_attr($fcp_menu_style) == 'fcp_menu_0' ? 'checked' : ''; ?>> <label for="menu-0" class="iconstylmcsdd" id="<?php echo esc_attr($fcp_icon_option) ?>"><div class="cart_menu_li menu-link"><div id="menuiconwraps" class="adlkjfhdjndhf icons02">
        <span class="<?php echo esc_attr($fcp_icon_option) ?>"  id="menuiconid1"></span><span class="cart_count_headers">5</span></div>
    </div></label> </li><li>
          
            <input type="radio" id="menu-1" class="fcp_menu_cart_style" name="whmc_menu[fcp_menu_cart_style]" value="fcp_menu_1" <?php
        echo esc_attr($fcp_menu_style) == 'fcp_menu_1' ? 'checked' : ''; ?>><label for="menu-1" class="iconstylmcsdd"><div class="cart_menu_li menu-link"><div id="" class="adlkjfhdjndhf">
        <span class="<?php echo esc_attr($fcp_icon_option) ?>"  id="menuiconid2"></span><span class="cart_count_headers">5</span><span class="cart_count_totals qasdsds"><?php echo wp_kses_post(wc_price('80')) ?></span></div></div></label> </li><li>
         
            <input type="radio" id="menu-2" class="fcp_menu_cart_style" name="whmc_menu[fcp_menu_cart_style]" value="fcp_menu_2" <?php
        echo esc_attr($fcp_menu_style) == 'fcp_menu_2' ? 'checked' : ''; ?>><label for="menu-2" class="iconstylmcsdd"><div class="cart_menu_li menu-link"><div id="" class="adlkjfhdjndhf">
        <span class="<?php echo esc_attr($fcp_icon_option) ?>" id="menuiconid3"></span><span class="cart_count_headers">5</span><span class="cart_count_totals icon_minus"><?php echo wp_kses_post(wc_price('80')) ?></span></div></div></label></li><li>
         
            <input type="radio" id="menu-3" class="fcp_menu_cart_style" name="whmc_menu[fcp_menu_cart_style]" value="fcp_menu_3" <?php
        echo esc_attr($fcp_menu_style) == 'fcp_menu_3' ? 'checked' : ''; ?>><label for="menu-3" class="iconstylmcsdd">
    <div class="cart_menu_li menu-link"><div id="" class="adlkjfhdjndhf"><span class="<?php echo esc_attr($fcp_icon_option) ?>"  id="menuiconid4"></span><span class="cart_count_totals"><?php echo wp_kses_post(wc_price('80')) ?></span></div></div></label></li></ul>
         
    <?php
    }

   public function wmhc_menuamntbehav()
    { ?>

    <select id="wmhc_menuamntbehav" name="whmc_menu[wmhc_menuamntbehav]">
    <option value="subtotal" selected><?php
        echo esc_html__('Sub Total' , 'mini-cart-for-woocommerce')?></option>
    <option value="carttotal" class="ssdftyjfjs"><?php
        echo esc_html__('Cart Total (Pro)' , 'mini-cart-for-woocommerce')?></option>
  
        </select>
           <p class="whmc_description"><?php echo esc_html__('Choose the displayed amount as subtotal ( $20 ) or cart total ( $20 + tax + shipping cost - discount)', 'mini-cart-for-woocommerce') ?></p>

    <?php
    }
    public function fcp_menu_cart_size()
    {

        $options = get_option('whmc_menu');
        $valus = isset($options['fcp_menu_cart_size']) ? $options['fcp_menu_cart_size'] : '24';

        printf('<input type="range" name="whmc_menu[fcp_menu_cart_size]" value="%s" min="10" max="50" id="fcp_menu_cart_size" oninput="mcsiz.value = this.value"><output id="mcsiz">%s</output> <span class="dashicons dashicons-image-rotate" id="fcp_menu_cart_sizeundo"></span>', esc_attr($valus),esc_html($valus));

    }
    public function fcp_menu_txt_size()
    {

        $options = get_option('whmc_menu');
        $valus = isset($options['fcp_menu_txt_size']) ? $options['fcp_menu_txt_size'] : '16';

        printf('<input type="range" name="whmc_menu[fcp_menu_txt_size]" value="%s" min="10" max="50" id="fcp_menu_txt_size" oninput="mtsiz.value = this.value"><output id="mtsiz">%s</output> <span class="dashicons dashicons-image-rotate" id="fcp_menu_txt_sizeundo"></span></li>', esc_attr($valus),esc_html($valus));

    }

    public function wmhc_header_text_color()
    {


        $options = get_option('whmc_menu');
              $options_rang_t_value = isset($options['wmhc_header_text_color']) ? $options['wmhc_header_text_color'] : '#000';
        printf('<input type="text" name="whmc_menu[wmhc_header_text_color]" value="%s"  class="header_text_bubble" id="wmhc_header_text_color">', esc_attr($options_rang_t_value));


    }
    public function wmhch_bubbles_txt()
    {
        $options = get_option('whmc_menu');
        $wmhch_bubbles_txt = isset($options['wmhch_bubbles_txt']) ? $options['wmhch_bubbles_txt'] : '#fff';
        printf('<input type="text" name="whmc_menu[wmhch_bubbles_txt]" value="%s"  class="header_bubble" id="wmhch_bubbles_txt">',  esc_attr($wmhch_bubbles_txt));


    }
    public function wmhc_header_bubble_color()
    {

        $options = get_option('whmc_menu');
        $options_rang_value = isset($options['wmhc_header_bubble_color']) ? $options['wmhc_header_bubble_color'] : '#494949';
 

        printf('<input type="text" name="whmc_menu[wmhc_header_bubble_color]" value="%s"  class="header_bubble" id="wmhc_header_bubble_color">',  esc_attr($options_rang_value));


    }
    public function wmhch_bubbles_color()
    {

        $options = get_option('whmc_menu');

        $wmhch_bubbles_color = isset($options['wmhch_bubbles_color']) ? $options['wmhch_bubbles_color'] : '#d34b30';

        printf('<input type="text" name="whmc_menu[wmhch_bubbles_color]" value="%s"  class="header_bubble" id="wmhch_bubbles_color">',  esc_attr($wmhch_bubbles_color));

    }

    public function wmhc_hide_text_color()
    {

        $options = get_option('whmc_menu');

        printf('<input type="checkbox" name="whmc_menu[wmhc_hide_text_color]" class="whmc_apple-switch"  value="wmhc_hide_text_color" %s id="wmhc_hide_text_color"><p class="whmc_description">'.esc_html('Click on for remove amount ','mini-cart-for-woocommerce').'</p>', (isset($options['wmhc_hide_text_color']) && $options['wmhc_hide_text_color'] === 'wmhc_hide_text_color') ? 'checked' : '');

    }
    public function fcp_countbegavior()
    {

        $options = get_option('whmc_menu');
        $fcp_countbegavior = isset($options['fcp_countbegavior']) ? $options['fcp_countbegavior'] : 'cartqty';?>
    
      <select name="whmc_menu[fcp_countbegavior]" id="fmenu_countbegavior">
          
      <option value="prodctqty" <?php
        echo esc_attr($fcp_countbegavior) == 'prodctqty' ? 'selected' : '';?>><?php
        esc_html_e('Product Qty', 'mini-cart-for-woocommerce');?></option>        
      <option value="cartqty" <?php
        echo esc_attr($fcp_countbegavior) == 'cartqty' ? 'selected' : '';?>><?php
        esc_html_e('Cart Qty', 'mini-cart-for-woocommerce');?></option>
      </select>
      <p class="whmc_description" ><?php echo esc_html__('Select Cart Count or Product Count as the count number', 'mini-cart-for-woocommerce') ?></p>
      <ul class="cartnumbers">
          <li>Cart Qty = The number of product in cart</li>
          <li>Product Qty = All product numbers in cart</li>
      </ul>

    <?php

    }
    
}

if(class_exists('whmcm_lightmenusettings')){

    new whmcm_lightmenusettings;
}