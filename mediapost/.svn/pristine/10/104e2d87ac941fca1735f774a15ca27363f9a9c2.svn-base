jQuery(document).ready(function($) {

	/*
	 * Carrega os valores padrões dos inputs de personalização
	 */
	jQuery( "#mpwp_form_title" ).val( jQuery( ".mpwp_form_title" ).html() );
	jQuery( "#mpwp_form_description" ).val( jQuery( ".mpwp_form_description" ).html() );
	jQuery( "#mpwp_form_email_type" ).val( jQuery( ".mpwp_form_email_type" ).html() );
	jQuery( "#mpwp_form_submit_text" ).val( jQuery( "#formPreview input[type='submit']" ).val() );
	
	/*
	 * Troca as informações do modelo de formulário selecionado
	 */
	var data = {
		'action': 'mpwp_forms_load_forms_models'
	};

	jQuery.post(ajaxurl, data, function(response) {

		var models = jQuery.parseJSON( response );
		
		jQuery( ".model" ).click(function() {
			jQuery( "#formFinal"   ).html( models[jQuery( this ).val()]['code'] );
			jQuery( "#formPreview" ).html( models[jQuery( this ).val()]['code'] );
			
			jQuery( "#mpwp_form_background_color" ).val( rgb2hex( jQuery( ".mpwp_form" ).css( "background-color" ) ) );
			jQuery( "#mpwp_form_text_color" ).val( rgb2hex( jQuery( ".mpwp_form" ).css( "color" ) ) );
			jQuery( "#mpwp_form_title_color" ).val( rgb2hex( jQuery( ".mpwp_form_title" ).css( "color" ) ) );
			jQuery( "#mpwp_form_submit_text_color" ).val( rgb2hex( jQuery( "#formPreview input[type='submit']" ).css( "color" ) ) ) ;
			jQuery( "#mpwp_form_submit_background" ).val( rgb2hex( jQuery( "#formPreview input[type='submit']" ).css( "background-color" ) ) );
			jQuery( "#mpwp_form_title" ).val( jQuery( ".mpwp_form_title" ).html() );
			jQuery( "#mpwp_form_description" ).val( jQuery( ".mpwp_form_description" ).html() );
			jQuery( "#mpwp_form_email_type" ).val( jQuery( ".mpwp_form_email_type" ).html() );
			jQuery( "#mpwp_form_submit_text" ).val( jQuery( "#formPreview input[type='submit']" ).val() );
		});

		function rgb2hex( rgb ) {
			rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
		}
		function hex( x ) {
			var hexDigits = new Array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");
			return isNaN( x ) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
		}

	});
	
	/*
	 * Personaliza o formulário
	 */
	jQuery( ".mpwp_change_apparence" ).on('keyup', function () {
		updatePreview();
	});

	/*
	 * Seleciona automaticamente um conteúdo quando clicado
	 */
	jQuery( ".selectContent" ).on("click", function () {
		jQuery(this).select();
	});
	
	/*
	 * ColorPicker Plugin
	 */
	jQuery('#mpwp_form_background_color, #mpwp_form_text_color, #mpwp_form_title_color, #mpwp_form_submit_text_color, #mpwp_form_submit_background').mpwpColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			jQuery(el).val("#" + hex);
			jQuery(el).ColorPickerHide();
			updatePreview();
		},
		onBeforeShow: function () {
			jQuery(this).ColorPickerSetColor(this.value.replace('#',''));
		},
		onChange: function (hsb, hex, rgb, el) {
			jQuery(el).val("#" + hex);
			updatePreview();
		}
	}).bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value.replace('#',''));
	});
	
	/*
	 * Função para atualizar a prévia do formulário
	 */
	function updatePreview(){
		jQuery( ".mpwp_form" ).css( "background-color", jQuery( "#mpwp_form_background_color" ).val() );
		jQuery( ".mpwp_form" ).css( "color", jQuery( "#mpwp_form_text_color" ).val() );
		jQuery( ".mpwp_form_title" ).html( jQuery( "#mpwp_form_title" ).val() );
		jQuery( ".mpwp_form_title" ).css( "color", jQuery( "#mpwp_form_title_color" ).val() );
		jQuery( ".mpwp_form_description" ).html( jQuery( "#mpwp_form_description" ).val() );
		jQuery( ".mpwp_form_email_type" ).html( jQuery( "#mpwp_form_email_type" ).val() );
		jQuery( "#formPreview input[type='submit']" ).val( jQuery( "#mpwp_form_submit_text" ).val() );
		jQuery( "#formPreview input[type='submit']" ).css( "color", jQuery( "#mpwp_form_submit_text_color" ).val() );
		jQuery( "#formPreview input[type='submit']" ).css( "background-color", jQuery( "#mpwp_form_submit_background" ).val() );
		
		updateForm();
	}
	
	/*
	 * Função para copiar a prévia do formulário para ser salvo como a versão final
	 */
	function updateForm(){
		jQuery( "#formFinal" ).html( jQuery( "#formPreview" ).html() );
	}
	
	/*
	 * Fixa a prévia do formulário quando rolada a página
	 */
	jQuery(window).scroll(function(){
		var sticky = jQuery('.sticky'), scroll = jQuery(window).scrollTop();

		if (scroll >= 450) sticky.addClass('mpwp_preview');
		else sticky.removeClass('mpwp_preview');
	});

	/*
	 * Atualiza a prévia do formulário quando alterado qualquer elemento na edição de HTML
	 */
	jQuery( "#form_content" ).on('keyup', function () {
		jQuery( "#formPreview" ).html( jQuery( "#form_content" ).val() );
	});
});