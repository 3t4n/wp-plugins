	/* this is our js file */


	 jQuery(document).on('click',".deleteclient",function(){

			var conf = confirm("Are Sure want to Delete This Client ?");
			if(conf){
	    	var client_id	= jQuery(this).attr("data-id");
	    	var clientpostdata = "action=myserviceslib&param=delete_clientdata&id="+client_id;
				jQuery.post(myservicesajaxurl,clientpostdata,function(response){
					
						var data = jQuery.parseJSON(response);
						console.log(data.status);
						if(data.status==1){
							jQuery.notifyBar({
								cssClass:"success",
								html:data.message

							});
							setTimeout(function(){
								//window.location.href = 'admin.php?page=my-services';
								location.reload();
							},200)

						}else{

						}
				});
			}
	    });

	jQuery(document).ready(function() {


	    jQuery('#servicesimage').on('click',function(){
	    var image = wp.media({
	    	title: "Upload Services image",
	    	multiple:false
	    }).open().on("select",function(){
	    	var uploaded_image = image.state().get("selection").first();
	    		var serviceimages = uploaded_image.toJSON().url;
	    		jQuery('#imgservec').html("<img src="+serviceimages+" style='width:200px;height:200px;'/>");
	    		jQuery("#image_name").val(serviceimages);

	    });
	    });

	     jQuery('#servicsdocfilee').on('click',function(){
	    var image = wp.media({
	    	title: "Upload Services Doc",
	    	multiple:true
	    }).open().on("select",function(){

	 var attachment = image.state().get("selection").first();
	    		var servicedocs = attachment.toJSON().url;
	    		jQuery('#docservec').html("<embed src="+servicedocs+" style='width:100px;height:100px;'/>");
	    		jQuery("#docfille_name").val(servicedocs);

	    }); 
	    });

	jQuery('#servicsdocfilee1').on('click',function(){
	    var image = wp.media({
	    	title: "Upload Services Doc 1",
	    	multiple:true
	    }).open().on("select",function(){

	 var attachment1 = image.state().get("selection").first();
	    		var servicedocs1 = attachment1.toJSON().url;
	    		jQuery('#docservec1').html("<embed src="+servicedocs1+" style='width:100px;height:100px;'/>");
	    		jQuery("#docfille_name1").val(servicedocs1);
});
});

	jQuery('#servicsdocfilee2').on('click',function(){
	    var image = wp.media({
	    	title: "Upload Services Doc 2",
	    	multiple:true
	    }).open().on("select",function(){

	 var attachment2 = image.state().get("selection").first();
	    		var servicedocs2 = attachment2.toJSON().url;
	    		jQuery('#docservec2').html("<embed src="+servicedocs2+" style='width:100px;height:100px;'/>");
	    		jQuery("#docfille_name2").val(servicedocs2);
});
});

	jQuery('#servicsdocfilee3').on('click',function(){
	    var image = wp.media({
	    	title: "Upload Services Doc 3",
	    	multiple:true
	    }).open().on("select",function(){

	 var attachment3 = image.state().get("selection").first();
	    		var servicedocs3 = attachment3.toJSON().url;
	    		jQuery('#docservec3').html("<embed src="+servicedocs3+" style='width:100px;height:100px;'/>");
	    		jQuery("#docfille_name3").val(servicedocs3);
});
});

	jQuery('#servicsdocfilee4').on('click',function(){
	    var image = wp.media({
	    	title: "Upload Services Doc 4",
	    	multiple:true
	    }).open().on("select",function(){

	 var attachment4 = image.state().get("selection").first();
	    		var servicedocs4 = attachment4.toJSON().url;
	    		jQuery('#docservec4').html("<embed src="+servicedocs4+" style='width:100px;height:100px;'/>");
	    		jQuery("#docfille_name4").val(servicedocs4);
});
});



	    jQuery('#my-services').DataTable();

	    jQuery(document).on('click',".deleteservices",function(){
			var conf = confirm("Are Sure want to Delete This Service ?");
			if(conf){
	    	var servies_id	= jQuery(this).attr("data-id");
	    	var servicepostdata = "action=myserviceslib&param=delete_servicedata&id="+servies_id;
				jQuery.post(myservicesajaxurl,servicepostdata,function(response){
					
						var data = jQuery.parseJSON(response);
						console.log(data.status);
						if(data.status==1){
							jQuery.notifyBar({
								cssClass:"success",
								html:data.message

							});
							setTimeout(function(){
								//window.location.href = 'admin.php?page=my-services';
								location.reload();
							},200)

						}else{

						}
				});
			}
	    });

	    jQuery('#addServices').validate({

			submitHandler:function(){

				var addservicepostdata = "action=myserviceslib&param=save_servicedata&"+jQuery('#addServices').serialize();
				jQuery.post(myservicesajaxurl,addservicepostdata,function(response){
					
						var data = jQuery.parseJSON(response);
						
						//console.log(addservicepostdata);

						//exit();

						console.log(data.status);
						if(data.status==1){
							jQuery.notifyBar({
								cssClass:"success",
								html:data.message

							});
							setTimeout(function(){
								//window.location.href = 'admin.php?page=my-services';
								location.reload();
							},200)
						}else{

						}
				});
				}
		});

		jQuery('#updateServices').validate({

			submitHandler:function(){

				var servicepostdata = "action=myserviceslib&param=edit_servicedata&"+jQuery('#updateServices').serialize();
				jQuery.post(myservicesajaxurl,servicepostdata,function(response){
					
						var data = jQuery.parseJSON(response);
						//console.log(data.status);
						if(data.status==1){
							jQuery.notifyBar({
								cssClass:"success",
								html:data.message

							});
							setTimeout(function(){
								window.location.href = 'admin.php?page=my-aio-services';
								//location.reload();
							},200)

						}else{

						}
				});

			}

		});



	 jQuery('#addclients').validate({

			submitHandler:function(){

				var clientpostdata = "action=myserviceslib&param=save_clientdata&"+jQuery('#addclients').serialize();
				jQuery.post(myservicesajaxurl,clientpostdata,function(response){
					
						var data = jQuery.parseJSON(response);
						console.log(data.status);
						if(data.status==1){
							jQuery.notifyBar({
								cssClass:"success",
								html:data.message

							});
							setTimeout(function(){
								//window.location.href = 'admin.php?page=my-services';
								location.reload();
							},500)
						}else{

						}
				});
				}
		});

	 
	  jQuery('#addaccessuser').validate({

			submitHandler:function(){

				var useraccesscreat = "action=myserviceslib&param=save_accessuserdata&"+jQuery('#addaccessuser').serialize();
				jQuery.post(myservicesajaxurl,useraccesscreat,function(response){
					
						var data = jQuery.parseJSON(response);
						console.log(data.status);
						if(data.status==1){
							jQuery.notifyBar({
								cssClass:"success",
								html:data.message

							});
							setTimeout(function(){
								//window.location.href = 'admin.php?page=my-services';
								location.reload();
							},100)
						}else{

						}
				});
				}
		});

	   jQuery(document).on('click',".deleteaccebleuser",function(){

			var conf = confirm("Are Sure want to Delete This User ?");
			if(conf){
	    	var client_id	= jQuery(this).attr("data-id");
	    	var client_useraccesseble = "action=myserviceslib&param=delete_useraccessdata&user_login_id="+client_id;
				jQuery.post(myservicesajaxurl,client_useraccesseble,function(response){
					
						var data = jQuery.parseJSON(response);
						console.log(data.status);
						if(data.status==1){
							jQuery.notifyBar({
								cssClass:"success",
								html:data.message

							});
							setTimeout(function(){
								//window.location.href = 'admin.php?page=my-services';
								location.reload();
							},200)

						}else{

						}
				});
			}
	    });

	    jQuery(document).on('click',".deletesevicesacess",function(){

			var conf = confirm("Are Sure want to Delete This Track Data ?");
			if(conf){
	    	var client_id	= jQuery(this).attr("data-id");
	    	var client_useraccesseble = "action=myserviceslib&param=delete_serviceaccessdata&id="+client_id;
				jQuery.post(myservicesajaxurl,client_useraccesseble,function(response){
					
						var data = jQuery.parseJSON(response);
						console.log(data.status);
						if(data.status==1){
							jQuery.notifyBar({
								cssClass:"success",
								html:data.message

							});
							setTimeout(function(){
								//window.location.href = 'admin.php?page=my-services';
								location.reload();
							},100)

						}else{

						}
				});
			}
	    });

	});




