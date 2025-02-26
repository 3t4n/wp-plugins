<?php
/*********
class function used for creating plugin tables
on activation hook
*************/
class arete_buddypress_smileys_setting
{
    function arete_create_table()
    {
        GLOBAL $wpdb;
		$version = '1.0.22';
        $settings        = $wpdb->base_prefix . 'arete_buddypress_smiley_settings';
        $smiley_save     = $wpdb->base_prefix . 'arete_buddypress_smileys';
        $smiley_bp       = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
        $charset_collate = '';
        if (!empty($wpdb->charset)) {
            $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
        }
        if (!empty($wpdb->collate)) {
            $charset_collate .= " COLLATE {$wpdb->collate}";
        }
		
			if($wpdb->get_var("SHOW TABLES LIKE '$settings'") != $settings) {
				
				$sql = "CREATE TABLE $settings (
						id mediumint(11) NOT NULL AUTO_INCREMENT,
						type VARCHAR(255) DEFAULT '' NOT NULL,
						value VARCHAR(255) DEFAULT '' NOT NULL,
						UNIQUE KEY id (id)
					) $charset_collate;";
					
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				dbDelta($sql);				
			}
			
			if($wpdb->get_var("SHOW TABLES LIKE '$smiley_save'") != $smiley_save) {
				
				$smiley    = "CREATE TABLE $smiley_save (
					id mediumint(11) NOT NULL AUTO_INCREMENT,
					image VARCHAR(255) DEFAULT '' NOT NULL,
					name VARCHAR(255) DEFAULT '' NOT NULL,
					front VARCHAR(255) DEFAULT '' NOT NULL,
					UNIQUE KEY id (id)
				) $charset_collate;";
				
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				dbDelta($smiley);				
			}
			
			if($wpdb->get_var("SHOW TABLES LIKE '$smiley_bp'") != $smiley_bp) {
				
				$bp_smiley = "CREATE TABLE $smiley_bp(
					id mediumint(11) NOT NULL AUTO_INCREMENT,
					smiley_id VARCHAR(255) DEFAULT '' NOT NULL,
					user_id VARCHAR(255) DEFAULT '' NOT NULL,
					activity_id VARCHAR(255) DEFAULT '' NOT NULL,
					timestamp VARCHAR(11) DEFAULT '' NOT NULL,	
					UNIQUE KEY id (id)
				) $charset_collate;";
				
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');	
				dbDelta($bp_smiley);				
			}	
        update_option('version', $version);
    }
}
/*********
function used for inserting default values 
in database tables on activation 
*************/
function arete_plugin_smileys()
{
    GLOBAL $wpdb;
    $settings      = $wpdb->base_prefix . 'arete_buddypress_smileys';
	$bp_setting    = $wpdb->base_prefix . 'arete_buddypress_smiley_settings';
    
	$enable_query = ai_bp_reactions_check_existance($settings, 'Like', 'like.png');
	$enable_query = ai_bp_reactions_check_existance($settings, 'Love', 'love.png');
	$enable_query = ai_bp_reactions_check_existance($settings, 'Thankful', 'thankful.png');
	$enable_query = ai_bp_reactions_check_existance($settings, 'Ha Ha', 'haha.png');
	$enable_query = ai_bp_reactions_check_existance($settings, 'Wow', 'wow.png');
	$enable_query = ai_bp_reactions_check_existance($settings, 'Sad', 'sad.png');
	$enable_query = ai_bp_reactions_check_existance($settings, 'Angry', 'angry.png');
	
	$enable_query = ai_bp_reactions_settings_check_existance($bp_setting , 'favorite', "0");
}

/****************
function for check 
reactions value already
exist in table.
***************/
function ai_bp_reactions_check_existance($table, $name, $image)
{
	GLOBAL $wpdb;
	$exist=$wpdb->get_var("SELECT id from $table WHERE name='$name'");
	if(empty($exist))
	{
		$wpdb->insert($table, array(
			'id' => "",
			'name' =>$name,
			'image' =>$image,
			'front' => 'checked'
		), array(
			'%d',
			'%s',
			'%s',
			'%s'
		));
	}
}

/****************
function for check
if value already exist 
in table.
***************/
function ai_bp_reactions_settings_check_existance($table, $condition, $value)
{
	GLOBAL $wpdb;
	$condition =trim($condition);
	$exist=$wpdb->get_var("SELECT id from $table WHERE type='$condition'");
	if(empty($exist))
	{
		$wpdb->insert($table,array('id'=>"",'type'=>$condition,'value'=>$value),array('%d','%s','%s'));
	}
}

/*********
function used for drop and truncate 
database tables on deactivation 
*************/
function arete_plugin_smileys_truncate()
{
    global $wpdb;
    $settings  = $wpdb->base_prefix . 'arete_buddypress_smileys';
	$bp_setting   = $wpdb->base_prefix . 'arete_buddypress_smiley_settings';
    $wpdb->query("DROP TABLE IF EXISTS $settings");
    $wpdb->query("DROP TABLE IF EXISTS $bp_setting");
}

/*********
function for enqueue js files
*************/
function arete_load_ai_bp_js_smiley()
{
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script('arete-custom_ai_bp_reactions', plugins_url('js/ai_bp_reactions_custom.js', dirname(__FILE__)));
}

/*********
function for enqueue style files
*************/
function arete_load_ai_bp_css_smiley()
{
    wp_enqueue_style('arete-custom-style_admin', plugins_url('css/ai_bp_reactions_custom.css', dirname(__FILE__)));
}

