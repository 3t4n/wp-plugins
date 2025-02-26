<div class="wrap">
	<p>
		<label for="<?php ?>"><?php _e('Title:'); ?>
			<input class="widefat" id="<?php ?>" name="<?php echo $widget->get_field_name('title')?>" type="text" value="<?php echo $options['title']; ?>" />
		</label>
	</p>

	<p>
		<?php _e("Gallery: " ); ?>
		<select size="1" name="<?php echo $widget->get_field_name('galleryFile')?>">
		<?php foreach ($this->_galleries as $item):?>
			<option <?php ($options['galleryFile']==$item) && print('selected="selected"');?>  value="<?php echo $item?>"> <?php echo $item?> </option>
		<?php endforeach?>
		</select>
	</p>

<!--    
	<p>
		<?php _e("Banner width: " ); ?>
		<input type="text" name="bannerWidth" value="<?php echo $options['bannerWidth']; ?>" size="20" />
		<?php _e("Banner height: " ); ?>
		<input type="text" name="bannerHeight" value="<?php echo $options['bannerHeight']; ?>" size="20" />
	</p>
	
	<p>
		<?php _e("Text Size: " ); ?>
		<input type="text" name="textSize" value="<?php echo $options['textSize']; ?>" size="20" />
		<?php _e("Text Color: " ); ?>
		<input type="text" name="textColor" value="<?php echo $options['textColor']; ?>" size="20" />
	</p>
	
	<p>
		<?php _e("Text Area Width: " ); ?>
		<input type="text" name="textAreaWidth" value="<?php echo $options['textAreaWidth']; ?>" size="20" />
		<?php _e("Text Line Spacing: " ); ?>
		<input type="text" name="textLineSpacing" value="<?php echo $options['textLineSpacing']; ?>" size="20" />
		
		<?php _e("Text Letter Spacing: " ); ?>
		<input type="text" name="textLetterSpacing" value="<?php echo $options['textLetterSpacing']; ?>" size="20" />

		<?php _e("Text Margin Left: " ); ?>
		<input type="text" name="textMarginLeft" value="<?php echo $options['textMarginLeft']; ?>" size="20" />
		
		<?php _e("Text Margin Bottom: " ); ?>
		<input type="text" name="textMarginBottom" value="<?php echo $options['textMarginBottom']; ?>" size="20" />
				
	</p>

	<p>
		<?php _e("Transition Type: " ); ?>
		<input type="text" name="transitionType" value="<?php echo $options['transitionType']; ?>" size="20" />		
		<br />
		
		<?php _e("Transition Delay Time Fixed: " ); ?>
		<input type="text" name="transitionDelayTimeFixed" value="<?php echo $options['transitionDelayTimeFixed']; ?>" size="20" />		
		<br />		
		
		<?php _e("transition Delay Time Per Word: " ); ?>
		<input type="text" name="transitionDelayTimePerWord" value="<?php echo $options['transitionDelayTimePerWord']; ?>" size="20" />		
		<br />
			
		<?php _e("Transition Speed: " ); ?>
		<input type="text" name="transitionSpeed" value="<?php echo $options['transitionSpeed']; ?>" size="20" />		
		<br />
	
		<?php _e("Transition Blur: " ); ?>
		<select name="transitionBlur']?>" size="1">
			<option <?php $options['transitionBlur']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['transitionBlur']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />


		<?php _e("Transition Randomize Order: " ); ?>
		<select name="transitionRandomizeOrder']?>" size="1">
			<option <?php $options['transitionRandomizeOrder']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['transitionRandomizeOrder']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />
		
		<?php _e("show Timer Clock: " ); ?>
		<select name="showTimerClock']?>" size="1">
			<option <?php $options['showTimerClock']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showTimerClock']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />		

		<?php _e("Show Back Button: " ); ?>
		<select name="showBackButton']?>" size="1">
			<option <?php $options['showBackButton']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showBackButton']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />
				
		<?php _e("Show Number Button: " ); ?>
		<select name="showNumberButtons']?>" size="1">
			<option <?php $options['showNumberButtons']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showNumberButtons']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />


		<?php _e("Show Number Buttons Always: " ); ?>
		<select name="showNumberButtonsAlways']?>" size="1">
			<option <?php $options['showNumberButtonsAlways']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showNumberButtonsAlways']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />
		
		<?php _e("Show Number Button Horizontal: " ); ?>
		<select name="showNumberButtonsHorizontal']?>"  size="1">
			<option <?php $options['showNumberButtonsHorizontal']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showNumberButtonsHorizontal']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />		
		
		<?php _e("Show Number Button Ascending: " ); ?>
		<select name="showNumberButtonsAscending']?>"  size="1">
			<option <?php $options['showNumberButtonsAscendingl']=="yes" && print('selected="selected"  ');?> value="yes">Yes</option>
			<option <?php $options['showNumberButtonsAscending']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />		
	
		<?php _e("Auto Play: " ); ?>
		<select name="autoPlay']?>" size="1">
			<option <?php $options['autoPlay']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['autoPlay']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		
	
	</p>
 -->		
    <p class="submit">               
		<input type="hidden" name="submit" value="Submit" />  
    </p>
</div>
