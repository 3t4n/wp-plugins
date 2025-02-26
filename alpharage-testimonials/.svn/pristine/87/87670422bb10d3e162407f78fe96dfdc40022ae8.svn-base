<?php
/**
 * Provide a menu pages of plugins
 *
*/

class ALPRT_class_testimenu extends  ALPRT_testimonials_Admin {

	function __construct(){
         $this->alprt_get_menu_page();        
	}
	function alprt_get_menu_page()
	{
		add_action( 'admin_menu', array($this,'alprt_testi_settings'),7 );
	}
   
	function alprt_testi_settings() {

	  add_submenu_page(
	    'edit.php?post_type=alprt_testimonial',
	    'Testimonial Help', /*page title*/
	    'Testimonial Help', /*menu title*/
	    'manage_options', /*roles and capabiliyt needed*/
	    'testi-help',
	    array($this,'alprt_testimonial_settings') /*replace with your own function*/
	);

	}
	function alprt_testimonial_settings()
	{  $this->alprt_testimonial_seetings_scripts();
		?>
		<!-- main content wrapping section start here -->
	<div id="wrapper">
		<!-- main content wrapping section start here -->
		<main id="main">
			<!-- tabs section start here -->
			<div class="tabs-sec container">
				<div class="row">
					<div class="col-xs-12">
						
						<div class="tabs-style1">
							<ul class="nav nav-tabs">
			                    <li class="active"><a data-toggle="tab" href="#tab1"><?php esc_html_e('Testimonial','alpharage-testimonials');?></a></li>
			                    <li><a data-toggle="tab" href="#tab2"><?php esc_html_e('About Us','alpharage-testimonials');?></a></li>
			                </ul>
			                <div class="tab-content">
			                    <div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-4">
											<a href="#">
												<div class="image-holder">
													<img src="<?php echo  plugin_dir_url( __FILE__ );?>../images/img02.png" alt="image-description" class="img-rounded">
												</div>
												<div class="text-holder text-center">
													<h2><?php esc_html_e('Testimonial 1','alpharage-testimonials');?></h2>
													<p></p>
												</div>
											</a>
										</div>
										<div class="col-md-4">
											<a href="#">
												<div class="image-holder">
													<img src="<?php echo  plugin_dir_url( __FILE__ );?>../images/img04.jpg" alt="image-description" class="img-rounded">
												</div>
												<div class="text-holder text-center">
													<h2><?php esc_html_e('Testimoniaol 2','alpharage-testimonials');?></h2>
													<p></p>
												</div>
											</a>
										</div>
										<div class="col-md-4">
											<a href="#">
												<div class="image-holder">
													<img src="<?php echo  plugin_dir_url( __FILE__ );?>../images/img05.jpg" alt="image-description" class="img-rounded">
												</div>
												<div class="text-holder text-center">
													<h2><?php esc_html_e('Testimoniaol 3','alpharage-testimonials');?></h2>
													<p></p>
												</div>
											</a>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<a href="#">
												<div class="image-holder">
													<img src="<?php echo  plugin_dir_url( __FILE__ );?>../images/img01.png" alt="image-description" class="img-rounded">
												</div>
												<div class="text-holder text-center">
													<h2><?php esc_html_e('Testimoniaol 4','alpharage-testimonials');?></h2>
													<p></p>
												</div>
											</a>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<a href="#">
												<div class="image-holder">
													<img src="<?php echo  plugin_dir_url( __FILE__ );?>../images/img06.jpg" alt="image-description" class="img-rounded">
												</div>
												<div class="text-holder text-center">
													<h2><?php esc_html_e('Testimoniaol 5','alpharage-testimonials');?></h2>
													<p></p>
												</div>
											</a>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<a href="#">
												<div class="image-holder">
													<img src="<?php echo  plugin_dir_url( __FILE__ );?>../images/img03.jpg" alt="image-description" class="img-rounded">
												</div>
												<div class="text-holder text-center">
													<h2><?php esc_html_e('Testimoniaol 6','alpharage-testimonials');?></h2>
													<p></p>
												</div>
											</a>
										</div>
									</div>
			                    </div>
			                    <div id="tab2" class="tab-pane fade">
		                        	<div class="txt-holder">
		                        		
										<h2><?php esc_html_e('How to add shortcode','alpharage-testimonials');?></h2>
										<p><?php esc_html_e('1. Insert Your Shortcode','alpharage-testimonials');?> <strong><?php esc_html_e('[alpharage-testimonial]','alpharage-testimonials');?></strong> <?php esc_html_e('Through Visual Tool Baar   to display testimonials on your post or page content.','alpharage-testimonials');?></p> 
										<img src="<?php echo  plugin_dir_url( __FILE__ );?>../images/visual-toolbar.png" / width="80%">

										<p><?php esc_html_e('2. It has following parameters: ','alpharage-testimonials');?></p>  
										<ul class="parameters">
											<li><strong><?php esc_html_e('total','alpharage-testimonials');?> </strong> <?php esc_html_e('- Number of testimonials to show.','alpharage-testimonials');?></li>
											<li><strong><?php esc_html_e('order','alpharage-testimonials');?> </strong><?php esc_html_e('- Either','alpharage-testimonials');?>  <strong><?php esc_html_e('asc','alpharage-testimonials');?></strong><?php esc_html_e('(Ascending)','alpharage-testimonials');?>  <?php esc_html_e('or','alpharage-testimonials');?> <strong><?php esc_html_e('desc','alpharage-testimonials');?></strong> <?php esc_html_e('(descending).','alpharage-testimonials');?></li>
											<li><strong><?php esc_html_e('category','alpharage-testimonials');?> </strong><?php esc_html_e('- Select Testimonial Category Through DropDown','alpharage-testimonials');?></li>
											<li><strong><?php esc_html_e('pagestyle','alpharage-testimonials');?> </strong><?php esc_html_e('- You Can Use Form various Design To display','alpharage-testimonials');?></li>
											<li><strong><?php esc_html_e('backgroundcolor','alpharage-testimonials');?> </strong><?php esc_html_e('-Change your Testimonial Background Color','alpharage-testimonials');?> </li>
											<li><strong><?php esc_html_e('backgroundimage','alpharage-testimonials');?></strong><?php esc_html_e('-Change your Testimonial background Image','alpharage-testimonials');?> </li>
											<li><strong><?php esc_html_e('bordercolor','alpharage-testimonials');?></strong><?php esc_html_e('-Change your Testimonial Border  Color','alpharage-testimonials');?></li>
											<li><strong><?php esc_html_e('color','alpharage-testimonials');?> </strong><?php esc_html_e('-Change your Testimonial Foreground Color','alpharage-testimonials');?></li>
										</ul>
										<p><?php esc_html_e('3. When you add the shortcode without any parameters, it will show only one recently added testimonial.','alpharage-testimonials');?></p>
										
										<h2><?php esc_html_e('Examples -','alpharage-testimonials');?> </h2>
										<ul class="display_effet">
											<li><?php esc_html_e('[alpharage-testimonial][/alpharage-testimonial]','alpharage-testimonials');?></li>
											<li><?php esc_html_e("[alpharage-testimonial order='ASC' Category='0' total='-1' pagestyle='style1' backgroundcolor='#f5f5f6' color='#a5a5a5' bordercolor='#e1e1e4' backgroundimage=' ' ]","alpharage-testimonials");?></li>
										</ul>
										
		                        	</div>
			                    </div>
			                </div>
		                </div>
					</div>
				</div>
			</div>
		</main>
		<!-- main content wrapping section end here -->
		<!-- back top of the page -->
		<span id="back-top" class="text-center fa fa-caret-up"></span>
		<!-- loader of the page -->
		
	</div>

<?php	
    }
}
new ALPRT_class_testimenu();
?>