add_action('admin_enqueue_scripts', 'arete_load_ai_bp_js_smiley');
add_action('admin_enqueue_scripts', 'arete_load_ai_bp_css_smiley');
/*********
function for enqueue style and js files in front end
*************/
function ai_bp_smiley_pro_f_scripts()
{
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script('arete-act-react-jquery-mobile', plugins_url('js/ai_bp_reactions_jquery.touch.min.js', dirname(__FILE__)));		
    wp_enqueue_script('arete-custom_ai_front_smiley', plugins_url('js/ai_bp_reactions_custom.js', dirname(__FILE__)));
    wp_enqueue_script('arete-custom_ai_front_tipsy', plugins_url('js/ai_bp_reactions_jquery.tipsy-min.js', dirname(__FILE__)));
    wp_enqueue_script('arete-custom_ai_bp_reactions_lightbox', plugins_url('js/ai_bp_reactions_vex.combined.min.js', dirname(__FILE__)));	
    wp_enqueue_style('arete-custom-style_front_smiley', plugins_url('css/ai_bp_reactions_custom.css', dirname(__FILE__)));
    wp_enqueue_style('arete-custom-style_tipsy', plugins_url('css/ai_bp_reactions_tipsy.min.css', dirname(__FILE__))); 
	wp_enqueue_style('arete-custom_ai_bp_reactions_lightbox_main_css', plugins_url('css/ai_bp_reactions_vex.css', dirname(__FILE__)));
	wp_enqueue_style('arete-custom_ai_bp_reactions_lightbox_css', plugins_url('css/ai_bp_reactions_vex-theme-flat-attack.css', dirname(__FILE__)));
}
add_action('wp_enqueue_scripts', 'ai_bp_smiley_pro_f_scripts');

/*****
function for animation
css according to reaction 
count
******/
function ai_bp_main_animation_css()
{
	GLOBAL $wpdb;
	if ( ! is_admin() ) 
	{ 
		$html="";
		$ob_temp= new ai_bp_manage_reactions_temp;
		$total_reactions=json_decode(ai_bp_get_main_animation_css_mod());
		$single_count=$total_reactions->reactions_count;
		for($i=1; $i<=$single_count; $i++)
		{
			$animation_style=json_decode($ob_temp->ai_bp_reactions_animation_css_temp($i));
			$html.= $animation_style->html;
		}
		return $html;
	}
}


