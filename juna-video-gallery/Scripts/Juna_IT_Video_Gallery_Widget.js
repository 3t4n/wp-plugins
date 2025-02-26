jQuery(document).ready(function(){
	var iframeWidth = parseInt(jQuery('.iframeWidth').val()); 
	var iframeHeight = parseInt(jQuery('.iframeHeight').val()); 
	var blockStyleTitle = parseInt(jQuery('.blockStyleTitle').val()); 
	var blockStyleDeskFontSize = parseInt(jQuery('.BlockStyleDeskFontSize').val()); 
	var blockStyleDeskFirstFontSize = parseInt(jQuery('.BlockStyleDeskFirstFontSize').val());
	var BlockStyleLinkFontSize = parseInt(jQuery('.BlockStyleLinkFontSize').val());
	var tumbnailWidth = parseInt(jQuery('.tumbnailWidth').val()); 
	var tumbnailHeight = parseInt(jQuery('.tumbnailHeight').val()); 
	var tumbnailHoverTitlFontSize = parseInt(jQuery('.tumbnailHoverTitlFontSize').val()); 
	var popImgWidth = parseInt(jQuery('.popImgWidth').val());
	var popImgHeight = parseInt(jQuery('.popImgHeight').val()); 
	var popImgTitlFontSize = parseInt(jQuery('.popImgTitlFontSize').val()); 
	var imgIconWidth = parseInt(jQuery('.popImgWidth').val())/4; 
	var polaroidsHeight = parseInt(jQuery('.polaroidsHeight').val()); 
	var polaroidsImgWidth = parseInt(jQuery('.polaroidsImgWidth').val());
	var polaroidsTitleFontSize = parseInt(jQuery('.polaroidsTitleFontSize').val());
	var polaroidsDescFontSize = parseInt(jQuery('.polaroidsDescFontSize').val());
	var polaroidsDescFirstFontSize = parseInt(jQuery('.polaroidsDescFirstFontSize').val());
	
	var firstPagination = parseInt(jQuery('.firstPagination').val());
	var firstPaginationIconSize = parseInt(jQuery('.firstPaginationIconSize').val());
	var BlockStylePaginationFontSize = parseInt(jQuery('.BlockStylePaginationFontSize').val());
	var BlockStylePaginationIconSize = parseInt(jQuery('.BlockStylePaginationIconSize').val());
	var tumbnailPaginationFontSize = parseInt(jQuery('.tumbnailPaginationFontSize').val());
	var tumbnailPaginationIconSize = parseInt(jQuery('.tumbnailPaginationIconSize').val());
	
	
	function VideoGalleryResponsive(){
		jQuery('.videoIframes').css('width',iframeWidth*parseInt(jQuery('.videoIframes').parent().parent().parent().width())/1000+'px');
		jQuery('.videoIframes').css('height',iframeHeight*parseInt(jQuery('.videoIframes').parent().parent().parent().width())/1000+'px');
		jQuery('.BlockStyleTitle').css('font-size',blockStyleTitle*parseInt(jQuery('.BlockStyleTitle').parent().parent().width())/800*2+5+'px');
		jQuery('.BlockStyleTitle').css('padding',parseInt(jQuery('.BlockStyleTitle').css('font-size'))/3 + 'px');
		jQuery('.BlockStyleTitle').css('line-height',parseInt(jQuery('.BlockStyleTitle').css('font-size')) + 2 + 'px');
		jQuery('.blockStyleDeskFontSize').css('font-size',blockStyleDeskFontSize*parseInt(jQuery('.blockStyleDeskFontSize').parent().parent().width())/800+5+'px');
		jQuery('.blockStyleDeskFontSize span').css('font-size',blockStyleDeskFirstFontSize*parseInt(jQuery('.blockStyleDeskFontSize span').parent().parent().width())/800+5+'px');
		jQuery('.blockStyleDeskFontSize').css('line-height',parseInt(jQuery('.blockStyleDeskFontSize').css('font-size')) + 2 + 'px');
		jQuery('.blStLink').css('font-size',BlockStyleLinkFontSize*parseInt(jQuery('.blockStyleDeskFontSize').parent().parent().width())/800+5+'px');

		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000+'px');
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000+'px');
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000+'px');
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000+'px');
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000+'px');
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000+'px');
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000+'px');
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000+'px');
		jQuery('.hoverTitlFontSize').css('font-size',tumbnailHoverTitlFontSize*jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').width()/150+'px');
		jQuery('.hoverTitlFontSize').css('line-height',jQuery('.hoverTitlFontSize').css('font-size'));
		jQuery('.hrDiv').css('margin-top',parseInt(jQuery('.hoverTitlFontSize').css('font-size'))/3+'px');
		jQuery('.hrDiv').css('margin-bottom',parseInt(jQuery('.hoverTitlFontSize').css('font-size'))/1.5+'px');
		//jQuery('.Juna_IT_Video_Gallery_Video_Contain_Div').css('width',450*jQuery(window).width()/1000);
		//jQuery('.Juna_IT_Video_Gallery_Video_Contain_Div').css('height',337.5*jQuery(window).width()/1000);
		if(jQuery(window).width() <= 900){
			jQuery('.Juna_IT_Video_Gallery_Video_Contain_Div').css('width',jQuery(window).width())
			jQuery('.Juna_IT_Video_Gallery_Video_Contain_Div').css('height',parseInt(jQuery('.Juna_IT_Video_Gallery_Video_Contain_Div').css('width'))*5/9 + 'px')
		}
		
		if(parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())<500){
			jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.hoverTitlFontSize').css('font-size',tumbnailHoverTitlFontSize*jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').width()/250+'px');
			jQuery('.hoverTitlFontSize').css('line-height',jQuery('.hoverTitlFontSize').css('font-size'));
			jQuery('.hrDiv').css('margin-top',parseInt(jQuery('.hoverTitlFontSize').css('font-size'))/3+'px');
			jQuery('.hrDiv').css('margin-bottom',parseInt(jQuery('.hoverTitlFontSize').css('font-size'))/1.5+'px');
			
			if(parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())<350){
				jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*3+'px');
				jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*3+'px');
				jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*3+'px');
				jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*3+'px');
				jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*3+'px');
				jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*3+'px');
				jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image').css('width',tumbnailWidth*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*3+'px');
				jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image').css('height',tumbnailHeight*parseInt(jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').parent().parent().parent().width())/1000*3+'px');
				jQuery('.hoverTitlFontSize').css('font-size',tumbnailHoverTitlFontSize*jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').width()/250+'px');
				jQuery('.hoverTitlFontSize').css('line-height',parseInt(jQuery('.hoverTitlFontSize').css('font-size'))/3+'px');
				jQuery('.hrDiv').css('margin-top',parseInt(jQuery('.hoverTitlFontSize').css('font-size'))/3+'px');
				jQuery('.hrDiv').css('margin-bottom',parseInt(jQuery('.hoverTitlFontSize').css('font-size'))/1.5+'px');
			}
		}
		jQuery('.image_video_poster_in_JI').css('width',popImgWidth*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000+'px');
		jQuery('.image_video_poster_in_JI').css('height',popImgHeight*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000+'px');
		jQuery('.hover_video_div_JI').css('height',(popImgHeight/2.5)*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000+'px');
		jQuery('.hover_video_div_JI span').css('font-size',popImgTitlFontSize*parseInt(jQuery('.image_video_poster_in_JI').width())/200+3+'px');
		jQuery('.hover_video_div_JI span').css('line-height',parseInt(jQuery('.hover_video_div_JI span').css('font-size'))+5+'px');
		jQuery('.imgIcon').css('width',imgIconWidth*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000+'px');
		jQuery('.imgIcon').css('height',imgIconWidth*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000+'px');
		if(parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())<500){
			jQuery('.image_video_poster_in_JI').css('width',popImgWidth*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.image_video_poster_in_JI').css('height',popImgHeight*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.hover_video_div_JI').css('height',(popImgHeight/2.5)*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.hover_video_div_JI span').css('font-size',popImgTitlFontSize*parseInt(jQuery('.image_video_poster_in_JI').width())/250+3+'px');
			jQuery('.hover_video_div_JI span').css('line-height',parseInt(jQuery('.hover_video_div_JI span').css('font-size'))+5+'px');
			jQuery('.imgIcon').css('width',imgIconWidth*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*1.5+'px');
			jQuery('.imgIcon').css('height',imgIconWidth*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*1.5+'px');
			if(parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())<350){
				jQuery('.image_video_poster_in_JI').css('width',popImgWidth*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*3+'px');
				jQuery('.image_video_poster_in_JI').css('height',popImgHeight*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*3+'px');
				jQuery('.hover_video_div_JI').css('height',(popImgHeight/2.5)*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*3+'px');
				jQuery('.hover_video_div_JI span').css('font-size',popImgTitlFontSize*parseInt(jQuery('.image_video_poster_in_JI').width())/250+3+'px');
				jQuery('.hover_video_div_JI span').css('line-height',parseInt(jQuery('.hover_video_div_JI span').css('font-size'))+5+'px');
				jQuery('.imgIcon').css('width',imgIconWidth*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*3+'px');
				jQuery('.imgIcon').css('height',imgIconWidth*parseInt(jQuery('.image_video_poster_in_JI').parent().parent().parent().width())/1000*3+'px');
			}
		}
		jQuery('.Juna_IT_Video_Gallery_Carousel_Video_Contain_Div').css('width',500*jQuery(window).width()/1000+'!important');
		jQuery('.Juna_IT_Video_Gallery_Carousel_Video_Contain_Div').css('height',375*jQuery(window).width()/1000+'!important');

		jQuery('.pagination1').css('font-size',firstPagination*parseInt(jQuery('.pagination1').width())/800+'px');
		jQuery('.PIc').css('font-size',firstPaginationIconSize*parseInt(jQuery('.pagination1').width())/800+'px');
		if(parseInt(jQuery('.pagination1').width())<=600){
			jQuery('.pagination1').css('font-size',firstPagination*parseInt(jQuery('.pagination1').width())/400 +'px');
			jQuery('.PIc').css('font-size',firstPaginationIconSize*parseInt(jQuery('.pagination1').width())/400 +'px');
		}
		jQuery('.pagination2').css('font-size',BlockStylePaginationFontSize*parseInt(jQuery('.pagination2').width())/800+'px');
		jQuery('.BIc').css('font-size',BlockStylePaginationIconSize*parseInt(jQuery('.pagination2').width())/800+'px');
		if(parseInt(jQuery('.pagination1').width())<=600){
			jQuery('.pagination2').css('font-size',BlockStylePaginationFontSize*parseInt(jQuery('.pagination2').width())/400+'px');
			jQuery('.BIc').css('font-size',BlockStylePaginationIconSize*parseInt(jQuery('.pagination2').width())/800+'px');
		}
		jQuery('.pagination3').css('font-size',tumbnailPaginationFontSize*parseInt(jQuery('.pagination3').width())/800+'px');
		jQuery('.TIc').css('font-size',tumbnailPaginationIconSize*parseInt(jQuery('.pagination3').width())/800+'px');
		if(parseInt(jQuery('.pagination1').width())<=600){
			jQuery('.pagination3').css('font-size',tumbnailPaginationFontSize*parseInt(jQuery('.pagination3').width())/400+'px');
			jQuery('.TIc').css('font-size',tumbnailPaginationIconSize*parseInt(jQuery('.pagination3').width())/400+'px');
		}
	}
	VideoGalleryResponsive();
	jQuery(window).resize(function(){
		VideoGalleryResponsive();
	})
	
	var Juna_IT_Video_Gallery_Hidden_Type=jQuery('#Juna_IT_Video_Gallery_Hidden_Type').val();
	if(Juna_IT_Video_Gallery_Hidden_Type=='Slider')
	{
		Juna_IT_Video_Gallery_Slider_Function();
	}
	else if(Juna_IT_Video_Gallery_Hidden_Type=='Carousel')
	{
		Juna_IT_Video_Gallery_Carousel_Function();
	}
	var Juna_IT_Video_Gallery_Hoplo=jQuery('#Juna_IT_Video_Gallery_Hoplo').val();
	var Juna_IT_Video_Gallery_Count_Videos=jQuery('#Juna_IT_Video_Gallery_Count_Videos').val();
	var Juna_IT_Video_Gallery_Videos_Quantity=jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').val();
	var Juna_IT_Video_Gallery_Load_More=jQuery('#Juna_IT_Video_Gallery_Load_More_hidden').val();
	var Juna_IT_Video_Gallery_Load_More1=jQuery('#Juna_IT_Video_Gallery_Load_More_hidden1').val();
	if(Juna_IT_Video_Gallery_Load_More!=='')
	{
		jQuery('.junaiticonsdraw').hide();
	}
	else
	{
		jQuery('.junaiticonsdraw').show('!important');
	}
	if(Juna_IT_Video_Gallery_Load_More1!=='')
	{
		jQuery('.junaiticonsclass1').hide();
	}
	else
	{
		jQuery('.junaiticonsclass1').show();
	}
	if(Juna_IT_Video_Gallery_Hoplo=='none')
	{
		for(var i=1;i<=Juna_IT_Video_Gallery_Count_Videos;i++)
		{
			jQuery('#Juna_IT_Video_Gallery_Video_'+i).show();
		}
	}
	else if(Juna_IT_Video_Gallery_Hoplo=='done')
	{
		for(var i=1;i<=Juna_IT_Video_Gallery_Videos_Quantity;i++)
		{
			jQuery('#Juna_IT_Video_Gallery_Video_'+i).show();
		}
	}
	else if(Juna_IT_Video_Gallery_Hoplo=='Show')
	{
		for(var i=1;i<=Juna_IT_Video_Gallery_Count_Videos;i++)
		{
			jQuery('#Juna_IT_Video_Gallery_Video_'+i).show();
		}
		jQuery('#Juna_IT_Video_Gallery_Show_All').hide();
	}		
	Juna_IT_Video_Gallery_Thumbnails_Title();
})
function Juna_IT_Video_Gallery_Fast_Backward_Clicked()
{
	var Juna_IT_Video_Gallery_First_Page=jQuery('#Juna_IT_Video_Gallery_First_Page').html();
	var Juna_IT_Video_Gallery_End_Page=jQuery('#Juna_IT_Video_Gallery_End_Page').html();
	if(parseInt(Juna_IT_Video_Gallery_First_Page)>1)
	{
		var Juna_IT_Video_Gallery_Count_Videos=jQuery('#Juna_IT_Video_Gallery_Count_Videos').val();
		var Juna_IT_Video_Gallery_Videos_Quantity=jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').val();

		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#Juna_IT_Video_Gallery_Video_'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Video_Gallery_Videos_Quantity;i++)
			{
				jQuery('#Juna_IT_Video_Gallery_Video_'+i).show();
			}
			jQuery('#Juna_IT_Video_Gallery_First_Page').html(1);
		},1000);
	}
}
function Juna_IT_Video_Gallery_Chevron_Left_Clicked()
{
	var Juna_IT_Video_Gallery_First_Page=jQuery('#Juna_IT_Video_Gallery_First_Page').html();
	var Juna_IT_Video_Gallery_End_Page=jQuery('#Juna_IT_Video_Gallery_End_Page').html();
	if(parseInt(Juna_IT_Video_Gallery_First_Page)>1)
	{
		var Juna_IT_Video_Gallery_Count_Videos=jQuery('#Juna_IT_Video_Gallery_Count_Videos').val();
		var Juna_IT_Video_Gallery_Videos_Quantity=jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').val();

		var Juna_IT_Video_Gallery_Videos_Quantity_After=parseInt(Juna_IT_Video_Gallery_Videos_Quantity)*(parseInt(Juna_IT_Video_Gallery_First_Page)-1);
		var Juna_IT_Video_Gallery_Videos_Quantity_Before=parseInt(Juna_IT_Video_Gallery_Videos_Quantity)*(parseInt(Juna_IT_Video_Gallery_First_Page)-2)+1;
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#Juna_IT_Video_Gallery_Video_'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Video_Gallery_Videos_Quantity_Before;i<=Juna_IT_Video_Gallery_Videos_Quantity_After;i++)
			{
				jQuery('#Juna_IT_Video_Gallery_Video_'+i).show();
			}
			var Juna_IT_Video_Gallery_First_Page1=parseInt(Juna_IT_Video_Gallery_First_Page)-1;
			jQuery('#Juna_IT_Video_Gallery_First_Page').html(Juna_IT_Video_Gallery_First_Page1);
		},1000);
	}
}
function Juna_IT_Video_Gallery_Chevron_Right_Clicked()
{
	var Juna_IT_Video_Gallery_First_Page=jQuery('#Juna_IT_Video_Gallery_First_Page').html();
	var Juna_IT_Video_Gallery_End_Page=jQuery('#Juna_IT_Video_Gallery_End_Page').html();
	if(parseInt(Juna_IT_Video_Gallery_First_Page)<parseInt(Juna_IT_Video_Gallery_End_Page.substr(1)))
	{
		var Juna_IT_Video_Gallery_Count_Videos=jQuery('#Juna_IT_Video_Gallery_Count_Videos').val();
		var Juna_IT_Video_Gallery_Videos_Quantity=jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').val();

		var Juna_IT_Video_Gallery_Videos_Quantity_After=parseInt(Juna_IT_Video_Gallery_Videos_Quantity)*(parseInt(Juna_IT_Video_Gallery_First_Page)+1);
		var Juna_IT_Video_Gallery_Videos_Quantity_Before=parseInt(Juna_IT_Video_Gallery_Videos_Quantity)*parseInt(Juna_IT_Video_Gallery_First_Page)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#Juna_IT_Video_Gallery_Video_'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Video_Gallery_Videos_Quantity_Before;i<=Juna_IT_Video_Gallery_Videos_Quantity_After;i++)
			{
				if(i<=Juna_IT_Video_Gallery_Count_Videos)
				{
					jQuery('#Juna_IT_Video_Gallery_Video_'+i).show();
				}
			}
			var Juna_IT_Video_Gallery_First_Page1=parseInt(Juna_IT_Video_Gallery_First_Page)+1;
			jQuery('#Juna_IT_Video_Gallery_First_Page').html(Juna_IT_Video_Gallery_First_Page1);
		},1000);
	}	
}
function Juna_IT_Video_Gallery_Fast_Forward_Clicked()
{
	var Juna_IT_Video_Gallery_First_Page=jQuery('#Juna_IT_Video_Gallery_First_Page').html();
	var Juna_IT_Video_Gallery_End_Page=jQuery('#Juna_IT_Video_Gallery_End_Page').html();

	if(parseInt(Juna_IT_Video_Gallery_First_Page)<parseInt(Juna_IT_Video_Gallery_End_Page.substr(1)))
	{
		var Juna_IT_Video_Gallery_Count_Videos=jQuery('#Juna_IT_Video_Gallery_Count_Videos').val();
		var Juna_IT_Video_Gallery_Videos_Quantity=jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').val();

		var Juna_IT_Video_Gallery_Videos_Quantity_Before=parseInt(Juna_IT_Video_Gallery_Videos_Quantity)*(parseInt(Juna_IT_Video_Gallery_End_Page.substr(1))-1)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#Juna_IT_Video_Gallery_Video_'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Video_Gallery_Videos_Quantity_Before;i<=Juna_IT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#Juna_IT_Video_Gallery_Video_'+i).show();
			}
			var Juna_IT_Video_Gallery_First_Page1=parseInt(Juna_IT_Video_Gallery_End_Page.substr(1));
			jQuery('#Juna_IT_Video_Gallery_First_Page').html(Juna_IT_Video_Gallery_First_Page1);
		},1000);
	}
}
function Juna_IT_Video_Gallery_Load_More_Clicked()
{
	var Juna_IT_Video_Gallery_Count_Videos=jQuery('#Juna_IT_Video_Gallery_Count_Videos').val();
	var Juna_IT_Video_Gallery_Videos_Quantity=jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').val();
	var Juna_IT_Video_Gallery_Videos_Quantity_Hidden=jQuery('#Juna_IT_Video_Gallery_Videos_Quantity_Hidden').val();

	var Juna_IT_Video_Gallery_Videos_Quantity_Hidden1=parseInt(Juna_IT_Video_Gallery_Videos_Quantity_Hidden)+1;
	var Juna_IT_Video_Gallery_Videos_Quantity_Hidden2=parseInt(Juna_IT_Video_Gallery_Videos_Quantity_Hidden)+parseInt(Juna_IT_Video_Gallery_Videos_Quantity);
	setTimeout(function(){
		for(var i=Juna_IT_Video_Gallery_Videos_Quantity_Hidden1;i<=Juna_IT_Video_Gallery_Videos_Quantity_Hidden2;i++)
		{
			if(i<=parseInt(Juna_IT_Video_Gallery_Count_Videos))
			{
				jQuery('#Juna_IT_Video_Gallery_Video_'+i).show();
			}			
		}
		jQuery('#Juna_IT_Video_Gallery_Videos_Quantity_Hidden').val(Juna_IT_Video_Gallery_Videos_Quantity_Hidden2);	
		if(Juna_IT_Video_Gallery_Videos_Quantity_Hidden2>=parseInt(Juna_IT_Video_Gallery_Count_Videos))
		{
			jQuery('#Juna_IT_Video_Gallery_Load_More').hide();
		}
		else
		{
			jQuery('#Juna_IT_Video_Gallery_Load_More').show();
		}
	},1000);	
}
var y=false;
function Juna_IT_Video_Gallery_Content_Big_Clicked(Video_url,Video_Number,Image_url,Video_Title,Video_Link,Video_ONT)
{
	y=true;
	var descFontSize = parseInt(jQuery('.descFontSize').val());
	var titlFontSize = parseInt(jQuery('.titlFontSize').val());
	var descFirstFontSize = parseInt(jQuery('.descFirstFontSize').val()); 
	var popIconssFontSize = parseInt(jQuery('.popIconssFontSize').val());
	var linkFontSize = parseInt(jQuery('.linkFontSize').val()); 
	jQuery('.Juna_IT_Video_Gallery_Content_Video_Iframe').fadeOut();
	var width1  = jQuery(document).width();
	var height1 = jQuery(document).height();
	var left    = width1-1000;
	var width   = width1/2;
	var height  = height1/2;

	var u=Video_Title.split(')*^*(');
	var y=u.join('"');
	var t=y.split(")*&*(");
	var Video_Title=t.join("'");

	jQuery('.Juna_IT_Video_Gallery_Content_Main_Video_Contain_Div').show();
	jQuery('.Juna_IT_Video_Gallery_Content_Video_Contain_Div').show();
	jQuery('#Juna_IT_Video_Gallery_Content_Video_Count').html(Video_Number);
	jQuery('.Juna_IT_Video_Gallery_Content_Description_Title').html(Video_Title);
	var Juna_IT_Video_Gallery_Content_Description_Text_Firts=jQuery('.Juna_IT_Video_Gallery_Content_Description_Text_Firts').val();

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Juna_IT_Video_Gallery_Content_Get_Description', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Video_url, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		jQuery('.Juna_IT_Video_Gallery_Content_Description_Text').html('<span style="margin-left:20px;font-size:'+Juna_IT_Video_Gallery_Content_Description_Text_Firts+'">'+response.substr(0,1)+'</span>'+response.substr(1));
	})

	jQuery('.Juna_IT_Video_Gallery_Content_Video_Contain_Div').animate({'width':'15%','padding-bottom':'15%','border-radius':'50%','right':'50%','top':'30%','border':'3px solid gray','z-index':'10000000',},500);
 	jQuery('.Juna_IT_Video_Gallery_Content_Video_Contain_Div').animate({'top':'30%',},300);

	
	
	jQuery('.Juna_IT_Video_Gallery_Content_Video_Contain_Div').css({'background-image':'url("'+Image_url+'")','background-repeat':'no-repeat','background-size':'100% 100%',});
	setTimeout(function(){
		jQuery('.Juna_IT_Video_Gallery_Content_Video_Contain_Div').css({'background-image':'',});
	},1000)
	jQuery('.Juna_IT_Video_Gallery_Content_Video_Iframe').attr('src',Video_url);
	if(Video_Link=='')
	{
		jQuery('.JIT_VGallery_CP_LinkP').hide();
	}
	else
	{
		jQuery('.JIT_VGallery_CP_LinkP').show();
		jQuery('.JIT_VGallery_CP_Link').attr('href',Video_Link);
		if(Video_ONT=='Yes')
		{
			jQuery('.JIT_VGallery_CP_Link').attr('target','_blank');
		}
	}
	setTimeout(function(){
		jQuery('.Juna_IT_Video_Gallery_Content_Video_Iframe').fadeIn(1000);
		jQuery('.Juna_IT_Video_Gallery_Content_Icons_Div').fadeIn(1000);
		jQuery('.Juna_IT_Video_Gallery_Content_Description').fadeIn(1000);
	},1000)
	
	if(jQuery(window).width()<=900){
		jQuery('.Juna_IT_Video_Gallery_Content_Video_Contain_Div').animate({'top':'30%','right':0,'width':jQuery(window).width(),'padding-bottom':'0%','border-radius':'0'},800);
	}else{
		jQuery('.Juna_IT_Video_Gallery_Content_Video_Contain_Div').animate({'top':'30%','right':(jQuery(window).width()-900)/2,'transform':'translateX(-50%) !important','width':'900px','padding-bottom':'0%','border-radius':'0'},800);
	}
	jQuery('.Juna_IT_Video_Gallery_Content_Count_Div').css('font-size',parseInt(jQuery('.Juna_IT_Video_Gallery_Content_Icons_Div').css('font-size'))/2);
	jQuery('.Juna_IT_Video_Gallery_Content_Count_Div').css('margin-top',jQuery('.Juna_IT_Video_Gallery_Content_Count_Div').css('font-size'));
	function contPopResp(){
		if(jQuery(window).width()<=900){
			jQuery('.Juna_IT_Video_Gallery_Content_Description_Text').css('font-size',descFontSize*jQuery(window).width()/900);
			jQuery('.Juna_IT_Video_Gallery_Content_Description_Text span').css('font-size',descFirstFontSize*jQuery(window).width()/900);
			jQuery('.Juna_IT_Video_Gallery_Content_Description_Title').css('font-size',titlFontSize*jQuery(window).width()/900);
			jQuery('.Juna_IT_Video_Gallery_Content_Icons_Div').css('font-size',popIconssFontSize*jQuery(window).width()/900)
			jQuery('.Juna_IT_Video_Gallery_Content_Count_Div').css('font-size',parseInt(jQuery('.Juna_IT_Video_Gallery_Content_Icons_Div').css('font-size'))/2);
			jQuery('.Juna_IT_Video_Gallery_Content_Count_Div').css('margin-top',jQuery('.Juna_IT_Video_Gallery_Content_Count_Div').css('font-size'));
			jQuery('.PopLink').css('font-size',linkFontSize*jQuery(window).width()/900);
			jQuery('.Juna_IT_Video_Gallery_Content_Description_Text').css('line-height',parseInt(jQuery('.Juna_IT_Video_Gallery_Content_Description_Text').css('font-size'))+2+'px');
			jQuery('.Juna_IT_Video_Gallery_Content_Description_Title').css('line-height',parseInt(jQuery('.Juna_IT_Video_Gallery_Content_Description_Title').css('font-size'))+2+'px');
		}
	}
	contPopResp();
	
}
function Juna_IT_Video_Gallery_Content_Main_Video_Contain_Div_Closed()
{
	jQuery('.Juna_IT_Video_Gallery_Content_Main_Video_Contain_Div').hide();
	jQuery('.Juna_IT_Video_Gallery_Content_Video_Iframe').attr('src','');
	jQuery('.Juna_IT_Video_Gallery_Content_Video_Iframe').fadeOut();
	jQuery('.Juna_IT_Video_Gallery_Content_Icons_Div').hide();
	jQuery('.Juna_IT_Video_Gallery_Content_Description').hide();
	jQuery('.Juna_IT_Video_Gallery_Content_Video_Contain_Div').css({'top':'0','right':'0','width':'0px','padding-bottom':'0'});
	jQuery('.Juna_IT_Video_Gallery_Content_Video_Contain_Div').hide();
}

