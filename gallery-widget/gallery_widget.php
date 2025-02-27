<?php
/*
Plugin Name: Gallery Widget
Website link: http://blog.splash.de/
Author URI: http://blog.splash.de/
Plugin URI: http://blog.splash.de/plugins/gallery-widget/
Description: Simple widget to show the latest/random images of the WordPress media gallery as a Widget, using a shortcode or directly with a php-function.
Author: Oliver Schaal
Version: 1.1.6
*/

if (!function_exists('is_admin')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

global $wp_version;
define('WPV28', version_compare($wp_version, '2.8', '>='));

if (!class_exists("GalleryWidget")) {
    class GalleryWidget {

        // version
        var $version = '1.1.5';

        // update notice
        var $checkfile = 'http://blog.splash.de/_chk/gallerywidget/';

        /* __construct */
        function __construct() {
            //load language
            if (function_exists('load_plugin_textdomain'))
                load_plugin_textdomain('gallerywidget', WP_PLUGIN_DIR.'/gallery-widget/lang/', '/gallery-widget/lang/');

            register_deactivation_hook(__FILE__, array(&$this, 'deactivatePlugin'));
            if (!WPV28) {
                add_action('plugins_loaded', array(&$this, 'initPlugin'));
            }
            add_shortcode('getGWImages', array(&$this, 'getShortCodeAttachedImages'));
            add_shortcode('getGWImages2', array(&$this, 'getShortCodeAttachedImagesByCategories'));
            add_action( 'after_plugin_row', array(&$this, 'plugin_version_nag') );
        }
        /* __construct */

        /* initPlugin */
        function initPlugin() {
            if (function_exists('register_sidebar_widget')) {
               register_sidebar_widget(__('Gallery Widget', 'wGallery'),
                                          array(&$this, 'getWidget'));
            }
            if (function_exists('register_widget_control')) {
                register_widget_control(__('Gallery Widget', 'wGallery'),
                                           array(&$this, 'controlWidget'), 300, 200);
            }
        }
        /* initPlugin */

        /* nagscreen at plugins page */
        function plugin_version_nag($plugin) {
            if (preg_match('/gallery-widget/i',$plugin) && !empty($this->checkfile)) {
                $this->plugin_version_get($this->checkfile.$this->version);
            }
        }
        function plugin_version_get($checkfile, $tr=false) {
            $vcheck = wp_remote_fopen($checkfile);

            if($vcheck) {
                $status = explode('@', $vcheck);
                $theVersion = $status[1];
                $theMessage = $status[3];
                if( $theMessage ) {
                    if($tr == true)
                        echo '</tr><tr>';
                    $msg = __("Updatenotice for:", "gallerywidget").' <strong>'
                           .$theVersion.'</strong><br />'.$theMessage;
                    echo '<td colspan="5" class="plugin-update" style="line-height:1.2em;">'.$msg.'</td>';
                }
                if (version_compare($theVersion, $this->version) == 1) {
                    $this->plugin_version_get($this->checkfile.$theVersion, true);
                }
            }
        }
        /* nagscreen at plugins page */

        /* deactivatePlugin */
        function deactivatePlugin()
        {
            delete_option('widget_wGallery');
        }
        /* deactivatePlugin */

        /* getShortCodeAttachedImages */
        function getShortCodeAttachedImages($arg) {
            $options = shortcode_atts( array(
                                             'max' => 5,
                                             'order' => 'latest',
                                             'linktype' => 'page',
                                             'linkclass' => '',
                                             'linkrel' => ''
                                             ), $arg );

            return $this->getAttachedImages($options['max'], $options['order'],
                                            $options['linktype'],
                                            $options['linkclass'],
                                            $options['linkrel']);
        }
        /* getShortCodeAttachedImages */

        /* getShortCodeAttachedImagesByCategories */
        function getShortCodeAttachedImagesByCategories($arg) {
            $options = shortcode_atts( array(
                                             'max' => 5,
                                             'order' => 'latest',
                                             'categories' => '0',
                                             'option' => 'exclude',
                                             'linktype' => 'page',
                                             'linkclass' => '',
                                             'linkrel' => '',
                                             'singleimage' => 'no'
                                             ), $arg );

            return $this->getAttachedImagesByCategories($options['max'],
                                                        $options['order'],
                                                        $options['categories'],
                                                        $options['option'],
                                                        $options['linktype'],
                                                        $options['linkclass'],
                                                        $options['linkrel'],
                                                        $options['singleimage']);
        }
        /* getShortCodeAttachedImagesByCategories */

        /* getImageLink */
        function getImageLink($id, $linktype, $parent_id = 0)
        {
            if ($linktype == 'direct') {
                return wp_get_attachment_url($id);
            } elseif ($linktype == 'article') {
                if ($parent_id == 0) {
                    $parent_id == $id;
                }
                return get_permalink($parent_id);
            } else {
                return get_attachment_link($id);
            }
        }
        /* getImageLink */

        /* getAttachedImagesByCategories */
        function getAttachedImagesByCategories($_max = 5, $order = 'latest',
            $categories = '0', $option = 'include',
            $linktype = 'page', $linkclass = '',
            $linkrel = '', $singleimage = 'no')
        {
            global $wpdb; // wordpress database access
            $_addcss = '';
            $_addrel = '';

            if ($order == 'random') {
                $_orderby = 'ORDER BY RAND() ';
            } else {
                $_orderby = 'ORDER BY posts.post_date DESC ';
            }

            if ($singleimage == 'yes') {
                $_groupby = 'GROUP BY posts.post_parent ';
            } else {
                $_groupby = '';
            }

            if (empty($categories)) $categories = '0';    // otherwise 0 -> ''

            if ($option == 'exclude') {
                $_query = "SELECT DISTINCT ID FROM $wpdb->posts AS posts
                           INNER JOIN $wpdb->term_relationships AS tr ON ( posts.ID = tr.object_id )
                           INNER JOIN $wpdb->term_taxonomy AS tt ON ( tr.term_taxonomy_id = tt.term_taxonomy_id )
                           WHERE posts.post_type = 'post' AND (term_id IN ( $categories )
                           OR posts.post_status = 'draft' OR posts.post_status = 'future')";
            } else {
                $_query = "SELECT DISTINCT ID FROM $wpdb->posts AS posts
                           INNER JOIN $wpdb->term_relationships AS tr ON ( posts.ID = tr.object_id )
                           INNER JOIN $wpdb->term_taxonomy AS tt ON ( tr.term_taxonomy_id = tt.term_taxonomy_id )
                           WHERE posts.post_type = 'post' AND posts.post_status = 'publish'
                           AND term_id IN ( $categories )";
            }
            // print ('<!-- SQL 1:'. $_query . "-->\n");

            unset($_list);
            $_idarray = $wpdb->get_results($_query, ARRAY_A);
            if (is_array($_idarray)) {
                foreach ($_idarray as $id) {
                    $_list[] = $id['ID'];
                }
                $_list = implode(',', $_list);
            } else {
                $_list = '0';
            }

            if ($option == 'exclude') {
                $_query = $wpdb->prepare("SELECT ID, post_title, post_parent FROM $wpdb->posts AS posts
                           WHERE posts.post_type = 'attachment'
                           AND posts.post_mime_type IN ('image/jpeg','image/gif','image/jpg','image/png')
                           AND posts.post_parent NOT IN ( $_list ) ${_groupby}${_orderby}LIMIT 0 , %d", $_max);
            } else {
                $_query = $wpdb->prepare("SELECT ID, post_title, post_parent FROM $wpdb->posts AS posts
                           WHERE posts.post_type = 'attachment'
                           AND posts.post_mime_type IN ('image/jpeg','image/gif','image/jpg','image/png')
                           AND posts.post_parent IN ( $_list ) ${_groupby}${_orderby}LIMIT 0 , %d", $_max);
            }
            // print ('<!-- SQL 2:'. $_query . "-->\n");

            $_result = $wpdb->get_results($_query);

            if (count($_result > 0)) {
                $_retval = '<ul class="wGallery">';
                foreach($_result as $_post) {
                    if (!empty($linkclass)) {
                        $_addcss = ' class="'.$linkclass.'"';
                    }
                    if (!empty($linkrel)) {
                        $_addrel = ' rel="'.$linkrel.'"';
                    }
                    $_retval .= '<li class="wGallery"><a href="' .
                    $this->getImageLink($_post->ID, $linktype, $_post->post_parent) .
                                '"' . $_addcss . $_addrel . '><img src="' .
                    wp_get_attachment_thumb_url($_post->ID) . '" alt="' .
                    $_post->post_title . '" /></a></li>';
                }
                $_retval .= '</ul>';
            }

            return $_retval;
        }
        /* getAttachedImagesByCategories */

        /* getAttachedImages */
        function getAttachedImages($_max = 5, $order = 'latest', $linktype = 'page',
            $linkclass = '', $linkrel = '')
        {
            $_addcss = '';
            $_addrel = '';
            $_retval = '';

            if ($order == 'random') {
                $r = new WP_Query("showposts=$_max&what_to_show=posts&post_status=inherit&post_type=attachment&orderby=rand&post_mime_type=image/jpeg,image/gif,image/jpg,image/png");
            } else {
                $r = new WP_Query("showposts=$_max&what_to_show=posts&post_status=inherit&post_type=attachment&orderby=menu_order ASC, ID ASC&post_mime_type=image/jpeg,image/gif,image/jpg,image/png");
            }

            if ($r->have_posts()) {
                $_retval = '<ul class="wGallery">';
                while ($r->have_posts()) : $r->the_post();

                if (!empty($linkclass)) {
                    $_addcss = ' class="'.$linkclass.'"';
                }
                if (!empty($linkrel)) {
                    $_addrel = ' rel="'.$linkrel.'"';
                }
                $_retval .= '<li class="wGallery"><a href="' .
                $this->getImageLink(get_the_ID(), $linktype) .
                                '"' . $_addcss . $_addrel . '><img src="' .
                wp_get_attachment_thumb_url(get_the_ID()) .
                                '" alt="' . get_the_title() . '" /></a></li>';

                endwhile;
                $_retval .= '</ul>';
            }

            return $_retval;
        }
        /* getAttachedImages */

        /* getWidget */
        function getWidget($args)
        {
            extract($args);

            $options = get_option('widget_wGallery');

            $title = empty($options['title']) ? 'Gallery Widget' : $options['title'];
            $max = empty($options['max']) ? 5 : $options['max'];
            $order = empty($options['order']) ? 'latest' : $options['order'];
            $category_option = empty($options['category_option']) ? 'all' : $options['category_option'];
            $categories = empty($options['categories']) ? '' : $options['categories'];
            $showon = empty($options['showon']) ? 'all' : $options['showon'];
            $linktype = empty($options['linktype']) ? 'page' : $options['linktype'];
            $singleimage = empty($options['singleimage']) ? 'no' : $options['singleimage'];
            $linkclass = empty($options['linkclass']) ? '' : $options['linkclass'];
            $linkrel = empty($options['linkrel']) ? '' : $options['linkrel'];

            if ((is_home() && $showon == 'home') || $showon == 'all') {
                echo $before_widget;
                echo $before_title . $title . $after_title;
                if ($category_option == "include" || $category_option == "exclude") {
                    echo $this->getAttachedImagesByCategories($max, $order, $categories,
                        $category_option, $linktype,
                        $linkclass, $linkrel,
                        $singleimage);
                } else {
                    echo $this->getAttachedImages($max, $order, $linktype, $linkclass, $linkrel);
                }
                echo $after_widget;
            }
        }
        /* getWidget */

        /* controlWidget */
        function controlWidget()
        {
            $options = get_option('widget_wGallery');

            if ($_POST['wGallery-submit']) {
                $options['title'] = strip_tags(stripslashes($_POST['wGallery-title']));
                $options['order'] = strip_tags(stripslashes($_POST['wGallery-order']));
                $options['max'] = strip_tags(stripslashes($_POST['wGallery-max']));
                $options['category_option'] = strip_tags(stripslashes($_POST['wGallery-category_option']));
                $options['categories'] = strip_tags(stripslashes($_POST['wGallery-categories']));
                $options['showon'] = strip_tags(stripslashes($_POST['wGallery-showon']));
                $options['linktype'] = strip_tags(stripslashes($_POST['wGallery-linktype']));
                $options['singleimage'] = strip_tags(stripslashes($_POST['wGallery-singleimage']));
                $options['linkclass'] = strip_tags(stripslashes($_POST['wGallery-linkclass']));
                $options['linkrel'] = strip_tags(stripslashes($_POST['wGallery-linkrel']));
            }

            update_option('widget_wGallery', $options);

            $title = htmlspecialchars($options['title'], ENT_QUOTES);
            $max = htmlspecialchars($options['max'], ENT_QUOTES);
            $order = htmlspecialchars($options['order'], ENT_QUOTES);
            $category_option = htmlspecialchars($options['category_option'], ENT_QUOTES);
            $categories = htmlspecialchars($options['categories'], ENT_QUOTES);
            $showon = htmlspecialchars($options['showon'], ENT_QUOTES);
            $linktype = htmlspecialchars($options['linktype'], ENT_QUOTES);
            $singleimage = htmlspecialchars($options['singleimage'], ENT_QUOTES);
            $linkclass = htmlspecialchars($options['linkclass'], ENT_QUOTES);
            $linkrel = htmlspecialchars($options['linkrel'], ENT_QUOTES);

            $ordervalue = array("latest", "random");
            $category_option_value = array('all', 'include', 'exclude');
            $showon_options = array('all', 'home');
            $linktype_options = array('page', 'direct', 'article');
            $singleimage_options = array('no', 'yes');

            ?>
    <div>
        <?php print_r($newoptions);
        ?>

        <label for="wGallery-title" style="line-height:35px;display:block;">widget title:
            <input type="text" id="wGallery-title" name="wGallery-title" value="<?php echo $title; ?>" />
        </label>

        <label for="wGallery-max" style="line-height:35px;display:block;">max images:
            <input type="text" id="wGallery-max" name="wGallery-max" value="<?php echo $max; ?>" />
        </label>

        <label for="wGallery-order" style="line-height:35px;display:block;">order:
            <select name="wGallery-order" id="wGallery-order">
                <?php foreach ($ordervalue as $option) {

                    ?>
                <option<?php if ($order == $option) {
                    echo ' selected="selected"';
                }

                ?>><?php echo $option;

                ?></option>
                <?php }

            ?>
            </select>
        </label>

        <label for="wGallery-linktype" style="line-height:35px;display:block;">Linktype*:
            <select name="wGallery-linktype" id="wGallery-linktype">
                <?php foreach ($linktype_options as $option) {

                    ?>
                <option<?php if ($linktype == $option) {
                    echo ' selected="selected"';
                }

                ?>><?php echo $option;

                ?></option>
                <?php }

            ?>
            </select>
        </label>

        <label for="wGallery-singleimage" style="line-height:35px;display:block;">Show only 1 image per post*:
            <select name="wGallery-singleimage" id="wGallery-singleimage">
                <?php foreach ($singleimage_options as $option) {

                    ?>
                <option<?php if ($singleimage == $option) {
                    echo ' selected="selected"';
                }

                ?>><?php echo $option;

                ?></option>
                <?php }

            ?>
            </select>
        </label>

        <label for="wGallery-linkclass" style="line-height:35px;display:block;">CSS-Class to add to the link:
            <input type="text" id="wGallery-linkclass" name="wGallery-linkclass" value="<?php echo $linkclass; ?>" />
        </label>

        <label for="wGallery-linkrel" style="line-height:35px;display:block;">Relation:
            <input type="text" id="wGallery-linkrel" name="wGallery-linkrel" value="<?php echo $linkrel; ?>" />
        </label>

        <label for="wGallery-showon" style="line-height:35px;display:block;">Where to show:
            <select name="wGallery-showon" id="wGallery-showon">
                <?php foreach ($showon_options as $option) {

                    ?>
                <option<?php if ($showon == $option) {
                    echo ' selected="selected"';
                }

                ?>><?php echo $option;

                ?></option>
                <?php }

            ?>
            </select>
        </label>

        <label for="wGallery-category_option" style="line-height:35px;display:block;">category-option:
            <select name="wGallery-category_option" id="wGallery-category_option">
                <?php foreach ($category_option_value as $option) {

                    ?>
                <option<?php if ($category_option == $option) {
                    echo ' selected="selected"';
                }

                ?>><?php echo $option;

                ?></option>
                <?php }

            ?>
            </select>
        </label>

        <label for="wGallery-categories" style="line-height:35px;display:block;">categories (comma separated)*:
            <input type="text" id="wGallery-categories" name="wGallery-categories" value="<?php echo $categories; ?>" />
        </label>

        <input type="hidden" name="wGallery-submit" id="wGallery-submit" value="1" />
    </div>
    <?php

        }
        /* controlWidget */

    }
}

if (class_exists("GalleryWidget")) {
    $galleryWidget = new GalleryWidget();
}

if (WPV28) {
    require_once('GalleryWidgetObject.php');
}

/* Wrapper for old function calls, you shouldn't use it anymore */
if (is_object($galleryWidget)) {
    function get_attached_images_by_categories($_max = 5, $order = 'latest',
    $categories = 0, $option = 'include',
    $linktype = 'page', $linkclass = '',
    $linkrel = '', $singleimage = 'no')
    {
        global $galleryWidget;
        return $galleryWidget->getAttachedImagesByCategories($_max, $order,
               $categories, $option, $linktype, $linkclass, $linkrel, $singleimage);
    }
    function get_attached_images($_max = 5, $order = 'latest', $linktype = 'page',
    $linkclass = '', $linkrel = '')
    {
        global $galleryWidget;
        return $galleryWidget->getAttachedImages($_max, $order,
               $option, $linktype, $linkclass, $linkrel);
    }
}
?>==== ORIGINAL VERSION trunk/gallery_widget.php 126072447017512
