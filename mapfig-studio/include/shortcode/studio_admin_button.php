<?php
	$db = new studioDatabase();
	$maps = $db->select();
?> 
	
	<div id="studio-admin-input" style="display:none;">
		<div id="studio-admin-input-container"> 
			<span id="studio-error" style="color:red;"></span>
			<p class="form-group" >
				<label>Select Map</label>
				<br>
				<span class="studio-data">
					<select name="studio_mapid" style="width:230px;" class="studio_border_radis rs_form_w">
						<option value=""> [Select Map] </option>
					<?php foreach($maps as $map){?>
						<option value="<?php echo $map->id;?>" ><?=($map->title == "") ? "No Name/Title" : $map->title?></option>
					<?php } ?>
					</select>
				</span>
			</p>
			<p class="form-group">
				<label>Map Height</label>
				<br>
				<span class="studio-data">
					<input type="number" class="studio_border_radis rs_form_w" name="studio_height" value="500" placeholder="Height in px" />
				</span>
			</p>
			<p class="form-group">
				<label>Map Width</label>
				<br>
				<span class="studio-data">
					<input type="number" class="studio_border_radis rs_form_w" name="studio_width" value="500" placeholder="Width in px" />
				</span>
			</p>
			<button type="button" id="studio-admin-btn" class="button button-primary button-large">Add Map</button></td>
		</div>
	</div>