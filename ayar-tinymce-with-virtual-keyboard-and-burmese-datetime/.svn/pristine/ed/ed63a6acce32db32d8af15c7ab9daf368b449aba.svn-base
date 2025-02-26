(function() {
    var self = this
       ,_vk_skin = "winxp"
       ,_vk_layout = ""
       ,_vk_mode = ""
       ,_curId = null
       ,loaded
		var toggleKeyboard = function (ed) {
        var el
           ,vk = window[_vk_mode+'VirtualKeyboard'];
        if (this._curId === ed.editorId && vk.isOpen()) {
            vk.close();
            this._curId = null;
        } else {
            if (null != this._curId && (el = document.getElementById('VirtualKeyboard_'+this._curId))) {
                vk.close();
            }
            if (!(el = document.getElementById('VirtualKeyboard_'+ed.editorId))) {
                el = document.getElementById(ed.editorId+"_parent").getElementsByTagName('table')[0];
                el.insertRow(el.rows.length)
                el = el.rows[el.rows.length-1];
                el.id = 'VirtualKeyboard_' + ed.editorId;
                el.align = 'center';
                el.appendChild(document.createElement('td'));
            }
            el = el.firstChild;
            vk.open(ed.editorId+'_ifr',el);
            this._curId = ed.editorId;
        }
    }
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('akey');
	
	tinymce.create('tinymce.plugins.akeyPlugin', {
		init : function(ed, url) {
			var t = this;
			t.editor = ed;
			ed.addCommand('mce_akey', function() {toggleKeyboard(ed)});
			ed.addButton('akey',{
				title : 'akey.akey_desc', 
				cmd : 'mce_akey',
				image : url + '/img/jsvk.gif'
			});
		},
		
		getInfo : function() {
			return {
				longname : 'On Screen Keyboard for TinyMCE',
				author : 'Sithu Thwin',
				authorurl : 'http://www.myanmapress.com',
				infourl : 'http://www.myanmapress.com/',
				version : '1.0'
			};
		}

		});
	// Register plugin
	tinymce.PluginManager.add('akey', tinymce.plugins.akeyPlugin);
	})();