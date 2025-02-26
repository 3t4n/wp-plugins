<?php 
$oneto_client_options = get_theme_mod('oneto_clients_content');
$oneto_front_client_disabled = get_theme_mod('oneto_front_client_disabled', true); 
if($oneto_front_client_disabled == true): ?>
<section id="theme-sponsors" class="theme-sponsors position-relative overflow-hidden bg-primary3">
	<div class="container">
		<div class="row py-5 align-items-center position-relative wow fadeInUp">
			<div class="col-12 position-relative sponsors-one theme-sponsors-content">
				<div class="marquee overflow-hidden owl-carousel owl-theme">
			        <?php
					$oneto_client_options = json_decode($oneto_client_options);
					if( $oneto_client_options != '' ) {
					foreach($oneto_client_options as $client_iteam) {
						$title = ! empty( $client_iteam->title ) ? $client_iteam->title : '';
						$client_link = ! empty( $client_iteam->link ) ? $client_iteam->link : '';
						$open_new_tab = $client_iteam->open_new_tab;
					?>
					<figure class="sponsor-card w-100 h-100 mx-3 d-inline-flex align-items-center justify-content-center m-0">
						<div class="sponsor-body">
							<a href="<?php echo esc_url($client_link); ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
								<img src="<?php echo esc_url($client_iteam->image_url); ?>" class="img-fluid" alt="client">
							</a>
						</div>
					</figure>
				    <?php } } else { ?>
						<figure class="sponsor-card w-100 h-100 mx-3 d-inline-flex align-items-center justify-content-center m-0">
							<div class="sponsor-body">
								<a href="#">
									<img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/client1.png" class="img-fluid" alt="client 1">
								</a>
							</div>
						</figure>
						<figure class="sponsor-card w-100 h-100 mx-3 d-inline-flex align-items-center justify-content-center m-0">
							<div class="sponsor-body">			
								<a href="#">
									<img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/client2.png" class="img-fluid" alt="client 2">
								</a>
							</div>
						</figure>
						<figure class="sponsor-card w-100 h-100 mx-3 d-inline-flex align-items-center justify-content-center m-0">
							<div class="sponsor-body">
								<a href="#">
									<img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/client3.png" class="img-fluid" alt="client 3">
								</a>
							</div>
						</figure>
						<figure class="sponsor-card w-100 h-100 mx-3 d-inline-flex align-items-center justify-content-center m-0">
							<div class="sponsor-body">
								<a href="#">
									<img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/client4.png" class="img-fluid" alt="client 4">
								</a>
							</div>
						</figure>
						<figure class="sponsor-card w-100 h-100 mx-3 d-inline-flex align-items-center justify-content-center m-0">
							<div class="sponsor-body">
								<a href="#">
									<img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/client5.png" class="img-fluid" alt="client 5">
								</a>
							</div>
						</figure>
						<figure class="sponsor-card w-100 h-100 mx-3 d-inline-flex align-items-center justify-content-center m-0">
							<div class="sponsor-body">
								<a href="#">
									<img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/client6.png" class="img-fluid" alt="client 6">
								</a>
							</div>
						</figure>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>