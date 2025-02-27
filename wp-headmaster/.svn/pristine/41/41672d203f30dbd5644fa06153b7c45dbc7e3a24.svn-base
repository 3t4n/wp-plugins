<?php   
    /* 
    Plugin Name: WP Headmaster
    Plugin URI: https://www.creare.co.uk/services/wp-headmaster
    Description: A simple plugin for adding, enqueuing and organising common items into the Head tag without hard-coding.
    Author: James Bavington
    Version: 0.3
    Author URI: http://www.creare.co.uk/author/james-bavington
    */   

	/*  Copyright 2013  BAVINGTON, CREAREGROUP  (email : james@creare.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/

$wp_headmaster = new wp_headmaster();

class wp_headmaster {

    public function __construct() {

        if ( is_admin() ){ 
            add_action('admin_menu', array(&$this, 'headmaster_admin_actions'));   
            add_action('admin_init', array(&$this, 'headmaster_theme_options_init'));
            add_action('admin_init', array(&$this, 'wp_headmaster_admin_assets' ));   
        }

        add_filter('plugin_action_links', array(&$this, 'settings_link'), 10, 2);

        $deployga = get_option('ga_profile');

        $ga_choice = get_option('wp_headmaster_ga_choice');

        if ($deployga !="" & $ga_choice !="0" ) { 
            add_action('wp_head', array(&$this, 'add_analytic'), 999); 
        }

        if ($deployga !="" & $ga_choice =="0" ) { 
            add_action('wp_head', array(&$this, 'add_new_analytic'), 999); 
        }

        $inline_style_check = get_option('inline_styles');

        if ($inline_style_check !="") { 
            add_action('wp_head', array(&$this, 'add_styles'), '998'); 
        }

        $favicon_check = get_option('wp_headmaster_favicon');

        if ($favicon_check !="") { 
            add_action('wp_head', array(&$this, 'add_favicon'), ''); 
        }

        $touchicon_check = get_option('wp_headmaster_touch_icon');

        if ($touchicon_check !="") { 
            add_action('wp_head', array(&$this, 'add_touchicon'), ''); 
        }

        $googlefontcheck = get_option('wp_headmaster_google_font');
        
        if ($googlefontcheck !=="") { 
            add_action('wp_head', array(&$this, 'add_google_font'), ''); 
         }

        $googlefontcheck = get_option('wp_headmaster_typekit');
            
        if ($googlefontcheck !=="") { 
            add_action('wp_head', array(&$this, 'add_typekit'), ''); 
            add_action('wp_head', array(&$this, 'add_typekit_inline'), '10'); 
        }

        $edgefontcheck = get_option('wp_headmaster_edgewebfonts');
        
        if ($edgefontcheck !=="") { 
            add_action('wp_head', array(&$this, 'add_edge'), ''); 
         }

         $jquery_check = get_option('wp_headmaster_jquery_choice');

         if ($jquery_check =="1") { 
            add_action('wp_head', array(&$this, 'add_jquery'), ''); 
         }

        elseif ($jquery_check =="2") { 
            $jquery_google_version = get_option('wp_headmaster_jquery_google_version');
            add_action('wp_head', array(&$this, 'add_google_jquery'), '');
        }

        $respondjscheck = get_option('wp_headmaster_respondjs');

        if ($respondjscheck =="1") { 
            add_action('wp_head', array(&$this, 'add_respond_js'), ''); 
         }

        $wphm_modernizrcheck = get_option('wphm_modernizr');

        if ($wphm_modernizrcheck =="1") {
            add_action('wp_head', array(&$this, 'add_modernizr'),'');
        }

        $author_check = get_option('wp_headmaster_meta_author_auto');

        if ($author_check =="1") { 
            add_action('wp_head', array(&$this, 'add_meta_author'), '1'); 
         }

        $format_det_check = get_option('wp_headmaster_format_detection');

        if ($format_det_check =="1") { 
            add_action('wp_head', array(&$this, 'add_format_detection_meta'), '1'); 
         }

        add_action( 'admin_init', array(&$this, 'call_wphm_Metaboxes') );

        add_action( 'wp_head', array(&$this, 'add_wphm_js'), 998 );

        add_action( 'wp_head', array(&$this, 'add_wphm_css'), 997 );
    
    }

    public function headmaster_admin_actions() { 
        $page = add_options_page("Headmaster", "WP Headmaster", "administrator", "Headmaster", array(&$this, "headmaster_admin")); 
    }

    public function headmaster_admin() {  
        include('wp-headmaster-settings.php');  
    }

    function wp_headmaster_admin_assets() {
        if (isset($_GET['page']) && $_GET['page'] == 'Headmaster') {
            wp_enqueue_media();
            wp_register_style( 'wpHeadmasteradminstyles', plugins_url('wp-headmaster.css', __FILE__ ),'','', 'screen' );
            wp_register_script('my-admin-js', plugins_url('js/admin.js', __FILE__ ), array('jquery'));
            wp_enqueue_script('my-admin-js');
            wp_enqueue_style( 'wpHeadmasteradminstyles' );
        }
    }

    function settings_link($links, $file) {
        $plugin_file = basename(__FILE__);
        if (basename($file) == $plugin_file) {
            $settings_link = '<a href="options-general.php?page=Headmaster">Settings</a>';
            array_unshift($links, $settings_link);
        }
        return $links;
    }

    function headmaster_theme_options_init(){
        register_setting( 'headmaster_myoption_group', 'ga_profile' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_ga_choice' );
        register_setting( 'headmaster_myoption_group', 'inline_styles' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_favicon' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_touch_icon' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_google_font' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_typekit' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_edgewebfonts' );    
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_jquery_choice' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_jquery_google_version' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_respondjs' );
        register_setting( 'headmaster_myoption_group', 'wphm_modernizr' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_meta_author_auto' );
        register_setting( 'headmaster_myoption_group', 'wp_headmaster_format_detection' );

    } 

    function add_analytic() { ?>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', "<?php echo get_option('ga_profile'); ?>"]);
	_gaq.push(['_trackPageview']);

	(function() {
	   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
    <?php } 

    function add_new_analytic() { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo get_option('ga_profile'); ?>', '<?php echo str_replace('www.','',$_SERVER['HTTP_HOST']); ?>');
  ga('send', 'pageview');

</script>
    <?php } 

    function add_styles() { 
        echo '<script>'."\n";
        echo get_option('inline_styles') ."\n"; 
        echo '</script>'."\n";
    } 

    function add_favicon() { 
        echo '<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="'. get_option('wp_headmaster_favicon') .'" sizes="16x16 32x32" />';
        echo "\n";
    } 

    function add_touchicon() { 
        echo '<link rel="apple-touch-icon" href="'. get_option('wp_headmaster_touch_icon') .'" />';
        echo "\n";
    } 

    function add_google_font() { 
        wp_register_style('googlefont', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://fonts.googleapis.com/css?family=" . get_option('wp_headmaster_google_font'),'',null,'all');
        wp_enqueue_style('googlefont');
    }

    function add_typekit() {     
        wp_register_script( 'add-typekit', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://use.typekit.net/" . get_option('wp_headmaster_typekit') . ".js",'',null , false);
        wp_enqueue_script('add-typekit');
    }

    function add_typekit_inline() {     
        echo'<script type="text/javascript">try{Typekit.load();}catch(e){}</script>'."\n"; ;
    }

    function add_edge() {     
        wp_register_script( 'add-edge', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://use.edgefonts.net/" . get_option('wp_headmaster_edgewebfonts') . ".js",'',null , false);
        wp_enqueue_script('add-edge');
    }

    function add_jquery() { 
        wp_enqueue_script( 'jquery' );
    }

    function add_google_jquery() { 
        wp_deregister_script('jquery');
        wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/" . get_option('wp_headmaster_jquery_google_version') . "/jquery.min.js",'',get_option('wp_headmaster_jquery_google_version'), false);
        wp_enqueue_script('jquery');
    }

    function add_respond_js() { 
        wp_register_script( 'respond-js', plugins_url( 'js/respond.min.js' , __FILE__ ), '','1.4.2',false );
        wp_enqueue_script('respond-js');
    }

    function add_modernizr() { 
        wp_register_script( 'modernizr-js', plugins_url( 'js/modernizr.min.js' , __FILE__ ), '','2.7.1',false );
        wp_enqueue_script('modernizr-js');
    }

    function add_meta_author() { 
        if (is_singular()){
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                  
                $publisher = get_the_author_meta('display_name');
                $lasteditedby = get_the_modified_author();

                if ($publisher == $lasteditedby || $lasteditedby =="") {
                    echo '<meta name="author" content="' . get_the_author_meta('display_name') . '" /> ' . "\n";
                }
                else {
                    echo '<meta name="author" content="' . get_the_author_meta('display_name') . ' - last modified by ' . get_the_modified_author() .'" /> ' . "\n";
            }
          endwhile; else: endif;
        }
    } 

    function add_format_detection_meta() { 
        echo "<meta name=\"format-detection\" content=\"telephone=no\" />" . "\n";
    } 

    
    function call_wphm_Metaboxes() {
        return new wphm_Metaboxes();
    }

    function add_wphm_js($post) { 
        global $post;
        $jsvalue = get_post_meta( $post->ID, 'wp_headmaster_js_value_key', true );
        if ($jsvalue !="") { 
            echo '<script>'."\n";
            echo get_post_meta( $post->ID, 'wp_headmaster_js_value_key', true ) ."\n"; 
            echo '</script>'."\n";
        }
    }

    function add_wphm_css($post) { 
        global $post;
        $cssvalue = get_post_meta( $post->ID, 'wp_headmaster_css_value_key', true );
        if ($cssvalue !="") { 
            echo '<style type="text/css">'."\n";
            echo get_post_meta( $post->ID, 'wp_headmaster_css_value_key', true ) ."\n"; 
            echo '</style>'."\n";
        }
    } 

} 



class wphm_Metaboxes {

    public function __construct() { 
        add_action( 'add_meta_boxes', array(&$this, 'add_meta_box' ) );
        add_action( 'save_post', array(&$this, 'save' ) );
    }

    function add_meta_box() {

        global $post; 
        $exclude = array ( 'attachment', 'nav_menu_item' );

        if (isset ($post)){
            if(!in_array($post->post_type,$exclude)){
                $post_type = $post->post_type;
                    add_meta_box('wpheadmaster_page_post_scripts',__( 'WP Headmaster', 'wpheadmaster_textdomain' ),array(&$this, 'render_meta_box_content' ),$post_type,'advanced','default');
            }
        }
    }

    public function save( $post_id ) { 

        if ( ! isset( $_POST['wpheadmaster_inner_custom_box_nonce'] ) )
            return $post_id;

        $nonce = $_POST['wpheadmaster_inner_custom_box_nonce'];

        if ( ! wp_verify_nonce( $nonce, 'wpheadmaster_inner_custom_box' ) )
            return $post_id;

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return $post_id;

        if ( 'page' == $_POST['post_type'] ) {

            if ( ! current_user_can( 'edit_page', $post_id ) )
                return $post_id;
    
        } else {


            if ( ! current_user_can( 'edit_post', $post_id ) )
                return $post_id;
        }

        $jsdata = sanitize_text_field( $_POST['wpheadmaster_js_field'] );
        $cssdata = sanitize_text_field( $_POST['wpheadmaster_css_field'] );

        update_post_meta( $post_id, 'wp_headmaster_js_value_key', $jsdata );
        update_post_meta( $post_id, 'wp_headmaster_css_value_key', $cssdata );
    }

    public function render_meta_box_content( $post ) {
    
        wp_nonce_field( 'wpheadmaster_inner_custom_box', 'wpheadmaster_inner_custom_box_nonce' );

        $jsvalue = get_post_meta( $post->ID, 'wp_headmaster_js_value_key', true );

        $cssvalue = get_post_meta( $post->ID, 'wp_headmaster_css_value_key', true );

        echo '<p>Here you can add inline page/post specific CSS and/or JavaScript that will be brought out only for this page/post.</p>';
        echo '<code>&lt;script&gt;</code><br />';
        echo '<textarea rows="1" cols="40" style="width:100%; height:6em;" id="wpheadmaster_js_field" name="wpheadmaster_js_field" placeholder="Enter any inline Scripts exclusively for this page/post here." >' . esc_attr( $jsvalue ) . '</textarea>';
        echo '<code>&lt;/script&gt;</code>';
        echo '<br /><br />';
        echo '<code>&lt;style&gt;</code><br />';
        echo '<textarea rows="1" cols="40" style="width:100%; height:6em;" id="wpheadmaster_css_field" name="wpheadmaster_css_field" placeholder="Enter any inline Styles exclusively for this page/post here.">' . esc_attr( $cssvalue ) . '</textarea>';
        echo '<code>&lt;/style&gt;</code>';

    }

}