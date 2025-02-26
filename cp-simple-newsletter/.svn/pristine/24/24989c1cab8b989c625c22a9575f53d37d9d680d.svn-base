<?php
/*
Plugin Name: CP Simple Newsletter
Plugin URI: http://example.com
Description: Simple Newsletter form with sortcode to show anywhere on website.
Version: 1.1
Author: Commercepundit
Author URI: http://www.commercepundit.com/
*/


/**
 * $newsletter_table_db_version - holds current database version
 * and used on plugin update to sync database tables
 */ 
session_start();
 global $newsletter_table_db_version;
$newsletter_table_db_version = '1.1'; // version changed from 1.0 to 1.1


// Create a helper function for easy SDK access.
function csn_fs() {
    global $csn_fs;

    if ( ! isset( $csn_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $csn_fs = fs_dynamic_init( array(
            'id'                => '482',
            'slug'              => 'cp-simple-newsletter',
            'type'              => 'plugin',
            'public_key'        => 'pk_151f04d12a8ee77aca5b5aef629b9',
            'is_premium'        => false,
            'has_addons'        => false,
            'has_paid_plans'    => false,
            'menu'              => array(
                'slug'       => 'cp-simple-newsletter',
                'contact'    => false,
                'support'    => false,
            ),
        ) );
    }

    return $csn_fs;
}

// Init Freemius.
csn_fs();
/**
 * register_activation_hook implementation
 *
 * will be called when user activates plugin first time
 * must create needed database tables
 */
function cp_newsletter_table_install()
{
 global $wpdb;
 $table_name = $wpdb->prefix . 'cp_newsletter_table'; // do not forget about tables prefix

    // sql to create your table
    // NOTICE that:
    // 1. each field MUST be in separate line
    // 2. There must be two spaces between PRIMARY KEY and its name
    //    Like this: PRIMARY KEY[space][space](id)
    // otherwise dbDelta will not work
    $sql = "CREATE TABLE " . $table_name . " (
      id int(11) NOT NULL AUTO_INCREMENT,
      firstname tinytext,
      lastname tinytext,
      email VARCHAR(100) NOT NULL,
      PRIMARY KEY  (id)
    );";
    
    // we do not execute sql directly
    // we are calling dbDelta which cant migrate database
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    
    /**
     * [OPTIONAL] Example of updating to 1.1 version
     *
     * If you develop new version of plugin
     * just increment $newsletter_table_db_version variable
     * and add following block of code
     *
     * must be repeated for each new version
     * in version 1.1 we change email field
     * to contain 200 chars rather 100 in version 1.0
     * and again we are not executing sql
     * we are using dbDelta to migrate table changes
     */
    $installed_ver = get_option('newsletter_table_db_version');
    if ($installed_ver != $newsletter_table_db_version) {
        $sql = "CREATE TABLE " . $table_name . " (
          id int(11) NOT NULL AUTO_INCREMENT,
          firstname tinytext,
          lastname tinytext,
          email VARCHAR(200) NOT NULL,
          PRIMARY KEY  (id)
        );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        // notice that we are updating option, rather than adding it
        update_option('newsletter_table_db_version', $newsletter_table_db_version);
    }
}

register_activation_hook(__FILE__, 'cp_newsletter_table_install');

/**
 * Trick to update plugin database, see docs
 */
function csn_newsletter_update_db_check()
{
    global $newsletter_table_db_version;
    if (get_site_option('newsletter_table_db_version') != $newsletter_table_db_version) {
        cp_newsletter_table_install();
    }
}

add_action('plugins_loaded', 'csn_newsletter_update_db_check');

