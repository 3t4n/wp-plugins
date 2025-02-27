<?php
defined('ABSPATH') || die('Cheating\' uh?');
add_action('wp_ajax_verify_highcompress_process_images', 'verify_highcompress_process_images');
function verify_highcompress_process_images()
{

    
    if (!current_user_can('manage_options')) {
        wp_send_json_error(array('message' => 'Access Denied'), 401);
    }


    if (isset($_POST['process'])) {
        $html="";

        function get_images_count_from_wp()
        {
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
            $offset=get_option('HIGHCOMPRESS_TOTAL_COUNT');
            $args = array(
                'post_type' => 'attachment',
                'post_mime_type' => 'image/jpeg,image/jpg,image/png',
                'post_status' => 'inherit',
                'posts_per_page' => 1,
                'offset'=> $offset,
                'orderby' => 'id',
                'order' => 'ASC'
                );
            $query_images = new WP_Query($args);
            $images = array();
            foreach ($query_images->posts as $image) {
                $images[]= $image->guid;
            }
            return $images[0];
        }

        function do_highcompress_backup($img)
        {
            $upload = wp_upload_dir();
            $upload_dir=trailingslashit($upload['basedir']);
            $upload_dir=$upload_dir.'highcompress_backup';
            $base_address=explode("/", $img);
            $counts=count($base_address);
            $base_addressnew="";
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

        function update_compress_count()
        {
            update_option('HIGHCOMPRESS_TOTAL_COUNT', get_option('HIGHCOMPRESS_TOTAL_COUNT')+1, '', 'yes');
        }
        function display_images_from_media_library()
        {
            try {
                $img = get_images_from_media_library();
         
                $base_addressnew="";
                $html="";

                if (strlen($img)==0) {
                    return $html;
                }
                $base_address=explode("/", $img);
                $imgr =  @file_get_contents($img);
         
                $counts=count($base_address);
                for ($i=0;$i<$counts-1;$i++) {
                    $base_addressnew.=$base_address[$i].'/';
                }
                for ($i=0;$i<$counts;$i++) {
                    $filename=$base_address[$i];
                }
                if ($imgr === false) {
                    update_compress_count();
                    $html="<div class='outrow'><span style='display: flex;flex:1;align-items: center;'><img src=\"".esc_url($img)."\" width=\"50px\" height=\"50px\"> ".esc_html($filename)."</span><b style='flex:1;display: flex !important;justify-content: space-around;'> Before: <font color=\"#f34a00\">".esc_html(0)."</font> After: <font color=\"#88bb41\">".esc_html(0)."</font>Compression :0%</b></span><span style='display: flex;flex:1;    justify-content: flex-end;'><a href=\"#\" onclick=\"return false;\" class=\"buttons\" style=\"color:red;\">File not found!</a> </span></div>";
                    echo wp_kses_post($html);
                    return;
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
                        echo esc_textarea($status);
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
                            $html="<div class='outrow'><span style='display: flex;flex:1;align-items: center;'><img src=\"".esc_url($img)."\" width=\"50px\" height=\"50px\">".esc_html($filename)." </span><b style='flex:1;display: flex !important;justify-content: space-around; '> Before: <font color=\"#f34a00\">".esc_html($beforesize)."</font>After: <font color=\"#88bb41\">".esc_html($size)."</font>Compression : ".esc_html($percent)." %</b></span> <span style='display: flex;flex:1;    justify-content: flex-end;'><a  href=\"#\" class=\"buttons\" onclick=\"return false;\">Compressed</a></span></div>";
                            echo wp_kses_post($html);
                            $base_addressnew="";
                        } else {
                            $TSB=get_option('HIGHCOMPRESS_TOATAL_Size_BEFORE');
                            $TSA= get_option('HIGHCOMPRESS_TOATAL_Size_AFTER');
                            $TSB= $TSB+$res["before_size"];
                            $TSA=$TSA+$res["before_size"];
                            update_option('HIGHCOMPRESS_TOATAL_Size_BEFORE', $TSB, 'yes');
                            update_option('HIGHCOMPRESS_TOATAL_Size_AFTER', $TSA, 'yes');
                            update_compress_count();
                            $beforesize=filesize_formatted_convert_size($res["before_size"]);
                            $newfile=substr($filename, 0, 10);
                            $html="<div class='outrow'><span style='display: flex;flex:1;align-items: center;'><img src=\"".esc_url($img)."\" width=\"50px\" height=\"50px\"> ".esc_html($filename)."</span><b style='flex:1;display: flex !important;justify-content: space-around;'> Before: <font color=\"#f34a00\">".esc_html($beforesize)."</font>After: <font color=\"#88bb41\">".esc_html($beforesize)."</font>Compression :0%</b></span><span style='display: flex;flex:1;    justify-content: flex-end;'><a href=\"#\" onclick=\"return false;\" class=\"buttons\" style=\"color:green;\">Already Optimised!</a> </span></div>";
                            echo wp_kses_post($html);
                            $base_addressnew="";
                        }
                    } else {
                        
                    }
                }
            } catch (exception $e) {
                $TSB=get_option('HIGHCOMPRESS_TOATAL_Size_BEFORE');
                $TSA= get_option('HIGHCOMPRESS_TOATAL_Size_AFTER');
                $TSB= $TSB+0;
                $TSA=$TSA+0;
                update_option('HIGHCOMPRESS_TOATAL_Size_BEFORE', $TSB, 'yes');
                update_option('HIGHCOMPRESS_TOATAL_Size_AFTER', $TSA, 'yes');
                $html="<div class='outrow'><span style='display: flex;flex:1;align-items: center;'><img src=\"".esc_url($img)."\" width=\"50px\" height=\"50px\"> ".esc_html(0)."</span><b style='flex:1;display: flex!important;justify-content: space-around;'> Before: <font color=\"#f34a00\">".esc_html(0)."</font> After: <font color=\"#88bb41\">".esc_html(0)."</font>Compression :0%</b></span><span style='display: flex;flex:1;    justify-content: flex-end;'><a href=\"#\" onclick=\"return false;\" class=\"buttons\" style=\"color:green;\">Already Optimised!</a> </span></div>";
                echo wp_kses_post($html);
                $base_addressnew="";
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

    if (isset($_POST['fetch'])) {
        function get_images_count_from_wp()
        {
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


        function filesize_formatted_convert_size($sz)
        {
            $size = $sz;
            $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
            $power = $size > 0 ? floor(log($size, 1024)) : 0;
            return number_format($size / pow(1024, $power), 2, '.', '.') . ' ' . $units[$power];
        }

        $offset=get_option('HIGHCOMPRESS_TOATAL_IMAGES');
        $hcount=get_option('HIGHCOMPRESS_TOTAL_COUNT');
        $TSA=get_option('HIGHCOMPRESS_TOATAL_Size_AFTER');
        $TSA=size_format($TSA, 2);

        $newcount=get_images_count_from_wp();

        if ($newcount<$hcount) {
            update_option('HIGHCOMPRESS_TOTAL_COUNT', $newcount, '', 'yes');
            $hcount=get_option('HIGHCOMPRESS_TOTAL_COUNT');
        }

        $total_size=get_option('HIGHCOMPRESS_TOATAL_Size_BEFORE');
        $total_size=size_format($total_size, 2);
        update_option('HIGHCOMPRESS_TOATAL_IMAGES', $newcount, '', 'yes');
        $offset=get_option('HIGHCOMPRESS_TOATAL_IMAGES');
        $total_sizes_p=get_option('HIGHCOMPRESS_TOATAL_Size_BEFORE');
        $TSAS=get_option('HIGHCOMPRESS_TOATAL_Size_AFTER');
        if ($total_size!=0) {
            $percents=round(($TSAS/$total_sizes_p)*100, 0);
        } else {
            $percents=0;
        }
        echo($total_size."℧".$offset."℧".$hcount."℧".$TSA."℧".$percents);
    }

    if (isset($_POST['settype'])) {
        $sizess=get_option('HIGHCOMPRESS_FILE_TYPE');

        foreach ($sizess as $value) {
            if ($value[1]=="1") {
                $sizes[]=$value[0];
            }
        }
        $type=sanitize_text_field($_POST['type']);

        $sizesr = get_option('HIGHCOMPRESS_FILE_TYPE');
        $arrlength = count($sizesr);


        for ($i=0;$i<$arrlength;$i++) {
            if ($sizesr[$i][0]=="$type") {
                if ($sizesr[$i][1]==1) {
                    $sizesr[$i][1]=0;
                } else {
                    $sizesr[$i][1]=1;
                }
            }
        }

        update_option('HIGHCOMPRESS_FILE_TYPE', $sizesr, '', 'yes');
    }
    die();
}
