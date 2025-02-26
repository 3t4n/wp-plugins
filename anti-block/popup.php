<style>
				#anti_block_overlay {
								position: fixed;
								z-index: 10000;
								top: 0px;
								left: 0px;
								height:100%;
								width:100%;
								background: #000;
								display: none;
				}
				#no_ads{
								padding: 10px;
								max-width: 400px;
								display:none;
								background: #FFF;
								border-radius: 5px; -moz-border-radius: 5px; 
								-webkit-border-radius: 5px;
								box-shadow: 0px 0px 4px rgba(0,0,0,0.7); 
								-webkit-box-shadow: 0 0 4px rgba(0,0,0,0.7); 
								-moz-box-shadow: 0 0px 4px rgba(0,0,0,0.7);
				}
				#no_ads h1{
								padding: 0;
								margin: 0;
				}
				#msg_buttons .adbtns {
								cursor:pointer;
								font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
								background:#A1A1A1; border:0 none;
								border: none;
								width: auto;
								overflow: visible;
								font-size: 1em;
								color: #FFF;
								padding: 7px 10px;  
								border-radius: 4px; 
								-webkit-border-radius: 4px; 
								-moz-border-radius: 4px; 
								font-weight: bold; 
								text-shadow: 0 1px 0 rgba(0,0,0,0.4);
				}
				#msg_buttons ul
				{
								list-style-type:none;
								margin:0;
								padding:10px 0 0 0;
				}
				#msg_buttons ul li
				{
								display:inline;
								white-space: nowrap;
				}
				#advert{
								display: none;
				}
</style>
<div style="display: none; opacity: 0.5;" id="anti_block_overlay"></div>
<div id="no_ads" style="display: none; position: fixed; opacity: 1; z-index: 11000; left: 50%; margin-left: -116px; top: 100px;">
				<h1><?php	echo	$title;	?></h1>
				<p><?php	echo	$message;	?></p>
				<div id="msg_buttons">
								<form method="post" id="ad_options_form">
												<ul>
																<li><input type="submit" value="<?php	echo	$yes;	?>" name="ab_understand" id="ab_understand"  class="adbtns"></li>
																<?php //make the no button simply set session and close popup, no page refresh ?>
																<li><input type="submit" value="<?php	echo	$no;	?>" name="ab_stop_nagging" id="ab_stop_nagging" class="adbtns"></li>
												</ul>
								</form>
				</div>
</div>

<script>
				jQuery(document).ready(function () {
								if (jQuery("#advert").length === 0) {
												jQuery("#anti_block_overlay").show();
												jQuery("#no_ads").show();
								}
				});
</script>