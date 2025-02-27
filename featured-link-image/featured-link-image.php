<?php
/**
 * Plugin Name: Featured Link Image
 * Plugin URI: http://wordpress.org/extend/plugins/featured-link-image
 * Text Domain: fli
 * Domain Path: /lang
 * Description: Add a meta box in the link add/edit page for easily select/upload an image for the Bookmark
 * Author: Rodolfo Buaiz
 * Author URI: http://rodbuaiz.com/
 * Version: 1.5
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
!defined( 'ABSPATH' ) AND exit(
                ' Hi there! I\'m just a part of plugin, &iquest;what exactly are you looking for?'
);
if ( is_admin() )
    add_action( 'plugins_loaded', array( Featured_Link_Image_Class::get_instance(), 'plugin_setup' ) );

class Featured_Link_Image_Class
{
    /**
     * Plugin instance.
     *
     * @see get_instance()
     * @type object
     */
    protected static $instance = NULL;

    /**
     * URL to this plugin's directory.
     *
     * @type string
     */
    public $plugin_url = '';

    /**
     * Path to this plugin's directory.
     *
     * @type string
     */
    public $plugin_path = '';

    /**
     * Access this plugin’s working instance
     *
     * @wp-hook plugins_loaded
     * @since   2012.09.13
     * @return  object of this class
     */
    public static function get_instance()
    {
        NULL === self::$instance and self::$instance = new self;

        return self::$instance;
    }


    /**
     * Used for regular plugin work.
     *
     * @wp-hook plugins_loaded
     * @since   2012.09.10
     * @return  void
     */
    public function plugin_setup()
    {

        $this->plugin_url  = plugins_url( '/', __FILE__ );
        $this->plugin_path = plugin_dir_path( __FILE__ );
        $this->load_language( 'fli' );

        add_action( 'load-link-add.php', array( $this, 'meta_box' ) );
        add_action( 'load-link.php', array( $this, 'meta_box' ) );
        add_action( 'load-link-manager.php', array( $this, 'make_columns' ) );
        add_filter( 'get_bookmarks', array( $this, 'link_manager_order' ) );
        add_action( 'admin_footer-link-manager.php', array( $this, 'print_admin_footer' ) );
        add_action( 'admin_head-media-upload-popup', array( $this, 'print_iframe_head' ) );
        add_filter( 'attachment_fields_to_edit', array( $this, 'remove_upload_fields'), 99, 2 );
    }


    /**
     * Constructor. Intentionally left empty and public.
     *
     * @see plugin_setup()
     * @since 2012.09.12
     */
    public function __construct()
    {
        
    }


    /**
     * Loads translation file.
     *
     * Accessible to other classes to load different language files (admin and
     * front-end for example).
     *
     * @wp-hook init
     * @param   string $domain
     * @since   2012.09.11
     * @return  void
     */
    public function load_language( $domain )
    {
        $locale = apply_filters( 'plugin_locale', get_locale(), $domain );

        load_textdomain(
                $domain, WP_LANG_DIR . '/featured-link-image/' . $domain . '-' . $locale . '.mo'
        );

        load_plugin_textdomain(
                $domain, FALSE, $this->plugin_path . '/lang'
        );
    }

    /**
     * Instantiate Meta Box
     * 
     */
    public function meta_box()
    {
        new Featured_Link_Image_MetaBox_Class();
    }


    /**
     * Dispatch all hooks for custom columns
     */
    public function make_columns()
    {
        add_filter( 'manage_link-manager_columns', array( $this, 'add_id_column' ) );
        add_action( 'manage_link_custom_column', array( $this, 'add_id_column_data' ), 10, 2 );

        add_filter( 'request', array( $this, 'thumb_column_orderby' ) );
        add_filter( 'manage_link-manager_sortable_columns', array( $this, 'column_register_sortable' ) );
    }


    /**
     * Add columns, ID and Thumbnail
     * 
     */
    public function add_id_column( $link_columns )
    {
        $in = array( "link_id" => "ID" );
        $link_columns = $this->array_push_after( $link_columns, $in, 0 );
        $link_columns['thumbnail'] = __( 'Thumbnail', 'fli' );

        return $link_columns;
    }


    /**
     * Display column content
     * 
     * @param type $column_name
     * @param type $id
     * @return type
     */
    public function add_id_column_data( $column_name, $id )
    {
        if ( $column_name == 'thumbnail' )
        {
            $val = get_bookmark_field( 'link_image', $id );
            if ( empty( $val ) )
                return;
            $img = '<img src="' . $val . '" style="max-width:50px">';
            echo $img;
        }
        if ( $column_name == 'link_id' )
        {
            $val = get_bookmark_field( 'link_id', $id );
            echo $val;
        }
    }


    /**
     * Register column for display
     * 
     * @param type $columns
     * @return string
     */
    public function column_register_sortable( $columns )
    {
        $columns['thumbnail'] = 'link_image';
        $columns['link_id']   = 'link_id';
        return $columns;
    }


    /**
     * Register orderby in 'request' filter
     * 
     * @param type $vars
     * @return type
     */
    public function thumb_column_orderby( $vars )
    {
        if ( isset( $vars['orderby'] ) && 'thumbnail' == $vars['orderby'] )
        {
            $vars = array_merge( $vars, array(
                    'meta_key' => 'link_image',
                    'orderby'  => 'meta_value_num'
                    ) );
        }

        return $vars;
    }

    /**
     * Sort Links by thumbnail
     * @global type $current_screen
     * @param type $links
     * @return type
     */
    public function link_manager_order( $links )
    {
        if ( !isset( $_GET['orderby'] ) )
            return $links;

        global $current_screen;
        if ( $current_screen->id == 'link-manager' && $_GET['orderby'] == 'link_image' )
        {
            $order = ($_GET['order'] === 'asc') ? SORT_ASC : SORT_DESC;
            $this->sort_on_field( $links, 'link_image', $order );
            return $links;
        }

        return $links;
    }


    /**
     * 
     */
    public function print_admin_footer()
    {
        echo '<style>#link_id { width:4%; } #thumbnail { max-width:20%; }</style>';
    }


    /**
     * jQuery and CSS for the iframe popup
     */
    public function print_iframe_head()
    {
        // Load only if fli_type defined
        if ( isset( $_GET['fli_type'] ) )
        {
            // Hide many image details and From Url insert option
            echo '
		<style type="text/css">
		    #media-upload-header #sidemenu li#tab-type_url,tr.post_excerpt,tr.post_content,tr.align,tr.image_alt, tr.post_title.form-required, tr.url {display: none !important; }
		</style>';

            // Refresh upload screen every half second
            // Changes the "Insert into post" text and hides button "Save all changes"
            $select  = __( "Select link image", 'fli' );
            $tab     = isset( $_GET['tab'] ) ? $_GET['tab'] : "type";
            $refresh = ($tab == 'type') ? 'var mtt_t = setInterval(function(){
		$("#media-items").each(setButtonNames); 
		$("p.savebutton").css("display", "none"); 
		}, 500);' : '';

            $js = <<<EOM
		<script type="text/javascript">
		function setButtonNames() {
			jQuery(this).find('.savesend .button').val('{$select}');
		}
		jQuery(document).ready(function($){
			$('#media-items').each(setButtonNames);
			{$refresh}
		});
		</script>
