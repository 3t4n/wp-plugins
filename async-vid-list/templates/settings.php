<div class="wrap">
    <h2>WP Async Vid List</h2>
	<div>
	<p>Video embeds with an empty title will be deleted on the next update. </br>
	Set the ID of the list in the shortcode. </br>
	Example: [asyncVidList list_id=1] </br>
	</p>
	</div>
    <form method="post" action="options.php">
        <?php @settings_fields('WP_Async_Vid_List-group'); ?>
        <?php @do_settings_fields('WP_Async_Vid_List-group'); ?>
		<?php $options = get_option( 'async_vid_info' ); ?>
		
	<?php // start vid list item
	if (is_array($options)) {
		$key_list = array_keys($options);
		for ( $f=0, $f2=count($key_list); $f<$f2 ; $f++) 
		{
			$key = $key_list[$f];
			if ($options[$key] == 'on') 
			{
				unset($options[$key]);
				$options[$key] = array() ;
			}
		}
	}
	
	if (is_array($options)) {
		for ( $q=0, $listsize=count($key_list); $q<$listsize ; $q++ )
		{
			$key = $key_list[$q];
			for( $i=0, $size=count($options[$key]); $i<=$size ;$i++)
			{
				if( $options[$key][$i][delete] == 'on' )
				{
					unset($options[$key]);
					$update = 1 ;
				}
			}
		}
		if($update == 1)
		{
			update_option('async_vid_info', $options);
			$update = 0 ;
		}
	} 
	
if 	( !is_array($options) )
{
	$listsize = 0 ;
}
else 
{	
	$key_list = array_keys($options);
	echo '<div id="accordion">';
	echo '<h3>Embedded Video Lists</h3><div>Click on List to expand</div>';
	for ( $q=0, $listsize=count($key_list); $q<$listsize ; $q++ )
	{
		$key = $key_list[$q];
		echo '<h3 title="click to expand">' . 'List ID = ' . $key . '</h3>' ;
		echo '<div class="vid-list">';
		if ( is_array($options[$key]))
		{
			{
				ksort($options[$key]);
				for ( $j=0,$x=count($options[$key]); $j<$x ; $j++)
				{
					if ( $options[$key][$j][title] == '')
					{
						unset($options[$key][$j]);
					}
				}
				$new_array = array_values($options[$key]); 
				$options[$key] = $new_array;
				update_option('async_vid_info', $options);
			}
		} 
		
		if ( $options[$key][0][title] == '' && count($options[$key]) == 1 )
		{
			$size = 0;
		}
		else
		{
		?>
	
		<?php for( $i=0, $size=count($options[$key]) ; $i<=$size ;$i++) 
			{ 
				if( $options[$key][$i][title] != '' )
				{
			?>	
				<table class="form-table" id= "1" >  
					<tr valign="top">
						<th scope="row"><label for="title">Title</label></th>
						<td><?php echo "<input id='plugin_text_string' name='async_vid_info[$key][$i][title]' size='40' type='text' value='{$options[$key][$i]['title']}' title='videos with no title will be deleted on next update' />";?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="link">Embed Video</label></th>
						<td><?php echo "<input id='plugin_text_string' name='async_vid_info[$key][$i][link]' size='40' type='text' value='{$options[$key][$i]['link']}' title='paste the embed video code here' />";?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="description">Description</label></th>
						<td><?php echo "<textarea id='plugin_text_string' name='async_vid_info[$key][$i][desc]' rows='4' cols='37' title='optional description for video (please do not use any quotation marks)'>{$options[$key][$i]['desc']}</textarea>";?></td>
					</tr>
				</table>
				<hr noshade size=7>
				
			<?php }
			} 
		} ?>
		
		<?php $next = $size ; ?>
		<table class="form-table" id= "1" >Add New Video  
			<tr valign="top">
				<th scope="row"><label for="title">Title</label></th>
				<td><?php echo "<input id='plugin_text_string' name='async_vid_info[$key][$next][title]' size='40' type='text' value='{$options[$key][$next]['title']}' title='videos with no title will be deleted on next update' />";?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="link">Embed Video</label></th>
				<td><?php echo "<input id='plugin_text_string' name='async_vid_info[$key][$next][link]' size='40' type='text' value='{$options[$key][$next]['link']}' title='paste the embed video code here' />";?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="description">Description</label></th>
				<td><?php echo "<textarea id='plugin_text_string' name='async_vid_info[$key][$next][desc]' rows='4' cols='37' title='optional description for video'>{$options[$key][$next]['desc']}</textarea>";?></td>
			</tr>
		</table>
		<hr noshade size=7>
		
		</br>
		<table class="list-table">Delete List
			<tr valign="top" title='if checked, this entire list will be deleted on next update'>
				<th scope="row"><label for="title">Delete List?</label></th>
				<td><?php echo "<input id='plugin_text_string' name='async_vid_info[$key][$i][delete]' size='40' type='checkbox'/>";?></td>
			</tr>		
		</table>
		</br>
		
		</div> <!-- end vid-list -->
		
<?php 
	}
}
		echo "</div>"; //end accordion
?>	
		<?php $nextlist = $key + 1  ; ?>
		</br>
		<table class="list-table">Add New List
			<tr valign="top" title='if checked, this will add a new list on next update'>
				<th scope="row"><label for="title" style="font-weight:bold;font-size:15px;">New List?</label></th>
				<td><?php echo "<input id='plugin_text_string' name='async_vid_info[$nextlist]' size='40' type='checkbox' />";?></td>
			</tr>		
		</table>
		</br>
		
        <?php @submit_button('Update'); ?>
    </form> <?php // end vid list item ?>
	
</div>

