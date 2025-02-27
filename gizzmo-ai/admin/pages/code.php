<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$similar_posts_json = "";
$similar_posts_obj = new stdClass();
$product_caruosel_obj = new stdClass();
$similarity_array = array();

$thematic_concepts_list = new stdClass();

function gizzmo_ai_get_post_categories($website_id) {

    $output = '';

    $args = array("hide_empty" => 0,
                    "type"      => "post",      
                    "orderby"   => "name",
                    "order"     => "ASC" );
    $cats = get_categories($args);

    $categories = array();
    foreach ($cats as $cat) {
        $categories[$cat->cat_ID] = $cat->cat_name;
    }

    //print the categories one by one
    foreach ($categories as $key => $value) {

        //remove forbidden characters for sql
        $value = str_replace("'", "", $value);
        $value = str_replace('"', "", $value);
        $value = str_replace(',', "", $value);
        $value = str_replace(';', "", $value);
        $value = str_replace(':', "", $value);
        $value = str_replace('!', "", $value);
        $value = str_replace('?', "", $value);
        


        $one_cat  = $key . '~' . $value;
        //echo $one_cat . '<br>';

        if ($output == '') {
            $output = $one_cat;
        }
        else {
            $output .= ',' . $one_cat;
        }
        //echo $value . ',';
    }

    $data = array(
        'website_id' => $website_id,
        'categories' => $output
    );


    #roy
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_website_categories';
     
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $data);
}
function gizzmo_ai_calculate_cosin_similarity($string1,$string2) {
    // Convert the strings to lowercase and remove any punctuation or special characters
    $string1 = preg_replace('/[^a-z\d ]/i', '', strtolower($string1));
    $string2 = preg_replace('/[^a-z\d ]/i', '', strtolower($string2));

    // Split the strings into individual words
    $words1 = explode(' ', $string1);
    $words2 = explode(' ', $string2);

    // Calculate the intersection of the two sets of words
    $common_words = array_intersect($words1, $words2);

    // Calculate the cosine similarity
    $similarity = count($common_words) / sqrt(count($words1) * count($words2));

    return $similarity;
    //echo "Cosine similarity: " . $similarity;
}

function gizzmo_ai_make_get_request($get_url) {
    
    $response = wp_remote_get($get_url, array(
        'timeout' => 60,
        'redirection' => 10,
        'httpversion' => '1.1',
    ));

    // Check for errors and return the response
    if (is_wp_error($response)) {
        return $response->get_error_message();
    } else {
        $body = wp_remote_retrieve_body($response);
        return json_decode($body, true);
    }
}


function apply_translation_to_content_string($content, $language, $asin_json_res) {
    // Iterate over the translations and replace in content
    foreach ($asin_json_res['translations'] as $english => $hebrew) {
        $content = str_replace($english, $hebrew, $content);
    }
    return $content;
}






function gizzmo_ai_create_and_save_review_post($asin,$website_id)
{

     
    
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_ready_asin_data/' . $website_id . ',reviews,' . $asin ;
    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);

    #echo "asin_json_res: " . $asin_json_res . "<br>";


    if ($asin_json_res['status'] == 'error') {
        echo esc_html( $asin_json_res['message'] );
        return;
    }

    $asin_json = $asin_json_res['data']['data'];


    $asin_affiliate_tag = $asin_json['affiliate_tag'];
    
    //start applying translations if the language is not english
    $conclusion_title_text ="Conclusion";
    $pros_title_text ="Pros:";
    $cons_title_text ="Cons:";
    $qanda_title_text ="Questions & Answers:";
    $cta_title_text ="Buy On Amazon";
    $read_also_title_text ="Read also:";
    $question_title_text ="Question:";
    $answer_title_text ="Answer:";
    
    
    
    $language = 'English';
    if (isset($asin_json['language'])) {
        $language = $asin_json['language'];
    } 
    
    if ($language != 'English') {
        $conclusion_title_text = $asin_json['translations']['Conclusion'];
        $pros_title_text = $asin_json['translations']['Pros:'];
        $cons_title_text = $asin_json['translations']['Cons:'];
        $qanda_title_text = $asin_json['translations']['Questions & Answers:'];
        $cta_title_text = $asin_json['translations']['Buy On Amazon'];
        $read_also_title_text = $asin_json['translations']['Read also:'];
        $question_title_text = $asin_json['translations']['Question:'];
        $answer_title_text = $asin_json['translations']['Answer:'];
    }

   
    



  
    $post_categories = $asin_json['wordpress_categories'];

    $post_title = $asin_json['title'];
    $meta_description = $asin_json['meta_description'];
    $post_featured_image = $asin_json['featured_image'];
    $asin_source = $asin_json['source'];
    #remove the www. from the source
    $asin_source_credit = str_replace('www.', '', $asin_source);
    #$source_site = str_replace('.com', '', $asin_source_credit);
    #$source_site = str_replace('.co.uk', '', $source_site);
    #make the first letter uppercase
    #$source_site = ucfirst($source_site);

    $asin_link = 'https://' . $asin_source . '/dp/' . $asin . '?tag=' . $asin_affiliate_tag;

    $package_type = $asin_json['package_type'];
    
    if ($package_type == 'Free') {
        $asin_link = 'https://' . $asin_source . '/dp/' . $asin;
    }

    // read the html file from html_parts folder
    $content = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/product_review_default.html');


   

     

    $content = str_replace('{{cta_title}}', $cta_title_text, $content);


    //if ($package_type = 'Enterprise') {
    //    $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
    //    $content = $gizzmo_enterprise . $content;
    //}

    $gizzmo_div = "<form id='gizzmo_post_details_form' style='display:none'>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_post_id' id='form_gizzmo_post_id' value=''>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_website_id' id='form_gizzmo_website_id' value='". $website_id ."'>";
    $gizzmo_div .=  "</form>";

    $content = $gizzmo_div . $content;



    $introduction_paragraphs = $asin_json['introduction_paragraphs'];
    $introduction_paragraphs_html = '';
    foreach ($introduction_paragraphs as $paragraph) {
        $introduction_paragraphs_html .= '<p>' . $paragraph . '</p>';
    }
    $content = str_replace('{{Introduction}}', $introduction_paragraphs_html, $content);


    $personal_experience = $asin_json['personal_experience_paragraphs'];
    $personal_experience_html = '';
    foreach ($personal_experience as $paragraph) {
        $personal_experience_html .= '<p>' . $paragraph . '</p>';
    }
    $content = str_replace('{{Personal_Experience}}', $personal_experience_html, $content);

     
    $selected_similar_post_ids = $asin_json['selected_similar_post_ids'];
    
    if ($selected_similar_post_ids != '') {
        $similar_posts_html = '';
        #splait the selected_similar_post_ids string into array of ids by comma 
        $selected_similar_post_ids = explode(',', $selected_similar_post_ids);

        foreach ($selected_similar_post_ids as $similar_post_id) {
            $similar_post = get_post($similar_post_id);
            $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
        }
        $content = str_replace('{{Similar_Posts_Title}}', '<h2>' . $read_also_title_text . '</h2>', $content);
        $content = str_replace('{{Similar_Posts}}', $similar_posts_html, $content);
    } else {
        $content = str_replace('{{Similar_Posts_Title}}', '', $content);
        $content = str_replace('<ul>{{Similar_Posts}}</ul>', '', $content);
    }


    
    //check if conclusion_paragraphs is not empty
    $conclusion_paragraphs = $asin_json['conclusion_paragraphs'];

    if ($conclusion_paragraphs != '') {
        //$conclusion_paragraphs = $asin_json['conclusion_paragraphs'];
        $conclusion_paragraphs_html = '';
        $conclusion_title = '';
        foreach ($conclusion_paragraphs as $paragraph) {
            $paragraph = '<p>' . $paragraph . '</p>';
            $conclusion_paragraphs_html .= $paragraph;
        }
        
        $conclusion_title = '<h2>' . $conclusion_title_text . '</h2>';
        $content = str_replace('{{Conclusion_Title}}', $conclusion_title, $content);
        $content = str_replace('{{Conclusion_Text}}', $conclusion_paragraphs_html, $content);
    }
    else {
        $content = str_replace('{{Conclusion_Title}}', '', $content);
        $content = str_replace('{{Conclusion_Text}}', '', $content);
    }

    $pros_list = $asin_json['pros'];
    $cons_list = $asin_json['cons'];
    if ($pros_list != '' && $cons_list != '') {
        $pros_list = $asin_json['pros'];
        $cons_list = $asin_json['cons'];

        $pros_found = false;
        $cons_found = false;
        if (count($pros_list) > 0 && count($cons_list) > 0) {
            $pros_list_html = '';
            foreach ($pros_list as $pros) {
                if ($pros != '') {
                    $pros_found = true;
                    $pros_list_html .= '<li>' . $pros . '</li>';
                }
            }
            if ($pros_found == true) {
                $content = str_replace('{{pros_list}}', $pros_list_html, $content);
                $content = str_replace('{{pros_title}}', $pros_title_text, $content);
            } else {
                $content = str_replace('<ul>{{pros_list}}</ul>', '', $content);
                $content = str_replace('<h2>{{pros_title}}</h2>', '', $content);
            }
            



            $cons_list_html = '';
            foreach ($cons_list as $cons) {
                if ($cons != '') {
                    $cons_found = true;
                    $cons_list_html .= '<li>' . $cons . '</li>';
                }
            }
            if ($cons_found == true) {
                $content = str_replace('{{cons_list}}', $cons_list_html, $content);
                $content = str_replace('{{cons_title}}', $cons_title_text, $content);
            } else {
                $content = str_replace('<h2>{{cons_title}}</h2>', '', $content);
                $content = str_replace('<ul>{{cons_list}}</ul>', '', $content);
            }

        } else {
            $content = str_replace('<ul>{{pros_list}}</ul>', '', $content);
            $content = str_replace('<ul>{{cons_list}}</ul>', '', $content);
            $content = str_replace('<h2>{{pros_title}}</h2>', '', $content);
            $content = str_replace('<h2>{{cons_title}}</h2>', '', $content);

        }
    }
    else {
        $content = str_replace('<ul>{{pros_list}}</ul>', '', $content);
        $content = str_replace('<ul>{{cons_list}}</ul>', '', $content);
        $content = str_replace('<h2>{{pros_title}}</h2>', '', $content);
        $content = str_replace('<h2>{{cons_title}}</h2>', '', $content);
    }



    $questions_list = $asin_json['questions'];
    $answers_list = $asin_json['answers'];


    if (count($questions_list) > 0 && count($answers_list) > 0) {
        $questions_list = $asin_json['questions'];
        $answers_list = $asin_json['answers'];


        if (count($questions_list) > 0 && count($answers_list) > 0) {
            $qanda_list_html = '';
            $x = 0;
            do {
                $qanda_list_html .= '<p><b>'. $question_title_text .' </b>' . $questions_list[$x] . '</p>';
                $qanda_list_html .= '<p><b>'. $answer_title_text .' </b>' . $answers_list[$x] . '</p>';
                $x++;
            } while ($x <= 2);
            $content = str_replace('{{Questions_Answers}}', $qanda_list_html, $content);
            $content = str_replace('{{qanda_title}}', $qanda_title_text, $content);
        } else {
            $content = str_replace('{{Questions_Answers}}', '', $content);
            $content = str_replace('<h2>{{qanda_title}}</h2>', '', $content);
        }
    }
    else {
        $content = str_replace('{{Questions_Answers}}', '', $content);
        $content = str_replace('<h2>{{qanda_title}}</h2>', '', $content);
    }


    $focus_keyphrase = $asin_json['focus_keyphrase'];

    $content = str_replace('{{amazon_link_and_tag}}', $asin_link, $content);


    $sections = $asin_json['sections'];
    $section_html = '';
    $index = 0;


    foreach ($sections as $section) {


        $img_src = $section['image'];

        $section_html .= '<h2>' . $section['title'] . '</h2>';



        if ($img_src != '') {
            $section_html .= '<figure class="wp-block-image size-large">';
            $section_html .= '<a class="gizzmo_link" data-linktype="image" rel="nofollow" target="_blank" href="' . $asin_link . '">';

            if ($index < 5) {
                if ($focus_keyphrase != '') {
                    $section_html .= '<img decoding="async" src="' . $img_src . '" alt="' . $focus_keyphrase . '" class="wp-image-840" />';
                } else {
                    $section_html .= '<img decoding="async" src="' . $img_src . '" alt="' . $img_src . '" class="wp-image-840" />';
                }
            } else {
                $section_html .= '<img decoding="async" src="' . $img_src . '" alt="' . $img_src . '" class="wp-image-840" />';
            }
            
            $section_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">';
            $section_html .= 'Credit - ' . $asin_source_credit;
            $section_html .= '</div>';
            $section_html .= '</a>';
            $section_html .= '</figure>';
        }

        $section_html .= '<p>' . $section['text'] . '</p>';

        if ($index < 3) {
            $section_html .= '<div class="is-layout-flex wp-block-buttons">';
            $section_html .= '<div class="wp-block-button">';
            $section_html .= '<a class="gizzmo_link" data-linktype="button" rel="nofollow" class="wp-block-button__link" target="_blank" href="' . $asin_link . '">' . $cta_title_text . '</a>';
            $section_html .= '</div>';
            $section_html .= '</div>';
        }

        $index++;
    }
    $content = str_replace('{{Dynamic_Text_Sections}}', $section_html, $content);

     
    $compered_items = $asin_json['compered_items'];
    $similar_items = $asin_json['similar_items'];
    $related_items = $asin_json['related_items'];

    #echo "selected_carousels: " . $selected_carousels . "<br>";

    #check if selected_carousels is not "" and not null
    #if it is, check if it has a comma, then split it into an array by comma
    #if it doesn't have a comma, then just make it an array with one element
    #if it is null or "", then set it to an empty array

    $carousel_options = $asin_json['carousel_options'];
    $selected_carousels = $asin_json['selected_carousels'];

    
    if ($selected_carousels != "" && $selected_carousels != null) {
        if (strpos($selected_carousels, ',') !== false) {
            $selected_carousels = explode(',', $selected_carousels);
        } else {
            $selected_carousels = array($selected_carousels);
        }
    } else {
        $selected_carousels = array();
    }



    

    #if ($do_ca) {
    #check if selected_carousels is not empty
    $carousel_top_filled = "false";
    $carousel_bottom_filled = "false";

    if ($package_type == 'Free') {
        $content = str_replace('{{Carousel_Top}}', '', $content);
        $content = str_replace('{{Carousel_Bottom}}', '', $content);
    }
    elseif ($carousel_options == 'no') {
        $content = str_replace('{{Carousel_Top}}', '', $content);
        $content = str_replace('{{Carousel_Bottom}}', '', $content);
    }
    else
    {
        
        if (!empty($selected_carousels)) {
            
        
            #loop through selected_carousels
            $compered_items_caruosel = "false";
            $similar_items_caruosel = "false";
            $related_items_caruosel = "false";
            foreach ($selected_carousels as $carousel_code) {

                if ($carousel_code == "compered_items")
                {
                    $compered_items_caruosel = "true";
                }

                if ($carousel_code == "similar_items")
                {
                    $similar_items_caruosel = "true";
                }

                if ($carousel_code == "related_items")
                {
                    $related_items_caruosel = "true";
                }
            }

            if ($compered_items_caruosel == "true") {
                $compered_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $asin .'&affid='. $asin_affiliate_tag .'&type=compered_items&lang='. $language .'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                $content = str_replace('{{Carousel_Top}}', $compered_items_iframe, $content);
                $carousel_top_filled = "true";
            } 
            
            if ($similar_items_caruosel == "true") {
                $similar_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $asin .'&affid='. $asin_affiliate_tag .'&type=similar_items&lang='. $language .'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                if ($carousel_top_filled == "false") {
                    $content = str_replace('{{Carousel_Top}}', $similar_items_iframe, $content);
                    $carousel_top_filled = "true";
                }
                else {
                    $content = str_replace('{{Carousel_Bottom}}', $similar_items_iframe, $content);
                    $carousel_bottom_filled = "true";
                }
            } 

            if ($related_items_caruosel == "true") {
                $related_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $asin .'&affid='. $asin_affiliate_tag .'&type=related_items&lang='. $language .'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                if ($carousel_top_filled == "false") {
                    $content = str_replace('{{Carousel_Top}}', $related_items_iframe, $content);
                    $carousel_top_filled = "true";
                }
                else {
                    $content = str_replace('{{Carousel_Bottom}}', $related_items_iframe, $content);
                    $carousel_bottom_filled = "true";
                }
            } 


        } else {
            $content = str_replace('{{Carousel_Top}}', '', $content);
            $content = str_replace('{{Carousel_Bottom}}', '', $content);
        }

        if ($carousel_bottom_filled == "false") {
            $content = str_replace('{{Carousel_Bottom}}', '', $content);
        }
        if ($carousel_top_filled == "false") {
            $content = str_replace('{{Carousel_Top}}', '', $content);
        }
    }
    #}
    
    


    


    






    //add a script to the end of the content
    
    
    
    
    //if meta description is longer than 160 characters, trim it to 160 characters
    if (strlen($meta_description) > 130) {
        $meta_description = substr($meta_description, 0, 127) . "...";
    }

    $post_categories = $asin_json['wordpress_categories'];
    
    if ($post_categories != '') {
        //add the post categories
        try {
            $post_categories_array = array();
            $post_categories = $asin_json['wordpress_categories'];
            if ($post_categories != '') {
                $post_categories_array = explode(',', $post_categories);
            }
        } catch (Exception $e) {
            $post_categories_array = array();
        }
    }
    else {
        $post_categories_array = array();
    }
    
    


    $post_id = wp_insert_post(
        array(
            'post_title' => $post_title,
            'post_excerpt' => $meta_description,
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'post'
        )
    );

    
    if ($post_categories_array != '') {
        //check if the post_categories_array is not empty
        //if it is not empty, then set the post categories
        if (!empty($post_categories_array)) {
            wp_set_post_categories($post_id, $post_categories_array);
        }
    }
    
    
    $post_tags = $asin_json['seo_tags'];

    if ($post_tags != '') {    
        //insert post tags
        //check if the $asin_json has post_tags
        //if it does, then implode the array into a string
        //then set the post tags
        $post_tags = array();
        if (array_key_exists('seo_tags', $asin_json)) {
            $post_tags = $asin_json['seo_tags'];
            //get only the first 4 tags
            //check if the array has more than 4 tags
            //if it does, then slice the array to only 4 tags
            //then implode the array into a string
            if (count($post_tags) > 4) {
                $post_tags = array_slice($post_tags, 0, 4);
            }
            if (count($post_tags) > 0) {
                $post_tags = implode(',', $post_tags);
                wp_set_post_tags($post_id, $post_tags);
            }
        }
    }
    





    update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);

    if ($focus_keyphrase == "-") {
        $focus_keyphrase = "";
    }
    if ($product_keyphrase = "") {
        $product_keyphrase = "";
    }
    else
    {
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$focus_keyphrase);
    }


    $featured_image = $asin_json['featured_image'];

    if ($featured_image != '')
    {
        $post_featured_image = $featured_image;
    }

    if ($post_featured_image != '') {
        $attachment_id = gizzmo_ai_attach_image_file($post_featured_image, $post_id);
        set_post_thumbnail($post_id, $attachment_id);
    }


    //fix this, make sure the selection of the user is saved to the json $create_schema == "yes"
    //if ($create_schema == "yes") {
    //get attached image url by id
    $featured_image_url = wp_get_attachment_url(get_post_thumbnail_id($post_id) );
    //get the post url by id
    $post_url = get_permalink($post_id);

    $author = get_bloginfo('url');
    $dmain = gizzmo_ai_get_tld($author);
    $dmain = ucfirst($dmain);
    $dmain = urlencode($dmain);
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_schemas/' . $website_id . ',' . $asin . ',' . $dmain;
    $schemas_list = gizzmo_ai_make_get_request($enpoint_url);

    for($i = 0; $i < count($schemas_list); $i++)
    {
        #convert the json to a string
        $schema = wp_json_encode($schemas_list[$i]);
        if ($i == 0) {
            $schema = str_replace('{{featured_image}}', $featured_image_url, $schema);
            $schema = str_replace('{{URL}}', $post_url, $schema);
        }

        $content .= '<script type="application/ld+json">' . $schema .'</script>';
    }

    //update the post content with the new content
    $post = array(
        'ID' => $post_id,
        'post_content' => $content
    );
    wp_update_post($post);
    //}

    
    //add the asin to an array
    $asins_array = array();
    array_push($asins_array, $asin);
    

    $order = 1;
    $post_data = array(
        'post_id' => $post_id,
        'type' => 'product_review',
        'order' => $order,
        'asins' => $asins_array,
        'title' => $post_title,
        'generative_template_id' => '1',
        'website_id' => $website_id,


    );
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_content_for_website';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);


    

    #}



}



