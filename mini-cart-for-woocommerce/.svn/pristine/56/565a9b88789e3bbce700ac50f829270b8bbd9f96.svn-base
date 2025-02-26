<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      2.0.7
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/admin
 */

class WHMC_Admin_Light
{

    /**
     * The ID of this plugin.
     *
     * @since    2.0.7
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    2.0.7
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    2.0.7
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        define('WHMC_PAGE_ID', 'whmc_menu');
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-whmc-admin-sidepanel.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-whmc-settings.php';
        include_once plugin_dir_path(dirname(__FILE__)) . 'lib/wordpress-plugin-installer-main/class-connekt-plugin-installer.php';

        $plugin_name = new WHMC_Admin_Sidebar();

        add_action('admin_head', array(
            $this,
            'whmc_admicss'
        ));


    }


    /**
     * Register the stylesheets for the admin area.
     *
     * @since    2.0.7
     */
    public function enqueue_styles()
    {
    $nonce = wp_create_nonce( 'whmc-nonce' );
  if ( ! wp_verify_nonce( $nonce, 'whmc-nonce' ) ) return;
    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page']))), WHMC_PAGE_ID) !== false) {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style("fonticonpicker", WHMC_LIGHT_URL . 'assets/admin/css/jquery.fonticonpicker.min.css', array() , $this->version, 'all');
        wp_enqueue_style($this->plugin_name, WHMC_LIGHT_URL . 'assets/admin/css/admin.css', array() ,$this->version, 'all');

    }
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    2.0.7
     */
    public function enqueue_scripts()
    {
          $nonce = wp_create_nonce( 'whmc-nonce' );
      if ( ! wp_verify_nonce( $nonce, 'whmc-nonce' ) ) return;
      
    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page']))), WHMC_PAGE_ID) !== false) {

    wp_enqueue_script("jquery-fonticonpicker", WHMC_LIGHT_URL . 'assets/admin/js/jquery.fonticonpicker.min.js', array('jquery',) ,  $this->version, true);
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_media();
        wp_enqueue_script('whmc-media-js', WHMC_LIGHT_URL . 'assets/admin/js/media.js', array('jquery') , $this->version, true);

        wp_enqueue_media();
        wp_enqueue_script('media-upload');
                wp_enqueue_script('SweetAlert', WHMC_LIGHT_URL . 'assets/admin/js/SweetAlert.js', array('jquery') , $this->version, true);
        wp_enqueue_script($this->plugin_name, WHMC_LIGHT_URL . 'assets/admin/js/whmc-admin.js', array('jquery') , $this->version, true);

        }
    }


    /**
     * Setting link.
     *
     * @since    2.0.7
     */

    public function plugin_settings_link($links)
    {
        if (!function_exists('run_mini-cart-for-woocommerce'))
        {
            return array_merge(array(
                '<a href="' . admin_url('admin.php?page=whmc_menu') . '">' . esc_html__('Settings', 'mini-cart-for-woocommerce') . '</a>',
                '<a class="qr_pro_link" href="https://sharabindu.com/plugins/mini-cart-for-woocommerce/">' . esc_html__('Get Pro', 'mini-cart-for-woocommerce') . '</a>',
            ) , $links);
        }
        else
        {
            return $links;
        }
    }

    /**
     * Admin Notice
     *
     * @since    2.0.7
     */

    function woo_admin_notices()
    {

        if (!class_exists('WooCommerce'))
        {

            echo '<div class="error">
        <p>' . esc_html__('Mini Cart for WooCommerce Plugin is activated but not effective. It requires WooCommerce in order to work', 'mini-cart-for-woocommerce') . '</p>
        </div>';
        }

        if (class_exists('mini-cart-for-woocommerce')){

            echo '<div class="notice notice-warning is-dismissible">
        <p>' . esc_html__('Please deactivate "Mini Cart for WooCommerce" plugin Free Version, because you are using Pro version', 'mini-cart-for-woocommerce') . '</p>
        </div>';
        }

    }

    public function mcfwc__admin_menu()
    {
        if (!function_exists('run_mini-cart-for-woocommerce'))
        {

     add_menu_page(esc_html__('Mini Cart', 'mini-cart-for-woocommerce') , esc_html__('Mini Cart', 'mini-cart-for-woocommerce') , 'manage_options', 'whmc_menu', array(
         $this,
         'mcfwc___menu_func'
     ),'dashicons-cart',59 );

    add_submenu_page( 'whmc_menu', esc_html__('Menu Cart Icon', 'mini-cart-for-woocommerce'), esc_html__('Menu Cart Icon', 'mini-cart-for-woocommerce'),'manage_options', 'admin.php?page=whmc_menu#tab1');

    add_submenu_page( 'whmc_menu', esc_html__(' Footer Cart Icon ', 'mini-cart-for-woocommerce'), esc_html__(' Footer Cart Icon ', 'mini-cart-for-woocommerce'),'manage_options', 'admin.php?page=whmc_menu#tab2');

    add_submenu_page( 'whmc_menu', esc_html__('Sidecart Settings', 'mini-cart-for-woocommerce'), esc_html__('Sidecart Settings', 'mini-cart-for-woocommerce'),'manage_options', 'admin.php?page=whmc_menu#tab3');

    add_submenu_page( 'whmc_menu', esc_html__('Notification Settings', 'mini-cart-for-woocommerce'), esc_html__('Notification Settings', 'mini-cart-for-woocommerce'),'manage_options', 'admin.php?page=whmc_menu#tab4');

    add_submenu_page( 'whmc_menu', esc_html__('Our All Plugins', 'mini-cart-for-woocommerce'), esc_html__('Our All Plugins', 'mini-cart-for-woocommerce'),'manage_options', 'admin.php?page=whmc_menu#tab5');

    add_submenu_page( 'whmc_menu', esc_html__('Get Pro', 'mini-cart-for-woocommerce'), esc_html__('Get Pro', 'mini-cart-for-woocommerce'),'manage_options', 'https://sharabindu.com/plugins/mini-cart-for-woocommerce/');


        }
    }

    /**
     * mini-cart-for-woocommerce Optin page admin form
     */
    public function mcfwc___menu_func()
    {
        $minicart_image_url = WHMC_LIGHT_URL . 'assets/admin/img/';

        require WHMC_LIGHT_PATH . 'admin/partials/whmc-data.php';
    ?>

<div class="whmc_tirmoof_admin_wrapper">
  <ul class="whmc__nav_bar">
     <li>
      <a href="https://wordpress.org/support/plugin/mini-cart-for-woocommerce/" target="_blank"> <?php echo esc_html__('Support', 'mini-cart-for-woocommerce') ?> </a>
    </li>   
    <li>
      <a href="https://sharabindu.com/plugins/mini-cart-for-woocommerce/" target="_blank"> <?php echo esc_html__('Get Pro', 'mini-cart-for-woocommerce') ?> </a>
    </li>

    <li>
      <a href="https://woominicart.dipashi.com/wp-admin/admin.php?page=whmc_menu" target="_blank"> <?php echo esc_html__('Admin Demo(Pro)', 'mini-cart-for-woocommerce') ?> </a>
    </li>
    <li>
      <a href="https://woominicart.sharabindu.com/" target="_blank"> <?php echo esc_html__('Frontend Demo(Pro)', 'mini-cart-for-woocommerce') ?> </a>
    </li>

    <li>
      <a href="https://woominicart.sharabindu.com/docs/introduction/" target="_blank"> <?php echo esc_html__('Docs', 'mini-cart-for-woocommerce') ?> </a>
    </li>

  </ul>
  <ul class="whmc_hdaer_cnt">
    <li>
      <img src=" <?php echo esc_url(WHMC_LIGHT_URL) . 'assets/admin/img/mnin.png' ?>" alt="Logo">
    </li>
    <li class="whmc_fd_cnt">
      <h3> <?php echo esc_html__('Mini Cart for WooCommerce ', 'mini-cart-for-woocommerce')?> <sup> <?php echo esc_html(WHMC_LIGHT_VERSION);?> </sup>
      </h3>
      <small> <?php echo esc_html__('Ajax Mini Cart Plugin for WooCommerce', 'mini-cart-for-woocommerce') ?> </small>
    </li>
  </ul>
</div>
<div class="whmcwraper">
                  
  <div class="tab-nav">
    <ul>
      <li class="active">
        <a href="#tab1"> <?php echo esc_html("Menu Cart Icon", "mini-cart-for-woocommerce") ?> </a>
      </li>
      <li>
        <a href="#tab2"> <?php echo esc_html("Footer Cart Icon", "mini-cart-for-woocommerce") ?> </a>
      </li>
      <li>
        <a href="#tab3"> <?php echo esc_html("Side Cart", "mini-cart-for-woocommerce") ?> </a>
      </li>
      <li>
        <a href="#tab4"> <?php echo esc_html("Notification Box", "mini-cart-for-woocommerce") ?> </a>
      </li>
      <li>
        <a href="#tab5"> <?php echo esc_html("Our All Plugins", "mini-cart-for-woocommerce") ?> </a>
      </li>
    </ul>
  </div>

 <div class="tab-content">

    <div class="tab1-tab active">
        <div class="conatcinerwrapper">
          <div class="col-md-8"> 
            <form method="post" action="options.php" class="whmc_menucart">
            <?php

            settings_fields("whmc_menu");
            do_settings_sections('whmc_admin_sec');

            ?> <div class="whmbtnsubit">
              <button type="submit" id="osiudi" class="button button-primary"> <?php echo esc_html__('Save Changes','mini-cart-for-woocommerce') ?> <span class="whmc_sdhicrt"></span>
              </button>
              <span class="whmcr_djkfhjhj"></span>
            </div>
        </form>
          </div>
          <div class="col-md-4">
            <div class="previewsidebar">
              <div class="menucartprev">
                <span id="kkkpreview">Preview</span>
                <span id="<?php echo esc_attr($fcp_icon_option) ?>" class="kkkpreview">This is a Premium Icon</span>
                <div class="cart_menu_li menu-link">
                  <div id="menuiconwrap" class="">
                    <span class="<?php echo esc_attr($fcp_icon_option) ?>" id="menuiconid">
                    </span>
                    <span class="mini-cart-count">
                      <span class="cart_count_header">5</span>
                    </span>
                    <div id="cart_count_total">
                      <span class="cart_count_total"> <?php echo wp_kses_post(wc_price('80')) ?> </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="tab2-tab">

      <div class="conatcinerwrapper">
        <div class="col-md-7"> 
    <form method="post" action="options.php" class="whmc_menucart">
            <?php   
            settings_fields("whmc_option");
            do_settings_sections('whmc_admin_fsec');

        ?> <div class="whmbtnsubit">
            <button type="submit" id="osiudi" class="button button-primary"> <?php echo esc_html__('Save Changes','mini-cart-for-woocommerce') ?> <span class="whmc_sdhicrt"></span>
            </button>
            <span class="whmcr_djkfhjhj"></span>
          </div>
              </form>
        </div>

        <div class="col-md-5">
          <div class="previewsidebar">
            <div class="footercartprev">
              <span id="kkkpreviewss">Preview</span>
                <span id="<?php echo esc_attr($wmhc_footer_bag_ficon); ?>" class="kkkpreviewss">This is a Premium Icon</span>
               <?php 
         echo '<div class="shopping-cart" id="open"><span class="'.esc_attr($wmhc_footer_bag_ficon).'" style="font-size:'.esc_attr($fcp_cart_size).'px;color:'.esc_attr($fcp_cart_color).';" id="footercraticos"></span><span id="mini-cart-count_footer">7</span></div>';?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="tab3-tab">
      <div class="conatcinerwrapper">
        <div class="col-md-7"  id="whmcsidebarnavwrap">

<ul class="whmcsidebarnav">
  <li  class="sdsdsduui">Top Part</li>
  <li class="sdsdsduui2">Middle Part</li>
  <li  class="sdsdsduui3">Bottom Part</li>
  <li class="sdsdsduui4">General Settings</li>
    <li  class="sdsdsduui5">Progress Bar(pro)</li>
  <li class="sdsdsduui6">Suggested Products(pro)</li>
  <li class="sdsdsduui7">Hide pro</li>
</ul>

          <form method="post" action="options.php" class="whmc_sidebarsfrm"> <?php 
            settings_fields('whmc_sidepanel');
            do_settings_sections('whmc_admin_sec_sidepanel');
            ?> <div class="whmbtnsubit">
              <button type="submit" id="osiudi" class="button button-primary"> <?php echo esc_html__('Save Changes','mini-cart-for-woocommerce') ?> <span class="whmcsidebars_sdhi"></span>
              </button>
              <span class="whmcsidebars_djkfhjhj"></span>
            </div>
          </form>
        </div>
        <div class="col-md-5">
          <div class="previewsidebar" style="background: #999797;">
            <div id="pm_menu" class="whmc-body">
              <div class="whmc_top_part" style="background:<?php echo esc_attr($wmhcside_toppart_bg); ?>">
                <div class="cloasebtnwrap">
                  <span class="cloasebtn">×</span>
                </div>

                <div class="whmtopcatrs">
                  <div class="carttxtbtnwrap">
            <span class="carttxtbtn"><i class="<?php echo esc_attr($fcp_top_icon); ?>" style="color:<?php echo esc_attr($wmhcside_toppart_icon);?>" id="carttxtbtn"></i></span>
                  </div>
                  <div class="carttxtbtnwraptct">
                    <span id="topart_count_s">2</span>
                    <div class="whmtitr"> <?php echo esc_html($wmhcside_toppartycart);?> </div>
                  </div>
                </div>
              </div>
              <div class="whmc-cart-item-wrap" id="emtyad" style="height: 264px;">

<!-- Reward bar -->
<span class="whmcwscsbbarerat" style="margin-bottom:8px;display: block;">
  <div class="whmc-proges-bar-cont whmc-proges-bar-div-equal" id="1">

    
            <div class="whmc-proges-bar-text" datadisf="">

    <span class="sjdflkdkfqew" style="display:none"> <?php echo wp_kses_post(wc_price('12')) ?></span>
  <span class="yoatawa">You're <?php echo wp_kses_post(wc_price('12')) ?> away from Discount</span>
  <span style="display:none">You're <?php echo wp_kses_post(wc_price('12')); ?> away from Discount</span>
                
   </div>
  
        <div class="whmc-proges-bar-poamt whmc-proges-bar-levs">
        <span class="whmcbordelines" style="width: 50%"><?php echo wp_kses_post(wc_price('50')) ?></span>
        
        <span style="width:50%"><?php echo wp_kses_post(wc_price('100')); ?></span>      
            
            </div>


    <div class="whmc-proges-bar-insd">

        <div class="whmc-proges-bar-wrap">
            <span class="progress-bar-striped progress-bar-default" style="width: 38%;"></span>
        </div>

        <div class="whmc-proges-bar-wrap-poends whmc-proges-bar-levs">
            <span class="whmcbordeline" style="width: 50%"></span>
            <span style="width:100%"></span>   
            </div></div>
            <div class="whmc-proges-bar-wrap-potitle">

            <span class="whmcbordelines achivenone whdiscont" style="width: 50%" >Discount</span>  
            <span class="whmcbordelines-right achivenone whfreeship">Free Shipping</span>
            </div>
          </div>
          </span>
    <!-- Reward bar -->
            <div class="whmc-mini-cart">
                  <div class="whmc-cart-items" data-itemid="13263" data-ckey="f23077b60542b92033df4d2e208706de">
                    <div class="whmc-cart-items-inner">
                      <div class="whmimagewrapper">
                        <div class="whmcremovesd">
                          <div class="wc_remove_btn">
                            <a>
                              <span class="icon_cancel-circle"></span>
                            </a>
                          </div>
                        </div>
                        <div class="cart_image_iem">
                          <img width="150" height="150" src="<?php echo esc_url(WHMC_LIGHT_URL); ?>/assets/admin/img/vneck-tee-2-100x100.jpg" class="attachment-thumbnail size-thumbnail" sizes="(max-width: 150px) 100vw, 150px">
                        </div>
                      </div>
                      <div class="whmc-item-desc">
                        <div class="whmcitemprem">
                          <div class="cart-item-data-field">
                            <a href="#">T-shirt</a>
                          </div>

                          <div class="whmc-item-price">
                            <span class="onlyprice"> <?php echo wp_kses_post(wc_price('18')); ?> </span>
                            <span class="defaltprice"><del><?php echo wp_kses_post(wc_price('20')); ?></del> <?php echo wp_kses_post(wc_price('18')); ?> </span>
                            <span class="quantitywithprice">1 × <?php echo wp_kses_post(wc_price('18')); ?> </span>
                            <span class="subtoroprce"> <?php echo wp_kses_post(wc_price('18')); ?> </span>
                          </div>
                        </div>
                        <span style="font-size: 12px;"><strong>Color:</strong> Red</span></br>
                        <span style="font-size: 12px;"><strong>Size:</strong> Large</span>
                        <div class="whmcqrtpricewrapper">
                          <div class="whmc-item-qty">
                            <span class="whmc-qty-minus whmc-qty-chng icon_minus"></span>
                            <input type="number" name="whmc-qty-input" class="whmc-qty" step="1" min="0" max="14" value="1" placeholder="" inputmode="numeric">
                            <span class="whmc-qty-plus whmc-qty-chng icon_plus"></span>
                          </div>
                          <span class="eoirhchv" style="display:none"><?php echo wp_kses_post(wc_price('2')); ?></span>
                          <div class="whmcsavevalus"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="whmc-cart-items">
                    <div class="whmc-cart-items-inner">
                      <div class="whmimagewrapper">
                        <div class="whmcremovesd">
                          <div class="wc_remove_btn">
                            <a>
                              <span class="icon_cancel-circle"></span>
                            </a>
                          </div>
                        </div>
                        <div class="cart_image_iem">
                          <img width="150" height="150" src="<?php echo esc_url(WHMC_LIGHT_URL); ?>/assets/admin/img/polo.jpg" class="attachment-thumbnail size-thumbnail" sizes="(max-width: 150px) 100vw, 150px">
                        </div>
                      </div>
                      <div class="whmc-item-desc">
                        <div class="whmcitemprem">
                          <div class="cart-item-data-field">
                            <a href="#">Polo</a>
                          </div>
                          <div class="whmc-item-price">
                            <span class="onlyprice"> <?php echo wp_kses_post(wc_price('15')); ?> </span>
                          <span class="defaltprice"> <?php echo wp_kses_post(wc_price('15')); ?> </span>
                            <span class="quantitywithprice">2 × <?php echo wp_kses_post(wc_price('15')); ?> </span>
                            <span class="subtoroprce"> <?php echo wp_kses_post(wc_price('30')); ?> </span>
                          </div>
                        </div>
                        <div class="whmcqrtpricewrapper">
                          <div class="whmc-item-qty">
                            <span class="whmc-qty-minus whmc-qty-chng icon_minus"></span>
                            <input type="number" name="whmc-qty-input" class="whmc-qty" step="1" min="0" max="14" value="2" placeholder="" inputmode="numeric">
                            <span class="whmc-qty-plus whmc-qty-chng icon_plus"></span>
                          </div>
                          <div class="whmcsavevalus"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="whmc-bottom-part" style="height: auto;">
                <div class="whmc-cpn-resp" style="display:none"></div>
                <div class="couplonfield">
                  <div class="allpliedcoupon">
                    <span class="icon_d-1" id="cpnicon" style="color: <?php echo esc_attr($whmc_coupon_iconcolor); ?>">
                    </span>
                    <ul class="whmc-applied-cpns">
                      <li class="" cpcode="sharabindu">sharabindu <span class="whmc-remove-cpn icon_cancel-circle"></span>
                      </li>
                    </ul>
                  </div>
                  <div class="whmc_applypromocode">
                    <span class="whmaplycoupletxt"> <?php echo esc_html($wmhc_applycoupon_value) ?> </span>
                  </div>
                </div>
                <div class="whmc-coupon">
                  <div class="whmc-couponwrapper">
                    <div class="whmc_applypromocode">
                      <span class="icon_arrow-left2"></span>
                    </div>
                    <div class="whmc-coupon-field">
                      <input type="text" id="whmc-coupon-code" placeholder="<?php echo esc_attr($whmc_cmplacehlder); ?>" style="border-top-left-radius: <?php echo esc_attr($whmc_cppbrius); ?>px;border-bottom-left-radius: <?php echo esc_attr($whmc_cppbrius); ?>px">
                      <button id="whmc_cmbrnabels" class="whmc-coupon-submit whmc-button" style="background:<?php echo esc_attr($whmc_cmbtnbg); ?>;border-top-right-radius: <?php echo esc_attr($whmc_cppbrius); ?>px;border-bottom-right-radius: <?php echo esc_attr($whmc_cppbrius); ?>px"> <?php echo esc_attr($whmc_cmbrnabel); ?> </button>
                    </div>
                    <ul class="whmc-applied-cpns" style="display:none">
                      <li></li>
                    </ul>
                    <div class="whmc-coupon-row" style="background:<?php echo esc_attr($whmccoupon_modalibg); ?>">
                      <p class="wmcocodes whmctopfils">
                        <span class="wmcocodeicon">
                          <i class="<?php echo esc_attr($whmc_coupon_modalicon); ?>" style="color:<?php echo esc_attr($whmc_cmoiconclr); ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="2fv34wbu" readonly="">
                      </p>
                      <span>
                        <img class="whmccouponimages" src="<?php echo esc_url(WHMC_LIGHT_URL)?>/assets/admin/img/3-min.png" alt="2fv34wbu">
                      </span>
                      <p class="wmcocodes whmctopas">
                        <span class="wmcocodeicon">
                          <i class="<?php echo esc_attr($whmc_coupon_modalicon); ?>" style="color:<?php echo esc_attr($whmc_cmoiconclr); ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="2fv34wbu" readonly="">
                      </p>
                      <p class="whmc-cr-desc">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                    <div class="whmc-coupon-row" style="background:<?php echo esc_attr($whmccoupon_modalibg); ?>">
                      <p class="wmcocodes whmctopfils">
                        <span class="wmcocodeicon">
                          <i class="<?php echo esc_attr($whmc_coupon_modalicon); ?>" style="color:<?php echo esc_attr($whmc_cmoiconclr); ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="kt34ugm9" readonly="">
                      </p>
                      <span>
                        <img class="whmccouponimages" src="<?php echo esc_url(WHMC_LIGHT_URL); ?>/assets/admin/img/5-min.png" alt="kt34ugm9">
                      </span>
                      <p class="wmcocodes whmctopas">
                        <span class="wmcocodeicon">
                          <i class="<?php echo esc_attr($whmc_coupon_modalicon); ?>" style="color:<?php echo esc_attr($whmc_cmoiconclr); ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="kt34ugm9" readonly="">
                      </p>
                      <p class="whmc-cr-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                    <div class="whmc-coupon-row" style="background:<?php echo esc_attr($whmccoupon_modalibg); ?>">
                      <p class="wmcocodes whmctopfils">
                        <span class="wmcocodeicon">
                          <i class="<?php echo esc_attr($whmc_coupon_modalicon); ?>" style="color:<?php echo esc_attr($whmc_cmoiconclr); ?>"></i>
                        </span>
                        <input class="whmc-cr-code" type="text" value="s45g4gtc" readonly="">
                      </p>
                      <p class="whmc-cr-desc"></p>
                      <span>
                        <img class="whmccouponimages" src="<?php echo esc_url(WHMC_LIGHT_URL) ?>/assets/admin/img/2-min.png" alt="s45g4gtc">
                      </span>
                      <p class="wmcocodes whmctopas">
                        <span class="wmcocodeicon">
                          <i class="<?php echo esc_attr($whmc_coupon_modalicon); ?>" style="color:<?php echo esc_attr($whmc_cmoiconclr); ?>"></i>
                        </span>
                        <span>
                          <input class="whmc-cr-code" type="text" value="s45g4gtc" readonly="">
                      </p>
                      <p class="whmc-cr-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                    <div class="whmc-coupon-row" style="background:<?php echo esc_attr($whmccoupon_modalibg); ?>">
                      <p class="wmcocodes whmctopfils">
                        <span class="wmcocodeicon">
                          <i class="<?php echo esc_attr($whmc_coupon_modalicon); ?>" style="color:<?php echo esc_attr($whmc_cmoiconclr); ?>"></i>
                        </span>
                        <span>
                          <input class="whmc-cr-code" type="text" value="zwvc2wy6" readonly="">
                        </span>
                      </p>
                      <span>
                        <img class="whmccouponimages" src="<?php echo esc_url(WHMC_LIGHT_URL); ?>/assets/admin/img/1-min.png" alt="zwvc2wy6">
                      </span>
                      <p class="wmcocodes whmctopas">
                        <span class="wmcocodeicon">
                          <i class="<?php echo esc_attr($whmc_coupon_modaliconesc_attr); ?>" style="color:<?php echo esc_attr($whmc_cmoiconclr); ?>"></i>
                        </span>
                        <span>
                          <input class="whmc-cr-code" type="text" value="zwvc2wy6" readonly="">
                        </span>
                      </p>
                      <p class="whmc-cr-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                  </div>
                </div>
                <div class="whmc-buy-summary">
                  <div class="whmc-cart-subtotal-wrap">
                    <span style="color: <?php echo esc_attr($wmhc_cart_side_subtotal); ?>;font-size:<?php echo esc_attr($wmhc_cart_side_subtoral_font); ?>px">
                      <label class="whmc-total-label"> <?php echo esc_html($sidepanels_subtototal_value); ?> </label>
                    </span>
                    <span class="whmc-subtotal-amount"> <?php echo wp_kses_post(wc_price('48')); ?> </span>

                  </div>


                  <div class="shippinfrescla">
                    <span class="shippinfrwrap">
                      <label class="shippinfresclalabel"> <?php echo esc_html($wmhc_shipping_value); ?> </label>
                      <span class="<?php echo esc_attr($whmc_shipicon) ?>" id="shipcion">
                      </span>
                    </span>
                    <span class="shippingfree"> <?php echo wp_kses_post(wc_price('20')); ?> </span>
                  </div>

                  <div class="whmcdicamountswrap"><span>
                  <label>10% Discount</label></span>
                  <span class="whmc-cart-discount-amount">- <?php echo wp_kses_post(wc_price('5'));?></span></div>

                  <div class="taxrates">
                    <span>
                      <label> <?php echo esc_html($wmhcside_btm_shipping); ?> </label>
                    </span>
                    <span class="taxtgfree"> <?php echo wp_kses_post(wc_price('5.80')); ?> </span>
                  </div>
                  <div class="whmc-cart-discount-wrap">
                    <span>
                      <label> <?php echo esc_html($wmhcside_btm_discount); ?> </label>
                    </span>
                    <span class="whmc-cart-discount-amount">
                      <span class="icon_minus" id="dicicnsd"></span> <?php echo wp_kses_post(wc_price('10')); ?> </span></div>
            <?php echo '<small id="whmcstxt">'.esc_attr($wmhc_subcstxt).'</small>'; ?>

                  <div class="whmc-cart-total-wrap" id="totalcla">
                    <span>
                      <label> <?php echo esc_html($wmhcside_btm_total); ?> </label>
                    </span>
                    <span class="whmc-cart-total-amount"> <?php echo wp_kses_post(wc_price('63.80')); ?> </span>
                  </div>
                  <div class="whmc_ft-buttons-con">
                    <a href="#" class="chekouttxtvalues">
                      <div class="wmcchevkoutprocess">
                        <div class="icons" id="whmccheicobs">
                          <i class="fcp_icon_7"></i>
                        </div>
                        <div class="wmctitel"> <?php echo esc_html($options_chekout_text_value); ?> </div>
                        <div class="amounts"> <?php echo wp_kses_post(wc_price('63.80')); ?> </div>
                      </div>
                    </a>
                  </div>
                  <a id="whmckeepshooping"> <?php echo esc_html($whmc_keepshop_text_value); ?> </a>


                </div>
                <div class="backtopreb">
                  <span class="icon_arrow-left2" title="Back to Main Page"></span>
                </div>
                <div class="whmc-cart-item-wrap" id="borderbtnnine">
                  <div class="whmc-empty-cart">
                    <div class="whmrmtycart-zero-state">
                      <div class="whmrmtycart-icon-cart">
                        <i class="<?php echo esc_attr($emptyicons) ?>" id="emptrarticos" style="color: <?php echo esc_attr($emptyicclr);?>">
                        </i><?php $id = attachment_url_to_postid( $wmhupimage);$imgalt = get_post_meta( $id, '_wp_attachment_image_alt', true );?> <div class="wmcemptyimg">
                          <img src="<?php echo esc_url($wmhupimage) ?>" alt="<?php echo esc_attr($imgalt); ?>">
                        </div>
                      </div>
                      <div class="whmrmtycart-zero-state-title"> <?php echo esc_html($whmx_no_cart_text_value);?> </div>
                      <div class="whmrmtycart-zero-state-text"> <?php echo esc_html($whmcfillcart);?> </div>
                      <a class="whmrmtycart-button" style="background:<?php echo esc_attr($whmcemptyspbtbg)?>;
    color:<?php echo esc_attr($whmcemptyspbtclr)?>;border-radius:<?php echo esc_attr($whmcemptyspbris);?>px;"> <?php echo esc_html($whmcemptyshopbrn);?> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab4-tab">
      <div class="conatcinerwrapper">
        <div class="col-md-5">
    <form method="post" action="options.php" class="whmc_sidebarsfrm">

          <?php
            settings_fields('whmc_notification');
            do_settings_sections('whmc_admin_sec_notification');
            ?>
          <div class="whmbtnsubit">
              <button type="submit" id="osiudi" class="button button-primary"> <?php echo esc_html__('Save Changes','mini-cart-for-woocommerce') ?> <span class="whmcsidebars_sdhi"></span>
              </button>
              <span class="whmcsidebars_djkfhjhj"></span>
            </div>
          </form>
        </div>
        <div class="col-md-7">
          <div class="previewsidebar">
            <div class="prevnotifu">

            <div class="whmc_btm_notification">
            <span class="whmc-confetti-container">
            <i class="gg-check-o"></i><img width="150" height="150" src="<?php echo esc_url(WHMC_LIGHT_URL); ?>/assets/admin/img/polo.jpg" class="attachment-thumbnail size-thumbnail">Polo <span class="addesdsucssd"> <?php echo esc_attr($notifications_rang_value); ?></span>
            </span>
            </div>   
              <div class="notofivationwrapper">
                <ul>
                  <li class="noticon">
                    <span class="dashicons dashicons-saved"></span>
                  </li>
                  <li class="notimag">
                    <img width="150" height="150" src="<?php echo esc_url(WHMC_LIGHT_URL);?>/assets/admin/img/polo.jpg" class="attachment-thumbnail size-thumbnail">
                  </li>
                  <li class="notpruct">Polo <span class="addesdsucss"> <?php echo esc_attr($notifications_rang_value) ?> </span>
                  </li>
                </ul>
                <div class="adminprogress"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab5-tab">
      <div class="poytgwbemfn">
<?php 


$plugins = [
  [
    'slug' => 'qr-code-composer',
  ],
  [
    'slug' => 'barcode-generator-for-woocommerce',
  ],
  [
    'slug' => 'mini-cart-for-woocommerce',
  ],
  [
    'slug' => 'elfi-masonry-addon'
  ],
  [
    'slug' => 'yoo-bar'
  ],
  [
    'slug' => 'fancy-fiter'
  ],
  [
    'slug' => 'master-qr-generator'
  ]
]; 

if( class_exists( 'Connekt_Plugin_Installer' ) ) {
  Connekt_Plugin_Installer::init( $plugins );
}
 ?>
        <ul>
          <li><a href=""></a></li>
        </ul>
        </div>
    </div>
  </div>
</div>

          
         <?php
    } // end sandbox_theme_display
    

    public function adminFooterText()
    {
      $nonce = wp_create_nonce( 'whmc-nonce' );
      if ( ! wp_verify_nonce( $nonce, 'whmc-nonce' ) ) return;
    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page']))), WHMC_LIGHT_PLUGIN_ID) !== false) {
    ?>

       <div id="footer_contaciner" role="contentinfo">
               <p id="" class=""><?php echo esc_html__('Thank you for using', 'mini-cart-for-woocommerce') ?> <strong><?php echo esc_html__('Mini Cart For WooCommerce', 'mini-cart-for-woocommerce') ?></strong> <span class="dashicons dashicons-smiley"></span> &nbsp;&nbsp;
    <?php echo esc_html__('Talk to us at ','mini-cart-for-woocommerce')?><a href="https://wordpress.org/support/plugin/mini-cart-for-woocommerce/">Support</a><?php echo esc_html__(' for any plugin related issues. Please give our plugin a 5-star rating on','mini-cart-for-woocommerce')?> <a class="mini-cart-for-woocommerce_dash_strat" href="https://wordpress.org/support/plugin/mini-cart-for-woocommerce/reviews/" target="_blank"><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i></a> <a href="https://wordpress.org/support/plugin/mini-cart-for-woocommerce/reviews/" target="_blank" rel="noopener noreferrer"><?php echo esc_html__('WordPress.org', 'mini-cart-for-woocommerce') ?></a> <?php echo esc_html__('if you benefit from using the plugin. It will motivate our efforts  ', 'mini-cart-for-woocommerce') ?></p>
  
           <div class="clear"></div>
       </div>
   <?php
        }
    }


   /**
     * Whmc Optin page admin form
     */

    public function whmc_admicss()
    {  
    require WHMC_LIGHT_PATH . 'admin/partials/whmc-data.php';

      $nonce = wp_create_nonce( 'whmc-nonce' );
      if ( ! wp_verify_nonce( $nonce, 'whmc-nonce' ) ) return;
    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page']))), WHMC_PAGE_ID) !== false) {
        ?>
 <style>  
.whmc_btm_notification {
    background: <?php echo esc_attr($notifications_bg_color);?>;
    color: <?php echo esc_attr($notifications_title_color);?>;
}
.notofivationwrapper ul {
    box-shadow: -2px 5px 12px <?php echo esc_attr($notification_boxshadow);?>;
    background: <?php echo esc_attr($notifications_bg_color);?>;
}
li.notpruct,li.notpruct span{
    color:<?php echo esc_attr($notifications_title_color);?>;
}
 li.noticon span {
    color: <?php echo esc_attr($suceess_icon_color);?>;
    border: 3px solid <?php echo esc_attr($suceess_icon_color);?>;
}  
.adminprogress {
    background:<?php echo esc_attr($progress_color);?>;
}    

.shopping-cart{
    left: <?php echo esc_attr($left);?>;
    right: <?php echo esc_attr($right);?>;
    bottom: <?php echo esc_attr($bottom);?>;
    margin: <?php echo esc_attr($postion_range_bottom);?>% <?php echo esc_attr($postion_range);?>%;
        background: <?php echo esc_attr($fcp_cart_bgs);?>;
}
  .cloasebtnwrap {
    <?php echo esc_attr($cloasebtnwrap);?>
}

#mini-cart-count_footer{
     color:<?php echo esc_attr($whmc_cart_bubble_color);
     ?>;
     background:<?php echo esc_attr($fcp_cart_bubble_bg_color);
     ?>;
}

 .whmc-coupon.sidecartright,.whmc-modal.sidecartright{
    <?php echo esc_attr($whmcmodel_r_position);
     ?>
}
 span#topart_count_s {
     color:<?php echo esc_attr($wmhcside_topbtxbclr) ?>;
     background:<?php echo esc_attr($wmhcside_toppartbbclr) ?>;
}
 #pm_menu,.whmc-empty-cart{
     height: <?php echo esc_attr($height) ?>;
     background: <?php echo esc_attr($wmhc_cart_side_top_background) ?> 
}
 .whmc-cart-total-wrap {
     border-top-style:<?php echo esc_attr($wmhc_cartttlborder);
     ?>;
     border-top-color:<?php echo esc_attr($wmhc_cartttlborclr);
     ?>;
}
 .whmc-cart-item-wrap{
     border-bottom: 1px <?php echo esc_attr($wmhc_bottomborder);
     ?> <?php echo esc_attr($wmhc_bottmborderclr);?> 
}
 .cart-item-data-field a{
     color: <?php echo esc_attr($wmhc_cart_side_text_color)?>;
     font-size: <?php echo esc_attr($wmhc_cart_side_text_size);
    ?>px;
}
 .whmc-item-price span{
     color: <?php echo esc_attr($wmhc_cart_side_price_color)?> ;
     font-size: <?php echo esc_attr($wmhc_cart_side_price_size);
    ?>px;
}
 .whmc-cart-subtotal-wrap{
     color: <?php echo esc_attr($wmhc_cart_side_subtotal);
     ?>;
     font-size: <?php echo esc_attr($wmhc_cart_side_subtoral_font);?>px
}
 .taxrates{
     color: <?php echo esc_attr($wmhc_shipping_Color);
     ?>;
     font-size: <?php echo esc_attr($wmhc_cart_shipping_font);
    ?>px
}
 .whmc-cart-discount-wrap span{
     color: <?php echo esc_attr($wmhc_discount_color);
     ?>;
     font-size: <?php echo esc_attr($wmhc_cart_discount_font);
    ?>px
}
 #totalcla span{
     color: <?php echo esc_attr($wmhc_total_color);
     ?>;
     font-size: <?php echo esc_attr($wmhc_cart_total_font);
    ?>px;
}
.whmc_ft-buttons-con a{
     background: <?php echo esc_attr($wmhc_cart_side_button_color);
     ?>;
         border:2px solid <?php echo esc_attr($whmc_cartborderclr);
     ?>;
    border-radius: <?php echo esc_attr($whmc_cartborderrdis);?>px;
}
 .cart_image_iem img {
     border-radius: <?php echo esc_attr($whmc_side_img_brious);
     ?>px;
}
 .whmc_ft-buttons-con a .wmcchevkoutprocess .icons i,.whmc_ft-buttons-con a .wmcchevkoutprocess .wmctitel,.whmc_ft-buttons-con a .wmcchevkoutprocess .amounts span{
     color: <?php echo esc_attr($wmhc_cart_side_button_text_color);
    ?>;
}
.whmcsavevalus, .whmcsavevalus span {
    font-size:  <?php echo esc_attr($whmc_svaevluft);?>px;
    color:  <?php echo esc_attr($whmc_svaecolor);?>;
}

