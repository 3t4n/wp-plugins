<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://gizzmo.ai/plugin
 * @since      1.0.0
 *
 * @package    Gizzmo_Ai
 * @subpackage Gizzmo_Ai/admin/partials
 */


/** Declare the path of the plugin */
$plugin_path = plugin_dir_path(dirname(__FILE__));
$plugin_url = plugin_dir_url(dirname(__FILE__));
$plugin_name = $this->plugin_name;
$plugin_version = $this->version;
/**$plugin_slug = $this->plugin_slug;*/

/** Declare the path of the plugin admin images */
$plugin_admin_images = $plugin_url . 'assets/images/';
$plugin_iframe_path = $plugin_url . 'pages/index.php';

$similar_posts_json = "";
$similar_posts_obj = new stdClass();

$product_caruosel_obj = new stdClass();

$similarity_array = array();

/**
 * This function is used to read the txt file from html_parts folder 
 * @since    1.0.0
 */
function gizzmo_ai_read_file($file_name)
{
    $file = fopen($file_name, "r");
    $content = fread($file, filesize($file_name));
    fclose($file);
    return $content;
}

/**
 * This function is used to replace the content of the html file with the values of the array
 * @since    1.0.0
 */
function gizzmo_ai_replace_content($content, $array)
{
    foreach ($array as $key => $value) {
        $content = str_replace($key, $value, $content);
    }
    return $content;
}


/**
 * This function is used to call REST API of Gizzmo AI
 * @since    1.0.0
 */
