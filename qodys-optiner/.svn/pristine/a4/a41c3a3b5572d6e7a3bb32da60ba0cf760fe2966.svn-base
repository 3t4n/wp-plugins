<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->get_post_custom( $post->ID );

$inputs = maybe_unserialize( $custom['inputs'] );
?>

<script type="text/javascript">

var iter = 0;
var list_title = '';
var the_html = '';

function DetectAndCreateListSelects( selected_values, iter )
{
	var list_select = jQuery( "#<?php echo $this->GetPre(); ?>-form-field-" + iter );
	var new_thing = null;
	var new_group = null;
	
	selected_values = jQuery.parseJSON( selected_values );
	//selected_values = selected_values.split(',');
	
	//new_thing = jQuery('<option></option>').val( '-1' ).html( '-- select form field --' );
	list_select.append( new_thing );
	
	<?php
	$form_fields = $this->Owner()->GetAllFormFields();
	
	if( $form_fields )
	{
		foreach( $form_fields as $key => $value )
		{ ?>
	new_thing = jQuery('<option></option>').val( '<?php echo $key; ?>' ).html( '<?php echo $key; ?> (<?php echo $value; ?> lists)' );
	
	if( IsThisThingInThisArray( '<?php echo $key; ?>', selected_values ) )
		new_thing.attr( 'selected', true );
	
	list_select.append( new_thing );
		<?php
		}
	} ?>
	
}

function lists_add( selected_values, label_text )
{
	if( label_text == '' )
		label_text = 'Label text';
		
	the_html = '';
	the_html += '<tr id="<?php echo $this->GetPre(); ?>content' + iter + '">';
	the_html += '<td><select data-placeholder="Select Field Association(s)" class="chzn-select" multiple id="<?php echo $this->GetPre(); ?>-form-field-' + iter + '" name="field_inputs[' + iter + '][fields][]"></select></td>';
	the_html += '<td><input id="<?php echo $this->GetPre(); ?>-text-input-' + iter + '" type="text" name="field_inputs[' + iter + '][label]" value="' + label_text + '"></td>';	
	the_html += '<td><a href="#void" onclick="lists_remove(\'' + iter + '\');" title="">remove</a></td>';
	the_html += '</tr>';
	
	jQuery("#<?php echo $this->GetPre(); ?>-fields").append(the_html);
	
	DetectAndCreateListSelects( selected_values, iter );
	
	InsertInputToForm( '', 'input-' + iter, '' );
	
	AttachLabelEvents( '<?php echo $this->GetPre(); ?>-text-input-' + iter, 'input-' + iter );
	
	jQuery('#<?php echo $this->GetPre(); ?>-form-field-' + iter ).chosen();
	
	iter++;
}

function lists_remove(contentid)
{
	if( confirm("Are you sure you wish to remove this field?") )
	{
		jQuery("#<?php echo $this->GetPre(); ?>content" + contentid).remove();
		RemoveInputFromForm( 'input-' + contentid );
	}

	return false;
}

jQuery(document).ready(function()
{
	<?php 
	if( $inputs )
	{
		foreach( $inputs as $key => $value )
		{ ?>
	lists_add( '<?php echo json_encode($value['fields']); ?>', '<?php echo $value['label']; ?>' );				
		<?php
		}
	}
	else
	{ ?>
	//lists_add( '', 'Name:' );
	//lists_add( '', 'Email:' );
	<?php
	}?>
});
</script>
<?php
//$this->ItemDebug( $inputs );
?>
<table class="widefat" style="table-layout:auto;">
	<thead>
		<tr>
			<th style="text-align:left;">Fields from Email Lists To Integrate With</th>
			<th style="text-align:left;">Help Text / Label</th>
			<th style="text-align:left;"></th>
		</tr>
	</thead>
	<tbody id="<?php echo $this->GetPre(); ?>-fields">
	
	</tbody>
</table>

	
<p style="text-align:center;">
	<input onclick="lists_add( '', '' );" type="button" name="addcontent" id="<?php echo $this->GetPre(); ?>addcontent" value="Add Another Field" class="button-secondary" />
</p>
			
			