function gizzmo_ai_create_and_save_roundup_post($asin,$website_id)
{
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_ready_asin_data/' . $website_id . ',roundups,' . $asin ;
    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);

    if ($asin_json_res['status'] == 'error') {
        echo esc_html( $asin_json_res['message'] );
        return;
    }
    $asin_json_res = $asin_json_res['data'];

    $create_pros_cons = $asin_json_res['create_pros_cons'];
    $create_rating_reviews = $asin_json_res['create_rating_reviews'];
    $create_list_of_products = $asin_json_res['create_list_of_products'];
    

    //start applying translations if the language is not english
    $conclusion_title_text ="Conclusion";
    $pros_title_text ="Pros:";
    $cons_title_text ="Cons:";
    $qanda_title_text ="Questions & Answers:";
    $cta_title_text ="Buy On Amazon";
    $read_also_title_text ="Read also:";
    $question_title_text ="Question:";
    $answer_title_text ="Answer:";
    $read_all_user_reviews_title_text ="Read All User Reviews";
    $ratings_title_text ="Ratings";
    
    
    
    $language = 'English';
    if (isset($asin_json_res['language'])) {
        $language = $asin_json_res['language'];
    } 
    
    if ($language != 'English') {
        $conclusion_title_text = $asin_json_res['translations']['Conclusion'];
        $pros_title_text = $asin_json_res['translations']['Pros:'];//{{pros_title}}
        $cons_title_text = $asin_json_res['translations']['Cons:'];//{{cons_title}}
        $qanda_title_text = $asin_json_res['translations']['Questions & Answers:'];
        $cta_title_text = $asin_json_res['translations']['Buy On Amazon'];//{{cta_title}}
        $read_also_title_text = $asin_json_res['translations']['Read also:'];
        $question_title_text = $asin_json_res['translations']['Question:'];
        $answer_title_text = $asin_json_res['translations']['Answer:'];
        $read_all_user_reviews_title_text = $asin_json_res['translations']['Read All User Reviews'];//{{read_all_user_reviews}}
        $ratings_title_text = $asin_json_res['translations']['Ratings']; //{{ratings_title}}
        
    }


    // read the html file from html_parts folder. this is the default style
    $one_roundup_item_html = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/product_roundup.html');
    $roundup_style = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/roundup_css.txt');

    if ($create_pros_cons == "no" and $create_rating_reviews == "no" and $create_list_of_products == "no") {
        $one_roundup_item_html = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/product_roundup_pro.html');
        $roundup_style = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/roundup_pro_css.txt');
    }
   

         



    $content = '';

    $create_tags = $asin_json_res['create_tags'];
    $connect_categories = $asin_json_res['connect_categories'];
    $featured_image = $asin_json_res['featured_image'];
    $focus_keyphrase = $asin_json_res['focus_keyphrase'];
    $original_keyphrase = $asin_json_res['original_keyphrase'];
    $asin_affiliate_tag = $asin_json_res['affiliate_tag'];
    $asins = $asin_json_res['asins'];

    

    $asins_array = array();
    $asins_array = explode(',', $asins);

    $package_type = $asin_json_res['package_type'];



    if ($package_type == 'Enterprise') {
        $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
        $content = $gizzmo_enterprise . $content;
    }

    $gizzmo_div = "<form id='gizzmo_post_details_form' style='display:none'>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_post_id' id='form_gizzmo_post_id' value=''>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_website_id' id='form_gizzmo_website_id' value='". $website_id ."'>";
    $gizzmo_div .=  "</form>";

    $content = $gizzmo_div . $content;

    $post_title = $asin_json_res['Title'];
    $introduction = $asin_json_res['Introduction'];
    $meta_Description = $asin_json_res['Meta_Description'];

    $product_in_roundup = $asin_json_res['data'];

     

    $html ="";
     

    if ($create_list_of_products == "yes") {
        foreach ($product_in_roundup as $product) {
            $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;
            
            if ($package_type == "Free")
            {
                $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'];
            }

            $html .= "<div class='one_prod_item'>";
            $html .= "<a class='gizzmo_link' rel='nofollow' href='" . $AffiliateLink . "' target='_blank'><img class='prod_item_list_img' src='" . $product['preview_image'] . "' /></a>";
            $html .= "<div class='prod_item_list_texts'>";
            $html .= "<div class='prod_item_list_title'><a class='gizzmo_link' rel='nofollow' href='" . $AffiliateLink . "' target='_blank'>" . $product['product_name'] . "</a></div>";
            if ($create_rating_reviews == "yes") {
                $html .= "<div class='prod_item_list_rating'>";
                $html .= "<span style='left: -96px;position: relative;top: 1px;'>" . $product['rating'] . "</span>";
                $html .= "<span class='main_raiting_count' style='margin-left: 15px;'>" . $product['reviews_count'] . " " . $ratings_title_text . "</span>";
                $html .= "<div class='stars-rating-main' style='--rating: " . $product['rating'] . ";float: left;top: 4.5px;left: 35px;'>";
                $html .= "<div class='rating'></div>";
                $html .= "</div>";
                $html .= "</div>";
            }
            $html .= "</div>";
            $html .= "<div class='prod_item_list_bt'>";
            $html .= "<a rel='nofollow' style='border: 1px solid #6c6a5c;' href='" . $AffiliateLink . "' target='_blank' class='wp-block-button__link small_bt gizzmo_link'>" . $cta_title_text . "</a>";
            $html .= "</div>";
            $html .= "</div>";
        }
        $product_list_html = "<div class='products_list'>" . $html . "</div><br><br>";
        $content .= $product_list_html;
    }

    #check if $introduction is not empty and if it is an array
    #if it is an array, then loop through the array and create a string
    #if it is a string, then just use it as it is
    $introduction_html = '';
    if ($introduction != '') {
        
        if (is_array($introduction)) {
            foreach ($introduction as $paragraph) {
                $introduction_html .= '<p>' . $paragraph . '</p>';
            }
        } else {
            $introduction_html = '<p>' . $introduction . '</p>';
        }
    } else {
        $introduction_html = '';
    }

    $content .= $introduction_html ;



    #echo $asin_json_res['data'];

    #loop through the json asin_json_res and create a 
    
    $product_number = 1;
    foreach ($product_in_roundup as $product) {

         

        //if ($product['source'] == "www.amazon.com" || $product['source'] == "www.amazon.co.uk") {
        //    $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;
        //}
        //elseif ($product['source'] == "www.walmart.com") {
        //    $AffiliateLink = "https://" . $product['source'] . "/ip/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;  
        //}
        $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;

        $reviews_link = "";
        //if ($product['source'] == "www.amazon.com" || $product['source'] == "www.amazon.co.uk") {
        //    $reviews_link = "https://" . $product['source'] . "/product-reviews/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;
        //}
        $reviews_link = "https://" . $product['source'] . "/product-reviews/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;
        
        if ($package_type == "Free")
        {
            //if ($product['source'] == "www.amazon.com" || $product['source'] == "www.amazon.co.uk") {
            //    $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'];
            //    $reviews_link = "https://" . $product['source'] . "/product-reviews/" . $product['asin'];
            //}
            //elseif ($product['source'] == "www.walmart.com") {
            //    $AffiliateLink = "https://" . $product['source'] . "/ip/" . $product['asin'];
            //}

            $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'];
            $reviews_link = "https://" . $product['source'] . "/product-reviews/" . $product['asin'];

        }



        $conclusion_paragraphs = $product['conclusion_paragraphs'];
        //check if $conclusion_paragraphs is an array or a string
        //if it is an array, then loop through the array and create a string
        //if it is a string, then just use it as it is
        if ($conclusion_paragraphs != '') {
            $conclusion_paragraphs_html = '';
            if (is_array($conclusion_paragraphs)) {
                foreach ($conclusion_paragraphs as $paragraph) {
                    $conclusion_paragraphs_html .= '<p>' . $paragraph . '</p>';
                }
            } else {
                $conclusion_paragraphs_html = '<p>' . $conclusion_paragraphs . '</p>';
            }
        } else {
            $conclusion_paragraphs_html = '';
        }

        
        
        //$conclusion_paragraphs_html = '';
        //foreach ($conclusion_paragraphs as $conclusion_paragraph) {
        //    $conclusion_paragraphs_html .= '<p>' . $conclusion_paragraph . '</p>';
        //}

        $pros_html = '';
        $cons_html = '';

        $pros = $product['pros'];
        if (count($pros) > 0) {
            $pros_html = '<ul>';
            foreach ($pros as $pro) {
                $pros_html .= '<li>' . $pro . '</li>';
            }
            $pros_html .= '</ul>';
        } else {
            $pros_html = '';
        }

        $cons = $product['cons'];
        if (count($cons) > 0) {
            $cons_html = '<ul>';
            foreach ($cons as $con) {
                $cons_html .= '<li>' . $con . '</li>';
            }
            $cons_html .= '</ul>';
        } else {
            $cons_html = '';
        }


        //if ($pros_html == '') {
        //    $item_html = str_replace('Pros:', '', $item_html);
        //}
        //if ($cons_html == '') {
        //    $item_html = str_replace('Cons:', '', $item_html);
        //}


        $ranked_features = $product['product_rank_by_feature'];
        $ranked_features_html = '';
        foreach ($ranked_features as $ranked_feature) {
            $ranked_features_html .= '<div class="one_feaure_rank">';
            $ranked_features_html .= '<span class="feature_rank_title">' . $ranked_feature['feature'] . '</span>';
            $ranked_features_html .= '<div class="stars-rating" style="--rating: ' . $ranked_feature['rank'] . '; float: right; top: 5.5px">';
            $ranked_features_html .= '<div class="rating"></div>';
            $ranked_features_html .= '</div>';
            $ranked_features_html .= '<span class="feature_rank_number">' . $ranked_feature['rank'] . '</span>';
            $ranked_features_html .= '</div>';
        }
 
        $price = '$'. $product['price'];

        #check if the product has a preview image, if so, and it is the first product, then use it as the post featured image
        $item_html = $one_roundup_item_html;
        $item_html = str_replace('{{ShortName}}', $product['product_name'], $item_html);
        #$item_html = str_replace('{{Price}}', $price, $item_html);
        $item_html = str_replace('{{ImageSource}}', $product['preview_image'], $item_html);
        #$item_html = str_replace('{{NumberOfRatings}}', $product['reviews_count'], $item_html);
        #$item_html = str_replace('{{MainRating}}', $product['rating'], $item_html);
        $item_html = str_replace('{{ProductText}}', $conclusion_paragraphs_html, $item_html);
        
        
        $item_html = str_replace('{{AffiliateLink}}', $AffiliateLink, $item_html);
        #$item_html = str_replace('{{ReadReviewsAmazonLink}}', $reviews_link, $item_html);
        

        if ($create_rating_reviews == "no") {

            //add display none to this html part <div class="Product_Rating">
            $item_html = str_replace('<div class="Product_Rating">', '<div style="display:none" class="Product_Rating">', $item_html);
            $item_html = str_replace('<div class="Read_All_Reviews">', '<div style="display:none" class="Read_All_Reviews">', $item_html);
            
            $item_html = str_replace('{{NumberOfRatings}}', '', $item_html);
            $item_html = str_replace('{{MainRating}}', '', $item_html);
            $item_html = str_replace('{{ReadReviewsAmazonLink}}', '', $item_html);
            $item_html = str_replace('{{FeaturesAndRatings}}', '', $item_html);
            

        }
        else
        {
            $item_html = str_replace('{{NumberOfRatings}}', $product['reviews_count'], $item_html);
            $item_html = str_replace('{{MainRating}}', $product['rating'], $item_html);
            $item_html = str_replace('{{ReadReviewsAmazonLink}}', $reviews_link, $item_html);
            $item_html = str_replace('{{FeaturesAndRatings}}', $ranked_features_html, $item_html);
        }

        //check if create_pros_cons is no
        //if it is, then remove the pros and cons from the item_html
         
        if ($create_pros_cons == "no") {
            $item_html = str_replace('<div class="Pros_Title">{{pros_title}}</div>', '', $item_html);
            $item_html = str_replace('<div class="Pros"></div>', '', $item_html);
            $item_html = str_replace('<div class="Cons_Title">{{cons_title}}</div>', '', $item_html);
            $item_html = str_replace('<div class="Cons"></div>', '', $item_html);

            $item_html = str_replace('{{Pros}}', '', $item_html);
            $item_html = str_replace('{{Cons}}', '', $item_html);
        }
        else
        {
            $item_html = str_replace('{{Pros}}', $pros_html, $item_html);
            $item_html = str_replace('{{Cons}}', $cons_html, $item_html);

            if ($pros_html == "") {
                $item_html = str_replace('<div class="Pros_Title">{{pros_title}}</div>', '', $item_html);
                $item_html = str_replace('<div class="Pros"></div>', '', $item_html);
            }
            if ($cons_html == "") {
                $item_html = str_replace('<div class="Cons_Title">{{cons_title}}</div>', '', $item_html);
                $item_html = str_replace('<div class="Cons"></div>', '', $item_html);
            }

            if ($pros_html != "")
            {
                $item_html = str_replace('{{pros_title}}', $pros_title_text, $item_html);
            }
            if ($cons_html != "")
            {
                $item_html = str_replace('{{cons_title}}', $cons_title_text, $item_html);
            }
             
        }        



         
        $item_html = str_replace('{{product_number}}', $product_number, $item_html);

        $content .= $item_html;

        $product_number++;
    }


    $content = $roundup_style . $content;


    $content = str_replace('{{cta_title}}', $cta_title_text, $content);
    $content = str_replace('{{read_all_user_reviews}}', $read_all_user_reviews_title_text, $content);
    $content = str_replace('{{ratings_title}}', $ratings_title_text, $content);


    
    //add the post categories
    $post_categories_array = array();
    $post_categories = $asin_json_res['wordpress_categories'];
    if ($post_categories != '') {
        $post_categories_array = explode(',', $post_categories);
    }


     

    $post_id = wp_insert_post(
        array(
            'post_title' => $post_title,
            'post_excerpt' => $meta_Description,
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'post'
        )
    );



    
    //check if the post_categories_array is not empty
    //if it is not empty, then set the post categories
    if ($connect_categories == "yes") {
        if (!empty($post_categories_array)) {
            wp_set_post_categories($post_id, $post_categories_array);
        }
    }
    
    //insert post tags
    //check if the $asin_json has post_tags
    //if it does, then implode the array into a string
    //then set the post 
    

    if ($create_tags == 'yes') {
        $post_tags = array();
        if (array_key_exists('seo_tags', $asin_json_res)) {
            $post_tags = $asin_json_res['seo_tags'];
            //get only the first 4 tags
            //check if the array has more than 4 tags
            //if it does, then slice the array to only 4 tags
            //then implode the array into a string
            if (count($post_tags) > 4) {
                $post_tags = array_slice($post_tags, 0, 4);
            }
            if (count($post_tags) > 0) {
                $post_tags = implode(',', $post_tags);
                wp_set_post_tags($post_id, $post_tags);
            }
        }
    }



    if ($focus_keyphrase == "-") {
        $focus_keyphrase = "";
    }
    if ($original_keyphrase == "-") {
        $original_keyphrase = "";
    }

    update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_Description);

    if ($package_type == "Free")
    {
        $focus_keyphrase = "";
        $original_keyphrase = "";
    }
    else
    {
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$original_keyphrase);
    }


    if ($featured_image != '')
    {
        $attachment_id = gizzmo_ai_attach_image_file($featured_image, $post_id);
        set_post_thumbnail($post_id, $attachment_id);
    }




    //make a post request to the api to save the new post data to the database
    $order = 1;
    $post_data = array(
        'post_id' => $post_id,
        'type' => 'roundup',
        'order' => $order,
        'asins' => $asins_array,
        'title' => $post_title,
        'generative_template_id' => '1',
        'website_id' => $website_id,


    );
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_content_for_website';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);







}

 
function gizzmo_ai_create_and_save_comparison_post($asin,$website_id)
{

     
    
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_ready_asin_data/' . $website_id . ',comparisons,' . $asin ;
    //echo $enpoint_url ;
    //return;

    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);

    

    if ($asin_json_res['status'] == 'error') {
        echo esc_html( $asin_json_res['message'] );
        return;
    }

    //start creating the post
    //convert the post data to json
    //$post_data = json_decode($asin_json_res, true);
    $post_data = $asin_json_res['data'];
    //echo $post_data;

    //get only the data from the post data
    //$post_data = $post_data['data'];

    $language = 'English';
    $pros_title_text = 'For';
    $cons_title_text = 'Against';
    if (isset($post_data['language'])) {
        $language = $post_data['language'];
    } 
    
    if ($language != 'English') {
        $conclusion_title_text = $post_data['translations']['Conclusion'];
        $pros_title_text = $post_data['translations']['Pros:'];
        $cons_title_text = $post_data['translations']['Cons:'];
        $qanda_title_text = $post_data['translations']['Questions & Answers:'];
        $cta_title_text = $post_data['translations']['Buy On Amazon'];
        $read_also_title_text = $post_data['translations']['Read also:'];
        $question_title_text = $post_data['translations']['Question:'];
        $answer_title_text = $post_data['translations']['Answer:'];
    }


    //get the post style
    $comparison_style = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/comparison_css.txt');


    //get the post title
    $post_title = $post_data['blog_title'];

    $asins = $post_data['asins'];

    $carousel_options = $post_data['carousel_options'];
    $product_keyphrase = $post_data['product_keyphrase'];
    $selected_similar_post_ids = $post_data['selected_similar_post_ids'];




    //bulding the post content
    $content = "";
    
    //check if the introduction_paragraph is not empty or even exists
    //$introduction_start_paragraph = "";
    $introduction_paragraph = "";
    if (array_key_exists('introduction_paragraphs', $post_data)) {
        //$introduction_paragraph = $post_data['introduction_paragraphs'];
        //$introduction_start_paragraph = $introduction_paragraph[0]['text'];
        //$introduction_paragraph = $introduction_paragraph[1]['text'];
        $introduction_paragraphs = $post_data['introduction_paragraphs'];
        foreach ($introduction_paragraphs as $introduction_paragraph_item) {
            $introduction_paragraph .= '<p>' . $introduction_paragraph_item . '</p>';
        }
    }


    $content .= '<p>' . $introduction_paragraph . '</p>';
     

    $asin_affiliate_tag = $post_data['affiliate_tag'];

    //check if the for_against section is not empty or eveb exists
    if (array_key_exists('for_against', $post_data)) {

        

        //create the comparison for against table
        $for_against_items = $post_data['for_against'];
        
        //check if the for_against_items is not empty
        if (!empty($for_against_items)) {

            //make a for loop to loop through the for_against_items
            $for_against_html = '';
            $for_against_html .= '<div class="container_compare">';
            $for_against_html .= '<div class="panel_compare pricing-table">';

            
            
            foreach ($for_against_items as $prod_item) {

                $product_asin = $prod_item['asin'];
                $product_source = "www.amazon.com";
                #based on the asin, get the rank from the products_overll_rank array
                #loop through the products_overll_rank array to find the asin that matches the product_asin and get the rank
                $product_rank = 0;
                foreach ($post_data['products'] as $product) {
                    if ($product['asin'] == $product_asin) {
                        $product_rank = $product['rank'];
                        $product_source = $product['source'];
                    }
                }

                #create the product link with the affiliate tag if exists
                $product_link = '';
                if ($asin_affiliate_tag != '') {
                    $product_link = 'https://'. $product_source . '/dp/' . $product_asin . '?tag=' . $asin_affiliate_tag;
                } else {
                    $product_link = 'https://'. $product_source . '/dp/' . $product_asin;
                }



                $one_for_against_html = '<div class="pricing-plan">';

                $one_for_against_html .= '<h2 class="pricing-header">' . $prod_item['product'] . '</h2>';
                $one_for_against_html .= '<div class="comp_rating">';
                $one_for_against_html .= '<svg class="star_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="16" id="star"><path style="marker: none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path> </svg>';
                $one_for_against_html .= '<span>' . strval($product_rank) . '</span>';
                $one_for_against_html .= '</div>';
                $one_for_against_html .= '<p class="pricing-description"></p>';

                $one_for_against_html .= '<span class="for_against_title">'. $pros_title_text .'</span>';
                $one_for_against_html .= '<ul class="pricing-features">';
                
                foreach ($prod_item['pros'] as $pro_item) {
                    $one_for_against_html .= '<li class="pricing-features-item">' . $pro_item . '</li>';
                }
                $one_for_against_html .= '</ul>';
                
                $one_for_against_html .= '<span class="for_against_title">'. $cons_title_text .'</span>';
                $one_for_against_html .= '<ul class="pricing-features">';
                foreach ($prod_item['cons'] as $con_item) {
                    $one_for_against_html .= '<li class="minus pricing-features-item">' . $con_item . '</li>';
                }

                $one_for_against_html .= '</ul>';

                $one_for_against_html .= '<div style="text-align: center">';
                $one_for_against_html .= '<a href="'. $product_link .'"  target="_blank" rel="nofollow">'. $cta_title_text .'</a>';
                $one_for_against_html .= '</div>';

                $one_for_against_html .= '</div>';

                $for_against_html .= $one_for_against_html;
            }




            $for_against_html .= '</div>';
            $for_against_html .= '</div>';


            $content .= $comparison_style . $for_against_html;
        }
    }


    //check if the introduction_paragraph is not empty or even exists
    //if (array_key_exists('introduction_paragraphs', $post_data)) {
    //    $introduction_paragraph = $post_data['introduction_paragraphs'];
        //make a for loop to loop through the introduction_paragraphs
    //    foreach ($introduction_paragraph as $paragraph) {
    //$content .= '<p>' . $introduction_paragraph . '</p>';
    //    }
    //}
    


    $compered_items_caruosel = "false";
    $similar_items_caruosel = "false";
    $related_items_caruosel = "false";
    //check if the user wants to create caruosels

    $similar_items_iframe = '';
    $related_items_iframe = '';

    if ($carousel_options == "yes") {
        //create the caruosels
        //check if the compered_items_caruosel is not empty or even exists
        if (array_key_exists('smilar_products', $post_data)) {
            if (empty($post_data['smilar_products'])) {
                $similar_items_caruosel = "false";
            } else {
                $similar_items_caruosel = "true";
                $product_caruosel_asin = $post_data['smilar_products'][0];
                $similar_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $product_caruosel_asin .'&affid='. $asin_affiliate_tag .'&type=similar_items&lang='.$language.'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                
                 
            }
        }
        if ($similar_items_caruosel == "false") {
            if (array_key_exists('related_products', $post_data)) {
                if (empty($post_data['related_products'])) {
                    $related_items_caruosel = "false";
                } else {
                    $product_caruosel_asin = $post_data['related_products'][0];
                    $related_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $product_caruosel_asin .'&affid='. $asin_affiliate_tag .'&type=related_items&lang='.$language.'" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                    $related_items_caruosel = "true";

                     
                }
            }
        }
    }

 



    //create the comparison paragraphs
    //check if the comparison_paragraphs section is not empty or even exists
    if (array_key_exists('comparison_paragraphs', $post_data)) {
        $comparison_paragraphs = $post_data['comparison_paragraphs'];
        //make a for loop to loop through the comparison_paragraphs
        $prev_item_had_image = false;
        $paragraphs_index = 0;
        foreach ($comparison_paragraphs as $paragraph) {

            $paragraphs_index++;

            $content .= '<h2>' . $paragraph['title'] . '</h2>';
            
            $asin_source_credit = "Amazon.com";#temp, missing in json
            $seleted_product_image_link = '';#temp, missing in json

            
            try {
                $seleted_product_image_link = $paragraph['imag_link'];
            } catch (Exception $e) {
                $seleted_product_image_link = '';
            }

            try {
                $asin_source_credit = $paragraph['source'];
            } catch (Exception $e) {
                $asin_source_credit = "Amazon.com";
            }
            

            if ($prev_item_had_image == false)
            {
                if ($paragraph['image'] != '') {

                    $image_html = '<figure class="wp-block-image size-large">';
                    $image_html .= '<a class="gizzmo_link" data-linktype="image" rel="nofollow" target="_blank" href="'. $seleted_product_image_link .'">';

                     
                    if ($product_keyphrase != '') {
                        $image_html .= '<img decoding="async" src="' . $paragraph['image'] . '" alt="' . $product_keyphrase . '" class="wp-image-840" />';
                    } else {
                        $image_html .= '<img decoding="async" src="' . $paragraph['image'] . '" alt="' . $paragraph['image'] . '" class="wp-image-840" />';
                    }
                     
                    
                    $image_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">';
                    $image_html .= 'Credit - ' . $asin_source_credit;
                    $image_html .= '</div>';
                    $image_html .= '</a>';
                    $image_html .= '</figure>';


                    $content .= $image_html;

                    $prev_item_had_image = true;
                }
                else
                {
                    $prev_item_had_image = false;
                }
            }
            else
            {
                $prev_item_had_image = false;
            }




            $products_ranks = $paragraph['products_rank'];

            $head_to_head_feature_html = '';
            $head_to_head_feature_html .= '<div class="container_compare">';
            $head_to_head_feature_html .= '<div class="panel_compare pricing-table">';

            
            
            foreach ($products_ranks as $product_rank) {

                #create the product link with the affiliate tag if exists
                $product_link = '';
                if ($asin_affiliate_tag != '') {
                    $product_link = 'https://'. $product_rank['source'] . '/dp/' . $product_rank['asin'] . '?tag=' . $asin_affiliate_tag;
                } else {
                    $product_link = 'https://'. $product_rank['source'] . '/dp/' . $product_rank['asin'];
                }


                $head_to_head_feature_html .= '<div class="pricing-plan" style="padding-top: 5px;padding-bottom: 5px;">';

                $head_to_head_feature_html .= '<h2 class="pricing-header" style="font-size: 15px;margin-bottom: 1px;">' . $product_rank['short_product_name'] . '</h2>';
                $head_to_head_feature_html .= '<div class="comp_rating" style="margin-top: 0px;">';
                $head_to_head_feature_html .= '<svg class="star_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="16" id="star"><path style="marker: none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path> </svg>';
                $head_to_head_feature_html .= '<span>' . $product_rank['rank'] . '</span>';
                $head_to_head_feature_html .= '</div>';
                 
                $head_to_head_feature_html .= '<div style="text-align: center;font-size: 15px;margin-top: 5px;">';
                $head_to_head_feature_html .= '<a href="' . $product_link . '" target="_blank" rel="nofollow">'. $cta_title_text .'</a>';
                $head_to_head_feature_html .= '</div>';

                $head_to_head_feature_html .= '</div>';
            }

            $head_to_head_feature_html .= '</div>';
            $head_to_head_feature_html .= '</div>';






            $content .= '<p>' . $paragraph['text'] . '</p>';
            $content .= $head_to_head_feature_html;


            if ($paragraphs_index == 3) {
                if ($similar_items_iframe != '') {
                    $content .= $similar_items_iframe;
                }
                elseif ($related_items_iframe != '') {
                    $content .= $related_items_iframe;
                }
            }
        }
    }





    //create the conclusion paragraph
    //check if the conclusion_paragraphs section is not empty or even exists
    $conclusion = '';
    if (array_key_exists('conclusion', $post_data)) {
        if ($post_data['conclusion'] != '') {
            $conclusion_title = $post_data['conclusion']['title'];
            $conclusion_text = $post_data['conclusion']['paragraph'];
            $conclusion = '<h2>' . $conclusion_title . '</h2>';
            $conclusion .= '<p>' . $conclusion_text . '</p>';
            $content .= $conclusion;
        }
        
    }

    //create the faqs,
    //check if the faqs section is not empty or even exists
    $faqs_html = '';
    if (array_key_exists('faqs', $post_data)) {
        $faqs = $post_data['faqs'];
        if ($faqs != '') {
            //make a for loop to loop through the faqs
            $faqs_html .= '<h2>'.$qanda_title_text.'</h2>';
            foreach ($faqs as $faq) {
                $faqs_html .= '<p><b>'.$question_title_text.' </b>' . $faq['question'] . '</p>';
                $faqs_html .= '<p><b>'.$answer_title_text.' </b>' . $faq['answer'] . '</p>';
            }

            $content .= $faqs_html;
        }
    }




    //create the similer posts
    if ($selected_similar_post_ids != null) {
        $similar_posts_html = '<h2>'.$read_also_title_text.'</h2>';
        #splait the selected_similar_post_ids string into array of ids by comma
        $selected_similar_post_ids = explode(',', $selected_similar_post_ids);

        foreach ($selected_similar_post_ids as $similar_post_id) {
            $similar_post = get_post($similar_post_id);
            $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
        }
        $content .= $similar_posts_html;
    }  




    $meta_description = '';
    if (array_key_exists('blog_meta_description', $post_data)) {
        $meta_description = $post_data['blog_meta_description'];
    }


    if ($post_title != "")
    {
        $post_title = str_replace('"', '', $post_title);

        $post_id = wp_insert_post(
            array(
                'post_title' => $post_title,
                'post_excerpt' => $meta_description,
                'post_content' => $content,
                'post_status' => 'draft',
                'post_type' => 'post'
            )
        );
    }
    else
    {
        echo "Something went wrong, please try again";
        return;
    }

    //connect the post to the categories
    $post_categories_array = array();
    if (array_key_exists('wordpress_categories', $post_data)) {
        try {
            $post_categories_array = array();
            $post_categories = $post_data['wordpress_categories'];
            if ($post_categories != '') {
                $post_categories_array = explode(',', $post_categories);
            }
        } catch (Exception $e) {
            $post_categories_array = array();
        }

        if (!empty($post_categories_array)) {
            wp_set_post_categories($post_id, $post_categories_array);
        }

    }

    
    //insert post tags
    $post_tags = array();
    if (array_key_exists('seo_tags', $post_data)) {
        $post_tags = $post_data['seo_tags'];
        //get only the first 4 tags
        //check if the array has more than 4 tags
        //if it does, then slice the array to only 4 tags
        //then implode the array into a string
        if (count($post_tags) > 7) {
            $post_tags = array_slice($post_tags, 0, 7);
        }
        if (count($post_tags) > 0) {
            $post_tags = implode(',', $post_tags);
            wp_set_post_tags($post_id, $post_tags);
        }
    }
    


    //insert the blog_meta_description
    if (array_key_exists('blog_meta_description', $post_data)) {
        $meta_description = $post_data['blog_meta_description'];
        //remove the first " from the meta_description and the last " if exists
        $meta_description = str_replace('"', '', $meta_description);
        if ($meta_description != '') {
            update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);
        }
    }

    //insert the focus_keyphrase
    if ($product_keyphrase != '') {
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$product_keyphrase);
    }
     

    //insert the featured image
    $post_featured_image = '';
    if (array_key_exists('featured_image', $post_data)) {
        $post_featured_image = $post_data['featured_image'];
        if ($post_featured_image != '') {
            $attachment_id = gizzmo_ai_attach_image_file($post_featured_image, $post_id);
            set_post_thumbnail($post_id, $attachment_id);
        }
    }




    //make a post request to the api to save the new post data to the database
    $order = 1;
    $post_data = array(
        'post_id' => $post_id,
        'type' => 'comparison',
        'order' => $order,
        'asins' => $asins,
        'title' => $post_title,
        'generative_template_id' => '1',
        'website_id' => $website_id,
    );
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_content_for_website';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);



    

    #}



}