function gizzmo_ai_make_post_json_request($url, $data) {
    $response = wp_remote_post($url, array(
        'method' => 'POST',
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
        'body' => wp_json_encode($data),
        'timeout' => 60,
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


function gizzmo_ai_get_instance( $post_id ) {
	global $wpdb;

	$post_id = (int) $post_id;
	if ( ! $post_id ) {
		return false;
	}

	$_post = wp_cache_get( $post_id, 'posts' );

	if ( ! $_post ) {
		$_post = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE ID = %d LIMIT 1", $post_id ) );

		if ( ! $_post ) {
			return false;
		}

		$_post = sanitize_post( $_post, 'raw' );
		wp_cache_add( $_post->ID, $_post, 'posts' );
	} elseif ( empty( $_post->filter ) || 'raw' !== $_post->filter ) {
		$_post = sanitize_post( $_post, 'raw' );
	}

	return new WP_Post( $_post );
}


#echo an hidden field with the $plugin_path value
#echo '<input type="hidden" id="plugin_path" value="' . $plugin_path . '">';
#echo '<input type="hidden" id="plugin_url" value="' . $plugin_url . '">';


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
        'stream' => false, // Ensure the request is returned as a string and not streamed to a file.
    ));

    // Check for errors
    if (is_wp_error($response)) {
        return $response->get_error_message();
    } else {
        return wp_remote_retrieve_body($response);
    }
}
function gizzmo_ai_attach_image_file($imageurl, $post_id)
{
    $image_data = gizzmo_ai_download_image_data($imageurl);

    $uniq_name = date('dmY') . '' . (int) microtime(true);
    $filename_webp = $uniq_name . '.webp';
    $uploaddir = wp_upload_dir();
    $uploadfile = $uploaddir['path'] . '/' . $filename_webp;



    gizzmo_ai_hs_jpg2webp(imagecreatefromstring($image_data), $uploadfile);


    #$imagetype = end(explode('/', getimagesize($destination_file_folder)['mime']));

    #$uniq_name = date('dmY').''.(int) microtime(true); 
    #$filename = $uniq_name.'.'.$imagetype;


    #$uploaddir = wp_upload_dir();
    #$uploadfile = $uploaddir['path'] . '/' . $filename;





    $contents = file_get_contents($imageurl);




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

function gizzmo_ai_create_product_roundup_post($asins_array, $asin_affiliate_tag, $website_id,$focus_keyphrase,$package_type,$featured_image)
{
    gizzmo_ai_get_post_categories($website_id);
    //echo 'gizzmo_ai_create_product_roundup_post';
    

    $asins = implode(',', $asins_array);
    $asins = str_replace(',', '-', $asins);


    $asins_array = array();
    $asins_array = explode('-', $asins);


    //echo $asins;

    //encode the white spaces in keyphrase
    $original_keyphrase = $focus_keyphrase;
    $focus_keyphrase = str_replace(' ', '%20', $focus_keyphrase);


    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_analyzed_asins_roundup_data/' . $website_id . ',' . $asins . ',' . $focus_keyphrase;

    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);

    
    //echo $enpoint_url;

    // read the html file from html_parts folder
    $one_roundup_item_html = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/product_roundup.html');
    $roundup_style = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/roundup_css.txt');

    $content = '';


    if ($package_type = 'Enterprise') {
        $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
        $content = $gizzmo_enterprise . $content;
    }


    $post_title = $asin_json_res['Title'];
    $introduction = $asin_json_res['Introduction'];
    $meta_Description = $asin_json_res['Meta_Description'];

    $product_in_roundup = $asin_json_res['data'];

    //$featured_image = "";

    $html ="";
    foreach ($product_in_roundup as $product) {
        
        //if ($featured_image== "") {
        //    $featured_image = $product['preview_image'];
        //}


        $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;

        $html .= "<div class='one_prod_item'>";
        $html .= "<img class='prod_item_list_img' src='" . $product['preview_image'] . "' />";
        $html .= "<div class='prod_item_list_texts'>";
        $html .= "<div class='prod_item_list_title'><a rel='nofollow sponsored' href='" . $AffiliateLink . "' target='_blank'>" . $product['product_name'] . "</a></div>";
        $html .= "<div class='prod_item_list_rating'>";
        $html .= "<span style='left: -96px;position: relative;top: 1px;'>" . $product['rating'] . "</span>";
        $html .= "<span class='main_raiting_count' style='margin-left: 15px;'>" . sprintf( esc_html__( '%s Ratings', 'gizzmo-ai' ), $product['reviews_count'] ) . "</span>";
        $html .= "<div class='stars-rating-main' style='--rating: " . $product['rating'] . ";float: left;top: 4.5px;left: 35px;'>";
        $html .= "<div class='rating'></div>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "<div class='prod_item_list_bt'>";
        $html .= "<a rel='nofollow sponsored' style='border: 1px solid #6c6a5c;' href='" . $AffiliateLink . "' target='_blank' class='wp-block-button__link small_bt'>" . esc_html__( 'Buy On Amazon', 'gizzmo-ai' ) . "</a>";
        $html .= "</div>";
        $html .= "</div>";
    }

    $product_list_html = "<div class='products_list'>" . $html . "</div><br><br>";



    $content .= $product_list_html;

    $content .= '<p>' . $introduction . '</p>';



    #echo $asin_json_res['data'];

    #loop through the json asin_json_res and create a 
    

    foreach ($product_in_roundup as $product) {

        $AffiliateLink = "https://" . $product['source'] . "/dp/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;
        $reviews_link = "https://" . $product['source'] . "/product-reviews/" . $product['asin'] . "/?tag=" . $asin_affiliate_tag;

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
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'post'
        )
    );



    
    //check if the post_categories_array is not empty
    //if it is not empty, then set the post categories
    if (!empty($post_categories_array)) {
        wp_set_post_categories($post_id, $post_categories_array);
    }
    
    //insert post tags
    //check if the $asin_json has post_tags
    //if it does, then implode the array into a string
    //then set the post tags
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




    if ($focus_keyphrase == "-") {
        $focus_keyphrase = "";
    }
    if ($original_keyphrase == "-") {
        $original_keyphrase = "";
    }

    update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_Description);
    update_post_meta($post_id,'_yoast_wpseo_focuskw',$original_keyphrase);

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

