<?php
global $records_by_day;

$fields = array();
$fields['post_type'] = $this->GetClass('posttype_form-preset')->m_type_slug;
$fields['numberposts'] = -1;

$presets = get_posts( $fields );

$enabled_count = 0;
$disabled_count = 0;

if( $presets )
{
	foreach( $presets as $key => $value )
	{
		$custom = $this->get_post_custom( $value->ID );
		
		if( $custom['status'] == '1' )
			$enabled_count++;
		else
			$disabled_count++;
	}
}

$records_by_day = array();

$fields = array();
$fields['post_type'] = $this->GetClass('posttype_optin-record')->m_type_slug;
$fields['numberposts'] = -1;
$fields['orderby'] = 'post_date';
$fields['order'] = 'DESC';

$all_records = get_posts( $fields );

if( $all_records )
{
	$last_record = $this->NumberTimeToStringTime( time() - strtotime($all_records[0]->post_date), 'strong', 2 ).' ago';
	
	foreach( $all_records as $key => $value )
	{
		$the_day = $this->CalculateDay( $value->post_date );
		
		$records_by_day[ $the_day ][] = $value;
	}
}
else
{
	$last_record = 'n/a';
}

$today = $this->GetToday();
$yesterday = $this->GetYesterday();

$fields = array();
$fields['Presets'] = '<a href="'.admin_url('edit.php?post_type='.$this->GetClass('posttype_form-preset')->m_type_slug ).'">'.count( $presets ).'</a>';
//$fields['Enabled Campaigns'] = $enabled_count;
//$fields['Disabled Campaigns'] = $disabled_count;
$fields['Optin Records'] = '<a href="'.admin_url('edit.php?post_type='.$this->GetClass('posttype_optin-record')->m_type_slug ).'">'.count( $all_records ).'</a>';
$fields['Last Optin'] = $last_record;
$fields['Optins Today'] = count( $records_by_day[ $today ] );
$fields['Optins Yesterday'] = count( $records_by_day[ $yesterday ] );
?>

<div style="margin-bottom:20px;">
	<table class="wp-list-table widefat fixed posts data_table" style="table-layout:auto;">
		<thead>
			<tr>
				<th style="width:75%; text-align:left;">Field</th>
				<th style="text-align:left;">Value</th>
			</tr>
		</thead>
		<tbody>
			
		<?php
		if( $fields )
		{
			$iter = 0;
			foreach( $fields as $key => $value )
			{
				$iter++;
				
				if( $iter % 2 == 0 )
					$row_class = 'alternate';
				else
					$row_class = ''; ?>
			<tr class="<?php echo $row_class; ?>">
				<th>
					<?php echo $key; ?>
				</th>
				<td>
					<?php echo $value; ?>
				</td>
			</tr>
			<?php
			}
		} ?>
			
		</tbody>
		<tfoot>
			<tr>
				<th style="width:50%; text-align:left;">Attribute</th>
				<th style="width:50%; text-align:left;">Value</th>
			</tr>
		</tfoot>
	</table>

</div>

<div style="clear:both;"></div>