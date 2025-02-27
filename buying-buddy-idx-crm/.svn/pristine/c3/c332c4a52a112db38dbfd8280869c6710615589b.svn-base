<?php 
// Users may choose the page title (name)
// A default title is shown - this matches the hidden SLUG field
// When the title field is changed, JS will uodate the value of the hidden SLUG field
// On submit - pages are created with the title and slug 
?>
<div class="card card-outline border-top border-secondary border-opacity-45">
    <div class="card-header bg-secondary bg-opacity-30 border-secondary border-opacity-30">
        <div class="d-flex flex-wrap align-items-center">                                                 	
            <div class="h2 lh-1">
            	Add Additional Pages Preset with Widgets
            </div>
        </div>
    </div>
	<div class="card-body">
		<div class="body-inner700">	
            <p class="mb-2">
                Add important pages with widgets to your website.<br>
                Edit, modify or delete as needed.<br>
                See the <a href="#" class="tutorials-tab-link">Tutorials menu</a> for an overview of these pages.
            </p>
            <p class="smaller mb-3">                                                           
				Get more widget shortcodes from the <a href="#bbAddWidgets" class="activate-tab">Add Widgets Tab</a> on the left.
            </p>
			<form action="<?php echo get_site_url();?>/wp-admin/options-general.php?page=buying-buddy" method="post" name="install">
                <input type="hidden" name="buyingbuddy_add_templates" value="1" />
                <?php wp_nonce_field( 'buyingbuddy_install_action', 'buyingbuddy_install' ); ?>
                <div class="d-flex align-items-center flex-grow-1 mb-1">
                    <input type="checkbox" id="select_all" class="mr-2" /><label for="select_all" class="small m-0" style="cursor:pointer">Select All</label>
                </div>				
                <hr class="mt-1">

                <div class="row align-items-center">              	
                    <div class="col-12 col-sm-5">      
                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_featured" name="buyingbuddy_install_featured" value="1">
                        <label class="chk-label no-bg" for="buyingbuddy_install_featured">
                            <span class="chk-check"></span>
                            <span class="chk-text strong">Listings <span class="smaller">(Featured, Market etc)</span></span>
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
        	<?php if(esc_html($buyingbuddy_options["buyingbuddy_install_featured"]) == "1" ) { ?>
            		<div class="col-12"> 
        				<div class="d-flex ml-1px pl-4 mb-1 xsmall">
        					<span class="d-flex text-success">
							    <svg
                                    style="fill:currentColor;fill-rule:evenodd;stroke:none;stroke-width:1"
                                    width="1em" height="1.4em"
                                    viewBox="0 0 68 68"> 
                                    <path d="m 27.22475,50.92713 -0.0958,-0.0838 -0.0878,0.0838 -14.84406,-14.84493 5.27807,-5.27438 9.65382,9.67037 23.39596,-23.40532 5.27408,5.27837 z M 33.99601,0 C 15.22734,0 0,15.22823 0,34.002 0,52.77576 15.22734,68 33.99601,68 52.76867,68 68,52.77576 68,34.002 68,15.22823 52.76867,0 33.99601,0 Z"/>
                                </svg>
                            </span>               				
        					<span class="ml-1">
        						<em>This page has already been added.        						
    							To add again, use a page title (page name) not being used.</em>
							</span>
        				</div>
    				</div>
            <?php } ?>               	
            		<div class="col mb-4">
            			<div class="ml-1px pl-4">
            				<div class="xsmall pb-1 border-bottom border-dashed">
                            	Displays properties using the Grid / Gallery widget.
        					</div>
                    	</div>       				
            		</div>         	
            	</div>                   
            	<div class="row align-items-center">        	
            		<div class="col-12 col-sm-5" >		
                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_about" name="buyingbuddy_install_about" value="1" >
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
    		<?php if(esc_html($buyingbuddy_options["buyingbuddy_install_about"]) == "1" ) { ?>
            		<div class="col-12"> 
        				<div class="d-flex ml-1px pl-4 mb-1 xsmall">
        					<span class="d-flex text-success">
							    <svg
                                    style="fill:currentColor;fill-rule:evenodd;stroke:none;stroke-width:1"
                                    width="1em" height="1.4em"
                                    viewBox="0 0 68 68"> 
                                    <path d="m 27.22475,50.92713 -0.0958,-0.0838 -0.0878,0.0838 -14.84406,-14.84493 5.27807,-5.27438 9.65382,9.67037 23.39596,-23.40532 5.27408,5.27837 z M 33.99601,0 C 15.22734,0 0,15.22823 0,34.002 0,52.77576 15.22734,68 33.99601,68 52.76867,68 68,52.77576 68,34.002 68,15.22823 52.76867,0 33.99601,0 Z"/>
                                </svg>
                            </span>               				
        					<span class="ml-1">
        						<em>This page has already been added.        						
    							To add again, use a page title (page name) not being used.</em>
							</span>
        				</div>
    				</div>
            <?php } ?>                 	
            		<div class="col mb-4">
            			<div class="ml-1px pl-4">
            				<div class="xsmall pb-1 border-bottom border-dashed">
                				Displays personal profile information along with your active and sold listings using the OfficeRoster widget.<br>
                				For a Team or Office account, this displays an office and agent index.<br> 
                				<b>This widget uses the "/team" slug only.</b>
        					</div>
                    	</div>       				
            		</div>         	
            	</div>   
            	                        
                                                  
                <div class="row align-items-center">              
                    <div class="col-12 col-sm-5">      
                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_cma" name="buyingbuddy_install_cma" value="1">
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
    		<?php if(esc_html($buyingbuddy_options["buyingbuddy_install_cma"]) == "1" ) { ?>
            		<div class="col-12"> 
        				<div class="d-flex ml-1px pl-4 mb-1 xsmall">
        					<span class="d-flex text-success">
							    <svg
                                    style="fill:currentColor;fill-rule:evenodd;stroke:none;stroke-width:1"
                                    width="1em" height="1.4em"
                                    viewBox="0 0 68 68"> 
                                    <path d="m 27.22475,50.92713 -0.0958,-0.0838 -0.0878,0.0838 -14.84406,-14.84493 5.27807,-5.27438 9.65382,9.67037 23.39596,-23.40532 5.27408,5.27837 z M 33.99601,0 C 15.22734,0 0,15.22823 0,34.002 0,52.77576 15.22734,68 33.99601,68 52.76867,68 68,52.77576 68,34.002 68,15.22823 52.76867,0 33.99601,0 Z"/>
                                </svg>
                            </span>               				
        					<span class="ml-1">
        						<em>This page has already been added.        						
    							To add again, use a page title (page name) not being used.</em>
							</span>
        				</div>
    				</div>
            <?php } ?>               	
            		<div class="col mb-4">
            			<div class="ml-1px pl-4">
            				<div class="xsmall pb-1 border-bottom border-dashed">
                            	Displays a form for capturing leads requesting a home valuation. This uses the Lead Capture Form widget.<br>
                            	<b>NOTE</b> The form captures leads for you. Buying Buddy does not create or send out any form of CMA due to MLS licensing rules.
        					</div>
                    	</div>       				
            		</div>         	
            	</div>                        
                       
                <div class="row align-items-center">              
                    <div class="col-12 col-sm-5">      
                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_contact" name="buyingbuddy_install_contact" value="1">
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
    		<?php if(esc_html($buyingbuddy_options["buyingbuddy_install_contact"]) == "1" ) { ?>
            		<div class="col-12"> 
        				<div class="d-flex ml-1px pl-4 mb-1 xsmall">
        					<span class="d-flex text-success">
							    <svg
                                    style="fill:currentColor;fill-rule:evenodd;stroke:none;stroke-width:1"
                                    width="1em" height="1.4em"
                                    viewBox="0 0 68 68"> 
                                    <path d="m 27.22475,50.92713 -0.0958,-0.0838 -0.0878,0.0838 -14.84406,-14.84493 5.27807,-5.27438 9.65382,9.67037 23.39596,-23.40532 5.27408,5.27837 z M 33.99601,0 C 15.22734,0 0,15.22823 0,34.002 0,52.77576 15.22734,68 33.99601,68 52.76867,68 68,52.77576 68,34.002 68,15.22823 52.76867,0 33.99601,0 Z"/>
                                </svg>
                            </span>               				
        					<span class="ml-1">
        						<em>This page has already been added.        						
    							To add again, use a page title (page name) not being used.</em>
							</span>
        				</div>
    				</div>
            <?php } ?>              	
            		<div class="col mb-4">
            			<div class="ml-1px pl-4">
            				<div class="xsmall pb-1 border-bottom border-dashed">
                            	Contact page that displays a form for capturing leads that request contact and help. This uses the Lead Capture Form widget.
        					</div> 
                    	</div>       				
            		</div>         	
            	</div>  
            	<div class="row align-items-center">          	
            		<div class="col-12 col-sm-5" >		
                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_map" name="buyingbuddy_install_map" value="1" >
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
    		<?php if(esc_html($buyingbuddy_options["buyingbuddy_install_map"]) == "1" ) { ?>
            		<div class="col-12"> 
        				<div class="d-flex ml-1px pl-4 mb-1 xsmall">
        					<span class="d-flex text-success">
							    <svg
                                    style="fill:currentColor;fill-rule:evenodd;stroke:none;stroke-width:1"
                                    width="1em" height="1.4em"
                                    viewBox="0 0 68 68"> 
                                    <path d="m 27.22475,50.92713 -0.0958,-0.0838 -0.0878,0.0838 -14.84406,-14.84493 5.27807,-5.27438 9.65382,9.67037 23.39596,-23.40532 5.27408,5.27837 z M 33.99601,0 C 15.22734,0 0,15.22823 0,34.002 0,52.77576 15.22734,68 33.99601,68 52.76867,68 68,52.77576 68,34.002 68,15.22823 52.76867,0 33.99601,0 Z"/>
                                </svg>
                            </span>               				
        					<span class="ml-1">
        						<em>This page has already been added.        						
    							To add again, use a page title (page name) not being used.</em>
							</span>
        				</div>
    				</div>
            <?php } ?>               	
            		<div class="col mb-4">
            			<div class="ml-1px pl-4">
            				<div class="xsmall pb-1 border-bottom border-dashed">		
            					Displays properties using the Map Display widget.
        					</div>
        				</div>
            		</div>  
				</div>     
                     

