<script language="javascript" type="text/javascript">    
    jQuery(document).ready(function($) {
	    $("#AddingForm").validate({rules: {
                title: "required",                
            },

            messages: {
            	title: "Please enter a title for gallery"
            }

        });

    })

    
</script>

<div id="slideshow-container" >
	<form method="post" enctype="multipart/form-data" name="Upload" action="options-general.php?page=axcoto_slideshow&act=addGallery" id="AddingForm">
				<table>
					<tr valign="top">
						<td>Create New Slideshow</td>
						<td><input size="63" type="text" id="title" name="title" style="width: 500px" value="" /></td>
						<td>
							<input type="submit" name="action" value="Add" />
						</td>
					</tr>
					
				</table>
	</form>
</div>

	
	<ul class="">
	<?php foreach ($this->_galleries as $index=>$item):?>
		<li>
			<input name="cmd[]" value="[[<?php echo AXCOTO_HASHTAG?> name=&quot;<?php echo $item?>&quot;]]" size=40 />&nbsp;
	    	<a href="<?php echo $this->_renderUrl('deleteGallery', array('file' => $item));?>">Delete</a>&nbsp;	    	
	    	<a href="<?php echo $this->_renderUrl('viewGallery', array('file' => $item));?>">Open</a> &nbsp;	    	
	    	<a href="<?php echo $this->_renderUrl('viewGallery', array('file' => $item));?>"><?php echo $item?></a> &nbsp; 
	    	 
	    </li>
	<?php endforeach?>
	</ul>