/*********
wordpress class extended to show smileys 
in admin panel form where administrator
manage smileys 
*************/
class ai_bp_activity_list_table_class_extend extends WP_List_Table
{
    public $main_data;
    public $type;
    /** ************************************************************************
     * Normally we would be querying data from a database and manipulating that
     * for use in your list table. For this example, we're going to simplify it
     * slightly and create a pre-built array. Think of this as the data that might
     * be returned by $wpdb->query().
     * 
     * @var array 
     **************************************************************************/
    public static function ai_get_smiley($per_page, $page_number = 1)
    {
        global $wpdb;
        $main_data = array();
        $result    = "";
        $sql = "SELECT * FROM {$wpdb->base_prefix}arete_buddypress_smileys";
        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }
        if (!empty($per_page)) {
            $sql .= " LIMIT $per_page";
            $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;
        }
        $result = $wpdb->get_results($sql);
		$count =1;
        foreach ($result as $val) {
            $image = $val->image;
          
            $image_plugin = plugins_url('activity-reactions-for-buddypress/img/') . $image;
			$main_data[] = array(
				'smiley' => $image_plugin,
				'name' => $val->name,
				'id' => $val->id,
				'action'=> $val->front,
				'serial' =>$count
			);
			$count++;
        }
        return $main_data;
    }
    public static function ai_bp_reactions_delete_this_record($main_id, $type)
    {
        global $wpdb;
        $db = $wpdb->base_prefix . 'arete_buddypress_smileys';
        $wpdb->delete($db, array(
            'id' => $main_id
        ), array(
            '%d'
        ));
    }
    
    /** ************************************************************************
     * REQUIRED. Set up a constructor that references the parent constructor. We 
     
     * use the parent reference to set some default configs.
     ***************************************************************************/
    function __construct()
    {
        global $status, $page;
        //Set parent defaults
        parent::__construct(array(
            'singular' => 'main_id', //singular name of the listed records
            'plural' => 'main_ids', //plural name of the listed records
            'ajax' => false //does this table support ajax?
        ));
    }
    /** ************************************************************************
     * Recommended. This method is called when the parent class can't find a method
     * specifically build for a given column. Generally, it's recommended to include
     * one method for each column you want to render, keeping your package class
     * neat and organized. For example, if the class needs to process a column
     * named 'title', it would first see if a method named $this->column_title() 
     * exists - if it does, that method will be used. If it doesn't, this one will
     * be used. Generally, you should try to use custom column methods as much as 
     * possible.
     *
     * Since we have defined a column_title() method later on, this method doesn't
     * need to concern itself with any column with a name of 'title'. Instead, it
     * needs to handle everything else.
     * 
     * For more detailed insight into how columns are handled, take a look at 
     * WP_List_Table::single_row_columns()
     * 
     * @param array $item A singular item (one full row's worth of data)
     * @param array $column_name The name/slug of the column to be processed
     * @return string Text or HTML to be placed inside the column <td>
     **************************************************************************/
    function column_default($item, $column_name)
    {
        $type = $this->type;
        if ($type == "smiley") {
            switch ($column_name) {
                case 'serial':
                case 'name':
                    return $item[$column_name];
                case 'smiley':
                    $img = '<img  src="' . esc_url($item[$column_name]) . '" height="60" width="60"/>';
                    return $img;
                case 'action':
					$html ='';
					if($item['id'] != 1)
					{
						if($item[$column_name] == "checked")
						{
							$html .= '<input type="checkbox" name="ai_front" class="ai_front" checked value="1" ai_id='.$item['id'].'>';
						}
						else
						{
							$html .= '<input type="checkbox" name="ai_front" class="ai_front" value="0" ai_id='.$item['id'].'>';
						}
					}
                    return $html;
                default:
                    return print_r($item, true); //Show the whole array for troubleshooting purposes
            }
        }
    }
    /** ************************************************************************
        * Recommended. This is a custom column method and is responsible for what
    
    * is rendered in any column with a name/slug of 'title'. Every time the class
    
    * needs to render a column, it first looks for a method named 
    
    * column_{$column_title} - if it exists, that method is run. If it doesn't
    
    * exist, column_default() is called instead.
    
    * 
    
    * This example also illustrates how to implement rollover actions. Actions
    
    * should be an associative array formatted as 'slug'=>'link html' - and you
    
    * will need to generate the URLs yourself. You could even ensure the links
    
    * 
    
    * 
    * @see WP_List_Table::::single_row_columns()
    
    * @param array $item A singular item (one full row's worth of data)
    
    * @return string Text to be placed inside the column <td> (main_id title only)
    
    **************************************************************************/
    function column_title($item)
    {
    }
    /** ************************************************************************
    
    * REQUIRED if displaying checkboxes or using bulk actions! The 'cb' column
    * is given special treatment when columns are processed. It ALWAYS needs to
    * have it's own method.
    
    * 
    
    * @see WP_List_Table::::single_row_columns()
    
    * @param array $item A singular item (one full row's worth of data)
    
     * @return string Text to be placed inside the column <td> (main_id title only)
    
    **************************************************************************/
    function column_cb($item)
    {
        $type = $this->type;
        if ($type == "smiley") {
            $main_id = $item['id'];
        }
        return sprintf('<input type="checkbox" name="%1$s[]" value="%2$s" />', /*$1%s*/ $this->_args['singular'], //Let's simply repurpose the table's singular label ("main_id")
            /*$2%s*/ $main_id //The value of the checkbox should be the record's id
            );
    }
    function get_columns()
    {
        $type = $this->type;
        if ($type == "smiley") {
            $columns = array(
				'serial' =>'S.No',
                'name' => 'Name',
                'smiley' => 'Smiley',
				'action' => 'Status (only checked reactions are displayed to be used)',
            );
        }
        return $columns;
    }
       
     /** **************************************************************************/
    function ai_bp_get_sortable_columns($type)
    {
        if ($type == "smiley") {
            $sortable_columns = array(
			'name' => array('name',false),//true means it's already sorted
            );
        }
        return $sortable_columns;
    }
    /** ************************************************************************
    
    * Optional. If you need to include bulk actions in your list table, this is
    
    * the place to define them. Bulk actions are an associative array in the format
    
    * 'slug'=>'Visible Title'
    
    * If this method returns an empty value, no bulk action will be rendered. If
    
    * you specify any bulk actions, the bulk actions box will be rendered with
    
    * the table automatically on display().
    
    * 
    
    * Also note that list tables are not automatically wrapped in <form> elements,
    
    * so you will need to create those manually in order for bulk actions to function.
    
    * 
    
    * @return array An associative array containing all the bulk actions: 'slugs'=>'Visible Titles'
    
    * Optional. You can handle your bulk actions anywhere or anyhow you prefer.
    
    * For this example package, we will handle it in the class to keep things
    
        * clean and organized.
    
    * @see $this->prepare_items()
    
    **************************************************************************/
    function process_bulk_action()
    {
        //Detect when a bulk action is being triggered..
        if ('delete' === $this->current_action()) {
            if (!empty($_REQUEST['main_id'])) {
                foreach ($_REQUEST['main_id'] as $main_id) {
                    //$video will be a string containing the ID of the video
                    //i.e. $video = "123";
                    //so you can process the id however you need to.
                    $type = $this->type;
                    $this->ai_bp_reactions_delete_this_record($main_id, $type);
                }
            }
        }
    }
    /** ************************************************************************
    * REQUIRED! This is where you prepare your data for display. This method will
    * usually be used to query the database, sort and filter the data, and generally
    * get it ready to be displayed. At a minimum, we should set $this->items and
    * $this->set_pagination_args(), although the following properties and methods
    * are frequently interacted with here...
    * @global WPDB $wpdb
    * @uses $this->_column_headers
    * @uses $this->items
    * @uses $this->get_columns()
    * @uses $this->get_sortable_columns()
    * @uses $this->get_pagenum()
    
    * @uses $this->set_pagination_args()
        **************************************************************************/
    function ai_bp_prepare_items($type, $id)
    {
        global $wpdb; //This is used only if making any database queries
        $this->type            = $type;
        /**
         * First, lets decide how many records per page to show
        
        */
        $per_page              = 20;
        /**
        * REQUIRED. Now we need to define our column headers. This includes a complete
        
        * array of columns to be displayed (slugs & titles), a list of columns
        
        * to keep hidden, and a list of columns that are sortable. Each of these
        
        * can be defined in another method (as we've done here) before being
        
        * used to build the value for our _column_headers property.
        
        */
        $columns               = $this->get_columns();
        $hidden                = array();
        $sortable              = $this->ai_bp_get_sortable_columns($type);
        $filter                = $this->ai_bp_get_sortable_columns($type);
        /**
        
        * REQUIRED. Finally, we build an array to be used by the class for column 
        
        * headers. The $this->_column_headers property takes an array which contains
        
        * 3 other arrays. One for all columns, one for hidden columns, and one
        
        * for sortable columns.
        
        */
        $this->_column_headers = array(
            $columns,
            $hidden,
            $sortable
        );
        /**
        
        * Optional. You can handle your bulk actions however you see fit. In this
        
        * case, we'll handle them within our package just to keep things clean.
        
        */
        $this->process_bulk_action();
        /**
        * Instead of querying a database, we're going to fetch the example data
        
        * property we created for use in this plugin. This makes this example 
                
        * package slightly different than one you might build on your own. In 
        
        * this example, we'll be using array manipulation to sort and paginate 
        
        * our data. In a real-world implementation, you will probably want to 
        
        * use sort and pagination data to build a custom query instead, as you'll
        
        * be able to use your precisely-queried data immediately.
        
        */
        if ($type == "smiley") {
            $data = $this->ai_get_smiley("", 1);
        }
        /***********************************************************************
        
        * ---------------------------------------------------------------------
        
        * vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
        
        * In a real-world situation, this is where you would place your query.
        
        * For information on making queries in WordPress, see this Codex entry:
        
        * http://codex.wordpress.org/Class_Reference/wpdb
        
        
        **********************************************************************/
        /**
        
        * REQUIRED for pagination. Let's figure out what page the user is currently 
        
        * looking at. We'll need this later, so you should always include it in 
        
        * your own package classes.
        
        */
        $current_page = $this->get_pagenum();
        /**
        
        * REQUIRED for pagination. Let's check how many items are in our data array. 
        
        * In real-world use, this would be the total number of items in your database, 
        
        * without filtering. We'll need this later, so you should always include it 
        
        * in your own package classes.
        
        */
        $total_items  = count($data);
        /**
        * The WP_List_Table class does not handle pagination for us, so we need
        
        * to ensure that the data is trimmed to only the current page. We can use
        
        * array_slice() to 
        */
        $data         = array_slice($data, (($current_page - 1) * $per_page), $per_page);
        /**
        * REQUIRED. Now we can add our *sorted* data to the items property, where 
        
        * it can be used by the rest of the class.
        
        */
        $this->items  = $data;
        /**
        * REQUIRED. We also have to register our pagination options & calculations.
        
        */
        $this->set_pagination_args(array(
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page' => $per_page, //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items / $per_page) //WE have to calculate the total number of pages
        ));
    }
}

