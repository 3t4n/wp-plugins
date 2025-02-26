<?php
/***************************************************************************
	our display content information here
****************************************************************************/
    function ewsp_add_content($content)
{
	global $ewsp_options;
        global $post;
        $content_custom = "";
        
        //post detail comes from here
        
        $post_Id=$post->ID; 
        $post_detail = get_post($post_Id);
        $post_link = get_permalink($post_Id);
        $title = $post_detail->post_title;
       
        //Share buttons that we display
        
	if($ewsp_options['enable'] == true) {
            //Twitter Share Button
            $extra_content = '<div class="twitter-message">';
            
            if($ewsp_options['twitter'] == true){
		$extra_content .= '<div class="leftalign"><a href="https://twitter.com/share" class="twitter-share-button" 
                                            data-text = "'.$title.'" 
                                            data-url="'.$post_link.'" 
				            data-counturl="'.$post_link.'"
                                            data-via="eworkgroup" 
                                            data-lang="en" 
                                            data-width = "100" 
                                            data-count="horizantal">
                                            Tweet
                                    </a></div>';
                }
                //Facebook like button
                
                if($ewsp_options['facebook'] == true){
                    
                    $extra_content .= '<div id="fb-root"></div>
                                        <script>
                                            (function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s); js.id = id;
                                            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                            fjs.parentNode.insertBefore(js, fjs);
                                            }(document, "script", "facebook-jssdk"));
                                        </script>

                                    <div class="facebook-share">
                                        <div class="fb-like" 
                                            data-send="false" 
					    data-show-faces="false" 
                                            data-href = "'.$post_link.'"
                                            data-layout="button_count" 
                                            data-width="90">
                                        </div>
                                    </div>';
                }
                //Linkden Share Button
                if($ewsp_options['linkedin'] == true){
                    $extra_content .= '<div class="linkdin-share"><script src="//platform.linkedin.com/in.js" 
                                        type="text/javascript">
                                    </script>
                                        <script type="IN/Share" 
                                        data-url="'.$post_link.'" 
                                        data-counter="right">
                                    </script></div>';
                }
                //Google + share button
                if($ewsp_options['googleplus'] == true){
                    $extra_content .= '<div class="g-plus" 
                                            data-action="share" 
                                            data-href="'.$post_link.'" 
                                            data-annotation="bubble">
                                        </div>

                                        <script type="text/javascript">
                                        (function() {
                                            var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
                                            po.src = "https://apis.google.com/js/plusone.js";
                                            var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
                                        })();
                                        </script>';
                }
                $extra_content .= '<div style="clear:both"></div></div>';
                
                //Share buttons before the content
                
                if(($ewsp_options['positionsec'] == true) && ($ewsp_options['position'] == true)){
                    
                    if(($ewsp_options['area'] == true) && ($ewsp_options['both'] == true)){
                        if(is_single()){
                            $content_custom .= $extra_content;
                            $content_custom .= $content;
                            $content_custom .= $extra_content;
                        }else{
                            $content_custom .= $extra_content;
                            $content_custom .= $content;
                            $content_custom .= $extra_content;
                        }
                    }else if($ewsp_options['area'] == true){
                        if(is_single()){
                            $content_custom .= $extra_content;
                            $content_custom .= $content;
                            $content_custom .= $extra_content;
                        }else{
                            $content_custom .= $content;
                        }
                        
                    }else if($ewsp_options['both'] == true){
                        $content_custom .= $extra_content;
                        $content_custom .= $content;
                        $content_custom .= $extra_content;
                    }else{
                        $content_custom .= $content;
                    }
                    
                }else if($ewsp_options['positionsec'] == true){
                    $content_custom .= $content;
                    $content_custom .= $extra_content;
                }else if($ewsp_options['position'] == true){
                    if(($ewsp_options['area'] == true) && ($ewsp_options['both'] == true)){
                        if(is_single()){
                            $content_custom .= $extra_content;
                            $content_custom .= $content;
                        }else{
                            $content_custom .= $extra_content;
                            $content_custom .= $content;
                        }
                    }else if($ewsp_options['area'] == true){
                        if(is_single()){
                            $content_custom .= $extra_content;
                            $content_custom .= $content;
                        }else{
                            $content_custom .= $content;
                        }
                        
                        
                    }else if($ewsp_options['both'] == true){
                        $content_custom .= $extra_content;
                        $content_custom .= $content;
                    }
                    else {
                        $content_custom .= $content;
                    }
                    
                }else{
                    $content_custom .= $content;
                }
                
	}
        
        //Return content with new content
        
	return $content_custom;
}

//Filter function render in content section

add_filter('the_content','ewsp_add_content');
?>
