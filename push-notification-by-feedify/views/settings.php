<?php
$plugin_url = plugin_dir_url( __FILE__ );
?>
<style>
.doMainRelated * {
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	padding: 0;
	margin: 0;
	font-size: 16px;
}
.doMainRelated.wrap {
	max-width: 450px;
	width: 100%;
	margin: 100px auto 0;
	padding: 20px 25px 40px;
	-moz-box-shadow: 0 0 10px 0 rgba(0,0,0,.2);
	-webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.2);
	box-shadow: 0 0 10px 0 rgba(0,0,0,.2);
	position: relative;
	z-index: 1;
}
#wpbody {
	background: url(https://sftextures.com/texture/2748/0/2743/corner-pattern-background-light-grey-color-squared-90-degrees-lines-seamless-wallpaper-texture.jpg) left top repeat;
	background-size: 100px;
	-moz-background-size: 100px;
	-webkit-background-size: 100px;
}
.doMainRelated.wrap::after {
	content: "";
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #ffffff;
	z-index: -1;
	opacity: .4;
}
.doMainRelated .clear {
	clear: both;
}
.doMainRelated th, .doMainRelated td {
	width: 100%;
	display: block !important;
	float: left;
	padding: 0;
}
.doMainRelated .regular-text {
	width: 100%;
	height: 44px;
	padding: 0 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
.doMainRelated .regular-text:focus {
	border: 1px so-lid #ccc;
	box-shadow: 0 0 5px 0 rgba(0,0,0,.2);
}
.doMainRelated h1 {
	text-align: center;
	padding: 0 0 15px;
	width: calc(100% + 50px);
	margin-left: -25px;
	margin-top: -20px;
	margin-bottom: 15px;
	color: #fff;
	padding: 25px 0;
	font-weight: 700;
	font-size: 30px;
	border-bottom: 2px solid #094477;
	background: rgba(49,183,245,1);
	background: -moz-linear-gradient(left, rgba(49,183,245,1) 0%, rgba(0,92,135,1) 100%);
	background: -webkit-gradient(left top, right top, color-stop(0%, rgba(49,183,245,1)), color-stop(100%, rgba(0,92,135,1)));
	background: -webkit-linear-gradient(left, rgba(49,183,245,1) 0%, rgba(0,92,135,1) 100%);
	background: -o-linear-gradient(left, rgba(49,183,245,1) 0%, rgba(0,92,135,1) 100%);
	background: -ms-linear-gradient(left, rgba(49,183,245,1) 0%, rgba(0,92,135,1) 100%);
	background: linear-gradient(to right, rgba(49,183,245,1) 0%, rgba(0,92,135,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#31b7f5', endColorstr='#005c87', GradientType=1 );
}
.doMainRelated label {
	margin-bottom: 10px;
	display: block;
	font-size: 18px;
	color: #585858;
}
.doMainRelated tr {
	display: block;
	width: 100%;
	float: left;
	margin-bottom: 4px;
}
.doMainRelated .button-primary {
	font-size: 16px;
	padding: 0 50px;
	height: 40px;
	line-height: 38px;
	color: #fff;
	text-shadow: none !important;
	box-shadow: none;
	border: none;
	margin-top: 10px;
	-webkit-transition: all ease-in-out 300ms;
	-moz-transition: all ease-in-out 300ms;
	transition: all ease-in-out 300ms;
	-webkit-border-radius: 35px;
	-moz-border-radius: 35px;
	border-radius: 35px;
}
.btn_center {
	text-align: center;
}
.signUp {
	font-size: 16px;
	color: #717171;
}
.mt10 {
	margin-top: 10px;
}
.mb10 {
	margin-bottom: 10px;
}
.power {
	width: 100%;
	float: left;
	display: block;
}
.white-text {
	color: white;
}
<?php 
if(get_option('feedify_domain_key') == "" || get_option('feedify_public_key') == "")
{
	?>
	.left-side-form{
		width: 50%;
		float: left;
	}
	.right-side-form{
		width: 50%;
		float: left;
	}
	@media screen and (max-width: 782px) {
		.doMainRelated.wrap {
			width: auto;
    		margin: 5%;
		}
		.left-side-form{
			width: 100%;
		}
		.right-side-form{
			width: 100%;
		}
		#wpcontent {		
			padding-left: 0px !important;
		}
	}
	<?php
}
?>
</style>

	<div class="left-side-form">
		<div class="wrap doMainRelated">

		<h1>Feedify Settings</h1>
		<form method="post" action="" id="feedify_key_form">
			<?php wp_nonce_field( 'feedify_nonce' ); ?>
			<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="feedify_licence_key">Licence Key</label></th>
				<td><input type="text" id="feedify_licence_key" class="regular-text" name="feedify_licence_key" value="<?php echo esc_html(get_option('feedify_licence_key')); ?>" />

				<br/>
				
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="feedify_domain_key">Domain key</label></th>
				<td><input type="text" id="feedify_domain_key" class="regular-text mb10" name="feedify_domain_key" value="<?php echo esc_html(get_option('feedify_domain_key')); ?>" />
				<br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="feedify_public_key" style="display:none;">Public Key</label></th>
				<td><input style="display: none;" type="text" id="feedify_public_key" class="regular-text" name="feedify_public_key" value="<?php echo esc_html(get_option('feedify_public_key'));  ?>" />
				</td>
				<?php if (is_ssl()) {
					$feedify_enable_ssl_check = true;
				}else{
					$feedify_enable_ssl_check = false;
				} ?>
				<td style="display:none !important;"><input type="hidden" name="feedify_enable_ssl_check" id="feedify_enable_ssl_check" value="<?php echo esc_html($feedify_enable_ssl_check);?>">
					<div style="display: flex;">
						<label class="switch">
							
						<?php if(get_option('feedify_licence_key') != '' && get_option('feedify_domain_key') != ''){ ?>
							<input type="checkbox" id="feedify_enable_ssl" name="feedify_enable_ssl" value="yes"  <?php echo (get_option('feedify_enable_ssl') == 'yes' ? 'checked' : ''); ?>/>
						<?php } else { ?>
							<input type="checkbox" id="feedify_enable_ssl" name="feedify_enable_ssl" value="yes"  checked/>
						<?php } ?>

							<span class="slider round"></span>
						</label>
						<span class="feedify_checkbox_txt">My website is HTTPS enabled</span>
					</div>	
				<br/>
				<div id="feedify_enable_ssl_err"></div>
				</td>
			</tr>
			</table>
			<input type="hidden" name="feedify_cmd" value="feedify_save_settings" />
			<div class="btn_center">
			<button class="button button-primary" id="send_btn" type="submit">Save Changes</button>
			</div>
		</form>

		<div class="clear"></div>
		</div>
	</div>
<?php
if(get_option('feedify_domain_key') == "" || get_option('feedify_public_key') == "")
{
?>	
	<div class="right-side-form">
		<div class="wrap doMainRelated">

		<h1>New to Feedify</h1>
		<form method="post" action="">			
			 <?php wp_nonce_field( 'feedify_nonce' ); ?>
			<input type="hidden" name="feedify_cmd" value="feedify_save_settings" />
			<input type="hidden" name="csrf-token" value="<?php echo esc_html(bin2hex(random_bytes(32)));?>">
			<div class="btn_center">
			<button class="button button-primary 1step_reg" id="openModal" type="button">1-Step Registration</button>			
			</div>
			<br>
			<p class="btn_center">Facing Issues? <a href="https://app.feedify.net/signup" target="_blank">Manually Register on feedify.net</a></p>
		</form>

		<div class="clear"></div>
		</div>
	</div>
<style>	
/* Modal overlay */
.modal {
  display: none; /* Hidden by default */
  position: fixed;
  z-index: 1000;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
}

/* Modal content */
.modal-content {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  max-width: 500px;
  width: 90%; /* Responsive */
  text-align: center;
  position: relative;
}

/* Close button */
.close {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 18px;
  font-weight: bold;
  cursor: pointer;
}

/* Responsive design */
@media (max-width: 600px) {
  .modal-content {
    padding: 15px;
  }

  .close {
    top: 5px;
    right: 10px;
  }
}
.btn-signup {
  font-family: inherit !important;
}
.modal-content {
  background: linear-gradient(to right, rgb(12 44 58) 0%, rgb(59 67 70) 100%);
}
#signup-form .help-block {
  text-align: left;
}
.btn-signup {
  padding: 0 !important;
}
span.c_error {
  min-height: 1px;
  display: block;
}

.has-error span.c_error,
.has-success span.c_error {
  display: none;
}

.has-success .form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}

.has-error .form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}

