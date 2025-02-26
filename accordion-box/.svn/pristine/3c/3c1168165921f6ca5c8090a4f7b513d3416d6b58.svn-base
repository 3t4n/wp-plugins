<?php
defined('ABSPATH') or die();

if( ! class_exists('CDLZR_ACC_BOX_METABOXES') ) {
	class CDLZR_ACC_BOX_METABOXES {

		public static function metabox_group(){

			add_action( 'admin_enqueue_scripts', array( 'CDLZR_ACC_BOX_METABOXES', 'cdlzr_accbox_admin_print_scripts' ) );				

			 /* Add meta boxes on the 'add_meta_boxes' hook. */
			  add_action( 'add_meta_boxes', array('CDLZR_ACC_BOX_METABOXES','cdlzr_accbox_metaboxes' ));
		}

		/* Create one or more meta boxes to be displayed on the post editor screen. */
		public static function cdlzr_accbox_metaboxes() {

			add_meta_box(
			    'cdlzr-acc-design-box',      // Unique ID
			    esc_html__( 'Accordion & FAQs Design Template', 'CDLZR_PLUG_ACORD_DOM' ),    // Title
			    array('CDLZR_ACC_BOX_METABOXES','cdlzr_design_accbox_metabox'),   // Callback function
			    'cdlzr_accrodion_box',         // Admin page (or post type)
			    'normal',         // Context
			    'default'         // Priority
			  );

			add_meta_box(
			    'cdlzr-acc-box',      // Unique ID
			    esc_html__( 'Add Accordion Box', 'CDLZR_PLUG_ACORD_DOM' ),    // Title
			    array('CDLZR_ACC_BOX_METABOXES','cdlzr_add_accbox_metabox'),   // Callback function
			    'cdlzr_accrodion_box',         // Admin page (or post type)
			    'normal',         // Context
			    'default'         // Priority
			  );

			add_meta_box(
			    'cdlzr-acc-scode',      // Unique ID
			    esc_html__( 'Accordion Box Shorcode', 'CDLZR_PLUG_ACORD_DOM' ),    // Title
			    array('CDLZR_ACC_BOX_METABOXES','cdlzr_add_accbox_shortcode'),   // Callback function
			    'cdlzr_accrodion_box',         // Admin page (or post type)
			    'side',         // Context
			    'low'         // Priority
			  );	

			  add_meta_box(
			    'cdlzr-acc-settings',      // Unique ID
			    esc_html__( 'Accordion Box Title', 'CDLZR_PLUG_ACORD_DOM' ),    // Title
			    array('CDLZR_ACC_BOX_METABOXES','cdlzr_accbox_title'),   // Callback function
			    'cdlzr_accrodion_box',         // Admin page (or post type)
			    'side',         // Context
			    'low'         // Priority
			  );

			  add_meta_box(
			    'cdlzr-acc-template-setting',      // Unique ID
			    esc_html__( 'Template Layout', 'CDLZR_PLUG_ACORD_DOM' ),    // Title
			    array('CDLZR_ACC_BOX_METABOXES','cdlzr_select_template_metabox'),   // Callback function
			    'cdlzr_accrodion_box',         // Admin page (or post type)
			    'side',         // Context
			    'low'         // Priority
			  );

			  add_meta_box(
			    'cdlzr-acc-box-settings',      // Unique ID
			    esc_html__( 'Accordion Box Settings', 'CDLZR_PLUG_ACORD_DOM' ),    // Title
			    array('CDLZR_ACC_BOX_METABOXES','cdlzr_accbox_metabox_settings'),   // Callback function
			    'cdlzr_accrodion_box',         // Admin page (or post type)
			    'normal',         // Context
			    'default'         // Priority
			  );	

			  add_meta_box(
			    'cdlzr-acc-rating-setting',      // Unique ID
			    esc_html__( 'Show Us Some Love', 'CDLZR_PLUG_ACORD_DOM' ),    // Title
			    array('CDLZR_ACC_BOX_METABOXES','cdlzr_rating_metabox'),   // Callback function
			    'cdlzr_accrodion_box',         // Admin page (or post type)
			    'side',         // Context
			    'low'         // Priority
			  );		
		}

		public static function cdlzr_accbox_admin_print_scripts( $hook_suffix ) {
		    if ( in_array( $hook_suffix, array('post.php', 'post-new.php') ) ) {
		        $screen = get_current_screen();	
		        wp_enqueue_script( 'jquery' ); //mother js library		        
		        // here 'cdlzr_accrodion_box' is cptname
		        if ( is_object( $screen ) && 'cdlzr_accrodion_box' === $screen->post_type ) {
		        	wp_enqueue_editor();
		        	wp_enqueue_script('wltp-admin', CDLZR_ACORD_URL . 'admin/assets/js/cdlzr-accbox-admin.js', array('jquery'), true, true);
		        	 wp_enqueue_style( 'cdlzr-bootstrap', CDLZR_ACORD_URL . 'admin/assets/css/bootstrap.min.css'  );
				    wp_enqueue_style('cdlzr-admin-css', CDLZR_ACORD_URL . 'admin/assets/css/admin-css.css', array(), true, 'all');
					wp_enqueue_style('cdlzr-fontawesome', CDLZR_ACORD_URL . 'admin/assets/css/fontawesome/css/all.min.css', array(), true, 'all');
					wp_enqueue_script('cdlzr-custom-js', CDLZR_ACORD_URL . 'admin/assets/js/custom-js.js', array('jquery'), true, true);
					wp_localize_script( 'cdlzr-custom-js', 'AjaxObj',array( 'ajax_url' => admin_url( 'admin-ajax.php' )	));
					wp_enqueue_script('cdlzr-bootstrap-js', CDLZR_ACORD_URL . 'admin/assets/js/bootstrap.min.js', array('jquery'), true, true);
					wp_enqueue_style( 'sidebar-bootstrap', CDLZR_ACORD_URL . 'admin/assets/css/bootstrap-side-modals.css'  );
					wp_enqueue_style( 'jquery-linedtextarea-css', CDLZR_ACORD_URL . 'admin/assets/css/jquery-linedtextarea.css'  );
					wp_enqueue_script('jquery-linedtextarea-js', CDLZR_ACORD_URL . 'admin/assets/js/jquery-linedtextarea.js', array('jquery'), true, true);					
		        }
		    }		   
		} 
		
		public static function cdlzr_add_accbox_metabox( $post ){			
				$post_id      = $post->ID;
				$dynamic_data = get_post_meta($post_id, 'accbox_metabox_'.$post_id, true);
				wp_nonce_field( basename( __FILE__ ), 'accbox_post_class_nonce' );				
			?>	
				<div id="divcontrolbox_rows" class="row">					
					<?php						
						if (is_array($dynamic_data) && count($dynamic_data) > 0){
							$k=3;
							foreach ($dynamic_data as $key => $value) {
								 $mytext 		= $value['mytext'];
								 $mydesc 		= $value['mydesc'];
								 if(isset($value['myfontawe'])){
								 	$myfontawe 	= $value['myfontawe'];
								 }else{
								 	$myfontawe 	= '';
								 }

								if( $value['openacc'] == "1" ){
									$openacc 	= "selected";
								}else{
									$openacc 	= '';
								}
								 
								?>	
									<div class="col-md-6 divcontrolbox">
										<div class="div_inner">
											<div class=" form-group div_inner_accbox">
												<small class="d-block float-right">
													<button type="button" class="cdlzr_accbox_remove_label btn btn-sm btn-warning cdlzr_remove_label mb-1"><i class="fas fa-times"></i></button>
												</small>
												<label><?php esc_html_e( 'My Title', CDLZR_PLUG_ACORD_DOM ); ?></label>
												<input type="text" name="mytext[]" class="form-control" value="<?php echo esc_attr($mytext); ?>">
												<label class="mt-3"><?php esc_html_e( 'My Description', CDLZR_PLUG_ACORD_DOM ); ?></label>
												<textarea  id="mydesc<?php echo $k; ?>" name="mydesc[]" class="form-control" rows='4'><?php echo esc_attr($mydesc); ?></textarea>
												<?php
													 wp_editor( $mydesc, "mydesc".$k, $settings = array(
													 	'drag_drop_upload'    => false,
													 	'media_buttons' 	  => true,
											            'textarea_name'       => "mydesc".$k,
											            'textarea_rows'       => 5,
											            'tabindex'            => '',
											            'tabfocus_elements'   => ':prev,:next',
											            'editor_css'          => '',
											            'editor_class'        => '',
											            'teeny'               => false,
											            '_content_editor_dfw' => false,
											            'tinymce' => array(	   	
											            // Items for the Visual Tab
											            'plugins'=>"textcolor,link",
											            'toolbar1'=> 'bold,italic,link',
											        ),
											            'quicktags'           => true,) );
												?>
												<label class="mt-3"><?php esc_html_e( 'Font-Awesome Icon', CDLZR_PLUG_ACORD_DOM ); ?></label>
												<input type="text" name="myfontawe[]" class="form-control" value="<?php echo esc_attr($myfontawe); ?>">	
												<label class="mt-3"><?php esc_html_e( 'Open Accordion', CDLZR_PLUG_ACORD_DOM ); ?></label>
												<select class="form-control" name="openacc[]">
													<option <?=$openacc?> value="0">Disable</option>
													<option <?=$openacc?> value="1">Enable</option>
												</select>												
											</div>						
										</div>					
									</div>
								<?php
								$k++;
							}

						}else{							
							?>
								<div class="col-md-6 divcontrolbox">
									<div class="div_inner">
										<div class="form-group div_inner_accbox">
											<small class="d-block float-right">
												<button type="button" class="cdlzr_accbox_remove_label btn btn-sm btn-warning cdlzr_remove_label mb-1"><i class="fas fa-times"></i></button>
											</small>
											<label><?php esc_html_e( 'My Title', CDLZR_PLUG_ACORD_DOM ); ?></label>
											<input type="text" name="mytext[]" class="form-control">
											<label class="mt-3"><?php esc_html_e( 'My Description', CDLZR_PLUG_ACORD_DOM ); ?></label>	
											<textarea id="mydesc1" name="mydesc[]" class="form-control" rows='4'></textarea>	
											<?php
												wp_editor( "", "mydesc1", $settings = array(
													 	'drag_drop_upload'    => false,
													 	'media_buttons' 	  => true,
											            'textarea_name'       => "mydesc1",
											            'textarea_rows'       => 5,
											            'tabindex'            => '',
											            'tabfocus_elements'   => ':prev,:next',
											            'editor_css'          => '',
											            'editor_class'        => '',
											            'teeny'               => false,
											            '_content_editor_dfw' => false,
											            'tinymce' => array(	  
											            // Items for the Visual Tab
											            'plugins'=>"textcolor,link",	
											            // Items for the Visual Tab
											            'toolbar1'=> 'bold,italic,link',
											        ),
											            'quicktags'           => true,) );
											?>
											<label class="mt-3"><?php esc_html_e( 'Font-Awesome Icon', CDLZR_PLUG_ACORD_DOM ); ?></label>
											<input type="text" name="myfontawe[]" class="form-control" value="<?php if(isset($myfontawe)){ echo esc_attr($myfontawe); } ?>">
											<label class="mt-3"><?php esc_html_e( 'Open Accordion', CDLZR_PLUG_ACORD_DOM ); ?></label>
											<select class="form-control" name="openacc[]">
												<option value="0">Disable</option>
												<option selected value="1">Enable</option>
											</select>	
										</div>															
									</div>					
								</div>
								<div class="col-md-6 divcontrolbox">
									<div class="div_inner">
										<div class="form-group div_inner_accbox">
											<small class="d-block float-right">
												<button type="button" class="cdlzr_accbox_remove_label btn btn-sm btn-warning cdlzr_remove_label mb-1"><i class="fas fa-times"></i></button>
											</small>
											<label><?php esc_html_e( 'My Title', CDLZR_PLUG_ACORD_DOM ); ?></label>
											<input type="text" name="mytext[]" class="form-control">
											<label class="mt-3"><?php esc_html_e( 'My Description', CDLZR_PLUG_ACORD_DOM ); ?></label>	
											<textarea id="mydesc2" name="mydesc[]" class="form-control" rows='4'></textarea>
											<?php
												wp_editor( "", "mydesc2", $settings = array(
													 	'drag_drop_upload'    => false,
													 	'media_buttons' 	  => true,
											            'textarea_name'       => "mydesc2",
											            'textarea_rows'       => 5,
											            'tabindex'            => '',
											            'tabfocus_elements'   => ':prev,:next',
											            'editor_css'          => '',
											            'editor_class'        => '',
											            'teeny'               => false,
											            '_content_editor_dfw' => false,
											            'tinymce' => array(				            	
											            // Items for the Visual Tab
											            'plugins'=>"textcolor,link",	
											            // Items for the Visual Tab
											            'toolbar1'=> 'bold,italic,link',
											        ),
											            'quicktags'           => true,) );
											?>
											<label class="mt-3"><?php esc_html_e( 'Font-Awesome Icon', CDLZR_PLUG_ACORD_DOM ); ?></label>
											<input type="text" name="myfontawe[]" class="form-control" value="<?php if(isset($myfontawe)){ echo esc_attr($myfontawe); } ?>">		<label class="mt-3"><?php esc_html_e( 'Open Accordion', CDLZR_PLUG_ACORD_DOM ); ?></label>
											<select class="form-control" name="openacc[]">
												<option value="0">Disable</option>
												<option value="1">Enable</option>
											</select>									
										</div>																
									</div>					
								</div>
							<?php
						}
					?>
				</div>					

				<div class="row">
					<div class="col-md-12">
						<button id="create_element_btn" type="button" class="btn btn-dark float-right"><?php esc_html_e( 'More Accordion Box', CDLZR_PLUG_ACORD_DOM ); ?> <img src="<?php echo
						esc_url(CDLZR_ACORD_URL.'assets/logo/menu.png'); ?>"/></button>
						<button id="delete_element_btn" type="button" class="btn btn-danger float-right mr-2"><?php esc_html_e( 'Delete All', CDLZR_PLUG_ACORD_DOM ); ?> <i class="fa fa-trash"></i></button>						
					</div>
					<div class="col-md-12">						
						<p><b style="color:red;">Note :</b> Font Awesome Icon is available only in Template A & C | Get More Font-Awesome Icon <a target="_blank" href="https://fontawesome.com/icons?d=gallery"><b>Click Here</b></a></p>
					</div>				
				</div>
			<?php
		}

		public static function cdlzr_accbox_title($post){		
			$post_id        = $post->ID;
			$dynamic_data   = get_post_meta($post_id, 'accbox_metabox_'.$post_id, true);
			 $selected_title = (isset($dynamic_data[0]['acc_title'][0]) && is_array($dynamic_data[0]['acc_title'][0])) ? $dynamic_data[0]['acc_title'][0] : array();

			 if(empty($dynamic_data)){
			 	 $selected_title = 1;
			 }else{
			 	 $selected_title = $dynamic_data[0]['acc_title'][0];
			 }			
			?>
				<div class="row">
					<div class="col-md-12">
						<label><?php esc_html_e( 'Title Show On/Off', CDLZR_PLUG_ACORD_DOM ); ?></label>
						<select name="acc_title" class="form-control">
							<option <?php if($selected_title == 1){ echo esc_html("selected=selected"); } ?> value="1"><?php esc_html_e( 'On', CDLZR_PLUG_ACORD_DOM ); ?></option>
							<option <?php if($selected_title == 0){ echo esc_html("selected=selected"); } ?> value="0"><?php esc_html_e( 'Off', CDLZR_PLUG_ACORD_DOM ); ?></option>
						</select>
					</div>					
				</div>
			<?php
		}

		public static function accbox_save_metabox($post_id, $post){

			/* Verify the nonce before proceeding. */
			if ( !isset( $_POST['accbox_post_class_nonce'] ) || !wp_verify_nonce( $_POST['accbox_post_class_nonce'], basename( __FILE__ ) ) )
			return $post_id;
			
			$acc_title_arr  		= (isset($_POST['mytext']) && is_array($_POST['mytext'])) ? $_POST['mytext'] : array(); 
			$acc_desc_arr  			=  (isset($_POST['mydesc']) && is_array($_POST['mydesc'])) ? $_POST['mydesc'] : array();
			$acc_myfontawe_arr		=  (isset($_POST['myfontawe']) && is_array($_POST['myfontawe'])) ? $_POST['myfontawe'] : array();
			$acc_head_title	 		=  (isset($_POST['acc_title'])) ? sanitize_text_field($_POST['acc_title']) : '';
			$style_accbox 			= (isset($_POST['style_accbox'])) ? sanitize_text_field($_POST['style_accbox']) : '';	
			$acc_cust_css		    = (isset($_POST['acc_cust_css'])) ? sanitize_text_field($_POST['acc_cust_css']) : '';
			$openacc_arr		   =  (isset($_POST['openacc']) && is_array($_POST['openacc'])) ? $_POST['openacc'] : array();

			$data_arr = array();

			foreach ($acc_title_arr as $key => $acc_title ) {
				array_push($data_arr, array(
					'mytext'		=>	isset($acc_title) ? $acc_title : null,
					'mydesc'		=>	isset($acc_desc_arr[$key]) ? $acc_desc_arr[$key] : null,
					'myfontawe'		=>  isset($acc_myfontawe_arr[$key]) ? $acc_myfontawe_arr[$key] : null,
					'acc_title'		=>	isset($acc_head_title) ? sanitize_text_field($acc_head_title) : null,	
					'style_accbox'	=>	isset($style_accbox) ? sanitize_text_field($style_accbox) : null,	
					'acc_cust_css'	=>  isset($acc_cust_css) ? sanitize_text_field($acc_cust_css) : null,
					'openacc'		=> isset($openacc_arr[$key]) ? $openacc_arr[$key] : "",
				)
			  );
			}

			$data_metakey = "accbox_metabox_".$post_id;
			update_post_meta($post_id,$data_metakey, $data_arr);
		}

		public static function cdlzr_add_accbox_shortcode($post){
			$post_id      = $post->ID;
			$accbox_scode = "[CDLZR_ACC_BOX id=".$post_id."]";
			?>			
			<p><?php esc_html_e( 'Copy and paste this shortcode at page/post for display', CDLZR_PLUG_ACORD_DOM ); ?> <b><?php esc_html_e( 'Accordion Box', CDLZR_PLUG_ACORD_DOM ); ?></b></p>
			<p>
				<input type="text" value="<?php echo esc_attr($accbox_scode); ?>" readonly class="form-control">
			</p>
			<?php
		}

		public static function cdlzr_select_template_metabox($post){
			wp_nonce_field( basename( __FILE__ ), 'accbox_post_class_nonce' );
			$post_id      = $post->ID;
			$dynamic_data = get_post_meta($post_id, 'accbox_metabox_'.$post_id, true);
			if(isset($dynamic_data[0]['style_accbox'][0])){
				 $selected_theme = $dynamic_data[0]['style_accbox'][0];
			}else{
				 $selected_theme = 1;	
			}
			
			?>
				<div class="row">					
					<div class="col-md-12">
						<button type="button" class="btn btn-primary btn-block" name="btn_accbox_template" id="btn_accbox_template" data-toggle="modal" data-target="#cdlzr_theme_modal_lg"><?php esc_html_e( 'Select Template', CDLZR_PLUG_ACORD_DOM ); ?>&nbsp;<i class="fas fa-palette"></i></button>
					</div>
					<div class="modal right fade" id="cdlzr_theme_modal_lg" tabindex="-1" role="dialog" aria-labelledby="cdlzr_theme_modal_lg">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header mt-3">
									<h5 class="modal-title"><?php esc_html_e( 'Select Template For Accordion Box', CDLZR_PLUG_ACORD_DOM ); ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body">
									<div class="row">										
										<div class="col-md-12 cap-style1">
											<h5><?php esc_html_e( 'Template - A', CDLZR_PLUG_ACORD_DOM ); ?> <input <?php if($selected_theme==1){ echo esc_html("checked"); } ?> type="radio" name="style_accbox" class="form-control float-right chk_style" value="1"></h5>
											
										</div>
										<div class="col-md-12 style1">
											<img class="img-responsive" src="<?php echo esc_url(CDLZR_ACORD_URL.'admin/assets/images/style1.PNG'); ?>" style="width:100%;height:500px;"/>
										</div>
										
										<div class="col-md-12 cap-style1">
											<h5><?php esc_html_e( 'Template - B', CDLZR_PLUG_ACORD_DOM ); ?> <input <?php if($selected_theme==2){ echo esc_html("checked"); } ?> type="radio" name="style_accbox" class="form-control float-right chk_style" value="2"></h5>
										</div>
										<div class="col-md-12 style1">
											<img class="img-responsive" src="<?php echo esc_url(CDLZR_ACORD_URL.'admin/assets/images/style2.PNG'); ?>" style="width:100%;height:500px;"/>
										</div>
										
										<div class="col-md-12 cap-style1">
											<h5><?php esc_html_e( 'Template - C', CDLZR_PLUG_ACORD_DOM ); ?> <input <?php if($selected_theme==3){ echo esc_html("checked"); } ?> type="radio" name="style_accbox" class="form-control float-right chk_style" value="3"></h5>
										</div>
										<div class="col-md-12 style1">
											<img class="img-responsive" src="<?php echo esc_url(CDLZR_ACORD_URL.'admin/assets/images/style3.PNG'); ?>" style="width:100%;height:500px;"/>
										</div>

										<div class="col-md-12 cap-style1">
											<h5><?php esc_html_e( 'Template - D', CDLZR_PLUG_ACORD_DOM ); ?> <input <?php if($selected_theme==4){ echo esc_html("checked"); } ?> type="radio" name="style_accbox" class="form-control float-right chk_style" value="4"></h5>
										</div>
										<div class="col-md-12 style1">
											<img class="img-responsive" src="<?php echo esc_url(CDLZR_ACORD_URL.'admin/assets/images/style4.PNG'); ?>" style="width:100%;height:500px;"/>
										</div>

										<div class="col-md-12 cap-style1">
											<h5><?php esc_html_e( 'Template - E', CDLZR_PLUG_ACORD_DOM ); ?> <input <?php if($selected_theme==5){ echo esc_html("checked"); } ?> type="radio" name="style_accbox" class="form-control float-right chk_style" value="5"></h5>
										</div>
										<div class="col-md-12 style1">
											<img class="img-responsive" src="<?php echo esc_url(CDLZR_ACORD_URL.'admin/assets/images/style5.PNG'); ?>" style="width:100%;height:500px;"/>
										</div>
										
									</div>								
								</div>
							</div>	
						</div>	
					</div>					
				</div>
			<?php
		}

	public static function cdlzr_design_accbox_metabox(){
		?>		
		<div style="overflow:hidden;display:block;width:100%;padding-top:20px">
			<div class="row acc_design_box">
				<div class="col-md-3">
					<div class="acc_design_holder">	
						<div style="height: 174px;">
							<div class="">
								<div class="cdlzr_ribbon"><a target="_blank" href="https://codelizar.com/product/ultimate-youtube-video-player-pro//"><span> Selected </span></a></div>
								<img class="cdlzr_img_responsive cdlzr_acc_img" src="<?php echo CDLZR_ACORD_URL.'admin/assets/images/freeone.png'?>">
								</div>
						</div>
						<div style="padding:13px;overflow:hidden; background: #EFEFEF; border-top: 1px dashed #ccc;">
							<h5 class=" pull-left" style="margin-top: 10px;margin-bottom: 10px;font-weight:900">Selected Design</h5>
							<a type="button"  class="float-right btn btn-danger design_btn" id="templates_btn1" target="_blank" href="https://codelizar.com/elementor-459/">Check Demo</a>
						</div>		
					</div>	
				</div>
			
				<div class="col-md-3">
					<div class="acc_design_holder">						
						<div class="">
							<div class="">
								<div class="cdlzr_ribbon cdlzr_ribbon2"><a target="_blank" href="https://codelizar.com/product/accordion-box-pro/"><span>Buy Now</span></a></div>
								<img class="cdlzr_img_responsive cdlzr_acc_img" src="<?php echo CDLZR_ACORD_URL.'admin/assets/images/prodesigned.jpg'?>">
							</div>
						</div>
						<div style="padding:13px;overflow:hidden; background: #EFEFEF; border-top: 1px dashed #ccc;">
							<h5 class="pull-left" style="margin-top: 10px;margin-bottom: 10px;font-weight:900">Pro Templates </h5>
							<a type="button"  class="float-right btn btn-danger design_btn" id="templates_btn2" target="_blank" href="https://codelizar.com/accordion-box-pro-2/">Check Demo</a>
						</div>		
					</div>	
				</div>
		</div>	
		</div>
		<?php
	}	

	public static function cdlzr_rating_metabox(){
		?>
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="https://wordpress.org/plugins/accordion-box/#reviews" target="_blank"><i style="color:red;" class="fas fa-star fa-2x"></i></a>
				<a href="https://wordpress.org/plugins/accordion-box/#reviews" target="_blank"><i style="color:red;" class="fas fa-star fa-2x"></i></a>
				<a href="https://wordpress.org/plugins/accordion-box/#reviews" target="_blank"><i style="color:red;" class="fas fa-star fa-2x"></i></a>
				<a href="https://wordpress.org/plugins/accordion-box/#reviews" target="_blank"><i style="color:red;" class="fas fa-star fa-2x"></i></a>
				<a href="https://wordpress.org/plugins/accordion-box/#reviews" target="_blank"><i style="color:red;" class="fas fa-star fa-2x"></i></a>
			</div>			
		</div>
		<?php
	}	

	/**
	 * Set Accordion Box columns
	 *
	 * @param array $columns The columns object.
	 * @return array
	 */
		public static function set_columns($columns) {
			unset($columns['author'],
			$columns['Date']);
			$new_cols = array(
				'title'        => esc_html__('Accordion Box', 'CDLZR_PLUG_ACORD_DOM'),
				'date'         => esc_html__('Date', 'CDLZR_PLUG_ACORD_DOM'),
				'shortcode'    => esc_html__('Accordion Box Shortcode', 'CDLZR_PLUG_ACORD_DOM'),
				'do_shortcode' => esc_html__('Do Shortcode', 'CDLZR_PLUG_ACORD_DOM'),
				'author'       => esc_html__('Author', 'CDLZR_PLUG_ACORD_DOM'),
			);
			return array_merge($columns, $new_cols);
		}

		/**
		 * Manage Accordion Box columns
		 *
		 * @param string  $column The column object.
		 * @param  WP_Post $post_id The post_id object.
		 * @return void
		 */
		public static function manage_col($column, $post_id) {
			global $post;
			switch ($column) {
				case 'shortcode':
					echo '<input type="text" value="[CDLZR_ACC_BOX id=' . esc_attr($post_id) . ']" readonly="readonly" />';
					break;
				case 'do_shortcode':
					echo '<input type="text" value="<?php echo do_shortcode( \'[CDLZR_ACC_BOX id=' . esc_attr($post_id) . ']\' ); ?>" readonly="readonly" />';
					break;
				default:
					break;
			}
		}

		public static function cdlzr_accbox_metabox_settings( $post ){
			$post_id        = $post->ID;
			$dynamic_data   = get_post_meta($post_id, 'accbox_metabox_'.$post_id, true);
			
			if(!empty($dynamic_data)){				
				$acc_cust_css  		= $dynamic_data[0]['acc_cust_css'];							
			}else{				
				$acc_cust_css  		= "";
				
			}		
		
			?>
			<div class="row">
				<div class="col-md-12 mt-4">
					<label><?php esc_html_e( 'Custom CSS', CDLZR_PLUG_ACORD_DOM ); ?></label>
					<textarea name="acc_cust_css" id="acc_cust_css" class="lined" rows="9" cols="161	"><?php echo $acc_cust_css;  ?></textarea>
				</div>
			</div>
			<?php
		}

		/**
	     * Add Custom Links to All Plugins list page for this plugin
	     * @param $accgopro_links
	     * @return mixed
	     */
		public static function acc_plugin_actions_links($accgopro_links){
			  $accgopro_links['go_pro'] = sprintf( '<a href="%1$s" style="color:#e12f2f;font-weight:800;" target="_blank">%2$s</a>', esc_url('https://codelizar.com/product/accordion-box-pro/'), esc_html__( 'Upgrade To Pro', 'CDLZR_PLUG_ACORD_DOM' ) );        
	        	        
	        return $accgopro_links;
		}

		/**
	     * Add Metabox of new accordion using ajax
		**/
		public static function clzr_accbox_add_box(){
			$k = $_POST['accid'];
			?>
			<div class="col-md-6 divcontrolbox">
				<div class="div_inner">
					<div class=" form-group div_inner_accbox">
						<small class="d-block float-right">
							<button type="button" class="cdlzr_accbox_remove_label btn btn-sm btn-warning cdlzr_remove_label mb-1"><i class="fas fa-times"></i></button>
						</small>
						<label><?php esc_html_e( 'My Title', CDLZR_PLUG_ACORD_DOM ); ?></label>
						<input type="text" name="mytext[]" class="form-control" value="<?php echo esc_attr($mytext); ?>">
						<label class="mt-3"><?php esc_html_e( 'My Description', CDLZR_PLUG_ACORD_DOM ); ?></label>
						<textarea  id="mydesc<?php echo $k; ?>" name="mydesc[]" class="form-control" rows='4'><?php echo esc_attr($mydesc); ?></textarea>
						<?php
								wp_editor( $mydesc, "mydesc".$k, $settings = array(
								'drag_drop_upload'    => false,
								'media_buttons' 	  => true,
								'textarea_name'       => "mydesc".$k,
								'textarea_rows'       => 5,
								'tabindex'            => '',
								'tabfocus_elements'   => ':prev,:next',
								'editor_css'          => '',
								'editor_class'        => '',
								'teeny'               => false,
								'_content_editor_dfw' => false,
								'tinymce' => array(	   	
								// Items for the Visual Tab
								'plugins'=>"textcolor,link",
								'toolbar1'=> 'bold,italic,link',
							),
								'quicktags'           => true,) );
						?>
						<label class="mt-3"><?php esc_html_e( 'Font-Awesome Icon', CDLZR_PLUG_ACORD_DOM ); ?></label>
						<input type="text" name="myfontawe[]" class="form-control" value="<?php echo esc_attr($myfontawe); ?>">	
						<label class="mt-3"><?php esc_html_e( 'Open Accordion', CDLZR_PLUG_ACORD_DOM ); ?></label>
						<select class="form-control" name="openacc[]">
							<option <?=$openacc?> value="0">Disable</option>
							<option <?=$openacc?> value="1">Enable</option>
						</select>												
					</div>						
				</div>					
			</div>
			<?php
			wp_die();
		}
	}
}