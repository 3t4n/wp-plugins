<?php
ob_start();
function add_cyber_slider_menu_page(){
	add_menu_page('Cyber Slider','Cyber Slider','manage_options','cyber-slider','cyber_slider_menu_page_cb',CS_ROOT_URL.'/images/menu_icon.png',80);
	add_submenu_page( 'cyber-slider', 'Global Settings', 'Global Settings','manage_options', 'cyber-slider-global','cyberslider_global_settings');
}
add_action('admin_menu','add_cyber_slider_menu_page');

function cyber_slider_menu_page_cb(){
	$action = $_GET['action'];
	 if(!$action){
		global $wpdb;

		$sql_query = "SELECT id,name,author,settings,date_created FROM {$wpdb->prefix}cyberslider";
		$sliders = $wpdb->get_results( $sql_query );

		if( isset( $_POST['delete_slider'] ) ){
		 }
		 ?>
		<div id="dialog" class="div-dialog" title="Confirmation Required">
			<?php _e('Are you sure to delete this slider ?', CS_TEXTDOMAIN) ?>
		</div>
<div class="wrap">
	<h2 style = "margin-bottom : 0.5em;"><?php _e('Cyber Sliders',CS_TEXTDOMAIN);?> <a href = "<?php echo admin_url().'admin.php?page=cyber-slider&action=new-slider'; ?>" class = "page-title-action"><?php _e('Add New Slider',CS_TEXTDOMAIN); ?></a></h2>
		<?php if ( $_GET['status'] == 'success') { ?>
	<div id="deleteMessage" class="alert alert-success">
	  	<?php _e('Successfully Deleted', CS_TEXTDOMAIN); ?>
	  	<a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a>
	</div>
		<?php } ?>

	<table class="widefat cyberSlider-list">
		<thead>
			<tr>
		    <th><?php esc_attr_e( 'ID', CS_TEXTDOMAIN ); ?></th>
		    <th><?php esc_attr_e( 'Name', CS_TEXTDOMAIN ); ?></th>
		    <th><?php esc_attr_e( 'Shortcode', CS_TEXTDOMAIN ); ?></th>
		    <th><?php esc_attr_e( 'No Of Slide(s)', CS_TEXTDOMAIN ); ?></th>
		    <th><?php esc_attr_e( 'Created', CS_TEXTDOMAIN ); ?></th>
		    <th></th>
		    <th></th>
		    <th></th>
		    <th></th>
		   </tr>
		</thead>
		<?php foreach( $sliders as $slider ): ?>
			<tr>
		    <th><?php echo $slider->id; ?></th>
		    <th><?php echo $slider->name; ?></th>
		    <th>
		    	<input onclick='this.focus();this.select()' type = "text" value = ' <?php echo '[cyberslider id="'.$slider->id.'"]'; ?> ' readonly /></th>
		    <th>
		    <?php 
		    	//count slides
		 		$slides_count = $wpdb->get_var( 'SELECT COUNT(*) FROM '.$wpdb->prefix.'cyberslider_slides Where slider_id ='.$slider->id);
		 		echo $slides_count;
		    ?>
		    </th>
		    <th><?php echo date("d-m-Y", strtotime($slider->date_created)); ?></th>
		    <th>
		    	<button class="btn btn-danger delete-slider" slider-id="<?php echo $slider->id; ?>" redirect-url="<?php echo admin_url().'admin.php?page=cyber-slider'; ?>"><?php _e('Delete',CS_TEXTDOMAIN); ?> </button>
		    </th>
		    <th>
		    	<a href = "<?php echo admin_url().'admin.php?page=cyber-slider&action=slider-settings&id='.$slider->id;?>"  class = "btn btn-primary"><?php _e('Settings',CS_TEXTDOMAIN ); ?></a>
		    </th>
		    <th>
		    	<a href = "<?php echo admin_url().'admin.php?page=cyber-slider&action=view-slides&id='.$slider->id;?>"  class = "btn btn-primary"><?php _e('Edit',CS_TEXTDOMAIN ); ?></a>
		    </th>
		   	<th>
		   		<a href = "#"  class = "btn btn-primary preview" data-toggle="modal" data-target="#mypreviewModal-<?php echo $slider->id; ?>"><?php _e('Preview',CS_TEXTDOMAIN ); ?></a>
		   	</th>
			<!-- Cyber Slider Model -->
				<div class="modal fade" id="mypreviewModal-<?php echo $slider->id; ?>" role="dialog">
				    <div class="modal-dialog">
				      <!-- Modal slider content -->
				    	<div class="modal-content">
				       		<div class="modal-header">
				         		<button type="button" class="close" data-dismiss="modal">&times;</button>
				            		<h4 class="modal-title"><?php echo _e($slider->name, CS_TEXTDOMAIN) ?></h4>
				       		</div>
				       		<div class="modal-body">
				           		<?php echo do_shortcode("[cyberslider id='$slider->id']"); ?>
				       		</div>
				       		<div class="modal-footer">
				       			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				       		</div>
				      	</div>
				    </div>
				</div> <!-- End of model slider -->
		   </tr>
		  <?php endforeach; ?>
	</table>
</div>
	<?php
	}else if($action == 'save-slider'){
		save_slider();

	}else if($action == 'new-slider'){

		add_new_slider();

	}else if($action == 'slider-settings'){

		single_cyber_slider_settings();

	}else if($action == 'view-slides'){

		edit_cyber_slider();

	}else if($action == 'new' && $_GET['view'] == 'slide'){

		add_new_slide();

	}else if($action == 'edit' && $_GET['view'] == 'slide'){

		add_new_slide();

	}
}
/**
*
* Function display global settings options
*
**/

function cyberslider_global_settings(){
?>
	<h1><?php _e('Global Settings', CS_TEXTDOMAIN); ?> </h1>
	<?php
	$global_options = get_option('cs_global_settings',true);
	$global_options = unserialize($global_options);

	?>
	<div style="display:none" id="successMessage" class="alert alert-success">
	  	<strong><?php _e('Success!', CS_TEXTDOMAIN); ?></strong> <?php _e('Settings Updated.', CS_TEXTDOMAIN); ?>
	  	<a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a>
	</div>
<form action="" method="POST" id="global-settings-form">
	<table class="widefat">
		<thead>
			<tr>
				<th colspan=3 style="text-align:center"> 
					<?php _e('Global Settings for Slider', CS_TEXTDOMAIN); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php _e('Use Google CDN version of jQuery', CS_TEXTDOMAIN); ?></td>
				<td>        
					<div class="onoffswitch">
						<input type="checkbox" name="use_cdn" class="onoffswitch-checkbox" id="use_cdn" <?php if($global_options['use_cdn']=='on') echo "checked";?>>
							<label class="onoffswitch-label" for="use_cdn">
							    <span class="onoffswitch-inner"></span>
							    <span class="onoffswitch-switch"></span>
							</label>
					</div>
				</td>
				<td class="desc"><?php _e('This option will likely solve "Old jQuery" issues.', CS_TEXTDOMAIN); ?></td>
			</tr>
			<tr>
				<td><?php _e('Include scripts in the footer', CS_TEXTDOMAIN); ?></td>
				<td>
					<div class="onoffswitch">
						<input type="checkbox" name="include_at_footer" class="onoffswitch-checkbox" id="include_at_footer" <?php if($global_options['include_at_footer']=='on') echo "checked"; ?>>
						<label class="onoffswitch-label" for="include_at_footer">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</td>
				<td class="desc"><?php _e('Including resources in the footer could decrease load times, and solve other type of issues, but your theme might not support this method.', CS_TEXTDOMAIN); ?>
				</td>
			</tr>
			<tr>
				<td><?php _e('Permission Admin only ?', CS_TEXTDOMAIN); ?></td>
				<td>
					<div class="onoffswitch">
						<input type="checkbox" name="permission_admin" class="onoffswitch-checkbox" id="permission_admin" <?php if($global_options['permission_admin']=='on') echo "checked";?>>
						<label class="onoffswitch-label" for="permission_admin">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</td>
				<td class="desc"><?php _e('The role of user that can view and edit the plugin. Default is Admin', CS_TEXTDOMAIN); ?>
				</td>
			</tr>
					
		</tbody>
		<tfoot>
    		<tr>
				<td colspan=3 style="text-align:right"><input class="button-primary" type="submit" id="global-settings"  value="<?php esc_attr_e( 'Save Settings' ); ?>" />
				</td>
			</tr>
			</tfoot>
	</table>
</form>
<?php 
	}

/**
 *
 * @Slider Settings submenu page callback single_cyber_slider_settings
 * @hooked add_cyber_slider_menu_page
 */
