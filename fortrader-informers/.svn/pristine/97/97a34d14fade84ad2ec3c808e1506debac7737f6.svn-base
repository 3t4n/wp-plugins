var FtInformersAddEditWidget;
!function( $ ) {
	FtInformersAddEditWidget = function( options ) {
		var self = {
			windowLoaded:false,
			generatedInformerUrl: false,
			previewTopOffsetBox: false,
			init: function(){

				self.$wrapper = $('.addEditWrapper');
				self.$selectLang = self.$wrapper.find('.informerLang');
				self.$form = self.$wrapper.find('form');
				self.$selectLang.val('-1');
				self.$informerTitle = self.$wrapper.find('.informerTitle');
				self.$generatedSettingsWrap = self.$wrapper.find('.generatedSettings');
				self.$previewInformer = self.$wrapper.find('.previewInformer');
				self.$previewControl = self.$wrapper.find('.previewControl');
				self.$informerPreviewBox = self.$previewInformer.find('.informerPreviewBox');
				self.$informerHeight = self.$wrapper.find('input[name="informerHeight"]');
				$(window).load( self.setWindowLoaded );
				self.$selectLang.on('change', function() { self.langChanged(); });
				self.$wrapper.on('change','.selectCategory',function(){ self.categoryChanged(); });
				self.$wrapper.on('change','.selectStyle',function(){ self.styleChanged(); });

				self.$informerHeight.keydown( self.filterInpNums );
				self.$informerHeight.on('change', function() { self.changeIframeHeight(); });

				self.$generatedSettingsWrap.on('change','input,.inpSelect',function(){ self.changedSettings(); });

				self.$form.submit( self.submitForm );
				
				self.loadFromModel();
				
			},
			loadFromModel: function(){
				if( options.mode != 'edit' ) return false;
				if( options.savedData == '' ) return false;
				if( !options.savedData.id ) return false;
				
				self.$informerTitle.val( options.savedData.title );
				self.$informerHeight.val( options.savedData.height );
				self.changeIframeHeight();
				
				self.$selectLang.val( options.savedData.lang );
				self.langChanged();
				
				self.$wrapper.find('.selectCategory').val( options.parsedData.cat );
				self.categoryChanged(true);
				
				self.$wrapper.find('.selectStyle').val( options.parsedData.st );
				self.styleChanged(true);
				
			},
			submitForm: function(){
				var title = self.$informerTitle.val();
				if( title == '' ) { alert( options.jsTexts.warnEnterTitle ); return false; }
				
				var lang = self.$selectLang.val();
				if( lang == -1 ){ alert( options.jsTexts.warnSelectLang ); return false; }
				
				var catId = self.$wrapper.find('.selectCategory').val();
				var catTitle = options.allSettings['langs'][lang]['cats'][catId]['title'];
				
				var styleId = self.$wrapper.find('.selectStyle').val();
				var styleTitle = options.allSettings['langs'][lang]['stylesTitles'][styleId]
				
				var height = self.$informerHeight.val();
				var width = self.$wrapper.find('input[name="w"]').val();
				
				var data = {
					action: options.ajaxAction,
					nonce: options.createnonce,
					title: title,
					lang: lang,
					catId: catId,
					catTitle: catTitle,
					styleId: styleId,
					styleTitle: styleTitle,
					height: height,
					width: width,
					url: self.generatedInformerUrl
				};
				
				if( options.mode != 'edit' ){
					$.post(
						ajaxurl, 
						data, 
						function ( response ) {
							if( parseInt(response.error) != 0 ){
								alert( response.msg );
							}else{
								alert( response.msg );
								window.location = options.listUrl;
							}
						}, 
						"json" 
					);
				}else{
					data['id'] = options.savedData.id;
					$.post(
						ajaxurl, 
						data, 
						function ( response ) {
							if( parseInt(response.error) != 0 ){
								alert( response.msg );
							}else{
								alert( response.msg );
								window.location = options.listUrl;
							}
						}, 
						"json" 
					);
				}
				
				
				return false;
			},
			changeIframeHeight: function(){
				var informerHeight = self.$informerHeight.val();
				
				self.$informerPreviewBox.find('iframe').css({
					height: informerHeight + 'px'
				});
				
				informerHeight = parseFloat( informerHeight );
				
				if( self.previewTopOffsetBox === false ) self.previewTopOffsetBox = parseFloat( self.$previewInformer.offset().top );
				
				var topOffset = self.previewTopOffsetBox;
				
				var controlHeight = parseFloat( self.$previewControl.height() );
				/*
				if( topOffset + controlHeight + informerHeight > parseFloat( $(window).height() ) ){
					var frameHeight = $(window).height() - topOffset - 50;
					self.$previewInformer.css({
						'height': frameHeight + 'px',
					});
				}else{
					self.$previewInformer.css({
						'height': 'auto',
					})
				}*/
			},
			filterInpNums: function(e){
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
					// Allow: Ctrl+A
					(e.keyCode == 65 && e.ctrlKey === true) ||
					// Allow: Ctrl+C
					(e.keyCode == 67 && e.ctrlKey === true) ||
					// Allow: Ctrl+X
					(e.keyCode == 88 && e.ctrlKey === true) ||
					// Allow: home, end, left, right
					(e.keyCode >= 35 && e.keyCode <= 39)) {
					// let it happen, don't do anything
					return;
				}
				// Ensure that it is a number and stop the keypress
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			},
			setWindowLoaded: function(){
				self.windowLoaded = true;
			},
			initSlider: function(){
				if( self.windowLoaded ){
					self.runSlider();
				}else{
					$(window).load( self.runSlider );
				}
			},
			runSlider: function(){
				var sliders = self.$wrapper.find(".uiSlider");
				if( sliders.length){
					sliders.each(function(){
						var $this = $(this);

						$this.slider({
							min : parseFloat( $this.attr('data-minValue') ),
							max : parseFloat( $this.attr('data-maxValue') ),
							step: parseFloat( $this.attr('data-step') ),
							value: parseFloat( $this.attr('data-value') ),
							stop: function( event, ui ) {
								self.changedSettings();
							},
						});
						
					});
				}
			},
			initColorPicker: function(){
				if( self.windowLoaded ){
					self.runColorPicker();
				}else{
					$(window).load( self.runColorPicker );
				}
			},
			runColorPicker: function(){
				var colorInputs = self.$wrapper.find(".colorbox input");
				if( colorInputs.length){
					colorInputs.each(function(){
						var $this = $(this);

						$this.css('background', 'linear-gradient(to left, '+$this.val()+' 20%, #fff 20%)' );
						
						$this.colorpickerplus();
						
						$this.on('changeColor', function(e, color){					
							if(color!=null){
								$(this).css('background', 'linear-gradient(to left, '+color+' 20%, #fff 20%)');
								$(this).val( color );
							}
						});
						$this.on('hidePicker', function(e, color){					
							self.changedSettings();
						});
						
					});
				}
			},
			langChanged: function(){
				var lang = self.$selectLang.val();
				
				if( lang == -1 ) return false;
				
				self.$generatedSettingsWrap.html('');
				
				var cats = options.allSettings['langs'][lang]['cats'];
				
				if( Object.keys(cats).length == 0 ) return false;
				
				var selectCatsBox = '<div class="postbox"><h3 class="hndle">' + options.jsTexts.selectCatTitleText + '</h3><div class="inside"><div><select name="cat" class="selectCategory">';
				
				selectCatsBox = selectCatsBox + '<option value="-1">' + options.jsTexts.selectCatOptionText + '</option>';
				
				for( catIndex in cats ){
					selectCatsBox = selectCatsBox + '<option value="' + catIndex + '">' + cats[catIndex]['title'] + '</option>';
				}
				
				selectCatsBox = selectCatsBox + '</select></div></div><div class="categorySettings inside"></div></div>';
				
				self.$generatedSettingsWrap.append( selectCatsBox );

			},
			categoryChanged: function( loadFromModel = false ){
				var lang = self.$selectLang.val();
				
				if( lang == -1 ){ alert( options.jsTexts.warnSelectLang ); return false; }
				
				var cat = self.$wrapper.find('.selectCategory').val();
				var $catSettingsWrap = self.$wrapper.find('.categorySettings');

				if( cat == -1 ) return false;
				
				$catSettingsWrap.html('');
				self.$wrapper.find('.selectStylesBox').remove();
				self.$wrapper.find('.saveInformerBtn').remove();
				
				var catSettins = options.allSettings['catsSettings'][cat];
				var settingsHtml = '';
				
				for( index in catSettins ){
					if( index == 'langs' ){
						for( indexForLang in catSettins['langs'][lang] ){
							settingsHtml = settingsHtml + '<h4>' + options.jsTexts[indexForLang] + '</h4>';
							settingsHtml = settingsHtml + self.render( indexForLang, catSettins['langs'][lang][indexForLang], loadFromModel );
						}
					}else{
						settingsHtml = settingsHtml + '<h4>' + options.jsTexts[index] + '</h4>';
						settingsHtml = settingsHtml + self.render( index, catSettins[index], loadFromModel );
					}
				}
				
				$catSettingsWrap.append( settingsHtml );
				
				var categoryStyles = options.allSettings['langs'][lang]['cats'][cat]['styles'];
				
				if( categoryStyles === undefined || categoryStyles.length == 0 ) return false;
				
				var selectStylesBox = '<div class="postbox selectStylesBox"><h3 class="hndle">' + options.jsTexts.selectStylesTitleText + '</h3><div class="inside"><div><select name="st" class="selectStyle">';
				
				for( i in categoryStyles ){
					var styleId = categoryStyles[i];
					selectStylesBox = selectStylesBox + '<option value="' + styleId + '">' + options.allSettings['langs'][lang]['stylesTitles'][styleId] + '</option>';
				}
				
				selectStylesBox = selectStylesBox + '</select></div></div><div class="styleSettings inside"></div></div>';
				
				self.$generatedSettingsWrap.append( selectStylesBox );
				self.initSlider();
				if( !loadFromModel ) self.styleChanged();
			},
			changedSettings: function(){
				if( self.windowLoaded ){
					self.settingsChanged();
				}else{
					$(window).load( self.settingsChanged );
				}
			},
			settingsChanged: function(){
				var lang = self.$selectLang.val();
				var frameUrl = options.ftUrl;
				
				if( options.urlLangs[lang] == '' ){
					frameUrl = frameUrl + '/';
				}else{
					frameUrl = frameUrl + '/' + options.urlLangs[lang] + '/';
				}
				
				frameUrl = frameUrl + 'informers/getInformer';
				
				var formInputs = self.$generatedSettingsWrap.find('input[type="text"],input[type="checkbox"]:checked,select,.uiSlider');
				
				var informerParams = {};

				formInputs.each(function(){
					var $this = $(this);

					if( $this.hasClass('uiSlider') ){
						informerParams[$this.attr('data-name')] = $this.slider("value");
					}else if( $this.attr('data-type') == 'colorPicker' ){

						var delimiter = ',';
						if( informerParams['colors'] === undefined ){
							delimiter = '';
							informerParams['colors'] = '';
						} 
						var colorVal = $this.val();
						if( colorVal.charAt(0) === '#' ) colorVal = colorVal.substr(1);
						informerParams['colors'] = informerParams['colors'] + delimiter + $this.attr('name') + '=' + colorVal;
					}else{
						var inpName = $this.attr('name');
						var delimiter = ',';
						if( informerParams[inpName] === undefined ){
							delimiter = '';
							informerParams[inpName] = '';
						}
						informerParams[inpName] = informerParams[inpName] + delimiter + $this.val();
					}
					
					self.$informerPreviewBox.css({ width: '400px' });
					if( informerParams['w'] !==undefined && informerParams['w'] != '0' ){
						self.$informerPreviewBox.css({ width: informerParams['w'] + 'px' });
					}
					
					
				});
				
				frameUrl = frameUrl + '?' + self.encodeQueryData(informerParams);
				
				self.generatedInformerUrl = frameUrl;
				
				var frameCode = '<iframe style="width:100%;border:0;overflow:hidden;background-color:transparent;height:'+ self.$informerHeight.val() +'px;" scrolling="no" src="' + frameUrl + '"></iframe>';
				
				self.$informerPreviewBox.html(frameCode);
				
			},
			styleChanged: function( loadFromModel = false ){
				var lang = self.$selectLang.val();
				
				if( lang == -1 ){ alert( options.jsTexts.warnSelectLang ); return false; }
				
				var cat = self.$wrapper.find('.selectCategory').val();
				var style = self.$wrapper.find('.selectStyle').val();
				var $styleSettingsWrap = self.$wrapper.find('.styleSettings');
				
				if( style == -1 ) return false;
				
				$styleSettingsWrap.html('');
				self.$wrapper.find('.saveInformerBtn').remove();
				
				var styleSettings = options.allSettings['stylesSettings'][style];
				if( Object.keys(styleSettings).length == 0 ) return false;
				
				var settingsHtml = '';
				
				for( index in styleSettings ){
					if( index == 'actions' ){
						self.runStyleActions( styleSettings[index] );
					}else{
						settingsHtml = settingsHtml + '<h4>' + options.jsTexts[index] + '</h4>';
						settingsHtml = settingsHtml + self.render( index, styleSettings[index], loadFromModel );
					}
				}
				
				$styleSettingsWrap.append( settingsHtml );
				self.initColorPicker();
				self.changedSettings();
				
				self.$generatedSettingsWrap.append( '<input type="submit" value="' + options.jsTexts.save + '" class="button-primary saveInformerBtn" name="submit">' );
			},
			runStyleActions: function( actions ){
				for( i in actions ){
					if( actions[i].type == 'show' ){
						self.$generatedSettingsWrap.find('[name="' + actions[i].target + '"]').attr({'disabled': false});
					}else if( actions[i].type == 'hide' ){
						self.$generatedSettingsWrap.find('[name="' + actions[i].target + '"]').attr({'disabled': true});
					}
				}
			},
			render: function( name, settings, loadFromModel = false ){
				var outStr = '';
				if( settings.type == 'multipleCheckbox' ){
					
					
					for( i in settings.options ){
						var checked = '';
						var inpValue = settings.options[i].value;
						if( loadFromModel == false && settings.options[i].setted == '1' ){
							checked = 'checked="checked"';	
						}else if( loadFromModel == true && ( options.parsedData[name] == inpValue || options.parsedData[name][inpValue] == '1' ) ){
							checked = 'checked="checked"';	
						}
						outStr = outStr + '<div class="checkBoxBox"><input type="checkbox" name="' + name + '" value="' + inpValue + '" ' + checked + ' />' + settings.options[i].label + '</div>';
					}
					outStr = outStr + '<div class="clearboth"></div>';
					
					
				}else if( settings.type == 'select' ){
					
					
					outStr = outStr + '<select class="inpSelect" name="' + name + '">'
					
					for( i in settings.options ){
						var selected = '';
						var inpValue = settings.options[i].value;
						if( loadFromModel == false && settings.options[i].setted == '1' ){
							selected = 'selected="selected"';
						}else if( loadFromModel == true && options.parsedData[name] == inpValue ){
							selected = 'selected="selected"';
						}
						outStr = outStr + '<option value="' + inpValue + '" ' + selected + '>' + settings.options[i].label + '</option>';
					}
					
					outStr = outStr + '</select>'
					
					
				}else if( settings.type == 'text' ){
					
					
					var inpValue = settings.value;
					if( loadFromModel == true ) inpValue = options.parsedData[name];
					outStr = outStr + '<input type="text" value="' + inpValue + '" name="' + name + '">';
					
					
				}else if( settings.type == 'singleCheckbox' ){
					
					
					var checked = '';
					if( loadFromModel == false && settings.setted == '1' ){
						checked = 'checked="checked"';
					}else if( loadFromModel == true && options.parsedData[name] == '1' ){
						checked = 'checked="checked"';
					}
					outStr = outStr + '<input type="checkbox" name="' + name + '" value="' + settings.value + '" ' + checked + ' />' + options.jsTexts[name] + ' ';
					
					
				}else if( settings.type == 'colorPicker' ){
					
					
					var lang = self.$selectLang.val();
					outStr = outStr + '<div class="colorInputs">';
					for( i in settings.options ){
						var colorVal = settings.options[i].value;
						if( loadFromModel == true ) colorVal = options.parsedData[settings.options[i].name];
						outStr = outStr + '<div class="colorbox">' + options.allSettings['langs'][lang]['stylesColorsTitles'][settings.options[i].name] + '<br /><input data-type="colorPicker" type="text" readonly name="' + settings.options[i].name + '" value="' + colorVal + '"  /></div>';
					}
					outStr = outStr + '<div class="clearboth"></div></div>';
					
					
				}else if( settings.type == 'slider' ){
					
					
					var inpValue = settings.value;
					if( loadFromModel == true ) inpValue = options.parsedData[name];
					outStr = outStr + '<div class="uiSlider" data-name="'+name+'" data-value="'+inpValue+'" data-minValue="'+settings.minValue+'" data-maxValue="'+settings.maxValue+'" data-step="'+settings.step+'"></div>';
					
					
				}
				return outStr;
			},
			encodeQueryData:function( params ){
				var ret = [];
				for ( var param in params ){
					ret.push( encodeURIComponent( param ) + "=" + encodeURIComponent( params[param] ) );
				}
				return ret.join("&");
			},
		};
		self.init();
		return self;
	}
}( window.jQuery );