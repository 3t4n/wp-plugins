<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$article               = addlly_get_article_by_id($id);
$article_data          = isset($article['data']) ? $article['data'] : array();
$googleAdContent       = isset($article_data->googleAdCopy) ? $article_data->googleAdCopy : '';
$googleAdContentArr    = addlly_convertGoogleADStringToArray($googleAdContent);
$keywords              = addlly_get_googleAdCopyKeywords($id);
?>
<div class="blog-writer-content-block">
    <?php
    set_query_var('id', $id);
    set_query_var('active_tab', $active_tab);
    addlly_get_template_part('one-click-blog-writer/edit/top-navbar');
    addlly_get_template_part('one-click-blog-writer/edit/metadata');
    addlly_get_template_part('one-click-blog-writer/edit/version-history');
    ?>
    <div class="content-area-block googleAdCopy">
        <div class="content-area position-relative">
            
            <div class="editableTextArea d-flex overflow-hidden position-relative googleAdCopy f-50">
                <?php if($googleAdContent == '' ){ ?>
                    <div class="textEditerArea notContent p-4"></div>
                <?php }else{ ?>
                    <div class="textEditerArea">
                        <div class="socialPostEditor">
                            <div class="position-relative">
                                <div class="custom-textarea-editor">
                                    <div class="innerTextcards">
                                        <?php foreach($googleAdContentArr['Headlines'] as $key => $value){ ?>
                                            <div class="mb-4">
                                                <p><?php esc_html_e('Headline', 'addlly'); ?> <?php echo esc_html(++$key); ?></p>
                                                <span><?php echo esc_html($value); ?></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="innerTextcards">
                                        <?php foreach($googleAdContentArr['Descriptions'] as $key => $value){ ?>
                                            <div class="mb-4">
                                                <p><?php esc_html_e('Description', 'addlly'); ?><?php echo esc_html(++$key); ?></p>
                                                <span><?php echo esc_html($value); ?></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="innerTextcards">
                                        <div class="mb-4">
                                            <p><?php esc_html_e('Slug', 'addlly'); ?></p>
                                            <span><?php echo esc_url($googleAdContentArr['Display Path']); ?></span>
                                        </div>
                                        <div class="mb-4">
                                            <p><?php esc_html_e('Call to Action', 'addlly'); ?></p>
                                            <span><?php echo esc_html($googleAdContentArr['Call to Action']); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="copy-textarea-btn">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.8323 0H5.11034C4.13392 0 3.3395 0.794414 3.3395 1.77083V1.98817H2.16829C1.19188 1.98817 0.397461 2.78258 0.397461 3.759V14.2292C0.397461 15.2057 1.19188 16.0001 2.16829 16.0001H8.89028C9.86669 16.0001 10.661 15.2057 10.661 14.2292V14.0119H11.8322C12.8087 14.0119 13.6031 13.2175 13.6031 12.2411V1.77083C13.6032 0.794414 12.8087 0 11.8323 0ZM9.51883 14.2292C9.51883 14.5758 9.23684 14.8578 8.89035 14.8578H2.16829C1.82173 14.8578 1.53974 14.5758 1.53974 14.2292V3.75892C1.53974 3.41236 1.82173 3.13037 2.16829 3.13037H8.89028C9.23684 3.13037 9.51876 3.41236 9.51876 3.75892V14.2292H9.51883ZM12.4609 12.2411C12.4609 12.5876 12.1789 12.8696 11.8323 12.8696H10.6611V3.75892C10.6611 2.78251 9.86669 1.98809 8.89035 1.98809H4.48178V1.77075C4.48178 1.42419 4.76377 1.1422 5.11034 1.1422H11.8323C12.1789 1.1422 12.4609 1.42419 12.4609 1.77075V12.2411Z" fill="#0039FF" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="toggleData">
                    <div class="d-flex align-items-center justify-content-start mb-3"><strong
                            class="text-center google-add-review"><?php esc_html_e('Google Ad Preview', 'addlly'); ?></strong>
                            <div class="infoIconSvg" data-bs-toggle="tooltip" title="Google Ad Preview" data-placement="right">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="preview-container p-0">
                            <?php if(isset($keywords['data']) && !empty($keywords['data']) ){ ?>
                                <div class="table-main">
                                    <div class="table-header d-flex justify-content-between align-items-center mb-3">
                                        <p class="m-0"><span class="bold">Top Keywords</span></p>
                                        <p class="d-flex align-items-center gap-2 values">
                                            <span class="bold">CPC</span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" data-bs-toggle="tooltip" title="Cost Per Click" data-placement="right" data-tooltip-place="bottom" data-tooltip-content="Cost Per Click" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="height: 12px;">
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z">
                                                </path>
                                            </svg>
                                        </p>
                                    </div>
                                    <div class="table-body">
                                        <?php foreach($keywords['data'] as $_data){ ?>
                                            <div class="d-flex justify-content-between align-items-center mb-3 tableCard">
                                                <span class="text-start keywords"><?php echo esc_html($_data->keyword); ?></span>
                                                <span class="text-start values"><strong><?php echo esc_html($_data->cpc); ?></strong></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="bg-white mt-4 sponsoredBlock rounded">
                                <?php if($googleAdContent != '' ){ ?>
                                    <?php foreach($googleAdContentArr['Headlines'] as $key => $value){ 
                                        $desc = isset($googleAdContentArr['Descriptions'][$key]) ? $googleAdContentArr['Descriptions'][$key] : '';
                                        $display_path = isset($googleAdContentArr['Display Path']) ? $googleAdContentArr['Display Path'] : '';
                                        $call_action = isset($googleAdContentArr['Call to Action']) ? $googleAdContentArr['Call to Action'] : '';
                                        ?>
                                        <div class="sponsoredCards"><strong class="d-block">Sponsored</strong>
                                            <div class="d-flex gap-3 mb-2 align-items-center position-relative ">
                                                <div class="grayDot rounded-5 d-flex"></div>
                                                <div class="position-absolute earth-icon">
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" viewBox="0 0 16 16" class="fs-3" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8 0c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zM8 15c-0.984 0-1.92-0.203-2.769-0.57l3.643-4.098c0.081-0.092 0.126-0.21 0.126-0.332v-1.5c0-0.276-0.224-0.5-0.5-0.5-1.765 0-3.628-1.835-3.646-1.854-0.094-0.094-0.221-0.146-0.354-0.146h-2c-0.276 0-0.5 0.224-0.5 0.5v3c0 0.189 0.107 0.363 0.276 0.447l1.724 0.862v2.936c-1.813-1.265-3-3.366-3-5.745 0-1.074 0.242-2.091 0.674-3h1.826c0.133 0 0.26-0.053 0.354-0.146l2-2c0.094-0.094 0.146-0.221 0.146-0.354v-1.21c0.634-0.189 1.305-0.29 2-0.29 1.1 0 2.141 0.254 3.067 0.706-0.065 0.055-0.128 0.112-0.188 0.172-0.567 0.567-0.879 1.32-0.879 2.121s0.312 1.555 0.879 2.121c0.569 0.569 1.332 0.879 2.119 0.879 0.049 0 0.099-0.001 0.149-0.004 0.216 0.809 0.605 2.917-0.131 5.818-0.007 0.027-0.011 0.055-0.013 0.082-1.271 1.298-3.042 2.104-5.002 2.104z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6><?php echo esc_html($display_path); ?></h6>
                                                    <div class="linkUrl"><?php echo esc_url($display_path); ?></div>
                                                </div>
                                            </div>
                                            <h4 class="text-primary"><?php echo esc_html($value); ?></h4>
                                            <p class="textEllipsis"><?php echo esc_html($desc); ?></p>
                                            <span class="callToAction"><?php echo esc_html($call_action); ?></span>
                                        </div>
                                    <?php } ?>

                                <?php }else{ ?>
                                    <div class="sponsoredCards"><strong class="d-block"><?php esc_html_e('Sponsored', 'addlly'); ?></strong>
                                        <div class="d-flex gap-3 mb-2 align-items-center position-relative ">
                                            <div class="grayDot rounded-5 d-flex"></div>
                                            <div class="position-absolute earth-icon"><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" viewBox="0 0 16 16" class="fs-3" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 0c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zM8 15c-0.984 0-1.92-0.203-2.769-0.57l3.643-4.098c0.081-0.092 0.126-0.21 0.126-0.332v-1.5c0-0.276-0.224-0.5-0.5-0.5-1.765 0-3.628-1.835-3.646-1.854-0.094-0.094-0.221-0.146-0.354-0.146h-2c-0.276 0-0.5 0.224-0.5 0.5v3c0 0.189 0.107 0.363 0.276 0.447l1.724 0.862v2.936c-1.813-1.265-3-3.366-3-5.745 0-1.074 0.242-2.091 0.674-3h1.826c0.133 0 0.26-0.053 0.354-0.146l2-2c0.094-0.094 0.146-0.221 0.146-0.354v-1.21c0.634-0.189 1.305-0.29 2-0.29 1.1 0 2.141 0.254 3.067 0.706-0.065 0.055-0.128 0.112-0.188 0.172-0.567 0.567-0.879 1.32-0.879 2.121s0.312 1.555 0.879 2.121c0.569 0.569 1.332 0.879 2.119 0.879 0.049 0 0.099-0.001 0.149-0.004 0.216 0.809 0.605 2.917-0.131 5.818-0.007 0.027-0.011 0.055-0.013 0.082-1.271 1.298-3.042 2.104-5.002 2.104z"></path></svg></div>
                                            <div>
                                                <h6><?php esc_html_e('Addlly AI', 'addlly'); ?></h6>
                                                <div class="linkUrl"><?php echo esc_url('https://addlly.ai'); ?></div>
                                            </div>
                                        </div>
                                        <h4 class="text-primary"><?php esc_html_e('Addlly - Best AI Writer, Social Media & Marketing Tool', 'addlly'); ?></h4>
                                        <p class="textEllipsis"><?php esc_html_e('Addlly AI is the most advanced AI writer, social media post generator and marketing tool. Transform your website, blogs and social media presence with AI.', 'addlly'); ?>
                                        </p><span class="callToAction"><?php esc_html_e('More results from addlly.ai >>', 'addlly'); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>