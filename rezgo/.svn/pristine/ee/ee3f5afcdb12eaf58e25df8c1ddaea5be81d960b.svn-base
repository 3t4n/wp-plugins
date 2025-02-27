<?php
	$trans_num = $site->decode($_REQUEST['trans_num']);
	if ($_SESSION['txid'] == $trans_num) $site->sendTo($site->base);

	$order_bookings = $site->getBookings('t=order_code&q='.$trans_num);
	if(!$order_bookings) $site->sendTo($site->base);

	$company = $site->getCompanyDetails();
	$rzg_payment_method = 'None';
	$gateway_id = (string)$company->gateway_id;
	$tz_offset = $company->time_format;

	// non-open date date_selection elements
	$booking_total = 0;
	$has_insurance = 0;
	$booking_completed_time;
	$booking_dates = array();
	$booking_items = array();

	$booking_email = (string)$order_bookings[0]->email_address;

	foreach($order_bookings as $booking) {
		$booking_total += $booking->overall_total;

		// save purchased timestamp
		$booking_completed_time = (int)$booking[0]->date_purchased_local;

		if ($gateway_id == 'tmt'){

			$tmt_date = $booking->date;
			array_push($booking_dates, (string)$tmt_date);
			array_push($booking_items, (string)$booking->tour_name .' - '. $booking->option_name);
		}
		if ((int)$booking->ticket_guardian === 1) $has_insurance++;
	}

	$now = time();
	$expires = $booking_completed_time+3600;

	// get remaining time
	$time_remaining = $expires - $now;
	$minutes = floor(($time_remaining / 60) % 60);
	$seconds = $time_remaining % 60;

	$expired = $expires < $now;

	// TICKET GUARDIAN -->
	$tg_supported_currencies = array('USD', 'CAD', 'GBP', 'AUD', 'MXN', 'JPY', 'BRL', 'EUR');
	$tg_info = [];
	$tg_items = [];

	$tg_display_currency = 0;

	// save information to submit to TG
	$tg_info['order_code'] .= (string)$order_bookings[0]->order_code;
	$tg_info['first_name'] .= (string)$order_bookings[0]->first_name;
	$tg_info['last_name'] .= (string)$order_bookings[0]->last_name;
	$tg_info['address_1'] .= (string)$order_bookings[0]->address_1;
	$tg_info['address_2'] .= (string)$order_bookings[0]->address_2;
	$tg_info['city'] .= (string)$order_bookings[0]->city;
	$tg_info['stateprov'] .= (string)$order_bookings[0]->state_prov;
	$tg_info['country'] .= (string)$order_bookings[0]->country;
	$tg_info['postal_code'] .= (string)$order_bookings[0]->postal_code;
	$tg_info['phone'] .= (string)$order_bookings[0]->phone_number;
	$tg_info['email'] .= (string)$order_bookings[0]->email_address;

	$b = 0;
	foreach ($order_bookings as $booking) {

		$tg_items[$b]['name'] = (string)$booking->tour_name . ' - ' . $booking->option_name;
		$tg_items[$b]['reference_number'] = (string)$booking->trans_num;
		$tg_items[$b]['cost'] = (float)$booking->sub_total;

		$tg_items[$b]['customer']['first_name'] = (string)$booking->first_name;
		$tg_items[$b]['customer']['last_name'] = (string)$booking->last_name; 
		$tg_items[$b]['customer']['email'] = (string)$booking->email_address; 
		$tg_items[$b]['customer']['phone'] = (string)$booking->phone_number; 

		$b++;
	}

	$tg_required_info = $tg_info['first_name'] && $tg_info['last_name'] && $tg_info['email'] ? 1 : 0;

	$currency_base = strtoupper($company->currency_base);

	if(in_array($currency_base, $tg_supported_currencies) && $company->ticketguardian) {
		$tg_display_currency = $currency_base;
	}

	$tg_limit = ($booking_total >= '25' && $booking_total <= '2500') ? 1 : 0; 

	$tg_enabled = ( $tg_display_currency !== 0
					&& $tg_required_info
					&& in_array($currency_base, $tg_supported_currencies)
					&& $tg_limit ) ? 1 : 0;
