=== Sportsteam Widget - Football livescore ===
Contributors: Sportsteam livescores
Tags: sport, sports, widget, team, teams, match, matches, game, games, football, live score, live, livescores
Requires at least: 4.1
Tested up to: 6.6
Stable tag: 2.4.3
Requires PHP: 7.0

A widget that shows the next match of a team.

== Description ==

SportsTeam Widget is a widget that shows the next match of a game.
It uses a Custom Post Type for sportsteams, together with a Taxonomy/Term
for the class/level where the team plays.
You can add widget to every page anywhere you want and customize it for your needs for every sport - football (soccer), basketball, hockey, tennis, cricket and much more. Just add your team or teams and set up widget settings such as:
* Widget title
* Match date
* Subtitle
* Is match away (ticker)
* Class
* Home Team
* Home Team result
* Home Team color
* Out Team
* Out Team result
* Out Team color
* Background color
* Text color
* Show teams as links

But that's not all! We've added a new feature - football livescore widget to add fully automated live scores and results for today from any tournament you want (or all of them at once). Just insert simple shortcode where you want on page and your users will get livescores with real time updates with no need to refresh the page.
Livescore widget is fully responsive for any screen sizes and has no ads.


= Compatibility =

This plugin is compatible with [ClassicPress](https://www.classicpress.net).


= Interaction with External Services =

Sportsteam Widget utilizes the external service 777score.com to obtain up-to-date information about the schedule and results of football matches. 777score.com is a recognized source of sports information trusted by the sports community. This service provides a wide range of information about football, including various leagues, tournaments, and championships from around the world.

The functioning of the 777score.com service is based on delivering real-time data about selected matches, including the match start time, its status, incidents, and the score. Users have the ability to view detailed information about matches, such as goal lists, received cards, and other key events, without the need to refresh the page. This means that data is automatically updated without requiring page reload.

This approach ensures users quick and uninterrupted access to the latest sports data without the effort of manually updating information, allowing them to stay informed about ongoing events in real-time.


== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Fill the Teams posts, together with the featured image.
4. Optionally use Taxonomies/Terms.
5. Add the widget to the sidebar where you want it and select the teams and dates.
6. Optionally set the colors with CSS colors.
7. Enjoy.


== Screenshots ==

1. Frontend of the widget, with both teams for the match displayed.
2. Backend of the widget, select teams and other metadata.
3. Frontend of livescore widget
4. Backend of livescore widget

== Changelog ==

= 2.4.3 =
* 2024-08-22
* Tested up to: 6.6.

= 2.4.2 =
* 2023-11-23
* Security fix.

= 2.4.1 =
* 2023-11-15
* External service description for 777score has been added.

= 2.4.0 =
* 2023-11-01
* Added livescore shortcode and live functionality.

= 2.3.2 =
* 2023-10-23
* Prepared for new functionality.

= 2.3.1 =
* 2023-02-28
* Escape more output.

= 2.3.0 =
* 2021-09-08
* Add class to post title in widget.
* Use 'esc_html' functions.
* Some updates from phpcs and wpcs.

= 2.2.3 =
* 2018-06-05
* Result 0 is a result too.

= 2.2.2 =
* 2016-10-04
* Fix PHP notices.

= 2.2.1 =
* 2016-05-17
* Add filter for thumbnail size.
* Add widget.php file with Widget class.
* Update Donate text.

= 2.2.0 =
* 2016-02-03
* Add results to widget (optional).
* If title is empty, don't show it.
* Use $before_widget properly.

= 2.1.9 =
* 2016-01-10
* Make archive pages work.

= 2.1.8 =
* 2015-12-11
* Drop pot and nl_NL, they are maintained at GlotPress.

= 2.1.7 =
* 2015-10-04
* Use plugins_url() for enqueue.

= 2.1.6 =
* 2015-09-28
* Only support WordPress 3.7+, since they really are supported.
* Change title of widget.
* Use medium thumbnail.
* Set width of post thumbnail to 100%.

= 2.1.5 =
* 2015-09-05
* Change textdomain to slug.
* Add option to show as links or not.
* Update pot, nl_NL.

= 2.1.4 =
* 2015-08-24
* Change Out to Away.

= 2.1.3 =
* 2015-08-05
* Use headings correctly on admin page.

= 2.1.2 =
* 2015-07-05
* Use the correct __construct for WP_Widget.

= 2.1.1 =
* 2015-06-03
* Add About page.
* Update pot and nl_NL.

= 2.1 =
* 2015-03-07
* Separator is now in grayscale.
* Improve HTML/CSS.

= 2.0 =
* 2015-03-06
* First public version.

= 1.0 =
* First version.
