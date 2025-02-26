<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$article_data                = addlly_get_article_by_id($id);
$article_data                = isset($article_data['data']) ? $article_data['data'] : array();
$articleContent              = isset($article_data->article_html) ? $article_data->article_html : array();

$countHeadings               = addlly_countHeadings_from_string($articleContent);
$countWords                  = addlly_countWords_from_string($articleContent);
$SEO_score_response          = isset($article_data->SEO_score_response) ? $article_data->SEO_score_response : array();

$word_score = $related_keywords_score = 0;
if(isset($SEO_score_response['data'])){
    $word_seo_score               = isset($SEO_score_response['data']['Word count']['SEO Score']) ? $SEO_score_response['data']['Word count']['SEO Score'] : '';
    $word_max_seo_score           = isset($SEO_score_response['data']['Word count']['Max SEO score available']) ? $SEO_score_response['data']['Word count']['Max SEO score available'] : '';
    $keywords_seo_score           = isset($SEO_score_response['data']['Related keywords']['SEO Score']) ? $SEO_score_response['data']['Related keywords']['SEO Score'] : array();
    $keywords_max_seo_score       = isset($SEO_score_response['data']['Related keywords']['Max SEO score available']) ? $SEO_score_response['data']['Related keywords']['Max SEO score available'] : array();
    $related_keywords_found       = isset($SEO_score_response['data']['Related keywords']['Related keywords found']) ? explode(',',$SEO_score_response['data']['Related keywords']['Related keywords found']) : array();
    $related_keywords_not_found   = isset($SEO_score_response['data']['Related keywords']['Related keywords not found']) ? explode(',',$SEO_score_response['data']['Related keywords']['Related keywords not found']) : array();
    $word_score                   = round(($word_seo_score * 100) / $word_max_seo_score);
    $related_keywords_score       = round(($keywords_seo_score * 100) / $keywords_max_seo_score);
    
}
?>
<div class="toggle-sidebar">
    <svg style="height: 0px;"><defs><linearGradient id="progressive-gradient" gradientTransform="rotate(90)"><stop offset="0%" stop-color="#00F"></stop><stop offset="100%" stop-color="#F00"></stop></linearGradient></defs></svg>
    <div class="content-score">
        <h3 class="text-start d-flex">
            <?php esc_html_e('SEO score', 'addlly'); ?>
            <div class="infoIconSvg" data-bs-toggle="tooltip" title="Valid only for articles generated in 'English'" data-placement="right">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
            </div>
        </h3>
        <div class="countsGraph">
            <div class="word-count">
                <h4><?php esc_html_e('Heading and Word Count', 'addlly'); ?></h4>
                <div class="heading-summary d-flex">
                    <div class="heading-counts">
                        <p class="h1-count"><?php echo isset($countHeadings['h1']) ? esc_html($countHeadings['h1']) : 0; ?></p>
                        <h6 class="fw-bolder"><?php esc_html_e('H1', 'addlly'); ?></h6>
                    </div>
                    <div class="heading-counts">
                        <p class="h2-count"><?php echo isset($countHeadings['h2']) ? esc_html($countHeadings['h2']) : 0; ?></p>
                        <h6 class="fw-bolder"><?php esc_html_e('H2', 'addlly'); ?></h6>
                    </div>
                    <div class="heading-counts">
                        <p class="h3-count"><?php echo isset($countHeadings['h3']) ? esc_html($countHeadings['h3']) : 0; ?></p>
                        <h6 class="fw-bolder"><?php esc_html_e('H3', 'addlly'); ?></h6>
                    </div>
                    <div class="heading-counts">
                        <p class="word-counts"><?php echo esc_html($countWords); ?></p>
                        <h6 class="words-count"><?php esc_html_e('Word Count', 'addlly'); ?></h6>
                    </div>
                </div>
                <div class="progress-bars">
                    <div class="mt-3 justify-content-center row">
                      <div class="col-6">
                        <div class="progress-bar-container position-relative">
                        <svg class="CircularProgressbar" viewBox="0 0 100 100" data-test-id="CircularProgressbar">
                            <path class="CircularProgressbar-trail" d="
                              M 50,50
                              m 0,-47.5
                              a 47.5,47.5 0 1 1 0,95
                              a 47.5,47.5 0 1 1 0,-95
                            "stroke-width="5" fill-opacity="0" style="stroke-dasharray: 298.451px, 298.451px; stroke-dashoffset: 0px;"></path>
                            <path class="CircularProgressbar-path" d="
                              M 50,50
                              m 0,-47.5
                              a 47.5,47.5 0 1 1 0,95
                              a 47.5,47.5 0 1 1 0,-95
                            "stroke-width="5" fill-opacity="0" style="stroke: url(&quot;#progressive-gradient&quot;); height: 100%; stroke-dasharray: 298.451px, 298.451px; stroke-dashoffset: <?php echo esc_attr((100 - $word_score)*3.316125) ?>px;"></path>
                        </svg>
                        <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                            <h3 class="mb-0"><?php echo esc_html($word_score); ?>%</h3>
                            <p>Word Score</p>
                        </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="progress-bar-container position-relative">
                          <svg class="CircularProgressbar" viewBox="0 0 100 100" data-test-id="CircularProgressbar">
                            <path class="CircularProgressbar-trail" d="
                              M 50,50
                              m 0,-47.5
                              a 47.5,47.5 0 1 1 0,95
                              a 47.5,47.5 0 1 1 0,-95
                            " stroke-width="5" fill-opacity="0" style="stroke-dasharray: 298.451px, 298.451px; stroke-dashoffset: 0px;"></path>
                            <path class="CircularProgressbar-path" d="
                              M 50,50
                              m 0,-47.5
                              a 47.5,47.5 0 1 1 0,95
                              a 47.5,47.5 0 1 1 0,-95
                            " stroke-width="5" fill-opacity="0" style="stroke: url(&quot;#progressive-gradient&quot;); height: 100%; stroke-dasharray: 298.451px, 298.451px; stroke-dashoffset: <?php echo esc_attr((100 - $related_keywords_score)*3.316125) ?>px;"></path>
                          </svg>
                          <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                            <h3 class="mb-0"><?php echo esc_html($related_keywords_score); ?>%</h3>
                            <p><?php esc_html_e('Related Keywords', 'addlly'); ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="related-keywords">
                <h4><?php esc_html_e('Related keywords', 'addlly'); ?></h4>
                <div class="tags">
                    <?php 
                    if(isset($related_keywords_found) && !empty($related_keywords_found)){
                        foreach($related_keywords_found as $related_keyword){ ?>
                            <div class="tag status-success"><?php echo esc_html($related_keyword); ?></div>
                        <?php } ?>
                    <?php } 

                    if(isset($related_keywords_not_found) && !empty($related_keywords_not_found)){
                        foreach($related_keywords_not_found as $related_keyword_not_found){ ?>
                            <div class="tag status-danger"><?php echo esc_html($related_keyword_not_found); ?></div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>