/*Create aminside menu left side*/
add_action('admin_menu', 'csn_plugin_setup_menu');
function csn_plugin_setup_menu(){
    global $newsletter_page;
    $newsletter_page = add_menu_page(__('CPSimple Newsletter Plugin Page', 'cp_newsletter_table'), __('CP Newsletter', 'cp_newsletter_table'), 'activate_plugins', 'persons', 'custom_table_example_persons_page_handler');
    add_submenu_page('persons', __('Subscribed Persons', 'cp_newsletter_table'), __('Subscribed Persons', 'cp_newsletter_table'), 'activate_plugins', 'persons', 'custom_table_example_persons_page_handler');
    add_submenu_page('persons', __('Settings', 'cp_newsletter_table'), __('Settings', 'cp_newsletter_table'), 'activate_plugins', 'csn_init', 'csn_init');
    
    add_action("load-$newsletter_page", "cp_newsletter_screen_options");
}

function csn_init(){
//    $firstname = '';
    $lastname = '';
    $news_options = get_option( 'news_options' );

    $firstname = isset( $news_options['firstname'] ) ? $news_options['firstname'] : '';
    $lastname = isset( $news_options['lastname'] ) ? $news_options['lastname'] : '';
    $csn_btn = isset( $news_options['csn_btn'] ) ? $news_options['csn_btn'] : 'Send';

    if ( isset( $_POST['settings_submit'] ) && check_admin_referer( 'settings_nonce', '_wpnonce' ) ) {
        
            $saved_options = $_POST['news_options'];
            update_option( 'news_options', $saved_options );
            wp_redirect( '?page=csn_init&settings-updated=true' );
    }
    ?>
    <div class="wrap">
     <div class="welcome-panel">
      <?php
        if ( isset( $_GET['settings-updated'] ) && ( $_GET['settings-updated'] ) ) {
            echo '<div id="message" class="updated"><p><strong>Settings saved. </strong></p></div>';
        }
        ?>
     <h3>CP Simple Newsletter</h3>
     <p>Place below Shortcode in your PHP templates where you want to show newsletter form : <strong>do_shortcode('[cp_simple_newsletter]' );</strong></br>
    <p>if you want to show in Post / Page add sortcode like this : <strong>[cp_simple_newsletter]</strong></p>
    
    <form method="post" action="<?php echo admin_url('admin.php?page=csn_init&noheader=true'); ?>">
      <?php wp_nonce_field('update-options') ?>
      <div class="postbox">
         <h3 class="hndle"><span><?php _e( 'Display Fields Settings', 'csn-newsletter' ); ?></span></h3>
            <div class="inside">
               <table class="form-table">
                    <tr>
                     <th scope="row"><label for="firstname"><?php _e( 'First Name', 'csn-newsletter' ); ?></label>
                        </th>
                        <td>
                            <input id="firstname" type="checkbox" name="news_options[firstname]"
                                  value="yes"  <?php checked( $firstname, 'yes' ) ?>>

                            <p class="description">
                                <?php _e( 'Check to enable FIRSTNAME in Frontside custom newsletter form', 'csn-newsletter' ); ?>

                            </p>
                        </td>
                    </tr>
               </table>
               <table class="form-table">
                    <tr>
                     <th scope="row"><label for="lastname"><?php _e( 'Last Name', 'csn-newsletter' ); ?></label>
                        </th>
                        <td>
                            <input id="lastname" type="checkbox" name="news_options[lastname]"
                                  value="yes"   <?php /*if ($lastname == 'yes') echo "checked='checked'";*/ checked( $lastname, 'yes' ) ?>>

                            <p class="description">
                                <?php _e( 'Check to enable LASTNAME in Frontside custom newsletter form', 'csn-newsletter' ); ?>

                            </p>
                        </td>
                    </tr>
               </table>
               <table class="form-table">
                    <tr>
                     <th scope="row"><label for="buttonlbl"><?php _e( 'Button Label', 'csn-newsletter' ); ?></label>
                        </th>
                        <td>
                            <input id="btnlbl" type="text" name="news_options[csn_btn]"
                                  value="<?php echo $csn_btn; ?>" >

                            <p class="description">
                                <?php _e( 'If you want to change Button label then Enter Label here to show in Frontside custom newsletter form', 'csn-newsletter' ); ?>
                            </p>
                        </td>
                    </tr>
               </table>
               <p>
                    <?php wp_nonce_field( 'settings_nonce' ); ?>
                    <input class="button-primary" type="submit" name="settings_submit"
                           value="Save All Changes">
                </p>                  
            </div>
      </div>
    </form>
   </div>
</div>
    <?php
}


