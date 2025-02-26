;(function() {
	tinymce.PluginManager.add('ganxy_shortcode', function( editor, url ) {
		var sh_tag 		= 'ganxy_shortcode',
			touchStart 	= false,
			tapped 		= false;

		function openEditorGanxy(e) {
			var cls  = e.target.className.indexOf('wp-ganxy_shortcode');
			if ( e.target.nodeName == 'IMG' && e.target.className.indexOf('wp-ganxy_shortcode') > -1 ) {
				var popupTitle = e.target.attributes['data-sh-attr'].value;
				popupTitle = window.decodeURIComponent(popupTitle);
				var content = e.target.attributes['data-sh-content'].value;
				if( getAttr(popupTitle,'music') == 'true' && getAttr(popupTitle,'musicdata') != '' ){
					editor.execCommand('ganxy_shortcode_popup_embed','',{
						gid			: getAttr(popupTitle,'gid'),
						music		: getAttr(popupTitle,'music'),
						musicdata	: getAttr(popupTitle,'musicdata'),
						content		: content
					});
				}else{
					editor.execCommand('ganxy_shortcode_popup_url','',{
						skin 		: getAttr(popupTitle,'skin'),
						transparent : getAttr(popupTitle,'transparent'),
						blurb   	: getAttr(popupTitle,'blurb'),
						sharing		: getAttr(popupTitle,'sharing'),
						retailers	: getAttr(popupTitle,'retailers'),
						emailcap	: getAttr(popupTitle,'emailcap'),
						datamodal	: getAttr(popupTitle,'datamodal'),
						nopaypal	: getAttr(popupTitle,'nopaypal'),
						idownload	: getAttr(popupTitle,'idownload'),
						voucher		: getAttr(popupTitle,'voucher'),
						initlayout	: getAttr(popupTitle,'initlayout'),
						title		: getAttr(popupTitle,'title'),
						author		: getAttr(popupTitle,'author'),
						gid			: getAttr(popupTitle,'gid'),
						music		: getAttr(popupTitle,'music'),
						content		: content
					});
				}
			}
		}

		function toTitleCase( str ){
    		return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
		}

		function getMatches( string, regex, index ) {
			index || (index = 1); // default to the first capturing group
			var matches = [],
				tmatch;
			while (tmatch = regex.exec(string)) {
				matches.push(tmatch[index]);
			}
			return matches;
		}

		function getAttr(s, n) {
			n = new RegExp(n + '=\"([^\"]+)\"', 'g').exec(s);
			return n ?  window.decodeURIComponent(n[1]) : '';
		};

		function html( cls, data ,con) {
			var placeholder = url + '/img/ganxy-' + getAttr(data,'skin') + '.png',
				mData = getAttr(data,'musicdata');
			if( getAttr(data,'skin') == '' && getAttr(data,'music') == 'true' )
				placeholder = url + '/img/ganxy-music.png';
			if( mData != '' && mData.indexOf( 'bundle-' ) != -1  )
				placeholder = url + '/img/ganxy-bundle.png';
			data 	= window.encodeURIComponent( data );
			content = window.encodeURIComponent( con );
			return '<img style="max-width:100%;width:100%;height:auto;cursor:pointer;" src="' + placeholder + '" class="mceItem ' + cls + '" ' + 'data-sh-attr="' + data + '" data-sh-content="'+ content +'" data-mce-resize="false" data-mce-placeholder="1" />';
		}

		function replaceShortcodes( content ) {
			content = content.replace( /\[ganxy_shortcode([^\]]*)\]([^\]]*)\[\/ganxy_shortcode\]/g, function( all,attr,con) {
				return html( 'wp-ganxy_shortcode', attr , window.decodeURIComponent(con));
			});
			return content;
		}

		function restoreShortcodes( content ) {
			return content.replace( /(?:<p(?: [^>]+)?>)*(<img [^>]+>)(?:<\/p>)*/g, function( match, image ) {
				var data = getAttr( image, 'data-sh-attr' ),
					con = getAttr( image, 'data-sh-content' );
				if ( data ) {
					return '<p>[' + sh_tag + data + ']' + con + '[/'+sh_tag+']</p>';
				}
				return match;
			});
		}
		
		//add popup help
		editor.addCommand('ganxy_shortcode_popup_help', function(ui, v) {
			editor.windowManager.open( {
				id: 'ganxy-help-wrapper',
				title: editor.getLang('ganxy_embed.panel_title_help'),
				body: [{id: 'ganxy-help',type: 'container',minWidth: 450,minHeight: 400,html: editor.getLang('ganxy_embed.panel_help_text'),}]
			});
	    });

		//add popup by embed code
		editor.addCommand('ganxy_shortcode_popup_embed', function(ui, v) {
			var Base64 = {
				_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
				encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},
				decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},
				_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},
				_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}
			}
			var	gid 		= v.gid ? v.gid : '',
				music 		= v.music ? v.music : 'false',
				musicdata	= v.musicdata ? v.musicdata :'',
				title 		= v.title ? v.title : '',
				content 	= v.content ? v.content : '',
				econtent	= '',
				popHeight	= 150,
				popWide		= 300;
			if( music != 'false' && musicdata != '' ){
				if( musicdata.indexOf('bundle') != -1 ){
					econtent 	= decodeURIComponent( Base64.decode( musicdata.replace('bundle','') ) ) ;
					popHeight	= 350;
					popWide		= 400;
				}else{
					econtent 	= '<script src="https://ganxy.com/g.js#'+encodeURIComponent(musicdata)+'"></script>';
				}
			}
			editor.windowManager.open( {
				id: 'ganxy-embed-wrapper',
				title: editor.getLang('ganxy_embed.panel_title_embed'),
				body: [
					{
						id: 'ganxy-embed-textbox',
						type: 'textbox',
						name: 'embedcode',
						label: editor.getLang('ganxy_embed.ganxy_embed_label'),
						value: econtent,
						multiline: true,
						minWidth: popWide,
						minHeight: popHeight,
						style: 'vertical-align:top;',
						tooltip: editor.getLang('ganxy_embed.ganxy_embed_tip')
					}
				],
				onsubmit: function( e ) {
					var shortcode_str = '[' + sh_tag ;
					var embedcode 	 = '';
					if ( typeof e.data.embedcode != 'undefined' && e.data.embedcode.length ){
						embedcode 	 = e.data.embedcode;
						var testcode = embedcode;
						var matches  = [];
						if( testcode.indexOf( 'ganxy.com/g.js#' ) != -1 ) {
							if(testcode.indexOf( 'ganxy-bundle' ) != -1){
							//if it is a music bundle embed.
								testcode.replace(/<div class\=\"ganxy-bundle-header\"\>[\S\s]*?\<script src\=\"https\:\/\/ganxy.com\/g\.js\#([^"]*?)\"><\/script>[\S\s]*?<\/div>/g, function(){
									matches.push( Array.prototype.slice.call( arguments, 1 ) );
								});
								if( typeof matches[0] == 'undefined' ){
									alert('error');
									return false;
								}
								var theData	= ( typeof matches[0][0] != 'undefined' ) ? Base64.decode( decodeURIComponent( matches[0][0] ) ) : '';
								var parsed = JSON.parse(theData);
								if( parsed.hasOwnProperty( 'id' ) )
									shortcode_str += ' gid="' + parsed.id + '"';
								shortcode_str += ' music="true"';
								shortcode_str += ' musicdata="bundle-'+ encodeURIComponent(  Base64.encode( testcode ) )+'"';
							}else{
							//if it is a single music embed.
								testcode.replace(/<script\s+[^>]*src="(https?:\/\/ganxy.com\/g.js\#([^"]*))"[^>]*>[\S\s]*?<\/script>/g, function () {
									matches.push( Array.prototype.slice.call( arguments, 1, 4 ) )
								});	
								if( typeof matches[0] == 'undefined' ){
									alert('error');
									return false;
								}
								var theMusic 	= ( typeof matches[0][1] != 'undefined' ) ? Base64.decode( decodeURIComponent( matches[0][1] ) ) : '';
								var theMusicEnc	= ( typeof matches[0][1] != 'undefined' ) ? matches[0][1] : '';
								var parsed = JSON.parse(theMusic);
								if( parsed.hasOwnProperty( 'id' ) )
									shortcode_str += ' gid="' + parsed.id + '"';
								if( parsed.hasOwnProperty( 'description' ) )
									shortcode_str += ' title="' + parsed.description + '"';
								shortcode_str += ' music="true"';
								shortcode_str += ' musicdata="' + theMusicEnc + '"';
							}
						}else{
							//if it is a regular embed.
							embedcode 	= embedcode.replace(/<script([\S\s]*?)>([\S\s]*?)<\/script>/ig,'');
							testcode 	= embedcode;
							testcode.replace(/<a\s+[^>]*href="(https?:\/\/ganxy.com\/([^"]*))"\s+[^>]*>(.*?)<\/a>/g, function () {
								matches.push( Array.prototype.slice.call( arguments, 1, 4 ) )
							});	
							if( typeof matches[0] == 'undefined' ){
								alert('error');
								return false;
							}
							var theGIDStr 	= ( typeof matches[0][1] != 'undefined' ) ? matches[0][1] : '',
								theTitleStr = ( typeof matches[0][2] != 'undefined' ) ? String( matches[0][2] ) : '',
								ttlPieces 	= theTitleStr.split( ' by ' ),
								gidPieces 	= theGIDStr.split( '/' );
							if ( embedcode.indexOf( "data-skin='dark'" ) != -1 || embedcode.indexOf( 'data-skin="dark"' ) != -1)
								shortcode_str += ' skin="dark"';
							else
								shortcode_str += ' skin="light"';
							if ( embedcode.indexOf( 'data-transparent' ) != -1 )
								shortcode_str += ' transparent="true"';
							if ( embedcode.indexOf( 'data-no-blurb' ) == -1 )
								shortcode_str += ' blurb="true"';
							if ( embedcode.indexOf( 'data-no-sharing-options' ) == -1 )
								shortcode_str += ' sharing="true"';
							if ( embedcode.indexOf( 'data-no-retailers' ) == -1 )
								shortcode_str += ' retailers="true"';
							if ( embedcode.indexOf( 'data-no-email-capture' ) == -1 )
								shortcode_str += ' emailcap="true"';
							if ( embedcode.indexOf( 'data-modal="true"' ) != -1 || embedcode.indexOf( "data-modal='true'" ) != -1 )
								shortcode_str += ' datamodal="true"';
							if ( embedcode.indexOf( 'data-init-layout="cc"' ) != -1 || embedcode.indexOf( "data-init-layout='cc'" ) != -1 )
								shortcode_str += ' initlayout="cc"';
							else if ( embedcode.indexOf( 'data-init-layout="bulk"' ) != -1 || embedcode.indexOf( "data-init-layout='bulk'" ) != -1 )
								shortcode_str += ' initlayout="bulk"';
							else if ( embedcode.indexOf( 'data-init-layout="gift"' ) != -1 || embedcode.indexOf( "data-init-layout='gift'" ) != -1 )
								shortcode_str += ' initlayout="gift"';
							if ( embedcode.indexOf( 'data-no-paypal' ) != -1 )
								shortcode_str += ' nopaypal="true"';
							if ( embedcode.indexOf( 'data-inline-download' ) != -1 )
								shortcode_str += ' idownload="true"';
							if ( typeof ttlPieces[0] !='undefined' && ttlPieces[0] != '' )
								shortcode_str += ' title="' + ttlPieces[0].replace( '"', '' ) + '"';
							if ( typeof ttlPieces[1] !='undefined' && ttlPieces[1] != '' )
								shortcode_str += ' author="' + ttlPieces[1].replace( '"', '' ) + '"';
							if ( typeof gidPieces[1] != 'undefined' && gidPieces[1] != '' )
								shortcode_str += ' gid="' + gidPieces[1] + '"';
							if ( embedcode.indexOf( 'ganxy-book' ) == -1 )
								shortcode_str += ' music="true"';
						}
					}
					var content =  typeof e.data.content != 'undefined' ? e.data.content : '';
					shortcode_str += ']' + content + '[/' + sh_tag + ']';
					editor.insertContent( shortcode_str);
				}
			});
	    });
		
		//add popup by URL
		editor.addCommand('ganxy_shortcode_popup_url', function(ui, v) {
			if (!String.prototype.trim) {String.prototype.trim = function() {return this.replace(/^\s+|\s+$/g,'');}}
			var skin 		= v.skin ? v.skin : 'light',
				transparent = v.transparent ? v.transparent : 'false',
				blurb 		= v.blurb ? v.blurb : 'false',
				sharing 	= v.sharing ? v.sharing : 'false',
				retailers 	= v.retailers ? v.retailers : 'false',
				emailcap 	= v.emailcap ? v.emailcap : 'false',
				datamodal 	= v.datamodal ? v.datamodal : 'false',
				nopaypal 	= v.nopaypal ? v.nopaypal : 'false',
				idownload 	= v.idownload ? v.idownload : 'false',
				initlayout 	= v.initlayout ? v.initlayout : '',
				title 		= v.title ? v.title : '',
				author 		= v.author ? v.author : '',
				gid 		= v.gid ? v.gid : '',
				music 		= v.music ? v.music : 'false',
				voucher		= v.voucher ? v.voucher : '',
				content 	= v.content ? v.content : '',
				gurl		= v.gid && v.voucher ? 'https://ganxy.com/i/' + v.gid + '?voucher=' + v.voucher : ( v.gid ? 'https://ganxy.com/i/' + v.gid : '' );
				
			editor.windowManager.open( {
				id: 'ganxy-url-wrapper',
				title: editor.getLang('ganxy_embed.panel_title_url'),
				maxWidth: 650,
				body:[
					{
						id:	'ganxy-id-field',
						type: 'textbox',
						name: 'gid',
						value: gid,
						style: 'display:none;',
					},
					{
						id:	'ganxy-url-field',
						type: 'textbox',
						name: 'ganxyurl',
						label: editor.getLang('ganxy_embed.ganxyurl_label'),
						value: gurl,
						tooltip: editor.getLang('ganxy_embed.ganxyurl_tip'),
						onChange: function(e){
							var thsID = document.getElementById( 'ganxy-url-field' ),
								GIDID = document.getElementById( 'ganxy-id-field' ),
								ttlID = document.getElementById( 'ganxy-title-field' ),
								autID = document.getElementById( 'ganxy-author-field' ),
								vouID = document.getElementById( 'ganxy-voucher-field' ),
								voucherCode = '',
								targetURL 	= String(e.target.value);
							targetURL 	= targetURL.replace(/^\s+|\s+$/g,'');
							thsID.value = targetURL;
							targetURL 	= targetURL.replace(/((https?:\/\/(www\.)?)?ganxy\.com\/)/g,'');
							if( targetURL.indexOf( '?voucher=' ) != -1 ){
								var vCode = targetURL.split( '?voucher=' );
								if(vCode.length){
									voucherCode = vCode[ vCode.length-1 ];
									targetURL 	= targetURL.replace( '?voucher=' + voucherCode, '' )
									vouID.value = voucherCode;
								}
							}
							//just in case, take off last '/' if there is one - i.e., 'http://ganxy.com/i/30/author/title/'
							targetURL 	= targetURL.replace(/\/+$/g,''); 
							var tarPieces 	= targetURL.split('/'),
								info 		= '';
							for (var i = 0; i < tarPieces.length; i++) {
								switch(i) {
									case 0: // should be 'i'
										break;
									case 1: //Ganxy ID
										if (typeof tarPieces[1] !== 'undefined') {
											if( typeof GIDID.value != 'undefined')
												GIDID.value = tarPieces[1];
										}
										break;
									case 2: //author
										if (typeof tarPieces[2] !== 'undefined') {
											if( typeof autID.value != 'undefined' && autID.value == '')
												autID.value = toTitleCase( tarPieces[2].replace( /-/g, ' ' ) );
										}
										break;
									case 3: //title
										if (typeof tarPieces[3] !== 'undefined') {
											if( typeof ttlID.value != 'undefined' && ttlID.value == '')
												ttlID.value = toTitleCase( tarPieces[3].replace( /-/g, ' ' ) );
										}
										break;
								}
							}
						}
					},
					{
						id:	'ganxy-title-field',
						type: 'textbox',
						name: 'title',
						label: editor.getLang('ganxy_embed.title_label'),
						minWidth: 300,
						value: title,
						tooltip: editor.getLang('ganxy_embed.title_tip')
					},
					{
						id:	'ganxy-author-field',
						type: 'textbox',
						name: 'author',
						label: editor.getLang('ganxy_embed.author_label'),
						value: author,
						tooltip: editor.getLang('ganxy_embed.author_tip')
					},
					{
						id:	'ganxy-voucher-field',
						type: 'textbox',
						name: 'voucher',
						label: editor.getLang('ganxy_embed.voucher_label'),
						value: voucher,
						tooltip: editor.getLang('ganxy_embed.voucher_tip')
					},
					{
						type: 'listbox',
						name: 'skin',
						label: editor.getLang('ganxy_embed.skin_label'),
						value: skin,
						'values': [
							{text: editor.getLang('ganxy_embed.skin_option1'), value: 'light'},
							{text: editor.getLang('ganxy_embed.skin_option2'), value: 'dark'},
						],
						tooltip: editor.getLang('ganxy_embed.skin_tip')
					},
					{
						type: 'listbox',
						name: 'initlayout',
						value: initlayout,
						'values': [
							{text: editor.getLang('ganxy_embed.layout_option1'), value: ''},
							{text: editor.getLang('ganxy_embed.layout_option2'), value: 'cc'},
							{text: editor.getLang('ganxy_embed.layout_option3'), value: 'bulk'},
							{text: editor.getLang('ganxy_embed.layout_option4'), value: 'gift'},
						],
						label:  editor.getLang('ganxy_embed.initlayout_label'),
						tooltip: editor.getLang('ganxy_embed.initlayout_tip')
					},
					{	
						id: 'ganxy-add-options',
						type: 'container',
						html: '<h3 class="ganxy-additional-options">' + editor.getLang('ganxy_embed.options_label') + '</h3>',
						minHeight: 34,
					},
					{
						id:	'ganxy-option-zero',
						classes: 'ganxy-options',						
						type: 'checkbox',
						name: 'transparent',
						checked: ( transparent == 'true' ? true : false ),
						label: editor.getLang('ganxy_embed.transparent_label'),
						tooltip: editor.getLang('ganxy_embed.transparent_tip')
					},
					{
						id:	'ganxy-option-one',
						classes: 'ganxy-options',						
						type: 'checkbox',
						name: 'datamodal',
						checked: ( datamodal == 'true' ? true : false ),
						label:  editor.getLang('ganxy_embed.modal_label'),
						tooltip: editor.getLang('ganxy_embed.modal_tip')
					},
					{
						id:	'ganxy-option-two',
						classes: 'ganxy-options',						
						type: 'checkbox',
						name: 'blurb',
						checked: ( blurb == 'true' ? true : false ),
						label:  editor.getLang('ganxy_embed.blurb_label'),
						tooltip: editor.getLang('ganxy_embed.blurb_tip')
					},
					{
						id:	'ganxy-option-three',
						classes: 'ganxy-options',						
						type: 'checkbox',
						name: 'sharing',
						checked: ( sharing == 'true' ? true : false ),
						label:  editor.getLang('ganxy_embed.sharing_label'),
						tooltip: editor.getLang('ganxy_embed.sharing_tip')
					},
					{
						id:	'ganxy-option-four',
						classes: 'ganxy-options',						
						type: 'checkbox',
						name: 'retailers',
						checked: ( retailers == 'true' ? true : false ),
						label:  editor.getLang('ganxy_embed.retailers_label'),
						tooltip: editor.getLang('ganxy_embed.retailers_tip')
					},
					{
						id:	'ganxy-option-five',
						classes: 'ganxy-options',						
						type: 'checkbox',
						name: 'emailcap',
						checked: ( emailcap == 'true' ? true : false ),
						label:  editor.getLang('ganxy_embed.emailcap_label'),
						tooltip: editor.getLang('ganxy_embed.emailcap_tip')
					},
					{
						id:	'ganxy-option-six',
						classes: 'ganxy-options',						
						type: 'checkbox',
						name: 'nopaypal',
						checked: ( nopaypal == 'true' ? true : false ),
						label:  editor.getLang('ganxy_embed.nopaypal_label'),
						tooltip: editor.getLang('ganxy_embed.nopaypal_tip')
					},
					{
						id:	'ganxy-option-seven',
						classes: 'ganxy-options',						
						type: 'checkbox',
						name: 'idownload',
						checked: ( idownload == 'true' ? true : false ),
						label:  editor.getLang('ganxy_embed.idownload_label'),
						tooltip: editor.getLang('ganxy_embed.idownload_tip')
					},
					{
						id:	'ganxy-option-eight',
						classes: 'ganxy-options',						
						type: 'checkbox',
						name: 'music',
						checked: ( music == 'true' ? true : false ),
						label:  editor.getLang('ganxy_embed.music_label'),
						tooltip: editor.getLang('ganxy_embed.music_tip')
					},
					{
						id:	'ganxy-content',
						type: 'textbox',
						name: 'content',
						value: content,
						style: 'display:none;'
					},
				],
				onsubmit: function( e ) {
					var shortcode_str = '[' + sh_tag ;
					var ganxyURL = '';
					if (typeof e.data.ganxyurl != 'undefined' && e.data.ganxyurl.length)
						 ganxyURL = e.data.ganxyurl;
					if (typeof e.data.skin != 'undefined' && e.data.skin.length)
						shortcode_str += ' skin="' + e.data.skin + '"';
					if (typeof e.data.transparent != 'undefined' && e.data.transparent === true)
						shortcode_str += ' transparent="true"';
					if (typeof e.data.blurb != 'undefined' && e.data.blurb === true)
						shortcode_str += ' blurb="true"';
					if (typeof e.data.sharing != 'undefined' && e.data.sharing === true)
						shortcode_str += ' sharing="true"';
					if (typeof e.data.retailers != 'undefined' && e.data.retailers === true)
						shortcode_str += ' retailers="true"';
					if (typeof e.data.emailcap != 'undefined' && e.data.emailcap === true)
						shortcode_str += ' emailcap="true"';
					if (typeof e.data.title != 'undefined' && e.data.title.length)
						shortcode_str += ' title="' + encodeURIComponent(e.data.title) + '"';
					if (typeof e.data.author != 'undefined' && e.data.author.length)
						shortcode_str += ' author="' + encodeURIComponent(e.data.author) + '"';
					if (typeof e.data.gid != 'undefined' && e.data.gid.length)
						shortcode_str += ' gid="' + encodeURIComponent(e.data.gid) + '"';
					if (typeof e.data.voucher != 'undefined' && e.data.voucher.length )
						shortcode_str += ' voucher="' + encodeURIComponent(e.data.voucher) + '"';
					if (typeof e.data.music != 'undefined' && e.data.music === true)
						shortcode_str += ' music="true"';
					if (typeof e.data.datamodal != 'undefined' && e.data.datamodal === true)
						shortcode_str += ' datamodal="true"';
					if (typeof e.data.idownload != 'undefined' && e.data.idownload === true)
						shortcode_str += ' idownload="true"';
					if (typeof e.data.nopaypal != 'undefined' && e.data.nopaypal === true)
						shortcode_str += ' nopaypal="true"';
					if (typeof e.data.initlayout != 'undefined')
						shortcode_str += ' initlayout="' + encodeURIComponent(e.data.initlayout) + '"';

					var content =  typeof e.data.content != 'undefined' ? e.data.content : '';
					shortcode_str += ']' + decodeURIComponent(content) + '[/' + sh_tag + ']';
					editor.insertContent( shortcode_str);
				}
			});
	    });

		//add button
		editor.addButton('ganxy_shortcode', {
			id: 'ganxy-shortcode-button',
			icon: 'ganxy_shortcode',
			tooltip: editor.getLang('ganxy_embed.button_tooltip'),
			type: 'menubutton', 
			menu: [
				{ 
					id: 'ganxy-url-button',
					text: editor.getLang('ganxy_embed.menu_url_label'),
					onclick: function() {
						editor.execCommand('ganxy_shortcode_popup_url','',{
							skin 		: 'light', //or dark
							transparent : 'false',
							blurb   	: 'true',
							sharing		: 'false',
							retailers	: 'false',
							emailcap	: 'false',
							datamodal	: 'false',
							nopaypal	: 'true',
							idownload	: 'false',
							voucher		: '',
							initlayout	: '',
							title		: '',
							author		: '',
							gid			: '',
							music		: 'false',
							content		: ''
						});
					},
				},
				{ 
					id: 'ganxy-embed-button',
					text: editor.getLang('ganxy_embed.menu_embed_label'),
					onclick: function() {
						editor.execCommand('ganxy_shortcode_popup_embed','',{
							title		: '',
							gid			: '',
							music		: 'false',
							musicdata	: '',
							content		: ''
						});
					},
				},
				{ 
					id: 'ganxy-help-button',
					text: editor.getLang('ganxy_embed.menu_help_label'),
					onclick: function() {
						editor.execCommand('ganxy_shortcode_popup_help','',{});
					},
				}
			]

		});
	
		//replace from shortcode to an image placeholder
		editor.on('BeforeSetcontent', function(e){ 
			e.content = replaceShortcodes( e.content );
		});

		//replace from image placeholder to shortcode
		editor.on('GetContent', function(e){
			e.content = restoreShortcodes(e.content);
		});
		
		editor.on('touchstart',function(e) {
			e.preventDefault(); 
			touchStart	= true;
			if( !tapped ){
				tapped = setTimeout(function (){tapped = null;},300);
			}else{
				openEditorGanxy(e);
				clearTimeout(tapped);
				tapped = null;
			}
		});
		
		editor.on('touchend touchcancel',function (e){
			e.preventDefault();
			touchStart = false;
		});
		
		//open popup on placeholder double click (for non Touch);
		editor.on( 'DblClick', function (e){
			openEditorGanxy(e);
		});
	});
})();