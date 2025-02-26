<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      2.0.7
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/admin
 */
class MiniCart_Settings
{
    /**
     * summary
     */
    public function __construct()
    {

        add_action('admin_init', array(
            $this,
            'mcfwc___menu_setting'
        ));
    }

    /**
     * This function is Register settings,add_settings_section and add_settings_field
     */

    public function mcfwc___menu_setting()
    {
        if (!function_exists('run_mini-cart-for-woocommerce'))
        {

    register_setting("whmc_option", "whmc_option", array(
            $this,
            'whmc_option_page_sanitize'
        ));
        add_settings_section("section_settingf", " ", array(
            $this,
            'settting_sec_func'
        ) , 'whmc_admin_fsec');

        add_settings_field("wmhc_footer_bag_icon", esc_html__("Choose Icon", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_footer_bag_icon"
        ) , 'whmc_admin_fsec', "section_settingf");


        add_settings_field("fcp_fotter_cart_size", esc_html__("Icon Size", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_fotter_cart_size"
        ) , 'whmc_admin_fsec', "section_settingf");

        add_settings_field("fcp_cart_color", esc_html__("Icon Color", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_cart_color"
        ) , 'whmc_admin_fsec', "section_settingf");


        add_settings_field("fcp_cart_bgs", esc_html__("Icon Background", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_cart_bgs"
        ) , 'whmc_admin_fsec', "section_settingf");


        add_settings_field("fcp_cart_bubble_bg_color", esc_html__("Count Background", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_cart_bubble_bg_color"
        ) , 'whmc_admin_fsec', "section_settingf");

        add_settings_field("fcp_cart_bubble_color", esc_html__("Count Color", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_cart_bubble_color"
        ) , 'whmc_admin_fsec', "section_settingf");

        add_settings_field("fcp_option", esc_html__("Icon Loaction", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_option_func"
        ) , 'whmc_admin_fsec', "section_settingf");

        add_settings_field("fcp_countbegavior", esc_html__("Count behavior", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_countbegavior"
        ) , 'whmc_admin_fsec', "section_settingf");


        add_settings_field("fcp_option_range", esc_html__("Horizantal Move", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_option_range"
        ) , 'whmc_admin_fsec', "section_settingf");

        add_settings_field("fcp_verticalmove", esc_html__("Vertical Move", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_verticalmove"
        ) , 'whmc_admin_fsec', "section_settingf");


        add_settings_field("wmhc_hide_footer_cart", esc_html__("Remove Footer Icon", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_hide_footer_cart"
        ) , 'whmc_admin_fsec', "section_settingf");

        add_settings_field("fcp_cart_loactionds", esc_html__("Remove Footer Cart icon based on", "mini-cart-for-woocommerce") , array(
            $this,
            "fcp_cart_loactionds"
        ) , 'whmc_admin_fsec', "section_settingf", array('class'=>'whmc_sidebar_copin '));
        }
    }

    /**
     * This function is a callback function of  add seeting section
     */

    public function settting_sec_func()
    {

        return true;
    }
    public function pro_settting_sec_func()
    {

        require_once WHMC_LIGHT_PATH . '/admin/pro-features.php';

    }
    public function settting_sec_func_header()
    {

        return true;
    }