function gizzmo_ai_create_and_save_general_post($asin,$website_id)
{

     
    
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_ready_asin_data/' . $website_id . ',generals,' . $asin ;
    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);

    #convert $asin_json_res to json string
    #$STRING_asin_json_res = json_encode($asin_json_res);
    #echo $STRING_asin_json_res;
    #return;

    if ($asin_json_res['status'] == 'error') {
        echo esc_html( $asin_json_res['message'] );
        return;
    }

    $asin_json_res = $asin_json_res['data'];

    $post_title = $asin_json_res['blog_title'];
    $meta_description = $asin_json_res['meta_description'];
    $language = $asin_json_res['language'];
    
    #$post_featured_image = $asin_json_res['featured_image'];
    $asin_affiliate_tag = $asin_json_res['affiliate_tag'];
    
    $smilar_products_carousel_asin = $asin_json_res['smilar_products_carousel_asin'];
    $content = "";

    $package_type = $asin_json_res['package_type'];
    $similar_post_ids = $asin_json_res['selected_similar_post_ids']; #Undefined index: selected_similar_post_ids

    $connect_categories = $asin_json_res['connect_categories'];
    $create_tags = $asin_json_res['create_tags'];
    $focus_keyphrase = $asin_json_res['focus_keyphrase'];
    $post_featured_image = $asin_json_res['featured_image'];
    $asins_array = $asin_json_res['asins'];


    if ($package_type == 'Enterprise') {
        $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
        $content = $gizzmo_enterprise . $content;
    }


    $gizzmo_div = "<form id='gizzmo_post_details_form' style='display:none'>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_post_id' id='form_gizzmo_post_id' value=''>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_website_id' id='form_gizzmo_website_id' value='". $website_id ."'>";
    $gizzmo_div .=  "</form>";

    $content = $gizzmo_div . $content;

    
    $content_sections = $asin_json_res['sections'];

    $section_index = 0;
    foreach ($content_sections as $section) {
        $section_title = $section['section_title'];
        $section_subsections = $section['sub_sections'];

        //if $section_title contains : then split by it and take the second part
        $section_title_parts = explode(':', $section_title);
        if (count($section_title_parts) > 1) {
            $section_title = $section_title_parts[1];
        }
        





        $image_src = $section['image'];
        
        $section_html = '';
        if ($section_title != 'Introduction')
        {
            $section_html = '<h2>' . $section_title . '</h2>';
        }

        $asin_source = $section['source'];
        #remove the www. from the source
        $asin_source_credit = str_replace('www.', '', $asin_source);
        #$source_site = str_replace('.com', '', $asin_source_credit);
        #$source_site = str_replace('.co.uk', '', $source_site);
        #make the first letter uppercase
        #$source_site = ucfirst($asin_source_credit);

        $asin_link = '';
        if ($smilar_products_carousel_asin != '')
        {
            if ($package_type == "Free")
            {
                
                //if ($asin_source == "www.amazon.com" ||$asin_source == "www.amazon.co.uk") {
                //    $asin_link = 'https://' . $asin_source . '/dp/' . $smilar_products_carousel_asin;
                //}
                //elseif ($asin_source == "www.walmart.com") {
                //    $asin_link = 'https://' . $asin_source . '/ip/' . $smilar_products_carousel_asin;
                //}
                $asin_link = 'https://' . $asin_source . '/dp/' . $smilar_products_carousel_asin;

            }
            else
            {
                
                //if ($asin_source == "www.amazon.com" ||$asin_source == "www.amazon.co.uk") {
                //    $asin_link = 'https://' . $asin_source . '/dp/' . $smilar_products_carousel_asin . '?tag=' . $asin_affiliate_tag;
                //}
                //elseif ($asin_source == "www.walmart.com") {
                //    $asin_link = 'https://' . $asin_source . '/ip/' . $smilar_products_carousel_asin . '?tag=' . $asin_affiliate_tag;
                //}
                $asin_link = 'https://' . $asin_source . '/dp/' . $smilar_products_carousel_asin . '?tag=' . $asin_affiliate_tag;
            }
        }

        if ($image_src != '')
        {
            $image_html ='';
            $image_html .= '<figure class="wp-block-image size-large">';
            if ($asin_link != '')
            {
                $image_html .= '<a class="gizzmo_link" data-linktype="image" rel="nofollow" target="_Blank" href="' . $asin_link . '">';
            }
            else
            {
                $image_html .= '<a href="' . $image_src . '">';
            }

            $image_html .= '<img decoding="async" src="' . $image_src . '" alt="' . $image_src . '" class="wp-image-840" />';
            
            #$image_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">Credit - Amazon.com</div>';

            $image_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">';
            $image_html .= 'Credit - ' . $asin_source_credit;
            $image_html .= '</div>';

            $image_html .= '</a>';
            $image_html .= '</figure>';

            $section_html .= $image_html;
        }


        foreach ($section_subsections as $subsection) {
            $subsection_title = $subsection['sub_section_title'];

            $subsection_title_parts = explode(':', $subsection_title);
            if (count($subsection_title_parts) > 1) {
                $subsection_title = $subsection_title_parts[1];
            }


            $subsection_text = $subsection['sub_section_content'];
            $subsection_html = '<h3>' . $subsection_title . '</h3>';

            $subsection_text = str_replace('.A', '.<br><br>A', $subsection_text);
            $subsection_text = str_replace('.B', '.<br><br>B', $subsection_text);
            $subsection_text = str_replace('.C', '.<br><br>C', $subsection_text);
            $subsection_text = str_replace('.D', '.<br><br>D', $subsection_text);
            $subsection_text = str_replace('.E', '.<br><br>E', $subsection_text);
            $subsection_text = str_replace('.F', '.<br><br>F', $subsection_text);
            $subsection_text = str_replace('.G', '.<br><br>G', $subsection_text);
            $subsection_text = str_replace('.H', '.<br><br>H', $subsection_text);
            $subsection_text = str_replace('.I', '.<br><br>I', $subsection_text);
            $subsection_text = str_replace('.J', '.<br><br>J', $subsection_text);
            $subsection_text = str_replace('.K', '.<br><br>K', $subsection_text);
            $subsection_text = str_replace('.L', '.<br><br>L', $subsection_text);
            $subsection_text = str_replace('.M', '.<br><br>M', $subsection_text);
            $subsection_text = str_replace('.N', '.<br><br>N', $subsection_text);
            $subsection_text = str_replace('.O', '.<br><br>O', $subsection_text);
            $subsection_text = str_replace('.P', '.<br><br>P', $subsection_text);
            $subsection_text = str_replace('.Q', '.<br><br>Q', $subsection_text);
            $subsection_text = str_replace('.R', '.<br><br>R', $subsection_text);
            $subsection_text = str_replace('.S', '.<br><br>S', $subsection_text);
            $subsection_text = str_replace('.T', '.<br><br>T', $subsection_text);
            $subsection_text = str_replace('.U', '.<br><br>U', $subsection_text);
            $subsection_text = str_replace('.V', '.<br><br>V', $subsection_text);
            $subsection_text = str_replace('.W', '.<br><br>W', $subsection_text);
            $subsection_text = str_replace('.X', '.<br><br>X', $subsection_text);
            $subsection_text = str_replace('.Y', '.<br><br>Y', $subsection_text);
            $subsection_text = str_replace('.Z', '.<br><br>Z', $subsection_text);


            $subsection_html .= '<p>' . $subsection_text . '</p>';

            $section_html .= $subsection_html;
        }

        $section_index++;
        
        $content .= $section_html;

        if ($section_index == 3) {
            if ($package_type == 'Free') {
                $d ="";
            }
            else
            {
                if ($smilar_products_carousel_asin != '')
                {
                    $similar_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $smilar_products_carousel_asin .'&affid='. $asin_affiliate_tag .'&type=similar_items" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                    $content .= $similar_items_iframe;
                }
            }
        }

        //
    }

    //create the similer posts
    if ($similar_post_ids != null) {
        //echo "selected_similar_post_ids: " . $similar_post_ids . "<br>";
        $similar_posts_html = '<h2>Read also:</h2>';
        #splait the selected_similar_post_ids string into array of ids by comma
        $similar_post_ids_array = explode(',', $similar_post_ids);

        foreach ($similar_post_ids_array as $similar_post_id) {
            //echo "similar_post_id: " . $similar_post_id . "<br>";

            $similar_post = get_post($similar_post_id);

            //echo "similar_post: " . $similar_post . "<br>";

            #check if the post is not null
            if ($similar_post != null) {
                #check if the post has a title
                if ($similar_post->post_title != '') {
                    $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
                }
            }
        }
        $content .= $similar_posts_html;
    }  




     //add the post categories

    
    try {
        $post_categories_array = array();
        $post_categories = $asin_json_res['wordpress_categories'];
        if ($post_categories != '') {
            $post_categories_array = explode(',', $post_categories);
        }
    } catch (Exception $e) {
        $post_categories_array = array();
    }
    



    
    $post_id = wp_insert_post(
        array(
            'post_title' => $post_title,
            'post_excerpt' => $meta_description,
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'post'
        )
    );


    //check if the post_categories_array is not empty
    //if it is not empty, then set the post categories
    if ($connect_categories == "yes") {
        if (!empty($post_categories_array)) {
            wp_set_post_categories($post_id, $post_categories_array);
        }
    }



    //insert post tags
    //check if the $asin_json has post_tags
    //if it does, then implode the array into a string
    //then set the post tags
    if ($create_tags == "yes") {
        $post_tags = array();
        if (array_key_exists('seo_tags', $asin_json_res)) {
            $post_tags = $asin_json_res['seo_tags'];
            //get only the first 4 tags
            //check if the array has more than 4 tags
            //if it does, then slice the array to only 4 tags
            //then implode the array into a string
            if (count($post_tags) > 4) {
                $post_tags = array_slice($post_tags, 0, 4);
            }

            if (count($post_tags) > 0) {
                $post_tags = implode(',', $post_tags);
                wp_set_post_tags($post_id, $post_tags);
            }
        }
    }
    





    update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);
    if ($focus_keyphrase == "-") {
        $focus_keyphrase = "";
    }
    if ($product_keyphrase = "") {
        $product_keyphrase = "";
    }
    else
    {
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$focus_keyphrase);
    }
    
     

    if ($post_featured_image != '') {
        $attachment_id = gizzmo_ai_attach_image_file($post_featured_image, $post_id);
        set_post_thumbnail($post_id, $attachment_id);
    }


   



    //make a post request to the api to save the new post data to the database
    $order = 1;
    $post_data = array(
        'post_id' => $post_id,
        'type' => 'general',
        'order' => $order,
        'asins' => $asins_array,
        'title' => $post_title,
        'generative_template_id' => '1',
        'website_id' => $website_id,


    );
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_content_for_website';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);


    

    #}



}



function gizzmo_ai_create_and_save_listicle_post($asin,$website_id)
{

     
    
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_ready_asin_data/' . $website_id . ',listicles,' . $asin ;
    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);
    #echo $enpoint_url;
    #convert $asin_json_res to json string
    #$STRING_asin_json_res = json_encode($asin_json_res);
    #echo $STRING_asin_json_res;
    #return;

    #if ($asin_json_res['status'] == 'error') {
    #    echo esc_html( $asin_json_res['message'] );
    #    return;
    #}

    $asin_json_res = $asin_json_res['data'];

    $post_title = $asin_json_res['Title'];
    $post_Intro = $asin_json_res['Intro'];

    #check if the Conclusion section is not empty or even exists
    $post_conclusion = "";
    if (array_key_exists('Conclusion', $asin_json_res)) {
        $post_conclusion = $asin_json_res['Conclusion'];
    }
    
    $language = 'English';
    $pros_title_text = 'For';
    $cons_title_text = 'Against';
    if (isset($asin_json_res['language'])) {
        $language = $asin_json_res['language'];
    } 
    
    if ($language != 'English') {
        $conclusion_title_text = $asin_json_res['translations']['Conclusion'];
        $pros_title_text = $asin_json_res['translations']['Pros:'];
        $cons_title_text = $asin_json_res['translations']['Cons:'];
        $qanda_title_text = $asin_json_res['translations']['Questions & Answers:'];
        $cta_title_text = $asin_json_res['translations']['Buy On Amazon'];
        $read_also_title_text = $asin_json_res['translations']['Read also:'];
        $question_title_text = $asin_json_res['translations']['Question:'];
        $answer_title_text = $asin_json_res['translations']['Answer:'];
    }


    $meta_description = $post_Intro; #temp, missing in json
     
    
    $smilar_products_carousel_asin = "";
    $content = "";

    $package_type = $asin_json_res['package_type'];
    $similar_post_ids = $asin_json_res['selected_similar_post_ids'];

    $connect_categories = $asin_json_res['connect_categories'];
    $create_tags = $asin_json_res['create_tags'];
    $focus_keyphrase = $asin_json_res['focus_keyphrase'];
    $post_featured_image = $asin_json_res['featured_image'];
    $asins_array = "";


    if ($package_type == 'Enterprise') {
        $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
        $content = $gizzmo_enterprise . $content;
    }

    #add $post_Intro as h2
    $content .= '<h2>' . $post_Intro . '</h2>';


    $gizzmo_div = "<form id='gizzmo_post_details_form' style='display:none'>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_post_id' id='form_gizzmo_post_id' value=''>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_website_id' id='form_gizzmo_website_id' value='". $website_id ."'>";
    $gizzmo_div .=  "</form>";

    $content = $gizzmo_div . $content;


        
    $content_sections = $asin_json_res['Sections'];

    $section_index = 0;
    foreach ($content_sections as $section) {
        $section_title = $section['Title'];

        #$section_paragraphs_intro = $section['Section_description'];
        $section_paragraphs = $section['Paragraphs'];

        $image_alt = $section['Image_data']['alt'];
        $image_caption = $section['Image_data']['caption'];
        $image_src = $section['Image_data']['image_url'];
        
        $section_html = '';
        $section_html = '<h3>' . $section_title . '</h3>';


        if ($image_src != '')
        {
            $image_html ='';
            $image_html .= '<figure class="wp-block-image size-large">';
            $image_html .= '<a class="gizzmo_link" data-linktype="image" rel="nofollow" target="_Blank" href="#">';
            $image_html .= '<img decoding="async" src="' . $image_src . '" alt="' . $image_alt . '" class="wp-image-840" />';
            $image_html .= '</a>';
            $image_html .= '</figure>';
            $section_html .= $image_html;
        }

        #$section_html .= '<p>' . $section_paragraphs_intro . '</p>';
        foreach ($section_paragraphs as $paragraph) {
            $section_html .= '<p>' . $paragraph . '</p>';
        }

        $section_index++;
        
        $content .= $section_html;

    }

    //create the conclusion paragraph
    //check if the conclusion_paragraphs section is not empty or even exists
    $conclusion = '';
    if ($post_conclusion != '') {
        $conclusion = '<h2>'. $conclusion_title_text .'</h2>';
        $conclusion .= '<p>' . $post_conclusion . '</p>';
        $content .= $conclusion;
    }
        
 
    if (array_key_exists('qanda', $asin_json_res)) {
        $faqs = $asin_json_res['qanda'];
        if ($faqs != '') {
            //make a for loop to loop through the faqs
            $faqs_html = '<h2>'. $qanda_title_text .'</h2>';
            foreach ($faqs as $faq) {
                $faqs_html .= '<p><b>'. $question_title_text .' </b>' . $faq['question'] . '</p>';
                $faqs_html .= '<p><b>'. $answer_title_text .' </b>' . $faq['answer'] . '</p>';
            }

            $content .= $faqs_html;
        }
    }


    //create the similer posts
    if ($similar_post_ids != null) {
        //echo "selected_similar_post_ids: " . $similar_post_ids . "<br>";
        $similar_posts_html = '<h2>' . $read_also_title_text .'</h2>';
        #splait the selected_similar_post_ids string into array of ids by comma
        $similar_post_ids_array = explode(',', $similar_post_ids);

        foreach ($similar_post_ids_array as $similar_post_id) {
            //echo "similar_post_id: " . $similar_post_id . "<br>";

            $similar_post = get_post($similar_post_id);

            //echo "similar_post: " . $similar_post . "<br>";

            #check if the post is not null
            if ($similar_post != null) {
                #check if the post has a title
                if ($similar_post->post_title != '') {
                    $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
                }
            }
        }
        $content .= $similar_posts_html;
    }  




     //add the post categories
    //check if the wordpress_categories section is not empty or even exists
    $post_categories = "";
    $post_categories_array = array();
    if (array_key_exists('wordpress_categories', $asin_json_res)) {
        $post_categories = $asin_json_res['wordpress_categories'];
        $post_categories_array = array();
        if ($post_categories != '') {
            $post_categories_array = explode(',', $post_categories);
        }
    }
     
    



    
    $post_id = wp_insert_post(
        array(
            'post_title' => $post_title,
            'post_excerpt' => $meta_description,
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'post'
        )
    );


    //check if the post_categories_array is not empty
    //if it is not empty, then set the post categories
    if ($connect_categories == "yes") {
        if (!empty($post_categories_array)) {
            wp_set_post_categories($post_id, $post_categories_array);
        }
    }



    //insert post tags
    //check if the $asin_json has post_tags
    //if it does, then implode the array into a string
    //then set the post tags
    if ($create_tags == "yes") {
        $post_tags = array();
        if (array_key_exists('seo_tags', $asin_json_res)) {
            $post_tags = $asin_json_res['seo_tags'];
            //get only the first 4 tags
            //check if the array has more than 4 tags
            //if it does, then slice the array to only 4 tags
            //then implode the array into a string
            if (count($post_tags) > 4) {
                $post_tags = array_slice($post_tags, 0, 4);
            }

            if (count($post_tags) > 0) {
                $post_tags = implode(',', $post_tags);
                wp_set_post_tags($post_id, $post_tags);
            }
        }
    }
    





    update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);
    if ($focus_keyphrase == "-") {
        $focus_keyphrase = "";
    }
    if ($product_keyphrase = "") {
        $product_keyphrase = "";
    }
    else
    {
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$focus_keyphrase);
    }
    
     

    if ($post_featured_image != '') {
        $attachment_id = gizzmo_ai_attach_image_file($post_featured_image, $post_id);
        set_post_thumbnail($post_id, $attachment_id);
    }


   



    //make a post request to the api to save the new post data to the database
    $order = 1;
    $post_data = array(
        'post_id' => $post_id,
        'type' => 'listicle',
        'order' => $order,
        'asins' => $asins_array,
        'title' => $post_title,
        'generative_template_id' => '1',
        'website_id' => $website_id,


    );
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_content_for_website';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);


    

    #}



}