/* this function is called when shortcode [cp_simple_newsletter] is active.*/
function csn_shortcode() {
    ob_start();
    //csn_deliver_mail();
    csn_newsletter();

    return ob_get_clean();
}
add_shortcode( 'cp_simple_newsletter', 'csn_shortcode' );


function csn_newsletter() {
    
     if ( isset( $_POST['csn-submitted']) && wp_verify_nonce($_POST['custom_newsletter_nonce'], 'custom-newsletter-nonce')){
        csn_deliver_mail();
       
     }  
    
    $news_options = get_option( 'news_options' );
    //echo "<pre>"; print_r($news_options);
    if($news_options['csn_btn'])
    {
       $button_label = $news_options['csn_btn'];
    }else{
       $button_label = "Send" ;
    }
    
    echo '<form method="post" action="">';
   
   if($news_options['firstname']){
    echo '<p>';
    //echo 'First Name *<br />';
    echo '<input required type="text" name="csn-fname" pattern="[a-zA-Z0-9 ]+" value="" size="40" placeholder="First Name" />';
    echo '</p>';
   }
   
   if($news_options['lastname']){
    echo '<p>';
   // echo 'Last Name *<br />';
    echo '<input required type="text" name="csn-lname" pattern="[a-zA-Z0-9 ]+" value="" size="40" placeholder="Last Name" />';
    echo '</p>';
   }
    
    echo '<p>';
    //echo 'Email * <br />';
    echo '<input required type="email" name="csn-email" value="" size="40" placeholder="Email"/>';
    echo '</p>';
    
    echo '<input type="hidden" name="custom_newsletter_nonce" value="'.wp_create_nonce('custom-newsletter-nonce').'"/>';
    echo '<p><input type="submit" name="csn-submitted" value="'.$button_label.'"/></p>';
    echo '</form>';
    
   
    //echo "<pre>"; print_r($_POST); exit;

}

function csn_deliver_mail() {
     if ( isset( $_POST['csn-submitted']) && wp_verify_nonce($_POST['custom_newsletter_nonce'], 'custom-newsletter-nonce'))
     {
       //echo "<pre>"; print_r($_POST); exit;
       if(!empty($_POST["csn-email"])) {
           
       global $wpdb;
       $table_name = $wpdb->prefix . 'cp_newsletter_table';
      
      $email = $_POST["csn-email"];
      $email_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(id) FROM $table_name WHERE email = %s", $email));
      
      if(!$email_count){ 
         // sanitize form values
        $fname    = sanitize_text_field( $_POST["csn-fname"] );
        $lname    = sanitize_text_field( $_POST["csn-lname"] );
        $email   = sanitize_email( $_POST["csn-email"] );
      
        /*** Insert Data in Table ***/
        global $wpdb;
        $table_name = $wpdb->prefix . 'cp_newsletter_table';
        $wpdb->insert($table_name, array(
            'firstname' => $fname,
            'lastname' => $lname,
            'email' => $email,
        ));
        
        
        // get the blog administrator's email address
        $to = get_option( 'admin_email' );
        
        $headers = array('Content-Type: text/html; charset=UTF-8');
        //$headers = "From: $name <$email>" . "\r\n";
        $subject = "Newsletter Subscription";
        $message = "";
        
        if($fname){
          $message .= "<p>First Name : $fname</p>";  
        }
        if($lname){
          $message .= "<p>Last Name : $lname</p>";  
        }
        $message .= "<p>Email : $email</p>";  
        

        // If email has been process for sending, display a success message
        if ( wp_mail( $to, $subject, $message, $headers ) ) {
            $user_message = "You have successfully subscribed. When new post will publish you will get email notification of Post.";
            wp_mail( $email, $subject, $user_message, $headers );
            echo '<div class="cpmsg">';
           // echo '<p>Thanks For Subscription.</p>';
            echo "<em style='color:green;font-weight:bold'>Thanks For Subscription.</em>";  
            echo '</div>';
        } else {
            echo '<div class="cpmsg">';
            echo "<em style='color:red;font-weight:bold'>Mail is not sent.</em>";
            echo '</div>';  
        }
     }
     
     else{
       echo '<div class="cpmsg">';
       echo "<em style='color:red;font-weight:bold'>Email already subscribed.</em>";
       echo '</div>';    
     }
    }
     else{
      echo '<div class="cpmsg">';
      echo "<em style='color:red;font-weight:bold'>Please fill all the fields and submit it again.</em>";
      echo '</div>';  
   }
   }
}

