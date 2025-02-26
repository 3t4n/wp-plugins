<?php
/*
Plugin Name: Memeni Community Widget
Plugin URI:  http://memeni.com/blog/embed-community-widget/
Description: After you have launched your community, it is essential to make your community easily accessible for your audience. Along with your mobile app, Memeni gives you the ability to add a widget to your website that provides 1-click access to your community. Adding the community widget will help make your website more social and increase time spent on your site!
Author: Memeni
Author URI:  http://memeni.com/landing/wordpress-plugin/?utm_source=wordpress&utm_medium=link&utm_campaign=plugin
Version: 0.9
*/


/*Adding a static block on admin panel*/
//Memeni
function mmni_memeni_settings_page(){
    ?>
        <div class="wrap">
        <h1>Memeni Community Widget</h1>
        <hr>
        <em>After you have launched your community, it is essential to make your community easily accessible for your<br>audience. Along with your mobile app, Memeni gives you the ability to add a widget to your website that provides<br>1-click access to your community. Adding the community widget will help make your website more social and<br>increase time spent on your site!</em>
        <form method="post" action="options.php">
            <?php
                settings_fields("section");
                do_settings_sections("theme-options");      
                submit_button(); 
            ?>          
        </form>
        </div>
    <?php
}
function mmni_memeni_display__memeni_cid_element()
{
    ?>
        <input type="text" name="_memeni_cid" id="_memeni_cid" class="regular-text" value="<?php echo get_option('_memeni_cid'); ?>" />
    <?php
}
/*function mmni_memeni_display__memeni_color_element()
{
    ?>
        <!-- <input type="text" name="_memeni_color" id="_memeni_color" class="color-field" value="" /> -->
        <style type="text/css">
            .mmni-color-box {float: left; width: 20px; height: 20px; margin: 5px; border: 3px solid;}
            .mmni-color-box input, .mmni-color-box span.dashicons {display: none;}
            .mmni-selected {display: block;}
            .mmni-black {background-color: #2d2d2d; border-color: #010101;}
            .mmni-green {background-color: #81d40b; border-color: #59a606;}
            .mmni-blue {background-color: #0b5984; border-color: #054061;}
            .mmni-purple {background-color: #7078D6; border-color: #5761D4;}
            .mmni-darkgreen {background-color: #6E9E37; border-color: #54782A;}
            .mmni-orange {background-color: #D57526; border-color: #A35A1D;}
            .mmni-pink {background-color: #CC4165; border-color: #B8143F;}
            .mmni-yellow {background-color: #D5AF53; border-color: #C28E11;}
        </style>
        <script type="text/javascript">
            function mmni_color_active(param) {
                document.getElementById('mmni-black').style.display = 'none';
                document.getElementById('mmni-green').style.display = 'none';
                document.getElementById('mmni-blue').style.display = 'none';
                document.getElementById('mmni-purple').style.display = 'none';
                document.getElementById('mmni-darkgreen').style.display = 'none';
                document.getElementById('mmni-orange').style.display = 'none';
                document.getElementById('mmni-pink').style.display = 'none';
                document.getElementById('mmni-yellow').style.display = 'none';
                document.getElementById(param).style.display = 'block';
            }
        </script>

        <label class="mmni-color-box mmni-black" onclick="mmni_color_active('mmni-black')">
            <span id="mmni-black" class="dashicons dashicons-yes" style="color: #fff; <?php if(empty(get_option('_memeni_color')) || get_option('_memeni_color') == 'black') echo 'display: block;' ?>"></span>
            <input type="radio" name="_memeni_color" <?php if(empty(get_option('_memeni_color')) || get_option('_memeni_color') == 'black') echo 'checked' ?> value="black">
        </label>
        <label class="mmni-color-box mmni-green" onclick="mmni_color_active('mmni-green')">
            <span id="mmni-green" class="dashicons dashicons-yes" style="color: #fff; <?php if(get_option('_memeni_color') == 'green') echo 'display: block;' ?>"></span>
            <input type="radio" name="_memeni_color" <?php if(get_option('_memeni_color') == 'green') echo 'checked' ?> value="green">
        </label>
        <label class="mmni-color-box mmni-blue" onclick="mmni_color_active('mmni-blue')">
            <span id="mmni-blue" class="dashicons dashicons-yes" style="color: #fff; <?php if(get_option('_memeni_color') == 'blue') echo 'display: block;' ?>"></span>
            <input type="radio" name="_memeni_color" <?php if(get_option('_memeni_color') == 'blue') echo 'checked' ?> value="blue">
        </label>
        <label class="mmni-color-box mmni-purple" onclick="mmni_color_active('mmni-purple')">
            <span id="mmni-purple" class="dashicons dashicons-yes" style="color: #fff; <?php if(get_option('_memeni_color') == 'purple') echo 'display: block;' ?>"></span>
            <input type="radio" name="_memeni_color" <?php if(get_option('_memeni_color') == 'purple') echo 'checked' ?> value="purple">
        </label>
        <label class="mmni-color-box mmni-darkgreen" onclick="mmni_color_active('mmni-darkgreen')">
            <span id="mmni-darkgreen" class="dashicons dashicons-yes" style="color: #fff; <?php if(get_option('_memeni_color') == 'darkgreen') echo 'display: block;' ?>"></span>
            <input type="radio" name="_memeni_color" <?php if(get_option('_memeni_color') == 'darkgreen') echo 'checked' ?> value="darkgreen">
        </label>
        <label class="mmni-color-box mmni-orange" onclick="mmni_color_active('mmni-orange')">
            <span id="mmni-orange" class="dashicons dashicons-yes" style="color: #fff; <?php if(get_option('_memeni_color') == 'orange') echo 'display: block;' ?>"></span>
            <input type="radio" name="_memeni_color" <?php if(get_option('_memeni_color') == 'orange') echo 'checked' ?> value="orange">
        </label>
        <label class="mmni-color-box mmni-pink" onclick="mmni_color_active('mmni-pink')">
            <span id="mmni-pink" class="dashicons dashicons-yes" style="color: #fff; <?php if(get_option('_memeni_color') == 'pink') echo 'display: block;' ?>"></span>
            <input type="radio" name="_memeni_color" <?php if(get_option('_memeni_color') == 'pink') echo 'checked' ?> value="pink">
        </label>
        <label class="mmni-color-box mmni-yellow" onclick="mmni_color_active('mmni-yellow')">
            <span id="mmni-yellow" class="dashicons dashicons-yes" style="color: #fff; <?php if(get_option('_memeni_color') == 'yellow') echo 'display: block;' ?>"></span>
            <input type="radio" name="_memeni_color" <?php if(get_option('_memeni_color') == 'yellow') echo 'checked' ?> value="yellow">
        </label>
    <?php
}*/
function mmni_memeni_display__memeni_show_hide_element()
{
    ?>
        <select name="_memeni_show_hide" id="_memeni_show_hide" class="regular-text">
            <option value="hide">Disabled</option>
            <option <?php if(get_option('_memeni_show_hide') != 'hide') echo 'selected'; ?> value="show">Enabled</option>

        </select>
    <?php
}

