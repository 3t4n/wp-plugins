=== Advanced Control for Gutenberg ===

Contributors: refact, arashsafari, kashani, oldboy6789, masoudin, hosseinkarami
Donate link: https://refact.co/
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: Gutenberg, editor, blocks, advanced control for gutenberg

Discover a more streamlined, focused, and intuitive Gutenberg experience with the "Advanced Control for Gutenberg" plugin.

== Description ==

**In the current version, enabling or disabling blocks by category and controlling block settings do not work for some front-end registered blocks. This limitation is due to the lack of hooks and controls in WordPress. We are actively working to address this issue in the next release.**

Enhance your WordPress editing experience with our plugin that simplifies the Gutenberg editor by removing unnecessary blocks and settings. Here's how it enhances your workflow:

- Post Types: Customize the editor to display only essential blocks for different types of posts.
- User Roles: Set block access permissions based on user roles to keep your site organized and secure.
- Individual Users: Define settings for specific users, allowing a customized setup that caters to their preferences and workflow. This means you can adjust the editing environment for each user, focusing on the necessary tools for their tasks.

A key feature of Advanced Control for Gutenberg is its ability to improve full site editing. It allows site managers to specify which blocks are accessible to certain editors, preventing unintended alterations. By hiding the 'Lock' button from those not authorized, your site’s layout and consistency are preserved.

With "Advanced Control for Gutenberg," editing in WordPress becomes more efficient. Enhance your editor for a cleaner and more focused editing experience.

### Javascript Packages
- styled-components: [https://styled-components.com/docs]

= We want your input =
 
If you have any suggestions for improvements, feature updates, etc., or would like to simply give us feedback, then we want to hear it. Please email your comments to dev@refact.co

== Installation ==
= Installation from within WordPress =
1. Visit **Plugins > Add New**.
2. Search for **simplify gutenberg**.
3. Install and activate the 'simplify gutenberg' plugin.
4. After activation, navigate to Settings -> Advanced Control for Gutenberg in your WordPress dashboard.
5. In the plugin's settings page, click the "Add New" button to create your first rule
 
= Manual installation =
1. Download the plugin zip file
2. Upload it to the `/wp-content/plugins/` directory in your website.
3. Visit the **Plugins** in your WordPress Dashboard.
4. Locate 'simplify gutenberg' and activate it.
5. After activation, navigate to Settings -> Advanced Control for Gutenberg in your WordPress dashboard.
6. In the plugin's settings page, click the "Add New" button to create your first rule

== How to Use ==

1. Access the Plugin Settings

   After installing and activating the plugin, go to **Settings -> Advanced Control for Gutenberg** in your WordPress dashboard.

2. Create a New Rule

   Click the **"Add New"** button.

3. Set Up the Rule

    - **Rule Name:** Enter a name for your rule.
    - **Status:** Toggle on/off to activate or deactivate the rule.

4. Define Targeting Conditions

   These fields determine whether restrictions should be applied when loading the Gutenberg editor.

    - **Rule Type:** Choose from Post Type, User Role, or User Name.
    - **Rule Condition:** Select "is one of" or "is not one of".
    - **Rule Value:** Based on your Rule Type:
      - **Post Type:** Select from available post types.
      - **User Role:** Choose from available user roles.
      - **User Name:** Enter and select a username.

5. Combine Rules

   Pressing these logical operands will add a new rule row (containing rule type, rule condition, and rule operand) to the page:

    - **AND:** Use AND to require all conditions to be true.
    - **OR:** Use OR to require at least one condition to be true.

6. Choose Rule Action

   Select which blocks or settings to enable or disable:

    - Enable Blocks
    - Disable Blocks
    - Enable by Category
    - Disable by Category
    - Enable Settings
    - Disable Settings

   Each action item specifies what it does in terms of enabling or disabling blocks or settings.

7. Verify the Rule in Action

   Go to edit a post with the Gutenberg editor that satisfies the rule, and check that the blocks and settings align with the rule you've created.

== Screenshots ==

1. Rules List
2. Add New Rule

== Changelog ==

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
This is the initial release of Advanced Control for Gutenberg.