EOM;
            echo $js;
        }
    }

    
    /**
     * Set content of important field that we are hidding
     * 
     * @param type $form_fields
     * @param type $post
     * @return string
     */
    public function remove_upload_fields( $form_fields, $post ) 
    {
	if( !isset( $_GET['fli_type'] ) )
            return $form_fields;
		
        $html = "<input type='hidden' name='attachments[".$post->ID."][url]' value='".$post->guid."'/>";

        $form_fields['url']['html'] = $html;
        $form_fields['url']['helps'] = '';
        $form_fields['url']['label'] = '';

        return $form_fields;
    }
    
    
    /*
     * Insert $in item in position $pos inside the $src array
     */
    private function array_push_after( $src, $in, $pos )
    {
        if ( is_int( $pos ) )
            $R = array_merge( array_slice( $src, 0, $pos + 1 ), $in, array_slice( $src, $pos + 1 ) );
        else
        {
            foreach ( $src as $k => $v )
            {
                $R[$k] = $v;
                if ( $k == $pos )
                    $R       = array_merge( $R, $in );
            }
        }
        return $R;
    }


    /*
     * Sort multidimensional array by stdClass
     */

    private function sort_on_field( &$db, $col, $order = SORT_ASC )
    {
        $sort = array( );
        foreach ( $db as $i => $obj )
        {
            $sort[$i] = $obj->{$col};
        }
        $sorted_db  = array_multisort( $sort, $order, $db );
    }


}

/**
 * Meta Box Class
 */
class Featured_Link_Image_MetaBox_Class
{
    private $url = '';

    public function __construct()
    {
        $this->url = Featured_Link_Image_Class::get_instance()->plugin_url;

        add_action( 'add_meta_boxes', array( &$this, 'add_fli_meta_box' ) );
        //add_action( 'add_meta_boxes_link', array( &$this, 'add_fli_meta_box' ) );

        add_action( 'admin_print_scripts', array( &$this, 'admin_scripts' ) );
        add_action( 'admin_print_styles', array( &$this, 'admin_styles' ) );
    }


    public function admin_scripts()
    {
        wp_enqueue_script( 'fli-upload-js', $this->url . 'js/uploader.js', array( 'jquery', 'media-upload', 'thickbox' ) );
    }


    public function admin_styles()
    {
        wp_enqueue_style( 'thickbox' );
        wp_enqueue_style( 'fli-upload-css', $this->url . 'css/uploader.css' );
    }


    /**
     * Adds the meta box container
     */
    public function add_fli_meta_box()
    {
        add_meta_box(
                'featured_link_image_meta_box'
                , __( 'Featured Link Image', 'fli' )
                , array( &$this, 'render_meta_box_content' )
                , 'link'
                , 'side'
                , 'default'
        );
    }


    /**
     * Render Meta Box content
     */
    public function render_meta_box_content()
    {
        global $link;

        $img        = (isset( $link->link_image ) && '' !== $link->link_image) ? '<img src="' . $link->link_image . '" class="link-featured-image">' : '';
        $class_hide = ('' === $img) ? 'hide-image-text' : '';
        $class_show = ('' !== $img) ? 'hide-image-text' : '';
        $spanimg    = sprintf( '<div id="my-link-img">%s</div>', $img );
        ?>
        <table>
            <tr>
                <td>
                    <span class="link-help-text <?php echo $class_show; ?>">
                        <?php _e( 'After selecting/uploading, the image address will be inserted inside the Advanced->Image Address field.', 'fli' ); ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <a id="upload_image_button" class="<?php echo $class_show; ?>" href="#">
                        <?php _e( 'Set link image', 'fli' ); ?>
                    </a>
                </td>
            </tr>
            <tr>
                <td><?php echo $spanimg; ?></td>
            </tr>
            <tr>
                <td>
                    <a href="#" id="remove-image-text" class="<?php echo $class_hide; ?>">
                        <?php _e( 'Remove image', 'fli' ); ?>
                    </a>
                </td>
            </tr>
        </table>
        <?php
    }

}
