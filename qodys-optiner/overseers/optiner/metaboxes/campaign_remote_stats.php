<?php
$campaign_id = $metabox['args']['campaign_id'];

$custom = get_post_custom( $campaign_id );
	
$completed_submissions = maybe_unserialize( $custom['completed_submissions'][0] );

if( $completed_submissions )
	arsort( $completed_submissions ); // order it latest first
?>

<table class="wp-list-table widefat fixed posts data_table" style="table-layout:auto;">
	<thead>
		<tr>
			<th style="width:50px; text-align:center;">#</th>			
			<th style="width:auto; text-align:center;">Name</th>
			<th style="width:auto; text-align:center;">Email</th>
			<th style="width:auto; text-align:center;">Date</th>
		</tr>
	</thead>
	<tbody>
	
	<?php
	if( $completed_submissions )
	{
		$iter = 0;
		
		foreach( $completed_submissions as $key => $value )
		{
			$iter++; ?>
		<tr>
			<td style="text-align:center;">
				<?php echo $iter; ?>
			</td>
			<td style="text-align:center;">
				<?php echo $value['name']; ?>
			</td>
			<td style="text-align:center;">
				<?php echo $value['email']; ?>
			</td>
			<td style="text-align:center;">
				<?php echo $this->NumberTimeToStringTime( time() - $value['date'] ); ?> ago
			</td>
		</tr>
		<?php
		}
	} ?>
	
	</tbody>
	<tfoot>
		<tr>
			<th style="text-align:center;">#</th>			
			<th style="text-align:center;">Name</th>
			<th style="text-align:center;">Email</th>
			<th style="text-align:center;">Date</th>
		</tr>
	</tfoot>
</table>

<div style="clear:both;"></div>

