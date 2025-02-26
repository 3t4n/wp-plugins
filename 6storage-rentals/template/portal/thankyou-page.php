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
<?php 
    if (function_exists('pll_get_post')) {
        $dashboard_url = get_permalink(pll_get_post(get_option('six_storage_dashboard_page_id')));
    } else{
        $dashboard_url = get_permalink(get_option('six_storage_dashboard_page_id'));
    }
?>
<div id="six-storage-thank-you-page" class="six-storage-grid-container-root six-storage-online-root-class">
    <div class="six-storage-grid-row six-storage-moveinSuccess">
        <div class="six-storage-grid-col-md-12">
            <img src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/undraw_business_shop_qw5t.svg" width="300" class="six-storage-grid-margin-auto cc grid-p35">
            <div >
                <h5 class="cc six-storage-green-text six-storage-grid-mt0">
                    <!--You have successfully Moved in--><?php esc_html_e('You have successfully Moved in','6storage-rentals'); ?><span>.</span>
                </h5>
                <p class="six-storage-grey-text cc six-storage-grid-mb15"><!--Check your inbox for lease related information--><?php esc_html_e('Check your inbox for lease related information','6storage-rentals'); ?><span>.</span></p>
                <a class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-grid-mb15 six-storage-grid-pr20 six-storage-grid-pl20" href="<?php echo esc_attr($dashboard_url) ?>"><!--Go to Dashboard--><?php esc_html_e('Go to Dashboard','6storage-rentals'); ?></a>
            </div>
        </div>
    </div>
      
</div>

<div class="six-storage-row cc">
                <div class="cc six-storage-col six-storage-s12 six-storage-m12 six-storage-brand-name-div">
                <p class="cc six-storage-poweredBythankyoufooter sixStoragefloatright"><b> Powered by </b> <a class="cc" href="https://www.6storage.com/" target="_blank">6Storage</a>
               </div>
           </div>


<!-- Internet Connectivity Check -->
<div id="six-storage-internet-status-modal" style="display:none">
        <div class="six-storage-internet-activity-modal-content six-storage-primary-background-color">
            <div class="six-storage-internet-activity-msg six-storage-primary-background-color">   
                <p class ="six-storage-white-text six-storage-center-align"><?php esc_html_e('Sorry, it appears your internet connection was lost or disrupted.','6storage-rentals','6storage-rentals')?></p>
                <p class ="six-storage-white-text six-storage-center-align"><?php esc_html_e('Please check your internet connection and','6storage-rentals')?> <a class="six-storage-white-text" href="javascript:void(0);" onclick="sixStorageInternetActivityStatusFun()"><?php esc_html_e('try again','6storage-rentals')?></a>.</p>
            <div>
        </div>
    </div>
<!-- Internet Connectivity Check END -->
 <script>
        var modal = document.getElementById("six-storage-internet-status-modal");
        window.addEventListener("offline", (event) => {
            modal.style.display = "block";
        });
        window.addEventListener("online", (event) => {
            modal.style.display = "none";
        });
        function sixStorageInternetActivityStatusFun(){      
            if(window.addEventListener == "online"){
                modal.style.display = "none";
            }else{
                modal.style.display = "block";
            }
        }
</script>
</div>
</div>
