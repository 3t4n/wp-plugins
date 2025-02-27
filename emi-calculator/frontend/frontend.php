<?php
add_shortcode( 'emi_calculator', 'emi_calculator_create' );
function emi_calculator_create( $atts ) {
    ob_start();
    $emi_body_back_color = get_option('emi_body_back_color','#ffffff');
    $emi_from_back_color = get_option('emi_from_back_color','#ffffff');
    $emi_result_back_color = get_option('emi_result_back_color','#ffffff');
    $emi_intfield_title_color = get_option('emi_intfield_title_color','#000');
    $emi_int_symb_back_color = get_option('emi_int_symb_back_color','#cbd3da');
    $emi_intf_border_color = get_option('emi_intf_border_color','#ced4da');
    $emi_slider_activ_color = get_option('emi_slider_activ_color','#2680eb');
    $emi_slider_progress_color = get_option('emi_slider_progress_color','#e6e6e6');
    $emi_slider_thumb_color = get_option('emi_slider_thumb_color','#2680eb');
    $emi_enable_chart = get_option('emi_enable_chart','true');
    $loan_emi_text = get_option('loan_emi_text','Loan EMI');
    $total_intereset_text = get_option('total_intereset_text','Total Interest Payable');
    $total_payment_text = get_option('total_payment_text','Total Payment');
    $min_loan_amount = get_option('min_loan_amount','1');
    $max_loan_amount = get_option('max_loan_amount','100000000');
    $min_interest_rate = get_option('min_interest_rate','1');
    $max_interest_rate = get_option('max_interest_rate','30');
    $min_year_loan_term = get_option('min_year_loan_term','1');
    $max_year_loan_term = get_option('max_year_loan_term','30');
    $min_month_loan_term = get_option('min_month_loan_term','1');
    $max_month_loan_term = get_option('max_month_loan_term','300');
	?>
	<style type="text/css">
		.emi_calculator_info {
			background-color: <?php echo esc_attr($emi_body_back_color); ?>;
		}
		.emi_calculator_col {
			background-color: <?php echo esc_attr($emi_from_back_color); ?>;
		}
		.emi_calculator_col2 {
			background-color: <?php echo esc_attr($emi_result_back_color); ?>;
		}
		.emi_calculator_info label {
			color: <?php echo esc_attr($emi_intfield_title_color); ?> !important;
		}
		.emi_input_group_symbol span, .emi-tenure-radio input[type=radio]:not(old):checked+.form-label {
			background-color: <?php echo esc_attr($emi_int_symb_back_color); ?>;
		}
		input.form-control, .emi_input_group_symbol span, .emi-tenure-radio input[type=radio]:not(old)+.form-label {
			border-color: <?php echo esc_attr($emi_intf_border_color); ?> !important;
		}
		#emi_range .rangeslider__fill {
	    background: <?php echo esc_attr($emi_slider_activ_color); ?>;
		}
		#emi_range .rangeslider {
	    background: <?php echo esc_attr($emi_slider_progress_color); ?>;
		}
		#emi_range .rangeslider__handle {
	    background: <?php echo esc_attr($emi_slider_thumb_color); ?>;
		}
	</style>
		<div class="emi_calculator_info">
			<div class="emi_calculator_col">
			        <div class="emi_error_msg">
			          <span class="text-danger" id="emi_msg"></span>
			        </div>
			        <div class="emi_loan_field">
									<label class="emi_control_label" for="loanamount"><?php echo esc_html('Loan Amount','emi-calculator'); ?></label>
							    <div class="emi_form_group">
							        <div class="emi_input_group">
							            <input type="number" id="emi_loan_amount" class="form-control" placeholder="Loan Amount" value="<?php echo esc_attr($min_loan_amount); ?>">
							            <div class="emi_input_group_symbol">
							                <span class="input-group-text"><?php echo esc_html('₹','emi-calculator'); ?></span>
							            </div>
							        </div>
							    </div>
							</div>
							<div id="emi_range">
								<input type="range" id="emi_loanamount_slider" value="<?php echo esc_attr($min_loan_amount); ?>" min="<?php echo esc_attr($min_loan_amount); ?>" max="<?php echo esc_attr($max_loan_amount); ?>" step="1">
							</div>

							<div class="emi_loan_field">
									<label class="emi_control_label" for="loaninterest"><?php echo esc_html('Interest Rate','emi-calculator'); ?></label>
							    <div class="emi_form_group">
							        <div class="emi_input_group">
							            <input type="number" id="emi_interest_rate" class="form-control" placeholder="Interest Rate" value="<?php echo esc_attr($min_interest_rate); ?>" min="<?php echo esc_attr($min_interest_rate); ?>" max="<?php echo esc_attr($max_interest_rate); ?>">
							            <div class="emi_input_group_symbol">
							                <span class="input-group-text"><?php echo esc_html('%','emi-calculator'); ?></span>
							            </div>
							        </div>
							    </div>
							</div>
							<div id="emi_range">
								<input type="range" id="emi_interest_rate_slider" value="<?php echo esc_attr($min_interest_rate); ?>" min="<?php echo esc_attr($min_interest_rate); ?>" max="<?php echo esc_attr($max_interest_rate); ?>">
							</div>

							<div class="emi_loan_field">
									<label class="emi_control_label" for="loanterm"><?php echo esc_html('Loan Tenure','emi-calculator'); ?></label>
							    <div class="emi_form_group">
							        <div class="emi_input_group">
							            <input type="number" name="emi_tenure_year" id="emi_tenure" class="form-control" value="<?php echo esc_attr($min_year_loan_term); ?>">
							            
							            <div class="tenure-choice">
                              <div class="emi-tenure-radio">
                                  <input type="radio" name="emi_months_years" id="years" value="years" checked="checked">
                                  <label for="years" class="form-label form-label1">
                                      <span class="icon-name"><?php echo esc_html('Yr','emi-calculator'); ?></span>
                                  </label>
                              </div>
                              <div class="emi-tenure-radio">
                                  <input type="radio" name="emi_months_years" id="months" value="months">
                                  <label for="months" class="form-label form-label2">
                                      <span class="icon-name"><?php echo esc_html('Mo','emi-calculator'); ?></span>
                                  </label>
                              </div>
                          </div>
							        </div>
							    </div>
							</div>
							<div id="emi_range" class="year_emi">
								<input type="range" id="emi_year_tenure_slider" value="<?php echo esc_attr($min_year_loan_term); ?>" min="<?php echo esc_attr($min_year_loan_term); ?>" max="<?php echo esc_attr($max_year_loan_term); ?>">
							</div>
							<div id="emi_range" class="month_emi">
								<input type="range" id="emi_month_tenure_slider" value="<?php echo esc_attr($min_month_loan_term); ?>" min="<?php echo esc_attr($min_month_loan_term); ?>" max="<?php echo esc_attr($max_month_loan_term); ?>">
							</div>
			</div>

				<div class="emi_calculator_col2">
	        <div class="emi_calculator_result">
	        	<div id="emi_payment_summary">
	        		<div class="emi_align_center" id="emiamount">
	        			<h4><?php echo esc_attr($loan_emi_text); ?></h4>
	        			<p><span id="result_emi"></span></p>
	        		</div>
	        		<div class="emi_align_center" id="emitotalinterest">
	        			<h4><?php echo esc_attr($total_intereset_text); ?></h4>
	        			<p><span id="total_interest"></span></p>
	        		</div>
	        		<div class="emi_align_center" id="emitotalamount" class="column-last">
	        			<h4><?php echo esc_attr($total_payment_text); ?><br><?php echo esc_html('(Principal + Interest)','emi-calculator'); ?></h4>
	        			<p><span id="total_payments"></span></p>
	        		</div>
	        	</div>
	        	<?php if($emi_enable_chart == 'true'){ ?>
		        	<div id="emi_chart_summery" class="emi_chart_box">
								<div class="emi_chart">
		            	<canvas id="myChart" width="400" height="400"></canvas>
		            </div>
		          </div>
	          <?php }else{?>
	          	<style type="text/css">
								.emi_calculator_result {
									display: block;
								}
								#emi_payment_summary {
									display: flex;
							    justify-content: space-around;
							    max-width: 100%;
								}
								@media only screen and (max-width: 768px) {
									#emi_payment_summary {
								    flex-direction: column;
									}
								}
							</style>
	          <?php }?>
	        </div>
				</div>
		</div>
	<?php
	$content = ob_get_clean();
	return $content;
}
