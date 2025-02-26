<?php get_header();

// VARS
$plugin_url = LMT_XMAS_CALENDAR_PATH;
$current_month_day = date("j");
$options = get_option( 'lmt_xmas_calendar_settings' );

if(intval($options['lmt_xmas_calendar_text_field_0'])) {
    $current_month_day = intval($options['lmt_xmas_calendar_text_field_0']);
}

$primary_color = $options['lmt_xmas_calendar_text_field_1'];
$door_string = $options['lmt_xmas_calendar_text_field_2'];
$headline = $options['lmt_xmas_calendar_text_field_3'];
$hashtag = $options['lmt_xmas_calendar_text_field_4'];
$hashtag_url = $options['lmt_xmas_calendar_text_field_5'];
?>

 
<div id="xmas_calendar_main">
    <!-- LET IT SNOW START ;) -->
    <div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div><div class="snowflake"></div>
    <!-- LET IT SNOW END ;) -->
    <section id="xmas_calendar_wrapper">
        <h1>
            <img src="<?php echo esc_url($plugin_url . 'assets/img/headline_logo.png');?>" alt="Headline Logo">
            <?php echo esc_html($headline); ?>
        </h1>
        <ul class="door_list">
            <?php 
            $args = array(
                'post_type' => 'xmas-calendar', 
                'posts_per_page' => -1, 
                'offset' => 0, 
                'order' => 'ASC',
                'orderby'   => 'meta_value_num',
                'meta_query' => array(
                    array('key' => 'lmt_xmas_calendar_order',
                    )
                )
            );
            $posts = get_posts($args);

            $count = 0;
            foreach($posts as $key => $row) : $count++; ?>
            <?php if($current_month_day == $row->post_title) : ?>
            <li class="xmas_door_<?php echo intval($count);?> current_xmas_calendar_day <?php echo esc_html('post_title_' . $row->post_title);?>" onclick=""> 
                <div class="door">
                    <div class="door-front" style="
                        background-image:url(<?php 
                                            if(get_field('lmt_xmas_winn_image', $row->ID)) {
                                                echo esc_url(get_field('lmt_xmas_winn_image', $row->ID)['url']);
                                            } else {
                                                echo esc_url($plugin_url . 'assets/img/demo-doors/' . $row->post_title . '.svg');
                                            }
                                                
                                            ?>), 
                                        url(<?php echo esc_url($plugin_url);?>assets/img/corner.png), 
                                        linear-gradient(225deg, transparent 35px, 
                                        <?php 
                                        if(get_field('lmt_xmas_calendar_bg_color', $row->ID)) { 
                                            the_field('lmt_xmas_calendar_bg_color', $row->ID); 
                                            } else {
                                                echo esc_html('#bc9959');
                                        }?> 20px);
                        ">
                    

                        <div class="xmas_sparkle_wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106 34">
                            <g class="sparkles">
                            <path style="--duration: 2s; --delay: 0s" d="M2.5740361 5.33344622s1.1875777-6.20179466 2.24320232 0c0 0 5.9378885 1.05562462 0 2.11124925 0 0-1.05562463 6.33374774-2.24320233 0-3.5627331-.6597654-3.29882695-1.31953078 0-2.11124925z" />
                            <path style="--duration: 1.5s; --delay: 0.9s" d="M33.5173993 29.97263826s1.03464615-5.40315215 1.95433162 0c0 0 5.17323078.91968547 0 1.83937095 0 0-.91968547 5.51811283-1.95433162 0-3.10393847-.57480342-2.8740171-1.14960684 0-1.83937095z" />
                            <path style="--duration: 1.7s; --delay: 0.4s" d="M69.03038108 1.71240809s.73779281-3.852918 1.39360864 0c0 0 3.68896404.65581583 0 1.31163166 0 0-.65581583 3.93489497-1.39360864 0-2.21337842-.4098849-2.04942447-.81976979 0-1.31163166z" />
                            <path style="--duration: 2.1s; --delay: 1.1s" d="M99.18160965 12.79394657s1.61168639-8.41658446 3.0442965 0c0 0 8.05843194 1.43261013 0 2.86522025 0 0-1.43261011 8.59566072-3.0442965 0-4.83505916-.89538133-4.47690663-1.79076265 0-2.86522025z" />
                            </g>
                        </svg>
                        </div>
                    </div>
                    <a href="<?php echo esc_url($row->guid);?>" class="door-back" 
                        <?php if(get_the_post_thumbnail_url($row->ID)) : ?>
                        style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url($row->ID)); ?>')"
                        <?php endif; ?>
                    >
                        <img src="<?php echo esc_url($plugin_url . 'assets/img/arrow.svg');?>" alt="XMAS-Calendar Link to day <?php echo esc_html($row->post_title);?>">
                    </a>
                </div>
            </li>
            <?php elseif($current_month_day > $row->post_title) : ?>
            <li class="xmas_door_<?php echo intval($count);?> door_locked door_past <?php echo esc_html('post_title_' . $row->post_title);?>">
                <div class="door">
                    <i><?php echo esc_html($row->post_title);?></i>
                    <div class="past_overlay" style="background-color: <?php echo esc_html($primary_color);?>"></div>
                        <div class="door-back" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url($row->ID)); ?>')">         
                            <b><?php echo esc_html($door_string);?></b>
                        </div>
                </div>
            </li>
            <?php else : ?>
            <li class="xmas_door_<?php echo intval($count);?> door_locked <?php echo esc_html('post_title_' . $row->post_title);?>">
                <div class="door">
                    <div class="door-front" style="
                        background-image:url(<?php 
                        if(get_field('lmt_xmas_winn_image', $row->ID)) {
                            echo esc_url(get_field('lmt_xmas_winn_image', $row->ID)['url']);
                        } else {
                            echo esc_url($plugin_url . 'assets/img/demo-doors/' . $row->post_title . '.svg');
                        }
                        ?>);
                        background-color: <?php the_field('lmt_xmas_calendar_bg_color', $row->ID);?>">
                    </div>
                    <a href="<?php echo esc_url($row->guid);?>" class="door-back" style="background-image:url('<?php echo esc_url(get_field('lmt_xmas_winn_image', $row->ID)['url']) ?>')">
                    <?php if(! get_the_post_thumbnail_url($row->ID)) : ?>
                        <b><?php echo esc_html($row->post_title);?></b>
                        <?php endif; ?>
                    </a>
                </div>
            </li>
            <?php endif; ?>
            <?php endforeach;?>
        </ul>
    </section>
    <?php if($options['lmt_xmas_calendar_text_field_8'] != true) : ?>
        <div class="xmas_calendar_footer">
            <a href="<?php echo esc_url($hashtag_url);?>" target="_blank"><?php echo esc_html($hashtag);?></a>        
            <?php if($options['lmt_xmas_calendar_text_field_10']) : ?>
                <img class="xmas_calendar_footer_mobile" src="<?php echo esc_url($options['lmt_xmas_calendar_text_field_10']);?>" alt="XMAS-Calendar Footer image">
            <?php else : ?>
                <img class="xmas_calendar_footer_mobile" style="display:none" src="<?php echo esc_url($plugin_url . 'assets/img/footer-mobile.png');?>" alt="XMAS-Calendar Footer image">
            <?php endif;?>
            
            <?php if($options['lmt_xmas_calendar_text_field_9']) : ?>
                <img class="xmas_calendar_footer_desktop" src="<?php echo esc_url($options['lmt_xmas_calendar_text_field_9']);?>" alt="XMAS-Calendar Footer image">
            <?php else : ?>
                <img class="xmas_calendar_footer_desktop" src="<?php echo esc_url($plugin_url . 'assets/img/footer-desktop.png');?>" alt="XMAS-Calendar Footer image">
            <?php endif;?>
        </div>
    <?php else : ?>
        <br><br><br><br>
    <?php endif;?>
</div>



<?php get_footer() ?>