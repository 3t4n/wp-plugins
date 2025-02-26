<table width="100%" class="table table-hover">
  <tr>
	<th scope="col"><button type="submit" id="add-location" name="add-location" class="btn btn-primary"><?php _e('Add New Business Location' ,'SimpleBusinessHours'); ?></button></th>
	<th scope="col">&nbsp;</th>
	<th scope="col">&nbsp;</th>
	<th scope="col">&nbsp;</th>
  </tr>
  <tr>
	<th scope="col"><?php _e('Location' ,'SimpleBusinessHours'); ?></th>
	<th scope="col"><?php _e('Address' ,'SimpleBusinessHours'); ?></th>
	<th scope="col"><?php _e('Action' ,'SimpleBusinessHours'); ?></th>
	<th scope="col"><a href="#" rel="tooltip" title="<?php _e('Select All','SimpleBusinessHours'); ?>" >
<input type="checkbox" id="checkbox" name="checkbox[]" value="0" /></a></th>
  </tr>
  <tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
</table>
<div id="AddLocationModal" style="display:none;">
	<div class="modal" id="myModal">
		<form action="" method="post" name="AddLocationModal-From" id="AddLocationModal-From">
			<div class="modal-header">
				<button type="button" id="close-modal2" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<div><h4><?php _e('Add New Business Location','SimpleBusinessHours'); ?></h4></div>
			</div>
			
			<div class="modal-body">
				<table class="table" width="100%">
				  <tr>
					<th scope="row"><?php _e('Location Name','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="location_l" id="location_l" type="text" style="height:30px; width:270px;" /></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Address Line 1','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="address1_l" id="address1_l" type="text" style="height:30px; width:270px;" /></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Address Line 2','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="address2_l" id="address2_l" type="text" style="height:30px; width:270px;" /></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Address Line 3','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="address3_l" id="address3_l" type="text" style="height:30px; width:270px;" /></td>
				  </tr>
				  <tr>
					<th scope="row">&nbsp;</th>
					<td>&nbsp;</td>
					<td><button type="submit" id="add-new-location" name="add-new-location" class="btn btn-primary"><?php _e('Create' ,'SimpleBusinessHours'); ?></button></td>
				  </tr>
				</table>
			</div>
			
		</form>
	</div>
</div>
<?php //save holidays
if(isset($_POST['add-new-location']))
{
	$_SESSION['ActiveTab'] = "sbh-location";
}
?>