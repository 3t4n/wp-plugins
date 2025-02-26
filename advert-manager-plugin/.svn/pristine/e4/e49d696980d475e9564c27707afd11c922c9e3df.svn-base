$(function(){
		var btnUpload=$('#upload_button');
		var status=$('#status_message');
		var targeted = $('#upload_button').attr('alt');
		new AjaxUpload(btnUpload, {
			action: targeted+'upload-file.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
			status.text('Uploading...');
			},
			onComplete: function(file, response){
			status.text('');
				if(response==="success"){
				$('#files_list').html(targeted+'uploads/'+file).addClass('success');
				$('<p></p>').appendTo('#imgshow').html('<img src="'+targeted+'/uploads/'+file+'" id="cropbox" alt="" /><br />');
				$('<p></p>').appendTo('#p').html(file).addClass('success');
				} else{
				$('<p></p>').appendTo('#p').text(file).addClass('error');
			}
		}
	});	
});
$(function(){
	$(".tablebot").hide();
	$(".aview").click(function(){
		$('.tabletop').hide(); $(".tablebot").show();
	});
	$(".anew").click(function(){
		$('.tabletop').show(); $(".tablebot").fadeOut();
	});
	$("#imgshow").click(function(){$(this).fadeOut(); } );
	$(".saveadvert").click(function(){
		var t = $(this).attr("alt");
		var a = $("textarea#files_list").val();
		var b = $("textarea#advert_desc").val();
		var c = $('select#advert_title option:selected').val();  
		var d = $('input#advert_url').val();
		var e = $('textarea#advert_gettitle').val();
		if(a=='' || b=='' || c=='' || d==''){
			alert('Please fill the required fields'); return false;
		}else{
			$.post(t+"saveadvert.php", { a:a,b:b,c:c,d:d,e:e },
		   function(data){
				alert(data);
				window.location.reload();
			});	   
		}
	})
});
$(function(){
$('.aclickmanage').click(function(){
		var id = $(this).attr('alt');
		var act = $(this).attr('eact');
		var t = $(this).attr('etar');	
		var sva = $(this).attr('setvalu');
		$.post(t+"manage_advert.php", { setid:id,setaction:act,setv:sva },
		   function(data){
				alert(data);
				window.location.reload();
			});	   
	});
});