.whmc-body:after, .whmc-carts-content.whmc-processing:after{
     color: <?php echo esc_attr($loadclr);
    ?>;
}
.shippinfrescla,span#shipcion{
    color: <?php echo esc_attr($wmhc_cart_shipping); ?>;
    font-size: <?php echo esc_attr($wmhc_cart_side_shipping_font) ?>px;
}

.cart_menu_li.li_two span.cart_count_header,span.mini-cart-item-number,.cart_menu_li span.cart_count_total,.cart_menu_li span.icon_minus{
    color: <?php echo esc_attr($wmhc_header_text_color);?>;
}
span.cart_count_header,span.cart_count_headers{
    background: <?php echo esc_attr($wmhch_bubbles_color);?>;
    color:  <?php echo esc_attr($wmhch_bubbles_txt);?>;
}
.cart_menu_li.li_two #menuiconid,.cart_menu_li.li_three #menuiconid,.cart_menu_li #menuiconid{
    color:<?php echo esc_attr($wmhc_header_bubble_color);?>;
    font-size:<?php echo esc_attr($fcp_menu_cart_size);?>px;
}
#menuiconid1,#menuiconid2,#menuiconid3,#menuiconid4{
    color:<?php echo esc_attr($wmhc_header_bubble_color);?>;
}
span.cart_count_total .amount{
    font-size: <?php echo  esc_attr($fcp_menu_txt_size);?>px;
}
</style> 

<?php

    } 
    } 
    
}


