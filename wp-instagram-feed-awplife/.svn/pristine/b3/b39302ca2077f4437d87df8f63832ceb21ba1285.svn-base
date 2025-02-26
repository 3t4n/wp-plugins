<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$igp_hover_icon = sanitize_text_field(IFGP_PLUGIN_URL."/img/instagram-gallery-premium.png");
?>
<script type="text/javascript">	
	jQuery(window).load(function() {
		jQuery(function($) {
			var updateArrows = function(){
				$('.carouselGallery-right').removeClass('disabled');
				$('.carouselGallery-left').removeClass('disabled');
				var curIndex = $('.carouselGallery-carousel.active').data('index');
				updateArrows.nbrOfItems = updateArrows.nbrOfItems || $('.carouselGallery-carousel').length -1;

				curIndex === updateArrows.nbrOfItems && $('.carouselGallery-right').addClass('disabled');
				curIndex === 0 && $('.carouselGallery-left').addClass('disabled');
			}
			$('.carouselGallery-carousel').on('click', function(e){
				scrollTo = $('body').scrollTop();
			$('body').addClass('noscroll');
			$('body').css('position', 'fixed');
				$('.insta-if-navigation').removeClass('active');
				$(this).addClass('active');
				showModal($(this));
				updateArrows();
			});

			$('body').on('click', '.carouselGallery-right, .carouselGallery-left', function(e){
				if($(this).hasClass('disabled')) return;
				var curIndex = $('.carouselGallery-carousel.active').data('index');
				var nextItemIndex = parseInt(curIndex+1);
				if($(this).hasClass('carouselGallery-left')){
					nextItemIndex-=2;
				}
				var nextItem = $('.carouselGallery-carousel[data-index='+nextItemIndex+']');
				if(nextItem.length > 0){
					$('.insta-if-navigation').removeClass('active');
					$('body').find('.carouselGallery-wrapper').remove();
					showModal($(nextItem.get(0)));
					nextItem.first().addClass('active');
				}
				updateArrows();
			});
			var modalHtml = '';
			showModal = function(that){
				var username = that.data('username'),
				imagedate = that.data('imgDate'),
				imagetext = that.data('imagetext'),
				imagepath = that.data('imagepath'),
				carouselGalleryUrl = that.data('url');
				postURL =  that.data('posturl');
				maxHeight = $(window).height()-100;
				var tags = imagetext.split('#');
				
				if (jQuery('.carouselGallery-wrapper').length === 0) {
						if(typeof imagepath !== 'undefined') {
							modalHtml = "<div class='carouselGallery-wrapper'>";
							modalHtml += "<div class='carouselGallery-modal'><span class='carouselGallery-left'><span class='icons icon-arrow-left6'></span></span><span class='carouselGallery-right'><span class='icons icon-arrow-right6'></span></span>";
							modalHtml += "<div class='container'>";
							modalHtml += "<span class='icons iconscircle-cross close-icon'></span>";
							modalHtml += "<div class='carouselGallery-scrollbox' style='max-height:"+maxHeight+"px'><div class='carouselGallery-modal-image'>";
							if(that[0].attributes[1].value == 'VIDEO') {
								modalHtml += "<video <video width='60%' height='90%' controls>";
								modalHtml += "<source src='"+imagepath+"'>";
								modalHtml += "</video>";
							} else {
									modalHtml += "<img src='"+imagepath+"'>";
							}
							modalHtml += "</div>";
							modalHtml += "<div class='carouselGallery-modal-text'>";
							modalHtml += "<div class='insta_lightbox_header'>";
							modalHtml += "<div class='insta_lightbox_header_content'>";
							modalHtml += "<div class='insta_lightbox_avatar'><img src='<?php echo IFGP_PLUGIN_URL ?>img/instagram-gallery-premium.png' width='70%' height='100%'></div>";
							modalHtml += "<div class='insta_lightbox_user_button'><div class='insta_lightbox_username'><a href='"+postURL+"'> "+username+"</a></div>";
							modalHtml += "</div></div>";
							modalHtml += "<div class='insta_lightbox_followbtn'><a target='_new' href='https://www.instagram.com/"+username+"' type='button' class='btn btn-primary'>Follow</a></div>";
							modalHtml += "</div>";
							modalHtml += "<div class='insta_lightbox_content_data'>";
							modalHtml += "<p><a href='"+postURL+"' style='font-size:15px; margin:5px;'>"+username+"</a>";
									for(key in tags) {
											if(tags.hasOwnProperty(key)) {
												if (key != 0 ){
												var value = tags[key];
												modalHtml += "<span class='insta_tags'> <a href='https://www.instagram.com/explore/tags/"+value+"'> #"+value+"</a> </span>";
												} 
												else{ 
												var value = tags[key];
													modalHtml += ""+value+"";
												}
											}
										}
							modalHtml += "</p></span>";
							modalHtml += "</div>";
							modalHtml += "<div class='insta_date_post'>";
							modalHtml += "<div class='insta_social_icon'>";
							modalHtml += "<a href='"+postURL+"'><span class='icons icon-heart'></span></a>";
							modalHtml += "<a href='"+postURL+"'><svg class='comments' version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='22px' height='22px' viewBox='796 796 200 200' enable-background='new 796 796 200 200' xml:space='preserve'><path d='M896.001,812.517c-55.23,0-100.001,31.369-100.001,70.071c0,18.018,9.72,34.439,25.67,46.851c3.721,2.895,5.446,7.685,4.424,12.286l-6.872,30.926c-0.498,2.242,0.419,4.561,2.316,5.855c1.896,1.295,4.391,1.304,6.297,0.022l36.909-24.804c3.238-2.176,7.17-3.074,11.032-2.516c6.532,0.945,13.294,1.448,20.226,1.448c55.227,0,99.999-31.37,99.999-70.069C996,843.886,951.229,812.517,896.001,812.517z'/></svg></a>";
							modalHtml += "<a href='"+postURL+"'><svg class='share-alt2' version='1.1' id='svg2' xmlns:dc='http://purl.org/dc/elements/1.1/' xmlns:cc='http://creativecommons.org/ns#' xmlns:rdf='http://www.w3.org/1999/02/22-rdf-syntax-ns#' xmlns:svg='http://www.w3.org/2000/svg' xmlns:sodipodi='http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd' xmlns:inkscape='http://www.inkscape.org/namespaces/inkscape' sodipodi:docname='share-alt.svg' inkscape:version='0.48.4 r9939'xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='22px' height='22px' viewBox='0 0 1200 1200' enable-background='new 0 0 1200 1200' xml:space='preserve'><path id='path20884' inkscape:connector-curvature='0' d='M754.553,35.03v294.208C487.317,329.246,0,332.178,0,1164.97c55.25-556.9,309.061-560.402,754.553-560.408v321.292L1200,480.407L754.553,35.03z'/></svg></a>";
							modalHtml += "</div><div>"+imagedate+"</div></div>";
							modalHtml += "</div></div></div></div></div>";
							$('body').append(modalHtml).fadeIn(2500);
						}
						
					}
					
					// active scroll height
					var insta_lightbox_content_data = jQuery('.insta_lightbox_content_data').height();
					console.log(insta_lightbox_content_data);
					if (insta_lightbox_content_data > 400) {
						jQuery('.carouselGallery-modal-text').css('overflow-y','scroll');
					}
				};
				
			  
				
				jQuery('body').on( 'click','.carouselGallery-wrapper', function(e) {
					if(jQuery(e.target).hasClass('.carouselGallery-wrapper')){
						removeModal();
					}
				});
				jQuery('body').on('click', '.carouselGallery-modal .iconscircle-cross', function(e){
					removeModal();
				});

				 var removeModal = function(){
					jQuery('body').find('.carouselGallery-wrapper').remove();
					jQuery('body').removeClass('noscroll');
					jQuery('body').css('position', 'static');
					jQuery('body').animate({scrollTop: scrollTo}, 0);
				};

				// Avoid break on small devices
				var carouselGalleryScrollMaxHeight = function() {
					if (jQuery('.carouselGallery-scrollbox').length) {
						maxHeight = $(window).height()-100;
						jQuery('.carouselGallery-scrollbox').css('max-height',maxHeight+'px');
					}
				}
				jQuery(window).resize(function() { // set event on resize
					clearTimeout(this.id);
					this.id = setTimeout(carouselGalleryScrollMaxHeight, 100);
				});
				document.onkeydown = function(evt) {
					evt = evt || window.event;
					if (evt.keyCode == 27) {
						removeModal();
					}
				};
		});
});
</script>