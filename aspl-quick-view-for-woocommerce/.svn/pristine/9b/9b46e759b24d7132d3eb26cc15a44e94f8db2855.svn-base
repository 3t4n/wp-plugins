<?php 
if ( ! defined( 'ABSPATH' ) ) 
{
	exit;
}
?>
<div class="aspl_qview_menu_page_main">

	<div>	
		<div class="aspl_qv_tab">
			<a href="https://acespritech.com/" class="aspl_logo_section" target="_blank"><img src="<?php _e(esc_url(plugins_url().'/aspl-product-quick-view/images/aspl_logo.png'));?>" class="aspl_logo"></a>
			<button class="tablinks active" onclick="open_aspl_qv_tab(event, 'aspl_qv_setting')">Setting</button>
			<button class="tablinks" onclick="open_aspl_qv_tab(event, 'aspl_qv_other_plugin')">Other Plugins</button>
		</div>

		<div id="aspl_qv_setting" class="tabcontent" style="display:block;">
			<form method="POST">
				<h3>Setting for Quick View Display Elements</h3>
				<table>
					<tr>
						<td><label>Button Name : </label></td>
						<td><input type="text" name="aspl_qview_button_text" value="<?php _e(esc_attr($button_text)); ?>"></td>
					</tr>
					<tr>
						<td><label>Button Background Color :</label></td>
						<td><input type="color" id="favcolor" name="aspl_qview_button_back_color" value="<?php _e(esc_attr($button_back_color)); ?>"></td>
					</tr>
					<tr>
						<td><label>Button Text Color :</label></td>
						<td><input type="color" id="favcolor" name="aspl_qview_button_text_color" value="<?php _e(esc_attr($button_text_color)); ?>"></td>
					</tr>
					<tr>
						<td>
						<input type="submit" name="aspl_qview_button_text_save" value="Save" class="button button-primary">
						</td>
						<td></td>
					</tr>
				</table>
			</form>
		</div>

		<div id="aspl_qv_other_plugin" class="tabcontent">
			<table class="aspl_qv_other_module_table">
				<tr>
					<td>
						<div class="aspl_qview_plugin_detail_secction">
							<center>
								<div>
									<img src="<?php _e(esc_url(plugins_url().'/aspl-product-quick-view/images/aspl_logo.png'));?>">
								</div>
								<div><h1>Product Cost Price</h1></div>
								<div><h3>Simple and variation product cost price option also provide profit report.</h3></div>
								<div><a href="https://wordpress.org/plugins/product-cost-price/" target="_blank" class="button button-primary" >View More</a></div>
							</center>
						</div>
					</td>
					<td>
						<div class="aspl_qview_plugin_detail_secction">
							<center>
								<div>
									<img src="<?php _e(esc_url(plugins_url().'/aspl-product-quick-view/images/aspl_logo.png'));?>">
								</div>
								<div><h1>Woocommerce autocomplete checkout address</h1></div>
								<div><h3>For checkout address fields.</h3></div>
								<div><a href="https://wordpress.org/plugins/woo-autocomplete-checkout-address/" target="_blank" class="button button-primary" >View More</a></div>
							</center>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="aspl_qview_plugin_detail_secction">
							<center>
								<div>
									<img src="<?php _e(esc_url(plugins_url().'/aspl-product-quick-view/images/aspl_logo.png'));?>">
								</div>
								<div><h1>WooCommerce GiftProduct</h1></div>
								<div><h3>Peloples like to gift some one. Give facility tou your customer for gift wrap their product.</h3></div>
								<div><a href="https://wordpress.org/plugins/multiple-gift-product/" target="_blank" class="button button-primary" >View More</a></div>
							</center>
						</div>
					</td>
					<td>
						<div class="aspl_qview_plugin_detail_secction">
							<center>
								<div>
									<img src="<?php _e(esc_url(plugins_url().'/aspl-product-quick-view/images/aspl_logo.png'));?>">
								</div>
								<div><h1>WooCommerce Purchase Analysis</h1></div>
								<div><h3>Purchase analysis for customers.</h3></div>
								<div><a href="https://wordpress.org/plugins/woo-purchase-analysis/" target="_blank" class="button button-primary" >View More</a></div>
							</center>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="aspl_qview_plugin_detail_secction">
							<center>
								<div>
									<img src="<?php _e(esc_url(plugins_url().'/aspl-product-quick-view/images/aspl_logo.png'));?>">
								</div>
								<div><h1>WooCommerce Product Wishlist</h1></div>
								<div><h3>To manage customers favourite product for later.</h3></div>
								<div><a href="https://wordpress.org/plugins/woo-product-wishlist/" target="_blank" class="button button-primary" >View More</a></div>
							</center>
						</div>
					</td>
					<td>
						<div class="aspl_qview_plugin_detail_secction">
							<center>
								<div>
									<img src="<?php _e(esc_url(plugins_url().'/aspl-product-quick-view/images/aspl_logo.png'));?>">
								</div>
								<div><h1>Product Question and Answer</h1></div>
								<div><h3>This plugin allows the customers to ask questions about each product in your store and any one can answers for those Questions.</h3></div>
								<div><a href="https://wordpress.org/plugins/product-question-and-answer/" target="_blank" class="button button-primary" >View More</a></div>
							</center>
						</div>
					</td>
				</tr>
			</table>
		</div>

		<script>
			function open_aspl_qv_tab(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
				}
		</script>

	</div>
	
</div>