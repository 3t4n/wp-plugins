<?php
/*

 * Returns The Fueto Output For The Global $post Object Do Not 

 */
function fueto_html($from = "")
{
    global $fueto_options;
    
    $style = '';
    $width_fueto_search_box = (59 + (int)$fueto_options["style"]["search_width"] );
    $width_txt_search = ((int)$fueto_options["style"]["search_width"]); // - 5 - 38;
            
    $style = 'style="width:'.$width_fueto_search_box.'px; border: 1px solid #'.$fueto_options["style"]["border_color"].'"';
    
    $font_color = $fueto_options["style"]["font_color"];
    
    $font_color = str_replace("#", "", $font_color );
    $font_color = "#".$font_color;
    
    $autocomplete = $fueto_options['chk_terms'] && $fueto_options['autocomplete'];
    
    $glass = '';
	$html = '<!-- Start Fueto -->';
    $html.= '<input type="hidden" value="'.FUETO_HTTP_PATH.'" id="fueto_path"/>';
    $html.= '<input type="hidden" value="'.$autocomplete.'" id="fueto_autocomplete"/>';
    $html.= '<input type="hidden" value="'.$fueto_options["style"]["search_width"].'" id="fueto_txt_width"/>';
    $html.= '<input type="hidden" value="'.$fueto_options["width_warning"].'" id="fueto_width_warning"/>';
        
    $type_button = 'button';
    $effects_input_click = '';
    $effects_input_out = '';

    if ($from != 'admin')
    {
        $html .= '<form role="search" method="get" class="fueto_form" id="searchform" action="' . home_url( '/' ) . '"> ';
        $type_button = 'submit';

        $width_txt_search = $width_txt_search - 5 - 38;
    }   
    
    $html .=
    '<div class="fueto_search_box" '.$style.'>
        <span class="fueto_input_box">
            '.$glass.'
            <input style="color:'.$font_color.';width:'.$width_txt_search.'px;" type="text" name="s" id="txt_search" value=""/>
            <a title="Fueto.com" href="http://fueto.com" target="_blank" class="fueto-bee" >
                <span class="fueto-bee" ></span>
            </a>
        </span>
        <a class="fueto_btn_search">
            <input type="'.$type_button.'" class="fueto_button_search" value="" />
        </a>         
    </div> ';

    if ($from != 'admin')
    {
	   $html .= ' </form> ';
    }
	$html .= "<!-- End Fueto -->";
    echo $html;
	return '';
}

/*
 * Template Tag To Echo The fueto 2 HTML
 */
function do_fueto()
{
    global $fueto_options;
    
    if (!empty($fueto_options['chk_terms']))
    {
        echo  fueto_html();
    }
}

/*
 * Hook For the_content to automatically output the fueto HTML If The Option To Disable Has Not Been Unchecked
 */
function auto_fueto()
{
    global $fueto_options;
    
    $content = '';
    if (!empty($fueto_options['chk_terms']))
    {
        $content =  fueto_html();
    }
    return $content;
}

/*
 * fueto 2 Shortcode
 */
function fueto_shortcode()
{
    return fueto_html();
}

function fueto_socialproxy($blog, $active)
{
    $url = API_URL.'/socialproxyactivate';

    $params = 'blogDomain='. urlencode( get_bloginfo('wpurl') ).'&socialProxy='.$active;
    //echo $params;

    $response = fueto_http_request($url, $params);
}

function fueto_sendmail($mail)
{
    $url = API_URL.'/indexinfo/';

    $url .= '?blog='.urlencode( get_bloginfo('wpurl') ).'&email='.urlencode($mail);
    
    $response = fueto_http_request($url);
}

