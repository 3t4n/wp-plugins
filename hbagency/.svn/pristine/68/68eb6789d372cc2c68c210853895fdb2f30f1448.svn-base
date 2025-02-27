<?php

if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="hbagency">
<header class="header-main">
        <nav class="navbar navbar-expand-lg py-lg-r08 bg-white">
        <div class="container-xl"><button class="navbar-toggler text-secondary border-0 fs-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="icon icon-menu"></span></button>
        
        <a class="navbar-brand" href="/"><img class="img-fluid" src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'img/hb-agency-logo.svg'; ?>" alt="HB Agency logo"></a>
          <div class="offcanvas-lg offcanvas-start flex-grow-1 offcanvas-main" id="navbarNav" aria-labelledby="navbarOffcanvasLabel" tabindex="-1">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasLabel"><img class="img-fluid" src="<?php echo esc_url(plugin_dir_URL(__DIR__)) . 'img/hb-agency-logo.svg'; ?>" alt="HB Agency logo"><span class="visually-hidden">Offcanvas</span></h5><button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#navbarNav" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-gradient-linear-primary-md offcanvas-main__body">
              <ul class="navbar-nav align-items-lg-center me-lg-auto navbar-main mt-2">
                <li class="nav-item"><a class="nav-link active menuLink" href="#settings" id='settings-menu' aria-current="page"><?php esc_html_e("Settings", "hbagency"); ?></a></li>
                <li class="nav-item"><a class="nav-link menuLink" href="#placements"  id='placements-menu' ><?php esc_html_e("Placements", "hbagency"); ?></a></li>
                <li class="nav-item"><a class="nav-link menuLink" href="#help"  id='help-menu' ><?php esc_html_e("Help", "hbagency"); ?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
