
function checkEMail(email) { 
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

var lang='';
var syllabus='';
var software='';

function t4u_BringSyllabus() { 
	lang=document.getElementById('t4u_course_language').value;
	
	jQuery('#tr_t4u_syllabus').hide();
	jQuery('#tr_t4u_software').hide();
	jQuery('#tr_t4u_category').hide();
	jQuery('#tr_t4u_prog_version').hide();
	jQuery('#tr_t4u_practice_files').hide();
	jQuery('#tr_t4u_queries').hide();	
	jQuery('.t4u-videos-box').hide();

	if (lang == ''){
		return;
	}

	jQuery('.t4u-select-box').prop('disabled', true);

	var data = {
		"action": "t4u_BringSyllabus",
		"lang":  	lang,
		"post_id": this_post_id,
		"_wpnonce": t4u_nonce
	};

	jQuery.post(ajaxurl, data, function(response) {
		response=response.data;
		
		jQuery('.t4u-select-box').prop('disabled', false);
		
		if (response.success && response.data){
			var data = response.data;
			
			jQuery('#t4u_course_syllabus').html('<option value=""> </option>');
			jQuery('#tr_t4u_syllabus').show();

			for (var key in data) {
				if (!data.hasOwnProperty(key)) continue;
				
				var obj = data[key];

				jQuery('#t4u_course_syllabus').append(jQuery('<option>', { value : obj.id }).text(obj.title));
			}
			
			var selected = jQuery('#t4u_course_syllabus').data('selected');
			jQuery('#t4u_course_syllabus option[value="'+selected+'"]').attr('selected','selected');

			var syllabus=document.getElementById('t4u_course_syllabus').value;
			

			if (syllabus!=''){
				t4u_BringSoftware();
				jQuery('#tr_t4u_software').show();
			}
			else{
				jQuery('#tr_t4u_software').hide();
				jQuery('.t4u-videos-box').hide();
				jQuery('#tr_t4u_practice_files').hide();
				jQuery('#tr_t4u_queries').hide();
			}
			
		}
		else if (response.data && response.data.message && response.data.message.length>0){
			
		}
		else{
			
		}
	});
}

function t4u_BringSoftware() { 
	lang=document.getElementById('t4u_course_language').value;
	syllabus=document.getElementById('t4u_course_syllabus').value;

	jQuery('#tr_t4u_software').hide();
	jQuery('#tr_t4u_category').hide();
	jQuery('#tr_t4u_prog_version').hide();
	jQuery('#tr_t4u_practice_files').hide();
	jQuery('#tr_t4u_queries').hide();
	jQuery('.t4u-videos-box').hide();

	if (syllabus == ''){
		return;
	}

	jQuery('.t4u-select-box').prop('disabled', true);

	var data = {
		"action": "t4u_BringSoftware",
		"lang":  	lang,
		"syllabus": syllabus,
		"post_id":this_post_id,
		"_wpnonce": t4u_nonce
	};

	jQuery.post(ajaxurl, data, function(response) {
		response=response.data;
		
		jQuery('.t4u-select-box').prop('disabled', false);
		
		if (response.success && response.data){
			var data = response.data;
			
			jQuery('#t4u_course_software').html('<option value=""> </option>');
			jQuery('#tr_t4u_software').show();

			for (var key in data) {
				if (!data.hasOwnProperty(key)) continue;
				
				var obj = data[key];

				jQuery('#t4u_course_software').append(jQuery('<option>', { value : obj.id }).text(obj.title));
			}
			
			var selected = jQuery('#t4u_course_software').data('selected');
			jQuery('#t4u_course_software option[value="'+selected+'"]').attr('selected','selected');

			var software=document.getElementById('t4u_course_software').value;
			
			
		

			if (software!=''){
				BringVersions();
				jQuery('#tr_t4u_category').show();
			}
			else{
				jQuery('#tr_t4u_category').hide();
				jQuery('.t4u-videos-box').hide();
				jQuery('#tr_t4u_practice_files').hide();
				jQuery('#tr_t4u_queries').hide();
			}
			
		}
		else if (response.data && response.data.message && response.data.message.length>0){
			
		}
		else{
			
		}
	});
}



function BringVersions() { 
	lang=document.getElementById('t4u_course_language').value;
	syllabus=document.getElementById('t4u_course_syllabus').value;
	software=document.getElementById('t4u_course_software').value;
	version=document.getElementById('t4u_course_prog_version').value;												  

	jQuery('#tr_t4u_prog_version').hide();
	jQuery('#tr_t4u_category').hide();							   
	jQuery('#tr_t4u_practice_files').hide();
	jQuery('#tr_t4u_queries').hide();
	
	jQuery('.t4u-videos-box').hide();

	if (software == ''){
		return;
	}

	jQuery('.t4u-select-box').prop('disabled', true);

	var data = {
		"action": "t4u_BringVersions",
		"lang":  	lang,
		"syllabus": syllabus,
		"software": software,
		"post_id":this_post_id,
		"_wpnonce": t4u_nonce
	};

	jQuery.post(ajaxurl, data, function(response) {
		response=response.data;
		
		jQuery('.t4u-select-box').prop('disabled', false);
				
		if (response.success && response.data){
			var data = response.data;

			jQuery('#t4u_course_prog_version').html('<option value="" selected></option>');	
			jQuery('#tr_t4u_prog_version').show();
			
			for (var key in data) {
				console.log(key);
				if (!data.hasOwnProperty(key)) continue;
				
				var obj = data[key];

				jQuery('#t4u_course_prog_version').append(jQuery('<option>', { value : obj.id }).text(obj.title));
			}
			var selected = jQuery('#t4u_course_prog_version').data('selected');
			jQuery('#t4u_course_prog_version option[value="'+selected+'"]').attr('selected','selected');

			var version=document.getElementById('t4u_course_prog_version').value;

			
			if (version!=''){
				BringCategories();
				jQuery('.t4u-videos-box').show();
			}
			else{
				jQuery('.t4u-videos-box').hide();
			}
		}
		else if (response.data && response.data.message && response.data.message.length>0){
			
		}
		else{
			
		}
	});
}
function BringCategories() { 
						   
	lang=document.getElementById('t4u_course_language').value;
	syllabus=document.getElementById('t4u_course_syllabus').value;
	software=document.getElementById('t4u_course_software').value;
	version=document.getElementById('t4u_course_prog_version').value;
	
	jQuery('#t4u_course_category').html('<option value="" selected></option>');	

									   
	jQuery('#tr_t4u_category').hide();
	jQuery('#tr_t4u_practice_files').hide();
	jQuery('#tr_t4u_queries').hide();	
	jQuery('.t4u-videos-box').hide();

	if (version == ''){
		return;
	}

	jQuery('.t4u-select-box').prop('disabled', true);

	var data = {
		"action": "t4u_BringCategories",
		"lang":  	lang,
		"syllabus": syllabus,
		"software": software,
		"version": version,
		"post_id":this_post_id,
		"_wpnonce": t4u_nonce
	};

	jQuery.post(ajaxurl, data, function(response) {
		response=response.data;
		
		jQuery('.t4u-select-box').prop('disabled', false);
				
		if (response.success && response.data){
			if (response.data.categories && response.data.categories.length > 0){
				jQuery('#t4u_course_category').html('<option value="" selected>All categories</option>');	
				jQuery('#tr_t4u_category').show();
				
				var categories = response.data.categories;
						  
					 
											
				
				for (var key in categories) {
					if (!categories.hasOwnProperty(key)) continue;
					
					var obj = categories[key];

					jQuery('#t4u_course_category').append(jQuery('<option>', { value : obj.id }).text(obj.descr));
				}
				var selected = jQuery('#t4u_course_category').data('selected');
				jQuery('#t4u_course_category option[value="'+selected+'"]').attr('selected','selected');

				var category=document.getElementById('t4u_course_category').value;
	
				jQuery('#t4u_course_category').css('max-width', $(window).width()/2+'px');

				jQuery('#tr_t4u_practice_files').show();
				jQuery('#tr_t4u_queries').show();
				
				if (category!=''){
					BringVideos();
					jQuery('.t4u-videos-box').show();
				}
				else{
					jQuery('.t4u-videos-box').hide();
				}
			}
		}
		else if (response.data && response.data.message && response.data.message.length>0){
			
		}
		else{
			
		}
	});
}

function BringVideos() {
	lang=document.getElementById('t4u_course_language').value;
	syllabus=document.getElementById('t4u_course_syllabus').value;
	software=document.getElementById('t4u_course_software').value;
	category=document.getElementById('t4u_course_category').value;
	version=document.getElementById('t4u_course_prog_version').value;

	if (category == '' || category == 'all'){
		jQuery('.t4u-videos-box').hide();
		return;
	}

	jQuery('.t4u-select-box').prop('disabled', true);

	var data = {
		"action": "t4u_BringVideos",
		"lang":  	lang,
		"syllabus": syllabus,
		"software": software,
		"category": category,
		"version": version,
		"post_id":this_post_id,
		"_wpnonce": t4u_nonce
	};

	jQuery.post(ajaxurl, data, function(response) {
		response=response.data;
		
		jQuery('.t4u-select-box').prop('disabled', false);
		if (response.success && response.data){
			if (response.data.videos && response.data.videos.length > 0){
				
				var videos = response.data.videos;
				
				var $table = jQuery('#t4u-videos-table');
				jQuery('.t4u-video-row').remove();

				for (var key in videos) {
					if (!videos.hasOwnProperty(key)) continue;
					
					var obj = videos[key];

					$tr = jQuery('<tr class="t4u-video-row"></tr>');
					var html='';
					html += '<td style="text-align:center">';
					html += '<input class="t4u-select-video-chk" type="checkbox" name="q_'+obj.qid+'" id="q_'+obj.qid+'" '+(typeof obj.sel != 'undefined' && obj.sel?'checked':'')+'/>';
					html += '</td><td>';
					html += '<a href="https://www.youtube.com/watch?v='+obj.youtubeid+'" target="_blank"><img width="200" height="117" src="http://i.ytimg.com/vi/'+obj.youtubeid+'/hqdefault.jpg" /></a>';
					html += '<td><label for="q_'+obj.qid+'">'+obj.question_text+'</label></td>'
					html += '<td><button id="btn_'+obj.qid+'" data-qid="'+obj.qid+'" data-category="'+obj.category+'" class="button course-notes-btn" onclick="return false;">Add notes</button></td>'
					html += '<td>'+obj.qid+'</td>'
					$tr.html(html)
					$table.append($tr);
					
				}
				jQuery('.t4u-videos-box').show();
				
				//jQuery('#q_check_all').prop('checked', true);
				//jQuery('.t4u-select-video-chk').prop('checked', true);
				jQuery('.course-notes-btn').click(function(){
					AddVideoNotes(jQuery(this).data('qid')); 
				});
				
			}
		}
		else if (response.data && response.data.message && response.data.message.length>0){
			
		}
		else{
			
		}
	});
}
var theNode=null;

function AddVideoNotes(qid){
	var tinymce = tinyMCE.activeEditor;

	var content = tinymce.getContent();
	if (content.indexOf('[course_note note="'+qid+'"]') == -1){
		tinymce.setContent(content + '[course_note note="'+qid+'"] Add some notes for this course here... [/course_note]');
	}
	else{
		theNode=null
		FindNodeWithText(tinymce.dom.doc.children, 'note="'+qid+'"');

		if (theNode!=null){
			tinymce.selection.select(theNode);
		}
	}

	var $e = jQuery('.mce-tinymce div').find('iframe');



	return false;
}

function FindNodeWithText(node, text){
	if (theNode!=null) return;

	for(i=0; i<node.length;i++){
		if (jQuery.trim(node[i].innerText).indexOf(jQuery.trim(text))>=0){
			theNode=node[i];
			return;
		}
		if (node[i]!= null && node[i].nodeName != 'HEAD' && node[i].children.length>0){
			FindNodeWithText(node[i].children, text);
		}
	}
}
jQuery(document).ready(function(){
	if (document.getElementById('t4u_course_syllabus') != null && document.getElementById('t4u_course_syllabus').length > 0){
		lang=document.getElementById('t4u_course_language').value;
		syllabus=document.getElementById('t4u_course_syllabus').value;
		software=document.getElementById('t4u_course_software').value;


		if (lang!=''){
			t4u_BringSyllabus();
		}
		jQuery('#q_check_all').change(function(){
			jQuery('.t4u-select-video-chk').prop('checked',jQuery(this).prop('checked'));
		});

	}
});

