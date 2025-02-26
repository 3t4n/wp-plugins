jQuery(document).ready(function($){
	
	var bx1 = $('.mycbgenie-ads1');
	var bx2 = $('.mycbgenie-ads2');
	var bx3 = $('.mycbgenie-ads3');
	var bx4 = $('.mycbgenie-ads4');
	var bx5 = $('.mycbgenie-ads5');
	var mcg_items;
	
	if( bx1.length ){
		mcgvp = $('.mycbgenie-ads1').width();
		if( mcgvp <= 380 ){ mcg_items = 1;  }
		else if( mcgvp > 380 && mcgvp <= 500 ){ mcg_items = 2; }
		else if( mcgvp > 500 && mcgvp <= 600 ){ mcg_items = 2; }
		else if( mcgvp > 600 && mcgvp <= 750 ){ mcg_items = 3; }
		else if( mcgvp > 750 && mcgvp <= 900 ){ mcg_items = 4; }
		else if( mcgvp > 900 ){ mcg_items = 6; }
		else{ var mcg_items = 4; }
		
		bx1.bxSlider({
			minSlides: mcg_items,
			maxSlides: mcg_items,
			//  mode: 'vertical',			
			slideWidth: 320,
			slideMargin: 3,
			preloadImages: 'all',
			adapriveHeight: true,
			auto: parseInt(bx1.attr('autoslide')),
			speed: bx1.attr('speed'),
			autoHover:true,			
			pager: parseInt(bx1.attr('pager'))
		});
	}
	

	if( bx2.length ){
		mcgvp = $('.mycbgenie-ads2').width();
		if( mcgvp <= 380 ){ mcg_items = 1;  }
		else if( mcgvp > 380 && mcgvp <= 500 ){ mcg_items = 2; }
		else if( mcgvp > 500 && mcgvp <= 600 ){ mcg_items = 2; }
		else if( mcgvp > 600 && mcgvp <= 750 ){ mcg_items = 3; }
		else if( mcgvp > 750 && mcgvp <= 900 ){ mcg_items = 4; }
		else if( mcgvp > 900 ){ mcg_items = 6; }
		else{ var mcg_items = 4; }
		

		bx2.bxSlider({
			//mode: 'vertical',
			minSlides: mcg_items,
			maxSlides: mcg_items,
			slideWidth: 320,
			slideMargin: 3,
			preloadImages: 'all',
			adapriveHeight: true,
			auto: parseInt(bx2.attr('autoslide')),
			speed: bx2.attr('speed'),
			autoHover:true,
			pager: parseInt(bx2.attr('pager'))
		});
		
		
		
		
		var cc = $(".mycbgenie-ads2 li").first().find('.mycbgenie-ads_container').length * 180;
		$(".mycbgenie-ads2 .mycbgenie-ads-viewport").attr('style', 'width: 100%; overflow: hidden; position: relative; height: ' + cc + 'px!important' );
	}
	
	
	
	if( bx3.length ){
		mcgvp = $('.mycbgenie-ads3').width();
		if( mcgvp <= 380 ){ mcg_items = 1;  }
		else if( mcgvp > 380 && mcgvp <= 500 ){ mcg_items = 2; }
		else if( mcgvp > 500 && mcgvp <= 600 ){ mcg_items = 2; }
		else if( mcgvp > 600 && mcgvp <= 750 ){ mcg_items = 3; }
		else if( mcgvp > 750 && mcgvp <= 900 ){ mcg_items = 4; }
		else if( mcgvp > 900 ){ mcg_items = 6; }
		else{ var mcg_items = 4; }
		
				mcg_items = 3;
				//alert(bx3.attr('autoslide'));
				
				mcg_items = bx3.attr('at_a_time');
				
		bx3.bxSlider({
			minSlides: mcg_items,
			maxSlides: mcg_items,
			mode: 'vertical',			
			slideWidth: bx3.attr('im_width'),
			slideMargin: 30,
			preloadImages: 'all',
			adapriveHeight: true,
			controls: false,        
			auto:	(bx3.attr('autoslide')),// true, false - previous and next controls			
			autoStart: (bx3.attr('autoslide')),
			speed: bx3.attr('speed'),//bx1.attr('speed'),
			//autoStart:false,
			//ticker:true,
			//tickerHover:true,
			pause:bx3.attr('delay'),
			moveSlides:bx3.attr('moveSlides'),
			autoHover:true,
			//autoDelay:500,
			//pager: parseInt(bx3.attr('pager'))
		});
	}
	
	
	if( bx4.length ){
		
		mcgvp = parseInt($('.mycbgenie-ads4').width());
		mcg_imwidth= parseInt(bx4.attr('im_width'));
		
		//alert(mcgvp);
		//alert(mcgvp/mcg_imwidth);
		if( mcgvp <= 380 ){ mcg_items = 2;  }
		else if( mcgvp > 380 && mcgvp <= 500 ){ mcg_items = 2; }
		else if( mcgvp > 500 && mcgvp <= 600 ){ mcg_items = 2; }
		else if( mcgvp > 600 && mcgvp <= 750 ){ mcg_items = 3; }
		else if( mcgvp > 750 && mcgvp <= 900 ){ mcg_items = 4; }
		else if( mcgvp > 900 && mcgvp <= 1250 ){ mcg_items = 5; }		
		else if( mcgvp > 1250 ){ mcg_items = 6; }
		else{ var mcg_items = 4; }
		
				//mcg_items = 3;
				//alert(bx3.attr('autoslide'));
				
				//mcg_items = bx4.attr('at_a_time');
				
		bx4.bxSlider({
			minSlides: mcg_items,
			maxSlides: mcg_items,
			mode: 'horizontal',			
			slideWidth: bx4.attr('im_width'),
			slideMargin: 30,
			preloadImages: 'all',
			adapriveHeight: true,
			controls: true,        
			auto:	(bx4.attr('autoslide')),// true, false - previous and next controls			
			autoStart: (bx4.attr('autoslide')),
			speed: bx4.attr('speed'),//bx1.attr('speed'),
			//autoStart:false,
			//ticker:true,
			//tickerHover:true,
			pause:bx4.attr('delay'),
			moveSlides:bx4.attr('moveSlides'),
			autoHover:true,
			//autoDelay:500,
			//pager: parseInt(bx3.attr('pager'))
		});
	}
	

});