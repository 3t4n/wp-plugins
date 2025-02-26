<?php
/*
Plugin Name: Blindfriendly Admin
Plugin URI: http://www.petroit.cz
Description: WordPress Admin Plugin zlepšující přístupnost administrátorského rozhraní WordPressu. Stačí nahrát a aktivovat.
Version: 1.0.2
Author: Petr Mačejovský
Author URI: http://www.petroit.cz
*/

/*
//Specific User Data if needed
if(!function_exists('wp_get_current_user')) {
    include(ABSPATH . "wp-includes/pluggable.php"); 
}
$current_user = wp_get_current_user();
    echo 'User ID: ' . $current_user->ID . '<br />';
*/

defined('ABSPATH') or die("No script kiddies please!");

//Internationalization
load_plugin_textdomain('Blindfriendly Admin', false, basename( dirname( __FILE__ ) ) . '/languages' );

$css = get_option('bastgs_settings', 'default');
//var_dump($css[bastgs_select_field_11]);
if(isset($css['bastgs_select_field_11']) && ($css['bastgs_select_field_11']==1 || $css['bastgs_select_field_11']==null)) {
function ba_theme_style() {
    wp_enqueue_style('my-admin-theme0', plugins_url('0_main.css', __FILE__));
    wp_enqueue_style('my-admin-theme1', plugins_url('1_posts.css', __FILE__));
    wp_enqueue_style('my-admin-theme2', plugins_url('2_media.css', __FILE__));
    wp_enqueue_style('my-admin-theme3', plugins_url('3_pages.css', __FILE__));
    wp_enqueue_style('my-admin-theme4', plugins_url('4_comments.css', __FILE__));
    wp_enqueue_style('my-admin-theme5', plugins_url('5_appearance.css', __FILE__));
    wp_enqueue_style('my-admin-theme6', plugins_url('6_plugins.css', __FILE__));
    wp_enqueue_style('my-admin-theme7', plugins_url('7_users.css', __FILE__));
    wp_enqueue_style('my-admin-theme8', plugins_url('8_tools.css', __FILE__));
    wp_enqueue_style('my-admin-theme9', plugins_url('9_settings.css', __FILE__));
    wp_enqueue_style('my-admin-theme10', plugins_url('10_help.css', __FILE__));
    wp_enqueue_style('my-admin-theme11', plugins_url('11_last_loaded.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'ba_theme_style');
add_action('login_enqueue_scripts', 'ba_theme_style');
}


//Removing unnecessary widgets from dashboard
function ba_remove_dashboard_widgets() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
// use 'dashboard-network' as the second parameter to remove widgets from a network dashboard. 
}
add_action( 'wp_dashboard_setup', 'ba_remove_dashboard_widgets' );


/* Sound after click */
$options = get_option( 'bastgs_settings', 'default' );
if(isset($options['bastgs_select_field_0']) && ($options['bastgs_select_field_0']==1 || $options['bastgs_select_field_0']==null)) {
function ba_admin_scripts(){
    wp_register_script('ba_main_js', plugins_url('js/load-audio.js', __FILE__), false, null, false);
    wp_enqueue_script('ba_main_js');
}
add_action('admin_enqueue_scripts', 'ba_admin_scripts');

}


/* Adding error when not filling anything when creating a new user */
$lang=get_bloginfo("language");
if ($lang == "cs-CZ") {
    function ba_admin_scripts2(){
        wp_register_script('ba_main_js2', plugins_url('js/new-user-form-error-when-empty-cz.js', __FILE__), array( 'jquery' ),null,false);
        wp_enqueue_script('ba_main_js2');
    }
}
else {
    function ba_admin_scripts2(){
        wp_register_script('ba_main_js2', plugins_url('js/new-user-form-error-when-empty-eng.js', __FILE__), array( 'jquery' ),null,false);
        wp_enqueue_script('ba_main_js2');
    }
}
add_action('load-'.'user-new.php', 'ba_admin_scripts2');


/* Renaming Tables */
$lang=get_bloginfo("language");
if ($lang == "cs-CZ") {
    function ba_admin_scripts3(){
        wp_register_script('ba_main_js3', plugins_url('js/table-names-cz.js', __FILE__), array( 'jquery' ),null,false);
        wp_enqueue_script('ba_main_js3');
    }
}
else {
    function ba_admin_scripts3(){
        wp_register_script('ba_main_js3', plugins_url('js/table-names-en.js', __FILE__), array( 'jquery' ),null,false);
        wp_enqueue_script('ba_main_js3');
    }
}
add_action('load-'.'edit-tags.php', 'ba_admin_scripts3');


/* Renaming Title of Media Button in Czech Language */
if ($lang == "cs-CZ") {
    function ba_admin_scripts4(){
        wp_register_script('ba_main_js4', plugins_url('js/medialni-soubory-cz.js', __FILE__), array( 'jquery' ),null,false);
        wp_enqueue_script('ba_main_js4');
    }
add_action('load-'.'post-new.php', 'ba_admin_scripts4');
}


//Code to Remove Specific Menu if Set in Settings
function ba_remove_menus(){
    $remove_menu = get_option('bastgs_settings', 'default');

    if(isset($remove_menu[bastgs_select_field_1]) && $remove_menu[bastgs_select_field_1]==2) {
        remove_menu_page( 'index.php' );                  //Dashboard
    }
    
    if(isset($remove_menu[bastgs_select_field_2]) && $remove_menu[bastgs_select_field_2]==2) {
        remove_menu_page( 'edit.php' );                   //Posts
    }
    
    if(isset($remove_menu[bastgs_select_field_3]) && $remove_menu[bastgs_select_field_3]==2) {
        remove_menu_page( 'upload.php' );                 //Media
    }
    
    if(isset($remove_menu[bastgs_select_field_4]) && $remove_menu[bastgs_select_field_4]==2) {
        remove_menu_page( 'edit.php?post_type=page' );    //Pages
    }
    
    if(isset($remove_menu[bastgs_select_field_5]) && $remove_menu[bastgs_select_field_5]==2) {
        remove_menu_page( 'edit-comments.php' );          //Comments
    }
    
    if(isset($remove_menu[bastgs_select_field_6]) && $remove_menu[bastgs_select_field_6]==2) {
        remove_menu_page( 'themes.php' );                 //Appearance
    }
    
    if(isset($remove_menu[bastgs_select_field_7]) && $remove_menu[bastgs_select_field_7]==2) {
        remove_menu_page( 'plugins.php' );                //Plugins
    }
    
    if(isset($remove_menu[bastgs_select_field_8]) && $remove_menu[bastgs_select_field_8]==2) {
        remove_menu_page( 'users.php' );                  //Users
    }
    
    if(isset($remove_menu[bastgs_select_field_9]) && $remove_menu[bastgs_select_field_9]==2) {
        remove_menu_page( 'tools.php' );                  //Tools
    }
}
add_action( 'admin_menu', 'ba_remove_menus' );


//Loading jQuery
add_action( 'wp_enqueue_script', 'ba_load_jquery' );
function ba_load_jquery() {
    wp_enqueue_script( 'jquery' );
}


/* Adding a plugin settings menu */
add_action( 'admin_menu', 'bastgs_add_admin_menu' );
add_action( 'admin_init', 'bastgs_settings_init' );
function bastgs_add_admin_menu(  ) { 
	add_options_page( 'Blindfriendly Admin', 'Blindfriendly Admin', 'manage_options', 'blindfriendly_admin_settings', 'blindfriendly_admin_options_page' );
}

function bastgs_settings_exist(  ) { 
    if( false == get_option( 'my_admin_theme_2_settings' ) ) { 
        add_option( 'my_admin_theme_2_settings' );
	}
}

function bastgs_settings_init(  ) { 

    register_setting( 'pluginPage', 'bastgs_settings' );

    add_settings_section(
      'bastgs_pluginPage_section', 
      __( 'Nastavení pluginu pro zvýšení přístupnosti administrátorského rozhraní WordPressu', 'blindfriendly-admin' ), 
      'bastgs_settings_section_callback', 
      'pluginPage'
    );
    
      add_settings_field( 
      'bastgs_select_field_0', 
      __( 'Zvuk po kliknutí', 'blindfriendly-admin' ), 
      'bastgs_select_field_0_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_11', 
      __( 'Přístupný vzhled', 'blindfriendly-admin' ), 
      'bastgs_select_field_11_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_1', 
      __( '<hr id="plugin_settings1">Zobrazit Nástěnku', 'blindfriendly-admin' ), 
      'bastgs_select_field_1_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_2', 
      __( 'Zobrazit Příspěvky', 'blindfriendly-admin' ), 
      'bastgs_select_field_2_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_3', 
      __( 'Zobrazit Média', 'blindfriendly-admin' ), 
      'bastgs_select_field_3_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_4', 
      __( 'Zobrazit Stránky', 'blindfriendly-admin' ), 
      'bastgs_select_field_4_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_5', 
      __( 'Zobrazit Komentáře', 'blindfriendly-admin' ), 
      'bastgs_select_field_5_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_6', 
      __( 'Zobrazit Vzhled', 'blindfriendly-admin' ), 
      'bastgs_select_field_6_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_7', 
      __( 'Zobrazit Pluginy', 'blindfriendly-admin' ), 
      'bastgs_select_field_7_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_8', 
      __( 'Zobrazit Uživatele', 'blindfriendly-admin' ), 
      'bastgs_select_field_8_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_9', 
      __( 'Zobrazit Nástroje', 'blindfriendly-admin' ), 
      'bastgs_select_field_9_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
    
    add_settings_field( 
      'bastgs_select_field_10', 
      __( 'Zobrazit Průvodce', 'blindfriendly-admin' ), 
      'bastgs_select_field_10_render', 
      'pluginPage', 
      'bastgs_pluginPage_section' 
    );
}

function bastgs_select_field_0_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_0]' id='bastgs_settings_0'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_0']) && $options['bastgs_select_field_0']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2'  <?php if(isset($options['bastgs_select_field_0']) && $options['bastgs_select_field_0']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
    <?php
    echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování zvukových oznámení nebo "Ne" pro jejich zrušení.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_11_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_11]' id='bastgs_settings_11'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_11']) && $options['bastgs_select_field_11']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_11']) && $options['bastgs_select_field_11']==2) { echo 'selected'; } ?>>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování přístupného vzhledu nebo "Ne" pro přepnutí na původní vzhled.', 'blindfriendly-admin').'</p>';
}



