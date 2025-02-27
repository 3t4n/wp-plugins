// image: url + "/img/tweetname_button.png"

function email_link_insert() {
	email_link_select = tinyMCE.activeEditor.selection.getContent();
    tinyMCE.activeEditor.selection.setContent('[sf_email]' + email_link_select + '[/sf_email]');
}

(function() {

    tinymce.create('tinymce.plugins.email_link_insert', {

        init : function(ed, url){
            ed.addButton('email_link_name', {
                title : 'Obfuscate email address with wpantispambot',
                onclick : function() {
                    ed.execCommand(
                        'mceInsertContent',
                        false,
                        email_link_insert()
                        );
                },
                image: url + "/img/email-link-button.png"
            });
        },
		getInfo : function() {
			return {
				longname:	'Safer Email Link',
				author:		'Andrew Norcross',
				authorurl:	'http://andrewnorcross.com',
				infourl:	'',
				version:	"1.0"
			};
		}
	});

    tinymce.PluginManager.add('email_link_name', tinymce.plugins.email_link_insert);
    
})();