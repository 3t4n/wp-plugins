<?php
/*
  Plugin Name:Animated Accordion
  Plugin URI:http://test.com
  Description:Accordion Animation allows the user to add nice accordion,with text and image and control the layout in easy way
  Plugin Author:rayan
  Version:1.0
  Author URI:http://test.com
 */
/* create new table on plugin activated */
global $animated_Accordion_db_version;
$animated_Accordion_db_version = '1.20'; // version changed from 1.0 to 1.1
add_option('animated_Accordion_db_version', $animated_Accordion_db_version);

function animated_Accordion_create_table() {
    require_once 'functions/create_tables.php';
}

register_activation_hook(__FILE__, 'animated_Accordion_create_table');

/* function animated_Accordion_default_settings() {
  require_once 'default.php';
  }

  register_activation_hook(__FILE__, 'animated_Accordion_default_settings');
 */
$installed_ver = get_option('animated_Accordion_db_version');
if ($installed_ver != $animated_Accordion_db_version) {
    $sql = "CREATE TABLE $table_name_animated_Accordion_content(
	 id int NOT NULL AUTO_INCREMENT,
	 name varchar(20) NOT NULL,
	 title varchar(100) NOT NULL,
	 text  varchar(1000) NOT NULL,
	 image varchar(200) NULL,
	 titleBgColor varchar(200) NULL,
	 contentBgColor varchar(200) NULL,
	 ImageSize varchar(200) NULL,
	 titleFontSize varchar(200) NULL,
	 contentFontSize varchar(200) NULL,
	 titleSectionHeight varchar(200) NULL,
	 titleFontColor varchar(200) NULL,
	 contentFontColor varchar(200) NULL,
	 contentBorder varchar(200) NULL,
	 UNIQUE KEY id (id)
	)$charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // notice that we are updating option, rather than adding it
    update_option('custom_table_example_db_version', $custom_table_example_db_version);
}

//add menu to dashboard and submenu to add new,and manage general settings
function animated_Accordion_plugin_menu() {
    add_menu_page('Animated Accordion', 'Animated Accordion', 'manage_options', 'animated-accordion', 'animated_Accordion_show');
    add_submenu_page(null, 'Add New', 'Add New Animated Accordion', 'manage_options', 'add-new', 'add_animated_Accordion');
    add_submenu_page(null, 'Add New Panles', 'Add New Panles', 'manage_options', 'add-new-panels', 'animated_Accordion_add_content');
    add_submenu_page(null, 'Edit Panles', 'Edit Panles', 'manage_options', 'edit-panels', 'animated_Accordion_edit_content');
    add_submenu_page(null, 'Edit Panle', 'Edit Panle', 'manage_options', 'edit-panel', 'animated_Accordion_edit_panel');
    add_submenu_page(null, 'Delete Panles', 'Delete Panles', 'manage_options', 'delete-panels', 'animated_Accordion_delete_content');
    add_submenu_page(null, 'General', 'General', 'manage_options', 'general', 'animated_Accordion_general_settings');
}

add_action('admin_menu', 'animated_Accordion_plugin_menu');

function animated_Accordion_general_settings() {
    //  require_once 'general_settings.php';
}

// using animated_Accordion_panel_color option in styles.php to dynmically change panel's color
function animated_Accordion_general_settings_save() {

    die();
    return true;
}

add_action('wp_ajax_animated_Accordion_general_settings_save', 'animated_Accordion_general_settings_save');
add_action('wp_ajax_nopriv_animated_Accordion_general_settings_save', 'animated_Accordion_general_settings_save');

function animated_Accordion_add_content() {
    require_once 'functions/acordion_content.php';
}

