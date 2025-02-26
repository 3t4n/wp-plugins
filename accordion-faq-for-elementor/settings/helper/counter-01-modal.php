<div id="afaq_6310_add_or_edit_template_modal" class="afaq-6310-modal" style="display: none">
  <div class="afaq-6310-modal-content afaq-6310-modal-xl">
    <form action="" method="post">
      <div class="afaq-6310-modal-header">
        Add/Edit/Delete Template
        <span class="afaq-6310-close">&times;</span>
      </div>
      <div class="afaq-6310-modal-body-form">
        <input type="hidden" name="styleid" value="<?php echo $id ?>" />
        <input type="hidden" id="removeIds" name="removeIds" value="" />
        <div class="afaq-6310-row afaq-6310-row-form">
          <?php
          wp_nonce_field("afaq-6310-nonce-add-edit-template");
          $rowNumber = 1;

         if($templateids){
          $templateids = explode(",", $templateids);
          $templateArray = array();
          if($templateids){
            foreach($templateids as $coid){
              if($coid){
                $templateArray[] = $wpdb->get_row("SELECT * FROM $faq_table WHERE id={$coid}", ARRAY_A);
              }
            }
          }
          foreach ($templateArray as $allTemplate) {
            echo "<div class='afaq-6310-col-3'>";
          ?>
            <div class='template-form-fields'>
              <span class="afaq-6310-btn-danger-delete afaq-6310-pull-right" id="template-id-<?php echo $allTemplate['id'] ?>">
                  <i class="far fa-times-circle" aria-hidden="true"></i>
              </span>
              <table width='100%'>
                  <input type='hidden' name='id[]' value='<?php echo $allTemplate['id'] ?>' /> 
                  <tr height="40px" class="afaq-6310-form-title">
                    <td>Title:</td>
                    <td width="200px"><input type="text" name="title[]" class="afaq-6310-form-input" value='<?php echo $allTemplate['title'] ?>'></td>
                  </tr>
                  <tr height="110px" class="afaq-6310-form-description">
                    <td>Description:</td>
                    <td><textarea name="description[]" class="afaq-6310-form-input"><?php echo $allTemplate['description'] ?></textarea></td>
                  </tr>
                  <tr  height="40px"class="afaq-6310-form-number">
                    <td>Number:</td>
                    <td><input type="number" name="number[]" class="afaq-6310-form-input" value='<?php echo $allTemplate['numbers'] ?>'></td>
                  </tr>
                  <tr height="40px" class="afaq-6310-form-readmore">
                    <td>Button Text:</td>
                    <td><input type="text" name="readmore[]" class="afaq-6310-form-input" value='<?php echo $allTemplate['link_text'] ?>'></td>
                  </tr>
                  <tr height="40px" class="afaq-6310-form-readmoreurl">
                    <td>Button URL:</td>
                    <td><input type="text" name="readmoreurl[]" class="afaq-6310-form-input" value='<?php echo $allTemplate['link_url'] ?>'></td>
                  </tr>
                  <tr height="90px" class="afaq-6310-form-image">
                    <td>Picture:</td>
                    <td>
                      <input type="text" name="image[]" id="image-<?php echo $rowNumber; ?>" class="afaq-6310-form-input"  value='<?php echo $allTemplate['image'] ?>'>
                      <input type="button" id="btn-image-<?php echo $rowNumber; ?>" value="Upload Image" class="afaq-6310-btn-default afaq-6310-image-upload" style='margin-top: 5px;'>
                    </td>
                  </tr>
                  <tr height="80px" class="afaq-6310-form-hover-image">
                    <td>Hover Picture:</td>
                    <td>
                      <input type="text" name="hoverimage[]" id="hover-image-<?php echo $rowNumber; ?>" class="afaq-6310-form-input" value='<?php echo $allTemplate['hoverimage'] ?>'>
                      <input type="button" id="btn-hover-image-<?php echo $rowNumber; ?>" value="Upload Image" class="afaq-6310-btn-default afaq-6310-image-upload" style='margin-top: 5px;'>
                    </td>
                  </tr>
              </table>
            </div> 
          <?php  
            echo "</div>";
            $rowNumber++;
          }
        }
          ?>
        </div>
        <div style="width: 100%; margin-left: 15px;">
            <span class="afaq-6310-btn-default afaq_6310_icon_new-edit" id="add-template" style="padding: 8px 15px; display: inline-block;">Add More</span>
          </div>
      </div>
      <div class="afaq-6310-modal-form-footer">
        <button type="button" name="close" class="afaq-6310-btn-danger afaq-6310-pull-right">Close</button>
        <input type="submit" name="faq-for-elementor-save" class="afaq-6310-btn-primary afaq-6310-pull-right afaq-6310-margin-right-10" value="Save" />
      </div>
    </form>
    <br class="afaq-6310-clear" />
  </div>
