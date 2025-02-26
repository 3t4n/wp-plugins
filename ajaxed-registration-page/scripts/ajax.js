// Please Don't edit this page
jQuery(document).ready(function($){
  $('#register_btn').click(function(){

	$('#messages').hide(1000);  
    var username=$('#your_username').val();
     var email=$('#your_email').val();
	 var pass=$('#your_password').val();
	 var pass_2=$('#your_password_2').val();
	 var btnclicked='1';
    $.post(panaregurl.ajaxurl,{action : 'pana_reg',PanaRegNonce : panaregurl.PanaRegNonce,"your_username":username,"your_email":email,"your_password":pass,"your_password_2":pass_2,'register':btnclicked},function(data){ 
	//alert(data);
$('#messages').show(1000,function(){
		$(this).html(data);
		
	}); 
	
	});
   
    });
  });
