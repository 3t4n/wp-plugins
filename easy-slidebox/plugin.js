(function () {

    tinymce.create('tinymce.plugins.slidebox', {
        init: function (ed, url) {
            ed.addButton('slidebox', {
                title: 'SlideBox',
                cmd: 'slidebox',
                image: url + '/slidebutton.jpg'
            });

            ed.addCommand('slidebox', function () {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                var titre = prompt("SideBox's Title", "");
                if (titre === null) {
                    return;
                }
                var cache = confirm("Show text?");
                if(selected_text.length === 0){
                    selected_text = "your content here";
                }
                /*
                 if(cache == true){
                 return_text = '<div class="slideBoxTitle slideBoxLess">'+titre+'</div>\n<div>'+selected_text+'</div>\n\n';
                 } else {
                 return_text = '<div class="slideBoxTitle slideBoxMore">'+titre+'</div>\n<div class="slideBoxHiddenText">'+selected_text+'</div>\n\n';
                 }*/
                return_text = '[slidebox title="' + titre + '" show="' + cache + '"]' + selected_text + '[/slidebox]';

                ed.execCommand('mceInsertContent', 0, return_text);

            });

        }
    });

    tinymce.PluginManager.add('slidebox', tinymce.plugins.slidebox);
})();