?>

<!-- clear all previously stored form data in local storage -->
<script> window.localStorage.clear(); </script>
<script type="text/javascript" src="<?php echo $site->path; ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $site->path; ?>/js/jquery.form.js"></script>

<div class="container-fluid rezgo-container rezgo-booking-thankyou-container">
	<div class="jumbotron rezgo-booking"> 

		<div class="booking-thankyou-wording-wrapper flex-row align-items-center justify-content-around">
			<div id="booking-thankyou-wording-container">
				<i class="fad fa-badge-check" id="badge"></i>

				<p id="rezgo-booking-thankyou" class="gradient-text"><span>Thank You!</span></p>
				<p id="rezgo-booking-emailed"><span>We've sent confirmation details to <?php echo $booking_email; ?></span></p>
				
				<div class="text-center" style="border-top: 1px solid #ddd; padding-top: 20px;">
					<?php 
						$booking_summary_link = $site->base.'/complete/'.$site->encode($trans_num);
						$booking_itinerary_link = $site->base.'/itinerary/'.$site->encode($trans_num);
					?>
					<button class="rezgo-booking-thankyou-cta" onclick="window.open('<?php echo $booking_summary_link; ?>',); return false;"><i class="far fa-file-alt"></i>&nbsp;&nbsp;View Order</button>
					<button class="rezgo-booking-thankyou-cta" onclick="window.open('<?php echo $booking_itinerary_link; ?>',); return false;"><i class="far fa-file-alt"></i>&nbsp;&nbsp;View Itinerary</button>
				</div>
			</div>
			
			<div class="thankyou-list-image-wrapper">
				<div id="booking-thankyou-list-container" class="div-order-booking">
					<h3 id="rezgo-thankyou-summary" class="rezgo-thankyou-summary">
						<span>Your Order</span>
					</h3>
					
					<?php foreach($order_bookings as $booking) { ?>
						<?php $site->readItem($booking); ?>
			
						<div class="thankyou-single-order-item">
							<i class="far fa-check-circle" style="color:var(--rezgo-orange);"></i>
							<p class="single-item">
								<span class="rezgo-thankyou-page-item-<?php echo esc_attr($booking->item_id); ?>">
									<?php echo esc_html($booking->tour_name); ?> - <?php echo esc_html($booking->option_name); ?>
								</span>
							</p>
							<p class="single-item-date">
								booked for
								<span class="rezgo-thankyou-page-booked-for-date-<?php echo esc_attr($booking->item_id); ?>">
									<?php echo (string)$booking->date_formatted !== 'open' ? date((string) $company->date_format, (int) $booking->date) : 'Open Date'; ?> 
								</span>
								<span class="rezgo-thankyou-page-booked-for-time-<?php echo esc_attr($booking->item_id); ?>">
									<?php echo $site->exists($booking->time) ? 'at ' .strtoupper($booking->time) : ''; ?>
								</span>
							</p>
						</div>

					<?php } ?>
				</div>
			</div>
		</div> <!--flex-row -->

		<?php if ($tg_enabled) { ?>
			
			<script>
				var split_total = new Array();
				let now = new Date(<?php echo $expires; ?> * 1000);

				<?php $c = 0;

				foreach($order_bookings as $booking) { ?>
					split_total[<?php echo $c; ?>] = '<?php echo $booking->overall_total; ?>';
				<?php $c++; } ?>

				//tg item prices for quote
				tg_booking_prices = split_total.slice(0);
				
				// filter out empty elements
				let tg_items = [];
				for (let i = 0; i < tg_booking_prices.length; i++) {
					if (tg_booking_prices[i]) {
						tg_items.push(tg_booking_prices[i]);
					}
				}

				<?php if (!$expired) { ?>
				tg('configure', {
					apiKey: '<?php echo REZGO_TICKGUARDIAN_PK; ?>',
					currency: '<?php echo $tg_display_currency; ?>',
					costsOfItems: tg_items,
					<?php if (REZGO_TICKGUARDIAN_TEST) { ?>
					sandbox: true,
					<?php } ?>
					loadedCb: function() {
						console.log('update callback');
					},
					optInCb: function() {
						var quoteToken = tg.get("token");
						var coverageQuote = tg.get("quote");
						// console.log('opted in callback');
						jQuery('#tour_tg_insurance_coverage').attr('disabled' , false);
						jQuery("#tour_tg_insurance_coverage").val(1);
						jQuery('#rezgo-tg-quote-complete').text('<?php echo (string)$company->currency_symbol; ?>' + coverageQuote);

						jQuery('#tg_toggle_list').show();
						jQuery('#tg_protect_list').addClass('toggled');
						jQuery('#ticket_guardian_collapse').slideDown(250);
					},
					optOutCb: function() {
						var quoteToken = tg.get("token");
						// console.log('opted out callback');
						jQuery("#tour_tg_insurance_coverage").val('');
						jQuery('#tour_tg_insurance_coverage').attr('disabled' , true);

						jQuery('#tg_toggle_list').show();
						jQuery('#tg_protect_list').removeClass('toggled');
						jQuery('#ticket_guardian_collapse').slideUp(250);
					},
					onErrorCb: function(object){
						console.log(object);
					}
				});
				<?php } ?>
			</script>

			<?php if (!$has_insurance) { ?>

				<?php if (!$expired) { ?>
					<div id="rezgo-tg-postbooking" class="div-box-shadow">
						<div id="tg-postbooking-form">

							<div id="tg-placeholder"></div>
							<input type="hidden" name="tour_tg_insurance_coverage" id="tour_tg_insurance_coverage">

							<div id="ticket_guardian_collapse" style="display:none;">
								<div class="tg-payment-container">
									<form id="rezgo-tg-postbooking-form" role="form" method="post" target="rezgo_content_frame">

										<div id="payment_cards" class="payment_method_container">
											<h4 class="payment-method-header">Credit Card Details</h4>
											<input type="hidden" name="tour_card_token" id="tour_card_token" value="">

												<?php if (REZGO_WORDPRESS) { ?>
                                                    <iframe scrolling="no" frameborder="0" name="tour_payment" id="tour_payment" src="<?php echo home_url(); ?>?rezgo=1&mode=booking_payment&action=tg_postbooking"></iframe>

												<?php } else { ?>
													
													<iframe scrolling="no" frameborder="0" name="tour_payment" id="tour_payment" src="<?php echo $site->base; ?>/booking_payment.php?mode=tg_postbooking"></iframe>
												<?php } ?>

												<script type="text/javascript">
													iFrameResize({
														scrolling: false
													}, '#tour_payment');
												</script>
										</div> <!-- div payment_cards -->

										<div id="rezgo-book-message" class="row" style="display:none;">
											<div id="rezgo-book-message-body" class="col-8 offset-sm-2"></div>
												<div id="rezgo-book-message-wait" class="col-2"><i class="far fa-sync fa-spin fa-3x fa-fw"></i></div>
										</div>

										<div id="rezgo-book-errors-wrp">
											<div id="rezgo-book-errors" class="alert" style="display:none;">
												<span>Some required fields are missing. Please complete the highlighted fields.</span>
											</div>
										</div> <!-- // book errors -->

										<div class="rezgo-btn-wrp rezgo-complete-btn-wrp">
											<span class="btn-check"></span>
											<button type="submit" class="btn rezgo-btn-book btn-lg btn-block" id="rezgo-complete-payment">
												Protect Booking &mdash; <span id="rezgo-tg-quote-complete"></span>
											</button>
										</div>
									</form>
								</div>
							</div>

							<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="scaModal" aria-hidden="true" id="sca_modal" style="bottom:0 !important; top:auto !important;">
								<div class="modal-dialog modal-md" style="top: 0;">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" style="position:relative; top:3px; float:left;">Card Validation</h4>
											<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="width:50px; text-decoration:none; background: 0; border: 0; right: 20px; position:absolute; padding: 0;">
												<span aria-hidden="true" style="font-size:32px;">&times;</span>
											</button>
											<div class="clearfix"></div>
										</div>
										<div class="modal-body" id="sca_modal_content" style="height:640px;">
											<iframe style="border:0; width:100%; height:100%;" name="sca_modal_frame" id="sca_modal_frame"></iframe>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- postbooking-form -->

						<script>
						jQuery(function($){
							let scaModal = new bootstrap.Modal(document.getElementById('sca_modal'));
							let id;
							let pause = 1;

							function creditConfirm(token) {
								// the credit card transaction was completed, give us the token
								$('#tour_card_token').val(token);
							}

							$('#tg_postbooking_cta').click(function() {
								$(this).hide();
								$('#tg_toggle_list').show();
								$('#tg_protect_list').toggleClass('toggled');
								$('#ticket_guardian_collapse').slideToggle(450);
								toggleTimer();
							});

							// Catch form submissions
							$('#rezgo-tg-postbooking-form').submit(function(e) {
								e.preventDefault();
								submit_payment();
							});

							function payment_wait(wait) {
								if (wait) {
									$('#rezgo-book-message-wait').show();
								} else {
									$('#rezgo-book-message-body').html('');
									$('#rezgo-book-message-wait').hide();
								}
							}

							// SCA passthrough data
							let passthrough = '';

							// show the sca challenge window if the gateway requires it
							function sca_window(mode, url, data, pass) {
							
								if(pass) passthrough = pass;

								if(mode == 'direct') {
									
									$('.sca-direct-area').remove();
									$('body').append('<div class="sca-direct-area">' + data + '</div>');
									
								}
								
								if(mode == 'iframe') {

									scaModal.show();

									let content = data ? JSON.parse(data) : null;
									
									if(content) {
										
										// post content to 3DS frame
										let form = '<form action="' + url + '" method="post" target="sca_modal_frame" id="sca_post">';

										$.each(content, function(index, value) {
											form += '<input type="hidden" name="' + index + '" value="' + value + '">';
										});
										
										form += '</form>';

										$('body').append(form);
									
										$('#sca_post').submit().remove();
										
									} else {
										
										// no post content, load directly into frame
										// this is needed to avoid frame-ancestors restrictions on some gateways like stripe
										$('#sca_modal_frame').attr('src', url);
										
									}
									
								}

							}
							
							// called by the sca challenge window callback URL
							function sca_callback(code) {
							
								if(!code) return false;

								$('#sca_modal').modal('hide');

								if(passthrough) {
									let data = JSON.parse(code); // parse data sent back from 3DS
									data.pass = passthrough; // add the passthrough data to the array
									code = JSON.stringify(data);
								}
								
								$('#tour_card_token').val(code);
								$('#payment_id').val(1); // needed to trigger the validate step on commit

								$('#rezgo-book-message-body').html('Please wait one moment ...');
								$('#rezgo-complete-payment').attr('disabled','disabled');
								$('#rezgo-book-message').fadeIn();

								payment_wait(true);
								
								$('#rezgo-book-form').ajaxSubmit({
									url: '<?php echo admin_url('admin-ajax.php'); ?>' + '?action=rezgo&method=book_ajax',
									data: {rezgoAction: 'book'},
									success: delay_response,
									error: function () {
										var body = 'Sorry, the system has suffered an error that it can not recover from.<br />Please try again later.<br />';
										$('#rezgo-book-message-body').html(body);
										$('#rezgo-book-message-body').addClass('alert alert-warning');
									}
								});
								
							}

							let postbookingSuccess = `<p id="tg_success_msg"><span>Thank you for your purchase</span></p>
							<div id="tg-postbooking-success">
							<h3>Booking Protected by</h3>
								<img class="tg_logo" src='<?php get_home_url(); ?>/wp-content/plugins/rezgo/rezgo/templates/default/img/ticketguardian/TOURS-TGmirr-logo.png'>
							</div>`;

							// change the modal dialog box or pass the user to the receipt depending on the response
							function show_response() {

								response = response.trim();

								let title = '';
								let body = '';

								if(response.indexOf('STOP::') != -1) {  // debug handling

									let split = response.split('<br><br>');

									try {
										response = JSON.parse(split[1]);
									} catch (error) {
										response.status = 999;
									}

									if(response.status != '1') {
										$('#rezgo-complete-payment').val('Complete Booking');
										$('#rezgo-complete-payment').removeAttr('disabled');
									}

									if(response.status == 1) {
										split[1] = '<div class="clearfix">&nbsp;</div>PURCHASE COMPLETED WITHOUT ERRORS<div class="clearfix">&nbsp;</div><div class="clearfix">&nbsp;</div>';
									} else if(response.status == '8') {
										// an SCA challenge is required for this transaction
										sca_window('iframe', response.url, response.post, response.pass);
									} else {
										split[1] = '<br /><br />Error Code: ' + response.status + '<br />Error Message: ' + response.message + '<br />';
									}

									setTimeout(() => {
										parent.scrollTo(0,0);
									}, 250);

									// add debug
									let debug = '<br><br><div class="text-center debug-div">DEBUG-STOP ENCOUNTERED<br /><br />' + '<textarea style="width:400px;height:250px;" id="debug_response">' + split[0] + '</textarea>' + split[1];

									// show purchased banner
									document.getElementById('tg-postbooking-form').remove();
									document.getElementById('rezgo-tg-postbooking').innerHTML += postbookingSuccess;
									document.getElementById('rezgo-tg-postbooking').innerHTML += debug;

									return false;

								} else {

									try {
										response = JSON.parse(response);
									} catch (error) {
										response.status = 999;
									}

									if(response.status != '1') {
										$('#rezgo-complete-payment').val('Complete Booking');
										$('#rezgo-complete-payment').removeAttr('disabled');
									}

									if(response.status == '2') {
										title = 'No Availability Left';
										body = 'Sorry, there is not enough availability left for this item on this date.<br />';
									}
									else if(response.status == '3') {
										title = 'Payment Error';
										body = 'Sorry, your payment could not be completed. Please verify your card details and try again.<br /';
									}
									else if(response.status == '4') {
										title = 'Payment Error';
										body = 'Sorry, there has been an error with your payment and it can not be completed at this time.<br />';
									}
									else if(response.status == '5') {
										// this error should only come up in preview mode without a valid payment method set
										title = 'Payment Error';
										body = 'Sorry, you must have a credit card attached to your Rezgo Account in order to complete a booking.<br><br>Please go to "Settings &gt; Rezgo Account" to attach a credit card.<br />';
									}
									else if(response.status == '6') {
										// this error is returned when expected total does not match actual total
										title = 'Payment Error';
										body = 'Sorry, a price on an item you are booking has changed. Please return to the shopping cart and try again.<br />';
									}
									else if(response.status == '8') {
										// an SCA challenge is required for this transaction
										sca_window('iframe', response.url, response.post, response.pass);
									}
									else {

										console.log(response);
										

										if(response.status == '1') {

											setTimeout(() => {
												parent.scrollTo(0,0);
											}, 250);

											// replace with success message after successful transaction 
											document.getElementById('tg-postbooking-form').remove();
											document.getElementById('rezgo-tg-postbooking').innerHTML += postbookingSuccess;

										} else {

											title = 'Purchase Error';
											body = 'Sorry, an unknown error has occurred. Our staff have already been notified. Please try again later.<br />';
											console.log('Error: ' + response);

										}
									}
								}

								payment_wait(false);

								if(body) {
									$('#rezgo-book-message-body').html(body);
									$('#rezgo-book-message-body').addClass('alert alert-warning');
								}
							}

							// this function delays the output so we see the loading graphic
							function delay_response(responseText) {
								response = responseText;
								setTimeout(function () {

									console.log("RESPONSE: ");
									console.log(response);
									show_response();
								}, 800);
							}

							function error_payment() {
								$('#rezgo-book-errors').fadeIn();

								setTimeout(function () {
									$('#rezgo-book-errors').fadeOut();
								}, 5000);
								return false;
							}

							function submit_payment () {

								console.log('TG ENABLED? <? print_r($tg_enabled); ?>')
								console.log('FORM DATA: ');
								console.log(<?php echo json_encode($_POST) ; ?>);
								console.log($('#rezgo-tg-postbooking-form'));

								let force_error = 0;

								if(!$('#tour_payment').contents().find('#payment').valid()) {
									force_error = 1;
								}

								if(force_error) {
									console.log('force error: ' + force_error);
									return error_payment();

								} else {

									payment_wait(true);
					
									$('#rezgo-book-message-body').html('Please wait one moment ...');
					
									$('#rezgo-book-message').fadeIn();
					
									// clear the existing credit card token, just in case one has been set from a previous attempt
									$('#tour_card_token').val('');
					
									// submit the card token request and wait for a response
									$('#tour_payment').contents().find('#payment').submit();

									// get name from payment input field
									let tg_billing_name = $('#tour_payment').contents().find('#payment #name').val();
					
									// wait until the card token is set before continuing (with throttling)
									function check_card_token() {
										let card_token = $('#tour_card_token').val();

										// console.log('checking for token: ');
										// console.log(card_token);
										// console.log(<?php echo json_encode($tg_info) ?>)
										if (card_token == '') {
											// card token has not been set yet, wait and try again
											setTimeout(function () {
												check_card_token();
											}, 200);
										} else {
											// the field is present? submit normally
											$('#rezgo-tg-postbooking-form').ajaxSubmit({
												url: '<?php echo admin_url('admin-ajax.php'); ?>' + '?action=rezgo&method=book_ajax',
												data: {
													rezgoAction: 'tg_postbooking',
													quoteToken: tg.get("token"),
													billing_name: tg_billing_name,
													billing_email: '<?php echo $tg_info['email']; ?>',
													billing_phone: '<?php echo $tg_info['phone']; ?>',
													booking: <?php echo json_encode($tg_info); ?>,
													items: <?php echo json_encode($tg_items); ?>,
												},
												success: delay_response,
												error: function () {
													var body = 'Sorry, the system has suffered an error that it can not recover from.<br />Please try again later.<br />';
													$('#rezgo-book-message-body').html(body);
													$('#rezgo-book-message-body').addClass('alert alert-warning');
												}
											});
										}
									}
					
									check_card_token();
								}
							}

							// Validation Setup
							$.validator.setDefaults({
								highlight: function(element) {
									$(element).closest('.form-group').addClass('has-error');
								},
								unhighlight: function(element) {
									$(element).closest('.form-group').removeClass('has-error');
								},
								focusInvalid: false,
								errorElement: 'span',
								errorClass: 'help-block',
								errorPlacement: function(error, element) {
									if ($(element).attr("name") == "name" || $(element).attr("name") == "pan" || $(element).attr("name") == "cvv") {
										error.hide();
									}
								}
							});

						});

						</script>
					</div> <!-- rezgo-tg-postbooking -->

				<?php } // if (!$expired) ?>
			<?php } // if (!has_insurance) ?>

		<?php } // if ($tg_enabled) ?>

	</div>
</div>

<?php 
	if (isset($_SESSION['REZGO_CONVERSION_ANALYTICS'])) { 
		echo wp_kses($_SESSION['REZGO_CONVERSION_ANALYTICS'], ALLOWED_HTML);
		unset($_SESSION['REZGO_CONVERSION_ANALYTICS']);
	} 
	if (!isset($_SESSION['txid']) || $_SESSION['txid'] != $trans_num) $_SESSION['txid'] = $trans_num;
?>