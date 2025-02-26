<?php

/**
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

	<meta name="viewport" content="width=device-width"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Asimov Setup Wizard</title>
	<?php do_action( 'admin_print_styles' ); ?>
	<?php do_action( 'admin_print_scripts' ); ?>
	<?php do_action( 'admin_head' ); ?>
</head>

<!-- MultiStep Form -->
<div id="asimov-container" class="container">
	<div class="row p-5">
		<div class="col col-lg-2">
		</div>
		<div class="col col-lg-8">
			<div class="card">
				<div class="card-header yellow text-center">
					<b><?php _e("Module configuration", "asimov-plugin"); ?></b>
				</div>
				<div class="card-body">
					<p class="card-text text-center"><?php _e("Follow the steps to correctly set up the module.", "asimov-plugin"); ?></p>
				</div>
				<div class="row">
					<div class="col-md-12 mx-0">
						<div id="msform">
							<!-- progressbar -->
							<ul id="progressbar">
								<li class="active" id="registrazione"><strong> <?php _e("Log In", "asimov-plugin"); ?></strong></li>
								<li id="account"><strong><?php _e("Instructions", "asimov-plugin"); ?></strong></li>
                                <li id="abbonamento"><strong><?php _e("Add Users", "asimov-plugin"); ?></strong></li>
                                <li id="configurazione"><strong><?php _e("Settings", "asimov-plugin"); ?> </strong></li>
                                <li id="completo"><strong><?php _e("View ID", "asimov-plugin"); ?></strong></li>
								<li id="completo"><strong><?php _e("Completed!", "asimov-plugin"); ?></strong></li>
							</ul>
							<!-- STEP 1 -->
							<fieldset id="fieldset-account">
								<div class="text-center"><img class="text-center"
										src="<?php echo plugin_dir_url( __FILE__ ) . '../images/wizard_image.jpg'; ?>" width="70%"></div>
								<br>
								<?php
								if (!isset($_GET["ref"])) {
									?>
									<p class="p-3 text_lightgrey">By signing in you agree to our <a href="https://www.imasimov.com/privacy_policy.html"; ?>"> Privacy Policy</a> </p>
									<div class="col offset-1 col-10">
										<a id="goauth2" class="btn btn-block btn-social btn btn-google" style="color: white;">
											<i class="fab fa-google-plus-square"></i> <?php _e("Log in with Google", "asimov-plugin"); ?>
										</a>
										<br>
									</div>
									<?php
								} else {
									?>
									<h3><?php _e("You have correctly logged in into ASIMOV!", "asimov-plugin"); ?></h3>
									<br>
									<p class=""><?php _e("Continue following the setup procedure to configure the plugin", "asimov-plugin"); ?></p>
									<?php
								}
								?>
								<br>
								<hr class="hr-text" data-content="OR">
								<?php
								if (isset($_GET["ref"]) && isset($_GET["sub"])) {
									?>
									<button type="button" name="next" class="next btn btn-lg  btn-warning "><i
										class="fas fa-arrow-right"></i> <?php _e("NEXT", "asimov-plugin"); ?></button>
									<?php
								}
								?>
							</fieldset>
							<!-- STEP 2 -->
                            <fieldset>
                                <h2><?php _e("Google Analytics Configuration Setup", "asimov-plugin"); ?></h2>
                                <br>
                                <div class="col offset-1 col-10">
                                    <p style="color: lightslategrey;"><?php _e("simov it's an Artificial Intelligence tool that is able to provide
                                        tailored suggestions and hints based on YOUR audience and on YOUR past contents.", "asimov-plugin"); ?><br><br><?php _e("To fully understand                                    what SUCCESS really mean in YOUR world, Asimov needs to learn from the past, so we strongly suggest you to let
                                        Asimov have a read-only access to your Google Analytics data. Without this access, ASIMOV will provide you suggestions that
                                        cannot be aware about your specific audience's wishes and habits.", "asimov-plugin"); ?><br><br>
                                        <b><?php _e("Enter ASIMOV SERVICE ACCOUNT", "asimov-plugin"); ?></b><br>

                                    <img class="img mb-3 mt-2 img-fluid" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/service_account@2x.png'; ?>">
                                        <b><?php _e("Enable the demographic data report", "asimov-plugin"); ?></b> <br>
                                        <img class="img mb-3 mt-2 img-fluid" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/enable_reports@2x.png'; ?>">
                                        <b><?php _e("Enter your VIEW ID", "asimov-plugin"); ?></b><br>
                                        <img class="img mb-3 mt-2 img-fluid" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/id_vista@2x.png'; ?>">
                
                                        <?php _e("This way, but most importantly respecting your privacy, ASIMOV will be able to study your blog metrics, develop a specific suggestion model and thus increase the success of your articles.", "asimov-plugin"); ?></p>



                                    <h4 style="text-transform:uppercase; font-size: 1.3rem; letter-spacing: 0px;">
                                        <?php _e("Don't panic, we're here!", "asimov-plugin"); ?></h4>
                                    <p style="color: lightslategrey;"><?php _e("Next, you will find some video's guides that show you the step
                                        by step configuration process for the plugin.", "asimov-plugin"); ?></p>

                                    <h3 style="text-transform:uppercase; font-size: 1.3rem; letter-spacing: 0px;">
                                        <?php _e("Are you ready?", "asimov-plugin"); ?></h3>
                                </div>

                                <br><br>
                                <hr class="hr-text" data-content="OR">
                                <button type="button" name="previous" class="previous btn btn-lg  btn-warning "><i
                                        class="fas fa-arrow-left"></i> <?php _e("BACK", "asimov-plugin"); ?></button>
                                <button type="button" name="next" class="next btn btn-lg  btn-warning "><i
                                        class="fas fa-arrow-right"></i> <?php _e("NEXT", "asimov-plugin"); ?></button>

                            </fieldset>
							<!-- STEP 2 -->
							<!-- STEP 3 -->
                            <fieldset>
                                <p style="text-transform:uppercase; font-size: 0.8rem;"><?php _e("1 STEP", "asimov-plugin"); ?></p>
                                <h2><?php _e("SERVICE ACCOUNT", "asimov-plugin"); ?></h2>
                                <div class="col offset-1 col-10">
                                    <img class="img mb-3 mt-2 img-fluid" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/service_account@2x.png'; ?>">
                                    <p style="color: lightslategrey;"><?php _e("In your Google Analytics control panel, access the 
                                        \"administrator\" tab.", "asimov-plugin"); ?> <br><br>
                                        <?php _e("Inside the \"VIEW\" section, open the \"View Management\"
                                        and add a new user, you can copy the address down here just by
                                        clicking on it.", "asimov-plugin"); ?> </p>
                                    <div class="form-group">
                                        <button class="btn btn-warning" id="ga-service-clip" value="asimov-wp@gaasimov.iam.gserviceaccount.com">asimov-wp@gaasimov.iam.gserviceaccount.com <i class="far fa-copy"></i></button>
                                    </div>
                                	<br>
									<div class="text-center">
										<?php
											$url = $this->asimovApi->get_remote_url() . "/asimov/ga_service_video?lang=" . get_locale();
											$request = wp_remote_get($url);
											$response = json_decode(wp_remote_retrieve_body($request));

											$video_url = "https://www.youtube.com/watch?v=3BTdFS-09jA";
											if( $response )
												$video_url = $response->message;
											echo wp_oembed_get( $video_url, array('width' => 420, 'height' => 315) );
										?>
									</div>
                                    <p style="color: lightslategrey;font-size: 0.6rem;"><?php _e("GO TO: ADMIN PAGE > View
                                        User Management > Add Users", "asimov-plugin"); ?></p>
                                    <p>
                                    </p>
                                </div>
                                <br><br>
                                <hr class="hr-text" data-content="OR">
                                <button type="button" name="previous" class="previous btn btn-lg  btn-warning "><i
                                        class="fas fa-arrow-left"></i> <?php _e("BACK", "asimov-plugin"); ?></button>
                                <button type="button" name="next" class="next btn btn-lg  btn-warning "><i
                                        class="fas fa-arrow-right"></i> <?php _e("NEXT", "asimov-plugin"); ?></button>
                            </fieldset>
                            <!-- STEP 3 -->
                            <!-- STEP 4 -->
                            <fieldset>
                                <p style="text-transform:uppercase; font-size: 0.8rem;"><?php _e("2 STEP", "asimov-plugin"); ?></p>
                                <h2><?php _e("Enable Demographics", "asimov-plugin"); ?></h2>
                                <div class="col offset-1 col-10">
                                    <img class="img mb-3 mt-2 img-fluid" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/enable_reports@2x.png'; ?>">
                                    <p style="color: lightslategrey;"><?php _e("Move to the PROPERTY column, click Properties Settings. Under Advertising Features, set Enable Demographics and Interests Reports to ON and click Save.", "asimov-plugin"); ?></p>
                                	<br>
									<div class="text-center">
										<?php
											$url = $this->asimovApi->get_remote_url() . "/asimov/settings_video?lang=" . get_locale();
											$request = wp_remote_get($url);
											$response = json_decode(wp_remote_retrieve_body($request));

											$video_url = "https://www.youtube.com/watch?v=-IKW6weY_bw";
											if( $response )
												$video_url = $response->message;
											echo wp_oembed_get( $video_url, array('width' => 420, 'height' => 315) );
										?>
									</div>
                                    <p style="color: lightslategrey;font-size: 0.6rem;"><?php _e("GO TO: ADMIN PAGE >
                                        Property Settings > Enable Demographics and Interests reporting", "asimov-plugin"); ?></p>
                                    <p>
                                    </p>
                                </div>
                                <br><br>
                                <div class="text-center"></div>
                                <br><br>
                                <hr class="hr-text" data-content="OR">
                                <button type="button" name="previous" class="previous btn btn-lg  btn-warning "><i
                                        class="fas fa-arrow-left"></i> <?php _e("BACK", "asimov-plugin"); ?></button>
                                <button type="button" name="next" class="next btn btn-lg  btn-warning "><i
                                        class="fas fa-arrow-right"></i> <?php _e("NEXT", "asimov-plugin"); ?></button>
                            </fieldset>
                            <!-- STEP 4 -->
                            <!-- STEP 5 -->
							<fieldset id="fs-view-id">
                                <p style="text-transform:uppercase; font-size: 0.8rem;"><?php _e("3 STEP", "asimov-plugin"); ?></p>
                                <h2><?php _e("VIEW ID", "asimov-plugin"); ?></h2>
                                <div class="col offset-1 col-10">
                                    <img class="img mb-3 mt-2 img-fluid" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/id_vista@2x.png'; ?>">
                                    <p style="color: lightslategrey;"><?php _e("To complete the procedure, go to the View Settings in the VIEW column, copy your View ID and paste in the bar down here.", "asimov-plugin"); ?></p>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><?php _e("VIEW ID", "asimov-plugin"); ?></div>
                                        </div>
                                        <input type="text" class="form-control" id="ai_code"
                                            placeholder="<?php _e("Paste here your VIEW ID", "asimov-plugin"); ?>">
                                    </div>
                                    <a class=" m-2 link-small-blue" data-toggle="modal" data-target="#error-analytics"><i class="fas fa-pen-nib"></i> <?php _e("If you cannot find your VIEW ID, click here for more information.", "asimov-plugin"); ?></a>
                                	<br>
									<div class="text-center">
										<?php
											$url = $this->asimovApi->get_remote_url() . "/asimov/view_id_video?lang=" . get_locale();
											$request = wp_remote_get($url);
											$response = json_decode(wp_remote_retrieve_body($request));

											$video_url = "https://www.youtube.com/watch?v=3kasaDZ0yrA";
											if( $response )
												$video_url = $response->message;
											echo wp_oembed_get( $video_url, array('width' => 420, 'height' => 315) );
										?>
									</div>
                                    <p style="color: lightslategrey;font-size: 0.6rem;"><?php _e("GO TO: ADMIN PAGE >
                                        Property Settings > Enable Demographics and Interests reporting", "asimov-plugin"); ?></p>
                                    <p>
                                    </p>
                                </div>
                                <br><br>
								<hr class="hr-text" data-content="OR">
								<button type="button" name="previous" class="previous btn btn-lg  btn-warning "><i
										class="fas fa-arrow-left"></i> <?php _e("BACK", "asimov-plugin"); ?></button>
								<button id="ga-conf" type="button" name="next" class="btn btn-lg  btn-warning "><i
										class="fas fa-arrow-right"></i> <?php _e("NEXT", "asimov-plugin"); ?></button>

							</fieldset>
							<!-- STEP 5 -->
							<!-- STEP 6 -->
							<fieldset>
								<h2><?php _e("Perfect. Now Everything is ready.", "asimov-plugin"); ?></h2>
								<br><br>
								<div class="col offset-1 col-10">
									<button id="wizard-end-btn" type="button" name="previous"
										class="previous btn btn-lg btn-block  btn-warning ">
										<?php _e("START ASIMOV", "asimov-plugin"); ?></button>

								</div>
								<br><br>
								<hr class="hr-text" data-content="OR">
								<button type="button" name="previous" class="previous btn btn-lg  btn-secondary "><i
										class="fas fa-arrow-left"></i> <?php _e("BACK", "asimov-plugin"); ?></button>
							</fieldset>
							<!-- STEP 5 -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col col-lg-2">
		</div>
	</div>
	<div class="text-center p-2"><img src="<?php echo plugin_dir_url( __FILE__ ) . '../images/logo_asimov_nero_orizz@3x.png'; ?>" width="13%"></div>
</div>

<div class="modal fade" id="analytics-success" tabindex="-1" role="dialog" aria-labelledby="ticketASIMOVlabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12 mx-auto text-center ">
                    <h5 class="mt-5" style="font-weight: 700;"><?php _e("Well Done! Now ASIMOV is ready.", "asimov-plugin"); ?></h5>
                    <p class="link-small-blue mb-5"><?php _e("Scopri subito la potenza dell'intelligenza artificiale", "asimov-plugin"); ?></p>
                    <img class="col-8 img img-fluid" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/asimov_ok@1x.png'; ?>">
                    <div class="row m-5">
                        <div class="col text-center text-lightgrey">
                            <p><?php _e("ASIMOV è configurato. Crea il tuo primo articolo con Intelligenza Artificiale", "asimov-plugin"); ?><a target="_blank" href="<?php echo admin_url('post-new.php'); ?>" class="btn btn-info btn-block activated"><i class="fas fa-question-circle"></i>
                                <?php _e("Inizia a scrivere i tuoi articoli con AI", "asimov-plugin"); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php _e("Close", "asimov-plugin"); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="error-analytics" tabindex="-1" role="dialog" aria-labelledby="ticketASIMOVlabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12 mx-auto text-center ">
                    <h5 class="m-5" style="font-weight: 700;"><?php _e("Edit your Google Analytics Properties.", "asimov-plugin"); ?></h5>
                    <div class="row ">
                        <div class="col text-center text-lightgrey">
                            <p>
                                <?php _e("If you can't find your VIEW ID, it's probably because Google Analytics has not been configured correctly to send metrics to ASIMOV.", "asimov-plugin"); ?>
                                <br><br>
                                <?php _e("To do so, simply follow this simple video, which will guide you to the correct configuration of your Google Analytics account.", "asimov-plugin"); ?>
                            </p>
							<div class="text-center">
								<?php
									$url = $this->asimovApi->get_remote_url() . "/asimov/view_create_video?lang=" . get_locale();
									$request = wp_remote_get($url);
									$response = json_decode(wp_remote_retrieve_body($request));

									$video_url = "https://www.youtube.com/watch?v=N2Q7dfVj0oE";
									if( $response )
										$video_url = $response->message;
									echo wp_oembed_get( $video_url, array('width' => 420, 'height' => 315) );
								?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php _e("Ok, I have got my VIEW ID!", "asimov-plugin"); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="analytics-no-data" tabindex="-1" role="dialog" aria-labelledby="ticketASIMOVlabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12 mx-auto text-center ">
                    <h5 class="mt-5" style="font-weight: 700;"><?php _e("Ok, configurazione terminata!", "asimov-plugin"); ?> </h5>
                    <p class="link-small-blue mb-5"><?php _e("ASIMOV sta processando le tue metriche da Google Analytics.", "asimov-plugin"); ?></p>
                    <img class="col-8 img img-fluid mb-5" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/asimov_waiting@1x.png'; ?>">
                    <div class="row">
                        <div class="col text-center text-lightgrey">
                            <p>
                                <?php _e("ASIMOV sta processando le metriche da Google Analytics.", "asimov-plugin"); ?>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php _e("Close", "asimov-plugin"); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="config-error" tabindex="-1" role="dialog" aria-labelledby="ticketASIMOVlabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12 mx-auto text-center ">
                    <h5 class="mt-5" style="font-weight: 700;"><?php _e("Oh No! Something went wrong.", "asimov-plugin"); ?></h5>
                    <p class="link-small-blue mb-5"><?php _e("Ricontrolla tutti i passaggi richiesti e riprova.", "asimov-plugin"); ?></p>
                    <img class="col-10 mb-4 img img-fluid" src="<?php echo plugin_dir_url( __FILE__ ) . '../images/asimov_response_error@1x.png'; ?>">
                    <p class="m-2 text-lightgrey"><?php _e("ASIMOV was unable to confirm that your configuration was successful. Do you want to try again or contact us for support?", "asimov-plugin"); ?></p>
                    <a id="restart-conf" class="btn btn-warning m-2 text-black"><i class="fas fa-exchange-alt"></i> <?php _e("TRY AGAIN", "asimov-plugin"); ?></a>
                    <a target="_blank" class="btn btn-light m-2 text-black" href="https://imasimov.com/ticket.html"><i class="far fa-life-ring"></i> <?php _e("ASK FOR HELP", "asimov-plugin"); ?></a>
                    <br class="mb-5">
                    <!--- <a class="mb-5 link-small-blue" data-target="#"> <i class="fas fa-info"></i> If you have problem to find VIEW ID, click here! </a> --->
                    <p class="text-black" style="color: black;"></p>
                    <hr>
                    <p class="text-lightgrey">
                        <span class="badge badge-light"><?php _e("NOT RACCOMENDED", "asimov-plugin"); ?></span>
                        <br><br>
                        <?php _e("If you don't want to complete the setup, you can still use a STANDARD suggestion template. This way you will receive general suggestions from ASIMOV, but not based on your blog's data and readers.", "asimov-plugin"); ?>
                    </p>
                    <a class="m-2 btn btn-info" id="force-standard-models"><i class="fas fa-cube"></i> <?php _e("I know, i want to continue without Personal Mode", "asimov-plugin"); ?> </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php _e("Close", "asimov-plugin"); ?></button>
            </div>
        </div>
    </div>
</div>