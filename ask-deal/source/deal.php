<?php
if (!function_exists('askdl_deal')) {
function askdl_deal(){
    global $wpdb;
    if(current_user_can('administrator') != 1) {
        echo "you don't have sufficient permission";
        exit;
    }
    if(isset($_POST['submit'])){
        $formval = array();
        $title = sanitize_text_field( $_POST['title'] );
        $dealdescription = sanitize_textarea_field( $_POST['description'] );
        $dealaskdeal = sanitize_text_field($_POST['askdeal']);
        $dealtype = sanitize_text_field($_POST['type']);
        if(empty($title) || empty($dealdescription)){
            echo ("<script>location.href = '".admin_url()."admin.php?page=deal&msg=error';</script>");
        }
        if($dealtype == "dealform"){
            $formval = array("fieldname" => askdl_sanitize_array_field($_POST['fieldname']), "fieldtype" => askdl_sanitize_array_field($_POST['fieldtype']), "infotype" => askdl_sanitize_array_field($_POST['infotype']));
        }
        $askdeal = 0;
        if(!empty($dealaskdeal)){
            $askdeal = $dealaskdeal;
        }
         $type = '';
        if(!empty($dealtype)){
            $type = $dealtype;
        }
        if(wp_verify_nonce( $_POST['addaskdeal'], 'addaskdeal-'.$_POST['nid'] )){
          $insert = $wpdb->insert($wpdb->prefix.'deal', array( 'title' => $title, 'description' => $dealdescription,'price' =>sanitize_text_field($_POST['price']),'added_date' => date("Y-m-d H:i:s"),'modified_date' => date("Y-m-d H:i:s"),'image' => sanitize_text_field($_POST['image_attachment_id']),'askdeal' => sanitize_text_field($askdeal),'type' => sanitize_text_field($type),'typevallink' => sanitize_text_field($_POST['typevallink']),'button_title' => sanitize_text_field($_POST['askdeal_buttontitle']),'typevalfrm' => json_encode($formval)),array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'));
          echo ("<script>location.href = '".admin_url()."admin.php?page=deal&msg=insert';</script>");
        }
    }
    $orderby = sanitize_text_field($_GET['orderby']);
    $order = sanitize_text_field($_GET['order']);
    if(!(empty($orderby)  && empty($order))){
        $all_results = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'deal where is_deleted = 0 ORDER BY '.$orderby.' '.$order , ARRAY_A );
    }else{
        $all_results = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'deal where is_deleted = 0', ARRAY_A  );
    }
    $id = sanitize_text_field($_GET['id']);
    if(!(empty($_GET['action'])  && empty($id))){
        if($_GET['action'] == 'delete'){
            if(empty($id)){
                echo ("<script>location.href = '".admin_url()."admin.php?page=deal&msg=error';</script>");
            }
            if(wp_verify_nonce( $_GET['addaskdeal'], 'addaskdeal-'.$id )){
              $update = $wpdb->update($wpdb->prefix.'deal', array( 'is_deleted' => 1, 'modified_date' => date("Y-m-d H:i:s")),array( 'id' => $id ),array('%s','%s'),array( '%d' ));
              echo ("<script>location.href = '".admin_url()."admin.php?page=deal&msg=delete';</script>");
            }
        }
        if($_GET['action'] == 'edit'){
            $id = sanitize_text_field($_GET['id']);
            if(empty($id)){
                echo ("<script>location.href = '".admin_url()."admin.php?page=deal&msg=error';</script>");
            }
            $edit_val = $wpdb->get_row( 'SELECT * FROM '.$wpdb->prefix.'deal WHERE id ='.$id, ARRAY_A );
        }
    }
    if(isset($_POST['update'])){
        $title = sanitize_text_field( $_POST['title'] );
        $dealdescription = sanitize_textarea_field( $_POST['description'] );
        $dealaskdeal = sanitize_text_field($_POST['askdeal']);
        if(empty($title) || empty($dealdescription)){
            echo ("<script>location.href = '".admin_url()."admin.php?page=deal&msg=error';</script>");
        }
        $formval = array();
        if($_POST['type'] == "dealform"){
            $formval = array("fieldname" => askdl_sanitize_array_field($_POST['fieldname']), "fieldtype" => askdl_sanitize_array_field($_POST['fieldtype']), "infotype" => askdl_sanitize_array_field($_POST['infotype']));
        }
        if(wp_verify_nonce( $_POST['addaskdeal'], 'addaskdeal-'.$_POST['nid'] )){
            $update = $wpdb->update($wpdb->prefix.'deal', array( 'title' => $title, 'description' => $dealdescription,'price' =>sanitize_text_field($_POST['price']),'modified_date' => date("Y-m-d H:i:s"),'image' => sanitize_text_field($_POST['image_attachment_id']),'askdeal' => sanitize_text_field(intval($_POST['askdeal'])),'type' => sanitize_text_field($_POST['type']),'typevallink' => sanitize_text_field($_POST['typevallink']),'typevalfrm' => json_encode($formval),'button_title' => sanitize_text_field($_POST['askdeal_buttontitle'])),array( 'id' =>sanitize_text_field($_GET['id'])),array('%s','%s','%s','%s','%s','%s','%s','%s','%s'),array( '%d' ));
            echo ("<script>location.href = '".admin_url()."admin.php?page=deal&msg=update';</script>");
        }
    }
    if(isset($_POST['delete_mul'])){
        if(wp_verify_nonce( $_POST['deleteaskdeal'], 'delete')){
          $dealArr = askdl_sanitize_array_field($_POST['deal']);  
          if(is_array($dealArr)){
            $deal_ids = implode(',',$dealArr);
            $wpdb->query("UPDATE ".$wpdb->prefix."deal set is_deleted = 1, modified_date='".date("Y-m-d H:i:s")."' WHERE id IN(".$deal_ids.")");
            echo ("<script>location.href = '".admin_url()."admin.php?page=deal&msg=delete';</script>");
          }
        }
    } 
?>
<style>
    .submit:hover{
      background-color: transparent;
    }
</style>
<script type="text/javascript">
jQuery(document).ready(function($) {
    jQuery('#select-all-info').on('click',function(e){
        var w = window;
        try {
          var inputs = w.document.getElementsByTagName('input');
          for (var i=0; i < inputs.length; i++) {
            if (inputs[i].type && inputs[i].type == 'checkbox'){
              inputs[i].checked = !inputs[i].checked;}
          }
        } catch (e){}
        if(w.frames && w.frames.length>0){
          for(var i=0;i<w .frames.length;i++){
            var fr=w.frames[i];checkFrames(fr);
          }
        }
    });
});
</script>
<div class="wrap">
        <h1> <?php if($_GET['section'] == ''){?><?php echo __("Ask deal","askdl-askdeal"); ?>&nbsp;&nbsp;<a  class="page-title-action" href="admin.php?page=deal&section=form"><?php echo __("Add New","askdl-askdeal"); ?></a><?php }else if($_GET['action'] == 'edit'){ echo __("Edit","askdl-askdeal"); }else{ echo __("Add New","askdl-askdeal"); } ?></h1>
        <?php if($_GET['section'] == ''){ ?>
            <?php if($_GET['msg'] != ''){ ?>
                <?php if($_GET['msg'] != "error"){ ?>
                  <div class="updated fade">
                    <p>
                            <?php if($_GET['msg']=='insert'){ echo __("Ask deal Inserted","askdl-askdeal");}
                            if($_GET['msg']=='update'){ echo __("Ask deal Updated","askdl-askdeal"); }
                            if($_GET['msg']=='delete'){ echo __("Ask deal Deleted","askdl-askdeal"); }
                            ?>
                    </p>
                  </div>
                <?php }else{ ?>
                  <div class="error fade">
                    <p>
                            <?php
                            if($_GET['msg']=='error'){ echo __("Please enter all required fields","askdl-askdeal"); }
                            ?>
                    </p>
                  </div>
                  <?php } ?>
            <?php } ?>
            <div id="inforgraphic-master-details" style="margin-top:2%">
                <form method="post" enctype="multipart/form-data">
                    <table class="wp-list-table widefat fixed striped posts" style="border-top:1px solid lightgrey;margin-bottom:2%">
                        <thead>
                            <tr scope="row">
                              <th style="width:5%" scope="column"> <input type="checkbox" id="select-all-info"> </th>
                              <th style="width:5%" scope="column"> <a href="admin.php?page=deal&orderby=id<?php if($_GET['order']=="" || $_GET['order']=="desc"){?>&order=ASC<?php }else{ ?>&order=DESC<?php } ?>"><?php echo __("ID","askdl-askdeal");?> </a></th>
                              <th scope="column"><?php echo __("Title","askdl-askdeal");?></th>
                              <th scope="column"> <?php echo __("Price","askdl-askdeal");?> </th>
                              <th scope="column"> <?php echo __("Shortcode","askdl-askdeal");?> </th>
                              <th scope="column"><?php echo __("Added Date","askdl-askdeal");?> </th>
                              <th scope="column"> <?php echo __("Action","askdl-askdeal");?> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" name="addaskdeal" value="<?=$nones;?>">
                            <?php  foreach($all_results as $result){ ?>
                            <tr scope="row" style="border-bottom:1px solid grey;">
                                <td style="width:5%;padding-left: 18px;" scope="column"> <input type="checkbox" class="chk-box-info" value="<?=esc_attr($result['id']);?>" name="deal[]"> </td>
                                <td style="width:5%" scope="column"><?=esc_attr($result['id']);?>  </td>
                                <td scope="column"><?=esc_attr($result['title']);?></td>
                                <td scope="column"> <?=esc_attr($result['price']);?> </td>
                                <td scope="column"><input type="text" value="[deal id='<?=esc_attr($result['id']);?>']"></td>
                                <td scope="column"> <?php echo date("M j, Y",strtotime($result['added_date'])); ?>   </td>
                                <td style="width:20%" scope="column"><a href="<?=admin_url();?>admin.php?page=deal&section=form&action=edit&id=<?=esc_attr($result['id']);?>"> <?php echo __("Edit","askdl-askdeal");?> </a><br><a href="<?=admin_url();?>admin.php?page=deal&action=delete&id=<?=esc_attr($result['id']);?>&addaskdeal=<?=wp_create_nonce('addaskdeal-'.$result['id']);?>"><?php echo __("Delete","askdl-askdeal");?></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="deleteaskdeal" value="<?=wp_create_nonce('delete');?>">
                    <input type="submit" value="Delete" name="delete_mul" class="button action">
                </form>
            </div>
      <?php } if($_GET['section'] == 'form'){
        wp_enqueue_media(); ?>
  <style>
      th span{
        color:#ff0000;
      }
      .invalid{
        border:1px solid #ff0000!important;
      }
      .mar_10{
        margin-top:10px!important;
      }
  </style>
  <div id="inforgraphic-master-form"">
    <?php
        $cookie_name = 'number';
        $cookie_value = rand(10,100);
        $nones = wp_create_nonce('addaskdeal-'.$cookie_value);
    ?>
    <form method="post" id="add_editdeal" action="">
      <table class='wp-list-table widefat fixed'>
          <tr>
              <th style="width:15%;"><?php echo __("Title","askdl-askdeal");?><span>*</span></th>
              <td style="width:85%;"><input type="hidden" name="nid" value="<?=$cookie_value;?>"><input type="hidden" name="addaskdeal" value="<?=$nones;?>"><input type="text" name="title" value="<?php echo esc_attr($edit_val['title']); ?>" class="ss-field-width required" style="width: 50%;" required/></td>
          </tr>
          <tr>
              <th style="width:15%;"><?php echo __("Description","askdl-askdeal");?><span>*</span></th>
              <td style="width:85%;"><textarea name="description"  class="ss-field-width required" style="width: 50%;height: 95px;" required><?php echo esc_attr($edit_val['description']); ?></textarea></td>
          </tr>
          <tr>
              <th style="width:15%;"><?php echo __("Price","askdl-askdeal"); ?></th>
              <td style="width:85%;"><input type="text" name="price" value="<?php echo esc_attr($edit_val['price']); ?>" class="ss-field-width"  style="width: 50%;" /><br /><span><?php echo __("if you keep blank, it will not show.","askdl-askdeal"); ?></span></td>
          </tr>
          <tr>
            <th style="width:15%;"><?php echo __("Image","askdl-askdeal"); ?><span>*</span></th>
            <td style="width:85%;">
              <input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image',"askdl-askdeal" ); ?>" style="float: left;"/>
              <div class='image-preview-wrapper' style="float: left;margin-left: 2%;">
                <img id='image-preview' src='<?php echo wp_get_attachment_url( esc_attr($edit_val['image']) ); ?>' height='100'>
          		</div>
          		<input type='hidden' name='image_attachment_id' id='image_attachment_id' class="required" value='<?php echo esc_attr($edit_val['image']); ?>' required>
            </td>
          </tr>
          <tr>
              <th style="width:15%;"><?php echo __("Ask for Deal button ?","askdl-askdeal"); ?> </th>
              <td style="width:85%;"><input type="checkbox" name="askdeal" value="1" class="ss-field-width askdealbtn" <? $btn = 0; if( esc_attr($edit_val['askdeal']) == "1"){ echo "checked"; $btn = 1; } ?>/><input type="text" name="askdeal_buttontitle" placeholder="Button Title" value="<?php echo $edit_val['button_title']; ?>" class="ss-field-width askdeal_buttontitle"  style="width: 50%;<? if( esc_attr($edit_val['button_title']) != "" || $btn){ ?><?php }else{ ?>display:none<?php } ?>" /></td>
          </tr>
          <tr class="dealbtn" <? if( $edit_val['type'] != ""){ ?><?php }else{ ?>style="display:none" <?php } ?>>
              <th style="width:15%;"><?php echo __("Type","askdl-askdeal"); ?></th>
              <td style="width:85%;"><input type="radio" name="type" value="deallink" class="ss-field-width askdeal_type" <? if( $edit_val['type'] == "deallink"){ echo "checked"; } ?>/> <?php echo __("Link","askdl-askdeal") ?>  <input type="radio" name="type" value="dealform" class="ss-field-width askdeal_type" <? if( $edit_val['type'] == "dealform"){ echo "checked"; } ?> /> <?php echo __("Form","askdl-askdeal"); ?></td>
          </tr>
          <tr class="deallink" <? if( $edit_val['type'] == "deallink" && $edit_val['type'] != "" ){  }else{ ?>style="display:none"<?php } ?>>
              <th style="width:15%;"><?php echo __("Link","askdl-askdeal"); ?></th>
              <td style="width:85%;"><input type="text" name="typevallink" value="<?=esc_url($edit_val['typevallink']);?>" class="ss-field-width" style="width: 50%;"/></td>
          </tr>
          <tr class="dealform" <? if( $edit_val['type'] == "dealform" && $edit_val['type'] != "" ){  }else{ ?>style="display:none"<?php } ?>>
              <th style="width:15%;"><?php echo __("Form","askdl-askdeal"); ?>  <a  id="add_morefield" alt="2"><?php echo __("Add field","askdl-askdeal"); ?></a></th>
              <td style="width:85%;">
                <div class="form_area">
                  <table id="add_moretbl">
                    <?php
                      $fieldval = json_decode($edit_val['typevalfrm'],true);
                      if(count($fieldval['fieldname']) > 0){
                      foreach($fieldval['fieldname'] as $key => $field){
                    ?>
                      <tr id="field-<?=$key;?>">
                        <td><input type="text" name="fieldname[]" value="<?=$field;?>" class="regular-text" placeholder="Field Name"/><input type="hidden" name="infotype[]" value="<?=esc_attr($fieldval['infotype'][$key]);?>"/></td>
                        <td>
                          <select name="fieldtype[]" class="regular-text">
                            <option value="textbox" <?php if($fieldval['fieldtype'][$key] == "textbox"){ echo "selected"; }?>><?php echo __("Textbox","askdl-askdeal"); ?></option>
                            <option value="email" <?php if($fieldval['fieldtype'][$key] == "email"){ echo "selected"; }?>><?php echo __("Email","askdl-askdeal"); ?></option>
                            <option value="textarea" <?php if($fieldval['fieldtype'][$key] == "textarea"){ echo "selected"; }?>><?php echo __("Textarea","askdl-askdeal"); ?></option>
                          </select>
                        </td>
                        <td>
                          <?php
                            if($fieldval['infotype'][$key] == "deal"){
                          ?>
                          <a  class="delete_field" alt="<?=$key;?>"><?php echo __("Delete","askdl-askdeal"); ?></a>
                          <?php
                            }
                          ?>
                        </td>
                      </tr>
                    <?php } }else{
                        $fieldval = array("fieldname" =>array("Name","Email","Phone","What is your budget?","Provide more details
"),"fieldtype" =>array("textbox","email","textbox","textbox","textarea"),"infotype" =>array("personal","personal","personal","deal","deal"));
                        //$fieldArr = array("Name","Email","phone");
                        foreach($fieldval['fieldname'] as $key => $field){
                    ?>
                    <tr id="field-<?=$key;?>">
                        <td><input type="text" name="fieldname[]" value="<?=$field;?>" class="regular-text" placeholder="Field Name"/><input type="hidden" name="infotype[]" value="<?=esc_attr($fieldval['infotype'][$key]);?>"/></td>
                        <td>
                          <select name="fieldtype[]" class="regular-text">
                            <option value="textbox" <?php if($fieldval['fieldtype'][$key] == "textbox"){ echo "selected"; }?>><?php echo __("Textbox","askdl-askdeal"); ?></option>
                            <option value="email" <?php if($fieldval['fieldtype'][$key] == "email"){ echo "selected"; }?>><?php echo __("Email","askdl-askdeal"); ?></option>
                            <option value="textarea" <?php if($fieldval['fieldtype'][$key] == "textarea"){ echo "selected"; }?>><?php echo __("Textarea","askdl-askdeal"); ?></option>
                          </select>
                        </td>
                        <td>
                        <?php
                        if($fieldval['infotype'][$key] == "deal"){
                        ?>
                          <a  class="delete_field" alt="<?=$key;?>"><?php echo __("Delete","askdl-askdeal"); ?></a>
                        <?php
                        }
                        ?>
                        </td>
                      </tr>
                   <?php } } ?>
                  </table>
                  </div>
              <script type='text/javascript'>
                jQuery("#add_morefield").click(function(){
                  var last_fieldid = jQuery(this).attr("alt");
                  var field_html = '<tr id="field-'+last_fieldid+'"><td><input type="text" name="fieldname[]" class="regular-text" placeholder="Field Name"/><input type="hidden" name="infotype[]" value="deal"/></td><td><select name="fieldtype[]" class="regular-text"><option value="textbox" >Textbox</option><option value="textarea">Textarea</option></select></td><td><a  class="delete_field" alt="'+last_fieldid+'">Delete</a></td></tr>';
                  jQuery("#add_moretbl").append(field_html);
                  jQuery(this).attr("alt",(parseInt(last_fieldid)+1));
                });
                jQuery(document).on("click",".delete_field",function(){
                  var last_fieldid = jQuery(this).attr("alt");
                  console.log(last_fieldid);
                  jQuery("#field-"+last_fieldid).remove();
                });
              </script>
          </tr>
      </table>
      <?php if($edit_val['id'] > 0){ ?>
        <input type='submit' name="update" value='Update' class='button mar_10'> 
      <?php }else{ ?>
        <input type='submit' name="submit" value='Save' class='button mar_10'>
      <?php } ?>
  </form>
 </div>
</div>
<script>
jQuery(document).ready(function(){
jQuery(document).on("click",".button",function(event){
  var isvalid = true;
  //event.preventDefault();
  jQuery(".required").each(function( index ) {
    if(jQuery( this ).val() == ""){
      jQuery( this ).addClass("invalid");
      isvalid = false;
    }else{
      jQuery( this ).removeClass("invalid");
    }
  });

});
});
</script>
<?php
add_action( 'admin_footer', 'askdl_media_selector_print_scripts' );
if (!function_exists('askdl_media_selector_print_scripts')) {
function askdl_media_selector_print_scripts() {
?>
<script type='text/javascript'>
		jQuery( document ).ready( function( $ ) {
			// Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = 0; // Set this
			jQuery('#upload_image_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});
				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();
					// Do something with attachment.id and/or attachment.url here
					$( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					$( '#image_attachment_id' ).val( attachment.id );
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});
					// Finally, open the modal
					file_frame.open();
			});
			// Restore the main ID when the add media button is pressed
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
      jQuery( '.askdealbtn' ).on( 'change', function() {
				if(jQuery(this).prop("checked")){
          $(".dealbtn").show();
          $(".askdeal_buttontitle").show();
          
          //$(".deallink").show();
        }else{
          $(".dealbtn").hide();
          $(".deallink").hide();
          $(".dealform").hide();
          $(".askdeal_buttontitle").hide();
        }
			});
      jQuery( '.askdeal_type' ).on( 'change', function() {
        var typeval  = $(this).val();
				if(typeval == "deallink"){
          $(".deallink").show();
          $(".dealform").hide();
        }else{
          $(".deallink").hide();
          $(".dealform").show();
        }
			});
		});
	</script>
<?php
}
}
}
}
}
/**
 * Recursive sanitation for  array
 * 
 * @param $array_or_string (array)
 * @since  0.3
 * @return mixed
 */
if (!function_exists('askdl_sanitize_array_field')) {
function askdl_sanitize_array_field($array_or_string) {
    if( is_array($array_or_string) ){
        $dealArr = array();
        foreach ( $array_or_string as $key => $value ) {
            $dealArr[sanitize_text_field( $key )] = sanitize_text_field( $value );
        }
    }

    return $dealArr;
}
}
?>