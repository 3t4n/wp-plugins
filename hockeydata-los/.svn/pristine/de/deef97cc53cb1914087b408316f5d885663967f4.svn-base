=== hockeydata LOS ===
Contributors: hockeydata
Donate link: http://www.hockeydata.net/
Tags: hockeydata, sport, statistics, widgets
Requires at least: 4.6
Tested up to: 5.9
Stable tag: 1.2.4
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add statistic widgets by hockeydata with a view clicks.

== Description ==

This plugin provides WordPress widgets to implement the available statistics widgets of [hockeydata Live.Online Statistics API](https://apidocs.hockeydata.net/), like standings, schedule or top scorers. All of these widgets start with "hockeydata LOS".

To implement a widget, e.g. the schedule, on a WordPress page, you need to install a WordPress plugin (e.g. [Page Builder by SiteOrigin](https://wordpress.org/plugins/siteorigin-panels/)) which allows adding WordPress widgets on simple pages. Alternatevely, you may also use shortcodes.

<h3>Shortcodes</h3>
All hockeydata LOS widgets can also be implemented with shortcodes:

`[hd-los-game-full-report]       = hockeydata.los.Game.FullReport
[hd-los-game-slider]            = hockeydata.los.GameSlider
[hd-los-game-ticker]            = hockeydata.los.GameTicker
[hd-los-knockout-stage]         = hockeydata.los.KnockoutStage
[hd-los-knockout-stage-compact] = hockeydata.los.KnockoutStage.Compact
[hd-los-leaders]                = hockeydata.los.Leaders
[hd-los-live-games]             = hockeydata.los.LiveGames
[hd-los-player-full-page]       = hockeydata.los.Player.FullPage
[hd-los-players]                = hockeydata.los.Players
[hd-los-schedule]               = hockeydata.los.Schedule
[hd-los-standings]              = hockeydata.los.Standings
[hd-los-team-full-page]         = hockeydata.los.Team.FullPage
[hd-los-team-stats]             = hockeydata.los.TeamStats`

All widgets options must be provided in lower case with hyphens, not as defined in the JavaScript API in CamelCase format. E.g. `division-id` instead of `divisionId`. More examples:

`additional-columns › additionalColumns
column-set         › columnSet
show-legend        › showLegend`

Shortcode example:

`[hd-los-schedule division-id=ebel-gd]`

<h3>Upgrade Notices</h3>

If you upgrade from a version lower than 1.2.0 please

1. Check the settings in Settings > hockeydata LOS.
1. Replace widgets and shortcodes.
1. Check all widget links (rowLink, playerLink, etc.).

Ad 2.: In version 1.2.0 we had to add the prefixes `hd-` and `hd_` to the shortcodes and widget id's, respectively. Unfortunately, all of your widgets you implemented prior to version 1.2.0 won't work anymore. But there's a silver lining:

You can use a plugin to replace all old shortcodes and widgets at once. Here is an example of how to do this with "Better Search Replace":

1. Install and activate the plugin "Better Search Replace" (go to Plugins › Add New and search for "Better Search Replace" or download from [https://wordpress.org/plugins/better-search-replace/](https://wordpress.org/plugins/better-search-replace/)).
1. Go to Tools › Better Search Replace
1. Replace the following strings (do not activate the option "Case-Insensitive?"):

**Important**: before replacing, please [back up your database and files](https://codex.wordpress.org/WordPress_Backups).

`Search for                      Replace with

[los-game-full-report           [hd-los-game-full-report
[los-game-slider                [hd-los-game-slider
[los-leaders                    [hd-los-leaders
[los-player-full-page           [hd-los-player-full-page
[los-schedule                   [hd-los-schedule
[los-standings                  [hd-los-standings
[los-team-full-page             [hd-los-team-full-page
[los-team-stats                 [hd-los-team-stats
los_widget_game_full_report     hd_los_widget_game_full_report
los_widget_game_slider          hd_los_widget_game_slider
los_widget_leaders              hd_los_widget_leaders
los_widget_player_full_page     hd_los_widget_player_full_page
los_widget_schedule             hd_los_widget_schedule
los_widget_standings            hd_los_widget_standings
los_widget_team_full_page       hd_los_widget_team_full_page
los_widget_team_stats           hd_los_widget_team_stats
LOS_Widget_GameFullReport       HD_LOS_Widget_GameFullReport
LOS_Widget_GameSlider           HD_LOS_Widget_GameSlider
LOS_Widget_Leaders              HD_LOS_Widget_Leaders
LOS_Widget_PlayerFullPage       HD_LOS_Widget_PlayerFullPage
LOS_Widget_Schedule             HD_LOS_Widget_Schedule
LOS_Widget_Standings            HD_LOS_Widget_Standings
LOS_Widget_TeamFullPage         HD_LOS_Widget_TeamFullPage
LOS_Widget_TeamStats            HD_LOS_Widget_TeamStats`

Of course you only need to replace strings containing the shortcodes and widgets you're using. After you're done replacing you can remove the plugin.

== Screenshots ==

1. General settings
2. Division management
3. Styling options

== Frequently Asked Questions ==

= How can I add widgets to posts and pages? =

You can either use shortcodes or a page builder plugin like [Page Builder by SiteOrigin](https://wordpress.org/plugins/siteorigin-panels/) which allows you to add WordPress widgets to your posts and pages.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/hockeydata-los` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress.
1. Use the Settings › hockeydata LOS screen to configure the plugin.

== Upgrade Notice ==

= 1.2.0 =
This version adds all missing hockeydata LOS widgets plus several new features like division aliases and additional widget options.

== Changelog ==

= 1.2.4 =
* PHP 7.4 compatibility

= 1.2.3 =
* Fixed a bug where permalinks with ? in the URL broke the widget URL's

= 1.2.2 =
* Implemented widget option "teamName" in [hd-los-schedule] shortcode as "team-name"
* Support for Elementor Page Builder

= 1.2.1 =
* Minor bug fix to set correct widget language
* Added widget and shortcode option "Calculate Total Score" to Knockout Stage widget

= 1.2.0 =
* New widgets: Game Ticker, Knockout Stage, Knockout Stage Compact, Live Games and Players
* More widget options
* Division aliases to easily manage your divisions
* New template "Soda"
* Add additional widget options
* Automatically created Divisions Pickers