function save_accordion_parameters() {
    global $wpdb;
    $table_name_animated_Accordion_content = $wpdb->prefix . 'animated_Accordion_panels';
    $id = $_POST['id'];
    $ataID = $_POST['ataID'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $img = $_POST['img'];
    $image_float = $_POST['imgfloat'];
    $titleBgColor = $_POST['titleBgColor'];
    $contentBgColor = $_POST['contentBgColor'];
    $ImageSize = $_POST['ImageSize'];
    $titleFontSize = $_POST['titleFontSize'];
    $contentFontSize = $_POST['contentFontSize'];
    $titleSectionHeight = $_POST['titlePadding'];
    $titleFontColor = $_POST['titleFontColor'];
    $contentFontColor = $_POST['contentFontColor'];
    $titleBorderWidth = $_POST['titleBorderWidth'];
    $titleBorderStyle = $_POST['titleBorderStyle'];
    $titleBorderColor = $_POST['titleBorderColor'];
    $contentBorderWidth = $_POST['contentBorderWidth'];
    $contentBorderStyle = $_POST['contentBorderStyle'];
    $contentBorderColor = $_POST['contentBorderColor'];
    $titleBorder = $titleBorderWidth . ',' . $titleBorderStyle . ',' . $titleBorderColor;
    $contentBorder = $contentBorderWidth . ',' . $contentBorderStyle . ',' . $contentBorderColor;
    if ($_POST['aaction'] == 'edit')
        $wpdb->update($table_name_animated_Accordion_content, array('name' => $name, 'title' => $title, 'text' => $text, 'image' => '<img src="' . $img . '" alt=""/>',
            'image_float' => $image_float, 'titleBgColor' => $titleBgColor, 'contentBgColor' => $contentBgColor,
            'ImageSize' => $ImageSize, 'titleFontSize' => $titleFontSize, 'contentFontSize' => $contentFontSize,
            'titleFontSize' => $titleFontSize, 'contentFontSize' => $contentFontSize, 'titleSectionHeight' => $titleSectionHeight,
            'titleFontColor' => $titleFontColor, 'contentFontColor' => $contentFontColor,
            'titleBorder' => $titleBorder, 'contentBorder' => $contentBorder, 'id_ata_id' => $ataID), array('id' => $id));

    if ($_POST['aaction'] == 'add')
        $wpdb->insert($table_name_animated_Accordion_content, array('name' => $name, 'title' => $title, 'text' => $text,
            'image' => '<img src="' . $img . '" alt=""/>',
            'image_float' => $image_float, 'titleBgColor' => $titleBgColor, 'contentBgColor' => $contentBgColor,
            'ImageSize' => $ImageSize, 'titleFontSize' => $titleFontSize, 'contentFontSize' => $contentFontSize,
            'titleFontSize' => $titleFontSize, 'contentFontSize' => $contentFontSize, 'titleSectionHeight' => $titleSectionHeight,
            'titleFontColor' => $titleFontColor, 'contentFontColor' => $contentFontColor,
            'titleBorder' => $titleBorder, 'contentBorder' => $contentBorder, 'id_ata_id' => $ataID));

    die();
    return true;
}

add_action('wp_ajax_save_accordion_parameters', 'save_accordion_parameters');
add_action('wp_ajax_nopriv_save_accordion_parameters', 'save_accordion_parameters');

function animated_Accordion_edit_content() {
    require_once('functions/edit_acordion.php');
}

function animated_Accordion_edit_panel() {
    require_once('functions/edit_panel.php');
}

function animated_Accordion_delete_content() {
    global $wpdb;
    $table_name_animated_Accordion_content = $wpdb->prefix . 'animated_Accordion_panels';
    $id = $_GET['id'];
    $ataID = $_POST['ataID'];
    $wpdb->query("DELETE FROM $table_name_animated_Accordion_content WHERE id=$id");
}

add_action('wp_ajax_save_ata_parameters', 'animated_Accordion_delete_content');
add_action('wp_ajax_nopriv_save_ata_parameters', 'animated_Accordion_delete_content');

function add_animated_Accordion() {
    ?>
    <div class="wrap">

        <a class="btn btn-primary" href="?page=animated-accordion" style="margin-top: 10px;color:#fff;padding:10px;">Back To Accordions</a>

        <form action="" method="POST"  class="form-horizontal form-label-left" >
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Animated Accordion Name:
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="animated_Accordion_Name" id="animated_Accordion_Name" value=""  
                           class="form-control col-md-7 col-xs-12" >
                </div>
                <div id="checked-true" hidden=""><img src="<?php echo plugins_url('js/tick.png', __FILE__) ?>"/></div>
                <div id="checked-false" hidden=""><img src="<?php echo plugins_url('js/ico-cross.png', __FILE__) ?>"/></div>
            </div>
            
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <input class="btn btn-success" type="submit" id="animated_Accordion_submit" name="animated_Accordion_submit" value="Add Table" />

                </div>
            </div>

        </form>
    </div>
    
    <?php
}

function check_name() {
    global $wpdb;
    $table_name_animated_Accordion = $wpdb->prefix . 'animated_accordion';

    $animated_Accordion_Name = $_POST['animated_Accordion_Name'];
    $names = $wpdb->get_var("SELECT COUNT(ata_id) FROM $table_name_animated_Accordion WHERE ata_name='$animated_Accordion_Name'");
    if ($names > 0) {
        echo 'not ok';
    } else {
        echo 'ok';
    }
    die();
    return true;
}

add_action('wp_ajax_check_name', 'check_name');
add_action('wp_ajax_nopriv_check_name', 'check_name');

function check_title() {
    global $wpdb;
    $table_name_animated_Accordion_content = $wpdb->prefix . 'animated_accordion_panels';
    $aTitle = $_POST['aTitle'];
    $title = $wpdb->get_var("SELECT COUNT(id) FROM $table_name_animated_Accordion_content WHERE title='$aTitle'");
    if ($title > 0) {
        echo 'not ok';
    } else {
        echo 'ok';
    }
    die();
    return true;
}

add_action('wp_ajax_check_title', 'check_title');
add_action('wp_ajax_nopriv_check_title', 'check_title');

function save_new_animated_Accordion() {
    global $wpdb;
    $table_name_animated_Accordion = $wpdb->prefix . 'animated_accordion';

    $animated_Accordion_Name = $_POST['animated_Accordion_Name'];
    $wpdb->insert($table_name_animated_Accordion, array('ata_name' => $animated_Accordion_Name));
    die();
    return true;
}

add_action('wp_ajax_save_new_animated_Accordion', 'save_new_animated_Accordion');
add_action('wp_ajax_nopriv_save_new_animated_Accordion', 'save_new_animated_Accordion');

if (!class_exists(WP_List_Table)) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class animated_Accordion_List_Table extends WP_List_Table {

//$animated_AccordionListTable = new animated_Accordion_List_Table();
    function column_default($item, $column_name) {
        switch ($column_name) {
            case 'ata_id':
            case 'ata_name':
                return $item[$column_name];
            default: return print_r($item, true);
        }
    }

    function get_columns() {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'ata_name' => 'Name',
            'ata_id' => 'Shortcode'
        );
        return $columns;
    }

    function process_bulk_action() {
        global $wpdb;
        $table_name_animated_Accordion = $wpdb->prefix . 'animated_accordion';

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids))
                $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name_animated_Accordion WHERE ata_id IN($ids)");
            }
        }
    }

    function prepare_items() {
        global $wpdb;
        $table_name_animated_Accordion = $wpdb->prefix . 'animated_accordion';
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $this->process_bulk_action();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $per_page = 5;
        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged'] - 1) * 5) : 0;
        $current_page = $this->get_pagenum();
        $total_items = $wpdb->get_var("SELECT COUNT(ata_id) FROM $table_name_animated_Accordion");
        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));
        $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name_animated_Accordion LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);
    }

    function get_bulk_actions() {
        $actions = array(
            'delete' => 'Delete'
        );
        return $actions;
    }

    function column_cb($item) {
        return sprintf('<input type="checkbox" name="id[]" value="%s" />', $item['ata_id']);
    }

    function column_ata_name($item) {
        $actions = array(
            'add' => sprintf('<a href="?page=%s&action=%s&id=%s">Add</a>', 'add-new-panels', 'add', $item['ata_id']),
            'show' => sprintf('<a href="?page=%s&action=%s&id=%s">Show</a>', 'edit-panels', 'Show', $item['ata_id']),
            'delete' => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>', $_REQUEST['page'], 'delete', $item['ata_id']),
        );

        return sprintf('%1$s %2$s', $item['ata_name'], $this->row_actions($actions, true));
    }

    function column_ata_id($item) {
        $id = $item['ata_id'];
        return sprintf("[ata id=$id]");
    }

}

