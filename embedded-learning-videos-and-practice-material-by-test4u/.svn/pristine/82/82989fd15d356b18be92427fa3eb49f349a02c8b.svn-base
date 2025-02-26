<div class="view_wrapper">
	<div class="clear_both"></div>
	<div class="title_line" style="margin-bottom:10px">
		<h1>Plugin Activation</span></h1>
	</div>
	
	<div class="wrap">
		Thank you for using the TEST4U plugin.
	</div>
	
	<p>
		<br />
		<b>In order to gain access to our free training material please check the box bellow and click the activate button.</b><br />
			

		<table class='table' style='max-width:400px;'>
			<tr>
				<td><input type='checkbox' id='t4u_agree_with_plugin' value='10' /> <label for='t4u_agree_with_plugin'>I agree that the plugin will contact the <b>test4u.eu</b> servers to download the required resources.<label></td>
			</tr>
			<tr>
				<td >&nbsp;</td>
			</tr>
			<tr>
				<td style='text-align:left;'><button id='btn-activate' class='button' onclick='ActivatePlugin()'>Activate</button></td>
			</tr>
		</table>
		<script>
			function ActivatePlugin(){
				var agree = document.getElementById('t4u_agree_with_plugin');
				
				if (!agree.checked){
					alert('You have to aggree that the plugin will contact test4u.eu servers.');
					document.getElementById('t4u_agree_with_plugin').focus();
					return false;
				}
				
				document.getElementById('btn-activate').disabled =true;

				var http = new XMLHttpRequest();
				var url = '<?=TEST4U_DATA_URL;?>/plugins/test4u-video-courses';
				var params = "&a=register_activate_plugin&version=free&plugin_version=1.2";
				http.open("POST", url, true);

				//Send the proper header information along with the request
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


				http.onreadystatechange = function() {//Call a function when the state changes.
					if(http.readyState == 4 && http.status == 200) {
						document.getElementById('btn-activate').disabled=false;
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
						document.getElementById('btn-activate').disabled=false;
					}
				}
				http.send(params);
			}
		</script>
	</p>
	
</div>