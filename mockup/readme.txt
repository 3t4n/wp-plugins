=== MockUp ===
Contributors: Eelco Tjallema
Tags: mockup, design, presentation, screenshot, webdesign, wireframe, logo, showcase, portfolio, feedback, psd, jpg, png, mockvault, redpen, symu, approval
Requires at least: 3.8
Tested up to: 4.7
Stable tag: 1.6.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html



Present your designs, professionally!



== Description ==

Normally you can never be sure if your client is viewing your designs properly. __Now you can take control over the presentation.__ With this plugin it's surprisingly easy to present your web designs the right way.

With the Mockup plugin __your customers__ can:

*   Approve the design.
*   Add feedback to your design.
*   See related designs quickly.
*   Read the description you made.


With the Mockup plugin __you__ can:

*   Add a description to each design.
*   Organize you designs.
*   Get fast approval.
*   And much more.. 


On the [website](http://www.mockupplugin.com) you can find live demo’s.



== Installation ==

Install the plugin like you always install plugins, either by uploading it via FTP or by using the "Add Plugin" function of WordPress.




== Frequently Asked Questions ==


= How can I change the settings? =
Go to:  
(`MockUp -> Setting`)  
or  
(`Plugins -> MockUp -> Setting`)


= How do I get started? =

*Change the custom settings.*  
After the first installation you can change the settings to your wishes. Rename everything your client will see and control the layout.  


*Make a customer.*  
This works the same as categories in posts. It links the mockups together.

*Make a page for the mockup.*  
Give the page a clear title (like: Home page or Blog). Add the MockUp and write a description. Then publish the page and you are done!


= I don't see MockUp in the admin menu! =

The normal position is on the bottom of the admin menu.
If you can’t find it there or you don’t want it there, change the menu position.

This can be done on the MockUp Settings page.


= I get a 404 page! =

This is a permalink problem. You can solve it by re-saving your permalinks. Go to `setting -> permalinks` then click on `Save changes`. That should fix it!


= How can I translate the plugin? =

This is very easy. All the text on the front-end (what your customer will see) can translated/changed on the settings page under the 'Text' tab.  
The backend is translatable with a PO file. In the folder `languages` you'll find the .pot file. Add the files to `wp-content -> languages -> plugins`.


= Does this plugin use any cookies? =

Yes, one cookie for the 'introduction overlay'. This is not a tracking cookie.


= What are the 'Bulk password settings'? =

If you enable this option and secure a MockUp with a password all the other MockUps in the same customer taxonomy will be protected with this password. The password will only needs to be used one time to unlock them all. Keep in mind that it will look at __all__ parent and child taxonomies. 


= What is the 'introduction overlay' and how does it work? =

The introduction overlay is a transparent black overlay that appears when somebody views a mockup for the first time. 
It is made to show your customer the menu. You can change the text on the MockUp Settings page. 
This options is off by default.

If it is closed a cookie will be made to not show it again for the next 30 days. This time can be changed with the filter `mockup_intro_cookie_expire_time`.


= Can I add favicons? =

If you use WordPress 4.3 or higher, you can! Just use the Site Icon feature. 
The Site Icon feature can be found by going to `Appearance -> Customize` and clicking on Site Identity. 


= What actions and filters are used? =

Action: *mockup_before_single_menu*  
Action: *mockup_after_single_menu*  
Action: *mockup_before_related_list*  
Action: *mockup_after_related_list*  
Action: *mockup_before_single_approve*  
Action: *mockup_after_single_approve*  
Action: *mockup_before_single_comment_form*  
Action: *mockup_after_single_comment_form*  
Action: *mockup_after_single_comments*  
Action: *mockup_before_single_description*  
Action: *mockup_after_single_description*  

Filter: *mockup_intro_cookie_expire_time*
Filter: *mockup_email_comment_subject* 
Filter: *mockup_email_approve_subject*
Filter: *mockup_register_taxonomy* 
Filter: *mockup_register_cpt*


= My problem is not here! =

Go to the [website](http://www.mockupplugin.com) and ask it in the support form.




== Screenshots ==

1. MockUp Dashboard.
2. Change all text.
3. Front-end with open menu.
4. Front-end with closed menu.




== Changelog ==

= 1.6.3 =
* Move image's metabox.
* Add new filter ('mockup_register_cpt' & 'mockup_register_taxonomy').
* Rebuild the whole plugin to a boilerplate (http://wppb.io).


= 1.6.2 =
* Add filters for subject lines e-mails.
* Remove outline form fields.
* minor bug fix.


= 1.6.1 =
* control animation time.
* Improve readme.txt.
* Add custom body classes
* minor bug fix


= 1.6.0 =
* WordPress 4.4 ready.
* Add actions and filters.
* Improve the related list.
* Customize the title.
* Favicons are now possible.
* Introduction overlay.


= 1.5.6 =
* WordPress 4.3 ready.
* Change language files location. 
* Performance improvement. 
* Bug fix.


= 1.5.5 =
* Bug fix.


= 1.5.4 =
* Images metabox looks better.
* Images align is better.
* Toggle black overlay.
* Change author.


= 1.5.3 =
* Bug fix.


= 1.5.2 =
* Bug fix.


= 1.5.1 =
* Bug fix.


= 1.5.0 =
* Background image option.
* Better metaboxes.
* Add MockUp to the 'at a glance' dashboard widget.
* Use native jQuery file.
* Nicer sidebar.


= 1.4.1 =
* Bug fix.
* Security upgrade.


= 1.4.0 =
* Bulk password protection.
* Add custom CSS.
* Change font (also import).
* New design sidebar.
* Better customer filter.
* Use dashicons instead of fontawesome.
* Better settings menu.
* Drop support for 3.7 and lower.


= 1.3.0 =
* Better metaboxes.
* Password protection.
* Links in emails.


= 1.2.1 =
* Small bug fix


= 1.2.0 =
* Ready for WordPress 3.9+
* The frontend is improved with a better sidebar and Ajax.
* No longer use of Featuerd Images.
* It is now possible to delete comments.
* Choose the position of you MockUp.
* The plugin is internationalized.


= 1.1.1 =
* WordPress color pickers
* Option to unapprove a mockup
* Option to override the email address for each mockup


= 1.1.0 =
* Ready for WordPress 3.8
* Not using a light-box anymore, but a box that slides in from the right.
* Give you more options and control over the email settings.
* If a mockup get approved it will not add a ✔ to the title anymore, but will use a admin column.
* The amount of comments is now also in the admin columns.
* Use Bootstrap 3.0.3.


= 1.0.7 =
* Remarks are better now.
* All related mockups in one list.
* Control over the position.


= 1.0.6 =
* Security update.


= 1.0.5 =
* Twitter Bootstrap header.
* Popup related Mockups.
* Order related Mockups.
* Add style to metabox.
* Minor bug fix.


= 1.0.4 =
* popup improvement


= 1.0.3 =
* Bug fix


= 1.0.2 =
* Bug fix


= 1.0.1 =
* Bug fix


= 1.0.0 =
* Mockup Beta.




== Upgrade Notice ==

= 1.6.0 =
New text fields are added. Please translate or adjust them to your needs.


= 1.5.0 =
Big layout change.


= 1.4.1 =
Important security update.


= 1.4.0 =
Only update from version 1.3.0!


= 1.3.0 =
Some cool improvements.


= 1.2.1 =
Bug fix


= 1.2.0 =
The Sildebox will be much better.


= 1.1.1 =
Some small improvements.


= 1.1.0 =
Only update if you are using WordPress 3.5 or higher.


= 1.0.7 =
Everything looks nicer now.


= 1.0.6 =
Important security update.


= 1.0.5 =
The header is now also from Twitter Bootstrap. The popup with related Mockups looks much better and can be ordered. The Metabox is also better looking.