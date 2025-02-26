<div class="wrap">
    <?php
    $args = array('.jpg / .jpeg / .jpe', '.gif', '.svg', '.png', '.bmp', '.tiff / .tif', '.webp', '.ico', '.heic', '.asf / .asx', '.wmv', '.wmx', '.wm', '.avi', '.divx', '.flv', '.mov / .qt', '.mpeg / .mpg / .mpe', '.mp4 / .m4v', '.ogv', '.webm', '.mkv', '.3gp / .3gpp', '.3g2 / .3gp2', '.txt / .asc / .c / .cc / .h / .srt', '.csv', '.tsv', '.ics', '.rtx', '.css', '.htm / .html', '.vtt', '.dfxp', '.mp3 / .m4a / .m4b', '.aac', '.ra / .ram', '.wav', '.ogg / .oga', '.flac', '.mid / .midi', '.wma', '.wax', '.mka', '.rtf', '.js', '.pdf', '.swf', '.class', '.tar', '.zip', '.gz / .gzip', '.rar', '.7z', '.exe', '.psd', '.xcf', '.doc', '.pot / .pps / .ppt', '.wri', '.xla / .xls / .xlt / .xlw', '.xlsx', '.mdb', '.mpp', '.doc', '.docx', '.docm', '.dotx', '.dotm', '.xlsm', '.xlsb', '.xltx', '.xltm', '.xlam', '.pptx', '.pptm', '.ppsx', '.ppsm', '.potx', '.potm', '.onetoc / .onetoc2 / .onetmp / .onepkg', '.ppam', '.sldx', '.sldm', '.oxps', '.xps', '.odt', '.odp', '.ods', '.odg', '.odc', '.odb', '.odf', '.wp / .wpd', '.key', '.numbers', '.pages');
    
    $check_extension = rwut_get_meta_value_by_key( 'rwut_check_extension_key' );
    $check_ex_array  = explode(",", $check_extension);
    ?>
    <div class="tg-heading">
        <h1>Files Extensions & Mime Types</h1>
        <p class="rwut-ext-items"><span class="rwut-ext-title">Total Extensions: </span><strong class="rwut-ext-strong"><?php echo count($args); ?></strong></p>
        <p class="rwut-ext-items"><span class="rwut-ext-title" style="border-color: #0f8000;">Active Extensions: </span><strong class="rwut-ext-strong" style="background: #0f8000;"><?php echo count($check_ex_array); ?></strong></p>
    </div>
    <ul class="subsubsub" style="float: none;">
        <li class="select-all"><a href="javascript:void(0)">Select all</a> |</li>
        <li class="clear-all"><a href="javascript:void(0)">Clear</a></li>
    </ul>
    <form class="form-horizontal" action="" method="post" name="restrict_wp_form" id="restrict_wp_form" enctype="multipart/form-data">
        <div class="input-row">
            <?php
            global $wpdb, $post;
            $posts_meta = "SELECT max(post_id) as postID,`meta_value` FROM `wp_postmeta` WHERE `meta_key` = 'rwut_check_extension_key'";
            $results = $wpdb->get_results($posts_meta, 'ARRAY_A');
            
            foreach ($results as $result) {
                $post_id = $result['postID'];
            }
            $args = array('.jpg / .jpeg / .jpe', '.gif', '.svg', '.png', '.bmp', '.tiff / .tif', '.webp', '.ico', '.heic', '.asf / .asx', '.wmv', '.wmx', '.wm', '.avi', '.divx', '.flv', '.mov / .qt', '.mpeg / .mpg / .mpe', '.mp4 / .m4v', '.ogv', '.webm', '.mkv', '.3gp / .3gpp', '.3g2 / .3gp2', '.txt / .asc / .c / .cc / .h / .srt', '.csv', '.tsv', '.ics', '.rtx', '.css', '.htm / .html', '.vtt', '.dfxp', '.mp3 / .m4a / .m4b', '.aac', '.ra / .ram', '.wav', '.ogg / .oga', '.flac', '.mid / .midi', '.wma', '.wax', '.mka', '.rtf', '.js', '.pdf', '.swf', '.class', '.tar', '.zip', '.gz / .gzip', '.rar', '.7z', '.exe', '.psd', '.xcf', '.doc', '.pot / .pps / .ppt', '.wri', '.xla / .xls / .xlt / .xlw', '.xlsx', '.mdb', '.mpp', '.doc', '.docx', '.docm', '.dotx', '.dotm', '.xlsm', '.xlsb', '.xltx', '.xltm', '.xlam', '.pptx', '.pptm', '.ppsx', '.ppsm', '.potx', '.potm', '.ppam', '.sldx', '.onetoc / .onetoc2 / .onetmp / .onepkg', '.sldm', '.oxps', '.xps', '.odt', '.odp', '.ods', '.odg', '.odc', '.odb', '.odf', '.wp / .wpd', '.key', '.numbers', '.pages');
            for ($n = 0; $n <= count($args)-1; $n++) {
                $check_ex_array = explode(",", $check_extension);
                ?>
                    <label class="container-checkbox"><?php echo esc_html( $args[$n] ); ?>
                        <input type="checkbox" id="check_extension" class="rwut-checkboxes" data-id="check-<?php echo esc_attr($n); ?>" name="check_extension[]" <?php if (in_array($args[$n], $check_ex_array)) { echo esc_html(" checked"); } ?> value="<?php echo esc_attr($args[$n]); ?>">
                        <span class="checkmark"></span>
                    </label>
                <?php
            } ?>
        </div>
        <button type="submit" id="submit" name="save" value="Submit" class="btn-submit">Submit</button>
        <div class="spinner"></div>
    </form>
</div>