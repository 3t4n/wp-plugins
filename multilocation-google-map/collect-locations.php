<?php
if (!is_admin()) {
    function mgm_replace_new_rows($replace, $str){
        $str=preg_replace("/\r\n/", $replace, $str);
        $str=preg_replace("/\n\r/", $replace, $str);
        $str=preg_replace("/\n/", $replace, $str);
        $str=preg_replace("/\r/", $replace, $str);
        return($str);
    }

    function mgm_clean_double_quotes($string) {
        $string = str_replace('"', "'", $string); // Replaces all spaces with hyphens.
        return $string;
    }
    function mgm_collect_locations(){
        $args = array(
            'post_type' => 'location'
        );
        $location_list = new WP_Query($args);
        if ($location_list->have_posts()) :
            ?>
            <script> var mgm_multilocation_map_locations_arr = [];</script>

            <?php
            while ($location_list->have_posts()) : $location_list->the_post();
                $lat = get_post_meta(get_the_ID(), 'latitude_id', true);
                $lng = get_post_meta(get_the_ID(), 'longitude_id', true);
                $description = get_post_meta(get_the_ID(), 'description_id', true);
                mgm_replace_new_rows("", $description);
                ?>
                <script>
                    var lat = parseFloat("<?php echo $lat; ?>");
                    var lng = parseFloat("<?php echo $lng; ?>");

                    function isInt(n){
                        return Number(n) === n && n % 1 === 0;
                    }

                    function isFloat(n){
                        return Number(n) === n && n % 1 !== 0;
                    }

                    var mgm_multilocation_map_locations_error_msg = false;
                    if(isInt(lat) == false && isFloat(lat) == false)  {
                        mgm_multilocation_map_locations_error_msg = true;
                    }else if(isInt(lng) == false && isFloat(lng) == false)  {
                        mgm_multilocation_map_locations_error_msg = true;
                    }else if(mgm_multilocation_map_locations_error_msg == false){
                        mgm_multilocation_map_locations_arr['<?php the_title() ?>'] = {
                            "lat": "<?php
                                echo $lat;
                                ?>",
                            'lng': "<?php
                                echo $lng;
                                ?>",
                            'description': "<?php
                                echo mgm_clean_double_quotes($description);
                                ?>"
                        };
                    }
                </script>
            <?php endwhile;
        else: endif;
    }

    add_action('wp_footer', 'mgm_collect_locations');
}
?>