label {
  margin-bottom: 5px;
}

.form-group {
  margin-bottom: 10px;
}

.btn-signup {
  padding: 8px 56px;
}

.signin-form .card-header {
  font-size: initial;
}

.signin-form label {
  font-size: 16px;
}
</style>
<?php
$plugin_dir = plugins_url() . '/push-notification-by-feedify';
$domain_get = site_url();
$url = preg_replace('/^https?:\/\//', '', $domain_get);
    
// Remove the path, query string, and fragment
$url = preg_replace('/\/.*$/', '', $url);
$mainDomain = $url;
$platform = "wordpress";
$domain = $mainDomain;
$err_msg = isset($_SESSION['error_msg']) ? sanitize_text_field($_SESSION['error_msg']) : "";
?>   
	<div id="modal" class="modal feedify-one-step-main">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <div class="container-fluid">		
		<div class="">
			<div class="row">
				<a href="javascript:void(0);"><img src="<?php echo esc_html($plugin_dir); ?>/assets/img/logo.png"></a>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 top30">
							
							<form id="signup-form" action="" id="signup-form" method="post" class="form-verticle" role="form">
							<?php wp_nonce_field( 'feedify_nonce' ); ?>
								<div class="signup-form top40">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><img src="<?php echo esc_html($plugin_dir); ?>/assets/img/semail.png"></span>
											<input type="text" name="email" value="<?php echo esc_html($email);?>" placeholder="Email" class="form-control">
										</div>
										<span style="color: red;"></span>
									</div>
									
									<div class="form-group">
										<input type="tel" placeholder="Phone No." id="phone" name="phone" value="<?php echo esc_html($phone);?>" class="form-control phoneinput" maxlength="15">
										<span class="text-danger"></span>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><img src="<?php echo esc_html($plugin_dir); ?>/assets/img/helpdesk.png"></span>
											<input type="text" id="store_url" name="store_url" value="<?php echo esc_html($domain);?>" placeholder="Store Url" class="form-control">
										</div>
										<span style="color: red;"></span>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><img src="<?php echo esc_html($plugin_dir); ?>/assets/img/smobile.png"></span>
											<input type="password" name="password" id="password" placeholder="Password" class="form-control">
										</div>
										<span style="color: red;"></span>
									</div>
									<div class="row bottom20 top40">
										<div class="col-sm-12">
											<input type="hidden" name="platform" value="<?php echo esc_html($platform);?>">
											<input type="hidden" name="plan_id" value="">
											<input type="hidden" name="redirect_url" value="">
											<input type="hidden" name="feedify_cmd" value="feedify_register" />
											<input type="submit" class="btn btn-signup" value="GET STARTED">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<span style="color:red;"><?php echo esc_html($err_msg);?></span>	
