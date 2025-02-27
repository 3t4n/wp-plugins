<?php
if (! defined('ABSPATH')) {
    exit;
}
if (! current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
}

if (! empty($_POST['delete']) && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (! wp_verify_nonce($nonce, 'tss_nonce_field_delete')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $id = (int) sanitize_text_field($_POST['id']);
        $wpdb->query($wpdb->prepare("DELETE FROM {$style_table} WHERE id = %d", $id));
    }
}
if (!empty($_POST['duplicate']) && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'imh_6310_nonce_field_duplicate')) {
      die('You do not have sufficient permissions to access this page.');
    } else {
      $id = (int) $_POST['id'];
      $selectedData = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $id), ARRAY_A);
      $dupList = array(
              $selectedData['name'], 
              $selectedData['style_name'], 
              $selectedData['css'],           
              $selectedData['itemids']);
      $wpdb->query($wpdb->prepare("INSERT INTO {$style_table} (name, style_name, css,itemids) VALUES ( %s, %s, %s, %s )", $dupList));
    }
  }

?>

<h3 style="display: flex; width: 100%;">Image Map Annotation/Hotspot</h3>
<button class="imh-6310-btn-success imh-6310-add-new-button"><a href="<?php echo admin_url("admin.php?page=imh-6310-image-map-hotspot&action=preview") ?>">Add New</a></button>

<table class="imh-6310-table">
   <tr  style="background-color: #f5f5f5">
      <td style="width: 130px">Service Name</td>
      <td>Shortcode</td>
      <td style="width: 130px">Manage</td>
   </tr>
   <?php
   $data = $wpdb->get_results('SELECT * FROM '.$style_table.' ORDER BY id DESC', ARRAY_A);
   foreach ($data as $value) {
       echo '<tr class="imh-6310-row-select">';
       echo '<td>'.imh_6310_replace(esc_attr($value['name'])).'</td>';
       echo '<td><span>Shortcode <input type="text" class="imh-6310-6330-shortcode" onclick="this.setSelectionRange(0, this.value.length)" value="[imh_6310_image_map id=&quot;'.esc_attr($value['id']).'&quot;]"></span>';
       echo '<td> 
              <a href="'.admin_url("admin.php?page=imh-6310-image-map-hotspot&action=preview&styleid=".esc_attr($value['id'])).'" title="Edit" class=" imh-6310-margin-right-10 imh-6310-first"><button class="imh-6310-btn-success"><i class="fas fa-edit" aria-hidden="true"></i></button></a>

            <form method="post">
               '.wp_nonce_field('tss_nonce_field_delete').'
                     <input type="hidden" name="id" value="'.esc_attr($value['id']).'">
                     <button class="imh-6310-btn-danger imh-6310-third"  title="Delete"  type="submit" value="delete" name="delete" onclick="return confirm(\'Do you want to delete?\');"><i class="far fa-times-circle" aria-hidden="true"></i></button>
            </form>
            
         </td>';
       echo ' </tr>';
   }
   ?>
</table>