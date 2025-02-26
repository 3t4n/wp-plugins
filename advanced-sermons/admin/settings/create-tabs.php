<?php


// Create general tab

add_action( 'asp_settings_tab', 'asp_general_tab', 1 );
function asp_general_tab(){
global $asp_active_tab; ?>
		<a class="asp-nav-tab <?php echo $asp_active_tab == 'general' || '' ? 'asp-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'edit.php?post_type=sermons&page=asp-settings&tab=general' ); ?>"><?php _e( 'General', 'advanced-sermons' ); ?> </a>
<?php }


// Create archive tab

add_action( 'asp_settings_tab', 'asp_archive_tab', 2 );
function asp_archive_tab(){
global $asp_active_tab; ?>
		<a class="asp-nav-tab <?php echo $asp_active_tab == 'archive' || '' ? 'asp-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'edit.php?post_type=sermons&page=asp-settings&tab=archive' ); ?>"><?php _e( 'Archive', 'advanced-sermons' ); ?> </a>
<?php }


// Create single sermon tab

add_action( 'asp_settings_tab', 'asp_single_sermon_tab', 3 );
function asp_single_sermon_tab(){
global $asp_active_tab; ?>
		<a class="asp-nav-tab <?php echo $asp_active_tab == 'single-sermon' || '' ? 'asp-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'edit.php?post_type=sermons&page=asp-settings&tab=single-sermon' ); ?>"><?php _e( 'Single Sermon', 'advanced-sermons' ); ?> </a>
<?php }


// Create display tab

add_action( 'asp_settings_tab', 'asp_design_tab', 4 );
function asp_design_tab(){
global $asp_active_tab; ?>
		<a class="asp-nav-tab <?php echo $asp_active_tab == 'design' || '' ? 'asp-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'edit.php?post_type=sermons&page=asp-settings&tab=design' ); ?>"><?php _e( 'Design', 'advanced-sermons' ); ?> </a>
<?php }


// Create misc tab

add_action( 'asp_settings_tab', 'asp_misc_tab', 5 );
function asp_misc_tab(){
		global $asp_active_tab; ?>
		<a class="asp-nav-tab <?php echo $asp_active_tab == 'misc' || '' ? 'asp-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'edit.php?post_type=sermons&page=asp-settings&tab=misc' ); ?>"><?php _e( 'Misc', 'advanced-sermons' ); ?> </a>
<?php }


// Create language tab

add_action( 'asp_settings_tab', 'asp_language_tab', 6 );
function asp_language_tab(){
		global $asp_active_tab; ?>
		<a class="asp-nav-tab <?php echo $asp_active_tab == 'language' || '' ? 'asp-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'edit.php?post_type=sermons&page=asp-settings&tab=language' ); ?>"><?php _e( 'Language', 'advanced-sermons' ); ?> </a>
<?php }


// Create shortcodes tab

add_action( 'asp_settings_tab', 'asp_shortcodes_tab', 7 );
function asp_shortcodes_tab(){
		global $asp_active_tab; ?>
		<a class="asp-nav-tab <?php echo $asp_active_tab == 'shortcodes' || '' ? 'asp-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'edit.php?post_type=sermons&page=asp-settings&tab=shortcodes' ); ?>"><?php _e( 'Shortcodes', 'advanced-sermons' ); ?> </a>
<?php }


// Create import/export tab

add_action( 'asp_settings_tab', 'asp_import_export_tab', 8 );
function asp_import_export_tab(){
    global $asp_active_tab; ?>
    <a class="asp-nav-tab <?php echo $asp_active_tab == 'import-export' || '' ? 'asp-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'edit.php?post_type=sermons&page=asp-settings&tab=import-export' ); ?>"><?php _e( 'Import/Export', 'advanced-sermons' ); ?> </a>
<?php }


// Create upgrade tab

add_action( 'asp_settings_tab', 'asp_upgrade_tab', 9 );
function asp_upgrade_tab(){
    if (!is_plugin_active('advanced-sermons-pro/advanced-sermons-pro.php') ) {
        global $asp_active_tab; ?>
        <a class="asp-nav-tab <?php echo $asp_active_tab == 'upgrade' || '' ? 'asp-nav-tab-active' : ''; ?> asp-upgrade-button" href="https://advancedsermons.com/pricing/" target="_blank"><?php _e( 'Buy Pro Version', 'advanced-sermons' ); ?> </a>
<?php }
}
