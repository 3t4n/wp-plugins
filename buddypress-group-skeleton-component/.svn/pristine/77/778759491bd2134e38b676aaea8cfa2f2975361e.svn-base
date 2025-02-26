<?php 
/**
Plugin Name: BuddyPress Group Skeleton Component
Plugin URI: http://buddypress.org/community/groups/buddypress-group-skeleton-component
Description: This is a bare-bones component that should provide a good starting block to building your own custom BuddyPress Group component.

The plugin was developed to help Buddypress lovers get started with and, explore the endless possibilities of Buddypress groups. With some simple extra functionality, you can transform the function of your groups and even your site. 

The plugin preforms a basic function - save group meta ( data ) via thr group creating process and/or via 'edit group details' and returns the data on the group's home page.

This is the basis for the existing Buddypress Twitter, Buddypress Google Plus and Buddypress Klout plugins - They all preform the same basic function, though as you can see, can be used in a variety of ways.

Version: 0.1
Author: Charl Kruger
Author URI: Charlkruger.com
License:GPL2
**/

/*
$bp_gscomponent_init checks to see if Buddypress is active before we load our code ( buddypress-group-skeleton-component.php ). If buddypress is not active ( enabled ), our code will not be loaded.
It is good practice to check if Buddypress is active as some of our functions might be dependant on existing Buddypress functions. If we did not preform this check, we would likely get some nasty errors and be locked out of our site.

If you would like to test this for yourself:
	1. Delete lines 30, 32 and 33 and save
	2. Deactivate Buddypress from within your plugin's admin panel
	3. Visit your site ( front end )
	
You will either get some error or a blank page.

To rectify the error:
	1. Undo your changes to lines 30, 32 and 33 and save
	2. Refresh your browser
	3. Reactivate Buddypress
	
All should be back to normal now. If you still experience problems, rename or delete the BuddyPress Group Skeleton Component plugin.
*/
function bp_gscomponent_init() {
	require( dirname( __FILE__ ) . '/buddypress-group-skeleton-component.php' );
}
add_action( 'bp_include', 'bp_gscomponent_init' );

?>