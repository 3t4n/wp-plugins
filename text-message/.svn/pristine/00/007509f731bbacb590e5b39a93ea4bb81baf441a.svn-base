<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function biztext_site_url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}


?>
<div class="wrap biz-text-wrapper">

	<div id="icon-options-general" class="icon32"></div>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content div-->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<button type="button" class="handlediv" aria-expanded="true" >
							<span class="screen-reader-text">Toggle panel</span>
							<span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<!-- Toggle -->

						<img class='img-logo' src="<?php echo $plugin_url . '/images/biztext-logo-new.svg'; ?>" alt="Biz Text Logo">	
						</h2>
						
						<div class="inside">
					
       							<!-- Tab links -->
								<div class="tabBT">
									<button class="tablinks" onclick="openBizTextTab(event, 'MyBizText')"  <?php if($open == "dashboard") echo 'id="defaultOpen"'; ?> >My Biz Text</button>
									<button class="tablinks" onclick="openBizTextTab(event, 'DisplayWebsite')"  <?php if($open == "display") echo 'id="defaultOpen"'; ?>>Display On Website</button>
									<button class="tablinks" onclick="openBizTextTab(event, 'BTSupport')"  <?php if($open == "support") echo 'id="defaultOpen"'; ?>>FAQ / Support</button>
								</div>
						
       							<!-- Tab content -->
								<div id="MyBizText" class="tabcontentBT">
								
									<div id="biztext-dashboard" style="height: 100vh; width: 100%">
									
									    <div>
                                            <button class="button biztext-dashboard-btn">View In Fullscreen</button>
                                            
                                        </div>
                                         <div class="biztext-dashboard-error"></div>
									
									    <iframe src="https://my.biztextsolutions.com" height="90%" width="100%"></iframe>
									    
									</div>
								</div>
								<!-- start tab 1 -->
								<div id="DisplayWebsite" class="tabcontentBT">
									
									<?php include('wpbiztext-display.php'); ?> 
								
								</div>
								<!-- end tab 2 -->

								<div id="BTSupport" class="tabcontentBT">
								  
									<h2>Biz Text Support</h2>
									<?php include('wpbiztext-support.php'); ?>
								
								</div>
       						
       						
								<script>
								
									var bizNumber;
							
									// get biz text number
									window.addEventListener('message', function(event) {
										//event.data has the following structure {pageTitle: [title]}
										//console.log("lucitest event,", event.data["pageTitle"]);
										
										if (event.data["pageTitle"] != undefined) {
										
											var numberRaw = event.data["pageTitle"].split('|')[1].trim();
										
											var number = "1" + numberRaw ;
											
											bizNumber = parseInt(number.replace(/[^0-9]/g, ''), 10);
											
											var btn = document.getElementById("web-btn");
											var link = document.getElementById("web-link");
											var nmb = "sms:+" + bizNumber
										 
											btn.setAttribute('href',nmb);
											link.setAttribute('href',nmb);
											
											var btNumInput = document.getElementById('wpbiztext-btnumber');
											
											
											
											if ( btNumInput.value == ""){
												
												document.getElementById('wpbixtext_text_name').value = 	document.getElementById('wpbixtext_text_name').value + numberRaw;
												btNumInput.value = bizNumber;
											
											}
											
											
										
											document.getElementById('bt-log-in').innerHTML = "<?php echo $biztext_status; ?>"
										
										}

									});
									
									//document.getElementsByClassName("tablinks")[2].disabled = true
								
									// function for tabs
									
									document.getElementById("defaultOpen").click();
									
									function openBizTextTab(evt, cityName) {
									 
										
										// Declare all variables
										var i, tabcontent, tablinks;

										// Get all elements with class="tabcontent" and hide them
										tabcontent = document.getElementsByClassName("tabcontentBT");
										for (i = 0; i < tabcontent.length; i++) {
										tabcontent[i].style.display = "none";
										}

										// Get all elements with class="tablinks" and remove the class "active"
										tablinks = document.getElementsByClassName("tablinks");
										for (i = 0; i < tablinks.length; i++) {
										tablinks[i].className = tablinks[i].className.replace(" active", "");
										}

										// Show the current tab, and add an "active" class to the button that opened the tab
										document.getElementById(cityName).style.display = "block";
										evt.currentTarget.className += " active";
									}
									
									// open from display support tab
									
									function bizTextLearnWidget() {
														
										document.getElementsByClassName("tablinks")[2].click();
										document.getElementById('faq-widget').scrollIntoView(true);
										window.scrollBy(0, -30); 
										document.getElementById('faq-widget').click();
										
										if(document.getElementById('faq-widget-panel').offsetHeight > 0){
												
											document.getElementById('faq-widget').click();
											
										}
													
									}
									
									function bizTextLogin() {
									
										document.getElementsByClassName("tablinks")[0].click();
									}
									
									function isHidden(el) {
    									return (el.offsetParent === null)
									}
									
									bizTextSetStyle('web-btn', {'textDecoration':'none' });
									
									// ** listeners for form 
									
									var count = 0;
									var btLink = document.getElementById("web-link");
									var btBtnInner = document.getElementById("inner-web-btn");
									var btnBtn = document.getElementById("web-btn");
									var radioLink = document.getElementById("display_link");
									var radioBtn = document.getElementById("display_button");
									var btnSection = document.getElementById("set-button");
									var linkSection = document.getElementById("set-link");
									
									var classname = document.getElementsByClassName("wpbiztext-styles");
									var advancedOption = document.getElementsByClassName("biztext-advanced-options");
									var selectClass = document.getElementsByClassName("wpbiztext-styles-select");
									var radios = document.forms["wpbiztext-button-form"].elements["display_type"];
									
									// listeners input and sliders
									for (var i = 0; i < classname.length; i++) {
										classname[i].addEventListener('click', bizTextDisplaySettings, false);
										classname[i].addEventListener('input', bizTextDisplaySettings, false);
										
									}
									
									// listeners select 
									for (var i = 0; i < selectClass.length; i++) {
										selectClass[i].addEventListener('change', bizTextSelectFunction, false);
										
									}
								
									// listener for radio buttons									
									for (var i = 0, max = radios.length; i < max; i++) {
									
										radios[i].addEventListener('click', bizTextRadioFunction, false);
									
									}
									
									// listeners for advanced options 
									for (var i = 0; i < advancedOption.length; i++) {
										advancedOption[i].addEventListener('click', bizTextAdvancedOptions, false);
										
									}
									    
									
									// listener for what section focus is in 
								    
								    btnSection.addEventListener('focusin' , function (){
								    	
								    	radioBtn.checked = true;
								    	bizTextHideLink();
								    
								    });	
								    
								   	linkSection.addEventListener('focusin' , function (){
								    
								    	radioLink.checked = true;
								    	bizTextHideBtn();
								    
								    });									
									    
					/* 
									document.getElementById("clear_button").addEventListener("click", function(){
									
										document.getElementById("web-btn").removeAttribute("style");
										document.getElementById("web-link").removeAttribute("style");
										document.getElementById("web-btn").innerHTML = '<span id="inner-web-btn"><span>';
										document.getElementById("web-link").innerHTML = '';
										
										bizTextSetStyle('web-btn', {'textDecoration':'none', 'padding':'5px' });
										 
									});
 */
									
										
									function bizTextSelectFunction() {
									
										var attribute = this.getAttribute("id");
										var selectUse = (attribute == "wpbixtext_button_width") ? 'display' : 'textAlign';
										
										btnBtn.style[selectUse] = this.value;
									
									
									}
									
									function bizTextAdvancedOptions() {
									
										var attribute = this.getAttribute("id");
										
										if (attribute == "biztext-link-advanced-options") {
										
											radioLink.checked = true;
								    		bizTextHideBtn();
										
										} else {
										
											radioBtn.checked = true;
								    		bizTextHideLink();
								    
										
										}
									
									}
								

									function bizTextDisplaySettings (event) {
										var attribute = this.getAttribute("id");
										
										if (event.type == 'click' || event.type == 'input' ) {
										
											if (attribute == "wpbixtext_text_name" ) {
											
												radioLink.checked = true;
									
											}  
										
											(document.getElementById("display_link").checked) ? bizTextHideBtn() : bizTextHideLink();
									
										} 
										
										if (event.type == 'input') {
										
											if (attribute == "wpbixtext_text_name" ) {
										
												btLink.innerHTML = this.value;
										
											}
										
											if (attribute == "wpbixtext_button_text" ) {
										
												btBtnInner.innerHTML = this.value;
                    
										
											}
										
											if (attribute == "wpbixtext_link_class" ) {
										
												btnBtn.setAttribute("class", this.value);
												
										
											}
											
											if (attribute == "wpbixtext_link_only_class") {
											
												btLink.setAttribute("class",this.value);
											
											
											}
										
											var value =  this.value + 'px';
									
										
											// sliders and slider inputs 
											
											
										
											if (attribute == "button_size" || attribute == "wpbixtext_textsize_value" ){
							
												bizTextSetStyle('web-btn', {'fontSize':value });
												bizTextSetSliderValue ((attribute == "button_size") ? "wpbixtext_textsize_value" : "button_size" , this.value );
											 
									
											}
									
											if (attribute == "button_padding" || attribute == "button_padding_value") {
										
											 
												bizTextSetStyle('web-btn', {'paddingTop':value, 'paddingBottom': value });
												bizTextSetSliderValue ((attribute == "button_padding") ? "button_padding_value" : "button_padding" , this.value );
											 
									
											}
									
											if (attribute == "button_padding_horz" || attribute == "button_padding_horz_value" ){
									
											 
												bizTextSetStyle('web-btn', {'paddingLeft': value , 'paddingRight':value});
												bizTextSetSliderValue ((attribute == "button_padding_horz") ? "button_padding_horz_value" : "button_padding_horz" , this.value );
											 
									
											}
									
											if (attribute=="button_border_radius" || attribute=="button_border_radius_value"){
									

												bizTextSetStyle('web-btn', {'borderRadius': value });
												bizTextSetSliderValue ((attribute == "button_border_radius") ? "button_border_radius_value" : "button_border_radius" , this.value );
											 
											}
											

										
										} 
										
										//console.log(attribute);
										
									};
											
									function bizTextRadioFunction() {
							
										(this.value == "display_link") ? bizTextHideBtn() : bizTextHideLink();
									
									}
					
										
									function bizTextSetSliderValue (id,value) {
									
										document.getElementById(id).value = value; 
										
									
									}
									
									function bizTextHideBtn() {
									
										btnBtn.style.display = "none";
										btLink.style.display = "inline-block";
										var input = document.getElementById("wpbixtext_text_name").value
										btLink.innerHTML = input;
										
									
									}
									
									function bizTextHideLink() {
								
										btLink.style.display = "none";
										btnBtn.style.display =  document.getElementById("wpbixtext_button_width").value;
										var input = document.getElementById("wpbixtext_button_text").value
										btBtnInner.innerHTML = input;
											 
									
									}
					
									// set style for button 
								
									function bizTextSetStyle( objId, propertyObject ) {
										 var elem = document.getElementById(objId);
										 for (var property in propertyObject)
										  elem.style[property] = propertyObject[property];
									}	
						
									
									document.getElementById("get-code").addEventListener("click", function() {
									
									
										var htmlCode = document.getElementById("web-btn").outerHTML
										
										
											document.getElementById("html_code_box").innerText = htmlCode;
										
										
									}, false); 
									
									document.getElementById("get-code-link").addEventListener("click", function() {
								
								
									var htmlCode = document.getElementById("web-link").outerHTML
									
									
										document.getElementById("html_code_box_link").innerText = htmlCode;
									
										
									}, false); 
									
							
									
									jQuery(document).ready(function () {
									  
									  jQuery(".biztext_sumbit-form").click(function () {
									  
									  // Not logged in
									  if (document.getElementById('wpbiztext-btnumber').value == ''){ 
									  	
										  alert("You have not yet logged in. Log in or sign up to get your Biz Number.")
									  	
									  } else {
									  
										//alert(jQuery(this).index('.biztext_sumbit-form'));
								  
										// if activated - clicking active button
										if (jQuery(this).index('.biztext_sumbit-form') == 0){
							 
											document.getElementById("wpbiztext-form-activated").value = "Y";
							  
										}
																		
										// link code
										document.getElementById("wpbiztext-link-code").value = document.getElementById('web-link').outerHTML;

										// button code
										document.getElementById("wpbiztext-button-code").value = document.getElementById('web-btn').outerHTML;


										document.getElementById("wpbiztext-styles").value = document.getElementById('web-btn').style.cssText

										jQuery("#wpbiztext-button-form").submit();
								
									  	
									  	}
									  });	
									  
									 
									});
									
									function bizTextFrameLoad() {
								
  										var iframe = document.getElementById("site-preview");
  										var button = iframe.contentWindow.document.getElementsByClassName("biztext_preview");
  										var link = iframe.contentWindow.document.getElementsByClassName("biztext_preview_link");
  										
  										if(button.length != 0){
  											
  												button[0].innerHTML = document.getElementById("display-type-wrapper").innerHTML;
  										
  										}
  										
  										if(link.length != 0){
  											
  											link[0].innerHTML = document.getElementById("display-type-wrapper").getElementsByTagName("a")[0].outerHTML;
  										
  											link[0].getElementsByTagName("a")[0].style.display="inline-block";
  											
  										}
  										
  										//console.log (document.getElementById("display-type-wrapper").getElementsByTagName("a")[0])
  										
  										var button = document.querySelector('#biztext-dashboard .biztext-dashboard-btn'); 
  										
                                        button.addEventListener('click', fullscreen);
                                        // when you are in fullscreen, ESC and F11 may not be trigger by keydown listener. 
                                        // so don't use it to detect exit fullscreen
                                        document.addEventListener('keydown', function (e) {
                                          console.log('key press' + e.keyCode);
                                        });
                                        // detect enter or exit fullscreen mode
                                        document.addEventListener('webkitfullscreenchange', fullscreenChange);
                                        document.addEventListener('mozfullscreenchange', fullscreenChange);
                                        document.addEventListener('fullscreenchange', fullscreenChange);
                                        document.addEventListener('MSFullscreenChange', fullscreenChange);

                                        function fullscreen() {
                                          // check if fullscreen mode is available
                                          if (document.fullscreenEnabled || 
                                            document.webkitFullscreenEnabled || 
                                            document.mozFullScreenEnabled ||
                                            document.msFullscreenEnabled) {
    
                                            // which element will be fullscreen
                                            var iframe = document.querySelector('#biztext-dashboard iframe');
                                            // Do fullscreen
                                            if (iframe.requestFullscreen) {
                                              iframe.requestFullscreen();
                                            } else if (iframe.webkitRequestFullscreen) {
                                              iframe.webkitRequestFullscreen();
                                            } else if (iframe.mozRequestFullScreen) {
                                              iframe.mozRequestFullScreen();
                                            } else if (iframe.msRequestFullscreen) {
                                              iframe.msRequestFullscreen();
                                            }
                                          }
                                          else {
                                            document.querySelector('.biztext-dashboard-error').innerHTML = 'Your browser is not supported';
                                          }
                                        }

                                        function fullscreenChange() {
                                          if (document.fullscreenEnabled ||
                                               document.webkitIsFullScreen || 
                                               document.mozFullScreen ||
                                               document.msFullscreenElement) {
                                            console.log('enter fullscreen');
                                          }
                                          else {
                                            console.log('exit fullscreen');
                                          }
                                          // force to reload iframe once to prevent the iframe source didn't care about trying to resize the window
                                          // comment this line and you will see
                                          var iframe = document.querySelector('iframe');
                                          iframe.src = iframe.src;
                                        }
                                        

									};
									
									</script>
								
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			
		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->