function single_cyber_slider_settings() {
?>
<div class = "wrap">
  	<h1><?php _e('Slider Settings',CS_TEXTDOMAIN); ?></h1>
	<div class="container slider-settings-page">
		<div class="row">
		<?php if( $_GET['success'] == 'true'): ?>
			<div class="alert alert-success" id="successMessage">
			  	<strong><?php _e('Success!',CS_TEXTDOMAIN); ?></strong> <?php _e('Option successfully updated.',CS_TEXTDOMAIN); ?>
			  	<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			</div><!-- start of tabs left -->
		<?php endif; ?>	
			<div class="panel panel-default margin-top-panel">
				<div class="panel-body">
			    	<?php
			      		// Get Slider title
			      		global $wpdb;
			      		$slider_id = $_GET['id'];
			      		$table_name = $wpdb->prefix.'cyberslider';
			      		$slider_name_query = $wpdb->get_row( "SELECT name,settings FROM $table_name WHERE id = $slider_id" );

			      		$slider_options = $slider_name_query->settings;
			      		$slideoptionsetup = unserialize($slider_options);

			      		echo '<h4 class="slider-settings-title">';
			      		_e($slider_name_query->name,CS_TEXTDOMAIN);
			      		echo '</h4>';
			      	 ?>
		         	<button type="button" class="btn btn-success save-options" redirect-url="<?php echo admin_url().'admin.php?page=cyber-slider&action=slider-settings&id='.$slider_id; ?>" style="float:right;margin-bottom:15px;"><?php _e('Save Settings',CS_TEXTDOMAIN); ?></button>
     				<div class="tabbable  tabs-left">
				    	<ul class="nav nav-tabs">
					  		<li><a href="#usage" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-tag"></span> <?php _e('Usage',CS_TEXTDOMAIN); ?> </a></li>
							<li><a href="#general" data-toggle="tab"><sapn class="glyphicon glyphicon-th" > </sapn><?php _e(' General',CS_TEXTDOMAIN); ?></a></li>
							<li><a href="#layout" data-toggle="tab"><sapn class="glyphicon glyphicon-tasks" > </sapn><?php _e(' Layout',CS_TEXTDOMAIN); ?></a></li>
							<li><a href="#thumnailSettings" data-toggle="tab"><span class="glyphicon glyphicon-object-align-bottom" ></span> <?php _e('Thumbnail Settings',CS_TEXTDOMAIN); ?> </a></li>
							<li><a href="#nagarea" data-toggle="tab"><span class="glyphicon glyphicon-sound-stereo" ></span> <?php _e('Navigation Area',CS_TEXTDOMAIN); ?></a></li>
							<li><a href="#transition" data-toggle="tab"><span class="glyphicon glyphicon-random" ></span> <?php _e('  Transition',CS_TEXTDOMAIN); ?></a></li>
							<li><a href="#responsiveSettings" data-toggle="tab"><span class="glyphicon glyphicon-phone" ></span> <?php _e('Responsive Settings',CS_TEXTDOMAIN); ?></a></li>
							<li><a href="#importexport" data-toggle="tab"><span class="glyphicon glyphicon-sort" ></span> <?php _e('Import/Export',CS_TEXTDOMAIN); ?></a></li>
						</ul>

						<form id="optionsettingsform"  method="POST" name="slider_options_form" class="" enctype="multipart/form-data">
   							<div class="tab-content" >
				        	<!-- start of tab usage -->
				        		<div class="tab-pane active" id="usage" >
					     		<?php
									//$slideoptionsetup = get_option('cyber_options',true);
				 					//parse_str($slideoptionsetup, $slideoptionsetup);
									?>		
		        					<ul>
										<li rel="tab-1" class="selected">
											<h4><?php _e('Shortcode',CS_TEXTDOMAIN); ?></h4>
											<hr/>
											<p><?php _e('Copy &amp; paste the shortcode directly into any WordPress post or page.',CS_TEXTDOMAIN); ?></p>
											<textarea class="form-control" readonly="readonly" rows="4" cols="50" onclick='this.focus();this.select()'>[cyberslider id="<?= $_GET['id'] ?>"]</textarea>
										</li>
										<li rel="tab-2">
											<h4><?php _e('Template Include',CS_TEXTDOMAIN); ?></h4>
											<p><?php _e('Copy &amp; paste this code into a template file to include the slideshow within your theme.',CS_TEXTDOMAIN); ?></p>
											<textarea class="form-control" readonly="readonly" rows="4" cols="50" onclick='this.focus();this.select()'>&lt;?php echo do_shortcode("[cyberslider  id='<?= $_GET['id'] ?>']"); ?&gt;</textarea>
										</li>
									</ul>
	    						</div> <!-- End of tab Usage -->

					    		<!-- start of tab layout -->
					    		<div class="tab-pane" id="layout" >
									<div class="row">
										<fieldset>
					    					<h4><?php _e('Slider Dimensions', CS_TEXTDOMAIN); ?></h4>
					    					<hr/>
							    			<div class="row">
								    			<div class="form-group" >
								     				<div class="col-md-3 col-sm-2">
								     					<p><?php _e('Width:', CS_TEXTDOMAIN); ?></p>
								     				</div>
									    			<div class="col-md-4 col-sm-4">
									    				<input type="text" min="0" max="100" name="cyber_sliderdim_width" value="<?php echo $slideoptionsetup['cyber_sliderdim_width']; ?>" class="form-control" placeholder="100% or 100px"> 
									    			</div>
									    			<div class="col-md-5 col-sm-6">
									    				<p class="" ><?php _e('The slider width should be in <strong> % / px.</strong>', CS_TEXTDOMAIN); ?></p>
									    			</div>
								   				</div>
							   				</div>


							   				<div class="row">
								    			<div class="form-group" >
									    			<div class="col-md-3 col-sm-2">	
									   					<p><?php _e('Height:', CS_TEXTDOMAIN); ?></p>
									   				</div>
									   				<div class="col-md-4 col-sm-4">	
									    				<input type="text" min="0" max="5000" name="cyber_sliderdim_height"  value="<?php echo $slideoptionsetup['cyber_sliderdim_height']; ?>" class="form-control" placeholder="400px">  
									     			</div>
									     			<div class="col-md-5 col-sm-6">
									   					<p class="" ><?php _e('The slider height should be in <strong>px.</strong>', CS_TEXTDOMAIN); ?></p>
									   				</div>
								    			</div>
							    			</div>

						    				<div class="row">
							    				<div class="form-group" >
								    				<div class="col-md-3 col-sm-2">
								   						<p><?php _e('Responsive mode:', CS_TEXTDOMAIN); ?></p>
								   					</div>
												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
								        					<input type="checkbox" name="slider_responsive_mode" class="onoffswitch-checkbox" id="slider_responsive_mode" <?php if($slideoptionsetup['slider_responsive_mode']=='on') echo "checked";?>>
								        					<label class="onoffswitch-label" for="slider_responsive_mode">
								           					<span class="onoffswitch-inner"></span>
								           					<span class="onoffswitch-switch"></span>
								        					</label>
								    					</div>
							   						</div>
								   					<div class="col-md-5 col-sm-6">
								   						<p class="" ><?php _e('<strong>ON/OFF</strong> Responsive mode', CS_TEXTDOMAIN); ?></p>
								   					</div>
							    				</div>
						    				</div>
										    <div class="row">
											    <div class="form-group" >
												    <div class="col-md-3 col-sm-2">
												   		<p><?php _e('Hide on mobile:', CS_TEXTDOMAIN); ?></p>
												   	</div>
												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="slider_hideonmobile" class="onoffswitch-checkbox" id="slider_hideonmobile" <?php if($slideoptionsetup['slider_hideonmobile']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="slider_hideonmobile">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												    </div>
												    <div class="col-md-5 col-sm-6">
												   		 <p><?php _e('Hide the slider on mobiles and small devices.', CS_TEXTDOMAIN); ?></p>
												    </div>
											    </div>
										    </div>
					   
					  					</fieldset>
					  				</div>
				
	    						</div><!-- End of tab layout -->

				    			<!-- start of tab slideshow -->
				    			<div class="tab-pane" id="thumnailSettings">
							    	<div class="row">
							    		<fieldset>
							    	 		<h4><?php _e('Thumbnails Settings', CS_TEXTDOMAIN); ?></h4>
							    	 		<hr/>
							    				<div class="row">
												    <div class="form-group" >
													    <div class="col-md-3 col-sm-2">
													   		<p><?php _e('Show Thumbnails:', CS_TEXTDOMAIN); ?></p>
													   	</div>

													   	<div class="col-md-4 col-sm-4">
													   		<div class="onoffswitch">
														        <input type="checkbox" name="showthumbs" class="onoffswitch-checkbox" id="showthumbs" <?php if($slideoptionsetup['showthumbs']=='on') echo "checked";?>>
														        <label class="onoffswitch-label" for="showthumbs">
														            <span class="onoffswitch-inner"></span>
														            <span class="onoffswitch-switch"></span>
														        </label>
														    </div>
													   	</div>

													   	<div class="col-md-5 col-sm-6">
													   		<p class=""><?php _e('<strong>Show/Hide</strong> the Thumnbails.', CS_TEXTDOMAIN); ?></p>
													   	</div>
						    						</div>
						    					</div>

						    					<div class="row">
												    <div class="form-group" >
													    <div class="col-md-3 col-sm-2">
													   		<p><?php _e('Show Thumbnails arrows :', CS_TEXTDOMAIN); ?></p>
													   	</div>

													   	<div class="col-md-4 col-sm-4">
													   		<div class="onoffswitch">
														        <input type="checkbox" name="showthumbsNavArrows" class="onoffswitch-checkbox" id="showthumbsNavArrows" <?php if($slideoptionsetup['showthumbsNavArrows']=='on') echo "checked";?>>
														        <label class="onoffswitch-label" for="showthumbsNavArrows">
														            <span class="onoffswitch-inner"></span>
														            <span class="onoffswitch-switch"></span>
														        </label>
														    </div>
													   	</div>

													   	<div class="col-md-5 col-sm-6">
													   		<p class=""><?php _e('<strong>Show/Hide</strong> the thumbnails arrows.', CS_TEXTDOMAIN); ?></p>
													   	</div>
												    </div>
					    						</div>

											    <div class="row">
												    <div class="form-group" >
													    <div class="col-md-3 col-sm-2">
													   		<p><?php _e('Thumbnail Container Width:', CS_TEXTDOMAIN); ?> </p>
													    </div>

													   	<div class="col-md-4 col-sm-4">
													 		<input type="text" name="thumb_container_width" class="form-control" placeholder="80%" value="<?php echo $slideoptionsetup['thumb_container_width']; ?>">
													   	</div>

													   	<div class="col-md-5 col-sm-6">
													   		<p class=""><?php _e('The thumbnail container width should be in <strong>%</strong>.',CS_TEXTDOMAIN) ?></p>
													   	</div>

												    </div>
											    </div>

											    <div class="row">
												    <div class="form-group" >
													    <div class="col-md-3 col-sm-2">
													   		<p><?php _e('Number of Thumbnails:', CS_TEXTDOMAIN); ?></p>
													   	</div>

													   	<div class="col-md-4 col-sm-4">
													   		<input type="number" name="no_of_thumbs" value="<?php echo $slideoptionsetup['no_of_thumbs']; ?>" class="form-control" placeholder="7">
													   	</div>

													   	<div class="col-md-5 col-sm-6">
													   		<p class=""><?php _e('Number of thumbnails to show. Default is <strong>7</strong>', CS_TEXTDOMAIN); ?></p>
													   	</div>
												    </div>
											    </div>

											     <div class="row">
												    <div class="form-group" >
													    <div class="col-md-3 col-sm-2">
													   		<p><?php _e('Center Padding:', CS_TEXTDOMAIN); ?></p>
													   	</div>

													   	<div class="col-md-4 col-sm-4">
													   		<input type="text" name="center_padding" value="<?php echo $slideoptionsetup['center_padding']; ?>" class="form-control" placeholder="50px">
													   	</div>

													   	<div class="col-md-5 col-sm-6">
													   		<p class=""><?php _e('Center padding. Shows the next and previous thumbnail on both ends. Default is <strong>50px</strong>', CS_TEXTDOMAIN); ?></p>
													   	</div>
												    </div>
											    </div>

											    <div class="row">
												    <div class="form-group" >
													    <div class="col-md-3 col-sm-2">
													   		 <p><?php _e('Thumbnail Height:', CS_TEXTDOMAIN); ?></p>
													    </div>

													   	<div class="col-md-4 col-sm-4">
													 		<input type="text" min="400" max="900" name="slider_thumbnail_height" class="form-control" placeholder="400px" value="<?php echo $slideoptionsetup['slider_thumbnail_height']; ?>">
													   	</div>

													   	<div class="col-md-5 col-sm-6">
													   		<p class=""><?php _e('Thumbnail height in the navigation area should be in <strong>px</strong>.', CS_TEXTDOMAIN); ?></p>
													   	</div>

												    </div>
											    </div>

											    <div class="row ">
												    <div class="form-group" >
													    <div class="col-md-3 col-sm-2">
													   		<p><?php _e('Thumbnail Width:', CS_TEXTDOMAIN); ?></p>
													    </div>
													   	<div class="col-md-4 col-sm-4">
													   		<input type="text" min="400" max="900" name="slider_thumbnail_width" class="form-control" placeholder="900px" value="<?php echo $slideoptionsetup['slider_thumbnail_width']; ?>">
													   	</div>
													   	<div class="col-md-5 col-sm-6">
													  	 	<p class=""><?php _e('Thumbnail width in the navigation area should be in <strong>px</strong>.', CS_TEXTDOMAIN); ?></p>
													   	</div>
												    </div>
											    </div>

											    <div class="row">
												    <div class="form-group" >
													    <div class="col-md-3 col-sm-2">
													   		<p><?php _e('Thumbnail Position:', CS_TEXTDOMAIN); ?></p>
													    </div>
													   	<div class="col-md-4 col-sm-4">
													   		<select name="thumb_position" class="form-control">
													   			<option>-- <?php _e('select', CS_TEXTDOMAIN); ?> --</option>
													   			<option value="thumb_below_slider" <?php if($slideoptionsetup['thumb_position'] == 'thumb_below_slider') echo "selected"; ?>><?php _e('Below Slider', CS_TEXTDOMAIN); ?></option>
													   			<option value="thumb_slider_bottom" <?php if($slideoptionsetup['thumb_position'] == 'thumb_slider_bottom') echo "selected"; ?>><?php _e('Slider Bottom', CS_TEXTDOMAIN); ?></option>
													   		</select>
													   	</div>
													   	<div class="col-md-5 col-sm-6">
													  	 	<p class="">
													  	 	<?php _e('Select thumbnail position (Default: below slider)<br/>
													  	 	Slider bottom means "<b>Over the slider at bottom position</b>"', CS_TEXTDOMAIN) ?>
													  	 	</p>
													   	</div>
												    </div>
											    </div>

											    <div class="row">
												    <div class="form-group" >
													    <div class="col-md-3 col-sm-2">
													   		<p><?php _e('Position from bottom ("slider bottom" only):', CS_TEXTDOMAIN); ?></p>
													    </div>
													   	<div class="col-md-4 col-sm-4">
													   		<input type="text" name="slider_bottom_position" class="form-control" placeholder="15%" value="<?php echo $slideoptionsetup['slider_bottom_position']; ?>" /> 
													   	</div>
													   	<div class="col-md-5 col-sm-6">
													  	 	<p class="">
													  	 	<?php _e('Thumbnails Position down from slider bottom if "Slider Bottom" is selected. It should be in <b> % or px</b>', CS_TEXTDOMAIN) ?>
													  	 	</p>
													   	</div>
												    </div>
											    </div>


						    					<div class="row ">
					           						<div class="form-group" >
					            						<div class="col-md-12 col-sm-12">
					              							<label for="upload_image">
					              								<input id="upload_next_arrow_thunmbnail" type="text" size="36" name="next_arrow_thunmbnail" value="<?php echo $slideoptionsetup['next_arrow_thunmbnail']; ?>" /> 
					              								<input id="next_arrow_button_thunmbnail" class="button" type="button" value="Upload Image" />
					           									<p><?php _e('Enter url or upload image for the next arrow.', CS_TEXTDOMAIN); ?></p>
					           									<?php if ($slideoptionsetup['next_arrow_thunmbnail'] != '') { ?>
					              								<img id="imgnextthumbnail" src="<?php echo $slideoptionsetup['next_arrow_thunmbnail']; ?>" width="100" height="100">
					              								<?php } else { 
					              								echo '<img  id="imgnextthumbnail" src="' . CS_ROOT_URL. '/images/next.png'. '" width="100" height="100"> ';
					              								 } ?>
					             							</label>

												            <label for="prev_arrow">
												            	<input id="upload_prev_arrow_thunmbnail" type="text" size="36" name="prev_arrow_thumbnail" value="<?php echo $slideoptionsetup['prev_arrow_thumbnail']; ?>" /> 
												             	<input id="prev_arrow_button_thunmbnail" class="button" type="button" value="<?php _e('Upload Image', CS_TEXTDOMAIN); ?>" />
												           		<p><?php _e('Enter url or upload image for the prev arrow.', CS_TEXTDOMAIN); ?></p>
												            	<?php if ($slideoptionsetup['prev_arrow_thumbnail'] != '') { ?>
												             	<img id="imgprevthumbnail" src="<?php echo $slideoptionsetup['prev_arrow_thumbnail']; ?>" width="100" height="100">
												            	<?php } else { 
												            	echo '<img  id="imgprevthumbnail" src="' . CS_ROOT_URL.'/images/prev.png'. '" width="100" height="100"> ';
												              	} ?>
												          	</label>
					            						</div>
					           						</div>
					          					</div>
									         	<div class="row">
									           		<div class="form-group" >
									            		<div class="col-md-3 col-sm-2" style="padding-left:0">
									             			<p><?php _e('Thumbnail Arrows width:', CS_TEXTDOMAIN); ?></p>
									            		</div>
									            		<div class="col-md-4 col-sm-4">
									             			<input type="text" class="form-control" name="thumbnail_navigation_width" value="<?php echo $slideoptionsetup['thumbnail_navigation_width']; ?>" placeholder="20px" >
									            		</div>
									            		<div class="col-md-5 col-sm-6">
									             			<p class=""><?php _e('Width of thumbnail arrows should be in <strong>px / %</strong>.', CS_TEXTDOMAIN); ?></p>
									            		</div>
									           		</div>
									           	</div>
									           		<div class="row">
										           	<div class="form-group" >
										            	<div class="col-md-3 col-sm-2" style="padding-left:0">
										             		<p><?php _e('Thumbnail Arrows Height:', CS_TEXTDOMAIN); ?></p>
										            	</div>
										            	<div class="col-md-4 col-sm-4">
										             		<input type="text" class="form-control" name="thumbnail_navigation_height" value="<?php echo $slideoptionsetup['thumbnail_navigation_height']; ?>"placeholder="20px">
										            	</div>
										            	<div class="col-md-5 col-sm-6">
										             		<p class=""><?php _e('Height of thumbnail arrows should be in <strong>px / %</strong>.', CS_TEXTDOMAIN); ?></p>
										            	</div>
										           </div>
					          					</div>

					    				</fieldset>
					   				</div>
	    						</div>
	    					<!-- End of tab slideshow -->

	    					<!-- start of tab  Navigation Area -->
	    						<div class="tab-pane" id="nagarea">
	    							<div class="row">
										<fieldset>
											<h4><?php _e('Navigation Area', CS_TEXTDOMAIN); ?></h4>
											<hr/>
					    					<label for="upload_image">
					    						<input id="upload_next_arrow" type="text" size="36" name="slider_next_arrow" value="<?php echo $slideoptionsetup['slider_next_arrow']; ?>" /> 
					    						<input id="next_arrow_button" class="button" type="button" value="<?php _e('Upload Image', CS_TEXTDOMAIN); ?>" />
					    						<p><?php _e('Enter a URL or upload image for the next arrow.', CS_TEXTDOMAIN); ?></p>
					    							<?php if ($slideoptionsetup['slider_next_arrow'] != '') { ?>
					    						<img id="imgnext" src="<?php echo $slideoptionsetup['slider_next_arrow']; ?>" width="100" height="100">
					    							<?php } else { 
					    						echo '<img  id="imgnext" src="' . CS_ROOT_URL. '/images/arrows_next.png'. '" width="100" height="100"> ';
					     						} ?>
					    					</label>

										    <label for="prev_arrow">
										     	<input id="upload_prev_arrow" type="text" size="36" name="slider_prev_arrow" value="<?php echo $slideoptionsetup['slider_prev_arrow']; ?>" /> 
										    	<input id="prev_arrow_button" class="button" type="button" value="<?php _e('Upload Image', CS_TEXTDOMAIN); ?>" />

										    	<p><?php _e('Enter a URL or Upload image for the prev arrow.', CS_TEXTDOMAIN); ?></p>

										   		 	<?php if ($slideoptionsetup['slider_prev_arrow'] != '') { ?>
										   		<img id="imgprev" src="<?php echo $slideoptionsetup['slider_prev_arrow']; ?>" width="100" height="100">
										   		 	<?php } else { 
										    	echo '<img  id="imgprev" src="' . CS_ROOT_URL.'/images/arrows_prev.png'. '" width="100" height="100"> ';
										    		}  ?>
											</label>

											<hr/>
											<div class="row" >
										 	<div class="form-group" >
											    <div class="col-md-3 col-sm-2" style="padding-left:0">
											   		<p><?php _e('Thumbnail Arrows width:', CS_TEXTDOMAIN); ?> </p>
											    </div>
											   	<div class="col-md-4 col-sm-4">
											   		<input type="text" class="form-control" name="slider_navigation_width" value="<?php echo $slideoptionsetup['slider_navigation_width']; ?>" placeholder="20px">
											   	</div>
											   	<div class="col-md-5 col-sm-6">
											  	 	<p class=""><?php _e('Width of navigation arrows should be in <strong>px / %</strong>.', CS_TEXTDOMAIN); ?></p>
											   	</div>
										    </div>
										    </div>

										    <div class="row">
										    <div class="form-group" >
											    <div class="col-md-3 col-sm-2" style="padding-left:0">
											   		<p><?php _e('Thumbnail Arrows Height:', CS_TEXTDOMAIN); ?></p>
											    </div>
											   	<div class="col-md-4 col-sm-4">
											   		<input type="text" class="form-control" name="slider_navigation_height" value="<?php echo $slideoptionsetup['slider_navigation_height']; ?>" placeholder="20px" >
											   	</div>
											   	<div class="col-md-5 col-sm-6">
											  	 	<p class=""><?php _e('Height of navigation arrows should be in <strong>px / %</strong>.', CS_TEXTDOMAIN); ?></p>
											   	</div>
										    </div>
										   </div>
				    					</fieldset>
									</div>
	    						</div>
						    <!-- End of tab  Navigation Area -->
						   	<!-- start of tab  Thumbnail Navigation -->
						    	<div class="tab-pane" id="general">
						    		<div class="row">
										<fieldset>
											<h4><?php _e('General Settings', CS_TEXTDOMAIN); ?></h4>
											<hr/>
										
											<div class="row">
											<div class="form-group" >
											    <div class="col-md-3 col-sm-2">
											   		<p><?php _e('Auto play:', CS_TEXTDOMAIN); ?></p>
											   	</div>

											   	<div class="col-md-4 col-sm-4">
											   		<div class="onoffswitch">
												        <input type="checkbox" name="autoplay" class="onoffswitch-checkbox" id="autoplay" <?php if($slideoptionsetup['autoplay']=='on') echo "checked";?>>
												        <label class="onoffswitch-label" for="autoplay">
												            <span class="onoffswitch-inner"></span>
												            <span class="onoffswitch-switch"></span>
												        </label>
												    </div>
											   	</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('Autoplay Slider (Default: <strong>True</strong>)', CS_TEXTDOMAIN); ?></p>
											   	</div>
					    					</div>
					    					</div>

					    					<div class="row">
										    <div class="form-group" >
											    <div class="col-md-3 col-sm-2">
											   		<p><?php _e('Navigation Arrows:', CS_TEXTDOMAIN); ?></p>
											   	</div>

											   	<div class="col-md-4 col-sm-4">
											   		<div class="onoffswitch">
												        <input type="checkbox" name="show_nav_arrows" class="onoffswitch-checkbox" id="show_nav_arrows" <?php if(!($slideoptionsetup['show_nav_arrows']) || $slideoptionsetup['show_nav_arrows']=='on') echo "checked";?>>
												        <label class="onoffswitch-label" for="show_nav_arrows">
												            <span class="onoffswitch-inner"></span>
												            <span class="onoffswitch-switch"></span>
												        </label>
												    </div>
											   	</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('<strong>Show/Hide</strong> main navigation arrows', CS_TEXTDOMAIN); ?></p>
											   	</div>
										    </div>
										    </div>

										    <div class="row">
										    <div class="form-group" >
											    <div class="col-md-3 col-sm-2">
											   		<p><?php _e('Show Dots:', CS_TEXTDOMAIN); ?></p>
											   	</div>

											   	<div class="col-md-4 col-sm-4">
											   		<div class="onoffswitch">
												        <input type="checkbox" name="show_dots" class="onoffswitch-checkbox" id="show_dots" <?php if($slideoptionsetup['show_dots']=='on') echo "checked";?>>
												        <label class="onoffswitch-label" for="show_dots">
												            <span class="onoffswitch-inner"></span>
												            <span class="onoffswitch-switch"></span>
												        </label>
												    </div>
											   	</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('<strong>Show/Hide</strong> Dot indicators', CS_TEXTDOMAIN); ?></p>
											   	</div>
										    </div>
										    </div>

										    <div class="row">
										    <div class="form-group" >
											    <div class="col-md-3 col-sm-2">
											   		<p><?php _e('Infinite Loop:', CS_TEXTDOMAIN); ?></p>
											   	</div>

											   	<div class="col-md-4 col-sm-4">
											   		<div class="onoffswitch">
												        <input type="checkbox" name="infinite_loop" class="onoffswitch-checkbox" id="infinite_loop" <?php if(!($slideoptionsetup['infinite_loop']) || $slideoptionsetup['infinite_loop']=='on') echo "checked";?>>
												        <label class="onoffswitch-label" for="infinite_loop">
												            <span class="onoffswitch-inner"></span>
												            <span class="onoffswitch-switch"></span>
												        </label>
												    </div>
											   	</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('Infinite loop sliding (Default: <strong>True</strong>)', CS_TEXTDOMAIN); ?></p>
											   	</div>
										    </div>
										    </div>

										   <div class="row">
										    <div class="form-group" >
											    <div class="col-md-3 col-sm-2">
											   		<p><?php _e('Pause on hover:', CS_TEXTDOMAIN); ?></p>
											   	</div>

											   	<div class="col-md-4 col-sm-4">
											   		<div class="onoffswitch">
												        <input type="checkbox" name="pause_on_hover" class="onoffswitch-checkbox" id="pause_on_hover" <?php if($slideoptionsetup['pause_on_hover']=='on') echo "checked";?>>
												        <label class="onoffswitch-label" for="pause_on_hover">
												            <span class="onoffswitch-inner"></span>
												            <span class="onoffswitch-switch"></span>
												        </label>
												    </div>
											   	</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('Pause Autoplay On Hover (Default: <strong>True</strong>)', CS_TEXTDOMAIN); ?></p>
											   	</div>
										    </div>
										    </div>

										    <div class="row">
										    <div class="form-group" >
											    <div class="col-md-3 col-sm-2">
											   		<p><?php _e('Pause on Dot hover:', CS_TEXTDOMAIN); ?></p>
											   	</div>

											   	<div class="col-md-4 col-sm-4">
											   		<div class="onoffswitch">
												        <input type="checkbox" name="pause_on_dot_hover" class="onoffswitch-checkbox" id="pause_on_dot_hover" <?php if($slideoptionsetup['pause_on_dot_hover']=='on') echo "checked";?>>
												        <label class="onoffswitch-label" for="pause_on_dot_hover">
												            <span class="onoffswitch-inner"></span>
												            <span class="onoffswitch-switch"></span>
												        </label>
												    </div>
											   	</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('Pause Autoplay when a dot is hovered (Default: <strong>False</strong>)', CS_TEXTDOMAIN); ?></p>
											   	</div>
										    </div>
										    </div>

										    <div class="row">
										    <div class="form-group" >
											    <div class="col-md-3 col-sm-2">
											   		<p>Slides To Show</p>
											   	</div>

											   	<div class="col-md-4 col-sm-4">
											   		<input type="number" min="1" name="slides_to_show" class="form-control" value="<?php echo $slideoptionsetup['slides_to_show']; ?>" placeholder="1">
											   	</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('Number of slides to show (Default: <strong>1</strong>)', CS_TEXTDOMAIN); ?></p>
											   	</div>
										    </div>
										    </div>

										    <div class="row">
										    <div class="form-group" >
											    <div class="col-md-3 col-sm-2">
											   		<p><?php _e('Slides To Scroll', CS_TEXTDOMAIN); ?></p>
											   	</div>

											   	<div class="col-md-4 col-sm-4">
											   		<input type="text"  name="slides_to_scroll" class="form-control" value="<?php echo $slideoptionsetup['slides_to_scroll']; ?>" placeholder="1">
											   	</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('Number of slides to Scroll (Default: <strong>1</strong>)', CS_TEXTDOMAIN); ?></p>
											   	</div>
										    </div>
										    </div>
										</fieldset>
									</div>
	    						</div>
						<!-- End of tab  Thumbnail Navigation -->
						<!-- Start of tab Transition-->
	    						<div class="tab-pane" id="transition">
	    							<div class="row">

										<fieldset>
											<h4><?php _e('Transitions Settings', CS_TEXTDOMAIN); ?></h4>
											<hr/>
											<div class="row">
					    					<div class="form-group" >
						    					<div class="col-md-3 col-sm-2">
						   							<p><?php _e('Select Transition:', CS_TEXTDOMAIN); ?></p>
						   						</div>

							   					<div class="col-md-4 col-sm-4">
											   		<select name="slider_animation" class="form-control">
														<option value="easeInQuad" <?php if($slideoptionsetup['slider_animation'] == 'easeInQuad' ) echo "selected"; ?>>easeInQuad</option>
														<option value="easeOutQuad" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutQuad' ) echo "selected"; ?>>easeOutQuad</option>
														<option value="easeInOutQuad" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutQuad' ) echo "selected"; ?>>easeInOutQuad</option>
														<option value="easeInCubic" <?php if($slideoptionsetup['slider_animation'] == 'easeInCubic' ) echo "selected"; ?>>easeInCubic</option>
														<option value="easeOutCubic" <?php if($slideoptionsetup['slider_animation'] == 'easeOutCubic' ) echo "selected"; ?>>easeOutCubic</option>
														<option value="easeInOutCubic" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutCubic' ) echo "selected"; ?>>easeInOutCubic</option>
														<option value="easeInQuart" <?php if($slideoptionsetup['slider_animation'] == 'easeInQuart' ) echo "selected"; ?>>easeInQuart</option>
														<option value="easeOutQuart" <?php if($slideoptionsetup['slider_animation'] == 'easeOutQuart' ) echo "selected"; ?>>easeOutQuart</option>
														<option value="easeInOutQuart" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutQuart' ) echo "selected"; ?>>easeInOutQuart</option>
														<option value="easeInQuint" <?php if($slideoptionsetup['slider_animation'] == 'easeInQuint' ) echo "selected"; ?>>easeInQuint</option>
														<option value="easeOutQuint" <?php if($slideoptionsetup['slider_animation'] == 'easeOutQuint' ) echo "selected"; ?>>easeOutQuint</option>
														<option value="easeInOutQuint" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutQuint' ) echo "selected"; ?>>easeInOutQuint</option>
														<option value="easeInSine" <?php if($slideoptionsetup['slider_animation'] == 'easeInSine' ) echo "selected"; ?>>easeInSine</option>
														<option value="easeOutSine" <?php if($slideoptionsetup['slider_animation'] == 'easeOutSine' ) echo "selected"; ?>>easeOutSine</option>
														<option value="easeInOutSine" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutSine' ) echo "selected"; ?>>easeInOutSine</option>
														<option value="easeInExpo" <?php if($slideoptionsetup['slider_animation'] == 'easeInExpo' ) echo "selected"; ?>>easeInExpo</option>
														<option value="easeOutExpo" <?php if($slideoptionsetup['slider_animation'] == 'easeOutExpo' ) echo "selected"; ?>>easeOutExpo</option>
														<option value="easeInOutExpo" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutExpo' ) echo "selected"; ?>>easeInOutExpo</option>
														<option value="easeInCric" <?php if($slideoptionsetup['slider_animation'] == 'easeInCric' ) echo "selected"; ?>>easeInCric</option>
														<option value="easeOutCric" <?php if($slideoptionsetup['slider_animation'] == 'easeOutCric' ) echo "selected"; ?>>easeOutCric</option>
														<option value="easeInOutCric" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutCric' ) echo "selected"; ?>>easeInOutCric</option>
														<option value="easeInElastic" <?php if($slideoptionsetup['slider_animation'] == 'easeInElastic' ) echo "selected"; ?>>easeInElastic</option>
														<option value="easeOutElastic" <?php if($slideoptionsetup['slider_animation'] == 'easeOutElastic' ) echo "selected"; ?>>easeOutElastic</option>
														<option value="easeInOutElastic" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutElastic' ) echo "selected"; ?>>easeInOutElastic</option>
														<option value="easeInBack" <?php if($slideoptionsetup['slider_animation'] == 'easeInBack' ) echo "selected"; ?>>easeInBack</option>
														<option value="easeOutBack" <?php if($slideoptionsetup['slider_animation'] == 'easeOutBack' ) echo "selected"; ?>>easeOutBack</option>
														<option value="easeInOutBack" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutBack' ) echo "selected"; ?>>easeInOutBack</option>
														<option value="easeInBounce" <?php if($slideoptionsetup['slider_animation'] == 'easeInBounce' ) echo "selected"; ?>>easeInBounce</option>
														<option value="easeOutBounce" <?php if($slideoptionsetup['slider_animation'] == 'easeOutBounce' ) echo "selected"; ?>>easeOutBounce</option>
														<option value="easeInOutBounce" <?php if($slideoptionsetup['slider_animation'] == 'easeInOutBounce' ) echo "selected"; ?>>easeInOutBounce</option>
													</select>
							   					</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('Animations for slides', CS_TEXTDOMAIN); ?></p>
											   	</div>
					    					</div>
					    					</div>
					    					<div class="row">
										    <div class="form-group" >
											    <div class="col-md-3 col-sm-2">
											   		<p><?php _e('Speed', CS_TEXTDOMAIN); ?></p>
											   	</div>

											   	<div class="col-md-4 col-sm-4">
											   		<input type="number"  name="slide_speed" class="form-control" placeholder="3000" value="<?php echo $slideoptionsetup['slide_speed']; ?>" >
											   	</div>

											   	<div class="col-md-5 col-sm-6">
											   		<p class=""><?php _e('Slide Speed (in millisecond i.e <strong>3000 for 3 seconds</strong>)', CS_TEXTDOMAIN); ?></p>
											   	</div>
									    	</div>
									    </div>
									    </fieldset>
									</div>
								</div>
						<!-- End of tab Transition-->
	    				<!-- start of tab Responsive settings-->
		    						<div class="tab-pane" id="responsiveSettings">
			    					<div class="row">
			    						<fieldset>
											<h4><?php _e('Responsive Settings ( for thumbnails only )', CS_TEXTDOMAIN); ?></h4>
											<hr/>
											<div class="row">
											<ul style="list-style-type:square">

												<!-- Responsive Settings for screen 1024-->
						
												<li><b><p><?php _e('For The screen from 769px to 1024px', CS_TEXTDOMAIN); ?></p></b></li>
												<div class="row">
							     				<div class="form-group" >
													<div class="col-md-3 col-sm-2">
														<p><?php _e('Width:', CS_TEXTDOMAIN); ?></p>
													</div>

													<div class="col-md-4 col-sm-4">
														<input type="text" min="0" max="100" name="screen_width_1024" value="<?php echo $slideoptionsetup['screen_width_1024']; ?>" class="form-control" placeholder="1024" > 
													</div>
													<div class="col-md-5 col-sm-6">
														<p class="" ><?php _e('The screen width should be in <strong>px</strong>.', CS_TEXTDOMAIN); ?></p>
													</div>
								  				</div> 
								  			</div><br/>

								  			<div class="row">
								                <div class="form-group" >
										             <div class="col-md-3 col-sm-2">
										             	 <p><?php _e('Slider Height:', CS_TEXTDOMAIN); ?></p>
										             </div>

										             <div class="col-md-4 col-sm-4">
										              <input type="text" min="0" max="100" name="screen_height_1024" value="<?php echo $slideoptionsetup['screen_height_1024']; ?>" class="form-control" placeholder="400px" > 
										             </div>
										             <div class="col-md-5 col-sm-6">
										              <p class="" ><?php _e('The slider height should be in <strong>px</strong>.', CS_TEXTDOMAIN); ?></p>
										             </div>
								              </div> 
								             </div><br/>

								  				<div class="row">
								   				<div class="form-group" >
									    			<div class="col-md-3 col-sm-2">
									   					<p><?php _e('Slides To Show', CS_TEXTDOMAIN); ?></p>
									   				</div>
												   	<div class="col-md-4 col-sm-4">
												   		<input type="number" min="1" name="slides_to_show_1024" value="<?php echo $slideoptionsetup['slides_to_show_1024']; ?>" class="form-control" placeholder="1">
												   	</div>
												   	<div class="col-md-5 col-sm-6">
												   		<p class=""><?php _e('Number of slides to show (Default: <strong>1</strong>)', CS_TEXTDOMAIN); ?></p>
												   	</div>
					                			</div>
					                			</div><br/>

					                			<div class="row">
								                <div class="form-group" >
												    <div class="col-md-3 col-sm-2">
												   		<p><?php _e('Slides To Scroll', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<input type="number" min="1" name="slides_to_scroll_1024" value="<?php echo $slideoptionsetup['slides_to_scroll_1024']; ?>" class="form-control" placeholder="1">
												   	</div>

												   	<div class="col-md-5 col-sm-6">
												   		<p class=""><?php _e('Number of slides to Scroll (Default: <strong>1</strong>)', CS_TEXTDOMAIN); ?></p>
												   	</div>
								   				</div>
								   				</div><br/>

								   				<div class="row">
											   <div class="form-group" >
													<div class="col-md-3 col-sm-2">
														<p><?php _e('Respond To:', CS_TEXTDOMAIN); ?></p>
													</div>

													<div class="col-md-4 col-sm-4">
														<input type="text" min="0" max="100" name="respondto_1024" value="<?php echo $slideoptionsetup['respondto_1024']; ?>" class="form-control" placeholder="windows"> 
													</div>

													<div class="col-md-5 col-sm-6">
														<p class="" ><?php _e(' Can be <strong>window, slider</strong> or<strong> min</strong>
														 (the smaller of the two)', CS_TEXTDOMAIN); ?></p>
													</div>
											  </div> 
											  </div><br/>

											  <div class="row">
											   <div class="form-group" >
													<div class="col-md-3 col-sm-2">
														<p><?php _e('Hide Slider:', CS_TEXTDOMAIN); ?></p>
													</div>

													<div class="col-md-4 col-sm-4">
													   		<div class="onoffswitch">
														        <input type="checkbox" name="hideslider_1024" class="onoffswitch-checkbox" id="hideslider_1024" <?php if($slideoptionsetup['hideslider_1024']=='on') echo "checked";?>>
														        <label class="onoffswitch-label" for="hideslider_1024">
														            <span class="onoffswitch-inner"></span>
														            <span class="onoffswitch-switch"></span>
														        </label>
														    </div>
													   	</div>

													<div class="col-md-5 col-sm-6">
														<p class="" ><?php _e('<strong>ON/OFF</strong> To disable the slick.', CS_TEXTDOMAIN); ?> </p>
													</div>
											  </div> 
											  </div><br/>

											  <div class="row">
											   <div class="form-group" >
											   		<div class="col-md-3 col-sm-2">
												   		<p><?php _e('Dots:', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="dots_1024" class="onoffswitch-checkbox" id="dots_1024" <?php if($slideoptionsetup['dots_1024']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="dots_1024">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												   	</div>
												   	<div class="col-md-5 col-sm-6">
													   		<p class="" ><?php _e('<strong>Show/Hide</strong> Dot indicators', CS_TEXTDOMAIN); ?></p>
													</div>
											    </div>
											    </div><br/>

											    <div class="row">
											   <div class="form-group" >
											   		<div class="col-md-3 col-sm-2">
												   		<p><?php _e('Infinite:', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="infinite_1024" class="onoffswitch-checkbox" id="infinite_1024" <?php if($slideoptionsetup['infinite_1024']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="infinite_1024">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												   	</div>
												   	<div class="col-md-5 col-sm-6">
													   	<p class="" ><?php _e('<strong>ON/OFF</strong> Infinite Loop for Slider', CS_TEXTDOMAIN); ?></p>
													</div>
											    </div>
												</div><br/>

												<div class="row">
											   <div class="form-group" >
											   		<div class="col-md-3 col-sm-2">
												   		<p><?php _e('MobileFirst:', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="showmobilefirst_1024" class="onoffswitch-checkbox" id="showmobilefirst_1024" <?php if($slideoptionsetup['showmobilefirst_1024']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="showmobilefirst_1024">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												   	</div>
												   	<div class="col-md-5 col-sm-6">
													   	<p class="" ><?php _e('<strong>ON/OFF</strong> Mobile First mode', CS_TEXTDOMAIN); ?></p>
													</div>
											    </div>
								  				</div><br/>
								  				<!-- End Responsive Settings for screen 1024-->
								 
								  				<li><b><p><?php _e('For The screen from 481px to 768px', CS_TEXTDOMAIN); ?></p></b></li>

								  				<!-- Responsive Settings for screen 768-->
								 				<div class="row">
											  	<div class="form-group" >

													<div class="col-md-3 col-sm-2">
														<p><?php _e('Width:', CS_TEXTDOMAIN); ?></p>
													</div>

													<div class="col-md-4 col-sm-4">
														<input type="text" min="0" max="100" name="screen_width_768" value="<?php echo $slideoptionsetup['screen_width_768']; ?>" class="form-control" placeholder="768"> 
													</div>

													<div class="col-md-5 col-sm-6">
														<p class="" ><?php _e('The Screen shoulde be in <strong>px</strong>.', CS_TEXTDOMAIN); ?></p>
													</div>
											  	</div> 
											  	</div><br/>

											  	<div class="row">
									                <div class="form-group" >
										             <div class="col-md-3 col-sm-2">
										             	 <p><?php _e('Slider Height:', CS_TEXTDOMAIN); ?></p>
										             </div>

										             <div class="col-md-4 col-sm-4">
										             	 <input type="text" min="0" max="100" name="screen_height_768" value="<?php echo $slideoptionsetup['screen_height_768']; ?>" class="form-control" placeholder="350px" > 
										             </div>
										             <div class="col-md-5 col-sm-6">
										             	 <p class="" ><?php _e('The slider height should be in <strong>px</strong>.', CS_TEXTDOMAIN); ?></p>
										             </div>
									              </div> 
									             </div><br/>


											  	<div class="row">
								  				<div class="form-group" >
												    <div class="col-md-3 col-sm-2">
												   		<p><?php _e('Slides To Show', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<input type="number" min="1" name="slides_to_show_768" value="<?php echo $slideoptionsetup['slides_to_show_768']; ?>" class="form-control" placeholder="1">
												   	</div>

												   	<div class="col-md-5 col-sm-6">
												   		<p class=""><?php _e('Number of slides to show (Default: <strong>1</strong>)', CS_TEXTDOMAIN); ?></p>
												   	</div>
					                			</div>
					                			</div><br/>

					                			<div class="row">
								                <div class="form-group" >
												    <div class="col-md-3 col-sm-2">
												   		<p><?php _e('Slides To Scroll', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<input type="number" min="1" name="slides_to_scroll_768" value="<?php echo $slideoptionsetup['slides_to_scroll_768']; ?>" class="form-control" placeholder="1">
												   	</div>

												   	<div class="col-md-5 col-sm-6">
												   		<p class=""><?php _e('Number of slides to Scroll (Default: <strong>1</strong>)', CS_TEXTDOMAIN); ?></p>
												   	</div>
								   				</div>
								   				</div><br/>

								   				<div class="row">
											   	<div class="form-group" >
													<div class="col-md-3 col-sm-2">
														<p><?php _e('Respond To:', CS_TEXTDOMAIN); ?></p>
													</div>

													<div class="col-md-4 col-sm-4">
														<input type="text" min="0" max="100" name="respondto_768" value="<?php echo $slideoptionsetup['respondto_768']; ?>" class="form-control" placeholder="windows"> 
													</div>

													<div class="col-md-5 col-sm-6">
														<p class="" ><?php _e(' Can be <strong>window, slider</strong> or<strong> min</strong> (the smaller of the two)', CS_TEXTDOMAIN); ?></p>
													</div>
											  	</div> 
											  	</div><br/>

											  	<div class="row">
											    <div class="form-group" >
													<div class="col-md-3 col-sm-2">
														<p><?php _e('Hide Slider:', CS_TEXTDOMAIN); ?></p>
													</div>
													<div class="col-md-4 col-sm-4">
													   		<div class="onoffswitch">
														        <input type="checkbox" name="hideslider_768" class="onoffswitch-checkbox" id="hideslider_768" <?php if($slideoptionsetup['hideslider_768']=='on') echo "checked";?>>
														        <label class="onoffswitch-label" for="hideslider_768">
														            <span class="onoffswitch-inner"></span>
														            <span class="onoffswitch-switch"></span>
														        </label>
														    </div>
													   	</div>
														<div class="col-md-5 col-sm-6">
															<p class=""><?php _e('<strong>ON/OFF</strong> To disable the slick.', CS_TEXTDOMAIN); ?></p>
														</div>
											    </div> 
											    </div><br/>

											    <div class="row">
											   	<div class="form-group" >
											   		<div class="col-md-3 col-sm-2">
												   		<p><?php _e('Dots:', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="dots_678" class="onoffswitch-checkbox" id="dots_678" <?php if($slideoptionsetup['dots_678']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="dots_678">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												   	</div>
												   	<div class="col-md-5 col-sm-6">
													   	<p class=""><?php _e('<strong>Show/Hide</strong> Dot indicators', CS_TEXTDOMAIN); ?></p>
													</div>
											    </div>
											    </div><br/>

											    <div class="row">
											   	<div class="form-group" >
											   		<div class="col-md-3 col-sm-2">
												   		<p><?php _e('Infinite:', CS_TEXTDOMAIN); ?></p>
												   	</div>
												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="infinite_678" class="onoffswitch-checkbox" id="infinite_678" <?php if($slideoptionsetup['infinite_678']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="infinite_678">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												   	</div>
												   	<div class="col-md-5 col-sm-6">
													   	<p class=""><?php _e('<strong>ON/OFF</strong> Infinite Loop for Slider', CS_TEXTDOMAIN); ?></p>
													</div>
											    </div>
											    </div><br/>

											    <div class="row">
											   	<div class="form-group" >
											   		<div class="col-md-3 col-sm-2">
												   		<p><?php _e('MobileFirst:', CS_TEXTDOMAIN); ?></p>
												   	</div>
												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="showmobilefirst_678" class="onoffswitch-checkbox" id="showmobilefirst_678" <?php if($slideoptionsetup['showmobilefirst_678']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="showmobilefirst_678">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												   	</div>
												   	<div class="col-md-5 col-sm-6">
													   		<p class=""><?php _e('<strong>ON/OFF</strong> Mobile First mode', CS_TEXTDOMAIN); ?></p>
													</div>
											  	</div>
											  	</div><br/>
											  	
								 				<!-- End Responsive Settings for screen 768-->

							     				<li><b><p><?php _e('For The screen from 320px to 480px', CS_TEXTDOMAIN); ?></p></b></li>
								  				<!-- Responsive Settings for screen 480-->
								 				<div class="row">
											  	<div class="form-group" >
													<div class="col-md-3 col-sm-2">
														<p><?php _e('Width:', CS_TEXTDOMAIN); ?></p>
													</div>
													<div class="col-md-4 col-sm-4">
														<input type="text" min="0" max="100" name="screen_width_480" value="<?php echo $slideoptionsetup['screen_width_480']; ?>" class="form-control" placeholder="480"> 
													</div>
													<div class="col-md-5 col-sm-6">
														<p class=""><?php _e('The Screen  width should be in <strong>px</strong>.', CS_TEXTDOMAIN); ?></p>
													</div>
											  	</div> 
											  	</div><br/>

											  	<div class="row">
									                <div class="form-group" >
										             <div class="col-md-3 col-sm-2">
										              	<p><?php _e('Slider Height:', CS_TEXTDOMAIN); ?></p>
										             </div>

										             <div class="col-md-4 col-sm-4">
										              	<input type="text" min="0" max="100" name="screen_height_480" value="<?php echo $slideoptionsetup['screen_height_480']; ?>" class="form-control" placeholder="300px" > 
										             </div>
										             <div class="col-md-5 col-sm-6">
										              	<p class="" ><?php _e('The slider height should be in <strong>px</strong>.', CS_TEXTDOMAIN); ?></p>
										             </div>
									              </div> 
									             </div><br/>

											  	<div class="row">
											  	<div class="form-group" >
												    <div class="col-md-3 col-sm-2">
												   		<p><?php _e('Slides To Show', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<input type="number" min="1" name="slides_to_show_480" value="<?php echo $slideoptionsetup['slides_to_show_480']; ?>" class="form-control" placeholder="1">
												   	</div>

												   	<div class="col-md-5 col-sm-6">
												   		<p class=""><?php _e('Number of slides to show (Default: <strong>1</strong>)', CS_TEXTDOMAIN); ?></p>
												   	</div>
								                </div>
								                </div><br/>

								                <div class="row">
								                <div class="form-group" >
												    <div class="col-md-3 col-sm-2">
												   		<p><?php _e('Slides To Scroll', CS_TEXTDOMAIN); ?></p>
												   	</div>
												   	<div class="col-md-4 col-sm-4">
												   		<input type="number" min="1" name="slides_to_scroll_480" value="<?php echo $slideoptionsetup['slides_to_scroll_480']; ?>" class="form-control" placeholder="1">
												   	</div>
												   	<div class="col-md-5 col-sm-6">
												   		<p class=""><?php _e('Number of slides to Scroll (Default: <strong>1</strong>)', CS_TEXTDOMAIN); ?></p>
												   	</div>
								   				</div>
								   				</div><br/>

								   				<div class="row">
											   	<div class="form-group" >
													<div class="col-md-3 col-sm-2">
														<p><?php _e('Respond To:', CS_TEXTDOMAIN); ?></p>
													</div>

													<div class="col-md-4 col-sm-4">
														<input type="text" min="0" max="100" name="respondto_480" value="<?php echo $slideoptionsetup['respondto_480']; ?>" class="form-control" placeholder="windows"> 
													</div>

													<div class="col-md-5 col-sm-6">
														<p class=""><?php _e(' Can be <strong>window, slider</strong> or<strong> min</strong> (the smaller of the two).', CS_TEXTDOMAIN); ?></p>
													</div>
											  	</div> 
											  	</div><br/>

											  	<div class="row">
											   	<div class="form-group" >
													<div class="col-md-3 col-sm-2">
														<p><?php _e('Hide Slider:', CS_TEXTDOMAIN); ?></p>
													</div>

													<div class="col-md-4 col-sm-4">
													   	<div class="onoffswitch">
														    <input type="checkbox" name="hideslider_480" class="onoffswitch-checkbox" id="hideslider_480" <?php if($slideoptionsetup['hideslider_480']=='on') echo "checked";?>>
														    <label class="onoffswitch-label" for="hideslider_480">
														    	<span class="onoffswitch-inner"></span>
														        <span class="onoffswitch-switch"></span>
														    </label>
														</div>
													</div>

													<div class="col-md-5 col-sm-6">
														<p class=""><?php _e('<strong>ON/OFF</strong> To disable the slick.', CS_TEXTDOMAIN); ?></p>
													</div>
											    </div> 
											    </div><br/>

											    <div class="row">
											   	<div class="form-group" >
											   		<div class="col-md-3 col-sm-2">
												   		<p><?php _e('Dots:', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="dots_480" class="onoffswitch-checkbox" id="dots_480" <?php if($slideoptionsetup['dots_480']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="dots_480">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												   	</div>
												   	<div class="col-md-5 col-sm-6">
													   		<p class="" ><?php _e('<strong>Show/Hide</strong> Dot indicators', CS_TEXTDOMAIN); ?></p>
													</div>
											    </div>
											    </div>
											    <br/>

											    <div class="row">
											   	<div class="form-group" >
											   		<div class="col-md-3 col-sm-2">
												   		<p><?php _e('Infinite:', CS_TEXTDOMAIN); ?></p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="infinite_480" class="onoffswitch-checkbox" id="infinite_480" <?php if($slideoptionsetup['infinite_480']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="infinite_480">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												   	</div>
												   	<div class="col-md-5 col-sm-6">
													   		<p class=""><?php _e('<strong>ON/OFF</strong> Infinite Loop for Slider', CS_TEXTDOMAIN); ?></p>
													</div>
											    </div>
												</div><br/>

												<div class="row">
											   	<div class="form-group" >
											   		<div class="col-md-3 col-sm-2">
												   		<p>MobileFirst:</p>
												   	</div>

												   	<div class="col-md-4 col-sm-4">
												   		<div class="onoffswitch">
													        <input type="checkbox" name="showmobilefirst_480" class="onoffswitch-checkbox" id="showmobilefirst_480" <?php if($slideoptionsetup['showmobilefirst_480']=='on') echo "checked";?>>
													        <label class="onoffswitch-label" for="showmobilefirst_480">
													            <span class="onoffswitch-inner"></span>
													            <span class="onoffswitch-switch"></span>
													        </label>
													    </div>
												   	</div>
												   	<div class="col-md-5 col-sm-6">
													   	<p class=""><?php _e('<strong>ON/OFF</strong> Mobile First mode', CS_TEXTDOMAIN); ?></p>
													</div>
											  	</div>
								 				</div>
								 				<br/>
											</ul>
											</div>
											 <!-- End Responsive Settings for screen 480-->
						    			</fieldset>
						    			
						    		</div>				   
	    						</div>
	    				<!-- end Responsive settings -->
	    				<!-- Start of tab  Import & Export -->
	    						<div class="tab-pane" id="importexport">
	    							<div class="row">
										<fieldset>
											<h4><?php _e('Import/Export Slider Settings', CS_TEXTDOMAIN); ?></h4>
											<hr/>
											<p style="color:red"><?php _e('Note: Please reload the page before "Export" and after "import" to get the updated results.', CS_TEXTDOMAIN); ?></p>
											<div class="form-group" >
								    			<div class="col-md-2 col-sm-2">
								   					<p><?php _e('Export Settings:', CS_TEXTDOMAIN); ?></p>
								   				</div>

											   	<div class="col-md-7 col-sm-4">
											   		<textarea class="export-import-settings" class="form-control" onclick="this.focus();this.select()" rows=10 readonly="readonly"><?php $settingsdata =  json_encode($slider_options); echo json_decode($settingsdata); ?></textarea>
											   	</div>
											   	<div class="col-md-3 col-sm-6">
											   		<p class=""><?php _e('Copy the settings to text file to save as a backup.', CS_TEXTDOMAIN); ?></p>
											   	</div>
					    					</div>
						    				<div class="form-group" >
											    <div class="col-md-2 col-sm-2">
													<p><?php _e('Import Settings:', CS_TEXTDOMAIN); ?></p>
												</div>

												<div class="col-md-7 col-sm-4">
												   	<textarea id="import-settings" class="export-import-settings" rows=10 class="form-control"></textarea>
												   	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="slider_id" id="slider_id" >
												   	<button class="button button-primary align-right" id="import-settings-btn">Import Settings</button>
												</div>

								   				<div class="col-md-3 col-sm-6">
								   					<p class=""><?php _e('Copy the settings here and click "Import Settings" button.', CS_TEXTDOMAIN); ?></p>
								   				</div>
						    				</div>
					    				</fieldset>
									</div>
								</div>
	    					<!-- End of tab  Import & export -->
	    	    			</div> <!-- End of tab-content -->
	 					</form>   

     				<input type="hidden" name="slider_id" id="slider_id" value="<?php echo $_GET['id']; ?>">

					</div>
				</div>

					<div id="dialog" class="div-dialog" title="Confirmation Required">
						<p><?php _e('Are you sure to delete this slider ?', CS_TEXTDOMAIN); ?></p>
					</div>
					<div class="container slider-settings-actions">
						<a href = "<?php echo admin_url().'admin.php?page=cyber-slider&action=view-slides&id='.$_GET['id'];?>" >
							<button type="button" class="btn btn-primary"><?php _e('Edit Slides', CS_TEXTDOMAIN); ?></button>
						</a>
						<button class="btn btn-danger delete-slider" slider-id="<?php echo $_GET['id']; ?>" redirect-url="<?php echo admin_url().'admin.php?page=cyber-slider'; ?>"><?php _e('Delete', CS_TEXTDOMAIN); ?></button>
						<a href = "<?php echo admin_url().'admin.php?page=cyber-slider'; ?>" >
						<button type="button" class="btn btn-info"><?php _e('Close', CS_TEXTDOMAIN); ?></button>
						</a>
						<button type="button" class="btn btn-success bottom-btn save-options"><?php _e('Save Settings', CS_TEXTDOMAIN); ?></button>
					</div>
				</div>
		</div> <!-- End of row -->
	</div> <!-- End of container -->
</div>
<?php
}

/**
 *
 * @New Slider submenu page callback add_new_cyber_slider
 * @hooked add_cyber_slider_menu_page
 */
function add_new_cyber_slider(){
?>
<div class = "wrap">
   	<h1><?php _e('New Slider',CS_TEXTDOMAIN); ?></h1>
</div>
<?php
}

/**
 *
 * @Edit Slider submenu page callback edit_cyber_slider
 * @hooked add_cyber_slider_menu_page
 */
function edit_cyber_slider(){
 global $wpdb;
 $slider_id = $_GET['id'];
 $sql_query = "SELECT * FROM {$wpdb->prefix}cyberslider_slides WHERE slider_id = {$slider_id}";
 $slides = $wpdb->get_results( $sql_query );
 if( !empty( $slides ) ):
?>
	<div id="dialog" class="div-dialog" title="Confirmation Required">
	   	<?php _e('Are you sure to delete this slide?', CS_TEXTDOMAIN) ?>
	</div>
<div class = "wrap">
  	<?php if ( $_GET['status'] == 'success') { ?>
   	<div id="deleteMessage" class="alert alert-success">
       Successfully Deleted
       <a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a>
   	</div>
	   <?php }

	   if ( $_GET['status'] == 'savesettings') { ?>
   		<div id="singlesuccessMessage" class="alert alert-success">
	  	 	<strong><?php _e('Success!', CS_TEXTDOMAIN);?> </strong> <?php _e('Option successfully update.', CS_TEXTDOMAIN); ?>
	  	  	<a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a>
		</div>
	<?php } ?>

	   <h1><?php _e('Slides List',CS_TEXTDOMAIN); ?>  <a href = "<?php echo admin_url().'admin.php?page=cyber-slider&view=slide&action=new&id='.$slider_id ;?>" class = "page-title-action button button-primary"><?php _e('Add New Slide',CS_TEXTDOMAIN); ?></a>
	   	 <a href="<?php echo admin_url() . 'admin.php?page=cyber-slider&action=slider-settings&id=' .$slider_id ?>" class="button button-primary page-title-action" style="float:right;"><?php _e('Slider Settings', CS_TEXTDOMAIN); ?></a>
   		</h1>
   	<table class = "widefat">
    	<thead>
		  <tr valign = "top" class = "alternate">
	       <th><?php _e('ID', CS_TEXTDOMAIN); ?></th>
	       <th><?php _e('Title', CS_TEXTDOMAIN); ?></th>
	       <th><?php _e('Image', CS_TEXTDOMAIN); ?></th>
	        <th><?php _e('Status', CS_TEXTDOMAIN); ?></th>
	       <th class="text-center"><?php _e('Actions', CS_TEXTDOMAIN); ?></th>
	      </tr>
    	</thead>
    	<?php foreach( $slides as $slide ):
    	$slide_img = unserialize($slide->settings);
     	?>
	    <thead>
	      <tr valign = "top" class = "alternate">
		    <td scope="row"><?php echo $slide->id;?></td>
		    <td><?php echo $slide->title;?></td>
		    <td><img src = "<?php echo $slide_img['slide_image']; ?>" alt = "slide-image" width = "100" height = "100" /></td>
		     <td>
		        <?php echo $slide_img['slide-state']; ?>
		      </td>

		      <td class="text-center">
		       		<button class ="btn btn-danger delete-slide" slide-id="<?php echo $slide->id; ?>" /><?php _e('Delete',CS_TEXTDOMAIN); ?></button>
		       		<a href = "<?php echo admin_url().'admin.php?page=cyber-slider&view=slide&action=edit&slider_id='.$slider_id.'&slide_id='.$slide->id; ?>" class ="btn btn-primary" /><?php _e('Edit',CS_TEXTDOMAIN); ?></a>
		      </td>
	      </tr>
	    </thead>
    	<?php endforeach;?>
   </table>
</div>
<?php else: ?>
<div class = "wrap">
	<h1>
	<div class="notice notice-error is-dismissible">
		<p><?php _e( 'Sorry No Slide(s) Found For This Slider', CS_TEXTDOMAIN ); ?></p>
	</div>
		<a href = "<?php echo admin_url().'admin.php?page=cyber-slider&view=slide&action=new&id='.$slider_id ;?>" class = "page-title-action"><?php _e('Add New Slide',CS_TEXTDOMAIN); ?></a>
	   	</h1>
</div> 
<?php endif; 
}

/**
 *
 * @New Slide submenu page callback add_new_slide
 * @hooked add_cyber_slider_menu_page
 */
function add_new_slide(){
	
		global $wpdb;
        $slide = $_GET['slide_id'];
        $sliderid = $_GET['slider_id'] ? $_GET['slider_id'] : $_GET['id'];
        $table_name = $wpdb->prefix.'cyberslider_slides';
        $numrows = $wpdb->get_row( "SELECT * FROM $table_name WHERE slider_id = $sliderid and id = $slide");
        $slide_option_settings = $numrows->settings;
        $slideoptionsetup = unserialize($slide_option_settings);
?>
<div class="wrap">
 	<form id="cs-single-slide-form" action="" method="post" class="">
 		<div style="display:none;" id="singlesuccessMessage" class="alert alert-success">
	  	 	<strong><?php _e('Success!', CS_TEXTDOMAIN);?> </strong> <?php _e('Option successfully update.', CS_TEXTDOMAIN); ?>
	  	  	<a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a>
		</div>
 		<h3><?php _e('Slide Settings',CS_TEXTDOMAIN) ?> <a href = "<?php echo admin_url().'admin.php?page=cyber-slider&view=slide&action=new&id='.$sliderid ;?>" class = "button action button-primary page-title-action"><?php _e('Add New Slide',CS_TEXTDOMAIN); ?></a></h3>
 		<input type="hidden" name="slide-status" id="status" value="<?php echo $slide; ?>">
 		<input type="hidden" name="slider-id" id="sliderid" value="<?php echo isset($sliderid) ? $sliderid : $_GET['id']; ?>">
		<table class="table">
			<tbody>
				<tr>
				    <td>
				    <?php _e('Title:', CS_TEXTDOMAIN); ?>
				    </td>
				    <td>
				       	<input type="text" size="50" name="slide-title" class="form-control" value="<?php if (isset( $numrows->title )) { echo $numrows->title; } ?>">
				    </td>
				    <td>
				    	<?php _e('Title for slide , will be show on slide', CS_TEXTDOMAIN); ?> 
				    </td>
				</tr>
				<tr>
					<td>
				    	<?php _e('State:', CS_TEXTDOMAIN); ?>
				    </td>
				   	<td>
					    <select name="slide-state" id="slide-state" class="form-control cs-settings-select">
					        <option value="publish" <?php if(isset($slideoptionsetup['slide-state'])) {if( $slideoptionsetup['slide-state'] == 'publish'){ echo "selected";}} ?> ><?php _e('Publish', CS_TEXTDOMAIN); ?></option>
							<option value="unpublish" <?php if(isset($slideoptionsetup['slide-state'])) {if( $slideoptionsetup['slide-state'] == 'unpublish'){ echo "selected";}} ?> ><?php _e('Unpublish', CS_TEXTDOMAIN); ?></option>
						</select>
					</td>
				    <td>
				        <?php _e('Set the state of slide, Publish or Unpublish', CS_TEXTDOMAIN); ?>
				    </td>
				</tr>
				<tr>
			        <td>
			        <?php _e('Slide image:', CS_TEXTDOMAIN);?>
			        </td>
			        <td>
			         <label class="radio-inline">
			          <input type="radio" name="slideradio"  id="slideimage" class="slideradio" value="sldimage" <?php if($slideoptionsetup['slideradio'] == 'sldimage'){ echo "checked";} ?>>
			            <?php _e('Use image', CS_TEXTDOMAIN); ?>
			      </label>
			      <label class="radio-inline">
			            <input type="radio" name="slideradio"  id="slidelink" class="slideradio" value="sldlink" <?php if($slideoptionsetup['slideradio'] == 'sldlink'){ echo "checked";} ?> >
			            <?php _e('Use external link', CS_TEXTDOMAIN); ?>
			         </label>

			      <div for="upload_image" id="dvslideimage" class="cs-upload-imag" style="<?php if($slideoptionsetup['slideradio'] != 'sldimage'){ echo "display: none";} ?>">
			       <input type="text" value="<?php if($slideoptionsetup['slideradio'] == 'sldimage'){ echo $slideoptionsetup['slide_image']; } ?>" size="50%" id="slide_image" class="form-control" name="<?php if($slideoptionsetup['slideradio'] == 'sldimage'){ echo "slide_image"; } ?>"> 
			       <br />
			       <input type="button" value="<?php _e('Upload Image', CS_TEXTDOMAIN); ?>" class="button upload-button-mtop" id="slide_image_upload_button">
			      </div>
			      <br />
			         <div id="dvslidelink" style="<?php if($slideoptionsetup['slideradio'] != 'sldlink'){ echo "display: none"; } ?>" class="cs-upload-imag">
			       <input type="text" value="<?php if($slideoptionsetup['slideradio'] == 'sldlink'){ echo $slideoptionsetup['slide_image']; } ?>" placeholder="<?php _e('Enter url for external image', CS_TEXTDOMAIN); ?>" size="50%" id="slide_ext_link" class="form-control" name="<?php if($slideoptionsetup['slideradio'] == 'sldlink'){ echo "slide_image"; } ?>" />
			      </div>
			        </td>
			        <td>
			           <?php _e('Upload image or use external link for image'); ?>
			        </td>
			    </tr>
			    <tr>
			        <td>
			         <?php _e('Thumbnail image:', CS_TEXTDOMAIN);?>
			        </td>
			        <td>
			           <input type="radio" name="rdoslide-thumbnail" class="slide-thumbnail" id="slidethumbnailimage" value="slidethumbnailimage" <?php if($slideoptionsetup['rdoslide-thumbnail'] == 'slidethumbnailimage'){ echo "checked";} ?> >
			           <?php _e('Use image', CS_TEXTDOMAIN); ?>
			           <input type="radio" name="rdoslide-thumbnail" class="slide-thumbnail" id="slidethumbnaillink" value="slidethumbnaillink" <?php if($slideoptionsetup['rdoslide-thumbnail'] == 'slidethumbnaillink'){ echo "checked";} ?>>
			           <?php _e('Use external link', CS_TEXTDOMAIN); ?>
			           <br />
			      <div id="dvslidethumbnailimage" class="cs-upload-imag" style="<?php if($slideoptionsetup['rdoslide-thumbnail'] != 'slidethumbnailimage'){ echo "display: none";} ?>">
			       <input type="text" value="<?php if($slideoptionsetup['rdoslide-thumbnail'] == 'slidethumbnailimage'){ echo $slideoptionsetup['slide-thumbnail']; } ?>" size="50%" id="slide_thumbnail" class="form-control" name="<?php if($slideoptionsetup['rdoslide-thumbnail'] == 'slidethumbnailimage'){ echo "slide-thumbnail"; } ?>" > 
			       <br />
			       <input type="button" value="<?php _e('Upload Image', CS_TEXTDOMAIN); ?>" class="button upload-button-mtop" id="slide_thumbnail_upload_button">
			      </div>
			       <br />
			           <div id="dvslidethumbnaillink" style="<?php if($slideoptionsetup['rdoslide-thumbnail'] != 'slidethumbnaillink'){ echo "display: none";} ?>">
			          <input type="text" value="<?php if($slideoptionsetup['rdoslide-thumbnail'] == 'slidethumbnaillink'){ echo $slideoptionsetup['slide_thumbnail']; } ?>" placeholder="<?php _e('Enter url for external thumbnail', CS_TEXTDOMAIN) ?>" size="50%" class="form-control" id="slide_thumbnail_link" name="<?php if($slideoptionsetup['rdoslide-thumbnail'] == 'slidethumbnaillink'){ echo "slide_thumbnail"; } ?>" />
			      </div>
			           </td>
			        <td>
			           <?php _e('Upload image or use external link for thumbnail'); ?>
			        </td>
			    </tr>
				<tr>
				    <td>
				      	<?php _e('Link:', CS_TEXTDOMAIN);?>
				    </td>
				    <td>
				      	<input type="text" size="50" name="slide-link" class="form-control" placeholder="<?php _e('Enter link for slide', CS_TEXTDOMAIN) ?>" value="<?php if(isset($slideoptionsetup['slide-link'])){ echo $slideoptionsetup['slide-link']; } ?>">
				    </td>
				    <td>
				      	<select name="slide-linkoption" id="slide-linkoption" class="cs-settings-select form-control cs-single-select">
					        <option value="_blank" <?php if(isset($slideoptionsetup['slide-linkoptionk'])) {if( $slideoptionsetup['slide-linkoptionk'] == '_blank'){ echo "selected";}} ?>><?php _e('Blank', CS_TEXTDOMAIN); ?></option>
							<option value="_self" <?php if(isset($slideoptionsetup['slide-linkoptionk'])) {if( $slideoptionsetup['slide-linkoptionk'] == '_self'){ echo "selected";}} ?>><?php _e('Self', CS_TEXTDOMAIN); ?></option>
							<option value="_parent" <?php if(isset($slideoptionsetup['slide-linkoptionk'])) {if( $slideoptionsetup['slide-linkoptionk'] == '_parent'){ echo "selected";}} ?>><?php _e('Parent', CS_TEXTDOMAIN); ?></option>
							<option value="_top" <?php if(isset($slideoptionsetup['slide-linkoptionk'])) {if( $slideoptionsetup['slide-linkoptionk'] == '_top'){ echo "selected";}} ?>><?php _e('Top', CS_TEXTDOMAIN); ?></option>
						</select>
						<br />
						<?php _e('Select option for link'); ?>
				    </td>
				</tr>
				<tr>
				<td>Custom ID/Class:</td>
				<td>
					<input type="text" value="<?php if(isset($slideoptionsetup['customid'])){ echo $slideoptionsetup['customid']; } ?>" name="customid" placeholder="<?php _e('id', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input">
						<input type="text" value="<?php if(isset($slideoptionsetup['customclass'])){ echo $slideoptionsetup['customclass']; } ?>" name="customclass" placeholder="<?php _e('class', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input">
						</td>
						<td>Custom class id for slides</td>
					</tr>
				<tr>
					<td>
				      	<?php _e('Text Or Caption:', CS_TEXTDOMAIN) ?>
				    </td>
					<td>
				   		<textarea name="slide-caption" id="slide-caption" rows="2" cols="30" class="form-control"><?php if(isset($slideoptionsetup['slide-caption'])){ echo $slideoptionsetup['slide-caption']; } ?></textarea>
				    </td>
				    <td>
				      	<?php _e('Enter caption for slide. Will be display on slide', CS_TEXTDOMAIN); ?>
				    </td>
				</tr>

				<tr>
				</tr>
					<td>
				      	<?php _e('Text Style:', CS_TEXTDOMAIN) ?>
				    </td>
				   		<td>
				   			<?php  ?>
				    	<label for="h1" class="radio-inline">
				    		<input type="radio" <?php if(isset($slideoptionsetup['text_radio']) && $slideoptionsetup['text_radio']=='h1'){ echo "checked"; } ?> name="text_radio"  id="text_radio_h1" class="slideradio" value="h1">
					      	h1
						</label>
						<label for="h2" class="radio-inline">
					      	<input type="radio" <?php if(isset($slideoptionsetup['text_radio']) && $slideoptionsetup['text_radio']=='h2'){ echo "checked"; } ?> name="text_radio"  id="text_radio_h2" class="slideradio" value="h2">
					      	h2
					    </label>
					    <label  for="h3" class="radio-inline">
					      	<input type="radio" <?php if(isset($slideoptionsetup['text_radio']) && $slideoptionsetup['text_radio']=='h3'){ echo "checked"; } ?> name="text_radio"  id="text_radio_h3" class="slideradio" value="h3">
					      	h3
					    </label>
					    <label for="h4" class="radio-inline">
					      	<input type="radio" <?php if(isset($slideoptionsetup['text_radio']) && $slideoptionsetup['text_radio']=='h4'){ echo "checked"; } ?> name="text_radio"  id="text_radio_h4" class="slideradio" value="h4">
					      	h4
					    </label>
					    <label for="h5" class="radio-inline">
					      	<input type="radio" <?php if(isset($slideoptionsetup['text_radio']) && $slideoptionsetup['text_radio']=='h5'){ echo "checked"; } ?> name="text_radio"  id="text_radio_h5" class="slideradio" value="h5">
					      	h5
					    </label>
					    <label for="h6" class="radio-inline">
					      	<input type="radio" <?php if(isset($slideoptionsetup['text_radio']) && $slideoptionsetup['text_radio']=='h6'){ echo "checked"; } ?> name="text_radio"  id="text_radio_h6" class="slideradio" value="h6">
					      	h6
					    </label>
					     <label for="p" class="radio-inline">
					      	<input type="radio" <?php if(isset($slideoptionsetup['text_radio']) && $slideoptionsetup['text_radio']=='p'){ echo "checked"; } ?> name="text_radio"  id="text_radio_p" class="slideradio" value="p">
					      	p
					    </label>

				    </td>
				    <td>
				      	<?php _e('Select any Style for the Text or Caption', CS_TEXTDOMAIN); ?>
				    </td>
				</tr>

					<tr>
					<td>
				      	<?php _e('Text Size:', CS_TEXTDOMAIN) ?>
				    </td>
				    <td>
				    <div class="col-md-6 col-sm-12 row">
				      	<select name="text_size" class="form-control">
							<option value="14" <?php if($slideoptionsetup['text_size'] == '14' ) echo "selected"; ?>>14</option>
							<option value="15" <?php if($slideoptionsetup['text_size'] == '15' ) echo "selected"; ?>>15</option>
							<option value="16" <?php if($slideoptionsetup['text_size'] == '16' ) echo "selected"; ?>>16</option>
							<option valu17e="17" <?php if($slideoptionsetup['text_size'] == '17' ) echo "selected"; ?>>17</option>
							<option value="18" <?php if($slideoptionsetup['text_size'] == '18' ) echo "selected"; ?>>18</option>
							<option value="19" <?php if($slideoptionsetup['text_size'] == '1924' ) echo "selected"; ?>>19</option>
							<option value="20" <?php if($slideoptionsetup['text_size'] == '20' ) echo "selected"; ?>>20</option>
							<option value="21" <?php if($slideoptionsetup['text_size'] == '21' ) echo "selected"; ?>>21</option>
							<option value="22" <?php if($slideoptionsetup['text_size'] == '22' ) echo "selected"; ?>>22</option>
							<option value="23" <?php if($slideoptionsetup['text_size'] == '23' ) echo "selected"; ?>>23</option>
							<option value="24" <?php if($slideoptionsetup['text_size'] == '24' ) echo "selected"; ?>>24</option>
							<option value="25" <?php if($slideoptionsetup['text_size'] == '25' ) echo "selected"; ?>>25</option>
							<option value="26" <?php if($slideoptionsetup['text_size'] == '26' ) echo "selected"; ?>>26</option>
							<option value="27" <?php if($slideoptionsetup['text_size'] == '27' ) echo "selected"; ?>>27</option>
							<option value="28" <?php if($slideoptionsetup['text_size'] == '28' ) echo "selected"; ?>>28</option>
							<option value="29" <?php if($slideoptionsetup['text_size'] == '29' ) echo "selected"; ?>>29</option>
							<option value="30" <?php if($slideoptionsetup['text_size'] == '30' ) echo "selected"; ?>>30</option>
							<option value="31" <?php if($slideoptionsetup['text_size'] == '31' ) echo "selected"; ?>>31</option>
							<option value="32" <?php if($slideoptionsetup['text_size'] == '32' ) echo "selected"; ?>>32</option>
							<option value="33" <?php if($slideoptionsetup['text_size'] == '33' ) echo "selected"; ?>>33</option>
							<option value="34" <?php if($slideoptionsetup['text_size'] == '34' ) echo "selected"; ?>>34</option>
							<option value="35" <?php if($slideoptionsetup['text_size'] == '35' ) echo "selected"; ?>>35</option>
							<option value="36" <?php if($slideoptionsetup['text_size'] == '36' ) echo "selected"; ?>>36</option>
							<option value="37" <?php if($slideoptionsetup['text_size'] == '37' ) echo "selected"; ?>>37</option>
							<option value="38" <?php if($slideoptionsetup['text_size'] == '38' ) echo "selected"; ?>>38</option>
							<option value="39" <?php if($slideoptionsetup['text_size'] == '39' ) echo "selected"; ?>>39</option>
							<option value="40" <?php if($slideoptionsetup['text_size'] == '40' ) echo "selected"; ?>>40</option>

						</select>
					</div>

				    </td>
				    <td>
				      	<?php _e('Select font Size  ', CS_TEXTDOMAIN); ?>
				    </td>
				</tr>
				<tr>
				<td>Font Color: </td>
					<td>
						<div class="col-md-6 col-sm-12 row">
									<label for="h1">
							    		<input type="text" name="caption-color" class="form-control" id="caption-color" value="<?php if($slideoptionsetup['caption-color']){ echo $slideoptionsetup['caption-color']; }else{ echo 'rgb(0,0,255)'; } ?>" style="background: <?php if($slideoptionsetup['caption-color']){ echo $slideoptionsetup['caption-color']; }else{ echo 'rgb(0,0,255)'; } ?>" placeholder="text color">
							
									</label>
								</div>
					</td>
					<td>Select Font Color</td>
				</tr>
					<tr>
				<td>Text Animation:</td>
					<td>
					<div class="col-md-6 col-sm-12 row">
					  <select class="caption-animation form-control" name="caption-animation">
			          <option value="bounce" <?php if($slideoptionsetup['caption-animation'] == 'bounce' ) echo "selected"; ?>>bounce</option>
			          <option value="flash" <?php if($slideoptionsetup['caption-animation'] == 'flash' ) echo "selected"; ?>>flash</option>
			          <option value="pulse" <?php if($slideoptionsetup['caption-animation'] == 'pulse' ) echo "selected"; ?>>pulse</option>
			          <option value="rubberBand" <?php if($slideoptionsetup['caption-animation'] == 'rubberBand' ) echo "selected"; ?>>rubberBand</option>
			          <option value="shake" <?php if($slideoptionsetup['caption-animation'] == 'shake' ) echo "selected"; ?>>shake</option>
			          <option value="swing" <?php if($slideoptionsetup['caption-animation'] == 'swing' ) echo "selected"; ?>>swing</option>
			          <option value="tada" <?php if($slideoptionsetup['caption-animation'] == 'tada' ) echo "selected"; ?>>tada</option>
			          <option value="wobble" <?php if($slideoptionsetup['caption-animation'] == 'wobble' ) echo "selected"; ?>>wobble</option>
			          <option value="jello" <?php if($slideoptionsetup['caption-animation'] == 'jello' ) echo "selected"; ?>>jello</option>
			          <option value="bounceIn" <?php if($slideoptionsetup['caption-animation'] == 'bounceIn' ) echo "selected"; ?>>bounceIn</option>
			          <option value="bounceInDown" <?php if($slideoptionsetup['caption-animation'] == 'bounceInDown' ) echo "selected"; ?>>bounceInDown</option>
			          <option value="bounceInLeft" <?php if($slideoptionsetup['caption-animation'] == 'bounceInLeft' ) echo "selected"; ?>>bounceInLeft</option>
			          <option value="bounceInRight" <?php if($slideoptionsetup['caption-animation'] == 'bounceInRight' ) echo "selected"; ?>>bounceInRight</option>
			          <option value="bounceInUp" <?php if($slideoptionsetup['caption-animation'] == 'bounceInUp' ) echo "selected"; ?>>bounceInUp</option>
			          <option value="bounceOut" <?php if($slideoptionsetup['caption-animation'] == 'bounceOut' ) echo "selected"; ?>>bounceOut</option>
			          <option value="bounceOutDown" <?php if($slideoptionsetup['caption-animation'] == 'bounceOutDown' ) echo "selected"; ?>>bounceOutDown</option>
			          <option value="bounceOutLeft" <?php if($slideoptionsetup['caption-animation'] == 'bounceOutLeft' ) echo "selected"; ?>>bounceOutLeft</option>
			          <option value="bounceOutRight" <?php if($slideoptionsetup['caption-animation'] == 'bounceOutRight' ) echo "selected"; ?>>bounceOutRight</option>
			          <option value="bounceOutUp" <?php if($slideoptionsetup['caption-animation'] == 'bounceOutUp' ) echo "selected"; ?>>bounceOutUp</option>
			          <option value="fadeIn" <?php if($slideoptionsetup['caption-animation'] == 'fadeIn' ) echo "selected"; ?>>fadeIn</option>
			          <option value="fadeInDown" <?php if($slideoptionsetup['caption-animation'] == 'fadeInDown' ) echo "selected"; ?>>fadeInDown</option>
			          <option value="fadeInDownBig" <?php if($slideoptionsetup['caption-animation'] == 'fadeInDownBig' ) echo "selected"; ?>>fadeInDownBig</option>
			          <option value="fadeInLeft" <?php if($slideoptionsetup['caption-animation'] == 'fadeInLeft' ) echo "selected"; ?>>fadeInLeft</option>
			          <option value="fadeInLeftBig" <?php if($slideoptionsetup['caption-animation'] == 'fadeInLeftBig' ) echo "selected"; ?>>fadeInLeftBig</option>
			          <option value="fadeInRight" <?php if($slideoptionsetup['caption-animation'] == 'fadeInRight' ) echo "selected"; ?>>fadeInRight</option>
			          <option value="fadeInRightBig" <?php if($slideoptionsetup['caption-animation'] == 'fadeInRightBig' ) echo "selected"; ?>>fadeInRightBig</option>
			          <option value="fadeInUp" <?php if($slideoptionsetup['caption-animation'] == 'fadeInUp' ) echo "selected"; ?>>fadeInUp</option>
			          <option value="fadeInUpBig" <?php if($slideoptionsetup['caption-animation'] == 'fadeInUpBig' ) echo "selected"; ?>>fadeInUpBig</option>
			          <option value="fadeOut" <?php if($slideoptionsetup['caption-animation'] == 'fadeOut' ) echo "selected"; ?>>fadeOut</option>
			          <option value="fadeOutDown" <?php if($slideoptionsetup['caption-animation'] == 'fadeOutDown' ) echo "selected"; ?>>fadeOutDown</option>
			          <option value="fadeOutDownBig" <?php if($slideoptionsetup['caption-animation'] == 'fadeOutDownBig' ) echo "selected"; ?>>fadeOutDownBig</option>
			          <option value="fadeOutLeft" <?php if($slideoptionsetup['caption-animation'] == 'fadeOutLeft' ) echo "selected"; ?>>fadeOutLeft</option>
			          <option value="fadeOutLeftBig" <?php if($slideoptionsetup['caption-animation'] == 'fadeOutLeftBig' ) echo "selected"; ?>>fadeOutLeftBig</option>
			          <option value="fadeOutRight" <?php if($slideoptionsetup['caption-animation'] == 'fadeOutRight' ) echo "selected"; ?>>fadeOutRight</option>
			          <option value="fadeOutRightBig" <?php if($slideoptionsetup['caption-animation'] == 'fadeOutRightBig' ) echo "selected"; ?>>fadeOutRightBig</option>
			          <option value="fadeOutUp" <?php if($slideoptionsetup['caption-animation'] == 'fadeOutUp' ) echo "selected"; ?>>fadeOutUp</option>
			          <option value="fadeOutUpBig" <?php if($slideoptionsetup['caption-animation'] == 'fadeOutUpBig' ) echo "selected"; ?>>fadeOutUpBig</option>
			          <option value="flip" <?php if($slideoptionsetup['caption-animation'] == 'flip' ) echo "selected"; ?>>flip</option>
			          <option value="flipInX" <?php if($slideoptionsetup['caption-animation'] == 'flipInX' ) echo "selected"; ?>>flipInX</option>
			          <option value="flipInY" <?php if($slideoptionsetup['caption-animation'] == 'flipInY' ) echo "selected"; ?>>flipInY</option>
			          <option value="flipOutX" <?php if($slideoptionsetup['caption-animation'] == 'flipOutX' ) echo "selected"; ?>>flipOutX</option>
			          <option value="flipOutY" <?php if($slideoptionsetup['caption-animation'] == 'flipOutY' ) echo "selected"; ?>>flipOutY</option>
			          <option value="lightSpeedIn" <?php if($slideoptionsetup['caption-animation'] == 'lightSpeedIn' ) echo "selected"; ?>>lightSpeedIn</option>
			          <option value="lightSpeedOut" <?php if($slideoptionsetup['caption-animation'] == 'lightSpeedOut' ) echo "selected"; ?>>lightSpeedOut</option>
			          <option value="rotateIn" <?php if($slideoptionsetup['caption-animation'] == 'rotateIn' ) echo "selected"; ?>>rotateIn</option>
			          <option value="rotateInDownLeft" <?php if($slideoptionsetup['caption-animation'] == 'rotateInDownLeft' ) echo "selected"; ?>>rotateInDownLeft</option>
			          <option value="rotateInDownRight" <?php if($slideoptionsetup['caption-animation'] == 'rotateInDownRight' ) echo "selected"; ?>>rotateInDownRight</option>
			          <option value="rotateInUpLeft" <?php if($slideoptionsetup['caption-animation'] == 'rotateInUpLeft' ) echo "selected"; ?>>rotateInUpLeft</option>
			          <option value="rotateInUpRight" <?php if($slideoptionsetup['caption-animation'] == 'rotateInUpRight' ) echo "selected"; ?>>rotateInUpRight</option>
			          <option value="rotateOut" <?php if($slideoptionsetup['caption-animation'] == 'rotateOut' ) echo "selected"; ?>>rotateOut</option>
			          <option value="rotateOutDownLeft" <?php if($slideoptionsetup['caption-animation'] == 'rotateOutDownLeft' ) echo "selected"; ?>>rotateOutDownLeft</option>
			          <option value="rotateOutDownRight" <?php if($slideoptionsetup['caption-animation'] == 'rotateOutDownRight' ) echo "selected"; ?>>rotateOutDownRight</option>
			          <option value="rotateOutUpLeft" <?php if($slideoptionsetup['caption-animation'] == 'rotateOutUpLeft' ) echo "selected"; ?>>rotateOutUpLeft</option>
			          <option value="rotateOutUpRight" <?php if($slideoptionsetup['caption-animation'] == 'rotateOutUpRight' ) echo "selected"; ?>>rotateOutUpRight</option>
			          <option value="slideInUp" <?php if($slideoptionsetup['caption-animation'] == 'slideInUp' ) echo "selected"; ?>>slideInUp</option>
			          <option value="slideInDown" <?php if($slideoptionsetup['caption-animation'] == 'slideInDown' ) echo "selected"; ?>>slideInDown</option>
			          <option value="slideInLeft" <?php if($slideoptionsetup['caption-animation'] == 'slideInLeft' ) echo "selected"; ?>>slideInLeft</option>
			          <option value="slideInRight" <?php if($slideoptionsetup['caption-animation'] == 'slideInRight' ) echo "selected"; ?>>slideInRight</option>
			          <option value="slideOutUp" <?php if($slideoptionsetup['caption-animation'] == 'slideOutUp' ) echo "selected"; ?>>slideOutUp</option>
			          <option value="slideOutDown" <?php if($slideoptionsetup['caption-animation'] == 'slideOutDown' ) echo "selected"; ?>>slideOutDown</option>
			          <option value="slideOutLeft" <?php if($slideoptionsetup['caption-animation'] == 'slideOutLeft' ) echo "selected"; ?>>slideOutLeft</option>
			          <option value="slideOutRight" <?php if($slideoptionsetup['caption-animation'] == 'slideOutRight' ) echo "selected"; ?>>slideOutRight</option>
			          <option value="zoomIn" <?php if($slideoptionsetup['caption-animation'] == 'zoomIn' ) echo "selected"; ?>>zoomIn</option>
			          <option value="zoomInDown" <?php if($slideoptionsetup['caption-animation'] == 'zoomInDown' ) echo "selected"; ?>>zoomInDown</option>
			          <option value="zoomInLeft" <?php if($slideoptionsetup['caption-animation'] == 'zoomInLeft' ) echo "selected"; ?>>zoomInLeft</option>
			          <option value="zoomInRight" <?php if($slideoptionsetup['caption-animation'] == 'zoomInRight' ) echo "selected"; ?>>zoomInRight</option>
			          <option value="zoomInUp" <?php if($slideoptionsetup['caption-animation'] == 'zoomInUp' ) echo "selected"; ?>>zoomInUp</option>
			          <option value="zoomOut" <?php if($slideoptionsetup['caption-animation'] == 'zoomOut' ) echo "selected"; ?>>zoomOut</option>
			          <option value="zoomOutDown" <?php if($slideoptionsetup['caption-animation'] == 'zoomOutDown' ) echo "selected"; ?>>zoomOutDown</option>
			          <option value="zoomOutLeft" <?php if($slideoptionsetup['caption-animation'] == 'zoomOutLeft' ) echo "selected"; ?>>zoomOutLeft</option>
			          <option value="zoomOutRight" <?php if($slideoptionsetup['caption-animation'] == 'zoomOutRight' ) echo "selected"; ?>>zoomOutRight</option>
			          <option value="zoomOutUp" <?php if($slideoptionsetup['caption-animation'] == 'zoomOutUp' ) echo "selected"; ?>>zoomOutUp</option>
			          <option value="hinge" <?php if($slideoptionsetup['caption-animation'] == 'hinge' ) echo "selected"; ?>>hinge</option>
			          <option value="rollIn" <?php if($slideoptionsetup['caption-animation'] == 'rollIn' ) echo "selected"; ?>>rollIn</option>
			          <option value="rollOut" <?php if($slideoptionsetup['caption-animation'] == 'rollOut' ) echo "selected"; ?>>rollOut</option>
      		</select>
      		</div>
					</td>
					<td>Select Animation for Text or Caption.</td>
				</tr>
				<tr>
				    <td>
				      	<?php _e('Style:', CS_TEXTDOMAIN); ?>
				    </td>
				    <td>
						    <?php _e('Padding:(in px or %)', CS_TEXTDOMAIN); ?>
						    <br />
						<input type="text" value="<?php if(isset($slideoptionsetup['padding-top'])){ echo $slideoptionsetup['padding-top']; } ?>" name="padding-top" placeholder="<?php _e('top [0px]', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input-padding">
						<input type="text" value="<?php if(isset($slideoptionsetup['padding-right'])){ echo $slideoptionsetup['padding-right']; } ?>" name="padding-right" placeholder="<?php _e('right [0px]', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input-padding">
						<input type="text" value="<?php if(isset($slideoptionsetup['padding-bottom'])){ echo $slideoptionsetup['padding-bottom']; } ?>" name="padding-bottom" placeholder="<?php _e('bottom [0px]', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input-padding">
						<input type="text" value="<?php if(isset($slideoptionsetup['padding-left'])){ echo $slideoptionsetup['padding-left']; } ?>" name="padding-left" placeholder="<?php _e('left [0px]', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input-padding">
							<br />
							<?php _e('Margin:(in px or %)', CS_TEXTDOMAIN); ?>
							    <br />
						<input type="text" value="<?php if(isset($slideoptionsetup['margin-top'])){ echo $slideoptionsetup['margin-top']; } ?>" name="margin-top" placeholder="<?php _e('top [0px]', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input-padding">
						<input type="text" value="<?php if(isset($slideoptionsetup['margin-right'])){ echo $slideoptionsetup['margin-right']; } ?>" name="margin-right" placeholder="<?php _e('right [0px]', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input-padding">
						<input type="text" value="<?php if(isset($slideoptionsetup['margin-bottom'])){ echo $slideoptionsetup['margin-bottom']; } ?>" name="margin-bottom" placeholder="<?php _e('bottom [0px]', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input-padding">
						<input type="text" value="<?php if(isset($slideoptionsetup['margin-left'])){ echo $slideoptionsetup['margin-left']; } ?>" name="margin-left" placeholder="<?php _e('left [0px]', CS_TEXTDOMAIN); ?>" class="form-control cs-single-input-padding">
							<br />			
					</td>
				    <td>
				      	<?php _e('Enter padding and margin( in px or % ) for Caption, and also use custom id and class', CS_TEXTDOMAIN); ?>
				    </td>
				</tr>

				    <td>
				    	<a href="<?php echo admin_url() . 'admin.php?page=cyber-slider&action=view-slides&id='.$sliderid; ?>" class="btn btn-info" ><?php _e('View Slides', CS_TEXTDOMAIN); ?></button>
					</td>
				    <td></td>
				    <td>
				    <button type="submit" redirect-url="<?php echo admin_url() . 'admin.php?page=cyber-slider&action=view-slides&id='.$sliderid; ?>" class="button action button-primary align-right" id="cs-singleslide-option"><?php _e('Save Settings', CS_TEXTDOMAIN); ?></button>
				   	</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>	
<?php }
/**** Add new Slider *****/
function add_new_slider()
{
?>
<div class = "wrap">
	<h1><?php _e('Add New Slider',CS_TEXTDOMAIN); ?></h1>
   		<form id="cs-single-slide-form" action="<?php echo admin_url().'admin.php?page=cyber-slider&action=save-slider'; ?>" method="post" class="">
 		   	<table class="table wrap" >
 		   		<tbody align="left" class="tbodyslide">
				    <tr>
				      	<td>
				      		<?php _e('Enter Slider Title', CS_TEXTDOMAIN); ?>
				      	</td>
				      	<td>
			        		<input type="text" size="50" name="slider-title" class="" value="<?php if (isset( $numrows->title )) { echo $numrows->title; } ?>">
			       		 </td>
				    </tr>
				    <tr>
				        <td>
				        </td>
				        <td>
				        	<input type="submit" class="button button-primary action" id="" value="<?php _e('Create Slider', CS_TEXTDOMAIN); ?>">
				        </td>
				    </tr>
				</tbody>

				<tfoot>
					<tr>
						<td colspan=2></td>
					</tr>
				</tfoot>

			</table>
		</form>
</div>

<div class="cyber-slider-instruction">
	<h3><?php _e('Instructions :', CS_TEXTDOMAIN); ?></h3>
		<ul>
			<li><?php _e('Create a new Slider. Enter the Slider Title and click "CREATE SLIDER".', CS_TEXTDOMAIN); ?></li>
			<li><?php _e('You will be redirected to settings page. You will find different tabs (i.e Usage, General settings, Thumbnail Settings etc).', CS_TEXTDOMAIN); ?></li>
			<li><?php _e('Change the settings according to the requirement and click "SAVE SETTINGS".', CS_TEXTDOMAIN); ?></li>
			<li><?php _e('To add SLIDES to the slider. Click on "EDIT SLIDES" on "SETTINGS" page or go to "Cyber Slider" page and click on "EDIT" button next to the "SETTINGS" button.', CS_TEXTDOMAIN); ?></li>
			<li><?php _e('Click on "ADD NEW SLIDE" button to add slide.', CS_TEXTDOMAIN); ?></li>
			<li><?php _e('Enter the TITLE, IMAGE, THUMBNAIL, CAPTION etc and click on "SAVE SETTINGS".', CS_TEXTDOMAIN); ?></li>
			<li><?php _e('To show the slider on frontend. Copy the shortcode from "Settings -> Usage" tab or click on "CYBER SLIDER" on left menu. You can add the shortcode direct from the page editor.', CS_TEXTDOMAIN); ?></li>
			<li><?php _e('Thats it! enjoy -:)', CS_TEXTDOMAIN); ?></li>
		</ul>
</div>
<?php 
}

/**
 *
 * @Add new slider( Save information of slider )
 * @hooked save slider 
 */
 function save_slider(){
    global $wpdb;
	
    $slidertitle = $_POST['slider-title'];
    $authorid = '1';
    $data = array(
            'name' => $slidertitle,
            'author' => $authorid, 
            'settings' => 'settings',
            'date_created' => date("Y-m-d h:i:sa")
            );

 	$wpdb->insert( $wpdb->prefix.'cyberslider', $data);
  	$slide_id = $wpdb->insert_id;
  	$location =  admin_url().'admin.php?page=cyber-slider&action=slider-settings&id='.$slide_id;
  	wp_redirect( $location );
  	exit;
}