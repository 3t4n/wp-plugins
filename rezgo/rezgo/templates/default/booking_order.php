<?php
	if (REZGO_WORDPRESS) {
		if (isset($_REQUEST['trans_num'])) {
			$trans_num = $site->decode(sanitize_text_field($_REQUEST['trans_num']));
		}
		if (isset($_REQUEST['parent_url'])) {
			$site->base = '/' . $site->requestStr('parent_url');
		}
	}

	// send the user home if they shouldn't be here
	if(!$trans_num) $site->sendTo($site->base."/order-not-found:empty");

	// unset promo session and cookie
	$site->resetPromoCode();

	// unset lead session and cookie
	$site->resetBookingSource();

	$order_bookings = $site->getBookings('t=order_code&q='.$trans_num);

	if(!$order_bookings) $site->sendTo("/order-not-found:".sanitize_text_field($_REQUEST['trans_num']));

	$site->setTimeZone();
	$company = $site->getCompanyDetails();
	$rzg_payment_method = 'None';
	$gateway_id = (string)$company->gateway_id;
	$tz_offset = $company->time_format;
	$cart_total = 0;
	$cart_owing = 0;
?>

<!-- clear all previously stored form data in local storage -->
<script> window.localStorage.clear(); </script>
<?php if (!REZGO_WORDPRESS) { ?>
<script type="text/javascript" src="<?php echo $site->path; ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $site->path; ?>/js/jquery.form.js"></script>
<?php } ?>

