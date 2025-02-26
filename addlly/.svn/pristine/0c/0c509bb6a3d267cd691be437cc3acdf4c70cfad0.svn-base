<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$article_id = get_post_meta($postid, 'article_id', true);
if( $active_tab == 'reviewArticle' ){
    $history  = addlly_get_review_article_version_history( $article_id, 'Short Article' );
}else{
    $tabs_arr = array(
        'article'      => 'Short Article',
        'faqSchema'    => 'FAQ and Schema Markup',
        'linkedIn'     => 'LinkedIn Post',
        'facebook'     => 'Facebook Post',
        'twitter'      => 'Twitter Post',
        'instagram'    => 'Instagram Post',
        'googleAdCopy' => 'Google Ad Copy'
    );
    $sub_type = isset($tabs_arr[$active_tab]) ? $tabs_arr[$active_tab] : '';
    $history  = addlly_get_version_history( $article_id, $sub_type );
}
if(isset($history['data']) && !empty($history['data'])){ ?>
    <div class="versionNo">
        <?php
        if($sort_by == 'asc'){
            krsort($history['data']);
        }
        foreach($history['data'] as $_data){
            $name            = isset($_data->name) ? $_data->name : 1.0;
            $user_name       = isset($_data->user_name) ? $_data->user_name : '';
            $created_at      = isset($_data->created_at) ? $_data->created_at : '';
            $is_regenerated  = isset($_data->is_regenerated) ? $_data->is_regenerated : 0;
            if( ($is_regenerated == 1 && $filter_by == 'regenerated') || ($filter_by == 'all') ){ ?>
                <div class="versionCards mb-3">
                    <div class="headerV d-flex justify-content-between align-items-center">
                        <div class="currentVersion d-flex align-items-center gap-2">
                            <h4>
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48zm108.25 138.29l-134.4 160a16 16 0 01-12 5.71h-.27a16 16 0 01-11.89-5.3l-57.6-64a16 16 0 1123.78-21.4l45.29 50.32 122.59-145.91a16 16 0 0124.5 20.58z"></path>
                                </svg><?php esc_html_e('Version', 'addlly'); ?> <?php echo esc_html($name); ?>
                            </h4>
                            <?php if($is_regenerated == 1){ ?>
                                <div class="buttonUpgrade d-flex">
                                    <span class="custom-button w-100 border-0 align-items-center justify-content-center text-center undefined btn btn-primary rounded-pill" style="background: linear-gradient(103deg, rgb(0, 0, 255) 0%, rgb(255, 0, 0) 121.74%);"><?php esc_html_e('Re-Generated', 'addlly'); ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="versionDetails">
                        <div class="info d-grid align-items-center">
                            <p class="fst-italic"><?php esc_html_e('Created On', 'addlly'); ?></p>
                            <span class="text-black text-start d-block position-relative fw-normal"><?php echo esc_html(gmdate('Y-m-d h:i:s A', strtotime($created_at))); ?></span>
                        </div>
                        <div class="info d-grid align-items-center">
                            <p class="fst-italic"><?php esc_html_e('Created By', 'addlly'); ?></p>
                            <span class="text-black text-start d-block position-relative fw-normal"><?php echo esc_html($user_name); ?></span>
                        </div>
                        <div class="info d-grid align-items-center d-none">
                            <p class="fst-italic d-flex">
                                <?php esc_html_e('Total Differences', 'addlly'); ?>
                                <span class="infoIconSvg" data-bs-toggle="tooltip" title="<?php esc_html_e('301 changes compare to version 1.0', 'addlly'); ?>" data-placement="right">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
                                </span>
                            </p>
                            <span class="text-black text-start d-block position-relative fw-normal">301</span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php }else{ ?>
    <p class="d-flex align-items-center justify-content-center border p-5 rounded "><?php esc_html_e('Version history is not available yet', 'addlly'); ?></p>
<?php } ?>
