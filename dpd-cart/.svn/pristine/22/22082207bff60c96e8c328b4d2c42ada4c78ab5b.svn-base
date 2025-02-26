jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.dpdcart_add_button', {
        init : function(ed, url) {
            // Register command for when button is clicked
            ed.addCommand('dpdcart_add_button', function() {
                selected = tinyMCE.activeEditor.selection.getContent();

                if( selected ){
                    content =  '[shortcode]'+selected+'[/shortcode]';
                }else{
                    content =  '[shortcode]';
                }
                tinymce.execCommand('mceInsertContent', false, content);
            });

            // Register buttons - trigger above command when clicked
            ed.addButton('dpdcart_add_button', {   image: url +"/../../img/dpd-editor-icon.png",
                icon: false,
                type: 'menubutton',
                menu: makeMenu(DPDProducts)
            });
        },
    });

    function makeMenu(DPDProducts){
        arr=[];
        for (i=0;DPDProducts.length> i; i++){
            item=[];
            item.text=DPDProducts[i].text;
            // item.onclick=function (i) {
            //     tinymce.execCommand('mceInsertContent', false, window.DPDProducts[i].shortcode);
            //
            // }
            item.onclick=new Function('', "tinymce.execCommand('mceInsertContent', false, window.DPDProducts["+i+"].shortcode)");
            arr[i]=item;
        }
        return arr;
    }
    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('dpdcart_add_button', tinymce.plugins.dpdcart_add_button);
});