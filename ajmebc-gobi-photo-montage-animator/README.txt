=== Gobi Photo Montage Animator ===
Contributors: ajmebc
Tags: photo, animation, animate, tile, grid, designer, content, image, photo, photograph, photo animation, photo animate, tile animation, tile animate, grid designer, javascript, javascript animation, plugin
Requires at least: 4.3.3
Tested up to: 4.3.3
Stable tag: 1.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Gobi Photo Montage Animator. Add some images from your media library to your post and this plugin will circulate through the collection.

== Features ==

*   Add images from your media library
*   Specify best fit for Desktop, Tablet and Mobile
*   Minimum grid size 1 X 1, Maximum grid size 6 X 6
*   Specify the height of the grid
*   Specify the transition speed
*   Specify the animation style
*   View images in full screen layout

== Description ==

*Gobi Photo Montage Animator.*

A simple and effective javascript photo animator that allows you to select images from the WP Media Library, specify the grid size and animation style and your images will be displayed in your post.

**Before you begin**

Prepare your images before they are uploaded to Wordpress.
Below are guides how best to prepare you images for Wordpress.

* [Image Size and Quality<<WordPress Codex](https://codex.wordpress.org/Image_Size_and_Quality)

* [Preparing Image Files Before Uploading With WordPress](https://om4.com.au/client/preparing-image-files-before-uploading-with-wordpress/)
Your images should then be added to the Wordpress Media Library.

**GOBI Photo Montage Animator edit panel**

The GOBI Photo Montage Animator edit panel can be found below your post in the WP Post Edit screen.

**Photo Gallery panel**

The Photo Gallery panel is where the images you have chosen to be displayed in the Gobi PMA will be displayed. You can add images to your post by clicking the *Select Images* button on the Photo Gallery panel.

*Selecting images from the WP Media Library*

When you click the *Select Images* button, the Insert Media panel will be displayed.
You can select an image to insert, or by holding the ctrl button, you can select multiple images.
Clicking the Insert Into Post button will add the images to the Gobi PMA Photo Gallery panel.
You can add more images by following the above steps, or you can remove images by clicking the remove (X) icon on the top right of the image.
A description of the image can be also be added, which will be displayed in the image fullscreen mode. This should be added to the image meta-data in the WP Media Library.
You will have to remove the image from your selection and re-add if you wish to add a description at a later date.

**Settings Panel**

In the settings panel, you choose settings for Mobile, Tablet and Desktop layouts. The settings for each device layout are as follows:

*Setting the grid size*

You can choose the number of rows and number of columns to set the grid.

*Margin*

This setting enables you set the space between the images in the grid.

*Height and Width*

You can specify the height and width of the plugin to decide how it best fits on your page. The grid will be divided into the space allowed e.g.
If you have specified 2 rows and 2 columns and have specified a width of 600px and a height of 400px, each cell will have dimensions of 300px width and 200px height. If you add a margin, the cell dimensions will not change.
If you leave the width value set to '0', the plugin width will be set to 100%; If you specify a width, the plugin will be centered in the available space.

*Next Image Timer*

Set the next image timer for when you want a new image to be displayed. This is duration from the start of the image transition to the start of the next transition.

*Image display progression*

The Image Display Progression setting is used to set the method of displaying images from the images you added to the Photo Gallery. There are 2 choices for the image progression.

* Sequential (default) - This option will progress through your selected images, in the sequence you added them in the Photo Gallery panel. The first transition starts at grid row 1 column 1 and will iterate through the grid until the last row, last grid, when the process will repeat from grid row 1 column 1.
* Random - This option will randomly select images from your selection. It will randomly select a grid position to display the image.

*Animation Style*

The Animation Style setting is used to set the method of the image transition. There are 6 settings for this:

* Snap (default) - There is no animation with this setting, images are simply replaced.
* Fade - The currently displayed image is faded out while the new image is faded on.
* Slide Left - The current image will slide off to the left while the new image slides on.
* Slide Right - As above, except the animation slide to the right.
* Slide Up - As above, except the animation will slide upwards.
* Slide Down - As above, except the animation will slide downwards.

*Animation Speed*

The Animation Speed setting should be used when an animation style requires it. This is the time taken for the transition to complete.

**Adding to your Post**

Clicking the *Insert* button, found on the Photo Gallery panel, will insert the shortcode in the TinyMCE editor. The Visual editor view must be enabled for this to work. If the Text editor view is enabled, you should add the shortcode manually. The shortcode is *[ajmebc_gobi_pma_scode]*.
The Gobi PMA will be displayed in your post where you have inserted the plugin shortcode. The shortcode can be added in the middle of text, however as the Gobi PMA occupies 100% of the width, the text will be displayed above and below where the plugin has been inserted.

**Fullscreen view**

The user can click on each image to display it in fullscreen. If a description has been added in the Media Library with the image meta-data, the description will be displayed at the bottom of the fullscreen display. When in fullscreen view, the Gobi PMA will continue to progress though the image selection.

== Installation ==

1. Upload `ajmebc-gobi-animating-montage` folder to the `/wp-content/plugins/` directory or upload the plugin zip directly via the WP Admin Plugins area.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use either the insert button on the Gallery tab or add the shortcode [ajmebc_gobi_pma_scode] to your post.
4. Use the Select Images button on the Gallery tab to select the images you wish to add.
5. Define the layout in the Settings tab.

== Frequently Asked Questions ==

= What is the shortcode =

The shortcode is *[ajmebc_gobi_pma_scode]*

= What is the largest grid size? =

The largest grid size is 6 X 6. This can be set in the settings pane on the Post edit screen.

= What is the smallest grid size? =

The largest grid size is 1 X 1. This can be set in the settings pane on the Post edit screen.

= Can I add a description on the image? =

The description is displayed in the fullscreen mode. The description of the image is defined in Attachment Details of the image in the media library.

= How many grids can I add to my post? =

There is only 1 grid that can be added to a single post.

= The animations are not working properly =

Please check the images you are using are properly prepared for the web. Using large images may cause problems with animations.
See [WordPress Codex Image Size and Quality](https://codex.wordpress.org/Image_Size_and_Quality) for guidance.
It may also be necessary to slow the image transition and animation speeds.

= What support is there for this plugin =

Please raise a support ticket if you find any bugs. Please [contact me](http://www.ajmebc.co.uk/contact.php) if you have specific requirements.

== Screenshots ==

1. Gobi PMA default edit screen.
2. Gobi PMA settings panel.
3. Select images from the WP Media Library.
4. Selected images added to the Photo Gallery panel.
5. Shortcode added.
6. 2 x 3 Grid added to post.
7. 6 x 6 Grid added to post.
8. 1 x 1 Grid added to post.
9. Fullscreen image view.
10. Adding a description in the WP Media Library.
11. Fullscreen image view with description.
12. Tablet Layout.
13. Tablet Fullscreen Landscape.
14. Tablet Fullscreen Portrait.
15. Mobile Layout.
16. Mobile Fullscreen Landscape.
17. Mobile Fullscreen Portrait.

== Changelog ==

= 1.0 =
* Initial release.

= 1.1 =
* Configurable layouts for Mobile, Tablet & Desktop.
* Loading Spinner center aligned.
* Fullscreen mode centered and responsive.

= 1.2 =
* Grid thumbnails center aligned
* New animations: Slide Left, Slide Right, Slide Up, Slide Down

= 1.2.1 =
* Error handling improved.

== Upgrade Notice ==

= 1.0 =
* Initial release.

= 1.1 =
* Configurable layouts for Mobile, Tablet & Desktop.
* Loading Spinner center aligned.
* Fullscreen mode centered and responsive.

= 1.2 =
* Grid thumbnails center aligned
* New animations: Slide Left, Slide Right, Slide Up, Slide Down

= 1.2.1 =
* Error handling improved.