<?php /*        Add this section later on - as a different form to add template pages ?>
            	<hr class="mt-1">
            	<h3 class="mb-1">Extra Page Examples Pages with Widgets</h3>
            	<p>Add these pages as a starting point and then customize page and widget as needed.</p>


                <div class="row align-items-center">
                    <div class="col-12 col-sm-5">      
                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_calculator" name="buyingbuddy_install_calculator" value="1">
                        <label class="chk-label no-bg" for="buyingbuddy_install_calculator">
                            <span class="chk-check"></span>
                            <span class="chk-text strong">Calculator</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-7">
                        <div class="row align-items-center">
                            <label for="buyingbuddy_install_calculator_title" class="col-4 col-form-label text-muted text-right">
                                Page Title:
                            </label>
                            <div class="col-8">
                                <input type="text" class="form-control bb-page-title-field" id="buyingbuddy_install_calculator_title" data-slug-target="buyingbuddy_install_calculator_slug" name="buyingbuddy_install_calculator_title" value="Calculator">
                                <input type="hidden" class="bb-new-page-slug" id="buyingbuddy_install_calculator_slug" name="buyingbuddy_install_calculator_slug" value="calculator-page">
                            </div>
                        </div>                  
                    </div>  
                </div> 
            	<div class="row">
            		<div class="col mb-4">
            			<div class="ml-1px pl-4">
            				<div class="xsmall"> 
                				Displays a payment calculator with the Calculator widget.
        					</div>
                		<?php if(esc_html($buyingbuddy_options["buyingbuddy_install_calculator"]) == "1" ) { ?>
            				<div class="d-flex xsmall">
            					<span class="text-success">
								    <svg
                                        style="fill:currentColor;fill-rule:evenodd;stroke:none;stroke-width:1"
                                        width="1em" height="1.4em"
                                        viewBox="0 0 68 68">
                                        <path d="m 27.22475,50.92713 -0.0958,-0.0838 -0.0878,0.0838 -14.84406,-14.84493 5.27807,-5.27438 9.65382,9.67037 23.39596,-23.40532 5.27408,5.27837 z M 33.99601,0 C 15.22734,0 0,15.22823 0,34.002 0,52.77576 15.22734,68 33.99601,68 52.76867,68 68,52.77576 68,34.002 68,15.22823 52.76867,0 33.99601,0 Z"/>
                                    </svg>
                                </span>  
                                <span class="ml-1">             				
                					A Calculator page was already added.        						
            						To add another, use a Page Title (page name) not being used.
        						</span>
            				</div>
                        <?php } ?> 
                    	</div>       				
            		</div>         	
            	</div>


                <div class="row align-items-center">
                    <div class="col-12 col-sm-5">      
                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_sold" name="buyingbuddy_install_sold" value="1">
                        <label class="chk-label no-bg" for="buyingbuddy_install_sold">
                            <span class="chk-check"></span>
                            <span class="chk-text strong">Sold Listings Page</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-7">
                        <div class="row align-items-center">
                            <label for="buyingbuddy_install_sold_title" class="col-4 col-form-label text-muted text-right">
                                Page Title:
                            </label>
                            <div class="col-8">
                                <input type="text" class="form-control bb-page-title-field" id="buyingbuddy_install_sold_title" data-slug-target="buyingbuddy_install_sold_slug" name="buyingbuddy_install_sold_title" value="Sold Listings">
                                <input type="hidden" class="bb-new-page-slug" id="buyingbuddy_install_sold_slug" name="buyingbuddy_install_sold_slug" value="sold-listings-example-page">
                            </div>
                        </div>                  
                    </div>   
                    <div class="col mb-4">
                        <div class="ml-1px pl-4 xsmall">Displays sold listings using the Gallery widget.</div>
                    </div>          
                </div>
                
                <div class="row align-items-center">
                    <div class="col-12 col-sm-5">      
                        <input type="checkbox" class="chk-input" id="buyingbuddy_install_list" name="buyingbuddy_install_list" value="1">
                        <label class="chk-label no-bg" for="buyingbuddy_install_list">
                            <span class="chk-check"></span>
                            <span class="chk-text strong">Property List Page</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-7">
                        <div class="row align-items-center">
                            <label for="buyingbuddy_install_list_title" class="col-4 col-form-label text-muted text-right">
                                Page Title:
                            </label>
                            <div class="col-8">
                                <input type="text" class="form-control bb-page-title-field" id="buyingbuddy_install_list_title" data-slug-target="buyingbuddy_install_list_slug" name="buyingbuddy_install_list_title" value="List of Properyties">
                                <input type="hidden" class="bb-new-page-slug" id="buyingbuddy_install_list_slug" name="buyingbuddy_install_list_slug" value="list-properties-example-page">
                            </div>
                        </div>                  
                    </div>   
                    <div class="col mb-4">
                        <div class="ml-1px pl-4 xsmall">Displays properties using the List widget.</div>
                    </div>          
                </div>
*/ ?>
             
                <div class="row">
                    <div class="col-12">
                        <div class="mb-4 text-right">
                            <button type="submit" class="btn btn-success btn-label ml-auto mr-0 ">
                            	Add Pages
                            	<span class="btn-label-icon">
                                    <svg
                                        style="fill:currentColor;fill-rule:evenodd;stroke:none;stroke-width:1"
                                        width="1em" height="1.4em"
                                        viewBox="0 0 68 68">
                                        <path d="m 27.22475,50.92713 -0.0958,-0.0838 -0.0878,0.0838 -14.84406,-14.84493 5.27807,-5.27438 9.65382,9.67037 23.39596,-23.40532 5.27408,5.27837 z M 33.99601,0 C 15.22734,0 0,15.22823 0,34.002 0,52.77576 15.22734,68 33.99601,68 52.76867,68 68,52.77576 68,34.002 68,15.22823 52.76867,0 33.99601,0 Z"/>
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
