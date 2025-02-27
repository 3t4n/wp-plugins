 <div class="card card-outline border-top border-secondary border-opacity-45">
    <div class="card-header bg-secondary bg-opacity-30 border-secondary border-opacity-30">
        <div class="d-flex flex-wrap align-items-center">                                                 	
            <div class="h2 lh-1">
            	Settings
            </div>
        </div>
    </div>
	<div class="card-body"> 
		<div class="body-inner700"> 
            <form action="" method="post" name="options">
                <input type="hidden" name="buyingbuddy_trial" value="<?php echo esc_html($buyingbuddy_options["trial"]);?>">
                <input type="hidden" name="buyingbuddy_purchase" value="<?php echo esc_html($buyingbuddy_options["purchase"]);?>">
                <?php wp_nonce_field( 'buyingbuddy_settings_action', 'buyingbuddy_settings' ); ?>

                <div class="card card-inner-outline mt-2 mb-4">
                    <div class="card-header border-bottom alert border-normal border-opacity-15 alert alert-dark alert-marker marker-rounded">
						<div class="marker-icon">
                            <svg 
                                viewBox="0 0 512 512" 
                                style="width: 1.25em; height: auto;vertical-align: middle;fill: currentColor;overflow: hidden;">  
                                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.-->                              
                                <path d="M459.3 267.3c6.2-6.2 6.2-16.4 0-22.6l-160-160c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L425.4 256 276.7 404.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l160-160zm-352 160l160-160c6.2-6.2 6.2-16.4 0-22.6l-160-160c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L233.4 256 84.7 404.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0z"/>
                    		</svg> 
					   	</div>
                        <div class="h3">Account Activation</div>
                    </div>  
                    <div class="card-body">  
                  		<div class="max600 mx-auto">                              		                               		  
                            <div class="form-inline justify-content-between">
                                <label for="buyingbuddy_acid">
                                    <svg 
                                    	style="width: 1.25em; height: 1.25em;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                    	viewBox="0 50 768 1024"  >
                                        <path d="m 406.576,512 q 0,14.848 -10.85867,25.70667 l -256,256 q -10.85866,10.85866 -25.70666,10.85866 -14.848,0 -25.70667,-10.85866 Q 77.44533,782.848 77.44533,768 V 256 q 0,-14.848 10.85867,-25.70667 10.85867,-10.85866 25.70667,-10.85866 14.848,0 25.70666,10.85866 l 256,256 Q 406.576,497.152 406.576,512 Z" id="path2" >
                                    </svg>  
                                    Account activation key
                                </label>
                                <input type="text" class="form-control w-auto" id="buyingbuddy_acid" name="buyingbuddy_acid" placeholder="Account Activation Key" value="<?php echo esc_html($buyingbuddy_options["acid"])?>">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-inner-outline mt-2 mb-4">
                    <div class="card-header border-bottom alert border-normal border-opacity-15 alert alert-dark alert-marker marker-rounded">
						<div class="marker-icon">
                            <svg 
                                viewBox="0 0 512 512" 
                                style="width: 1.25em; height: auto;vertical-align: middle;fill: currentColor;overflow: hidden;">  
                                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.-->                              
                                <path d="M459.3 267.3c6.2-6.2 6.2-16.4 0-22.6l-160-160c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L425.4 256 276.7 404.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l160-160zm-352 160l160-160c6.2-6.2 6.2-16.4 0-22.6l-160-160c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L233.4 256 84.7 404.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0z"/>
                    		</svg> 
					   	</div>
                        <div class="h3">Google Map Key</div>
                    </div>  
                    <div class="card-body">  
                  		<div class="max600 mx-auto">   
                  			<?php if(esc_html($buyingbuddy_options["google_map_key"]) =="" ) {  echo wp_kses_post($gmapInstructions);  }  ?>
                                 
                            <div class="form-inline justify-content-between mt-3">
                            
                                <label for="buyingbuddy_google_map_key" class="mr-4">
                                    <svg 
                                    	style="width: 1.25em; height: 1.25em;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                    	viewBox="0 50 768 1024"  >
                                        <path d="m 406.576,512 q 0,14.848 -10.85867,25.70667 l -256,256 q -10.85866,10.85866 -25.70666,10.85866 -14.848,0 -25.70667,-10.85866 Q 77.44533,782.848 77.44533,768 V 256 q 0,-14.848 10.85867,-25.70667 10.85867,-10.85866 25.70667,-10.85866 14.848,0 25.70666,10.85866 l 256,256 Q 406.576,497.152 406.576,512 Z" id="path2" >
                                    </svg> 
                                    Google Map API Key
                                </label>
                                <input type="text" class="form-control w-auto flex-grow-1" id="buyingbuddy_google_map_key" name="buyingbuddy_google_map_key" placeholder="Google Map API Key" value="<?php echo esc_html($buyingbuddy_options["google_map_key"]);?>">                              
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card card-inner-outline mt-2 mb-4">
                    <div class="card-header border-bottom alert border-normal border-opacity-15 alert alert-dark alert-marker marker-rounded">
						<div class="marker-icon">
                            <svg 
                                viewBox="0 0 512 512" 
                                style="width: 1.25em; height: auto;vertical-align: middle;fill: currentColor;overflow: hidden;">  
                                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.-->                              
                                <path d="M459.3 267.3c6.2-6.2 6.2-16.4 0-22.6l-160-160c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L425.4 256 276.7 404.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l160-160zm-352 160l160-160c6.2-6.2 6.2-16.4 0-22.6l-160-160c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L233.4 256 84.7 404.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0z"/>
                    		</svg> 
					   	</div>
                        <div class="h3">Foundation Pages</div>
                    </div>  
                    <div class="card-body">  
                  		<div class="max600 mx-auto">     
                           	<p class="mb-2">
                           		The installation process:
                       		</p>
                            <ul class="small list-disc list-compact mb-2">
                                <li>Created three required foundation pages automatically</li>
                                <li>Configured each page with its necessary widget and URL slug</li>
                                <li>Recorded the correct URL slug for each page in your Buying Buddy account.<br>                               
                                	See 
                                	<a href="https://www.leadsandcontacts.com/widget-settings/install?tab=foundation" target="_blank">Foundation Page settings
    									<svg 
    										style="width:1em;height:1em;vertical-align:text-top;fill:currentColor;overflow:hidden;"
    										viewBox="0 0 512 512">
                                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M336 0c-8.8 0-16 7.2-16 16s7.2 16 16 16H457.4L212.7 276.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 54.6V176c0 8.8 7.2 16 16 16s16-7.2 16-16V16c0-8.8-7.2-16-16-16H336zM64 64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V304c0-8.8-7.2-16-16-16s-16 7.2-16 16V448c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V128c0-17.7 14.3-32 32-32H208c8.8 0 16-7.2 16-16s-7.2-16-16-16H64z"></path>
                                        </svg>                                           
                                    </a> in your account. 
                                </li>
                            </ul>
                            <div class="alert alert-sm alert-warning alert-marker marker-right border-inner-outline lh-13">
                                <div class="marker-icon">
                                    <svg 
                                        viewBox="0 0 512 512" 
                                        style="width: 1em; height: auto;vertical-align: middle;fill: currentColor;overflow: hidden;">  
                                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.-->                              
                                        <path d="M256 32a224 224 0 1 1 0 448 224 224 0 1 1 0-448zm0 480A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c-8.8 0-16 7.2-16 16V272c0 8.8 7.2 16 16 16s16-7.2 16-16V144c0-8.8-7.2-16-16-16zm24 224a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/>
                                    </svg>  
                                </div>
                                <strong>Note</strong>
                                 - Foundation pages should be removed from the menus as they are utility pages.                                                                
                            </div>  
                            <div class="alert alert-sm border-inner-outline mb-3 lh-13">
                               	<h5 class="mb-1">Default Page Titles and Slugs</h5>                             	
                                <ul class="small list-disc list-compact mb-0">
                                    <li>Search Results - <span class="small">(foundation page that shows "search results")<br><code>/listing-results</code></span></li>
                                    <li>Property Details - <span class="small">(foundation page that shows "property details")<br><code>/listing-details</code></span></li>
                                    <li>Area Market Report - <span class="small">(foundation page that shows "market reports", planned launch Q1 2025)<br><code>/listing-market</code></span></li>
                                </ul>
                           	</div>
                			<div class="alert alert-sm alert-secondary border-inner-outline mb-0 lh-13">
                            	<div class="weight700 mb-1">Customization</div>
                                <ul class="list-disc list-compact list-smaller">
                                	<li><b>Foundation page titles and layouts</b>: May be changed. We recommend full-width layouts.</li>	
                                	<li><b>Foundation page slugs</b>: May be changed but these must also be recorded in the 
                                        <a href="https://www.leadsandcontacts.com/widget-settings/install?tab=foundation" class="alert-link" target="_blank">foundation page settings
    									<svg 
    										style="width:1em;height:1em;vertical-align:text-top;fill:currentColor;overflow:hidden;"
    										viewBox="0 0 512 512">
                                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M336 0c-8.8 0-16 7.2-16 16s7.2 16 16 16H457.4L212.7 276.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 54.6V176c0 8.8 7.2 16 16 16s16-7.2 16-16V16c0-8.8-7.2-16-16-16H336zM64 64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V304c0-8.8-7.2-16-16-16s-16 7.2-16 16V448c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V128c0-17.7 14.3-32 32-32H208c8.8 0 16-7.2 16-16s-7.2-16-16-16H64z"></path>
                                        </svg>                                           
                                        </a> in your Buying Buddy dashboard. Slugs must match.
                                    </li>                                    
                                        
                                    <li>Do not delete widgets or add extra widgets to foundation pages.<br> 
                                        See the 
                                        <a href="https://support.buyingbuddy.com/knowledge-base/installing-mbb-wordpress-plugin/" class="alert-link" target="_blank">installation support article
        									<svg 
        										style="width:1em;height:1em;vertical-align:text-top;fill:currentColor;overflow:hidden;"
        										viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path d="M336 0c-8.8 0-16 7.2-16 16s7.2 16 16 16H457.4L212.7 276.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 54.6V176c0 8.8 7.2 16 16 16s16-7.2 16-16V16c0-8.8-7.2-16-16-16H336zM64 64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V304c0-8.8-7.2-16-16-16s-16 7.2-16 16V448c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V128c0-17.7 14.3-32 32-32H208c8.8 0 16-7.2 16-16s-7.2-16-16-16H64z"></path>
                                            </svg>                                         
                                        </a>
                                        article for more details.
    								</li>                                   
                                </ul>                                                 	                                                        	
                            </div>  
                                                    
                        </div>                                                                                                                                    
                    </div>
                </div>
                <div class="card card-inner-outline mb-4">
                    <div class="card-header border-bottom alert border-normal border-opacity-15 alert alert-dark alert-marker marker-rounded">
						<div class="marker-icon">
                            <svg 
                                viewBox="0 0 512 512" 
                                style="width: 1.25em; height: auto;vertical-align: middle;fill: currentColor;overflow: hidden;">  
                                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.-->                              
                                <path d="M459.3 267.3c6.2-6.2 6.2-16.4 0-22.6l-160-160c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L425.4 256 276.7 404.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l160-160zm-352 160l160-160c6.2-6.2 6.2-16.4 0-22.6l-160-160c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L233.4 256 84.7 404.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0z"/>
                    		</svg> 
					   	</div>
                        <div class="h3">Optional Settings</div>
                    </div>  
                    <div class="card-body">
						<div class="max600 mx-auto">    
                            <div class="mb-4">
                                <div class="form-inline justify-content-between mb-1">
                                    <label for="buyingbuddy_google_map">
                                        <svg 
                                        	style="width: 1.25em; height: 1.25em;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                        	viewBox="0 50 768 1024"  >
                                            <path d="m 406.576,512 q 0,14.848 -10.85867,25.70667 l -256,256 q -10.85866,10.85866 -25.70666,10.85866 -14.848,0 -25.70667,-10.85866 Q 77.44533,782.848 77.44533,768 V 256 q 0,-14.848 10.85867,-25.70667 10.85867,-10.85866 25.70667,-10.85866 14.848,0 25.70666,10.85866 l 256,256 Q 406.576,497.152 406.576,512 Z" id="path2" >
                                        </svg>   
                                        Buying Buddy Loads Google Maps Library?
                                    </label>
                                    <select class="form-control w-auto flex-none" id="buyingbuddy_google_map" name="buyingbuddy_google_map">
                                        <option value="no" <?php echo selected(esc_html($buyingbuddy_options['google_map']), "no", false )?>>Yes (default)</option>
                                        <option value="yes" <?php echo selected(esc_html($buyingbuddy_options['google_map']), "yes", false )?>>No</option>
                                    </select>
                                </div>
                                <div class="xsmall">If your WordPress theme or another plugin is loading Google Maps API then set this to "No".</div>
                            </div>                                                                                                                                                     
                            <div class="mb-4">
                                <div class="form-inline justify-content-between mb-1">
                                    <label for="buyingbuddy_disable">
                                        <svg 
                                        	style="width: 1.25em; height: 1.25em;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                        	viewBox="0 50 768 1024"  >
                                            <path d="m 406.576,512 q 0,14.848 -10.85867,25.70667 l -256,256 q -10.85866,10.85866 -25.70666,10.85866 -14.848,0 -25.70667,-10.85866 Q 77.44533,782.848 77.44533,768 V 256 q 0,-14.848 10.85867,-25.70667 10.85867,-10.85866 25.70667,-10.85866 14.848,0 25.70666,10.85866 l 256,256 Q 406.576,497.152 406.576,512 Z" id="path2" >
                                        </svg>                                
                                        Load the Buying Buddy plugin?
                                    </label>
                                    <select class="form-control w-auto" id="buyingbuddy_disable" name="buyingbuddy_disable"> 
                                        <option value="no" <?php echo selected(esc_html($buyingbuddy_options['disable']), "no", false )?>>Yes (default)</option>
                                        <option value="yes" <?php echo selected(esc_html($buyingbuddy_options['disable']), "yes", false )?>>No</option>
                                    </select>
                                </div>
                                <div class="xsmall">Use this option to temporarily stop the plugin loading.</div>
                            </div>  
                            <div class="mb-4">                                                                                                                                        
                                <div class="form-inline justify-content-between mb-1">
                                    <label for="buyingbuddy_allowedids" class="floating-label">
                                        <svg 
                                        	style="width: 1.25em; height: 1.25em;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                        	viewBox="0 50 768 1024"  >
                                            <path d="m 406.576,512 q 0,14.848 -10.85867,25.70667 l -256,256 q -10.85866,10.85866 -25.70666,10.85866 -14.848,0 -25.70667,-10.85866 Q 77.44533,782.848 77.44533,768 V 256 q 0,-14.848 10.85867,-25.70667 10.85867,-10.85866 25.70667,-10.85866 14.848,0 25.70666,10.85866 l 256,256 Q 406.576,497.152 406.576,512 Z" id="path2" >
                                        </svg>  
                                        Only load plugin on these page/post IDs:
                                    </label>
                                    <input type="text" class="form-control w-auto" id="buyingbuddy_allowedids"  name="buyingbuddy_allowedids" aria-label="Allowed Post IDs" placeholder="e.g. 6,89,111,124" value="<?php echo esc_html($buyingbuddy_allowedids)?>">
                                    <div class="xsmall">
                                    	Use this option to only load the plugin on the pages or post IDs listed.
                                	</div>                                                                                                        
                                </div> 
                            </div>                                                                                       
                            <div class="mb-4">
                                <div class="form-inline justify-content-between mb-1">
                                    <label for="buyingbuddy_auto_updates">
                                        <svg 
                                        	style="width: 1.25em; height: 1.25em;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                        	viewBox="0 50 768 1024"  >
                                            <path d="m 406.576,512 q 0,14.848 -10.85867,25.70667 l -256,256 q -10.85866,10.85866 -25.70666,10.85866 -14.848,0 -25.70667,-10.85866 Q 77.44533,782.848 77.44533,768 V 256 q 0,-14.848 10.85867,-25.70667 10.85867,-10.85866 25.70667,-10.85866 14.848,0 25.70666,10.85866 l 256,256 Q 406.576,497.152 406.576,512 Z" id="path2" >
                                        </svg>                                   
                                        Enable auto updates?
                                    </label>
                                    <select class="form-control w-auto" id="buyingbuddy_auto_updates" name="buyingbuddy_auto_updates"> 
                                        <option value="yes" <?php echo selected(esc_html($buyingbuddy_options['auto_updates']), "yes", false )?>>Yes (default)</option>
                                        <option value="no" <?php echo selected(esc_html($buyingbuddy_options['auto_updates']), "no", false )?>>No</option>
                                    </select>
                                </div>
                            	<div class="xsmall mb-2">This should be set to "Yes" to automatically receive the latest updates and features for the plugin.</div>
                        	</div>
                            <div class="mb-4">
                                <div class="form-inline justify-content-between mb-1">
                                    <label for="buyingbuddy_express_sites">
                                        <svg 
                                            style="width: 1.25em; height: 1.25em;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                            viewBox="0 50 768 1024"  >
                                            <path d="m 406.576,512 q 0,14.848 -10.85867,25.70667 l -256,256 q -10.85866,10.85866 -25.70666,10.85866 -14.848,0 -25.70667,-10.85866 Q 77.44533,782.848 77.44533,768 V 256 q 0,-14.848 10.85867,-25.70667 10.85867,-10.85866 25.70667,-10.85866 14.848,0 25.70666,10.85866 l 256,256 Q 406.576,497.152 406.576,512 Z" id="path2" >
                                        </svg>                                   
                                        Enable Express Sites?
                                    </label>
                                    <select class="form-control w-auto" id="buyingbuddy_express_sites" name="buyingbuddy_express"> 
                                        <option value="no" <?php echo selected(esc_html($buyingbuddy_options['express']), "no", false )?>>No (default)</option>
                                        <option value="yes" <?php echo selected(esc_html($buyingbuddy_options['express']), "yes", false )?>>Yes</option>
                                    </select>
                                </div>
                                <div class="xsmall mb-2"><span class="weight700">Leave this as NO</span> unless you receive specific instructions to change this.</div>
                            </div>                                                              	 
                        </div>                                                                                                                                                                                                                                                                         
                    </div>
                </div>


                <div class="row">
                    <div class="col">  
                        <input type="hidden" name="buyingbuddy_submitted" value="1" />
                        <div class="mb-4 text-right">
                            <button type="submit" class="btn btn-success btn-label ml-auto mr-0 ">
                            	Update Settings
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