    function fcp_cart_loactionds(){
        $pblog = get_option('page_for_posts');
        $pfront = get_option('page_on_front');
        $pshop = get_option('woocommerce_shop_page_id');
    $yoo_type_pages = get_posts(array(
            'post_type' => 'page',
            'posts_per_page' => - 1,
            'post__not_in' => array(
                $pblog,
                $pshop,
                $pfront
            )
        ));
        if ($yoo_type_pages)
        {
            echo '
        <label for="yoo_type_pages"> '.esc_html__(' Pages:','mini-cart-for-woocommerce').'</label><div id="pagesnumbers" class="pagesnumberssd">';
            foreach ($yoo_type_pages as $yoo_type_page){

        $options = get_option('whmc_option');

            $checked = isset($options[$yoo_type_page->ID]) ? 'checked' : '';

            printf('<div><input type="checkbox" id="%s"  value="%s" name="whmc_option[%s]" %s><label for ="%s" >' . esc_attr($yoo_type_page->post_title) . '</label></div>', esc_attr($yoo_type_page->ID), esc_attr($yoo_type_page->ID), esc_attr($yoo_type_page->ID), esc_attr($checked),esc_attr($yoo_type_page->ID));


        }
        printf('</div><div class="spciappage"><div><input type="checkbox" name="whmc_option[wmhc_hide_footer_cart_home]"   value="wmhc_hide_footer_cart_home" %s>'.esc_html__('Front Page','mini-cart-for-woocommerce').'</label></div>', (isset($options['wmhc_hide_footer_cart_home']) && $options['wmhc_hide_footer_cart_home'] === 'wmhc_hide_footer_cart_home') ? 'checked' : '');

        printf('<div><input type="checkbox" name="whmc_option[wmhc_hide_footer_cart_shop]"   value="wmhc_hide_footer_cart_shop" %s>'.esc_html__('Shop / Store Page (WooCommerce)','mini-cart-for-woocommerce').'</label></div>', (isset($options['wmhc_hide_footer_cart_shop']) && $options['wmhc_hide_footer_cart_shop'] === 'wmhc_hide_footer_cart_shop') ? 'checked' : '');

        printf('<div><input type="checkbox" name="whmc_option[wmhc_hide_footer_cart_blog]"   value="wmhc_hide_footer_cart_blog" %s>'.esc_html__('Blog Page','mini-cart-for-woocommerce').'</label></div>', (isset($options['wmhc_hide_footer_cart_blog']) && $options['wmhc_hide_footer_cart_blog'] === 'wmhc_hide_footer_cart_blog') ? 'checked' : '');


        echo '</div>';
        }




    $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page','page','wp_navigation','wp_template_part','wp_global_styles','wp_template','shop_order_placehold');

        $types = get_post_types();
        $post_types = array_diff($types, $excluded_posttypes);

        if($post_types ){
            echo '<div id="postyupe"><strong><label for="yoo_type_pages">'.esc_html__(' Post Type:','mini-cart-for-woocommerce').'</label></strong></div><div id="pagesnumbers">';

        foreach ($post_types as $post_type)
        {
            $post_type_title = get_post_type_object($post_type);
            $options = get_option('whmc_option');

            $checkedposttype = isset($options[$post_type]) ? 'checked' : '';

            printf('<div><input type="checkbox" id="%s"  value="%s" name="whmc_option[%s]" %s><label for ="%s" >' . esc_attr($post_type_title->labels->name) . '</label></div>', esc_attr($post_type), esc_attr($post_type), esc_attr($post_type), esc_attr($checkedposttype), esc_attr($post_type));



        }


       echo '</div>';

    }

    }


    /**
     * This function is a callback function of  add seeting field
     */

