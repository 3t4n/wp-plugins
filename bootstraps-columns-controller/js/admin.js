
jQuery(function($) {

	if(typeof tinymce == 'undefined'){
		return false;
	}

	tinymce.on('addeditor', function( event ) {
		tinymce.get(event.editor.id).on('Focus', function(e) {
			var $bcc_body = $($(this)[0].getBody());
			$bcc_body.find('.bcc-remove-row').on('click', function(event){
				event.stopPropagation();
				if (confirm('Remove this row and all content in it?')) {
					$(this).closest('.row').remove();
				}
			});
		});
	});



	$('#bcc-media-button').click(function(){
		$('body').append('<div class="bcc-popup" />');
		$('body').find('.bcc-popup').append('<div class="bcc-popup-content" />');
		$('body').find('.bcc-popup-content').append('<div class="bcc-popup-close" />');
		$('body').find('.bcc-popup-content').append('<div class="bcc-popup-title" />');
		$('body').find('.bcc-popup-title').append('<p>Insert columns</p>');
		$('body').find('.bcc-popup-title').append('<p class="info">Bootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases.</p>');
		$('body').find('.bcc-popup-title').append('<p class="info">Large devices (large desktops, 1200px and up)<br>Medium devices (desktops, 992px and up)<br>Small devices (tablets, 768px and up)<br>Extra small devices (phones, less than 768px)</p>');


		// Include first col
		$('body').find('.bcc-popup-content').append('<div class="bcc-choose-column" />');
		// First type
		// 1
		bcc_insert_columns('1', 2);
		// 2
		bcc_insert_columns('2', 3);
		// 3
		bcc_insert_columns('3', 4);
		// 4
		bcc_insert_columns('4', 6);
		// Second Type
		//1
		bcc_insert_columns_sec('5', 3, '1');
		//2
		bcc_insert_columns_sec('6', 3, '2');
		//3
		bcc_insert_columns_sec('7', 4, '1');
		//4
		bcc_insert_columns_sec('8', 4, '2');
		//5
		bcc_insert_columns_sec('9', 6, '1');
		//6
		bcc_insert_columns_sec('10', 6, '2');
		// Third type
		// 1
		bcc_insert_columns_third('11', 4, '1');
		// 2
		bcc_insert_columns_third('12', 4, '2');
		// 3
		bcc_insert_columns_third('13', 4, '3');
		// 4
		bcc_insert_columns_third('14', 6, '1');
		// 5
		bcc_insert_columns_third('15', 6, '2');
		// 6
		bcc_insert_columns_third('16', 6, '3');


		$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm').on('click', function(){
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm').removeClass('selected');
			$(this).addClass('selected');
		});

		
		$('body').find('.bcc-popup-content').append('<button class="button button-primary bcc-save-bttn">Insert</button>');
		$('body').find('.bcc-popup-content').append('<div class="clear" />');
		

		$('body').find('.bcc-save-bttn').click(function(){
			var doFunc = true;
			var columnsType;
			var columnsNumber;
			var insertWP = '';
			insertWP += '<div class="bcc-column-cont row mceNonEditable">';
			insertWP += '<span class="bcc-remove-row mceNonEditable">Remove the row</span>';


			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm').each(function(){
				if($(this).hasClass('selected')){
					var bootSum = 12;
					if($(this).index() < 10){
						$(this).find('p').each(function(){
							var txt = $(this).text();
							var txtArr = txt.split("/");
							var firstColB = bootSum / txtArr[1] * txtArr[0];
							var thisInd = $(this).index() + 1;
							insertWP += '<div class="bcc-column col-lg-'+firstColB+' col-md-'+firstColB+' col-sm-12 col-xs-12"><p class="label mceNonEditable">Column: '+thisInd+' </p><p class="block mceNonEditable">&nbsp;</p><p></p></div>';
						});
					}else{
						doFunc = false;
					}
				}
			});

			if(doFunc){
				insertWP += '<div class="clearfix mceNonEditable"></div></div>';
				insertWP += '<br><br>';
				wp.media.editor.insert(insertWP);

				var editor = tinymce.editors[0];
				var $bcc_body_loaded = $(editor.getBody());
				$bcc_body_loaded.find('.bcc-remove-row').on('click', function(){
					if (confirm('Remove this row and all content in it?')) {
						$(this).closest('.row').remove();
					}
				});

				$('body').find('.bcc-popup').remove();
			}
		});

		$('body').find('.bcc-popup-close').click(function(){
			$('body').find('.bcc-popup').remove();
		});
		bcc_middle_popup($('body').find('.bcc-popup-content'));
	});



	function bcc_insert_columns(index, times){
		var columnWidth = 100 / times - 2;
		var timSt = times.toString();
		var text = '';
		if(times == 1){
			text = '1';
		}else{
			text = '1/'+times;
		}
		$('body').find('.bcc-popup-content').find('.bcc-choose-column').append('<div class="bcc-choose-column-itm '+index+'" />');
		for (var i = 0; i < times; i++) {
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+columnWidth+'%;">'+text+'</p>');
		}
	}

	function bcc_insert_columns_sec(index, ind, type){
		var smallCol = 100 / ind - 2;
		var bigCol = 100 - smallCol - 3;

		var txt1 = '1/'+ind;
		var txt2 = ind-1 + '/' + ind;

		$('body').find('.bcc-popup-content').find('.bcc-choose-column').append('<div class="bcc-choose-column-itm '+index+'" />');
		if(type == '1'){
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+smallCol+'%;">'+txt1+'</p>');
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+bigCol+'%;">'+txt2+'</p>');
		}else{
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+bigCol+'%;">'+txt2+'</p>');
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+smallCol+'%;">'+txt1+'</p>');
		}
	}

	function bcc_insert_columns_third(index, ind, type){
		var smallCol = 100 / ind - 2;
		var bigCol = (100 - smallCol*2) - 4;

		var txt1 = '1/'+ind;
		var txt2 = ind-2 + '/' + ind;

		$('body').find('.bcc-popup-content').find('.bcc-choose-column').append('<div class="bcc-choose-column-itm '+index+'" />');
		$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<div class="bcc-get-pro" />');
		$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').find('.bcc-get-pro').append('<a target="blank" href="https://sellfy.com/p/cKS1/">Get PRO Version</a>');
		if(type == '1'){
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+smallCol+'%;">'+txt1+'</p>');
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+smallCol+'%;">'+txt1+'</p>');
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+bigCol+'%;">'+txt2+'</p>');
		}else if(type == '2'){
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+bigCol+'%;">'+txt2+'</p>');
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+smallCol+'%;">'+txt1+'</p>');
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+smallCol+'%;">'+txt1+'</p>');
		}else{
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+smallCol+'%;">'+txt1+'</p>');
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+bigCol+'%;">'+txt2+'</p>');
			$('body').find('.bcc-choose-column').find('.bcc-choose-column-itm.'+index+'').append('<p style="width: '+smallCol+'%;">'+txt1+'</p>');
		}
	}

	function bcc_middle_popup(popup){
		var popupHeight = popup.height();
		if($(window).height() - 150 > popupHeight){
			popup.css('margin-top', -popupHeight/1.8 + 'px');
			popup.css('top', '50%');
		}else{
			popup.css('margin-top', '0');
			popup.css('top', '15%');
		}
	}

});