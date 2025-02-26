<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$article_id            = get_post_meta($id, 'article_id', true);

$article               = addlly_get_article_by_id($id);
$article_data          = isset($article['data']) ? $article['data'] : array();
$articleContent        = isset($article_data->article_html) ? $article_data->article_html : '';

$longArticleContent    = get_post_meta($id, 'longArticleContent', true);
$faqContent            = isset($article_data->FAQHTML) ? $article_data->FAQHTML : '';
$googleAdContent       = isset($article_data->googleAdCopy) ? $article_data->googleAdCopy : '';
$is_reviewed_article   = get_post_meta($id, 'is_reviewed_article', true);
$istrainArticle        = get_post_meta($id, 'istrainArticle', true);

$count_version = 0;
if( $active_tab == 'article' ){
    $count_version        = isset($article_data->article_regenerate_left) ? $article_data->article_regenerate_left : '';
}else if( $active_tab == 'faqSchema' ){
    $count_version        = isset($article_data->faq_regenerate_left) ? $article_data->faq_regenerate_left : '';
}

$socialContent = '';
if ($active_tab == 'linkedIn') {
    $socialContent  = isset($article_data->linkedIn_post) ? $article_data->linkedIn_post : '';
}else if ($active_tab == 'facebook') {
    $socialContent  = isset($article_data->facebook_post) ? $article_data->facebook_post : '';
}else if ($active_tab == 'twitter') {
    $socialContent  = isset($article_data->twitter_post) ? $article_data->twitter_post : '';
}else if ($active_tab == 'instagram') {
    $socialContent  = isset($article_data->instagram_post) ? $article_data->instagram_post : '';
}

$savebtndisabled = '';
if( $active_tab == 'faqSchema' && $faqContent == '' ){
    $savebtndisabled = 'disabled';
}
if( $active_tab == 'googleAdCopy' && $googleAdContent == ''){
    $savebtndisabled = 'disabled';
}

