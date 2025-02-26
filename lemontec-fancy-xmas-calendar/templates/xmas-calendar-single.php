<?php get_header();

// VARS
$plugin_url = LMT_XMAS_CALENDAR_PATH;
$current_month_day = date("j");
$options = get_option( 'lmt_xmas_calendar_settings' );

if($options['lmt_xmas_calendar_text_field_0']) {
    $current_month_day = $options['lmt_xmas_calendar_text_field_0'];
}

if($current_month_day != get_the_title()) {
    $url = get_site_url().'/xmas-calendar';
    wp_redirect( $url );
    exit;
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
            <?php echo __('Türchen Nr.' , 'lmt-xmas-calendar'); ?><?php the_title();?>
        </h1>
        <div class="xmas_calendar_single_inner">
            <div class="xmas_calendar_single_inner_left">
                <?php the_post_thumbnail();?>
            </div>
            <div class="xmas_calendar_single_inner_right">
                <div class="xmas_calendar_single_content">
                    <?php the_content();?>
                </div>
            </div>
        </div>
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