function gizzmo_ai_get_tld($domain) {

    $array = parse_url($domain);

    return $array["host"];
}

 
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

    

    #echo $json_data;

    #roy
    $log_post_data_enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_website_categories';
     
    $res = gizzmo_ai_make_post_json_request($log_post_data_enpoint_url, $data);



    //echo $res;
    

    //echo "categories: " . $categories;

    //$output = '';
  
    //if ( ! empty( $categories ) ) {
    //  foreach ( $categories as $category ) {
    //    echo "category: " . $category->name;
        //$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>, ';
    //  }
  
      //$output = trim( $output, ', ' );
    //}
    
    //echo $output;

    //return $output;
}
  
//gizzmo_ai_get_post_categories('1');

function gizzmo_ai_create_product_review_post($asin, $asin_affiliate_tag, $website_id, $selected_similar_post_ids,$product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion)
{
    if ($connect_categories == 'yes') {
        gizzmo_ai_get_post_categories($website_id);
    }

    echo sprintf( esc_html__( 'connect_categories: %s', 'gizzmo-ai' ), esc_html( $connect_categories ) ) . '<br>';
    echo sprintf( esc_html__( 'create_faqs: %s', 'gizzmo-ai' ), esc_html( $create_faqs ) ) . '<br>';
    echo sprintf( esc_html__( 'create_pros_cons: %s', 'gizzmo-ai' ), esc_html( $create_pros_cons ) ) . '<br>';
    echo sprintf( esc_html__( 'create_conclusion: %s', 'gizzmo-ai' ), esc_html( $create_conclusion ) ) . '<br>';
    echo sprintf( esc_html__( 'create_tags: %s', 'gizzmo-ai' ), esc_html( $create_tags ) ) . '<br>';
    echo sprintf( esc_html__( 'create_schema: %s', 'gizzmo-ai' ), esc_html( $create_schema ) ) . '<br>';
    echo sprintf( esc_html__( 'selected_carousels: %s', 'gizzmo-ai' ), esc_html( $selected_carousels ) ) . '<br>';



    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_analyzed_asin_data/' . $website_id . ',' . $asin;
    if ($product_keyphrase != '') {
        #replace all spaces with %20
        $product_keyphrase = str_replace(' ', '%20', $product_keyphrase);
        $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_analyzed_asin_data_with_keyphrase_seo/' . $website_id . ',' . $asin . ',' . $product_keyphrase;
    }
    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);

    $asin_json = $asin_json_res['data'];


    $post_categories = $asin_json['wordpress_categories'];

    $post_title = $asin_json['title'];
    $meta_description = $asin_json['meta_description'];
    $post_featured_image = $asin_json['featured_image'];
    $asin_source = $asin_json['source'];

    
    $asin_link = 'https://' . $asin_source . '/dp/' . $asin . '?tag=' . $asin_affiliate_tag;
    if ($package_type = 'Free') {
        $asin_link = 'https://' . $asin_source . '/dp/' . $asin;
    }
    // read the html file from html_parts folder
    $content = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/product_review_default.html');



    if ($package_type = 'Enterprise') {
        $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
        $content = $gizzmo_enterprise . $content;
    }



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


    if ($create_conclusion = 'yes') {
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
    else
    {
        $content = str_replace('{{Conclusion_Title}}', '', $content);
        $content = str_replace('{{Conclusion_Text}}', '', $content);
    }

    

    if ($create_pros_cons = 'yes') {
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
    } else {
        $content = str_replace('{{pros_list}}', '', $content);
        $content = str_replace('{{cons_list}}', '', $content);
        $content = str_replace('<h2>Pros:</h2>', '', $content);
        $content = str_replace('<h2>Cons:</h2>', '', $content);
    }


    if ($create_faqs = 'yes') {
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
    } else {
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
            $section_html .= '<a rel="nofollow sponsored" target="_blank" href="' . $asin_link . '">';

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
            $section_html .= esc_html__( 'Credit - Amazon.com', 'gizzmo-ai' );
            $section_html .= '</div>';
            $section_html .= '</a>';
            $section_html .= '</figure>';
        }

        if ($index < 3) {
            $section_html .= '<div class="is-layout-flex wp-block-buttons">';
            $section_html .= '<div class="wp-block-button">';
            $section_html .= '<a rel="nofollow sponsored" class="wp-block-button__link" target="_blank" href="' . $asin_link . '">' . esc_html__( 'Buy On Amazon', 'gizzmo-ai' ) . '</a>';
            $section_html .= '</div>';
            $section_html .= '</div>';
        }
        $section_html .= '<p>' . $section['text'] . '</p>';

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
        $c = str_replace('{{Carousel_Bottom}}', '', $content);
    }

    if ($carousel_bottom_filled == "false") {
        $content = str_replace('{{Carousel_Bottom}}', '', $content);
    }
    if ($carousel_top_filled == "false") {
        $content = str_replace('{{Carousel_Top}}', '', $content);
    }
 
    
    





    //add a script to the end of the content
    
    
    
    
    //if meta description is longer than 160 characters, trim it to 160 characters
    if (strlen($meta_description) > 130) {
        $meta_description = substr($meta_description, 0, 127) . "...";
    }


    

    //add the post categories
    if ($connect_categories == "yes") {
        $post_categories_array = array();
        $post_categories = $asin_json['wordpress_categories'];
        if ($post_categories != '') {
            $post_categories_array = explode(',', $post_categories);
        }
    } else {
        $post_categories_array = array();
    }
     
    
    


    $post_id = wp_insert_post(
        array(
            'post_title' => $post_title,
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

    if ($package_type = 'Free') {
        $focus_keyphrase = "";
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
    


    //make a post request to the api to save the new post data to the database
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

function gizzmo_ai_create_general_post($asins, $asin_affiliate_tag, $website_id, $selected_topic, $product_keyphrase,$package_type)
{

    $selected_topic = str_replace(' ', '%20', $selected_topic);
    $selected_topic = str_replace(',', '', $selected_topic);
    
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

    $enpoint_url = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_general_post_data/' . $website_id . ',' . $asins . ',' . $selected_topic . ',' . $product_keyphrase;


    #echo $enpoint_url;

    $asin_json_res = gizzmo_ai_make_get_request($enpoint_url);
    
    #read the json from a file in the html_parts folder, the file called "data.json" then convert to json object
    #$json_string = gizzmo_ai_read_file(plugin_dir_path(dirname(__FILE__)) . 'html_parts/data.json');
    #$asin_json_res = json_decode($json_string, true);


    $post_title = $asin_json_res['blog_title'];
    $meta_description = $asin_json_res['meta_description'];
    
    $post_featured_image = $asin_json_res['featured_image'];

    $smilar_products_carousel_asin = $asin_json_res['smilar_products_carousel_asin'];
    $content = "";

    if ($package_type = 'Enterprise') {
        $gizzmo_enterprise = "<div id='gizzmo_enterprise'></div>";
        $content = $gizzmo_enterprise . $content;
    }

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
        $asin_link = '';
        if ($smilar_products_carousel_asin != '')
        {
            $asin_link = 'https://' . $asin_source . '/dp/' . $smilar_products_carousel_asin . '?tag=' . $asin_affiliate_tag;
        }

        if ($image_src != '')
        {
            $image_html ='';
            $image_html .= '<figure class="wp-block-image size-large">';
            if ($asin_link != '')
            {
                $image_html .= '<a rel="nofollow sponsored" target="_Blank" href="' . $asin_link . '">';
            }
            else
            {
                $image_html .= '<a href="' . $image_src . '">';
            }

            $image_html .= '<img decoding="async" src="' . $image_src . '" alt="' . $image_src . '" class="wp-image-840" />';
            
            $image_html .= '<div class="post-meta-items meta-below gizzmo_img_credit" style="position: relative; top: -46px; z-index: 100000; background-color: #33333373; color: #fff; font-size: 12px; padding-left: 10px; width: 50%;">';
            $image_html .= esc_html__( 'Credit - Amazon.com', 'gizzmo-ai' );
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
            if ($smilar_products_carousel_asin != '')
            {
                $similar_items_iframe = '<div class="gizzmo_section" style="padding-top: 20px;padding-bottom: 20px;"><iframe src="https://client.gizzmo.ai/carousel/index.html?wid='. $website_id .'&asin='. $smilar_products_carousel_asin .'&affid='. $asin_affiliate_tag .'&type=similar_items" style="width: 100%; height: 323px; border: none;" scrolling="no"></iframe></div>';
                $content .= $similar_items_iframe;
            }
        }

        //
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
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'post'
        )
    );


    //check if the post_categories_array is not empty
    //if it is not empty, then set the post categories
    if (!empty($post_categories_array)) {
        wp_set_post_categories($post_id, $post_categories_array);
    }



    //insert post tags
    //check if the $asin_json has post_tags
    //if it does, then implode the array into a string
    //then set the post tags
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
    





    update_post_meta($post_id,'_yoast_wpseo_metadesc',$meta_description);
    update_post_meta($post_id,'_yoast_wpseo_focuskw',$seo_keyphrase);
    
     

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
 
function gizzmo_ai_string_similarity($string1, $string2) {
    $string1 = strtolower($string1);
    $string2 = strtolower($string2);

    $string1_length = strlen($string1);
    $string2_length = strlen($string2);

    $matrix = array();

    for ($i = 0; $i <= $string1_length; $i++) {
        $matrix[$i] = array($i);
    }

    for ($j = 0; $j <= $string2_length; $j++) {
        $matrix[0][$j] = $j;
    }

    for ($i = 1; $i <= $string1_length; $i++) {
        for ($j = 1; $j <= $string2_length; $j++) {
            $cost = ($string1[$i - 1] == $string2[$j - 1]) ? 0 : 1;

            $matrix[$i][$j] = min(
                $matrix[$i - 1][$j] + 1,
                $matrix[$i][$j - 1] + 1,
                $matrix[$i - 1][$j - 1] + $cost
            );
        }
    }

    return 1 - ($matrix[$string1_length][$string2_length] / max($string1_length, $string2_length));
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

if (isset($_POST['create_review']) && wp_verify_nonce( $_POST['_wpnonce'], 'gizzmo' )) {

    $asin =  array_keys(sanitize_text_field($_POST['create_review']))[0];

    $product_name = sanitize_text_field($_POST['product_name_' . $asin]);
    $product_img_url = sanitize_text_field($_POST['img_url_' . $asin]);
    $website_id = absint( sanitize_text_field($_POST['websiteid_' . $asin]) );

    $res = gizzmo_ai_get_new_article_text($website_id, $asin);
    $new_article_text = $res['new_article_text_cleened'];

    $product_caruosel_obj->related_items = $res['related_items'];
    $product_caruosel_obj->similar_items = $res['similar_items'];
    $product_caruosel_obj->compered_items = $res['compered_items'];

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

    #echo $new_article_text . '<br>';
    #echo '<br>';
    #echo '<br>';

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

if (isset($_POST['insert']) && wp_verify_nonce( $_POST['_wpnonce'], 'gizzmo' )) {

    $action_type = sanitize_text_field($_POST['action_type']);
    
    if ($action_type == 'product_roundup') {

        $asins = sanitize_text_field($_POST['roundups_asins']);
        $website_id = absint( sanitize_text_field($_POST['website_id']) );
        $product_keyphrase = sanitize_text_field($_POST['product_review_seo_keyword']);
        if ($product_keyphrase == '') {
            $product_keyphrase = '-';
        }

        $package_type = sanitize_text_field($_POST['package_type']);

        $asins_array = explode(',', $asins);

        //remove empty values
        $asins_array = array_filter($asins_array, function ($value) {
            return $value !== ''; });
        
        
        //echo 'roundup';
        $asin_affiliate_tag = sanitize_text_field($_POST['product_review_affiliate_tag_slct']);
        gizzmo_ai_create_product_roundup_post($asins_array, $asin_affiliate_tag, $website_id, $product_keyphrase,$package_type);

    }
    else if ($action_type == 'general') {

        $website_id = absint( sanitize_text_field($_POST['website_id']) );
        $asin_affiliate_tag = sanitize_text_field($_POST['product_review_affiliate_tag_slct']);
        $selected_topic = sanitize_text_field($_POST['selected_topic']);
        $asins = sanitize_text_field($_POST['general_asins']);
        $product_keyphrase = sanitize_text_field($_POST['product_review_seo_keyword']);
        $package_type = sanitize_text_field($_POST['package_type']);

        //remove empty values
        //$asins_array = explode('-', $asins);
        //$asins_array = array_filter($asins_array, function ($value) {
        //    return $value !== ''; });
        if ($product_keyphrase == '') {
            $product_keyphrase = '-';
        }
        
        //echo 'general';
        gizzmo_ai_create_general_post($asins, $asin_affiliate_tag, $website_id, $selected_topic, $product_keyphrase,$package_type);

    }
    else {
        //echo 'review';

        $asin = sanitize_text_field($_POST['product_review_asin']);
        $website_id = absint( sanitize_text_field($_POST['website_id']) );
        $asin_affiliate_tag = sanitize_text_field($_POST['product_review_affiliate_tag_slct']);
        $selected_similar_post_ids = sanitize_text_field($_POST['selected_similar_post_ids']);
        $product_keyphrase = sanitize_text_field($_POST['product_review_seo_keyword']);
        $selected_carousels = sanitize_text_field($_POST['selected_carousels']);

        $package_type = sanitize_text_field($_POST['package_type']);

        


        $featured_image = sanitize_text_field($_POST['featured_image']);

        if ($asin_affiliate_tag == '' || $asin_affiliate_tag == 'none') {
            $asin_affiliate_tag = 'YourSite-20';
        }


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



        





        gizzmo_ai_create_product_review_post($asin, $asin_affiliate_tag, $website_id, $selected_similar_post_ids, $product_keyphrase,$selected_carousels,$create_schema,$featured_image,$package_type,$create_tags,$connect_categories,$create_faqs,$create_pros_cons,$create_conclusion);
    }
}


?>

<style>
#wpcontent
{
    padding-left:0px !important;
    padding-bottom:0px !important;
}
</style>





<iframe src="<?php echo esc_url($plugin_iframe_path) ?>" frameborder="0" scrolling="auto" style="width:100%; height:100vh; border:none; margin:0; padding:0;"></iframe>


<script>

    (function ($) {

        const data = <?php echo wp_json_encode($similar_posts_obj); ?>;
        const product_caruosel_data = <?php echo wp_json_encode($product_caruosel_obj); ?>;

        

        $( window ).load(function() {

            //make an on click event for the create post button to show the loading message
            $('.create_post_bt').click(function(){
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



            if (data !=null)
            {
                var identifier = data['asin'];
                var type = data['type'];
                var website_id = data['website_id'];
                var product_img_url = data['product_img_url'];
                var product_name = data['product_name'];

                if (identifier !=undefined)
                {
                    if (product_name.length > 50)
                    {
                        product_name = product_name.substring(0, 50) + "...";
                    }
                    if (type == 'review')
                    {

                        $('#selected_product_review_img').css('background-image', 'url(' + product_img_url + ')');
                        $('#selected_product_link_name').html(product_name);
                        $('#product_review_asin').val(identifier);
                        $('#website_id').val(website_id);

                        $("#starter_msg").css("display", "none");
                        $("#review_creation_wrapper").css("display", "block");
                    }

                    
                    
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
                    for (let x in similar_post_list) {

                        has_similar_posts = true;
                        var post_title = similar_post_list[x].post_title;
                        var post_id = similar_post_list[x].post_id;
                        var post_title_long =post_title;
                        if (post_title.length > 35)
                        {
                            post_title = post_title.substring(0, 35) + "...";
                        }

                        var li = document.createElement("li");
                        li.innerHTML = '<input title="' + post_title_long + '" onchange="handleCheckChange(this);" type="checkbox"  class="similar_post_chkbox" name="similar_post" value="'+post_id+'">'+post_title;

                        document.getElementById("similar_posts_ul").appendChild(li);
                        //console.log(similar_post_list[x].post_title + " : "+ similar_post_list[x].post_similarity)
                    }

                    $('#selected_similar_post_ids').val(selected_similar_posts);
                    

                    if (has_similar_posts == true)
                    {
                        $('#similar_found').css('display', 'block');
                        $('#similar_not_found').css('display', 'none');
                    }
                    else
                    {
                        $('#similar_found').css('display', 'none');
                        $('#similar_not_found').css('display', 'block');
                    }
                    
                     

                    if (product_caruosel_data['similar_items']> 0)
                    {
                        var li = document.createElement("li");
                        li.innerHTML = '<input title="Similar Products Carousel" onchange="carousel_handleCheckChange(this);" type="checkbox" class="similar_post_chkbox" name="similar_products_carousel" value="similar_items">Similar Products Carousel';
                        document.getElementById("carousel_options_ul").appendChild(li);
                    }
                    else
                    {
                        var li = document.createElement("li");
                        li.innerHTML = '<input title="Similar Products Carousel Not Available" onchange="carousel_handleCheckChange(this);" type="checkbox" disabled="disabled"  class="similar_post_chkbox" name="similar_products_carousel" value="similar_items"><span style="color:#3333">Similar Products Carousel</span>';
                        document.getElementById("carousel_options_ul").appendChild(li);
                    }


                    if (product_caruosel_data['related_items']> 0)
                    {
                        var li = document.createElement("li");
                        li.innerHTML = '<input title="Related Products Carousel" onchange="carousel_handleCheckChange(this);" type="checkbox"  class="similar_post_chkbox" name="related_products_carousel" value="related_items">Related Products Carousel';
                        document.getElementById("carousel_options_ul").appendChild(li);
                    }
                    else
                    {
                        var li = document.createElement("li");
                        li.innerHTML = '<input title="Related Products Carousel Not Available" onchange="carousel_handleCheckChange(this);" type="checkbox" disabled="disabled"  class="similar_post_chkbox" name="related_products_carousel" value="related_items"><span style="color:#3333">Related Products Carousel</span>';
                        document.getElementById("carousel_options_ul").appendChild(li);
                    }

                    if (product_caruosel_data['compered_items']> 0)
                    {
                        var li = document.createElement("li");
                        li.innerHTML = '<input title="Products Comparison Carousel" onchange="carousel_handleCheckChange(this);" type="checkbox" class="similar_post_chkbox" name="products_comparison_carousel" value="compered_items">Products Comparison Carousel';
                        document.getElementById("carousel_options_ul").appendChild(li);
                    }
                    else
                    {
                        var li = document.createElement("li");
                        li.innerHTML = '<input title="Products Comparison Carousel Not Available" onchange="carousel_handleCheckChange(this);" type="checkbox" disabled="disabled"  class="similar_post_chkbox" name="products_comparison_carousel" value="compered_items"><span style="color:#3333">Products Comparison Carousel</span>';
                        document.getElementById("carousel_options_ul").appendChild(li);
                    }
                     


                }

            }
        });
        

        

    }(jQuery));



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


<!-- Container -->
