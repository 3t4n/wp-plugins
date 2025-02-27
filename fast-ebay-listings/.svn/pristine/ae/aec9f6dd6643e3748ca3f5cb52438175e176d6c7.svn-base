
(function() {
	tinymce.PluginManager.add('ebay_item', function( editor, url ) {
		var sh_tag = 'ebay_item';

		//helper functions 
		function getAttr(s, n) {
			r = new RegExp(n + '=\"([^\"]*)\"', 'g').exec(s);
			if (!r) r = new RegExp(n + '=(.+?)([\\s$])', 'g').exec(s);
			return r ?  window.decodeURIComponent(r[1]) : '';
		};

		function replaceShortcodes( content ) {
			return content.replace( /\[(fu_ebay_item|ebay_item|fu_ebay_image|ebay_image)([^\]]*)\]/g, function(all,tag,attr) {
        var placeholder = url + '/images/ebayitempanel.jpg';
        attr = window.encodeURIComponent( attr );
  
        html = '<img src="' + placeholder + '" class="mceItem wp-' + sh_tag + '" ';
        html += 'title="' + editor.getLang("extrastrings.dblClicktoEdit") + '" ';
        html += 'data-sh-attr="' + attr + '" data-mce-resize="false" data-mce-placeholder="1" />';
        return html;
			});
		}

		function restoreShortcodes( content ) {
			return content.replace( /(?:<p(?: [^>]+)?>)*(<img [^>]+>)(?:<\/p>)*/g, function( match, image ) {
				if (!getAttr( image, 'class' ).includes('wp-' + sh_tag)) return match;
				var data = getAttr( image, 'data-sh-attr' );

				if ( data ) {
					return '<p>[' + sh_tag + data + ']</p>';
				}
				return match;
			});
		}

		//add popup
		editor.addCommand('ebay_item_popup', function(ui, v) {
			//setup defaults
			var item = v.item ? v.item : '';
      var variation = v.variation == 'true';

			var picwidth = v.picwidth ? v.picwidth : '';
			var customid = v.customid ? v.customid : '';
			
			editor.windowManager.open( {
				title: editor.getLang('extrastrings.felSingleItem'),
				body: [		 
          {
            type: 'textbox',
            name: 'item',
            label: editor.getLang('extrastrings.itemIdLabel'),
            value: item,
            tooltip: editor.getLang('extrastrings.itemIdToolTip'),
            minWidth: 300,
            required: true,
          },
          {
            type: 'checkbox',
            name: 'variation',
            label: editor.getLang('extrastrings.variationLabel'),
            checked: variation,
            tooltip: editor.getLang('extrastrings.variationToolTip'),
          },          
          {
            type: 'textbox',
            subtype: 'number',
            name: 'picwidth',
            label: editor.getLang('extrastrings.picWidthLabel'),
            value: picwidth,
            placeholder: fuEbayScriptShortcode.ebayPicWidthItem,
            tooltip: editor.getLang('extrastrings.blankUseDefaults'),
            maxWidth: 100,
            maxLength: 4,
          },					   				
          {
            type: 'textbox',
            name: 'customid',
            label: editor.getLang('extrastrings.customIdLabel'),
            value: customid,
            placeholder: fuEbayScriptShortcode.ebayDefCustomID,
            tooltip: editor.getLang('extrastrings.customIdToolTip'),
            maxWidth: 300,
          },	        
				],
				onsubmit: function( e ) {
					var shortcode_str = '[' + sh_tag;
					// check for item
					if (typeof e.data.item != 'undefined' && e.data.item.length)
						shortcode_str += ' item="' + e.data.item + '"';
					// check for variation
					if (typeof e.data.variation != 'undefined' && e.data.variation)
						shortcode_str += ' variation="true"';
					// check for picwidth
					if (typeof e.data.picwidth != 'undefined' && e.data.picwidth.length)
						shortcode_str += ' picwidth="' + e.data.picwidth + '"';
					// check for customid
					if (typeof e.data.customid != 'undefined' && e.data.customid.length)
						shortcode_str += ' customid="' + e.data.customid + '"';

					//add panel content
					shortcode_str += ']';
					//insert shortcode to tinymce
					editor.insertContent( shortcode_str);
				}
			});
	  });

		//replace from shortcode to an image placeholder
		editor.on('BeforeSetcontent', function(event){ 
			event.content = replaceShortcodes( event.content );
		});

		//replace from image placeholder to shortcode
		editor.on('GetContent', function(event){
			event.content = restoreShortcodes(event.content);
		});

		//open popup on placeholder double click
		editor.on('DblClick',function(e) {
			var cls  = e.target.className.indexOf('wp-' + sh_tag);
			if ( e.target.nodeName == 'IMG' && e.target.className.indexOf('wp-' + sh_tag) > -1 ) {
				var data = e.target.attributes['data-sh-attr'].value;
				data = window.decodeURIComponent(data);
				//console.log(title);
				editor.execCommand('ebay_item_popup','',{
					item : getAttr(data,'item'),
          variation : getAttr(data,'variation'),
					picwidth : getAttr(data,'picwidth'),
					customid : getAttr(data,'customid'),
				});
			}
		});
	});
})();