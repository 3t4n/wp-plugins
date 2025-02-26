<?php
namespace ArtistPress\Administration\View;

class Settings extends View
{
    const ARTISTPRESS_SETTINGS  = 'artistpress_settings';
    const ARTIST_SETTINGS       = 'artist_settings';
    const SHOW_LIST_SETTINGS    = 'show_list_settings';
    const SHOW_SETTINGS         = 'show_settings';
    const PLAYLIST_SETTINGS     = 'playlist_settings';
    const GALLERY_SETTINGS      = 'gallery_settings';
    const UPGRADE               = 'upgrade';

    /**
     * Builds markup for this views header
	 * @since 1.5.0
     */
    private static function viewHeader()
    {
        ob_start();?>
        
        <div id="view--header">
            <span class="content">
                <h1 class="wp-heading-inline">ArtistPress Settings</h1>
            </span>
        </div>  

        <?php
        print apply_filters(__METHOD__, ob_get_clean());
    }
    
    /**
     * Builds markup for this views body
	 * @since 1.5.0
     */
    private static function viewBody($activeTab = null)
    {
        ob_start();
        
        echo '<div id="view--body">';
            
        settings_errors();
            
        if (isset($_GET['tab'])) {
            $activeTab = $_GET['tab'];
        } elseif ($activeTab == self::ARTIST_SETTINGS) {
            $activeTab = self::ARTIST_SETTINGS;
        } elseif ($activeTab == self::SHOW_LIST_SETTINGS) {
            $activeTab = self::SHOW_LIST_SETTINGS;
        } elseif ($activeTab == self::SHOW_SETTINGS) {
            $activeTab = self::SHOW_SETTINGS;
        } elseif ($activeTab == self::GALLERY_SETTINGS) {
            $activeTab =self::GALLERY_SETTINGS;
        } elseif ($activeTab == self::UPGRADE) {
            $activeTab = self::UPGRADE;
        } else {
            $activeTab= self::ARTIST_SETTINGS;
        }
        ?>
            <section class="nav-tab-wrapper">
                <a href="?page=artistpress_settings&tab=artist_settings" class="nav-tab <?php echo $activeTab == self::ARTIST_SETTINGS ? 'nav-tab-active' : ''; ?>">
                    Artist Settings
                </a>
                <a href="?page=artistpress_settings&tab=show_list_settings" class="nav-tab <?php echo $activeTab == self::SHOW_LIST_SETTINGS ? 'nav-tab-active' : ''; ?>">
                    Show List Settings
                </a>
                <a href="?page=artistpress_settings&tab=show_settings" class="nav-tab <?php echo $activeTab == self::SHOW_SETTINGS ? 'nav-tab-active' : ''; ?>">
                    Individual Show Settings
                </a>
                <a href="?page=artistpress_settings&tab=gallery_settings" class="nav-tab <?php echo $activeTab == self::GALLERY_SETTINGS ? 'nav-tab-active' : ''; ?>">
                    Gallery Settings
                </a>
                <a href="?page=artistpress_settings&tab=upgrade" class="nav-tab <?php echo $activeTab == self::UPGRADE ? 'nav-tab-active' : ''; ?>">
                    Upgrade
                </a>
            </section>
        
            <form method="post" action="options.php">
                <?php
                if ($activeTab == self::ARTISTPRESS_SETTINGS) {
                    settings_fields('artistpress_artist_settings');
                    do_settings_sections('artistpress_artist_settings');
                    submit_button();
                } elseif ($activeTab == self::SHOW_LIST_SETTINGS) {
                    settings_fields('artistpress_show_list_settings');
                    do_settings_sections('artistpress_show_list_settings');
                    submit_button();
                } elseif ($activeTab == self::SHOW_SETTINGS) {
                    settings_fields('artistpress_show_settings');
                    do_settings_sections('artistpress_show_settings');
                    submit_button();
                } elseif ($activeTab == self::GALLERY_SETTINGS) {
                    settings_fields('artistpress_gallery_settings');
                    do_settings_sections('artistpress_gallery_settings');
                    submit_button();
                } elseif ($activeTab == self::UPGRADE) {
                    settings_fields('artistpress_upgrade_settings');
                    do_settings_sections('artistpress_upgrade_settings');
                } else {
                    settings_fields('artistpress_artist_settings');
                    do_settings_sections('artistpress_artist_settings');
                    submit_button();
                }
                ?>
            </form>
        </div>  

        <?php
        print apply_filters(__METHOD__, ob_get_clean());
    }

    /**
     * Builds markup for this view
	 * @since 1.5.0
     */
    public static function getView()
    {
        ob_start();?>

        <div id="view-settings" class="wrap view--settings__artistpress">
            <?php self::viewHeader(); ?>
            <?php self::viewBody(); ?>
        </div>  

        <?php
        print apply_filters(__METHOD__, ob_get_clean());
    }

    public function buildMenu()
    {
        \add_submenu_page(
            'artistpress',
            'Settings',
            'Settings',
            'manage_options',
            'artistpress_settings',
            [__CLASS__, 'getView']
        );
    }
}
