<?php
global $userData;
?>

<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'bulk_import'; ?>
			<th>
				<label for="<?php echo $nextItem; ?>">Add some emails</label>
			</th>
			<td>
				<textarea name="<?php echo $nextItem; ?>" class="widefat" style="height:150px;"></textarea>
				<span class="howto">Add as many emails as you want, separated by a comma or 1 per line</span>
			</td>
		</tr>
	</tbody>
</table>