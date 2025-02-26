<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Photo_Gallery_Install
{

    public static function init()
    {
        add_action('init', array(__CLASS__, 'check_version'), 5);
    }

    /**
     * Check Photo Gallery version and run the updater is required.
     *
     * This check is done on all requests and runs if the versions do not match.
     */
    public static function check_version()
    {


        if (get_option('photo_gallery_version') !== Photo_Gallery()->version) {

            self::install();
            update_option('photo_gallery_version', Photo_Gallery()->version);
        }
    }

    public static function install_options()
    {

        if (!get_option('photo_gallery_lightbox_type')) {
                update_option('photo_gallery_lightbox_type', 'new_type');
        }

        if (!get_option('photo_gallery_admin_image_hover_preview')) {
            update_option('photo_gallery_admin_image_hover_preview', 'on');
            update_option('photo_gallery_version', '2.2.0');
        }

        $portfolio_new_columns = array(
            array('categories', 'varchar(200)', 'My_First_Category,My_Second_Category,My_Third_Category,'),
            array('ht_show_sorting', 'varchar(3)', 'off'),
            array('ht_show_filtering', 'varchar(3)', 'off'),
            array('autoslide', 'varchar(3)', 'on'),
            array('show_loading', 'varchar(3)', 'on'),
            array('loading_icon_type', 'int(2)', '1')
        );
        global $wpdb;
        $table_name = $wpdb->prefix . "web_paceportfolio_portfolios";
        foreach ($portfolio_new_columns as $portfolio_new_column) {
            if (!photo_gallery_isset_table_column($table_name, $portfolio_new_column[0])) {
                $query = "ALTER TABLE " . $table_name . " ADD " . $portfolio_new_column[0] . " " . $portfolio_new_column[1] . " DEFAULT '" . $portfolio_new_column[2] . "'";
                $wpdb->query($query);
            }
        }
        global $wpdb;
        $query = "SELECT ht_show_filtering FROM " . $wpdb->prefix . "web_paceportfolio_portfolios WHERE id=1";
        $ht_show_filtering = $wpdb->get_var($query);
        if ($ht_show_filtering != 'on') {
            $wpdb->update(
                $wpdb->prefix . "web_paceportfolio_portfolios",
                array('ht_show_filtering' => 'off'),
                array('id' => 1)
            );
        }

        if (!get_option('photo_gallery_disable_right_click')) {
            update_option('photo_gallery_disable_right_click', 'off');
        }
    }


    /**
     * Install Photo Portfolio.
     */
    public static function install()
    {
        if (!defined('PHOTO_PORTFOLIO_INSTALLING')) {
            define('PHOTO_PORTFOLIO_INSTALLING', true);
        }

        self::create_tables();
        if (!get_option('photo_gallery_version')) {
            update_option('photo_gallery_lightbox_type', 'new_type');
        }
        // Flush rules after install
        self::install_options();

        do_action('photo_gallery_installed');
    }

    private static function create_tables()
    {
        global $wpdb;
        $charset = $wpdb->get_charset_collate();

        $sql_web_paceportfolio_images = "
CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "web_paceportfolio_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `portfolio_id` varchar(200) DEFAULT NULL,
  `description` text,
  `image_url` text,
  `sl_url` text DEFAULT NULL,
  `sl_type` text NOT NULL,
  `link_target` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(4) unsigned DEFAULT NULL,
  `published_in_sl_width` tinyint(4) unsigned DEFAULT NULL,
  `category` text NOT NULL,
  PRIMARY KEY (`id`)
  ) " . $charset . " AUTO_INCREMENT=5";

        $sql_web_paceportfolio_portfolios = "
CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "web_paceportfolio_portfolios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sl_height` int(11) unsigned DEFAULT NULL,
  `sl_width` int(11) unsigned DEFAULT NULL,
  `pause_on_hover` text,
  `portfolio_list_effects_s` text,
  `description` text,
  `param` text,
  `sl_position` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` text,
  `categories` text NOT NULL,
  `ht_show_sorting` varchar(3) NOT NULL DEFAULT 'off',
  `ht_show_filtering` varchar(3) NOT NULL DEFAULT 'off',
  `autoslide` varchar(5) NOT NULL DEFAULT 'on',
  `show_loading` varchar(3) NOT NULL DEFAULT 'on',
  `loading_icon_type` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) " . $charset . " AUTO_INCREMENT=2";

        $table_name = $wpdb->prefix . "web_paceportfolio_images";
        $sql_2 = "
INSERT INTO 
`" . $table_name . "` (`id`, `name`, `portfolio_id`, `description`, `image_url`, `sl_url`, `sl_type`, `link_target`, `ordering`, `published`, `published_in_sl_width`) VALUES
(1, 'Marshall Music Box', '1', '<p><p>Revolutionise the way you listen to music with Marshall Voice. Marshall Voice combines the legendary sound of Marshall with the helpfulness of voice activation to create the world’s greatest sounding smart speakers. Depending on which ecosystem you choose, you can play music, schedule reminders, control your smart home and more – all with the power of your voice.</p><p>The Marshall Wireless Multi-Room Speaker System is an unparalleled listening experience for your home. Consider this system your backstage pass to every song on the planet, as each speaker in the range features multiple ways to connect and listen to your favourite tunes.</p>', '" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/marshal-1.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/marshal-1.1.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/marshal-1.2.jpg" . ";', 'http://webpace.net/wordpress-photo-portfolio-gallery-plugin/', 'image', 'on', 0, 1, NULL),
(2, 'History of coffee', '1', '<h6>Coffee</h6><p>The history of coffee dates back to the 15th century, and possibly earlier with a number of reports and legends surrounding its first use. The native (undomesticated) origin of coffee is thought to have been Ethiopia, with several mythical accounts but no solid evidence.</p>', '" . "https://vimeo.com/82547176" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/coffee-2.1.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/coffee-2.2.jpg" . ";', 'http://webpace.net/wordpress-photo-portfolio-gallery-plugin/', 'video', 'on', 1, 1, NULL),
(3, 'Iphone', '1', '<h6>Iphone </h6><p>The iPhone is one of the world’s most iconic devices and, in the grand scheme of things, it isn’t very old. But when did it begin? Where did the idea come from? </p><p>EThe very first iPhone was unveiled in January 2007 at the MacWorld convention. Steve Jobs revealed what Apple had been developing for nearly 3 years and, for its time, it represented the cutting edge of technology.</p><p>The device was introduced as an iPod with a wider screen, controlled by touch instead of physical buttons. In short, it was a mobile phone and a device to communicate with the internet. At the time, Jobs told the audience that this device would “reinvent the phone”.</p>', '" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/iphone-3.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/iphone-3.1.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/3.2.jpg" . ":" . "https://www.youtube.com/watch?v=YMQdfGFK5XQ" . ";', 'http://webpace.net/wordpress-photo-portfolio-gallery-plugin/', 'image', 'on', 2, 1, NULL),
(4, 'Designer', '1', '<p>Designer is a general term for a person who makes designs for objects. In usage the term is requires specific context, for example a fashion designer designs clothing, a web designer designs web pages, and an automobile designer designs automobiles. In each case, the designer works with the help of a technician or engineer who understands deeper level concepts of manufacturing and engineering, and the designer themself is largely confined to work at a surface level.</p><p>Classically, the main area of design was only architecture, which was understood as the major arts. The design of clothing, furniture, and other common artifacts were left mostly to tradition or artisans specializing in hand making them.</p>', '" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/designer-4.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/designer-4.1.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/designer-4.2.jpg" . ";', 'http://webpace.net/wordpress-photo-portfolio-gallery-plugin/', 'image', 'on', 3, 1, NULL),
(5, 'Shoes', '1', '<h6>Shoes</h6><p>A shoe is an item of footwear intended to protect and comfort the human foot while the wearer is doing various activities. Shoes are also used as an item of decoration and fashion. The design of shoes has varied enormously through time and from culture to culture, with appearance originally being tied to function. Additionally, fashion has often dictated many design elements, such as whether shoes have very high heels or flat ones. Contemporary footwear in the 2010s varies widely in style, complexity and cost. Basic sandals may consist of only a thin sole and simple strap and be sold for a low cost. High fashion shoes made by famous designers may be made of expensive materials, use complex construction and sell for hundreds or even thousands of dollars a pair. Some shoes are designed for specific purposes, such as boots designed specifically for mountaineering or skiing.</p>', '" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/shoes-5.jpg" . ";', 'http://webpace.net/wordpress-photo-portfolio-gallery-plugin/', 'image', 'on', 4, 1, NULL),
(6, 'Retro Cars', '1', '<p>A classic car is an older automobile; the exact definition varies around the world. The common theme is of an older car with enough historical interest to be collectable and worth preserving or restoring rather than scrapping.</p>', '" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/retro-6.jpg" . ";" . "https://vimeo.com/80514062" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/retro-6.1.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/retro-6.2.jpg" . ";', 'http://webpace.net/wordpress-photo-portfolio-gallery-plugin/', 'image', 'on', 5, 1, NULL),
(7, 'Drone Photos', '1', '<h6>Drone Photos</h6><p>Yet innovators ranging from civil engineers to students still in their teens have been experimenting with intriguing new ideas for how these unmanned aerial vehicles could solve real-world problems. Here are five Redshift stories about aerial drones that point toward the future of construction, art, and disaster response.</p>', '" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/drone-7.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/drone-7.2.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/drone-7.3.jpg" . ";', 'http://webpace.net/wordpress-photo-portfolio-gallery-plugin/', 'image', 'on', 6, 1, NULL),
(8, 'Glasses', '1', '<h6>Glasses </h6><p>Glasses, also known as eyeglasses or spectacles, are devices consisting of glass or hard plastic lenses mounted in a frame that holds them in front of a persons eyes, typically using a bridge over the nose and arms which rest over the ears.</p><p>Glasses are typically used for vision correction, such as with reading glasses and glasses used for nearsightedness.</p>', '" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/glasses-8.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/glasses-8.1.jpg" . ";" . Photo_Gallery()->plugin_url() . "/assets/images/front_images/projects/glasses-8.3.jpg" . ";', 'http://webpace.net/wordpress-photo-portfolio-gallery-plugin/', 'image', 'on', 7, 1, NULL)";

        $table_name = $wpdb->prefix . "web_paceportfolio_portfolios";
        $wpdb->query($sql_web_paceportfolio_images);
        $wpdb->query($sql_web_paceportfolio_portfolios);

        if (!$wpdb->get_var("select count(*) from " . $wpdb->prefix . "web_paceportfolio_images")) {
            $wpdb->query($sql_2);
        }
        if (!$wpdb->get_var("select count(*) from " . $wpdb->prefix . "web_paceportfolio_portfolios")) {
            $wpdb->insert(
                $table_name,
                array(
                    'id' => 1,
                    'name' => 'My First Portfolio',
                    'sl_height' => 375,
                    'sl_width' => 600,
                    'pause_on_hover' => 'on',
                    'portfolio_list_effects_s' => '2',
                    'description' => '4000',
                    'param' => '1000',
                    'sl_position' => 'off',
                    'ordering' => 1,
                    'published' => '300',
                    'categories' => 'My_First_Category,My_Second_Category,My_Third_Category,',
                )
            );
        }
        $table_name = $wpdb->prefix . "web_paceportfolio_images";


        if (!self::isset_table_column($table_name, "web_pace_loadDate")) {
            $wpdb->query("ALTER TABLE `" . $table_name . "` ADD `web_pace_loadDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ");
        }
       
    }

    private static function isset_table_column($table_name, $column_name)
    {
        global $wpdb;
        $columns = $wpdb->get_results("SHOW COLUMNS FROM  " . $table_name, ARRAY_A);
        foreach ($columns as $column) {
            if ($column['Field'] == $column_name) {
                return true;
            }
        }

        return false;
    }


}
