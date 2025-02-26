<?php
if (!defined('ABSPATH'))
   exit;
?>
<div class="afaq-6310">
   <h1 class="afaq-6310-heading">All Category <button class="afaq-6310-btn-success" id="add-faq">Add New</button></h1>
   <?php
   $category_table = $wpdb->prefix . 'afaq_6310_category';
   wp_enqueue_media();

   if (!empty($_POST['delete']) && isset($_POST['id']) && is_numeric($_POST['id'])) {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-field-delete')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $id = (int) sanitize_text_field($_POST['id']);
         $wpdb->query($wpdb->prepare("DELETE FROM {$category_table} WHERE id = %d", $id));
      }
   } else if (!empty($_POST['save']) && $_POST['save'] == 'Save') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-add')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $myData = array();
         $myData[] = sanitize_text_field($_POST['name']);
         $myData[] = 'afaq-6310-' . time();
         $myData[] = sanitize_text_field($_POST['description']);
         $myData[] = sanitize_text_field($_POST['icons_name']);
         $myData[] = sanitize_text_field($_POST['serial']);

         $sql = $wpdb->prepare("INSERT INTO {$category_table} set
         name = %s,
         class_code = %s,
         description = %s,
         icons = %s,
         serial = %d", $myData);
         $wpdb->query($sql);
      }
   } else if (!empty($_POST['update']) && $_POST['update'] == 'Update') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-update')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $id = (int) sanitize_text_field($_POST['eid']);
         $myData = array();
         $myData[] = sanitize_text_field($_POST['name']);
         $myData[] = sanitize_text_field($_POST['description']);
         $myData[] = sanitize_text_field($_POST['icons_name']);
         $myData[] = sanitize_text_field($_POST['serial']);
         $myData[] = $id;

         $wpdb->query($wpdb->prepare("UPDATE {$category_table} set
                        name = %s,
                        description = %s,
                        icons = %s,
                        serial = %d
                        where id = %d", $myData));
      }
   } else if (!empty($_POST['edit']) && $_POST['edit'] == 'Edit') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-field-edit')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $id = (int) sanitize_text_field($_POST['id']);
         $faq = $wpdb->get_row($wpdb->prepare("SELECT * FROM $category_table WHERE id = %d ", $id), ARRAY_A);
   ?>
         <div id="afaq-6310-modal-edit" class="afaq-6310-modal" style="display: none">
            <div class="afaq-6310-modal-content afaq-6310-modal-lg">
               <form action="" method="post">
                  <?php wp_nonce_field("afaq-6310-nonce-update") ?>
                  <input type="hidden" name="eid" value="<?php echo esc_attr($id); ?>" />
                  <div class="afaq-6310-modal-header">
                     Edit Category
                     <span class="afaq-6310-close">&times;</span>
                  </div>
                  <div class="afaq-6310-modal-body-form">
                     <table border="0" width="100%" cellpadding="10" cellspacing="0">
                        <tr>
                           <td style="width: 150px;"><label class="afaq-6310-form-label" for="title">Category Name:</label></td>
                           <td><input type="text" name="name" id="name" value="<?php echo esc_attr(afaq_6310_scRemove($faq['name'])) ?>" class="afaq-6310-form-input-sm" placeholder="Category Name" /></td>
                        </tr>
                        <tr>
                           <td><label class="afaq-6310-form-label" for="description">Category Description:</label></td>
                           <td>
                              <textarea name="description" id="description" class="afaq-6310-form-input"><?php echo esc_attr(afaq_6310_scRemove($faq['description'])) ?></textarea>
                           </td>
                        </tr>
                        <tr>
                           <td style="width: 150px;"><label class="afaq-6310-form-label" for="link_url">Category Icon:</label></td>
                           <td>
                              <input type="text" name="icons_name" id="icons_name" value="<?php echo esc_attr($faq['icons']) ?>" class="afaq-6310-form-input-sm" placeholder="Category Icon"  />
                              <div class="afaq-6310-plus-icon" id="modal-icons-add"><i class="fas fa-plus-circle afaq-6310-plus"></i></div>
                           </td>
                        </tr>
                        <tr>
                           <td style="width: 150px;"><label class="afaq-6310-form-label" for="serial">Category Serial:</label></td>
                           <td><input type="number" name="serial" id="serial" value="<?php echo esc_attr($faq['serial']) ?>" class="afaq-6310-form-input-sm" placeholder="Category Serial" /></td>
                        </tr>
                     </table>

                  </div>
                  <div class="afaq-6310-modal-form-footer">
                     <button type="button" name="close" id="afaq-6310-from-close-edit" class="afaq-6310-btn-danger afaq-6310-pull-right">Close</button>
                     <input type="submit" name="update" class="afaq-6310-btn-primary afaq-6310-pull-right afaq-6310-margin-right-10" value="Update" />
                  </div>
                  <br class="afaq-6310-clear" />
               </form>
            </div>
            <br class="afaq-6310-clear" />
         </div>
         <script>
            jQuery(document).ready(function() {
               jQuery('#afaq-6310-modal-edit').fadeIn(500);
               jQuery("body").css({
                  "overflow": "hidden"
               });

               jQuery("body").on("click", ".afaq_6310_icon_remove-edit", function(e) {
                  jQuery(this).parent().parent().remove();
                  return false;
               });
               jQuery("body").on("click", ".afaq_6310_icon_remove-edit-exist", function(e) {
                  jQuery(this).parent().remove();
                  return false;
               });
               /* Social Icon End */

               jQuery("body").on("click", ".afaq-6310-close-edit, #afaq-6310-from-close-edit", function() {
                  jQuery("#afaq-6310-modal-add, #afaq-6310-modal-edit").fadeOut(500);
                  jQuery("body").css({
                     "overflow": "initial"
                  });
               });
               jQuery(window).click(function(event) {
                  if (event.target == document.getElementById('afaq-6310-modal-add')) {
                     jQuery("#afaq-6310-modal-add").fadeOut(500);
                     jQuery("body").css({
                        "overflow": "initial"
                     });
                  } else if (event.target == document.getElementById('afaq-6310-modal-edit')) {
                     jQuery("#afaq-6310-modal-edit").fadeOut(500);
                     jQuery("body").css({
                        "overflow": "initial"
                     });
                  }
               });

               /* ######### Media Start ########### */
               jQuery("body").on("click", "#afaq_6310_upload_team_member_image-edit", function(e) {
                  e.preventDefault();
                  var image = wp.media({
                        title: 'Upload Image',
                        multiple: false
                     }).open()
                     .on('select', function(e) {
                        var uploaded_image = image.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                        jQuery("#afaq_6310_upload_team_member_image_src-edit").val(image_url);
                        //jQuery("#vkcmu-favicon-image").attr("src", image_url);
                     });

                  jQuery("#afaq_6310_add_new_media").css({
                     "overflow-x": "hidden",
                     "overflow-y": "auto"

                  });

               });

               /* ######### Media End ########### */

            });
         </script>

         </script>
      <?php
      }
   } 
   ?>

   <table class="afaq-6310-table">
      <tr>
         <td style="width: 120px">Name</td>
         <td>Description</td>
         <td style="width: 30px">Icon</td>
         <td style="width: 30px">Serial</td>
         <td style="width: 120px">Edit Delete</td>
      </tr>

      <?php
      $data = $wpdb->get_results('SELECT * FROM ' . $category_table . ' ORDER BY serial ASC', ARRAY_A);
      if($data) {
         foreach ($data as $value) {
            echo '<tr>';
            echo '<td>' . esc_attr(afaq_6310_scRemove($value['name'])) . '</td>';
            echo '<td>' . esc_attr(afaq_6310_scRemove($value['description'])) . '</td>';
            echo '<td align="center">' . (esc_attr($value['icons']) ? "<i class='".esc_attr( $value['icons'] )."' style='font-size: 20px'></i>" : '---') . '</td>';
            echo '<td align="center">' . esc_attr($value['serial']) . '</td>';
            echo '<td>
                     <form method="post">
                     ' . wp_nonce_field("afaq-6310-nonce-field-edit") . '
                           <input type="hidden" name="id" value="' . esc_attr($value['id']) . '">
                           <button class="afaq-6310-btn-success afaq-6310-margin-right-10" style="float:left"  title="Edit"  type="submit" value="Edit" name="edit"><i class="fas fa-edit" aria-hidden="true"></i></button>
                     </form>
                     <form method="post">
                     ' . wp_nonce_field("afaq-6310-nonce-field-delete") . '
                           <input type="hidden" name="id" value="' . esc_attr($value['id']) . '">
                           <button class="afaq-6310-btn-danger" style="float:left"  title="Delete"  type="submit" value="delete" name="delete" onclick="return confirm(\'Do you want to delete?\');"><i class="far fa-times-circle" aria-hidden="true"></i></button>
                     </form>
                  </td>';
         }
      }
      ?>
   </table>
   <div id="afaq-6310-modal-add" class="afaq-6310-modal" style="display: none">
      <div class="afaq-6310-modal-content afaq-6310-modal-lg">
         <form action="" method="post">
            <div class="afaq-6310-modal-header">
               Add Category
               <span class="afaq-6310-close">&times;</span>
            </div>
            <div class="afaq-6310-modal-body-form">
               <?php wp_nonce_field("afaq-6310-nonce-add") ?>
               <table border="0" width="100%" cellpadding="10" cellspacing="0">
                  <tr>
                     <td style="width: 150px;"><label class="afaq-6310-form-label" for="name">Category Name:</label></td>
                     <td><input type="text" name="name" id="name" require value="" class="afaq-6310-form-input-sm" placeholder="Category Name" /></td>
                  </tr>
                  <tr>
                     <td><label class="afaq-6310-form-label" for="description">Category Description:</label></td>
                     <td>
                       <textarea name="description" class="afaq-6310-form-input" placeholder="Category Description"></textarea>
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 150px;"><label class="afaq-6310-form-label" for="link_url">Category Icon:</label></td>
                     <td>
                        <input type="text" name="icons_name" id="icons_name" value="" class="afaq-6310-form-input-sm" placeholder="Category Icon"  />
                        <div class="afaq-6310-plus-icon" id="modal-icons-add"><i class="fas fa-plus-circle afaq-6310-plus"></i></div>
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 150px;"><label class="afaq-6310-form-label" for="serial">Category Serial:</label></td>
                     <td><input type="number" name="serial" id="serial" value="1" class="afaq-6310-form-input-sm" placeholder="Category Serial" /></td>
                  </tr>
               </table>

            </div>
            <div class="afaq-6310-modal-form-footer">
               <button type="button" name="close" id="afaq-6310-from-close" class="afaq-6310-btn-danger afaq-6310-pull-right">Close</button>
               <input type="submit" name="save" class="afaq-6310-btn-primary afaq-6310-pull-right afaq-6310-margin-right-10" value="Save" />
            </div>
            <br class="afaq-6310-clear" />
         </form>
      </div>
      <br class="afaq-6310-clear" />
   </div>
