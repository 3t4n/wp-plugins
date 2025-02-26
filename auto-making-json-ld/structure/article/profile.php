<?php

if (!defined('ABSPATH')) exit;

// profile

if (!function_exists('amJL_profile')){
    function amJL_profile(){
      global $post;
      $author_data = get_userdata($post->post_author);
  
      $amJL_logo["@context"] = "http://schema.org/";
      $amJL_logo["@type"] = "ProfilePage";
      $amJL_logo["dateCreated"] = get_the_date(DATE_ISO8601);
      $amJL_logo["dateModified"] = get_the_modified_date(DATE_ISO8601);
      $amJL_logo["mainEntity"] = array(
          "@type" => "Person",
          "name" => $author_data->display_name,
          "alterName" => array(
              get_option('alterName'),
              home_url('/')
          )
      );
  
      $site_icon = get_site_icon_url();
  
      if(amJL_check_url_existence(get_option('author_image'))){
        $amJL_logo["mainEntity"]["image"] = get_option('author_image');
      }else if(amJL_check_url_existence($site_icon)){
        $amJL_logo["mainEntity"]["image"] = $site_icon;
      }
  
      $amJL_logo["mainEntity"]["sameAs"] = array();
      for($i=1; $i<=10; $i++){
          ${"url".$i} = get_option("url$i");
          if (${"url".$i} !== '') $amJL_logo["mainEntity"]["sameAs"][] = ${"url".$i};
      }
  
      $profile_check = (int)get_option('profile_check');
  
      $https = sanitize_text_field(filter_input(INPUT_SERVER, 'HTTPS'));
      $permalink = ( isset($https) && $https !== '' ? "http://" : "https://") .sanitize_text_field(filter_input(INPUT_SERVER, 'HTTP_HOST')) . sanitize_text_field(filter_input(INPUT_SERVER, 'REQUEST_URI'));
  
      if($profile_check === 1 && $permalink === $url1){
        echo "<!-- Profile page -->\n";
        echo '<script type="application/ld+json">'."\n";
        echo wp_json_encode($amJL_logo);
        echo "\n".'</script>'."\n";
      }
    }
  }
  
  add_action('wp_head', 'amJL_profile', 1);