<?php
defined('ABSPATH') or die('No script kiddies please!!'); 
$paragraph_template = $artl_settings['layout']['paragraph_template'];
$template_class = 'artl-paragraph-' . $paragraph_template;


?>

<div class="artl-main-wrapper <?php echo esc_attr($template_class); ?>">
    <div class="artl-col-3 artl-col-s-12">
        <div class="artl-feature">
            <div class="artl-feature-background">
                <?php
                if (!empty($artl_settings['layout']['heading_text'])) { ?>
                <div class="artl-heading">
                    <img src="<?php echo ARTL_IMG_DIR . '/paragraphicon.svg'; ?>">
                    <span><?php echo esc_html($artl_settings['layout']['heading_text']); ?></span>
                </div>
                <?php } ?>
                <div class="artl-paragraph">
                    <div class="artl-feature-paragraph">
                        <?php
                        // Count the words and images in the content
                        $wordCount = str_word_count(strip_tags($content));
                        $imageCount = substr_count($content, '<img ');
                        if($comment_include == 1) {
                            $wordCount = $wordCount + $comment_word_count;
                        }
                        // Calculate reading time for text
                        $reading_time_text = round($wordCount / $word_per_minute);
                        $total_time = ceil($reading_time_text + $reading_time_comments);
                        if($image_include == 1) { 
                        // Calculate time for images
                        $image_time_minutes = ($imageCount * $image_per_minute) / 60;
                            
                        // Total reading time including images
                        $total_time = ceil($reading_time_text + $image_time_minutes + $reading_time_comments);
                        }
                        
                        // Replace placeholders in the template
                        $before_replace = $artl_settings['layout']['word_message'];
                        $final_replace = str_replace("[word_count]", '<span class="artl-time">' . $wordCount . '</span>', $before_replace);
                        $len = strlen(strip_tags($content));
                        if($comment_include == 1) {
                            $len = $len + $comment_word_count;
                        }
                        $final_replace = str_replace("[character_count]", '<span class="artl-time">' . $len . '</span>', $final_replace);

                        // Replace [time] with total time
                        $final_replace = str_replace("[time]", '<span class="artl-time">' . $total_time . '</span>', $final_replace);

                        // Replace [image_count] with the number of images
                        $final_replace = str_replace("[image_count]", '<span class="artl-time">' . $imageCount . '</span>', $final_replace);

                        echo nl2br(wp_kses_post($final_replace));
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>