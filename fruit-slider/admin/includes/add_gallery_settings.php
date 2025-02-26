<?php
/* database creates */
global $wpdb;
define('NEW_GALLERY_TABLE', $wpdb->prefix . 'add_fruitgallery');

$sql = "CREATE TABLE  IF NOT EXISTS " . NEW_GALLERY_TABLE . "(
            ID int(11) NOT NULL AUTO_INCREMENT,
            gallery_name varchar(255) NOT NULL ,               
            PRIMARY KEY (ID)    
            );";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);

$url = admin_url('admin.php?page=add_gallery');
?>

<div class="wrap" id="main-wrapper">	
    <?php
    switch (isset($_GET['method']) ? $_GET['method'] : '') {
        case 'save' :
            ?>	
            <div class="fruit-logo">
                <h2 class="fruit-title"><?php _e('Add New Gallery', FRUIT_SLIDER_SLUG); ?></h2>
            </div>
            <form method="post" action="<?php echo $url; ?>">
                <div class="fruit_gallery">
                    <label><?php _e('Gallery Title :  ', FRUIT_SLIDER_SLUG); ?></label>
                    <input type="text" id="Gallery_title" value="" name="Gallery_title" class="fruit_gallery_title">
                    <span class="howto"><?php _e('Title of this gallery for identification purposes.', FRUIT_SLIDER_SLUG); ?></span>				
                </div>	
                <input type="submit" name="save_gallery" value="<?php _e('Save Gallery', FRUIT_SLIDER_SLUG); ?>" class="button-primary">	
            </form>	
            <?php
            break; // save 

        case 'edit' :
            $gid = $_REQUEST['gid'];

            $table = $wpdb->prefix . "add_fruitgallery";
            $gallery_name = $wpdb->get_var("SELECT gallery_name FROM " . $table . " where ID = '" . $gid . "' ");
            ?>	
            <div class="fruit-logo">
                <h2 class="fruit-title"><?php _e('Edit Gallery', FRUIT_SLIDER_SLUG); ?></h2>
            </div>
            <form name="formgallery">
                <div class="fruit_gallery">
                    <label><?php _e('Gallery Title :  ', FRUIT_SLIDER_SLUG); ?></label>
                    <input type="text" id="Gallery_title" value="<?php echo $gallery_name; ?>" name="Gallery_title" class="fruit_gallery_title">
                    <span class="howto"><?php _e('Title of this gallery for identification purposes.', FRUIT_SLIDER_SLUG); ?></span>				
                </div>	
                <input type="button" name="edit_gallery" id="edit_gallery" value="<?php _e('Edit Gallery', FRUIT_SLIDER_SLUG); ?>" class="button-primary">	
                <input type='hidden' name="gid" id="gid" value="<?php echo $gid; ?>" />
                <input type='hidden' name="gallery_url" id="gallery_url" value="<?php echo $url; ?>" />
            </form>	
            <?php
            break; // edit 	  
        case 'delete_all':
            if (!empty($_POST['action'])) {
                if (!empty($_POST['Slide']['checklist']) && isset($_POST['Slide']['checklist'])) {
                    foreach ($_POST['Slide']['checklist'] as $slide_id) {

                        $table = $wpdb->prefix . "add_fruitgallery";
                        $wpdb->delete($table, array('ID' => $slide_id), array('%d'));
                    }
                }
            }
            echo "<script type='text/javascript'>
						window.location = '" . $url . "';
			</script>";
            break;

        default :
            if (isset($_POST) && isset($_POST['save_gallery'])) {

                $table = $wpdb->prefix . "add_fruitgallery";
                $wpdb->insert($table, array('gallery_name' => $_POST['Gallery_title']), array('%s'));
                echo "<script type='text/javascript'>
						window.location=document.location.href;
			</script>";
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
            <div class="fruit-logo">
                <h2 class="fruit-title"><?php _e('Gallery Section', FRUIT_SLIDER_SLUG); ?></h2>
                <a title="" target="_self" href="<?php echo add_query_arg(array('method' => 'save'), admin_url('admin.php?page=add_gallery')); ?>" rel="" class="add-new-h2 fruit_gallery_h2"><?php _e('Add New', FRUIT_SLIDER_SLUG); ?></a>
            </div>
            <div class="fruit_slider_table">
                <form action="<?php echo add_query_arg(array('method' => 'delete_all'), admin_url('admin.php?page=add_gallery')); ?>" method="post">
                    <div class="tablenav">
                        <div class="alignleft actions">
                            <select name="action" class="action">
                                <option value=""><?php _e('- Bulk Actions -', FRUIT_SLIDER_SLUG); ?></option>
                                <option value="delete"><?php _e('Delete', FRUIT_SLIDER_SLUG); ?></option>
                            </select>
                            <input type="submit" class="button" value="<?php _e('Apply', FRUIT_SLIDER_SLUG); ?>" name="" />
                        </div>
                    </div>
                    <table class="widefat">
                        <thead>
                            <tr>
                                <th class="check-column"><input type="checkbox" name="checkboxall" id="checkboxall" value="checkboxall" /></th>
                                <th class="column-id <?php if ($orderby == "ID") echo 'sorted ' . $order;
        else 'sortable desc'; ?>">
                                    <a href="<?php echo add_query_arg(array("orderby" => 'ID', 'order' => $order_id), admin_url('admin.php?page=add_gallery')); ?>">
                                        <span><?php _e('ID', FRUIT_SLIDER_SLUG); ?></span>
                                        <span class="sorting-indicator"></span>
                                    </a>
                                </th>
                                <th class="column-image <?php if ($orderby == "gallery_name") echo 'sorted ' . $order;
        else 'sortable desc'; ?>">
                                    <a href="<?php echo add_query_arg(array("orderby" => 'gallery_name', 'order' => $order_id), admin_url('admin.php?page=add_gallery')); ?>">
                                        <span><?php _e('Gallery', FRUIT_SLIDER_SLUG); ?></span>
                                        <span class="sorting-indicator"></span>
                                    </a>
                                </th>
                                <th class="column-title">
                                    <span><?php _e('Shortcode', FRUIT_SLIDER_SLUG); ?></span>
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="check-column"><input type="checkbox" name="checkboxall" id="checkboxall" value="checkboxall" /></th>
                                <th class="column-id <?php if ($orderby == "ID") echo 'sorted ' . $order;
        else 'sortable desc'; ?>">
                                    <a href="<?php echo add_query_arg(array("orderby" => 'ID', 'order' => $order_id), admin_url('admin.php?page=add_gallery')); ?>">
                                        <span><?php _e('ID', FRUIT_SLIDER_SLUG); ?></span>
                                        <span class="sorting-indicator"></span>
                                    </a>
                                </th>
                                <th class="column-image <?php if ($orderby == "gallery") echo 'sorted ' . $order;
        echo 'sortable desc'; ?>">
                                    <a href="<?php echo add_query_arg(array("orderby" => 'gallery_name', 'order' => $order_id), admin_url('admin.php?page=add_gallery')); ?>">
                                        <span><?php _e('Gallery', FRUIT_SLIDER_SLUG); ?></span>
                                        <span class="sorting-indicator"></span>
                                    </a>
                                </th>
                                <th class="column-title">
                                    <span><?php _e('Shortcode', FRUIT_SLIDER_SLUG); ?></span>
                                </th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php
                            $table = $wpdb->prefix . "add_fruitgallery";
                            $gallery_details = $wpdb->get_results("SELECT * FROM " . $table . " ORDER BY " . $orderby . " " . $order);
                            if (!empty($gallery_details)) :
                                ?>
            <?php foreach ($gallery_details as $gallery) : ?>
                                    <tr class="<?php echo $class = (empty($class)) ? 'alternate' : ''; ?>">
                                        <th class="check-column"><input type="checkbox" name="Slide[checklist][]" value="<?php echo $gallery->ID; ?>" id="checklist<?php echo $gallery->ID; ?>" /></th>
                                        <td style="width:75px;"><?php echo $gallery->ID; ?></td>
                                        <td style="width:200px;"><a href="<?php echo add_query_arg(array("gid" => $gallery->ID, 'method' => 'edit'), admin_url('admin.php?page=add_gallery')); ?>"><?php echo $gallery->gallery_name; ?></a></td>
                                        <td><code>[fruitslider gallery_id="<?php echo $gallery->ID; ?>"]</code></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else:
                                ?><tr><td colspan="4"><?php _e('No Gallery Found', FRUIT_SLIDER_SLUG); ?></td></tr>
                            <?php endif;
                            ?>
                        </tbody>  
                    </table>
                </form>
            </div>
            <?php
            break;
    } // Switch 
    ?>
</div> 
