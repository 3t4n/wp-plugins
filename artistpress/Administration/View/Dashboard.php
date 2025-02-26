<?php
namespace ArtistPress\Administration\View;

class Dashboard extends View
{
    /**
     * Builds markup for this views header
	 * @since 1.5.0
     */
    private static function viewHeader()
    {
        \ob_start();?>
        
        <div id="view--header">
            <span class="content">
                <h1 class="wp-heading-inline">ArtistPress Dashboard</h1>
            </span>
        </div>  

        <?php
        print apply_filters( __METHOD__ , \ob_get_clean());
    }
    
    /**
     * Builds markup for this views body
	 * @since 1.5.0
     */
    private static function viewBody($active = null)
    {
        \ob_start();?>

        <div id="artistpress-dashboard" class="artistpress--dashboard">
            <div id="artistpress-dashboard-header" class="artistpress--dashboard--header">
                <span class="branding"></span>
                <span class="content">
                    <h2>Turning your WordPress website into a robust tool for managing a professional art career.</h2>
                </span>
            </div>
            <div id="artistpress-dashboard-content" class="artistpress--dashboard--content">
                
                <div id="artistpress-dashboard-widget-artist" class="artistpress--dashboard--widget artistpress--dashboard--widget__artist">
                    <span class="icon"></span>
                    <div class="widget--content">
                        <h2 class="heading">Provide artist contact info and bios.</h2>
                        <p>ArtistPress allows you to add contact information and bio for one artist or band. With an upgrade to ArtistPress Community the one artist limit is removed, making it the perfect plugin for a record label, promoter/manager or event venue.</p>
                    </div>
                </div>

                <div id="artistpress-dashboard-widget-shows" class="artistpress--dashboard--widget artistpress--dashboard--widget__shows">
                    <span class="icon"></span>
                    <div class="widget--content">
                        <h2 class="heading">Feature shows in a professional event listing.</h2>
                        <p>ArtistPress allows you to add information about event venues and shows/openings. With the use of a shortcode or built in page templates, you can display the shows in a professionally formated event listing.</p>
                    </div>
                </div>

                <div id="artistpress-dashboard-widget-gallery" class="artistpress--dashboard--widget artistpress--dashboard--widget__gallery">
                    <span class="icon"></span>
                    <div class="widget--content">
                        <h2 class="heading">Highlight photos of events or artwork.</h2>
                        <p>ArtistPress allows you add unlimited images, galleries and albums to your website. The galleries can be displayed in a masonary or grid layout and have a lightbox featured built in.</p>
                    </div>
                </div>     

                <div id="artistpress-dashboard-widget-playlist" class="artistpress--dashboard--widget artistpress--dashboard--widget__playlist">
                    <span class="icon"></span>
                    <div class="widget--content">
                        <h2 class="heading">Playlists.</h2>
                        <p>With a subscription to ArtistPress Pro you are provided with access to the playlist functionality allowing you to publish up to 5 playlists on your site using a simple shortcode. If you need more than 5 playlists, upgrade to ArtistPress Community. The five playlist limit is removed, allowing you to publish music to your hearts content.</p>
                    </div>
                </div>

                <div id="artistpress-dashboard-widget-social" class="artistpress--dashboard--widget artistpress--dashboard--widget__social">
                    <span class="icon"></span>
                    <div class="widget--content">
                        <h2 class="heading">Get Social</h2>
                        <p>With a subscription to ArtistPress Pro you are provided with access to the social sharing tool for sharing on leading social media networks.</p>
                       </div>
                </div> 
            </div>  
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
        \ob_start();?>

        <div id="view-settings" class="wrap view--dashboard__artistpress">
            <?php self::viewHeader(); ?>
            <?php self::viewBody(); ?>
        </div>  

        <?php
        print apply_filters(__METHOD__, \ob_get_clean());
    }

    public function buildMenu()
    {
        \add_menu_page(
            'ArtistPress',
            'ArtistPress',
            'manage_options',
            'artistpress',
            [__CLASS__, 'getView'],
            'dashicons-art',
            20
        );
    }
}
