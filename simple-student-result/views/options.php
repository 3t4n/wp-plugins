<div class="wrap">
<div class="set_heading"><h2 class="plugin_heading"><?php echo SSR_PLUGIN_NAME; ?> Settings</h2>  <h5>ver: <?php echo esc_attr( get_option('ssr_version_installed') ) ?></h5>
<h1 style="color:#fff">The data shared by this plugin will be available publicly . So,This is <b>STRONGLY</b> recommended that Do not share any personal information of any person.</h1>
</div>
<table id="myOptionsForm" class="form-tables">
        <tr valign="top">
        <th scope="row">Search Result heading</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item1" name="ssr_settings_ssr_item1" optionId="1" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item1') ); ?>" /></td>
        </tr>
        <th scope="row">Search box Text</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item2" name="ssr_settings_ssr_item2" optionId="2" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item2') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">No Result Text</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item3" name="ssr_settings_ssr_item3" optionId="3" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item3') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Plugin Slug (Example: Student / Employee)</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item4" name="ssr_settings_ssr_item4" optionId="4" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item4') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Menu Page Name</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item5" name="ssr_settings_ssr_item5" optionId="5" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item5') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Add Record Page Name</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item6" name="ssr_settings_ssr_item6" optionId="6" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item6') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">1st Custom Post slug (CGPA: CGPA)</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item7" maxlength="500" optionId="7" name="ssr_settings_ssr_item7" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item7') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">2nd Custom Post slug (Default: Subject)</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item8" maxlength="500" optionId="8" name="ssr_settings_ssr_item8" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item8') ); ?>" /></td>
        </tr>		
		<tr valign="top">
        <th scope="row"><h1 class="ssr_setting_title">Field Name on Database</h1></th>
        </tr>
	<?php
	$i=1;$j=9;

		while($i <= 13) {
		echo '<tr valign="top"><th scope="row">Field '.$i.'</th>';
		echo '<td><input type="text"  class="std_input" id="ssr_settings_ssr_item'.$j.'" name="ssr_settings_ssr_item'.$j.'" optionId="'.esc_attr( $j ).'" value="'.esc_attr( get_option('ssr_settings_ssr_item'.$j.'') ).'" />';
		echo '<input type="checkbox" name="ssr_item'.$i.'" id="ssr_item'.$i.'"  optionId="'.esc_attr( $i ).'" class="css-checkbox"'; 
		if ($i==1){echo 'checked="checked" onclick="return false" ><label for="ssr_item1" class="css-label">Mandatory</label>';}
		else{
		{if (esc_attr( get_option('checkedssr_item'.$i.'') )>0) echo 'checked="checked"';}
		echo '><label for="ssr_item'.$i.'" class="css-label">Required</label>';}
		echo '</td></tr>';
		$i++;$j++;
	}
	?>
		<br>
	    <tr valign="top">
        <th scope="row"></th>
        <td><button type="button" id="ssr_save_btn" disabled="disabled" style="opacity: 0.1; cursor: no-drop;">Save </button></td>
        </tr>
    </table>
</div>
<script>
	(function () {

    jQuery('.std_input').on('change keypress paste focus textInput input', function () {
		//if (typeof s_item !== 'undefined') {if (!jQuery(this).hasClass("ssr_unsaved"))s_item=s_item+1}else{s_item=1;};
			<?php
			if( !current_user_can('administrator')){ ?>
				if (jQuery(this).attr('id')=="ssr_settings_ssr_item34"){
					return false;
				}
			<?php } ?>
		   var val = this.value;
		   if(val == jQuery(this).attr('oldval') && jQuery(this).hasClass("ssr_unsaved")){
			   jQuery(this).removeClass('ssr_unsaved');console.log("Old Data");
		   }else{
			   if (val != jQuery(this).attr('oldval')){
					console.log(this.id+" Changed , Total changes : "+jQuery('.ssr_unsaved').length+" Current value: "+val);
					jQuery("#ssr_save_btn").html("<?php echo __('Save','SSR') ?> ("+jQuery('.ssr_unsaved').length+")");jQuery(this).addClass("ssr_unsaved");jQuery("#ssr_save_btn").css({opacity: 1,cursor: "pointer"});jQuery("#ssr_save_btn").prop('disabled', false);jQuery("#ssr_save_btn").removeAttr("disabled");
			   }
		   }
		   if (jQuery('.ssr_unsaved').length < 1){
			   console.log("All Old Data");
			   jQuery("#ssr_save_btn").css({opacity: .1,cursor: "no-drop"});;jQuery("#ssr_save_btn").prop('disabled', true);jQuery("#ssr_save_btn").attr('disabled',true);
			   jQuery("#ssr_save_btn").html("<?php echo esc_attr_e('Save','SSR') ?> ");
		   }else{
			   jQuery("#ssr_save_btn").html("<?php echo esc_attr_e('Save','SSR') ?>  ("+jQuery('.ssr_unsaved').length+")");
		   }
    });
	
	jQuery("#ssr_save_btn").click(function() {
		if (jQuery('.ssr_unsaved').length > 0){
			var e = 1;
			while (e < jQuery(".std_input").length+2) {
				var t = document.getElementById("ssr_settings_ssr_item" + e);
				if (jQuery("#ssr_settings_ssr_item" + e).hasClass("ssr_unsaved")){
					check = jQuery.trim(t.value);
					console.log("submitting : "+check);
					jQuery.ajax({
						url: wpApiSettings.root + "v2/ssr_text_option",
						beforeSend: function ( xhr ) {
						xhr.setRequestHeader( 'X-WP-Nonce', wpApiSettings.nonce );jQuery("div#waiting_wrapper").css({"display": "block"})
						},
						method: "POST",
						data: {
							optionId: document.getElementById("ssr_settings_ssr_item" + e).getAttribute('optionId'),
							optionValue: document.getElementById("ssr_settings_ssr_item" + e).value,
						},
						success: function (s) {
							if(s.success==true){
								console.log("<?php echo esc_attr_e('Saved','SSR') ?> : " + t + " and Saved item :" + e)
							}
						}
					});
				}
				e = e + 1;
			}
			new jQuery.Zebra_Dialog("<?php echo esc_attr_e('Please wait ...','SSR') ?>", {
				buttons: !1,
				type: "confirmation",
				title: "<?php echo esc_attr_e('Saving','SSR') ?>",
				modal: !1,
				auto_close: 2e3
			})
			setTimeout(
			  function() 
			  {
						new jQuery.Zebra_Dialog("<?php echo esc_attr_e('Saved Successfully','SSR') ?>", {
						buttons: !1,
						type: "confirmation",
						title: "<?php echo esc_attr_e('Saved','SSR') ?>",
						modal: !1,
						auto_close: 4e3
					})
			  }, 1000
			);
			s_item=0;jQuery(".std_input").removeClass("ssr_unsaved");jQuery("#ssr_save_btn").attr("disabled","disabled");jQuery("#ssr_save_btn").prop('disabled', true);jQuery("#ssr_save_btn").css({opacity: .1,cursor: "no-drop"});jQuery("#ssr_save_btn").html("<?php echo esc_attr_e('Save','SSR') ?>");
		}
    });
}());
</script>