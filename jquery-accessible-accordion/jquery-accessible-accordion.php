<?php
/*
Plugin Name: JQuery Accessible Accordion
Plugin URI: http://wordpress.org/extend/plugins/jquery-accessible-accordion/
Description: WAI-ARIA Enabled Accordion Plugin for Wordpress
Author: Kontotasiou Dionysia
Version: 3.0
Author URI: http://www.iti.gr/iti/people/Dionisia_Kontotasiou.html
*/
include_once 'getRecentPosts.php';
include_once 'getRecentComments.php';
include_once 'getArchives.php';

add_action("plugins_loaded", "JQueryAccessibleAccordion_init");
function JQueryAccessibleAccordion_init() {
    register_sidebar_widget(__('JQuery Accessible Accordion'), 'widget_JQueryAccessibleAccordion');
    register_widget_control(   'JQuery Accessible Accordion', 'JQueryAccessibleAccordion_control', 200, 200 );
    if ( !is_admin() && is_active_widget('widget_JQueryAccessibleAccordion') ) {
        wp_register_style('jquery.ui.all', ( get_bloginfo('wpurl') . '/wp-content/plugins/jquery-accessible-accordion/lib/jquery-ui/themes/base/jquery.ui.all.css'));
        wp_enqueue_style('jquery.ui.all');

        wp_deregister_script('jquery');

        // add your own script
        wp_register_script('jquery-1.6.4', ( get_bloginfo('wpurl') . '/wp-content/plugins/jquery-accessible-accordion/lib/jquery-ui/jquery-1.6.4.js'));
        wp_enqueue_script('jquery-1.6.4');

        wp_register_script('jquery.ui.core.js', ( get_bloginfo('wpurl') . '/wp-content/plugins/jquery-accessible-accordion/lib/jquery-ui/ui/jquery.ui.core.js'));
        wp_enqueue_script('jquery.ui.core.js');

        wp_register_script('jquery.ui.widget', ( get_bloginfo('wpurl') . '/wp-content/plugins/jquery-accessible-accordion/lib/jquery-ui/ui/jquery.ui.widget.js'));
        wp_enqueue_script('jquery.ui.widget');

        wp_register_script('jquery.ui.accordion', ( get_bloginfo('wpurl') . '/wp-content/plugins/jquery-accessible-accordion/lib/jquery-ui/ui/jquery.ui.accordion.js'));
        wp_enqueue_script('jquery.ui.accordion');

        wp_register_style('demos', ( get_bloginfo('wpurl') . '/wp-content/plugins/jquery-accessible-accordion/lib/jquery-ui/demos.css'));
        wp_enqueue_style('demos');

        wp_register_script('JQueryAccessibleAccordion', ( get_bloginfo('wpurl') . '/wp-content/plugins/jquery-accessible-accordion/lib/JQueryAccessibleAccordion.js'));
        wp_enqueue_script('JQueryAccessibleAccordion');
    }
}

function widget_JQueryAccessibleAccordion($args) {
    extract($args);

    $options = get_option("widget_JQueryAccessibleAccordion");
    if (!is_array( $options )) {
        $options = array(
            'title' => 'JQuery Accessible Accordion',
            'archives' => 'Archives',
            'recentPosts' => 'Recent Posts',
            'recentComments' => 'Recent Comments'
        );
    }

    echo $before_widget;
    echo $before_title;
    echo $options['title'];
    echo $after_title;

    //Our Widget Content
    JQueryAccessibleAccordionContent();
    echo $after_widget;
}