</div>

<div id="afaq_6310_faq_icon" class="afaq-6310-modal" style="display: none">
   <div class="afaq-6310-modal-content afaq-6310-modal-xl">
      <form action="" method="post">
         <?php wp_nonce_field("afaq-6310-nonce-update-icon-order") ?>

         <input type="hidden" name="rearrange_list" id="rearrange_list" value="" />
         <div class="afaq-6310-modal-header">
            <span style="float: left; margin-right: 15px;">Choose your Icon</span>
            <input type="text" id="icon-filter" class="afaq-6310-form-input-sm" placeholder="Search Icon" />
            <span class="afaq-6310-icon-close" style="float: right;">&times;</span>
         </div>
         <div class="afaq-6310-modal-body-form">
            <ul class="afaq-6310-choose-icon">
               <?php
               echo afaq_6310_fa_icon_list('li', '</li>');
               ?>
            </ul>
         </div>
         <div class="afaq-6310-modal-form-footer">
            <button type="button" name="close" id="afaq-6310-font-icon-close" class="afaq-6310-btn-danger afaq-6310-pull-right">Close</button>
         </div>
      </form>
      <br class="afaq-6310-clear" />
   </div>
</div>

<script>
   jQuery(document).ready(function() {
      jQuery("#profile_details, #effect-appearance").hide();
      jQuery("body").on("click", "#add-faq", function() {
         jQuery("#afaq-6310-modal-add").fadeIn(500);
         jQuery("body").css({
            "overflow": "hidden"
         });
         return false;
      });

      //Filter
      jQuery("#icon-filter").on("keyup", function() {
         var value = jQuery(this).val().toLowerCase();
         jQuery(".afaq-6310-choose-icon li").filter(function() {
            jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1);
         });
      });



      jQuery("body").on("click", "#afaq-6310-font-icon-close, .afaq-6310-icon-close", function() {
         jQuery("#afaq_6310_faq_icon").fadeOut(500);
      });

      jQuery(window).click(function(event) {
         if (event.target == document.getElementById('afaq_6310_faq_icon')) {
            jQuery("#afaq_6310_faq_icon").fadeOut(500);
         }
      });

      jQuery("body").on("click", "#modal-icons-add", function() {
         if (jQuery('#icon-filter').val()) {
            jQuery('#icon-filter').val('');
            jQuery(".afaq-6310-choose-icon li").filter(function() {
               jQuery(this).toggle();
            });
         }
         jQuery("#afaq_6310_faq_icon").fadeIn(500);
         jQuery("body").css({
            "overflow": "hidden"
         });
         jQuery('#icon-filter').focus();
         return false;
      });

      jQuery("body").on("click", "ul.afaq-6310-choose-icon li", function() {
         let cls = jQuery(this).find('i').attr('class');
         jQuery(`#icons_name`).val(cls);
         jQuery("#afaq_6310_faq_icon").fadeOut(500);
      });

      /* Modal Close Start */
      jQuery("body").on("click", ".afaq-6310-close, #afaq-6310-from-close", function() {
         jQuery("#afaq-6310-modal-add, #afaq-6310-modal-edit").fadeOut(500);
         jQuery("body").css({
            "overflow": "initial"
         });
      });
      jQuery(window).click(function(event) {
         if (event.target == document.getElementById('afaq-6310-modal-add')) {
            jQuery("#afaq-6310-modal-add").fadeOut(500);
            jQuery("body").css({
               "overflow": "initial"
            });
         } else if (event.target == document.getElementById('afaq-6310-modal-edit')) {
            jQuery("#afaq-6310-modal-edit").fadeOut(500);
            jQuery("body").css({
               "overflow": "initial"
            });
         }
      });
      /* Modal Close End */

   });
</script>