<script>
jQuery(document).ready(function() {
	jQuery('#signup-form').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			email: {
				validators: {
					notEmpty: {
						message: 'The email address is required'
					},
					/*emailAddress: {
					    message: 'The input is not a valid email address'
					}*/
					regexp: {
						regexp: /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
						message: 'The input is not a valid email address'
					}
				}
			},
			store_url: {
				validators: {
					notEmpty: {
						message: 'The store url is required'
					},
					/*regexp: {
					        regexp: /\b(?:(?:https?|ftp):\/\/|\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i,
					        message: 'Please enter valid store URL'
					    }*/
					regexp: {
						regexp: /^((ftp|http|https):\/\/)?(www.)?(?!.*(ftp|http|https|www.))[a-zA-Z0-9_-]+(\.[a-zA-Z]+)+((\/)[\w#]+)*(\/\w+\?[a-zA-Z0-9_]+=\w+(&[a-zA-Z0-9_]+=\w+)*)?$/,
						message: 'Please enter valid store URL'
					}
				}
			},
			phone: {
				validators: {
					notEmpty: {
						message: 'The Phone No is required'
					},
					integer: {
						message: 'Please enter a valid Phone No.'
					}
				}
			},
			password: {
				validators: {
					notEmpty: {
						message: 'The password is required'
					},
					stringLength: {
						min: 6,
						max: 20
					}
				}
			}
		}
	});
});

jQuery("#phone").intlTelInput({	
	geoIpLookup: function(callback) {
		jQuery.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
			var countryCode = (resp && resp.country) ? resp.country : "";
			callback(countryCode);
		});
	},
	hiddenInput: "full_number",
	initialCountry: "auto",
	nationalMode: false,
	onlyCountries: [],
	placeholderNumberType: "MOBILE",
	preferredCountries: ['in', 'us', 'uk'],
	separateDialCode: true,
	utilsScript: "<?php echo esc_html($plugin_dir); ?>/assets/js/utils.js"
});
</script>
        </div>
    </div>
<script>
// Get elements
const modal = document.getElementById("modal");
const openModalButton = document.getElementById("openModal");
const closeModalButton = document.getElementById("closeModal");

// Open modal
openModalButton.addEventListener("click", () => {
    modal.style.display = "flex";
});

// Close modal
closeModalButton.addEventListener("click", () => {
    modal.style.display = "none";
});

// Close modal when clicking outside of it
window.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
    }
});
</script>
<?php
}
?>
