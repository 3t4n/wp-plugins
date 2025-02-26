<?php
    use SixStorageOnline\Base\Six_Storage_SettingsKeys;
    $obj = new Six_Storage_SettingsKeys(); 
?>
<style>
    .six-storage-primary-background-color{
        background-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?>;
    }
    .six-storage-secondary-background-color{
        background-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?>;
    }
</style>
<div id="six-storage-thank-you-page" class="six-storage-grid-container-root six-storage-online-root-class">
    <form id='six-storage-template-ajax-url' class="six-storage-border-none six-storage-grid-shadow-none six-storage-grid-p0 cc six-storage-grid-position-sticky six-storage-z-index-1" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>" data-group_sizes="<?php echo esc_attr($this->six_storage_groupUnitsSizes) ?>" data-rent_single_unit="<?php echo esc_attr(get_option("six_storage_online_rent_single_unit")) ?>" data-inclusive_of_tax="<?php echo esc_attr($this->six_storage_groupUnitsSizes) ?>">
    <div class="six-storage-grid-row six-storage-moveinSuccess" id="six-storage-success-container-ptwofour" style="display:none;">
        <div class="six-storage-grid-col-md-12">
            <img src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/Succes-01.svg" width="400" class="six-storage-grid-margin-auto cc grid-p35">
            <div >
                <h5 class="cc six-storage-green-text six-storage-grid-mt0">
                    <!--You have successfully Moved in--><?php esc_html_e('Payment has been successfully processed','6storage-rentals'); ?><span>.</span>
                </h5>
            </div>
        </div>
    </div>
    <div class="six-storage-grid-row  six-storage-moveinSuccess six-storage-white" id="six-storage-failed-container-ptwofour" style="display:none;">
        <div class="six-storage-grid-col-md-12">
            <img src="<?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/undraw_house_searching_n8mp.svg" width="400" class="cc six-storage-grid-p35">
            <div class="six-storage-font-weight-bold">
                <h5 class="cc six-storage-grid-mb10 six-storage-red-text six-storage-font-size-20">
                <!-- Payment Failed.--><?php esc_html_e('Payment Failed.','6storage-rentals'); ?>
                </h5>
                <p class="six-storage-grey-text  six-storage-grid-mb15"><!--Please contact storage facility for further information.--><?php esc_html_e('Please contact storage facility for further information.','6storage-rentals'); ?></p>
            </div>
        </div>
    </div>
    </form>
    <div class="six-storage-row cc">
        <div class="cc six-storage-col six-storage-s12 six-storage-m12" style="float:right;">
            <p class="cc" style="float:right;"><b> Powered by </b> <a class="cc" href="https://www.6storage.com/" target="_blank">6Storage</a>
        </div>
    </div> 
</div>