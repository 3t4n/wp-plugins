=== All Post Contact Form ===
Contributors: rainbowlinkinc
Donate link: https://www.Rainbow-Link.com/catalogue.htm?&item_no=RLF16&link_id=wp
Tags: contact form, form mail, mail form, form, contact 
Requires at least: 4.7.3
Tested up to:  6.7.1
Stable tag:  1.7.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

You can add a confirmation window and a submission window to your own html form(s) which you created, and send the data to a certain E-mail address.


== Description ==
Your site-visitors input data into your html form which you set. Then, firstly, this plugin creates a confirmation window to receive the data and displays the received data to your visitors as a table. Secondly, when your site-visitors push the submit-button on the confirmation window, this plugin creates a submission successfully window and displays it to your site-visitors. Finally, this plugin sends the data to your E-mail Address as an E-mail.

- See the DEMO
https://www.secure-formmail.net/?tag=demo-of-all-post-contact-form

(A) contact form(s) which send(s) all data submitted by POST method as (an) E-mail(s). Make your html form freely, as many forms as you like, by using input, textarea, checkbox, and so on. Each of the elements has "name=" & "value=". "name=" is an element you set. For example:
<pre><code>
<input type="text" name="realname">
<input type="text" name="phone-number">
</code></pre>

"value=" is an element your site-visitors will input into. 

For each of the form-elements you set, if your site-visitors input any data, this plugin makes "name=" & "value=" into a line like this:

realname： Exellentis Wordpresley 
phone-number： 123-4567-8910

And this plugin creates "Confirmation Window" and "Submission Window", and displays form elements via POST method as a table on each of the windows. Finally, this plugin sends the data to your E-mail Address as an E-mail.

【How to Use】
(0) Create a html form on "Pages", "Posts", using <input ... <textarea... ( If you don't know html, you can create your html form by choosing & clicking on a website. See our FAQ )
(1) Activate this plugin.
(2) At "Settings" > "Contact Form" on your WordPress Admin Panel, set this plugin. See /assets/screenshot-1.png. By your browser's lang-settings, you can change "Settings" > "Contact Form"'s language English<=>Japanese.
(3) Copy the ShortCode at (2), and paste it on a new page at "Pages"/"Posts".  The ShortCode is [rlallpostcontactform].  See /assets/screenshot-2.png. If you paste the ShortCode at "Posts", deny "comments". How to deny "comments": Posts > Add New > Discussion, delete an activation-check from "Allow Comments".
(4) Using (3)'s permalink, complete your html form of (0). Concretely, on the top of the html form of (0), write  
<pre><code>
<form action="permalink of (3)" method="POST" name="rl_apcf" onsubmit="return checkForm()" enctype="multipart/form-data">
</code></pre>
. See /assets/screenshot-3.png.


【Features】
- You can use one ShortCord ( [rlallpostcontactform] ) in your all html forms.

- You can set up pop up alert against empty values by using "allpost-contactform.js".

- You can set up your own design for your "Confirmation Window" and "Submission Window" by using "allpost-contactform.css".

- You can receive an attachment file. Set "attachment_file" to the name element to upload a file like this: 
<input id="" name="attachment_file" class="" type="file" /> 

- You can now also save attachments in your WordPress server. Please set it on the Admin-Window. The attachment file is stored in /wp-content/apcf_att. 
Default access-restriction: .htaccess file for apache2.2 and apache2.4. 
If you are using a web server other than apache 2.2 or apache 2.4, please restrict access as appropriate. For those using apache 2.2 and apache 2.4, please try accessing the uploaded file directly and confirm that you cannot access it. 

- You can completely replace it with your own subject depending on your form ( contact form, application form, etc ).
https://www.Rainbow-Link.com/FAQ.htm?&faq_id=317
* If you want to completely replace the subject with your own unique subject
<input type="hidden" name="custom_apcf_subject" value="your own unique subject">
* If you want to add your own subject to the default subject, "You got a mail.[via All Post Contact Form] IP-address of the sender"
<input type="hidden" name="custom_apcf_subject_sub" value="your own unique subject">

- You can also set multiple subjects for one form. It can be displayed as an option in a pull-down,check-box etc.
https://www.Rainbow-Link.com/FAQ.htm?&faq_id=410 
* Eg) pull-fown: screenshot-15.png
<input type="hidden" name="custom_apcf_subject_show" value="subject">
<select name="custom_apcf_subject" id="form_subject">
	<option class="selectoption" value="normal contact">normal contact</option>
	<option class="selectoption" value="Inquiry about collaboration">Inquiry about collaboration</option>
	<option class="selectoption" value="sales">sales</option>
	<option class="selectoption" value="Sales of the project">Sales of the project</option>
	<option class="selectoption" value="Login Error">Login Error</option>