function gizzmo_ai_make_post_json_request($url, $data) {
    $response = wp_remote_post($url, array(
        'method' => 'POST',
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
        'body' => wp_json_encode($data),
        'timeout' => 180,
        'redirection' => 10,
        'httpversion' => '1.1',
    ));

    // Check for errors and return the response
    if (is_wp_error($response)) {
        return $response->get_error_message();
    } else {
        return wp_remote_retrieve_body($response);
    }
}

function gizzmo_ai_read_file($file_name)
{
    $file = fopen($file_name, "r");
    $content = fread($file, filesize($file_name));
    fclose($file);
    return $content;
}
function gizzmo_ai_replace_content($content, $array)
{
    foreach ($array as $key => $value) {
        $content = str_replace($key, $value, $content);
    }
    return $content;
}
function gizzmo_ai_attach_image_file($imageurl, $post_id)
{
    $image_data = gizzmo_ai_download_image_data($imageurl);

    $uniq_name = date('dmY') . '' . (int) microtime(true);
    $filename_webp = $uniq_name . '.webp';
    $uploaddir = wp_upload_dir();
    $uploadfile = $uploaddir['path'] . '/' . $filename_webp;

    
    //try to convert the image to webp add a try catch block

    try {
        // Check if the function imagewebp() exists
        if(function_exists('imagewebp')) {
            // The function exists, safe to use.
            gizzmo_ai_hs_jpg2webp(imagecreatefromstring($image_data), $uploadfile);
        } else {
            // The function does not exist. use regular image
            $ext = pathinfo($imageurl, PATHINFO_EXTENSION);
            $filename = $uniq_name . $ext;
            $uploadfile = $uploaddir['path'] . '/' . $filename;
        }
    } catch (Exception $e) {
         // The function does not exist. use regular image
         $ext = pathinfo($imageurl, PATHINFO_EXTENSION);
         $filename = $uniq_name . $ext;
         $uploadfile = $uploaddir['path'] . '/' . $filename;
    }


    


    


    #$imagetype = end(explode('/', getimagesize($destination_file_folder)['mime']));

    #$uniq_name = date('dmY').''.(int) microtime(true); 
    #$filename = $uniq_name.'.'.$imagetype;


    #$uploaddir = wp_upload_dir();
    #$uploadfile = $uploaddir['path'] . '/' . $filename;



    // Create a stream context with custom options
    $options = [
        "http" => [
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0\r\n"
        ]
    ];

    $context = stream_context_create($options);

    $contents = file_get_contents($imageurl, false, $context);

    if ($contents === FALSE) {
        echo "Failed to fetch the contents.";
    } else {
        #echo "Contents fetched successfully.";
    }

    




    $savefile = fopen($uploadfile, 'w');
    fwrite($savefile, $contents);
    fclose($savefile);


    $wp_filetype = wp_check_filetype(basename($filename_webp), null);
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => $filename_webp,
        'post_content' => '',
        'post_status' => 'inherit'
    );

    $attach_id = wp_insert_attachment($attachment, $uploadfile, $post_id);
    $imagenew = get_post($attach_id);
    $fullsizepath = get_attached_file($imagenew->ID);
    $attach_data = wp_generate_attachment_metadata($attach_id, $fullsizepath);
    wp_update_attachment_metadata($attach_id, $attach_data);

    return $attach_id;

    
}
function gizzmo_ai_hs_jpg2webp($image, $destination_file, $compression_quality = 100)
{
    $result = imagewebp($image, $destination_file, $compression_quality);
    if (false === $result) {
        return false;
    }
    imagedestroy($image);
    return $destination_file;
}
function gizzmo_ai_download_image_data($imageurl) {
    $response = wp_remote_get($imageurl, array(
        'timeout' => 60,
    ));

    // Check for errors
    if (is_wp_error($response)) {
        return $response->get_error_message();
    } else {
        return wp_remote_retrieve_body($response);
    }
}
function gizzmo_ai_get_tld($domain) {

    $array = parse_url($domain);

    return $array["host"];
}







function gizzmo_ai_get_new_article_text($website_id, $asin)
{
    #get product article  from gizzmo api
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_analyzed_asin_data/' . $website_id . ',' . $asin;
    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);
    $asin_json = $asin_json_res['data'];

    $post_title_text = $asin_json['title'];
    $post_meta_description_text = $asin_json['meta_description'];
    
    $introduction_paragraphs = $asin_json['introduction_paragraphs'];
    $introduction_paragraphs_text = '';
    foreach ($introduction_paragraphs as $paragraph) {
        $introduction_paragraphs_text .= ' ' . $paragraph ;
    }


    $personal_experience = $asin_json['personal_experience_paragraphs'];
    $personal_experience_text = '';
    foreach ($personal_experience as $paragraph) {
        $personal_experience_text .= ' ' . $paragraph;
    }


    $conclusion_paragraphs = $asin_json['conclusion_paragraphs'];
    $conclusion_paragraphs_text = '';
    foreach ($conclusion_paragraphs as $paragraph) {
        $conclusion_paragraphs_text .= ' ' . $paragraph;
    }

    $sections = $asin_json['sections'];
    $section_text = '';
    foreach ($sections as $section) {
        $section_text .= ' ' . $section['title'];
        $section_text .= ' ' . $section['text'];
    }

    $related_items = $asin_json['related_items'];
    $similar_items = $asin_json['similar_items'];
    $compered_items = $asin_json['compered_items'];

    #echo 'related_items: ' . count($related_items) . '<br>';
    #echo 'similar_items: ' . count($similar_items) . '<br>';
    #echo 'compered_items: ' . count($compered_items) . '<br>';

    
     
    #echo 'post_title_text: ' . $post_title_text . '<br>';

    $new_article_text = $post_title_text; #. ' ' . $post_meta_description_text . ' ' . $introduction_paragraphs_text . ' ' . $personal_experience_text . ' ' . $section_text . ' ' . $conclusion_paragraphs_text;
    #$new_article_text = $post_title_text . ' ' . $post_meta_description_text . ' ' . $introduction_paragraphs_text . ' ' . $personal_experience_text . ' ' . $section_text . ' ' . $conclusion_paragraphs_text;
    $new_article_text = strtolower($new_article_text);

    $unwanted_words = array('.', ',', '"', "'", '?', '!', ':', ';', '(', ')', '[', ']', '{', '}','-','&','%',"'s","'re",'credit','amazon','com','buy at amazon','amazon.com','review','deal','roudnup','collection','gizzmo_img_','position','relative','46px','zindex','backgroundcolor','100000','#33333373','#fff','fontsize','12px','paddingleft','10px','width');
    $new_article_text_cleened = str_replace($unwanted_words, "", $new_article_text);

    $res = [];
    $res['new_article_text_cleened'] = $new_article_text_cleened;
    $res['related_items'] = count($related_items);
    $res['similar_items'] = count($similar_items);
    $res['compered_items'] = count($compered_items);

    return $res;

}

function gizzmo_ai_sanitize_array($data) {
    // Ensure $data is an array
    if (!is_array($data)) {
        return $data; // Return the data unchanged if it's not an array
    }

    // Sanitize each element in the array using sanitize_text_field
    $sanitized_data = array_map('sanitize_text_field', $data);

    return $sanitized_data;
}


function get_thematic_concepts_list_from_text($full_text, $content_type)
{
    //fill $data with the data to send
    //it will hold the full text and the content type
    $data = array(
        'full_text' => $full_text,
        'content_type' => $content_type
    );

    $url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_thematic_concepts_list';
    $response = wp_remote_post($url, array(
        'method' => 'POST',
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
        'body' => wp_json_encode($data),
        'timeout' => 180,
        'redirection' => 10,
        'httpversion' => '1.1',
    ));

    // Check for errors and return the response
    if (is_wp_error($response)) {
        return $response->get_error_message();
    } else {
        return wp_remote_retrieve_body($response);
    }
}


#listicle_form


#after the review click or other button in the products list
if ( current_user_can( 'manage_options' ) && isset($_POST['create_review'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'gizzmo' ) ) {

    // $asin =  array_keys( gizzmo_ai_sanitize_array($_POST['create_review']))[0];
    $asin = sanitize_text_field( array_keys($_POST['create_review'])[0] );

    $product_name = sanitize_text_field($_POST['product_name_' . $asin]);
    $product_img_url = sanitize_text_field($_POST['img_url_' . $asin]);
    $website_id = absint( sanitize_text_field($_POST['websiteid_' . $asin]) );

    get_update_website_categories($website_id);
    
    $res = gizzmo_ai_get_new_article_text($website_id, $asin);
    $new_article_text = $res['new_article_text_cleened'];

    $thematic_concepts_list = get_thematic_concepts_list_from_text($new_article_text, 'review');
    //convert the json to an array
    $thematic_concepts_list = json_decode($thematic_concepts_list, true);
    







    if ($res['related_items'] > 0) {
        $product_caruosel_obj->related_items = $res['related_items'];
    }

    if ($res['similar_items'] > 0) {
        $product_caruosel_obj->similar_items = $res['similar_items'];
    }

    if ($res['compered_items'] > 0) {
        $product_caruosel_obj->compered_items = $res['compered_items'];
    }


    #go over last 100 posts and get the text and title of each post
    $args = array(
        'posts_per_page' => 100,
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $posts = get_posts($args);
    $posts_text = '';
    $posts_titles = '';
    
    
    $commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
    $commonWords2 = array('a', 'about', 'above', 'after', 'again', 'against', 'all', 'am', 'an', 'and', 'any', 'are', 'aren\'t', 'as', 'at', 'be', 'because', 'been', 'before', 'being', 'below', 'between', 'both', 'but', 'by', 'can\'t', 'cannot', 'could', 'couldn\'t', 'did', 'didn\'t', 'do', 'does', 'doesn\'t', 'doing', 'don\'t', 'down', 'during', 'each', 'few', 'for', 'from', 'further', 'had', 'hadn\'t', 'has', 'hasn\'t', 'have', 'haven\'t', 'having', 'he', 'he\'d', 'he\'ll', 'he\'s', 'her', 'here', 'here\'s', 'hers', 'herself', 'him', 'himself', 'his', 'how', 'how\'s', 'i', 'i\'d', 'i\'ll', 'i\'m', 'i\'ve', 'if', 'in', 'into', 'is', 'isn\'t', 'it', 'it\'s', 'its', 'itself', 'let\'s', 'me', 'more', 'most', 'mustn\'t', 'my', 'myself', 'no', 'nor', 'not', 'of', 'off', 'on', 'once', 'only', 'or', 'other', 'ought', 'our', 'ours', 'ourselves', 'out', 'over', 'own', 'same', 'shan\'t', 'she', 'she\'d', 'she\'ll', 'she\'s', 'should', 'shouldn\'t', 'so', 'some', 'such', 'than', 'that', 'that\'s', 'the', 'their', 'theirs', 'them', 'themselves', 'then', 'there', 'there\'s', 'these', 'they', 'they\'d', 'they\'ll', 'they\'re', 'they\'ve', 'this', 'those', 'through', 'to', 'too', 'under', 'until');
    $adjactiveWords = array('lazy', 'light', 'lively', 'lonely', 'long', 'lovely', 'lucky', 'magnificent', 'misty', 'modern', 'motionless', 'muddy', 'mushy', 'mysterious', 'nasty', 'naughty', 'nervous', 'nice', 'nutty', 'obedient', 'obnoxious', 'odd', 'old-fashioned', 'open', 'outrageous', 'outstanding', 'panicky', 'perfect', 'plain', 'pleasant', 'poised', 'poor', 'powerful', 'precious', 'prickly', 'proud', 'putrid', 'puzzled', 'quaint', 'real', 'relieved', 'repulsive', 'rich', 'scary', 'selfish', 'shiny', 'shy', 'silly', 'sleepy', 'smiling', 'smoggy', 'sore', 'sparkling', 'splendid', 'spotless', 'stormy', 'strange', 'stupid', 'successful', 'super' );
    $adverbWords = array('absolutely','review', 'actually', 'affordable', 'admittedly', 'allegedly', 'apparently', 'arguably', 'basically', 'certainly', 'clearly', 'conceivably', 'consequently', 'definitely', 'desperately', 'doubtlessly', 'evidently', 'exactly', 'explicitly', 'extremely', 'factually', 'frankly', 'frequently', 'generally', 'honestly', 'honestly', 'incredibly', 'indeed', 'inexorably', 'invariably', 'irrefutably', 'literally', 'logically', 'mainly', 'maybe', 'merely', 'naturally', 'obviously', 'officially', 'perfectly', 'perhaps', 'plausibly', 'possibly', 'presumably', 'probably', 'purely', 'really', 'reasonably', 'relatively', 'remarkably', 'simply', 'solely', 'specifically', 'strictly', 'substantially', 'supposedly', 'surely', 'truly', 'ultimately', 'unambiguously', 'unarguably', 'unquestionably', 'unreservedly', 'utterly', 'virtually', 'well', 'widely', 'wonderfully', 'yes', 'yet' );  


    $new_article_text = preg_replace('/\b('.implode('|',$commonWords).')\b/','',strtolower($new_article_text));
    $new_article_text = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $new_article_text)));

            
    $new_article_text = preg_replace('/\b('.implode('|',$commonWords2).')\b/','',$new_article_text);
    $new_article_text = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $new_article_text)));

    $new_article_text = preg_replace('/\b('.implode('|',$adjactiveWords).')\b/','',$new_article_text);
    $new_article_text = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $new_article_text)));

    $new_article_text = preg_replace('/\b('.implode('|',$adverbWords).')\b/','',$new_article_text);
    $new_article_text = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $new_article_text)));


    foreach ($posts as $post) {
        if ($post->post_type == 'post') {

            $post_text = $post->post_content;
            $post_title = $post->post_title;
            $post_id = $post->ID;

            #$post_link = get_permalink( $post->ID )

            #$post_text_data = $post_title . ' ' . $post_text;
            $post_text_data = $post_title;

            $post_text_data = strtolower($post_text_data);
            $post_text_data = strip_tags($post_text_data);

            $unwanted_words = array('.', ',', '"', "'", '?', '!', ':', ';', '(', ')', '[', ']', '{', '}','-','&','%',"'s","'re",'credit','amazon','com','buy','at','amazon','amazon.com','review','deal','roudnup','collection','gizzmo_img_','position','relative','46px','zindex','backgroundcolor','100000','#33333373','#fff','fontsize','12px','paddingleft','10px','width');
            $post_text_data_cleened = str_replace($unwanted_words, "", $post_text_data);
            #run the text similarity function
            

            

            $post_text_data_cleened = preg_replace('/\b('.implode('|',$commonWords).')\b/','',strtolower($post_text_data_cleened));
            $post_text_data_cleened = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $post_text_data_cleened)));

            $post_text_data_cleened = preg_replace('/\b('.implode('|',$adjactiveWords).')\b/','',$post_text_data_cleened);
            $post_text_data_cleened = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $post_text_data_cleened)));



            
            #echo $post_text_data_cleened . '<br>';
            #echo '<br>';
            $cosin_similarity = gizzmo_ai_calculate_cosin_similarity($new_article_text ,$post_text_data_cleened);
            if ($cosin_similarity > 0.1) {
                #echo 'rank 1: ' . $post_title . ' ' . $cosin_similarity . '<br>';

                $sim_percent = similar_text($new_article_text, $post_text_data_cleened, $percent);

                #$sim_percent_2 = gizzmo_ai_string_similarity($new_article_text, $post_text_data_cleened);
                
                #add the similarity and the post title to an array

                #echo $post_title . ' ' . $percent . '<br>';

                #if ($similarity >= 0.1) {
                #echo 'rank 2: ' . $post_title . ' ' . $sim_percent_2  . ' COSIN ' . $cosin_similarity . '<br>';
                #}

                #add the similarity and the post title to an array
                if ($percent >= 20) {
                    $post_title_and_id = $post_id . '~' . $post_title;
                    #$similarity_array[$post_title_and_id] = $similarity;
                    $similarity_array[$post_title_and_id] = $percent;
                }
            }
            
            #if the similarity is above 50% then eco the post title and the similarity
            #if ($percent > 50) {
            #echo $post_title . ' ' . $similarity;
            #echo '<br>'; 
            #}
        }
    }

    #check if there are any similar posts
    if (count($similarity_array) > 0) {
         

        #sort the array by the similarity
        arsort($similarity_array);


        #echo the results
        $similar_posts_obj->asin = $asin;
        $similar_posts_obj->product_name = $product_name;
        $similar_posts_obj->product_img_url = $product_img_url;
        $similar_posts_obj->website_id = $website_id;
        $similar_posts_obj->type = 'review';
        foreach ($similarity_array as $key => $value) {

            #only if the similarity is 10% smaller than the first result add it to the array

            $first_result = reset($similarity_array);
            $first_result = $first_result * 0.5;

            if ($value >= $first_result) {

                $key = explode('~', $key);
                $id = $key[0];
                $title = $key[1];

                $myObj = new stdClass();
                $myObj->post_id = $id;
                $myObj->post_title = $title;
                $myObj->post_similarity = $value;

                $similar_posts_obj->similar_posts[] = $myObj;
            }
        }

        
    }
    else {
        #echo 'No similar posts';
        #echo the results
        $similar_posts_obj->asin = $asin;
        $similar_posts_obj->product_name = $product_name;
        $similar_posts_obj->product_img_url = $product_img_url;
        $similar_posts_obj->website_id = $website_id;
        $similar_posts_obj->type = 'review';
        $similar_posts_obj->similar_posts = array();
    }


    

}

