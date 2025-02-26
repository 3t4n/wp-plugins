<?php
/* database creates */
global $wpdb;
define('NEW_SLIDER_TABLE', $wpdb->prefix . 'add_fruitslider');

$sql = "CREATE TABLE  IF NOT EXISTS " . NEW_SLIDER_TABLE . "(
            ID int(11) NOT NULL AUTO_INCREMENT,
            attachment_id varchar(255) NOT NULL ,   
            title varchar(255) NOT NULL ,   
            gallery varchar(255) NOT NULL ,      
            PRIMARY KEY (ID)    
              );";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);

define('NEW_LAYER_TABLE', $wpdb->prefix . 'add_fruitslider_layer');

$sql = "CREATE TABLE  IF NOT EXISTS " . NEW_LAYER_TABLE . "(
            ID int(11) NOT NULL AUTO_INCREMENT,
            image_id int(11) NOT NULL,
            slider_title varchar(255) NOT NULL,
            slider_title_top int(11) NOT NULL,
            slider_title_left int(11) NOT NULL,
            slider_content varchar(255) NOT NULL,
            slider_content_top int(11) NOT NULL,
            slider_content_left int(11) NOT NULL,
            slider_link varchar(255) NOT NULL,
            slider_link_top int(11) NOT NULL,
            slider_link_left int(11) NOT NULL,
            slider_url varchar(255) NOT NULL,			
			slider_titlecolor varchar(255) NOT NULL,	
			slider_contentcolor varchar(255) NOT NULL,			
			slider_animation varchar(255) NOT NULL,
			slider_animation_out varchar(255) NOT NULL,			
			slider_custom_css varchar(255) NOT NULL,
			sliderimage_inanimation varchar(255) NOT NULL,
			sliderimage_outanimation varchar(255) NOT NULL,			
			slider_layer varchar(255) NOT NULL,
            PRIMARY KEY (ID)
           
              );";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);

switch (isset($_GET['method']) ? $_GET['method'] : '') {

    case 'save' :
        if (isset($_POST) && isset($_POST['save-multiple'])) {
            $errors = array();

            if (!empty($_POST['Slide']['slides'])) {
                $slides = $_POST['Slide']['slides'];
                $gallery = $_POST['Slide']['galleries'];
                //if(!empty($gallery))
                //$gallery=serialize($gallery);
                foreach ($slides as $attachment_id => $slide) {
                    $slide_data = array(
                        'title' => $slide['title'],
                        'image' => basename($slide['url']),
                        'attachment_id' => $attachment_id,
                        'type' => 'media',
                        'image_url' => $slide['url']
                    );

                    $table = $wpdb->prefix . "add_fruitslider";
                    $wpdb->insert($table, array('attachment_id' => $attachment_id, 'title' => $slide['title'], 'gallery' => serialize($gallery)), array('%s', '%s', '%s'));
                }
                echo "<script type='text/javascript'>
						window.location=document.location.href;
					</script>";
            } else {
                $errors[] = __('No slides were selected', FRUIT_SLIDER_SLUG);
            }
        }
        break;

    case 'delete':
        if (!empty($_GET['id']) && isset($_GET['id'])) {

            $table = $wpdb->prefix . "add_fruitslider";
            $layer_table = $wpdb->prefix . "add_fruitslider_layer";
            $wpdb->delete($table, array('ID' => $_GET['id']), array('%d'));
            $wpdb->delete($layer_table, array('image_id' => $_GET['id']), array('%d'));
        }
        break;

    case 'delete_all':
        if (!empty($_POST['action'])) {
            if (!empty($_POST['Slide']['checklist']) && isset($_POST['Slide']['checklist'])) {
                foreach ($_POST['Slide']['checklist'] as $slide_id) {

                    $table = $wpdb->prefix . "add_fruitslider";
                    $layer_table = $wpdb->prefix . "add_fruitslider_layer";
                    $wpdb->delete($table, array('ID' => $slide_id), array('%d'));
                    $wpdb->delete($layer_table, array('image_id' => $slide_id), array('%d'));
                }
            }
        }
        break;
}

$orderby = (empty($_GET['orderby'])) ? 'ID' : $_GET['orderby'];
$order = (empty($_GET['order'])) ? 'desc' : strtolower($_GET['order']);

if (empty($_GET['order']))
    $order_id = 'asc';
else {
    if ($_GET['order'] == 'desc')
        $order_id = 'asc';
    else
        $order_id = 'desc';
}
?>
<div class="wrap fruit_sliderwrapper">
    <h2 class="fruit-title"><?php _e('Manage slider', FRUIT_SLIDER_SLUG); ?></h2>
