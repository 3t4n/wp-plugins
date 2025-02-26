<?php
if (!defined('ABSPATH'))
   exit;

   $faq_6310_editor_type = faq_6310_get_option( 'faq_6310_editor_type'); 
?>
<div class="afaq-6310">
   <h1 class="afaq-6310-heading">All FAQ 
    <button class="afaq-6310-btn-success" id="add-faq">Add New</button>
    <button class="afaq-6310-btn-primary" id="export-plugin-data">
      Export Plugin Data
     <span class="afaq-6310-pro">(Pro) <div class="afaq-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
   </button>
   
   <button class="afaq-6310-btn-primary" id="import-plugin-data">
      Import Plugin Data
     <span class="afaq-6310-pro">(Pro) <div class="afaq-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
   </button>
    </h1>
   <?php
   $faq_table = $wpdb->prefix . 'afaq_6310_faq';
   $category_table = $wpdb->prefix . 'afaq_6310_category';
   wp_enqueue_media();

   if (!empty($_POST['duplicate']) && isset($_POST['id']) && is_numeric($_POST['id'])) { 
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq_nonce_6310_field_duplicate')) {
        die('You do not have sufficient permissions to access this page.');
      } else {
        $id = (int) $_POST['id'];
        $selectedData = $wpdb->get_row($wpdb->prepare("SELECT * FROM $faq_table WHERE id = %d ", $id), ARRAY_A);
        $dupList = array(
                $selectedData['title'], 
                $selectedData['description'], 
                $selectedData['icons_name'], 
                $selectedData['link_text'], 
                $selectedData['link_url'],
                $selectedData['new_tab'],
                $selectedData['class_code']);
              
        $s = $wpdb->query($wpdb->prepare("INSERT INTO {$faq_table} (title, description, icons_name, link_text, link_url, new_tab, class_code) VALUES ( %s, %s, %s, %s, %s, %s, %s )", $dupList));    
       
      }
    }

   if (!empty($_POST['delete']) && isset($_POST['id']) && is_numeric($_POST['id'])) {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-field-delete')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $id = (int) sanitize_text_field($_POST['id']);
         $wpdb->query($wpdb->prepare("DELETE FROM {$faq_table} WHERE id = %d", $id));
      }
   } else if (!empty($_POST['save']) && $_POST['save'] == 'Save') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-add')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $myData = array();
         $myData[] = sanitize_text_field($_POST['title']);
         $myData[] = ($_POST['description']);
         $myData[] = sanitize_text_field($_POST['icons_name']);
         $myData[] = sanitize_text_field($_POST['link_text']);
         $myData[] = sanitize_text_field($_POST['link_url']);
         $myData[] = isset($_POST['open_new_tab']) ? sanitize_text_field($_POST['open_new_tab']) : 0;
         if(isset($_POST['class_code']) && count($_POST['class_code']) > 0){
            $class_code = array_map('sanitize_text_field', $_POST['class_code']);
            $myData[] =  implode(',', $class_code);
         }
         else{
            $myData[] = '';
         }

         $wpdb->query($wpdb->prepare("INSERT INTO {$faq_table} set
                     title = %s,
                     description = %s,
                     icons_name = %s,
                     link_text = %s,
                     link_url = %s,
                     new_tab = %s,
                     class_code = %s", $myData));
      }
   } else if (!empty($_POST['update']) && $_POST['update'] == 'Update') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-update')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $id = (int) sanitize_text_field($_POST['eid']);
         $myData = array();
         $myData[] = sanitize_text_field($_POST['title']);
         $myData[] = ($_POST['description']);
         $myData[] = sanitize_text_field($_POST['icons_name']);
         $myData[] = sanitize_text_field($_POST['link_text']);
         $myData[] = sanitize_text_field($_POST['link_url']);
         $myData[] = isset($_POST['open_new_tab']) ? sanitize_text_field($_POST['open_new_tab']) : 0;
         if(isset($_POST['class_code']) && count($_POST['class_code']) > 0){
            $class_code = array_map('sanitize_text_field', $_POST['class_code']);
            $myData[] =  implode(',', $class_code);
         }
         else{
            $myData[] = '';
         }
         $myData[] = $id;

         $wpdb->query($wpdb->prepare("UPDATE {$faq_table} set
                        title = %s,
                        description = %s,
                        icons_name = %s,
                        link_text = %s,
                        link_url = %s,
                        new_tab = %s,
                        class_code = %s
                        where id = %d", $myData));
      }
   } else if (!empty($_POST['edit']) && $_POST['edit'] == 'Edit') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-field-edit')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $id = (int) sanitize_text_field( $_POST['id'] );
         $faq = $wpdb->get_row($wpdb->prepare("SELECT * FROM $faq_table WHERE id = %d ", $id), ARRAY_A);
   ?>
         <div id="afaq-6310-modal-edit" class="afaq-6310-modal" style="display: none">
            <div class="afaq-6310-modal-content afaq-6310-modal-lg">
               <form action="" method="post">
                  <?php wp_nonce_field("afaq-6310-nonce-update") ?>
                  <input type="hidden" name="eid" value="<?php echo $id; ?>" />
                  <div class="afaq-6310-modal-header">
                     Edit FAQ
                     <span class="afaq-6310-close">&times;</span>
                  </div>
                  <div class="afaq-6310-modal-body-form">
                     <table border="0" width="100%" cellpadding="10" cellspacing="0">
                        <tr>
                           <td style="width: 150px;"><label class="afaq-6310-form-label" for="title">FAQ Title:</label></td>
                           <td><input type="text" name="title" id="title" value="<?php echo esc_attr(afaq_6310_scRemove($faq['title'])) ?>" class="afaq-6310-form-input" placeholder="FAQ Title" /></td>
                        </tr>
                        <tr>
                           <td><label class="afaq-6310-form-label" for="profile_details">FAQ Description:</label></td>
                           <td>
                           <?php 
                           if($faq_6310_editor_type == 'old'){
                        ?>
                              <textarea name="description" class="afaq-6310-form-input-lg afaq-6310-description-edit" ><?php echo stripslashes(html_entity_decode(esc_attr(afaq_6310_scRemove($faq['description'])))); ?></textarea>
                              <span class="afaq-6310-visual-editor" id='edit-visual-editor'>
                                 <i class="fas fa-spell-check"></i>
                                 Visual Editor
                              </span>
                        <?php
                           } else {
                              $faq['description'] = str_replace("\'", "'", $faq['description']);
                              $faq['description'] = str_replace('\"', '"', $faq['description']);
                              $settings = array(
                                 'teeny' => false,  // Set to false to allow full editor capabilities
                                 'media_buttons' => true,
                                 'textarea_rows' => 20,
                                 'tinymce' => array(
                                    'toolbar1' => 'bold,italic,underline,|,fontsizeselect,forecolor,backcolor,|,alignleft,aligncenter,alignright,|,bullist,numlist,outdent,indent,|,table,|,link,unlink,image',
                                    'toolbar2' => 'formatselect,blockquote,hr,|,removeformat,subscript,superscript,charmap',
                                    'fontsize_formats' => '10px 12px 14px 16px 18px 24px 36px',// Include necessary plugins
                                ),
                             );
                             if (current_user_can('edit_posts')) {
                              wp_editor($faq['description'], "description", $settings);
                             }
                           } 
                        ?>
                           </td>
                        </tr>
                        <tr>
                           <td style="width: 150px;"><label class="afaq-6310-form-label" for="link_url">FAQ Icon:</label></td>
                           <td>
                              <input type="text" name="icons_name" id="icons_name" value="<?php echo esc_attr($faq['icons_name']) ?>" class="afaq-6310-form-input-sm" placeholder="FAQ Icon"  />
                              <div class="afaq-6310-plus-icon" id="modal-icons-add"><i class="fas fa-plus-circle afaq-6310-plus"></i></div>
                           </td>
                        </tr>
                        <tr>
                           <td style="width: 150px;"><label class="afaq-6310-form-label" for="link_url">FAQ Button Text:</label></td>
                           <td><input type="text" name="link_text" id="link_text" value="<?php echo esc_attr(afaq_6310_scRemove($faq['link_text'])) ?>" class="afaq-6310-form-input-sm" placeholder="FAQ Button Text" /></td>
                        </tr>
                        <tr>
                           <td style="width: 150px;"><label class="afaq-6310-form-label" for="link_url">FAQ Button URL:</label></td>
                           <td><input type="text" name="link_url" id="link_url" value="<?php echo esc_attr($faq['link_url']) ?>" class="afaq-6310-form-input-sm" placeholder="FAQ Button URL" /></td>
                        </tr>
                        <tr>
                           <td style="width: 150px;"><label class="afaq-6310-form-label" for="open_url">Open URL in New Tab:</label></td>
                           <td>
                              <label class="switch">
                                 <input type="checkbox" <?php echo (isset($faq['new_tab']) && $faq['new_tab']) ? ' checked' : '' ?> name="open_new_tab" value="1" id="open_new_tab">
                                 <span class="slider round icon_show_hide"></span>
                              </label>
                           </td>
                        </tr>
                        <tr>
                           <td style="width: 150px;"><label class="afaq-6310-form-label">FAQ Category:</label></td>
                           <td>
                              <ul class="afaq-6310-category-select">
                                 <?php
                                 $data = $wpdb->get_results('SELECT * FROM ' . $category_table . ' ORDER BY serial ASC', ARRAY_A);
                                 if ($data) {
                                    $class_code = esc_attr($faq['class_code']) ?  explode(',', esc_attr($faq['class_code'])) : [];
                                    foreach ($data as $value) {
                                       $index = ($class_code) ? array_search($value['class_code'], $class_code) : -1;
                                       $checked = $index > -1 ? ' checked' : '';
                                       echo "<li id='" . esc_attr($value['class_code']) . "'><input type='checkbox' name='class_code[]' value='" . esc_attr($value['class_code']) . "' id='chk-box-" . esc_attr($value['class_code']) . "' class='category-checkbox' {$checked} />" . afaq_6310_scRemove(esc_attr($value['name'])) . "</li>";
                                    }
                                 }
                                 ?>
                              </ul>
                           </td>
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
         <td style="width: 200px">Title</td>
         <td>Description</td>
         <td style="width: 30px">Icon</td>
         <td style="width: 200px">Category</td>
         <td style="width: 100px">Button Text</td>
         <td style="width: 150px">Edit Delete</td>
      </tr>

      <?php
      $data = $wpdb->get_results('SELECT * FROM ' . $faq_table . ' ORDER BY id DESC', ARRAY_A);
      foreach ($data as $value) {
         echo '<tr>';
         echo '<td>' . esc_attr(afaq_6310_scRemove($value['title'])) . '</td>';
         echo '<td>' . afaq_6310_scRemove(esc_attr(strip_tags($value['description']))) . '</td>';
         echo '<td align="center">' . (esc_attr($value['icons_name']) ? "<i class='".esc_attr( $value['icons_name'] )."' style='font-size: 20px'></i>" : '---') . '</td>';
         echo "<td>";
         $category = $wpdb->get_results('SELECT * FROM ' . $category_table . ' ORDER BY serial ASC', ARRAY_A);
         if ($category) {
            $class_code = esc_attr($value['class_code']) ?  explode(',', esc_attr($value['class_code'])) : [];
            foreach ($category as $cat) {
               $index = ($class_code) ? array_search($cat['class_code'], $class_code) : -1;
               if($index > -1){
                  echo "<div class='afaq-6310-category'>" . afaq_6310_scRemove($cat['name']) . "</div>";
               }
            }
         }
         else{
            echo "---";
         }
         echo "</td>";
         echo '<td align="center">' . esc_attr(afaq_6310_scRemove($value['link_text'])) . '</td>';
         echo '<td>
                 <form method="post">
                   ' . wp_nonce_field("afaq-6310-nonce-field-edit") . '
                          <input type="hidden" name="id" value="' . esc_attr($value['id']) . '">
                          <button class="afaq-6310-btn-success afaq-6310-margin-right-10" style="float:left"  title="Edit"  type="submit" value="Edit" name="edit"><i class="fas fa-edit" aria-hidden="true"></i></button>
                  </form>
                  <form method="post">
                  ' . wp_nonce_field("afaq_nonce_6310_field_duplicate") . '
                         <input type="hidden" name="id" value="' . esc_attr($value['id']) . '">
                         <button class="afaq-6310-btn-primary afaq-6310-margin-right-10" style="float:left"  title="Duplicate"  type="submit" value="duplicate" name="duplicate" onclick="return confirm(\'Do you want to duplicate it?\');"><i class="fas fa-clone" aria-hidden="true"></i></button>
                 </form>
                  <form method="post">
                   ' . wp_nonce_field("afaq-6310-nonce-field-delete") . '
                          <input type="hidden" name="id" value="' . esc_attr($value['id']) . '">
                          <button class="afaq-6310-btn-danger" style="float:left"  title="Delete"  type="submit" value="delete" name="delete" onclick="return confirm(\'Do you want to delete?\');"><i class="far fa-times-circle" aria-hidden="true"></i></button>
                  </form>

                             </td>'; 
      }
      ?>
   </table>
   <div id="afaq-6310-modal-add" class="afaq-6310-modal" style="display: none">
      <div class="afaq-6310-modal-content afaq-6310-modal-lg">
         <form action="" method="post">
            <div class="afaq-6310-modal-header">
               Manage FAQ
               <span class="afaq-6310-close">&times;</span>
            </div>
            <div class="afaq-6310-modal-body-form">
               <?php wp_nonce_field("afaq-6310-nonce-add") ?>
               <table border="0" width="100%" cellpadding="10" cellspacing="0">
                  <tr>
                     <td style="width: 150px;"><label class="afaq-6310-form-label" for="title">FAQ Title:</label></td>
                     <td><input type="text" name="title" id="title" value="" class="afaq-6310-form-input" placeholder="FAQ Title" /></td>
                  </tr>
                  <tr>
                     <td><label class="afaq-6310-form-label" for="profile_details">FAQ Description:</label></td>
                     <td>
                     <?php 
                           if($faq_6310_editor_type == 'old'){
                        ?>
                        <textarea name="description" class="afaq-6310-form-input-lg afaq-6310-description-new" ></textarea>
                        <span class="afaq-6310-visual-editor" id='new-visual-editor'>
                           <i class="fas fa-spell-check"></i>
                           Visual Editor
                        </span>
                        <?php
                           } else {
                              $settings = array(
                                 'teeny' => false,  // Set to false to allow full editor capabilities
                                 'media_buttons' => true,
                                 'textarea_rows' => 20,
                                 'tinymce' => array(
                                    'toolbar1' => 'bold,italic,underline,|,fontsizeselect,forecolor,backcolor,|,alignleft,aligncenter,alignright,|,bullist,numlist,outdent,indent,|,table,|,link,unlink,image',
                                    'toolbar2' => 'formatselect,blockquote,hr,|,removeformat,subscript,superscript,charmap',
                                    'fontsize_formats' => '10px 12px 14px 16px 18px 24px 36px',// Include necessary plugins
                                ),
                             );
                             if (current_user_can('edit_posts')) {
                              wp_editor("", "description", $settings);
                             }
                           } 
                        ?>
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 150px;"><label class="afaq-6310-form-label" for="link_url">FAQ Icon:</label></td>
                     <td>
                        <input type="text" name="icons_name" id="icons_name" value="" class="afaq-6310-form-input-sm" placeholder="FAQ Icon"  />
                        <div class="afaq-6310-plus-icon" id="modal-icons-add"><i class="fas fa-plus-circle afaq-6310-plus"></i></div>
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 150px;"><label class="afaq-6310-form-label" for="link_url">FAQ Button Text:</label></td>
                     <td><input type="text" name="link_text" id="link_text" value="" class="afaq-6310-form-input-sm" placeholder="FAQ Button Text" /></td>
                  </tr>
                  <tr>
                     <td style="width: 150px;"><label class="afaq-6310-form-label" for="link_url">FAQ Button URL:</label></td>
                     <td><input type="text" name="link_url" id="link_url" value="" class="afaq-6310-form-input-sm" placeholder="FAQ Button URL" /></td>
                  </tr>
                  <tr>
                     <td style="width: 150px;"><label class="afaq-6310-form-label" for="open_url">Open URL in New Tab:</label></td>
                     <td>
                        <label class="switch">
                           <input type="checkbox" <?php echo (isset($faq['new_tab']) && $faq['new_tab']) ? ' checked' : '' ?> name="open_new_tab" value="1" id="open_new_tab">
                           <span class="slider round icon_show_hide"></span>
                        </label>
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 150px;"><label class="afaq-6310-form-label">FAQ Category:</label></td>
                     <td>
                        <ul class="afaq-6310-category-select">
                           <?php
                           $data = $wpdb->get_results('SELECT * FROM ' . $category_table . ' ORDER BY serial ASC', ARRAY_A);
                           if ($data) {
                              foreach ($data as $value) {
                                 echo "<li id='".esc_attr( $value['class_code'] )."'><input type='checkbox' name='class_code[]' value='".esc_attr( $value['class_code'] )."' id='chk-box-".esc_attr( $value['class_code'] )."' class='category-checkbox' />". afaq_6310_scRemove(esc_attr( $value['name'])) ."</li>";
                              }
                           }
                           ?>
                        </ul>
                     </td>
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