function bastgs_select_field_1_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <hr id="plugin_settings2">
        <select name='bastgs_settings[bastgs_select_field_1]' id='bastgs_settings_1'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_1']) && $options['bastgs_select_field_1']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_1']) && $options['bastgs_select_field_1']==2) { echo 'selected'; } ?>>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Příspěvky nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_2_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_2]' id='bastgs_settings_2'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_2']) && $options['bastgs_select_field_2']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_2']) && $options['bastgs_select_field_2']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Příspěvky nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_3_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_3]' id='bastgs_settings_3'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_3']) && $options['bastgs_select_field_3']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_3']) && $options['bastgs_select_field_3']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Média nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_4_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_4]' id='bastgs_settings_4'>
            <option label='Ano' value='1' <<?php if(isset($options['bastgs_select_field_4']) && $options['bastgs_select_field_4']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_4']) && $options['bastgs_select_field_4']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Stránky nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_5_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_5]' id='bastgs_settings_5'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_5']) && $options['bastgs_select_field_5']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_5']) && $options['bastgs_select_field_5']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Komentáře nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_6_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_6]' id='bastgs_settings_6'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_6']) && $options['bastgs_select_field_6']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_6']) && $options['bastgs_select_field_6']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Vzhled nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_7_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_7]' id='bastgs_settings_7'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_7']) && $options['bastgs_select_field_7']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_7']) && $options['bastgs_select_field_7']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Pluginy nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_8_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_8]' id='bastgs_settings_8'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_8']) && $options['bastgs_select_field_8']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_8']) && $options['bastgs_select_field_8']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Uživatelé nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_9_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>
        <select name='bastgs_settings[bastgs_select_field_9]' id='bastgs_settings_9'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_9']) && $options['bastgs_select_field_9']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_9']) && $options['bastgs_select_field_9']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Nástroje nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_select_field_10_render(  ) { 

    $options = get_option( 'bastgs_settings', 'default' );
    ?>	
        <select name='bastgs_settings[bastgs_select_field_10]' id='bastgs_settings_10'>
            <option label='Ano' value='1' <?php if(isset($options['bastgs_select_field_10']) && $options['bastgs_select_field_10']==1) { echo 'selected'; } ?>>Ano</option>
            <option label='Ne' value='2' <?php if(isset($options['bastgs_select_field_10']) && $options['bastgs_select_field_10']==2) { echo 'selected'; } ?>>Ne</option>
        </select>
  <?php
  echo '<br /><p class="plugin_settings">'.__('Vyberte "Ano" pro zachování panelu Průvodce nebo "Ne" pro jeho skrytí.', 'blindfriendly-admin').'</p>';
}

