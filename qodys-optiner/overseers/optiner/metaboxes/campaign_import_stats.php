<?php 
$campaign_id = $metabox['args']['campaign_id'];

$custom = get_post_custom( $campaign_id );
	
$imported_emails = maybe_unserialize( $custom['imported_emails'][0] );

if( $imported_emails )
	arsort( $imported_emails ); // order it latest first
?>

<table class="wp-list-table widefat fixed posts data_table" style="table-layout:auto;">
	<thead>
		<tr>
			<th style="width:50px; text-align:center;">#</th>			
			<th style="width:auto; text-align:center;">Name</th>
			<th style="width:auto; text-align:center;">Email</th>
			<th style="width:auto; text-align:center;">Processed Date</th>
		</tr>
	</thead>
	<tbody>
	
	<?php
	if( $imported_emails )
	{
		$iter = 0;
		
		foreach( $imported_emails as $key => $value )
		{
			$iter++;
			
			if( $value['status'] == -1 )
				$status = '<span style="color:#c00;">pending</span>';
			else
				$status = '<span style="color:#090;">processed</span>'; ?>
		<tr>
			<td>
				<?php echo $iter; ?>)
			</td>
			<td>
				<?php echo $value['email']; ?>
			</td>
			<td>
				<?php echo $status; ?>
			</td>
			<td style="text-align:center;">
				<?php
				if( $value['date'] )
					echo $this->NumberTimeToStringTime( time() - $value['date'] ).' ago';
				?>
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
			<th style="text-align:center;">Processed Date</th>
		</tr>
	</tfoot>
</table>

<div style="clear:both;"></div>

