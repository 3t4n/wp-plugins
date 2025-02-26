<div class="bs-docs-example tooltip-demo">
	<div style="background:#C3D9FF; padding-left:10px;">
		<h3><?php _e('AppointPress Dashboard','appointpress');?></h3>
	</div>
	<?php
		// get appointpress account details
		$ApAccDetails = unserialize(get_option('appointpress_account_details'));
	?>
	<form name="appointpress-acc-details" id="appointpress-acc-details" action="" method="post">
	<table class="table table-hover" width="60%" border="0">
	  <tr>
		<th colspan="5" align="left" style="background:#C3D9FF; padding-left:10px;" scope="row"><?php _e('AppointPress Account Details','appointpress');?></th>
	  </tr>
	  <tr>
	    <th width="2%" scope="row">&nbsp;</th>
		<th width="14%" scope="row"><?php _e('Email','appointpress');?></th>
		<td width="3%"><strong>:</strong></td>
		<td width="76%"><input type="text" name="email" id="email" maxlength="256" value="<?php if($ApAccDetails['appointpress_email']) echo $ApAccDetails['appointpress_email']; ?>" />&nbsp;<a href="#" rel="tooltip" title="<?php _e('Appointpress Signup Email','appointpress'); ?>" ><i  class="icon-question-sign"></i> </a></td>
		<td width="5%">&nbsp;</td>
	  </tr>
	  <?php if($ApAccDetails['appointpress_status'] == 'valid') {?>
	  <tr>
	    <th scope="row">&nbsp;</th>
	    <th scope="row"><?php _e('Use Short Code','appointpress');?></th>
	    <td><strong>:</strong></td>
	    <td><strong>[APPOINTPRESS]</strong>&nbsp;<a href="#" rel="tooltip" title="<?php _e('Use [APPOINTPRESS] short-code in any page or post','appointpress'); ?>" ><i  class="icon-question-sign"></i></a><br><br></td>
	    <td>&nbsp;</td>
      </tr>
	 
	  <tr>
        <th scope="row">&nbsp;</th>
	    <th scope="row"><?php _e('Booking Button Text','appointpress');?></th>
	    <td><strong>:</strong></td>
	    <td><input name="booking_button_text" type="text" id="booking_button_text" maxlength="50" value="<?php if($ApAccDetails['appointpress_booking_button_text']) echo $ApAccDetails['appointpress_booking_button_text']; else echo _e('Schedule New Appointment','appointpress'); ?>" />&nbsp;<a href="#" rel="tooltip" title="<?php _e('Booking Button Text','appointpress'); ?>"><i class="icon-question-sign"></i></a></td>
	    <td>&nbsp;</td>
      </tr>
	   
	   <tr>
	     <th scope="row">&nbsp;</th>
	     <th scope="row"><?php _e('Booking Button Color','appointpress');?></th>
	     <td><strong>:</strong></td>
	     <td>
		 	<?php 

				if($ApAccDetails['appointpress_booking_button_color'] != '')
				{
					$color = $ApAccDetails['appointpress_booking_button_color'];
				}
				else
				{
					$color = 'appointpress_btn-primary';
				}
			?>
		 	<input name="booking_appointpress_btn_color[]" id="booking_appointpress_btn_color[]" type="radio" value="appointpress_btn" <?php if($color == 'appointpress_btn') echo "checked='checked'"; ?> />
			<button class="appointpress_btn" type="button">Color 1</button>&nbsp;&nbsp;
			
			<input name="booking_appointpress_btn_color[]" id="booking_appointpress_btn_color[]" type="radio" value="appointpress_btn-primary" <?php if($color == 'appointpress_btn-primary') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-primary" type="button">Color 2</button>&nbsp;&nbsp;
			
		 	<input name="booking_appointpress_btn_color[]" id="booking_appointpress_btn_color[]" type="radio" value="appointpress_btn-info" <?php if($color == 'appointpress_btn-info') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-info" type="button">Color 3</button>&nbsp;&nbsp;
			
			<input name="booking_appointpress_btn_color[]" id="booking_appointpress_btn_color[]" type="radio" value="appointpress_btn-success" <?php if($color == 'appointpress_btn-success') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-success" type="button">Color 4</button><br><br>
			
			<input name="booking_appointpress_btn_color[]" id="booking_appointpress_btn_color[]" type="radio" value="appointpress_btn-warning" <?php if($color == 'appointpress_btn-warning') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-warning" type="button">Color 5</button>&nbsp;&nbsp;
			
			<input name="booking_appointpress_btn_color[]" id="booking_appointpress_btn_color[]" type="radio" value="appointpress_btn-danger" <?php if($color == 'appointpress_btn-danger') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-danger" type="button">Color 6</button>&nbsp;&nbsp;
			
			<input name="booking_appointpress_btn_color[]" id="booking_appointpress_btn_color[]" type="radio" value="appointpress_btn-inverse" <?php if($color  == 'appointpress_btn-inverse') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-inverse" type="button">Color 7</button>&nbsp;&nbsp;
			
			<input name="booking_appointpress_btn_color[]" id="booking_appointpress_btn_color[]" type="radio" value="appointpress_btn-link" <?php if($color == 'appointpress_btn-link') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-link" type="button">Link 8</button>&nbsp;&nbsp;<a href="#" rel="tooltip" title="<?php _e('Booking Button Color(s)','appointpress'); ?>"><i class="icon-question-sign"></i></a><br><br>
		 </td>
	     <td>&nbsp;</td>
      </tr>
	  <tr>
	    <th scope="row">&nbsp;</th>
	    <th scope="row"><?php _e('Booking Button Size','appointpress');?></th>
	    <td><strong>:</strong></td>
	    <td>
			<?php 
				if($ApAccDetails['appointpress_booking_button_size'])
				{
					$size = $ApAccDetails['appointpress_booking_button_size'];
				}
				else
				{
					$size = '';
				}
			?>
			<input name="booking_appointpress_btn_size[]" id="booking_appointpress_btn_size[]" type="radio" value="appointpress_btn-large" <?php if($size == 'appointpress_btn-large') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-large" type="button">Size 1</button>&nbsp;&nbsp;
			
			<input name="booking_appointpress_btn_size[]" id="booking_appointpress_btn_size[]" type="radio" value="" <?php if($size == '') echo "checked='checked'"; ?> />
			<button class="appointpress_btn" type="button">Size 2</button>&nbsp;&nbsp;
			
			<input name="booking_appointpress_btn_size[]" id="booking_appointpress_btn_size[]" type="radio" value="appointpress_btn-small" <?php if($size == 'appointpress_btn-small') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-small" type="button">Size 3</button>&nbsp;&nbsp;
			
			<input name="booking_appointpress_btn_size[]" id="booking_appointpress_btn_size[]" type="radio" value="appointpress_btn-mini" <?php if($size == 'appointpress_btn-mini') echo "checked='checked'"; ?> />
			<button class="appointpress_btn appointpress_btn-mini" type="button">Size 4</button>&nbsp;&nbsp;<a href="#" rel="tooltip" title="<?php _e('Booking Button Size','appointpress'); ?>"><i class="icon-question-sign"></i></a><br><br>
		</td>
	    <td>&nbsp;</td>
      </tr>
	  <?php }?>
      <tr>
	    <th scope="row">&nbsp;</th>
	    <th scope="row">&nbsp;</th>
	    <td>&nbsp;</td>
	    <td>
		<?php if($ApAccDetails['appointpress_status'] == 'invalid' || $ApAccDetails['appointpress_status'] == '') {?>
			<button id="savedetails" name="savedetails" type="submit" class="appointpress_btn appointpress_btn-primary"  ><?php _e('Save','appointpress'); ?></button>
		<?php } if($ApAccDetails['appointpress_status'] == 'valid') {?>
			<button id="savedetails" name="savedetails" type="submit" class="appointpress_btn appointpress_btn-primary"  ><?php _e('Update','appointpress'); ?></button>
			<button id="cleardetails" name="cleardetails" type="submit" class="appointpress_btn appointpress_btn-primary"  ><?php _e('Remove','appointpress'); ?></button>
		<?php } ?>		</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
        <th colspan="5" align="left" scope="row">
		<?php
		if(isset($_POST['savedetails']))
		{
			//print_r($_POST);
			$email = $_POST['email'];
			$Status = '';
			$booking_button_text = $_POST['booking_button_text'];
			$booking_button_color = $_POST['booking_appointpress_btn_color'][0];
			$booking_appointpress_btn_size = $_POST['booking_appointpress_btn_size'][0];
			//die;
			$Url = "http://appointpress.com/customers/index.php/acappointments/validate/email/$email";
			//ping & validate appointpress id & email
			$curl = curl_init($Url);
			curl_setopt($curl, CURLOPT_FAILONERROR, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
			$result = curl_exec($curl);
			$result = json_decode($result);
			
			$Status = $result->status;
			$BURL = $result->burl ;
			$AppAccDetails = array(
						'appointpress_email' => $email,
						'appointpress_status' => $Status,
						'appointpress_business_url' => $BURL,
						'appointpress_booking_button_text' => $booking_button_text,
						'appointpress_booking_button_color' => $booking_button_color,
						'appointpress_booking_button_size' => $booking_appointpress_btn_size
					);
			if($Status == 'valid')
			{
				// update appointpress account details
				if(update_option('appointpress_account_details', serialize($AppAccDetails)))
				{
					echo "<script>location.href='?page=appointpress';</script>";
				}
			}
			else
			{
				delete_option('appointpress_account_details');
				?>
				<div class="alert alert-error">
				<?php _e('Error! Invalid AppointPress Account Details.','appointpress'); ?> <?php _e('SignUp For New Appointpress Account','appointpress'); ?>
				<a href="http://appointpress.com/pricing/" title="<?php _e('SignUp For Free AppointPress Account','appointpress'); ?>" target="_blank"><?php _e('HERE','appointpress'); ?></a></div>
				<?php
			}
		}
		
		?>
		</th>
      </tr>
	  <th colspan="5" align="left" style="background:#C3D9FF; padding-left:10px;" scope="row">&nbsp;</th>
	</table>
	</form>
<?php
//delete account details
if(isset($_POST['cleardetails']))
{
	delete_option('appointpress_account_details');
	echo "<script>location.href='?page=appointpress';</script>";
}
?>
</div>
</script>
<style type="text/css">
.error{  color:#FF0000; }
</style>