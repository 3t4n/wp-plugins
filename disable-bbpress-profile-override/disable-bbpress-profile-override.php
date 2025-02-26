<?php

/*
Copyright: © 2011 DomainSoil ( coded in the USA )
<mailto:support@domainsoil.com> <http://www.domainsoil.com/>

Released under the terms of the GNU General Public License.
You should have received a copy of the GNU General Public License,
along with this software. In the main directory, see: /licensing/
If not, see: <http://www.gnu.org/licenses/>.
*/

/*  Copyright 2011  DOMAINSOIL  (email : SUPPORT AT DOMAINSOIL DOT COM)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA.
Alternatively, you may visit: <http://www.gnu.org/licenses/>.
*/

/*
Version:                        0.1
Stable tag:                     0.1
Framework:                      alpha

WordPress Compatible:           YES
Minimum WordPress Version:      3.x
Tested Up To:                   3.x
WP Multisite Compatible:        YES
Multisite Blog Farm Compatible: YES

BuddyPress Compatible:          YES
Minimum BuddyPress Version:     1.5
Tested Up To:                   1.5

bbPress Compatible:             YES
Minimum bbPress Version         2.0
Tested Up To:                   2.0

Other Requirements:             PHP 5.2.3+

Copyright:                      © 2011 DomainSoil
License:                        GNU General Public License
Contributors:                   travis.hill
Author URI:                     http://domainsoil.com/
Author:                         DomainSoil
Donate link:                    http://www.domainsoil.com/donate/

Plugin Name:                    Disable bbPress Profile Override
Support URI:                    http://support.domainsoil.com/disable-bbpress-profile-override/
Bug Report URI:                 http://trac.domainsoil.com/disable-bbpress-profile-override/
Privacy URI:                    http://www.domainsoil.com/legal/privacy-policy/
Plugin URI:                     http://www.domainsoil.com/products/disable-bbpress-profile-override/

Description: bbPress profile URLs are overridden by BuddyPress. This plugin removes that override so bbPress member profiles are available.

Tags: bbpress, buddypress, profile

echo "Yes, I'm a WordPress & PHP n00b, so please excuse all the commenting, I'm learning! ;)"; 
*/

// Stop direct call
if (!defined('ABSPATH'))
    exit("Nothing to see here. Move along.");

if (!function_exists('disable_bbp_profile_override')):
    function disable_bbp_profile_override()
    {
        global $bbp;
        remove_filter('bbp_pre_get_user_profile_url', array($bbp->extend->buddypress,
            'user_profile_url'));

    }
    add_action('init', 'disable_bbp_profile_override');
endif;

?>