<div class="container-fluid rezgo-container rezgo-booking-order-container">
	<div class="jumbotron rezgo-booking"> 

		<div class="row rezgo-confirmation-head">
			<h3 class="rezgo-confirm-complete">Your order <?php echo esc_html($trans_num); ?> contains <?php echo esc_html(count((array)$order_bookings)); ?> booking<?php echo ((count((array)$order_bookings) != 1) ? 's' : ''); ?></h3>
			<br>
			<div class="center-block">
				<?php 
					if (REZGO_LITE_CONTAINER) { 
						$print_order_link = 'https://'.$domain.'.'.$role.'rezgo.com/complete/'.$site->encode($trans_num).'/print';
						$view_itinerary_link = 'https://'.$domain.'.'.$role.'rezgo.com/itinerary/'.$site->encode($trans_num);
					} elseif (REZGO_WORDPRESS) {
						$print_order_link = $site->base.'/complete/'.$site->encode($trans_num).'/print';
						$view_itinerary_link = $site->base.'/itinerary/'.$site->encode($trans_num);
					} else {
						$print_order_link = $site->base.'/complete/'.$site->encode($trans_num).'/print';
						$view_itinerary_link = $site->base.'/itinerary/'.$site->encode($trans_num);
					}
				?>
				<span class="btn-check"></span>
				<button class="btn btn-lg rezgo-btn-print" onclick="window.open('<?php echo $print_order_link; ?>', '_blank'); return false;">
					<span><i class="far fa-print fa-lg"></i>&nbsp;&nbsp;Print Order</span>
				</button>

				<span class="btn-check"></span>
				<button class="btn btn-lg rezgo-btn-print" onclick="window.open('<?php echo $view_itinerary_link; ?>', '_blank'); return false;"><i class="far fa-list fa-lg"></i>&nbsp;&nbsp;View Itinerary</button>
			</div>
		</div>

		<?php $n = 1; ?>

		<?php foreach($order_bookings as $booking ) { ?>
			<?php
				$availability_type = (string)$booking->availability_type;
				$booking_date = $availability_type == 'open' ? 'open' : date('Y-m-d', (string)$booking->date);
				$no_pax_waivers = $booking->no_pax_waivers ?? 0;

				$item = $site->getTours('t=uid&q='.$booking->item_id.'&d='.$booking_date , 0); 
				$available = $item[0] ?? 0;

				$booking_time = (string)$booking->time;
				$booking_expiry = (int)$booking->expiry;
				$booking_cancel = (float)$item->cancel;
				$booking_cutoff = (float)$item->cutoff;
				$booking_start = strtotime((string)$booking_date.$booking->time);
				$cancel_time = strtotime('-'.$booking_cancel.' hours', $booking_start);
				$cutoff_time = strtotime('-'.$booking_cutoff.' hours', $booking_start);
				$checkin_state = (int)$booking->checkin_state != 0 ? 1 : 0;
				
				$now = strtotime($tz_offset.' hours', time());

				$share_url = urlencode('https://'.$_SERVER['HTTP_HOST'].$site->base.'/details/'.$item->com.'/'.$site->seoEncode($item->item));

				// account for booking expiry if set
				if ($booking_expiry != 0) {	
					$booking_expired = $now > $booking_expiry ? 1 : 0;
				} else {
					$booking_expired = 0;
				}

				// account for cancellation window
				if ($booking->availability_type != 'open') {
					$passed = $now > $cancel_time ? 1 : 0;
				} else {
					$passed = 0;
				}

				if ($booking->reseller) {
					$reseller_locked = $booking->reseller == 2 ?? 0;
				}

				$booking_edit_enabled = (int) $company->booking_edit != 0 ? 1 : 0;
				$booking_cancellation_enabled = (int) $company->booking_edit_cancellation != 0 ? 1 : 0;

				$booking_edit = ( ($booking_edit_enabled || $booking_cancellation_enabled) &&
								  $available &&
								  !$checkin_state &&
								  $booking->status != 3 &&
								  !$booking_expired  &&
								  !$passed &&
								  !$reseller_locked ) ? 1 : 0;
			?>

			<?php $site->readItem($booking); ?>

				<div class="row rezgo-confirmation div-box-shadow div-order-booking">
					<div class="rezgo-booking-status col-md-4 col-sm-12">
						<?php if($booking->status == 1 OR $booking->status == 4) { ?>
							<p class="booking-status rezgo-status-complete"><i class="far fa-calendar-check fa-lg"></i></i>&nbsp;&nbsp;Booking Complete</p>
						<?php } ?>

						<?php if($booking->status == 2) { ?>
							<p class="booking-status rezgo-status-pending"><i class="far fa-calendar-check fa-lg"></i></i>&nbsp;&nbsp;Booking Pending</p>
						<?php } ?>

						<?php if($booking->status == 3) { ?>
							<p class="booking-status rezgo-status-cancel"><i class="far fa-times fa-lg"></i>&nbsp;&nbsp;Booking Cancelled</p>
						<?php } ?>

					</div><!-- // .rezgo-booking-status -->

					<div class="clearfix"></div>

					<h3 class="order-booking-title"><?php echo esc_html($booking->tour_name); ?>&nbsp;(<?php echo esc_html($booking->option_name); ?>)</h3>

					<div class="order-booking-cols rezgo-form-group">

					<div class="col-12 col-lg-5 __details-col">
						<div class="flex-table">
							<div id="rezgo-receipt-transnum" class="flex-table-group">
								<div class="flex-table-header rezgo-order-transnum"><span>Booking #</span></div>
								<div class="flex-table-info"><?php echo esc_html($booking->trans_num); ?></div>
							</div>

							<?php if((string) $booking->date != 'open') { ?>
								<div id="rezgo-receipt-booked-for" class="flex-table-group">
									<div class="flex-table-header"><span>Date</span></div>
									<div class="flex-table-info">
                                        <span class="rezgo-order-booked-for-date-<?php echo esc_attr($booking->item_id); ?>">
										    <?php echo esc_html(date((string) $company->date_format, (int) $booking->date)); ?>
                                        </span>
                                        <span class="rezgo-order-booked-for-time-<?php echo esc_attr($booking->item_id); ?>">
										    <?php if ($site->exists($booking->time)) { ?> at <?php echo esc_html($booking->time); ?><?php } ?>
                                        </span>
									</div>
								</div>
							<?php } else { ?>
								<?php if ($site->exists($booking->time)) { ?>
									<div id="rezgo-receipt-booked-for" class="flex-table-group">
										<div class="flex-table-header"><span>Time</span></div>
										<div class="flex-table-info">
											<?php echo esc_html($booking->time); ?>
										</div>
									</div>
								<?php } ?>
							<?php } ?>

							<?php if(isset($booking->expiry)) { ?>
								<div id="rezgo-receipt-expires" class="flex-table-group">
									<div class="flex-table-header"><span>Expires</span></div>
									<?php if((int) $booking->expiry !== 0) { ?>
										<div class="flex-table-info"><span><?php echo esc_html(date((string) $company->date_format, (int) $booking->expiry)); ?></span></div>
									<?php } else { ?>
										<div class="flex-table-info"><span>Never</span></div>
									<?php } ?>
								</div>
							<?php } ?>

							<?php if($site->exists($booking->trigger_code)) { ?>
								<div id="rezgo-order-promo" class="flex-table-group">
									<div class="flex-table-header"><span>Promo Code</span></div>
									<div class="flex-table-info"><?php echo esc_html($booking->trigger_code); ?></div>
								</div>
							<?php } ?>

							<?php if($site->exists($booking->refid)) { ?>
								<div id="rezgo-order-refid" class="flex-table-group">
									<div class="flex-table-header"><span>Referral ID</span></div>
									<div class="flex-table-info"><?php echo (string) esc_html($booking->refid); ?></div>
								</div>
							<?php } ?>
						</div>

						<?php $booking_details_link = $site->base.'/complete/'.$site->encode($booking->trans_num); ?>
						<span class="btn-check"></span>
						<a href="<?php echo esc_url($booking_details_link); ?>" class="btn btn-lg rezgo-btn-default rezgo-btn-outline btn-block">
							<?php echo $booking_edit ? 'Modify or' : ''; ?> View Booking
						</a> 

						<?php if( $booking->waiver == '2' && !$no_pax_waivers) {  ?>
							<?php 
								echo '<div class="rezgo-waiver-order">';
									$pax_signed = $pax_count = 0;
									foreach ($site->getBookingPassengers() as $passenger ) { 
										if($passenger->sign_count) {
											// new format for waiver data
											if ($passenger->sign_count <= 1) {
												if($passenger->signed) $pax_signed++;
											} else {
												$pax_signed += $passenger->sign_count;
											}
											$pax_count += $passenger->sign_total;
											
										} else{
											
											// older format for waivers
											
											if($passenger->signed) $pax_signed++;
											$pax_count++;
										
										}
									}
									if ($pax_signed != $pax_count) { // hide if all waivers signed
										echo '<span class="btn-check"></span>';
										echo '<a href="'.$site->base.'/waiver/'.$site->waiver_encode($booking->trans_num).'" class="btn btn-lg rezgo-waiver-btn btn-block"><span>Sign waivers</span></a>';
										echo '<div style="white-space:nowrap;display:flex;align-items:baseline;">';
											echo '<i class="far fa-exclamation-circle fa-lg"></i>&nbsp; <span class="pax-signed">' . $pax_signed . ' of ' . $pax_count . ' waivers signed</span>';
										echo '</div>';
									} else {
										echo '<i class="far fa-check-circle fa-lg"></i>&nbsp; <span class="pax-signed">All waivers have been signed</span></span>';
									}
								echo '</div>';
							?>
						<?php } ?> 

						<?php $domain = $site->getDomain(); ?>
			
						<?php if( !$company->manual_tickets &&
								  ($booking->status == 1 || $booking->status == 4) &&
								  (($booking->availability_type == 'date' && (int) $booking->date > strtotime('yesterday')) || 
								  ($booking->availability_type == 'open' && $booking->checkin_state == 0)) ){ ?>
								  	<?php 
										if (REZGO_WORDPRESS) {
											$voucher_link = $site->base.'/tickets/'.$site->encode($booking->trans_num); 
										} else {
											$voucher_link = 'https://'.$domain.$role.'rezgo.com/tickets/'.$site->encode($booking->trans_num);
										}
									?>
									<span class="btn-check"></span>
									<a href="<?php echo $voucher_link; ?>" class="btn btn-lg rezgo-btn-print-voucher btn-block" target="_blank">Print <?php echo ((string) $booking->ticket_type == 'ticket') ? 'Tickets' : 'Ticket' ?></a>
						<?php } ?>
						
						<?php if($site->exists($booking->paypal_owed)) { ?>

							<?php $company_paypal = $site->getCompanyPaypal(); ?>
							<div id="booking-order-paypal-container">

						<?php if (REZGO_LITE_CONTAINER) { ?>
							<form role="form" method="post" action="<?php echo REZGO_DIR; ?>/php_paypal/process.php" target="_top">	
						<?php } else { ?>
							<form role="form" class="form-inline" method="post" action="https://www.paypal.com/cgi-bin/webscr">
						<?php } ?>		

								<?php if (REZGO_WORDPRESS) { ?>

								<!-- PayPal Configuration -->
								<input type="hidden" name="cmd" value="_xclick">
								<input type="hidden" name="image_url" value="<?php echo 'https://'.esc_attr($domain).'.rezgo.com/'; ?>">
								<input type="hidden" name="return" value="<?php echo 'https://'.esc_attr($domain).'.rezgo.com/' . 'complete/'.esc_attr($site->encode($booking->trans_num)); ?>">
								<input type="hidden" name="notify_url" value="<?php echo 'https://'.esc_attr($domain).'.rezgo.com/' . 'rezgo/php_paypal/ipn/ipn.php'; ?>">
								<input type="hidden" name="rm" value="2">
								<input type="hidden" name="lc" value="US">
								<input type="hidden" name="bn" value="Rezgocom_SP_PPS">
								<input type="hidden" name="cbt" value="Click here to complete your booking">

								<!-- Payment Page Information -->
								<input type="hidden" name="no_shipping" value="1">
								<input type="hidden" name="no_note" value="1">
								<input type="hidden" name="cn" value="Comments">
								<input type="hidden" name="cs" value="">

								<!-- Shipping and Misc Information -->
								<input type="hidden" name="shipping" value="">
								<input type="hidden" name="shipping2" value="">
								<input type="hidden" name="handling" value="">
								<input type="hidden" name="tax" value="">
								<input type="hidden" name="custom" value="">
								<input type="hidden" name="invoice" value="">

								<?php } ?>

								<!-- Customer Information -->
								<input type="hidden" name="firstname" id="firstname" value="<?php echo esc_attr($booking->first_name); ?>" />
								<input type="hidden" name="lastname" id="lastname" value="<?php echo esc_attr($booking->last_name); ?>" />
								<input type="hidden" name="address1" id="address1" value="<?php echo esc_attr($booking->address_1); ?>" /> 
								<input type="hidden" name="address2" id="address2" value="<?php echo esc_attr($booking->address_2); ?>" />
								<input type="hidden" name="city" value="<?php echo esc_attr($booking->city); ?>" />
								<input type="hidden" name="state" value="<?php echo esc_attr($booking->stateprov); ?>" />
								<input type="hidden" name="country" value="<?php echo esc_attr($site->countryName($booking->country)); ?>" />
								<input type="hidden" name="zip" value="<?php echo esc_attr($booking->postal_code); ?>" />
								<input type="hidden" name="email" id="email" value="<?php echo esc_attr($booking->email_address); ?>" />
								<input type="hidden" name="phone" id="phone" value="<?php echo esc_attr($booking->phone_number); ?>" />
								<input type="hidden" name="item_name" id="item_name" value="<?php echo esc_attr($booking->tour_name); ?> - <?php echo esc_attr($booking->option_name); ?>" />
								<input type="hidden" name="encoded_transaction_id" id="encoded_transaction_id" value="<?php echo $site->encode($trans_num); ?>" />
								<input type="hidden" name="item_number" id="item_number" value="<?php echo $trans_num; ?>" />
								<input type="hidden" name="amount" id="amount" value="<?php echo esc_attr($booking->paypal_owed); ?>" />
								<input type="hidden" name="quantity" id="quantity" value="1" />	
								<input type="hidden" name="business" value="<?php echo esc_attr($company->paypal_email); ?>" />
								<input type="hidden" name="currency_code" value="<?php echo esc_html($company->currency_base); ?>" />
								<input type="hidden" name="domain" value="<?php echo esc_attr($domain) ?>.rezgo.com" />
								<input type="hidden" name="cid" value="<?php echo esc_attr(REZGO_CID); ?>" />
								<input type="hidden" name="paypal_signature" value="" />
								<input type="hidden" name="base_url" value="rezgo.com" />
								<input type="hidden" name="cancel_return" value="https://<?php echo esc_attr($_SERVER['SERVER_NAME'] . $site->base . '/complete/'. $_REQUEST['trans_num']);?>" />
									<div class="paypal_button-container">
										<input type="image"	class="paypal_button" name="submit_image" src="<?php echo esc_attr($site->path); ?>/img/logos/paypal_pay.png" />
									</div>
									<span id="paypal_owing"></span>
								</form>
							</div>
						<?php } ?>

					</div>

					<div class="col-12 col-lg-7 __table-col">
						<table class="table-responsive">
							<table class="table rezgo-billing-cart">
								<tr class="rezgo-tr-head">
									<td class="text-start rezgo-billing-type"><label>Type</label></td>
									<td class="text-start rezgo-billing-qty"><label class="d-none d-sm-block">Qty.</label></td>
									<td class="text-start rezgo-billing-cost"><label>Cost</label></td>
									<td class="text-end rezgo-billing-total"><label>Total</label></td>
								</tr>

								<?php foreach($site->getBookingPrices() as $price) { ?>
									<tr>
										<td class="text-start"><?php echo esc_html($price->label); ?></td>
										<td class="text-start"><?php echo esc_html($price->number); ?></td>
										<td class="text-start">
										<?php if(isset($price->base) && $site->exists($price->base)) { ?>
											<span class="discount"><?php echo esc_html($site->formatCurrency($price->base)); ?></span>
										<?php } ?>
										&nbsp;<?php echo esc_html($site->formatCurrency($price->price)); ?></td>
										<td class="text-end text-nowrap"><?php echo esc_html($site->formatCurrency($price->total)); ?></td>
									</tr>
									<?php if($price->vat) { ?>
										<?php if (is_array($price->vat['line'])) { ?>
											<?php foreach($price->vat['line'] as $vat) { ?>
												<tr class="rezgo-tr-vat">
													<td colspan="4" class="text-start">
														&nbsp;&nbsp;&nbsp;&nbsp;Includes 
														<?php echo esc_html($vat->label); ?>
														<?php if($site->exists($vat->per)) { ?>
															(<?php echo esc_html($vat->per); ?>%)
														<?php } ?>
														&nbsp;
														<?php echo esc_html($site->formatCurrency($vat->amount)); ?>
													</td>
												</tr>
											<?php }	?>
										<?php } else { ?>
											<tr class="rezgo-tr-vat">
												<td colspan="4" class="text-start">
													<?php foreach($price->vat as $vat) { ?>
														&nbsp;&nbsp;&nbsp;&nbsp;Includes 
														<?php echo esc_html($vat->label); ?>
													<?php if($site->exists($vat->per)) { ?>
														(<?php echo esc_html($vat->per); ?>%)
													<?php } ?>
														&nbsp;
														<?php echo esc_html($site->formatCurrency($vat->amount)); ?>
													<?php }	?>
												</td>
											</tr>
										<?php }	?>
									<?php } ?>
								<?php } ?>

								<tr class="rezgo-tr-subtotal">
									<td colspan="3" class="text-end"><span class="push-right"><strong>Subtotal</strong></span></td>
									<td class="text-end text-nowrap"><?php echo esc_html($site->formatCurrency($booking->sub_total)); ?></td>
								</tr>

								<?php if ($site->getBookingLineItems()) { ?>
									<?php foreach($site->getBookingLineItems() as $line) { ?>
										<?php
											$label_add = '';
											if($site->exists($line->percent) || $site->exists($line->multi)) {
												$label_add = ' (';
													if($site->exists($line->percent)) $label_add .= $line->percent.'%';
													if($site->exists($line->multi)) {
														if(!$site->exists($line->percent)) $label_add .= $site->formatCurrency($line->multi);
				
														if($site->exists($line->meta)) {
															$pax_totals = array( 'adult_num' => 'price_adult', 'child_num' => 'price_child', 'senior_num' => 'price_senior', 'price4_num' => 'price4', 'price5_num' => 'price5', 'price6_num' => 'price6', 'price7_num' => 'price7', 'price8_num' => 'price8', 'price9_num' => 'price9');
															$line_pax = 0;
															foreach ($pax_totals as $p_num => $p_rate) {
																if ( (int) $booking->{$p_num} > 0 && ((float) $booking->price_range->date->{$p_rate} > (float) $line->meta)) {
																	$line_pax += (int) $booking->{$p_num};
																}
															}
															$label_add .= ' x '.$line_pax;
														} else {
															$label_add .= ' x '.$booking->pax;
														}
					
													}
												$label_add .= ')';	
											}
										?>

										<?php if( $site->exists($line->amount) ) { ?>
										<tr>
											<td colspan="3" class="text-end"><span class="push-right"><strong><?php echo esc_html($line->label); ?><?php echo esc_html($label_add); ?></strong></span></td>
											<td class="text-end text-nowrap"><?php echo esc_html($site->formatCurrency($line->amount)); ?></td>
										</tr>
										<?php } ?>
									<?php } ?>
								<?php } ?>

								<?php 
									foreach ($site->getBookingFees() as $fee ) {
										if ($fee) {
											$title = (string)$fee->label;
											$count = (int)$fee->count == 0 ? 1 : $fee->count;
											$amount = (string)$fee->total_amount; ?>
											<?php if ($amount) { ?>
												<tr>
													<td colspan="3" class="text-end">
														<span class="push-right">
															<strong>
																<?php echo esc_html($count) .' <i class="far fa-times" style="position:relative; top:1px;"></i>'; ?>
																<?php echo esc_html($title); ?>
															</strong>
														</span>
													</td>
													<td class="text-end text-nowrap"><?php echo esc_html($site->formatCurrency($amount)); ?></td>
												</tr>
											<?php } ?>
										<?php } ?>
								<?php } ?>

								<tr class="rezgo-tr-subtotal summary-total">
									<td colspan="3" class="text-end"><span class="push-right"><strong>Total</strong></span></td>
									<td class="text-end text-nowrap"><strong><?php echo esc_html($site->formatCurrency($booking->overall_total)); ?></strong></td>
								</tr>

								<?php if($site->exists($booking->deposit)) { ?>
									<tr>
										<td colspan="3" class="text-end"><span class="push-right"><strong>Deposit</strong></span></td>
										<td class="text-end text-nowrap"><strong><?php echo esc_html($site->formatCurrency($booking->deposit)); ?></strong></td>
									</tr>
								<?php } ?>

								<?php if($site->exists($booking->overall_paid)) { ?>
									<tr>
										<td colspan="3" class="text-end"><span class="push-right"><strong>Total Paid</strong></span></td>
										<td class="text-end text-nowrap"><strong><?php echo esc_html($site->formatCurrency($booking->overall_paid)); ?></strong></td>
									</tr>
									<tr>
										<td colspan="3" class="text-end"><span class="push-right"><strong>Total&nbsp;Owing</strong></span></td>
										<td class="text-end text-nowrap"><strong><?php echo esc_html($site->formatCurrency(((float)$booking->overall_total - (float)$booking->overall_paid))); ?></strong></td>
									</tr>
								<?php } ?>
							</table>
						</table>
					</div>
				</div><!-- //  tour confirm --> 
			</div>

			<?php 
			$cart_total += ((float)$booking->overall_total); 
			$cart_owing += ((float)$booking->overall_total - (float)$booking->overall_paid); 
			?>

			<?php if($booking->payment_method != 'None') {
				$rzg_payment_method = $booking->payment_method;
			} ?>
			
		<?php } ?>

		<div class="row rezgo-form-group rezgo-confirmation div-box-shadow">
			<div class="col-md-6 col-12 rezgo-billing-confirmation p-helper">
				<h3 id="rezgo-receipt-head-billing-info"><span>Billing Information</span></h3>

				<div class="flex-row">
					<?php if ($site->exists($booking->first_name)){ ?>
						<div class="flex-50 billing-payment-info-box" id="rezgo-receipt-name">
							<p class="rezgo-receipt-pax-label"><span>Name</span></p>
							<p class="rezgo-receipt-pax-info"><?php echo esc_html($booking->first_name); ?> <?php echo esc_html($booking->last_name); ?></p>
						</div>
					<?php } ?>

					<?php if ($site->exists($booking->phone_number)){ ?>
						<div class="flex-50 billing-payment-info-box" id="rezgo-receipt-phone">
							<p class="rezgo-receipt-pax-label"><span>Phone Number</span></p>
							<p class="rezgo-receipt-pax-info"><?php echo esc_html($booking->phone_number); ?></p>
						</div>
					<?php } ?>

					<?php 
						$booking_address = array((string) $booking->address_1, 
													(string) $booking->address_2,
													(string) $booking->city,
													(string) $booking->address_2,
													(string) $booking->stateprov,
													(string) $booking->postal_code,
													(string) $booking->country
											);
					?>
					<?php if (array_filter($booking_address)){ ?>
					<div class="flex-50 billing-payment-info-box" id="rezgo-receipt-address">
						<p class="rezgo-receipt-pax-label"><span>Address</span></p>
						<p class="rezgo-receipt-pax-info">
							<?php echo esc_html($booking->address_1); ?>
							<?php echo ($site->exists($booking->address_2)) ? '<br>'.esc_html($booking->address_2) : ''; ?>
							<?php echo ($site->exists($booking->city)) ? '<br>'.esc_html($booking->city) : ''; ?>
							<?php echo ($site->exists($booking->stateprov)) ? esc_html($booking->stateprov) : ''; ?>
							<?php echo ($site->exists($booking->postal_code)) ? '<br>'.esc_html($booking->postal_code) : ''; ?>
							<?php echo esc_html($site->countryName($booking->country)); ?>
						</p>
					</div>
					<?php } ?>

					<?php if ($site->exists($booking->email_address)){ ?>
						<div class="flex-50 billing-payment-info-box" id="rezgo-receipt-email">
							<p class="rezgo-receipt-pax-label"><span>Email Address</span></p>
							<p class="rezgo-receipt-pax-info"><?php echo esc_html($booking->email_address); ?></p>
						</div>
					<?php } ?>
				</div>
			</div>

			<div class="col-md-6 col-12 rezgo-payment-confirmation p-helper">
				<h3 id="rezgo-receipt-head-payment-info"><span>Payment Information</span></h3>
				<div class="flex-row">
					<div class="flex-50 billing-payment-info-box" id="rezgo-receipt-email">
						<p class="rezgo-receipt-pax-label"><span>Total&nbsp;Order</span></p>
						<p class="rezgo-receipt-pax-info"><?php echo esc_html($site->formatCurrency($cart_total)); ?></p>
					</div>

					<div class="flex-50 billing-payment-info-box" id="rezgo-receipt-email">
						<p class="rezgo-receipt-pax-label"><span>Total&nbsp;Owing</span></p>
						<p class="rezgo-receipt-pax-info"><?php echo esc_html($site->formatCurrency($cart_owing)); ?></p>
					</div>

					<?php if($cart_total > 0) { ?>
						<div class="flex-50 billing-payment-info-box" id="rezgo-receipt-email">
							<p class="rezgo-receipt-pax-label"><span>Payment&nbsp;Method</span></p>
							<p class="rezgo-receipt-pax-info"><?php echo esc_html($rzg_payment_method); ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div><!-- //  rezgo-confirmation --> 
	</div><!-- //  .jumbotron --> 
</div><!-- //  .rezgo-container -->

<?php if (DEBUG) { ?><pre><?php print_r($booking); ?></pre><?php } ?>