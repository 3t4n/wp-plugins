<div class="wrap">
	<h2><?php echo $data['title'] ?></h2>
	<div style="width:60%; display:inline-block;">
		<table class="form-table">
			<tbody>
				<tr>
					<td valign="top">
						<label for="tags">Tags</label>
						<textarea name="tags" id="tags" rows="8"></textarea>
					</td>
				</tr>	
				<tr>
					<td valign="top">
						<label>PHP Callback (Optional)</label>
						<p style="margin-bottom:5px">If you want to have a filter function to modify your tags before they are inserted into the database then go to this Plugin Installation directory => admin => filter-tags.php and edit that file.</p>
						<p style="margin-bottom:5px; color:#3300ff;">This is a read-only version of that file</p>

						<!-- We had to have visible error since we may have errors in the following JS snippet, if everything goes fine we hide this error-->
						<div id="file-read-error">
							<p>Unfortunately there was an error when reading the filter-tags.php file, however this does not affect you at all, this was just a read only view of that file</p>
							<p>If you have previously had a filter function then check that file to make sure it will modify the tags according to what you expect</p>
						</div>
						<p class="attention">This is a read-only version of the function, if you want to edit the function go to this Plugin Installation directory => admin => filter-tags.php</p>
						<div id="editor"></div>
					</td>
				</tr>
				<tr>
					<td valign="top">
						<button id="submit">Submit</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div style="width:40%; float:right;" id="results-wrapper">
		<table class="form-table">
			<tbody>
				<tr>
					<td valign="top">
						<label>Results</label>
						<p id="tags-inserted"></p>
						<p id="tags-not-inserted"></p>
						<div id="results"></div>
					</td>
				</tr>				
			</tbody>
		</table>
	</div>
</div>
<script>
	jQuery( document ).ready( function () {
		var editor = ace.edit("editor");
		editor.setTheme("ace/theme/iplastic");
		editor.session.setMode("ace/mode/php")
		editor.setOptions({
			readOnly: true,
			highlightActiveLine: true,
			highlightGutterLine: true
		})
		// we will assume at this point that there is an error if everything goes fine we hide the error
		var fileContent = `<?php echo $data['filterTagsFile'] ?>`;
		jQuery('#file-read-error').hide();
		jQuery('#editor').css('height', '150px');
		editor.setValue(fileContent);
	});
</script>