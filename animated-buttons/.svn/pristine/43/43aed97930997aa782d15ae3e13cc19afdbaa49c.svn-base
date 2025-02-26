<?php
//Get plugin location
if ( !defined('ABBY_PLUGIN_DIR')) {
    define('ABBY_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}
function ABBY_settings_page_html() {
    //Check if current user have admin access.
    if(!is_admin()) {
        return;
    }
    ?>
        <div class="wrap">
    <h1 style="padding:10px; background:#333;color:#fff">Animated Download buttons with auto download feature</h1>
   <center><h2>Copy any shortcode and paste on your page </h2></center>
    <!--Shortcode 1-->
    <h3> Auto Download Shortcode</h3>
     <input id="foo" type="text_admin" value="[auto-downloader link='http://example.com/wp-content/uploads/2020/04/logo-audi.png' seconds='3' auto='on']">
    <button class="btn-ad" id="btn-ad" data-clipboard-action="copy" data-clipboard-target="#foo">Copy</button>
      <!--Shortcode 2-->
    <h3> Button Style 1 Shortcode</h3>
     <input id="foo2" type="text_admin" value="[auto-downloader link='http://example.com/wp-content/uploads/2020/04/logo-audi.png|pdf|zip' text='Download' style='1']">
    <button class="btn-ad2" id="btn-ad" data-clipboard-action="copy" data-clipboard-target="#foo2">Copy</button>
     <!--Shortcode 3-->
    <h3> Button Style 2 Shortcode</h3>
     <input id="foo3" type="text_admin" value="[auto-downloader link='http://example.com/wp-content/uploads/2020/04/logo-audi.png|pdf|zip' text='Download' style='2']">
    <button class="btn-ad3" id="btn-ad" data-clipboard-action="copy" data-clipboard-target="#foo3">Copy</button>
    <!--Shortcode 4-->
    <h3> Button Style 3 Shortcode</h3>
     <input id="foo4" type="text_admin" value="[auto-downloader link='http://example.com/wp-content/uploads/2020/04/logo-audi.png|pdf|zip' text='Download' style='3']">
    <button class="btn-ad4" id="btn-ad" data-clipboard-action="copy" data-clipboard-target="#foo4">Copy</button>
    <!--Shortcode 5-->
     <h3> Button Style 4 Shortcode</h3>
     <input id="foo5" type="text_admin" value="[auto-downloader link='http://example.com/wp-content/uploads/2020/04/logo-audi.png|pdf|zip' text='Download' style='4']">
    <button class="btn-ad5" id="btn-ad" data-clipboard-action="copy" data-clipboard-target="#foo5">Copy</button>
    <!--Shortcode 6-->
     <h3> Button Style 5 Shortcode</h3>
     <input id="foo6" type="text_admin" value="[auto-downloader link='http://example.com/wp-content/uploads/2020/04/logo-audi.png|pdf|zip' text='Download' style='5']">
    <button class="btn-ad6" id="btn-ad" data-clipboard-action="copy" data-clipboard-target="#foo6">Copy</button>
    <!--Shortcode 7-->
     <h3> Button Custom Backgorund Shortcode</h3>
     <input id="foo7" type="text_admin" value="[auto-downloader link='http://example.com/wp-content/uploads/2020/04/logo-audi.png|pdf|zip' text='Download' style='5' bg='#000']">
    <button class="btn-ad7" id="btn-ad" data-clipboard-action="copy" data-clipboard-target="#foo7">Copy</button>
    <!--Shortcode 7-->
            <form action="options.php" method="post">
                <?php 
                    // output security fields for the registered setting "wpac-settings"
                    settings_fields( 'AD-settings' );

                    // output setting sections and their fields
                    // (sections are registered for "wpac-settings", each field is registered to a specific section)
                    do_settings_sections( 'AD-settings' );
                   
                    // output save settings button
                   // submit_button( 'Save Changes' );
                ?>
            </form>
        </div>
    <?php
}
function ABBY_settings_page_html2() { ?>
 <div class="wrap">
    <h1 style="padding:10px; background:#333;color:#fff">Animated Download buttons with auto download feature</h1>
   <center><h2 class="AD-main-heading-text">Guide to use Animated buttons </h2></center>
   <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/img/animated-buttons.png'; ?>" width="1200px" height="450px">
 <h1> <a href="https://www.youtube.com/embed/FT5h1X7KQeM">CLick Here</a> to view our Animated Buttons video Currently We are 10 animated buttons which help you to get thousands of clicks.</h1>
 
   <b><h2 class="AD-main-heading-text"> How to use it??</h2></b>
   <h5 class="AD-heading-text">How to add buttons to you page??</h5>
   <p class="AD-Paragraph">You just have to copy shortcode from shortcodes page and then paste</p>
   <h5 class="AD-heading-text">How you can add your own url or link</h5>
   <p class="AD-Paragraph">Just replace your own url by link="www.example.com"</p>
   <h5 class="AD-heading-text">How change button background color</h5>
   <p class="AD-Paragraph">Add bg="#color_code or name" in shortcode</p> 
   </div>
<?php

}
function ABBY_register_menu_page() {
    
    add_menu_page( 'Animated Buttons Shortcodes', 'Animated Buttons Shortcodes', 'manage_options', 'abby-settings', 'ABBY_settings_page_html', 'dashicons-admin-generic', 60);
    add_submenu_page('abby-settings', 'Animated Buttons Shortcodes Guides', 'how to use', 'manage_options', 'abby-how-to-use', 'ABBY_settings_page_html2');
}
add_action('admin_menu', 'ABBY_register_menu_page');

?>