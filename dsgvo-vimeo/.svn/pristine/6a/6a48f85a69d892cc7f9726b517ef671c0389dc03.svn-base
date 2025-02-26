<?php
function shortcode_texteditor_dsgvovimeo1() 
{
    if(wp_script_is("quicktags"))
    {
        ?>
            <script type="text/javascript">
                
                //this function is used to retrieve the selected text from the text editor
                function getSel()
                {
                    var txtarea = document.getElementById("content");
                    var start = txtarea.selectionStart;
                    var finish = txtarea.selectionEnd;
                    return txtarea.value.substring(start, finish);
                }

                QTags.addButton( 
                    "dsgvo_vimeo2", 
                    "DSGVO Vimeo + Bild", 
                    callback
                );

                function callback()
                {
                    var selected_text = getSel();
                    //QTags.insertContent("[code]" +  selected_text + "[/code]");
					QTags.insertContent('[dsgvo-vimeo url="' + selected_text + '" images="#" ]');
                }
            </script>
        <?php
    }
}

add_action("admin_print_footer_scripts", "shortcode_texteditor_dsgvovimeo1");

?>