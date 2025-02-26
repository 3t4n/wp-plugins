jQuery(document).ready(function($) {
	change_tab();
	get_combo_name();
	get_effects();
	select_snr();
	setTimeout(get_selected,300);
	enable_updatebtn();
	update_selected_combo();
	save_custom();
	display_custom_animations();
	delete_custom();
	get_custom_for_edit();
	update_custom_animation();
	cancel_update();


	//variables
	var id;
	var current_id;

	function change_tab(){
		jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    	});
	}


	function get_combo_name(){
		var t = {action: "GET_NAMES", data: {}};
		jQuery.post(ajaxurl, t, function(t) {
			jQuery.each(t, function(t, n) {
				jQuery("#combinations").append('<option id="combo_'+ n.id + '">'+ n.combo_name + '</option>');
			});
		})

	}

	function get_selected(){
		var x = {action: "GET_SELECTED", data: {}};
		jQuery.post(ajaxurl, x, function (t) {
			if (t.length == 0 || t[0].id == 1)
			{
				alert("No combination selected");
				$("#tab1 *").attr("disabled",true);
				$("#combinations *").attr("disabled",false);
				$("#combinations").attr("disabled",false);
				$("#selectbtn").attr("disabled",false);
			}
			else
			{
					alert("Combination has been loaded");
					
					var img_effect = t[0].img_effect;
					var img_effect_name = t[0].img_effect_name;
					var img_duration = t[0].img_duration;
					var img_delay = t[0].img_delay;
					var img_offset = t[0].img_offset;
					var img_iteration = t[0].img_iteration;
					//DIV
					var div_effect = t[0].div_effect;
					var div_effect_name = t[0].div_effect_name;
					var div_duration = t[0].div_duration;
					var div_delay = t[0].div_delay;
					var div_offset = t[0].div_offset;
					var div_iteration = t[0].div_iteration;
					//DIV
					var p_effect = t[0].p_effect;
					var p_effect_name = t[0].p_effect_name;
					var p_duration = t[0].p_duration;
					var p_delay = t[0].p_delay;
					var p_offset = t[0].p_offset;
					var p_iteration = t[0].p_iteration;
					var combo_name = t[0].combo_name;
					//IMAGE
					$('#combinations option:contains("' + combo_name + '")').prop("selected","true");
					$('#img_effect option:contains("' + img_effect_name + '")').prop("selected","true");
					$("#img_delay").val(img_delay);
					$("#img_offset").val(img_offset);
					//DIV
					$('#div_effect option:contains("' + div_effect_name + '")').prop("selected","true");
					$("#div_delay").val(div_delay);
					$("#div_offset").val(div_offset);
					//DIV
					$('#p_effect option:contains("' + p_effect_name + '")').prop("selected","true");
					$("#p_delay").val(p_delay);
					$("#p_offset").val(p_offset);
			}
		})
	}

	function get_effects(){
		$("#combinations").click(function(){
			var t = $("#combinations option:selected").attr("id");
			id = t.replace("combo_", "");
			if (id != 1){
				$(".tab-content *").attr("disabled",false);
				var n = {action: "GET_SNR", id: id};
				jQuery.post(ajaxurl, n, function (t) {
					//IMAGE
					var img_effect = t[0].img_effect;
					var img_effect_name = t[0].img_effect_name;
					var img_duration = t[0].img_duration;
					var img_delay = t[0].img_delay;
					var img_offset = t[0].img_offset;
					var img_iteration = t[0].img_iteration;
					//DIV
					var div_effect = t[0].div_effect;
					var div_effect_name = t[0].div_effect_name;
					var div_duration = t[0].div_duration;
					var div_delay = t[0].div_delay;
					var div_offset = t[0].div_offset;
					var div_iteration = t[0].div_iteration;
					//DIV
					var p_effect = t[0].p_effect;
					var p_effect_name = t[0].p_effect_name;
					var p_duration = t[0].p_duration;
					var p_delay = t[0].p_delay;
					var p_offset = t[0].p_offset;
					var p_iteration = t[0].p_iteration;
					//IMAGE
					$('#img_effect option:contains("' + img_effect_name + '")').prop("selected","true");
					$("#img_delay").val(img_delay);
					$("#img_offset").val(img_offset);
					//DIV
					$('#div_effect option:contains("' + div_effect_name + '")').prop("selected","true");
					$("#div_delay").val(div_delay);
					$("#div_offset").val(div_offset);
					//DIV
					$('#p_effect option:contains("' + p_effect_name + '")').prop("selected","true");
					$("#p_delay").val(p_delay);
					$("#p_offset").val(p_offset);

				})
			}
			else
			{
				$("#tab1 *").attr("disabled",true);
				$("#combinations *").attr("disabled",false);
				$("#combinations").attr("disabled",false);
				$("#selectbtn").attr("disabled",false);
			}
		})
	}

	function select_snr(){
		$("#selectbtn").click(function(){
			var q = $("#combinations option:selected").attr("id");
			id = q.replace("combo_", "");
			var s = {action: "SELECT_COMBO", id: id};
			 $.post(ajaxurl, s, function(t)
       		 {
       		 	if (t.Type == 'success'){
            		alert("Your project has been updated.");
        		}
        		else
        		{
        			alert("Error");
        		}
        	})
		})
	  	
	}

	function enable_updatebtn()	{
		$("#tab1 *").change(function()
			{
				$("#updatebtn").removeAttr("disabled");
			});
	}


	function update_selected_combo(){
		$("#updatebtn").click(function(){
			var combo_id = $("#combinations option:selected").attr("id");
			var id = combo_id.replace("combo_", "");
			var img_effect = $("#img_effect option:selected").attr("in");
			var img_effect_name = $("#img_effect option:selected").val();
			var img_delay = $("#img_delay").val();
			var img_offset = $("#img_offset").val();
			//alert(img_effect + "," + img_duration + "," + img_delay + "," + img_offset + "," + img_iteration);
			var div_effect = $("#div_effect option:selected").attr("in");
			var div_effect_name = $("#div_effect option:selected").val();
			var div_delay = $("#div_delay").val();
			var div_offset = $("#div_offset").val();
			//alert(div_effect + "," + div_duration + "," + div_delay + "," + div_offset + "," + div_iteration);
			var p_effect = $("#p_effect option:selected").attr("in");
			var p_effect_name = $("#p_effect option:selected").val();
			var p_delay = $("#p_delay").val();
			var p_offset = $("#p_offset").val();
			//alert(p_effect + "," + p_duration + "," + p_delay + "," + p_offset + "," + p_iteration);


			var update_combo = {action: "UPDATE_COMBO", id: id, data: {combo: {img_effect: img_effect,
				img_effect_name: img_effect_name,
				img_delay: img_delay,
				img_offset: img_offset,
				div_effect: div_effect,
				div_effect_name: div_effect_name,
				div_delay: div_delay,
				div_offset: div_offset,
				p_effect: p_effect,
				p_effect_name : p_effect_name,
				p_delay: p_delay,
				p_offset: p_offset
			}}};
			$.post(ajaxurl, update_combo, function(t)
		        {
		          if (t.Type == "success")
		          {
		            alert("Your project has been updated.");
		            $("#updatebtn").attr("disabled","true")
		          } 
		          else
		          {
		            alert("Error");
		          }
		        })
		})
				
	}

	function save_custom()
	{
		$("#custom_animation").click(function(){
			if ($("#custom_class").val() != '')
			{
				var custom_class = $("#custom_class").val();
				var custom_effect = $(".custom_effect option:selected").attr("in");
				var custom_effect_name = $(".custom_effect option:selected").val();
				var custom_delay = $(".custom_delay").val();
				var custom_offset = $(".custom_offset").val();

			//alert(custom_class + ", " + custom_effect + ", " + custom_effect_name + ", " + custom_delay + ", " + custom_offset);

				var save_custom = {action: "SAVE_CUSTOM", data: {custom: {
					custom_class: custom_class,
					custom_effect: custom_effect,
					custom_effect_name: custom_effect_name,
					custom_delay: custom_delay,
					custom_offset: custom_offset
				}}};
				$.post(ajaxurl, save_custom, function(t)
	          	{
	          		$("#custom_class").val("");
	          		$('.custom_effect option:contains("None")').prop("selected","true");
	          		$(".custom_delay").val("");
	          		$(".custom_offset").val("");
	          		$("#custom_table").append('<tr id="'+ t[0].id +'"><td>' + t[0].id + '</td><td>' + t[0].custom_class + '</td><td>' + t[0].custom_effect_name + '</td><td>' + t[0].custom_delay + '</td><td>' + t[0].custom_offset + '</td><td>' + t[0].date_created + '</td><td><button id="edit_'+ t[0].id +'" class="editbtn">EDIT</button><button id="del_'+ t[0].id + '" class="delbtn">DELETE</button></td></tr>')
	          	})
			}
			else
			{
				alert("Class name can not be emptpy");
			}
		})
	}

	function display_custom_animations()
	{
		var display_custom = {action: "DISPLAY_CUSTOM", data: {}};
		$.post(ajaxurl, display_custom, function(t){
			$.each(t, function(t, n){
				$("#custom_table").append('<tr id="' +n.id+ '"><td>' + n.id + '</td><td>' + n.custom_class + '</td><td>' + n.custom_effect_name + '</td><td>' + n.custom_delay + '</td><td>' + n.custom_offset + '</td><td>' + n.date_created + '</td><td><button id="edit_'+ n.id +'" class="editbtn">EDIT</button><button id="del_'+ n.id + '" class="delbtn">DELETE</button></td></tr>')
			})
		})
		
	}

	function delete_custom()
	{
		$(".delbtn").live('click',function(){
			var t = this;
			var raw_id = t.id;
			var the_id = raw_id.replace("del_","");

			var del_custom = {action: "DELETE_CUSTOM", id: the_id};
			$.post(ajaxurl, del_custom, function(){
				$("tr#"+the_id).remove();
			})
		})
	}


	function get_custom_for_edit()
	{
		$(".editbtn").live("click",function()
		{
			var t = this;
			var id = t.id.replace("edit_","");
			var get_for_edit_custom = {action: "GET_CUSTOM_FOR_EDIT", id: id}

			$.post(ajaxurl, get_for_edit_custom, function(t){
				current_id = t[0].id;
				custom_class = t[0].custom_class;
				custom_effect_name = t[0].custom_effect_name;
				custom_delay = t[0].custom_delay;
				custom_offset = t[0].custom_offset;

				$('.custom_effect option:contains("' + custom_effect_name + '")').prop("selected","true")
				$("#custom_class").val(custom_class);
				$(".custom_delay").val(custom_delay);
				$(".custom_offset").val(custom_offset);

				$("#custom_animation").css("display",'none');
				$("#update_animation").css("display",'inline-block');
				$("#cancel_update").css("display",'inline-block');
			})
		})
	}


	function update_custom_animation()
	{
		$("#update_animation").click(function()
		{
			var custom_class = $("#custom_class").val();
			var custom_effect = $(".custom_effect option:selected").attr("in");
			var custom_effect_name = $(".custom_effect option:selected").val();
			var custom_delay = $(".custom_delay").val();
			var custom_offset = $(".custom_offset").val();

			//alert(custom_class + ", " + custom_effect + ", " + custom_effect_name + ", " + custom_delay + ", " + custom_offset);

			var update_custom = {action: "UPDATE_CUSTOM", id: current_id,data: {custom: {
				custom_class: custom_class,
				custom_effect: custom_effect,
				custom_effect_name: custom_effect_name,
				custom_delay: custom_delay,
				custom_offset: custom_offset
			}}};
			$.post(ajaxurl, update_custom, function(t)
			{
				location.reload();
				// $("tr#"+current_id).html('"<td>' + t[0].id + '</td><td>' + t[0].custom_class + '</td><td>' + t[0].custom_effect_name + '</td><td>' + t[0].custom_delay + '</td><td>' + t[0].custom_offset + '</td><td>' + t[0].date_created + '</td><td><button id="edit_'+ t[0].id +'" class="editbtn">EDIT</button><button id="del_'+ t[0].id + '" class="delbtn">DELETE</button></td>"');
				// $("#custom_animation").css("display",'inline-block');
				// $("#update_animation").css("display",'none');
				// $("#cancel_update").css("display",'none');
				// $("#custom_class").val("");
    //       		$('.custom_effect option:contains("None")').prop("selected","true");
    //       		$(".custom_delay").val("");
    //       		$(".custom_offset").val("");
			})
		})
	}

	function cancel_update()
	{
		$("#cancel_update").click(function(){
			$("#custom_animation").css("display",'inline-block');
				$("#update_animation").css("display",'none');
				$("#cancel_update").css("display",'none');
				$("#custom_class").val("");
          		$('.custom_effect option:contains("None")').prop("selected","true");
          		$(".custom_delay").val("");
          		$(".custom_offset").val("");
		})
	}
});