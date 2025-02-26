(function( $ ) {
	"use strict";
	function acb_sp_js_code_fixup(value){
		if(value==null)return value;
		value=value.toString();
		if(value.length==0)return value;
		value=value.replace(/\<\/script.*/s,'');
		if(value.includes(';'))return value;
		if(/^\s*(?:\/\*(?:.*?)\*\/\s*)*(?:\Z|\/\/[^\r\n]*\Z)/s.test(value))return value;
		let mm=value.match(/^\s*(?:\/\*(?:.*?)\*\/\s*)*return\s(?:[^\r\n]*?\/\/|.*)/s);
		if(mm && mm[0])	return mm[0] + ';' + value.substr(mm[0].length);
		return 'return ' +  value + ';';	
	}
	$('document').ready(function() {
		$('tr.acb_sp_submit_button_type input').val('');
		$("input[type=submit]").click(function(e) {
			let frm=this.parentNode;
			while(frm && frm.tagName!='FORM')frm=frm.parentNode;
			if(!frm)return;
			let tfld=frm.querySelector('tr.acb_sp_submit_button_type input');
			if(!tfld)return;
			tfld.value=this.id;
		});
		$("#fields_for_acb_sp_options_js input#acb_sp_submit_run").click(function(e) {
			let frm=this.parentNode;
			while(frm && frm.tagName!='FORM')frm=frm.parentNode;
			if(!frm)return;
			let tfld=frm.querySelector('tr.acb_sp_field textarea#acb_sp_js_code');
			if(!tfld)return;
			let rfld=frm.querySelector('tr.acb_sp_js_result input');
			if(!rfld)return;
			let result='Fatal error evaluating javascript expression';
			rfld.value = result;
			try {
				let cr='(function($) {' + acb_sp_js_code_fixup(tfld.value) + '\r\n})(jQuery)';
				result = eval(cr);
			} catch(ex) {
				result = {'Fatal Error' : ex.message };
			} finally {
				rfld.value = (result!=null)?JSON.stringify(result):'';
			}	
		});
		$('.acb_sp_notice_container div.notice').addClass('below-h2');
		$('.acb_sp_scrollToHere').first().each(function(){
			this.scrollIntoView();
			window.scrollBy(0,-32);
		})
		if(CodeMirror) {
			$('textarea[data-mime-type]').each(function(){
				let mode=this.dataset.mimeType;
				CodeMirror.fromTextArea(this, {
  				lineNumbers: true,
   				mode: mode
				});
			})
		}
	});
	
})(jQuery);
