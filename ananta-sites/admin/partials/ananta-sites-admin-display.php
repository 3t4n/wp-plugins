<?php 
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 *
 * @package    Ananta_Sites
 * @subpackage Ananta_Sites/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
if(!function_exists('ananta_get_demo_cate_name')){
    function ananta_get_demo_cate_name($cat_id, $all_categories){
        foreach($all_categories as $category){
            if($category['id'] == $cat_id){
                return $category['name'];
                break;
            }
        }
        return '';
    }
}

if(!function_exists('ananta_get_required_plugin_status')) {
    function ananta_get_required_plugin_status($plugin) {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        $all_wp_plugins = get_plugins();

        $response = 'not-installed';
        foreach($all_wp_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if($folder == $plugin['plugin_slug']) {
                if(is_plugin_inactive( $key ) ) {
                    $response = 'inactive';
                } else {
                    $response = 'active';
                }
                return $response;
                break;
            }
        }
        return $response;
    }
}

if(!function_exists('ananta_is_plugin_has_installed')) {
    function ananta_is_plugin_has_installed($plugin_slug) {
      $all_plugins = get_plugins();
      foreach ($all_plugins as $key => $wp_plugin) {
          $folder_arr = explode("/", $key);
          $folder = $folder_arr[0];
          if ($folder == $plugin_slug) {
              return true;
          }
      }
      return false;
    }
} ?>

<!-- Start: Theme Editor Selector Step -->
<?php if(!isset($_GET['step']) && (isset($_GET['page']) && $_GET['page'] == 'ananta-demo-import')):  ?>
    <script type="text/javascript">
        var redirectUrl = "<?php echo esc_url(home_url()); ?>/wp-admin/admin.php?page=ananta-demo-import&step=1&editor=elementor";
        window.location.replace(redirectUrl);
    </script>
<?php endif; ?>
<!-- End: Theme Editor Selector Step -->