/*Automatically notify your members on new posts*/

function post_published_notification( $post_ID, $post ) {
    global $wpdb;
    global $post;
 
   if( ( $_POST['post_status'] == 'publish' ) && ( $_POST['original_post_status'] != 'publish' ) ) { 
    
    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $table_name = $wpdb->prefix . 'cp_newsletter_table';
    $usersarray = $wpdb->get_results("SELECT email FROM $table_name;");    
    
     $weburl = site_url();
     $post_title = get_the_title($post_ID); 
     $post_content = get_post_field('post_content', $post_ID);
     //$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post_ID) );
     $feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ID ), 'thumbnail', false );
     $post_url =  esc_url(get_permalink( $post_ID ));
     $post_mail = "<h2><a href=$post_url>$post_title</a></h2>";
     
     if($feat_image){
        $post_mail .= "<p><img src='".$feat_image[0]."'></p>"; 
     }
     $post_mail .= "<p>$post_content</p>";
     
     foreach($usersarray as $user_email){
        $email[] = $user_email->email;
        $encoded_email = urlencode( base64_encode( $user_email->email ) );
        $post_mail .= "<p>---------------</p><p>To Unsubscribe click on this link <a href=$weburl/emailsub?email=$encoded_email>Unsubscribe</a></p>";
        wp_mail($user_email->email, $post_title, $post_mail,$headers); 
   } 
    //wp_mail($toemail, $post_title, print_r($post_mail1,true),$headers); 
  } 
     return $post_ID;
}
add_action( 'publish_post', 'post_published_notification', 10, 2 );



/***********************************************************************************
* *************  Table LIST  ***************
* ***********************************************************************************
*/

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * Custom_Table_Example_List_Table class that will display our custom table
 * records in nice table
 */
class Newslteer_List_Table extends WP_List_Table
{
    /**
     * Set the amount of stores that are shown on each page
     * @since 1.0
     * @var string
     */
     private $_per_page;
    /**
     * [REQUIRED] You must declare constructor and give some basic params
     */ 
    function __construct(){
         global $status,$page;
         parent::__construct(array(
            'singular' => 'person',
            'plural' => 'persons',
        ));
        
        $this->_per_page = $this->get_per_page();       
     }
     
     /**
     * Get the per_page value from the option table
     * 
     * @since 1.2.20
     * @return string $per_page The amount of stores to show per page
     */
    function get_per_page() {
        
        $user     = get_current_user_id();
        $screen   = get_current_screen();
        $option   = $screen->get_option( 'per_page', 'option' );
        $per_page = get_user_meta( $user, $option, true );
       
        if ( empty( $per_page ) || $per_page < 1 ) {
            $per_page = $screen->get_option( 'per_page', 'default' );
        }
        
        return $per_page;
    }
     
     /**
     * [REQUIRED] this is a default column renderer
     *
     * @param $item - row (key, value array)
     * @param $column_name - string (key)
     * @return HTML
     */
    function column_default($item, $column_name)
    {
        return $item[$column_name];
    }
    