/*****************
function by which smileys shows 
on front end activity panel
********************************/
function ai_bp_reactions_html()
{
    global $wpdb;
    $image_plugin = plugins_url('activity-reactions-for-buddypress/img/') . "unlike.png";
    $user_id      = intval(get_current_user_id());
    $activity_id  = intval(bp_get_activity_id());
    $table        = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
    $smiley_table = $wpdb->base_prefix . 'arete_buddypress_smileys';
    $html = '<div id="ai_ar_main"><div id="ai_main_activity_reaction">';
    $current_user_id  = intval(get_current_user_id());
    $user_query       = $wpdb->get_results("select * from $table where activity_id='$activity_id' and user_id='$current_user_id'");
    $user_query_count = $wpdb->num_rows;
    if ($user_query && $wpdb->num_rows <> 0) {
        foreach ($user_query as $user_check) {
            $userid = intval($user_check->user_id);
            if ($userid == $current_user_id) {
                $current_user_smiley = intval($user_check->smiley_id);
                $html .= ai_user_smiley($current_user_smiley, $userid);
            }
        }
    }
    $non_user_query = $wpdb->get_results("select * from $table where activity_id='$activity_id' and user_id !='$current_user_id'");
    if ($non_user_query && $wpdb->num_rows <> 0) {
        if ($user_query_count == 0) {
            $html .= '
			<div class="ai_bp_reactions_default_cont">
			<a href="" class="ai_bp_reactions_default ai_emo_button">
				<img src="' . esc_url($image_plugin) . '" class="smiley_img" smiley_id="1"></img>
				<span>Like</span>
			</a>
			</div>
			<div class="ai_bp_reactions_loader">
				<a href="" class="ai_emo_button">
					<i class="ai-bp-ajax-loading-icon ai-bp-icon ai-bp-icon-refresh ai-bp-icon-spin"></i>
				</a>
			</div>';
        }
        $username     = array();
        $smiley_check = array();
		$html.="<div class='ai_bp_reactions_overcome'>";
        foreach ($non_user_query as $user_check) {
            $userid    = intval($user_check->user_id);
            $smiley_id = intval($user_check->smiley_id);
            if (in_array($smiley_id, $smiley_check)) {
            } else {
                $check_users = ai_check_users($smiley_id, $activity_id);
                $html .= ai_other_user_smiley_activity($check_users, $smiley_id, $userid);
            }
            $smiley_check[] = $smiley_id;
        }
		$html.="</div>";
    }
    $query = $wpdb->get_results("select * from $table where activity_id='$activity_id'");
    $arr   = $wpdb->num_rows;
    if (empty($arr)) {
        $html .= '
		<div class="ai_bp_reactions_default_cont">
			<a href="" class="ai_bp_reactions_default ai_emo_button">
				<img src="' . esc_url($image_plugin) . '" class="smiley_img" smiley_id="1">
				<span>Like</span>
			</a>
		</div>
		<div class="ai_bp_reactions_loader">
			<a href="" class="ai_emo_button">
				<i class="ai-bp-ajax-loading-icon ai-bp-icon ai-bp-icon-refresh ai-bp-icon-spin"></i>
			</a>
		</div>';
    }
    $count = "";
    if (!empty($arr) && is_numeric($arr)) {
        $count = intval($arr);
    } else {
        $count = '';
    }
	$selected_name = ai_get_selected_users_name($activity_id);
    $html .= '<div class="ai_bp_reactions_counter"><a href="#" class="expand ai_emo_button ai_acb_counter" id="ai_counter" title="' . esc_attr($selected_name) .'" ><span class="ai_emo_counter">' . $count . '</span></a></div>';
    $html .= "</div>".ai_get_already_checked($activity_id)."</div>";
    echo $html;
}
add_filter('bp_activity_entry_meta', 'ai_bp_reactions_html');

function ai_bp_reactions_non_logged_in()
{
    global $wpdb;
    $activity_id  = intval(bp_get_activity_id());
    $table        = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
    $smiley_table = $wpdb->base_prefix . 'arete_buddypress_smileys';
     $html = '<div id="ai_main_activity_reaction">';
    $non_user_query = $wpdb->get_results("select * from $table where activity_id='$activity_id'");
    if ($non_user_query && $wpdb->num_rows <> 0) {
       
        $username     = array();
        $smiley_check = array();
		$html.="<div class='ai_bp_reactions_overcome'>";
        foreach ($non_user_query as $user_check) {
            $userid    = intval($user_check->user_id);
            $smiley_id = intval($user_check->smiley_id);
            if (in_array($smiley_id, $smiley_check)) {
            } else {
                $check_users = ai_check_users($smiley_id, $activity_id);
                $html .= ai_other_user_smiley_activity($check_users, $smiley_id, $userid);
            }
            $smiley_check[] = $smiley_id;
        }
		$html.="</div>";
    }
    $query = $wpdb->get_results("select * from $table where activity_id='$activity_id'");
    $arr   = $wpdb->num_rows;
    $count = "";
    if (!empty($arr) && is_numeric($arr)) {
        $count = $arr;
    } else {
        $count = '';
    }
	$selected_name = ai_get_selected_users_name($activity_id);
    $html .= '<div class="ai_bp_reactions_counter"><a href="#" class="expand ai_emo_button ai_acb_counter" id="ai_counter" title="' . esc_attr($selected_name) .'" ><span class="ai_emo_counter">' . $count . '</span></a></div></div>';
    echo $html;
}

