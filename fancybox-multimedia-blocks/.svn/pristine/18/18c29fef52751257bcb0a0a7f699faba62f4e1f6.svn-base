onload = function () {
	// Bind all WordPress Block Galleries
	var wpBlockGalleries = document.querySelectorAll('.wp-block-gallery');
	var wpBlockImages;
	for (var g = 0; g < wpBlockGalleries.length; g++) {
		wpBlockImages = wpBlockGalleries[g].querySelectorAll('figure.wp-block-image > a:not([rel="noreferrer noopener"])');
		for (var i = 0; i < wpBlockImages.length; i++) if (/\.(?:bmp|dib|gif|heic|ico|jfif|jpe|jpeg|jpg|png|svg|tif|tiff|webp)$/i.test(wpBlockImages[i])) wpBlockImages[i].setAttribute('data-fancybox', 'wp-block-gallery-' + g);
	}
	// Bind aligned WordPress Block Images
	wpBlockImages = document.querySelectorAll('div.wp-block-image > figure > a:not([rel="noreferrer noopener"])');
	for (var i = 0; i < wpBlockImages.length; i++) if (/\.(?:bmp|dib|gif|heic|ico|jfif|jpe|jpeg|jpg|png|svg|tif|tiff|webp)$/i.test(wpBlockImages[i])) wpBlockImages[i].setAttribute('data-fancybox', '');
	Fancybox.bind('.wp-block-image a[data-fancybox]', {
		Carousel: {infinite: false,},
		Thumbs: false,
	});
	// Bind NOT aligned WordPress Block Images
	wpBlockImages = document.querySelectorAll('figure.wp-block-image > a:not([rel="noreferrer noopener"]):not([data-fancybox])');
	for (var i = 0; i < wpBlockImages.length; i++) if (/\.(?:bmp|dib|gif|heic|ico|jfif|jpe|jpeg|jpg|png|svg|tif|tiff|webp)$/i.test(wpBlockImages[i])) wpBlockImages[i].setAttribute('data-fancybox', '');
	Fancybox.bind('.wp-block-image a[data-fancybox]', {
		Carousel: {infinite: false,},
		Thumbs: false,
	});
}