<?php
$url_gallery = add_query_arg(array('method' => 'save'), admin_url('admin.php?page=add_gallery'));
$url_slider = admin_url('admin.php?page=add_slider_page');
$url_deleteall = add_query_arg(array('method' => 'delete_all'), admin_url('admin.php?page=slider_settings'));
?>
    <a class="add-new-h2 fruit_gallery_h2" href="<?php echo $url_gallery; ?>"><?php _e('Add New Gallery', FRUIT_SLIDER_SLUG); ?></a>
    <a class="add-new-h2 fruit_gallery_h2" href="<?php echo $url_slider; ?>" ><?php _e('Add New Slider', FRUIT_SLIDER_SLUG); ?></a>
    <form action="<?php echo $url_deleteall; ?>" method="post">
        <div class="fruit_slider_table">
            <div class="tablenav">
                <div class="alignleft actions">
                    <select name="action" class="action">
                        <option value=""><?php _e('- Bulk Actions -', FRUIT_SLIDER_SLUG); ?></option>
                        <option value="delete"><?php _e('Delete', FRUIT_SLIDER_SLUG); ?></option>
                    </select>
                    <input type="submit" class="button" value="<?php _e('Apply', FRUIT_SLIDER_SLUG); ?>" name="execute" />
                </div>
                <div class="alignleft actions">
