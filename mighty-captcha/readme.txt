=== Mighty CAPTCHA ===
Contributors: sabaoh
Donate link: http://wordpress.sabaoh.com/8donate
Tags: login, comments, register, user, spam, reCAPTCHA, Google, images, authentication
Requires at least: 4.3.1
Tested up to: 4.3.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Mighty-CAPTCHA add an authentication with Google reCAPTCHA technology to login, comment, and register form, with API keys which delivered by Google.

== Description ==

This plugin will add some reCAPTCHA widget to login form, comment form, and user registration form. With this plugin, sites owners can avoid spam comment, user registration, and biting password.

Mighty CAPTCHA uses a Google reCAPTCHA technology. To work, API key pair, issued Google, is necessary.

For more information about key pair, please refer https://www.google.com/recaptcha/intro/index.html .

You can choose which form will be with reCAPTCHA widget or not. For login form and user registration form, a normal size widget is too wide. So you can choose compact widget. (but I do not like it.)

Below is characteristic of new Google reCAPTCHA.

* Easy for ordinary users. They only must check the "I'm not a robot".
* When Google reCAPTCHA recognized an access was smell fishy, image authentication screen would appear.
* New image authentication screen is without deformed letters, with photo images instead of them.
* Photo images authentication is for example "choose all photos of a cat". Easy to human and hard to robot.
* It's easy to use with smart phone or tablet.

Why don't you usher it into your site!

== Installation ==

To install this plugin, you just must do ordinary install procedure like other WordPress plugins.
But to get it working, you have to get an API key pair from Google, at first I explain this procedure.

1. Please access https://www.google.com/recaptcha/intro/index.html .
1. Press "GET reCAPTCHA" button.
1. Please login to Google account. If you have no account, you must sign up to Google.
1. If first page appears, press "Get reCAPTCHA" again.
1. reCAPTCHA API key manager will appear, so look up "Register a new site" box.
1. Fill the form. Label is key pair's name. Domain is which domain(s) you want use reCAPTCHA. Owners are site ownersÅfmail address. Send alerts to owners is toggle alerts mails.
1. Please press the "Register" button.
1. Next page will display API key pair and how to usher reCAPTCHA into your site. But you don't need how to. Instead of you do, my plugin will usher reCAPTCHA into your site.

After you got a key pair, you can install the plugin with procedure below.

1. Download Mighty-CAPTCHA.zip to extract into plugins/mighty-captcha folder, or install the plugin from official library.
1. At plugins list in the dashboard, activate this plugin.
1. Mighty-CAPTCHA sub menu will appear, so open it and fill the form.
1. Key pair is required. You can choose scene(s) you want use reCAPTCHA with checkbox.
1. Press the "submit" button.

By the way, if you want to adjust widget position on the form, please refer and modify css/style.css. But on login form and register form, many styles was hard coding in WordPress core file. So, it isn't useful, unfortunately.

== Frequently Asked Questions ==

= The site key can be watched in source by anyone. =

You are correct. But please don't worry. Google API will check with secret key when anyone challenge to be authenticated. And secret key can't be watched.

= How reCAPTCHA can recognize an access smell fishy. =

I'm not sure. But maybe anyone repeat challenging authenticate, reCAPTCHA will display images authenticate window.

= Do you plan to apply it into password reset form? =

Yes, of course. Not so far, it will be version upped to embrace requests.

== Screenshots ==

1. This is login screen with compact reCAPTCHA widget. I sorry I can't change widget language. so this means "I'm not a robot".
2. This is comment form with normal size widget. I adjusted position and margin.
3. This is register form with normal size widget. This widget is too wide for this form, but compact widget is not excellent.

== Changelog ==

= 1.0 =
*First release version.