    public function wmhc_footer_bag_icon()
    {

        $options = get_option('whmc_option');

        $wmhc_footer_bag_ficon = isset($options['wmhc_footer_bag_ficon']) ? $options['wmhc_footer_bag_ficon'] : 'fcp_icon_11';

    
  ?>
  <select id="wmhc_footer_bag_ficon"  class="default" name="whmc_option[wmhc_footer_bag_ficon]">
    
    <option value="fcp_icon_1" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_1" ? 'selected' : '';?>>fcp_icon_1</option>    
    <option value="fcp_icon_2" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_2" ? 'selected' : '';?>>fcp_icon_2</option>    
    <option value="fcp_icon_3" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_3" ? 'selected' : '';?>>fcp_icon_3</option>    
    <option value="fcp_icon_4" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_4" ? 'selected' : '';?>>fcp_icon_4</option>    
    <option value="fcp_icon_5" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_5" ? 'selected' : '';?>>fcp_icon_5</option>    
    <option value="fcp_icon_6" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_6" ? 'selected' : '';?>>fcp_icon_6</option>    
    <option value="fcp_icon_7" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_7" ? 'selected' : '';?>>fcp_icon_7</option>    
    <option value="fcp_icon_8" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_8" ? 'selected' : '';?>>fcp_icon_8</option>

    <option value="fcp_icon_11" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_11" ? 'selected' : '';?>>fcp_icon_11</option>   

    <option value="icon_45" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_45" ? 'selected' : '';?>>icon_45</option>  

    <option value="icon_38" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_38" ? 'selected' : '';?>>icon_38</option>
   
    <option value="icon_39" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_39" ? 'selected' : '';?>>icon_39</option>
   
    <option value="icon_40" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_40" ? 'selected' : '';?>>icon_40</option>

    <option value="icon_41" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_41" ? 'selected' : '';?>>icon_41</option>

    <option value="fcp_icon_9" <?php echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_9" ? 'selected' : '';?>>fcp_icon_9</option> 
       
    <option value="fcp_icon_10" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "fcp_icon_10" ? 'selected' : '';?>>fcp_icon_10</option>  
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

    <option value="icon_30" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_30" ? 'selected' : '';?>>icon_30</option>
    
    <option value="icon_31" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_31" ? 'selected' : '';?>>icon_31</option>  
  
    <option value="icon_34" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_34" ? 'selected' : '';?>>icon_34</option>
    
    <option value="icon_35" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_35" ? 'selected' : '';?>>icon_35</option>

    <option value="icon_37" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_37" ? 'selected' : '';?>>icon_37</option>
    
    <option value="icon_43" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_43" ? 'selected' : '';?>>icon_43</option>
 
    <option value="icon_46" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_46" ? 'selected' : '';?>>icon_46</option> 
    <option value="icon_44" <?php
        echo esc_attr($wmhc_footer_bag_ficon) == "icon_44" ? 'selected' : '';?>>icon_44</option> 
  </select>

            <?php
    }

   
    /**
     * This function is a callback function of  add seeting field
     */

    public function fcp_option_func()
    {

        $options = get_option('whmc_option');
        $fcp_option = isset($options['fcp_option']) ? $options['fcp_option'] : 'right';?>
    
      <select name="whmc_option[fcp_option]" id="fcp_option">
          
      <option value="left" <?php
        echo esc_attr($fcp_option) == 'left' ? 'selected' : '';?>><?php
        esc_html_e('Left', 'mini-cart-for-woocommerce');?></option>        
      <option value="cnetrleft" <?php
        echo esc_attr($fcp_option) == 'cnetrleft' ? 'selected' : '';?>><?php
        esc_html_e('Center Left', 'mini-cart-for-woocommerce');?></option>

      <option value="right" <?php
        echo esc_attr($fcp_option) == 'right' ? 'selected' : '';?>><?php
        esc_html_e('Right', 'mini-cart-for-woocommerce');?></option>

      <option value="cnetrright" <?php
        echo esc_attr($fcp_option) == 'cnetrright' ? 'selected' : '';?>><?php
        esc_html_e('Center Right', 'mini-cart-for-woocommerce');?></option>
      </select>
      <p class="whmc_description" ><?php echo esc_html__('Footer Cart Icon Position Left/right ,Default:right', 'mini-cart-for-woocommerce') ?></p>

    <?php

    }

    public function fcp_fotter_cart_size()
    {

        $options = get_option('whmc_option');
        $value = isset($options['fcp_fotter_cart_size']) ? $options['fcp_fotter_cart_size'] : '40';

        printf('<input type="range" name="whmc_option[fcp_fotter_cart_size]" value="%s" min="20" max="150" id="fcp_fotter_cart_size" oninput="fcarsiz.value = this.value"><output id="fcarsiz">%s</output> <span class="dashicons dashicons-image-rotate" id="fcp_fartsizeundo"></span>', esc_attr($value),esc_html($value));


    }
   
