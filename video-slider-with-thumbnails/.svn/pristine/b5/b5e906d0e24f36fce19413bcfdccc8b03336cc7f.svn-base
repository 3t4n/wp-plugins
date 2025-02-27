/*

    GalleryView - jQuery Content Gallery Plugin
    Author:        Jack Anderson
    Version:    3.0 DEVELOPMENT

      See README.txt for instructions on how to markup your HTML
      
      
      Resizefunctionality by Jeroen Penninck
*/

// Make sure Object.create is available in the browser (for our prototypal inheritance)
// Courtesy of Douglas Crockford
if (typeof Object.create !== 'function') {
    Object.create = function (o) {
        function F() {}
        F.prototype = o;
        return new F();
    };
}

(function ($) {
    // custom image object
    var gvImage = function (img) {

        this.src = { 
            panel: img.data('original') || img.attr('src'),
            frame: img.data('frame') || img.data('original') || img.attr('src')
        };
        this.scale = {
            panel: null,
            frame: null
        };
        this.height = 0;
        this.width = 0;
        this.attrs = {
            title: img.attr('title') || img.attr('alt'),
            description: img.data('description'),
            vurl: img.data('vurl'),
            media: img.data('media'),
            html5_attr:img.data('html5_attr'),
            html5_vurl:img.data('html5_vurl'),
            html5_vurl1:img.data('html5_vurl1'),
            html5_vurl2:img.data('html5_vurl2'),
            html5_vurl3:img.data('html5_vurl3'),
            html5_filetype:img.data('html5_filetype'),
            html5_filetype1:img.data('html5_filetype1'),
            html5_filetype2:img.data('html5_filetype2'),
            html5_filetype3:img.data('html5_filetype3'),
            vtype:img.data('vtype'),
 
        };
        this.href = img.data('href');  // Important for clickable links
        this.target = img.data('target');  // Important for clickable links
        this.dom_obj = null;
        
        return this;
    },
    
    // utility function wrapper
    gv = {
        getInt: function(i) {
            i = parseInt(i, 10);
            return isNaN(i) ? 0 : i;
        },
        innerWidth: function(elem) {
            return this.getInt(elem.css('width')) || 0;    
        },
        outerWidth: function(elem) {
            return     this.innerWidth(elem) + 
                    this.extraWidth(elem);
        },
        extraWidth: function(elem) {
            return    this.getInt(elem.css('paddingLeft')) +
                    this.getInt(elem.css('paddingRight')) +
                    this.getInt(elem.css('borderLeftWidth')) +
                    this.getInt(elem.css('borderRightWidth'));    
        },
        innerHeight: function(elem) {
            return this.getInt(elem.css('height'))|| 0;
        },
        outerHeight: function(elem) {
            return     this.innerHeight(elem) + 
                    this.extraHeight(elem);
        },
        extraHeight: function(elem) {
            return     this.getInt(elem.css('paddingTop')) +
                    this.getInt(elem.css('paddingBottom')) +
                    this.getInt(elem.css('borderTopWidth')) +
                    this.getInt(elem.css('borderBottomWidth'));
        }
    },
    
    /*
        GalleryView - Object
            The main gallery class
    */        
    GalleryView = {
        // array of dom elements
        elems: [
            '.gvv_galleryWrap',    '.gvv_gallery',        '.gvv_panelWrap',        '.gvv_panel',
            'img.gvv_image',        '.gvv_infobar',        '.gvv_filmstripWrap',    '.gvv_filmstrip',
            '.gvv_frame',        '.gvv_thumbnail',     '.gvv_caption',             'img.gvv_thumb',
            '.gvv_navWrap',        '.gvv_navNext',        '.gvv_navPrev',            '.gvv_navPlay',
            '.gvv_panelNavNext',    '.gvv_panelNavPrev',    '.gvv_overlay',            '.gvv_showOverlay',
            '.gvv_imageStore'
        ],
        
        // create a jQuery element and apply attributes
        createElem: function(attrs,elem) {
            elem = document.createElement(elem);
            var $elem = $(elem);
            return $elem.attr(attrs);
        },
        
        // get the position of an element with respect
        // to the gallery wrapper
        getPos: function (el) {
            var self = this,
                dom = this.dom,
                el = el[0],
                el_id = el.id,
                left = 0,
                top = 0,
                gPos, gLeft, gTop;
                
            if (!el) { return { top: 0, left: 0 }; }
            
            if (el.offsetParent) {
                do {
                    left += el.offsetLeft;
                    top += el.offsetTop;
                } while (el = el.offsetParent);
            }
            
            //If we want the position of the gallery itself, return it
            if (el_id === self.id) { return { left: left, top: top }; }
            
            //Otherwise, get position of element relative to gallery
            else {
                gPos = self.getPos(dom.galleryWrap);
                gLeft = gPos.left;
                gTop = gPos.top;
                return { left: left - gLeft, top: top - gTop };
            }
        },
        
        // determine if mouse is within the boundary of the gallery wrapper
        mouseIsOverGallery: function (x, y) {
            var self = this,
                dom = this.dom,
                pos = this.getPos(dom.gvv_galleryWrap),
                top = pos.top,
                left = pos.left;
                
            return x > left && x < left + gv.outerWidth(dom.gvv_galleryWrap) && y > top && y < top + gv.outerHeight(dom.gvv_galleryWrap);
        },
        
        // determine if mouse is within the boundary of the panel
        mouseIsOverPanel: function (x, y) {
            var self = this,
                dom = this.dom,
                pos = this.getPos(dom.gvv_panelWrap),
                gPos = this.getPos(dom.gvv_galleryWrap),
                top = pos.top + gPos.top,
                left = pos.left + gPos.left;
                
            return x > left && x < left + gv.outerWidth(dom.gvv_panelWrap) && y > top && y < top + gv.outerHeight(dom.gvv_panelWrap);
        },
        
        // create gvImage objects for each image in gallery
        storeImages: function() {
            var self = this;
            this.sourceImgs = $('li>img',this.$el);
            this.numImages = this.sourceImgs.length;
            this.gvImages = [];
            this.sourceImgs.each(function(i,img) {
                self.gvImages[i] = new gvImage($(img));
            });
        },
        
        setDimensions: function(create) {
            create = typeof create !== 'undefined' ? create : true;

            var self = this,
                dom = this.dom,
                widths = {
                    prev: gv.innerWidth(dom.gvv_navPrev),
                    play: gv.innerWidth(dom.gvv_navPlay),
                    next: gv.innerWidth(dom.gvv_navNext),
                    filmstrip: this.opts.frame_width,
                    fsMax: 0,
                    fsFull: 0
                },
                heights = {
                    prev: gv.innerHeight(dom.gvv_navPrev),
                    play: gv.innerHeight(dom.gvv_navPlay),
                    next: gv.innerHeight(dom.gvv_navNext),
                    filmstrip: this.opts.frame_height + (this.opts.show_captions ? gv.outerHeight(dom.gvv_caption) : 0),
                    fsMax: 0,
                    fsFull: 0
                },
                panels = [];
            
            // nav
            if(this.filmstripOrientation === 'horizontal') {
                dom.gvv_navWrap.css({
                    width: 'auto',
                    height: 'auto'
                });
            } else {
                if(this.opts.filmstrip_style === 'scroll' && this.opts.frame_width < (widths.prev + widths.play + widths.next)) {
                    dom.gvv_navWrap.css({
                        width: 'auto',
                        height: 'auto'
                    });
                } else {
                    dom.gvv_navWrap.css({
                        width: 'auto',
                        height: 'auto'
                    });
                }
            }
            
            if(this.filmstripOrientation === 'vertical' && widths.filmstrip < (widths.prev + widths.play + widths.next)) {
                dom.gvv_navWrap.css({
                    width: 'auto',
                    height: 'auto'
                });
            } else {
                dom.gvv_navWrap.css({
                    width: 'auto',
                    height: 'auto'
                });
            }
            
            // panels
            dom.gvv_panel.css({
                width: this.opts.panel_width,
                height: this.opts.panel_height
            });
            dom.gvv_panelWrap.css({
                width: gv.outerWidth(dom.gvv_panel),
                height: gv.outerHeight(dom.gvv_panel)
            });
            dom.gvv_overlay.css({
                width: this.opts.panel_width
            });
            
            
            if(create){
                $.each(this.gvImages,function(i,img) {
                    dom.gvv_panelWrap.append(dom.gvv_panel.clone(true));
                });
              
                dom.gvv_panels = dom.gvv_panelWrap.find('.gvv_panel');
                dom.gvv_panels.remove();
                    
            }else{
                this_opts = this.opts;
                $.each(dom.gvv_panels,function(i,panel) {
                    $(panel).css({
                        width: this_opts.panel_width,
                        height: this_opts.panel_height
                    });
                });
            }
            
            // filmstrip
            dom.gvv_thumbnail.css({
                width: this.opts.frame_width,
                height: this.opts.frame_height
            });
            dom.gvv_frame.css({
                width: gv.innerWidth(dom.gvv_thumbnail),
                height: gv.outerHeight(dom.gvv_thumbnail) + (this.opts.show_captions ? gv.outerHeight(dom.gvv_caption) : 0),
                marginRight: this.opts.frame_gap,
                marginBottom: this.opts.frame_gap
            });
            
            
            
            if(!create){
                //also change clones
                dom.gvv_filmstrip.find('.gvv_thumbnail').css({
                    width: this.opts.frame_width-7,
                    height: this.opts.frame_height-7
                });
                dom.gvv_filmstrip.find('.gvv_frame').css({
                    width: gv.innerWidth(dom.gvv_thumbnail),
                    height: gv.outerHeight(dom.gvv_thumbnail) + (this.opts.show_captions ? gv.outerHeight(dom.gvv_caption) : 0),
                    marginRight: this.opts.frame_gap,
                    marginBottom: this.opts.frame_gap
                });
            }
            
            
            if(this.filmstripOrientation === 'horizontal') {
                
                
                this.filmstripSize = (gv.outerWidth(dom.gvv_panelWrap) - gv.outerWidth(dom.gvv_navWrap)) / (gv.innerWidth(dom.gvv_frame) + this.opts.frame_gap);
                afterdot=this.filmstripSize .toString().split(".")[1];
                afterdot=parseFloat('0.'+afterdot);
                if(afterdot>0.97){
                    
                    this.filmstripSize = Math.round((gv.outerWidth(dom.gvv_panelWrap) - gv.outerWidth(dom.gvv_navWrap)) / (gv.innerWidth(dom.gvv_frame) + this.opts.frame_gap));
                }
                else{
                    
                    this.filmstripSize = Math.floor((gv.outerWidth(dom.gvv_panelWrap) - gv.outerWidth(dom.gvv_navWrap)) / (gv.innerWidth(dom.gvv_frame) + this.opts.frame_gap));
                }
                
                
                widths.fsMax = this.filmstripSize * (gv.innerWidth(dom.gvv_frame) + this.opts.frame_gap);
                widths.fsFull = this.gvImages.length * (gv.innerWidth(dom.gvv_frame) + this.opts.frame_gap);
                widths.filmstrip = Math.min(widths.fsMax,widths.fsFull);
                if(this.opts.filmstrip_style !== 'scroll') {
                    heights.filmstrip = (Math.ceil(this.gvImages.length / this.filmstripSize) * (gv.innerHeight(dom.gvv_frame) + this.opts.frame_gap)) - this.opts.frame_gap;
                }
            } else {
                
                this.filmstripSize = (gv.outerHeight(dom.gvv_panelWrap) - gv.innerHeight(dom.gvv_navWrap)) / (gv.innerHeight(dom.gvv_frame) + this.opts.frame_gap);
                afterdot=this.filmstripSize .toString().split(".")[1];
                afterdot=parseFloat('0.'+afterdot);
                if(afterdot>0.97){
                    
                    this.filmstripSize = Math.round((gv.outerHeight(dom.gvv_panelWrap) - gv.innerHeight(dom.gvv_navWrap)) / (gv.innerHeight(dom.gvv_frame) + this.opts.frame_gap));
                }
                else{
                    
                    this.filmstripSize = Math.floor((gv.outerHeight(dom.gvv_panelWrap) - gv.innerHeight(dom.gvv_navWrap)) / (gv.innerHeight(dom.gvv_frame) + this.opts.frame_gap));
                }
                heights.fsMax = this.filmstripSize * (gv.innerHeight(dom.gvv_frame) + this.opts.frame_gap);
                heights.fsFull = this.gvImages.length * (gv.innerHeight(dom.gvv_frame) + this.opts.frame_gap);
                heights.filmstrip = Math.min(heights.fsMax,heights.fsFull);
                if(this.opts.filmstrip_style !== 'scroll') {
                    widths.filmstrip = (Math.ceil(this.gvImages.length / this.filmstripSize) * (gv.innerHeight(dom.gvv_frame) + this.opts.frame_gap)) - this.opts.frame_gap;
                }
            }
            dom.gvv_filmstripWrap.css({
                width: widths.filmstrip,
                height: heights.filmstrip
            });
            
            // gallery
            if(this.opts.show_filmstrip) {
                if(this.filmstripOrientation === 'horizontal') {
                    dom.gvv_gallery.css({
                        width: gv.outerWidth(dom.gvv_panelWrap),
                        height: gv.outerHeight(dom.gvv_panelWrap) + this.opts.frame_gap + (this.opts.show_filmstrip ? Math.max(gv.outerHeight(dom.gvv_filmstripWrap),gv.outerHeight(dom.gvv_navWrap)) : gv.outerHeight(dom.gvv_filmstripWrap))
                    });
                } else {
                    dom.gvv_gallery.css({
                        width: gv.outerWidth(dom.gvv_panelWrap) + this.opts.frame_gap + (this.opts.show_filmstrip ? Math.max(gv.outerWidth(dom.gvv_filmstripWrap),gv.outerWidth(dom.gvv_navWrap)) : gv.outerWidth(dom.gvv_filmstripWrap)),
                        height: gv.outerHeight(dom.gvv_panelWrap)
                    });    
                }
            } else {
                dom.gvv_gallery.css({
                    width: gv.outerWidth(dom.gvv_panelWrap),
                    height: gv.outerHeight(dom.gvv_panelWrap)
                });    
            }
            
            dom.gvv_galleryWrap.css({
                    width: gv.outerWidth(dom.gvv_gallery),
                    height: gv.outerHeight(dom.gvv_gallery),
                    padding: this.opts.frame_gap
            });
        },
        
        setPositions: function(create) {
            create = typeof create !== 'undefined' ? create : true;
            
            var self = this,
                dom = this.dom,
                navVert = 0, fsVert = 0,
                navHorz = 0, fsHorz = 0,
                vert, horz;
            
            // determine vertical or horizontal offset
            // if negative, apply to filmstrip, otherwise apply to navbar
            if(this.filmstripOrientation === 'horizontal') {
                vert = Math.round((gv.outerHeight(dom.gvv_filmstripWrap) - gv.outerHeight(dom.gvv_navWrap)) / 2);
                if(vert < 0) { fsVert = -1 * vert; }
                else { navVert = vert; }
            } else {
                horz = Math.round((gv.outerWidth(dom.gvv_filmstripWrap) - gv.outerWidth(dom.gvv_navWrap)) / 2);
                if(horz < 0) { fsHorz = -1 * horz; }
                else { navHorz = horz; }
            }
            
            // for horizontal filmstrips w/o navigation, center the filmstrip under the panel
            if(!this.opts.show_filmstrip_nav && this.filmstripOrientation === 'horizontal') {
                fsHorz = Math.floor((gv.outerWidth(dom.gvv_panelWrap) - gv.outerWidth(dom.gvv_filmstripWrap)) / 2);
            }
            
            dom.gvv_panelNavNext.css({ top: (gv.outerHeight(dom.gvv_panel) - gv.outerHeight(dom.gvv_panelNavNext)) / 2, right: 10 });
            dom.gvv_panelNavPrev.css({ top: (gv.outerHeight(dom.gvv_panel) - gv.outerHeight(dom.gvv_panelNavPrev)) / 2, left: 10 });
            
            // pin elements to gallery corners according to filmstrip position
            switch(this.opts.filmstrip_position) {
                case 'top':
                    dom.gvv_navWrap.css({ top: navVert, right: navHorz });
                    dom.gvv_panelWrap.css({ bottom: 0, left: 0 });
                    dom.gvv_filmstripWrap.css({ top: fsVert, left: fsHorz });
                    break;
                
                case 'right':
                    dom.gvv_navWrap.css({ bottom: navVert, right: navHorz });
                    dom.gvv_panelWrap.css({ top: 0, left: 0 });
                    dom.gvv_filmstripWrap.css({ top: fsVert, right: fsHorz });
                    break;
                
                case 'left':
                    dom.gvv_navWrap.css({ bottom: navVert, left: navHorz });
                    dom.gvv_panelWrap.css({ top: 0, right: 0 });
                    dom.gvv_filmstripWrap.css({ top: fsVert, left: fsHorz });
                    break;
                
                default:
                    dom.gvv_navWrap.css({ bottom: navVert, right: navHorz });
                    dom.gvv_panelWrap.css({ top: 0, left: 0 });
                    dom.gvv_filmstripWrap.css({ bottom: fsVert, left: fsHorz });
                    break;
            }
            
            if(this.opts.overlay_position === 'top') {
                dom.gvv_overlay.css({ top: 0/*, left: -99999*/ });
                dom.gvv_showOverlay.css({ top: 0, left: 0 });
            } else {
                dom.gvv_overlay.css({ bottom: 0/*, left: -99999 */});
                dom.gvv_showOverlay.css({ bottom: 0, left: 0 });
            }
            
            if(create){
                if(!this.opts.show_filmstrip_nav) {
                    dom.gvv_navWrap.remove();    
                }
            }
        },
        
        buildFilmstrip: function(create) {
            create = typeof create !== 'undefined' ? create : true;
        
            var self = this,
                dom = this.dom,
                framesLength = this.gvImages.length * ((this.filmstripOrientation === 'horizontal' ? this.opts.frame_width : this.opts.frame_height) + this.opts.frame_gap);
            
            if(create){
                dom.gvv_frame.append(dom.gvv_thumbnail);
                if(this.opts.show_captions) { 
                    dom.gvv_frame.append(dom.gvv_caption);
                }
                dom.gvv_thumbnail.css('opacity',this.opts.frame_opacity);
                
                dom.gvv_thumbnail.bind({
                    mouseover: function() {
                        if(!$(this).hasClass('current')) {
                        $(this).stop().animate({opacity:1},250);
                        }
                    },
                    mouseout: function() {
                        if(!$(this).hasClass('current')) {
                            $(this).stop().animate({opacity:self.opts.frame_opacity},250);
                        }
                    }
                });
                
                // Drop a clone of the frame element into the filmstrip for each source image
                $.each(this.gvImages,function(i,img) {
                    dom.gvv_frame.clone(true).prependTo(dom.gvv_filmstrip);
                });
            }
            
            dom.gvv_filmstrip.css({
                width: gv.outerWidth(dom.gvv_frame),
                height: gv.outerHeight(dom.gvv_frame)
            });
      
            this.framesLength=framesLength;
            
            // If we are scrolling the filmstrip, and we can't show all frames at once,
            // make two additional copies of each frame
            if(this.opts.filmstrip_style === 'scroll') {
                if(this.filmstripOrientation === 'horizontal') {
                    if(create){
                        dom.gvv_filmstrip.find('.gvv_frame').clone(true).addClass("hideifnoscrolling").appendTo(dom.gvv_filmstrip).clone(true).appendTo(dom.gvv_filmstrip);
                    }
          
                    this.activateScrolling(framesLength > gv.innerWidth(dom.gvv_filmstripWrap));
                } else {
                    if(create){
                        dom.gvv_filmstrip.find('.gvv_frame').clone(true).appendTo(dom.gvv_filmstrip).clone(true).appendTo(dom.gvv_filmstrip);
                    }
          
                    this.activateScrolling(framesLength > gv.innerHeight(dom.gvv_filmstripWrap));
                }
            } else {
                dom.gvv_filmstrip.css({
                    width: parseInt(dom.gvv_filmstripWrap.css('width'),10)+this.opts.frame_gap,
                    height: parseInt(dom.gvv_filmstripWrap.css('height'),10)+this.opts.frame_gap
                });
            }
            
            if(create){
                dom.gvv_frames = dom.gvv_filmstrip.find('.gvv_frame');
                $.each(dom.gvv_frames,function(i,frame) {
                    $(frame).data('frameIndex',i);                          
                });
                dom.gvv_thumbnails = dom.gvv_filmstrip.find('div.gvv_thumbnail');
            }
        },
        
        activateScrolling: function(activate){
        
            // activate / deactivate scrolling and set the correct filmstripsize
            var dom = this.dom;
            if(this.filmstripOrientation === 'horizontal') {
                if(activate) {
                    dom.gvv_filmstrip.css('width',this.framesLength * 3);
                    this.scrolling = true;
                } else {
                    dom.gvv_filmstrip.css('width',this.framesLength);
                    this.scrolling = false;
                }
            }else{
                if(activate) {
                    dom.gvv_filmstrip.css('height',this.framesLength * 3);
                    this.scrolling = true;
                } else {
                    dom.gvv_filmstrip.css('height',this.framesLength);
                    this.scrolling = false;
                }
            }
      
            // show / hide the extra thumbs used in the scroller
            if(activate){
                this.dom.gvv_filmstrip.find('.hideifnoscrolling').show();
            }else{
                this.dom.gvv_filmstrip.find('.hideifnoscrolling').hide();
            }
      
            //stop thumb animation
            if(dom.gvv_thumbnails!=undefined){
                dom.gvv_thumbnails.stop(true,true);
            }
      
            //scroll to correct location
            this.dom.gvv_filmstrip.stop(true,true).css({left:0, top:0});
      
            if(activate) {
                var currentFrame = this.frameIterator;
                this.frameIterator=0;//scroll from position 0
                if(dom.gvv_thumbnails!=undefined){
                    this.updateFilmstrip(currentFrame);
                }
                
                this.dom.gvv_filmstrip.stop(true,true);
            }
        },
        
        buildGallery: function(create) {
            create = typeof create !== 'undefined' ? create : true;
      
            var self = this,
                dom = this.dom;
            
            this.setDimensions(create);
            this.setPositions(create);
            
            if(this.opts.show_filmstrip) {
                this.buildFilmstrip(create);
            }
        },
        
        showInfoBar: function() {
            if(!this.opts.show_infobar) { return; }
            var self = this,
                dom = this.dom;
            
            dom.gvv_infobar.stop().stopTime('hideInfoBar_' + self.id).html((this.iterator+1) + ' of ' + this.numImages).show().css('opacity',this.opts.infobar_opacity);
            
            dom.gvv_infobar.oneTime(2000 + this.opts.transition_speed,'hideInfoBar_' + self.id,function() {
                    dom.gvv_infobar.fadeOut(1000);
                });
        },
        
        initImages: function() {
            var self = this,
                dom = this.dom;
            $.each(this.gvImages,function(i,gvImage) {
                
                var img = $('<img/>');
                img.css('visibility','hidden').data('index',i);
                img.bind('load.galleryview',function() {
                    var _img = $(this),
                        index = _img.data('index'),
                        parent = dom[(_img.data('parent')).type].eq((_img.data('parent')).index),
                        parentType = parent.hasClass('gvv_panel') ? 'panel' : 'frame',
            width = this.width,
            height = this.height;
                    
                    _img.bind("resizegalleryimage1", function(){
                        
                        var _img = $(this),
                            widthFactor = gv.innerWidth(parent) / width,
                            heightFactor = gv.innerHeight(parent) / height,
                            heightOffset = 0, widthOffset = 0;
                        
                        
                        
                        gvImage.scale[parentType] = self.opts[parentType+'_scale'] === 'fit' ? Math.min(widthFactor,heightFactor) : Math.max(widthFactor,heightFactor);
                        
                        //if can not upscale
                        if(!self.opts.panel_can_upscale_image && gvImage.scale[parentType]>1){
                            gvImage.scale[parentType]=1;
                        }
                        
                        
                        widthOffset = Math.round((gv.innerWidth(parent) - (width * gvImage.scale[parentType])) / 2);
                        heightOffset = Math.round((gv.innerHeight(parent) - (height * gvImage.scale[parentType])) / 2);    
                        
                        if(self.opts['panel_scale']=='stretch' && parentType=='panel'){
                             
                            _img.css({
                                width:'100%',
                                height: '100%',
                                //top: heightOffset,
                                right: self.opts['frame_gap']+'px',
                                maxWidth:'inherit'
                            });
                            
                        }
                        else{
                            
                              if(parentType=='panel' &&  self.opts['panel_scale']=='crop'){
                              
                                 _img.css({
                                width: width * gvImage.scale[parentType],
                                height: height * gvImage.scale[parentType],
                                top: heightOffset,
                                left: widthOffset,                 
                                maxWidth:'inherit'
                                }); 
                                //$(".gvv_panel").css({width:$(".gvv_panel").innerWidth()-self.opts['frame_gap']});
                              }else{
                                  
                                  _img.css({
                                    width: width * gvImage.scale[parentType],
                                    height: height * gvImage.scale[parentType],
                                    top: heightOffset,
                                    left: widthOffset,                 
                                    maxWidth:'inherit'
                                  });
                              }
                              
                        }
                    });
                    
                    _img.bind("resizegalleryimage", function(){
                        var _img = $(this),
                            widthFactor = gv.innerWidth(parent) / width,
                            heightFactor = gv.innerHeight(parent) / height,
                            heightOffset = 0, widthOffset = 0;
                        
                        gvImage.scale[parentType] = self.opts[parentType+'_scale'] === 'fit' ? Math.min(widthFactor,heightFactor) : Math.max(widthFactor,heightFactor);
                        
                        //if can not upscale
                        if(!self.opts.panel_can_upscale_image && gvImage.scale[parentType]>1){
                            gvImage.scale[parentType]=1;
                        }
                        
                        
                        widthOffset = Math.round((gv.innerWidth(parent) - (width * gvImage.scale[parentType])) / 2);
                        heightOffset = Math.round((gv.innerHeight(parent) - (height * gvImage.scale[parentType])) / 2);    
                        
                        _img.css({
                            width: (width * gvImage.scale[parentType]),
                            height: height * gvImage.scale[parentType],
                            top: heightOffset,
                            left: widthOffset ,
                            maxWidth:'inherit'
                        });
                    });
                    _img.trigger("resizegalleryimage");
                    
                    _img.hide().css('visibility','visible');
                    _img.detach().appendTo(parent);
                    
                    if(parentType === 'frame') {
                        _img.fadeIn();
                        parent.parent().removeClass('gvv_frame-loading');
                        parent.parent().find('.gvv_caption').html(gvImage.attrs.title);
                    } else if(index === self.opts.start_frame - 1) {
                        parent.prependTo(dom.gvv_panelWrap);
                        parent.removeClass('gvv_panel-loading');
                        _img.fadeIn();
                        self.showInfoBar();
                    } else {
                        parent.removeClass('gvv_panel-loading');
                        _img.show();
                    }
                    

                    if(i==0){
                        
                        
                       // console.log(dom);
                        
                         vtype=gvImage.attrs.vtype;
                        if(gvImage.attrs.media=="video" && vtype!='html5'){

                            $(dom.gvv_panelWrap).find(".gvv_panel img").replaceWith('<iframe style="width:100%;height:100%" src="'+gvImage.attrs.vurl+'" frameborder="0" allowfullscreen></iframe>'); 
                        }
                        else if(gvImage.attrs.vtype=="html5"){
                            
                            
                             html5_attr=gvImage.attrs.html5_attr;
                             
                             html5_vurl=gvImage.attrs.html5_vurl;
                             html5_filetype=gvImage.attrs.html5_filetype;
                             html5_vurl1=gvImage.attrs.html5_vurl1;
                             html5_filetype1=gvImage.attrs.html5_filetype1;
                             html5_vurl2=gvImage.attrs.html5_vurl2;
                             html5_filetype2=gvImage.attrs.html5_filetype2;
                             html5_vurl3=gvImage.attrs.html5_vurl3;
                             html5_filetype3=gvImage.attrs.html5_filetype3;
                             //html5_attr=decodeURIComponent(html5_attr);
                             html5_attr=decodeURIComponent((html5_attr+'').replace(/\+/g, '%20'));

                             strvideo='<video style="width:100%;height:100%" '+html5_attr+' > ';
                             strvideo+='<source type="'+html5_filetype+'"  src="'+html5_vurl+'"  /> ';
                             
                             if(html5_vurl1!=''){
                                 
                                 strvideo+=' <source type="'+html5_filetype1+'"  src="'+html5_vurl1+'"  /> ';
                            }
                            
                              if(html5_vurl2!=''){
                                 
                                 strvideo+=' <source type="'+html5_filetype2+'"  src="'+html5_vurl2+'"  /> ';
                            }
                            
                              if(html5_vurl3!=''){
                                 
                                 strvideo+=' <source type="'+html5_filetype3+'"  src="'+html5_vurl3+'"  /> ';
                            }
                            
                            strvideo+=' Your browser does not support the video tag.</video>';
                           
                             $(dom.gvv_panelWrap).find(".gvv_panel img").replaceWith(strvideo); 
                            
                        }
                       
                     }
                    
                });
                
                // store eventual image container as data property
                // append to temporary storage element and set src
                if(self.opts.show_panels) {
                    img.clone(true)
                        .data('parent',{type:'gvv_panels',index:i})
                        .appendTo(dom.gvv_imageStore)
                        .attr('src',gvImage.src.panel);
                }
                
                if(self.opts.show_filmstrip) {
                    img.clone(true)
                        .data('parent',{type:'gvv_thumbnails',index:i})
                        .appendTo(dom.gvv_imageStore)
                        .attr('src',gvImage.src.frame);
                    
                    if(dom.gvv_frames.length > dom.gvv_panels.length) {
                        img.clone(true)
                            .data('parent',{type:'gvv_thumbnails',index:i+self.numImages})
                            .appendTo(dom.gvv_imageStore)
                            .attr('src',gvImage.src.frame);
                            
                        img.clone(true)
                            .data('parent',{type:'gvv_thumbnails',index:i+self.numImages+self.numImages})
                            .appendTo(dom.gvv_imageStore)
                            .attr('src',gvImage.src.frame);
                    }
                }
            });
        },
        
        showNext: function() {
            
            this.navAction = 'next';
            this.showItem(this.frameIterator+1);
        },
        
        showPrev: function() {
            this.navAction = 'prev';
            this.showItem(this.frameIterator-1);
        },
        
        showItem: function(i) {
            if(isNaN(i)) { return; }
            if(!this.opts.show_filmstrip) { i = i % this.numImages; }
            
            var self = this,
                dom = this.dom,
                frame_i = i,
                newPanelStart,
                oldPanelEnd,
                oldIterator,
                panel,
                playing = false;
                
            // don't go out of bounds
            if(i >= this.numImages) {
                i = i % this.numImages;
            } else if(i < 0) {
                i = this.numImages - 1;
                if(dom.gvv_frames != undefined) {
                    frame_i = dom.gvv_frames.length - 1;
                } else {
                    frame_i = dom.gvv_panels.length - 1;
                }
            }

            if( i == this.iterator ) {
              return;
            }
            
            panel = dom.gvv_panels.eq(i);
            
            playing = this.playing;
            
            if(playing) {
                this.stopSlideshow(false);
            }
            
            this.unbindActions();
            
            dom.gvv_gallery.oneTime(this.opts.transition_speed,'bindActions_' + self.id,function(){ if(playing) { self.startSlideshow(false); } self.bindActions(); });
            
            switch(this.opts.panel_animation) {
                case 'crossfade':
                    
                    dom.gvv_panels.eq(this.iterator).fadeOut(this.opts.transition_speed,function(){$(this).detach();});
                    panel.hide().prependTo(dom.gvv_panelWrap).fadeIn(this.opts.transition_speed);
                    break;
                case 'fade':
                    dom.gvv_panels.eq(this.iterator).detach();
                    panel.hide().prependTo(dom.gvv_panelWrap).fadeIn(this.opts.transition_speed);
                    break;
                case 'slide':
                    if(this.navAction === 'next' || (this.navAction === 'frame' && frame_i > this.iterator)) {
                        newPanelStart = gv.outerWidth(dom.gvv_panel);
                        oldPanelEnd = -1 * gv.outerWidth(dom.gvv_panel);
                    } else {
                        newPanelStart = -1 * gv.outerWidth(dom.gvv_panel);
                        oldPanelEnd = gv.outerWidth(dom.gvv_panel);
                    }
                    
                    panel.css({ left:newPanelStart }).appendTo(dom.gvv_panelWrap).animate(
                        { left:0 },
                        { duration: this.opts.transition_speed,easing: this.opts.easing }
                    );
                    
                    dom.gvv_panels.eq(this.iterator).animate(
                        { left: oldPanelEnd },
                        { duration: this.opts.transition_speed, easing: this.opts.easing, complete: function(){ $(this).detach(); } }
                    );
                    break;
                default:
                    dom.gvv_panels.eq(this.iterator).detach();
                    panel.prependTo(dom.gvv_panelWrap);
                    break;
            }
            
            // call the resize event again because IE does not seem to like it
            // when image are resized that are not on the screen...
            $("img", this.gvv_galleryWrap).trigger( "resizegalleryimage" );
            
            this.updateOverlay(i);
          //  this.updateClickable(i);
            
            this.iterator = i;
            this.updateFilmstrip(frame_i);
            this.showInfoBar();
            
            
            if(document.getSelection){
               // document.getSelection().removeAllRanges(); // fixes selection of item
            }
            
            
            vtype=this.gvImages[i].attrs.vtype;
            if(this.gvImages[i].attrs.media=="video" && vtype!='html5'){    
            
                
                $(dom.gvv_panelWrap).find(".gvv_panel img").replaceWith('<iframe style="width:100%;height:100%" src="'+this.gvImages[i].attrs.vurl+'" frameborder="0" allowfullscreen></iframe>'); 
            }
             else if(this.gvImages[i].attrs.vtype=="html5"){
                            
                                
                             html5_attr=this.gvImages[i].attrs.html5_attr;
                             html5_vurl=this.gvImages[i].attrs.html5_vurl;
                             html5_filetype=this.gvImages[i].attrs.html5_filetype;
                             html5_vurl1=this.gvImages[i].attrs.html5_vurl1;
                             html5_filetype1=this.gvImages[i].attrs.html5_filetype1;
                             html5_vurl2=this.gvImages[i].attrs.html5_vurl2;
                             html5_filetype2=this.gvImages[i].attrs.html5_filetype2;
                             html5_vurl3=this.gvImages[i].attrs.html5_vurl3;
                             html5_filetype3=this.gvImages[i].attrs.html5_filetype3;
                             //html5_attr=decodeURIComponent(html5_attr);
                             html5_attr=decodeURIComponent((html5_attr+'').replace(/\+/g, '%20'));

                             strvideo='<video style="width:100%;height:100%" '+html5_attr+' > ';
                             strvideo+='<source type="'+html5_filetype+'"  src="'+html5_vurl+'"  /> ';
                             
                             if(html5_vurl1!=''){
                                 
                                 strvideo+=' <source type="'+html5_filetype1+'"  src="'+html5_vurl1+'"  /> ';
                            }
                            
                              if(html5_vurl2!=''){
                                 
                                 strvideo+=' <source type="'+html5_filetype2+'"  src="'+html5_vurl2+'"  /> ';
                            }
                            
                              if(html5_vurl3!=''){
                                 
                                 strvideo+=' <source type="'+html5_filetype3+'"  src="'+html5_vurl3+'"  /> ';
                            }
                            
                            strvideo+=' Your browser does not support the video tag.</video>';
                           
                             $(dom.gvv_panelWrap).find(".gvv_panel img").replaceWith(strvideo); 
                             
                             
                    
                
            }
            //alert(this.gvImages[i].attrs.vurl);
           // console.log$(this.gvImages[i]).attr('data-vurl');
             //$j(".gvv_panel img").replaceWith('<iframe style="width:100%;height:100%" src="https://www.youtube.com/embed/zwibXy4CCgo" frameborder="0" allowfullscreen></iframe>'); 
            
        },
        
        updateOverlay: function(i) {
            
            var self = this,
                dom = this.dom;
            
            var cursorStyle = '';

            if (this.opts.clickable == 'overlay' || this.opts.clickable == 'all') {
                cursorStyle = ' class="cursor_pointer"';
            }
            
            var closeTop=''
            if(this.opts.overlay_position === 'bottom'){
           
                closeTop='top:-15px';
            }
           
            if($.trim(self.gvImages[i].attrs.title)!="" || $.trim(self.gvImages[i].attrs.description)!=""){
            var overlayHtml = '<h4' + cursorStyle + '>' + 
                self.gvImages[i].attrs.title + '<a class="overlay-close" style="display: inline;'+closeTop+'"></a></h4><p>' + 
                self.gvImages[i].attrs.description + '</p>';

            }
            else{
                 overlayHtml='';
            }
            if(this.overlayVisible) {
                
                this.hideOverlay(null,function(){
                    dom.gvv_overlay.html('<h4>'+self.gvImages[i].attrs.title+'<a class="overlay-close" style="display: inline;'+closeTop+'"></a></h4><p>'+self.gvImages[i].attrs.description+'</p>');
                    self.showOverlay();
                });
                
                dom.gvv_overlay.show();
            } else {
                dom.gvv_overlay.html('<h4>'+self.gvImages[i].attrs.title+'<a class="overlay-close" style="display: inline;'+closeTop+'"></a></h4><p>'+self.gvImages[i].attrs.description+'</p>');
                dom.gvv_overlay.css(this.opts.overlay_position,-1 * dom.gvv_overlay.outerHeight());
            }
            
            if (this.opts.clickable == 'overlay' || this.opts.clickable == 'all') {
                dom.gvv_panelWrap.undelegate('.gvv_overlay h4', 'click.galleryview');
                dom.gvv_panelWrap.delegate('.gvv_overlay h4', 'click.galleryview', this.doClick(self.gvImages[i].href,self.gvImages[i].target));
            }
            
        },
        
        hideOverlay: function(s,callback) {
            var self = this,
                dom = this.dom,
                endOverlay = {},
                endButton = {},
                speed = s || self.opts.transition_speed / 2;
                
            callback = callback || function(){};
            
            endOverlay[this.opts.overlay_position] = -1 * dom.gvv_overlay.outerHeight();
            endButton[this.opts.overlay_position] = 0;
            
            dom.gvv_overlay.animate(endOverlay,{ 
                duration: speed, 
                easing: 'swing', 
                complete: callback
            });
            dom.gvv_showOverlay.animate(endButton,{
                duration: speed,
                easing: 'swing'
            });
            
            this.overlayVisible = false;
        },
        
        showOverlay: function(s) {
            var self = this,
                dom = this.dom,
                startOverlay = {},
                endOverlay = {},
                endButton = {},
                speed = s || self.opts.transition_speed / 2;
            
            startOverlay[this.opts.overlay_position] = -1 * dom.gvv_overlay.outerHeight();
            startOverlay.left = 0;
            
            endOverlay[this.opts.overlay_position] = 0;
            
            endButton[this.opts.overlay_position] = dom.gvv_overlay.outerHeight();
            
            dom.gvv_overlay.css(startOverlay);
            dom.gvv_overlay.animate(endOverlay,{ duration: speed, easing: 'swing' });
            dom.gvv_showOverlay.animate(endButton,{ duration: speed, easing: 'swing' });
            
            this.overlayVisible = true;
        },
        
        updateFilmstrip: function(to) {
            if(!this.opts.show_filmstrip) { this.frameIterator = to; return; }
            var self = this,
                dom = this.dom,
                targetThumbs = dom.gvv_thumbnails.eq(this.iterator),
                filmstripIterator,
                distance;
            
            if(this.scrolling) {
                targetThumbs = targetThumbs.
                                add(dom.gvv_thumbnails.eq(this.iterator + this.numImages)).
                                add(dom.gvv_thumbnails.eq(this.iterator + (2 * this.numImages)));    
            }
            
            dom.gvv_thumbnails.removeClass('current').animate({ opacity: this.opts.frame_opacity });
            targetThumbs.stop().addClass('current').animate({ opacity: 1 },500);
            
            
            if(this.scrolling) {
                if(this.filmstripOrientation === 'horizontal') {
                    distance = (gv.outerWidth(dom.gvv_frame) + this.opts.frame_gap) * (this.frameIterator - to);
                    
                    if(distance > 0) {
                        distance = '+=' + Math.abs(distance);
                    } else {
                        distance = '-=' + Math.abs(distance);
                    }
                    dom.gvv_filmstrip.animate({
                        left: distance
                    },{
                        duration: this.opts.transition_speed, 
                        easing: this.opts.easing, 
                        complete: function(){
                            if(to < self.numImages) {
                                dom.gvv_filmstrip.css('left',gv.getInt(dom.gvv_filmstrip.css('left'))-(self.numImages*(gv.outerWidth(dom.gvv_frame)+self.opts.frame_gap)));    
                            } else if(to >= (self.numImages * 2)) {
                                dom.gvv_filmstrip.css('left',gv.getInt(dom.gvv_filmstrip.css('left'))+(self.numImages*(gv.outerWidth(dom.gvv_frame)+self.opts.frame_gap)));    
                            }
                            self.frameIterator = (to % self.numImages) + self.numImages;
                        }
                    });
                } else {
                    distance = (gv.outerHeight(dom.gvv_frame) + this.opts.frame_gap) * (this.frameIterator - to);
                    
                    if(distance > 0) {
                        distance = '+=' + Math.abs(distance);
                    } else {
                        distance = '-=' + Math.abs(distance);
                    }
                    dom.gvv_filmstrip.animate({
                        top: distance
                    },{
                        duration: this.opts.transition_speed, 
                        easing: this.opts.easing, 
                        complete: function(){
                            // adjust filmstrip position to ensure that there is always at least one frame behind
                            // and (2 * filmstripSize) ahead
                            if(to === 0) {
                                dom.gvv_filmstrip.css('top',gv.getInt(dom.gvv_filmstrip.css('top'))-(self.numImages*(gv.outerHeight(dom.gvv_frame)+self.opts.frame_gap)));    
                                self.frameIterator = self.numImages;
                            } else if(to > ((self.numImages * 3) - (self.filmstripSize * 2))) {
                                dom.gvv_filmstrip.css('top',gv.getInt(dom.gvv_filmstrip.css('top'))+(self.numImages*(gv.outerHeight(dom.gvv_frame)+self.opts.frame_gap)));    
                                self.frameIterator = to - self.numImages;
                            } else {
                                self.frameIterator = to;
                            }
                        }
                    });
                }
                
            } else {
                this.frameIterator = to;
            }
        },
        
        startSlideshow: function(changeIcon) {
            var self = this,
                dom = this.dom;
                
            if(!self.opts.enable_slideshow) { return; }
            
            if(changeIcon) {
                dom.gvv_navPlay.removeClass('gvv_navPlay').addClass('gvv_navPause');
            }
            this.playing = true;
            dom.gvv_galleryWrap.everyTime(this.opts.transition_interval,'slideshow_'+this.id,function(){ self.showNext(); });
        },
        
        stopSlideshow: function(changeIcon) {
            var self = this,
                dom = this.dom;
                
            if(changeIcon) {
                dom.gvv_navPlay.removeClass('gvv_navPause').addClass('gvv_navPlay');
            }
            this.playing = false;
            dom.gvv_galleryWrap.stopTime('slideshow_'+this.id);
        },
        
        enablePanning: function() {
            var self = this,
                dom = this.dom;
                
            if(!self.opts.enable_slideshow) { return; }
            
            dom.gvv_panel.css('cursor','url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur), n-resize');
            if(this.opts.pan_style === 'drag') {
                dom.gvv_panelWrap.delegate('.gvv_panel img','mousedown.galleryview',function(e) {
                    self.isMouseDown = true;
                    $(this).css('cursor','url(http://www.google.com/intl/en_ALL/mapfiles/closedhand.cur), n-resize');
                }).delegate('.gvv_panel img','mouseup.galleryview',function(e) {
                    self.isMouseDown = false;
                    $(this).css('cursor','url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur), n-resize');
                }).delegate('.gvv_panel img','mousemove.galleryview',function(e) {
                    var distY, distX,
                        image = $(this),
                        new_top, new_left;

                    if(self.isMouseDown) {
                        distY = e.pageY - self.mouse.y;
                        distX = e.pageX - self.mouse.x;
                        new_top = gv.getInt(image.css('top')) + distY;
                        new_left = gv.getInt(image.css('left')) + distX;
                            
                        image.css('cursor','url(http://www.google.com/intl/en_ALL/mapfiles/closedhand.cur), n-resize');
                        
                        if(new_top > 0) new_top = 0;
                        if(new_left > 0) new_left = 0;
                        
                        if(new_top < (-1 * (gv.outerHeight(image) - gv.innerHeight(dom.gvv_panel)))) { new_top = -1 * (gv.outerHeight(image) - gv.innerHeight(dom.gvv_panel)); }
                        if(new_left < (-1 * (gv.outerWidth(image) - gv.innerWidth(dom.gvv_panel)))) { new_left = -1 * (gv.outerWidth(image) - gv.innerWidth(dom.gvv_panel)); }
                        
                        image.css('top',new_top);
                        image.css('left',new_left);
                    } else {
                        image.css('cursor','url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur), n-resize');    
                    }
                });
            } else {
                
            }
        },
        
        bindActions: function() {
            var self = this,
                dom = this.dom;
            
          dom.gvv_overlay.delegate('a','click.overlay-close',function(e){
             var ele = $(e.target);
             $(ele).parent().parent().hide(1000);
           
             
          });

        
            dom.gvv_showOverlay.bind('click.galleryview',function(){
                
                if(self.overlayVisible) {
                    self.hideOverlay(250);
                } else {
                    self.showOverlay(250);
                }
            });
            
            dom.gvv_navWrap.delegate('div','click.galleryview',function(){
                var el = $(this);
                if(el.hasClass('gvv_navNext')) {
                    self.showNext();
                } else if(el.hasClass('gvv_navPrev')) {
                    self.showPrev();
                } else if(el.hasClass('gvv_navPlay')) {
                    self.startSlideshow(true);
                } else if(el.hasClass('gvv_navPause')) {
                    self.stopSlideshow(true);
                }
                return false;
            });
            
            dom.gvv_panelNavNext.bind('click.galleryview',function(){ 
                self.showNext(); 
                return false;
            });
            dom.gvv_panelNavPrev.bind('click.galleryview',function(){
                self.showPrev(); 
                return false;
            });
            
            dom.gvv_filmstripWrap.delegate('.gvv_frame','click.galleryview',function(){
                var el = $(this),
                    i = el.data('frameIndex');
                
                this.navAction = 'frame';
                self.showItem(i);
                return false;
            });
            
            dom.gvv_panelWrap.bind('mouseover.galleryview',function(){
                self.showPanelNav();
            }).bind('mouseout.galleryview',function(){
                self.hidePanelNav();
            });
        },
        
        unbindActions: function() {
            var self = this,
                dom = this.dom;
                
            dom.gvv_showOverlay.unbind('click.galleryview');
            dom.gvv_panelNavNext.unbind('click.galleryview');
            dom.gvv_panelNavPrev.unbind('click.galleryview');
            dom.gvv_navWrap.undelegate('div','click.galleryview');
            dom.gvv_filmstripWrap.undelegate('.gvv_frame','click.galleryview');
        },
        
        showPanelNav: function() {
            var self = this,
                dom = this.dom;
                
            dom.gvv_panelNavNext.show();
            dom.gvv_panelNavPrev.show();    
        },
        
        hidePanelNav: function() {
            var self = this,
                dom = this.dom;
                
            dom.gvv_panelNavNext.hide();
            dom.gvv_panelNavPrev.hide();    
        },
        
          // There's no need to repeat code, so let's just 
        // abstract the click stuff a little
        doClick: function (link,target) {
            var self = this,
                dom = this.dom;

            if (link != '') {
                var action;

                if (target) {
                    action = function () {
                        window.open(link, "_blank");
                    };
                }
                else {
                    action = function () {
                        window.location = link;
                    };
                }

                return action;
            }

            // Just in case we have an empty href
            return null;
        },

        // Added to provide clickable link support for panels
        updateClickable: function (i) {
            var self = this,
                dom = this.dom;

            // If we don't undelegate here, we'll stack
            // up click actions and cycling through the
            // gallery can end up opening LOTS of links
            dom.gvv_panelWrap.undelegate('.gvv_panel', 'click.galleryview');
            dom.gvv_panelWrap.delegate('.gvv_panel', 'click.galleryview', this.doClick(self.gvImages[i].href,self.gvImages[i].target));

            return false;
        },
        init: function(options,el) {
            var self = this,
                dom = this.dom = {};
                
            this.opts = $.extend({},$.fn.galleryViewV.defaults,options);
            this.el = el;
            this.$el = $(el);
            this.id = el.id;
            this.iterator = this.frameIterator = this.opts.start_frame - 1;
            this.overlayVisible = this.opts.show_overlays;
            this.playing = false;
            this.scrolling = false;
            this.isMouseDown = false;
            this.mouse = { x: 0, y: 0 };
            this.filmstripOrientation = (this.opts.filmstrip_position === 'top' || this.opts.filmstrip_position === 'bottom') ? 'horizontal' : 'vertical';
            
            $(document).bind('mousemove.galleryview',function(e) {
                self.mouse = {x: e.pageX, y: e.pageY};       
            });
            
            // create all necessary DOM elements
            $.each(this.elems,function(i,elem) {
                var elem = elem.split('.');
                
                // if there is no tag name, assume <div>
                if(elem[0] === '') { elem[0] = 'div'; }
                
                // add jQuery element to dom object
                dom[elem[1]] = self.createElem({'class':elem[1]},elem[0]);
            });
            
            dom.gvv_imageStore.appendTo($('body'));
            
            dom.gvv_galleryWrap.delegate('img','mousedown.galleryview',function(e){ if(e.preventDefault) { e.preventDefault(); } });
            
            dom.gvv_panel.addClass('gvv_panel-loading');
            dom.gvv_frame.addClass('gvv_frame-loading');
            
            // nest DOM elements
            dom.gvv_galleryWrap.hide().append(dom.gvv_gallery);
            
            if(this.opts.show_panels) {
                dom.gvv_gallery.append(dom.gvv_panelWrap);
                if(this.opts.show_panel_nav) {
                    dom.gvv_panelWrap.append(dom.gvv_panelNavNext,dom.gvv_panelNavPrev);
                }
                if(this.opts.show_infobar) {
                    dom.gvv_panelWrap.append(dom.gvv_infobar);
                }
            }
            
            if(this.opts.show_filmstrip) {
                dom.gvv_gallery.append(
                    dom.gvv_filmstripWrap.append(
                        dom.gvv_filmstrip
                    )
                );
                
                if(this.opts.show_filmstrip_nav) {
                    dom.gvv_gallery.append(
                        dom.gvv_navWrap.append(
                            dom.gvv_navPrev,
                            (this.opts.enable_slideshow?dom.gvv_navPlay:$('<span></span>')),
                            dom.gvv_navNext
                        )
                    );
                }
            }
            
            if(this.opts.enable_overlays) {
                dom.gvv_panelWrap.append(dom.gvv_overlay,dom.gvv_showOverlay);    
            }
                    
            if(this.opts.show_captions) {
                dom.gvv_frame.append(dom.gvv_caption).appendTo(dom.gvv_gallery);    
            }
            
            //swap out source element with gallery
            this.$el.replaceWith(dom.gvv_galleryWrap);
            
            if(this.opts.pan_images) {
                this.enablePanning();
            }
            
            // convert source images into gvImage objects
            this.storeImages();
            
            // block out dimensions/positions of gallery elements
            this.buildGallery();
            
            // begin loading images into gallery
            this.initImages();
            
            // set up transitions, buttons
            this.bindActions();
            
            // remove temporary frame element
            dom.gvv_frame.remove();
            
            // show gallery
            dom.gvv_galleryWrap.show();
            
            if(this.opts.autoplay) {
                this.startSlideshow(true);
            }
            
            // if panels should be clickable - set it up
            if (this.opts.clickable == 'panel' || this.opts.clickable == 'all') {
                this.updateClickable(this.iterator);
            }
            
            this.updateOverlay(this.iterator);
            this.updateFilmstrip(this.frameIterator);
        },
        
        /*
         * Resizing code...
         */
        resizeGallery: function(panel_width, panel_height, frame_width, frame_height){
      
            // new width and height
            if(panel_width!=undefined){ this.opts.panel_width = panel_width; }
            if(panel_height!=undefined){ this.opts.panel_height = panel_height; }
            if(frame_width!=undefined){ this.opts.frame_width = frame_width; }
            if(frame_height!=undefined){ this.opts.frame_height = frame_height; }
        
            // resize gallery: dimensions & positions
            this.buildGallery(false);
            
            // resize images in view
            $("img", this.gvv_galleryWrap).trigger( "resizegalleryimage" );
            
            // resize images out of view
            $("img", this.dom.gvv_panels).trigger( "resizegalleryimage" );
        }
        
    }; // END GalleryView
    
    /*
        MAIN PLUGIN CODE
    */
    $.fn.galleryViewV = function (options) {
        if (this.length) {
            return this.each(function () {
                var gallery = Object.create(GalleryView);
                gallery.init(options,this);
                
                /* -- resizecode -- keep object for when resize is called */
                this.galleryViewVForObject = gallery;
            });
        }
    };
    
    /*
     * MAIN RESIZING CODE
     *
     * Call this method to resize the panel and/or the frames
     *
     * All arguments are optional (use undefined)
     */
    $.fn.resizeGalleryView_video = function (panel_width, panel_height, frame_width, frame_height){
        if (this.length) {
            return this.each(function () {
                if(this.galleryViewVForObject){
                    this.galleryViewVForObject.resizeGallery(panel_width, panel_height, frame_width, frame_height);
                }
            });
        }
    };
    
    /*
        Default Options
            Object literal storing default plugin options
    */
    $.fn.galleryViewV.defaults = {
    
        // General Options
        transition_speed: 1000,         //INT - duration of panel/frame transition (in milliseconds)
        transition_interval: 5000,         //INT - delay between panel/frame transitions (in milliseconds)
        easing: 'swing',                 //STRING - easing method to use for animations (jQuery provides 'swing' or 'linear', more available with jQuery UI or Easing plugin)
        
        // Panel Options
        show_panels: true,                 //BOOLEAN - flag to show or hide panel portion of gallery
        show_panel_nav: true,             //BOOLEAN - flag to show or hide panel navigation buttons
        enable_overlays: false,         //BOOLEAN - flag to enable or disable panel overlays
        show_overlays: false,            //BOOLEAN - flag to show or hide panel overlays on page load (if overlays are enabled) 
        panel_width: 800,                 //INT - width of gallery panel (in pixels)
        panel_height: 400,                 //INT - height of gallery panel (in pixels)
        panel_animation: 'fade',         //STRING - animation method for panel transitions (crossfade,fade,slide,none)
        panel_scale: 'crop',             //STRING - cropping option for panel images (crop = scale image and fit to aspect ratio determined by panel_width and panel_height, fit = scale image and preserve original aspect ratio)
        overlay_position: 'bottom',     //STRING - position of panel overlay (bottom, top)
        pan_images: false,                //BOOLEAN - flag to allow user to grab/drag oversized images within gallery
        pan_style: 'drag',                //STRING - panning method (drag = user clicks and drags image to pan, track = image automatically pans based on mouse position
        pan_smoothness: 15,                //INT - determines smoothness of tracking pan animation (higher number = smoother)
        
        // Filmstrip Options
        start_frame: 1,                 //INT - index of panel/frame to show first when gallery loads
        show_filmstrip: true,             //BOOLEAN - flag to show or hide filmstrip portion of gallery
        show_filmstrip_nav: true,         //BOOLEAN - flag indicating whether to display navigation buttons
        enable_slideshow: true,            //BOOLEAN - flag indicating whether to display slideshow play/pause button
        autoplay: false,                //BOOLEAN - flag to start slideshow on gallery load
        show_captions: false,             //BOOLEAN - flag to show or hide frame captions    
        filmstrip_size: 3,                 //INT - number of frames to show in filmstrip-only gallery
        filmstrip_style: 'scroll',         //STRING - type of filmstrip to use (scroll = display one line of frames, scroll filmstrip if necessary, showall = display multiple rows of frames if necessary)
        filmstrip_position: 'bottom',     //STRING - position of filmstrip within gallery (bottom, top, left, right)
        frame_width: 80,                 //INT - width of filmstrip frames (in pixels)
        frame_height: 40,                 //INT - width of filmstrip frames (in pixels)
        frame_opacity: 0.4,             //FLOAT - transparency of non-active frames (1.0 = opaque, 0.0 = transparent)
        frame_scale: 'crop',             //STRING - cropping option for filmstrip images (same as above)
        frame_gap: 5,                     //INT - spacing between frames within filmstrip (in pixels)
        
        // Info Bar Options
        show_infobar: true,                //BOOLEAN - flag to show or hide infobar
        infobar_opacity: 1,                //FLOAT - transparency for info bar
        
        panel_can_upscale_image: true
    };
})(jQuery);
