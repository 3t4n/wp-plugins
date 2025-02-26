<?php
defined('ABSPATH') or die('No script kiddies please!!');
$block_template = $artl_settings['layout']['block_template'];
$template_class = (!empty($_GET['template_class'])) ? sanitize_text_field($_GET['template_class']) : 'artl-block-' . $block_template;
$word_per_minute = $artl_settings['basic']['word_per_minute'];
$imageCount = substr_count($content, '<img ');
?>
<div class="artl-main-wrapper <?php echo esc_html($template_class); ?>">
    <h3 class="artl-main-heading"> <?php echo esc_html($artl_settings['layout']['heading_text']); ?></h3>
    <div class="artl-col-3 artl-col-s-12">
        <div class="artl-feature">
            <div class="artl-feature-section">
                <?php
                $word_status = $artl_settings['layout']['word_enable'];

                if ($word_status == 1) {
                    $blockwordCount = str_word_count(strip_tags($content));
                    if ($comment_include == 1) {
                        $blockwordCount = $blockwordCount + $comment_word_count;
                    }
                    ?>
                    <div class="artl-word">
                        <div class="artl-text1">
                            <?php echo esc_html($blockwordCount); ?>
                        </div>

                        <div class="artl-text2">
                            <?php echo esc_html((!empty($artl_settings['layout']['word_field_label']))) ? esc_html($artl_settings['layout']['word_field_label']) : ''; ?>
                        </div>

                    </div>
                <?php } ?>
                <?php
                $character_status = $artl_settings['layout']['character_enable'];
                if ($character_status == 1) {
                    $blockcharacterlen = strlen(strip_tags($content));
                    if ($comment_include == 1) {
                        $blockcharacterlen = $blockcharacterlen + $comment_word_count;
                    }
                    ?>
                    <div class="artl-character">
                        <div class="artl-text1">
                            <?php echo esc_html($blockcharacterlen); ?>
                        </div>

                        <div class="artl-text2">
                            <?php echo esc_html((!empty($artl_settings['layout']['character_field_label']))) ? esc_html($artl_settings['layout']['character_field_label']) : ''; ?>
                        </div>

                    </div>
                <?php } ?>
                <?php
                $time_status = $artl_settings['layout']['read_enable'];
                if ($time_status == 1) {
                    $readcontent = str_word_count(strip_tags($content));
                    ?>
                    <div class="artl-block-time">
                        <div class="artl-text1">
                            <?php

                            $time = round($readcontent / $word_per_minute);

                            $sec = $readcontent / $word_per_minute;
                            $seconds = number_format($sec,3);
                            $total_time = ceil($time + $reading_time_comments);
                            if ($image_include == 1) {
                                // Calculate time for images
                                $image_time_minutes = ($imageCount * $image_per_minute) / 60;

                                // Total reading time including images
                                $total_time = ceil($time + $image_time_minutes + $reading_time_comments);
                            }
                            if ($total_time == 1) {
                                $total_time .= __(' min', 'article-read-time-lite');
                                echo esc_html($total_time);
                            } elseif ($total_time < 1) {
                                $seconds .= __(' sec', 'article-read-time-lite');
                                echo esc_html($seconds);
                            } else {
                                $total_time .= __(' min', 'article-read-time-lite');
                                echo esc_html($total_time);
                            }


                            ?>
                        </div>

                        <div class="artl-text2">
                            <?php echo esc_html((!empty($artl_settings['layout']['read_field_label']))) ? esc_html($artl_settings['layout']['read_field_label']) : ''; ?>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>