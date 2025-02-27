<?php
defined('ABSPATH') || die('Cheating\' uh?');

add_action('wp_ajax_verify_highcompress_process_auto', 'verify_highcompress_process_auto');

function verify_highcompress_process_auto()
{
    function autocompress_function_highcompress()
    {
        $html="";

        function get_images_count_from_wp()
        {
            $sizess=get_option('HIGHCOMPRESS_FILE_TYPE');

            foreach ($sizess as $value) {
                if ($value[1]=="1") {
                    $sizes[]=$value[0];
                }
            }
            $query_img_args = array(
                  'post_type' => 'attachment',
                  'post_mime_type' =>array(
                                  'jpg|jpeg|jpe' => 'image/jpeg',

                                  'png' => 'image/png',
                                  ),
                  'post_status' => 'inherit',
                  'posts_per_page' => -1,
                  );
            $query_img = new WP_Query($query_img_args);
            $counter= $query_img->post_count;
            return $counter;
        }

        function get_images_from_media_library()
        {
            $postperpage = get_option('HIGHCOMPRESS_TOATAL_IMAGES');
            $offset = get_option('HIGHCOMPRESS_TOTAL_COUNT');

            $sizes = array('thumbnail', 'medium', 'large','full');

            $a = (int) ($offset / sizeof($sizes));
            $araayoffset = (int) ($offset % sizeof($sizes));
            $args = array(
                'post_type' => 'attachment',
                'post_mime_type' => 'image/jpeg,image/jpg,image/png',
                'post_status' => 'inherit',
                'posts_per_page' => 1,
                'offset' => $a,
                'orderby' => 'id',
                'order' => 'ASC',
            );

            $query_images = new WP_Query($args);
            $images = array();
            if ($query_images->have_posts()) {
                while ($query_images->have_posts()) {
                    $query_images->the_post();
                    foreach ($sizes as $key => $size) {
                        $thumbnails[$key] = wp_get_attachment_image_src(get_the_ID(), $size)[0];
                    }
                    $images = array_merge($thumbnails, $images);
                }
                $images = array_slice($images, $araayoffset, 1);
                return $images[0];
            }
        }

        function do_highcompress_backup($img)
        {
            $upload = wp_upload_dir();
            $upload_dir=trailingslashit($upload['basedir']);
            $upload_dir=$upload_dir.'highcompress_backup';
            $base_addressnew="";

            $base_address=explode("/", $img);
            $counts=count($base_address);


            for ($i=0;$i<$counts-1;$i++) {
                $base_addressnew.=$base_address[$i].'/';
            }

            for ($i=0;$i<$counts;$i++) {
                $filename=$base_address[$i];
            }

            $subdir=substr($base_addressnew, strpos($base_addressnew, "uploads")+7);
            $subdirs=explode("/", $subdir);

            $yeardir=$upload_dir."/".$subdirs[1];
            $finaldir=$yeardir."/".$subdirs[2];


            if (is_dir($upload_dir) === false) {
                mkdir($upload_dir, 0777, true);
            }

            if (is_dir($yeardir) === false) {
                mkdir($yeardir, 0777, true);
            }
            if (is_dir($finaldir) === false) {
                mkdir($finaldir, 0777, true);
            }
            $finaldir=$finaldir."/".$filename;
            copy($img, $finaldir);
        }

        function display_images_from_media_library()
        {
            $img = get_images_from_media_library();

            $base_addressnew="";
            $base_address=explode("/", $img);
            $imgr = file_get_contents($img);
            $html="";
            $counts=count($base_address);
            for ($i=0;$i<$counts-1;$i++) {
                $base_addressnew.=$base_address[$i].'/';
            }
            for ($i=0;$i<$counts;$i++) {
                $filename=$base_address[$i];
            }
            $rule=get_option('HIGHCOMPRESS_AUTOBACKUP_RULE');
            if ($rule=="YES") {
                do_highcompress_backup($img);
            }
            $url="https://highcompress.com/api/compressFaster";
            $body = array(
            'data'    =>$img,
            'api_key' => get_option('HIGHCOMPRESS_API_KEY'),
            'mime'=>pathinfo(parse_url($img)['path'], PATHINFO_EXTENSION),
            'auth'=>get_option('siteurl'),
            'img'=>get_option('HIGHCOMPRESS_TOATAL_IMAGES'),
            'lvl'=>get_option('HIGHCOMPRESS_MODE')
        );
  
            $response = wp_remote_post($url, array('timeout' => 10000,'body' => $body));
            $body = wp_remote_retrieve_body($response);
         
            if (is_wp_error($response)) {
                $error_string = $response->get_error_message();
                update_compress_count();
            } else {
                $res=json_decode($response["body"], true);
                if ($res["status"]=="401") {
                    $status="℧401℧";
                    return;
                }
                if ($res["status"]=="200") {
                    update_option('HIGHCOMPRESS_COUNT', $res["remaining"], '', 'yes');
                    update_compress_count();
                    $path2=substr($base_addressnew, strpos($base_addressnew, "uploads"));
                    $realpath=substr(HIGHCOMPRESS_PATH, 0, strpos(HIGHCOMPRESS_PATH, "plugins"));
                    $realpath=$realpath.$path2;
              
                    if ($res["after_size"] < $res["before_size"]) {
                        $TSB=get_option('HIGHCOMPRESS_TOATAL_Size_BEFORE');
                        $TSA= get_option('HIGHCOMPRESS_TOATAL_Size_AFTER');
                        $TSB= $TSB+$res["before_size"];
                        $TSA=$TSA+$res["after_size"];
                        update_option('HIGHCOMPRESS_TOATAL_Size_BEFORE', $TSB, 'yes');
                        update_option('HIGHCOMPRESS_TOATAL_Size_AFTER', $TSA, 'yes');
                        $percent=round(($res["after_size"]/$res["before_size"])*100, 0);
                        $percent=100-$percent;
                        $size=filesize_formatted_convert_size($res["after_size"]);
                        $beforesize=filesize_formatted_convert_size($res["before_size"]);
                        copy($res["location"], $realpath.$filename);
                        $newfile = substr($filename, 0, 10);
                        $html="<p style='display: flex;justify-content: space-between;align-items: center;'><span style='display: flex;flex:1;align-items: center;'><img src=\"".esc_url($img)."\" width=\"50px\" height=\"50px\">".esc_html($filename)." </span><b style='display: flex;flex:1;'> Before: <font color=\"#f34a00\">".esc_html($beforesize)."</font>&nbsp&nbsp&nbsp&nbsp After: <font color=\"#88bb41\">".esc_html($size)."</font>&nbsp&nbsp&nbsp&nbsp Compression : ".esc_html($percent)." %</b></span> <span style='display: flex;flex:1;    justify-content: flex-end;'><a  href=\"#\" class=\"buttons\" onclick=\"return false;\">Compressed</a></span></p>";
                        $base_addressnew="";
                    } else {
                        $TSB=get_option('HIGHCOMPRESS_TOATAL_Size_BEFORE');
                        $TSA= get_option('HIGHCOMPRESS_TOATAL_Size_AFTER');
                        $TSB= $TSB+$res["before_size"];
                        $TSA=$TSA+$res["before_size"];
                        update_option('HIGHCOMPRESS_TOATAL_Size_BEFORE', $TSB, 'yes');
                        update_option('HIGHCOMPRESS_TOATAL_Size_AFTER', $TSA, 'yes');

                        $beforesize=filesize_formatted_convert_size($res["before_size"]);
                        $newfile=substr($filename, 0, 10);
                        $html="<p style='display: flex;justify-content: space-between;align-items: center;'><span style='display: flex;flex:1;align-items: center;'><img src=\"".esc_url($img)."\" width=\"50px\" height=\"50px\"> ".esc_html($filename)."</span><b style='display: flex;flex:1;'> Before: <font color=\"#f34a00\">".esc_html($beforesize)."</font>&nbsp&nbsp&nbsp&nbsp After: <font color=\"#88bb41\">".esc_html($beforesize)."</font>&nbsp&nbsp&nbsp&nbsp Compression :0%</b></span><span style='display: flex;flex:1;    justify-content: flex-end;'><a href=\"#\" onclick=\"return false;\" class=\"buttons\" style=\"color:green;\">Already Optimised!</a> </span></p>";
                        $base_addressnew="";
                    }
                } else {
                }
            }
        }
        function filesize_formatted_convert_size($sz)
        {
            $size = $sz;
            $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
            $power = $size > 0 ? floor(log($size, 1024)) : 0;
            return number_format($size / pow(1024, $power), 2, '.', '.') . ' ' . $units[$power];
        }


        display_images_from_media_library();
    }
    $rule=get_option('HIGHCOMPRESS_AUTOCOMPRESS_RULE');
    if ($rule=="YES") {
        autocompress_function_highcompress();
    }



    die();
}