function bastgs_settings_section_callback(  ) { 
//	echo __( 'Additional text to the top of the settings page if needed', 'blindfriendly-admin' );
}

function blindfriendly_admin_options_page(  ) { 
    ?>
    <form action='options.php' method='post'>
      
        <h2>Nastavení Přístupného Pluginu</h2>
      
        <?php
        settings_fields( 'pluginPage' );
        do_settings_sections( 'pluginPage' );
        submit_button();
        ?>
      
    </form>
    <?php
 }

/* Adding Contextual Help Tab */
function ba_create_text_add_help_tab_post () {
    $screen = get_current_screen();

    // Add my_help_tab if current screen is screen related to writing a post/page
    $screen->add_help_tab( array(
        'id'	=> 'my_help_tab_shortcuts',
        'title'	=> __('Klávesové zkratky', 'blindfriendly-admin'),
        'content'	=> '<p id="keyboard_shortcuts_help">' . __( '<strong><h3>Klávesové zkratky v editoru</h3></strong><br />
                                   <strong>CTRL+</strong><br />
                                   c - Kopírovat<br />
                                   v - Vložit<br />
                                   a - Označit vše<br />
                                   x - Vyjmout<br />
                                   z - Vrátit zpět<br />
                                   y - Odvolat<br />
                                   b - Tučný text<br />
                                   i - Kurzíva<br />
                                   u - Podtrhnutí<br />
                                   1 - Nadpis h1<br />
                                   2 - Nadpis h2<br />
                                   3 - Nadpis h3<br />
                                   4 - Nadpis h4<br />
                                   5 - Nadpis h5<br />
                                   6 - Nadpis h6<br />
                                   9 - Adresa<br />
                                   k - Vkládací/Editovací odkaz<br /><br />
                                   
                                   <strong>ALT+SHIFT+</strong><br />
                                   n - Zkontrolovat chyby<br />
                                   l - Zarovnat vlevo<br />
                                   r - Zarovnat vpravo<br />
                                   j - Vyrovnat<br />
                                   c - Zarovnat na střed<br />
                                   d - Přeškrtnout<br />
                                   u - Vytvořit seznam<br />
                                   a - Vložit odkaz<br />
                                   o - Číselný seznam<br />
                                   s - Odebrat odkaz<br />
                                   q - Citovat<br />
                                   m - Vložit obrázek<br />
                                   w - Mód pro psaní přes celou obrazovku<br />
                                   t - Vložení tagu pro \'Více\'<br />
                                   p - Vložení tagu pro ukončení stránky<br />
                                   h - Nápověda<br />
                                   x - Přidá/Odebere kódový tag<br />                   
                                   ', 'blindfriendly-admin' ) . '</p>',
    ) );
}
  // Adds my_help_tab when my_admin_page loads
    add_action('load-'.'edit.php', 'ba_create_text_add_help_tab_post');
    add_action('load-'.'post-new.php', 'ba_create_text_add_help_tab_post');
 
 
function ba_create_text_add_help_tab_new_page() {
    $screen = get_current_screen();

    // Add my_help_tab if current screen is screen related to writing a post/page
    $screen->add_help_tab( array(
        'id'	=> 'my_help_tab_new_page',
        'title'	=> __('Upozornění'),
        'content'	=> '<p id="new_page">' . __( 'Po vytvoření nové stránky je třeba ji zařadit do konkrétního menu, než
        se zobrazí na úvodní stránce. Vytvoření menu a zařazení do něj se provádí v sekci Vzhled => Menu.', 'blindfriendly-admin' ) . '</p>',
    ) );
}
  // Adds my_help_tab when my_admin_page loads
    add_action('load-'.'post-new.php', 'ba_create_text_add_help_tab_new_page');
 
     
function ba_create_text_add_help_tab_media () {
    $screen = get_current_screen();

    // Add my_help_tab if current screen is related to file upload
    $screen->add_help_tab( array(
        'id'	=> 'my_help_tab_shortcuts',
        'title'	=> __('Užitečné informace', 'blindfriendly-admin'),
        'content'	=> '<p id="media_upload_help">' . __( 'Prosím dbejte na fakt, že nahrávání souboru nelze přerušit. Je-li třeba, soubor lze smazat, můžete tak učinit po dokončení jeho nahrávání.<br /><br />
        
                                  Pokud se rozhodnete nahrávat soubory větší, než je maximální povolená kapacita, kterou umožňuje Váš hosting a využijete pro to FTP, tyto soubory neuvidíte přes integrovaného průzkumníka WordPressu.
                                  Pamatujte si tedy jejich absolutní cestu, aby jste na ně následně mohli odkázat ve svých příspěvcích nebo nainstalujte plugin s jiným správcem médií, který tyto soubory vidí.<br /><br />
                                  
                                  Rovněž Vám pomůže, pokud budete mít přehledně pojmenované soubory, které nahráváte. Pomocí jejich názvů totiž WordPress vytváří jejich popisky a vy se tak budete moci zorientovat o jaký soubor se jedná.', 'blindfriendly-admin' ) . '</p>',
    ) );
}
  // Adds my_help_tab when my_admin_page loads
    add_action('load-'.'upload.php', 'ba_create_text_add_help_tab_media');
    add_action('load-'.'media-new.php', 'ba_create_text_add_help_tab_media');
    
    
function ba_create_text_add_help_tab_press_this () {
    $screen = get_current_screen();

    // Add my_help_tab if current screen is related to Press This
    $screen->add_help_tab( array(
        'id'	=> 'my_help_tab_press_this',
        'title'	=> __('Užitečné informace'),
        'content'	=> '<p id="press_this_help">' . __( 'Pozor! Nástroj "Kliknout a publikovat" resp. "Press This" je nástroj, který je pro nevidomé zcela nepřístupný.<br />
                                                       Jeho princip spočívá v tom, že označený text nebo obrázek uživatel myší přetáhne na záložku "Kliknout a publikovat".<br />
                                                       Tento nástroj však má své uplatnění pro osoby se slabším zrakovým handicapem.', 'blindfriendly-admin' ) . '</p>',
    ) );
}
    // Adds my_help_tab when my_admin_page loads
    add_action('load-'.'tools.php', 'ba_create_text_add_help_tab_press_this');
    
    
/* Adding Menu Item with Help */
$remove_menu = get_option('bastgs_settings[bastgs_select_field_10]', '1');
if(isset($remove_menu) && $remove_menu==1) {
    add_action( 'admin_menu', 'my_plugin_help' );
          function my_plugin_help() {
              add_menu_page( 'Průvodce', 'Průvodce', 'manage_options', 'guide', 'ba_admin_guide', plugins_url( '/pictures/help-icon.png', __FILE__ ));
          }
}    
 

function ba_admin_guide() {
    echo '<div class="wrap_napoveda">';
    
    echo '<h2>'.__('Nápověda a doporučení pro plugin přístupnosti', 'blindfriendly-admin').'</h2>';
    
    //List of items in help
    echo '<div id="recommendations_outer">
          <div id="recommendations_inner">
          <a href="#media_upload">'.__('Upload médií', 'blindfriendly-admin').'</a><br />
          <a href="#press_this">'.__('Kliknout a publikovat', 'blindfriendly-admin').'</a>
            </div>
          </div>
          <div id="regular_help">
          <div id="regular_help_inner">
          <a href="#plugin_settings">'.__('Nastavení Pluginu', 'blindfriendly-admin').'</a><br />
          <a href="#htitles">'.__('Nadpisy h1 - h6', 'blindfriendly-admin').'</a><br />
          <a href="#descriptions">'.__('Popisky formulářových polí', 'blindfriendly-admin').'</a><br />
          <a href="#shortcuts">'.__('Zkratky', 'blindfriendly-admin').'</a><br />
          <a href="#newPage">'.__('Vytváření nové stránky', 'blindfriendly-admin').'</a><br />
          <a href="#removeMenuItems">'.__('Odebrání položek menu', 'blindfriendly-admin').'</a><br />
            </div>
          </div>';
    
    echo '<p id="media_upload" class="pruvodce">'.__('Obrázek nahrajete po kliknutí na položku "Mediální soubory" při psaní příspěvku nebo tvorbě stránky. Případně předem v sekci "Média".', 'blindfriendly-admin').'<br />'.__('Při uploadu médií je velmi dobré nahrávat vhodně pojmenované soubory.
                               Po jejich nahrání jim je přiřazen popisek podle jejich jména. Pokud nevidomý nezná jejich jméno, nebude je moci v průzkumníkovi médií identifikovat.', 'blindfriendly-admin').'<br />';
    
    echo '<p id="press_this" class="pruvodce">'.__('Nástroj "Kliknout a publikovat" resp. "Press This" je nástroj, který je pro nevidomé nepřístupný.
                             Jeho princip spočívá v tom, že označený text nebo obrázek uživatel myší přetáhne na záložku "Kliknout a publikovat", kterou předtím speciálně vytvoří.
                              Tento nástroj však má své uplatnění pro osoby se slabším zrakovým handicapem.', 'blindfriendly-admin').'<br />';
    
    echo '<p id="plugin_settings" class="pruvodce">'.__('Do sekce s nastavením pluginu se dostanete po kliknutí na sekci "Nastavení" a následně vyberete "Plugin Přístupnosti". Zde lze pomocí přepínačů vybrat jednotlivé možnosti nastavení.', 'blindfriendly-admin');
    
    echo '<p id="htitles" class="pruvodce">'.__('WordPress využívá rozumné struktury nadpisů h2 - h6. Dbejte však na to, že v administrátorské sekci není využíváno nadpisů h1. Začínejte tedy hledat od nadpisu h2.', 'blindfriendly-admin');
    
    echo '<p id="descriptions" class="pruvodce">'.__('Vysvětlivky některých formulářových polí najdete ve WordPressu často za tímto formulářovým polem.', 'blindfriendly-admin');
    
    echo '<p id="shortcuts" class="pruvodce">'.__('Nezapomeňte se podívat do kontextové nápovědy když vytváříte příspěvek nebo stránku. Najdete zde seznam zkratek, které Vám mohou zásadně ulehčit práci s textem.', 'blindfriendly-admin').'</p>';
    
    echo '<p id="newPage" class="pruvodce">'.__('Po vytvoření nové stránky je nutné ji přiřadit do konkrétního menu, než se skutečně zobrazí. Přiřazení do menu se provádí v sekci Vzhled => Menu.', 'blindfriendly-admin').'</p>';
    
    echo '<p id="removeMenuItems" class="pruvodce">'.__('V sekci s nastavením pluginu Blindfriendly Admin (Nastavení => Blindfriendly Admin) lze nastavit, aby se konkrétní položky menu nezobrazovaly. To však neznamená, že tím položky smažete nebo odinstalujete. Pouze, že se nezobrazí a čtečka je nebude předčítat. Toto nastavení lze kdykoliv vrátit.', 'blindfriendly-admin').'</p>';
    
    echo '</div>';
}


// Enlarging tinymce editor - creating new posts, pages, etc.
function plugin_mce_css( $mce_css ) {
    if (! empty( $mce_css ) ) $mce_css .= ',';
    $mce_css .= plugin_dir_url( __FILE__ ) . '/12_editor_tinymce.css';
    return $mce_css;
}
add_filter('mce_css', 'plugin_mce_css');



?>