if ( current_user_can( 'manage_options' ) && isset($_POST['save_review'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'gizzmo' ) ) {

    $asin = sanitize_text_field($_POST['asin']);
    $website_id = sanitize_text_field($_POST['website_id']);
    $task_type = sanitize_text_field($_POST['task_type']);
    $task_id = sanitize_text_field($_POST['task_id']);
    
    
     
    #echo 'task_type: ' . $task_type . '<br>';
    #in formats where there is no spaciphic asin, the asin is the task_id that is filled in the UI,
    #so the asin will be filled with the task_id and not the asin, so basicly the asin is the task_id

    if ($task_type == 'review') {
        gizzmo_ai_create_and_save_review_post($asin,$website_id);
    }
    elseif ($task_type == 'roundup') {
        gizzmo_ai_create_and_save_roundup_post($asin,$website_id);
    }
    elseif ($task_type == 'comparison') {
        gizzmo_ai_create_and_save_comparison_post($asin,$website_id);
    }
    elseif ($task_type == 'general') {
        gizzmo_ai_create_and_save_general_post($task_id,$website_id);
    }
    elseif ($task_type == 'listicle') {
        gizzmo_ai_create_and_save_listicle_post($task_id,$website_id);
    }



    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/move_task_to_archive/' . $task_id;
    $res = gizzmo_ai_make_get_request($enpoint_url);


}






if ( current_user_can( 'manage_options' ) && isset($_POST['insert'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'gizzmo' ) ) {

    //check if the $_POST contains the action_type field
    if (isset($_POST['action_type'])) {
        $action_type = sanitize_text_field($_POST['action_type']);
    }
    else {
        $action_type = sanitize_text_field($_POST['listicle_action_type']);
    }

    
   
      
   
    
    if ($action_type == 'product_roundup') {

        $asins = sanitize_text_field($_POST['roundups_asins']);
        $website_id = absint( sanitize_text_field($_POST['website_id']) );
        $product_keyphrase = sanitize_text_field($_POST['product_review_seo_keyword']);
        //remove ' from the keyphrase
        $product_keyphrase = str_replace("'", "", $product_keyphrase);
        if ($product_keyphrase == '') {
            $product_keyphrase = '-';
        }
        
        $language = sanitize_text_field($_POST['language_selected']);

        $package_type = sanitize_text_field($_POST['package_type']);

        $asins_array = explode(',', $asins);

        //remove empty values
        $asins_array = array_filter($asins_array, function ($value) {
            return $value !== ''; });
        
        
        //echo 'roundup';
        $asin_affiliate_tag = sanitize_text_field($_POST['product_review_affiliate_tag_slct']);

        $featured_image = sanitize_text_field($_POST['featured_image']);
        
        //echo "asins: " . $asins . "<br>";
        //echo "website_id: " . $website_id . "<br>";
        //echo "asin_affiliate_tag: " . $asin_affiliate_tag . "<br>";
        //echo "product_keyphrase: " . $product_keyphrase . "<br>";
        //echo "package_type: " . $package_type . "<br>";
        //echo "featured_image: " . $featured_image . "<br>";

        //return;
        $create_ai_images = 'no';
        if (isset($_POST['roundup_listicle_create_ai_images'])) {
            $create_ai_images = sanitize_text_field($_POST['roundup_listicle_create_ai_images']);
            if ($create_ai_images == 'on') {
                $create_ai_images = 'yes';
            }
            else {
                $create_ai_images = 'no';
            }
        }
        else {
            $create_ai_images = 'no';
        }


        
        //additions for the free package ==============

        //create_tags
        $create_tags = 'no';
        if (isset($_POST['create_tags'])) {
            $create_tags = sanitize_text_field($_POST['create_tags']);
            if ($create_tags == 'on') {
                $create_tags = 'yes';
            }
            else {
                $create_tags = 'no';
            }
        }
        else {
            $create_tags = 'no';
        }

        //connect_categories
        $connect_categories = 'no';
        if (isset($_POST['connect_categories'])) {
            $connect_categories = sanitize_text_field($_POST['connect_categories']);
            if ($connect_categories == 'on') {
                $connect_categories = 'yes';
            }
            else {
                $connect_categories = 'no';
            }
        }
        else {
            $connect_categories = 'no';
        }

        //create_faqs
        $create_faqs = 'no';
        if (isset($_POST['create_faqs'])) {
            $create_faqs = sanitize_text_field($_POST['create_faqs']);
            if ($create_faqs == 'on') {
                $create_faqs = 'yes';
            }
            else {
                $create_faqs = 'no';
            }
        }
        else {
            $create_faqs = 'no';
        }

        //create_pros_cons
        $create_pros_cons = 'no';
        if (isset($_POST['roundup_create_pros_cons'])) {
            $create_pros_cons = sanitize_text_field($_POST['roundup_create_pros_cons']);
            if ($create_pros_cons == 'on') {
                $create_pros_cons = 'yes';
            }
            else {
                $create_pros_cons = 'no';
            }
        }
        else {
            $create_pros_cons = 'no';
        }



        //create ratings and reviews
        $create_rating_reviews = 'no';
        if (isset($_POST['create_rating_reviews'])) {
            $create_rating_reviews = sanitize_text_field($_POST['create_rating_reviews']);
            if ($create_rating_reviews == 'on') {
                $create_rating_reviews = 'yes';
            }
            else {
                $create_rating_reviews = 'no';
            }
        }
        else {
            $create_rating_reviews = 'no';
        }


        //Display Products List
        $create_list_of_products = 'no';
        if (isset($_POST['create_list_of_products'])) {
            $create_list_of_products = sanitize_text_field($_POST['create_list_of_products']);
            if ($create_list_of_products == 'on') {
                $create_list_of_products = 'yes';
            }
            else {
                $create_list_of_products = 'no';
            }
        }
        else {
            $create_list_of_products = 'no';
        }


        //create_conclusion
        $create_conclusion = 'no';
        if (isset($_POST['create_conclusion'])) {
            $create_conclusion = sanitize_text_field($_POST['create_conclusion']);
            if ($create_conclusion == 'on') {
                $create_conclusion = 'yes';
            }
            else {
                $create_conclusion = 'no';
            }
        }
        else {
            $create_conclusion = 'no';
        }

     
        //olf function
        //gizzmo_ai_create_product_roundup_post($asins_array, $asin_affiliate_tag, $website_id, $product_keyphrase,$package_type,$featured_image,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion);

   
        
        $products_shared_features_list = "";
        $selected_similar_post_ids = "";
        $selected_carousels = "";
        $create_schema = "";
        $carousel_options = "";
        $selected_thematic_concept = "";
        $task_type = "roundup";
        
        $selected_topic = "";

        $selected_listicle_title = "";
        $expected_sections_number = "";
        //$create_ai_images = "no";
        $create_images_placeholder = "no";
        $listicle_paragraphes_list = "";
        
        gizzmo_insert_content_task($task_type, $asins, $asin_affiliate_tag, $website_id, $selected_similar_post_ids, $product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$carousel_options,$selected_thematic_concept,$products_shared_features_list,$selected_topic,$selected_listicle_title,$expected_sections_number,$create_ai_images,$create_images_placeholder,$create_rating_reviews,$create_list_of_products,$listicle_paragraphes_list,$language);



    }
    else if ($action_type == 'comparison') {

        $asins = sanitize_text_field($_POST['comparison_asins']);
        $website_id = absint( sanitize_text_field($_POST['website_id']) );
        $product_keyphrase = sanitize_text_field($_POST['product_review_seo_keyword']);
        $selected_similar_post_ids = sanitize_text_field($_POST['selected_similar_post_ids']);

        $language = sanitize_text_field($_POST['language_selected']);
        //remove ' from the keyphrase
        $product_keyphrase = str_replace("'", "", $product_keyphrase);
        if ($product_keyphrase == '') {
            $product_keyphrase = '-';
        }

        $package_type = sanitize_text_field($_POST['package_type']);

        //$asins_array = explode(',', $asins);

        //remove empty values
        //$asins_array = array_filter($asins_array, function ($value) {
            //return $value !== ''; });
        
        
        //echo 'roundup';
        $asin_affiliate_tag = sanitize_text_field($_POST['product_review_affiliate_tag_slct']);

        $featured_image = sanitize_text_field($_POST['featured_image']);
        
        //additions for the free package ==============

        //create_tags
        $create_tags = 'no';
        if (isset($_POST['create_tags'])) {
            $create_tags = sanitize_text_field($_POST['create_tags']);
            if ($create_tags == 'on') {
                $create_tags = 'yes';
            }
            else {
                $create_tags = 'no';
            }
        }
        else {
            $create_tags = 'no';
        }

        //connect_categories
        $connect_categories = 'no';
        if (isset($_POST['connect_categories'])) {
            $connect_categories = sanitize_text_field($_POST['connect_categories']);
            if ($connect_categories == 'on') {
                $connect_categories = 'yes';
            }
            else {
                $connect_categories = 'no';
            }
        }
        else {
            $connect_categories = 'no';
        }

        //create_faqs
        $create_faqs = 'no';
        if (isset($_POST['create_faqs'])) {
            $create_faqs = sanitize_text_field($_POST['create_faqs']);
            if ($create_faqs == 'on') {
                $create_faqs = 'yes';
            }
            else {
                $create_faqs = 'no';
            }
        }
        else {
            $create_faqs = 'no';
        }

        //create_pros_cons
        $create_pros_cons = 'no';
        if (isset($_POST['create_pros_cons'])) {
            $create_pros_cons = sanitize_text_field($_POST['create_pros_cons']);
            if ($create_pros_cons == 'on') {
                $create_pros_cons = 'yes';
            }
            else {
                $create_pros_cons = 'no';
            }
        }
        else {
            $create_pros_cons = 'no';
        }

        //create_conclusion
        $create_conclusion = 'no';
        if (isset($_POST['create_conclusion'])) {
            $create_conclusion = sanitize_text_field($_POST['create_conclusion']);
            if ($create_conclusion == 'on') {
                $create_conclusion = 'yes';
            }
            else {
                $create_conclusion = 'no';
            }
        }
        else {
            $create_conclusion = 'no';
        }


        //create caruosels
        $selected_carousels = sanitize_text_field($_POST['selected_carousels']);
        $carousel_options = 'on';  
        if (isset($_POST['carousel_options'])) {
            $carousel_options = sanitize_text_field($_POST['carousel_options']);
            if ($carousel_options == 'on') {
                $carousel_options = 'yes';
            }
            else {
                $carousel_options = 'no';
            }
        }
        else {
            $carousel_options = 'no';
        }

       




        //get the products_shared_features_list from the post input
        $products_shared_features_list = sanitize_text_field($_POST['products_shared_features_list']);
        //get the selected_thematic_concept from the post input
        $selected_thematic_concept = sanitize_text_field($_POST['selected_thematic_concept']);




        



        //call a function gizzmo_ai_create_product_comparison_post

        //gizzmo_ai_create_product_comparison_post($asins_array, $asin_affiliate_tag, $website_id, $product_keyphrase,$package_type,$featured_image,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$selected_thematic_concept,$products_shared_features_list,$carousel_options,$selected_similar_post_ids);
        //gizzmo_ai_create_product_comparison_post($asins_array, , , ,,,,,,,,,$products_shared_features_list,,);

         
        $selected_topic = "";
        $create_schema = "";
        $task_type = "comparison";

        $selected_listicle_title = "";
        $expected_sections_number = "";
        $create_ai_images = "no";
        $create_images_placeholder = "no";
        $create_rating_reviews = "no";
        $create_list_of_products = "no";
        $listicle_paragraphes_list = "";

        gizzmo_insert_content_task($task_type, $asins, $asin_affiliate_tag, $website_id, $selected_similar_post_ids, $product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$carousel_options,$selected_thematic_concept,$products_shared_features_list,$selected_topic,$selected_listicle_title,$expected_sections_number,$create_ai_images,$create_images_placeholder,$create_rating_reviews,$create_list_of_products,$listicle_paragraphes_list,$language);
        
        //return;


        
        
        

    }
    else if ($action_type == 'general') {

        $website_id = absint( sanitize_text_field($_POST['website_id']) );
        $asin_affiliate_tag = sanitize_text_field($_POST['product_review_affiliate_tag_slct']);
        $selected_topic = sanitize_text_field($_POST['selected_topic']);
        $asins = sanitize_text_field($_POST['general_asins']);
        $product_keyphrase = sanitize_text_field($_POST['product_review_seo_keyword']);
         //remove ' from the keyphrase
        $product_keyphrase = str_replace("'", "", $product_keyphrase);

        $language = sanitize_text_field($_POST['language_selected']);

        $package_type = sanitize_text_field($_POST['package_type']);
        $featured_image = sanitize_text_field($_POST['featured_image']);
        //remove empty values
        //$asins_array = explode('-', $asins);
        //$asins_array = array_filter($asins_array, function ($value) {
        //    return $value !== ''; });
        if ($product_keyphrase == '') {
            $product_keyphrase = '-';
        }
        
        $selected_similar_post_ids = sanitize_text_field($_POST['selected_similar_post_ids']);
        
        $selected_carousels = sanitize_text_field($_POST['selected_carousels']);

        //additions for the free package ==============

        //create_tags
        $create_tags = 'no';
        if (isset($_POST['create_tags'])) {
            $create_tags = sanitize_text_field($_POST['create_tags']);
            if ($create_tags == 'on') {
                $create_tags = 'yes';
            }
            else {
                $create_tags = 'no';
            }
        }
        else {
            $create_tags = 'no';
        }

        //connect_categories
        $connect_categories = 'no';
        if (isset($_POST['connect_categories'])) {
            $connect_categories = sanitize_text_field($_POST['connect_categories']);
            if ($connect_categories == 'on') {
                $connect_categories = 'yes';
            }
            else {
                $connect_categories = 'no';
            }
        }
        else {
            $connect_categories = 'no';
        }

        //create_faqs
        $create_faqs = 'no';
        if (isset($_POST['create_faqs'])) {
            $create_faqs = sanitize_text_field($_POST['create_faqs']);
            if ($create_faqs == 'on') {
                $create_faqs = 'yes';
            }
            else {
                $create_faqs = 'no';
            }
        }
        else {
            $create_faqs = 'no';
        }

        //create_pros_cons
        $create_pros_cons = 'no';
        if (isset($_POST['create_pros_cons'])) {
            $create_pros_cons = sanitize_text_field($_POST['create_pros_cons']);
            if ($create_pros_cons == 'on') {
                $create_pros_cons = 'yes';
            }
            else {
                $create_pros_cons = 'no';
            }
        }
        else {
            $create_pros_cons = 'no';
        }

        //create_conclusion
        $create_conclusion = 'no';
        if (isset($_POST['create_conclusion'])) {
            $create_conclusion = sanitize_text_field($_POST['create_conclusion']);
            if ($create_conclusion == 'on') {
                $create_conclusion = 'yes';
            }
            else {
                $create_conclusion = 'no';
            }
        }
        else {
            $create_conclusion = 'no';
        }


        $create_schema = 'yes';
        //check if the create schema checkbox is checked
        if (isset($_POST['create_schema'])) {
            $create_schema = sanitize_text_field($_POST['create_schema']);
            if ($create_schema == 'on') {
                $create_schema = 'yes';
            }
            else {
                $create_schema = 'no';
            }
        }
        else {
            $create_schema = 'no';
        }

        //get themeatic concept
        $selected_thematic_concept = sanitize_text_field($_POST['selected_thematic_concept']);
        //remove , from the selected_thematic_concept
        $selected_thematic_concept = str_replace(',', '', $selected_thematic_concept);


        //echo 'general';
        //gizzmo_ai_create_general_post($asins, $asin_affiliate_tag, $website_id, $selected_topic, $product_keyphrase,$package_type,$post_featured_image,$create_tags,$connect_categories,$selected_similar_post_ids);

        $products_shared_features_list = "";
        $carousel_options = "";
        
         


        $task_type = "general";

        $selected_listicle_title = "";
        $expected_sections_number = "";
        $create_ai_images = "no";
        $create_images_placeholder = "no";
        $create_rating_reviews = "no";
        $create_list_of_products = "no";
        $listicle_paragraphes_list = "";

        gizzmo_insert_content_task($task_type, $asins, $asin_affiliate_tag, $website_id, $selected_similar_post_ids, $product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$carousel_options,$selected_thematic_concept,$products_shared_features_list,$selected_topic,$selected_listicle_title,$expected_sections_number,$create_ai_images,$create_images_placeholder,$create_rating_reviews,$create_list_of_products,$listicle_paragraphes_list,$language);
        

    }
    else if ($action_type == 'listicle') {

        $website_id = absint( sanitize_text_field($_POST['website_id_listicle']) );
        $product_keyphrase = sanitize_text_field($_POST['listicle_seo_keyword']);
        $product_keyphrase = str_replace("'", "", $product_keyphrase);
        $package_type = sanitize_text_field($_POST['package_type_listicle']);
        
        $language = sanitize_text_field($_POST['language']);
        
        $selected_listicle_title = sanitize_text_field($_POST['selected_listicle_title']);
        
        $selected_similar_post_ids = sanitize_text_field($_POST['selected_listicle_similar_post_ids']);
        
        $expected_sections_number = sanitize_text_field($_POST['expected_sections_number']);


        $listicle_paragraphes_list = sanitize_text_field($_POST['listicle_paragraphes_list']);



        //$selected_carousels = sanitize_text_field($_POST['selected_carousels']);

        //additions for the free package ==============


        //create_images_ai
        $create_ai_images = 'no';
        if (isset($_POST['listicle_create_ai_images'])) {
            $create_ai_images = sanitize_text_field($_POST['listicle_create_ai_images']);
            if ($create_ai_images == 'on') {
                $create_ai_images = 'yes';
            }
            else {
                $create_ai_images = 'no';
            }
        }
        else {
            $create_ai_images = 'no';
        }

        //create_images_placeholder
        $create_images_placeholder = 'no';
        if (isset($_POST['listicle_create_images_placeholders'])) {
            $create_images_placeholder = sanitize_text_field($_POST['listicle_create_images_placeholders']);
            if ($create_images_placeholder == 'on') {
                $create_images_placeholder = 'yes';
            }
            else {
                $create_images_placeholder = 'no';
            }
        }
        else {
            $create_images_placeholder = 'no';
        }



        //create_tags
        $create_tags = 'no';
        if (isset($_POST['create_listicle_tags'])) {
            $create_tags = sanitize_text_field($_POST['create_listicle_tags']);
            if ($create_tags == 'on') {
                $create_tags = 'yes';
            }
            else {
                $create_tags = 'no';
            }
        }
        else {
            $create_tags = 'no';
        }

        //connect_categories
        $connect_categories = 'no';
        if (isset($_POST['create_listicle_tags'])) {
            $connect_categories = sanitize_text_field($_POST['create_listicle_tags']);
            if ($connect_categories == 'on') {
                $connect_categories = 'yes';
            }
            else {
                $connect_categories = 'no';
            }
        }
        else {
            $connect_categories = 'no';
        }

        //create_faqs
        $create_faqs = 'no';
        if (isset($_POST['listicle_create_faqs'])) {
            $create_faqs = sanitize_text_field($_POST['listicle_create_faqs']);
            if ($create_faqs == 'on') {
                $create_faqs = 'yes';
            }
            else {
                $create_faqs = 'no';
            }
        }
        else {
            $create_faqs = 'no';
        }

        //create_pros_cons
        $create_pros_cons = 'no';
        if (isset($_POST['listicle_create_pros_cons'])) {
            $create_pros_cons = sanitize_text_field($_POST['listicle_create_pros_cons']);
            if ($create_pros_cons == 'on') {
                $create_pros_cons = 'yes';
            }
            else {
                $create_pros_cons = 'no';
            }
        }
        else {
            $create_pros_cons = 'no';
        }

        //create_conclusion
        $create_conclusion = 'no';
        if (isset($_POST['listicle_create_conclusion'])) {
            $create_conclusion = sanitize_text_field($_POST['listicle_create_conclusion']);
            if ($create_conclusion == 'on') {
                $create_conclusion = 'yes';
            }
            else {
                $create_conclusion = 'no';
            }
        }
        else {
            $create_conclusion = 'no';
        }


        $create_schema = 'yes';
        


        $task_type = "listicle";

        

        $product_keyphrase  = str_replace("%20", " ", $product_keyphrase);
        $asins = "";
        $asin_affiliate_tag = "";
        $selected_carousels = "";
        $carousel_options = "no";
        $selected_thematic_concept = "";
        $products_shared_features_list = "";
        $selected_topic = "";
        $featured_image = "https://placehold.co/600x400/png?text=Featured%20Image";
        $create_rating_reviews = "no";
        $create_list_of_products = "no";

         
        gizzmo_insert_content_task($task_type, $asins, $asin_affiliate_tag, $website_id, $selected_similar_post_ids, $product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$carousel_options,$selected_thematic_concept,$products_shared_features_list,$selected_topic,$selected_listicle_title,$expected_sections_number,$create_ai_images,$create_images_placeholder,$create_rating_reviews,$create_list_of_products,$listicle_paragraphes_list,$language);
        

    }
    else {
        //echo 'review';

        $asin = sanitize_text_field($_POST['product_review_asin']);
        $website_id = absint( sanitize_text_field($_POST['website_id']) );
        $asin_affiliate_tag = sanitize_text_field($_POST['product_review_affiliate_tag_slct']);
        $selected_similar_post_ids = sanitize_text_field($_POST['selected_similar_post_ids']);
        $product_keyphrase = sanitize_text_field($_POST['product_review_seo_keyword']);
        //remove ' from the keyphrase
        $product_keyphrase = str_replace("'", "", $product_keyphrase);

        $language = sanitize_text_field($_POST['language_selected']);


        $selected_carousels = sanitize_text_field($_POST['selected_carousels']);
        $carousel_options = 'on';  
        if (isset($_POST['carousel_options'])) {
            $carousel_options = sanitize_text_field($_POST['carousel_options']);
            if ($carousel_options == 'on') {
                $carousel_options = 'yes';
            }
            else {
                $carousel_options = 'no';
            }
        }
        else {
            $carousel_options = 'no';
        }


 
        

        $package_type = sanitize_text_field($_POST['package_type']);

        $featured_image = sanitize_text_field($_POST['featured_image']);

        if ($asin_affiliate_tag == '' || $asin_affiliate_tag == 'none') {
            $asin_affiliate_tag = '#';
        }


        $create_schema = 'yes';
        //check if the create schema checkbox is checked
        if (isset($_POST['create_schema'])) {
            $create_schema = sanitize_text_field($_POST['create_schema']);
            if ($create_schema == 'on') {
                $create_schema = 'yes';
            }
            else {
                $create_schema = 'no';
            }
        }
        else {
            $create_schema = 'no';
        }


        
        //additions for the free package ==============

        //create_tags
        $create_tags = 'no';
        if (isset($_POST['create_tags'])) {
            $create_tags = sanitize_text_field($_POST['create_tags']);
            if ($create_tags == 'on') {
                $create_tags = 'yes';
            }
            else {
                $create_tags = 'no';
            }
        }
        else {
            $create_tags = 'no';
        }

        //connect_categories
        $connect_categories = 'no';
        if (isset($_POST['connect_categories'])) {
            $connect_categories = sanitize_text_field($_POST['connect_categories']);
            if ($connect_categories == 'on') {
                $connect_categories = 'yes';
            }
            else {
                $connect_categories = 'no';
            }
        }
        else {
            $connect_categories = 'no';
        }

        //create_faqs
        $create_faqs = 'no';
        if (isset($_POST['create_faqs'])) {
            $create_faqs = sanitize_text_field($_POST['create_faqs']);
            if ($create_faqs == 'on') {
                $create_faqs = 'yes';
            }
            else {
                $create_faqs = 'no';
            }
        }
        else {
            $create_faqs = 'no';
        }

        //create_pros_cons
        $create_pros_cons = 'no';
        if (isset($_POST['create_pros_cons'])) {
            $create_pros_cons = sanitize_text_field($_POST['create_pros_cons']);
            if ($create_pros_cons == 'on') {
                $create_pros_cons = 'yes';
            }
            else {
                $create_pros_cons = 'no';
            }
        }
        else {
            $create_pros_cons = 'no';
        }

        //create_conclusion
        $create_conclusion = 'no';
        if (isset($_POST['create_conclusion'])) {
            $create_conclusion = sanitize_text_field($_POST['create_conclusion']);
            if ($create_conclusion == 'on') {
                $create_conclusion = 'yes';
            }
            else {
                $create_conclusion = 'no';
            }
        }
        else {
            $create_conclusion = 'no';
        }
        
        //get themeatic concept
        $selected_thematic_concept = sanitize_text_field($_POST['selected_thematic_concept']);
        //remove , from the selected_thematic_concept
        $selected_thematic_concept = str_replace(',', '', $selected_thematic_concept);

        //old function
        //gizzmo_ai_create_product_review_post($asin, $asin_affiliate_tag, $website_id, $selected_similar_post_ids, $product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$carousel_options,$selected_thematic_concept);
        
       


        $selected_topic = "";
        $products_shared_features_list = "";
        $task_type = "review";

        $selected_listicle_title = "";
        $expected_sections_number = "";
        $create_ai_images = "no";
        $create_images_placeholder = "no";
        $create_rating_reviews = "no";
        $create_list_of_products = "no";
        $listicle_paragraphes_list = "";

        gizzmo_insert_content_task($task_type, $asin, $asin_affiliate_tag, $website_id, $selected_similar_post_ids, $product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$carousel_options,$selected_thematic_concept,$products_shared_features_list,$selected_topic,$selected_listicle_title,$expected_sections_number,$create_ai_images,$create_images_placeholder,$create_rating_reviews,$create_list_of_products,$listicle_paragraphes_list,$language);
        



    }
}


 
function get_update_website_categories($website_id)
{
    #after page load, check local storage for the date of the categories_saved_date and if it is older than 1 day, then update the categories_saved_date
    #if the categories_saved_date is older than 1 day, then update the categories
    #if the categories_saved_date is not older than 1 day, then do nothing
    #if the categories_saved_date is not set, then update the categories

    $categories_saved_date = get_option('categories_saved_date');
    $categories_saved_date = strtotime($categories_saved_date);
    $current_date = strtotime(date('Y-m-d H:i:s'));

    $date_diff = $current_date - $categories_saved_date;
    $date_diff = $date_diff / 60 / 60 / 24;

    if ($date_diff > 1 || $categories_saved_date == '' || $categories_saved_date == null) {
        #update the categories
        gizzmo_ai_get_post_categories($website_id);
        #echo 'update categories <br>';
        #save to local storage
        update_option('categories_saved_date', date('Y-m-d H:i:s'));
    }
    else {
        #do nothing
        #echo 'do nothing <br>';
    }

}










function gizzmo_ai_create_product_roundup_post($asins_array, $asin_affiliate_tag, $website_id,$focus_keyphrase,$package_type,$featured_image,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion)
{
    if ($connect_categories == 'yes') { 
        get_update_website_categories($website_id);
    }
    //echo 'gizzmo_ai_create_product_roundup_post';
    //echo $package_type;

    $asins = implode(',', $asins_array);
    $asins = str_replace(',', '-', $asins);


    $asins_array = array();
    $asins_array = explode('-', $asins);


    //echo $asins;

    //encode the white spaces in keyphrase
    $original_keyphrase = $focus_keyphrase;
    $focus_keyphrase = str_replace("'", "", $focus_keyphrase);
    $focus_keyphrase = str_replace(' ', '%20', $focus_keyphrase);

    if ($package_type == "Free")
    {
        $focus_keyphrase = '-';
        $original_keyphrase = '-';
    }
    
    
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_analyzed_asins_roundup_data/' . $website_id . ',' . $asins . ',' . $focus_keyphrase;

    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);

     
    if (isset($asin_json_res['status']) && $asin_json_res['status'] == 'error') {
        if (isset($asin_json_res['message'])) {
            echo esc_html($asin_json_res['message']);
        } else {
            #echo 'Error message is not set.';
        }
        return;
    }


    //echo $enpoint_url;

    // read the html file from html_parts folder
    $one_roundup_item_html = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/product_roundup.html');
    $roundup_style = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/roundup_css.txt');

    $content = '';


    



    if ($package_type == 'Enterprise') {
        $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
        $content = $gizzmo_enterprise . $content;
    }

    $gizzmo_div = "<form id='gizzmo_post_details_form' style='display:none'>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_post_id' id='form_gizzmo_post_id' value=''>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_website_id' id='form_gizzmo_website_id' value='". $website_id ."'>";
    $gizzmo_div .=  "</form>";

    $content = $gizzmo_div . $content;

    $post_title = $asin_json_res['Title'];
    $introduction = $asin_json_res['Introduction'];
    $meta_Description = $asin_json_res['Meta_Description'];

    $product_in_roundup = $asin_json_res['data'];

   #remove the www. from the source
   $asin_source_credit = str_replace('www.', '', $product['source']);
   #$source_site = str_replace('.com', '', $asin_source_credit);
   #$source_site = str_replace('.co.uk', '', $source_site);
   #make the first letter uppercase
   #$source_site = ucfirst($source_site);
    //$featured_image = "";

    $html ="";
    foreach ($product_in_roundup as $product) {
        
        //if ($featured_image== "") {
        //    $featured_image = $product['preview_image'];
        //}
        
        if ($product['source'] == "www.amazon.com" || $product['source'] == "www.amazon.co.uk") {
            $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;
        }
        elseif ($product['source'] == "www.walmart.com") {
            $AffiliateLink = "https://" . $product['source'] . "/ip/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;  
        }

         
        if ($package_type == "Free")
        {
            if ($product['source'] == "www.amazon.com" || $product['source'] == "www.amazon.co.uk") {
                $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'];
            }
            elseif ($product['source'] == "www.walmart.com") {
                $AffiliateLink = "https://" . $product['source'] . "/ip/" . $product['asin'];  
            }

            
        }

        $html .= "<div class='one_prod_item'>";
        $html .= "<img class='prod_item_list_img' src='" . $product['preview_image'] . "' />";
        $html .= "<div class='prod_item_list_texts'>";
        $html .= "<div class='prod_item_list_title'><a class='gizzmo_link' rel='nofollow' href='" . $AffiliateLink . "' target='_blank'>" . $product['product_name'] . "</a></div>";
        $html .= "<div class='prod_item_list_rating'>";
        $html .= "<span style='left: -96px;position: relative;top: 1px;'>" . $product['rating'] . "</span>";
        $html .= "<span class='main_raiting_count' style='margin-left: 15px;'>" . $product['reviews_count'] . " Ratings</span>";
        $html .= "<div class='stars-rating-main' style='--rating: " . $product['rating'] . ";float: left;top: 4.5px;left: 35px;'>";
        $html .= "<div class='rating'></div>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "<div class='prod_item_list_bt'>";
        $html .= "<a rel='nofollow' style='border: 1px solid #6c6a5c;' href='" . $AffiliateLink . "' target='_blank' class='wp-block-button__link small_bt gizzmo_link'>Buy On Amazon</a>";
        $html .= "</div>";
        $html .= "</div>";
    }

    $product_list_html = "<div class='products_list'>" . $html . "</div><br><br>";



    $content .= $product_list_html;

    $content .= '<p>' . $introduction . '</p>';



    #echo $asin_json_res['data'];

    #loop through the json asin_json_res and create a 
    

    foreach ($product_in_roundup as $product) {

        if ($product['source'] == "www.amazon.com" || $product['source'] == "www.amazon.co.uk") {
            $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;
        }
        elseif ($product['source'] == "www.walmart.com") {
            $AffiliateLink = "https://" . $product['source'] . "/ip/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;  
        }

        $reviews_link = "";
        if ($product['source'] == "www.amazon.com" || $product['source'] == "www.amazon.co.uk") {
            $reviews_link = "https://" . $product['source'] . "/product-reviews/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;
        }
        
        if ($package_type == "Free")
        {
            if ($product['source'] == "www.amazon.com" || $product['source'] == "www.amazon.co.uk") {
                $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'];
                $reviews_link = "https://" . $product['source'] . "/product-reviews/" . $product['asin'];
            }
            elseif ($product['source'] == "www.walmart.com") {
                $AffiliateLink = "https://" . $product['source'] . "/ip/" . $product['asin'];
            }
        }



        $conclusion_paragraphs = $product['conclusion_paragraphs'];
        $conclusion_paragraphs_html = '';
        foreach ($conclusion_paragraphs as $conclusion_paragraph) {
            $conclusion_paragraphs_html .= '<p>' . $conclusion_paragraph . '</p>';
        }

        $pros = $product['pros'];
        if (count($pros) > 0) {
            $pros_html = '<ul>';
            foreach ($pros as $pro) {
                $pros_html .= '<li>' . $pro . '</li>';
            }
            $pros_html .= '</ul>';
        } else {
            $pros_html = '';
        }

        $cons = $product['cons'];
        if (count($cons) > 0) {
            $cons_html = '<ul>';
            foreach ($cons as $con) {
                $cons_html .= '<li>' . $con . '</li>';
            }
            $cons_html .= '</ul>';
        } else {
            $cons_html = '';
        }


        if ($pros_html == '') {
            $item_html = str_replace('Pros:', '', $item_html);
        }
        if ($cons_html == '') {
            $item_html = str_replace('Cons:', '', $item_html);
        }


        $ranked_features = $product['product_rank_by_feature'];
        $ranked_features_html = '';
        foreach ($ranked_features as $ranked_feature) {
            $ranked_features_html .= '<div class="one_feaure_rank">';
            $ranked_features_html .= '<span class="feature_rank_title">' . $ranked_feature['feature'] . '</span>';
            $ranked_features_html .= '<div class="stars-rating" style="--rating: ' . $ranked_feature['rank'] . '; float: right; top: 5.5px">';
            $ranked_features_html .= '<div class="rating"></div>';
            $ranked_features_html .= '</div>';
            $ranked_features_html .= '<span class="feature_rank_number">' . $ranked_feature['rank'] . '</span>';
            $ranked_features_html .= '</div>';
        }
 
        $price = '$'. $product['price'];

        #check if the product has a preview image, if so, and it is the first product, then use it as the post featured image
        $item_html = $one_roundup_item_html;
        $item_html = str_replace('{{ShortName}}', $product['product_name'], $item_html);
        #$item_html = str_replace('{{Price}}', $price, $item_html);
        $item_html = str_replace('{{ImageSource}}', $product['preview_image'], $item_html);
        $item_html = str_replace('{{NumberOfRatings}}', $product['reviews_count'], $item_html);
        $item_html = str_replace('{{MainRating}}', $product['rating'], $item_html);
        $item_html = str_replace('{{ProductText}}', $conclusion_paragraphs_html, $item_html);
        $item_html = str_replace('{{Pros}}', $pros_html, $item_html);
        $item_html = str_replace('{{Cons}}', $cons_html, $item_html);
        $item_html = str_replace('{{FeaturesAndRatings}}', $ranked_features_html, $item_html);
        $item_html = str_replace('{{AffiliateLink}}', $AffiliateLink, $item_html);
        $item_html = str_replace('{{ReadReviewsAmazonLink}}', $reviews_link, $item_html);
        
        $content .= $item_html;
    }


    $content = $roundup_style . $content;


    #$product_in_roundup = $asin_json_res['Title'];


    
    //add the post categories
    $post_categories_array = array();
    $post_categories = $asin_json_res['wordpress_categories'];
    if ($post_categories != '') {
        $post_categories_array = explode(',', $post_categories);
    }


     

    $post_id = wp_insert_post(
        array(
            'post_title' => $post_title,
            'post_excerpt' => $meta_Description,
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'post'
        )
    );



    
    //check if the post_categories_array is not empty
    //if it is not empty, then set the post categories
    if ($connect_categories == "yes") {
        if (!empty($post_categories_array)) {
            wp_set_post_categories($post_id, $post_categories_array);
        }
    }
    
    //insert post tags
    //check if the $asin_json has post_tags
    //if it does, then implode the array into a string
    //then set the post 
    

    if ($create_tags == 'yes') {
        $post_tags = array();
        if (array_key_exists('seo_tags', $asin_json_res)) {
            $post_tags = $asin_json_res['seo_tags'];
            //get only the first 4 tags
            //check if the array has more than 4 tags
            //if it does, then slice the array to only 4 tags
            //then implode the array into a string
            if (count($post_tags) > 4) {
                $post_tags = array_slice($post_tags, 0, 4);
            }
            if (count($post_tags) > 0) {
                $post_tags = implode(',', $post_tags);
                wp_set_post_tags($post_id, $post_tags);
            }
        }
    }



    if ($focus_keyphrase == "-") {
        $focus_keyphrase = "";
    }
    if ($original_keyphrase == "-") {
        $original_keyphrase = "";
    }

    update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_Description);

    if ($package_type == "Free")
    {
        $focus_keyphrase = "";
        $original_keyphrase = "";
    }
    else
    {
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$original_keyphrase);
    }


    if ($featured_image != '')
    {
        $attachment_id = gizzmo_ai_attach_image_file($featured_image, $post_id);
        set_post_thumbnail($post_id, $attachment_id);
    }




    //make a post request to the api to save the new post data to the database
    $order = 1;
    $post_data = array(
        'post_id' => $post_id,
        'type' => 'roundup',
        'order' => $order,
        'asins' => $asins_array,
        'title' => $post_title,
        'generative_template_id' => '1',
        'website_id' => $website_id,


    );
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_content_for_website';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);



}
function gizzmo_ai_create_product_review_post($asin, $asin_affiliate_tag, $website_id, $selected_similar_post_ids,$product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$carousel_options,$selected_thematic_concept)
{


    if ($connect_categories == 'yes') {
        get_update_website_categories($website_id);
        //gizzmo_ai_get_post_categories($website_id);
    }
    
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_analyzed_asin_data/' . $website_id . ',' . $asin ;
    if ($product_keyphrase != '' && $selected_thematic_concept != '') {
        #replace all spaces with %20
        $product_keyphrase = str_replace("'", "", $product_keyphrase);
        $product_keyphrase = str_replace(' ', '%20', $product_keyphrase);
        $product_keyphrase = str_replace(',', '%20', $product_keyphrase);

        $selected_thematic_concept = str_replace("'", "", $selected_thematic_concept);
        $selected_thematic_concept = str_replace(' ', '%20', $selected_thematic_concept);
        $selected_thematic_concept = str_replace(',', '.', $selected_thematic_concept);

        $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_analyzed_asin_data_keyphrase_theme/' . $website_id . ',' . $asin . ',' . $product_keyphrase . ',' . $selected_thematic_concept;

        echo "both";
    }
    elseif ($product_keyphrase == '' && $selected_thematic_concept != '') {
        $selected_thematic_concept = str_replace("'", "", $selected_thematic_concept);
        $selected_thematic_concept = str_replace(' ', '%20', $selected_thematic_concept);
        $selected_thematic_concept = str_replace(',', '.', $selected_thematic_concept);
        $product_keyphrase = '-';
        $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_analyzed_asin_data_keyphrase_theme/' . $website_id . ',' . $asin . ',' . $product_keyphrase . ',' . $selected_thematic_concept;

        echo "theme";
        echo $enpoint_url;
    }
    elseif ($product_keyphrase != '') {
        #replace all spaces with %20
        $product_keyphrase = str_replace("'", "", $product_keyphrase);
        $product_keyphrase = str_replace(' ', '%20', $product_keyphrase);
        $product_keyphrase = str_replace(',', '%20', $product_keyphrase);
        $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_analyzed_asin_data_with_keyphrase_seo/' . $website_id . ',' . $asin . ',' . $product_keyphrase;

        echo "keyphrase";
    }

    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);

    if ($asin_json_res['status'] == 'error') {
        echo esc_html( $asin_json_res['message'] );
        return;
    }

    $asin_json = $asin_json_res['data'];

  
    $post_categories = $asin_json['wordpress_categories'];

    $post_title = $asin_json['title'];
    $meta_description = $asin_json['meta_description'];
    $post_featured_image = $asin_json['featured_image'];
    $asin_source = $asin_json['source'];
    #remove the www. from the source
    $asin_source_credit = str_replace('www.', '', $asin_source);
    #$source_site = str_replace('.com', '', $asin_source_credit);
    #$source_site = str_replace('.co.uk', '', $source_site);
    #make the first letter uppercase
    #$source_site = ucfirst($source_site);

    if ($asin_source == "www.amazon.com" ||$asin_source == "www.amazon.co.uk") {
        $asin_link = 'https://' . $asin_source . '/dp/' . $asin . '?tag=' . $asin_affiliate_tag;
    }
    elseif ($asin_source == "www.walmart.com") {
        $asin_link = 'https://' . $asin_source . '/ip/' . $asin . '?tag=' . $asin_affiliate_tag;  
    }



    
    if ($package_type == 'Free') {
        
        if ($asin_source == "www.amazon.com" ||$asin_source == "www.amazon.co.uk") {
            $asin_link = 'https://' . $asin_source . '/dp/' . $asin;
        }
        elseif ($asin_source == "www.walmart.com") {
            $asin_link = 'https://' . $asin_source . '/ip/' . $asin;  
        }
    }

    // read the html file from html_parts folder
    $content = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/product_review_default.html');



    //if ($package_type = 'Enterprise') {
    //    $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
    //    $content = $gizzmo_enterprise . $content;
    //}

    $gizzmo_div = "<form id='gizzmo_post_details_form' style='display:none'>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_post_id' id='form_gizzmo_post_id' value=''>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_website_id' id='form_gizzmo_website_id' value='". $website_id ."'>";
    $gizzmo_div .=  "</form>";

    $content = $gizzmo_div . $content;



    $introduction_paragraphs = $asin_json['introduction_paragraphs'];
    $introduction_paragraphs_html = '';
    foreach ($introduction_paragraphs as $paragraph) {
        $introduction_paragraphs_html .= '<p>' . $paragraph . '</p>';
    }
    $content = str_replace('{{Introduction}}', $introduction_paragraphs_html, $content);


    $personal_experience = $asin_json['personal_experience_paragraphs'];
    $personal_experience_html = '';
    foreach ($personal_experience as $paragraph) {
        $personal_experience_html .= '<p>' . $paragraph . '</p>';
    }
    $content = str_replace('{{Personal_Experience}}', $personal_experience_html, $content);


    
    if ($selected_similar_post_ids != null) {
        $similar_posts_html = '';
        #splait the selected_similar_post_ids string into array of ids by comma
        $selected_similar_post_ids = explode(',', $selected_similar_post_ids);

        foreach ($selected_similar_post_ids as $similar_post_id) {
            $similar_post = get_post($similar_post_id);
            $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
        }
        $content = str_replace('{{Similar_Posts_Title}}', '<h2>Read also:</h2>', $content);
        $content = str_replace('{{Similar_Posts}}', $similar_posts_html, $content);
    } else {
        $content = str_replace('{{Similar_Posts_Title}}', '', $content);
        $content = str_replace('{{Similar_Posts}}', '', $content);
    }


    if ($create_conclusion == 'yes') {
        $conclusion_paragraphs = $asin_json['conclusion_paragraphs'];
        $conclusion_paragraphs_html = '';
        $conclusion_title = '';
        foreach ($conclusion_paragraphs as $paragraph) {
            $paragraph = '<p>' . $paragraph . '</p>';
            $conclusion_paragraphs_html .= $paragraph;
        }

        if ($conclusion_title != '') {
            $conclusion_title = '<h2>' . $conclusion_title . '</h2>';
        }
        else
        {
            $conclusion_title = '<h2>Conclusion</h2>';
        }

        $content = str_replace('{{Conclusion_Title}}', $conclusion_title, $content);
        $content = str_replace('{{Conclusion_Text}}', $conclusion_paragraphs_html, $content);
    }
    else {
        $content = str_replace('{{Conclusion_Title}}', '', $content);
        $content = str_replace('{{Conclusion_Text}}', '', $content);
    }


    if ($create_pros_cons == 'yes') {
        $pros_list = $asin_json['pros'];
        $cons_list = $asin_json['cons'];

        $pros_found = false;
        $cons_found = false;
        if (count($pros_list) > 0 && count($cons_list) > 0) {
            $pros_list_html = '';
            foreach ($pros_list as $pros) {
                if ($pros != '') {
                    $pros_found = true;
                    $pros_list_html .= '<li>' . $pros . '</li>';
                }
            }
            if ($pros_found == true) {
                $content = str_replace('{{pros_list}}', $pros_list_html, $content);
            } else {
                $content = str_replace('<h2>Pros:</h2>', '', $content);
                $content = str_replace('{{pros_list}}', '', $content);
            }
            



            $cons_list_html = '';
            foreach ($cons_list as $cons) {
                if ($cons != '') {
                    $cons_found = true;
                    $cons_list_html .= '<li>' . $cons . '</li>';
                }
            }
            if ($cons_found == true) {
                $content = str_replace('{{cons_list}}', $cons_list_html, $content);
            } else {
                $content = str_replace('<h2>Cons:</h2>', '', $content);
                $content = str_replace('{{cons_list}}', '', $content);
            }

        } else {
            $content = str_replace('{{pros_list}}', '', $content);
            $content = str_replace('{{cons_list}}', '', $content);
            $content = str_replace('<h2>Pros:</h2>', '', $content);
            $content = str_replace('<h2>Cons:</h2>', '', $content);

        }
    }
    else {
        $content = str_replace('{{pros_list}}', '', $content);
        $content = str_replace('{{cons_list}}', '', $content);
        $content = str_replace('<h2>Pros:</h2>', '', $content);
        $content = str_replace('<h2>Cons:</h2>', '', $content);
    }


    if ($create_faqs == 'yes') {
        $questions_list = $asin_json['questions'];
        $answers_list = $asin_json['answers'];


        if (count($questions_list) > 0 && count($answers_list) > 0) {
            $qanda_list_html = '';
            $x = 0;
            do {
                $qanda_list_html .= '<p><b>Question: </b>' . $questions_list[$x] . '</p>';
                $qanda_list_html .= '<p><b>Answer: </b>' . $answers_list[$x] . '</p>';
                $x++;
            } while ($x <= 2);
            $content = str_replace('{{Questions_Answers}}', $qanda_list_html, $content);
        } else {
            $content = str_replace('{{Questions_Answers}}', '', $content);
            $content = str_replace('<h2>Questions & Answers:</h2>', '', $content);
        }
    }
    else {
        $content = str_replace('{{Questions_Answers}}', '', $content);
        $content = str_replace('<h2>Questions & Answers:</h2>', '', $content);
    }


    $focus_keyphrase = $asin_json['focus_keyphrase'];

    $content = str_replace('{{amazon_link_and_tag}}', $asin_link, $content);


    $sections = $asin_json['sections'];
    $section_html = '';
    $index = 0;


    foreach ($sections as $section) {


        $img_src = $section['image'];

        $section_html .= '<h2>' . $section['title'] . '</h2>';



        if ($img_src != '') {
            $section_html .= '<figure class="wp-block-image size-large">';
            $section_html .= '<a class="gizzmo_link" data-linktype="image" rel="nofollow" target="_blank" href="' . $asin_link . '">';

            if ($index < 5) {
                if ($focus_keyphrase != '') {
                    $section_html .= '<img decoding="async" src="' . $img_src . '" alt="' . $focus_keyphrase . '" class="wp-image-840" />';
                } else {
                    $section_html .= '<img decoding="async" src="' . $img_src . '" alt="' . $img_src . '" class="wp-image-840" />';
                }
            } else {
                $section_html .= '<img decoding="async" src="' . $img_src . '" alt="' . $img_src . '" class="wp-image-840" />';
            }
            
            $section_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">';
            $section_html .= 'Credit - ' . $asin_source_credit;
            $section_html .= '</div>';
            $section_html .= '</a>';
            $section_html .= '</figure>';
        }

        $section_html .= '<p>' . $section['text'] . '</p>';

        if ($index < 3) {
            $section_html .= '<div class="is-layout-flex wp-block-buttons">';
            $section_html .= '<div class="wp-block-button">';
            $section_html .= '<a class="gizzmo_link" data-linktype="button" rel="nofollow" class="wp-block-button__link" target="_blank" href="' . $asin_link . '">Buy On Amazon</a>';
            $section_html .= '</div>';
            $section_html .= '</div>';
        }

        $index++;
    }
    $content = str_replace('{{Dynamic_Text_Sections}}', $section_html, $content);

     
    $compered_items = $asin_json['compered_items'];
    $similar_items = $asin_json['similar_items'];
    $related_items = $asin_json['related_items'];

    #echo "selected_carousels: " . $selected_carousels . "<br>";

    #check if selected_carousels is not "" and not null
    #if it is, check if it has a comma, then split it into an array by comma
    #if it doesn't have a comma, then just make it an array with one element
    #if it is null or "", then set it to an empty array

    
    if ($selected_carousels != "" && $selected_carousels != null) {
        if (strpos($selected_carousels, ',') !== false) {
            $selected_carousels = explode(',', $selected_carousels);
        } else {
            $selected_carousels = array($selected_carousels);
        }
    } else {
        $selected_carousels = array();
    }

    


    #check if selected_carousels is not empty
    $carousel_top_filled = "false";
    $carousel_bottom_filled = "false";

    if ($package_type == 'Free') {
        $content = str_replace('{{Carousel_Top}}', '', $content);
        $content = str_replace('{{Carousel_Bottom}}', '', $content);
    }
    elseif ($carousel_options == 'no') {
        $content = str_replace('{{Carousel_Top}}', '', $content);
        $content = str_replace('{{Carousel_Bottom}}', '', $content);
    }
    else
    {
        
        if (!empty($selected_carousels)) {
            
        
            #loop through selected_carousels
            $compered_items_caruosel = "false";
            $similar_items_caruosel = "false";
            $related_items_caruosel = "false";
            foreach ($selected_carousels as $carousel_code) {

                if ($carousel_code == "compered_items")
                {
                    $compered_items_caruosel = "true";
                }

                if ($carousel_code == "similar_items")
                {
                    $similar_items_caruosel = "true";
                }

                if ($carousel_code == "related_items")
                {
                    $related_items_caruosel = "true";
                }
            }

            if ($compered_items_caruosel == "true") {
                $compered_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $asin .'&affid='. $asin_affiliate_tag .'&type=compered_items" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                $content = str_replace('{{Carousel_Top}}', $compered_items_iframe, $content);
                $carousel_top_filled = "true";
            } 
            
            if ($similar_items_caruosel == "true") {
                $similar_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $asin .'&affid='. $asin_affiliate_tag .'&type=similar_items" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                if ($carousel_top_filled == "false") {
                    $content = str_replace('{{Carousel_Top}}', $similar_items_iframe, $content);
                    $carousel_top_filled = "true";
                }
                else {
                    $content = str_replace('{{Carousel_Bottom}}', $similar_items_iframe, $content);
                    $carousel_bottom_filled = "true";
                }
            } 

            if ($related_items_caruosel == "true") {
                $related_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $asin .'&affid='. $asin_affiliate_tag .'&type=related_items" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                if ($carousel_top_filled == "false") {
                    $content = str_replace('{{Carousel_Top}}', $related_items_iframe, $content);
                    $carousel_top_filled = "true";
                }
                else {
                    $content = str_replace('{{Carousel_Bottom}}', $related_items_iframe, $content);
                    $carousel_bottom_filled = "true";
                }
            } 


        } else {
            $content = str_replace('{{Carousel_Top}}', '', $content);
            $content = str_replace('{{Carousel_Bottom}}', '', $content);
        }

        if ($carousel_bottom_filled == "false") {
            $content = str_replace('{{Carousel_Bottom}}', '', $content);
        }
        if ($carousel_top_filled == "false") {
            $content = str_replace('{{Carousel_Top}}', '', $content);
        }
    }
    
    





    //add a script to the end of the content
    
    
    
    
    //if meta description is longer than 160 characters, trim it to 160 characters
    if (strlen($meta_description) > 130) {
        $meta_description = substr($meta_description, 0, 127) . "...";
    }


    
    if ($connect_categories == "yes") {
        //add the post categories
        try {
            $post_categories_array = array();
            $post_categories = $asin_json['wordpress_categories'];
            if ($post_categories != '') {
                $post_categories_array = explode(',', $post_categories);
            }
        } catch (Exception $e) {
            $post_categories_array = array();
        }
    }
    else {
        $post_categories_array = array();
    }
    
    


    $post_id = wp_insert_post(
        array(
            'post_title' => $post_title,
            'post_excerpt' => $meta_description,
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'post'
        )
    );

    
    if ($connect_categories == "yes") {
        //check if the post_categories_array is not empty
        //if it is not empty, then set the post categories
        if (!empty($post_categories_array)) {
            wp_set_post_categories($post_id, $post_categories_array);
        }
    }
    
    
    
    if ($create_tags == "yes") {    
        //insert post tags
        //check if the $asin_json has post_tags
        //if it does, then implode the array into a string
        //then set the post tags
        $post_tags = array();
        if (array_key_exists('seo_tags', $asin_json)) {
            $post_tags = $asin_json['seo_tags'];
            //get only the first 4 tags
            //check if the array has more than 4 tags
            //if it does, then slice the array to only 4 tags
            //then implode the array into a string
            if (count($post_tags) > 4) {
                $post_tags = array_slice($post_tags, 0, 4);
            }
            if (count($post_tags) > 0) {
                $post_tags = implode(',', $post_tags);
                wp_set_post_tags($post_id, $post_tags);
            }
        }
    }
    





    update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);

    if ($focus_keyphrase == "-") {
        $focus_keyphrase = "";
    }
    if ($product_keyphrase = "") {
        $product_keyphrase = "";
    }
    else
    {
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$focus_keyphrase);
    }

    if ($featured_image != '')
    {
        $post_featured_image = $featured_image;
    }

    if ($post_featured_image != '') {
        $attachment_id = gizzmo_ai_attach_image_file($post_featured_image, $post_id);
        set_post_thumbnail($post_id, $attachment_id);
    }




    


    if ($create_schema == "yes") {
        //get attached image url by id
        $featured_image_url = wp_get_attachment_url(get_post_thumbnail_id($post_id) );
        //get the post url by id
        $post_url = get_permalink($post_id);

        $author = get_bloginfo('url');
        $dmain = gizzmo_ai_get_tld($author);
        $dmain = ucfirst($dmain);
        $dmain = urlencode($dmain);
        $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_schemas/' . $website_id . ',' . $asin . ',' . $dmain;
        $schemas_list = gizzmo_ai_make_get_request($enpoint_url);

        for($i = 0; $i < count($schemas_list); $i++)
        {
            #convert the json to a string
            $schema = wp_json_encode($schemas_list[$i]);
            if ($i == 0) {
                $schema = str_replace('{{featured_image}}', $featured_image_url, $schema);
                $schema = str_replace('{{URL}}', $post_url, $schema);
            }

            $content .= '<script type="application/ld+json">' . $schema .'</script>';
        }

        //update the post content with the new content
        $post = array(
            'ID' => $post_id,
            'post_content' => $content
        );
        wp_update_post($post);
    }

    
    //add the asin to an array
    $asins_array = array();
    array_push($asins_array, $asin);
    

    $order = 1;
    $post_data = array(
        'post_id' => $post_id,
        'type' => 'product_review',
        'order' => $order,
        'asins' => $asins_array,
        'title' => $post_title,
        'generative_template_id' => '1',
        'website_id' => $website_id,


    );
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_content_for_website';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);


    #}



}