function ai_not_logged_in()
{
	if(is_user_logged_in())
	{
	}
	else
	{
		add_filter('bp_activity_entry_content', 'ai_bp_reactions_non_logged_in');
	}
}
add_action( 'init', 'ai_not_logged_in' );

/*****************
function for getting users name 
who selected smileys on activity
showed on hover count  
******************************/
function ai_get_selected_users_name($activity_id)
{
	global $wpdb;
	$table        = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
	$sql = "SELECT * FROM {$wpdb->base_prefix}arete_buddypress_smileys_manage where activity_id='$activity_id' ORDER BY id desc limit 10 ";
    $result   = $wpdb->get_results($sql);
	//$username = array();
	$username ="";
    $user_id  = get_current_user_id();
    foreach ($result as $val) {
        $userid = $val->user_id;
		$user_info  = get_userdata($userid);
		$username .= $user_info->user_login.'</br>';
    }
    return $username;
}
/*****************
function for checking which smiley 
selected by users and get there name in an array 
******************************/
function ai_check_users($smiley_id, $activity_id)
{
    global $wpdb;
    $sql = "SELECT * FROM {$wpdb->base_prefix}arete_buddypress_smileys_manage where smiley_id='$smiley_id' and activity_id='$activity_id'";
    $result   = $wpdb->get_results($sql);
    $username = array();
    $user_id  = get_current_user_id();
    foreach ($result as $val) {
        $userid = $val->user_id;
        if ($user_id != $userid) {
            $user_info  = get_userdata($userid);
            $username[] = $user_info->user_login;
        }
    }
    $usernames = convert_array_to_string_smiley($username);
    return $usernames;
}
/*****************
function for checking logged-in user 
selected smiley
******************************/
function ai_user_smiley($current_user_smiley, $userid)
{
    global $wpdb;
    $sql = "SELECT * FROM {$wpdb->base_prefix}arete_buddypress_smileys where id='$current_user_smiley'";
    $result = $wpdb->get_results($sql);
	$html ="";
    foreach ($result as $val) {
        $id          = intval($val->id);
        $name_smiley = $val->name;
        $image       = $val->image;
        $image_plugin = esc_url(plugins_url('activity-reactions-for-buddypress/img/') . $image);
        $html.= '
		<div class="ai_bp_reactions_default_cont">
			<a href="" class="ai_bp_reactions_default ai_emo_button" selected="selected">
				<img src="' . esc_url($image_plugin) . '" class="smiley_img" smiley_id="' . $id . '"></img>
				<span>' . esc_html($name_smiley) . '</span>
			</a>
		</div>
		<div class="ai_bp_reactions_loader">
			<a href="" class="ai_emo_button">
				<i class="ai-bp-ajax-loading-icon ai-bp-icon ai-bp-icon-refresh ai-bp-icon-spin"></i>
			</a>
		</div>';
    }
    return $html;
}
/*****************
function for checking smileys 
selected by non-logged in users   
******************************/
function ai_other_user_smiley_activity($check_users, $smiley_id, $userid)
{
    global $wpdb;
    $sql = "SELECT * FROM {$wpdb->base_prefix}arete_buddypress_smileys where id='$smiley_id'";
    $result = $wpdb->get_results($sql);
	$html ="";
    foreach ($result as $val) {
        $id          = intval($val->id);
        $name_smiley = $val->name;
        $image       = $val->image;
    
        $image_plugin = esc_url(plugins_url('activity-reactions-for-buddypress/img/') . $image);
        $html .= '<a href smiley_id="' . $id . '" class="ai_bp_reactions_acted ai_emo_button ai_other_popup expand" title="' . esc_attr($name_smiley) .'"><img src="' . esc_url($image_plugin) . '" class="smiley_img" smiley_id="' . $id . '" "></a>';
    }

    return $html;
}
/*****************
function for showing all smileys 
******************************/
function ai_get_smiley()
{
    global $wpdb;
    $main_data = array();
    $result    = "";
    $sql = "SELECT * FROM {$wpdb->base_prefix}arete_buddypress_smileys";
    $result = $wpdb->get_results($sql);
    $html = "<div class='main_smiley_div' style='display:none;'><ul id='smileys'>";
    $count   = 0;
    $user_id = get_current_user_id();
    foreach ($result as $val) {
            $id          = $val->id;
            $name_smiley = $val->name;
            $image       = $val->image;
			$check       = $val->front;
            $image_plugin = esc_url(plugins_url('activity-reactions-for-buddypress/img/') . $image);
			if($check == 'checked')
			{
				$html .= '<li><a href smiley_id="' . $id . '" user_id="' . $user_id . '" class="ai_bp_reactions expand" title="' . esc_attr($name_smiley) . '-"><img src="' . esc_url($image_plugin) . '" class="smiley_img" smiley_id="' . $id . '"></a></li>';
			}
            $count++;
    }
    $html .= '</ul></div>';
    echo $html;
}

