<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   ?>
<div id="bbplugin-settings" class="bbthanks">
    <img src="<?php echo esc_url(plugin_dir_url(__FILE__)); ?>../images/buying-buddy-juggler.png" height="180" class="juggler" alt="">
	<div class="container-fluid bb-main-wrapper">          
        <div class="maxwidth-xl ml-0 pl-lg-3">
            <div class="card card-outline border-top border-secondary border-opacity-45">
                <div class="card-header bg-secondary bg-opacity-30 border-secondary border-opacity-30">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="h2 lh-1">
                            <?php echo wp_kses_post($thankyouForHeading); ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="body-inner700">
                        <div class="row">
                            <div class="col-12">
                                <?php echo wp_kses_post($thankyouFor); ?>
            
                                <div class="d-print-none d-flex align-items-center mb-3">
                                    <a class="btn btn-outline-primary btn-sm ml-auto mr-0" href="#" onclick="window.print();">Print This Page</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <?php echo wp_kses_post($confirmationMessage); ?>
                                <?php echo wp_kses_post($installationInstructions); ?>
                                <?php echo wp_kses_post($welcomeMsg); ?>
            
                                <div class="card card-inner-outline overflow-hidden mb-5">
                                    <div class="card-header alert alert-dark alert-marker marker-rounded">
                                        <div class="marker-icon">
                                            <img src="<?php echo esc_url(plugin_dir_url(__FILE__))?>../images/location-dot.png" alt="" />
                                        </div>
                                        <div class="text-h4">Google Map Key</div>
                                    </div>
                                    <div class="card-body pt-3">
                                		<div class="max600 mx-auto"> 
                                        	<?php echo wp_kses_post($gmapInstructions); ?>
                                    	</div>
                                    </div>
                                </div>
                                <?php echo wp_kses_post($couponMesssage); ?>
            
                                <form action="<?php echo get_site_url();?>/wp-admin/options-general.php?page=buying-buddy" method="post" name="install">
                                    <input type="hidden" name="buyingbuddy_install" value="1" />
                                    <?php wp_nonce_field( 'buyingbuddy_install_action', 'buyingbuddy_install' ); ?>
            
                                    <div class="card card-inner-outline mb-5">
                                        <div class="card-header alert alert-dark alert-marker marker-rounded">
                                            <div class="marker-icon">
                                                <img src="<?php echo esc_url(plugin_dir_url(__FILE__))?>../images/angles-right.png" alt="" />
                                            </div>
                                            <div class="text-h4">Add Additional Pages</div>
                                        </div>
                                        <div class="card-body pt-3">
                                           	<div class="max600 mx-auto"> 
                                                <p class="mb-2">
                                                    Add additional helpful pages that are pre-set with widgets.<br>
                                                    These pages can then be edited, modified or deleted as needed.
                                                </p>
                                                <div class="d-flex align-items-center flex-grow-1 mb-1">
                                                    <input type="checkbox" id="select_all" class="mr-2" checked="checked" /><label for="select_all" class="small m-0" style="cursor:pointer">Select All</label>
                                                </div>	                                                		
                								<hr class="mt-1">
                								
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-sm-5">      
                                                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_featured" name="buyingbuddy_install_featured" value="1" checked="checked">
                                                        <label class="chk-label no-bg" for="buyingbuddy_install_featured">
                                                            <span class="chk-check"></span>
                                                            <span class="chk-text strong">Featured Listings</span>
                                                        </label>
                                                    </div> 
                                                    <div class="col-12 col-sm-7">
                                                        <div class="form-row align-items-center">
                                                            <label for="buyingbuddy_install_featured_title" class="col-4 col-form-label text-muted text-right">
                                                                Page Title:
                                                            </label>
                                                            <div class="col-8">
                                                                <input type="text" class="form-control bb-page-title-field" id="buyingbuddy_install_featured_title" data-slug-target="buyingbuddy_install_featured_slug" name="buyingbuddy_install_featured_title" value="Featured Listings">
                                                                <input type="hidden" class="bb-new-page-slug" id="buyingbuddy_install_featured_slug" name="buyingbuddy_install_featured_slug" value="featured-listings-example-page">
                                                            </div>
                                                        </div>                  
                                                    </div> 
                                                </div>
                                        		<div class="row">
                                            		<div class="col mb-4">
                                            			<div class="ml-1px pl-4">
                                            				<div class="xsmall">
                                                    			Displays properties using the Gallery widget.
                                                			</div>
                                                		</div>
                                                	</div>
                                                </div>
                                            	<div class="row align-items-center">
                                            		<div class="col-12 col-sm-5" >		
                                                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_about" name="buyingbuddy_install_about" value="1" checked="checked">
                                                        <label class="chk-label no-bg" for="buyingbuddy_install_about">
                                                            <span class="chk-check"></span>
                                                            <span class="chk-text strong">About Me / Office Index</span>
                                                        </label>
                                            		</div>
                                            		<div class="col-12 col-sm-7">
                                            			<div class="form-row align-items-center">
                                                            <label for="buyingbuddy_install_about_title" class="col-4 col-form-label text-muted text-right">
                                                                Page Title:
                                                            </label>
                                                            <div class="col-8">
                                                                <input type="text" class="form-control bb-page-title-field" id="buyingbuddy_install_about_title" data-slug-target="buyingbuddy_install_about_slug_ignore" name="buyingbuddy_install_about_title" value="About Me">
                                                                <input type="hidden" class="bb-new-page-slug" id="buyingbuddy_install_about_slug" name="buyingbuddy_install_about_slug" value="team"> <?php // has to be a fixed slug  ?>
                                                        	</div>
                                                    	</div>            		
                                            		</div>  
                                				</div> 
                                        		<div class="row">
                                            		<div class="col mb-4">
                                            			<div class="ml-1px pl-4">
                                            				<div class="xsmall">
                                            					Displays personal profile information along with your active and sold listings. 
                                            					Or agent index / office index. This widget uses the "/team" slug only.
                                        					</div>
                                    					</div>
                                                	</div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-sm-5">      
                                                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_cma" name="buyingbuddy_install_cma" value="1" checked="checked">
                                                        <label class="chk-label no-bg" for="buyingbuddy_install_cma">
                                                            <span class="chk-check"></span>
                                                            <span class="chk-text strong">Home Value</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-sm-7">
                                                        <div class="form-row align-items-center">
                                                            <label for="buyingbuddy_install_cma_title" class="col-4 col-form-label text-muted text-right">
                                                                Page Title:
                                                            </label>
                                                            <div class="col-8">
                                                                <input type="text" class="form-control bb-page-title-field" id="buyingbuddy_install_cma_title" data-slug-target="buyingbuddy_install_cma_slug" name="buyingbuddy_install_cma_title" value="Home Value">
                                                                <input type="hidden" class="bb-new-page-slug" id="buyingbuddy_install_cma_slug" name="buyingbuddy_install_cma_slug" value="home-value-page">
                                                            </div>
                                                        </div>                  
                                                    </div> 
                                                </div>        
                                        		<div class="row">
                                            		<div class="col mb-4">
                                            			<div class="ml-1px pl-4">
                                            				<div class="xsmall">    
                                            					Displays a form for capturing leads requesting a home valuation.
                                        					</div>
                                    					</div>
                                                	</div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-sm-5">      
                                                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_contact" name="buyingbuddy_install_contact" value="1" checked="checked">
                                                        <label class="chk-label no-bg" for="buyingbuddy_install_contact">
                                                            <span class="chk-check"></span>
                                                            <span class="chk-text strong">Contact Me</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-sm-7">
                                                        <div class="form-row align-items-center">
                                                            <label for="buyingbuddy_install_contact_title" class="col-4 col-form-label text-muted text-right">
                                                                Page Title:
                                                            </label>
                                                            <div class="col-8">
                                                                <input type="text" class="form-control bb-page-title-field" id="buyingbuddy_install_contact_title" data-slug-target="buyingbuddy_install_contact_slug" name="buyingbuddy_install_contact_title" value="Contact Me">
                                                                <input type="hidden" class="bb-new-page-slug" id="buyingbuddy_install_contact_slug" name="buyingbuddy_install_contact_slug" value="contact-me">
                                                            </div>
                                                        </div>                  
                                                    </div>
                                                </div> 
                                            	<div class="row">
                                            		<div class="col mb-4">
                                            			<div class="ml-1px pl-4">
                                            				<div class="xsmall"> 
                                                            	Contact page that displays a form for capturing leads that request contact and help. This uses the Lead Capture Form widget.
                                        					</div>
                                    					</div>
                                					</div>
                            					</div>	
                                            	<div class="row align-items-center"> 
                                            		<div class="col-12 col-sm-5" >		
                                                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_map" name="buyingbuddy_install_map" value="1" checked="checked">
                                                        <label class="chk-label no-bg" for="buyingbuddy_install_map">
                                                            <span class="chk-check"></span>
                                                            <span class="chk-text strong">Map Search Page</span>
                                                        </label>
                                            		</div>
                                            		<div class="col-12 col-sm-7">
                                            			<div class="form-row align-items-center">
                                                            <label for="buyingbuddy_install_map_title" class="col-4 col-form-label text-muted text-right">
                                                                Page Title:
                                                            </label>
                                                            <div class="col-8">
                                                                <input type="text" class="form-control bb-page-title-field" id="buyingbuddy_install_map_title" data-slug-target="buyingbuddy_install_map_slug" name="buyingbuddy_install_map_title" value="Map Search">
                                                                <input type="hidden" class="bb-new-page-slug" id="buyingbuddy_install_map_slug" name="buyingbuddy_install_map_slug" value="map-search-page">
                                                        	</div>
                                                    	</div>            		
                                            		</div>   
                                            	</div>
                                            	<div class="row">
                                            		<div class="col mb-4">
                                            			<div class="ml-1px pl-4">
                                            				<div class="xsmall">            			
                                            					Displays properties using the Map Display widget.
                                        					</div>
                            							</div>
                        							</div>
                    							</div>
      
