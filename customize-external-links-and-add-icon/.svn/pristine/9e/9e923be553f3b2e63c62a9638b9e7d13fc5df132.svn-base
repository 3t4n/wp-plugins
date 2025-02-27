<?php
/*
 * Plugin Name: Customize External Links and add Icon
 * Plugin URI:
 * Description: Add nofollow and remove noreferrer attributes in external links. Choose between different icons to show users which link is an external one.
 * Author: blapps
 * Version: 2.3.2
 * Tested up to: 6.7
 * Text Domain: customize-external-links
 * Domain Path: /languages
 */

include_once 'customizer-external-links-initiate.php';

global $wp_version;

//if php lower than 8 + wp version https: //wptheming.com/2010/12/check-wordpress-version/

if ((phpversion() < 8) && (version_compare($wp_version, '5.9', '=<'))) {
    function str_starts_with($haystack, $needle)
    {
        return strpos($haystack, $needle) === 0;
    }
}

function cuexlinks_is_internal_link($url)
{
    // bypass #more type internal link
    $result = preg_match('/href(\s)*=(\s)*"[#|\/]*[a-zA-Z0-9-_\/]+"/', $url);

    if (str_starts_with($url, '#')) {
        return true;
    }

    if (str_starts_with($url, '/#')) {
        return true;
    }

    if ($url == "") {
        //    return true;
    }

    if ($result) {
        return true;
    }

    $pos = strpos($url, cuexlinks_get_domain());
    if ($pos !== false) {
        return true;
    }

    return false;
}

function cuexlinks_is_link_available($content = '')
{
    if ($content == '') {
        return null;
    }

    $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>";

    if (preg_match_all("/$regexp/siU", $content, $matches, PREG_SET_ORDER)) {
        return $matches;
    }

    return null;
}

function cuexlinks_is_link2_available($content = '')
{
    if ($content == '') {
        return null;
    }

    //$regexp = "<a.*href=([^ ]*).*>(.*)<\/a>";
    //$regexp = '<a[^>]*href=([^ ]*)[^>]*>([^<]*)<\/a>';
    $regexp = '<a[^>]*href="\s?([^ ]*)\s?"[^>]*>(.*?(?=<\/a>))<\/a>';

    if (preg_match_all("/$regexp/", $content, $matches, PREG_SET_ORDER)) {
        return $matches;
    }

    return null;
}

function cuexlinks_get_domain()
{
    // return get_option('home');
    return $_SERVER['HTTP_HOST'];
}

function cuexlinks_get_exclude_domains_list()
{
    $exclude_domains_list = array();

    $options = get_option('plugin_options');

    if ($options['text_area_exclude'] != '') {
        $exclude_domains_list = explode(",", $options['text_area_exclude']);
    }

    return $exclude_domains_list;
}

function cuexlinks_is_domain_not_excluded($url)
{
    $domain_check_flag = true;

    $exclude_domains_list = cuexlinks_get_exclude_domains_list();

    if (!count($exclude_domains_list)) {
        return $domain_check_flag;
    }

    $exclude_domains_list = array_filter($exclude_domains_list);

    foreach ($exclude_domains_list as $domain) {

        $domain = trim($domain);

        if ($domain == '') {
            continue;
        }

        $pos = strpos($url, $domain);

        if ($pos === false) {
            continue;
        } else {
            $domain_check_flag = false;
            break;
        }
    }

    return $domain_check_flag;
}

function cuexlinks_add_target_blank($url, $tag)
{
    $options = get_option('plugin_options');
    $target_attr = '';
    $pattern = '/target\s*=\s*"\s*_(blank|parent|self|top)\s*"/';

    // Prüfe ob die Option aktiviert ist und ob bereits ein target-Attribut existiert
    if (is_array($options) && isset($options['chkNewWindow']) && $options['chkNewWindow']) {
        if (preg_match($pattern, $url) === 0) {
            $target_attr .= ' target="_blank"';
        }
    }

    // Füge das target-Attribut nur hinzu, wenn die Option aktiviert ist
    if ($target_attr) {
        $tag = cuexlinks_update_close_tag($tag, $target_attr);
    }

    return $tag;
}


