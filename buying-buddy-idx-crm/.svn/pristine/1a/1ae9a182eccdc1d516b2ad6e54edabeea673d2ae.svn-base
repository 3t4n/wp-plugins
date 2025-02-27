<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   ?>
<div id="bbplugin-settings" class="bbactivate">
    <img src="<?php echo esc_url(plugin_dir_url(__FILE__)); ?>../images/buying-buddy-juggler.png" height="180" class="juggler" alt="">
	<div class="container-fluid bb-main-wrapper"> 
        <div class="maxwidth-xl ml-0 pl-lg-3">
            <form action="" method="post" name="options">
                 <?php wp_nonce_field( 'buyingbuddy_activate_action', 'buyingbuddy_activate' ); ?>
                <div class="row">
                    <div class="col">        
                        <h2>Activate Your Plugin</h2>
                        <?php if (!empty($msg_status)) { ?>
                            <div class="status-messages mb-3">
                                <div class="<?php empty($buyingbuddy_options["acid"]) ? "status-error" : "status-warning"; ?>"><?php echo wp_kses_post($msg_status); ?></div>
                            </div>
                        <?php } ?>
                        <div class="max700">
                    		<div class="card card-outline mb-2">
                    			<div class="card-body">
                                    <h4 class="mt-0 mb-1">Did you just purchase a subscription, or get a free trial?</h4>
                                    <p class="mb-3">
                                        Check your email for the welcome email we sent you.
                                    </p>
                                    <h4 class="mb-1">Do you have an existing account?</h4>
                                    <p class="mb-4">
                                        Login to your Buying Buddy dashboard and go to:<br>
                                        <a href="https://www.leadsandcontacts.com/site/domains" target="_blank">
                                            Websites &amp; Widgets > Authorized Domains 
                                            <svg xmlns="http://www.w3.org/2000/svg"  style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 25 25"  xml:space="preserve">
                                                <path d="M13.734 0v1.757h3.25L8.931 9.81l1.23 1.23 8.082-8.053v3.25H20V0ZM.879 1.815A.863.863 0 0 0 0 2.694v16.398c0 .498.38.879.879.879h16.398c.498 0 .878-.38.878-.879v-9.37H16.4v8.492H1.757V3.572h8.492V1.815c0 .03-9.37.03-9.37 0z" style="stroke-width:.292831"/>
                                            </svg>
                                            </a>
                                        <br>
                                        Your Activation Key is displayed in the top section.
                                    </p>  
                                    <form action="" method="post" name="options">
                                        <input type="hidden" name="buyingbuddy_check_activation" value="1">                                  
                                        <div class="form-group mb-4">
                                            <label for="buyingbuddy_acid" class="floating-label"> 
                                                <svg 
                                                	style="width: 1.25em; height: 1.25em;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                                	viewBox="0 50 768 1024"  >
                                                    <path d="m 406.576,512 q 0,14.848 -10.85867,25.70667 l -256,256 q -10.85866,10.85866 -25.70666,10.85866 -14.848,0 -25.70667,-10.85866 Q 77.44533,782.848 77.44533,768 V 256 q 0,-14.848 10.85867,-25.70667 10.85867,-10.85866 25.70667,-10.85866 14.848,0 25.70666,10.85866 l 256,256 Q 406.576,497.152 406.576,512 Z" id="path2" >
                                                </svg>  
                                                Enter your Activation Key here:
                                            </label>
                                    <?php if (!empty($_POST['buyingbuddy_check_activation'])  && !empty($invalid_acid)) { ?>
                                            <div class="d-flex align-items-center alert alert-danger lh-13 mb-2">
                                                <svg 
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    version="1.1"
                                                    style="fill:currentColor;fill-rule:evenodd;stroke:none;stroke-width:1;flex-shrink:0;margin-right:8px;"
                                                    width="1.2em" height="1.2em"
                                                    viewBox="0 0 1200 1200">
                                                    <path d="m600 0c-332 0-600 268-600 600s268 600 600 600 600-268 600-600-268-600-600-600zm-5.332 144c53.332-2.668 97.332 38.668 100 90.668v9.332l-22.668 457.33c-1.332 40-36 72-77.332 69.332-37.332-1.332-68-32-69.332-69.332l-22.668-457.33c-1.3359-52 40-97.332 92-100zm76 882.67c-18.668 18.668-44 29.332-70.668 29.332s-52-10.668-70.668-29.332c-18.668-18.668-29.332-44-29.332-70.668s10.668-52 29.332-70.668c18.668-18.668 44-29.332 70.668-29.332s52 10.668 70.668 29.332c18.668 18.668 29.332 44 29.332 70.668s-10.668 52-29.332 70.668z"/>
                                                </svg>
                                                This is an invalid activation key. Please try again or contact our support.
                                            </div>
                                    <?php } ?>    
                                            <div class="form-inline flex-nowrap">
                                                <input type="text" class="form-control flex-grow-1" id="buyingbuddy_acid" name="buyingbuddy_acid" value="<?php echo esc_html($buyingbuddy_acid)?>" placeholder="Account Activation Key">
                                                <button type="submit" class="btn btn-inline btn-success">Save &amp; Continue</button>
                                            </div>
                                        </div>
                                    </form>                                     
                                    <h4 class="mb-1">Don't have an Activation Key?</h4>
                                    <p class="mb-3">
                                        Click an option below to purchase, or get a free trial to automatically activate your plugin.
                                    </p>
                                    <div class="pb-4">
                                        <a href="https://www.leadsandcontacts.com/buyingbuddy/?do=ft&wp=<?php echo esc_html($trialstr);?>" class="btn btn-primary d-inline-block mr-4">Get A Free Trial Now</a>  <span class="small">No Credit Card Required</span>
                                    </div>                                                  
                                    <div class="pb-4">
                                        <a href="https://www.leadsandcontacts.com/buyingbuddy/?wp=<?php echo esc_html($purchasestr);?>" class="btn btn-primary d-inline-block mr-4">Buy Now</a>  <span class="small">See purchase options</span>
                                    </div>
    
                                     
                                    <h4 class="mb-1">Do You Need help?</h4>
                                    <p class="mb-3">
                                        If you are stuck and need help, please <a href="https://buyingbuddy.com/contact.php">use this form to contact us</a>, and describe the issue you are having in the "Questions" field on the form. 
                                    </p> 
    							</div>                                                               
                            </div>  
						</div>                                                                                                              
                    </div>
                </div>
            </form>
			                