if( $active_tab == 'linkedIn' && $socialContent == ''){
    $savebtndisabled = 'disabled';
}
?>
<div class="top-nav-items d-flex justify-content-between flex-wrap gap-4">
    <div class="left-buttons d-flex">
        <button class="blog-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><circle cx="92" cy="256" r="28"></circle><circle cx="92" cy="132" r="28"></circle><circle cx="92" cy="380" r="28"></circle><path d="M432 240H191.5c-8.8 0-16 7.2-16 16s7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16zM432 364H191.5c-8.8 0-16 7.2-16 16s7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16zM191.5 148H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H191.5c-8.8 0-16 7.2-16 16s7.2 16 16 16z"></path></svg> 
            <?php esc_html_e('Metadata', 'addlly'); ?>
        </button>
        <?php if($active_tab != 'refundRequests'){ ?>
            <button class="blog-btn versionHistory" data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
                <?php esc_html_e('Version History', 'addlly'); ?>
            </button>
        <?php } ?>
        <?php if($active_tab == 'article'){ ?>
            <button class="blog-btn train-btn" data-id="<?php echo absint($id); ?>" data-type="<?php echo $istrainArticle == 1 ? 'untrain' : 'train'; ?>">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M15.5 13.5c0 2-2.5 3.5-2.5 5h-2c0-1.5-2.5-3-2.5-5 0-1.93 1.57-3.5 3.5-3.5s3.5 1.57 3.5 3.5zm-2.5 6h-2V21h2v-1.5zm6-6.5c0 1.68-.59 3.21-1.58 4.42l1.42 1.42a8.978 8.978 0 00-1-12.68l-1.42 1.42A6.993 6.993 0 0119 13zm-3-8l-4-4v3a9 9 0 00-9 9c0 2.23.82 4.27 2.16 5.84l1.42-1.42A6.938 6.938 0 015 13c0-3.86 3.14-7 7-7v3l4-4z"></path></svg> 
                <?php echo $istrainArticle == 1 ? esc_html__('Remove article from training', 'addlly') : esc_html__('Use article for training', 'addlly'); ?>
            </button>
        <?php } ?>
        <?php if($active_tab == 'longArticle'){ ?>
            <button class="blog-btn <?php echo $longArticleContent == '' ? 'blue-bg' : ''; ?> generatelongarticle-btn" data-id="<?php echo absint($id); ?>">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path></svg> 
                <?php if($longArticleContent == ''){ ?>
                    <?php esc_html_e('Generate', 'addlly'); ?>
                <?php }else{ ?>
                    <?php esc_html_e('Re-Generate', 'addlly'); ?>
                <?php } ?>
            </button>
        <?php }else if($active_tab == 'faqSchema'){ 
            ?>
            <button <?php echo $count_version == 0 ? 'disabled="disabled"' : ''; ?> class="blog-btn <?php echo $faqContent == '' ? 'blue-bg generatefaqschema-btn' : ''; ?>" <?php echo $faqContent == '' ? '' : 'data-bs-toggle="modal" data-bs-target="#regenrateModal"'; ?> data-id="<?php echo absint($id); ?>" data-type="faqSchema">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path></svg> 
                <?php if($faqContent == ''){ ?>
                    <?php esc_html_e('Generate', 'addlly'); ?>
                <?php }else{ ?>
                    <?php esc_html_e('Re-Generate', 'addlly'); ?> ( <?php echo esc_html($count_version); ?> / 3 )
                <?php } ?>
            </button>
        <?php }else if($active_tab == 'googleAdCopy'){ ?>
            <div class="d-flex align-items-center">
                <button class="blog-btn <?php echo $googleAdContent == '' ? 'blue-bg googleAdCopy-btn' : ''; ?>" <?php echo $googleAdContent == '' ? '' : 'data-bs-toggle="modal" data-bs-target="#regenrateModal"'; ?> data-id="<?php echo absint($id); ?>" data-type="googleAdCopy">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path></svg> 
                    <?php if($googleAdContent == ''){ ?>
                        <?php 
                        esc_html_e('Generate', 'addlly');
                        $tooltip_content = 'Generate will utilize 1 Addlly credit';
                        ?>
                    <?php }else{ ?>
                        <?php 
                        esc_html_e('Re-Generate', 'addlly'); 
                        $tooltip_content = 'Re-Generate will utilize 1 Addlly credit';
                        ?>
                    <?php } ?>
                </button>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="text-decoration-none outline-0 ms-2 fs-5 infoIconSvg" data-bs-toggle="tooltip" title="<?php echo esc_attr($tooltip_content); ?>" data-placement="bottom" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
            </div>
        <?php }else if($active_tab == 'linkedIn' || $active_tab == 'facebook' || $active_tab == 'twitter' || $active_tab == 'instagram'){ ?>
            <?php if( $socialContent == '' ){ ?>
                <div class="regenrateBtn d-flex align-items-center">
                    <button class="blog-btn blue-bg generatesocial-btn" data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path></svg> 
                        <?php esc_html_e('Generate', 'addlly'); ?>
                    </button>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="text-decoration-none outline-0 ms-2 fs-5 infoIconSvg" data-bs-toggle="tooltip" title="Generate will utilize 1 Addlly credit" data-placement="bottom" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
                </div>
            <?php }else{ ?>
                <div class="regenrateBtn d-flex align-items-center">
                    <button class="blog-btn" data-bs-toggle="modal" data-bs-target="#regenrateModal" data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path></svg> 
                        <?php esc_html_e('Re-Generate', 'addlly'); ?>
                    </button>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="text-decoration-none outline-0 ms-2 fs-5 infoIconSvg" data-bs-toggle="tooltip" title="Re-Generate will utilize 1 Addlly credit" data-placement="bottom" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
                </div>
            <?php } ?>
        <?php }else if($active_tab != 'reviewArticle' && $active_tab != 'refundRequests'){ ?>
            <button <?php echo $count_version == 0 ? 'disabled="disabled"' : ''; ?> class="blog-btn" data-bs-toggle="modal" data-bs-target="#regenrateModal" data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path></svg> 
                <?php esc_html_e('Re-Generate', 'addlly'); ?> ( <?php echo esc_html($count_version); ?> / 3 )
            </button>
        <?php } ?>
    </div>
    <div class="right-buttons d-flex">
        <?php if($active_tab == 'reviewArticle' ){ 
            if( $is_reviewed_article != 1 ){ ?>
                <button type="button" class="blog-btn" data-bs-toggle="modal" data-bs-target="#noteModal" data-id="<?php echo absint($id); ?>" data-type="reviewArticle">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <?php esc_html_e('Submit for Review', 'addlly'); ?>
                </button>
            <?php } ?>
        <?php }else if($active_tab == 'article'){ ?>
            <button type="button" class="blog-btn imageLibrary">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path><path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"></path></svg> 
                <?php esc_html_e('Image Library', 'addlly'); ?>
            </button>
        <?php } ?>
        <?php if($active_tab == 'article'){ ?>
            <button type="button" class="blog-btn citation-btn" data-id="<?php echo esc_attr($id); ?>" data-type="article">
                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                <?php esc_html_e('Auto Citation', 'addlly'); ?>
            </button>
        <?php } ?>
        <?php if( $active_tab != 'refundRequests' ){ ?>
            <button id="save<?php echo esc_attr($active_tab); ?>" type="button" class="blog-btn <?php echo $active_tab != 'reviewArticle' ? 'save-btn' : 'save-review-article-btn'; ?>" <?php echo esc_attr($savebtndisabled); ?> data-id="<?php echo absint($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM272 80v80H144V80h128zm122 352H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h42v104c0 13.255 10.745 24 24 24h176c13.255 0 24-10.745 24-24V83.882l78.243 78.243a6 6 0 0 1 1.757 4.243V426a6 6 0 0 1-6 6zM224 232c-48.523 0-88 39.477-88 88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88zm0 128c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40z"></path></svg>
            </button>
        <?php } ?>
        <button type="button" class="blog-btn full-screen-btn">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z"></path></svg>
        </button>
    </div>
</div>