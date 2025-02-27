document.getElementsByClassName('eos-dp-btn-wrp')[0].getElementsByClassName('button')[0].addEventListener('click',function(e){
	fdp_save_options(this);
});
function fdp_save_options(btn){
	var data = {},
		opts = document.getElementsByClassName('fdp-opt');
	btn.className = btn.className.replace(' eos-dp-progress','') + ' eos-dp-progress';
	for(idx in opts){
		if('undefined' !== typeof(opts[idx].id) && '' !== opts[idx].value){
			var row = eos_dp_closest_tagname(opts[idx],'tr'),
				off = row ? row.getElementsByClassName('eos-dp-off') : false;
			if(off && off.length > 0){
				data[opts[idx].id + '_off'] = 'true';
			}
			data[opts[idx].id] = row ? {'value' : opts[idx].value,'plugins' : eos_dp_plugins_row(row)} : opts[idx].value;
		}
	}
	if('undefined' !== typeof(fdp_setts_js) && 'undefined' !== typeof(fdp_setts_js.opts_key)){
		data['opts_key'] = fdp_setts_js.opts_key;
	}
	data['nonce'] = document.getElementById('fdp_setts_nonce').value;
	var xhr = fdp_setts_sendData(data,fdp_setts_js.action);
	xhr.onload = function(){
		if('1' !== xhr.response){
			alert('Something went wrong during the saving process.');
		}
		btn.className = btn.className.replace(' eos-dp-progress','');
	}
}
function fdp_setts_sendData(data,action){
	var xhr = new XMLHttpRequest(),fd = new FormData();
	fd.append('data',JSON.stringify(data));
	xhr.open("POST",fdp_setts_js.ajaxurl + '?action=' + action,true);
	xhr.send(fd);
	return xhr;
}
function fdp_validate_email(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