    public function fcp_option_range()
    {

        $options = get_option('whmc_option');
        $value = isset($options['fcp_option_range']) ? $options['fcp_option_range'] : '4';
        printf('<input type="range" name="whmc_option[fcp_option_range]" value="%s" min="0" max="50"  id="fcp_option_range" oninput="hrang.value = this.value"><output id="hrang">%s</output> <span class="dashicons dashicons-image-rotate" id="fcprangeundo"></span>',esc_attr($value),esc_html($value));


    }
    public function fcp_verticalmove()
    {

        $options = get_option('whmc_option');
 
        $value = isset($options['fcp_option_range_bottom']) ? $options['fcp_option_range_bottom'] : '11';

        printf('<input type="range" name="whmc_option[fcp_option_range_bottom]" value="%s" min="0" max="50" id="fcp_option_range_bottom" oninput="vrang.value = this.value"><output id="vrang">%s</output> <span class="dashicons dashicons-image-rotate" id="fcprangbottomeundo"></span>', esc_attr($value),esc_html($value));

    }

    public function fcp_cart_color(){

        $options = get_option('whmc_option');
        $options_rang_value = isset($options['fcp_cart_color']) ? $options['fcp_cart_color'] : '#474747';

        printf('<input type="text" name="whmc_option[fcp_cart_color]" value="%s" id="fcp_cart_color">', esc_attr($options_rang_value));
    }
    public function fcp_cart_bgs(){

        $options = get_option('whmc_option');
        $fcp_cart_bgs = isset($options['fcp_cart_bgs']) ? $options['fcp_cart_bgs'] : '#fff';

        printf('<input type="text" name="whmc_option[fcp_cart_bgs]" value="%s" id="fcp_cart_bgs">', esc_attr($fcp_cart_bgs));
    }

    public function fcp_cart_bubble_bg_color(){

        $options = get_option('whmc_option');

        $fcp_cart_bubble_bg_color = isset($options['fcp_cart_bubble_bg_color']) ? $options['fcp_cart_bubble_bg_color'] : '#c9c9c9';

        printf('<input type="text" name="whmc_option[fcp_cart_bubble_bg_color]" value="%s" id="fcp_cart_bubble_bg_color">', esc_attr($fcp_cart_bubble_bg_color));
    }    

    public function fcp_cart_bubble_color(){

        $options = get_option('whmc_option');
       $fcp_cart_bubble_color = isset($options['fcp_cart_bubble_color']) ? $options['fcp_cart_bubble_color'] : '#282828';

        printf('<input type="text" name="whmc_option[fcp_cart_bubble_color]" value="%s" id="fcp_cart_bubble_color">', esc_attr($fcp_cart_bubble_color));
    }
    
