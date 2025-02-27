<?php
add_shortcode( 'sip_calculator', 'sip_calculator_create' );
function sip_calculator_create() {
	ob_start();

	$sip_title = get_option('sip_title','SIP CALCULATOR');
	$sip_title_font = get_option('sip_title_font','60');
	$sip_title_color = get_option('sip_title_color','#000000');
	$sip_slider_activ_color = get_option('sip_slider_activ_color','#9bb5d2');
	$sip_slider_progress_color = get_option('sip_slider_progress_color','#e6e6e6');
	$sip_slider_thumb_back_color = get_option('sip_slider_thumb_back_color','#fdf8f8');
	$sip_time_back_color = get_option('sip_time_back_color','#eaf6ff');
	$sip_time_text_color = get_option('sip_time_text_color','#000000');
	$sip_enable_chart = get_option('sip_enable_chart','true');
	$sip_enable_table = get_option('sip_enable_table','true');
	$expected_amount_text = get_option('expected_amount_text','Expected Amount');
	$amount_invested_text = get_option('amount_invested_text','Amount Invested');
	$profit_earned_text = get_option('profit_earned_text','Profit Earned');
	$default_invested_amount = get_option('default_invested_amount','10000');
	$min_invested_amount = get_option('min_invested_amount','100');
	$max_invested_amount = get_option('max_invested_amount','100000');
	$default_investment_period = get_option('default_investment_period','10');
	$min_investment_period = get_option('min_investment_period','1');
	$max_investment_period = get_option('max_investment_period','30');
	$default_expected_annual = get_option('default_expected_annual','12');
	$min_expected_annual = get_option('min_expected_annual','1');
	$max_expected_annual = get_option('max_expected_annual','30');
	$sip_result_head_back_color = get_option('sip_result_head_back_color','#f7f7f7');
	$sip_result_head_text_color = get_option('sip_result_head_text_color','#000000');
	$sip_result_body_bg_color = get_option('sip_result_body_bg_color','#f7f7f7');
	$sip_result_body_text_color = get_option('sip_result_body_text_color','#000000');
	$sip_result_body_hover_bg_color = get_option('sip_result_body_hover_bg_color','#ebebeb');
	?>
	<style type="text/css">
		h1#primecap {
			font-size: <?php echo esc_attr($sip_title_font); ?>px;
			color: <?php echo esc_attr($sip_title_color); ?>;
		}
		.range_data_box .rangeslider__fill {
			background: <?php echo esc_attr($sip_slider_activ_color); ?>!important;
		}
		.range_data_box .rangeslider {
			background: <?php echo esc_attr($sip_slider_progress_color); ?>!important;
		}
		.range_data_box .rangeslider__handle {
			background: <?php echo esc_attr($sip_slider_thumb_back_color); ?>!important;
		}
		caption#tab_cap {
			background: <?php echo esc_attr($sip_time_back_color); ?>!important;
			color: <?php echo esc_attr($sip_time_text_color); ?>!important;
		}
		table.sip-cal-table.sip-cal-table-hover th, table.sip-cal-table.sip-cal-table-hover td {
			background-color: <?php echo esc_attr($sip_result_head_back_color); ?>!important;
		}
		#projectTable tr td {
			background-color: <?php echo esc_attr($sip_result_body_bg_color); ?>!important;
		}
		.res_table thead.sip-result-head {
			color: <?php echo esc_attr($sip_result_head_text_color); ?>!important;
		}
		tbody#projectTable tr td {
		    color: <?php echo esc_attr($sip_result_body_text_color); ?>!important;
		}
		#projectTable tr:hover td {
			background-color: <?php echo esc_attr($sip_result_body_hover_bg_color); ?>!important;
		}
	</style>

	<?php if($sip_enable_chart == 'true'){ ?>
		<section class="sip-calc-header-section">
	    <div class="caption-cont">
	    	<h1 class="font-weight-bold" id="primecap"><?php echo esc_attr($sip_title); ?></h1>
	  	</div>
	  	<div class="containers-fluids">
	      	<div class="sip_calc_container">
				<div class="sip-calc">
					<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="level1-clients">
								<?php echo esc_html('Investment Amount(Rs.): *','sip-calculator'); ?>
							</label>
							<input type="text" class="sip_text_field" id="invstamount" value="<?php echo esc_attr($default_invested_amount); ?>" min="<?php echo esc_attr($min_invested_amount); ?>" max="<?php echo esc_attr($max_invested_amount); ?>" maxlength="6">
						</div>
						<div class="range">
							<input type="range" id="sip-amount-investment" value="<?php echo esc_attr($default_invested_amount); ?>" min="<?php echo esc_attr($min_invested_amount); ?>" max="<?php echo esc_attr($max_invested_amount); ?>">
						</div>
					</div>

					<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="level1-clients">
								<?php echo esc_html('Investment Type: *','sip-calculator'); ?>
							</label>
							<div>
				              	<select id="invst_type">
				                	<option value="week" selected><?php echo esc_html("Weekly","sip-calculator"); ?></option>
				                	<option value="mon"><?php echo esc_html("Monthly","sip-calculator"); ?></option>
				                	<option value="quat"><?php echo esc_html("Quarterly","sip-calculator"); ?></option>
				              	</select>
				          	</div>
						</div>
					</div>

					<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="daily-orders">
								<?php echo esc_html('Investment Period (Years) : *','sip-calculator'); ?>
							</label>
							<input type="text" class="sip_text_field" id="invstperiod" value="<?php echo esc_attr($default_investment_period); ?>" min="<?php echo esc_attr($min_investment_period); ?>" max="<?php echo esc_attr($max_investment_period); ?>" maxlength="2">
						</div>
						<div class="range">
							<input type="range" id="sip-amount-year-range" value="<?php echo esc_attr($default_investment_period); ?>" min="<?php echo esc_attr($min_investment_period); ?>" max="<?php echo esc_attr($max_investment_period); ?>">
						</div>
					</div>
					<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="commission">
								<?php echo esc_html('Expected Annual Returns (%) *','sip-calculator'); ?>
							</label>
							<input type="text" class="sip_text_field" id="expreturn" value="<?php echo esc_attr($default_expected_annual); ?>" min="<?php echo esc_attr($min_expected_annual); ?>" max="<?php echo esc_attr($max_expected_annual); ?>" maxlength="2">
						</div>
						<div class="range">
							<input type="range" id="sip-amount-return-range" value="<?php echo esc_attr($default_expected_annual); ?>" min="<?php echo esc_attr($min_expected_annual); ?>" max="<?php echo esc_attr($max_expected_annual); ?>">
						</div>
					</div>
	            	<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="level1-clients">
								<?php echo esc_html('Adjust for Inflation ?','sip-calculator'); ?> 
							</label>
							<div>
				              	<select id="inflation">
			                  		<option value="no" selected><?php echo esc_html("No Inflation","sip-calculator"); ?></option>
				                    <option value="6"><?php echo esc_html("6%","sip-calculator"); ?></option>
				                    <option value="8"><?php echo esc_html("8%","sip-calculator"); ?></option>
				                    <option value="10"><?php echo esc_html("10%","sip-calculator"); ?></option>
				                    <option value="12"><?php echo esc_html("12%","sip-calculator"); ?></option>
				                </select>
				          	</div>
						</div>
					</div>
				</div>
				
					<div id="result2" class="chart_box">
						<div class="sip_chart">
		                	<canvas id="myChart" width="400" height="400"></canvas>
		                </div>
		            </div>
		        
			</div>
	    </div>
	</section>
	<?php }else { ?>
		<section class="sip-calc-header-section">
	    <div class="caption-cont">
	    	<h1 class="font-weight-bold" id="primecap"><?php echo esc_attr($sip_title); ?></h1>
	  	</div>
	  	<div class="containers-fluids">
	      	<div class="sip_calc_container">
				<div class="sip-calc">
					<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="level1-clients">
								<?php echo esc_html('Investment Amount(Rs.): *','sip-calculator'); ?>
							</label>
							<input type="text" class="sip_text_field" id="invstamount" value="<?php echo esc_attr($default_invested_amount); ?>" min="<?php echo esc_attr($min_invested_amount); ?>" max="<?php echo esc_attr($max_invested_amount); ?>" maxlength="6">
						</div>
						<div class="range">
							<input type="range" id="sip-amount-investment" value="<?php echo esc_attr($default_invested_amount); ?>" min="<?php echo esc_attr($min_invested_amount); ?>" max="<?php echo esc_attr($max_invested_amount); ?>">
						</div>
					</div>

					<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="level1-clients">
								<?php echo esc_html('Investment Type: *','sip-calculator'); ?>
							</label>
							<div>
				              	<select id="invst_type">
				                	<option value="week" selected><?php echo esc_html("Weekly","sip-calculator"); ?></option>
				                	<option value="mon"><?php echo esc_html("Monthly","sip-calculator"); ?></option>
				                	<option value="quat"><?php echo esc_html("Quarterly","sip-calculator"); ?></option>
				              	</select>
				          	</div>
						</div>
					</div>

					<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="daily-orders">
								<?php echo esc_html('Investment Period (Years) : *','sip-calculator'); ?>
							</label>
							<input type="text" class="sip_text_field" id="invstperiod" value="<?php echo esc_attr($default_investment_period); ?>" min="<?php echo esc_attr($min_investment_period); ?>" max="<?php echo esc_attr($max_investment_period); ?>" maxlength="2">
						</div>
						<div class="range">
							<input type="range" id="sip-amount-year-range" value="<?php echo esc_attr($default_investment_period); ?>" min="<?php echo esc_attr($min_investment_period); ?>" max="<?php echo esc_attr($max_investment_period); ?>">
						</div>
					</div>
					<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="commission">
								<?php echo esc_html('Expected Annual Returns (%) *','sip-calculator'); ?>
							</label>
							<input type="text" class="sip_text_field" id="expreturn" value="<?php echo esc_attr($default_expected_annual); ?>" min="<?php echo esc_attr($min_expected_annual); ?>" max="<?php echo esc_attr($max_expected_annual); ?>" maxlength="2">
						</div>
						<div class="range">
							<input type="range" id="sip-amount-return-range" value="<?php echo esc_attr($default_expected_annual); ?>" min="<?php echo esc_attr($min_expected_annual); ?>" max="<?php echo esc_attr($max_expected_annual); ?>">
						</div>
					</div>
	            	<div class="range_data_box">
						<div class="sip-field">
							<label class="sip_label" for="level1-clients">
								<?php echo esc_html('Adjust for Inflation ?','sip-calculator'); ?> 
							</label>
							<div>
				              	<select id="inflation">
			                  		<option value="no" selected><?php echo esc_html("No Inflation","sip-calculator"); ?></option>
				                    <option value="6"><?php echo esc_html("6%","sip-calculator"); ?></option>
				                    <option value="8"><?php echo esc_html("8%","sip-calculator"); ?></option>
				                    <option value="10"><?php echo esc_html("10%","sip-calculator"); ?></option>
				                    <option value="12"><?php echo esc_html("12%","sip-calculator"); ?></option>
				                </select>
				          	</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</section>
    <?php } ?>
	
    <div class="containers-fluids" id="result_cont">
        <div class="containers">
        	<?php if($sip_enable_table == 'true'){ ?>
	        <div class="containers_fluid_rows">
	            <div class="sip_calculator_col">
		            <div id="result1" class="summry_box">
	            		<div class="sip_calc_res_box">
			                <label for="first-name"><?php echo esc_attr($expected_amount_text.': '); ?><em class="sip_cal_alert"><?php echo esc_html("*","sip-calculator"); ?></em></label>
			                <span id="rf1" style="margin-left:5px; color:black; font-size: 22px; font-weight: 500;"><?php echo esc_html("Rs. ","sip-calculator"); ?>&nbsp;</span> 
		                </div>
		                <div class="sip_calc_res_box">			                
			                <label for="first-name"><?php echo esc_attr($amount_invested_text.': '); ?><em class="sip_cal_alert"><?php echo esc_html("*","sip-calculator"); ?></em></label>
			                <span id="rf2" style="margin-left:5px; color:black; font-size: 22px; font-weight: 500;"><?php echo esc_html("Rs. ","sip-calculator"); ?>&nbsp;</span>
			            	</div>
		                <div class="sip_calc_res_box">
			                <label for="first-name"><?php echo esc_attr($profit_earned_text.': '); ?><em class="sip_cal_alert"><?php echo esc_html("*","sip-calculator"); ?></em></label>
			                <span id="rf3" style="margin-left:5px; color:black; font-size: 22px; font-weight: 500;"><?php echo esc_html("Rs. ","sip-calculator"); ?>&nbsp;</span>
		            	</div>
		            </div>
	            </div>
	            <div class="res_table">
		            <div class="containers" id="result3">
		                <table class="sip-cal-table sip-cal-table-hover">
		                  	<caption style="caption-side: top; text-align: center;" id="tab_cap"><?php echo esc_html("Projected SIP returns for various
		                    time durations. [ @rate ]","sip-calculator"); ?></caption>
				                <thead class="sip-result-head">
				                    <tr>
				                      <th class="durartion" scope="col"><?php echo esc_html("Duration","sip-calculator"); ?></th>
				                      <th class="sip_amount" scope="col"><?php echo esc_html("SIP Amount (₹)","sip-calculator"); ?></th>
				                      <th class="future_amount" scope="col"><?php echo esc_html("Future Value (₹)","sip-calculator"); ?></th>
				                    </tr>
				                </thead>
		                    <tbody id="projectTable">

		                    </tbody>
		                </table>
		            </div>
	            </div>
	        </div>
	    	<?php }else{ ?>
	    	<div class="containers_fluid_rows">
	            <div class="sip_calculator_col">
		            <div id="result1" class="summry_box">
	            		<div class="sip_calc_res_box">
			                <label for="first-name"><?php echo esc_attr($expected_amount_text.': '); ?><em class="sip_cal_alert"><?php echo esc_html("*","sip-calculator"); ?></em></label>
			                <span id="rf1" style="margin-left:5px; color:black; font-size: 22px; font-weight: 500;"><?php echo esc_html("Rs. ","sip-calculator"); ?>&nbsp;</span>
		                </div>
		                <div class="sip_calc_res_box">			                
			                <label for="first-name"><?php echo esc_attr($amount_invested_text.': '); ?><em class="sip_cal_alert"><?php echo esc_html("*","sip-calculator"); ?></em></label>
			                <span id="rf2" style="margin-left:5px; color:black; font-size: 22px; font-weight: 500;"><?php echo esc_html("Rs. ","sip-calculator"); ?>&nbsp;</span>
			            	</div>
		                <div class="sip_calc_res_box">
			                <label for="first-name"><?php echo esc_attr($profit_earned_text.': '); ?><em class="sip_cal_alert"><?php echo esc_html("*","sip-calculator"); ?></em></label>
			                <span id="rf3" style="margin-left:5px; color:black; font-size: 22px; font-weight: 500;"><?php echo esc_html("Rs. ","sip-calculator"); ?>&nbsp;</span>
		            	</div>
		            </div>
	            </div>
	        </div>
		    <?php } ?>
        </div>
    </div>
	<?php
	$content = ob_get_clean();
	return $content;
}