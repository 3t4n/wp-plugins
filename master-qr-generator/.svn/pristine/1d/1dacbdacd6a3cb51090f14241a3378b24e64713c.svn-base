<?php  

/**
 * summary
 */
class MASTERQRLiteAdminMenu
{
    /**
     * summary
     */
    public function __construct()
    {

    	
    add_action( 'admin_menu', array($this, 'admin_menu_define' ));   
    }

         /**
     * This function is Add Menu page call back function.
     */

    public function admin_menu_define()
    {

        $icon_url = MASTER_QR_LITE_URL . 'admin/img/admin-logo.png';

        add_menu_page(esc_html__('Master QR', 'master-qr-generator') , esc_html__('Master QR', 'master-qr-generator') , 'publish_posts', 'master-qr-generator', array(
            $this,
            'qrc_option_func'
        ) , $icon_url);

        add_submenu_page('master-qr-generator', 'Print QR Code', 'Print QR Code', 'publish_posts', 'masterqr_print', array(
            $this,
            'masterqr_print'
        ));

        add_submenu_page('master-qr-generator', 'QR Code Downlaod', 'QR Code Downlaod', 'publish_posts', 'masterqr_downlaod', array(
            $this,
            'masterqr_downlaod'
        ));



    }

 function masterqr_downlaod()
    {?>
     <div class="masterqrwrap">
         <div class="master_wp_admin">
             <ul class="master_nav_bar">
                    <li><a href="https://wordpress.org/support/plugin/master-qr-generator/" target="_blank"><?php echo esc_html('Support', 'master-qr-generator') ?></a></li>
                    <li><a href="https://master-qr.dipashi.com/wp-admin/admin.php?page=masterqr" target="_blank"><?php echo esc_html('Settings Page (PRO)', 'master-qr-generator') ?></a></li>
                    <li><a href="https://sharabindu.com/plugins/master-qr-generator/" target="_blank"><?php echo esc_html('Get Pro', 'master-qr-generator') ?></a></li>

             </ul>
             <ul  class="master_hdaer_cnt">
                 <li> <img src=" <?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/logo.png' ?>" alt="qr logo"></li>

                 <li  class="master_fd_cnt"> 
                     <h3><?php echo esc_html('Downloads QR Code image', 'master-qr-generator') . '<sup> '.esc_html(MASTER_QR_LITE_VERSION).'</sup> ' ?> </h3>
             <small><?php echo esc_html('Download all Post type QR code from one page', 'master-qr-generator') ?></small></li>
             </ul>

         </div>

      <div class="master_headrWrap">
        <img src=" <?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/bulk-downlaod-min.png' ?>" alt="Bulk Download QR Code">
        <div class="mqr_bulptinypro">
            <h3><?php echo esc_html('Downloads All QR Code form One Page','master-qr-generator') ?></h3>
<p><?php echo esc_html('You can download all QR codes from one page. You get this benefit from both the plugin dashboard and frontend. You can use category filters based on post type','master-qr-generator')?></p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/master-qr-generator/#pricing" target="_blank" class="mqrlocout">Unlock All QR Download</a>
<a href="https://masterqr.sharabindu.com/qr-code-download/" target="_blank"> Live demo of Download Page</a>
</div>
<div class="mqr_mediumbonus-alert"> 🎁 <span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 60% off</strong> </span><!----></div>
        </div>
 </div>
</div>


<?php
    }