function Juna_IT_Video_Gallery_Content_Left_Icon_Clicked()
{
	var Juna_IT_Video_Gallery_video_url=jQuery('.Juna_IT_Video_Gallery_Content_Video_Iframe').attr('src');
	var Juna_IT_Video_Gallery_Gallery_number=jQuery('#Juna_IT_Video_Gallery_Hidden_Gallery_Number').val();
	var Juna_IT_Video_Gallery_Ajax_Params='left)*&^&*('+Juna_IT_Video_Gallery_Gallery_number+')*&^&*('+Juna_IT_Video_Gallery_video_url;
	var Juna_IT_Video_Gallery_Content_Description_Text_Firts=jQuery('.Juna_IT_Video_Gallery_Content_Description_Text_Firts').val();

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Juna_IT_Video_Gallery_Content_Big_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Juna_IT_Video_Gallery_Ajax_Params, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var Juna_IT_Video_Gallery_Ajax_Callback=response.split(')*&^&*(');
		jQuery('#Juna_IT_Video_Gallery_Content_Video_Count').html(Juna_IT_Video_Gallery_Ajax_Callback[0]);
		jQuery('.Juna_IT_Video_Gallery_Content_Video_Iframe').attr('src',Juna_IT_Video_Gallery_Ajax_Callback[1]);
		jQuery('.Juna_IT_Video_Gallery_Content_Description_Title').html(Juna_IT_Video_Gallery_Ajax_Callback[2]);
		jQuery('.Juna_IT_Video_Gallery_Content_Description_Text').html('<span style="margin-left:20px;">'+Juna_IT_Video_Gallery_Ajax_Callback[3].substr(0,1)+'</span>'+Juna_IT_Video_Gallery_Ajax_Callback[3].substr(1));
		
		if(Juna_IT_Video_Gallery_Ajax_Callback[4]=='')
		{
			jQuery('.JIT_VGallery_CP_LinkP').hide();
		}
		else
		{
			jQuery('.JIT_VGallery_CP_LinkP').show();
			jQuery('.JIT_VGallery_CP_Link').attr('href',Juna_IT_Video_Gallery_Ajax_Callback[4]);
			if(Juna_IT_Video_Gallery_Ajax_Callback[5]=='Yes')
			{
				jQuery('.JIT_VGallery_CP_Link').attr('target','_blank');
			}
		}
	})
}
function Juna_IT_Video_Gallery_Content_Right_Icon_Clicked()
{
	var Juna_IT_Video_Gallery_video_url=jQuery('.Juna_IT_Video_Gallery_Content_Video_Iframe').attr('src');
	var Juna_IT_Video_Gallery_Gallery_number=jQuery('#Juna_IT_Video_Gallery_Hidden_Gallery_Number').val();
	var Juna_IT_Video_Gallery_Ajax_Params='right)*&^&*('+Juna_IT_Video_Gallery_Gallery_number+')*&^&*('+Juna_IT_Video_Gallery_video_url;
	var Juna_IT_Video_Gallery_Content_Description_Text_Firts=jQuery('.Juna_IT_Video_Gallery_Content_Description_Text_Firts').val();
	
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Juna_IT_Video_Gallery_Content_Big_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Juna_IT_Video_Gallery_Ajax_Params, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var Juna_IT_Video_Gallery_Ajax_Callback=response.split(')*&^&*(');
		jQuery('#Juna_IT_Video_Gallery_Content_Video_Count').html(Juna_IT_Video_Gallery_Ajax_Callback[0]);
		jQuery('.Juna_IT_Video_Gallery_Content_Video_Iframe').attr('src',Juna_IT_Video_Gallery_Ajax_Callback[1]);
		jQuery('.Juna_IT_Video_Gallery_Content_Description_Title').html(Juna_IT_Video_Gallery_Ajax_Callback[2]);
		jQuery('.Juna_IT_Video_Gallery_Content_Description_Text').html('<span style="margin-left:20px;">'+Juna_IT_Video_Gallery_Ajax_Callback[3].substr(0,1)+'</span>'+Juna_IT_Video_Gallery_Ajax_Callback[3].substr(1));
		
		if(Juna_IT_Video_Gallery_Ajax_Callback[4]=='')
		{
			jQuery('.JIT_VGallery_CP_LinkP').hide();
		}
		else
		{
			jQuery('.JIT_VGallery_CP_LinkP').show();
			jQuery('.JIT_VGallery_CP_Link').attr('href',Juna_IT_Video_Gallery_Ajax_Callback[4]);
			if(Juna_IT_Video_Gallery_Ajax_Callback[5]=='Yes')
			{
				jQuery('.JIT_VGallery_CP_Link').attr('target','_blank');
			}
		}
	})
}
function Juna_IT_Video_Gallery_Thumbnails_Big_Clicked(Video_url,Video_Number)
{
	jQuery('.Juna_IT_Video_Gallery_Main_Video_Contain_Div').show();
	jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video').attr('src',Video_url+'?autoplay=1');
	jQuery('.Juna_IT_Video_Gallery_Video_Contain_Div').show();
	jQuery('#Juna_IT_Video_Gallery_Thumbnails_Video_Count').html(Video_Number);
}
function Juna_IT_Video_Gallery_Polaroids_Big_Clicked(Video_url){
	
	jQuery('.Juna_IT_Video_Gallery_Polaroids_Video_Iframe').attr('src',Video_url+'?autoplay=1');
}
function Juna_IT_Video_Gallery_Polaroids_Big_Closed(){
	jQuery('.Juna_IT_Video_Gallery_Polaroids_Video_Iframe').attr('src','');
}
function Juna_IT_Video_Gallery_Main_Video_Contain_Div_Closed()
{
	jQuery('.Juna_IT_Video_Gallery_Main_Video_Contain_Div').hide();
	jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video').attr('src','');
	jQuery('.Juna_IT_Video_Gallery_Video_Contain_Div').hide();
}
function Juna_IT_Video_Gallery_Thumbnails_Left_Icon_Clicked()
{
	var Juna_IT_Video_Gallery_video_url=jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video').attr('src');
	Juna_IT_Video_Gallery_video_url_split=Juna_IT_Video_Gallery_video_url.split('?autoplay=1');
	var Juna_IT_Video_Gallery_Gallery_number=jQuery('#Juna_IT_Video_Gallery_Hidden_Gallery_Number').val();
	var Juna_IT_Video_Gallery_Ajax_Params='left)*&^&*('+Juna_IT_Video_Gallery_Gallery_number+')*&^&*('+Juna_IT_Video_Gallery_video_url_split[0];
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Juna_IT_Video_Gallery_Thumbnails_Big_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Juna_IT_Video_Gallery_Ajax_Params, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var Juna_IT_Video_Gallery_Ajax_Callback=response.split(')*&^&*(');
		jQuery('#Juna_IT_Video_Gallery_Thumbnails_Video_Count').html(Juna_IT_Video_Gallery_Ajax_Callback[0]);
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video').attr('src',Juna_IT_Video_Gallery_Ajax_Callback[1]);
	})
}
function Juna_IT_Video_Gallery_Thumbnails_Right_Icon_Clicked()
{
	var Juna_IT_Video_Gallery_video_url=jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video').attr('src');
	Juna_IT_Video_Gallery_video_url_split=Juna_IT_Video_Gallery_video_url.split('?autoplay=1');
	var Juna_IT_Video_Gallery_Gallery_number=jQuery('#Juna_IT_Video_Gallery_Hidden_Gallery_Number').val();
	var Juna_IT_Video_Gallery_Ajax_Params='right)*&^&*('+Juna_IT_Video_Gallery_Gallery_number+')*&^&*('+Juna_IT_Video_Gallery_video_url_split[0];

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Juna_IT_Video_Gallery_Thumbnails_Big_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Juna_IT_Video_Gallery_Ajax_Params, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var Juna_IT_Video_Gallery_Ajax_Callback=response.split(')*&^&*(');
		jQuery('#Juna_IT_Video_Gallery_Thumbnails_Video_Count').html(Juna_IT_Video_Gallery_Ajax_Callback[0]);
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video').attr('src',Juna_IT_Video_Gallery_Ajax_Callback[1]);
	})
}
function Juna_IT_Video_Gallery_Thumbnails_Title()
{
	jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div').hover(function(){
		setTimeout(function(){
			jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').show();
		},200)
	},function(){
		jQuery('.Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain').hide();
	})
}

