<?php
global $userData;

$comment_types = maybe_unserialize( $this->get_option( 'comment_types' ) );

if( !$comment_types )
	$comment_types = array();
?>

<h4>Which kind?</h4>

<p>Perhaps you only want "approved" comment users in your lists - which makes 
perfect sense as they're your most responsive and relevant audience.  However, sometimes you might 
find a use for all those spam commenters; to each is own. We're not in the business of creating 
limitations : )</p>

<?php $nextItem = 'comment_types'; ?>

<div id="<?php echo $nextItem; ?>" class="fancy_checkboxes">
	
<?php
$fields = array();
$fields['1'] = 'Approved comments';
$fields['-1'] = 'Unapproved comments';
$fields['spam'] = 'Spam comments';
$fields['trash'] = 'Trash comments';

foreach( $fields as $key => $value )
{
	if( in_array( $key, $comment_types ) )
		$checked = 'checked="checked"';
	else
		$checked = '';
	
	$comment_count = count( $this->GetCommentsByType( $key ) );
	?>
<input <?php echo $checked; ?> type="checkbox" name="<?php echo $nextItem; ?>[]" value="<?php echo $key; ?>" id="<?php echo $nextItem; ?><?php echo $key; ?>" />
<label class="green" for="<?php echo $nextItem; ?><?php echo $key; ?>"><?php echo $value; ?> (<?php echo $comment_count; ?>) <span class="chosen"> - selected!</span></label><br />
<?php
} ?>
</div>
		
<script>
jQuery(document).ready( function() {
	
	//var the_tabs = jQuery( "#<?php echo $this->m_type_slug; ?>_tabs" ).tabs();
	
	jQuery( ".fancy_radio_buttons" ).buttonset();
	jQuery( ".fancy_checkboxes" ).buttonset();
} );
</script>