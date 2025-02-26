=== Add Template for Contact Form 7 ===
Contributors: matorel
Tags: contact, form, contact form, template, php, customize, CF7, contact form 7, コンタクトフォーム, コンタクトフォーム7, テンプレート
Requires at least: 4.9
Tested up to: 6.0
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: add-template-for-contact-form-7
Requires PHP: 7.0

Add template function by PHP file to "Contact Form 7" for theme developers.
This plug-in requires Contact Form 7 ver5.5.3 or above.

== Description ==

This plugin adds a template function to "Contact Form 7" using a template file.
This is useful for theme developers to smoothly check the display of CF7 tags.
Create an atcf7 directory in the theme folder and place the template file (.php) in that directory.
You can use PHP, Wordpress functions / objects, ACF functions (excluding some) in the template file.
However, it is not possible to show / hide form tags and add / remove required mark(*) using PHP.
This plug-in requires Contact Form 7 ver5.5.3 or above.

**Example [theme_path/atcf7/***.php]**

    <?php
    if (!defined('ABSPATH')) {
      exit;
    }
    /*
    * Template Name: Distinguishing Name
    */
    ?>

    <h2>
    <?php
    // Example of using WP function
    the_title();
    ?>
    </h2>

    <table>
      <tbody>
        <tr>
            <th><label for="your-category" onclick="">Category</label></th>
            <td>
              <?php
                // Example of using get_field of ACF with checkbox
                $cats = "'".get_field("cat1")."'";
                $cats .= " '".get_field("cat2")."'";
                $cats .= " '".get_field("cat3")."'";
              ?>
              [checkbox your-category id:your-category class:atcf7-form-radio-label exclusive use_label_element <?php echo $cats; ?>]
            </td>
        </tr>
        <tr>
          <th><label for="your-name" onclick="">Name</label></th>
          <td>
            [text* your-name id:your-name]
          </td>
        </tr>
        <tr>
          <th><label for="your-email" onclick="">Mail Address</label></th>
          <td>
            <div>
              [email* your-email id:your-email ]
            </div>
          </td>
        </tr>
        <tr>
          <th><label for="your-content" onclick="">Contents</label></th>
          <td>
            [textarea* your-content x5 id:your-content ]
          </td>
        </tr>
      </tbody>
    </table>
    <div>[submit "Submit"]</div>


For the theme developer to make the confirmation smooth, create the atcf7 directory in the theme folder and place the template file (.php) in that directory.

== Installation ==

1. From the WP admin panel, click “Plugins” -> “Add new”.
2. In the browser input box, type “Add Template for Contact Form 7”.
3. Select the “Add Template for Contact Form 7” plugin and click “Install”.
4. Activate the plugin.

OR…

1. Download the plugin from this page.
2. Save the .zip file to a location on your computer.
3. Open the WP admin panel, and click “Plugins” -> “Add new”.
4. Click “upload”.. then browse to the .zip file downloaded from this page.
5. Click “Install”.. and then “Activate plugin”.

== Frequently asked questions ==

== Screenshots ==

1. Open the "Template File" tab on the Edit screen of Contact Form 7.
2. Select the template you want to use.(Contains samples.)


== Changelog ==
= 1.0.0 =
First commit.

== Upgrade notice ==

== Arbitrary section 1 ==
