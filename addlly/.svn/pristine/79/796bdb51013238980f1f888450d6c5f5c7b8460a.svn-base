<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$article         = addlly_get_article_by_id($id);
$article_data    = isset($article['data']) ? $article['data'] : array();
$fact_checkers   = isset($article_data->search_response) ? $article_data->search_response : array();
?>
<div class="blog-writer-content-block">
    <div class="top-nav-items d-flex justify-content-between flex-wrap gap-4">
        <div class="left-buttons d-flex">
            <div class="d-flex justify-content-center align-items-center">
                <h4 class="auto-fact-heading"><?php esc_html_e('Addlly AI Fact Finder', 'addlly'); ?></h4>
                <div class="infoIconSvg" data-bs-toggle="tooltip" title="<?php esc_html_e('Our tool collates factually correct information from whitelisted resources.', 'addlly'); ?>" data-placement="right">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
                </div>
            </div>
        </div>
        <div class="right-buttons d-flex">
            <button type="button" class="blog-btn full-screen-btn">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z"></path></svg>
            </button>
        </div>
    </div>
    <div class="content-area-block factChecker">
        <div class="content-area position-relative">        
            <div class="editableTextArea d-flex overflow-hidden position-relative factChecker">
                <div class="row">
                    <div class="col-xl-12" style="width: 100%;">
                        <div class="preview-container fact-checker-preview px-4">
                            <?php
                            if(isset($fact_checkers) && !empty($fact_checkers)){
                                foreach($fact_checkers as $key => $fact_checker){ 
                                    if($key == 3) break;
                                    ?>
                                    <div class="py-3 cards" style="overflow: auto;">
                                        <div class="url-wrapper">
                                            <span class="link-content">
                                                <div class="d-flex align-items-end mb-1">
                                                    <div class="link-image">
                                                        <img src="https://www.realsimple.com/favicon.ico" alt="">
                                                    </div>
                                                    <div>
                                                        <p>
                                                            <?php echo esc_html(addlly_get_domain_from_url($fact_checker['url'])); ?>
                                                            <span class="p-2">
                                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" class="text-primary" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z"></path>
                                                                    <path d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z"></path>
                                                                </svg>
                                                            </span>
                                                        </p>
                                                        <a class="linkUrl" href="<?php echo esc_url($fact_checker['url']); ?>" target="_blanck"><?php echo esc_url($fact_checker['url']); ?></a>
                                                    </div>
                                                </div>
                                                <h3 class="fw-bold"><?php echo esc_html($fact_checker['title']); ?></h3>
                                            </span>
                                        </div>
                                        <p class="desc-content mw-100"><?php echo esc_html($fact_checker['description']); ?></p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>