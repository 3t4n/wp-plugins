<?php

/**
 * Provide a dashboard view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<section class="al_wrap">
	<header>
		<div class="container">
			<span class="page-header">AeroLeads Contact Us Details</span>
		</div>
	</header>
	<body>
		<div class="container">
			<!-- form container begins -->
			<div class="form-container">
				<form class="al_details_form" name="al_details_form" id="al_details_form">
					<div class="input_row">
						<i class="md md-work"></i>
						<div class="input_col">
							<label for="business_name">Business Name</label>
							<input type="text" class="form-control" name="business_name" id="business_name" placeholder="Enter Business Name" value="<?php echo $business_name ?>">
						</div>
					</div>

					<!-- <br> -->
					<div class="input_row">
						<i class="md md-person"></i>
						<div class="input_col">
							<label for="contact_person">Contact Person</label>
							<input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Enter Contact Person Name" value="<?php echo $contact_person ?>">
						</div>
					</div>

					<!-- <br> -->
					<div class="input_row">
						<i class="md md-phone"></i>
						<div class="input_col">
							<label for="contact_number">Contact Number</label>
							<input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Contact Number" value="<?php echo $contact_number ?>">
						</div>
					</div>

					<!-- <br> -->
					<div class="input_row">
						<i class="md md-email"></i>
						<div class="input_col">
							<label for="email_address">Email Address</label>
							<input type="text" class="form-control" name="email_address" id="email_address" placeholder="Enter Email Address" value="<?php echo $email_address ?>">
						</div>
					</div>

					<!-- <br> -->
					<div class="input_row">
						<i class="md md-location-on"></i>
						<div class="input_col">
							<label for="address">Address</label>
							<textarea type="text" class="form-control" name="address" id="address" placeholder="Enter Address" ><?php echo $address ?></textarea>
						</div>
					</div>

					<!-- <br> -->
					<div class="input_row">
						<i class="md md-access-time"></i>
						<div class="input_col">
							<label for="open_hours">Open Hours</label>
							<input type="text" class="form-control" name="open_hours" id="open_hours" placeholder="Enter Open Hours" value="<?php echo $open_hours ?>">
						</div>
					</div>

					<!-- <br> -->
					<div class="input_row">
						<i class="md md-add"></i>
						<div class="input_col">
							<label for="note">Add Note</label>
							<textarea type="text" class="form-control" name="note" id="note" placeholder="Add Note" ><?php echo $note ?></textarea>
						</div>
					</div>

					<div class="input_row submit_row">
						<div class="input_col">
							<input type="submit" class="submit_btn">
							<input type="reset" class="submit_btn">
						</div>
					</div>
				</form>	
			</div>
			<!-- FORM ENDS -->

			<!-- display options -->
			<div class="display-options">
				<div class="display_shortcode">
					<div class="theme-container">
						<header class="text-center">
							<div class="pull-left left-arrow">
								<i class="fa fa-chevron-left"></i>
							</div>
							Shortcode Styles
							<div class="pull-right right-arrow">
								<i class="fa fa-chevron-right"></i>
							</div>
						</header>
						<section class="slider shortcode-slider">
							<div>
								<div class="tab-shortcode shortcode-1">
									<div class="instruction text-center">
										<span>Shortcode:</span> [alcud design="simple"]
									</div>
									<div class="text-center" style="padding-top:5px; padding-bottom:2px;">For custom titles instead of CONTACT US</div>
									<div class="instruction text-center">
										[alcud design="simple" title="your custom title"]
									</div>
									<div class="designs">
										<div class="shortcode-design scd-1 sc-1-desktop active_view_shortcode">
											<img src="<?php echo $img_url . 'shortcode-1.png' ?>" class="img-responsive">
										</div>
										<div class="shortcode-design scd-1 sc-1-mobile" style="display: none;">
											<img src="<?php echo $img_url . 'shortcode-1.mob.png' ?>" class="img-responsive">
										</div>
										<div class="row action-bar">
											<div class="col-lg-6 text-center action-bar-button desktop" data-img="1" data-tag="sc-1-desktop">
												DESKTOP
											</div>
											<div class="col-lg-6 text-center action-bar-button mobile" data-img="1" data-tag="sc-1-mobile">
												MOBILE
											</div>
										</div>
									</div>
								</div>
							</div>
							<div>
								<div class="tab-shortcode">
									<div class="instruction text-center">
										<span>Shortcode:</span> [alcud design="flat"]
									</div>
									<div class="designs">
										<div class="shortcode-design scd-2 sc-2-desktop">
											<img src="<?php echo $img_url . 'shortcode-2.png' ?>" class="img-responsive">
										</div>
										<div class="shortcode-design scd-2 sc-2-mobile" style="display: none;">
											<img src="<?php echo $img_url . 'shortcode-2.mob.png' ?>" class="img-responsive">
										</div>
										<div class="row action-bar">
											<div class="col-lg-6 text-center action-bar-button desktop" data-img="2" data-tag="sc-2-desktop">
												DESKTOP
											</div>
											<div class="col-lg-6 text-center action-bar-button mobile" data-img="2" data-tag="sc-2-mobile">
												MOBILE
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						
					</div>
				</div>
				<div class="display_widget">
					<div class="theme-container">
						<header class="text-center">
							<div class="pull-left left-arrow">
								<i class="fa fa-chevron-left"></i>
							</div>
							Widget Styles
							<div class="pull-right right-arrow">
								<i class="fa fa-chevron-right"></i>
							</div>
							<input type="hidden" class="current_widget" value="<?php echo $widget_type; ?>">
						</header>
						<div class="slider widget-slider">
							<div class="tab-widget">
								<div class="inactive text-center" data-tag="widget-1" data-widget="1">
									<i class="md md-radio-button-off" name="md-radio-button-off" id="activate_widget-1"></i>
									<label for="md-radio-button-off">Use this</label>
								</div>
								<div>
									<div class="widget-design">
										<img src="<?php echo $img_url . 'widget-1.png' ?>" class="img-responsive">
									</div>
								</div>
							</div>

							<div class="tab-widget">
								<div class="inactive text-center" data-tag="widget-2" data-widget="2">
									<i class="md md-radio-button-off" name="md-radio-button-off" id="activate_widget-2"></i>
									<label for="md-radio-button-off">Use this</label>
								</div>
								<div class="widget-design">
									<img src="<?php echo $img_url . 'widget-2.png' ?>" class="img-responsive">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- display option ends here -->
			<div class="aeroleads-ad">
				<div class="logo">
					<a href="http://www.aeroleads.com" target="_blank">
						<img src="<?php echo $img_url; ?>/aeroleads-icon.png" class="img-responsive">
					</a>
				</div>
				<hr>
				<div class="al_ad_content">
					Looking for Relevant Leads with Name, Email, Phone Number etc? Check us at <a href="http://www.aeroleads.com" target="_blank">AeroLeads</a>, 
					one of the most powerful prospect and lead generation tool on the web.
				</div>
			</div>
			<!-- display option ends here -->
		</div>
	</body>
</section>