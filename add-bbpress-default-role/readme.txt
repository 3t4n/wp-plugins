=== Plugin Name ===
Contributors: davist11
Tags: bbPress, roles
Requires at least: 2.7
Tested up to: 2.7
Stable tag: trunk

Automatically give WordPress users a bbPress role of member when registering.

== Description ==

When integrating bbPress and WordPress and using only the WordPress registration, no default role was assigned to the user in bbPress. This will give the user a role of **member** in bbPress. Just activate, and whenever a user signs up, they will automatically have the bbPress role assigned. *Note: this is not retroactive; it is only for new registrations.* Written at [Matrix Group International](http://www.matrixgroup.net/).

== Installation ==


1. Upload `bbpress-add-role` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. That's it! New registrations will automatically be assigned the role.