function fueto_send_info_posts()
{
    global $fueto_options;

    if('' === $fueto_options['send_posts'] )
    {
        $total = wp_count_posts();
        $page = floor($total->publish / FUETO_MAX_URL_BULK);
    }
    else
    {
        $page = (int)$fueto_options['send_posts'];
    }

    if( $page >= 0 )
    {
        $args = array(
            'numberposts'     => FUETO_MAX_URL_BULK,
            'offset'          => $page * FUETO_MAX_URL_BULK,
            'orderby'         => 'post_id',
            'order'           => 'ASC',
            'post_type'       => 'post',
            'post_status'     => 'publish'
        );

        $posts = get_posts($args);

        $bulk = array();
        foreach($posts as $post)
        {
            $bulk[] = fueto_parse_to_send($post);
        }
        
        $url = API_URL."/add_url/";
        $response = fueto_http_request($url, http_build_query($bulk));
        
        if($response['response'])
        {
            $response = json_decode($response['response'], true);

            if( !isset($response['error']) )
            {
                global $fueto_options;
                $fueto_options['send_posts'] = $page - 1;
                update_option( 'fueto_options' , $fueto_options );
            }
        }
        
    }

    return json_encode( array('end' => ($page < 0) ) );
}

function fueto_add_url($idPost)
{
    if($idPost > 0)
    {
        $post_data = get_post($idPost);

        if($post_data && $post_data->post_status == 'publish')
        {
            $post = $post_data;
        }

        if($post != null)
        {
            $url = API_URL."/add_url/";
            $data = fueto_parse_to_send($post);

            $response = fueto_http_request($url, http_build_query(array($data)) );
        }
    }

    return fueto_processed();
}

function fueto_parse_to_send($post)
{
    $data = array();
    $fields = array();

    $data['url'] = get_permalink($post->ID);
    $data["blog"] = get_bloginfo( 'wpurl' );
    $data["id"] = $post->ID;

    $fields['title']    = $post->post_title;
    $fields['tags']     = implode(",",wp_get_post_tags( $post->ID, array( 'fields' => 'names' ) ));
    $fields['author']   = get_the_author_meta( 'user_nicename', $post->post_author);
    $fields['snippet']  = $post->post_content;
    $fields["text"]     = $post->post_content;
    $fields["comment_count"]     = $post->comment_count;

    $fields['title']            = fueto_utf8( $fields["title"] );
    $fields['tags']             = fueto_utf8( $fields["tags"] );
    $fields['author']           = fueto_utf8( $fields["author"] );
    $fields['snippet']          = fueto_utf8( $fields["snippet"] );
    $fields["text"]             = fueto_utf8( $fields["text"] );

    $data['fields']= $fields;
    
    return http_build_query($data);
}

function fueto_utf8($string)
{
    return preg_replace("#\\\u([a-zA-Z0-9]{2,4})#e", "chr(hexdec('$1'))", trim($string));
}

function fueto_autocomplete($txt, $max = '5')
{
    $data = array();
    $data['q'] = $txt . '*';
    $data['search_fields'] = 'snippet,text,title,tags';
    $data['show_field'] = 'title,text';
    $data['count'] = $fueto_options['results'];
    $data['url'] = get_bloginfo( 'wpurl' );
    $url = API_URL.'/autocomplete/';

    $response = fueto_http_request($url.'?'.http_build_query($data));
    $response = $response['response'];
    
    $response = json_decode($response, true);
    $response = array_slice($response, 0, 5, true);
    $response = json_encode($response);

/*
    $encoding = mb_detect_encoding($response,"auto");
    $response = mb_convert_encoding($response, "UTF-8", $encoding);
    $response = html_entity_decode($response);
*/
    //var_dump($response);
    
    return $response;
}

function fueto_processed()
{
    global $fueto_options;
    
    $url= API_URL."/processed/";

    $data = array();
    $data['url'] = get_bloginfo( 'wpurl' );

    $response = fueto_http_request($url.'?'.http_build_query($data));
    $response = $response['response'];
    $response = json_decode($response,1);
    
    if (!empty($response['num']) && !empty($response['total posts']))
    {
        $response['remaining'] = floor( ((int)$response['num'] * $response['total posts'])/100 );
    }
    else
    {
        $response['remaining'] = 0;
        $response['num'] = '0';
        $response['total posts'] = '0';
        $response['remaining for analysis'] = '0';
    }
    
    $data = json_encode($response);
    return $data;
}

