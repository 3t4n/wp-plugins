( function( $ ) {

    "use strict";
        $( document ).ready(function() {            

            var all_images  = $( '.threesixty-btn' ).attr( 'data-images' ),                
                width       = $( '.threesixty-btn' ).attr( 'data-width' ),
                navigation  = (typeof customAddon.navigation !== "undefined" && customAddon.navigation == "yes" ) ? true : false,
                drag        = (typeof customAddon.drag !== "undefined" && ( customAddon.drag == "yes" || customAddon.drag == '1' )) ? true : false,                
                playspeed   = customAddon.playspeed,
                framerate   = customAddon.framerate,
                enablespin = ( customAddon.enablespin == "yes" || customAddon.enablespin == "1" ) ? false : true,
                showcursor  = (typeof customAddon.showcursor !== "undefined" && customAddon.showcursor == "yes")? true : false;                 
                
            $( document ).on( 'click', '.threesixty-btn', function () {
                setTimeout( function(){
                    $( '.threesixty_images' ).empty();
                    if( all_images != '' && all_images != undefined ) {
                        var images      = all_images.split( ',' ),
                            imgArray    = [];
                        for( var i = 0; i < images.length; i++ ) {
                            imgArray.push( images[i] );
                        }
                        
                        var product1 = $('.threesixty-products').ThreeSixty({
                            totalFrames: imgArray.length,
                            endFrame: imgArray.length,
                            currentFrame: 1,
                            imgList: '.threesixty_images',
                            progress: '.spinner',
                            height: 800,
                            width: width,
                            playSpeed: playspeed, //when play the 360 images
                            framerate: framerate, // Framerate
                            navigation: navigation, // Navigation
                            disableSpin: enablespin, // Enable Spin
                            imgArray: imgArray,// for image array
                            responsive: true, // for responsive
                            showCursor: showcursor,
                            drag: drag,
                            onDragStop: function(){ 
                        
                                // Make single active image if multiple current image found.
                                var el_ct_image = [];
                                $( '.threesixty-products' ).find("ol.threesixty_images").each(function(){
                                        
                                    // Collect all current image
                                    jQuery(this).find("li").each(function(){  
                                        if(jQuery(this).find("img").hasClass("current-image")){
                                            if(el_ct_image.length >0 ) {
                                                console.log(91);
                                                $( '.threesixty-products' ).find("ol.threesixty_images").find("li:first-child").find("img").attr("class","previous-image normal");
                                            } else {
                                                el_ct_image.push(jQuery(this));
                                            }
                                        }
                                    }); 
        
                                });
                            }
                        });  
                    }
                }, 100 );
            });

            $( '.threesixty-btn' ).magnificPopup({
                type: 'inline',
                mainClass: 'mfp-fade 360-single-popup',
                fixedContentPos: true,
                closeBtnInside: false,
                focus: '#product_360_wrap',
                autoFocusLast: false,
                callbacks: {                   
                    close: function() {                        
                        // For Nav bar destroy
                        var navBarLength = $( '#threesixty_content_wrap .nav_bar' ).length;
                        if( navBarLength > 0 ) {
                            for( var k = navBarLength; k > 0 ; k-- ) {
                                $( '#threesixty_content_wrap .nav_bar' ).remove();
                            }
                        }
                        $( this.content ).find( '#threesixty_content_wrap' ).stop();
                    }
                }
            });
        });

        // Initialize multiple 360 view of product images
        $(".custom-slider-cl").each(function(){
            var id = $( this ).attr( "id" );

            // Multiple Shortcode play pause button 
            setTimeout(function() {
                $( document ).on( 'click', '#'+id+' .nav_bar.top-right .btnPlay span', function () {
                    var $class = $( this ).attr( 'class' );
                    if( $class == 'icon-pause' ) {
                        if( ! $('.btnPlay span').hasClass( 'playing' ) ) {
                            $('.btnPlay span').removeClass('icon-pause').addClass('icon-play');
                        }
                        $(this).removeClass('icon-play').addClass('icon-pause playing');
                    } else {
                        $( this ).removeClass( 'playing' );
                        if( $('.btnPlay span').hasClass( 'playing' ) ) {
                            $('.btnPlay span').removeClass('icon-play').addClass('icon-pause');
                        }
                        $( this ).removeClass('icon-pause').addClass('icon-play');
                    }
                    
                });
            }, 2000);

            var allimages       = $( '#'+id ).attr( 'data-images' ),
                swidth           = $( '#'+id ).attr( 'data-width' ),
                v_navigation    = $(this).find(".cls-navigation").val(),
                v_enablespin   = $(this).find(".cls-enablespin").val(),
                v_showcursor    = $(this).find(".cls-showcursor").val(),
                v_fullscreen    = $(this).find(".cls-fullscreen").val(),
                v_playspeed     = $(this).find(".cls-playspeed").val(),
                v_framerate     = $(this).find(".cls-framerate").val(),
                v_drag          = $(this).find(".cls-drag").val();
            

                
            // Check whether an images are loaded for product 360
            if( allimages != '' && allimages != undefined ) {
                
                var images      = allimages.split( ',' ),
                    imgArray    = [];
                for( var i = 0; i < images.length; i++ ) {
                    imgArray.push( images[i] );
                }                
        
                // Initialize 360 view of product images by id
                var slider_config = {
                    totalFrames: imgArray.length,
                    endFrame: imgArray.length,
                    currentFrame: 1,
                    imgList: '.threesixty_images-'+id,
                    progress: '.spinner-'+id,      
                    height: 800,
                    width: swidth,
                    playSpeed: parseInt(v_playspeed),//when play the 360 images
                    framerate: parseInt(v_framerate), // navigation speed
                    navigation: ( typeof v_navigation !== "undefined"  && ( v_navigation == "true" || v_navigation == "1" ) ) ? true : false,
                    disableSpin: (   v_enablespin == "true" || v_enablespin == "1" ) ? false : true,
                    imgArray: imgArray,// for image array
                    responsive: true, // for responsive
                    showCursor: ( typeof v_showcursor !== "undefined" && ( v_showcursor == "true" || v_showcursor == "1" ) ) ? true : false,
                    drag: ( typeof v_drag !== "undefined" && ( v_drag == "true" || v_drag == "1" ) ) ? true : false,
                    fullscreen: ( typeof v_fullscreen !== "undefined" && ( v_fullscreen == "true" || v_fullscreen == "1" ) ) ? true : false,
                    fSBackgroundColor: '#fff',
                    zeroPadding: true,
                    onDragStop: function(){ 
                        
                        // Make single active image if multiple current image found.
                        var el_ct_image = [];
                        $( '.threesixty-products-'+id ).find("ol.threesixty_images").each(function(){
                                
                            // Collect all current image
                            jQuery(this).find("li").each(function(){  
                                if(jQuery(this).find("img").hasClass("current-image")){
                                    if(el_ct_image.length >0 ) {
                                        console.log(91);
                                        $( '.threesixty-products-'+id ).find("ol.threesixty_images").find("li:first-child").find("img").attr("class","previous-image normal");
                                    } else {
                                        el_ct_image.push(jQuery(this));
                                    }
                                }
                            }); 

                        }); 
                       
                    }
                };
                
                var threesixty_product_object = $( '.threesixty-products-'+id ).ThreeSixty( slider_config );
        
                // Attach full screen link with active image
                $(this).find('.full-screen').on('click touch', function() {
                    if (!document.fullscreenElement) {
                        jQuery(".short-threesixty-products li img").addClass('fullscreen_img');
                    }else{
                        jQuery(".short-threesixty-products li img").removeClass('fullscreen_img');
                    }
                    threesixty_product_object.fullscreen(); 
                });

                $(document).on('fullscreenchange', function() {
                     if (!document.fullscreenElement) {
                        jQuery("li img.current-image").removeClass('fullscreen_img');
                    }
                  });
                
                // Attach Zoom in/out link with active image
                var custom_slider_cl_ob = $(this);
                $(this).find('.image-zoomin').on('click touch', function() {  
                    jQuery( custom_slider_cl_ob ).find( ".short-threesixty-products" ).find( "li img.current-image" ).parent().find("a").trigger( "click" );
                });
            }
        });  

        // Periodically check for dubplicate active images
        setInterval(function () { 

            // Initialize zoom in/out and append required action links
            $( '.short-threesixty-products' ).each(function(){ 
                var count_init_setup_pan = 0;

                // Append action links for zoom in/out popup
                $(this).find("li").each(function(){  

                    // check weather popup link appended or not
                    if($(this).find(".pan").length <= 0) {
                        $(this).append("<a class='pan' data-big='"+$(this).find("img").attr("src")+"' href='#' ></a>");
                        count_init_setup_pan = 1;
                    }  

                }); 
                
                // Initialize zoom in/out if action link added.
                if(count_init_setup_pan==1){
                    $(".pan").pan(); 
                }
            });   
        }, 500);

        setTimeout(function () {
            if( jQuery( 'ol' ).hasClass( 'flex-control-thumbs' ) ) {
                var threesixtyBtn = jQuery( '.woocommerce-product-gallery__wrapper a.threesixty-btn' );
                threesixtyBtn.unwrap();
                jQuery( '.woocommerce-product-gallery__wrapper' ).after(threesixtyBtn);
            }
        }, 500);
        
    })( jQuery );