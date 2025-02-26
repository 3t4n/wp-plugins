<?php

namespace imbaa\AffilipusLinkfilter\Output;

class linkFilter {


    public function __construct(){

        add_filter('the_content',[$this,'filter_unpublished_links'],PHP_INT_MAX,1);

    }


    public function get_status_code($url){

        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, true);
        curl_setopt($curlHandle, CURLOPT_NOBODY  , true);  // we don't need body
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curlHandle);
        $response = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
        curl_close($curlHandle); // Don't forget to close the connection


        return $response;

    }

    public function check_url($url){


        if($url == ''){return true;}
        else {$url = strtok($url, "#");}

        $is_url = filter_var($url, FILTER_VALIDATE_URL);

        if(!$is_url){

            if($url[0] == '/'){

                $url = get_option('siteurl').$url;

            }


        }

        $is_url = filter_var($url, FILTER_VALIDATE_URL);

        return $is_url;


    }

    public function filter_unpublished_links($content){

        global $post;
        global $wpdb;


        /** Todo: Enable as soon as global filtering setting is available */

        //if(get_post_meta($post->ID,'_imb_filter_links',true) == 1){//}

            $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";

            if(preg_match_all("/$regexp/siU", $content, $matches)) {


                $temp = [];

                foreach($matches[2] as $key => $match){


                    $temp[$key] = "'".str_replace(["'",'"'],[],$match)."'";


                }


                $checked = [];

                $checked = $wpdb -> get_results("
                    SELECT url, status_code, last_check,id 
                    FROM {$wpdb->prefix}affilipus_linkfilter 
                    WHERE url IN (".implode(',',$temp).");",OBJECT_K);

                foreach($matches[2] as $key => &$match){

                    $url = $this -> check_url($match);

                    if($this -> check_url($match)) {


                        if (isset($checked[$match]) && strtotime($post->post_modified) > strtotime($checked[$match]->last_check)) {

                            $response = $this->get_status_code($url);

                            $wpdb->update(
                                $wpdb->prefix . 'affilipus_linkfilter',
                                array('status_code' => $response, 'url' => $match, 'last_check' => date('Y-m-d H:i:s')),
                                array('id' => $checked[$match]->id),
                                array('%s', '%s', '%s')
                            );


                        }
                        else if (!isset($checked[$match])) {

                            $response = $this->get_status_code($url);

                            $wpdb->insert(
                                $wpdb->prefix . 'affilipus_linkfilter',
                                array(
                                    'status_code' => $response,
                                    'url' => $match
                                ),
                                array(
                                    '%s',
                                    '%s'
                                )
                            );


                        } else {

                            $response = $checked[$match]->status_code;

                        }

                        if ($response == 404 || $response == 0) {

                            $content = str_replace($matches[0][$key], '<span class="future-link response-' . $response . '">' . $matches[3][$key] . '</span>', $content);

                        }

                    }



                }

            }

        return $content;
    }

}