    public function wmhc_hide_footer_cart()
    {

        $options = get_option('whmc_option');

        printf('<input type="checkbox" name="whmc_option[wmhc_hide_footer_cart]" class="whmc_apple-switch"  value="wmhc_hide_footer_cart" %s id="wmhc_hide_footer_cart"><p class="whmc_description">'.esc_html('Click to remove the footer cart icon from the entire website','mini-cart-for-woocommerce').'</p>', (isset($options['wmhc_hide_footer_cart']) && $options['wmhc_hide_footer_cart'] === 'wmhc_hide_footer_cart') ? 'checked' : '');

    }
public function fcp_countbegavior()
    {

        $options = get_option('whmc_option');
        $fcp_countbegavior = isset($options['fcp_countbegavior']) ? $options['fcp_countbegavior'] : 'cartqty';?>
    
      <select name="whmc_option[fcp_countbegavior]" id="fcp_countbegavior">
          
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
    public function whmc_option_page_sanitize($input)
    {
        $sanitary_values = array();
        if (isset($input['fcp_option_range']))
        {
            $sanitary_values['fcp_option_range'] = ($input['fcp_option_range']);
        }
        if (isset($input['fcp_countbegavior']))
        {
            $sanitary_values['fcp_countbegavior'] = ($input['fcp_countbegavior']);
        }


        if (isset($input['wmhc_footer_bag_ficon']))
        {
            $sanitary_values['wmhc_footer_bag_ficon'] = ($input['wmhc_footer_bag_ficon']);
        }

        if (isset($input['fcp_menu_cart_style']))
        {
            $sanitary_values['fcp_menu_cart_style'] = ($input['fcp_menu_cart_style']);
        }
        if (isset($input['fcp_fotter_cart_size']))
        {
            $sanitary_values['fcp_fotter_cart_size'] = sanitize_text_field($input['fcp_fotter_cart_size']);
        }

        if (isset($input['fcp_option_range_bottom']))
        {
            $sanitary_values['fcp_option_range_bottom'] = $input['fcp_option_range_bottom'];
        }

        if (isset($input['fcp_cart_color']))
        {
            $sanitary_values['fcp_cart_color'] = sanitize_text_field($input['fcp_cart_color']);
        }

        if (isset($input['fcp_cart_bubble_color']))
        {
            $sanitary_values['fcp_cart_bubble_color'] = sanitize_text_field($input['fcp_cart_bubble_color']);
        }

        if (isset($input['fcp_cart_bubble_bg_color']))
        {
            $sanitary_values['fcp_cart_bubble_bg_color'] = sanitize_text_field($input['fcp_cart_bubble_bg_color']);
        }

        if (isset($input['fcp_option']))
        {
            $sanitary_values['fcp_option'] = $input['fcp_option'];
        }

        if (isset($input['wmhc_header_text_color']))
        {
            $sanitary_values['wmhc_header_text_color'] = $input['wmhc_header_text_color'];
        }
       
        if (isset($input['wmhc_hide_footer_cart']))
        {
            $sanitary_values['wmhc_hide_footer_cart'] = $input['wmhc_hide_footer_cart'];
        }

        if (isset($input['wmhc_hide_footer_cart_home']))
        {
            $sanitary_values['wmhc_hide_footer_cart_home'] = $input['wmhc_hide_footer_cart_home'];
        }
        if (isset($input['wmhc_hide_footer_cart_blog']))
        {
            $sanitary_values['wmhc_hide_footer_cart_blog'] = $input['wmhc_hide_footer_cart_blog'];
        }
        if (isset($input['wmhc_hide_footer_cart_shop']))
        {
            $sanitary_values['wmhc_hide_footer_cart_shop'] = $input['wmhc_hide_footer_cart_shop'];
        }
        if (isset($input['fcp_cart_bgs']))
        {
            $sanitary_values['fcp_cart_bgs'] = $input['fcp_cart_bgs'];
        }


        $post_types = get_post_types();

        foreach ($post_types as $post_type)
        {

            if (isset($input[$post_type]))
            {
                $sanitary_values[$post_type] = $input[$post_type];
            }
        }



        $yoo_type_pages = get_posts(array(
            'post_type' => 'page',
            'posts_per_page' => - 1,
        ));


            foreach ($yoo_type_pages as $yoo_type_page){

            if (isset($input[$yoo_type_page->ID]))
            {
                $sanitary_values[$yoo_type_page->ID] = $input[$yoo_type_page->ID];
            }
        }
        $post_types = get_post_types();

        foreach ($post_types as $post_type)
        {

            if (isset($input[$post_type]))
            {
                $sanitary_values[$post_type] = $input[$post_type];
            }
        }

        return $sanitary_values;
    }

}
if (class_exists('MiniCart_Settings'))
{

    new MiniCart_Settings;
}