<div id="afaq-6310-visual-editor-modal" class="afaq-6310-modal" style="display: none">
   <div class="afaq-6310-modal-content afaq-6310-modal-xl afaq-6310-modal-padding">
      <form action="" method="post">
         <?php
            $settings = array(
               'teeny' => false,  // Set to false to allow full editor capabilities
               'media_buttons' => true,
               'textarea_rows' => 20,
               'tinymce' => array(
                  'toolbar1' => 'bold,italic,underline,|,fontsizeselect,forecolor,backcolor,|,alignleft,aligncenter,alignright,|,bullist,numlist,outdent,indent,|,table,|,link,unlink,image',
                  'toolbar2' => 'formatselect,blockquote,hr,|,removeformat,subscript,superscript,charmap',
                  'fontsize_formats' => '10px 12px 14px 16px 18px 24px 36px',// Include necessary plugins
              ),
           );
           // Render the wp_editor
           if (current_user_can('edit_posts')) {
            wp_editor("", "description-editor", $settings);
           }
         ?>
         <div class="afaq-6310-modal-form-footer">
            <button type="button" name="close" id="afaq-6310-visual-editor-modal-close" class="afaq-6310-btn-danger afaq-6310-pull-right">Close</button>
            <button type="button" name="Save" id="afaq-6310-visual-editor-modal-save" class="afaq-6310-btn-primary afaq-6310-pull-right afaq-6310-margin-right-10">Update</button>
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



      jQuery("body").on("click", "#afaq-6310-font-icon-close, .afaq-6310-icon-close, #afaq-6310-visual-editor-modal-close", function() {
         jQuery("#afaq_6310_faq_icon, #afaq-6310-visual-editor-modal").fadeOut(500);
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

      //Checkbox
      jQuery("body").on("click", ".category-checkbox", function(event) {
         event.stopPropagation();
      });
      jQuery("body").on("click", "ul.afaq-6310-category-select li", function() {
         var id = jQuery(this).attr("id");
         if (jQuery("#chk-box-" + id).prop('checked') == true) {
            jQuery("#chk-box-" + id).prop('checked', false);
            return false;
         } else {
            jQuery("#chk-box-" + id).prop('checked', true);
            return true;
         }
      });

      /* Modal Close Start */
      jQuery("body").on("click", ".afaq-6310-close, #afaq-6310-from-close", function() {
         jQuery("#afaq-6310-modal-add, #afaq-6310-modal-edit").fadeOut(500);
         jQuery("body").css({
            "overflow": "initial"
         });
      });
      /* Modal Close End */

      jQuery("body").on("click", "#afaq-6310-visual-editor-modal-save", function() {
         jQuery("#afaq-6310-visual-editor-modal").fadeOut(500);
         jQuery("body").css({
            "overflow": "initial"
         });

         const editorId = "description-editor";
         var editorText = "";
         if (typeof tinymce !== "undefined" && tinymce.get(editorId) && !tinymce.get(editorId).isHidden()) {
            // Get content from TinyMCE (Visual Editor)
            editorText= tinymce.get(editorId).getContent();
        } else {
            // Fallback to the Text Editor's textarea value
            editorText = jQuery("#" + editorId).val();
        }

         var selector = '.afaq-6310-description-new';
         if(jQuery(this).attr('data-id') == 'edit-visual-editor'){
            selector = '.afaq-6310-description-edit';
         } 
         jQuery(selector).val(editorText)
      });
      

      //Visual Editor
      jQuery("body").on("click", ".afaq-6310-visual-editor", function() {
         jQuery("#afaq-6310-visual-editor-modal").fadeIn(500);
         jQuery("body").css({
            "overflow": "hidden"
         });
         jQuery('.switch-html').click()
         var text = jQuery(this).closest('td').find('textarea').val();
         jQuery('#description-editor').val(text)
         jQuery("#afaq-6310-visual-editor-modal-save").attr('data-id', jQuery(this).attr('id'));
         return false;
      });

   });
</script>