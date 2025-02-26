<?php
/**
 * Plugin Name: ARS Affiliate Page Plugin
 * Description: Display Sell My Car and Donate My Car page content for ARS affiliates
 * Version: 2.0.6
 * Author: Jason Moroney, Jarred Suisman
 * Author URI: https://www.arscars.com
 */



add_shortcode( 'sell_car_html', 'ARS_ap_sellCarHTML' );
add_shortcode( 'sell_my_car', 'ARS_ap_sellCarHTML' );
add_shortcode( 'donate_car_html', 'ARS_ap_donateCarHTML' );
add_shortcode( 'donate_my_car', 'ARS_ap_donateCarHTML' );
add_shortcode( 'shift_content', 'ARS_ap_SHIFT_HTML' );

$pluginURL = plugins_url("",__FILE__);
$sellcarCSS = "$pluginURL/sell-car.css";
$donatecarCSS = "$pluginURL/donate-car.css";
$donatecarCSS = "$pluginURL/shift-content.css";
//wp_register_style( "ARS_ap_sell_CSS", $sellcarCSS);
//wp_register_style( "ARS_ap_donate_CSS", $donatecarCSS);
//wp_register_style( "ARS_ap_shift_CSS", $donatecarCSS);

function getStringpart($string,$startStr,$endStr) 
{
    $startpos=strpos($string,$startStr);
    if($endStr == "</div>"){
        //we want the whole div, even if it contains other divs, so get last occurence
        $endpos=strrpos($string,$endStr,$startpos);
    }else{
        $endpos=strpos($string,$endStr,$startpos);        
    }
    $endpos=$endpos-$startpos;
    $string=substr($string,$startpos,$endpos);
    return $string;
}

