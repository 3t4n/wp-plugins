<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$article_id     = get_post_meta($id, 'article_id', true);

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
$history  = '';
?>
<div class="verionBlock">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="versionHistory" aria-labelledby="versionHistoryLabel" aria-modal="true" role="dialog">
        <div class="verpopup">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title version-history-title" id="versionHistoryLabel">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"></path><path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"></path><path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"></path></svg> 
                    <?php esc_html_e('Version History', 'addlly'); ?>
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            
            <div class="filtersDropdown d-flex align-items-center justify-content-between rounded" data-id="<?php echo esc_attr($id); ?>" data-type="<?php echo esc_attr($active_tab); ?>">
                <div class="dropdown">
                    <label>
                        <?php esc_html_e('Sort By', 'addlly'); ?>
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="m3 16 4 4 4-4"></path><path d="M7 20V4"></path><path d="m21 8-4-4-4 4"></path><path d="M17 4v16"></path>
                        </svg>
                    </label>
                    <div class="drop d-flex align-items-center justify-content-between">
                        <select class="form-select" name="sort_by">
                            <option selected value="desc"><?php esc_html_e('Version Number (DESC)', 'addlly'); ?></option>
                            <option value="asc"><?php esc_html_e('Version Number (ASC)', 'addlly'); ?></option>
                        </select>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                    </div>
                </div>
                <div class="dropdown">
                    <label>
                        <?php esc_html_e('Filter By', 'addlly'); ?>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path d="M7 11.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"></path>
                        </svg>
                    </label>
                    <div class="drop d-flex align-items-center justify-content-between">
                        <select class="form-select" name="filter_by">
                            <option selected value="all"><?php esc_html_e('All', 'addlly'); ?></option>
                            <option value="regenerated"><?php esc_html_e('Re-Generated', 'addlly'); ?></option>
                        </select>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body">
            </div>
        </div>
    </div>
</div>