</select>


【Languages】
- At the admin window of this plugin, by entering the top 5 fields ( which are displayed upper the email address input field ), you can display the inquiry form system in a specific language.

- At the admin window of this plugin, if you leave the top 5 fields ( which are displayed upper the email address input field ) blank, this plugin automatically feeds the browser's language settings and displays the appropriate language ( By default, Japanese and Arabic and Chinese and English are automatically selected ). If your/your visiter's browser has a language other than Japanese and Arabic and Chinese, this plugin will select English.

- When you use all 4 of the default languages, if you'd like to change the default words, please change directly these language files: rl-apcf-admin.php and rl-apcf-public.php, rl-apcf-admin-ja.php and rl-apcf-public-ja.php,  rl-apcf-admin-ar.php and rl-apcf-public-ar.php, rl-apcf-admin-zh.php and rl-apcf-public-zh.php.

- How to add languages other than Japanese and Arabic and Chinese and English
https://github.com/RainbowLinkInc/All-Post-Contact-Form---for-usage-of-multilingual--


【Files for customizing】
- allpost-contactform.css
- allpost-contactform.js
- allpost-contactform-str_replace.php ( "All Post Contact Form"'s Filter File - String Replace - ) ( How to Use: https://www.Rainbow-Link.com/FAQ.htm?&faq_id=246 )
- rl-apcf-redirect-conf.php ( "All Post Contact Form"'s Redirect Conf File ) ( How to Use: https://www.Rainbow-Link.com/FAQ.htm?&faq_id=297 )
- language files
* rl-apcf-admin.php and rl-apcf-public.php, 
rl-apcf-admin-ja.php and rl-apcf-public-ja.php,  
rl-apcf-admin-ar.php and rl-apcf-public-ar.php, 
rl-apcf-admin-zh.php and rl-apcf-public-zh.php
* allpost-contactform-language.php
- allpost-contactform-upload_mime.php
- allpost-contactform-sub12_uploadAttachment.php


【FAQ】
https://www.rainbow-link.com/catalogue.htm?&item_no=RLF16#faq



【Inquiry】
https://www.Rainbow-Link.com/catalogue.htm?&item_no=RLF16#inquiry



【Paid Add-Ons】
AutoResponder for "All Post Contact Form"
https://www.Rainbow-Link.com/catalogue.htm?&item_no=RL30&link_id=wp

Carbon Copy for "All Post Contact Form"
https://www.Rainbow-Link.com/catalogue.htm?&item_no=RL31&link_id=wp

Receiving Notice for "All Post Contact Form"
https://www.Rainbow-Link.com/catalogue.htm?&item_no=RL32&link_id=wp

AutoResponder and Carbon Copy for "All Post Contact Form"
https://www.Rainbow-Link.com/catalogue.htm?&item_no=RL33&link_id=wp

CSV for "All Post Contact Form"
https://www.Rainbow-Link.com/catalogue.htm?&item_no=RL34&link_id=wp


== Installation ==
1. Install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress Admin Panel.
3. Set this plugin at "Settings" > "Contact Form". See screenshot-1.png.




== Frequently Asked Questions ==
= FAQ LIST URL =
https://www.Rainbow-Link.com/catalogue.htm?&item_no=RLF16#faq



== Screenshots ==
= Release =
1. screenshot-1.png: "Settings" > "Contact Form"
2. screenshot-2.png: Pasting this plugin's ShortCode on the "Page" 
3. screenshot-3.png: Completing your html form
4. screenshot-4.png: Contact Form Window
5. screenshot-5.png: Confirmation Window 
6. screenshot-6.png: Submission Window
7. screenshot-7.png: 「設定 ＞ コンタクトフォーム」
8. screenshot-8.png: 「固定ページ」のあるページにショートコードを貼り付けた場面
9. screenshot-9.png: htmlフォームを完成させた場面
10. screenshot-10.png: コンタクトフォーム画面
11. screenshot-11.png: 確認画面 
12. screenshot-12.png: 送信完了画面

= Since v1.0.4 =
13. screenshot-13.png: Added a function of receiving an attachment file to screenshot-3.png
14. screenshot-14.png: screenshot-8.pngに添付ファイル受信機能を追加したところ

= Since v1.5.4 =
15. screenshot-15.png: Added the function to add multiple subjects to one form. 
16. screenshot-16.png: 「一つのフォームに複数の件名を付けた」ところ

= Since v1.6.2 =
17. screenshot-17.png: About design of Confirmation-Window & Submission-Window | 確認画面と送信画面のデザインのこと
18. screenshot-18.png: About design of Confirmation-Window & Submission-Window | 確認画面と送信画面のデザインのこと

= Since v1.5.0 =
settings_ar.png
settings_en.png
settings_ja.png
settings_zh.png
plugins_list_ar.png
plugins_list_en.png
plugins_list_ja.png
plugins_list_zh.png


== Changelog ==
=1.7.9=
Jan 21, 2025: Added: Header Parts (Requires at least,Requires PHP,Update URI)

=1.7.8=
Nov 12, 2024: Added: filter of zip:  Weakened the zip upload requirements. Allowed PDF by default.  

=1.7.7=
Nov 07, 2024 Added processing for saving text files under a different name. 

=1.7.6=
Nov 07, 2024 Modified: allpost-contactform-upload_mime.php

=1.7.5=
Nov 07, 2024 Re-try of v1.7.4. v1.7.4 was "version-updating-error" due to my mistake. 

=1.7.4=
Oct 30, 2024: Changed: usage of allpost-contactform.js. Until now, this plugin was automatically loaded　it into user's theme-header, but from today, this plugin leaves it completely at the user's discretion. 
- When transitioning to the "Confirmation Window", a pop-up alert can be displayed for unfilled items. 
To display pop-up alerts, use "assets/allpost-contactform.js" into your theme. 

=1.7.3=
Oct 30, 2024: Fixed: bug of 1.7.2

=1.7.2=
Oct 28, 2024: Added: about FAQ: How to manage Mime Type

=1.7.1=
Oct 28, 2024: Strengthened: the security of the shortcode page. Divided: the core page and added comments. 

=1.7.0=
Oct 25, 2024: Strengthened: the security of the shortcode page ( Fixed: bug of v1.6.9 )

=1.6.9=
Oct 24, 2024: Strengthened: the security of the shortcode page 

=1.6.8=
Oct 22, 2024: Changed: Content of .htaccess., Automatically changing the names of attached files to lowercase letters. 

=1.6.7=
Oct 21, 2024: Changed: .htaccess Process

=1.6.6=
Oct 19, 2024: Changed: Uploading Process

=1.6.5=
Oct 15, 2024: In v1.6.2, instead of "$rl_apcf_admin_sa1_eg", RL wrote as "$rl_apcf_admin_sathahteh1_eg". It seems like RL was half asleep and typed some strange characters. It was pointed out by an external site ( https://plugintests.com/plugins/wporg/allpost-contactform/latest ) when RL SVNed this plugin to WordPress.org, but RL didn't notice it until today. Sorry. 

=1.6.4=
Oct 11, 2024: Fixed: upload parts. Added: allpost-contactform-upload_mime.php

=1.6.3=
Oct 11, 2024: Corrected: the part that WordPress Team instructed us to correct. : text-domain 
Oct 10, 2024: Corrected: the parts that WordPress Team instructed us to correct. : tags ( limited: tags to 5 & Shortened: the 'Short Description' ) 

=1.6.2=
Sep 21, 2024: Major changes to the specifications. There are three main changes: 
(1) You can now decide whether or not to leave attachments on the server on the Admin-Window. 
(2) Descriptions have been added to the default CSS settings so that you can easily change the design of the Confirmation Window and Submission Window using CSS. 
(3) Changed uninstall.php. Changed to "Complete uninstall". 

=1.6.1=
Sep 10, 2024: Changed: icons. 

=1.6.0=
Sep 09, 2024: Fixed: bug at "sender" section. Fixed a bug that prevented end-users from overwriting the "sender" with settings configured on the Admin-Window. 

=1.5.9=
Jun 22, 2024: Fixed: html-output-tag. One of the parts that should have been shown "apcf-content-key" was shown apcf-content-value.

=1.5.8=
May 10, 2024: Modified: the filter for URL ( changed to the wordpress-snitizing ). Modified: CSS ( changed from table-typle to flex-type  ). Bug-Fixed: Delete the empty-column at the "Confirmation-Window". 

=1.5.7=
May 02, 2024: Added: 1 filter for URL. Modified: CSS ( one more centering-tags for "apcf_disp_gototop" )

=1.5.6=
Mar 06, 2024: Fixed the 2 warnings: 'Undefined array key'. 

=1.5.5=
Nov 14, 2023: 2 putit bugs fixed. 

=1.5.4=
Nov 14, 2023: Added the function to add multiple subjects to one form. 

=1.5.3=
Nov 13, 2023:
From v1.5.0, the function to change the subject has been disabled. We're sorry that we didn't notice this bug for a year. 

=1.5.2=
Nov 4, 2022:
Admin can now select whether or not to enable cookies to prevent "bomb attacks" on the management screen. It used to be enabled by default. Disabled by default since this version. 

=1.5.1=
Oct 30, 2022: The items automatically inserted by this plugin in the mail are hidden by default. You can select to show/hide on the management screen. 

=1.5.0=
Oct 18, 2022: The option settings that have been set in the conf file have been changed so that they can be set on the management screen. 

=1.4.2=
Mar 12, 2022:  Fixed: Upgrade for PHP8 #2.

=1.4.1=
Dec 6, 2021:  Fixed: </form> tag missing. Upgrade for PHP8 #1.

=1.4.0=
Sep 9, 2019: Added: a new function: Creating your own Subjects 

=1.3.7=
May 12, 2019: Update (tidied up the shape): allpost-contactform.css 

=1.3.6=
Mar 29, 2019: Upgrade: allpost-contactform.css 

=1.3.5=
Jan 7, 2019: Upgrade: allpost-contactform-str_replace.php. 

=1.3.4=
Jan 7, 2019: Upgrade: allpost-contactform-language.php. We had intended to upgrade it on Dec 15, 2018, but, we found we couldn't have upgraded it today.

=1.3.3=
Jan 3, 2019: Changed: the cookie removal process to run in the plug-in.

=1.3.2=
Jan 2, 2019: Changed: default design of the Confirmation Window and the Submission Window. We've made it possible to put a class and a background color on the even and odd rows of the table.

=1.3.1=
Jan 1, 2019: Stopped: displaying the check part to 'prevent double submission'  on the Submission Window.

=1.3.0=
Dec 31, 2018: Because we had uploaded a file in the middle of making by mistake, we uploaded this version.

=1.2.9=
Dec 31, 2018: 
* Added: the function to prevent double submission. We think a lot of people would have implemented this function by using jquery. But we decided to process it with a cookie as the initial setting of this plug-in.
If you'd like to maintain your own settings, or if you do not wish to process cookies, please use v1.2.8. 
* Added: assets/header_apcf.php.

=1.2.8=
Dec 15, 2018: Added a default language: Chinese

=1.2.7=
Dec 5, 2018: Added: the function to redirect to the front page after completion of submission.

=1.2.6=
Nov 21, 2018: Changed: URL of our Catalogue

=1.2.5=
Nov 21, 2018: Fixed: Sanitizing Error

=1.2.4=
Nov 21, 2018: Added: javascript in order to control reloading

=1.2.3=
Nov 19, 2018: We added a new class of the submit-button for the "Confirmation Window". The name of class =  "btn_confirm".

=1.2.2=
Oct 05, 2018: We noticed today that we had mistaken the version of Wordpress.  Sorry.
Aug 21, 2018: Added a default language: Arabic

=1.2.1=
Jul 23, 2018: Updated: allpost-contactform.css
added tag: To delete borders of the form-table by the initial setting

=1.2.0=
Jul 23, 2018: Updated: allpost-contactform.css
the class of 'apcf_table' to id of 'apcf_table' 
sorry!

=1.1.9=
Jul 15, 2018: Updated: allpost-contactform.css
Deleting borders of the form-table by the initial setting

=1.1.8=
Jun 08, 2018: for the add-on 'csv'

=1.1.7=
Feb 13, 2018 Added: 3 files below:
* allpost-contactform-str_replace.php ( How to Use: https://www.Rainbow-Link.com/FAQ.htm?&faq_id=246 )
*/assets/apcf_template.php
*/assets/apcf_template_ja.php

=1.1.6=
Sep 23, 2017 Fixed: 1.1.5 Update Error

=1.1.5=
Sep 23, 2017 Added: 4 new functions: for Add-Ons. We are going to sell 4 add-ons for this plugin soon.

=1.1.4=
Sep 11, 2017 Fixed a bug: html5 validation error of the Confirmation Window.

=1.1.3=
May 17, 2017 Fixed a bug: on v 1.1.2, by mistake, we deleted creating-a-new-line-function of emailing. we revived it on this version.

=1.1.2=
May 15, 2017 Fixed: SVN upload error of v1.1.1.

=1.1.1=
May 14, 2017: Fixed: SVN upload error of v1.1.1.
May 15, 2017: Update: readme.txt & readme_ja.txt of v1.1.1.

=1.1.0=
May 14, 2017: Fixed: SVN upload error of v1.0.9.

=1.0.9=
May 14, 2017: Fixed Activation Error and version code error.

=1.0.8=
May 07, 2017: Update: readme.txt & readme_ja.txt
Apr 26, 2017: Update [ATTENTION] of readme.txt
Apr 26, 2017: Fixed: Activation Error

=1.0.7=
Apr 20, 2017: Fixed: commit-error of v1.0.6

=1.0.6=
Apr 20, 2017: Modified: screenshot-1.png, screenshot-7.png | Added: screenshot-13.png, screenshot-14.png |  Fixed: a bug ( deleting-error of uploaded file )

=1.0.5=
Apr 19, 2017: Update: readme.txt & readme_ja.txt: Added: about 1.0.4 |  Fixed: a bug ( displaying-error of "submit: CONFIRM" )

=1.0.4=
Apr 19, 2017: Added: a function to upload a file ( an attachment file ).
If you use this new function, please update your <form tag. 

=1.0.3=
Apr 18, 2017: Modified: readme.txt & readme_ja.txt | Added: Language-Parts on GitHub
Apr 17, 2017: Modified: readme.txt & readme_ja.txt: DEMO URL
Apr 17, 2017: Update: readme.txt & readme_ja.txt: Added: ATTENTION
Apr 17, 2017: Fixed: a bug. now all ok! 

=1.0.2=
Apr 17, 2017: Fixed: a bug 

=1.0.1=
Apr 17, 2017: Update: readme.txt & readme_ja.txt: Added: LIVE DEMO URL
Apr 17, 2017: Update: readme.txt & readme_ja.txt: How To Activate

=1.0.0=
Apr 16, 2017: Update: readme.txt, Fixed: some bugs 
Apr 15, 2017: Release


== Upgrade Notice ==

=1.0.3=
Apr 17, 2017: Fixed: a bug. now all ok! 

=1.0.2=
Apr 17, 2017: Fixed: a bug 

=1.0.0=
Release
