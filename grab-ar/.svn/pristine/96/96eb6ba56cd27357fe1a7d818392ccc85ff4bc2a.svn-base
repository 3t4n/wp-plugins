  
	var IS_IPAD = navigator.userAgent.match(/iPad/i) != null,
	    IS_IPHONE = !IS_IPAD && ((navigator.userAgent.match(/iPhone/i) != null) || (navigator.userAgent.match(/iPod/i) != null)),
	    IS_IOS = IS_IPAD || IS_IPHONE,
	    IS_ANDROID = !IS_IOS && navigator.userAgent.match(/android/i) != null,
	    IS_MOBILE = IS_IOS || IS_ANDROID;
  var checkbox = false;

function GrabAR_Select(){
		jQuery('#GrabAR_popup-inner').html('');
	  var ipath = location.pathname+"/";
			  ipath = RemoveLastDirectoryPartOf(ipath);
		var GrabAR_HostSrc = location.protocol+'//'+location.hostname+ipath;
		
		jQuery(document).scrollTop(0);
		if(jQuery("#GrabAR_popup-inner").length == 0) {
			jQuery('body').prepend('<div id="modal-GrabAR" class="sd-modal sd-modal-1" data-overlay=""><div class="sd-modal-content"><div class="sd-modal-header"><span class="close"></span></div><div class="sd-modal-body" id="GrabAR_popup-inner"></div></div></div>');
			/*jQuery('#GrabAR_popup').on('click', function(event) {
				//if(event.target.nodeName != "IMG")
				//	GrabAR_ClearOverlay();
			  //console.log(event);
			  //console.log(event.target.nodeName);
			});
			jQuery('#GrabAR_popup').on('scroll', function(event) {
				//jQuery('#GrabAR_Close').html('X');
				//if(jQuery('#GrabAR_popup').scrollTop() == 0)
				//	jQuery('#GrabAR_Close').html('Close');
			});*/
		}
		//load spinner
		jQuery('#GrabAR_popup-inner').append('<div id="GrabAR_Overlay"><div class="lds-ripple"><div></div><div></div></div></div>');
		jQuery('#GrabAR_popup-inner').append('<div id="GrabAR_Images"></div>');
		
		var ibg = jQuery('#GrabAR_Btn').data("background_img");
		if(ibg == "yes")
			var getImg = "img,div";
		else
			var getImg = "img";
		if(jQuery('#GrabAR_Btn').data('img_src')){
			var isrc = jQuery('#GrabAR_Btn').data('img_src');
			var filterstrings = ['.gif','.jpg','.png'];
			var pass = false;
			for (i = 0; i < filterstrings.length; i++) {
			    if (isrc.includes(filterstrings[i])) {
			        pass = true;
			    }
			}
			if(pass){
				var url = isrc;
				if(url.substring(0, 2) == '//')
					url = location.protocol+url;// used for //sample.com schemas
				
				if(IS_MOBILE){
					if (url.indexOf("http") < 0){
						var imgUrl = GrabAR_HostSrc+url;
					}
					else{
						var imgUrl = url;
					}

					jQuery('#GrabAR_Images').append('<a href="javascript:GrabAR_SetLink(\''+imgUrl+'\')" onclick="GrabAR_ClearOverlay();"><img class="GrabAR_Img" src="'+isrc+'" onload="jQuery(this).addClass(\'GrabAR_ImgBorder\');" onerror="this.style.display=\'none\'" /></a>');
				}
				else{
					//web
					jQuery('#GrabAR_Images').append('<img onclick="GrabAR_SetQR(\''+url+'\')" class="GrabAR_Img" src="'+isrc+'" onload="jQuery(this).addClass(\'GrabAR_ImgBorder\');" onerror="this.style.display=\'none\'" />');
				}
			}
	
		}
		else{
			jQuery(getImg).each(function () {
				if(jQuery(this).attr("src")){
					var isrc = jQuery(this).attr("src").toLowerCase();
					var filterstrings = ['.gif','.jpg','.png'];
					var pass = false;
					for (i = 0; i < filterstrings.length; i++) {
					    if (isrc.includes(filterstrings[i])) {
					        pass = true;
					    }
					}
					if(pass){
						var url = jQuery(this).attr("src");
						if(url.substring(0, 2) == '//')
							url = location.protocol+url;// used for //sample.com schemas
						
						if(jQuery(this).width() >= 100 && jQuery(this).height() >= 100){
							
							if(IS_MOBILE){
								if (url.indexOf("http") < 0){
									var imgUrl = GrabAR_HostSrc+url;
								}
								else{
									var imgUrl = url;
								}
								jQuery('#GrabAR_Images').append('<a href="javascript:GrabAR_SetLink(\''+imgUrl+'\')" onclick="GrabAR_ClearOverlay();"><img class="GrabAR_Img" src="'+jQuery(this).attr("src")+'" onload="jQuery(this).addClass(\'GrabAR_ImgBorder\');" onerror="this.style.display=\'none\'" /></a>');
							}
							else{
								//web
								jQuery('#GrabAR_Images').append('<img onclick="GrabAR_SetQR(\''+url+'\')" class="GrabAR_Img" src="'+jQuery(this).attr("src")+'" onload="jQuery(this).addClass(\'GrabAR_ImgBorder\');" onerror="this.style.display=\'none\'" />');
							}
						}
					}
				}
				else if(jQuery(this).css("background-image") != "none"){
					var url = jQuery(this).css('background-image').replace(/^url\(['"](.+)['"]\)/, '$1');
					
					if(url){
						if(url.substring(0, 2) == '//')
							url = location.protocol+url;// used for //sample.com schemas
						if (url.indexOf("http") < 0){
							var imgUrl = GrabAR_HostSrc+url;
						}
						else{
							var imgUrl = url;
						}
						if(IS_MOBILE){
								jQuery('#GrabAR_Images').append('<a href="javascript:GrabAR_SetLink(\''+imgUrl+'\');" onclick="GrabAR_ClearOverlay();"><img class="GrabAR_Img" src="'+url+'" /></a>');
						}
						else{
							//web
								jQuery('#GrabAR_Images').append('<img onclick="GrabAR_SetQR(\''+url+'\')" class="GrabAR_Img" src="'+url+'" /></a>');
						}
					}
					
				}
				else if(jQuery(this).data("srcset")){ //shopify mobile zoom issue
					var set = jQuery(this).data("srcset").split(',')[2];
					//alert(set.split(' '));
					var url = set.split(' ')[1];
					
					if(url){
						if(url.substring(0, 2) == '//')
							url = location.protocol+url;// used for //sample.com schemas
						if (url.indexOf("http") < 0){
							var imgUrl = GrabAR_HostSrc+url;
						}
						else{
							var imgUrl = url;
						}
						if(IS_MOBILE){
								jQuery('#GrabAR_Images').append('<a href="javascript:GrabAR_SetLink(\''+imgUrl+'\');" onclick="GrabAR_ClearOverlay();"><img class="GrabAR_Img" src="'+url+'" /></a>');
						}
						else{
							//web
								jQuery('#GrabAR_Images').append('<img onclick="GrabAR_SetQR(\''+url+'\')" class="GrabAR_Img" src="'+url+'" /></a>');
						}
					}
					
				}
				
			});
		}
		jQuery('#GrabAR_popup-inner').prepend('<div id="GrabAR_BackgroundDiv"><input id="GrabAR_Background" name="GrabAR_Background" type="checkbox" value="true" style="position:relative !important"> GRAB Image with it\'s background</div>');
		if(IS_MOBILE){
			jQuery('#GrabAR_popup-inner').prepend('<div id="GrabAR_Tagline">Click on any image to view in <a href="https://grabar.app" target="_blank">GRAB AR</a>.</div>');
		}
		else{
			//USE QR 
			jQuery('#GrabAR_popup-inner').prepend('<div id="GrabAR_Tagline2">Once installed, Click any Image and scan it\'s QR Code to view in your own surroundings.</div>');
			jQuery('#GrabAR_popup-inner').prepend('<div id="GrabAR_QrTarget_Backdrop"><div id="GrabAR_QrTarget"><div style="margin-top:15px;text-align:center;">QR code will show here</div></div><div id="GrabAR_ThisImg"></div><div style="clear:both;"></div><div class="GrabAR_Qr_Logo"><img src="https://grabarviewer.com/code/images/GrabAR_50.png"></div></div>');
			jQuery('#GrabAR_popup-inner').prepend('<div id="GrabAR_Tagline" style="">Download the GRAB AR App by scanning QR Code below.</div>');
		}
		//jQuery('#GrabAR_popup').prepend('<div class="GrabAR_Logo"><a href="https://grabar.app" target="_blank"><img src="https://grabar.app/assets/images/app_logo_white.png" style="width:175px;border:0"></a></div>');
		//jQuery('#GrabAR_popup-inner').prepend('<div class="GrabAR_Logo"><div class=""><span class="GrabAR_Copyright">&copy; 2020 <a href="https://grabar.app/" target="_blank" style="text-decoration:underline;">GRAB AR</a> APP.</span></div></div>');
		
		//jQuery('#GrabAR_popup').append('<div style="clear:left;"></div><div class="GrabAR_Footer"><span class="footer-credits">&copy; 2020 <a href="https://grabar.app/" target="_blank" style="text-decoration:underline;">GRAB AR</a> APP.</span></div>');//<ul><li><a href="https://www.facebook.com/GRABARAPP" target="_blank">Facebook</a></li><li><a href="https://twitter.com/grabarapp" target="_blank">Twitter</a></li><li><a href="https://instagram.com/grabarapp" target="_blank">Instagram</a></li><li><a href="https://grabar.app/terms-of-service.html" target="_blank">Terms</a></li><li><a href="https://grabar.app/privacy-policy.html" target="_blank">Privacy</a></li><li><a href="https://grabar.app/contact.php" target="_blank">Contact</a></li></ul>
		
		var incBackground = (jQuery('#GrabAR_Btn').data("inc_background")?jQuery('#GrabAR_Btn').data("inc_background"):"");
		if(incBackground == 'yes'){
			jQuery('#GrabAR_Background').prop('checked', true);
			checkbox = true;
		}	
		else
			jQuery('#GrabAR_Background').prop('checked', false);
		
		jQuery('#GrabAR_Background').on("change", function () {
			checkbox = jQuery('#GrabAR_Background').prop('checked');
		});
		GrabAR_SetInitQR();
		jQuery('#GrabAR_popup').show();
		
		
		//jQuery('#lds-grid').fadeIn().delay(5000).fadeOut();
		//jQuery('#GrabAR_Images').show();
		setTimeout(function() {jQuery('#GrabAR_Overlay').fadeOut();},2000);
		
	}
	function GrabAR_ClearOverlay(){
		jQuery('#modal-GrabAR .close').trigger('click');
		jQuery('#GrabAR_popup-inner').html('');
	}
	

	function GrabAR_SetLink(i){
		var productUrl = (jQuery('#GrabAR_Btn').data("product_url")?jQuery('#GrabAR_Btn').data("product_url"):window.location.href);
		var GrabAR_ImgSrc = 'https://grabarviewer.com/button.php?img=';
		if(checkbox){
			if (i.indexOf("?") < 0)
				i = i + "?bg=1";
			else
				i = i + "&bg=1";
		}
		var prodAdd = '';
		if(productUrl && productUrl.indexOf("http") >= 0){
			prodAdd = '&producturl='+encodeURIComponent(productUrl);
		}
		var imgUrl = GrabAR_ImgSrc+encodeURIComponent(i) + prodAdd;
		window.open(imgUrl);
	}
	function GrabAR_SetQR(i){
		
		jQuery('#GrabAR_ThisImg').html('<img class="thisImg" src="'+i+'"/>');
		//set background check change
		jQuery('#GrabAR_Background').unbind('click');
		jQuery('#GrabAR_Background').click(function() {
     	GrabAR_SetQR(i)
		});  
		var Background = "";
		var productUrl = (jQuery('#GrabAR_Btn').data("product_url")?jQuery('#GrabAR_Btn').data("product_url"):window.location.href);
		if(jQuery('#GrabAR_Background').is(':checked'))
			Background = "bg=1";
		else
			Background = "bg=0";
		jQuery("#GrabAR_QrTarget").html('');
		if(i.substring(0, 2) == '//')
			i = location.protocol+i;// used for //sample.com schemas
		if (i.indexOf("http") >= 0 ){
			//make sure full path for image
			if (i.indexOf("?") < 0)
				var url = i+"?"+Background;
			else
				var url = i+"&"+Background;
		}
		else{
			 var ipath = location.pathname+"/";
			  ipath = RemoveLastDirectoryPartOf(ipath);
				var GrabAR_HostSrc = '//'+location.hostname+ipath;
			if (i.indexOf("?") < 0)
				var url = location.protocol+'//'+location.hostname+ipath+i+"?"+Background;
			else
				var url = location.protocol+'//'+location.hostname+ipath+i+"&"+Background;
		}
		if (productUrl.indexOf("http") >= 0){
			url = encodeURIComponent(url) + "?producturl="+encodeURIComponent(productUrl);
		}
	  jQuery("#GrabAR_QrTarget").qrcode({
		    //render:"table"
		    width: 150,
		    height: 150,
		    text: 'grabar://imgurl/'+url
		});
		jQuery('#GrabAR_popup-inner').scrollTop(0);
		jQuery("#GrabAR_Tagline2").html('<div onclick="GrabAR_SetInitQR();" style="text-decoration:underline;cursor:pointer;">GRAB AR App Download QR Code</div>');
		jQuery("#GrabAR_Tagline").html("Click any Image and scan it\'s QR Code to view with GRAB AR.");
	}
	function GrabAR_SetInitQR(){
		jQuery('#GrabAR_ThisImg').html('');
		jQuery("#GrabAR_QrTarget").html('');
	  jQuery("#GrabAR_QrTarget").qrcode({
		    //render:"table"
		    width: 150,
		    height: 150,
		    text: 'https://grabar.app'
		});
		
	}
	function RemoveLastDirectoryPartOf(the_url)
	{
	    var the_arr = the_url.split('/');
	    the_arr.pop();the_arr.pop();
	    return( the_arr.join('/')+"/" );
	}
	
	function imageExists(image_url){
	    var http = new XMLHttpRequest();
	    http.open('HEAD', image_url, false);
	    http.send();
	    return http.status != 404;
	}
jQuery(document).ready(function(){
	
	//qr Code
(function(r){r.fn.qrcode=function(h){var s;function u(a){this.mode=s;this.data=a}function o(a,c){this.typeNumber=a;this.errorCorrectLevel=c;this.modules=null;this.moduleCount=0;this.dataCache=null;this.dataList=[]}function q(a,c){if(void 0==a.length)throw Error(a.length+"/"+c);for(var d=0;d<a.length&&0==a[d];)d++;this.num=Array(a.length-d+c);for(var b=0;b<a.length-d;b++)this.num[b]=a[b+d]}function p(a,c){this.totalCount=a;this.dataCount=c}function t(){this.buffer=[];this.length=0}u.prototype={getLength:function(){return this.data.length},
write:function(a){for(var c=0;c<this.data.length;c++)a.put(this.data.charCodeAt(c),8)}};o.prototype={addData:function(a){this.dataList.push(new u(a));this.dataCache=null},isDark:function(a,c){if(0>a||this.moduleCount<=a||0>c||this.moduleCount<=c)throw Error(a+","+c);return this.modules[a][c]},getModuleCount:function(){return this.moduleCount},make:function(){if(1>this.typeNumber){for(var a=1,a=1;40>a;a++){for(var c=p.getRSBlocks(a,this.errorCorrectLevel),d=new t,b=0,e=0;e<c.length;e++)b+=c[e].dataCount;
for(e=0;e<this.dataList.length;e++)c=this.dataList[e],d.put(c.mode,4),d.put(c.getLength(),j.getLengthInBits(c.mode,a)),c.write(d);if(d.getLengthInBits()<=8*b)break}this.typeNumber=a}this.makeImpl(!1,this.getBestMaskPattern())},makeImpl:function(a,c){this.moduleCount=4*this.typeNumber+17;this.modules=Array(this.moduleCount);for(var d=0;d<this.moduleCount;d++){this.modules[d]=Array(this.moduleCount);for(var b=0;b<this.moduleCount;b++)this.modules[d][b]=null}this.setupPositionProbePattern(0,0);this.setupPositionProbePattern(this.moduleCount-
7,0);this.setupPositionProbePattern(0,this.moduleCount-7);this.setupPositionAdjustPattern();this.setupTimingPattern();this.setupTypeInfo(a,c);7<=this.typeNumber&&this.setupTypeNumber(a);null==this.dataCache&&(this.dataCache=o.createData(this.typeNumber,this.errorCorrectLevel,this.dataList));this.mapData(this.dataCache,c)},setupPositionProbePattern:function(a,c){for(var d=-1;7>=d;d++)if(!(-1>=a+d||this.moduleCount<=a+d))for(var b=-1;7>=b;b++)-1>=c+b||this.moduleCount<=c+b||(this.modules[a+d][c+b]=
0<=d&&6>=d&&(0==b||6==b)||0<=b&&6>=b&&(0==d||6==d)||2<=d&&4>=d&&2<=b&&4>=b?!0:!1)},getBestMaskPattern:function(){for(var a=0,c=0,d=0;8>d;d++){this.makeImpl(!0,d);var b=j.getLostPoint(this);if(0==d||a>b)a=b,c=d}return c},createMovieClip:function(a,c,d){a=a.createEmptyMovieClip(c,d);this.make();for(c=0;c<this.modules.length;c++)for(var d=1*c,b=0;b<this.modules[c].length;b++){var e=1*b;this.modules[c][b]&&(a.beginFill(0,100),a.moveTo(e,d),a.lineTo(e+1,d),a.lineTo(e+1,d+1),a.lineTo(e,d+1),a.endFill())}return a},
setupTimingPattern:function(){for(var a=8;a<this.moduleCount-8;a++)null==this.modules[a][6]&&(this.modules[a][6]=0==a%2);for(a=8;a<this.moduleCount-8;a++)null==this.modules[6][a]&&(this.modules[6][a]=0==a%2)},setupPositionAdjustPattern:function(){for(var a=j.getPatternPosition(this.typeNumber),c=0;c<a.length;c++)for(var d=0;d<a.length;d++){var b=a[c],e=a[d];if(null==this.modules[b][e])for(var f=-2;2>=f;f++)for(var i=-2;2>=i;i++)this.modules[b+f][e+i]=-2==f||2==f||-2==i||2==i||0==f&&0==i?!0:!1}},setupTypeNumber:function(a){for(var c=
j.getBCHTypeNumber(this.typeNumber),d=0;18>d;d++){var b=!a&&1==(c>>d&1);this.modules[Math.floor(d/3)][d%3+this.moduleCount-8-3]=b}for(d=0;18>d;d++)b=!a&&1==(c>>d&1),this.modules[d%3+this.moduleCount-8-3][Math.floor(d/3)]=b},setupTypeInfo:function(a,c){for(var d=j.getBCHTypeInfo(this.errorCorrectLevel<<3|c),b=0;15>b;b++){var e=!a&&1==(d>>b&1);6>b?this.modules[b][8]=e:8>b?this.modules[b+1][8]=e:this.modules[this.moduleCount-15+b][8]=e}for(b=0;15>b;b++)e=!a&&1==(d>>b&1),8>b?this.modules[8][this.moduleCount-
b-1]=e:9>b?this.modules[8][15-b-1+1]=e:this.modules[8][15-b-1]=e;this.modules[this.moduleCount-8][8]=!a},mapData:function(a,c){for(var d=-1,b=this.moduleCount-1,e=7,f=0,i=this.moduleCount-1;0<i;i-=2)for(6==i&&i--;;){for(var g=0;2>g;g++)if(null==this.modules[b][i-g]){var n=!1;f<a.length&&(n=1==(a[f]>>>e&1));j.getMask(c,b,i-g)&&(n=!n);this.modules[b][i-g]=n;e--; -1==e&&(f++,e=7)}b+=d;if(0>b||this.moduleCount<=b){b-=d;d=-d;break}}}};o.PAD0=236;o.PAD1=17;o.createData=function(a,c,d){for(var c=p.getRSBlocks(a,
c),b=new t,e=0;e<d.length;e++){var f=d[e];b.put(f.mode,4);b.put(f.getLength(),j.getLengthInBits(f.mode,a));f.write(b)}for(e=a=0;e<c.length;e++)a+=c[e].dataCount;if(b.getLengthInBits()>8*a)throw Error("code length overflow. ("+b.getLengthInBits()+">"+8*a+")");for(b.getLengthInBits()+4<=8*a&&b.put(0,4);0!=b.getLengthInBits()%8;)b.putBit(!1);for(;!(b.getLengthInBits()>=8*a);){b.put(o.PAD0,8);if(b.getLengthInBits()>=8*a)break;b.put(o.PAD1,8)}return o.createBytes(b,c)};o.createBytes=function(a,c){for(var d=
0,b=0,e=0,f=Array(c.length),i=Array(c.length),g=0;g<c.length;g++){var n=c[g].dataCount,h=c[g].totalCount-n,b=Math.max(b,n),e=Math.max(e,h);f[g]=Array(n);for(var k=0;k<f[g].length;k++)f[g][k]=255&a.buffer[k+d];d+=n;k=j.getErrorCorrectPolynomial(h);n=(new q(f[g],k.getLength()-1)).mod(k);i[g]=Array(k.getLength()-1);for(k=0;k<i[g].length;k++)h=k+n.getLength()-i[g].length,i[g][k]=0<=h?n.get(h):0}for(k=g=0;k<c.length;k++)g+=c[k].totalCount;d=Array(g);for(k=n=0;k<b;k++)for(g=0;g<c.length;g++)k<f[g].length&&
(d[n++]=f[g][k]);for(k=0;k<e;k++)for(g=0;g<c.length;g++)k<i[g].length&&(d[n++]=i[g][k]);return d};s=4;for(var j={PATTERN_POSITION_TABLE:[[],[6,18],[6,22],[6,26],[6,30],[6,34],[6,22,38],[6,24,42],[6,26,46],[6,28,50],[6,30,54],[6,32,58],[6,34,62],[6,26,46,66],[6,26,48,70],[6,26,50,74],[6,30,54,78],[6,30,56,82],[6,30,58,86],[6,34,62,90],[6,28,50,72,94],[6,26,50,74,98],[6,30,54,78,102],[6,28,54,80,106],[6,32,58,84,110],[6,30,58,86,114],[6,34,62,90,118],[6,26,50,74,98,122],[6,30,54,78,102,126],[6,26,52,
78,104,130],[6,30,56,82,108,134],[6,34,60,86,112,138],[6,30,58,86,114,142],[6,34,62,90,118,146],[6,30,54,78,102,126,150],[6,24,50,76,102,128,154],[6,28,54,80,106,132,158],[6,32,58,84,110,136,162],[6,26,54,82,110,138,166],[6,30,58,86,114,142,170]],G15:1335,G18:7973,G15_MASK:21522,getBCHTypeInfo:function(a){for(var c=a<<10;0<=j.getBCHDigit(c)-j.getBCHDigit(j.G15);)c^=j.G15<<j.getBCHDigit(c)-j.getBCHDigit(j.G15);return(a<<10|c)^j.G15_MASK},getBCHTypeNumber:function(a){for(var c=a<<12;0<=j.getBCHDigit(c)-
j.getBCHDigit(j.G18);)c^=j.G18<<j.getBCHDigit(c)-j.getBCHDigit(j.G18);return a<<12|c},getBCHDigit:function(a){for(var c=0;0!=a;)c++,a>>>=1;return c},getPatternPosition:function(a){return j.PATTERN_POSITION_TABLE[a-1]},getMask:function(a,c,d){switch(a){case 0:return 0==(c+d)%2;case 1:return 0==c%2;case 2:return 0==d%3;case 3:return 0==(c+d)%3;case 4:return 0==(Math.floor(c/2)+Math.floor(d/3))%2;case 5:return 0==c*d%2+c*d%3;case 6:return 0==(c*d%2+c*d%3)%2;case 7:return 0==(c*d%3+(c+d)%2)%2;default:throw Error("bad maskPattern:"+
a);}},getErrorCorrectPolynomial:function(a){for(var c=new q([1],0),d=0;d<a;d++)c=c.multiply(new q([1,l.gexp(d)],0));return c},getLengthInBits:function(a,c){if(1<=c&&10>c)switch(a){case 1:return 10;case 2:return 9;case s:return 8;case 8:return 8;default:throw Error("mode:"+a);}else if(27>c)switch(a){case 1:return 12;case 2:return 11;case s:return 16;case 8:return 10;default:throw Error("mode:"+a);}else if(41>c)switch(a){case 1:return 14;case 2:return 13;case s:return 16;case 8:return 12;default:throw Error("mode:"+
a);}else throw Error("type:"+c);},getLostPoint:function(a){for(var c=a.getModuleCount(),d=0,b=0;b<c;b++)for(var e=0;e<c;e++){for(var f=0,i=a.isDark(b,e),g=-1;1>=g;g++)if(!(0>b+g||c<=b+g))for(var h=-1;1>=h;h++)0>e+h||c<=e+h||0==g&&0==h||i==a.isDark(b+g,e+h)&&f++;5<f&&(d+=3+f-5)}for(b=0;b<c-1;b++)for(e=0;e<c-1;e++)if(f=0,a.isDark(b,e)&&f++,a.isDark(b+1,e)&&f++,a.isDark(b,e+1)&&f++,a.isDark(b+1,e+1)&&f++,0==f||4==f)d+=3;for(b=0;b<c;b++)for(e=0;e<c-6;e++)a.isDark(b,e)&&!a.isDark(b,e+1)&&a.isDark(b,e+
2)&&a.isDark(b,e+3)&&a.isDark(b,e+4)&&!a.isDark(b,e+5)&&a.isDark(b,e+6)&&(d+=40);for(e=0;e<c;e++)for(b=0;b<c-6;b++)a.isDark(b,e)&&!a.isDark(b+1,e)&&a.isDark(b+2,e)&&a.isDark(b+3,e)&&a.isDark(b+4,e)&&!a.isDark(b+5,e)&&a.isDark(b+6,e)&&(d+=40);for(e=f=0;e<c;e++)for(b=0;b<c;b++)a.isDark(b,e)&&f++;a=Math.abs(100*f/c/c-50)/5;return d+10*a}},l={glog:function(a){if(1>a)throw Error("glog("+a+")");return l.LOG_TABLE[a]},gexp:function(a){for(;0>a;)a+=255;for(;256<=a;)a-=255;return l.EXP_TABLE[a]},EXP_TABLE:Array(256),
LOG_TABLE:Array(256)},m=0;8>m;m++)l.EXP_TABLE[m]=1<<m;for(m=8;256>m;m++)l.EXP_TABLE[m]=l.EXP_TABLE[m-4]^l.EXP_TABLE[m-5]^l.EXP_TABLE[m-6]^l.EXP_TABLE[m-8];for(m=0;255>m;m++)l.LOG_TABLE[l.EXP_TABLE[m]]=m;q.prototype={get:function(a){return this.num[a]},getLength:function(){return this.num.length},multiply:function(a){for(var c=Array(this.getLength()+a.getLength()-1),d=0;d<this.getLength();d++)for(var b=0;b<a.getLength();b++)c[d+b]^=l.gexp(l.glog(this.get(d))+l.glog(a.get(b)));return new q(c,0)},mod:function(a){if(0>
this.getLength()-a.getLength())return this;for(var c=l.glog(this.get(0))-l.glog(a.get(0)),d=Array(this.getLength()),b=0;b<this.getLength();b++)d[b]=this.get(b);for(b=0;b<a.getLength();b++)d[b]^=l.gexp(l.glog(a.get(b))+c);return(new q(d,0)).mod(a)}};p.RS_BLOCK_TABLE=[[1,26,19],[1,26,16],[1,26,13],[1,26,9],[1,44,34],[1,44,28],[1,44,22],[1,44,16],[1,70,55],[1,70,44],[2,35,17],[2,35,13],[1,100,80],[2,50,32],[2,50,24],[4,25,9],[1,134,108],[2,67,43],[2,33,15,2,34,16],[2,33,11,2,34,12],[2,86,68],[4,43,27],
[4,43,19],[4,43,15],[2,98,78],[4,49,31],[2,32,14,4,33,15],[4,39,13,1,40,14],[2,121,97],[2,60,38,2,61,39],[4,40,18,2,41,19],[4,40,14,2,41,15],[2,146,116],[3,58,36,2,59,37],[4,36,16,4,37,17],[4,36,12,4,37,13],[2,86,68,2,87,69],[4,69,43,1,70,44],[6,43,19,2,44,20],[6,43,15,2,44,16],[4,101,81],[1,80,50,4,81,51],[4,50,22,4,51,23],[3,36,12,8,37,13],[2,116,92,2,117,93],[6,58,36,2,59,37],[4,46,20,6,47,21],[7,42,14,4,43,15],[4,133,107],[8,59,37,1,60,38],[8,44,20,4,45,21],[12,33,11,4,34,12],[3,145,115,1,146,
116],[4,64,40,5,65,41],[11,36,16,5,37,17],[11,36,12,5,37,13],[5,109,87,1,110,88],[5,65,41,5,66,42],[5,54,24,7,55,25],[11,36,12],[5,122,98,1,123,99],[7,73,45,3,74,46],[15,43,19,2,44,20],[3,45,15,13,46,16],[1,135,107,5,136,108],[10,74,46,1,75,47],[1,50,22,15,51,23],[2,42,14,17,43,15],[5,150,120,1,151,121],[9,69,43,4,70,44],[17,50,22,1,51,23],[2,42,14,19,43,15],[3,141,113,4,142,114],[3,70,44,11,71,45],[17,47,21,4,48,22],[9,39,13,16,40,14],[3,135,107,5,136,108],[3,67,41,13,68,42],[15,54,24,5,55,25],[15,
43,15,10,44,16],[4,144,116,4,145,117],[17,68,42],[17,50,22,6,51,23],[19,46,16,6,47,17],[2,139,111,7,140,112],[17,74,46],[7,54,24,16,55,25],[34,37,13],[4,151,121,5,152,122],[4,75,47,14,76,48],[11,54,24,14,55,25],[16,45,15,14,46,16],[6,147,117,4,148,118],[6,73,45,14,74,46],[11,54,24,16,55,25],[30,46,16,2,47,17],[8,132,106,4,133,107],[8,75,47,13,76,48],[7,54,24,22,55,25],[22,45,15,13,46,16],[10,142,114,2,143,115],[19,74,46,4,75,47],[28,50,22,6,51,23],[33,46,16,4,47,17],[8,152,122,4,153,123],[22,73,45,
3,74,46],[8,53,23,26,54,24],[12,45,15,28,46,16],[3,147,117,10,148,118],[3,73,45,23,74,46],[4,54,24,31,55,25],[11,45,15,31,46,16],[7,146,116,7,147,117],[21,73,45,7,74,46],[1,53,23,37,54,24],[19,45,15,26,46,16],[5,145,115,10,146,116],[19,75,47,10,76,48],[15,54,24,25,55,25],[23,45,15,25,46,16],[13,145,115,3,146,116],[2,74,46,29,75,47],[42,54,24,1,55,25],[23,45,15,28,46,16],[17,145,115],[10,74,46,23,75,47],[10,54,24,35,55,25],[19,45,15,35,46,16],[17,145,115,1,146,116],[14,74,46,21,75,47],[29,54,24,19,
55,25],[11,45,15,46,46,16],[13,145,115,6,146,116],[14,74,46,23,75,47],[44,54,24,7,55,25],[59,46,16,1,47,17],[12,151,121,7,152,122],[12,75,47,26,76,48],[39,54,24,14,55,25],[22,45,15,41,46,16],[6,151,121,14,152,122],[6,75,47,34,76,48],[46,54,24,10,55,25],[2,45,15,64,46,16],[17,152,122,4,153,123],[29,74,46,14,75,47],[49,54,24,10,55,25],[24,45,15,46,46,16],[4,152,122,18,153,123],[13,74,46,32,75,47],[48,54,24,14,55,25],[42,45,15,32,46,16],[20,147,117,4,148,118],[40,75,47,7,76,48],[43,54,24,22,55,25],[10,
45,15,67,46,16],[19,148,118,6,149,119],[18,75,47,31,76,48],[34,54,24,34,55,25],[20,45,15,61,46,16]];p.getRSBlocks=function(a,c){var d=p.getRsBlockTable(a,c);if(void 0==d)throw Error("bad rs block @ typeNumber:"+a+"/errorCorrectLevel:"+c);for(var b=d.length/3,e=[],f=0;f<b;f++)for(var h=d[3*f+0],g=d[3*f+1],j=d[3*f+2],l=0;l<h;l++)e.push(new p(g,j));return e};p.getRsBlockTable=function(a,c){switch(c){case 1:return p.RS_BLOCK_TABLE[4*(a-1)+0];case 0:return p.RS_BLOCK_TABLE[4*(a-1)+1];case 3:return p.RS_BLOCK_TABLE[4*
(a-1)+2];case 2:return p.RS_BLOCK_TABLE[4*(a-1)+3]}};t.prototype={get:function(a){return 1==(this.buffer[Math.floor(a/8)]>>>7-a%8&1)},put:function(a,c){for(var d=0;d<c;d++)this.putBit(1==(a>>>c-d-1&1))},getLengthInBits:function(){return this.length},putBit:function(a){var c=Math.floor(this.length/8);this.buffer.length<=c&&this.buffer.push(0);a&&(this.buffer[c]|=128>>>this.length%8);this.length++}};"string"===typeof h&&(h={text:h});h=r.extend({},{render:"canvas",width:256,height:256,typeNumber:-1,
correctLevel:2,background:"#ffffff",foreground:"#000000"},h);return this.each(function(){var a;if("canvas"==h.render){a=new o(h.typeNumber,h.correctLevel);a.addData(h.text);a.make();var c=document.createElement("canvas");c.width=h.width;c.height=h.height;for(var d=c.getContext("2d"),b=h.width/a.getModuleCount(),e=h.height/a.getModuleCount(),f=0;f<a.getModuleCount();f++)for(var i=0;i<a.getModuleCount();i++){d.fillStyle=a.isDark(f,i)?h.foreground:h.background;var g=Math.ceil((i+1)*b)-Math.floor(i*b),
j=Math.ceil((f+1)*b)-Math.floor(f*b);d.fillRect(Math.round(i*b),Math.round(f*e),g,j)}}else{a=new o(h.typeNumber,h.correctLevel);a.addData(h.text);a.make();c=r("<table></table>").css("width",h.width+"px").css("height",h.height+"px").css("border","0px").css("border-collapse","collapse").css("background-color",h.background);d=h.width/a.getModuleCount();b=h.height/a.getModuleCount();for(e=0;e<a.getModuleCount();e++){f=r("<tr></tr>").css("height",b+"px").appendTo(c);for(i=0;i<a.getModuleCount();i++)r("<td></td>").css("width",
d+"px").css("background-color",a.isDark(e,i)?h.foreground:h.background).appendTo(f)}}a=c;jQuery(a).appendTo(this)})}})(jQuery);
	
	//GET COLOR OPTION
	var sideBtn = jQuery('#GrabAR_Btn').data("use_side_button");
	if(sideBtn && sideBtn.toLowerCase() != 'no'){
		//setup sticky button
		//var btn = '<div class="GrabAR_Btn" id="btnLink" onclick="GrabAR_Select();"><img id="GrabAR_BtnImg" src="'+btnSrc+'"></div>';
		var sideBtnPos = jQuery('#GrabAR_Btn').data("side_button_position");
		if(sideBtnPos){
			if(sideBtnPos.includes('left'))
				var LR = '-left';
			else
				var LR = '-right';
			
			if(sideBtnPos.includes('top'))
				var TCB = '-top';
			else if(sideBtnPos.includes('bottom'))
				var TCB = '-bottom';
			else
				var TCB = '-center';
		}
		else{
			var LR = '-right';
			var TCB = '-center';
		}
			
			
		var btn = '<ul id="GrabAR_SideBtn" class="sticky-buttons -large '+LR+TCB+' -shadow -slide"><li class="white black"><a href="javascript:void(0);" onclick="GrabAR_Select();"><span class="sb-icon"><img id="GrabAR_sideBtnImg" src="https://grabarviewer.com/code/images/sideBtnIcon.png" style="border:0;"></span><span class="sb-label">GRAB AR</span></a></li></ul>';
		
		jQuery('#GrabAR_Btn').html(btn);

		//jQuery('#GrabAR_SideBtn .sb-label').addClass('-visible');
		
	    jQuery('#GrabAR_SideBtn').hover(function () {
	    	 jQuery('#GrabAR_sideBtnImg').attr('src', function (i, src) {
	            return src.replace('Icon.png', 'Icon_over.png')
	        })
	    }, function () {
	        jQuery('#GrabAR_sideBtnImg').attr('src', function (i, src) {
	            return src.replace('Icon_over.png', 'Icon.png')
	        })
	    });

	
	}
	else{
		//use standard button
		//GET COLOR OPTION
		var btnColor = jQuery('#GrabAR_Btn').data("button_color");
		if(btnColor == "white")
			var btnColorSrc = "GrabARBttn_White.png";
		else
			var btnColorSrc = "GrabARBttn.png";
		
		//GET CUSTOM STYLE OPTION
		var btnStyle = jQuery('#GrabAR_Btn').data("custom_style");
		if(btnStyle){
			var css = btnStyle.split(";");
			jQuery.each(css, function( i, val ) {
				var cssEach = val.split(":");
				jQuery('#GrabAR_Btn').css(cssEach[0],cssEach[1]);
			});
		}
		
		//GET BUTTON SOURCE
		var btnSrc = jQuery('#GrabAR_Btn').data("button_src");
		if(typeof(btnSrc) == 'string'){
			if(btnSrc.substring(0, 4).toLowerCase() == 'http' && (btnSrc.substring(btnSrc.length-3).toLowerCase() == "jpg" || btnSrc.substring(btnSrc.length-3).toLowerCase() == "png" || btnSrc.substring(btnSrc.length-3).toLowerCase() == "gif" || btnSrc.substring(btnSrc.length-4).toLowerCase() == "jpeg")){
				//IS VALID IMAGE LINK 
				//do nothing allow link
			}
			else
				btnSrc = 'https://grabarviewer.com/code/images/'+btnColorSrc;
		}
		else
			btnSrc = 'https://grabarviewer.com/code/images/'+btnColorSrc;
		
		var btn = '<div class="GrabAR_Btn" id="btnLink" onclick="GrabAR_Select();"><img id="GrabAR_BtnImg" src="'+btnSrc+'"></div>';
		var imgWidth = jQuery('#GrabAR_Btn').data("img_width");
		jQuery('#GrabAR_Btn').html(btn);
		if(imgWidth >= 50)
			jQuery('#GrabAR_BtnImg').width(imgWidth+"px");
		
		var isFixed = jQuery('#GrabAR_Btn').data("fixed");
		var paddingPx = jQuery('#GrabAR_Btn').data("padding");
		if(!paddingPx)paddingPx = "10";
		if(isFixed){
			if(isFixed == "bottom_left"){
				jQuery('#GrabAR_Btn').css({'position': 'fixed', 'bottom': paddingPx+'px', 'left':'10px','z-index':'9000'});
			}
			else if(isFixed == "bottom_right"){
				jQuery('#GrabAR_Btn').css({'position': 'fixed', 'bottom': paddingPx+'px', 'right':'10px','z-index':'9000'});
			}
			else{
				var topPx = jQuery('#GrabAR_Btn').data("top");
				if(!topPx)topPx = "10";
				jQuery('#GrabAR_Btn').css({'top': paddingPx+'px'});
				if(isFixed == "top_right")
					jQuery('#GrabAR_Btn').css({'right':'10px'});
				else if(isFixed == "top_left")
					jQuery('#GrabAR_Btn').css({'left':'10px'});
				
				jQuery(window).scroll(function(e){
				  var isPositionFixed = (jQuery('#GrabAR_Btn').css('position') == 'fixed');
				  if (jQuery(this).scrollTop() > 200 && !isPositionFixed){ 
				    jQuery('#GrabAR_Btn').css({'position': 'fixed', 'top': topPx+'px','z-index':'100000'}); 
				    if(isFixed == "top_right"){
							jQuery('#GrabAR_Btn').css({'right': '10px'});
						}
						else if(isFixed == "top_left"){
							jQuery('#GrabAR_Btn').css({'left': '10px'});
						}
				  }
				  if (jQuery(this).scrollTop() < 200 && isPositionFixed){
				  	jQuery('#GrabAR_Btn').removeAttr("style");
				  	jQuery('#GrabAR_Btn').attr("style",jQuery('#GrabAR_Btn').data('style'));
				    //jQuery('#GrabAR_Btn').css({'position': 'static', 'top': '0px'}); 
				  }
				});
			}
			
		}
		//SAVE CURRENT STYLE
		var curStyle = jQuery('#GrabAR_Btn').attr('style');
		
		//Make sure z-index is set
		if(curStyle){
			if(!curStyle.includes("z-index")){
				jQuery('#GrabAR_Btn').css("z-index","9000");
				curStyle = jQuery('#GrabAR_Btn').attr('style');
			}
		}
		jQuery('#GrabAR_Btn').data('style', curStyle );
	} //end use standard button
	

	jQuery( "img" ).click(  
		function() {
			if(jQuery(this).width() > 100 && jQuery (this).height() > 100){
				if(!jQuery('#GrabAR_Btn').data("img_src"))
					jQuery('#GrabAR_Btn').attr('data-img_src',jQuery(this).attr('src'));
				else
					jQuery('#GrabAR_Btn').data('img_src',jQuery(this).attr('src'));
				
				var ID = Date.now();
				jQuery('#GrabAR_Btn').append('<img src="https://grabarviewer.com/code/images/GrabAR_50_stroke.png" id="GR'+ID+'" style="max-height:30px;position:absolute;top:-40px;left:0">');
				jQuery('#GR'+ID).delay(2000).fadeOut( "slow", function() {
					jQuery('#GR'+ID).remove();
				});
			}
	    	
	  });
});

jQuery(function(){
	// Variables
	let overlay = document.createElement('div');
	let dataBody = null;
	let dataOverlay = null;

	// Insert overlay element
	overlay.classList.add('overlay');
	document.querySelector('body').appendChild(overlay);

	// Button click function
	document.querySelectorAll('[data-modal^="modal"]').forEach(function(e){
		e.addEventListener('click', (ev)=> {
			let dataModal = e.getAttribute('data-modal');
			let modal = document.getElementById(dataModal);

			if (modal.getAttribute('data-body')) {
				dataBody = modal.getAttribute('data-body');			
			}

			if (modal.getAttribute('data-overlay')) {
				dataOverlay = modal.getAttribute('data-overlay');			
			}

			addClass(modal);
			ev.preventDefault();
		});
	});

	// Overlay click function
	overlay.addEventListener('click', function(){
		let currentModal = document.querySelector('.sd-modal.active');
		removeClass(currentModal);
	});

	// Scape button keydown function
	window.addEventListener('keydown', function(e){
		if (e.keyCode === 27 && overlay.classList.contains('active')) {
			let currentModal = document.querySelector('.sd-modal.active');
			removeClass(currentModal);
		}	
	});

	// Show modal
	function addClass(el) {
		el.classList.add("active");
		overlay.classList.add('active');
		if (dataBody) {
			document.querySelector('body').classList.add(dataBody);
		}
		if (dataOverlay) {
			document.querySelector('body').classList.add(dataOverlay);
		}

		// Close button function (moved to addClass because close is added dynamically)
		document.querySelectorAll('.sd-modal').forEach(function(e) {
			let close = e.querySelector('span.close');
			close.addEventListener('click', function(){
				removeClass(e);
			});
		});
	}

	// Close modal
	function removeClass(el) {
		el.classList.remove("active");
		overlay.classList.remove('active');
		if (dataBody) {
			document.querySelector('body').classList.remove(dataBody);
			dataBody = null;
		}

		if (dataOverlay) {
			document.querySelector('body').classList.remove(dataOverlay);
			dataOverlay = null;
		}
	}

});