</div>

<style>
  .afaq-6310-ui-state-default {
    padding: 8px 10px;
    cursor: pointer;
    border-radius: 3px;
  }
</style>
<script>
  jQuery(document).ready(function() {
    /* ######### Media Start ########### */
    jQuery("body").on("click", ".afaq-6310-image-upload", function (e) {
         e.preventDefault();
         var ids = jQuery(this).attr("id");
         ids = ids.substr(4);

         var image = wp.media({
            title: 'Upload Image',
            multiple: false
         }).open()
                 .on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    jQuery(`#${ids}`).val(image_url);
                    //jQuery("#vkcmu-favicon-image").attr("src", image_url);
                 });

         jQuery("#afaq_6310_add_new_media").css({
            "overflow-x": "hidden",
            "overflow-y": "auto"
         });
      });
      /* ######### Media End ########### */

      
    /* Remove template */
    jQuery("body").on('click', ".afaq-6310-btn-danger-delete", function(){
      let ids = jQuery(this).attr("id");
      ids = parseInt(ids.substr(11));
      if(ids){
        let removeIds = $("#removeIds").val();
        removeIds += "," + ids;
        $("#removeIds").val(removeIds);
      }
      jQuery(this).closest('.afaq-6310-col-3').remove();
    });
    /* Add more button for template */
    let rowNumber = <?php echo $rowNumber; ?>;
    jQuery("#add-template").on("click", function(){
      let html = `
      <div class='afaq-6310-col-3'>
        <div class='template-form-fields'>
          <span class="afaq-6310-btn-danger-delete afaq-6310-pull-right" id="template-id-0">
              <i class="far fa-times-circle" aria-hidden="true"></i>
          </span>
          <table width='100%'>
              <input type='hidden' name='id[]' value='0' /> 
              <tr height="40px" class="afaq-6310-form-title">
                <td>Title:</td>
                <td width="200px"><input type="text" name="title[]" class="afaq-6310-form-input"></td>
              </tr>
              <tr height="110px" class="afaq-6310-form-description">
                <td>Description:</td>
                <td><textarea name="description[]" class="afaq-6310-form-input"></textarea></td>
              </tr>
              <tr  height="40px"class="afaq-6310-form-number">
                <td>Number:</td>
                <td><input type="number" name="number[]" class="afaq-6310-form-input"></td>
              </tr>
              <tr height="40px" class="afaq-6310-form-readmore">
                <td>Button Text:</td>
                <td><input type="text" name="readmore[]" class="afaq-6310-form-input"></td>
              </tr>
              <tr height="40px" class="afaq-6310-form-readmoreurl">
                <td>Button URL:</td>
                <td><input type="text" name="readmoreurl[]" class="afaq-6310-form-input"></td>
              </tr>
              <tr height="90px" class="afaq-6310-form-image">
                <td>Picture:</td>
                <td>
                  <input type="text" name="image[]" id="image-${rowNumber}" class="afaq-6310-form-input">
                  <input type="button" id="btn-image-${rowNumber}" value="Upload Image" class="afaq-6310-btn-default afaq-6310-image-upload" style='margin-top: 5px;'>
                </td>
              </tr>
              <tr height="80px" class="afaq-6310-form-hover-image">
                <td>Hover Picture:</td>
                <td>
                  <input type="text" name="hoverimage[]" id="hover-image-${rowNumber}" class="afaq-6310-form-input">
                  <input type="button" id="btn-hover-image-${rowNumber}" value="Upload Image" class="afaq-6310-btn-default afaq-6310-image-upload" style='margin-top: 5px;'>
                </td>
              </tr>
          </table>
        </div>  
      </div>      
      `;
      jQuery(".afaq-6310-row-form").append(html);
      rowNumber++;
    });




    jQuery(function() {
    jQuery("#afaq-6310-sortable").sortable();
    jQuery("#afaq-6310-sortable").disableSelection();
    jQuery("#afaq-6310-sortable-template").sortable();
    jQuery("#afaq-6310-sortable-template").disableSelection();
  });

    jQuery("#afaq-6310-sortable-sub").click(function() {
      var list_sortable = jQuery('#afaq-6310-sortable').sortable('toArray').toString();
      jQuery("#rearrange_list").val(list_sortable);
    });
    jQuery("#afaq-6310-sortable-template-sub").click(function() {
      var list_sortable = jQuery('#afaq-6310-sortable-template').sortable('toArray').toString();
      jQuery("#rearrange_template_list").val(list_sortable);
    });

    jQuery("body").on("click", ".afaq-6310-row-select-checkbox", function(event) {
      event.stopPropagation();
    });
    jQuery("body").on("click", ".afaq-6310-row-select", function() {
      var id = jQuery(this).attr("id");
      if (jQuery("#chk-box-" + id).prop('checked') == true) {
        jQuery("#chk-box-" + id).prop('checked', false);
        return false;
      } else {
        jQuery("#chk-box-" + id).prop('checked', true);
        return true;
      }

    });

    jQuery("body").on("click", "#afaq_6310_rearrange_team", function() {
      jQuery("#afaq_6310_rearrange_faq_faq_modal").fadeIn(500);
      jQuery("body").css({
        "overflow": "hidden"
      });
      return false;
    });

    jQuery("body").on("click", "#afaq_6310_rearrange_template", function() {
      jQuery("#afaq_6310_rearrange_template_modal").fadeIn(500);
      jQuery("body").css({
        "overflow": "hidden"
      });
      return false;
    });

    jQuery("body").on("click", "#afaq_6310_add_or_edit_template", function() {
      jQuery("#afaq_6310_add_or_edit_template_modal").fadeIn(500);
      jQuery("body").css({
        "overflow": "hidden"
      });
      return false;
    });
    jQuery("body").on("click", ".afaq-6310-close, .afaq-6310-btn-danger", function() {
      jQuery("#afaq_6310_add_or_edit_template_modal, #afaq_6310_rearrange_faq_faq_modal, #afaq_6310_rearrange_template_modal").fadeOut(500);
      jQuery("body").css({
        "overflow": "initial"
      });
    });
    jQuery(window).click(function(event) {
      if (event.target == document.getElementById('afaq_6310_rearrange_faq_faq_modal')) {
        jQuery("#afaq_6310_rearrange_faq_faq_modal").fadeOut(500);
        jQuery("body").css({
          "overflow": "initial"
        });
      }
      if (event.target == document.getElementById('afaq_6310_rearrange_template_modal')) {
        jQuery("#afaq_6310_rearrange_template_modal").fadeOut(500);
        jQuery("body").css({
          "overflow": "initial"
        });
      }
      if (event.target == document.getElementById('afaq_6310_add_or_edit_template_modal')) {
        jQuery("#afaq_6310_add_or_edit_template_modal").fadeOut(500);
        jQuery("body").css({
          "overflow": "initial"
        });
      }
    });
  });
</script>