    function masterqr_print()
    {?>
     <div class="masterqrwrap">
         <div class="master_wp_admin">
             <ul class="master_nav_bar">
                    <li><a href="https://wordpress.org/support/plugin/master-qr-generator/" target="_blank"><?php echo esc_html('Support', 'master-qr-generator') ?></a></li>
                    <li><a href="https://master-qr.dipashi.com/wp-admin/admin.php?page=masterqr" target="_blank"><?php echo esc_html('Settings Page (PRO)', 'master-qr-generator') ?></a></li>
                    <li><a href="https://sharabindu.com/plugins/master-qr-generator/" target="_blank"><?php echo esc_html('Get Pro', 'master-qr-generator') ?></a></li>
             </ul>
             <ul  class="master_hdaer_cnt">
                 <li> <img src=" <?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/logo.png' ?>" alt="qr logo"></li>

                 <li  class="master_fd_cnt"> 
                     <h3><?php echo esc_html('Bulk Print QR Code', 'master-qr-generator') . '<sup> '.esc_html(MASTER_QR_LITE_VERSION).'</sup> ' ?> </h3>
             <small><?php echo esc_html('Bulk Print of Post Type based QR Code', 'master-qr-generator') ?></small></li>
             </ul>

         </div>

      <div class="master_headrWrap">
        <img src=" <?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/bilk-print-min.png' ?>" alt="bilk print QR Code">
        <div class="mqr_bulptinypro">
            <h3>Bulk print is a PRO Feature</h3>
<p>Bulk QR codes can be printed from the plugin’s dashboard or from the front end via built-in shortcodes. You can use filter by category. This will printout as a PDF</p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/master-qr-generator/#pricing" target="_blank" class="mqrlocout">Unlock Bulk Print</a>
<a href="https://masterqr.sharabindu.com/qr-code-print/" target="_blank"> Live demo of Bulk Print QR code</a>
</div>
<div class="mqr_mediumbonus-alert"> 🎁 <span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 60% off</strong> </span><!----></div>
        </div>
 </div>
</div>


<?php
    }

    /**
     * Qrc Optin page admin form
     */