function ARS_ap_sellCarHTML(){
 wp_enqueue_style('ARS_ap_sell_CSS',plugins_url("",__FILE__)."/sell-car.css");   
    ob_start(); 
    $url = $_SERVER['REQUEST_URI'];

    $urlPath = str_replace(basename($_SERVER['PHP_SELF']),"",$url);
    $myoptions = get_option('ARS_ap_ars_affiliate_plugin_options');
    $h1Text = "<h1 class='ars-sell-my-car'>Sell My Car</h1>";
    $h2Text = "<h2 class='ars-sell-my-car'>Get more cash for your car with photos</h2>";
    $pText = $myoptions['sell_page_text'];
    $ulText = "";
    $howToText = "";
    if(strpos($myoptions['sell_page_text'], '<h1') !== false){
        $h1Text = getStringpart($myoptions['sell_page_text'],"<h1","</h1>")."</h1>";        
        $pText = str_replace($h1Text,"",$pText);
        $h1Text = str_replace("<h1>","<h1 class='ars-sell-my-car'>",$h1Text);
    }
    if(strpos($myoptions['sell_page_text'], '<h2') !== false){
        $h2Text = getStringpart($myoptions['sell_page_text'],"<h2","</h2>")."</h2>";
        $pText = str_replace($h2Text,"",$pText);
        $h2Text = str_replace("<h2>","<h2 class='ars-sell-my-car'>",$h2Text);
    }
    if(strpos($myoptions['sell_page_text'], '<ul') !== false){
        $ulText = "".getStringpart($myoptions['sell_page_text'],"<ul","</ul>")."</ul>";
        $pText = str_replace($ulText,"",$pText);
    }
    if(strpos($myoptions['sell_page_text'], '<div') !== false){
        $howToText = "".getStringpart($myoptions['sell_page_text'],"<div","</div>")."</div>";
    }
    if(strpos($myoptions['sell_page_text'], '<p') !== false){
        $pText = "".getStringpart($myoptions['sell_page_text'],"<p","</p>")."</p>";
    }
    if (session_status() === PHP_SESSION_NONE){session_start();}
    if(isset($_GET['utm_keyword'])){
        $_SESSION['utm_keyword_arg'] = "&utm_keyword=".rawurlencode($_GET['utm_keyword']);
    }else if(!isset($_SESSION['utm_keyword_arg'])){
        $_SESSION['utm_keyword_arg'] = "";
    }

?>          

    <div class="atom-main-content">
        <div class="atom-main-content-inner">
            <div class="atom-inner-content-left">
                <div class="atom-content first">
                    <div class="atom-content-inner">
                        <?php echo $h1Text; ?>
                        <a href="<?php echo esc_url("https://www.youcallwehaul.com/affiliates/" . $myoptions['affiliate_code'] . "/sell-my-car.html?utm_source=" . $myoptions['reference_code'] . "&utm_campaign=" . (!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') .  $_SESSION['utm_keyword_arg']) ?>" target="_blank" class="atom-btn">Get Started</a>
                        <?php echo $pText; ?>
                    </div>
                </div>
                <div class="atom-content mobile-image">
                    <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/car_image.jpeg'; ?>" class="atom-mobile-hero-image" />
                </div>
                <div class="atom-content second">
                    <?php echo $howToText; ?>
                </div>
                <div class="atom-content second">
                    <h2 class="atom-h2">The Benefits</h2>
                    <ul>
                        <li class="atom-li">We buy cars in any condition</li>
                        <li class="atom-li">We pay top dollar</li>
                        <li class="atom-li">We'll buy your junk car, truck or SUV for cash.</li>
                        <li class="atom-li">We'll tow that clunker for free and pay you on the spot!</li>
                    </ul>
                </div>
                <div class="atom-content third">
                    <a href="<?php echo esc_url("https://www.youcallwehaul.com/affiliates/" . $myoptions['affiliate_code'] . "/sell-my-car.html?utm_source=" . $myoptions['reference_code'] . "&utm_campaign=" . (!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') .  $_SESSION['utm_keyword_arg']) ?>" target="_blank" class="atom-btn">Get Started</a>
                </div>
            </div>
            <div class="atom-inner-content-right">
                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/car_image.jpeg'; ?>" class="atom-hero-image" />
            </div>
        </div>
    </div>


<?php
    return ob_get_clean();
}
function ARS_ap_donateCarHTML(){
    wp_enqueue_style('ARS_ap_donate_CSS',plugins_url("",__FILE__)."/donate-car.css");
    ob_start(); 
    $url = $_SERVER['REQUEST_URI'];

    $urlPath = str_replace(basename($_SERVER['PHP_SELF']),"",$url);
    $myoptions = get_option('ARS_ap_ars_affiliate_plugin_options');
    if (session_status() === PHP_SESSION_NONE){session_start();}
    if(isset($_GET['utm_keyword'])){
        $_SESSION['utm_keyword_arg'] = "&utm_keyword=".rawurlencode($_GET['utm_keyword']);
    }else if(!isset($_SESSION['utm_keyword_arg'])){
        $_SESSION['utm_keyword_arg'] = "";
    }
?>
        <h1 class="ars-donate-partners"><strong>DONATE A CAR TO ONE OF OUR CHARITY PARTNERS</strong></h1>
            <p class="ars-company-keywords">
             <?php echo $myoptions['donate_page_text']; ?><br><br>If you have any questions regarding any of these charities you can call 1-877-957-2277. Donate your car, truck, or SUV today. </p>
                
                <div class="ars-row-1">
                    <div class="ars-column1"><a href="<?php echo esc_url("https://www.cardonationwizard.com/habitat-for-humanity/info/car-donation-helps-build-houses.html?utm_source=" . $myoptions['reference_code'] . "&utm_campaign=" . (!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') .  $_SESSION['utm_keyword_arg'] . (isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") ) ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/HFH-Tile.png'; ?>" class="charity-tile"></a></div>
                    <div class="ars-column2"><a href="<?php echo esc_url("https://www.cardonationwizard.com/american-cancer-society/info/car-donation-to-cars-for-a-cure.html?utm_source=" . $myoptions['reference_code'] . "&utm_campaign=" . (!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') .  $_SESSION['utm_keyword_arg'] .  (isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") ) ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/ACS-Tile.png'; ?>" class="charity-tile"></a></div>
                    <div class="ars-column3"><a href="<?php echo esc_url("https://www.cardonationwizard.com/donate-a-car-to-special-olympics/?utm_source=" . $myoptions['reference_code'] . "&utm_campaign=" .(!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') . $_SESSION['utm_keyword_arg'] . (isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") ) ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/special-olympics-tile.png'; ?>" class="charity-tile"></a></div>
                    <div class="ars-column4"><a href="<?php echo esc_url("https://www.cartalk.com/car-donation/?utm_source=" .$myoptions['reference_code'] . "&utm_campaign=" .(!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') . "" .$_SESSION['utm_keyword_arg'] . "" .(isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") ) ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/CarTalk-Tile.png'; ?>" class="charity-tile"></a></div>
                </div>
        
                <div class="ars-row-2">
                    <div class="ars-column1"><a href="<?php echo esc_url("https://www.cardonationwizard.com/us-fund-for-unicef/info/car-donation-save-kids-worldwide.html?utm_source=" .$myoptions['reference_code'] . "&utm_campaign=" .(!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') . "" .$_SESSION['utm_keyword_arg'] . "" .(isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") ) ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/UNICEF-Tile.png'; ?>" class="charity-tile"></a></div>
                    <div class="ars-column2"><a href="<?php echo esc_url("https://www.cardonationwizard.com/donate-a-car-to-petsmart-charities/?utm_source=" . $myoptions['reference_code'] . "&utm_campaign=" . (!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco')  . $_SESSION['utm_keyword_arg']  . (isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") ) ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/petsmart-charities-tile.png'; ?>" class="charity-tile"></a></div>
                    <div class="ars-column3"><a href="<?php echo esc_url("https://www.cardonationwizard.com/feed-the-children/info/car-donation-helps-feed-starving-children.html?utm_source=" .$myoptions['reference_code'] . "&utm_campaign=" .(!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') . "" .$_SESSION['utm_keyword_arg'] . "" .(isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") ) ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/FTC-Tile.png'; ?>" class="charity-tile"></a></div>
                    <div class="ars-column4"><a href="<?php echo esc_url("https://www.cardonationwizard.com/donate-a-car-to-the-als-association/?utm_source=" .$myoptions['reference_code'] . "&utm_campaign=" .(!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') . "" .$_SESSION['utm_keyword_arg'] . "" .(isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") )?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/als-association-tile.png'; ?>" class="charity-tile"></a></div>
                </div>
        
                <div class="ars-row-3">
                    <a href="<?php echo esc_url("https://www.cardonationwizard.com/all-charities/?utm_source=" . $myoptions['reference_code'] . "&utm_campaign=" . (!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'brisco') . $_SESSION['utm_keyword_arg']  . (isset($myoptions['affiliate_code'])?"&affiliate_code=". $myoptions['affiliate_code']:"") ) ?>" target="_blank"><button type="button" class="ars-btn-1">View More</button></a>  
                </div>  
    <?php    
    return ob_get_clean();
}