function cuexlinks_add_rel_nofollow($url, $tag)
{
    // Überprüfen, ob die Domain in der Ausschlussliste enthalten ist
    if (!cuexlinks_is_domain_not_excluded($url)) {
        // Wenn die Domain ausgeschlossen ist, einfach den Tag zurückgeben, ohne Änderungen vorzunehmen
        return $tag;
    }

    $no_follow = '';
    $pattern = '/rel\s*=\s*\"[a-zA-Z0-9_\s]*\"/';

    $result = preg_match($pattern, $url, $match);

    if ($result === 0) {
        $no_follow .= ' rel="nofollow"';
    } else {
        if (
            strpos($match[0], 'nofollow') === false &&
            strpos($match[0], 'dofollow') === false
        ) {
            $temp = $match[0];
            $temp = substr_replace($temp, ' nofollow"', -1);
            $tag = str_replace($match[0], $temp, $tag);
        }
    }

    if ($no_follow) {
        $tag = cuexlinks_update_close_tag($tag, $no_follow);
    }

    return $tag;
}

function cuexlinks_add_rel_noreferrer($url, $tag)
{
    $no_referrer = '';
    // $pattern = '/rel\s*=\s*"\s*[n|d]ofollow\s*"/';
    // $pattern = '/rel\s*=\s*\"[a-zA-Z0-9_\s]*[n|d]ofollow[a-zA-Z0-9_\s]*\"/';
    $pattern = '/rel\s*=\s*\"[a-zA-Z0-9_\s]*\"/';

    $result = preg_match($pattern, $url, $match);

    if ($result === 0) {
        $no_referrer .= ' rel="noreferrer"';
    } else {
        if (
            strpos($match[0], 'noreferrer') === false &&
            strpos($match[0], 'referrer') === false
        ) {
            $temp = $match[0];
            $temp = substr_replace($temp, ' noreferrer"', -1);
            $tag = str_replace($match[0], $temp, $tag);
        }
    }

    if ($no_referrer) {
        $tag = cuexlinks_update_close_tag($tag, $no_referrer);
    }

    return $tag;
}

function cuexlinks_add_rel_noopener($url, $tag) {
    $no_opener = ' rel="noopener"';

    // Check if 'rel' attribute already exists
    if (strpos($tag, 'rel=') === false) {
        $tag = cuexlinks_update_close_tag($tag, $no_opener);
    } else {
        // Append 'noopener' if it's not already present
        $pattern = '/rel\s*=\s*"([^"]*)"/';
        $tag = preg_replace($pattern, 'rel="$1 noopener"', $tag);
    }

    return $tag;
}


