<?php
global $userData;

$user_roles = maybe_unserialize( $this->get_option( 'user_roles' ) );

if( !$user_roles )
	$user_roles = array();
?>

<p>Select the user roles you'd like to capture emails from. If you're not interested in a particular 
group - or most of the time, Administrators - simply leave them unselected.</p>

<?php $nextItem = 'user_roles'; ?>
				
<div id="<?php echo $nextItem; ?>" class="fancy_checkboxes">
	
<?php

// Fetch user roles
$fields = get_editable_roles();

if( $fields )
{
	foreach( $fields as $key => $value )
	{
		if( in_array( $key, $user_roles ) )
			$checked = 'checked="checked"';
		else
			$checked = '';
		
		$user_count = count( $this->GetUsersByRoles( $key ) );
		?>
<input <?php echo $checked; ?> type="checkbox" name="<?php echo $nextItem; ?>[]" value="<?php echo $key; ?>" id="<?php echo $nextItem; ?><?php echo $key; ?>" />
<label class="green" for="<?php echo $nextItem; ?><?php echo $key; ?>"><?php echo $value['name']; ?> (<?php echo $user_count; ?>) <span class="chosen"> - selected!</span></label><br />
	<?php
	}
} ?>
</div>
		
<script>
jQuery(document).ready( function() {
	
	//var the_tabs = jQuery( "#<?php echo $this->m_type_slug; ?>_tabs" ).tabs();
	
	jQuery( ".fancy_radio_buttons" ).buttonset();
	jQuery( ".fancy_checkboxes" ).buttonset();
} );
</script>