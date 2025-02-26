<?php
/*******************************************************************************
    Wordpress IDX and Contact Manager Plugin
    Copyright (C) 2010-2011 StormRETS, Inc.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*******************************************************************************/
?>

<div id="agentstormcache"></div>

<script>
    #TB_window {
        overflow: scroll;
    }
    #TB_ajaxContent {
        height: 100%;   
    }
</script>

<script type="text/javascript">
    //<![CDATA[
    var edtoolbar = document.getElementById("ed_toolbar");  
 
    if (edtoolbar) {
        
        var bshortcodebuilder = document.createElement("input");
        bshortcodebuilder.type = "button";
        bshortcodebuilder.id = 'ed_tinymce';
        bshortcodebuilder.className = 'ed_button';
        bshortcodebuilder.value = 'Agent Storm Short Code';
        bshortcodebuilder.onclick = function() {
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: { action: 'agentstorm_shortcode_builder' },
                success: function(data) {
                    
                    jQuery("#agentstormcache")[0].innerHTML = data;
                    tb_show('Agent Storm Short Code Builder', '#TB_inline?width=640&inlineId=agentstormcache', null);
                    
                    jQuery('#TB_ajaxContent').height(jQuery('#TB_window').height() - 50);
                    jQuery(window).resize(function() {
                        jQuery('#TB_ajaxContent').height(jQuery('#TB_window').height() - 50);
                    });
                    
                },
                dataType: 'html'
            });
        };
        bshortcodebuilder.title = 'TinyMCEDemo';
        //edtoolbar.appendChild(bshortcodebuilder);
        
    }
    //]]>
</script>