    /**
     * [OPTIONAL] this is example, how to render specific column
     *
     * method name must be like this: "column_[column_name]"
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    
    /**
     * [OPTIONAL] this is example, how to render column with actions,
     * when you hover row "Edit | Delete" links showed
     *
     * @param $item - row (key, value array)
     * @return HTML
     */ 
    function column_email($item)
    {
        // links going to /admin.php?page=[your_plugin_page][&other_params]
        // notice how we used $_REQUEST['page'], so action will be done on curren page
        // also notice how we use $this->_args['singular'] so in this example it will
        // be something like &person=2
        
        $actions = array(
             'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'cp_newsletter_table')),
        );

        return sprintf('%s %s',
            $item['email'],
            $this->row_actions($actions)
        );
        
    }
    
    /*function column_lastname($item)
    {
        return '<em>' . $item['lastname'] . '</em>';
    }*/
    
    
    function column_firstname($item)
    {
        return '<em>' . $item['firstname'] . '</em>';
    }
    
    /**
     * [REQUIRED] this is how checkbox column renders
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['id']
        );
    }
    
    /**
     * [REQUIRED] This method return columns to display in table
     * you can skip columns that you do not want to show
     * like content, or description
     *
     * @return array
     */
    function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
            'email' => __('E-Mail', 'cp_newsletter_table'),
            'firstname' => __('First Name', 'cp_newsletter_table'),
            //'lastname' => __('Last Name', 'cp_newsletter_table'),
        );
        return $columns;
    }
    
    /**
     * [OPTIONAL] This method return columns that may be used to sort table
     * all strings in array - is column names
     * notice that true on name column means that its default sort
     *
     * @return array
     */
    function get_sortable_columns()
    {
        
        $sortable_columns = array(
            'firstname' => array('firstname', true),
            'email' => array('email', false),
           // 'lastname' => array('lastname', false),
        );
        return $sortable_columns;
    }
    
    /**
     * [OPTIONAL] Return array of bult actions if has any
     *
     * @return array
     */
    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete'
        );
        return $actions;
    }
    
    /**
     * [OPTIONAL] This method processes bulk actions
     * it can be outside of class
     * it can not use wp_redirect coz there is output already
     * in this example we are processing delete action
     * message about successful deletion will be shown on page in next part
     */
    function process_bulk_action()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cp_newsletter_table'; // do not forget about tables prefix

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
            }
        }
    }
    
    function get_store_list(){
         global $wpdb;
         $table_name = $wpdb->prefix . 'cp_newsletter_table'; // do not forget about tables prefix  
         $total_items = 0;
         $per_page=5;
         //$this->_per_page = 5;
        //$this->_per_page = $this->get_per_page();        
        /* Check if we need to run the search query or just show all the data */
        if ( isset( $_GET['s'] ) && ( !empty( $_GET['s'] ) ) ) {
            $search = trim( $_GET['s'] ); //exit;
            $result = $wpdb->get_results( 
                            $wpdb->prepare( "SELECT * FROM $table_name  WHERE firstname LIKE %s OR email LIKE %s", 
                               '%' . like_escape( $search ). '%', '%' . like_escape( $search ). '%'            ), ARRAY_A 
                            );
        } else {
            /* Order params */
            $orderby   = !empty ( $_GET["orderby"] ) ? esc_sql ( $_GET["orderby"] ) : 'firstname';
            $order     = !empty ( $_GET["order"] ) ? esc_sql ( $_GET["order"] ) : 'ASC';
            $order_sql = $orderby.' '.$order;   

            // Pagination parameters 
            $total_items = $wpdb->get_var( "SELECT COUNT(*) AS count FROM $table_name" );
            
            $paged       = !empty ( $_GET["paged"] ) ? esc_sql ( $_GET["paged"] ) : '';
            
            if ( empty( $paged ) || !is_numeric( $paged ) || $paged <= 0 ) { 
                $paged = 1; 
            }

            //$totalpages = ceil( $total_items / $this->_per_page );
            //echo "test".$this->_per_page; exit; 
            if ( !empty( $paged ) && !empty( $this->_per_page ) ){
                $offset    = ( $paged - 1 ) * $this->_per_page;
                $limit_sql = (int)$offset.',' . (int)$this->_per_page;
            }
            
            $result = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY $order_sql LIMIT $limit_sql", ARRAY_A );    
            
            
        }
        
    
        $response = array(
            "data"  => stripslashes_deep( $result ),
            "count" => $total_items
        );
        
        
        return $response;
    }
    
    /**
     * [REQUIRED] This is the most important method
     *
     * It will get rows from database and prepare them to be showed in table
     */
    function prepare_items()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cp_newsletter_table'; // do not forget about tables prefix

        $user = get_current_user_id();
        // get the current admin screen
        $screen = get_current_screen();
        // retrieve the "per_page" option
        $screen_option = $screen->get_option('per_page', 'option');
        // retrieve the value of the option stored for the current user
        $per_page = get_user_meta($user, $screen_option, true);
        if ( empty ( $per_page) || $per_page < 1 ) {
            // get the default value if none is set
            $per_page = $screen->get_option( 'per_page', 'default' );
        } // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        // here we configure table headers, defined in our methods
        $this->_column_headers = array($columns, $hidden, $sortable);

        // [OPTIONAL] process bulk action if any
        $this->process_bulk_action();
        $response = $this->get_store_list(); 
        /*echo "<pre>";
        print_r($response);
         echo "</pre>";      */
        //exit;
        $current_page = $this->get_pagenum();
        $total_items  = $response['count'];
        
        $this->set_pagination_args( array(
            'total_items' => $total_items,
            'per_page'    => $per_page,
            'total_pages' => ceil( $total_items / $per_page ) 
        ) );

        $this->items = $response['data'];
        //$this->_column_headers = array( $columns, $hidden, $sortable );       
        
        // will be used in pagination settings
        
    }


}

