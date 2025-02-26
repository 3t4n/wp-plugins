<script language="javascript" type="text/javascript">    
    jQuery(document).ready(function($) {
	    $("#AddingForm").validate({rules: {
                image: "required",
                link: {
            		url: true
	    		}
                                
            },

            messages: {
            	image: "Please select an image on local computer",
                link: "Please enter valid url"  
            }

        });

	    $('#buttonToggleForm').click(function () {
	        if ($(this).html()=='Open Setting Form') {
				$('#SettingForm').fadeIn('slow').show('slow');		        
	        	$(this).html('Hide Setting Form');
	        } else {
	        	$('#SettingForm').fadeOut('slow');
		        $(this).html('Open Setting Form');
	        }    
	    })
    })
</script>

<a href="<?php echo $this->_renderUrl('frontpage');?>">List galleries</a> &nbsp;
<a id="buttonToggleForm" href="#">Open Setting Form</a>
<div id="SettingForm">
<form name="GallerySetting" action="<?php echo $this->_renderUrl('saveGallerySetting', array('file' => $galleryFile));?>" method="post" >
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
		<select name="transitionBlur" size="1">
			<option <?php $options['transitionBlur']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['transitionBlur']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />


		<?php _e("Transition Randomize Order: " ); ?>
		<select name="transitionRandomizeOrder" size="1">
			<option <?php $options['transitionRandomizeOrder']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['transitionRandomizeOrder']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />
		
		<?php _e("show Timer Clock: " ); ?>
		<select name="showTimerClock" size="1">
			<option <?php $options['showTimerClock']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showTimerClock']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />		

		<?php _e("Show Back Button: " ); ?>
		<select name="showBackButton" size="1">
			<option <?php $options['showBackButton']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showBackButton']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />
				
		<?php _e("Show Number Button: " ); ?>
		<select name="showNumberButtons" size="1">
			<option <?php $options['showNumberButtons']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showNumberButtons']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />


		<?php _e("Show Number Buttons Always: " ); ?>
		<select name="showNumberButtonsAlways" size="1">
			<option <?php $options['showNumberButtonsAlways']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showNumberButtonsAlways']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />
		
		<?php _e("Show Number Button Horizontal: " ); ?>
		<select name="showNumberButtonsHorizontal"  size="1">
			<option <?php $options['showNumberButtonsHorizontal']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['showNumberButtonsHorizontal']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />		
		
		<?php _e("Show Number Button Ascending: " ); ?>
		<select name="showNumberButtonsAscending"  size="1">
			<option <?php $options['showNumberButtonsAscendingl']=="yes" && print('selected="selected"  ');?> value="yes">Yes</option>
			<option <?php $options['showNumberButtonsAscending']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		<br />		
	
		<?php _e("Auto Play: " ); ?>
		<select name="autoPlay" size="1">
			<option <?php $options['autoPlay']=="yes" && print('selected="selected" ');?> value="yes">Yes</option>
			<option <?php $options['autoPlay']=="no" && print('selected="selected" ');?> value="no">No</option>		
		</select>
		
		<br />
		<input type="submit" name="save" value="Save" />
</form>
</div>

<div id="slideshow-container" >
	<form method="post" enctype="multipart/form-data" name="Upload" action="<?php echo $this->_renderUrl('add', array('file' => $galleryFile));?>" id="AddingForm">
				<table>
					<tr valign="top">
						<td>Image</td>
						<td><input size="63" type="file" id="image" name="image" style="width: 500px" value="" /></td>
					</tr>
					<tr valign="top">
						<td>Link</td>
						<td><input type="text" name="link" id="link" value="<?php echo $item['link'];?>" style="width: 600px" /><br /></td>
					</tr>
					<tr valign="top">
						<td>Text Data</td>
						<td>
							<textarea name="data" cols=70 rows=5></textarea>
						</td>
					</tr>
					<tr>
						<td><label>Target</label></td>
						<td>							
							<select size="1" name="target">
					    		<option value="_self">Self</option>
					    		<option value="_blank">Blank</option>
							</select>
						
							<label>Text Blend</label>
												
					    	<select size="1" name="textBlend">
					    		<option value="yes">Yes</option>
					    		<option value="no">No</option>
					    	</select>
					    	<input type="submit" name="action" value="Add" />
						</td>
					</tr>
					
					
				</table>
	</form>
</div>

	
	<ul class="ax-container">
	<?php foreach ($this->_slideshows['item'] as $index=>$item):?>
		<li>
	    	<?php if ( strpos($item['image'], '.swf') === FALSE ):?>
	    	<img src="<?php echo $item['image']?>" onload="resize(this)" />
	    	<?php else :?>
	    	<div id="mymovie_<?php echo $index?>">
		    	<script type="text/javascript">
					var so = new SWFObject("<?php echo $item['image']?>", "mymovie_<?php echo $index?>", "300", "300", "8");
					so.write("mymovie_<?php echo $index?>");
				</script>
			</div>
	    	<?php endif ?>
	    	<form method="post" action="<?php echo $this->_renderUrl('add', array('act' => 'save', 'file' => $galleryFile, 'item_id' => $index));?>" name="EditForm">
	    	<p>
		    	<input class="fields" type="text" name="link" value="<?php echo $item['link'];?>" size="33" /><br />
		    	<textarea class="fields" name="data" cols=31 rows=5><?php echo $item['data']?></textarea>
		    	<br />
		    	<select size="1" name="target">
		    		<option <?php $item['target']=='_self' && print('selected="selected"')?> value="_self">Self</option>
		    		<option <?php $item['target']=='_blank' && print('selected="selected"')?> value="_blank">Blank</option>
		    	</select>
		    	<select size="1" name="textBlend">
		    		<option value="yes" <?php $item['textBlend']=='yes' && print('selected="selected"')?> >Yes</option>
		    		<option value="no"  <?php $item['textBlend']=='no' && print('selected="selected"')?> >No</option>
		    	</select>
						    	
		    	<input type="submit" name="submit" value="Save" />
		    	
		    	<a href="<?php echo $this->_renderUrl('add', array('act' => 'delete', 'file' => $galleryFile, 'item_id' => $index))?>">Remove</a>
	    	</p>
	    	</form>
	    </li>
	<?php endforeach?>
	</ul>	