function animated_Accordion_show() {

    global $wpdb;
    $animated_AccordionListTable = new animated_Accordion_List_Table();
    echo '<div class="wrap"><h2 style="float:left;">Animated Accordion List</h2>';
    echo '<a href="?page=add-new" class="btn btn-primary style="margin-top: 10px;color:#fff;">Add new Accordion</a>';
    $animated_AccordionListTable->prepare_items();
    $message = '';
    if ('delete' === $animated_AccordionListTable->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf('Items deleted: %d', count($_REQUEST['id'])) . '</p></div>';
    }
    echo $message;
    ?>
    <form  method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $animated_AccordionListTable->display(); ?>
    </form>
    <?php
    echo '</div>';
}

function animated_Accordion_print($atts) {

    global $wpdb;

    $table_name_animated_Accordion_content = $wpdb->prefix . 'animated_accordion_panels';

    $table_parameters = $wpdb->prefix . 'ata_parameters';
    //$image_float =$wpdb->get_var("SELECT value FROM $table_name_animated_Accordion_content WHERE name='image_float'");
    //$text_float =$wpdb->get_var("SELECT value FROM $table_parameters WHERE name='text_float'");
    ob_start();
    $atts = shortcode_atts(array(
        'id' => '1'), $atts, 'ata');
    $ata_id = $atts["id"];
    require_once('css/styles.php');
    $result = $wpdb->get_results("SELECT * FROM $table_name_animated_Accordion_content WHERE id_ata_id=$ata_id");
    echo
    "<div style='max-width:100%;width:90%;margin:0 auto;'>
          
          <div class='accordion'>";

    foreach ($result as $row) {
        echo"
              <div style='padding-bottom:25px;padding-top: 40px;'>
			  <div id='accordion-panel' style='border-bottom: 1px dashed #363636;border-top: 1px dashed #363636;'>
                <a href='#accordion" . $row->id . "' aria-expanded='false' aria-controls='accordion" . $row->id . "' class='accordion-title accordionTitle js-accordionTrigger'>" . $row->title . "</a>
              </div>
              <div class='accordion-content accordionItem is-collapsed' id='accordion" . $row->id . "' aria-hidden='true'>
                <div style='padding-top:40px;'>
				<p class='animated_Accordion_img' style='max-width:100%; float:" . $row->image_float . "'>" . $row->image . "</p>
				<p class='animated_Accordion_text'>" . $row->text . "</p>
				</div>
              </div>
              </div>";
    }


    echo"	
			</dl>
          </div>
        </div>";
    $output = ob_get_clean();
    return $output;
}

