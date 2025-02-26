/*
    DICOMIFY
    0.1.1 - 2017-12-26 | (c) 2017 Red Thread Design | https://redthread.studio/
    DICOMIFY - jQuery library for processing DICOM (*.dcm) files. Uses the CornerstoneJS library for main action (<a href="https://github.com/cornerstonejs/cornerstone">CornerstoneJS</a>).
*/

$.fn.dicomify = function(opts) { return this.each(function() {
    var $dcms = $(this),
        $cw, $cnvs, cnvs, $frameNo, $navPoint, $navIndLay, $preloadBlender, $preloadPercent,
        urls = [], navLoadInds = [],
        length,
        percentage,
        currentImageIndex = 0,
        preloadPercent = 0, preloadStates = [], preloaded = false,
        viewPort,
        defaults = {
            width: $dcms.data('size') || 512,
            height: $dcms.data('size') || 512,
            navWidth: 35,
            showFrames: true,
            preload: 6,
            webWorkerManagerRoot: WPdicomify.pluginsUrl+'/resources/lib/',
            regStyle: true,
            colors: {
                loading: '#8EC4EC',
                loaded: '#FFFFFF',
                failed: '#FF2057'
            }
        },
        _opts = $.extend(true, defaults, $.isPlainObject(opts) ? opts : {})
    ;
    if ($.isNumeric(_opts.preload)) {
        _opts.preload = _opts.preload < 0 ? 0 : _opts.preload;
    } else if (_opts.preload) {
        _opts.preload = defaults.preload;
    }
    if (!$.fn.dicomify._init) {
        console.log(WPdicomify.pluginsUrl);
        cornerstoneWADOImageLoader.external.cornerstone = cornerstone;
        cornerstoneWADOImageLoader.webWorkerManager.initialize({
            webWorkerPath : _opts.webWorkerManagerRoot+'cornerstoneWADOImageLoaderWebWorker.min.js',
            taskConfiguration: {
                'decodeTask' : {
                    codecsPath: _opts.webWorkerManagerRoot+'cornerstoneWADOImageLoaderCodecs.min.js'
                }
            }
        });
        cornerstoneTools.external.cornerstone = cornerstone;
        cornerstoneTools.external.Hammer = Hammer;
        $.fn.dicomify._init=true;
    }    
    
    $cw = $('<div class="dicom_image_wrapper" style="width:'+_opts.width+'px;height:'+_opts.height+'px;padding-right:'+_opts.navWidth+'px;" oncontextmenu="return false" onselectstart="return false;" onmousedown="return false;">'+
        (_opts.preload && '<div class="dicom_image_blender" style="width:'+_opts.width+'px;height:'+_opts.height+'px;">'+
            '<span class="dicom_image_blender_progress">'+preloadPercent+'%</span></div>' )+
        (_opts.showFrames && '<span class="dicom_image_frame_no">'+currentImageIndex+'</span>') +
        '<div class="dicom_image" style="width:'+_opts.width+'px;height:'+_opts.height+'px;"></div>'+
        '<div class="dicom_image_nav" style="width:'+_opts.navWidth+'px;"><span class="dicom_image_nav_point"></span><div class="dicom_image_nav_load flex_col"></div></div>'+
    '</div>');
    $cnvs = $('.dicom_image', $cw);
        cnvs = $cnvs[0];
    $nav = $('.dicom_image_nav', $cw);
    $frameNo = $('.dicom_image_frame_no', $cw);
    $navPoint = $('.dicom_image_nav_point', $cw);
    $navIndLay = $('.dicom_image_nav_load', $cw);
    $preloadBlender = $('.dicom_image_blender', $cw);
    $preloadPercent = $('.dicom_image_blender_progress', $cw);

    $cw.on('contextmenu mousedown selectstart', false);
    
    $dcms.after($cw);

    cornerstone.enable(cnvs);

    cornerstoneTools.zoom.setConfiguration({
        minScale: 0.25,
        maxScale: 20.0,
        preventZoomOutsideImage: true,
        invert: false
    });

    cornerstoneTools.mouseInput.enable(cnvs);
        cornerstoneTools.pan.activate(cnvs, 1);
        cornerstoneTools.wwwc.activate(cnvs, 4);
    cornerstoneTools.mouseWheelInput.enable(cnvs);
        cornerstoneTools.zoomWheel.activate(cnvs);
    cornerstoneTools.touchInput.enable(cnvs);
        cornerstoneTools.panTouchDrag.activate(cnvs);
        cornerstoneTools.zoomTouchPinch.activate(cnvs);

    $('a', $dcms).each(function (elidx, el) {
        if (el.href && el.href.match(/\.dcm/)) {
            urls.push(el.href);
        }
        urls.sort();
    });

    length = urls.length;

    function navLoadInd(color, idx, type) {
        var h = urls.length ? _opts.height/urls.length : 1,
            $nli = $('<div class="dicom_image_nav_load_ind dicom_image_nav_load_ind_idx'+idx+'" style="width:'+_opts.navWidth+'px;height:'+h+'px;background-color: '+color+';" data-status="'+type+'"></div>')
        ;
        if (!~navLoadInds.indexOf(idx)) {
            $navIndLay.append($nli);
            navLoadInds.push(idx);
        } else {
            $nli = $('.dicom_image_nav_load_ind_idx'+idx, $cw).css({'background-color': color}).data('status', type);
        }
    }
    
    function updateTheImage(imageIndex) {
        var wadoUrl = urls[imageIndex],
            def = $.Deferred(),
            f = 'file: '+wadoUrl.replace(/^.*\/(.*)$/, '$1')+''
        ;
        try {
            navLoadInd(_opts.colors.loading, imageIndex, 'loading');
            cornerstone.loadAndCacheImage("wadouri:"+wadoUrl).then(function(image) {
                viewPort = viewPort || cornerstone.getDefaultViewportForImage(cnvs, image);
                cornerstone.displayImage(cnvs, image, viewPort);
                def.resolve(image);
                navLoadInd(_opts.colors.loaded, imageIndex, 'loaded');
                $frameNo.text(f).css({color: ''});
                $navPoint.css('height', percentage+'%')
            }, function(err) {
                console.log(err);
                navLoadInd(_opts.colors.failed, imageIndex, 'failed');
                $frameNo.text(f).css({color: _opts.colors.failed});
                def.reject(err);
            });
        } catch(err) {
            def.reject(err);
        }
        return def;
    }
    
    function preloadChain(urlIdx, num) {
        var endIdx = urlIdx===0 ? 1 : urlIdx+num
            slArr = urls.slice(urlIdx, endIdx),
            chainDefs = []
        ;
        $.each(slArr, function (slArrIdx) {
            chainDefs.push(updateTheImage(urlIdx+slArrIdx)
            .then(function (dcmImg) {
                preloadStates.push(true);
            }, function (err) {
                preloadStates.push(false);
            })
            .then(function () {
                var ret;
                preloadPercent = (preloadStates.length*100)/urls.length;
                $preloadPercent.text(String(preloadPercent).substr(0,5)+'%');
                
                if (preloadStates.length===urls.length) {
                    $preloadBlender.remove();
                    preloaded=true;
                    updateTheImage(0);
                    ret = true;
                } else {
                    ret = false;
                }
                return ret;
            }))
        });
        $.when.apply(this, chainDefs).then(function (ret) {
            if (!~[].slice.call(arguments).indexOf(true)) {
                preloadChain(endIdx, num);
            }
        });
    }
    if (_opts.preload) {
        preloadChain(0, _opts.preload);
    } else {
        updateTheImage(0);
    }

    ['mousewheel', 'DOMMouseScroll'].forEach(function(eventType) {
        $nav[0].addEventListener(eventType, function (e) {
            var idx;
            if ((_opts.preload && preloaded) || !_opts.preload) {
                if (e.wheelDelta < 0 || e.detail > 0) {
                    idx = currentImageIndex = (--currentImageIndex < 0) ? urls.length - 1 : currentImageIndex;
                } else {
                    idx = currentImageIndex = (++currentImageIndex > urls.length - 1) ? 0 :currentImageIndex;
                }
                updateTheImage(idx);
                percentage = currentImageIndex ? currentImageIndex / length * 100 : 0;
            }
            e.stopPropagation();
            e.preventDefault();
        });        
    });

    $nav.on('mousemove', function (e) {
        var h = $nav.height(),
            y = h-e.offsetY,
            idx = 0
        ;
        if ((_opts.preload && preloaded) || !_opts.preload) {
            if (y>h) {
                y = h;
            } else if (y<0) {
                y = 0;
            }
            idx = Math.floor((urls.length*y)/h);
            idx = idx>(length-1) ? length-1 : idx;
            updateTheImage(currentImageIndex = idx);            
        }
        percentage = currentImageIndex ? currentImageIndex / length * 100 : 0;
    });

    cnvs.addEventListener('cornerstoneimagerendered', function (e) {
        viewPort = cornerstone.getViewport(cnvs);
    });

    $cnvs.on('dblclick', function (e) {
        var image = cornerstone.getImage(cnvs)
        viewPort = cornerstone.getDefaultViewportForImage(cnvs, image);
        cornerstone.displayImage(cnvs, image, viewPort);
    });

    return this;
}); };