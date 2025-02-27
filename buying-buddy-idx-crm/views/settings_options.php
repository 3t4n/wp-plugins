
<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   ?>       
<div id="bbplugin-settings" class="bbsettings">
    <header class="header position-md-fixed w-100 bg-light pl-lg-3">
        <nav class="navbar navbar-expand-md navbar-dark py-2 py-md-0">
            <span class="navbar-brand p-0" style="position: absolute; top: 0; left: 10px; z-index: 1">
                <img src="https://d2w6u17ngtanmy.cloudfront.net/gfx/bb-logo_flash.png" class="" alt="Buying Buddy">
            </span>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bbPluginMenuContent" aria-controls="bbPluginMenuContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="bbPluginMenuContent">
                <ul class="navbar-nav nav" id="mybbTab" role="tablist">	<?php // navbar-nav and nav for tabs to wotk and navbar to look correct ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="bbWelcomeTab" data-toggle="tab" data-target="#bbWelcome" type="button" role="tab" aria-controls="bbWelcome" aria-selected="true">
                            <svg 
                            	class="svg-icon mr-1" 
                            	viewBox="0 0 576 512" 
                            	style="width: 1.25em; height: auto; margin-bottom: 3px; vertical-align: middle;fill: currentColor;overflow: hidden;">  
                        		<!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.-->                              
                        		<path d="M277.4 4c6-5.3 15.1-5.3 21.2 0l272 240c6.6 5.8 7.3 16 1.4 22.6s-16 7.3-22.6 1.4L512 235v197c0 44.2-35.8 80-80 80H144c-44.2 0-80-35.8-80-80V235l-37.4 33c-6.6 5.8-16.8 5.2-22.6-1.4s-5.2-16.8 1.4-22.6l272-240zM96 206.7V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V206.7L288 37.3 96 206.7z"/>
							</svg>                        	
                        	Welcome
                    	</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="bbTutorialsTab" data-toggle="tab" data-target="#bbTutorials" type="button" role="tab" aria-controls="bbTutorials" aria-selected="false">
                        	Tutorials
                    	</a>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Widget Shortcuts
                        </a>
                        <div class="dropdown-menu">
                        	<a class="dropdown-item" href="https://www.leadsandcontacts.com/widget-filter/start" target="_blank" title="Use the Wizard to create widgets and shortcodes">Wizard</a>
                            <a class="dropdown-item" href="https://www.leadsandcontacts.com/widget-settings/install" target="_blank">Installation Settings</a>
                            <a class="dropdown-item" href="https://www.leadsandcontacts.com/site/domain-settings" target="_blank">Website Options</a>
                            <a class="dropdown-item" href="https://www.leadsandcontacts.com/widget-settings/themes" target="_blank">Widget Themes</a>
                        </div>
                    </li>                      
					<li class="nav-item" role="presentation"> 
                        <a class="nav-link" id="bbResourcesTab" data-toggle="tab" data-target="#bbResources" type="button" role="tab" aria-controls="bbResources" aria-selected="false">	
                            Helpful Resources
                        </a>   
					</li>                                                                      
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Agent Dashboard
                        </a>
                        <div class="dropdown-menu">
                        	<a class="dropdown-item" href="https://leadsandcontacts.com/" target="_blank" title="Go to Agent's Buying Buddy account dashboard">Buying Buddy Account Dashboard</a>
                            <a class="dropdown-item" href="https://leadsandcontacts.com/user/dashboard/" target="_blank">My Profile &amp; Preferences</a>
                            <a class="dropdown-item" href="https://leadsandcontacts.com/user-settings/notifications/" target="_blank">Notification Settings</a>
                            <a class="dropdown-item" href="https://leadsandcontacts.com/account/lead-capture-settings/" target="_blank">Lead Capture Settings</a>
                        </div>
                    </li>                                                                          
                </ul>
            </div>
        </nav> 
    </header>
	<div class="container-fluid bb-main-wrapper">    
		<div class="maxwidth-xl ml-0 pl-lg-3">  
    		
    		<div class="tab-content" id="mybbTabContent">
                <div class="tab-pane fade show active" id="bbWelcome" role="tabpanel" aria-labelledby="bbWelcomeTab">
                              
                    <div class="row">
                        <div class="col-lg-3">
                        	<div class="fixed-tab-menu d-none d-lg-block">
                                <ul class="nav nav-pills nav-vertical nav-arrowtabs" id="bbWelcomePanelTab" role="tablist" > 
                					<li class="nav-item"> 
                                        <a href="#" class="nav-link active" id="bbDashboardTab" data-toggle="tab" data-target="#bbDashboard" type="button" role="tab" aria-controls="bbDashboard" aria-selected="true">	
                                            Plugin Home
                                        </a>
                					</li>
                					<li class="nav-item">                         
                                        <a class="nav-link" id="bbSettingsTab" data-toggle="tab" data-target="#bbSettings" type="button" role="tab" aria-controls="bbSettings" aria-selected="false">
                                            Settings
                                        </a> 
                					</li>   
                					<li class="nav-item">                         
                                        <a class="nav-link" id="bbTemplatesTab" data-toggle="tab" data-target="#bbTemplates" type="button" role="tab" aria-controls="bbTemplates" aria-selected="false">
                                            Template Pages
                                        </a> 
                					</li>                 					             					
                					<li class="nav-item"> 
                                        <a class="nav-link" id="bbAddWidgetsTab" data-toggle="tab" data-target="#bbAddWidgets" type="button" role="tab" aria-controls="bbAddWidgets" aria-selected="false">	
                                            Add Widgets
                                        </a>   
                					</li>              					      					
                					<li class="nav-item">                          
                                        <a class="nav-link" id="bbDebugTab" data-toggle="tab" data-target="#bbDebug" type="button" role="tab" aria-controls="bbDebug" aria-selected="false">
                                            Debug Information
                                        </a> 
                					</li>  
    							</ul> 
    							<hr>
    							<ul class="list-disc list-compact list-smaller">
              					    <li>
                                        <a href="<?php echo get_site_url();?>/wp-admin/edit.php?s=mbb_widget&post_type=page&post_status=all">
                                            Your pages with widgets
                                        </a>            					    
              					    </li>     												
                        		</ul>		                   													          					                         
                   			</div>			                              			 					              					            					                                  					            					              					            					
                           	<h1 class="d-lg-none mb-3">										<?php // MOBILE TAB SELECTOR ?>
                           		Plugin Dashboard
                            </h1>
                            <select class="form-control d-lg-none mb-3 tab_selector">
                                <option value="bbDashboardTab">Plugin Dashboard</option>
                                <option value="bbSettingsTab">Settings</option>
                                <option value="bbAddWidgetsTab">Add Widgets</option>
                                <option value="bbTemplatesTab">Template Pages</option>
                                <option value="bbDebugTab">Debug Information</option>                                					            					              					            					                                  					            					              					            					
                            </select> 
                        </div>
                        <div class="col-lg-9">
                        <?php if (!empty($msg_status)  && $msg_status != "") { 
                                echo wp_kses_post($msg_status);
                         } ?>
                        <?php if (!empty($_POST['buyingbuddy_check_activation'])  && $invalid_acid == "") { ?>
							<div class="alert alert-sm alert-success alert-marker marker-right border-inner-outline lh-13">
                                <div class="marker-icon">
                                    <svg
                                        style="width: 1rem; height: auto;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                        viewBox="0 0 512 512">  
                                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M256 32a224 224 0 1 1 0 448 224 224 0 1 1 0-448zm0 480A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM363.3 203.3c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L224 297.4l-52.7-52.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l64 64c6.2 6.2 16.4 6.2 22.6 0l128-128z"/>
                                    </svg>
                                </div>
                                <span class="weight700">Your account is now activated!</span> See "Settings" for more options.
                            </div>
                        <?php } ?>
                    	<?php if(esc_html($buyingbuddy_options["google_map_key"]) =="") { ?>
            				<div class="alert alert-sm alert-danger alert-marker marker-right border-inner-outline lh-13">
                                <div class="marker-icon">
                                    <svg
                                    	style="width: 1rem; height: auto;vertical-align: middle;fill: currentColor;overflow: hidden;" 
                                        viewBox="0 0 512 512"> 
                                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.-->                              
                                        <path d="M256 32a224 224 0 1 1 0 448 224 224 0 1 1 0-448zm0 480A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c-8.8 0-16 7.2-16 16V272c0 8.8 7.2 16 16 16s16-7.2 16-16V144c0-8.8-7.2-16-16-16zm24 224a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/>
                                    </svg>   
                                </div>
                                <span class="weight700">Google Map Key is missing</span> - See "Settings" for instructions.
                            </div>
                    	<?php } ?>
                            <div class="tab-content" id="bbWelcomePanelTabContent">    
                                <div class="tab-pane fade active show" id="bbDashboard" role="tabpanel" aria-labelledby="bbDashboardTab">
                    				<?php include_once "panel_dashboard.php"?>
                                </div>                                
                                <div class="tab-pane fade" id="bbAddWidgets" role="tabpanel" aria-labelledby="bbAddWidgetsTab">
                    				<?php include_once "panel_widgets.php"?>	
                        		</div>
                                <div class="tab-pane fade" id="bbTemplates" role="tabpanel" aria-labelledby="bbTemplates">
                    				<?php include_once "panel_templates.php"?>	
                        		</div>
                                <div class="tab-pane fade" id="bbSettings" role="tabpanel" aria-labelledby="bbSettingsTab">
									<?php include_once "panel_settings.php"?>
                                </div>
                                <div class="tab-pane fade" id="bbDebug" role="tabpanel" aria-labelledby="bbDebugTab">
									<?php include_once "panel_debug.php"?>                                                    
                                </div>
                            </div>
                        </div>
                    </div>
        		</div>
				<div class="tab-pane fade" id="bbTutorials" role="tabpanel" aria-labelledby="bbTutorialsTab">             
                 	<?php include_once "panel_tutorials.php"?>   
            	</div>	
                <div class="tab-pane fade" id="bbResources" role="tabpanel" aria-labelledby="bbResources">
    				<?php include_once "panel_resources.php"?>
        		</div>		            		    			
            </div> <!-- end tab-content --> 
			         