function gizzmo_ai_create_general_post($asins, $asin_affiliate_tag, $website_id, $selected_topic, $product_keyphrase,$package_type,$post_featured_image,$create_tags,$connect_categories,$similar_post_ids)
{
    $selected_topic = str_replace(' ', '%20', $selected_topic);
    $selected_topic = str_replace(',', '', $selected_topic);
    $selected_topic = str_replace("'", "", $selected_topic);

    //echo '2:selected_similar_post_ids: ' . $similar_post_ids . '<br>';
    //get the p

    
    $seo_keyphrase = $product_keyphrase;
    if ($product_keyphrase != '') {
        $product_keyphrase = str_replace(' ', '%20', $product_keyphrase);
        $product_keyphrase = str_replace(',', '', $product_keyphrase);
    }

    if ($product_keyphrase == ""){
        $product_keyphrase = "-";
    }
    
    $asins = str_replace(',', '-', $asins);
    #if last character is a dash, remove it
    if (substr($asins, -1) == '-') {
        $asins = substr($asins, 0, -1);
    }


    $asins_array = array();
    $asins_array = explode('-', $asins);



    //$enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_general_post_data/' . $website_id . ',' . $asins . ',' . $selected_topic . ',' . $product_keyphrase;
    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_general_post_data/' . $website_id . ',' . $asins . ',' . $selected_topic . ',' . $product_keyphrase;


    #echo $enpoint_url;

    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);
    
    if (isset($asin_json_res['status']) && $asin_json_res['status'] == 'error') {
        if (isset($asin_json_res['message'])) {
            echo esc_html($asin_json_res['message']);
        } else {
            #echo 'Error message is not set.';
        }
        return;
    }

    #if ($asin_json_res['status'] == 'error') {
    #    echo esc_html( $asin_json_res['message'] );
    #    return;
    #}

    
    #read the json from a file in the html_parts folder, the file called "data.json" then convert to json object
    #$json_string = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/data.json');
    #$asin_json_res = json_decode($json_string, true);


    $post_title = $asin_json_res['blog_title'];
    $meta_description = $asin_json_res['meta_description'];
    
    #$post_featured_image = $asin_json_res['featured_image'];

    
    $smilar_products_carousel_asin = $asin_json_res['smilar_products_carousel_asin'];
    $content = "";

    


    if ($package_type == 'Enterprise') {
        $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
        $content = $gizzmo_enterprise . $content;
    }


    $gizzmo_div = "<form id='gizzmo_post_details_form' style='display:none'>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_post_id' id='form_gizzmo_post_id' value=''>";
    $gizzmo_div .=  "<input type='hidden' name='form_gizzmo_website_id' id='form_gizzmo_website_id' value='". $website_id ."'>";
    $gizzmo_div .=  "</form>";

    $content = $gizzmo_div . $content;

    
    $content_sections = $asin_json_res['sections'];

    $section_index = 0;
    foreach ($content_sections as $section) {
        $section_title = $section['section_title'];
        $section_subsections = $section['sub_sections'];
        $image_src = $section['image'];
        
        $section_html = '';
        if ($section_title != 'Introduction')
        {
            $section_html = '<h2>' . $section_title . '</h2>';
        }

        $asin_source = $section['source'];
        #remove the www. from the source
        $asin_source_credit = str_replace('www.', '', $asin_source);
        #$source_site = str_replace('.com', '', $asin_source_credit);
        #$source_site = str_replace('.co.uk', '', $source_site);
        #make the first letter uppercase
        #$source_site = ucfirst($source_site);

        $asin_link = '';
        if ($smilar_products_carousel_asin != '')
        {
            if ($package_type == "Free")
            {
                
                if ($asin_source == "www.amazon.com" ||$asin_source == "www.amazon.co.uk") {
                    $asin_link = 'https://' . $asin_source . '/dp/' . $smilar_products_carousel_asin;
                }
                elseif ($asin_source == "www.walmart.com") {
                    $asin_link = 'https://' . $asin_source . '/ip/' . $smilar_products_carousel_asin;
                }

            }
            else
            {
                
                if ($asin_source == "www.amazon.com" ||$asin_source == "www.amazon.co.uk") {
                    $asin_link = 'https://' . $asin_source . '/dp/' . $smilar_products_carousel_asin . '?tag=' . $asin_affiliate_tag;
                }
                elseif ($asin_source == "www.walmart.com") {
                    $asin_link = 'https://' . $asin_source . '/ip/' . $smilar_products_carousel_asin . '?tag=' . $asin_affiliate_tag;
                }
            }
        }

        if ($image_src != '')
        {
            $image_html ='';
            $image_html .= '<figure class="wp-block-image size-large">';
            if ($asin_link != '')
            {
                $image_html .= '<a class="gizzmo_link" data-linktype="image" rel="nofollow" target="_Blank" href="' . $asin_link . '">';
            }
            else
            {
                $image_html .= '<a href="' . $image_src . '">';
            }

            $image_html .= '<img decoding="async" src="' . $image_src . '" alt="' . $image_src . '" class="wp-image-840" />';
            
            #$image_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">Credit - Amazon.com</div>';

            $image_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">';
            $image_html .= 'Credit - ' . $asin_source_credit;
            $image_html .= '</div>';

            $image_html .= '</a>';
            $image_html .= '</figure>';

            $section_html .= $image_html;
        }


        foreach ($section_subsections as $subsection) {
            $subsection_title = $subsection['sub_section_title'];
            $subsection_text = $subsection['sub_section_content'];
            $subsection_html = '<h3>' . $subsection_title . '</h3>';

            $subsection_text = str_replace('.A', '.<br><br>A', $subsection_text);
            $subsection_text = str_replace('.B', '.<br><br>B', $subsection_text);
            $subsection_text = str_replace('.C', '.<br><br>C', $subsection_text);
            $subsection_text = str_replace('.D', '.<br><br>D', $subsection_text);
            $subsection_text = str_replace('.E', '.<br><br>E', $subsection_text);
            $subsection_text = str_replace('.F', '.<br><br>F', $subsection_text);
            $subsection_text = str_replace('.G', '.<br><br>G', $subsection_text);
            $subsection_text = str_replace('.H', '.<br><br>H', $subsection_text);
            $subsection_text = str_replace('.I', '.<br><br>I', $subsection_text);
            $subsection_text = str_replace('.J', '.<br><br>J', $subsection_text);
            $subsection_text = str_replace('.K', '.<br><br>K', $subsection_text);
            $subsection_text = str_replace('.L', '.<br><br>L', $subsection_text);
            $subsection_text = str_replace('.M', '.<br><br>M', $subsection_text);
            $subsection_text = str_replace('.N', '.<br><br>N', $subsection_text);
            $subsection_text = str_replace('.O', '.<br><br>O', $subsection_text);
            $subsection_text = str_replace('.P', '.<br><br>P', $subsection_text);
            $subsection_text = str_replace('.Q', '.<br><br>Q', $subsection_text);
            $subsection_text = str_replace('.R', '.<br><br>R', $subsection_text);
            $subsection_text = str_replace('.S', '.<br><br>S', $subsection_text);
            $subsection_text = str_replace('.T', '.<br><br>T', $subsection_text);
            $subsection_text = str_replace('.U', '.<br><br>U', $subsection_text);
            $subsection_text = str_replace('.V', '.<br><br>V', $subsection_text);
            $subsection_text = str_replace('.W', '.<br><br>W', $subsection_text);
            $subsection_text = str_replace('.X', '.<br><br>X', $subsection_text);
            $subsection_text = str_replace('.Y', '.<br><br>Y', $subsection_text);
            $subsection_text = str_replace('.Z', '.<br><br>Z', $subsection_text);


            $subsection_html .= '<p>' . $subsection_text . '</p>';

            $section_html .= $subsection_html;
        }

        $section_index++;
        
        $content .= $section_html;

        if ($section_index == 3) {
            if ($package_type == 'Free') {
                $d ="";
            }
            else
            {
                if ($smilar_products_carousel_asin != '')
                {
                    $similar_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $smilar_products_carousel_asin .'&affid='. $asin_affiliate_tag .'&type=similar_items" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                    $content .= $similar_items_iframe;
                }
            }
        }

        //
    }

    //create the similer posts
    if ($similar_post_ids != null) {
        //echo "selected_similar_post_ids: " . $similar_post_ids . "<br>";
        $similar_posts_html = '<h2>Read also:</h2>';
        #splait the selected_similar_post_ids string into array of ids by comma
        $similar_post_ids_array = explode(',', $similar_post_ids);

        foreach ($similar_post_ids_array as $similar_post_id) {
            //echo "similar_post_id: " . $similar_post_id . "<br>";

            $similar_post = get_post($similar_post_id);

            //echo "similar_post: " . $similar_post . "<br>";

            #check if the post is not null
            if ($similar_post != null) {
                #check if the post has a title
                if ($similar_post->post_title != '') {
                    $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
                }
            }
        }
        $content .= $similar_posts_html;
    }  




     //add the post categories

    
    try {
        $post_categories_array = array();
        $post_categories = $asin_json_res['wordpress_categories'];
        if ($post_categories != '') {
            $post_categories_array = explode(',', $post_categories);
        }
    } catch (Exception $e) {
        $post_categories_array = array();
    }
    



    
    $post_id = wp_insert_post(
        array(
            'post_title' => $post_title,
            'post_excerpt' => $meta_description,
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'post'
        )
    );


    //check if the post_categories_array is not empty
    //if it is not empty, then set the post categories
    if ($connect_categories == "yes") {
        if (!empty($post_categories_array)) {
            wp_set_post_categories($post_id, $post_categories_array);
        }
    }



    //insert post tags
    //check if the $asin_json has post_tags
    //if it does, then implode the array into a string
    //then set the post tags
    if ($create_tags == "yes") {
        $post_tags = array();
        if (array_key_exists('seo_tags', $asin_json_res)) {
            $post_tags = $asin_json_res['seo_tags'];
            //get only the first 4 tags
            //check if the array has more than 4 tags
            //if it does, then slice the array to only 4 tags
            //then implode the array into a string
            if (count($post_tags) > 4) {
                $post_tags = array_slice($post_tags, 0, 4);
            }

            if (count($post_tags) > 0) {
                $post_tags = implode(',', $post_tags);
                wp_set_post_tags($post_id, $post_tags);
            }
        }
    }
    





    update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);
    if ($seo_keyphrase == "-") {
        $seo_keyphrase = "";
    }
    if ($product_keyphrase = "") {
        $product_keyphrase = "";
    }
    else
    {
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$seo_keyphrase);
    }
    
     

    if ($post_featured_image != '') {
        $attachment_id = gizzmo_ai_attach_image_file($post_featured_image, $post_id);
        set_post_thumbnail($post_id, $attachment_id);
    }


   



    //make a post request to the api to save the new post data to the database
    $order = 1;
    $post_data = array(
        'post_id' => $post_id,
        'type' => 'general',
        'order' => $order,
        'asins' => $asins_array,
        'title' => $post_title,
        'generative_template_id' => '1',
        'website_id' => $website_id,


    );
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_content_for_website';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);

}


