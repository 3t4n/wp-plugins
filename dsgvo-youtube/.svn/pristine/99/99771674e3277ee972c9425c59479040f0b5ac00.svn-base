<?php

function shortcode_texteditor_dsgvoyoutube1() 
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
                    "dsgvo_youtube2", 
                    "DSGVO Youtube + eigenem Bild", 
                    callback
                );

                function callback()
                {
                    var selected_text = getSel();
                    //QTags.insertContent('[dsgvo-youtube url="' + selected_text + '" images="https://ps.w.org/dsgvo-youtube/assets/banner-772x250.jpg" ][/dsgvo-youtube]');
					QTags.insertContent('[dsgvo-youtube url="' + selected_text + '" images="https://ps.w.org/dsgvo-youtube/assets/banner-772x250.jpg" ][/dsgvo-youtube]');
                }
            </script>
        <?php
    }
}

add_action("admin_print_footer_scripts", "shortcode_texteditor_dsgvoyoutube1");

?>