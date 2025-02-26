jQuery(document).ready(function($) {

    var sbdstoredNoticeId = localStorage.getItem('qcld_express_Notice_set');
    var qcld_express_Notice_time_set = localStorage.getItem('qcld_express_Notice_time_set');

    var notice_current_time = Math.round(new Date().getTime() / 1000);

    if ('express-msg' == sbdstoredNoticeId && qcld_express_Notice_time_set > notice_current_time  ) {
       // $('#message-express').css({'display': 'none'});
    }

    $(document).on('click', '#message-express .notice-dismiss', function(e){

        var currentDom = $(this);
        var currentWrap = currentDom.closest('.notice');
        currentWrap.css({'display': 'none'});
        localStorage.setItem('qcld_express_Notice_set', 'express-msg');
        var ts = Math.round(new Date().getTime() / 1000);
        var tsYesterday = ts + (24 * 3600);
        localStorage.setItem('qcld_express_Notice_time_set', tsYesterday);
        console.log(tsYesterday)

    });
    
    /**********************************
     Products Showing Mode.
     *********************************/
    //Disable infinite scroll for free version
    $('#qcld_express_show_mode-1').attr('disabled',true);
    $('label[for="qcld_express_show_mode-1"]').html('Infinite Scrolling ( <strong style="color:red">Pro Feature</strong> )');
    //Handling the Show product mode.
    if($('input[type=radio][name="qcld_express_options[qcld_express_show_mode]"]:checked').val()=='all'){
        $("#setting_qcld_express_product_per_page").css({'display':'none'});
    }
    $('input[type=radio][name="qcld_express_options[qcld_express_show_mode]"]').change(function() {
        if (this.value == 'more') {
            $("#setting_qcld_express_product_per_page").css({'display':'block'});
        }
        else{
            $("#setting_qcld_express_product_per_page").css({'display':'none'});
        }
    });
    // limit show per page product
    /**********************************
     Disable exclude the categories to display products.
     *********************************/
//    $("#setting_qcld_express_category").find('h3').html('Exclude Categories to show products ( <strong style="color:red">Pro Feature</strong> )');
   // $("#setting_qcld_express_category input:checkbox").attr("disabled",true);
   

    /**********************************
     Product Showing Template disabled.
     *********************************/
    $("#qcld_express_template option[value='animation']").attr("disabled",true).html('Animated Template ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_template option[value='gradient']").attr("disabled",true).html('Alternative Linear Gradient Template (03)  ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_template option[value='restaurent']").attr("disabled",true).html('Alternative Restaurent Template (04)  ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_template option[value='restaurent-2']").attr("disabled",true).html('Alternative Restaurent Template 2 (05)  ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_template option[value='slope']").attr("disabled",true).html('Alternative Sidebar Template (06)  ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_template option[value='catalog']").attr("disabled",true).html('Alternative Catalog Sidebar Template (07)  ( <strong style="color:red">Pro Feature</strong> )');

    $("#setting_qcld_express_stock_alert").find('h3').html('Set Show Low Stock Alert Beside Availability ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_stock_alert").attr("disabled",true);

    $("#qcld_express_cart_mode-1").attr("disabled",true);
    $('label[for="qcld_express_cart_mode-1"]').html('Show Floating Cart Icon on the Left ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_cart_mode-2").attr("disabled",true);
    $('label[for="qcld_express_cart_mode-2"]').html('Show Floating Cart Icon on the Right ( <strong style="color:red">Pro Feature</strong> )');

    $("#setting_qcld_express_openclose").find('h3').html('Show Opening and Closing Hours ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_openclose-0").attr("disabled",true);
    
    $("#setting_qcld_express_hide_search_option").find('h3').html('Hide Search Options ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_hide_search_option-0").attr("disabled",true);
    
    $("#setting_qcld_express_category_show_below_tite").find('h3').html('Show Category Name Below Title ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_category_show_below_tite-0").attr("disabled",true);
    
    $("#setting_qcld_express_lightbox_add_to_cart_button").find('h3').html('Disable Add to Cart in Product Details Lightbox ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lightbox_add_to_cart_button-0").attr("disabled",true);


    $("#setting_qcld_express_disable_all_cat_button").find('h3').html('Disable "All" Tab ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_disable_all_cat_button-0").attr("disabled",true);
    
    
    $("#setting_qcld_express_hot_deals_product_tab").find('h3').html('Enable Hot/New/Best Buy tabs ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_hot_deals_product_tab-0").attr("disabled",true);

    
    $("#setting_qcld_express_hot_deals_according_to_cat").find('h3').html('Hot Deals Tab Filtering According to Category ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_hot_deals_according_to_cat-0").attr("disabled",true);
    
    $("#setting_qcld_express_redurect_page_add_to_cat").find('h3').html('Redirect  to the same page after successful add to cart ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_redurect_page_add_to_cat-1").attr("disabled",true);


    // css pro feature
    $("#setting_qcld_express_active_menu_bg").find('h3').html('Active Menu Background color Setting ( <strong style="color:red">Pro Feature</strong> )');
    $("#setting_qcld_express_active_menu_bg .wp-color-result").attr("disabled",true);

    $("#setting_qcld_express_active_menu_color").find('h3').html('Active Menu fonts color Setting ( <strong style="color:red">Pro Feature</strong> )');
    $("#setting_qcld_express_active_menu_color .wp-color-result").attr("disabled",true);

    $("#setting_qcld_express_catalog_menu_color").find('h3').html('Catalog Template Menu fonts color Setting ( <strong style="color:red">Pro Feature</strong> )');
    $("#setting_qcld_express_catalog_menu_color .wp-color-result").attr("disabled",true);

    $("#setting_qcld_express_hot_deals_menu_button_fonts_color").find('h3').html('Hot Deals Tab Menu Button Fonts Color ( <strong style="color:red">Pro Feature</strong> )');
    $("#setting_qcld_express_hot_deals_menu_button_fonts_color .wp-color-result").attr("disabled",true);

    $("#setting_qcld_express_hot_deals_menu_button_bg_color").find('h3').html('Hot Deals Tab Menu Button Background Color ( <strong style="color:red">Pro Feature</strong> )');
    $("#setting_qcld_express_hot_deals_menu_button_bg_color .wp-color-result").attr("disabled",true);

    $("#setting_qcld_express_hot_deals_menu_bg_color").find('h3').html('Hot Deals Tab Menu Background Color ( <strong style="color:red">Pro Feature</strong> )');
    $("#setting_qcld_express_hot_deals_menu_bg_color .wp-color-result").attr("disabled",true);


    // language pro featuer
    $("#setting_qcld_express_lang_quantity").find('h3').html('Quantity ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_quantity").attr("disabled",true);
    
    $("#setting_qcld_express_lang_items").find('h3').html('items ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_items").attr("disabled",true);
    
    $("#setting_qcld_express_lang_add_to_cart").find('h3').html('Add to Cart ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_add_to_cart").attr("disabled",true);
    
    $("#setting_qcld_express_lang_cart_total").find('h3').html('Total ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_cart_total").attr("disabled",true);



    $("#setting_qcld_express_lang_hot_deals_hot").find('h3').html('Hot ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_hot_deals_hot").attr("disabled",true);

    $("#setting_qcld_express_lang_hot_deals_new").find('h3').html('New ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_hot_deals_new").attr("disabled",true);
    
    $("#setting_qcld_express_lang_hot_deals_best_buy").find('h3').html('Best Buy ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_hot_deals_best_buy").attr("disabled",true);

    $("#setting_qcld_express_lang_hot_deals_featured").find('h3').html('Featured ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_hot_deals_featured").attr("disabled",true);
     // language pro featuer end


    $("#setting_qcld_express_openclose_id").find('h3').html('Opening and Closing Hours (Set id) ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_openclose_id").attr("disabled",true);
    
    $("#setting_qcld_express_min_num_price").find('h3').html('Set Minimum Price for Checkout Order ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_min_num_price").attr("disabled",true);
    
    $("#qcld_express_sticky-0").attr("disabled",true);

    $("#setting_qcld_express_sticky").find('h3').html('Fixed Position Category Filters ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_sticky-1").attr("disabled",true);

    $("#setting_qcld_express_top_img").find('h3').html('Restaurent Template Right Top Image ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_top_img").attr("disabled",true);
    $("#setting_qcld_express_top_img .option-tree-ui-button").hide();

    $("#setting_qcld_express_bottom_img").find('h3').html('Restaurent Template Left Bottom Image ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_bottom_img").attr("disabled",true);
    $("#setting_qcld_express_bottom_img .option-tree-ui-button").hide();


    $("#setting_qcld_express_lang_cart_minimum_alert_1").find('h3').html('Minimum Price Alert Header 1 ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_cart_minimum_alert_1").attr("disabled",true);
    
    $("#setting_qcld_express_lang_cart_minimum_alert_2").find('h3').html('Minimum Price Alert Header 2 ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_cart_minimum_alert_2").attr("disabled",true);
    
    $("#setting_qcld_express_lang_alert_out_of_stock").find('h3').html('Out of Stock Alert ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_lang_alert_out_of_stock").attr("disabled",true);

    $("#setting_qcld_express_helps .format-setting-label").find('h3').html('Open Close Hours ( <strong style="color:red">Pro Feature</strong> )');

    $("#setting_qcld_express_details_button").find('h3').html('Enable Product Details Button ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_details_button-0").attr("disabled",true);



    /**********************************
     Product Showing Template disabled multi vendor.
     *********************************/
    $("#qcld_express_multi_vendor_template option[value='animation']").attr("disabled",true).html('Animated Template ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_multi_vendor_template option[value='gradient']").attr("disabled",true).html('Alternative Linear Gradient Template (03)  ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_multi_vendor_template option[value='restaurent']").attr("disabled",true).html('Alternative Restaurent Template (04)  ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_multi_vendor_template option[value='restaurent-2']").attr("disabled",true).html('Alternative Restaurent Template 2 (05)  ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_multi_vendor_template option[value='slope']").attr("disabled",true).html('Alternative Sidebar Template (06)  ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_multi_vendor_template option[value='catalog']").attr("disabled",true).html('Alternative Catalog Sidebar Template (07)  ( <strong style="color:red">Pro Feature</strong> )');


    $("#setting_qcld_express_link_title_modal_mlti_v").find('h3').html('Link Title Modal ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_link_title_modal_mlti_v-0").attr("disabled",true);
    $("#qcld_express_link_title_modal_mlti_v-1").attr("disabled",true);

    $("#setting_qcld_express_multi_vendor_cat_ids").find('h3').html('Category ids ( <strong style="color:red">Pro Feature</strong> )');
    $("#qcld_express_multi_vendor_cat_ids").attr("disabled",true);

    
   });