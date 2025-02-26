(function() {
	var called = false;
	tinymce.create('tinymce.plugins.adsensebutton', {
		init : function(ed, url) {
			ed.addButton('adsensebutton', {
				title : 'Ajouter le code Adsense',
				image : url + '/images/adsensebutton.png',
				cmd : 'mceAdsenseButtonInsert',
			});

			ed.addCommand('mceAdsenseButtonInsert', function(ui, v) {
				tb_show('', ajaxurl + '?action=mybutton_shortcodePrinter');
				if(called == false) {
					called = true;
					jQuery('#mcb_button').live("click", function(e) {
						e.preventDefault();

						tinyMCE.activeEditor.execCommand('mceInsertContent', 0, adsensebutton_create_shortcode());

						tb_remove();
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('adsensebutton', tinymce.plugins.adsensebutton);
})();

function adsensebutton_create_shortcode() {
	return '<div class="mceItemMedia align'+jQuery('#adsensealign').val()+'" style="padding: 10px;">'+jQuery('#adsensecode'+jQuery('#adsensecodename').val()).val()+'</div>';
}