function gizzmo_ai_create_product_comparison_post($asins_array, $asin_affiliate_tag, $website_id, $product_keyphrase,$package_type,$featured_image,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$selected_thematic_concept,$products_shared_features_list,$carousel_options,$selected_similar_post_ids)
{
    //cretae atring from the asins array
    $asins = implode('-', $asins_array);

    //make a post request to the api with all the above data as $post_data object
    //the api will return a json object with the post data
    //then use the post data to create the post
    $post_data = array(
        'asins' => $asins,
        'asin_affiliate_tag' => $asin_affiliate_tag,
        'website_id' => $website_id,
        'product_keyphrase' => $product_keyphrase,
        'package_type' => $package_type,
        'featured_image' => $featured_image,
        'create_tags' => $create_tags,
        'connect_categories' => $connect_categories,
        'create_faqs' => $create_faqs,
        'create_pros_cons' => $create_pros_cons,
        'create_conclusion' => $create_conclusion,
        'selected_thematic_concept' => $selected_thematic_concept,
        'products_shared_features_list' => $products_shared_features_list
    );


    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/create_comparison_post_data';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);

    
    //print the response
    if (strpos($res, 'cURL error') !== false) {
        echo "<input type='hidden' id='gizzmo_error' value='yes'>";
        return;
    }


    //read the comparison_done.json file from the html_parts folder
    //$res = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/comparison_done.json');
    //convert the post data to json
    //$post_data = json_decode($res, true);
    

    
    //start creating the post
    //convert the post data to json
    $post_data = json_decode($res, true);

    //echo $post_data;

    //get only the data from the post data
    $post_data = $post_data['data'];


    //get the post style
    $comparison_style = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/comparison_css.txt');


    //get the post title
    $post_title = $post_data['blog_title'];

    //bulding the post content
    $content = "";
    
    //check if the introduction_paragraph is not empty or even exists
    //$introduction_start_paragraph = "";
    $introduction_paragraph = "";
    if (array_key_exists('introduction_paragraphs', $post_data)) {
        //$introduction_paragraph = $post_data['introduction_paragraphs'];
        //$introduction_start_paragraph = $introduction_paragraph[0]['text'];
        //$introduction_paragraph = $introduction_paragraph[1]['text'];
        $introduction_paragraphs = $post_data['introduction_paragraphs'];
        foreach ($introduction_paragraphs as $introduction_paragraph_item) {
            $introduction_paragraph .= '<p>' . $introduction_paragraph_item . '</p>';
        }
    }


    $content .= '<p>' . $introduction_paragraph . '</p>';
     

    //check if the for_against section is not empty or eveb exists
    if (array_key_exists('for_against', $post_data)) {

        

        //create the comparison for against table
        $for_against_items = $post_data['for_against'];
        
        //check if the for_against_items is not empty
        if (!empty($for_against_items)) {

            //make a for loop to loop through the for_against_items
            $for_against_html = '';
            $for_against_html .= '<div class="container_compare">';
            $for_against_html .= '<div class="panel_compare pricing-table">';

            
            
            foreach ($for_against_items as $prod_item) {

                $product_asin = $prod_item['asin'];
                $product_source = "www.amazon.com";
                #based on the asin, get the rank from the products_overll_rank array
                #loop through the products_overll_rank array to find the asin that matches the product_asin and get the rank
                $product_rank = 0;
                foreach ($post_data['products'] as $product) {
                    if ($product['asin'] == $product_asin) {
                        $product_rank = $product['rank'];
                        $product_source = $product['source'];
                    }
                }

                #create the product link with the affiliate tag if exists
                $product_link = '';
                if ($asin_affiliate_tag != '') {
                    $product_link = 'https://'. $product_source . '/dp/' . $product_asin . '?tag=' . $asin_affiliate_tag;
                } else {
                    $product_link = 'https://'. $product_source . '/dp/' . $product_asin;
                }



                $one_for_against_html = '<div class="pricing-plan">';

                $one_for_against_html .= '<h2 class="pricing-header">' . $prod_item['product'] . '</h2>';
                $one_for_against_html .= '<div class="comp_rating">';
                $one_for_against_html .= '<svg class="star_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="16" id="star"><path style="marker: none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path> </svg>';
                $one_for_against_html .= '<span>' . strval($product_rank) . '</span>';
                $one_for_against_html .= '</div>';
                $one_for_against_html .= '<p class="pricing-description"></p>';

                $one_for_against_html .= '<span class="for_against_title">For</span>';
                $one_for_against_html .= '<ul class="pricing-features">';
                
                foreach ($prod_item['pros'] as $pro_item) {
                    $one_for_against_html .= '<li class="pricing-features-item">' . $pro_item . '</li>';
                }
                $one_for_against_html .= '</ul>';
                
                $one_for_against_html .= '<span class="for_against_title">Against</span>';
                $one_for_against_html .= '<ul class="pricing-features">';
                foreach ($prod_item['cons'] as $con_item) {
                    $one_for_against_html .= '<li class="minus pricing-features-item">' . $con_item . '</li>';
                }

                $one_for_against_html .= '</ul>';

                $one_for_against_html .= '<div style="text-align: center">';
                $one_for_against_html .= '<a href="'. $product_link .'"  target="_blank" rel="nofollow">Buy at Amazon</a>';
                $one_for_against_html .= '</div>';

                $one_for_against_html .= '</div>';

                $for_against_html .= $one_for_against_html;
            }




            $for_against_html .= '</div>';
            $for_against_html .= '</div>';


            $content .= $comparison_style . $for_against_html;
        }
    }


    //check if the introduction_paragraph is not empty or even exists
    //if (array_key_exists('introduction_paragraphs', $post_data)) {
    //    $introduction_paragraph = $post_data['introduction_paragraphs'];
        //make a for loop to loop through the introduction_paragraphs
    //    foreach ($introduction_paragraph as $paragraph) {
    //$content .= '<p>' . $introduction_paragraph . '</p>';
    //    }
    //}
    


    $compered_items_caruosel = "false";
    $similar_items_caruosel = "false";
    $related_items_caruosel = "false";
    //check if the user wants to create caruosels

    $similar_items_iframe = '';
    $related_items_iframe = '';

    if ($carousel_options == "yes") {
        //create the caruosels
        //check if the compered_items_caruosel is not empty or even exists
        if (array_key_exists('smilar_products', $post_data)) {
            if (empty($post_data['smilar_products'])) {
                $similar_items_caruosel = "false";
            } else {
                $similar_items_caruosel = "true";
                $product_caruosel_asin = $post_data['smilar_products'][0];
                $similar_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $product_caruosel_asin .'&affid='. $asin_affiliate_tag .'&type=similar_items" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                
                 
            }
        }
        if ($similar_items_caruosel == "false") {
            if (array_key_exists('related_products', $post_data)) {
                if (empty($post_data['related_products'])) {
                    $related_items_caruosel = "false";
                } else {
                    $product_caruosel_asin = $post_data['related_products'][0];
                    $related_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $product_caruosel_asin .'&affid='. $asin_affiliate_tag .'&type=related_items" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                    $related_items_caruosel = "true";

                     
                }
            }
        }
    }

 



    //create the comparison paragraphs
    //check if the comparison_paragraphs section is not empty or even exists
    if (array_key_exists('comparison_paragraphs', $post_data)) {
        $comparison_paragraphs = $post_data['comparison_paragraphs'];
        //make a for loop to loop through the comparison_paragraphs
        $prev_item_had_image = false;
        $paragraphs_index = 0;
        foreach ($comparison_paragraphs as $paragraph) {

            $paragraphs_index++;

            $content .= '<h2>' . $paragraph['title'] . '</h2>';
            
            $asin_source_credit = "Amazon.com";#temp, missing in json
            $seleted_product_image_link = '';#temp, missing in json

            
            try {
                $seleted_product_image_link = $paragraph['imag_link'];
            } catch (Exception $e) {
                $seleted_product_image_link = '';
            }

            try {
                $asin_source_credit = $paragraph['source'];
            } catch (Exception $e) {
                $asin_source_credit = "Amazon.com";
            }
            

            if ($prev_item_had_image == false)
            {
                if ($paragraph['image'] != '') {

                    $image_html = '<figure class="wp-block-image size-large">';
                    $image_html .= '<a class="gizzmo_link" data-linktype="image" rel="nofollow" target="_blank" href="'. $seleted_product_image_link .'">';

                     
                    if ($product_keyphrase != '') {
                        $image_html .= '<img decoding="async" src="' . $paragraph['image'] . '" alt="' . $product_keyphrase . '" class="wp-image-840" />';
                    } else {
                        $image_html .= '<img decoding="async" src="' . $paragraph['image'] . '" alt="' . $paragraph['image'] . '" class="wp-image-840" />';
                    }
                     
                    
                    $image_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">';
                    $image_html .= 'Credit - ' . $asin_source_credit;
                    $image_html .= '</div>';
                    $image_html .= '</a>';
                    $image_html .= '</figure>';


                    $content .= $image_html;

                    $prev_item_had_image = true;
                }
                else
                {
                    $prev_item_had_image = false;
                }
            }
            else
            {
                $prev_item_had_image = false;
            }




            $products_ranks = $paragraph['products_rank'];

            $head_to_head_feature_html = '';
            $head_to_head_feature_html .= '<div class="container_compare">';
            $head_to_head_feature_html .= '<div class="panel_compare pricing-table">';

            
            
            foreach ($products_ranks as $product_rank) {

                #create the product link with the affiliate tag if exists
                $product_link = '';
                if ($asin_affiliate_tag != '') {
                    $product_link = 'https://'. $product_rank['source'] . '/dp/' . $product_rank['asin'] . '?tag=' . $asin_affiliate_tag;
                } else {
                    $product_link = 'https://'. $product_rank['source'] . '/dp/' . $product_rank['asin'];
                }


                $head_to_head_feature_html .= '<div class="pricing-plan" style="padding-top: 5px;padding-bottom: 5px;">';

                $head_to_head_feature_html .= '<h2 class="pricing-header" style="font-size: 15px;margin-bottom: 1px;">' . $product_rank['short_product_name'] . '</h2>';
                $head_to_head_feature_html .= '<div class="comp_rating" style="margin-top: 0px;">';
                $head_to_head_feature_html .= '<svg class="star_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="16" id="star"><path style="marker: none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path> </svg>';
                $head_to_head_feature_html .= '<span>' . $product_rank['rank'] . '</span>';
                $head_to_head_feature_html .= '</div>';
                 
                $head_to_head_feature_html .= '<div style="text-align: center;font-size: 15px;margin-top: 5px;">';
                $head_to_head_feature_html .= '<a href="' . $product_link . '" target="_blank" rel="nofollow">Buy at Amazon</a>';
                $head_to_head_feature_html .= '</div>';

                $head_to_head_feature_html .= '</div>';
            }

            $head_to_head_feature_html .= '</div>';
            $head_to_head_feature_html .= '</div>';






            $content .= '<p>' . $paragraph['text'] . '</p>';
            $content .= $head_to_head_feature_html;


            if ($paragraphs_index == 3) {
                if ($similar_items_iframe != '') {
                    $content .= $similar_items_iframe;
                }
                elseif ($related_items_iframe != '') {
                    $content .= $related_items_iframe;
                }
            }
        }
    }





    //create the conclusion paragraph
    //check if the conclusion_paragraphs section is not empty or even exists
    $conclusion = '';
    if (array_key_exists('conclusion', $post_data)) {
        if ($post_data['conclusion'] != '') {
            $conclusion_title = $post_data['conclusion']['title'];
            $conclusion_text = $post_data['conclusion']['paragraph'];
            $conclusion = '<h2>' . $conclusion_title . '</h2>';
            $conclusion .= '<p>' . $conclusion_text . '</p>';
            $content .= $conclusion;
        }
        
    }


    //create the faqs,
    //check if the faqs section is not empty or even exists
    $faqs_html = '';
    if (array_key_exists('faqs', $post_data)) {
        $faqs = $post_data['faqs'];
        if ($faqs != '') {
            //make a for loop to loop through the faqs
            $faqs_html .= '<h2>Questions & Answers:</h2>';
            foreach ($faqs as $faq) {
                $faqs_html .= '<p><b>Question: </b>' . $faq['question'] . '</p>';
                $faqs_html .= '<p><b>Answer: </b>' . $faq['answer'] . '</p>';
            }

            $content .= $faqs_html;
        }
    }




    //create the similer posts
    if ($selected_similar_post_ids != null) {
        $similar_posts_html = '<h2>Read also:</h2>';
        #splait the selected_similar_post_ids string into array of ids by comma
        $selected_similar_post_ids = explode(',', $selected_similar_post_ids);

        foreach ($selected_similar_post_ids as $similar_post_id) {
            $similar_post = get_post($similar_post_id);
            $similar_posts_html .= '<li><a href="' . get_permalink($similar_post_id) . '">' . $similar_post->post_title . '</a></li>';
        }
        $content .= $similar_posts_html;
    }  




    $meta_description = '';
    if (array_key_exists('blog_meta_description', $post_data)) {
        $meta_description = $post_data['blog_meta_description'];
    }


    if ($post_title != "")
    {
        $post_title = str_replace('"', '', $post_title);

        $post_id = wp_insert_post(
            array(
                'post_title' => $post_title,
                'post_excerpt' => $meta_description,
                'post_content' => $content,
                'post_status' => 'draft',
                'post_type' => 'post'
            )
        );
    }
    else
    {
        echo "Something went wrong, please try again";
        return;
    }

    //connect the post to the categories
    $post_categories_array = array();
    if (array_key_exists('wordpress_categories', $post_data)) {
        try {
            $post_categories_array = array();
            $post_categories = $post_data['wordpress_categories'];
            if ($post_categories != '') {
                $post_categories_array = explode(',', $post_categories);
            }
        } catch (Exception $e) {
            $post_categories_array = array();
        }

        if (!empty($post_categories_array)) {
            wp_set_post_categories($post_id, $post_categories_array);
        }

    }

    
    //insert post tags
    $post_tags = array();
    if (array_key_exists('seo_tags', $post_data)) {
        $post_tags = $post_data['seo_tags'];
        //get only the first 4 tags
        //check if the array has more than 4 tags
        //if it does, then slice the array to only 4 tags
        //then implode the array into a string
        if (count($post_tags) > 7) {
            $post_tags = array_slice($post_tags, 0, 7);
        }
        if (count($post_tags) > 0) {
            $post_tags = implode(',', $post_tags);
            wp_set_post_tags($post_id, $post_tags);
        }
    }
    


    //insert the blog_meta_description
    if (array_key_exists('blog_meta_description', $post_data)) {
        $meta_description = $post_data['blog_meta_description'];
        //remove the first " from the meta_description and the last " if exists
        $meta_description = str_replace('"', '', $meta_description);
        if ($meta_description != '') {
            update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);
        }
    }

    //insert the focus_keyphrase
    if ($product_keyphrase != '') {
        update_post_meta($post_id,'_yoast_wpseo_focuskw',$product_keyphrase);
    }
     

    //insert the featured image
    $post_featured_image = '';
    if (array_key_exists('featured_image', $post_data)) {
        $post_featured_image = $post_data['featured_image'];
        if ($post_featured_image != '') {
            $attachment_id = gizzmo_ai_attach_image_file($post_featured_image, $post_id);
            set_post_thumbnail($post_id, $attachment_id);
        }
    }




    //make a post request to the api to save the new post data to the database
    $order = 1;
    $post_data = array(
        'post_id' => $post_id,
        'type' => 'comparison',
        'order' => $order,
        'asins' => $asins_array,
        'title' => $post_title,
        'generative_template_id' => '1',
        'website_id' => $website_id,
    );
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_content_for_website';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);



    //convert the $actual_res to json string
    //convet the $post_data 
    //echo $res;
    //echo  $post_title;

}







