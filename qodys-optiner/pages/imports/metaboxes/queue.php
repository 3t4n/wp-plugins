<?php
global $userData;

$imported_emails = maybe_unserialize( $this->get_option( 'imported_emails' ) );
?>

<p>Check the items you want to remove, or "click" the ones you want to toggle as completed / incomplete - just incase you ever wanted to.</p>

<?php $nextItem = 'imported_emails'; ?>
<?php
if( $imported_emails )
{
	$iter = 0;
	foreach( $imported_emails as $key => $value )
	{
		if( $value['status'] == 1 )
			$color = '#090';
		else
			$color = '#c00'; ?>
	<div style="width:275px; float:left;">
		<input type="checkbox" name="<?php echo $nextItem; ?>[<?php echo $iter; ?>][delete]" alt="remove" /> 
		<label style="color:<?php echo $color; ?>" onClick="ToggleImportCompleted(this);"><?php echo $value['email']; ?></label>
		
		<input type="hidden" name="<?php echo $nextItem; ?>[<?php echo $iter; ?>][email]" value="<?php echo $value['email']; ?>">
		<input type="hidden" name="<?php echo $nextItem; ?>[<?php echo $iter; ?>][status]" value="<?php echo $value['status']; ?>" class="status_toggle">
		<input type="hidden" name="<?php echo $nextItem; ?>[<?php echo $iter; ?>][date]" value="<?php echo $value['date']; ?>">
	</div>
		<?php
		$iter++;
	}
} ?>
	
<div style="clear:both;"></div>
