var $ = jQuery.noConflict();

$(function(){
	$intval = '0.00';
	$('#ws_alido_in').val($intval);
	$('#ws_alido_out_s').val($s_base);
	$('#ws_alido_out_l').val($l_base);
	
	$('#ws_alido_out_sa').attr('href',$s_base);
	$('#ws_alido_out_la').attr('href',$l_base);
	
	$('#ws_alido_buttonS').bind('change',function(){
		$('#ws_alido_button').attr('src', $imgurl + '/' + $(this).val());
	});
	
});


//-----------------------------------------------------------------------
//FUNCTIONS 
//-----------------------------------------------------------------------
function ws_alido_generateLink(){
	var $in    = document.getElementById('ws_alido_in');
	var $out_s = document.getElementById('ws_alido_out_s');
	var $out_l = document.getElementById('ws_alido_out_l');
	
	num = $in.value = parseFloat($in.value).toFixed(2);
	
	num = ( num == 'NaN' || num == '0.00' || num<0 )?'':'='+num;

	$out_l.value = $l_base + num;
	$out_s.value = $s_base + num;
	
	$('#ws_alido_out_sa').attr('href',$s_base + num);
	$('#ws_alido_out_la').attr('href',$l_base + num);
		
}