</header>
<main>
	<section class="py-4 py-lg-5 bg-gradient-linear-primary--a150 text-white text-center">
		<div class="container-xl">
			  <h1 id="SECTION-TITLE" class="text-headline text-white mb-3"><?php esc_html_e("Settings", "hbagency")?></h1>
			  <p class="text-lead"></p>
		</div>
      </section>
	<div class="container mt-5">
		
		<div class="content" id="settings" style="display:block">
			<div class="row m-2 mb-3">
				<div class="col-6 mx-auto">
					<h5 style="display: inline"><?php esc_html_e("Status", "hbagency"); ?>:
					<?php
						$status = sanitize_text_field(get_option('hbagency_wp_website_status'));
						$statusClass = 'text-warning';
						switch ($status) {
							case 'WAITING_FOR_APPROVAL':
								$statusClass = 'bg-info';
								$status = __('WAITING FOR APPROVAL', 'hbagency');
								break;
							case 'APPROVED':
								$statusClass = 'bg-success';
								$status = __('APPROVED', 'hbagency');
								break;
							case 'NOT_APPROVED':
								$statusClass = 'bg-danger';
								$status = __('NOT APPROVED', 'hbagency');
								break;
						}
						?>
						<span class="h6 p-2 ml-2 rounded-pill text-white <?php echo esc_attr($statusClass); ?>"><?php echo esc_html($status); ?></span>
						<a href="#" onclick="javascript:hbagency_refreshStatus()"><i class="bi bi-arrow-clockwise"></i></a>	
					</h5>
				</div>
			</div>
			<form>
				<div class="row m-2  mb-3">
					<div class="col-6 mx-auto">
						<div class="form-check form-switch">
							  <input class="form-check-input" type="checkbox" role="switch" name="hb_enable_cmp" id="hb_enable_cmp" <?php echo get_option("hbagency_wp_cmp") ? 'checked' : '' ?> <?php echo get_option("hbagency_wp_has_cmp") ? '' : 'disabled' ?>>
							  <label class="form-check-label" for="hb_enable_cmp"><?php esc_html_e("Enable Consent Management Platform", "hbagency"); ?></label>
						</div>
					</div>
				</div>
				 <div class="row m-2  mb-3">
					<div class="col-6 mx-auto">
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" role="switch" name="hb_enable_cls" id="hb_enable_cls" <?php echo get_option("hbagency_wp_cls") ? 'checked' : '' ?>>
								<label class="form-check-label" for="hb_enable_cls"><?php esc_html_e("Set Fixed Height on Placements - Mitigate Impact on Cumulative Layout Shift Score", "hbagency"); ?></label>
							</div>
					</div>
				</div>

				<div class="row m-2">
					<div class="col-6 mx-auto">
						<div class="form-check form-switch">
							  <input class="form-check-input" type="checkbox" name="hb_enable_ads_txt" id="hb_enable_ads_txt" <?php echo get_option("hbagency_wp_enable_ads_txt") ? 'checked' : '' ?>>
							  <label class="form-check-label" for="hb_enable_ads_txt"><?php esc_html_e("Enable Ads.txt", "hbagency")?></label>
						</div>
					</div>
				</div>
				<div class="row m-2  mb-3">
					  <div class="col-6 mx-auto form-check">
					    <label class="form-label" for="additionalAdsTxtLines"><?php esc_html_e("Additional ads.txt lines. I.e. your google publisher code", "hbagency")?></label>
					    <textarea class="form-control" name="additionalAdsTxtLines"  rows="10" id="additionalAdsTxtLines"><?php echo esc_html(get_option('hbagency_wp_website_ads_txt_additional_lines')) ?></textarea>
						<span style="color: red" id="ads_txt_invalid"></span>
					  </div>
			        </div>
			        <div class="row m-2 mb-3">
			        	<div class="col-6 mx-auto">
					  		<a class ="btn btn-secondary w-100" id="hbagency_save_settings_button"><?php esc_html_e("Save", "hbagency")?></a>
					  </div>
			        </div>
			        <div class="row m-2 mb-3" style="padding-bottom:50px">
			       		<p id="hbagency_save_settings_message" class="text-center text-danger mb-1 mt-3 text-success " style="font-weight: 600;">&nbsp;</p>
			        </div>
        			<?php wp_nonce_field('hb_save_settings', 'hb_nonce'); ?>
			</form>
		</div>
		<div class="content" id="placements" style="display:none">
			<div class="row mb-4 justify-content-end">
				<div>
						<p id="hbagency_reload_placements_message" class="text-center text-danger mb-1 mt-3 text-success " style="font-weight: 600;">&nbsp;</p>

						<a id="hbagency_reload_placements" class="btn btn-secondary float-end"><?php esc_html_e("Reload placements", "hbagency")?></a>
						<?php wp_nonce_field('hb_reload_placements_nonce', 'hb_reload_nonce'); ?>
			  	</div>
			</div>
			<form id="hb_placements_form">
				<div class="row row-cols-sm-1 row-cols-lg-2 row-cols-md-2 g-4 justify-content-around mr-auto ml-auto mb-5">
					<?php
					$placements = get_option('hbagency_wp_website_placements');
					foreach($placements as $p) {
					?>
					<div class="col d-flex justify-content-center">
						 <div class="card w-100 h-100">
						 	<div class="text-center mt-5">
								<?php
								switch($p->type->id) {
									case 21:
									case 22:
								?>
								<?php
										break;
									case 23:
								?>
								<?php
										break;
									case 28:
								?>
									<div style="width: 100% !important; position: relative !important;">
										<img src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'img/response-frame-no-screen.svg' ?>" alt="interscroller frame" class="w-50">
										<video style="width: 15%; left: 33%; bottom: 22.5%; position: absolute !important" muted="" autoplay="" loop="" class="w-10">
											<source src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'video/video-1660208862.mp4'; ?>" type="video/mp4">
										</video>
										<video style="width: 8%; right: 26%; bottom: 9.5%; position: absolute !important" muted="" autoplay="" loop="">
											<source src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'video/video-1660208822.mp4'; ?>" type="video/mp4">	
										</video>
									</div>
								<?php
										break;
									case 40:
								?>
									<div class="d-flex justify-content-center" style="max-height: 167px;">
										<div class="grid-content interscroller--mobile-frame">
											<div class="ratio ratio-30x61">
												<div class="screen-wraper">
													<video muted="" autoplay="" loop="">
														<source src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'video/video-1660123657.mp4'; ?>" type="video/mp4">
													</video>
												</div>
											</div>
											<img class="w-100" src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'img/mobile-frame-no-screen.svg'; ?>" alt="interscroller frame">
										</div>
									</div>
								<?php
										break;
									default:
								?>	
									<img id="IMG-<?php echo esc_attr($p->type->id); ?>" src="<?php echo esc_url("https://www.hbagency.it/headerbiddingAgency/resources/assets/img/{$p->type->id}.png"); ?>" class="w-50"/>
						 		<?php
										break;
								}
								?></div> 
							<div class="card-body">
								<?php
								$description = '';
								switch($p->type->type) {
							  		case HBAGENCY_IN_PAGE:
							  		?>
									<div class="row gy-2 gx-3 align-items-center mb-3">
										<div class="col-auto">
								  			<span><?php esc_html_e("Insert an InArticle every", "hbagency"); ?></span>
							  			</div>
							  			
										<div class="col-auto">
											<label class="visually-hidden" for="C-<?php echo esc_attr($p->id) ?>-COUNT"><?php esc_html_e("Paragraph", "hbagency"); ?></label>
											<select class="form-select" id="C-<?php echo esc_attr($p->id) ?>-COUNT" name="C-<?php echo esc_attr($p->id) ?>-COUNT">

											<?php
												for($i = 1; $i <= 10; $i++) {
											?>
												<option value="<?php echo esc_attr($i); ?>" <?php selected(get_option('hbagency_wp_placement_' . $p->id . '_count'), $i); ?>><?php echo esc_html($i); ?></option>
											<?php
												}
											?>
											</select>
										</div>
										<div class="col-auto">
											<span><?php esc_html_e("paragraphs", "hbagency"); ?></span>
										</div>
									</div>
							  	<?php
							  		$description = __('Starting', "hbagency");
								  	case HBAGENCY_IN_ARTICLE:
							  	?>
							  	
									<div class="row gy-2 gx-3 align-items-center">
								  		<div class="col-auto">
								  			<span><?php echo !empty($description) ? esc_html($description) : esc_html_e('Place', "hbagency") ?></span>
							  			</div>
								  		<div class="col-auto">
											<label class="visually-hidden" for="C-<?php echo esc_attr($p->id); ?>-POS"><?php esc_html_e("Position", "hbagency"); ?></label>
											<select class="form-select" id="C-<?php echo esc_attr($p->id); ?>-POS" name="C-<?php echo esc_attr($p->id); ?>-POS">
												<option value="1" <?php selected(get_option('hbagency_wp_placement_' . $p->id . '_pos'), 1); ?>><?php esc_html_e("Before", "hbagency"); ?></option>
												<option value="2" <?php selected(get_option('hbagency_wp_placement_' . $p->id . '_pos'), 2); ?>><?php esc_html_e("After", "hbagency"); ?></option>
											</select>
										</div>
										<div class="col-auto">
											<span><?php esc_html_e("The", "hbagency"); ?></span>
										</div>
										<div class="col-auto">
											<label class="visually-hidden" for="C-<?php echo esc_attr($p->id); ?>-PAR"><?php esc_html_e("Paragraph", "hbagency"); ?></label>
											<select class="form-select" id="C-<?php echo esc_attr($p->id); ?>-PAR" name="C-<?php echo esc_attr($p->id); ?>-PAR">

											<?php
												for($i = 1; $i <= 20; $i++) {
											?>
												<option value="<?php echo esc_attr($i); ?>" <?php selected(get_option('hbagency_wp_placement_' . $p->id . '_par'), $i); ?>><?php echo esc_html($i); ?></option>
											<?php
												}
											?>
											</select>
										</div>
										<div class="col-auto">
											<span><?php esc_html_e("Paragraph", "hbagency"); ?></span>
										</div>
									</div>
							  	<?php
							  			break;
							  		case HBAGENCY_STICKY:
							  		case HBAGENCY_FIXED:
							  			break;
							  		case HBAGENCY_STANDARD:
							  		?>
									<div class="row">
							  			<div class="col-12 text-center">
										  <p class="h6 text-primary"><?php echo esc_html("[hbagency id='{$p->id}']"); ?></p>
										</div>
									</div>
							  		<?php	
							  		break;
							  		
						  		}
							 	 ?>
							</div>
						 	<div class="card-footer">
								<div class="ml-2 form-check form-switch">
									<input class="form-check-input" type="checkbox" name="C-<?php echo esc_attr($p->id); ?>" id="C-<?php echo esc_attr($p->id); ?>" <?php checked(get_option("hbagency_wp_placement_" . $p->id)); ?>>
									<label class="form-check-label" for="C-<?php echo esc_attr($p->id); ?>"><?php echo esc_html($p->name); ?></label>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
						if (count($placements) % 2 !== 0) {
					?>
					<div class="col d-flex justify-content-center"></div>
					<?php
						}
					?>

				</div>
				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<?php
							if(count($placements) > 0) {
						?>
							<button type="submit" id="hbagency_save_placements_settings" class="btn btn-secondary w-25 float-end mb-5"><?php esc_html_e("Save", "hbagency"); ?></button>
						<?php
							}
						?>
					</div>
					<div class="col-12 d-flex justify-content-center">
						<p id="hbagency_placements_message"></p>
					</div>
				</div>
				<?php wp_nonce_field('hb_save_placements', 'hb_placement_nonce'); ?>
			</form>
		</div>
		<div class="content" id="help" style="display:none; padding-bottom:30px;">
			<?php include('admin_help.php') ?>
		</div>
	</div>
</main>
<footer class="footer-main bg-gradient-linear-primary-sm py-4">
  <div class="container-xl">
    <div class="row">
      <div class="col-6 col-md-4"><img class="img-fluid mb-r13" src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'img/hb-agency-logo-white.svg'; ?>" alt="HB agency logo footer">
        <p class="text-white fs-xs fw-light copyright">© 2018 HBAgency. Made&nbsp;in&nbsp;Sardinia<br>All Rights reserved</p>
      </div>
      <div class="col-md-4 d-none d-md-flex">
        <ul class="nav fw-bold nav-footer">
       
        </ul>
      </div>
      <div class="col-6 col-md-auto ms-auto">
        <ul class="nav gap-r13 social-list">
          <li class="nav-item"><a class="nav-link social-list__link" href="#" style="--bs-black-rgb: 59, 89, 152;"><span class="icon bi bi-facebook"></span></a></li>
          <li class="nav-item"><a class="nav-link social-list__link" href="#" style="--bs-black-rgb: 0, 122, 185;"><span class="icon bi bi-linkedin"></span></a></li>
        </ul>
        <p class="text-white fs-xs fw-light mb-0 powered-by">Powered by ICardoo DM srl VAT IT02756180903</p>
      </div>
    </div>
  </div><img class="footer-main__bg" src="<?php echo esc_url(plugin_dir_url(__DIR__)) . 'img/shape.svg'; ?>" alt="">
</footer>
</div>


