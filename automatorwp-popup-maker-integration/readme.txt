=== AutomatorWP - Popup Maker integration ===
Contributors: automatorwp, rubengc, eneribs
Tags: popup, automatorwp, maker, notification, notice, pop
Requires at least: 4.4
Tested up to: 5.9
Stable tag: 1.0.4
License: GNU AGPLv3
License URI: http://www.gnu.org/licenses/agpl-3.0.html

Connect AutomatorWP with Popup Maker

== Description ==

> **Important:** Now all free integrations are included in [AutomatorWP](https://wordpress.org/plugins/automatorwp/ "AutomatorWP") so you no longer need to install them one by one!
>
> We will continue working to improve AutomatorWP and make it easier, faster and more accessible to everyone.

[Popup Maker](https://wordpress.org/plugins/popup-maker/ "Popup Maker") is a versatile and flexible plugin to create any type of popup, modal, or content overlay for your WordPress website.

This plugin automatically connects [AutomatorWP](https://wordpress.org/plugins/automatorwp/ "AutomatorWP") with Popup Maker adding new actions that you can use to connect with other plugins and automate workflows letting you save time and get focused on your most important work.

= Actions =

* Show a popup.

== Installation ==

= From WordPress backend =

1. Navigate to Plugins -> Add new.
2. Click the button "Upload Plugin" next to "Add plugins" title.
3. Upload the downloaded zip file and activate it.

= Direct upload =

1. Upload the downloaded zip file into your `wp-content/plugins/` folder.
2. Unzip the uploaded zip file.
3. Navigate to Plugins menu on your WordPress admin area.
4. Activate this plugin.

== Frequently Asked Questions ==

= How does this plugin works? =

AutomatorWP - Popup Maker integration adds an new check on your popups limiting its visibility.
This means that when a popup is used on the "Show a popup" action, this popup won't get displayed until this action gets executed (to get the action executed, the user will need to meet all triggers from the automation first).

You can check the [AutomatorWP documentation](https://automatorwp.com/docs/) to understand what "automation", "trigger" and "action" means.
About setting up the popup, check the [Popup Maker documentation](https://docs.wppopupmaker.com/).

= Do I need to make an extra configuration on my popup? =

No, simply configure the popup with the trigger you wish and AutomatorWP will automatically limit its visibility when this popup is in use on an automation's action.

For example, if you configure a popup to being displayed automatically (Popup Settings -> Trigger -> Time delay / Auto Open) the normal workflow is that the next time the user refresh a page, the popup will get displayed automatically.

Now, if you setup an AutomatorWP automation with the action "Show a popup", then the popup won't be displayed until the user meets all requirements.

Setup Example:
Popup Maker: Add new Popup -> Title: "Congratulations" -> Popup Settings -> Trigger -> Time delay / Auto Open
AutomatorWP: Add new automation -> Trigger "User completes a LearnDash course" -> Action "Show the Congratulations popup"

With this setup, the popup "Congratulations" only will be displayed at the moment the user completes a LearnDash course.

= The popup is constantly displayed! =

If you have setup a popup using the trigger "Time delay / Auto Open" you need to associate a cookie for the event "On Popup Close".

For a depth explanation about how to setup this cookie in the way you wish, check [this article](https://docs.wppopupmaker.com/article/195-my-popup-keeps-opening-after-refresh-reload) from the Popup Maker documentation.

== Screenshots ==

== Changelog ==

= 1.0.4 =

* **Improvements**
* Prevent use of undefined constant

= 1.0.3 =

* **New Feature**
* Added support to the AutomatorWP custom values feature.

= 1.0.2 =

* **Bug Fixes**
* Fixed popup not getting displayed correctly.
* **Improvements**
* Added new answered questions to help understand how this integration works.

= 1.0.1 =

* **Bug Fixes**
* Fixed typo on integration icon URL.

= 1.0.0 =

* Initial release.