function JQueryAccessibleAccordionContent() {
    $recentPosts = get_recent_posts();
    $recentComments = get_recent_comments();
    $archives = get_my_archives();

    $options = get_option("widget_JQueryAccessibleAccordion");
    if (!is_array( $options )) {
        $options = array(
            'title' => 'JQuery Accessible Accordion',
            'archives' => 'Archives',
            'recentPosts' => 'Recent Posts',
            'recentComments' => 'Recent Comments'
        );
    }

    echo '<div class="demo" role="application">
    <div id="accordion">
        <h3><a href="#">' . $options['archives'] . '</a></h3>
	<div>
            <p><ul>
                ' . $archives . '
            </ul></p>
	</div>
	<h3><a href="#">' . $options['recentPosts'] . '</a></h3>
	<div>
            <p><ul>
                ' . $recentPosts . '
            </ul></p>
	</div>
	<h3><a href="#">' . $options['recentComments'] . '</a></h3>
	<div>
            <p><ul>
                ' . $recentComments . '
            </ul></p>
	</div>
    </div>
</div>';
}

function JQueryAccessibleAccordion_control() {
    $options = get_option("widget_JQueryAccessibleAccordion");
    if (!is_array( $options )) {
        $options = array(
            'title' => 'JQuery Accessible Accordion',
            'archives' => 'Archives',
            'recentPosts' => 'Recent Posts',
            'recentComments' => 'Recent Comments'
        );
    }

    if ($_POST['JQueryAccessibleAccordion-SubmitTitle']) {
        $options['title'] = htmlspecialchars($_POST['JQueryAccessibleAccordion-WidgetTitle']);
        update_option("widget_JQueryAccessibleAccordion", $options);
    }
    if ($_POST['JQueryAccessibleAccordion-SubmitArchives']) {
        $options['archives'] = htmlspecialchars($_POST['JQueryAccessibleAccordion-WidgetArchives']);
        update_option("widget_JQueryAccessibleAccordion", $options);
    }
    if ($_POST['JQueryAccessibleAccordion-SubmitRecentPosts']) {
        $options['recentPosts'] = htmlspecialchars($_POST['JQueryAccessibleAccordion-WidgetRecentPosts']);
        update_option("widget_JQueryAccessibleAccordion", $options);
    }
    if ($_POST['JQueryAccessibleAccordion-SubmitRecentComments']) {
        $options['recentComments'] = htmlspecialchars($_POST['JQueryAccessibleAccordion-WidgetRecentComments']);
        update_option("widget_JQueryAccessibleAccordion", $options);
    }
    ?>
    <p>
        <label for="JQueryAccessibleAccordion-WidgetTitle">Widget Title: </label>
        <input type="text" id="JQueryAccessibleAccordion-WidgetTitle" name="JQueryAccessibleAccordion-WidgetTitle" value="<?php echo $options['title'];?>" />
        <input type="hidden" id="JQueryAccessibleAccordion-SubmitTitle" name="JQueryAccessibleAccordion-SubmitTitle" value="1" />
    </p>
    <p>
        <label for="JQueryAccessibleAccordion-WidgetArchives">Translation for "Archives": </label>
        <input type="text" id="JQueryAccessibleAccordion-WidgetArchives" name="JQueryAccessibleAccordion-WidgetArchives" value="<?php echo $options['archives'];?>" />
        <input type="hidden" id="JQueryAccessibleAccordion-SubmitArchives" name="JQueryAccessibleAccordion-SubmitArchives" value="1" />
    </p>
    <p>
        <label for="JQueryAccessibleAccordion-WidgetRecentPosts">Translation for "Recent Posts": </label>
        <input type="text" id="JQueryAccessibleAccordion-WidgetRecentPosts" name="JQueryAccessibleAccordion-WidgetRecentPosts" value="<?php echo $options['recentPosts'];?>" />
        <input type="hidden" id="JQueryAccessibleAccordion-SubmitRecentPosts" name="JQueryAccessibleAccordion-SubmitRecentPosts" value="1" />
    </p>
    <p>
        <label for="JQueryAccessibleAccordion-WidgetRecentComments">Translation for "Recent Comments": </label>
        <input type="text" id="JQueryAccessibleAccordion-WidgetRecentComments" name="JQueryAccessibleAccordion-WidgetRecentComments" value="<?php echo $options['recentComments'];?>" />
        <input type="hidden" id="JQueryAccessibleAccordion-SubmitRecentComments" name="JQueryAccessibleAccordion-SubmitRecentComments" value="1" />
    </p>
    
    <?php
}

?>
