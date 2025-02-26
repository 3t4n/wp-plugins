// JavaScript Document
jQ = jQuery;
jQ('document').ready(function(){initWPFontsForWebwebfontsplugin()});

//var FFW_baseUrl = 'http://localhost/fontsforweb';
var FFW_baseUrl = 'http://fontsforweb.com';
//initialize fonts browser
function initWPFontsForWebwebfontsplugin()
{
	//bind to choose font button
	jQ('#FFW_chooseFontButton').bind('click', function(){ 
		if(jQ('#wpfontsforwebbrowser')[0])
		{
			jQ('#wpfontsforwebbrowser').toggle();
		}
		else{
			//display wpfontsforwebbrowser
			var wpfontsforwebbrowser = jQ('<div id="wpfontsforwebbrowser"><h1>Please wait until browser is ready</h1><div class="loading"></div></div>');
			//put browser div in the body of document
			wpfontsforwebbrowser.appendTo(jQ('body'));
				
			//after clicking load content from fonts for web action
			jQ.get(FFW_baseUrl + '/fontcategories/wpfontsforwebinit', function(data){
				//if empty answer display error
				if(data == '')
				{
					wpfontsforwebbrowser.html('<h1>An error has occurde</h1><p>Please try again later</p>')
				}
				//apply content to div
				wpfontsforwebbrowser.html(data);
				
				//bind onclick to links to reveal subcategories
				jQ('#wpfontsforwebbrowser #categoriesList a.categoryChoose').bind('click', function(){
					var categoryId = jQ(this).attr('name');
					//hide all subcategories of other parents
					jQ('#wpfontsforwebbrowser #subcategoriesList li').hide();
					jQ('#wpfontsforwebbrowser #subcategoriesList li.instructions').show();
					//show all subcategories of this parent
					jQ('#wpfontsforwebbrowser #subcategoriesList li#FFW_parentcategory_' + categoryId).show();
					jQ('#wpfontsforwebbrowser .jcarousel-next').click();
					return false;
				});
				
				//bind onclick subcategories to load their fonts
				jQ('#wpfontsforwebbrowser #subcategoriesList a.categoryChoose').bind('click', function(){
					
					var categoryId = jQ(this).attr('name');
					
					jQ.get(FFW_baseUrl + '/fontcategories/wpfontsforwebcategoryfonts/catid/' + categoryId, function(data)
					{
						//if empty answer display error
						if(data == '')
						{
							wpfontsforwebbrowser.html('<h1>An error has occurde</h1><p>Please reload page and try again later</p>')
						}
						//apply content to div
						jQ('#wpfontsforwebbrowser #fontList').html(data);
						
						//bind onclick font change action to font images
						jQ('#wpfontsforwebbrowser #fontList').find('a.font_pick').bind('click', function(){
							//set font to id from name attribute of a
							FFW_setFont(jQ(this).attr('name'));
							return false;
						});
						
						jQ('#wpfontsforwebbrowser .jcarousel-next').click();
					});
					return false;

				});
				
				//bind close to close button
				wpfontsforwebbrowser.find('a.close_link').click(function(){wpfontsforwebbrowser.toggle()});
				//init carousel
				initJcarousel();
				
			});
		}
		return false;
	} );
}

//set font to clicked
function FFW_setFont(fontId)
{
	//get editor iframe
	var iframe = jQ('#content_ifr').contents();
	
	//get tiny mce contents
	var tinyMce = jQ(iframe).find('#tinymce');
	
	//get selection
	var selection = tinyMCE.activeEditor.selection.getContent();

	//if anything is selected{
	if(selection != '')
	{
		//loads font face to iframe editor
		loadFontFace(fontId);
		//replace old text
		tinyMCE.activeEditor.selection.setContent("<span class=\"fontsforweb_fontid_" + fontId + "\">"  + selection + '</span>');
	}
}

//load font to iframe
function loadFontFace(fontId)
{
	var iframe = jQ('#content_ifr').contents();
	var head = iframe[0].getElementsByTagName('head')[0];
	var linkElement = jQ(document.createElement('link'));
	
	linkElement.attr({href: FFW_baseUrl + '/font/generatecss/?id=' + fontId, rel: 'stylesheet', type: 'text/css'});
	linkElement.appendTo(head);
}

//init jcarousel
function initJcarousel()
{
	var carousel = jQ('#FFW_browser_carousel').jcarousel({buttonNextHTML: '<a href="#" onclick="return false;"></a>', buttonPrevHTML: '<a href="#" onclick="return false;"></a>', animation:1000, scroll: 2});	
}