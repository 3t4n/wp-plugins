<div class="view_wrapper">
	<div class="clear_both"></div>
	<div class="title_line" style="margin-bottom:10px">
		<h1>Plugin Registration</span></h1>
	</div>
	
	<div class="wrap">
		Thank you for using the TEST4U plugin.
	</div>
	
	<p>
		<br />
		<br />
		<b>
		Please fill in the form below to create an account in order to gain 
		access to our free training material.<br />
		This will automatically create an account in the <a href='https://www.test4u.eu' target='_blank'>www.test4u.eu</a> platform.</b><br/>
		In case you already have an account in the <a href='https://www.test4u.eu' target='_blank'>www.test4u.eu</a> platform,
		use your credentials.


		<br />
		

		<p class='help'>
			Please note that your data will be sent to the test4u.eu servers over secure HTTPS connection.
		</p>
		<table class='table' style='max-width:400px;'>
			<tr>
				<td><label for='t4u_register_email'>Email:</label></td>
				<td><input type='email' id='t4u_register_email' class='form-input' style='width:100%;'/></td>
			</tr>
			<tr>
				<td><label for='t4u_register_password'>Password:</label></td>
				<td><input type='password' id='t4u_register_password' class='form-input' style='width:100%;'/></td>
			</tr>
			<tr>
				<td colspan='2'><input type='checkbox' id='t4u_agree_with_plugin' value='10' /> <label for='t4u_agree_with_plugin'>I agree that the plugin will contact the <b>test4u.eu</b> servers to download the required resources.<label></td>
			</tr>
			<tr>
				<td> </td>
				<td> </td>
			</tr>
			<tr>
				<td></td>
				<td style='text-align:right;'><button id='btn-register' class='button' onclick='Register()'>Register</button></td>
			</tr>
		</table>
		<script>
			function Register(){
				var email = document.getElementById('t4u_register_email').value;
				var pass = document.getElementById('t4u_register_password').value;
				var agree = document.getElementById('t4u_agree_with_plugin');
				
				var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				
				if (!re.test(email)){
					alert('The email you entered is invalid.');
					document.getElementById('t4u_register_email').focus();
					return false;
				}
				
				if (pass.length<1){
					alert('Please enter your password.');
					document.getElementById('t4u_register_password').focus();
					return false;
				}
				
				if (!agree.checked){
					alert('You have to aggree that the plugin will contact test4u.eu servers.');
					document.getElementById('t4u_agree_with_plugin').focus();
					return false;
				}
				
				document.getElementById('btn-register').disabled =true;

				var http = new XMLHttpRequest();
				var url = '<?=TEST4U_DATA_URL;?>/plugins/test4u-video-courses';
				var params = "&a=register_activate_plugin&version=free&email="+email+'&pass='+encodeURIComponent(pass);
				http.open("POST", url, true);

				//Send the proper header information along with the request
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


				http.onreadystatechange = function() {//Call a function when the state changes.
					if(http.readyState == 4 && http.status == 200) {
						document.getElementById('btn-register').disabled=false;
						try{
							var res = JSON.parse(http.responseText);
							if (!res.success && res.error.length>0){
								alert(res.error);
								return;
							}
							else{
								var data = {
									"action": "t4u_RegisterCopy",
									"api_key": res.api_key,
								};

								jQuery.post(ajaxurl, data, function(response) {
									response=response.data;
									
									if (response.success){
										window.location.href='<?=esc_url( get_admin_url(null, 'edit.php?post_type='.T4U_POST_TYPE) );?>'
									}
									else if (response.data && response.data.message && response.data.message.length>0){
										
									}
									else{
										
									}
								});
							}
						}
						catch(err){
							alert('Failed to contact remote server.');
						}
						
					}
					else if(http.readyState == 4){
						document.getElementById('btn-register').disabled=false;
					}
				}
				http.send(params);
			}
		</script>
	</p>
	
</div>