/*****************
function to get single reaction 
******************************/
function ai_get_single_reaction($reaction_id)
{
    global $wpdb;
    $main_data = array();
    $result    = "";
    $sql = "SELECT * FROM {$wpdb->base_prefix}arete_buddypress_smileys WHERE id='$reaction_id'";
    $result = $wpdb->get_results($sql);
    $html = "<span class='ai_single_reaction'>";
    $user_id = get_current_user_id();
    foreach ($result as $val) {
		$id          = $val->id;
		$name_smiley = $val->name;
		$image       = $val->image;
		$check       = $val->front;
		$image_plugin = esc_url(plugins_url('activity-reactions-for-buddypress/img/') . $image);

		$html .= '<a href smiley_id="' . $id . '" user_id="' . $user_id . '" class="ai_reaction_inner" title="' . esc_attr($name_smiley) . '-"><img src="' . esc_url($image_plugin) . '" class="ai_reaction_image" smiley_id="' . $id . '" user_id="' . $user_id . '"></a>';
    }
    $html .= '</span>';
	return $html;
}
/*****************
function for showing smileys 
div which showed on hover like ai_emo_button
******************************/
function ai_get_already_checked($activity_id)
{
    global $wpdb;
    $main_data = array();
    $result    = "";
    $sql = "SELECT * FROM {$wpdb->base_prefix}arete_buddypress_smileys";
    $result = $wpdb->get_results($sql);
    $html = "";
    $count   = 0;
	$main_count = 1;
    $user_id = intval(get_current_user_id());
    foreach ($result as $val) {
		$id          = intval($val->id);
		$name_smiley = $val->name;
		$image       = $val->image;
		$check       = $val->front;
		$image_plugin = esc_url(plugins_url('activity-reactions-for-buddypress/img/') . $image);
		if($check == 'checked')
		{
			if (check_ai_bp_reactions_default($id, $activity_id, $user_id) == "exist") {
				$html .= ai_get_selected_smiley($id, $activity_id, $user_id, $image_plugin, $name_smiley,$count);
			} else {
				$html .= '<li><a href smiley_id="' . $id . '" user_id="' . $user_id . '" class="ai_bp_reactions expand" title="' . esc_attr($name_smiley) . '"><img src="' . esc_url($image_plugin) . '" class="smiley_img ai_'.$count.'" smiley_id="' . $id . '"></a></li>';
			}
			$main_count++;
		}
		$count++;
    }
	$final_width=$main_count*42;
    return "<div class='main_smiley_div' style='display:none;'><ul style='width:".$final_width."px' id='ai_bp_ul'>".$html."</ul></div>";
}
/*****************
function for adding selected attribute 
in smileys which was already selected by
current user
******************************/
function ai_get_selected_smiley($id, $activity_id, $user_id, $image_plugin, $name_smiley,$count)
{
    global $wpdb;
    $table       = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
    $query_count = $wpdb->get_results("select * from $table where activity_id='$activity_id' and smiley_id='$id' and user_id='$user_id'");
    $username = array();
    $html = '';
    if ($query_count && $wpdb->num_rows <> 0)
	{
        foreach ($query_count as $val) 
		{
            $userid = intval($val->user_id);
            $user_info  = get_userdata($userid);
            $username[] = $user_info->user_login;
			$html .= '<li><a href smiley_id="' . $id . '" user_id="' . $user_id . '" class="ai_bp_reactions expand" title="' . esc_attr($name_smiley) .'" selected="selected"><img src="' . esc_url($image_plugin) . '" class="smiley_img ai_'.$count.'" smiley_id="' . $id . '"></a></li>';
        }
	 }
    return $html;
}
/*****************
function for checking smileys showed 
in div is selected or not 
******************************/
function check_ai_bp_reactions_default($id, $activity_id, $user_id)
{
    global $wpdb;
    $table       = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
    $query_count = $wpdb->get_results("select * from $table where activity_id='$activity_id' and smiley_id='$id' and user_id='$user_id'");
	$html ='';
    if ($query_count && $wpdb->num_rows <> 0) {
        $html .= "exist";
    } else {
        $html .= "not exist";
    }
    return $html;
}
/*****************
function converting array to string 
******************************/
function convert_array_to_string_smiley($array)
{
    $comma_separated = implode(",", $array);
    return $comma_separated;
}
/*****************
function worked through ajax when 
user selected or deleted selected smiley 
form activity
******************************/
add_action('wp_ajax_ai_get_activity_reactions_list', 'ai_get_activity_reactions_list');
add_action('wp_ajax_nopriv_ai_get_activity_reactions_list', 'ai_get_activity_reactions_list');
function ai_get_activity_reactions_list()
{
		GLOBAL $wpdb;
		$result=array();
		$html="<div class='ai_recent_reactions_list'><div class='ai_recent_reaction_users'><h5>Recent 10 users who reacted to this activity update</h5></div><ul>";
		$activity_id = intval(str_replace("activity-","",$_REQUEST['activity_id']));	
        $table = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
		$query_check = $wpdb->get_results("select * from $table where activity_id='$activity_id'");
		if($query_check && $wpdb->num_rows <> 0)
		{	foreach ($query_check as $user_check) {
				$user_id=$user_check->user_id;
				$reaction_id=$user_check->smiley_id;
				$user_info  = get_userdata($user_id);
				$username	= $user_info->user_login;	
				$html.="<li><a href='#'>".$username."</a>".ai_get_single_reaction($reaction_id)."</li>";
			}
		}
		$html.="</ul></div>";
		
		$result['html']=$html;
		echo json_encode($result);
		die();
}
/*****************
function worked through ajax when 
user selected or deleted selected smiley 
form activity
******************************/
add_action('wp_ajax_ai_bp_reactions_manage_reactions', 'ai_bp_reactions_manage_reactions');
function ai_bp_reactions_manage_reactions()
{
    GLOBAL $wpdb;
	$smiley_id  = intval($_REQUEST['id']);
	$user_id    = intval(get_current_user_id());
	$activity_id = intval($_REQUEST['activity_id']);
    $time  = time();
	$table = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
	
		// to check if there is any reaction for this activity by this user
		
		$activity_check = ai_bp_reaction_check_row("arete_buddypress_smileys_manage","smiley_id",array("activity_id"=>$activity_id,"user_id"=>$user_id),"AND"); 
		if($activity_check==true)
		{
			$reaction_check = ai_bp_reaction_check_row("arete_buddypress_smileys_manage","smiley_id",array("activity_id"=>$activity_id,"user_id"=>$user_id,"smiley_id"=>$smiley_id),"AND");
			if($reaction_check==true)
			{
						/******delete buddypress notification******/
						if((!in_array( 'bbpress/bbpress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )))))
						{
							$activity_user_id=ai_bp_reactions_get_single_details("bp_activity", "user_id", "id", $activity_id);
							bp_notifications_delete_notifications_by_item_id( $activity_user_id, $activity_id, "reaction", "ai_reaction_bp", $user_id );
						}
						$table = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
						$wpdb->delete($table, array('smiley_id' => $smiley_id,'user_id' => $user_id,'activity_id' => $activity_id), array('%s','%s','%s'));
							
						$arr  = ai_bp_reaction_compile_results($user_id,$activity_id,$smiley_id,"unreact");
	
						echo $arr;				
			}
			else
			{
				$wpdb->update($table,array( 'smiley_id' => $smiley_id), array( 'activity_id' =>$activity_id,'user_id'=>$user_id ), array( '%s'), array( '%d','%d' ) );
				
				/******save buddypress notification******/
				if((!in_array( 'bbpress/bbpress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )))))
				{
					$activity_user_id=ai_bp_reactions_get_single_details("bp_activity", "user_id", "id", $activity_id);
					if($activity_user_id != $user_id)
					{	
						ai_bp_reaction_activity_liked_notification( $activity_user_id, $activity_id,$user_id );
					}
				}		
						$arr  = ai_bp_reaction_compile_results($user_id,$activity_id,$smiley_id,"react");
	
						echo $arr;					
			}	
		}
		else
		{
			$wpdb->insert($table, array('id' => "",'smiley_id' => $smiley_id,'user_id' => $user_id,'activity_id' => $activity_id,'timestamp' => $time),array('%d','%s','%s','%s','%s'));

			/******save buddypress notification******/
			if((!in_array( 'bbpress/bbpress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )))))
			{
				$activity_user_id=ai_bp_reactions_get_single_details("bp_activity", "user_id", "id", $activity_id);
				if($activity_user_id != $user_id)
				{	
					ai_bp_reaction_activity_liked_notification( $activity_user_id, $activity_id,$user_id );
				}
			}		
						$arr  = ai_bp_reaction_compile_results($user_id,$activity_id,$smiley_id,"react");
	
						echo $arr;			
		}



    die();
}
/*****************
function for storing admin-ajax url
******************************/
add_action('wp_footer', 'ai_footer_custom_codes');
function ai_footer_custom_codes()
{
	$user_id  = get_current_user_id();
    
	$user_info  = get_userdata($user_id);
	$username = $user_info->user_login;
	
    $content = "";
    $content .= '<input check=" " type="hidden" name="web_url" class="web_url" value="' . esc_url(admin_url('admin-ajax.php')) . '"/><input check=" " type="hidden" name="ai_logged_in_user" class="ai_logged_in_user" value="' .esc_html($username). '"/><input check=" " type="hidden" name="ai_home_url" class="ai_home_url" value="' . esc_url(get_site_url()) . '"/>';
    echo $content;
}
/*****************
function getting single details from any table
******************************/
function ai_bp_reactions_get_single_details($table, $field, $condition, $value)
{
    global $wpdb;
    $db     = $wpdb->base_prefix . $table;
    $select = $wpdb->get_row("SELECT $field FROM {$db} where $condition='$value'");
    return $result = $select->$field;
}
/*****************
function for saving checked and unchecked 
smileys in table
only checked smileys showed in front end
******************************/
add_action('wp_ajax_ai_front_smiley', 'ai_front_smiley');

function ai_front_smiley()
{
	$smiley_id   = $_REQUEST['id'];
    $check_value  = $_REQUEST['check_value'];
    GLOBAL $wpdb;
	$table =$wpdb->base_prefix .'arete_buddypress_smileys';
	if($check_value == '1')
	{
		 $wpdb->update( $table,array( 'front' => 'unchecked'), array( 'id' =>$smiley_id ), array( '%s'), array( '%d' ) );
	}
	else
	{
		 $wpdb->update( $table,array( 'front' => 'checked'), array( 'id' =>$smiley_id ), array( '%s'), array( '%d' ) );
	}
	die();
}

/****get checked total reactions count****/
function ai_bp_get_main_animation_css_mod()
{
	GLOBAL $wpdb;
	$result = array();
	$sql= "SELECT * FROM {$wpdb->base_prefix}arete_buddypress_smileys WHERE front='checked' order by id asc";
	$query = $wpdb->get_results($sql);
	$count = $wpdb->num_rows;
	$result['reactions_count']=$count;
	return json_encode($result);	
}

/**********
functions for remove 
favorite button from buddypress 
activities
************/
function bp_admin_bar_render_remove_favorites() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('my-account-activity-favorites');
}

add_action("init","ai_check_bp_favorite");
function ai_check_bp_favorite()
{
	 $favorite = intval(ai_bp_reactions_get_single_details('arete_buddypress_smiley_settings', 'value', 'type', 'favorite'));
	 if($favorite == '1')
	 {
		add_filter( 'bp_activity_can_favorite', '__return_false' );
		add_filter( 'bp_get_total_favorite_count_for_user', '__return_false' );
		add_action( 'wp_before_admin_bar_render', 'bp_admin_bar_render_remove_favorites' );
	 }
}

/********notification functions**********/

/*******
notifications filter
*********/
if(! in_array( 'bbpress/bbpress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )))) 
{
	add_filter( 'bp_notifications_get_registered_components', 'ai_bp_reaction_notification_component' ); 
	add_filter( 'bp_notifications_get_notifications_for_user', 'ai_bp_reaction_custom_format_buddypress_notifications' , 1, 5 );
}

/*****
notification componenet
for buddypress
*****/
function ai_bp_reaction_notification_component( $component_names = array() ) 
{
	// Force $component_names to be an array
	if ( ! is_array( $component_names ) ) 
	{
		$component_names = array();
	}
	// Add 'custom' component to registered components array
	array_push( $component_names, 'reaction' );
	// Return component's with 'custom' appended
	return $component_names;
}

function ai_bp_reaction_custom_format_buddypress_notifications( $action, $item_id, $secondary_item_id, $total_items, $format = 'string' ) 
{
	// New custom notifications
	if ( 'ai_reaction_bp' === $action ) 
	{
		$reacted_user    = bp_core_get_user_displayname( $secondary_item_id );

		$custom_text = $reacted_user . ' reacted on your activity ';
		$custom_link  =  bp_activity_get_permalink( $item_id);

                if ( (int) $total_items > 1 ) {
	                        $text   = sprintf( __( 'You have %d new reactions to your updates', 'bbpress' ), (int) $total_items );
	                        $filter = 'ai_bp_multiple_new_reactions';
	                } else {
	                        if ( !empty( $secondary_item_id ) ) {
	                                $text = sprintf( __( '%s reacted on your activity update'), $reacted_user, $custom_text );
	                        } else {
	                                $text = sprintf( __( '%s You have a reaction to your acitivty update'), "", $custom_text );
	                        }
	                        $filter = 'ai_bp_single_new_reactions';
	                }

		// WordPress Toolbar
		if ( 'string' === $format ) {
			$return = apply_filters( $filter, '<a href="' . esc_url( $custom_link ) . '">' . esc_html( $text ) . '</a>', (int) $total_items, $text, $custom_link );

		// Deprecated BuddyBar
		} else {
			$return = apply_filters( $filter, array(
				'text' => $text,
				'link' => $custom_link
			), $custom_link, (int) $total_items, $text );
		}
		return $return;
	}
	return $action;
}
function ai_bp_reaction_activity_liked_notification( $user_id, $activity ,$reacted_userid ) 
{
	global $wpdb;
	global $bp;
	if ( bp_is_active( 'notifications' ) ) 
	{
		bp_notifications_add_notification( array(
			'user_id'           => $user_id,
			'item_id'           => $activity,
			'secondary_item_id' => $reacted_userid,
			'component_name'    => 'reaction',
			'component_action'  => 'ai_reaction_bp',
			'date_notified'     => bp_core_current_time(),
			'is_new'            => 1
		) );
	}
}

function ai_bp_reaction_get_activity_total_count($activity_id)
{
	GLOBAL $wpdb;
	$table        = $wpdb->base_prefix . 'arete_buddypress_smileys_manage';
	$query = $wpdb->get_results("select * from $table where activity_id='$activity_id'");
	return  $arr   = $wpdb->num_rows;
}

// FUNCTION TO CHECK IF ROW EXIST //

function ai_bp_reaction_check_row($table,$field,$conditions,$operator)
 {
  GLOBAL $wpdb;
  $prefix_table =$wpdb->base_prefix .$table;
  $condition_query="";
  foreach($conditions as $key=> $condition)
  {
	 $condition_query.=" ".$operator." $key='$condition'";
  }
  $query = $wpdb->get_results("SELECT $field from $prefix_table WHERE $field <> 0 $condition_query");
  if($query && $wpdb->num_rows <> 0)
  {
   return true;
  }
  else
  {
   return false;
  }
 }
 
// FUNCTION TO COMPILE THE RESULTS FOR THE REACTIONS PROCESS //

function ai_bp_reaction_compile_results($user_id,$activity_id,$smiley_id,$module)
{
	GLOBAL $wpdb;
	
			$arr                = array();
			$user_info          = get_userdata($user_id);
			$arr['username']    = esc_html($user_info->user_login);
			$arr['user_id']     = intval($user_id);

	
			
	if($module=="unreact")
	{
			if(intval(ai_bp_reaction_get_activity_total_count($activity_id))==0) 
			{
				$reaction_count="";
			}
			else
			{
				$reaction_count=intval(ai_bp_reaction_get_activity_total_count($activity_id));			
			}
		$arr['reaction_id']  = intval(1);
		$arr['reaction_name'] = "Like";		
		$arr['reaction_count']      = $reaction_count;	
		$arr['reaction_img'] = esc_url(plugins_url('activity-reactions-for-buddypress/img/') . "unlike.png");						
	}	
	else
	{
		$arr['reaction_id']  = intval($smiley_id);
		$arr['reaction_name'] = esc_html(ai_bp_reactions_get_single_details('arete_buddypress_smileys', 'name', 'id', $smiley_id)); 
		$arr['reaction_img'] = esc_url(plugins_url('activity-reactions-for-buddypress/img/') . esc_html(ai_bp_reactions_get_single_details('arete_buddypress_smileys', 'image', 'id', $smiley_id)));
		$arr['reaction_count']  = intval(ai_bp_reaction_get_activity_total_count($activity_id));			
	}			

 return json_encode($arr);	
	
} 

add_action( 'wp_enqueue_scripts', 'ai_bp_reaction_dynamic_style_init', 11 );
function ai_bp_reaction_dynamic_style_init() {
	if(bp_current_component('activity') )
	{	
		wp_enqueue_style('dynamic-css',
                 admin_url('admin-ajax.php').'?action=ai_bp_reaction_dynamic_css',
                 null,
                 null,
                 null);
	}				 
}
add_action('wp_ajax_dynamic_css', 'ai_bp_reaction_dynamic_css');
add_action('wp_ajax_nopriv_dynamic_css', 'ai_bp_reaction_dynamic_css');
function ai_bp_reaction_dynamic_css() {
	
		header('Content-Type: text/css');
		include_once( esc_url(plugins_url('activity-reactions-for-buddypress/css/ai_bp_reactions_dynamic_css.php') ) );
		exit;
	
}
?>