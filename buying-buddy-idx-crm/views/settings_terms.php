<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   ?>
<div id="bbplugin-settings" class="bbterms">
    <img src="<?php echo esc_url(plugin_dir_url(__FILE__)); ?>../images/buying-buddy-juggler.png" height="180" class="juggler" alt="">
	<div class="container-fluid bb-main-wrapper"> 
        <div class="maxwidth-xl ml-0 pl-lg-3">    
                           
            <form action="" method="post" name="options">
                <input type="hidden" name="buyingbuddy_check_terms" value="1">
                 <?php wp_nonce_field( 'buyingbuddy_terms_action', 'buyingbuddy_terms' ); ?>
                <div class="row">
                    <div class="col"> 	     
                		<h2>Welcome to Buying Buddy&#174;</h2>

                <?php  
                if (isset($_POST["buyingbuddy_check_terms"]) && $_POST["buyingbuddy_check_terms"] == 1 && $_POST["buyingbuddy_accept_terms"] != 1) { ?>
            		    <div class="status-messages mb-4">
						    <div class="px-3 status-error">You need to accept the terms and conditions</div>
						</div>                            
                <?php  } ?>							
                		<div class="max700">
                    		<div class="card card-outline mb-2">
                    			<div class="card-body">
                        			<h3 class="mt-0 mb-2">Lets Get Started!</h3>
                        			<p class="mb-2">
                        				The Buying Buddy plugin needs to connect to our servers as part of activation.<br>
                        				Information is collected to pre-fill forms, and includes:
                    				</p>
                					<ul class="list-disc list-compact ml-2 mb-3">
                						<li>This website's domain name</li>
                    					<li>Your name and email address</li>
                    					<li>WordPress version and this plugin version</li>
                					</ul>
                        			    	 
                					<div class="form-group">
                            			<div class="form-check form-check-inline">
                            				<input type="checkbox" class="chk-input" id="buyingbuddy_accept_terms" name="buyingbuddy_accept_terms" value="1" >
                            				<label class="chk-label" for="buyingbuddy_accept_terms">                                              
                                                <span class="chk-check"></span>
                                                <span class="chk-text">I consent to the Buying Buddy plugin contacting Buying Buddy's servers.</span>
                                            </label>
                                        </div>  
                                    </div>
                                    <div class="row">
                                    	<div class="col-12 mb-3"> 	
                                            <button type="submit" class="btn btn-success btn-label label-right ml-auto mr-0 ">
                                            	Submit
                                            	<span class="btn-label-icon">
                                                    <svg
                                                    	style="width:1.125em;height:1.125em;vertical-align:text-top;fill:currentColor;overflow:hidden;"
                                                    	viewBox="0 0 512 512">
                                                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    	<path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM281 385c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l71-71L136 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l182.1 0-71-71c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L393 239c9.4 9.4 9.4 24.6 0 33.9L281 385z"/>
                                                    </svg>                                                	
                                        		</span>
                                        	</button>  
                                    	</div>                                                               	
                					</div>		
            					</div>									
            				</div>  
        				</div>                 	           	       		           	
        	        </div>
    	        </div>
			</form> 			