function cuexlinks_update_close_tag($tag, $no_follow)
{
    return substr_replace($tag, $no_follow . '>', -1);
}
function cuexlinks_url_parse($content) {
    $matches = cuexlinks_is_link_available($content);

    if ($matches === null) {
        return $content;
    }

    for ($i = 0; $i < count($matches); $i++) {
        $tag = $matches[$i][0];
        $url = $matches[$i][0];

        if (cuexlinks_is_internal_link($url)) {
            continue;
        }

        $tag = cuexlinks_add_target_blank($url, $tag);
        $tag = cuexlinks_add_rel_nofollow($url, $tag);
        $tag = cuexlinks_add_rel_noopener($url, $tag); // Add noopener

        $content = str_replace($url, $tag, $content);
    }

    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function cuexlinks_url_parse_noreferrer($content) {
    $matches = cuexlinks_is_link_available($content);

    if ($matches === null) {
        return $content;
    }

    for ($i = 0; $i < count($matches); $i++) {
        $tag = $matches[$i][0];
        $url = $matches[$i][0];

        if (cuexlinks_is_internal_link($url)) {
            continue;
        }

        $tag = cuexlinks_add_target_blank($url, $tag);
        $tag = cuexlinks_add_rel_noreferrer($url, $tag);
        $tag = cuexlinks_add_rel_noopener($url, $tag); // Add noopener

        $content = str_replace($url, $tag, $content);
    }

    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function cuexlinks_get_icon() {
    // Get the plugin options
    $options = get_option('plugin_options');

    // Check if $options is a valid array
    if (!is_array($options)) {
        // If not, return an empty string or handle the error
        return '';
    }

    $icon = "";

    // Ensure the 'option_iconType' key exists in the options array
    switch ($options['option_iconType']) {
        case "fa-external-link-square-alt":
            $icon = "<i class=\"fas fa-external-link-square-alt\"></i>";
            break;
        case "fa-external-link-alt":
            $icon = "<i class=\"fas fa-external-link-alt\"></i>";
            break;
        case "ascii-8599":
            $icon = "&#8599;";
            break;
        case "ascii-8625":
            $icon = "&#8625;";
            break;
        case "ascii-8663":
            $icon = "&#8663;";
            break;
        case "manual":
            // Check if 'text_manual' is set in options
            $icon = isset($options['text_manual']) ? $options['text_manual'] : '';
            break;
        case "None":
            break;
        default:
            $icon = "";
            break;
    }

    return $icon;
}


function cuexlinks_closing_parse($content)
{
    $options = get_option('plugin_options');

    if ($options && isset($options['option_iconType']) && $options['option_iconType'] == "None") {
        return $content;
    }

    $icon = cuexlinks_get_icon();
    $matches = cuexlinks_is_link2_available($content);

    if ($matches === null) {
        return $content;
    }

    for ($i = 0; $i < count($matches); $i++) {
        $url = $matches[$i][1];
        $linktext = $matches[$i][2];
        $fullmatch = $matches[$i][0];

        $blogurl = get_site_url();
        if ((cuexlinks_is_internal_link($url)) != (strpos($url, $blogurl) != 0)) {
            continue;
        }

        if (strpos($linktext, 'src=')) {
            continue;
        }

        if ($options && isset($options['text_cssclass']) && $options['text_cssclass'] != "") {
            $icon = '<span class="' . $options['text_cssclass'] . '">' . $icon . '</span>';
        }

        if ($options && isset($options['chkIconSize']) && $options['chkIconSize'] && ($options['option_iconType'] != "None")) {
            $text = $linktext . ' <sup>' . $icon . '</sup>';
        } elseif ($options && isset($options['option_iconType']) && $options['option_iconType'] == "None") {
            $text = $linktext;
        } else {
            $text = $linktext . ' ' . $icon;
        }

        $icon_add = "";
        if (!empty($url)) {
            if (strpos($linktext, $url) == '0') {
                $closed_link = strpos($fullmatch, '>'); 
                $url_linktext_ahref = substr($fullmatch, $closed_link + 1); 

                $text = $text . '</a>';
                $icon_add = str_replace($url_linktext_ahref, $text, $fullmatch);
            } else {
                $icon_add = str_replace($linktext, $text, $fullmatch);
            }
        }

        if ($icon_add) {
            $content = str_replace($fullmatch, $icon_add, $content);
        }
    }

    return $content;
}

add_filter('the_content', 'cuexlinks_closing_parse');

$options = get_option('plugin_options');

if (isset($options['chkNoFollow'])) {
    add_filter('the_content', 'cuexlinks_url_parse');
}

if (isset($options['chkNoOpener'])) {
   // add_filter('the_content', 'cuexlinks_url_parse_noreferrer');
   add_filter('the_content', 'cuexlinks_url_parse');
}

if (isset($options['chkToMenu'])) {
    add_filter('wp_nav_menu_items', 'cuexlinks_closing_parse');
    //add_filter('wp_nav_menu_items', 'cuexlinks_url_parse');
}

function cuexlinks_remove_noreferrer($content)
{
    $replace = function ($matches) {
        return sprintf('rel="%s"', preg_replace('/noreferrer\s*/i', '', $matches[1]));
    };

    return preg_replace_callback('/rel="([^\"]+)"/i', $replace, $content);
}

if (!isset($options['chkNoReferrer'])) {
    add_filter('the_content', 'cuexlinks_remove_noreferrer', 999);
    add_filter('wp_nav_menu_items', 'cuexlinks_remove_noreferrer', 999);
} else {
    // do nothing because Gutenberg adds noreferrer automatically
    // new: to show it
    add_filter('the_content', 'cuexlinks_url_parse_noreferrer');

}




function cuexlinks_define_icons()
{

    $icons = array(
        array(1, "None", "None"),
        array(2, "fa-external-link-square-alt", "<i class=\"fas fa-external-link-square-alt\"></i>", "Icon by Fontawesome"),
        array(3, "fa-external-link-alt", "<i class=\"fas fa-external-link-alt\"></i>", "Icon by Fontawesome"),
        array(4, "ascii-8599", "&#8599;", ""),
        array(5, "ascii-8625", "&#8625;", ""),
        array(6, "ascii-8663", "&#8663;", ""),
        array(7, "manual", "(extern)", ""),
    );

    for ($row = 0; $row < 7; $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 4; $col++) {
            echo "<li>" . $icons[$row][$col] . "</li>";
        }
        echo "</ul>";
    }

    return $icons;
}

function cuexlinks_init_fn()
{
    register_setting('plugin_options', 'plugin_options', 'plugin_options_validate');
    add_settings_section('main_section', __('Main Settings', 'customize-external-links'), 'cuexlinks_section_text_fn', __FILE__);
    add_settings_field('plugin_chkmenu', __('Add External Links Settings to Menu', 'customize-external-links'), 'cuexlinks_setting_plugin_chkmenu_fn', __FILE__, 'main_section');
    add_settings_field('plugin_textarea_exclude', __('Exclude Domains', 'customize-external-links'), 'cuexlinks_setting_plugin_textarea_exclude_fn', __FILE__, 'main_section');
    add_settings_field('plugin_chknofollow', __('Add Nofollow to External Links', 'customize-external-links'), 'cuexlinks_setting_plugin_chknofollow_fn', __FILE__, 'main_section');
    add_settings_field('plugin_chknoopener', __('Add Noopener to External Links', 'customize-external-links'), 'cuexlinks_setting_plugin_chknoopener_fn', __FILE__, 'main_section');
    add_settings_field('plugin_chknoreferrer', __('Add Noreferrer to External Links', 'customize-external-links'), 'cuexlinks_setting_plugin_chknoreferrer_fn', __FILE__, 'main_section');
    add_settings_field('plugin_chknewwindow', __('Open Links in New Window', 'customize-external-links'), 'cuexlinks_setting_plugin_chknewwindow_fn', __FILE__, 'main_section');
    add_settings_section('sub_section', __('Icon Settings', 'customize-external-links'), 'cuexlinks_section_icon_text_fn', __FILE__);
    add_settings_field('radio_buttons', __('Select Icon to indicate External Links', 'customize-external-links'), 'cuexlinks_setting_radio_fn', __FILE__, 'sub_section');
    add_settings_field('plugin_chksize', __('Superscript Icon', 'customize-external-links'), 'cuexlinks_setting_chksize_fn', __FILE__, 'sub_section'); // chkIconSize
    add_settings_field('plugin_text_cssclass', __('Add additional CSS Class (span) for Icon', 'customize-external-links'), 'cuexlinks_setting_string_fn', __FILE__, 'sub_section');
    add_settings_field('plugin_text_manual', __('Add manual text / Icon (i.e. external)', 'customize-external-links'), 'cuexlinks_setting_string_manual', __FILE__, 'sub_section');

}

// Section HTML, displayed before the first option
function cuexlinks_section_text_fn()
{
    echo __("Set link relation for nofollow, noreferrer and noopener.", 'customize-external-links');
}

// Section HTML, displayed before the first option
function cuexlinks_section_icon_text_fn()
{
    echo __("Set icon indication for external links.", 'customize-external-links');
}

// Display the admin options page
function cuexlinks_options_page_fn()
{
    ?>
		<div class="wrap">
			<div class="icon32" id="icon-options-general"><br></div>
			<h2><?php echo __("External Link Settings", 'customize-external-links'); ?></h2>
			<?php echo __("Customize Link attributes and Link indication based on your needs.", 'customize-external-links'); ?>
			<form action="options.php" method="post">
				<?php
if (function_exists('wp_nonce_field')) {
        wp_nonce_field('plugin-name-action_' . "yep");
    }

    ?>
				<?php settings_fields('plugin_options');?>
				<?php do_settings_sections(__FILE__);?>
				<p class="submit">
					<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes', 'customize-external-links');?>" />
				</p>
			</form>
		</div>
	<?php
}