function mmni_memeni_display_theme_panel_fields()
{
    add_settings_section("section", "Community Widget Settings", null, "theme-options");
    
    add_settings_field("_memeni_show_hide", "Widget Enabled:", "mmni_memeni_display__memeni_show_hide_element", "theme-options", "section");
    add_settings_field("_memeni_cid", "Widget ID:", "mmni_memeni_display__memeni_cid_element", "theme-options", "section");
    //add_settings_field("_memeni_color", "Widget Color:", "mmni_memeni_display__memeni_color_element", "theme-options", "section");

    register_setting("section", "_memeni_cid");
    //register_setting("section", "_memeni_color");
    register_setting("section", "_memeni_show_hide");
}
add_action("admin_init", "mmni_memeni_display_theme_panel_fields");

function mmni_memeni_add_theme_menu_item()
{
    add_menu_page("Memeni", "Memeni", "manage_options", "mmni-memeni", "mmni_memeni_settings_page", null, 99);
}
add_action("admin_menu", "mmni_memeni_add_theme_menu_item");

//Add to footer
function mmni_display_embed_code() {

    /*$_memeni_color = get_option('_memeni_color');
    switch ($_memeni_color) {
        case 'black':
            $background = '#2d2d2d';
            $border = '#010101';
            break;
        case 'green':
            $background = '#81d40b';
            $border = '#59a606';
            break;
        case 'blue':
            $background = '#0b5984';
            $border = '#054061';
            break;
        case 'purple':
            $background = '#7078D6';
            $border = '#5761D4';
            break;
        case 'darkgreen':
            $background = '#6E9E37';
            $border = '#54782A';
            break;
        case 'orange':
            $background = '#D57526';
            $border = '#A35A1D';
            break;
        case 'pink':
            $background = '#CC4165';
            $border = '#B8143F';
            break;
        case 'yellow':
            $background = '#D5AF53';
            $border = '#C28E11';
            break;
        
        default:
            $background = '#2d2d2d';
            $border = '#010101';
            break;
    }
    ?>
        <!-- Begin Memeni Embed Code -->
        <style type="text/css">
        .memeni-widget .widget-wrapper .big-circle-container .flipper .big-circle {background-color: <?php echo $background; ?> !important; border-color: <?php echo $border; ?> !important;}
        .memeni-widget .widget-wrapper .big-circle-container .flipper .big-circle .bottom-section {background-color: <?php echo $background; ?> !important;}
        .memeni-widget .widget-wrapper .big-circle-container .flipper .big-circle.back .bottom-section {background-color: <?php echo $border; ?> !important;}
        .memeni-widget .widget-wrapper .small-circle {background-color: <?php echo $background; ?> !important; border-color: <?php echo $border; ?> !important;}
        </style>
    <?php */ ?>
        <script type="text/javascript" id="memeniwjs">
            document.__memeni = document.__memeni || [];
            document.__memeni['cid'] = '<?php echo get_option('_memeni_cid')?>';
            (function() {
                function ldmmn() {
                    if (typeof window.__mmnld != "undefined") return;
                    window.__mmnld = 1;
                    var mmnscr = document.createElement('script');
                    mmnscr.type = 'text/javascript';
                    mmnscr.async = true;
                    mmnscr.id = 'memeniwjsasync';
                    mmnscr.src = 'https://dg2a2lguw3o4w.cloudfront.net/memeniw.min.js';
                    document.body.appendChild(mmnscr);
                };
                setTimeout(ldmmn, 500);
                document.readyState != 'complete' ? (window.attachEvent ? window.attachEvent('onload', ldmmn) : window.addEventListener('load', ldmmn, false)) : ldmmn();
            })();
        </script>
        <!-- End Memeni Embed Code -->
    <?php
}
function mmni_memeni_add_to_footer() {
    if(!empty(get_option('_memeni_cid')) && get_option('_memeni_show_hide') != 'hide')
        mmni_display_embed_code();
}
add_action( 'wp_footer', 'mmni_memeni_add_to_footer', 100 );
?>