<!-- Start: Theme Selector Step (Step-1) -->
<?php if( isset($_GET['editor']) && (isset($_GET['step']) && $_GET['step'] == '1' ) && (isset($_GET['page']) && $_GET['page'] == 'ananta-demo-import')): ?>

    <!-- For Elementor Editor -->
    <?php if($_GET['editor'] == 'elementor'): ?>
        <?php 
            /* Fetch All Categories */
            $cat_data = wp_remote_get(esc_url_raw('https://template.anantaddons.com/wp-json/wp/v2/categories/?per_page=100'));
            $cat_data_body = wp_remote_retrieve_body($cat_data);
            $all_categories = json_decode($cat_data_body, TRUE);
            
            /* Fetch All Demos */
            $theme_data = wp_get_theme();
            $theme_name = '';
            $theme_template = $theme_data->get('Template');
            if(empty($theme_template)){
                $theme_name = $theme_data->name;
            } else{
                $theme_name = $theme_template;
            }
            $theme_slug = $theme_data->get('TextDomain');
            $theme_data_api = wp_remote_get(esc_url_raw("https://template.anantaddons.com/wp-json/wp/v2/demos/?per_page=100"));

            $theme_data_api_body = wp_remote_retrieve_body($theme_data_api);
            $all_demos = json_decode($theme_data_api_body, TRUE);
            if ($all_demos === null || $all_categories === null) { ?>
                <script type="text/javascript">
                    window.location.reload();
                </script>
            <?php }
            foreach($all_demos as $key => $demo){
                if( array_key_exists("elementor", $demo['meta']['template_type']) || array_key_exists("1", $demo['meta']['template_type']) ) {
                    unset($all_demos[$key]);
                }
            }
            array_values($all_demos);


            $present_cat = array();
            $present_cat = array_values(array_unique($present_cat));
            
            if (count($all_demos) == 0) {
                wp_die('There are no demos available for this theme!');
            }
            
            foreach ($all_demos as $demo) {
                foreach ($demo['categories'] as $in_cat) {
                    foreach($all_categories as $category){
                        if($category['id'] == $in_cat){
                            array_push($present_cat, strtolower($category['name']));
                        }
                    }
                }
            }

        $present_cat = array_values(array_unique($present_cat)); ?>
        <div class="ali-templates-page overflow-hidden">
            <div class="ali-templates-sidebar w-full flex items-center justify-between">
                <div class="main-logo">
                    <div class="flex">
                        <img src="<?php echo esc_url( plugin_dir_url(__FILE__) . 'assets/images/site-logo.png' ); ?>" />
                    </div>
                </div>
                <div class="header flex items-center justify-between">
                    <span class="badge success">
                        <?php esc_html('v0.1.1','ananta-sites'); ?>
                    </span>
                    <div class="select-menu">
                        <div class="select-btn">
                            <span class="sBtn-text">
                                <?php echo ($_GET['editor'] == 'elementor') ? esc_html('Elementor','ananta-sites') : esc_html('Block Editor','ananta-sites'); ?>
                            </span>
                            <img src="<?php echo esc_url( plugin_dir_url(__FILE__) . 'assets/images/chev.svg'); ?>" />
                        </div>
                        <ul class="options">
                            <li class="option">
                                <img src="<?php echo esc_url( plugin_dir_url(__FILE__) . 'assets/images/elementor.png' ); ?>" />
                                <span class="option-text">
                                    <?php esc_html('Elementor','ananta-sites'); ?>
                                </span>
                            </li>
                            <li class="option">
                                <img src="<?php echo esc_url( plugin_dir_url(__FILE__) . 'assets/images/wordpress-logo.png' ); ?>" />
                                <span class="option-text">
                                    <?php esc_html('Block Editor','ananta-sites'); ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search mx-auto flex ">
                    <input onkeyup="filterSearch();"
                        type="search" uk-filter-control=""
                        id="searchTerm" class="searchTerm uk-search-input"
                        placeholder="Search...." value="" />
                    <button type="button" id="btn-search-theme" class="searchButton" uk-filter-control="">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="flex ml-auto">
                    <ul class="filter-tabs" id="themeType-navList">
                        <li>
                            <a class="theme_type-filter tabs-link active" data-theme_type="all">
                                <?php esc_html_e('All','ananta-sites'); ?>
                            </a>
                        </li>
                        <li>
                            <a class="theme_type-filter tabs-link" data-theme_type="free">
                                <?php esc_html_e('Free','ananta-sites'); ?>
                            </a>
                        </li>
                        <li>
                            <a class="theme_type-filter tabs-link" data-theme_type="pro">
                                <?php esc_html_e('Pro','ananta-sites'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <section class="ali-templates-main">
                <div class="themes-grid">

                    <!-- Start: Page Title -->
                    <div  class="ali-templates-page-title">
                        <h1><?php esc_html_e('Anant Sites Demos','ananta-sites'); ?></h1>
                        <p><?php esc_html_e('Import any demos just a single click ' , 'ananta-sites'); ?></p>
                        <a class="demos-video-link" target="_blank"
                            href="#">
                            <i class="fa-brands fa-youtube"></i>
                            <?php esc_html_e('Video Tutorial', 'ananta-sites'); ?>
                        </a>
                    </div>
                    <!-- End: Page Title -->

                    <!-- Start: Category Filter -->
                    <div  class="filter-tabs-area flex items-center ml-auto justify-center">
                        <ul class="filter-tabs" id="category-navList">
                            <li>
                                <a class="filter tabs-link active" data-filter="demos">
                                    <?php esc_html_e('All', 'ananta-sites'); ?>
                                </a>
                            </li>
                            <?php foreach($all_categories as $category) { ?>
                                <?php if($category['name'] != 'Uncategorized' && $category['count'] > 0){ ?>
                                    <li>
                                        <a class="filter tabs-link" data-filter="<?php echo esc_attr(strtolower($category['name'])); ?>">
                                            <?php echo esc_attr($category['name']); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul> 
                    </div>
                    <!-- End: Category Filter -->

                    <!-- Start: Theme Grid -->
                    <div class="algrid-wrap theme-grid-wrap g3">
                    <?php foreach($all_demos as $demo) { ?>
                        <div class="grid-item" data-theme_type="<?php echo esc_attr(strtolower($demo['meta']['plugin_type'][0])); ?>" data-name="<?php echo esc_attr(strtolower($demo['title']['rendered'])); ?>" data-filter="<?php
                            $cats = '';
                            foreach ($demo['categories'] as $in_cat) {
                                foreach($all_categories as $category){
                                    if($category['id'] == $in_cat){
                                        $cats .= strtolower($category['name'])."|";
                                    }
                                }
                            }
                            echo esc_attr(trim($cats));
                            ?>">
                            <?php 
                            if(strtolower($demo['meta']['plugin_type'][0]) == "pro"){ ?>
                                <span class="alribbon <?php echo esc_attr(strtolower($demo['meta']['plugin_type'][0])); ?>">
                                    <?php echo esc_attr(ucfirst($demo['meta']['plugin_type'][0])); ?>
                                </span>
                            <?php } ?>
                            <div class="grid-item-images">
                                <img src="<?php echo esc_url($demo['meta']['preview_url'][0]); ?>" />
                                <div class="grid-item-overlay flex items-center justify-center">
                                    <?php if ( strtolower($demo['meta']['plugin_type'][0]) == "pro" && ananta_is_plugin_has_installed('anant-addons-for-elementor-pro') === false ): ?>
                                        <a class="demos-link" target="_blank"
                                            href="<?php echo esc_url($demo['meta']['pro_link'][0]);?>">
                                            <?php esc_html_e('Buy Now', 'ananta-sites'); ?>
                                        </a>
                                    <?php else: ?>
                                        <a class="demos-link" href="<?php echo esc_url( add_query_arg( [
                                            'step'       => 2,
                                            'theme_id'   => absint( $demo['id'] ),
                                            'preview_url' => esc_url( $demo['meta']['preview_link'][0] ),
                                            ] ) ); ?>">
                                            <?php esc_html_e('Import', 'ananta-sites'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <a aria-current="page"
                                        href="<?php echo !empty($demo['meta']['preview_link'][0]) ? esc_url(add_query_arg([
                                            'step'        => 'preview',
                                            'theme_id'    => absint($demo['id']),
                                            'preview_url' => esc_url($demo['meta']['preview_link'][0]),
                                            'pro_link'    => esc_url($demo['meta']['pro_link'][0]),
                                            'dtn'         => esc_attr($demo['meta']['plugin_name'][0])
                                        ])) : '#'; ?>"
                                        class="demos-preview-link">
                                        <?php esc_html_e('Preview', 'ananta-sites'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="grid-item-content flex justify-between align-center">
                            <h5><a><?php echo esc_attr($demo['title']['rendered']); ?></a></h5>
                            <?php if (ananta_is_plugin_has_installed('anant-addons-for-elementor-pro') === false && strtolower($demo['meta']['plugin_type'][0]) == "pro"): ?>
                                <a class="pro-demos-link" target="_blank"
                                    href="<?php echo esc_url($demo['meta']['pro_link'][0]);?>">
                                    <?php esc_html_e('Buy Now', 'ananta-sites'); ?>
                                </a>
                            <?php else: ?>
                                <a class="import" href="<?php echo esc_url(add_query_arg( ['step' => 2, 'theme_id'=> $demo['id'], 'preview_url' => esc_url($demo['meta']['preview_link'][0]) ] ));?>">Import</a>
                            <?php endif; ?>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <!-- End: Theme Grid -->

                </div>
            </section>

        </div>
    <?php endif; ?>
    <!-- ./For Elementor Editor -->
    <script>
        function filterSearch(){
            var search = jQuery(".uk-search-input").eq(0).val();
            if(search.length == 0){
                jQuery("#btn-search-theme").attr("uk-filter-control", "demos");
            }else{
                jQuery("#btn-search-theme").attr("uk-filter-control", search);
            }
            jQuery("#btn-search-theme").click();
        }
    </script>

<?php endif; ?>
<!-- End: Theme Selector Step (Step-1) -->

<!-- Start: Theme Options Step (Step-2) -->
<?php if( isset($_GET['editor']) && (isset($_GET['step']) && $_GET['step'] == '2' ) && (isset($_GET['page']) && $_GET['page'] == 'ananta-demo-import') && (isset($_GET['theme_id']) && !empty($_GET['theme_id']) )): ?>
    <div class='ali-templates-page overflow-hidden' id="final-step-wrapper">
    <?php 
        $theme_id = absint($_GET['theme_id']);
        $required_plugins_api = wp_remote_get(esc_url_raw("https://template.anantaddons.com/wp-json/wp/v2/demos/" . $theme_id . "?_fields=meta"));
        $required_plugins_api_body = wp_remote_retrieve_body($required_plugins_api);
        $reqiured_plugins_data = json_decode($required_plugins_api_body, TRUE);
        if($reqiured_plugins_data['meta']['premiun_plugin_link'] === NULL){ ?>
            <script type="text/javascript">
                var redirectUrl = "<?php echo esc_url(home_url()); ?>/wp-admin/admin.php?page=ananta-demo-import&step=1&editor=elementor";
                window.location.replace(redirectUrl);
            </script>
        <?php
        }
        $reqiured_plugins = $reqiured_plugins_data['meta']['premiun_plugin_link'];
        // var_dump($reqiured_plugins);
        $active_pro_plugin_count = 0;
        $inactive_pro_plugin_count = 0;
        $not_installed_pro_plugin_count = 0; ?>

        <section class="ali-templates-main">
            <div class="content-wrap">
                <div class="content-container">
                    
                    <div class="import-from-heading">
                        <h1 class="import-from-title mt-1" id="final-step"><?php esc_html_e('Final Step…', 'ananta-sites'); ?></h1> 
                        <a class='back btn binfo' onclick="history.back()" >
                            <i class="fa-solid fa-angles-left"></i>
                            <?php esc_html_e('Back', 'ananta-sites'); ?>
                        </a>  
                    </div>

                    <div class="content-list py-3">
                        <ul class="import-option-list flex items-center justify-start">
                            <li>
                                <input type="checkbox" id="import-customizer" name="import-customizer" checked="checked">
                                <label for="import-customizer"><?php esc_html_e('Import Customizer', 'ananta-sites'); ?></label>
                            </li>
                            <li>
                                <input type="checkbox" id="import-content" name="import-content" checked="checked">
                                <label for="import-content"><?php esc_html_e('Import Content', 'ananta-sites'); ?></label>
                            </li>
                        </ul>
                        <ul class="replace-previously-content" id="replace-content-container">
                            <li>
                                <input type="checkbox" id="replace-content" name="replace-content">
                                <label for="replace-content">
                                    <?php esc_html_e('Delete Previously Imported Content', 'ananta-sites'); ?>
                                </label>
                                <div class="tooltip">
                                    <span class="tooltip-toggle" aria-label="WARNING: Selecting this option will delete all data from the previous import. Choose this option only if this is intended." tabindex="0">
                                        <svg viewBox="0 0 27 27" xmlns="http://www.w3.org/2000/svg"><g fill="#555" fill-rule="evenodd"><path d="M13.5 27C20.956 27 27 20.956 27 13.5S20.956 0 13.5 0 0 6.044 0 13.5 6.044 27 13.5 27zm0-2C7.15 25 2 19.85 2 13.5S7.15 2 13.5 2 25 7.15 25 13.5 19.85 25 13.5 25z"/><path d="M12.05 7.64c0-.228.04-.423.12-.585.077-.163.185-.295.32-.397.138-.102.298-.177.48-.227.184-.048.383-.073.598-.073.203 0 .398.025.584.074.186.05.35.126.488.228.14.102.252.234.336.397.084.162.127.357.127.584 0 .22-.043.412-.127.574-.084.163-.196.297-.336.4-.14.106-.302.185-.488.237-.186.053-.38.08-.584.08-.215 0-.414-.027-.597-.08-.182-.05-.342-.13-.48-.235-.135-.104-.243-.238-.32-.4-.08-.163-.12-.355-.12-.576zm-1.02 11.517c.134 0 .275-.013.424-.04.148-.025.284-.08.41-.16.124-.082.23-.198.313-.35.085-.15.127-.354.127-.61v-5.423c0-.238-.042-.43-.127-.57-.084-.144-.19-.254-.318-.332-.13-.08-.267-.13-.415-.153-.148-.024-.286-.036-.414-.036h-.21v-.95h4.195v7.463c0 .256.043.46.127.61.084.152.19.268.314.35.125.08.263.135.414.16.15.027.29.04.418.04h.21v.95H10.82v-.95h.21z"/></g></svg>
                                    </span>
                                    <span class="tooltip-text"></span>
                                </div>
                            </li>
                        </ul>
                        <input type="hidden" id="theme_id" value="<?php echo esc_attr(absint($_GET['theme_id'])); ?>" />
                    </div>
                    
                <?php if($reqiured_plugins && count($reqiured_plugins) > 0): ?>
                    <div class="content-plugin">
                        <h6 class="cotitile">
                            <span class="title"><?php esc_html_e('Required Plugins', 'ananta-sites'); ?></span><br>
                            <span><?php esc_html_e('Free Plugins Will be Installed/Activated Automatically', 'ananta-sites'); ?></span>
                        </h6>
                        <ul class="content-required-plugin">
                            <?php foreach($reqiured_plugins as $r_plugin): ?>
                                <?php $plugin_status = ananta_get_required_plugin_status($r_plugin); ?>
                                    <?php if($plugin_status == 'active'){ 
                                        if(strtolower($r_plugin['plugin_type']) == 'pro'){
                                            $active_pro_plugin_count += 1;
                                        } ?>
                                        <li>
                                            <span>
                                                <i class="fa-solid fa-check"></i>
                                                <?php echo esc_html($r_plugin['plugin_name']); ?>
                                            </span>
                                        </li>
                                    <?php } else if($plugin_status == 'inactive'){ 
                                        if(strtolower($r_plugin['plugin_type']) == 'pro'){
                                            $inactive_pro_plugin_count += 1;
                                        } ?>
                                        <li>
                                            <span>
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                <?php echo esc_html($r_plugin['plugin_name']); ?>
                                            </span>
                                        </li>
                                    <?php } else if($plugin_status == 'not-installed') {
                                        if(strtolower($r_plugin['plugin_type']) == 'pro'){
                                            $not_installed_pro_plugin_count += 1;
                                        } ?>
                                        <li>
                                            <span>
                                                <i class="fa-solid fa-xmark"></i>
                                                <?php echo esc_html($r_plugin['plugin_name']); ?>
                                            </span>
                                            <?php if(strtolower($r_plugin['plugin_type']) == 'pro'){ ?>
                                                <a href="<?php echo esc_url($r_plugin['plugin_pro_url']); ?>" target="_blank" class="badge info ml-auto"><?php esc_html_e('Buy Now', 'ananta-sites'); ?></a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0)" class="badge danger ml-auto" style="cursor:default;"><?php esc_html_e('Not Installed', 'ananta-sites'); ?></a>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                    
                </div>
            </div>
        </section>

        <div class="ali-templates-footer flex items-center justify-between">
            <div>
                <?php $preview_url = isset($_GET['preview_url']) ? esc_url(sanitize_text_field($_GET['preview_url'])) : '#'; ?>
                <a target="_blank" href="<?php echo esc_url($preview_url); ?>" class="btn preview_btn"><?php esc_html_e('Preview', 'ananta-sites'); ?>
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
            <div class=""> 
                <?php if( $not_installed_pro_plugin_count == 0 ){ ?>
                    <a href="javascript:void(0)" class="btn import_btn start-import " id="btn-import"><i class="fa-solid fa-download"></i><?php esc_html_e('Import', 'ananta-sites'); ?></a>
                <?php } else { ?>
                    <a href="javascript:void(0)" class="btn btn-disabled import_btn start-import " id="btn-plugin-alert" aria-disabled="true"><i class="fa-solid fa-download"></i><?php esc_html_e('Import', 'ananta-sites'); ?></a>
                <?php } ?>
            </div>
        </div>

    </div>

    <!--Start: Show Progress bar while importing-->
    <div class="progress hide" id="progress-wrapper">

        <!-- hide after import success -->
        <div class="ananta-intall-importer hide" id="progress-bar-wrapper">
            <div class="inner">
                <div class="heading">
                    <h4 class="title"><?php esc_html_e('Importing theme data...', 'ananta-sites'); ?></h4>
                </div>  
                <div class="ananta-import-menu" id="ananta_import_menu">
                    <ul class="ananta-import-tabs" id="ananta_import_tabs">
                        <!-- <li class="tab_disabled" id="step_one">
                            <a href="#">Importing Theme Data Files...</a>
                            <span></span>
                        </li> -->
                        <li class="tab_disabled" id="step_one">
                            <a href="#"><?php esc_html_e('Import Data Initialing', 'ananta-sites'); ?></a>
                            <span></span>
                        </li>
                        <li class="tab_disabled" id="step_two">
                            <a href="#"><?php esc_html_e('Required Plugins Checking', 'ananta-sites'); ?></a>
                            <span></span>
                        </li>
                        <li class="tab_disabled" id="step_three">
                            <a href="#"><?php esc_html_e('Demo Data Initialized', 'ananta-sites'); ?></a>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- hide after import success -->
        
        <!-- show after import success -->
        <div id="progress-complete-wrapper" class="hide">
            <div class="ananta-complete-importer">
                <div class="ananta-intall-importer">
                    <div class="inner">
                        <div class="import-bg"><span></span></div>
                        <div class="import-img">
                            <span class="image">
                                <img src="<?php echo esc_url( plugin_dir_url(__FILE__) . 'assets/images/cong.png' ); ?>" >
                            </span>
                        </div>
                        <div class="heading">
                            <h4 class="title"><?php esc_html_e('Import Completed ...', 'ananta-sites'); ?></h4>
                        </div> 
                        <div class="import-btn">
                            <a href="<?php echo esc_url(home_url()); ?>" class="button to-site" target="_blank">
                                <i class="fa-solid fa-up-right-from-square"></i>
                                <?php esc_html_e('View Your Website', 'ananta-sites'); ?>
                            </a>
                            <a href="<?php echo esc_url(admin_url()); ?>" class="button to-dashboard">
                                <i class="fa-solid fa-arrow-left"></i>
                                <?php esc_html_e('Back To Dashboard', 'ananta-sites'); ?>
                            </a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- show after import success -->

        <!-- show after import error -->
        <div id="progress-error-wrapper" class="hide">
            <h3 class="badge danger mb-3"><?php esc_html_e('Error Occured!', 'ananta-sites'); ?></h3>
            <p id="import-error-text"></p>
            <a class="badge success" href="<?php echo esc_url(admin_url()); ?>"><?php esc_html_e('Back To Dashboard', 'ananta-sites'); ?></a>
        </div>
        <!-- show after import error -->

    </div>
    <!--End: Show Progress bar while importing-->

<?php endif; ?>
<!-- End: Theme Options Step (Step-2) -->

<!-- Start: Preview Step -->
<?php if( isset($_GET['editor']) && (isset($_GET['step']) && $_GET['step'] == 'preview' ) && (isset($_GET['page']) && $_GET['page'] == 'ananta-demo-import') && (isset($_GET['theme_id']) && !empty($_GET['theme_id']) ) ): ?>
    <div class='ali-templates-page overflow-hidden '>
        <?php if(isset($_GET['preview_url']) && !empty(esc_url_raw($_GET['preview_url']))){ ?>
            <iframe class="prframe" src="<?php echo esc_url( sanitize_url( $_GET['preview_url'] ) ); ?>"></iframe>
        <?php } else { ?>
            <div class="prfrmae"><?php esc_html_e('Preview Not Available', 'ananta-sites'); ?></div>
        <?php } ?>
        <div class="ali-templates-footer flex items-center justify-between">
            <div>
            <?php $preview_url = isset($_GET['preview_url']) ? esc_url(sanitize_url($_GET['preview_url'])) : '#'; ?>
                <a target="_blank" href="<?php echo esc_url($preview_url); ?>" class="btn preview_btn"><?php esc_html_e('Preview', 'ananta-sites'); ?>
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
            <div class=""> 
            <?php if ( isset($_GET['dtn']) && $_GET['dtn'] == 'Anant Addons for Elementor Pro' && ananta_is_plugin_has_installed('anant-addons-for-elementor-pro') === false ): ?>
                    <?php $pro_link = isset($_GET['pro_link']) ? esc_url(sanitize_url($_GET['pro_link'])) : '#'; ?>
                    <a target="_new" href="<?php echo esc_url($pro_link); ?>" class="btn pro_link"><i class="fa-solid fa-shopping-cart"></i><?php esc_html_e('Buy Now', 'ananta-sites'); ?></a>
                <?php else: ?>
                    <?php $preview_url = isset($_GET['preview_url']) ? esc_url(sanitize_url($_GET['preview_url'])) : '#'; ?>
                    <a href="<?php echo esc_url(add_query_arg(['step' => 2, 'theme_id'=> absint($_GET['theme_id']), 'preview_url' => $preview_url])); ?>" class="btn import_btn">
                        <i class="fa-solid fa-download"></i>
                        <?php esc_html_e('Import', 'ananta-sites'); ?>
                    </a>
                <?php endif; ?>
                <a class="back btn" onclick="history.back()">
                    <i class="fa-solid fa-left-long"></i><?php esc_html_e('Back', 'ananta-sites'); ?>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- End: Preview Step -->