function ARS_ap_SHIFT_HTML(){
    wp_enqueue_style('ARS_ap_shift_CSS',plugins_url("",__FILE__)."/shift-content.css");
//    wp_enqueue_style('ARS_ap_shift_CSS_fa',plugins_url("",__FILE__)."/fonatawesome.6.4.2.all.min.css");
    ob_start(); 
    $url = $_SERVER['REQUEST_URI'];


    $urlPath = str_replace(basename($_SERVER['PHP_SELF']),"",$url);
    $myoptions = get_option('ARS_ap_ars_affiliate_plugin_options');


    if (session_status() === PHP_SESSION_NONE){session_start();}
    if(isset($_GET['utm_keyword'])){
        $_SESSION['utm_keyword_arg'] = "&utm_keyword=".rawurlencode($_GET['utm_keyword']);
    }else if(!isset($_SESSION['utm_keyword_arg'])){
        $_SESSION['utm_keyword_arg'] = "";
    }
    $shiftContent = "<div class='atom-shift-text'>".$myoptions['shift_page_text'] . "</div>";

?>
    <div class="atom-main-content">
        <div class="atom-main-content-inner">
            <div class="atom-main-content-inner-left">
                <div class="atom-shift-logo-container">
                    <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/Shift_Color_logo.png'; ?>" class="atom-shift-logo" />
                </div>
                <div class="atom-shift-content">
                    <a href="<?php echo esc_url("https://www.cardonationwizard.com/shift-4-tomorrow/donate/donate-a-car-to-help-the-environment.html?utm_source=" . $myoptions['reference_code'] . "&utm_campaign=" . (!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'shift_affil') . $_SESSION['utm_keyword_arg'] . (isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") ) ?>" class="atom-shift-btn" target="_blank">
                        <p class="atom-shift-btn-text">Start</p>
                        <div class="atom-shift-btn-icon"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><style>svg{fill:#ffffff}</style><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></div>
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/Shift_Circle-Light-Blue-Fill.png'; ?>" class="shift-btn-image" />
                    </a>
                    <?php echo $shiftContent; ?>
                    <div class="big-shift-logo-img-mobile-container">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/shift_car_recycle.jpeg'; ?>" class="big-shift-logo-img-mobile" />
                    </div>
                    <a href="<?php echo esc_url("https://www.cardonationwizard.com/shift-4-tomorrow/donate/donate-a-car-to-help-the-environment.html?utm_source=" . $myoptions['reference_code'] . "&utm_campaign=" . (!empty($myoptions['campaign_code']) ? $myoptions['campaign_code']:'shift_affil') . $_SESSION['utm_keyword_arg'] . (isset($myoptions['affiliate_code'])?"&affiliate_code=".$myoptions['affiliate_code']:"") ) ?>" class="atom-shift-btn" target="_blank">
                        <p class="atom-shift-btn-text">Start</p>
                        <div class="atom-shift-btn-icon"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><style>svg{fill:#ffffff}</style><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></div>
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/Shift_Circle-Light-Blue-Fill.png'; ?>" class="shift-btn-image" />
                    </a>
                </div>
            </div>
            <div class="atom-main-content-inner-right">
                <div class="big-shift-logo-container">
                    <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/shift_car_recycle.jpeg'; ?>" class="big-shift-logo-img" />
                </div>
            </div>
        </div>
    </div>
 
    <?php    
    return ob_get_clean();
}

class ARS_ap_MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'ARS_ap_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'ARS_ap_page_init' ) );
    }

    /**
     * Add options page
     */
    public function ARS_ap_add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'ARS Affiliate Settings', 
            'manage_options', 
            'ARS_ap_my-setting-admin', 
            array( $this, 'ARS_ap_create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function ARS_ap_create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'ARS_ap_ars_affiliate_plugin_options' );
        ?>
        <div class="wrap">
            <h1><strong>ARS Affiliate Plugin Settings</strong></h1>
            <h2>Pt.1: Enter the Affiliate and Reference codes provided by ARS below.</h2>
            <h2>Pt.2: Enter provided text below in the Sell Page Text and Donate Page Text and SHiFT Page Text areas</h2><br>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'ARS_ap_my_option_group' );
                do_settings_sections( 'ARS_ap_my-setting-admin' );
                submit_button();
            ?>
            </form>
  <aside>
  </aside>
  <br>
  <h1><strong>Sell My Car Page Instructions</strong></h1>
            <h3>Step 1. Create a new page named (Sell My Car)</h3>
            <h3>Step 2. Copy/Paste the Shortcode [sell_my_car] into the page text module</h3>
            <h3>Step 3: Save/Publish and the page should look like the Sell My Car example below.</h3>
            <h3>Step 4: Edit page meta title and description to reflect your local business (ex. yoast plugin)</h3><br>
  
  <div class="row-1">
  <h2>Sell My Car - [sell_car_html]</h2>
  <div class="column1"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/sell-my-car-desktop-lg.jpg'; ?>" class="sell-screen"></div>
  </div>
  <br>
  <h1><strong>Donate My Car Page Instructions</strong></h1>
            <h3>Step 1. Create a new page named (Donate My Car)</h3>
            <h3>Step 2. Copy/Paste the Shortcode [donate_my_car] into the page text module</h3>
            <h3>Step 3: Save/Publish and the page should look like the Donate My Car example below.</h3><br>
  <div class="row-2">
  <h2>Donate My Car - [donate_car_html]</h2>
  <div class="column2"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/donate-my-car-desktop-lg.jpg'; ?>" class="donate-screen"></div>
  </div>

        </div>
  <br>
  <h1><strong>SHiFT Page Instructions</strong></h1>
            <h3>Step 1. Create a new page named (Recycle My Car)</h3>
            <h3>Step 2. Copy/Paste the Shortcode [shift_content] into the page text module</h3>
            <h3>Step 3: Save/Publish and the page should look like the Recycle My Car example below.</h3><br>
  <div class="row-2">
  <h2>Recycle My Car - [shift_content]</h2>
  <div class="column2"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/recycle-my-car-desktop-lg.jpg'; ?>" class="donate-screen"></div>
  </div>
            <br>
        <?php
    }

    /**
     * Register and add settings
     */
    public function ARS_ap_page_init()
    {        
        register_setting(
            'ARS_ap_my_option_group', // Option group
            'ARS_ap_ars_affiliate_plugin_options', // Option name
            array( $this, 'ARS_ap_sanitize' ) // Sanitize
        );

        add_settings_section(
            'ARS_ap_setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'ARS_ap_print_section_info' ), // Callback
            'ARS_ap_my-setting-admin' // Page
        );  

        add_settings_field(
            'affiliate_code', // ID
            'Affiliate Code', // Title 
            array( $this, 'ARS_ap_affiliate_code_callback' ), // Callback
            'ARS_ap_my-setting-admin', // Page
            'ARS_ap_setting_section_id' // Section           
        );      

        add_settings_field(
            'reference_code', 
            'Reference Code', 
            array( $this, 'ARS_ap_reference_code_callback' ), 
            'ARS_ap_my-setting-admin', 
            'ARS_ap_setting_section_id'
        );   

        add_settings_field(
            'campaign_code', // ID
            'Campaign Code', // Title 
            array( $this, 'ARS_ap_campaign_code_callback' ), // Callback
            'ARS_ap_my-setting-admin', // Page
            'ARS_ap_setting_section_id' // Section           
        );      

        add_settings_field(
            'sell_page_text', 
            'Sell Page Text', 
            array( $this, 'ARS_ap_sell_page_text_callback' ), 
            'ARS_ap_my-setting-admin', 
            'ARS_ap_setting_section_id'
        );      
        add_settings_field(
            'donate_page_text', 
            'Donate Page Text', 
            array( $this, 'ARS_ap_donate_page_text_callback' ), 
            'ARS_ap_my-setting-admin', 
            'ARS_ap_setting_section_id'
        );    
        add_settings_field(
            'shift_page_text', 
            'SHiFT Page Text', 
            array( $this, 'ARS_ap_shift_page_text_callback' ), 
            'ARS_ap_my-setting-admin', 
            'ARS_ap_setting_section_id'
        );    
        add_settings_field(
            'donate_page_url', // ID
            'Donate Page URL', // Title 
            array( $this, 'ARS_ap_donate_page_url_callback' ), // Callback
            'ARS_ap_my-setting-admin', // Page
            'ARS_ap_setting_section_id' // Section           
        );      

    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function ARS_ap_sanitize( $input )
    {
        $allowed_html = wp_kses_allowed_html( 'post' );
        $allowed_html['div'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true,
                'style' => true
            );
        $allowed_html['span'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['image'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['a'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true,
                'href' => array(),
                'target' => array()
            );
        $allowed_html['ul'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['ol'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['li'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['h1'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['h2'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['h3'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['br'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['p'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true
            );
        $allowed_html['img'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true,
                'src' => array(),
                'title' => array()
            );
        $allowed_html['iframe'] = array(
                'itemprop' => true,
                'itemscope' => true,
                'itemtype' => true,
                'width' => array(),
                'height' => array(),
                'src' => array(),
                'title' => array(),
                'frameborder' => array(),
                'allow' => array(),
                'allowfullscreen' => array()
            );
  
        $new_input = array();
        if( isset( $input['affiliate_code'] ) )
            $new_input['affiliate_code'] = sanitize_text_field( $input['affiliate_code'] );

        if( isset( $input['reference_code'] ) )
            $new_input['reference_code'] = sanitize_text_field( $input['reference_code'] );

        if( isset( $input['campaign_code'] ) )
            $new_input['campaign_code'] = sanitize_text_field( $input['campaign_code'] );

        if( isset( $input['sell_page_text'] ) )
            //$new_input['sell_page_text'] =  wp_kses_post($input['sell_page_text']);
            $new_input['sell_page_text'] =  wp_kses( $input['sell_page_text'], $allowed_html );

        if( isset( $input['donate_page_text'] ) )
            $new_input['donate_page_text'] = wp_kses( $input['donate_page_text'], $allowed_html );

        if( isset( $input['shift_page_text'] ) )
            $new_input['shift_page_text'] = wp_kses( $input['shift_page_text'], $allowed_html );

        if( isset( $input['donate_page_url'] ) )
            $new_input['donate_page_url'] = sanitize_text_field($input['donate_page_url']);

        return $new_input;
    }
    /** 
     * Print the Section text
     */
    public function ARS_ap_print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function ARS_ap_affiliate_code_callback()
    {
        printf(
            '<input type="text" id="affiliate_code" name="ARS_ap_ars_affiliate_plugin_options[affiliate_code]" value="%s" />',
            isset( $this->options['affiliate_code'] ) ? esc_attr( $this->options['affiliate_code']) : ''
        );
    }
    /** 
     * Get the settings option array and print one of its values
     */
    public function ARS_ap_donate_page_url_callback()
    {
        printf(
            '<input type="text" id="donate_page_url" name="ARS_ap_ars_affiliate_plugin_options[donate_page_url]" value="%s" />',
            isset( $this->options['donate_page_url'] ) ? esc_attr( $this->options['donate_page_url']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function ARS_ap_reference_code_callback()
    {
        printf(
            '<input type="text" id="reference_code" name="ARS_ap_ars_affiliate_plugin_options[reference_code]" value="%s" />',
            isset( $this->options['reference_code'] ) ? esc_attr( $this->options['reference_code']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function ARS_ap_campaign_code_callback()
    {
        printf(
            '<input type="text" id="campaign_code" name="ARS_ap_ars_affiliate_plugin_options[campaign_code]" value="%s" />',
            isset( $this->options['campaign_code'] ) ? esc_attr( $this->options['campaign_code']) : ''
        );
    }

    public function ARS_ap_sell_page_text_callback()
    {
        printf(
            '<textarea name="ARS_ap_ars_affiliate_plugin_options[sell_page_text]" id="sell_page_text" cols="40" rows="5" >%s</textarea>',
            isset( $this->options['sell_page_text'] ) ? esc_attr( $this->options['sell_page_text']) : ''
        );
    }

    public function ARS_ap_donate_page_text_callback()
    {
        printf(
            '<textarea name="ARS_ap_ars_affiliate_plugin_options[donate_page_text]" id="donate_page_text" cols="40" rows="5" >%s</textarea>',
            isset( $this->options['donate_page_text'] ) ? esc_attr( $this->options['donate_page_text']) : ''
        );
    }
    public function ARS_ap_shift_page_text_callback()
    {
        printf(
            '<textarea name="ARS_ap_ars_affiliate_plugin_options[shift_page_text]" id="shift_page_text" cols="40" rows="5" >%s</textarea>',
            isset( $this->options['shift_page_text'] ) ? esc_attr( $this->options['shift_page_text']) : ''
        );
    }

}

if( is_admin() )
    $ARS_ap_my_settings_page = new ARS_ap_MySettingsPage();




?>