    public function qrc_option_func()
    {

        $nonce = wp_create_nonce( 'mqr-nonce' );
        if ( ! wp_verify_nonce( $nonce, 'mqr-nonce' ) ) return;        
        $options = get_option('masterqr_settings');

        $active_tab = isset($_GET['tab']) ? sanitize_title(wp_unslash($_GET['tab'])) : 'qrc__settings';
        include MASTER_QR_LITE_PATH . '/admin/extra/optionValue.php';
?>
        <div class="masterqrwrap">
            <div class="master_wp_admin">
                <ul class="master_nav_bar">
                    <li><a href="https://wordpress.org/support/plugin/master-qr-generator/" target="_blank"><?php echo esc_html('Support', 'master-qr-generator') ?></a></li>
                    <li><a href="https://master-qr.dipashi.com/wp-admin/admin.php?page=masterqr" target="_blank"><?php echo esc_html('Settings Page (PRO)', 'master-qr-generator') ?></a></li>
                    <li><a href="https://sharabindu.com/plugins/master-qr-generator/" target="_blank"><?php echo esc_html('Get Pro', 'master-qr-generator') ?></a></li>
                </ul>
                <ul  class="master_hdaer_cnt">
                    <li> <img src=" <?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/logo.png' ?>" alt="qr logo"></li>

                    <li  class="master_fd_cnt"> 
                        <h3><?php echo esc_html('Master QR Generator', 'master-qr-generator') . '<sup> '.esc_html(MASTER_QR_LITE_VERSION).'</sup> '; ?> </h3>
                <small><?php echo esc_html('Boost the sales of products & services', 'master-qr-generator') ?></small></li>
                </ul>

            </div>

         <div class="master_headrWrap">


<div class="tab-nav">
  <ul id="pbrtabs-nav">
    <li class="active"><a href="#tab1"><?php echo esc_html("Design QR code", "master-qr-generator") ?></a></li>
    <li><a href="#tab2"><?php echo esc_html("Auto Generate QR Code", "master-qr-generator") ?></a></li>
    <li><a href="#tab3"><?php echo esc_html("Various Components QR", "master-qr-generator") ?></a></li>
    <li><a href="#tab4"><?php echo esc_html("Logo based on Post type(Pro)", "master-qr-generator") ?></a></li>
    <li><a href="#tab5"><?php echo esc_html("Shortcode Docs", "master-qr-generator") ?></a></li>
  </ul> 

  <div class="tab-content">
           <div class="tab1-tab active">
<div class="comwrapers">
<div class="com-md-8">  
           <form method="post" action="options.php"  class="qrcdesings" >     
<?php 


            settings_fields("masterqr_settings");

            do_settings_sections('master_admin_sec');


 ?>
             <div class="qrcsubmits">
             <button type ="submit" id="osiudi"><?php echo esc_html('Save Changes','master-qr-generator') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
         </div>
        </form>
</div><div class="com-md-4">

<?php

echo '<div class="masterqr_c_prev_manage"><div class="masteqr-postwarpper" ><div id="masterqrdemos" class="masteqr-post"  data-size="'.esc_attr($qrc_size).'" data-content="Master QR"></div><div class ="mqrbtnalign" style="    display: flex;justify-content:center"><div id="mqrbtnalign" style="width:'.esc_attr($qrc_size).'px;display:flex;align-items: center;justify-content: center;font-size: small"><a class="btn_fromt_canvas" style="font-weight: 600;border: 1px solid transparent;padding:10px 0px ;color:' . esc_attr($qr_dwnbtn_color) . ';background:' . esc_attr($qr_dwnbtnbg_color) . '">' .esc_html($download_qr)  . '</a><a class="mqrprints" style="margin-left:10px;padding:10px 0px;color:' . esc_attr($print_clor) . ';background:' . esc_attr($print_background) . '";>'.esc_html($qr_print_text).'</a>
</div></div></div></div>';
?>
</div>
</div>
</div>
    <div class="tab2-tab">
                <div id="mqr_dynamic-qr">
<div class="mqr_wrap-md-7">
      <form method="post" action="options.php" class="qrcdesings" >   
<?php             

            settings_fields("masterqr_pagety");

            do_settings_sections('master_pagty_sec');


?>
             <div class="qrcsubmits">
             <button type ="submit" id="osiudi"><?php echo esc_html('Save Changes','master-qr-generator') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
         </div>
        </form>
        </div>
      <div class="mqr_wrap-md-5 masteruieusb">  
                     <div class="mqr_pro_ftcs_cont">
                     <h4 class="mqr_ftcs__h"><?php echo esc_html__('Dot, eye shape QR Code(PREMIUM)', 'master-qr-generator') ?></h4>
                    
                     <img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/2.png' ?>" alt="Pro Features">
                     <h4 class="mqr_ftcs__h"><?php echo esc_html__('Logo Spported(PREMIUM)', 'master-qr-generator') ?></h4>
                     <img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/4.png' ?>" alt="Pro Features">
                     <h4 class="mqr_ftcs__h"><?php echo esc_html__('Background Image(PREMIUM)', 'master-qr-generator') ?></h4>
                     <img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/3.png' ?>" alt="Pro Features">


                     <a class="mqr__gtnow" href="https://masterqr.sharabindu.com/"><?php echo esc_html__('Demo', 'master-qr-generator') ?></a>
                 </div>
             </div>
    </div>
    </div>
    <div class="tab3-tab">
                    <div id="mqr_dynamic-qr">
<div class="mqr_wrap-md-7">    
       <form method="post" action="options.php" class="qrcdesings" >        
<?php             

            settings_fields("masterqr_link_generator");
            do_settings_sections('Master_logo_admin_sec');


?>
             <div class="qrcsubmits">
             <button type ="submit" id="osiudi"><?php echo esc_html('Save Changes','master-qr-generator') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
         </div>
</form>
</div>
      <div class="mqr_wrap-md-5 masteruieusb">  
                     <div class="mqr_pro_ftcs_cont">
                     <h4 class="mqr_ftcs__h"><?php echo esc_html__('ELEMENTOR ADDON: (PREMIUM)', 'master-qr-generator') ?></h4>
                    
                     <p><?php echo esc_html__('We have added Master QR Generator Premium Edition to make QR code generator with the help of Elementor. With this addon, you can generate QR codes for current page URL, custom link, custom text, Google map location, Wi-Fi access, WhatsApp access, Vicard, event QR, email and number.', 'master-qr-generator') ?></p>
                     <img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/elementor-qr-min.png' ?>" alt="Pro Features">


                     <a class="mqr__gtnow" href="https://master-qr.dipashi.com/wp-admin/post.php?post=73&action=elementor"><?php echo esc_html__('Elementor Demo', 'master-qr-generator') ?></a>
<a class="oreremils" id="orderemail" video-url="https://www.youtube.com/watch?v=hSCa9Tz0FZc" style="cursor: pointer;"><span title="Video Documentation" id="qrcdocsides" class="dashicons dashicons-video-alt3"></span></a>
    <h4 class="mqr_ftcs__h"><?php echo esc_html__('WIDGET API SUPORTED (PREMIUM)', 'master-qr-generator') ?></h4>
    <p><?php echo esc_html__('You can create and display QR codes using WordPress widgets', 'master-qr-generator') ?></p>
    <img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/widget.png' ?>" alt="Pro Features">
    <a class="mqr__gtnow" href="https://master-qr.dipashi.com/wp-admin/widgets.php"><?php echo esc_html__('Widget dashboard Demo', 'master-qr-generator') ?></a>


    <h4 class="mqr_ftcs__h"><?php echo esc_html__('vCard QR code (PREMIUM)', 'master-qr-generator') ?></h4>
    <p><?php echo esc_html__('In the premium version you can create multiple vCard QR code based on shortcode attributes and Elementor Page builder', 'master-qr-generator') ?></p>
    <img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/5.png' ?>" alt="Pro Features">
<a class="mqr__gtnow" href="https://sharabindu.com/plugins/master-qr-generator/#pricing"><?php echo esc_html__('Get Started', 'master-qr-generator') ?></a>
                 </div>
             </div>
             </div>
        </div>
    <div class="tab4-tab">
        <div id="mqr_dynamic-qr">
            <div class="mqr_wrap-md-7"> 

    <?php             
        settings_fields("masterqr_logo_posttype");
        do_settings_sections('Master_logo_postype_sec');?>
    </div>
    <div class="mqr_wrap-md-5 masteruieusb">  
                     <div class="mqr_pro_ftcs_cont">
                     <h4 class="mqr_ftcs__h"><?php echo esc_html__('Different Logo Based On Post Type(PREMIUM)', 'master-qr-generator') ?></h4>
                    
                     <p><?php echo esc_html__('You Can set different logos based on post type. If the image field is blank for a post type, then the logo image will be active from the "Current Page QR" logo image settings.', 'master-qr-generator') ?></p>
                     <img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/8.png' ?>" alt="Pro Features">
                     <p></p>
                     <img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/10.png' ?>" alt="Pro Features">

                     <a class="mqr__gtnow" href="https://sharabindu.com/plugins/master-qr-generator/#pricing"><?php echo esc_html__('Get Started', 'master-qr-generator') ?></a>
                 </div>
             </div>
             </div>
        </div>
    <div class="tab5-tab">
        <div id="mqr_dynamic-qr">
            <div class="mqr_wrap-md-7">

       <form method="post" action="options.php" class="qrcdesings" >

        <?php             

        settings_fields("MASTERLite_QR_shortcode_docs");
            do_settings_sections('mqr_docs_admin_shortcode');
        ?>
        </form>
    </div>       
    <div class="mqr_wrap-md-5 masteruieusb">  
                     <div class="mqr_pro_ftcs_cont">
                     <h4 class="mqr_ftcs__h"><?php echo esc_html__('Shortcode Attribute Supported (PREMIUM)', 'master-qr-generator') ?></h4>
                    
                     <p><?php echo esc_html__('in the premium version you can create multiple QR codeof one elements based on Shortcode Attribute . as a reult created multiple QR code for, custom link, custom text, Google map location, Wi-Fi access, WhatsApp access, vCard QR, email QR code and number QR code.', 'master-qr-generator') ?></p>
                     <img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/1.png' ?>" alt="Pro Features">


                     <a class="mqr__gtnow" href="https://masterqr.sharabindu.com/short-code/"><?php echo esc_html__('View Demo', 'master-qr-generator') ?></a>

 <p><?php echo esc_html__('Powerful styling design dot code that can easily stand out from other websites. Versatile features, auto-generate, background image, logo, bulk print which is a complete package plugin for your WordPress site.', 'master-qr-generator') ?></p>
<img class="mqr_varcdemos" style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(MASTER_QR_LITE_URL) . '/admin/img/ee.png' ?>" alt="Pro Features">
                     <a class="mqr__gtnow" href="https://sharabindu.com/plugins/master-qr-generator/#pricing"><?php echo esc_html__('See Pricing', 'master-qr-generator') ?></a>
                 </div>
             </div>
            </div>
        </div>              
        </div>
      </div>
    </div>
   </div>


   <?php
    }

}
if(class_exists('MASTERQRLiteAdminMenu')){

	new MASTERQRLiteAdminMenu();


}
