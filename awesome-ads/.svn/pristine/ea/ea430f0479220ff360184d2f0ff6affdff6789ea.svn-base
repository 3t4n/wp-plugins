<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script>
$j=jQuery.noConflict();
$j(document).ready(function() {
	$j('#filter_enabled').click(function(event){
		event.preventDefault();
		$j('.net_enabled_no').hide();
		$j('.net_enabled_yes').show();
	});
	$j('#filter_disabled').click(function(event){
		event.preventDefault();
		$j('.net_enabled_no').show();
		$j('.net_enabled_yes').hide();
	});
	$j('#filter_all').click(function(event){
		event.preventDefault();
		$j('.net_enabled_no').show();
		$j('.net_enabled_yes').show();
	});
});
function validarInteiro(valor){ 
	valor = parseInt(valor) 
	if (isNaN(valor)) { 
		 return "" 
	}else{ 
		 return valor 
	} 
}
function addNewUser(network){
	if($j('#add_user_id').val()>1){
			btn = $j('#add_new_user');
			loader = $j('#add_user_loader');
			btn.hide();
			loader.show();
			var data = {
				action: 'add_new_user-awesome_ads',
				network: network,
				user_id: $j('#add_user_id').val(),
				user_ads_id: $j('#add_user_ads_id').val(),
				user_cc_id: $j('#add_user_cc_id').val(),
				user_percent: $j('#add_user_percent').val()
			};
			$j.post(ajaxurl, data, function(data) {
				if(data.STATUS == 'ok'){
					window.location.reload();
				}
				else{
					alert('Error');
					btn.show();
					loader.hide();
				}
			}, "json");
		}
}
function deleteUser(id,network){
	if(id>1){
		btn = $j('#delete_user_'+network+id);
		loader = $j('#delete_user_loader'+id);
		btn.hide();
		loader.show();
		var data = {
			action: 'delete_user-awesome_ads',
			user_id: id,
			network: network
		};
		$j.post(ajaxurl, data, function(data) {
			if(data.STATUS == 'ok'){
				window.location.reload();
			}
			else{
				alert('Error');
				btn.show();
				loader.hide();
			}
		}, "json");
	}
}
</script>