function cp_newsletter_screen_options() {
 
    global $newsletter_page;
 
    $screen = get_current_screen();
 
    // get out of here if we are not on our settings page
    if(!is_object($screen) || $screen->id != $newsletter_page)
        return;
 
    $args = array(
        'label' => __('Members per page', 'cp_newsletter_table'),
        'default' => 10,
        'option' => 'newsletter_per_page'
    );
    add_screen_option( 'per_page', $args );
}

add_action( 'plugins_loaded', 'add_wpsl_screen_filter' );
function add_wpsl_screen_filter() {
    add_filter( 'set-screen-option', 'newsletter_set_screen_option', 10, 3 );
} 

function newsletter_set_screen_option($status, $option, $value) {
    if ( 'newsletter_per_page' == $option ) return $value;
}
add_filter('set-screen-option', 'newsletter_set_screen_option', 10, 3);


/**
 * List page handler
 *
 * This function renders our custom table
 * Notice how we display message about successfull deletion
 * Actualy this is very easy, and you can add as many features
 * as you want.
 *
 * Look into /wp-admin/includes/class-wp-*-list-table.php for examples
 */
function custom_table_example_persons_page_handler()
{
    global $wpdb;

    $table = new Newslteer_List_Table();
    $table->prepare_items();

    $message = '';
    if ('delete' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', 'cp_newsletter_table'), count($_REQUEST['id'])) . '</p></div>';
    }
    ?>
<div class="wrap">

    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
   
    <?php echo $message; ?>

    <form id="persons-table" method="get">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->search_box( 'search', 'search_id' );             ?>
        <?php $table->display() ?>
    </form>

</div>
<?php
}

add_action( 'init', 'csn_my_rewrite' );
function csn_my_rewrite() {
    global $wp_rewrite;
    flush_rewrite_rules();
    add_rewrite_rule('emailsub/?$', 'wp-content/plugins/cp-simple-newsletter/email-unsubscribe.php', 'top');
    
}
 