function gizzmo_insert_content_task($task_type, $asin, $asin_affiliate_tag, $website_id, $selected_similar_post_ids,$product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion,$carousel_options,$selected_thematic_concept,$products_shared_features_list,$selected_topic,$selected_listicle_title,$expected_sections_number,$create_ai_images,$create_images_placeholder,$create_rating_reviews,$create_list_of_products,$listicle_paragraphes_list,$language)
{

     

    if ($product_keyphrase == ''){$product_keyphrase = '-';}
    if ($selected_thematic_concept == ''){$selected_thematic_concept = '-';}



    #replace all spaces with %20
    $product_keyphrase = str_replace("'", "", $product_keyphrase);
    #$product_keyphrase = str_replace(' ', '%20', $product_keyphrase);
    $product_keyphrase = str_replace(',', ' ', $product_keyphrase);

    $selected_thematic_concept = str_replace("'", "", $selected_thematic_concept);
    #$selected_thematic_concept = str_replace(' ', '%20', $selected_thematic_concept);
    $selected_thematic_concept = str_replace(',', '.', $selected_thematic_concept);

    //make a request to save the content task to the database
    //the endpoint is https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/add_content_task_to_queue
    //send a json object with the following data
    $post_data = array(
        'asin' => $asin,
        'asin_affiliate_tag' => $asin_affiliate_tag,
        'website_id' => $website_id,
        'selected_similar_post_ids' => $selected_similar_post_ids,
        'product_keyphrase' => $product_keyphrase,
        'selected_carousels' => $selected_carousels,
        'create_schema' => $create_schema,
        'featured_image' => $featured_image,
        'package_type' => $package_type,
        'create_tags' => $create_tags,
        'connect_categories' => $connect_categories,
        'create_faqs' => $create_faqs,
        'create_pros_cons' => $create_pros_cons,
        'create_conclusion' => $create_conclusion,
        'carousel_options' => $carousel_options,
        'selected_thematic_concept' => $selected_thematic_concept,
        'task_type' => $task_type,
        'shared_features_list' => $products_shared_features_list,
        'selected_topic' => $selected_topic,
        'selected_listicle_title' => $selected_listicle_title,
        'expected_sections_number' => $expected_sections_number,
        'create_ai_images' => $create_ai_images,
        'create_images_placeholder' => $create_images_placeholder,
        'create_rating_reviews' => $create_rating_reviews,
        'create_list_of_products' => $create_list_of_products,
        'listicle_paragraphes_list' => $listicle_paragraphes_list,
        'language' => $language
    );
    
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/add_content_task_to_queue_v2';
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $post_data);

    //print the response
    if (strpos($res, 'cURL error') !== false) {
        echo "<input type='hidden' id='gizzmo_error' value='yes'>";
        return;
    }
    else
    {
        echo $res;
    }



}


?>



<script>

    jQuery(document).ready(function($) {
    //$( document ).ready(function() {

             
            const data = <?php echo wp_json_encode($similar_posts_obj); ?>;
            const product_caruosel_data = <?php echo wp_json_encode($product_caruosel_obj); ?>;
            const thematic_concepts_list = <?php echo wp_json_encode($thematic_concepts_list); ?>;


            //make an on click event for the create post button to show the loading message
            $('.create_post_bt').click(function(){
                $('.loading_msg').css('display','block');
                $('.backdrop').css('display','block');
                $('.backdrop').css('opacity','0.7');
            });
            
            $('#create_review_bt').click(function(){
                $('.loading_msg').css('display','block');
                $('.backdrop').css('display','block');
                $('.backdrop').css('opacity','0.7');
            });

            $('#create_roundup_bt').click(function(){
                $('.loading_msg').css('display','block');
                $('.backdrop').css('display','block');
                $('.backdrop').css('opacity','0.7');
            });

            $('#create_general_bt').click(function(){
                $('.loading_msg').css('display','block');
                $('.backdrop').css('display','block');
                $('.backdrop').css('opacity','0.7');
            });

            $('#create_comparison_bt').click(function(){
                $('.loading_msg').css('display','block');
                $('.backdrop').css('display','block');
                $('.backdrop').css('opacity','0.7');
            });

            

            $('#featured_image_change').click(function(){
                $("#token_login").hide();
                $("#all_product_images").show();

                $("#adding_affiliate_tag").hide();

                $(".backdrop").css("display", "block");
                $(".backdrop").animate({'opacity':'0.50'}, 300, 'linear');
                $(".box").css("display", "block");
            });

            //check the length of data 
            //if it is 0, then show the no data message
            //if it is not 0, then show the data
            if (data['asin'] == undefined)
            {
                return;
            }


 
            if (data !=null )
            {

                var identifier = data['asin'];
                var type = data['type'];
                var website_id = data['website_id'];
                var product_img_url = data['product_img_url'];
                var product_name = data['product_name'];

                if (identifier !=undefined)
                {
                    if (product_name.length > 70)
                    {
                        product_name = product_name.substring(0, 70) + "...";
                    }
                    if (type == 'review')
                    {

                        $("#product_review_form").css("display", "block");

                        


                        $('#selected_product_review_img').css('background-image', 'url(' + product_img_url + ')');

                        $('#selected_product_link_name').html(product_name);
                        $('#product_review_asin').val(identifier);
                        $('#website_id').val(website_id);
                        $('#featured_image').val(product_img_url);
                        


                        //$("#starter_msg").css("display", "none");
                        //$("#review_creation_wrapper").css("display", "block");
                    }

                    //$('#featured_image').val(product_img_url);
                    
                        //get the product images from the get_product_images ajax function
                    var ajax_url = "https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_product_images/" + identifier ;
                    $.ajax({
                        url: ajax_url,
                        type: 'GET',
                        dataType: 'json', // added data type
                        success: function(res) {
                            if (res !=null)
                            {
                                var product_images_html = "";
                                for (let x in res) {
                                    var product_image = res[x];
                                    var bk = "url('" + product_image + "')";
                                    product_images_html += '<div data-imgurl="' + product_image + '" class="product_image_wrapper" onclick="set_featured_image(this)" style="background-image:' + bk + '"></div>';
                                }
                                $('#product_images_list').html(product_images_html);
                            }
                        }
                    });

                    // and fill the Ul with them




                    similar_post_list = data['similar_posts'];
                    //loop and display
                    selected_similar_posts = ""
                    has_similar_posts = false;
                    var all_posts_html = "";
                    for (let x in similar_post_list) {

                        has_similar_posts = true;
                        var post_title = similar_post_list[x].post_title;
                        var post_id = similar_post_list[x].post_id;
                        //var post_title_long =post_title;
                        //if (post_title.length > 35)
                        //{
                        //    post_title = post_title.substring(0, 35) + "...";
                        //}

                        var one_post = '<label class="flex items-center space-x-2 chckbox">' +
                            '<input onchange="handleCheckChange(this);" name="similar_post" value="' + post_id + '" class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                            '<p>' + post_title + '</p>' +
                            '</label>';


                        //li.innerHTML = '<input title="' + post_title_long + '" onchange="handleCheckChange(this);" type="checkbox"  class="similar_post_chkbox" name="similar_post" value="'+post_id+'">'+post_title;
                        all_posts_html += one_post;
                        //document.getElementById("similar_posts_list").appendChild(one_post);
                        //console.log(similar_post_list[x].post_title + " : "+ similar_post_list[x].post_similarity)
                    }
                    $('#similar_posts_list').html(all_posts_html);

                    //$('#selected_similar_post_ids').val(selected_similar_posts);
                    

                    if (has_similar_posts == true)
                    {
                        //$('#similar_found').css('display', 'block');
                        //$('#similar_not_found').css('display', 'none');
                    }
                    else
                    {
                        $('#internal_linking_div').css('display', 'none');
                        //$('#similar_not_found').css('display', 'block');
                    }
                    
                    var package_type = $('#package_type').val();
                    if (package_type == "Free")
                    {
                        $('#carousel_options').prop('checked', false);
                    }
                    else
                    {

                        if (product_caruosel_data['similar_items']> 0 || product_caruosel_data['related_items']> 0 || product_caruosel_data['compered_items']> 0)
                        {
                            //set chckbox as checked
                            $('#carousel_options').prop('checked', true);

                            var selected_carousels_str = ""; 
                            if (product_caruosel_data['similar_items']> 0)
                            {
                                $('#similar_items').prop('checked', true);
                                selected_carousels_str += "similar_items";
                            }
                            if (product_caruosel_data['related_items']> 0)
                            {
                                if (selected_carousels_str != "")
                                {
                                    selected_carousels_str += ",related_items" ;
                                }
                                else
                                {
                                    selected_carousels_str += "related_items" ;
                                }
                            }
                            if (product_caruosel_data['compered_items']> 0)
                            {
                                if (selected_carousels_str != "")
                                {
                                    selected_carousels_str += ",compered_items" ;
                                }
                                else
                                {
                                    selected_carousels_str += "compered_items" ;
                                }
                            }
                            
                            $('#selected_carousels').val(selected_carousels_str);
                        }
                        else
                        {
                            $('#carousel_options').prop('checked', false);
                            //make it disabled
                            $('#carousel_options').prop('disabled', true);
                            //change the text to say that the monitization is not enabled
                            //check if the package is free
                            var package_type = $('#package_type').val();
                            if (package_type == "Free")
                            {
                                d=""
                            }
                            else
                            {
                                $('#carousel_options_text').html('Monetization Carousels not available');
                                //change the text color
                                $('#carousel_options_text').css('color', '#9f9b9b');
                            }
                            

                            $('#selected_carousels').val('');
                        }
                    }
 
                    
                    //check if thematic_concepts_list is not empty
                    if (thematic_concepts_list["data"].length > 0)
                    {
                    
                        $("#thematic_concepts_list_div").css("display", "block");

                        var existing_thematic_concepts =[];
                        var container_2 = document.getElementById('thematic_concepts_list');
                        var all_thematic_concepts_html = "";
                        var existing_thematic_concepts_html = $('#thematic_concepts_list').html();
                        all_thematic_concepts_html = existing_thematic_concepts_html;

                        for (var i = 0; i < thematic_concepts_list["data"].length; i++) {
                            thematic_concept = thematic_concepts_list["data"][i]['theme_name'];
                            //check if the criteria already exists in the list of criterias
                            if (existing_thematic_concepts.includes(thematic_concept))
                            {
                                continue;
                            }
                            thematic_concept_identifier = convert_text_to_numbers(thematic_concept);
                            thematic_concept_desc = thematic_concepts_list["data"][i]['description'];
                            thematic_concept = thematic_concept.replace("'", "");
                            one_thematic_concept = '<label class="flex items-center space-x-2 chckbox">' +
                                        '<input id="thematic_concept_chk_' + thematic_concept_identifier + '"  onchange="thematic_concept_handleCheckChange(this);" data-description="' + thematic_concept_desc + '" name="thematic_concept_select" value="' + thematic_concept + '" class="thematic_concept_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                                        '<p title="'+ thematic_concept_desc + '" >' + thematic_concept + ' (' + thematic_concept_desc + ')' + '</p>' +
                                        '</label>';
                            //append the criteria to the existing criterias
                            container_2.insertAdjacentHTML('beforeend', one_thematic_concept);
                            all_thematic_concepts_html += one_thematic_concept;
                            //add the criteria to the list of existing criterias
                            existing_thematic_concepts.push(thematic_concept);
                        }
                    }

                    











                }

            }
            
    });

        




    function set_featured_image(clicked_obj)
    {
        (function ($) {
            //get the image url
            var image_url = $(clicked_obj).attr('data-imgurl');
            //set the image url to the featured image input
            $('#featured_image').val(image_url);

            $('#selected_product_review_img').css('background-image', 'url(' + image_url + ')');
            


            $('.backdrop').animate({'opacity':'0'}, 300, 'linear', function(){
                $('.backdrop').css('display', 'none');
                });
            $('.box').fadeOut();	



        }(jQuery));
    }

</script>
