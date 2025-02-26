<?php
/*
** adding necessarey files
*/

function easypaypalbuttonAdminFiles() {

	wp_enqueue_style('easypaypalbuttonAdminFilesMainStyle', plugins_url('/css/style.css', __FILE__));
	wp_enqueue_style('easypaypalbuttonAdminFilesFontAwesome', plugins_url('/font-awesome/css/font-awesome.min.css', __FILE__));
	wp_enqueue_script('easypaypalbuttonAdminFilesCutomLogic', plugins_url('/js/logic.js',__FILE__ ));
}
add_action('admin_enqueue_scripts', 'easypaypalbuttonAdminFiles');


//color picker
add_action( 'admin_enqueue_scripts', 'easypaypalbuttonAdminColorPicker' );
function easypaypalbuttonAdminColorPicker( $hook ) {

	if( is_admin() ) { 

        // Add the color picker css file       
		wp_enqueue_style( 'wp-color-picker' ); 

        // Include our custom jQuery file with WordPress Color Picker dependency
		wp_enqueue_script( 'easypaypalbuttoncustom-script-handle', plugins_url( 'js/custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
	}
}



/*Theme customize */
add_action( 'admin_menu', 'easypaypalbuttonAdminPage' );

/**
 * Adds a new settings page under Setting menu
*/

function easypaypalbuttonAdminPage() {
	add_options_page( __( ' Easy PayPal Buttons' ), __( ' Easy PayPal Buttons Setting' ), 'manage_options', 'easypaypalbuttonAdminPage', 'easypaypalbuttonAdminPageDisplay' );
}

/**
* Tabs Method 
*/
function easypaypalbuttonAdminTabs( $current = 'first' ) {
	$tabs = array(
		'first'   => __( 'General', 'general-tab' ),
		'second'   => __( 'Premium', 'Premium-tab' ), 
		'third'   => __( 'Help', 'help-tab' ), 
		
		
		
	);
	$html = '<h2 class="easy-paypal-btn-tabnav-tab-wrapper easy-paypal-btn-nav">';
	foreach( $tabs as $tab => $name ){
		$class = ( $tab == $current ) ? 'nav-tab-active' : '';
		$html .= '<a class="nav-tab ' . esc_html($class) . '" href="?page=easypaypalbuttonAdminPage&tab=' . esc_html($tab) . '">' . esc_html($name) . '</a>';
	}
	$html .= '</h2>';
	echo $html ;
}

function easypaypalbuttonAdminPageDisplay(){
	?>
	<div class="cont-p-dashboard">
		<!-- ================= PLUGIN LOGO ====================== -->
		<header class="dashboard-header">
			<div class="dash-logo">
				<h3 class="plugin-logo">Easy PayPal Buttons Dashboard</h3>
			</div>
			<div class="dash-nav">
				<button type="button" id="save-setting" class="footer-save-btn save-btn update-setting save-button">  
					<div class="text">
						<span class="no1">UPDATE</span>
					</div>
					<div class="loading-bar"></div></button>
				</div>
				<div class="clr-fix"></div>
				<div class="short-code">
					<input type="text" name="shortcode" id="shortcode-field" class="get-shortcode" readonly value='[easy_paypal_button email="" currency="usd" donation_amount="" return_url="" item_name="" btn_type="" img_id="" max-width="" ]'>
					
				</div>
			</header>
		</div>
		<?php

    // ================== Tabs ========================//
		$tab = ( ! empty( $_GET['tab'] ) ) ? esc_attr( $_GET['tab'] ) : 'first';
		easypaypalbuttonAdminTabs( $tab );


   // =========================== Tab 1 ========================//
		if ( $tab == 'first' ) {
			?>
			<form method="post" action="#">
				<div class="easy-paypal-btnTabs  gen-sett tab-1">
					<!-- ================ EMAIL ADDRESS WRAP =================== -->
					<div  class="field-layout layout-1 email-address">
						<label for="paypal-email-address"> Paypal Email Address: </label>   
						<input type="email" name="paypal_email_address" id="paypal-email-address" class="field-wrap" placeholder="heloworld@gmail.com" >
						<p class="alert-msg">PayPal email address (account) you want to recieve money on.</p> 	
					</div>
					<!-- ================ CURRENCY =================== -->
					<div  class="field-layout layout-2 currency">
						<label for="paypal-currency"> Currency: </label> 
						<select name="paypal_currency" id="paypal-currency" class="field-wrap">
							<option value="Argentinian">Argentinian Peso (ARS)</option>
							<option value="Australian">Australian Dollar (AUD)</option>
							<option value="Canadian">Canadian Dollar (CAD)</option>
							<option value="Swiss Franc">Swiss Franc (CHF)</option>
							<option value="Czech">Czech Koruna (CZK)</option>
							<option value="Danish">Danish Krone (DKK)</option>
							<option value="Euro">Euro (EUR)</option>
							<option value="Hong Kong">Hong Kong Dollar (HKD)</option>
							<option value="Hungarian">Hungarian Forint (HUF)</option>
							<option value="Israeli">Israeli New Shekel (ILS)</option>
							<option value="Japanese">Japanese Yen (JPY)</option>
							<option value="Mexican">Mexican Peso (MXN)</option>
							<option value="Malaysian">Malaysian Ringgit (MYR)</option>
							<option value="Norwegian">Norwegian Krone (NOK)</option>
							<option value="New Zealand">New Zealand Dollar (NZD)</option>
							<option value="Philippine">Philippine Peso (PHP)</option>
							<option value="Polish ">Polish Zloty (PLN)</option>
							<option value="Russian">Russian Ruble (RUB)</option>
							<option value="Swedish">Swedish Krona (SEK)</option>
							<option value="Singapore">Singapore Dollar (SGD)</option>
							<option value="Thai">Thai Baht (THB)</option>
							<option value="Taiwan">Taiwan New Dollar (TWD)</option>
							<option value="usa" selected>United States Dollar (USD)</option> 
						</select>  
						<p class="alert-msg">Payment Currency.</p> 	
					</div>      
					<!-- ================ DONATION AMOUNT  WRAP =================== -->
					<div  class="field-layout layout-3 donation-wrap">
						<label for="donation-amount"> Paypal Donation Amount: </label>   
						<input type="text" name="donation_amount" id="donation-amount" class="field-wrap" value="10">
						<p class="alert-msg">Price of the item, or donation amount. Use dot not comma as desimal seprator. If you want to users to enter the donation amount themselves leave blank or zero. </p> 	
					</div>
					<!-- ================ ITEM NAME OR DONATION DESCRIPTION =================== -->
					<div  class="field-layout layout-4 item-name-donation-desc">
						<label for="item-name"> Item name or donation description: </label>   
						<input type="text" name="item_name" id="item-name" class="field-wrap" placeholder="Donation For School">
						<p class="alert-msg">If left blank customers can enter their own description on checkout. Max 130 chars. </p> 	
					</div>
					<!-- ================ RETURN URL =================== -->
					<div  class="field-layout layout-5 return-url-wrap">
						<label for="return-url">  Return url:</label>   
						<input type="url" name="return_url" id="return-url" class="field-wrap" placeholder="www.moondeveloper.com">
						<p class="alert-msg">The URL buyers are redirected to after they complete the payment. Use {Site-url} and {this-page} variables if you don't want to enter ful URL's. </p> 	
					</div>
					<!-- ==================== CHOOSE BUTTON TYPE ====================== -->
					<div  class="field-layout layout-6 chose-btn-type-wrap">
						<label for="chose-btn-type"> BUTTON TYPE: </label>   
						<select id="chose-btn-type" name="chose_btn_type" class="field-wrap">
							<option value="default" id="default" selected>SELECT BUTTON</option>
							<option value="donate" id="donate-now">DONATE</option>
							<option value="subscribe" id="sub-now">SUBSCRIBE</option>
							<option value="buy" id="buy-now">BUY</option>
							
						</select>
						<p class="alert-msg">Please Choose an appropriate button type. Misguiding your users or purposly choosing a wrong button type may get your PayPal account banned.</p> 	
					</div>
						<!-- ================  IMAGE WIDTH ======================= -->
        	 <div class="btn-width-wrapper">
                <label for="img-width">SELECT BUTTON MAX WIDTH:</label>
                <input type="text" name="img-width" value="100%" id="img-width">
                </div>
					<!-- =================== CHOOSE DONATE BUTTON =========================== -->
					<div class="donate-btn-wrapper btn-selection selection-1 field-layout">
						
						<!--=========== BUTTON IMAGES ================ -->
						<label> DONATE BUTTON IMAGES:</label> 
						<!-- =============== DONATE BUTTON 1 ======================= -->                 
						<div class="btn-1 btn-wrapper button-layout-1 free-btn-wrapper">
							<input type="checkbox" name="donate-btn-1" id="donate-btn-1" class="check-btn">
							<label for="donate-btn-1" class="btn-lab">
								<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d26.png'; ?>"  alt="donate-btn-1" id="1">
							</label>              
						</div>
						

						<!--- =================== GER PRO VERSION ==================== -->
						<label class="get-pro"> GET PRO VERSION:</label>  
						<div class="paid-btns">       
							<!-- =============== DONATE BUTTON 1 ======================= -->
							<div class="btn-7 btn-wrapper button-layout-7">
								
								<label for="donate-btn-7" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d7.png'; ?>" alt="donate_btn_7" id="d7">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 2 ======================= -->
							<div class="btn-8 btn-wrapper button-layout-8">

								<label for="donate-btn-8" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d8.png'; ?>" alt="donate_btn_8" id="d8">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 3 ======================= -->
							<div class="btn-9 btn-wrapper button-layout-9">
								<label for="donate-btn-9" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d9.png'; ?>" alt="donate_btn_9" id="d9">
								</label>    
							</div>


							<!-- =============== DONATE BUTTON 4 ======================= -->
							<div class="btn-10 btn-wrapper button-layout-10">

								<label for="donate-btn-10" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d10.jpg'; ?>" alt="donate_btn_10" id="d10">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 5 ======================= -->
							<div class="btn-11 btn-wrapper button-layout-11">

								<label for="donate-btn-11" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d11.jpg'; ?>" alt="donate_btn_11" id="d11">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 6 ======================= -->
							<div class="btn-12 btn-wrapper button-layout-12">

								<label for="donate-btn-12" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d12.png'; ?>"  alt="donate_btn_12" id="d12">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 7 ======================= -->
							<div class="btn-13 btn-wrapper button-layout-13">

								<label for="donate-btn-13" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d13.png'; ?>"  alt="donate_btn_13" id="d13">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 8 ======================= -->
							<div class="btn-14 btn-wrapper button-layout-14">

								<label for="donate-btn-14" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d14.png'; ?>"  alt="donate_btn_14" id="d14">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 9 ======================= -->
							<div class="btn-15 btn-wrapper button-layout-15">

								<label for="donate-btn-15" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d15.png'; ?>"  alt="donate_btn_15" id="d15">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 10 ======================= -->
							<div class="btn-16 btn-wrapper button-layout-16">

								<label for="donate-btn-16" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d16.jpg'; ?>"  alt="donate_btn_16" id="d16">
								</label>    
							</div> 
							<!-- =============== DONATE BUTTON 11 ======================= -->
							<div class="btn-17 btn-wrapper button-layout-17">

								<label for="donate-btn-17" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d17.png'; ?>"  alt="donate_btn_17" id="d17">
								</label>    
							</div>   
							<!-- =============== DONATE BUTTON 12 ======================= -->
							<div class="btn-18 btn-wrapper button-layout-18">

								<label for="donate-btn-18" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d18.png'; ?>"  alt="donate_btn_18" id="d18">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 13 ======================= -->
							<div class="btn-19 btn-wrapper button-layout-19">

								<label for="donate-btn-19" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d19.png'; ?>"  alt="donate_btn_19" id="d19">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 14 ======================= -->
							<div class="btn-20 btn-wrapper button-layout-20">

								<label for="donate-btn-20" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d20.png'; ?>"  alt="donate_btn_20" id="d20">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 15 ======================= -->
							<div class="btn-21 btn-wrapper button-layout-21">

								<label for="donate-btn-21" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d21.png'; ?>"  alt="donate_btn_21" id="d21">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 16 ======================= -->
							<div class="btn-22 btn-wrapper button-layout-22">

								<label for="donate-btn-22" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d22.png'; ?>"  alt="donate_btn_22" id="d22">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 17 ======================= -->
							<div class="btn-23 btn-wrapper button-layout-23">

								<label for="donate-btn-23" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d23.png'; ?>"  alt="donate_btn_23" id="d23">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 18 ======================= -->
							<div class="btn-24 btn-wrapper button-layout-24">

								<label for="donate-btn-24" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d24.png'; ?>"  alt="donate_btn_24" id="d24">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 19 ======================= -->
							<div class="btn-25 btn-wrapper button-layout-25">
								
								<label for="donate-btn-25" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d25.png'; ?>"  alt="donate_btn_25" id="d25">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 20 ======================= -->
							<div class="btn-26 btn-wrapper button-layout-26">

								<label for="donate-btn-26" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d26.png'; ?>"  alt="donate_btn_26" id="d26">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 21 ======================= -->
							<div class="btn-27 btn-wrapper button-layout-27">

								<label for="donate-btn-27" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d27.png'; ?>"  alt="donate_btn_27" id="d27">
								</label>    
							</div>
							<!-- =============== DONATE BUTTON 22 ======================= -->
							<div class="btn-28 btn-wrapper button-layout-28">
								
								<label for="donate-btn-28" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/d28.png'; ?>"  alt="donate_btn_28" id="d28">
								</label>    
							</div>
						</div>
						
					</div>
					<!-- =================== CHOOSE SUBSCRIBE BUTTON =========================== -->
					<div class="subscibe-btn-wrapper btn-selection selection-2 field-layout">
						<label>SELECT SUBSCRIBE BUTTON:</label>

						<!-- =============== SUBSCRIBE BUTTON 2 ======================= -->
						<div class="sub-btn-1 btn-wrapper button-layout-1 free-btn-wrapper">
							<input type="checkbox" name="sub_btn_1" id="sub-btn-1" class="check-btn">
							<label for="sub-btn-1" class="btn-lab">
								<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s3.PNG'; ?>" alt="sub_btn_1" id="s1">
							</label>
						</div>

						<!--- =================== GER PRO VERSION ==================== -->
						<label class="get-pro"> GET PRO VERSION:</label>   
						<div class="paid-btns"> 
							<!-- =============== SUBSCRIBE BUTTON 1 ======================= -->
							<div class="sub-btn-1 btn-wrapper button-layout-1">
								<label for="sub-btn-1" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s1.PNG'; ?>" alt="sub_btn_1" id="s1">
								</label>	
							</div>
							
							<!-- =============== SUBSCRIBE BUTTON 3 ======================= -->
							<div class="sub-btn-3 btn-wrapper button-layout-3">
								<label for="sub-btn-3" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s3.PNG'; ?>" alt="sub_btn_3" id="s3">
								</label>	
							</div>
							<!-- =============== SUBSCRIBE BUTTON 4 ======================= -->
							<div class="sub-btn-4 btn-wrapper button-layout-4">
								<label for="sub-btn-4" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s4.PNG'; ?>" alt="sub_btn_4" id="s4">
								</label>	
							</div>
							<!-- =============== SUBSCRIBE BUTTON 5 ======================= -->
							<div class="sub-btn-5 btn-wrapper button-layout-5">
								<label for="sub-btn-5" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s5.PNG'; ?>" alt="sub_btn_5" id="s5">
								</label>	
							</div>
							<!-- =============== SUBSCRIBE BUTTON 6 ======================= -->
							<div class="sub-6 btn-wrapper button-layout-6">
								<label for="sub-btn-6" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s6.gif'; ?>" alt="sub_btn_6" id="s6">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 7 ======================= -->
							<div class="sub-7 btn-wrapper button-layout-7">
								<label for="sub-btn-7" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s7.png'; ?>" alt="sub_btn_7" id="s7">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 8 ======================= -->
							<div class="sub-8 btn-wrapper button-layout-8">
								<label for="sub-btn-8" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s8.png'; ?>" alt="sub_btn_8" id="s8">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 9 ======================= -->
							<div class="sub-9 btn-wrapper button-layout-9">
								<label for="sub-btn-9" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s9.png'; ?>" alt="sub_btn_9" id="s9">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 10 ======================= -->
							<div class="sub-10 btn-wrapper button-layout-10">
								<label for="sub-btn-10" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s10.PNG'; ?>" alt="sub_btn_10" id="s10">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 11 ======================= -->
							<div class="sub-11 btn-wrapper button-layout-11">
								<label for="sub-btn-11" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s11.png'; ?>" alt="sub_btn_11" id="s11">
								</label>        
							</div>
							
							<!-- =============== SUBSCRIBE BUTTON 12 ======================= -->
							<div class="sub-12 btn-wrapper button-layout-12">
								<label for="sub-btn-12" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s12.png'; ?>" alt="sub_btn_12" id="s12">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 13 ======================= -->
							<div class="sub-13 btn-wrapper button-layout-13">
								<label for="sub-btn-13" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s13.png'; ?>" alt="sub_btn_13" id="s13">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 14 ======================= -->
							<div class="sub-14 btn-wrapper button-layout-14">
								<label for="sub-btn-14" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s14.png'; ?>" alt="sub_btn_14" id="s14">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 15 ======================= -->
							<div class="sub-15 btn-wrapper button-layout-15">
								<label for="sub-btn-15" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s15.png'; ?>" alt="sub_btn_15" id="s15">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 16 ======================= -->
							<div class="sub-16 btn-wrapper button-layout-16">
								<label for="sub-btn-16" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s16.png'; ?>" alt="sub_btn_16" id="s16">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 17 ======================= -->
							<div class="sub-17 btn-wrapper button-layout-17">
								<label for="sub-btn-17" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s17.png'; ?>" alt="sub_btn_17" id="s17">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 18 ======================= -->
							<div class="sub-18 btn-wrapper button-layout-18">
								<label for="sub-btn-18" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s18.png'; ?>" alt="sub_btn_18" id="s18">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 19 ======================= -->
							<div class="sub-19 btn-wrapper button-layout-19">
								<label for="sub-btn-19" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s19.png'; ?>" alt="sub_btn_19" id="s19">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 20 ======================= -->
							<div class="sub-20 btn-wrapper button-layout-20">
								<label for="sub-btn-20" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s20.png'; ?>" alt="sub_btn_20" id="s20">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 21 ======================= -->
							<div class="sub-21 btn-wrapper button-layout-21">
								<label for="sub-btn-21" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s21.png'; ?>" alt="sub_btn_21" id="s21">
								</label>        
							</div>
							<!-- =============== SUBSCRIBE BUTTON 22 ======================= -->
							<div class="sub-22 btn-wrapper button-layout-22">
								<label for="sub-btn-22" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/subs/s22.png'; ?>" alt="sub_btn_22" id="s22">
								</label>        
							</div>
						</div>
						
						
						
						
					</div>
					<!-- =================== CHOOSE BUY BUTTON =========================== -->
					<div class="buy-btn-wrapper btn-selection selection-3 field-layout free-btn-wrapper">
						<label>SELECT BUY BUTTON:</label>
						<div class="buy-1 btn-wrapper button-layout-1">
							<input type="checkbox" name="buy_btn_1" id="buy-btn-1" class="check-btn">
							<label for="buy-btn-1" class="btn-lab">
								<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b27.png'; ?>" alt="buy_btn_1" id="b1">
							</label>
						</div>

						<!--- =================== GER PRO VERSION ==================== -->
						<label class="get-pro"> GET PRO VERSION:</label>   
						<div class="paid-btns"> 
							<!-- =============== BUY BUTTON 1 ======================= -->
							<div class="buy-btn-1 btn-wrapper button-layout-1">
								<label for="buy-btn-1" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b7.png'; ?>" alt="buy_btn_1" id="b1">
								</label>		
							</div>
							<!-- =============== BUY BUTTON 2 ======================= -->
							<div class="buy-btn-2 btn-wrapper button-layout-2">
								<label for="buy-btn-2" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b8.png'; ?>" alt="buy_btn_2" id="b2">
								</label>
							</div>
							<!-- =============== BUY BUTTON 3 ======================= -->
							<div class="buy-btn-3 btn-wrapper button-layout-3">
								<label for="buy-btn-3" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b9.png'; ?>" alt="buy_btn_3" id="b3">
								</label>	
							</div>
							<!-- =============== BUY BUTTON 4 ======================= -->
							<div class="buy-btn-4 btn-wrapper button-layout-4">
								<label for="buy-btn-4" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b10.png'; ?>" alt="buy_btn_4" id="b4">
								</label>
							</div>
							<!-- =============== BUY BUTTON 5 ======================= -->
							<div class="buy-btn-5 btn-wrapper button-layout-5">
								<label for="buy-btn-5" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b11.png'; ?>" alt="buy_btn_5" id="b5">
								</label>
							</div>
							<!-- =============== BUY BUTTON 6 ======================= -->
							<div class="buy-6 btn-wrapper button-layout-6">
								<label for="buy-btn-6" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b12.png'; ?>" alt="buy_btn_6" id="b6">
								</label>
							</div>
							<!-- =============== BUY BUTTON 7 ======================= -->
							<div class="buy-7 btn-wrapper button-layout-7">
								<label for="buy-btn-7" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b13.png'; ?>" alt="buy_btn_7" id="b7">
								</label>
							</div>
							<!-- =============== BUY BUTTON 8 ======================= -->
							<div class="buy-8 btn-wrapper button-layout-8">
								<label for="buy-btn-8" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b14.png'; ?>" alt="buy_btn_8" id="b8">
								</label>
							</div>
							<!-- =============== BUY BUTTON 9 ======================= -->
							<div class="buy-9 btn-wrapper button-layout-9">
								<label for="buy-btn-9" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b15.png'; ?>" alt="buy_btn_9" id="b9">
								</label>
							</div>
							<!-- =============== BUY BUTTON 10 ======================= -->
							<div class="buy-10 btn-wrapper button-layout-10">
								<label for="buy-btn-10" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b16.png'; ?>" alt="buy_btn_10" id="b10">
								</label>
							</div>
							<!-- =============== BUY BUTTON 11 ======================= -->
							<div class="buy-11 btn-wrapper button-layout-11">
								<label for="buy-btn-11" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b17.png'; ?>" alt="buy_btn_11" id="b11">
								</label>
							</div>
							<!-- =============== BUY BUTTON 12 ======================= -->
							<div class="buy-12 btn-wrapper button-layout-12">
								<label for="buy-btn-12" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b18.png'; ?>" alt="buy_btn_12" id="b12">
								</label>
							</div>
							<!-- =============== BUY BUTTON 13 ======================= -->
							<div class="buy-13 btn-wrapper button-layout-13">
								<label for="buy-btn-13" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b19.png'; ?>" alt="buy_btn_13" id="b13">
								</label>
							</div>
							<!-- =============== BUY BUTTON 14 ======================= -->
							<div class="buy-14 btn-wrapper button-layout-14">
								<label for="buy-btn-14" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b20.png'; ?>" alt="buy_btn_14" id="b14">
								</label>
							</div>
							<!-- =============== BUY BUTTON 15 ======================= -->
							<div class="buy-15 btn-wrapper button-layout-15">

								<label for="buy-btn-15" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b21.png'; ?>" alt="buy_btn_15" id="b15">
								</label>
							</div>
							<!-- =============== BUY BUTTON 16 ======================= -->
							<div class="buy-16 btn-wrapper button-layout-16">

								<label for="buy-btn-16" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b22.png'; ?>" alt="buy_btn_16" id="b16">
								</label>
							</div>
							<!-- =============== BUY BUTTON 17 ======================= -->
							<div class="buy-17 btn-wrapper button-layout-17">
								<label for="buy-btn-17" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b23.png'; ?>" alt="buy_btn_17" id="b17">
								</label>
							</div>
							<!-- =============== BUY BUTTON 18 ======================= -->
							<div class="buy-18 btn-wrapper button-layout-18">
								<label for="buy-btn-18" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b24.png'; ?>" alt="buy_btn_18" id="b18">
								</label>
							</div>
							<!-- =============== BUY BUTTON 19 ======================= -->
							<div class="buy-19 btn-wrapper button-layout-19">
								<label for="buy-btn-19" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b25.png'; ?>" alt="buy_btn_19" id="b19">
								</label>
							</div>
							<!-- =============== BUY BUTTON 20 ======================= -->
							<div class="buy-20 btn-wrapper button-layout-20">
								<label for="buy-btn-20" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b26.png'; ?>" alt="buy_btn_20" id="b20">
								</label>
							</div>
							<!-- =============== BUY BUTTON 21 ======================= -->
							<div class="buy-21 btn-wrapper button-layout-21">
								<label for="buy-btn-21" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b27.png'; ?>" alt="buy_btn_21" id="b21">
								</label>
							</div>
							<!-- =============== BUY BUTTON 22 ======================= -->
							<div class="buy-22 btn-wrapper button-layout-22">
								<label for="buy-btn-22" class="btn-lab">
									<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/imgs/buy/b28.png'; ?>" alt="buy_btn_22" id="b22">
								</label>
							</div>
						</div>                             
					</div> 

					<!-- ================= SAVE SETTING ========================= -->
					<div class="save-sett-wrap">
						<button type="button" id="save-setting" class="footer-save-btn save-btn update-setting save-button">  
							<div class="text">
								<span class="no1">UPDATE</span>
							</div>
						</div>
					</div>
					<?php
				}
  // =========================== Tab 2 ========================//
				elseif($tab == 'second' ){
					?>
					<div class="easy-paypal-btnTabs tab-2 premium-tab">
						<!-- ======================== HEADER ============================== -->
						
						<header id="premium-header">
							<h1 class="premium-header-title">Upgrade to <b>EASY PAYPAL BUTTON Pro</b></h1>
							<p class="premium-header-desc">Get more Advanced Functionality & Flexibility with the Premium version.</p>
							<!-- ================== UPGRADE WRAPPER ================= -->
							<div class="upgrade-wrap">
								<a href="http://moondeveloper.com/product/easy-paypal-buttons/" target="_blank"><button>Buy Easy PayPal Button Pro</button></a>
							</div>
						</header>   <!-- END OF HEADER -->
						<!-- ====================== PREMIUM FEATURES ========================== -->
						<div class="premium-features">
							<h1 class="premium-features-title">Premium Features You'll Love</h1> 
							<p class="premium-features-desc">We've added more extra features in our Premium Version of this plugin. Let’s see some amazing features.</p>
							<!-- ============== FEATURE WRAP ======================= -->
							<div class="feature-list">
								<!-- ================== FEATURE BLOCK =============== -->
								<div class="feature-detial feature-1">
									<h3>Advanced Shortcode Generator</h3>
									<p>Understanding long-shortcodes attributes are very painful. Easy PayPal Buttons Pro comes with built-in Shortcode Generator to control easily the look and function of the PayPal Buttons. Customize your experience with Shortcode Generator.</p>
								</div>
								<!-- ================== FEATURE BLOCK =============== -->
								<div class="feature-detial feature-2">
									<h3>Easy To Use–No Coding Required</h3>
									<p>Easy PayPal Buttons Pro is very easy to use for anyone who is familiar with WordPress. After installing Easy PayPal Buttons Pro, it will add a powerful, easy to use Easy PayPal Buttons menu on your WordPress dashboard. You’ll be able to manage it and showcase your Easy PayPal Buttons easily!</p>
								</div>
								<!-- ================== FEATURE BLOCK =============== -->
								<div class="feature-detial feature-3">
									<h3>WPBakery (formerly Visual Composer) & Widget Ready</h3>
									<p>The premium plugin includes a Widget to display the layouts. Just create a layout in the Shortcode Generator page, save it to use in the widget!</p>
								</div>
								
							</div>
							<!-- ============== FEATURE WRAP ======================= -->
							<div class="feature-list feature-list-2">

								
								<!-- ================== FEATURE BLOCK =============== -->
								<div class="feature-detial feature-4">
									<h3>50+ Professional Buttons</h3>
									<p>Get designer quality results without writing a single line of code through 50+ professionally pre-designed Buttons for front-end display. Each Button has a different structure and huge customization options to cover all the demands.</p>
								</div>
								<!-- ================== FEATURE BLOCK =============== -->
								<div class="feature-detial feature-5">
									<h3>Built-in Automatic Updates</h3>
									<p>You'll get Automatic Updates when you activate the license key in your site. Once you buy the Easy PayPal Buttons Pro, you will get regular update notification to the dashboard. You can see the change logs before update.</p>
								</div>
								<!-- ================== FEATURE BLOCK =============== -->
								<div class="feature-detial feature-6">
									<h3>Fast & Friendly Support (24x7)</h3>
									<p>We love our valued customers! We always strive to provide 5-star, timely, and comprehensive support whenever you need a helping hand. We've a full time dedicated support team who are always ready to make you happy!</p>
								</div>
							</div><!-- FEATURE LIST -->
							
							<div class="join-now">
								<h4>Join Easy PayPal Buttons Pro!</h4>
								<p>Every purchase comes with 7-day money back guarantee and access to our incredibly Top-notch Support with lightening-fast response time and 100% satisfaction rate. One-Time payment, lifetime automatic update.</p>
								<div class="upgrade-wrap join-now-btn">
									<a href="http://moondeveloper.com/product/easy-paypal-buttons/" target="_blank"><button>Get a license instantly</button></a>

								</div>
							</div>
						</div> <!-- ======== END OF FEATURES  ================== -->

					</div> <!-- ======== END OF TAB 2 ================== -->
					<?php

				}
     // =========================== Tab 3 ========================//
				else{
					?>
					<div class="easy-paypal-btnTabs tab-3 help-tab">
						<header id="help-header">
							<h1 class="tab3-title">Welcome to Easy PayPal Buttons Plugin</h1>
							<p>Thank you for installing Easy PayPal Buttons Plugin! You're now running the most popular Easy PayPal Buttons Plugin plugin. This video playlist will help you get started with the plugin.</p>
						</header><!-- END OF HEADER -->
						
						<div class="help-features">
							<!-- ================ BLOCK =============== -->
							<div class="help-features-detial help-feature-1">
								<i class="sp-tfree-font-icon fa fa-life-ring"></i>
								<h3>Need any Assistance?</h3>
								<p>Our Expert Support Team is always ready to help you out promptly.</p>
								<a href="http://moondeveloper.com/contact/"><button>Contact Support</button></a>
							</div>
							<!-- ================ BLOCK =============== -->
							<div class="help-features-detial help-feature-1">
								<i class="sp-tfree-font-icon fa fa-file-text"></i>
								<h3>Looking for Documentation?</h3>
								<p>We have detailed documentation on every aspects of Easy PayPal Buttons.</p>
								<a href="https://wordpress.org/plugins/easy-paypal-buttons/#description"><button>Documentation</button></a>
							</div>
							<!-- ================ BLOCK =============== -->
							<div class="help-features-detial help-feature-1">
								<i class="sp-tfree-font-icon fa fa-thumbs-up"></i>
								<h3>Like This Plugin?</h3>
								<p>If you like Easy Paypal, please leave us a 5 star rating.</p>
								<a href="https://wordpress.org/support/plugin/easy-paypal-buttons/reviews/#new-post"><button>Rate the Plugin</button></a>
							</div>
						</div>

					</div><!-- ============ END OF TAB 3 ============== -->
					

					<?php
					
				}
			}
