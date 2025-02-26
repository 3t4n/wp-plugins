=== Advanced Custom Fields: Snippets ===
Contributors: tomekthewo
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=M2L5UJG9JEWXU&source=url
Tags: acf, snippets, advanced custom fields
Requires at least: 4.8
Tested up to: 5.2
Requires PHP: 5.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds useful functions for rendering image fields, link fields, repeater fields and flexible content for the Advanced Custom Fields plugin.

=== Description ===

Adds useful functions for rendering image fields, link fields, repeater fields and flexible content for the Advanced Custom Fields plugin. For [detailed info look on Bitbucket](https://bitbucket.org/tomekthewo/advanced-custom-fields-snippets/src/master/).

###Main advantages
* write less code (do not repet same blocks of the code when writing down ACF custom fields)
* built-in filters
* works also for Gutenberg ACF Blocks
* no init hooks etc (no impact on performance)

**Usage**

= Link =

Returns the snippet of a specific link field.
`
<?php
    acf_snippet_get_link($selector, [$postId], [$args]);
?>
`

Displays the snippet of a specific link field.
`
<?php
    acf_snippet_the_link($selector, [$postId], [$args]);
?>
`

**Parameters**
`$selector ` *(string) (Required)* ACF field name or ACF field key. Based on [ACF get_field function](https://www.advancedcustomfields.com/resources/get_field/).
`$postId ` *(integer|bool) (Optional)*  The post ID where the value is saved. Use `true` for getting sub field.  Default value: `false` (current post).
`$args ` *(array) (Optional)* Array of link output arguments.  Default value: `null`.
&nbsp;&nbsp;&nbsp;&nbsp;**'class'** *(string)* `class` attribute of the anchor.
&nbsp;&nbsp;&nbsp;&nbsp;**'id'** *(string)* `id` attribute of the anchor.
&nbsp;&nbsp;&nbsp;&nbsp;**'title'** *(string)* `title` attribute text of the anchor.

= Image =

Returns the snippet of a specific image field.
`
<?php
    acf_snippet_get_image($selector, [$postId], [$args]);
?>
`

Displays the snippet of a specific image field.
`
<?php
    acf_snippet_the_image($selector, [$postId], [$args]);
?>
`
**Parameters**
`$selector ` *(string) (Required)* ACF field name or ACF field key. Based on [ACF get_field function](https://www.advancedcustomfields.com/resources/get_field/).
`$postId ` *(integer|bool) (Optional)*  The post ID where the value is saved. Use `true` for getting sub field.  Default value: `false` (current post).
`$args ` *(array) (Optional)* Array of image output arguments. Default value: `null`.
&nbsp;&nbsp;&nbsp;&nbsp;**'size'** *(string)* Image size to use. Accepts any valid image size. Default value is `full`.
&nbsp;&nbsp;&nbsp;&nbsp;**'alt'** *(string)* `alt` attribute of the image.
&nbsp;&nbsp;&nbsp;&nbsp;**'id'** *(string)* `id` attribute of the image.
&nbsp;&nbsp;&nbsp;&nbsp;**'class'** *(string)* `class` attribute of the image.
&nbsp;&nbsp;&nbsp;&nbsp;**'title'** *(string)* `title` attribute of the image.
&nbsp;&nbsp;&nbsp;&nbsp;**'srcset'** *(bool)* Use `true` for retrieving image's `srcset` attribute. Default  value: `false`.
&nbsp;&nbsp;&nbsp;&nbsp;**'loading'** *(string)* `loading` attribute of the image. Default value: `lazy`.
&nbsp;&nbsp;&nbsp;&nbsp;**'link'** *(bool|array)* Array of attributes for anchor wrapped around the image. Default value: `false`.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**'href'** *(string)* `href` attribute of the link.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**'target'** *(string)* `target` attribute of the link.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**'class'** *(string)* `class` attribute of the link.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**'id'** *(string)* `id` attribute of the link.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**'title'** *(string)* `title` attribute of the link.

= Repeater =

Displays the snippet of a specific repeater field.
`
<?php
    acf_snippet_the_repeater($selector, [$postId], [$args]);
?>
`

**Parameters**
`$selector ` *(string) (Required)* ACF field name or ACF field key. Based on [ACF get_field function](https://www.advancedcustomfields.com/resources/get_field/).
`$postId ` *(integer|bool) (Optional)*  The post ID where the value is saved. Default value: `false` (current post).
`$args ` *(array) (Optional)* Array of repeater output arguments.  Default value: `null`.
&nbsp;&nbsp;&nbsp;&nbsp;**'template'** *(string|array)* Template for items inside the loop. Arguments of `get_template_part` function. In the template use standard `get_sub_field function`.
&nbsp;&nbsp;&nbsp;&nbsp;**'wrap_before'** *(string)* Text (HTML) before repeater items while have rows.
&nbsp;&nbsp;&nbsp;&nbsp;**'wrap_after'** *(string)* Text (HTML) after repeater items while have rows
&nbsp;&nbsp;&nbsp;&nbsp;**'empty_html'** *(string)* Text (HTML) in case there are no rows in repeater.

= Flexible content =

Displays the snippet of a specific flexible field.
`
<?php
    acf_snippet_the_flexible_content($selector, [$postId], [$args]);
?>
`
**Parameters**
`$selector ` *(string) (Required)* ACF field name or ACF field key. Based on [ACF get_field function](https://www.advancedcustomfields.com/resources/get_field/).
`$postId ` *(integer|bool) (Optional)*  The post ID where the value is saved. Default value: `false` (current post).
`$args ` *(array) (Optional)* Array of flexible content output arguments.  Default value: `null`.
&nbsp;&nbsp;&nbsp;&nbsp;**'templates'** *(array)* Array of templates for flexible content layouts.  In the templates use standard `get_sub_field function`.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;key *(string)* - layout name
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;value *(string|array)* arguments for `get_template_part` function.


*Requires Advanced Custom Fields (Pro)*

= Examples =

**Link field**
`
<?php
    acf_snippet_the_link('more_info_link', false, [
        'class'=> 'link__out',
        ]
    );
?>
`

**Image field**
`
<?php
    echo acf_snippet_get_image('logo', 'option', [
        'size' => 'medium',
        'alt' => 'company name',
        'title' => false,
        'class' => 'header__logo',
        'id' => 'company-logo',
        'loading' => 'fetch',
        'link' => [
            'href' => get_home_url()
            ]
        ]
    );
?>
`

**Repeater field**
`
<?php
    acf_snippet_the_repeater( 'team_members', false, [
        'template'    => [ 'templates/loops/loop', 'team-member' ],
        'wrap_before' => '<ul class="about__team">',
        'wrap_after'  => '</ul>',
        'empty_html'  => '<p>' . __( 'No team members to show.', 'web' ) . '</p>'
        ]
    );
?>
`

**Flexible content field**
`
<?php
    `acf_snippet_the_flexible_content( 'fp_content', false, [
        'templates' => [
            'slider'          => [ 'templates/homepage/snippet', 'slider' ],
            'counters' => [ 'templates/homepage/snippet', 'counters' ],
            'text_block'    => [ 'templates/homepage/snippet', 'text_block' ]
            ]
        ] 
    );
?>
`

== Changelog ==

= 1.0 =
* init

== Upgrade Notice ==
