<div class="wrap">
    <h2><?php echo $this->plugin->displayName; ?> &raquo; <?php esc_html_e( 'Settings', 'grabar' ); ?></h2>

    <?php
    if ( isset( $this->message ) ) {
        ?>
        <div class="updated fade"><p><?php echo $this->message; ?></p></div>
        <?php
    }
    if ( isset( $this->errorMessage ) ) {
        ?>
        <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>
        <?php
    }
    ?>
		<style>
			
			p label{
				font-size:16px;
			}
			#post-body-content{
				min-width:900px !important;
				font-family: Multi, sans-serif;

			}
			.post-box{
				padding:20px;
			}
			h3.hndle{
				color: #202020;
				font-size:20px !important;
				margin-top:20px !important;
			}
			.hndle img{
				vertical-align: middle;
    		margin-bottom: 5px;
    		margin-right:15px;
			}
			.tophr{
				color:#CCC;
				margin:10px 14px;
			}
			label{
				color: #202020;
				font-weight:bold;
			}
			input[type=text],input[type=number]{
				border: 1px solid var(---cccccc-border-outline);
				border: 1px solid #CCCCCC;
				border-radius: 7px;
				height:45px;
				margin-top:10px;
			}
			select{
				color: #7B7B7B !important;
				height:45px;
				font-size:18px !important;
				border-radius: 7px !important;
			}
			.subText{
				margin:5px 0;
				color:#707070;
			}
			p{
				color: #707070;
			}
			.customBox{
				border:1px solid black;
				border-radius: 15px;
				background-color: #E2E2E2;
				padding:10px;
			}
			#grabar_button_code{
				background-color:#F8F8F8;
				border-radius: 7px !important;
			}
			.addCodeDesc{
				color:#202020;
				font-size:14px;
			}
			.sideBox{
				border: 1px solid var(---cccccc-border-outline);
				background: #FFFFFF 0% 0% no-repeat padding-box;
				box-shadow: 0px 3px 20px #00000029;
				border: 1px solid #CCCCCC;
				border-radius: 7px;
			}
			.button{
				width:151px;
				height:46px;
				font-size:18px;
			}
		</style>
    <div id="poststuff">
    	<div id="post-body" class="metabox-holder columns-2">
    		<!-- Content -->
    		<div id="post-body-content">
				<div id="normal-sortables" class="meta-box-sortables ui-sortable">
	                <div class="postbox">
	                    <h3 class="hndle"><img src="<?php echo GRABAR_PLUGIN_URL;?>include/images/cog.png"><?php esc_html_e( 'Edit GRAB AR Settings', 'grabar' ); ?></h3>
											<hr class="tophr"/>
	                    <div class="inside">
		                    <form onchange="GrabAR_SubmitMsg();" name="GrabAR_SettingsForm" action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
		                    	<p>
		                    		<label for="grabar_product_url"><?php esc_html_e( 'Overwrite Product URL', 'grabar' ); ?></label>
		                    		&nbsp;&nbsp;&nbsp;<input type="text" id="grabar_product_url" name="grabar_product_url" class="widefat" style="width:500px;" value="<?php echo $this->settings['grabar_product_url']; ?>">
						       					<br><?php
															esc_html_e( 'By default, the View Details in the GRAB AR App points to the Image source link. Only change if you want to specify another link', 'grabar' );
													?>
													</p>
		                    	<p>
		                    		<label for="grabar_side_button"><strong><?php esc_html_e( 'Use Sticky Side Button', 'grabar' ); ?></strong></label>
		                    		&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="GrabAR_click_side_button();" id="grabar_side_button" name="grabar_side_button" class="widefat" value="1"<?php if($this->settings['grabar_side_button']) echo " checked"; ?>>
									&nbsp;&nbsp;(<?php
											esc_html_e( 'This will use a sticky button on the side of the browser', 'grabar' );
									?>)
		                    	</p>
		                    	
		                    	<p>
		                    		<label for="grabar_side_button_positon"><strong><?php esc_html_e( 'Side Button Position', 'grabar' ); ?></strong></label>
		                    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="grabar_side_button_position" name="grabar_side_button_position" style="width:155px;" disabled >
		                    			<option value="-right-center" <?php if($this->settings['grabar_side_button_position'] == '-right-center') echo " selected"; ?>><?php esc_html_e( 'Right Center', 'grabar' ); ?></option>
		                    			<option value="-right-top" <?php if($this->settings['grabar_side_button_position'] == '-right-top') echo " selected"; ?>><?php esc_html_e( 'Right Top', 'grabar' ); ?></option>
		                    			<option value="-right-bottom" <?php if($this->settings['grabar_side_button_position'] == '-right-bottom') echo " selected"; ?>><?php esc_html_e( 'Right Bottom', 'grabar' ); ?></option>
		                    			<option value="-left-center" <?php if($this->settings['grabar_side_button_position'] == '-left-center') echo " selected"; ?>><?php esc_html_e( 'Left Center', 'grabar' ); ?></option>
		                    			<option value="-left-top" <?php if($this->settings['grabar_side_button_position'] == '-left-top') echo " selected"; ?>><?php esc_html_e( 'Left Top', 'grabar' ); ?></option>
		                    			<option value="-left-bottom" <?php if($this->settings['grabar_side_button_position'] == '-left-bottom') echo " selected"; ?>><?php esc_html_e( 'Left Bottom', 'grabar' ); ?></option>
		                    		</select>
									&nbsp;&nbsp;(<?php
											esc_html_e( 'This will position of the side button', 'grabar' );
									?>)
		                    	</p>
		                    	
		                    	<p>
		                    		<label for="grabar_btn_width"><strong><?php esc_html_e( 'Button Image Width', 'grabar' ); ?></strong></label>
		                    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" id="grabar_btn_width" name="grabar_btn_width" class="widefat" style="width:100px;" value="<?php echo $this->settings['grabar_btn_width']; ?>"> px
									&nbsp;&nbsp;(<?php
											esc_html_e( 'This will set the Image width of the button', 'grabar' );
									?>)
		                    	</p>
		                    	
		                    	<p>
		                    		<label for="grabar_btn_color"><strong><?php esc_html_e( 'Button Image Color', 'grabar' ); ?></strong></label>
		                    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="grabar_btn_color" name="grabar_btn_color" style="width:155px;" >
		                    			<option value="green" <?php if($this->settings['grabar_btn_color'] == 'black') echo " selected"; ?>><?php esc_html_e( 'Black Background', 'grabar' ); ?></option>
		                    			<option value="white" <?php if($this->settings['grabar_btn_color'] == 'white') echo " selected"; ?>><?php esc_html_e( 'White Background', 'grabar' ); ?></option>
		                    		</select>
									&nbsp;&nbsp;(<?php
											esc_html_e( 'This will set the Image color of the button', 'grabar' );
									?>)
		                    	</p>
													<p>
		                    		<label for="grabar_custom_btn"><strong><?php esc_html_e( 'Custom Button Image', 'grabar' ); ?></strong></label>
		                    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="grabar_custom_btn" name="grabar_custom_btn" class="widefat" style="width:500px;" value="<?php echo $this->settings['grabar_custom_btn']; ?>"><br>
									(<?php
											esc_html_e( 'This will use a custom Image for the GRAB AR Button (enter full https:// reference of Image)', 'grabar' );
									?>)
		                    	</p>
		                    	<p>
		                    		<label for="grabar_inc_background"><strong><?php esc_html_e( 'Include background in Images', 'grabar' ); ?></strong></label>
		                    		&nbsp;&nbsp;<input type="checkbox" id="grabar_inc_background" name="grabar_inc_background" class="widefat" value="1"<?php if($this->settings['grabar_inc_background']) echo " checked"; ?>>
									&nbsp;&nbsp;(<?php
											esc_html_e( 'This will set the default option for the Image GRAB, user can override this option', 'grabar' );
									?>)
		                    	</p>
		                    	
		                    	<p>
		                    		<label for="grabar_background_img"><strong><?php esc_html_e( 'Plugin will scrape background attribute to find Images', 'grabar' ); ?></strong></label>
		                    		&nbsp;&nbsp;<input type="checkbox" id="grabar_background_img" name="grabar_background_img" class="widefat" value="1"<?php if($this->settings['grabar_background_img']) echo " checked"; ?>>
									&nbsp;&nbsp;(<?php
											esc_html_e( 'Set this if your site uses the background setting for your product Images', 'grabar' );
									?>)
		                    	</p>
		                    	<?PHP if(class_exists('WooCommerce')){ ?>
		                    	<p>
		                    		<label for="grabar_woo_btn"><strong><?php esc_html_e( 'Add GRAB AR button next to "Add To Cart" button', 'grabar' ); ?></strong></label>
		                    		&nbsp;&nbsp;<input type="checkbox" id="grabar_woo_btn" name="grabar_woo_btn" class="widefat" value="1"<?php if($this->settings['grabar_woo_btn']) echo " checked"; ?> onclick="GrabAR_click_woo_btn();">
									&nbsp;&nbsp;(<?php
											esc_html_e( 'This will add GRAB AR button next to "Add To Cart" button (Woo Commerce Only)', 'grabar' );
									?>)
		                    	</p>
		                    	<?PHP } ?>
		                    	<div class="customBox">
			                    	<p>
			                    		<label for="grabar_inc_button"><strong><?php
			                    			//if(class_exists('WooCommerce'))
			                    			//	esc_html_e( '&nbsp;&nbsp;&nbsp; OR Insert Automatically on all pages', 'grabar' );
			                    			//else
			                    				esc_html_e( 'Insert Automatically on all pages', 'grabar' );
			                    			 ?></strong></label>
			                    		<input type="checkbox" id="grabar_inc_button" name="grabar_inc_button" class="widefat" value="1"<?php if($this->settings['grabar_inc_button']) echo " checked"; ?> onclick="GrabAR_click_inc_button()">
										&nbsp;&nbsp;(<?php
												esc_html_e( 'Be sure to set style below to position the button.  For example: position:absolute:top:100px;left:20px;', 'grabar' );
										?>)
			                    	</p>
		                    	
		                    		<p>
			                    		<label for="grabar_fixed"><strong><?php esc_html_e( 'Fix to top on scroll', 'grabar' ); ?></strong></label>
			                    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="grabar_fixed" name="grabar_fixed" style="width:140px;" >
			                    			<option value="0"<?php if($this->settings['grabar_fixed'] == '0') echo " selected"; ?>><?php esc_html_e( 'Do not fix', 'grabar' ); ?></option>
			                    			<option value="top_right" <?php if($this->settings['grabar_fixed'] == 'top_right') echo " selected"; ?>><?php esc_html_e( 'Top Right', 'grabar' ); ?></option>
			                    			<option value="top_left" <?php if($this->settings['grabar_fixed'] == 'top_left') echo " selected"; ?>><?php esc_html_e( 'Top Left', 'grabar' ); ?></option>
			                    			<option value="bottom_right" <?php if($this->settings['grabar_fixed'] == 'bottom_right') echo " selected"; ?>><?php esc_html_e( 'Bottom Right', 'grabar' ); ?></option>
			                    			<option value="bottom_left" <?php if($this->settings['grabar_fixed'] == 'bottom_left') echo " selected"; ?>><?php esc_html_e( 'Bottom Left', 'grabar' ); ?></option>
			                    		</select>
										&nbsp;&nbsp;(<?php
												esc_html_e( 'This will fix the button to the top when the page scrolls', 'grabar' );
										?>)
			                    	</p>
									
														<p>
			                    		<label for="grabar_padding"><strong><?php esc_html_e( 'Top/Bottom Padding', 'grabar' ); ?></strong></label>
			                    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" id="grabar_padding" name="grabar_padding" class="widefat" style="width:140px;" value="<?php echo $this->settings['grabar_padding']; ?>"> px
										&nbsp;&nbsp;(<?php
												esc_html_e( 'This will set padding of the button (top or bottom) for fixed positions option only', 'grabar' );
										?>)
			                    	</p>
			                    	
														<p>
			                    		<label for="grabar_top"><strong><?php esc_html_e( 'Top Padding on scroll', 'grabar' ); ?></strong></label>
			                    		&nbsp;<input type="number" id="grabar_top" name="grabar_top" class="widefat" style="width:140px;" value="<?php echo $this->settings['grabar_top']; ?>"> px
										&nbsp;&nbsp;(<?php
												esc_html_e( 'This will set padding of the button for scroll option', 'grabar' );
										?>)
			                    	</p>

			                    	<p>
			                    		<label for="grabar_custom_style"><strong><?php esc_html_e( 'Add Custom Style', 'grabar' ); ?></strong></label>
			                    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="grabar_custom_style" name="grabar_custom_style" class="widefat" style="width:500px;" value="<?php echo $this->settings['grabar_custom_style']; ?>"><br>
										&nbsp;&nbsp;(<?php
												esc_html_e( 'This will include custom style options like absolute positioning. Use standard css coding', 'grabar' );
										?>)
			                    	</p>
		                    	</div>
		                    			                    	
		                    	<?php wp_nonce_field( $this->plugin->name, $this->plugin->name . '_nonce' ); ?>
		                    	<p>
		                    		
		                    <div style="">
		                    		<div style="font-size:20px;"><strong><?php esc_html_e( 'Add the GRAB AR button to individual pages', 'grabar' ); ?></strong></div>
		                    		<hr class="tophr" style="margin-left:0;"/>
		                    		<ul class="addCodeDesc">
		                    			<li>1. <?php esc_html_e( 'To add the GRAB AR button to individual pages, you must uncheck the "Insert Automatically on all pages" option above', 'grabar' ); ?></li>
		                    			<li>2. <?php esc_html_e( 'Copy the code below and insert into any html area (edit the GRAB AR settings to style your button, click Update and copy the code)', 'grabar' ); ?></li>
		                    		</ul>
		                    		<textarea disabled id="grabar_button_code_d" style="width:900px;height:100px">To add the GRAB AR button to individual pages, you must uncheck the "Insert Automatically on all pages" option above and click 'Update'</textarea>
		                    		<textarea id="grabar_button_code" style="display:none;width:900px;height:100px"><?php echo grabar_build_button() ?></textarea>
		                    		<div id="grabar_copy_link" style="display:none;">(<span onclick="GrabAR_textCopy('button_code')" style="cursor:pointer;text-decoration:underline">Copy Text</span>)
		                    			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e( '*If you manually place this code, you will need to update the code with any settings change', 'grabar' ); ?></div>
		                    		
	                		</div>		
		               <br>
									<input name="btnSubmit" type="submit" class="button button-primary" value="<?php esc_attr_e( 'Update', 'grabar' ); ?>" />
									<div id="grabar_ClickSubmit" style="display:none;">^^^ Be sure to Save!</div>
								</p>
						    </form>
	                    </div>

	                </div>
	                <!-- /postbox -->
				</div>
				<!-- /normal-sortables -->
    		</div>
    		<!-- /post-body-content -->

    		<!-- Sidebar -->
    		<div id="postbox-container-1" class="postbox-container">
    			<?php require_once( $this->plugin->folder . '/views/sidebar.php' );
    			 ?>
    		</div>
    		
    	</div>
	</div>
</div>
