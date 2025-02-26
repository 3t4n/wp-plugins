
<?php
include_once "media_uploader_functions.php";
?>

<script language="javascript">
var WORDPRESS_VER = "<?php echo get_bloginfo("version") ?>";
var RCS_ADMIN_URL = '<?php echo admin_url() ?>';

function rcs_addImage_<?php echo $name; ?>(btn_id){
	
	var imageFormIndex = (new String(btn_id)).split('_').reverse()[0];
	jQuery('#imageFormIndex').val(imageFormIndex);
	jQuery('#imageEditorGoal').val('slide_image');
	jQuery('html').addClass('Image');
	
	
	var frame;
	if (WORDPRESS_VER >= "3.5") {
		
		
		if (frame) {
			
			frame.open();
			return;
		}
		frame = wp.media();
		frame.on("select", function(){
			var attachment = frame.state().get("selection").first();
			var fileurl = attachment.attributes.url;
			
			jQuery('#<?php echo $name; ?>').val(fileurl);
			frame.close();
			var img = jQuery('#image_holder_<?php echo $name; ?> img');
			if(img){
				img.remove();
			}
			rcs_addMediumImage_<?php echo $name; ?>(fileurl);
		});
		frame.open();
	}
	else {
		tb_show("", "media-upload.php?type=image&amp;TB_iframe=true&amp;tab=library");
		return false;
	}
}

//---------------------------------------------------------
function rcs_addMediumImage_<?php echo $name; ?>(attch_url){
	jQuery.ajax({
		type: 'POST',
		url: RCS_ADMIN_URL + 'admin-ajax.php',
		data: {
			action: 'RCS_GET_MEDIUM_IMG_I',
			attch_url: encodeURIComponent(attch_url)
		},
		success: function(data){
			var res = (new String(data)).split('--++##++--');
			jQuery('#image_holder_<?php echo $name; ?>').append('<img  src="' + attch_url + '" id="slide_image_<?php echo $name; ?>" />');
		}
	});
}
//---------------------------------------------------------
function rcs_addLargeImage(attch_url){
	jQuery.ajax({
		type: 'POST',
		url: RCS_ADMIN_URL + 'admin-ajax.php',
		data: {
			action: 'RCS_GET_LARGE_IMG_I',
			attch_url: encodeURIComponent(attch_url)
		},
		success: function(data){
			var res = (new String(data)).split('--++##++--');
			jQuery('#watermark_holder').append('<img src="' + res[1] + '" id="watermark" />');
			jQuery('#watermark_id').val(res[0]);
			jQuery('#deleteWatermark').css('display', 'block');
		}
	});
}


function eplm_rcs_deleteImage() {

    $('.eplm_class').val('');
    $('.eplm_img_class').fadeOut('slow');

    
}

if($('.eplm_class').val() == '')
{
    $('.eplm_img_class').hide();
}
</script>


<style>
.image_holder {
	max-width:180px;
	max-height:80px
}
#image_holder_dw_logo > img {
    border: 1px solid #f2f2f2;
    border-radius: 6px;
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
    height: auto;
    margin: auto;
    max-height: 79px;
    max-width: 180px;
    padding: 4px;
    vertical-align: middle;

    width: auto;
}
</style>

<div class="image_container<?php echo $name; ?>">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 row">
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" >

            <button type="button" class="col-md-12 button-secondary" style="width: 100%;text-align: center;" id="add_image_<?php echo $name; ?>"  onclick="rcs_addImage_<?php echo $name; ?>(this.id)"><?php _e('Add ', 'rc_slider') ?></button>
        </div>

		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"  >
            <button type="button" class="col-md-12 button button-danger" style="width:100%;text-align: center;" id="delete_image"  onclick="eplm_rcs_deleteImage()"><?php _e('Delete ', 'rc_slider') ?></button>

		</div>
        <?php
        echo "<input type=\"hidden\" placeholder=\"Choose a png transparent image\" class=\"form-control eplm_class \"  name=\"$name\" id=\"$name\"   value=\"$updatedvalue\" style='width: 170px;'  >";
        ?>
	</div>
	<?php
	
	$pluginsurl = plugins_url( '', __FILE__ );

	if($updatedvalue == '') $updatedvalue = '';
	?>
	<div class="col-md-4 col-xs-12 row" style="padding-bottom: 5px;">
		<div class="image_holder" id="image_holder_<?php echo $name; ?>">
			<img class="eplm_img_class" style="height: 100px; width: 150px; margin-top: 30px; margin-left: 0px; float: left"  id="slide_image_<?php echo $name; ?>"  src="<?php echo $updatedvalue; ?>">
		</div>

    </div>
</div>