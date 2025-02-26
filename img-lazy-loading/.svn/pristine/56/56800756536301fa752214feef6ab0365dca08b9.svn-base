
/*
 _    _                       _   _   _   _                                      _   
| |  | |                     (_) | | | | (_)                                    | |  
| |  | |  _ __    _ __ ___    _  | | | |  _    ___    _ __        _ __     ___  | |_ 
| |  | | | '_ \  | '_ ` _ \  | | | | | | | |  / _ \  | '_ \      | '_ \   / _ \ | __|
| |__| | | | | | | | | | | | | | | | | | | | | (_) | | | | |  _  | | | | |  __/ | |_ 
 \____/  |_| |_| |_| |_| |_| |_| |_| |_| |_|  \___/  |_| |_| (_) |_| |_|  \___|  \__|

Plugin Name: IMG Lazy Loading
Plugin URI: http://unmillion.net/plugin-wordpress-img-lazy-loading/
Description: Plugin to load images lazyloading without JS library.
Version: 1.1
Author: Art Uro
Author URI: http://unmillion.net/author/art
License: GPL2

*/

document.addEventListener("DOMContentLoaded", function() 
{
	/* init */

	imgs = document.querySelectorAll("img[data-src]");
	imgInfos = [];
	
	for(var i = 0; i < imgs.length; i++)
	{
		element = {};
		element.position = imgs[i].offsetTop;
		element.charged = 0;
		imgInfos.push(element);
	} 

	lazyLoad();

	window.onscroll = function() {
		lazyLoad();
	};

	/* functions */

	function lazyLoad()
	{
		for(var i = 0; i < imgInfos.length; i++)
		{
			if(imgInfos[i].charged == 0 && imgInfos[i].position <  (window.innerHeight || document.documentElement.clientHeight) + (window.scrollY || window.pageYOffset))
			{
				imgSrc = imgs[i].getAttribute("data-src");
				imgInfos[i].charged = 1;
				imgs[i].setAttribute('src',imgSrc);
				imgs[i].removeAttribute('data-src');
				fadeIn(imgs[i]);
			}

			if(imgInfos[i].charged == 0)
			{
				imgInfos[i].position = imgs[i].offsetTop;
			}
		}
	}

	function fadeIn(element) 
	{
		(function fade()
		{
			element.style.opacity = +element.style.opacity + 0.05;
			(element.style.opacity ) < 1 ? setTimeout(fade, 15) : "";
		})();
	}
});