<?php

function shortcode_texteditor_dsgvoyoutube0() 
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
                    "dsgvo_youtube1", 
                    "DSGVO Youtube", 
                    callback
                );

                function callback()
                {
                    var selected_text = getSel();
                    //QTags.insertContent("[code]" +  selected_text + "[/code]");
					QTags.insertContent('[dsgvo-youtube url="' + selected_text + '" ][/dsgvo-youtube]');
                }
            </script>
        <?php
    }
}

add_action("admin_print_footer_scripts", "shortcode_texteditor_dsgvoyoutube0");

?>