add_shortcode('ata', 'animated_Accordion_print');

function preview_panel() {
    $title = $_POST['title'];
    $text = $_POST['text'];
    $img = $_POST['img'];
    $image_float = $_POST['imgfloat'];
    $titleBgColor = $_POST['titleBgColor'];
    $contentBgColor = $_POST['contentBgColor'];
    $ImageSize = $_POST['ImageSize'];
    $titleFontSize = $_POST['titleFontSize'];
    $contentFontSize = $_POST['contentFontSize'];
    $titleSectionHeight = $_POST['titlePadding'];
    $titleFontColor = $_POST['titleFontColor'];
    $contentFontColor = $_POST['contentFontColor'];
    $titleBorderWidth = $_POST['titleBorderWidth'];
    $titleBorderStyle = $_POST['titleBorderStyle'];
    $titleBorderColor = $_POST['titleBorderColor'];
    echo $title;
    echo $text;
    echo $img;
    echo $image_float;
    echo $titleBgColor;
    echo $contentBgColor;
    echo $ImageSize;
    echo $titleFontSize;
    echo $contentFontSize;
    echo $titleSectionHeight;
    echo $titleFontColor;
    echo $contentFontColor;
    echo $titleBorderWidth;
    echo $titleBorderStyle;
    echo $titleBorderColor;
    die();
    return true;
}

add_action('wp_ajax_preview_panel', 'preview_panel');
add_action('wp_ajax_nopriv_preview_panel', 'preview_panel');

wp_enqueue_script('modernizr', plugins_url('js/modernizr.js', __FILE__), array(jquery));
wp_enqueue_style('style', plugins_url('css/style.css', __FILE__));
wp_enqueue_style('reset', plugins_url('css/reset.css', __FILE__));



// Register javascript for the wp media using in image uploader


add_action('admin_enqueue_scripts', 'enqueue_admin');

function enqueue_admin() {

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
    wp_enqueue_style('bootstrap', plugins_url('css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('custom', plugins_url('css/custom.css', __FILE__));
    wp_enqueue_script('media-upload');
    wp_enqueue_script('save_data', plugins_url('js/save_data.js', __FILE__), array(jquery));
    wp_enqueue_script('save_tables', plugins_url('js/save_tables.js', __FILE__), array(jquery));
    wp_enqueue_script('general_settings', plugins_url('js/general_settings.js', __FILE__), array(jquery));
    wp_enqueue_script('delete_panel', plugins_url('js/delete_panel.js', __FILE__), array(jquery));
    wp_enqueue_script('preview', plugins_url('js/preview_panel.js', __FILE__), array(jquery));
    wp_enqueue_script('bootstrap-js', plugins_url('js/bootstrap.min.js', __FILE__), array(jquery));
  
   


    echo'<style>
		.media-upload-form .media-item{min-height:65px !important;}
		.media-item .pinkynail{max-height:56px !important;}
		</style>';
    //wp_enqueue_script('tiny_mce', plugins_url('editor/js/tinymce/tinymce.min.js', __FILE__), array(jquery));
    require_once 'css/preview_styles.php';
}

//using wp color picker in the theme settings
add_action('admin_enqueue_scripts', 'wptuts_add_color_picker');

function wptuts_add_color_picker($hook) {

    if (is_admin()) {

        // Add the color picker css file       
        wp_enqueue_style('wp-color-picker');

        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script('custom-script-handle', plugins_url('js/jquery-custom.js', __FILE__), array('wp-color-picker'), false, true);
    }
}
