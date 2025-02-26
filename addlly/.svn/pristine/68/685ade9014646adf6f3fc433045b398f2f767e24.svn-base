<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$article           = addlly_get_article_by_id($id, 'API');
$article_data      = isset($article['data']) ? $article['data'] : array();
$popular_hashtags  = isset($article_data->popular_hashtags) ? $article_data->popular_hashtags : '';

if ($active_tab == 'linkedIn') {
    $content  = isset($article_data->linkedIn_post) ? $article_data->linkedIn_post : '';
}else if ($active_tab == 'facebook') {
    $content  = isset($article_data->facebook_post) ? $article_data->facebook_post : '';
}else if ($active_tab == 'twitter') {
    $content  = isset($article_data->twitter_post) ? $article_data->twitter_post : '';
}else if ($active_tab == 'instagram') {
    $content  = isset($article_data->instagram_post) ? $article_data->instagram_post : '';
}
?>
<div class="blog-writer-content-block">
    <?php
    set_query_var('id', $id);
    set_query_var('active_tab', $active_tab);
    addlly_get_template_part('one-click-blog-writer/edit/top-navbar');
    addlly_get_template_part('one-click-blog-writer/edit/metadata');
    addlly_get_template_part('one-click-blog-writer/edit/version-history');
    ?>
    <div class="content-area-block d-flex <?php echo esc_attr($active_tab); ?>">
        <div class="content-area position-relative">
            <?php
                echo '<div class="top-header-bar">';
                    if( $content != '' ){
                        echo '<div class="top-buttons d-flex">';

                            if (isset($popular_hashtags) && !empty($popular_hashtags)) {
                                echo '<button disabled="disabled" class="blog-button"># '. esc_html__('hashtags generated', 'addlly') .'</button>';
                            } else {
                                echo '<button class="blog-button generate-hashtag" data-id="' . esc_attr($id) . '" data-type="'. esc_attr($active_tab) .'"># Generate popular hashtags</button>';
                            }
                            echo '<button type="button" class="blog-button copy-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="injected-svg" data-src="'. esc_url(ADDLLY_URL) .'/assets/images/copyIcon.svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="img">
                                    <path d="M11.8323 0H5.11034C4.13392 0 3.3395 0.794414 3.3395 1.77083V1.98817H2.16829C1.19188 1.98817 0.397461 2.78258 0.397461 3.759V14.2292C0.397461 15.2057 1.19188 16.0001 2.16829 16.0001H8.89028C9.86669 16.0001 10.661 15.2057 10.661 14.2292V14.0119H11.8322C12.8087 14.0119 13.6031 13.2175 13.6031 12.2411V1.77083C13.6032 0.794414 12.8087 0 11.8323 0ZM9.51883 14.2292C9.51883 14.5758 9.23684 14.8578 8.89035 14.8578H2.16829C1.82173 14.8578 1.53974 14.5758 1.53974 14.2292V3.75892C1.53974 3.41236 1.82173 3.13037 2.16829 3.13037H8.89028C9.23684 3.13037 9.51876 3.41236 9.51876 3.75892V14.2292H9.51883ZM12.4609 12.2411C12.4609 12.5876 12.1789 12.8696 11.8323 12.8696H10.6611V3.75892C10.6611 2.78251 9.86669 1.98809 8.89035 1.98809H4.48178V1.77075C4.48178 1.42419 4.76377 1.1422 5.11034 1.1422H11.8323C12.1789 1.1422 12.4609 1.42419 12.4609 1.77075V12.2411Z" fill="#0039FF"></path>
                                </svg>
                            </button>';
                    echo '</div>';
                    }
                echo '</div>';
                echo '<div class="text-editor-block" contenteditable="true">' . wp_kses_post($content) . '</div>';
                if ($content != '' && isset($popular_hashtags) && !empty($popular_hashtags)) {
                    echo '<div class="has-tags-block d-flex align-items-center">';
                    foreach ($popular_hashtags as $popular_hashtag) {
                        $activeHash = '';
                        if (strpos($content, '<span class="hash-tag-text">'. $popular_hashtag['tag'] .'</span>') !== false) {
                            $activeHash = 'activeHash';
                        }
                        echo '<div class="hash-tag-post '. esc_attr($activeHash) .'">
                                <span>' . esc_html($popular_hashtag['tag']) . '</span>
                                <p>' . number_format($popular_hashtag['volume']) . ' Followers</p>
                            </div>';
                    }
                    echo '</div>';
                }
            ?>
        </div>
        <?php
        set_query_var('id', $id);
        set_query_var('content', $content);
        if ($active_tab == 'linkedIn') {
            $linkedInPostImage  = isset($article_data->linkedIn_post_img) ? $article_data->linkedIn_post_img : '';
            set_query_var('linkedInPostImage', $linkedInPostImage);
        }else if ($active_tab == 'facebook') {
            $facebookPostImage  = isset($article_data->facebook_post_img) ? $article_data->facebook_post_img : '';
            set_query_var('facebookPostImage', $facebookPostImage);
        }else if ($active_tab == 'twitter') {
            $twitterPostImage  = isset($article_data->twitter_post_img) ? $article_data->twitter_post_img : '';
            set_query_var('twitterPostImage', $twitterPostImage);
        }else if ($active_tab == 'instagram') {
            $instagramPostImage  = isset($article_data->instagram_post_img) ? $article_data->instagram_post_img : '';
            set_query_var('instagramPostImage', $instagramPostImage);
        }
        addlly_get_template_part('one-click-blog-writer/edit/right-sidebar/'. $active_tab); 
        ?>
    </div>
</div>
<?php addlly_get_template_part('one-click-blog-writer/edit/articleImages'); ?>