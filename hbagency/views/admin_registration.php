<?php

if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="hbagency" style="margin-top: 15px !important">
<main class="page-auth">
	<div class="d-flex flex-column bg-gradient-linear-primary h-100">
		<a class="navbar-brand mx-auto mx-lg-4 my-3" href="/">
			<img class="img-fluid" src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'img/hb-agency-logo-white.svg'; ?>" alt="HB Agency logo"> 
		</a>
		<img class="d-none d-lg-block img-fluid w-100 h-100" src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'img/shape-animation.svg'; ?>" alt="">
	</div>
	
	<form class="mb-r13">
		<div class="p-3 page-auth__form">
			<h1 class="text-headline text-center mb-4"><?php esc_html_e("Login", "hbagency"); ?></h1>
			<div class="input-group mb-r13">
		 		<label for="hbagency_website_id" class="input-group-text bg-primary text-white"><i class="bi bi-key"></i></label>
				<input type="text" name="hbagency_website_id" id="hbagency_website_id" class="form-control" placeholder="Website Token">
			</div>	
			<button type="submit" class="btn btn-secondary w-100 " id="hbagency_registration_button" ><?php esc_html_e("Sign In", "hbagency"); ?></button>
			<p id="hbagency_registration_message" class="text-center text-success mb-1 mt-3" style="font-weight: 600; color: green;"></p>
			<p class="fw-medium text-center fs-sm  mt-3"><?php esc_html_e("Not registered yet?", "hbagency")?> <a class="fw-semibold text-decoration-none" href="https://www.hbagency.it/headerbiddingAgency/register" target="_blank"><?php esc_html_e("Sign up", "hbagency") ?></a>
			</p>
			<div class="accordion  accordion-hbagency" id="accordionExample">
				<div class="accordion-item">
				    <h2 class="accordion-header" id="headingWebsiteId">
				      <button class="accordion-button collapsed accordion-hbagency" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWebsiteId" aria-expanded="true" aria-controls="collapseWebsiteId">
					  <?php esc_html_e("Where can I find my website id?", "hbagency"); ?>
				      </button>
				    </h2>
				    <div id="collapseWebsiteId" class="accordion-collapse collapse" aria-labelledby="collapseWebsiteId" data-bs-parent="#accordionExample">
				      <div class="accordion-body accordion-hbagency">
					  	<?php esc_html_e('You can find your website id in the "Inventory->Websites" area of your website. Click on the ', "hbagency"); ?><i class="bi bi-key"></i>, <?php esc_html_e('placed after to the "Generated code" button.', "hbagency"); ?>
				      </div>
					</div>
		   		 </div>
           		 </div>
		</div>
		<?php wp_nonce_field('hb_register_nonce', 'hb_nonce'); ?>
	</form>
</main>
</div>

