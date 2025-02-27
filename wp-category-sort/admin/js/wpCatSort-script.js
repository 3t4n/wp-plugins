    jQuery(document).ready(function() {
                        

        jQuery("ul.wpCatSortable").sortable({
            'tolerance':'intersect',
            'cursor':'pointer',
            'items':'> li',
            'axi': 'y',
            'placeholder':'placeholder',
            'nested': 'ul'
         });



          jQuery(".wpCatSort_update-order").bind( "click", function() {
                                
                                var mySortable = new Array();
                                jQuery(".wpCatSortable").each(  function(){
                                    
                                    var serialized = jQuery(this).sortable("serialize");
                              
                                    var parent_tag = jQuery(this).parent().get(0).tagName;
                                    parent_tag = parent_tag.toLowerCase()
                                    if (parent_tag == 'li')
                                        {
                                            
                                            var tag_id = jQuery(this).parent().attr('id');
                                            mySortable[tag_id] = serialized;
                                        }
                                        else
                                        {
                                           
                                            mySortable[0] = serialized;
                                        }
                                });
                                //serialize the array
                                var serialize_data = serialize(mySortable);
                                                                                            
                                jQuery.post( 
                                    ajaxurl, 
                                    {   action:'update_wpCatSort', 
                                        order: serialize_data, 
                                        taxonomy : 'category' }, 
                                    function() {
                                    jQuery("#ajax-response").html('<div class="message updated fade"><p>Items Order Updated</p></div>');
                                    jQuery("#ajax-response div").delay(3000).hide("slow");
                                });
                            });



    });