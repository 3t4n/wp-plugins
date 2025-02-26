// ========================
// Dynamically resize images
// by Avramovic Nemanja aka. Avram
// www.avramovic.info
// ========================

function resizeImg()
{
	var _resizeWidth  = 65;
	var _resizeHeight = 'auto';
	var _resizeClass  = 'avramtar';
	
	var imgArray = document.getElementsByTagName( 'IMG' );
	for ( var i = 0; i < imgArray.length; i++ )
	{
		var imgObj = imgArray[i];
		
		if ( imgObj.className == _resizeClass )
		{
			var oldw = imgObj.width;
			var oldh = imgObj.height;
			
			if (_resizeHeight == 'auto') {
				var proporcija = oldw / _resizeWidth;
				var _resizeHe = oldh / proporcija;
				var _resizeWi = _resizeWidth;
			}
			
			else if (_resizeWidth == 'auto') {
				var proporcija = oldh / _resizeHeight;
				var _resizeHe = _resizeHeight;
				var _resizeWi = oldw / proporcija;
			}
			
			else {
				var _resizeHe = _resizeHeight;
				var _resizeWi = _resizeWidth;
			}
			
			if ((_resizeWidth >= oldw) || (_resizeHeight >= oldh)) {
				var _resizeHe = oldh;
				var _resizeWi = oldw;
			}
			
			imgObj.style.width = Math.round(_resizeWi) + 'px';
			imgObj.style.height = Math.round(_resizeHe) + 'px';
		}
	}
}

window.onload = resizeImg;