function fueto_search_api($wp_query)
{
    global $fueto_options;
    
	if ($wp_query->is_search)
    {
        $url = API_URL."/search/";

        $data = array();
        $data['q'] = $wp_query->query['s'];
        $data['start'] = 0;
        $data['len'] = $fueto_options['results'];
        $data['url'] =  get_bloginfo( 'wpurl' );
        $data['fields'] = 'snippet,text,title,tags';
        
        $response = fueto_http_request($url.'?'.http_build_query($data));
        $response = $response['response'];
        $data = json_decode($response, true);
        
        if (is_array($data))
        {
            if (!empty($data['result']))
            {
                $ids = array();
                
                foreach($data['result'] as $result)
                {
                    $ids[] = $result["id"];
                }
    
                $wp_query->query_vars['post__in'] = $ids;
	            $wp_query->query_vars['post_type'] = "post";
				$wp_query->query_vars["orderby"] = "find_in_set(ID,'".implode($ids,",")."'";
            }
        }
	}
	
    return $wp_query;
}

function fueto_set_warning($objects)
{
     global $fueto_options;
     
     $fueto_options['width_warning'] = $objects;
     update_option( 'fueto_options' , $fueto_options );
}

function fueto_http_request($url, $postFields = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    
    if($postFields != null)
    {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields );
    }
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $curl_errno = curl_errno($ch);
    $curl_error = curl_error($ch);
    $response = curl_exec($ch);

    curl_close($ch);

    return array( 'response'=> $response
                , 'curl_errno' => $curl_errno
                , 'curl_error' => $curl_error
    );
}

function fueto_get_post($posts)
{
    global $fueto_options;
    global $wp_query;
    global $the_posts;
    
    if ($wp_query->is_search)
    {

        $posts =null;	

        $args = array("post__in"=>$wp_query->query_vars["post__in"],"numberposts"=> $fueto_options['results']);
        $posts = get_posts( $args );	
        $posts = object_to_array($posts);

        $the_posts = $wp_query->query_vars["post__in"];
        usort($posts, 'cmpArr');

        $post = array();
        for ($i = 0;$i<count($posts);$i++){
            $post[] = arrayToObject($posts[$i]);
        }

        $posts = $post;
    }

    return $posts;
}

function arrayToObject($array)
{
    if(!is_array($array))
    {
        return $array;
    }

    $object = new stdClass();
    if (is_array($array) && count($array) > 0)
    {
        foreach ($array as $name=>$value)
        {
            if (!empty($name))
            {
                $object->$name = arrayToObject($value);
            }
        }
        
        return $object;
    }
    else
    {
        return FALSE;
    }
}

function cmpArr($a,$b)
{ 
    global $the_posts; 
    // Lookup the values in the array that determines the sort order 
    // and return the numeric array index that we can use to determine the order 
    $aKey = array_search($a['ID'],(array) $the_posts); 
    $bKey = array_search($b['ID'],(array) $the_posts); 
    // If element not found in sort array then assume it should appear at the end 
    if ($aKey === false)
    {
        return 1; 
    }
    elseif($bKey === false)
    { 
        return -1;
    }
    
    // Both elements found in sort array - determine order
    if ($aKey == $bKey)
    {
        return 0;
    }
    
    return ($aKey < $bKey) ? -1 : 1;
}

function object_to_array($data)
{
    if ((! is_array($data)) and (! is_object($data))) return 'xxx'; //$data;

    $result = array();

    $data = (array) $data;
    foreach ($data as $key => $value)
    {
        if (is_object($value))
        {
            $value = (array) $value;
        }
        
        if (is_array($value))
        {
            $result[$key] = object_to_array($value);
        }
        else
        {
            $result[$key] = $value;
        }
    }

    return $result;
}
?>