function Juna_IT_Video_Gallery_Slider_Play_Video(Juna_IT_Video_Gallery_Slider_Hidden_URL, Juna_IT_Video_Gallery_Videos_Title)
{
	jQuery('.Juna_IT_Video_Gallery_Slider_Iframe_Div').each(function(){
		var Iframe=jQuery(this).find('iframe');
		var Juna_IT_Video_Gallery_Slider_Video_Title=jQuery(this).find('span');
		var Juna_IT_Video_Gallery_Slider_Iframe_Image=jQuery(this).find('img');
		if(Juna_IT_Video_Gallery_Slider_Video_Title.attr('class')=='Juna_IT_Video_Gallery_Slider_Video_Title' && Juna_IT_Video_Gallery_Slider_Video_Title.html()==Juna_IT_Video_Gallery_Videos_Title && Iframe.attr('src')==Juna_IT_Video_Gallery_Slider_Hidden_URL)
		{
			Juna_IT_Video_Gallery_Slider_Video_Title.fadeOut();

			Juna_IT_Video_Gallery_Slider_Iframe_Image.css('display','none');
			
			Iframe.css('display','inline');
			Iframe.attr('src',Juna_IT_Video_Gallery_Slider_Hidden_URL+'?autoplay=1');
		}
	})
}
function Juna_IT_Video_Gallery_Slider_Function($)
{
	var Juna_IT_Video_Gallery_Slider_Pause_Time=jQuery('#Juna_IT_Video_Gallery_Slider_Pause_Time').val();
	var Juna_IT_Video_Gallery_Slider_Change_Speed=jQuery('#Juna_IT_Video_Gallery_Slider_Change_Speed').val();

    var Juna_IT_Video_Gallery_Slider_Glob_SlideoTransitions = [
      [{b:0,d:600,y:-290,e:{y:27}}],
      [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:87.50,t:-87.50}},{b:11000,d:500,c:{x:-87.50,t:87.50}}],
      [{b:0,d:600,x:410,e:{x:27}}],
      [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
      [{b:-1,d:1,c:{x:175.0,t:-175.0}},{b:0,d:800,c:{x:-175.0,t:175.0},e:{c:{x:7,t:7}}}],
      [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
      [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
      [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
      [{b:2000,d:600,rY:30}],
      [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
      [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
    ];
    
    var Juna_IT_Video_Gallery_Slider_Glob_options = {
      $AutoPlay: true,
      $Idle: parseInt(Juna_IT_Video_Gallery_Slider_Pause_Time.split('s')[0]*1000),
      $SlideDuration: parseInt(Juna_IT_Video_Gallery_Slider_Change_Speed.split('s')[0]*1000),
      $CaptionSliderOptions: {
        $Class: $JssorCaptionSlideo$,
        $Transitions: Juna_IT_Video_Gallery_Slider_Glob_SlideoTransitions,
        $Breaks: [
          [{d:2000,b:1000}]
        ]
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$
      }
    };
    
    var Juna_IT_Video_Gallery_Slider_Glob_slider = new $JssorSlider$("Juna_IT_Video_Gallery_Slider_Glob", Juna_IT_Video_Gallery_Slider_Glob_options);
    var Juna_IT_Video_Gallery_Hidden_width=jQuery('.Juna_IT_Video_Gallery_Hidden_width').val().split('px')[0];
    //responsive code begin
    //you can remove responsive code if you don't want the slider scales while window resizing
    function ScaleSlider() {
        var refSize = Juna_IT_Video_Gallery_Slider_Glob_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, parseInt(Juna_IT_Video_Gallery_Hidden_width));
            Juna_IT_Video_Gallery_Slider_Glob_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider, 30);
        }
    }
    ScaleSlider();
    jQuery(window).bind("load", ScaleSlider);
    jQuery(window).bind("resize", ScaleSlider);
    jQuery(window).bind("orientationchange", ScaleSlider);
    //responsive code end
}
function Juna_IT_Video_Gallery_Carousel_Function($)
{
	var Juna_IT_Video_Gallery_Carousel_Autoplay_Steps=jQuery('#Juna_IT_Video_Gallery_Carousel_Autoplay_Steps').val();
	var Juna_IT_Video_Gallery_Carousel_Slide_Width=jQuery('#Juna_IT_Video_Gallery_Carousel_Slide_Width').val();
	var Juna_IT_Video_Gallery_Carousel_Slide_Spacing=jQuery('#Juna_IT_Video_Gallery_Carousel_Slide_Spacing').val();
	var Juna_IT_Video_Gallery_Carousel_Slide_Cols=jQuery('#Juna_IT_Video_Gallery_Carousel_Slide_Cols').val();
	var Juna_IT_Video_Gallery_Carousel_Arrows_Steps=jQuery('#Juna_IT_Video_Gallery_Carousel_Arrows_Steps').val();
	var Juna_IT_Video_Gallery_Carousel_Pause_Time=jQuery('#Juna_IT_Video_Gallery_Carousel_Pause_Time').val();
	var Juna_IT_Video_Gallery_Carousel_Change_Speed=jQuery('#Juna_IT_Video_Gallery_Carousel_Change_Speed').val();
	var Juna_IT_Video_Gallery_Carousel_Width=jQuery('#Juna_IT_Video_Gallery_Carousel_Width').val().split('px')[0];

	var Juna_IT_Video_Gallery_Carousel_Glob_options = {
    	$AutoPlay: true,
      	$AutoPlaySteps: parseInt(Juna_IT_Video_Gallery_Carousel_Autoplay_Steps),
      	$Idle: parseInt(Juna_IT_Video_Gallery_Carousel_Pause_Time.split('s')[0]*1000),
      	$SlideDuration: parseInt(Juna_IT_Video_Gallery_Carousel_Change_Speed.split('s')[0]*1000),
      	$SlideWidth: parseInt(Juna_IT_Video_Gallery_Carousel_Slide_Width),
      	$SlideSpacing: parseInt(Juna_IT_Video_Gallery_Carousel_Slide_Spacing),
      	$Cols: parseInt(Juna_IT_Video_Gallery_Carousel_Slide_Cols),
      	$ArrowNavigatorOptions: {
        	$Class: $JssorArrowNavigator$,
        	$Steps: parseInt(Juna_IT_Video_Gallery_Carousel_Arrows_Steps)
      	},
      	$BulletNavigatorOptions: {
        	$Class: $JssorBulletNavigator$,
        	$SpacingX: 1,
        	$SpacingY: 1
      	}
    };
    
    var Juna_IT_Video_Gallery_Carousel_Glob_slider = new $JssorSlider$("Juna_IT_Video_Gallery_Carousel_Glob", Juna_IT_Video_Gallery_Carousel_Glob_options);
    
    //responsive code begin
    //you can remove responsive code if you don't want the slider scales while window resizing
    function ScaleSlider() {
        var refSize = Juna_IT_Video_Gallery_Carousel_Glob_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, parseInt(Juna_IT_Video_Gallery_Carousel_Width));
            Juna_IT_Video_Gallery_Carousel_Glob_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider, 30);
        }
    }
    ScaleSlider();
    jQuery(window).bind("load", ScaleSlider);
    jQuery(window).bind("resize", ScaleSlider);
    jQuery(window).bind("orientationchange", ScaleSlider);
    //responsive code end
}
function Juna_IT_Video_Gallery_Carousel_Play_Video(Juna_IT_Video_Gallery_Carousel_Hidden_URL)
{
	var Juna_IT_Video_Gallery_Carousel_Border_Radius=jQuery('#Juna_IT_Video_Gallery_Carousel_Border_Radius').val();
	jQuery('.Juna_IT_Video_Gallery_Carousel_Main_Video_Contain_Div').show();
	if(jQuery(window).width()>900){
		jQuery(".Juna_IT_Video_Gallery_Carousel_Video_Contain_Div").animate({height:'500px', width:'900px',borderRadius: Juna_IT_Video_Gallery_Carousel_Border_Radius,top:"50%",left:"50%"},500);
	}else{
		jQuery(".Juna_IT_Video_Gallery_Carousel_Video_Contain_Div").animate({height:parseInt(jQuery(window).width())/9*5+'px', width:jQuery(window).width(),borderRadius: Juna_IT_Video_Gallery_Carousel_Border_Radius,top:"50%",left:"50%"},500);
	}
	
	jQuery('.Juna_IT_Video_Gallery_Carousel_Video').attr('src',Juna_IT_Video_Gallery_Carousel_Hidden_URL+'?autoplay=1');
	jQuery('.Juna_IT_Video_Gallery_Carousel_Video_Contain_Div').show();
}
function Juna_IT_Video_Gallery_Carousel_Main_Video_Contain_Div_Closed()
{
	jQuery(".Juna_IT_Video_Gallery_Carousel_Video_Contain_Div").animate({height: "15%", width:"10%",borderRadius:"50%",top:"40%",left:"45%"},100);
	jQuery('.Juna_IT_Video_Gallery_Carousel_Main_Video_Contain_Div').hide();
	jQuery('.Juna_IT_Video_Gallery_Carousel_Video').attr('src','');
	jQuery('.Juna_IT_Video_Gallery_Carousel_Video_Contain_Div').hide();
}