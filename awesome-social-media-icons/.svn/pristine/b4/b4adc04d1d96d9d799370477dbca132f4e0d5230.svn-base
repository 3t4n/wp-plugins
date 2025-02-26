<?php  if( !defined('ABSPATH') ) die();
add_thickbox(); ?>
<div id="icons-list" style="display:none;">
     <?php  include_once 'viewicons.php'; ?>
     <script type="text/javascript">
  jQuery(document).ready(function($) {

    $('.icons-lists a').click(function(event) {
      event.preventDefault();
      id = $(this).find('i').attr('class');
      $('input#icon_file').val(id);
      $('#fa-placeholder').removeClass().addClass(id);      
      $('#fa-placeholder').show();
      $("#TB_closeWindowButton").trigger('click');
    });
  });
</script>
</div>
<div class="wrap">
    <h2>Add Social Icons</h2>
<form method="POST" action="" enctype="multipart/form-data">
  <?php wp_nonce_field('asmi_insert_icon'); ?>
  <table class="table table-striped table-bordered">
        <tr>
          <th>Name :</th>
    	    <td><input type="text" name="social_media_name" class="form-control"></td>
        </tr>
    	<tr>
         <th>Url :</th>
          <td><input type="text" name="social_link" class="form-control">
          <strong>Please don't forgot to write </strong><em>https://</em></td>
      </tr>
      <tr>
      <th>Image :</th>
        <td><i id="fa-placeholder" class="fa <?php echo $image_url; ?>" aria-hidden="true" style="font-size: 30px;"></i>
            <a title="Social Icons" href="#TB_inline?width=540&height=320&inlineId=icons-list" class="thickbox button">Click to choose icon</a>
            <input type="hidden" name="image_file" value="<?php echo $image_url ?>" id="icon_file" class="regular-text"  readonly="readonly">
        </td>
      </tr>
        <tr>
    		 <td colspan="3"><input type="submit" value="Add icon" name="submit" class="btn btn-primary"> </td>
    	  </tr>
      </table>
</form>
</div>

<?php 
if( current_user_can('administrator')){
  function asmi_insert_socialicon() {

      if(isset($_POST['submit']) && check_admin_referer('asmi_insert_icon')){
    	  global $wpdb;
        $social_media_name = sanitize_text_field($_POST['social_media_name']);
        $social_link = sanitize_text_field($_POST['social_link']);
        $social_image = sanitize_text_field($_POST['image_file']);
       
        $table_name = $wpdb->prefix ."s_icon";
        $wpdb->insert($table_name,
         array('Title' => $social_media_name,
              'Url'=>$social_link,
              'Icon'=>$social_image));
      }
  }//function end

    if(isset($_POST['submit']) && check_admin_referer('asmi_insert_icon')){
    if(empty($_POST['social_media_name']) or empty($_POST['social_link'])){
        $errormsg='Please enter Social media name & Url Correctly...!!!';
        echo '<h5 style="color:red">' . $errormsg . '</h5>';

    }
    else{
          asmi_insert_socialicon();
          $sucessmessage="Awsesome social icon successfully added.";
          echo '<h5 style="color:green">' . $sucessmessage . '</h5>';
          
        }
  }//end if
}//end if