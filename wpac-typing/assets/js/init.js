initUrduEditor();

makeUrduEditor('post_title',12);
makeUrduEditor('content',18);
makeUrduEditor('excerpt',18);
makeUrduEditor('tw',18);
makeUrduEditor('newtag[post_tag]',18);
makeUrduEditor('newcategory',18);
makeUrduEditor('s',18);
makeUrduEditor('tag-name', 18);
makeUrduEditor('description', 18);
jQuery('document').ready(function(){
    jQuery("#title").focus(function(){
        jQuery("#title-prompt-text").text('');
    });
    jQuery('#content').focus();
});