<?php
$table = $wpdb->prefix . "add_fruitgallery";
$gallery_details = $wpdb->get_results("SELECT * FROM " . $table);
$galleryurl = admin_url('admin.php?page=slider_settings');
if (!empty($gallery_details)) :
    ?>
                        <select name="galllery_sort" id="galllery_sort" class="action">
                            <option value=""><?php _e('Select Gallery', FRUIT_SLIDER_SLUG); ?></option>
    <?php foreach ($gallery_details as $gallery) : ?>
                                <option value="<?php echo $gallery->ID; ?>" <?php if ($_REQUEST['gid'] == $gallery->ID) echo 'selected';
        else echo ''; ?>><?php echo ucwords($gallery->gallery_name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                    <input type="hidden" id="galleryurl" value="<?php echo $galleryurl ?>" />
                </div>
            </div>
            <table class="widefat">
                <thead>
                    <tr>
                        <th class="check-column"><input type="checkbox" name="checkboxall" id="checkboxall" value="checkboxall" /></th>
                        <th class="column-id <?php echo ($orderby == "id") ? 'sorted ' . $order : 'sortable desc'; ?>">
                            <a href="<?php echo add_query_arg(array("orderby" => 'id', 'order' => $order_id, 'gid' => $_REQUEST['gid']), admin_url('admin.php?page=slider_settings')); ?>">
                                <span><?php _e('ID', FRUIT_SLIDER_SLUG); ?></span>
                                <span class="sorting-indicator"></span>
                            </a>
                        </th>
                        <th class="column-image">
                            <span><?php _e('Image', FRUIT_SLIDER_SLUG); ?></span>
                        </th>
                        <th class="column-title <?php echo ($orderby == "title") ? 'sorted ' . $order : 'sortable desc'; ?>">
                            <a href="<?php echo add_query_arg(array("orderby" => 'title', 'order' => $order_id, 'gid' => $_REQUEST['gid']), admin_url('admin.php?page=slider_settings')); ?>">
                                <span><?php _e('Title', FRUIT_SLIDER_SLUG); ?></span>
                                <span class="sorting-indicator"></span>
                            </a>
                        </th>												
                        <th class="column-order <?php echo ($orderby == "order") ? 'sorted ' . $order : 'sortable desc'; ?>">
                            <a href="<?php echo add_query_arg(array("orderby" => 'gallery', 'order' => $order_id, 'gid' => $_REQUEST['gid']), admin_url('admin.php?page=slider_settings')); ?>">
                                <span><?php _e('Gallery', FRUIT_SLIDER_SLUG); ?></span>
                                <span class="sorting-indicator"></span>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="check-column"><input type="checkbox" name="checkboxall" id="checkboxall" value="checkboxall" /></th>
                        <th class="column-id <?php echo ($orderby == "id") ? 'sorted ' . $order : 'sortable desc'; ?>">
                            <a href="<?php echo add_query_arg(array("orderby" => 'ID', 'order' => $order_id, 'gid' => $_REQUEST['gid']), admin_url('admin.php?page=slider_settings')); ?>">
                                <span><?php _e('ID', FRUIT_SLIDER_SLUG); ?></span>
                                <span class="sorting-indicator"></span>
                            </a>
                        </th>
                        <th class="column-image <?php echo ($orderby == "image") ? 'sorted ' . $order : 'sortable desc'; ?>">
                            <span><?php _e('Image', FRUIT_SLIDER_SLUG); ?></span>
                        </th>
                        <th class="column-title <?php echo ($orderby == "title") ? 'sorted ' . $order : 'sortable desc'; ?>">
                            <a href="<?php echo add_query_arg(array("orderby" => 'title', 'order' => $order_id, 'gid' => $_REQUEST['gid']), admin_url('admin.php?page=slider_settings')); ?>">
                                <span><?php _e('Title', FRUIT_SLIDER_SLUG); ?></span>
                                <span class="sorting-indicator"></span>
                            </a>
                        </th>												
                        <th class="column-order <?php echo ($orderby == "order") ? 'sorted ' . $order : 'sortable desc'; ?>">
                            <a href="<?php echo add_query_arg(array("orderby" => 'gallery', 'order' => $order_id, 'gid' => $_REQUEST['gid']), admin_url('admin.php?page=slider_settings')); ?>">
                                <span><?php _e('Gallery', FRUIT_SLIDER_SLUG); ?></span>
                                <span class="sorting-indicator"></span>
                            </a>
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $pagenum = isset($_GET['pagenum']) ? absint($_GET['pagenum']) : 1;
                    $limit = get_option('posts_per_page');
                    $offset = ( $pagenum - 1 ) * $limit;
                    if (!empty($_REQUEST['gid']))
                        $search = " where gallery LIKE '%" . serialize($_REQUEST['gid']) . "%'";
                    else
                        $search = "";

                    $table = $wpdb->prefix . "add_fruitslider";
                    $slider_details = $wpdb->get_results("SELECT * FROM " . $table . " " . $search . " ORDER BY " . $orderby . " " . $order . "  LIMIT $offset, $limit");
                    if (!empty($slider_details)) :
                        ?>
                        <?php
                        foreach ($slider_details as $slide) :
                            $edit_layer = add_query_arg(array("method" => "edit_layer", "id" => $slide->ID), admin_url('admin.php?page=edit_layer_settings'));
                            $delete_layer = add_query_arg(array("method" => "delete", "id" => $slide->ID), admin_url('admin.php?page=slider_settings'));
                            ?>
                            <tr class="<?php echo $class = (empty($class)) ? 'alternate' : ''; ?>">
                                <th class="check-column"><input type="checkbox" name="Slide[checklist][]" value="<?php echo $slide->ID; ?>" id="checklist<?php echo $slide->ID; ?>" /></th>
                                <td style="width:75px;"><?php echo $slide->ID; ?></td>
                                <td style="width:200px;">
                                    <?php $slider_image = wp_get_attachment_image_src($slide->attachment_id, 'large'); ?>
                                    <a href="<?php echo esc_url($slider_image[0]); ?>" title="<?php echo __($slide->attachment_id); ?>" class="colorbox" rel="slides" onclick="jQuery.colorbox({href: '<?php echo esc_url($slider_image[0]); ?>'});
                                                                                return false;">
                                        <img style="width:50%;" class="fruit_slide_small_img" src="<?php echo esc_url($slider_image[0]); ?>" alt="<?php echo __($slide->attachment_id); ?>" />
                                    </a>
                                </td>
                                <td>
                                    <a class="row-title" href="<?php echo $edit_layer; ?>" title="<?php echo $slide->title; ?>"><?php echo $slide->title; ?></a>
                                    <div class="row-actions">
                                        <span class="edit">
                                            <a href="<?php echo $edit_layer; ?>"><?php _e('Edit Slide', FRUIT_SLIDER_SLUG); ?></a> |
                                        </span>
                                        <span class="delete">
                                            <a target="_self" href="<?php echo $delete_layer; ?>" onclick="if (!confirm('Are you sure you want to permanently remove this slide?')) {
                                                                                                    return false;
                                                                                                }"  class="submitdelete"><?php _e('Delete', FRUIT_SLIDER_SLUG); ?></a>
                                        </span>
                                    </div> 
                                </td>
                                <td>
                                    <?php
                                    if (!empty($slide->gallery)) {
                                        $a = unserialize($slide->gallery);
                                        $gallery_name = array();
                                        $table = $wpdb->prefix . "add_fruitgallery";
                                        foreach ($a as $value)
                                            $gallery_name [] = $wpdb->get_var("SELECT gallery_name FROM " . $table . " WHERE ID = " . $value);
                                        $gallery_explode = implode(" , ", $gallery_name);
                                        print_r($gallery_explode);
                                    }
                                    ?>							
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="4"><?php _e('No Slider Found', FRUIT_SLIDER_SLUG); ?></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php
            $table = $wpdb->prefix . "add_fruitslider";
            if (!empty($_REQUEST['gid']))
                $search = " where gallery LIKE '%" . serialize($_REQUEST['gid']) . "%'";
            else
                $search = "";

            $total = $wpdb->get_var("SELECT COUNT(ID) FROM " . $table . $search);
            $num_of_pages = ceil($total / $limit);
            $page_links = paginate_links(array(
                'base' => add_query_arg('pagenum', '%#%'),
                'format' => '',
                'prev_text' => __('&laquo;', FRUIT_SLIDER_SLUG),
                'next_text' => __('&raquo;', FRUIT_SLIDER_SLUG),
                'total' => $num_of_pages,
                'current' => $pagenum
                    ));

            if ($page_links) {
                echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
            }
            ?>
        </div>
    </form>
</div>
