<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.asc27.com/
 * @since      1.0.0
 *
 * @package    Asimov
 * @subpackage Asimov/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Asimov Setup Wizard</title>
	<?php do_action( 'admin_print_styles' ); ?>
	<?php do_action( 'admin_print_scripts' ); ?>
	<?php do_action( 'admin_head' ); ?>
</head>

<div class="container">
        <div class="row justify-content-md-center p-5" >
            <h3><?php _e('Module Settings', 'asimov-plugin'); ?></h3>
        </div>
        <div class="row">
            <div class="col col-lg-2">
            </div>
            <div class="col col-lg-8">
				<?php
				function hashid($alg, $str){
					$maxlen = 15;

					$suf = 'X'.$str;
					$suflen = strlen($suf);

					return strtoupper(substr(hash($alg, $str), -($maxlen-$suflen)).$suf);
				}
				$settings = get_option('asimov_settings', null);
				if( $settings !== null ){
					$conf_status = 0;
					if( $settings->view_id )
						$conf_status = 1;
					if( $settings->articles_processed)
						$conf_status = 2;
					?>
					<div class="card">
                    	<div class="card-body rounded ">
                        	<form>
                        	    <div class="form-group">
                        	        <div class="row text-center">
                        	            <div class="col-12">
                        	                <div class='vertical-align'>
												<?php
												switch( $conf_status ){
													case 0:
														?>
														<img class="col-8 img img-fluid m-5" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/asimov_notok@1x.png'; ?>">
														<?php
														break;
													case 1:
														?>
														<img class="col-8 img img-fluid m-5" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/asimov_waiting@1x.png'; ?>">
														<?php
														break;
													case 2:
														?>
														<img class="col-8 img img-fluid m-5" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/asimov_ok@1x.png'; ?>">
														<?php
														break;
												}
												?>
                        	                    <h6 class="text-lightgrey" style="letter-spacing: 4px;"><?php _e("PLUGIN STATUS", 'asimov-plugin'); ?></h6>
                        	                    <div class='btns'>
                        	                      <label>
                        	                        <input disabled <?php echo( $conf_status === 0? 'checked':'' );?> name='button-group' type='radio'  value='item'>
                        	                          <span class='btn first'><?php _e("WARNING", 'asimov-plugin'); ?></span>
                        	                        </input>
                        	                      </label>
                        	                      <label>
                        	                        <input disabled <?php echo( $conf_status === 1? 'checked':'' );?> name='button-group' type='radio'  value='other-item'>
                        	                          <span class='btn second'><?php _e("WAITING", 'asimov-plugin'); ?></span>
                        	                        </input>
												  </label>
												  <!---
                        	                      <label>
                        	                        <input disabled name='button-group' type='radio'  value='other-item'>
                        	                          <span class='btn third'>STANDARD</span>
                        	                        </input>
												  </label>
												  --->
                        	                      <label>
                        	                        <input disabled <?php echo( $conf_status === 2? 'checked':'' );?> name='button-group' type='radio'  value='third'>
                        	                          <span class='btn last'><?php _e("OK", 'asimov-plugin'); ?></span>
                        	                        </input>
                        	                      </label>
                        	                    </div>
                        	                </div>
                        	            </div>
                        	        </div>
                        	    </div>
                        	    <div class="row m-5">
                        	        <div class="col offset-2 col-8 text-center text-lightgrey">
										<?php
										switch( $conf_status ){
											case 0:
												?>
												<p>
													<?php _e("Per utilizzare ASIMOV, devi completare la configurazione guidata.", 'asimov-plugin'); ?>
													<a href="<?php echo menu_page_url($this->plugin_name.'-wizard', false) . '&ref=' . $settings->user_id . '&sub=' . $settings->subscription_id; ?>" class="btn btn-info btn-block not-configured"><i class="fas fa-question-circle"></i> <?php _e("Inizia la configurazione", 'asimov-plugin'); ?></a>
												</p>
												<?php
												break;
											case 1:
												?>
												<p>
													<?php _e("ASIMOV sta processando le metriche da Google Analytics.", 'asimov-plugin'); ?>
													<br>
													<a target="_blank" href="https://imasimov.com/en/faq.html#collapseFifteen" class="btn btn-info btn-block on-activation"><i class="fas fa-question-circle"></i> <?php _e("Cosa significa?", 'asimov-plugin'); ?> </a>
												</p>
												<?php
												break;
											case 2:
												?>
                        	            		<p>
													<?php _e("ASIMOV è configurato. Crea il tuo primo articolo con Intelligenza Artificiale", 'asimov-plugin'); ?>
													<a target="_blank" href="<?php echo admin_url('post-new.php'); ?>" class="btn btn-info btn-block activated"><i class="fas fa-question-circle"></i> <?php _e("Inizia a scrivere i tuoi articoli con AI", 'asimov-plugin'); ?></a>
												</p>
												<?php
												break;
										}
										?>
                        	        </div>
                        	    </div>
                        	</form>
                    	</div>
                	</div>
					<div class="card">
						<div class="card-header yellow text-center">
							<b><?php _e("Profile", 'asimov-plugin'); ?></b>
						</div>
						<div class="card-body">
							<h5 class="card-title"><?php _e("Welcome to ASIMOV!", 'asimov-plugin'); ?></h5>
							<p class="card-text"><?php _e("Account and Subscription information", 'asimov-plugin'); ?></p>
							<div class="dropdown-divider" style="padding-top: 30px; "></div>
							<form>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label for="account"><?php _e("ACCOUNT", 'asimov-plugin'); ?></label>
											<input disabled type="text" class="form-control" id="account"
												aria-describedby="account_help" placeholder="XXXXX-12_XXYYY" value=<?php echo '"' . hashid('md4', $settings->user_id) . '"';?>>

										</div>
										<div class="col">
											<label for="profile"><?php _e("SUBSCRIPTION", 'asimov-plugin'); ?></label>
											<input disabled type="text" class="form-control" id="profile"
												aria-describedby="profile_help" placeholder="XXXXX-12_XXYYY" value=<?php echo '"' . hashid('md5', $settings->subscription_id) . '"';?>>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<?php
					if( $settings->view_id ) {
						?>
						<div class="card">
							<div class="card-header yellow text-center">
								<b><?php _e("Website Profile", 'asimov-plugin'); ?></b>
							</div>
							<div class="card-body">
								<p class="card-text"><?php _e("Metrics configuration parameters.", 'asimov-plugin'); ?></p>
								<div class="dropdown-divider" style="padding-top: 30px; "></div>
								<form>
									<div class="form-group">
										<div class="row">
											<div class="col">
												<label for="ua"><?php _e("Website ID", 'asimov-plugin'); ?></label>
											</div>

											<div class="col text-center">
												<input disabled type="text" class="form-control" id="ua"
													aria-describedby="ua_help" placeholder="UA-XX XX XXX XX" value=<?php echo '"' . $settings->view_id . '"';?>>
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>
						<?php
					}
					?>
				<?php
				} else {
				?>
					<div class="card">
						<div class="card-header yellow text-center">
							<b><?php _e("Setup Wizard", 'asimov-plugin'); ?></b>
						</div>
						<div class="card-body">
							<p class="card-text text-center"><?php _e("To start using ASIMOV, run the Setup Wizard", 'asimov-plugin'); ?></p>
							<div class="dropdown-divider" style="padding-top: 30px; "></div>
							<div class="text-center"><img class="text-center" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/wizard_image.jpg'; ?>" width="70%"></div>
							<br><br>
							<div class="row">
								<div class="col text-center">
									<button class="btn btn-lg  btn-warning " onclick="window.location.href = '<?php menu_page_url($this->plugin_name.'-wizard', true); ?>'"><i
										class="fas fa-magic"></i> <?php _e("Run Setup Wizard!", 'asimov-plugin'); ?></button>
									
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>
                <!-- Prima SETUP WIZARD-->
                <br clear="all">
            </div>
            <div class="col col-lg-2">
            </div>
        </div>
        <div class="text-center p-5"><img src="<?php echo plugin_dir_url( __FILE__ ) . '../images/logo_asimov_nero_orizz@3x.png'; ?>" width="13%"></div>
        
    </div>
