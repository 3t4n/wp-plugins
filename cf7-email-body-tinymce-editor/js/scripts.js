window.addEventListener( 'load', e => {
	init_cf7ee_tinyMCE();
}, false );

jQuery( document ).ready(function($){
	$('#wpcf7-mail-use-html, #wpcf7-mail-2-use-html').change(function(event) {
		init_cf7ee_tinyMCE();
	});
});

function init_cf7ee_tinyMCE(){
	tinyMCE.remove();

	var tinymce_elements = [];
	if( jQuery('#wpcf7-mail-use-html').prop('checked') ) tinymce_elements.push('wpcf7-mail-body');
	if( jQuery('#wpcf7-mail-2-use-html').prop('checked') ) tinymce_elements.push('wpcf7-mail-2-body');

	tinyMCE.init({
		mode: 'exact',
		elements: tinymce_elements.join(','),
		menubar: false,
		statusbar: false,
		relative_urls: false,
		remove_script_host: false,
		convert_urls: true,
		plugins: 'charmap,colorpicker,hr,lists,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpautoresize,wpeditimage,wpgallery,wplink,wpdialogs,wptextpattern,wpview',
		preview_styles: 'font-family font-size font-weight font-style text-decoration text-transform',
		skin: 'lightgray',
		theme: 'modern',
		toolbar1: 'formatselect,bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,spellchecker,dfw,wp_adv',
		toolbar2: 'strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help',
		wp_autoresize_on: true,
		wp_keep_scroll_position: true,
		wpautop: true,
		wpeditimage_html5_captions: true
	});
}