<?php /* // Don't do these for now?> 
                                                <div class="mb-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <input type="checkbox" class="chk-input" id="buyingbuddy_install_calculator" name="buyingbuddy_install_calculator" value="1" checked="checked" />
                                                            <label class="chk-label no-bg" for="buyingbuddy_install_calculator">
                                                                <span class="chk-check"></span>
                                                                <span class="chk-text">Calculator</span>
                                                            </label>
                                                        </div>
                                                        <label for="buyingbuddy_install_calculator_slug" class="lh-1 ml-auto mb-0 mr-2 text-muted">
                                                            Page slug:
                                                        </label>
                                                        <div class="input-icon w-auto mr-0">
                                                            <span class="strong">&#47;</span>
                                                            <input type="text" class="form-control pl-4" id="buyingbuddy_install_calculator_slug" name="buyingbuddy_install_calculator_slug" value="bbidx-listing-calculator" />
                                                        </div>
                                                    </div>
                                                    <div class="ml-1px pl-4 xsmall">Displays a payment calculator.</div>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <input type="checkbox" class="chk-input" id="buyingbuddy_install_sold" name="buyingbuddy_install_sold" value="1" checked="checked" />
                                                            <label class="chk-label no-bg" for="buyingbuddy_install_sold">
                                                                <span class="chk-check"></span>
                                                                <span class="chk-text">Sold Listings</span>
                                                            </label>
                                                        </div>
                                                        <label for="buyingbuddy_install_sold_slug" class="lh-1 ml-auto mb-0 mr-2 text-muted">
                                                            Page slug:
                                                        </label>
                                                        <div class="input-icon w-auto mr-0">
                                                            <span class="strong">&#47;</span>
                                                            <input type="text" class="form-control pl-4" id="buyingbuddy_install_sold_slug" name="buyingbuddy_install_sold_slug" value="bbidx-listing-sold" />
                                                        </div>
                                                    </div>
                                                    <div class="ml-1px pl-4 xsmall">Displays sold listings using the Gallery widget.</div>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <input type="checkbox" class="chk-input" id="buyingbuddy_install_list" name="buyingbuddy_install_list" value="1" checked="checked" />
                                                            <label class="chk-label no-bg" for="buyingbuddy_install_list">
                                                                <span class="chk-check"></span>
                                                                <span class="chk-text">Property List</span>
                                                            </label>
                                                        </div>
                                                        <label for="buyingbuddy_install_list_slug" class="lh-1 ml-auto mb-0 mr-2 text-muted">
                                                            Page slug:
                                                        </label>
                                                        <div class="input-icon w-auto mr-0">
                                                            <span class="strong">&#47;</span>
                                                            <input type="text" class="form-control pl-4" id="buyingbuddy_install_list_slug" name="buyingbuddy_install_list_slug" value="bbidx-listing-list" />
                                                        </div>
                                                    </div>
                                                    <div class="ml-1px pl-4 xsmall">Displays properties using the List widget.</div>
                                                </div> 
*/ ?>                                     	
                                        	</div>
                                        </div>
                                    </div>
            
                                    <div class="row">
                                    	<div class="col-12">
                                    		<div class="smaller text-right mb-1">
                                    			Add selected pages, and complete setup!
                                			</div>
                                    	</div>
                                        <div class="col-12">
                                            <div class="mb-4 text-right">
                                                <button type="submit" class="btn btn-success btn-label label-right ml-auto mr-0 ">
                                                	Continue
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card  -->
