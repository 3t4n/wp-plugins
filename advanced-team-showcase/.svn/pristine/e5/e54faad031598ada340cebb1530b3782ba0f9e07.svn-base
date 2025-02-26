jQuery(document).ready(function($){ "use strict";

    $( ".atmswc_class2" ).sortable();
    $( ".atmswc_class3" ).sortable();
	$( ".atmswc_cpost_drag" ).sortable();

	$("#atmswc_biography").on('change, keyup', function(){

		var count = 147 - document.getElementById("atmswc_biography").value.length;
		if (count < 0) { document.getElementById("char_count").innerHTML = "<span style=\"color: red;\">" + count + "</span>"; }
		else { document.getElementById("char_count").innerHTML = count; }

		var url = $("#atmswc_web").val();
		if($("#atmswc_web").val() != null ||  $("#atmswc_web").val() != ""){

	        var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	        if (pattern.test(url)){
	            $("#errormsg").html("");
	            return true;

	        } else {

	        	$("#errormsg").html("Invalid Web Address");

	        }

		}

	});


	$("#atmswc_email").on('change, keyup', function(){

		var email =	$("#atmswc_email").val();
		var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if(expr.test(email)){
			$("#emailerror").html(" ");	
			return true;
		}
		else{
			$("#emailerror").html(" Invalid Email Address");	
		}

	});

	$("#atmswc_web").on('change, keyup', function(){

		var email =	$("#atmswc_email").val();
		var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if(expr.test(email)){

			$("#errormsg").html("");
			return true;

		}
		else{
			$("#emailerror").html(" Invalid Email Address");	
		}

		var url = $("#atmswc_web").val();
		if($("#atmswc_web").val() != null ||  $("#atmswc_web").val() != ""){

	        var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	        if (pattern.test(url)){
	        	
	            $("#errormsg").html("");
	            return true;

	        } else {

	        	$("#errormsg").html("Invalid Web Address");

	        }

		}	 	

	});

	$("#img_size").on('change', function(){

		if($("#img_size").val()=="custom"){
			$("#img_size_area").show();
		} else{
			$("#img_size_area").hide();
		}
		
	});

	if($("#img_size").val()=="custom"){

		$("#img_size_area").show();

	} else{

		$("#img_size_area").hide();

	}

	$("#multiple_cat").on('change', function(){
		var selected=[];
	 	$('#multiple_cat :selected').each(function(){
	    	selected.push( $(this).val() );
	    });  			
		$.ajax({
			type: 'POST',
			url: advanced_team_showcase_ajax.advanced_team_showcase_ajaxurl,
			data: { "action": "atmswc_get_post_by_cat","cat_ids":selected},
			success: function(data){
				$(".atmswc_cpost_drag").html(data);
				//alert(data);
			}
		});	

	});


    $('.atmswc_cpost_drag').sortable({
        update: function(event, ui) {

            $('.atmswc_cpost_drag').children().each(function(i) {
                var id = $(this).attr('data-post-id')
                    ,order = $(this).index() + 1;
                
                // Instead of echoing this, build a real array
                $('#console').html($('#console').html() + 'posts[' + id + '] = ' + order + '<br>');
                
                // Then do an ajax request to send the array
                // Update order fields from posts in db
                /*
                $.ajax('url', {
                    data: //posts array
                });
                */
            });

        }
    });	

});


