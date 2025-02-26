<?php
/* 
Plugin Name: Advanced Author Listings
Plugin URI: http://phat-reaction.com/wordpress-plugins/advanced-author-listings
Version: 1.0
Author: Andy Killen
Author URI: http://phat-reaction.com
Description: Inveztor talks widget
Copyright 2010 Andy Killen  (email : andy  [a t ] phat hyphen reaction DOT com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
              
if (!class_exists("AuthorListings")) {
	class AuthorListings {
            var $adminOptionsName = "AuthorListingsAdminOptions";
                //
                // class constructor
                //
		function AuthorListings() {
		}
		function init() {
			// $this->getAdminOptions();
                }

             
                // Load widgets
               function load_widgets() {
                    register_widget( 'AuthorListings_Widget' );
                }

function doGravatarImageLink ($email, $default = '', $size=110){
                // construct the gravatar url, default to no alt image and 110px square
                $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( $email ) ) .
                "?default=" . urlencode( $default ) .
                "&amp;size=" . $size;
                return $grav_url;
                }

function show_author_listings($args){
    $defaults = array(
                );
    $args = wp_parse_args( $args, $defaults );
    extract( $args, EXTR_SKIP );
        $authors = array();
        $administrators = array();
        $editors = array();
        $contributors = array();
        if ($author == 'yes'){
        $authors  = getUsersByRole('author');
        }
        if ($administrator == 'yes'){
        $administrators  = getUsersByRole('administrator');
        }
        if ($editor == 'yes'){
        $editors  = getUsersByRole('Editor');
        }
        if ($contributor == 'yes'){
        $contributors  = getUsersByRole('contributor');
        }
        $result = array_merge((array)$authors, (array)$editors, (array)$contributors, (array)$administrators );
        sort($result);
        foreach ($result as $key => $value){
          $user_info =  get_userdata($value);  
          $post_number =count_user_posts( $user_info->ID ); ?>
            <div class="advanced-author-listing">
                <div class="advanced-author-listing-image">
                    <img src="<?php echo AuthorListings::doGravatarImageLink ($user_info->user_email,'',$image_size); ?>"  alt="<?php echo $user_info->user_nicename; ?>" height="<?php echo $image_size; ?>px" width="<?php echo $image_size; ?>px"/>
                    <?php if($author_posts=='yes') { ?><p>Posts : <?php if ($post_number > 0){?> <a href="<?php echo bloginfo('url'); ?>/author/<?php echo str_replace(" ", "-", strtolower($user_info->user_nicename)); ?>" ><?php echo count_user_posts( $user_info->ID )?></a><?php } else {echo "0";} ?></p><?php  } ?>
                </div>
                <div class="advanced-author-listing-info">
                    <?php if ($post_number > 0){?>
                    <h4><a href="<?php echo bloginfo('url'); ?>/author/<?php echo str_replace(" ", "-", strtolower($user_info->user_nicename)); ?>"><?php echo $user_info->user_nicename; ?></a></h4>
                    <?php } else {?>
                    <h4><?php echo $user_info->user_nicename; ?></h4>
                    <?php } ?>
                    <?php if($author_excerpt=='yes') { ?><p><?php echo nl2br (get_user_meta( $value, 'author_excerpt',true) );?></p><?php } ?>
                    <?php if($author_bio=='yes') { ?><p><?php echo nl2br ($user_info->user_description); ?></p><?php } ?>
                    <?php if($twitter=='yes' || $linkedin=='yes' || $facebook=='yes' || $show_email=='yes' ) { ?>
                    <ul class="advanced-author-listing-contacts">
                        <?php $linkedin_item = get_user_meta( $value, 'linkedin',true); ?>
                        <?php $facebook_item =get_user_meta( $value, 'facebook',true); ?>
                        <?php $twitter_item =get_user_meta( $value, 'twitter',true); ?>
                        <?php if (empty($linkedin_item)&&empty($facebook_item)&&empty($twitter_item)){ } else{ ?>
                            <?php if(!empty($contact_heading)){?>
                            <li><?php echo $contact_heading; ?></li>
                            <?php } ?>
                        <?php } ?>
                        <?php if($show_email=='yes' ){?>
                            <li><a href="mailto:<?php echo urlencode($user_info->user_email); ?>"><img src="<?php echo WP_PLUGIN_URL ?>/author-listings/images/blank.png" class="author-sprite-email" height="16px" width="16px" alt="email"/> email</a></li>
                        <?php } ?>
                        <?php if($twitter=='yes' && !empty( $twitter_item ) ){?>
                            <li><a href="<?php echo get_user_meta( $value, 'twitter',true); ?>"><img src="<?php echo WP_PLUGIN_URL ?>/author-listings/images/blank.png" class="author-sprite-twitter" height="16px" width="16px" alt="twitter"/> twitter</a></li>
                        <?php } ?>
                        <?php if($facebook=='yes' && !empty($facebook_item)){?>
                            <li><a href="<?php echo get_user_meta( $value, 'facebook',true); ?>"><img src="<?php echo WP_PLUGIN_URL ?>/author-listings/images/blank.png" class="author-sprite-facebook"  height="16px" width="16px" alt="facebook" /> facebook</a></li>
                        <?php } ?>
                        <?php if($linkedin=='yes' && !empty($linkedin_item)){?>
                            <li><a href="<?php echo get_user_meta( $value, 'linkedin',true); ?>"><img src="<?php echo WP_PLUGIN_URL ?>/author-listings/images/blank.png" class="author-sprite-linkedin" height="16px" width="16px" alt="linkedin" /> linkedin</a></li>
                        <?php } ?>
                    </ul>
                    <div class="clean"></div>

                        <?php } ?>

                    <?php  if($author_page=='yes') { ?>
                    <?php if ($post_number > 0){?>
                    <?php if($twitter=='yes' || $linkedin=='yes' || $facebook=='yes'  ) { ?>
                    <br />
                    <?php } ?>
                    <a href="<?php echo bloginfo('url'); ?>/author/<?php echo str_replace(" ", "-", strtolower($user_info->user_nicename)); ?>">see posts</a>
                    <?php } } ?>
                </div>
                <div class="clean"></div>
            </div>
        <?php // print_r ($user_info);
        }

}


function display_screen_information (){
    $args = wp_parse_args( $args, $defaults );
                 extract( $args, EXTR_SKIP );


}

                // manages deletion of options
                    //  gets the image if poss from the post/page

                    function loadLangauge ()
                    {
                      load_plugin_textdomain ('author-listings');
                    }

function my_save_extra_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
            return false;
    $custom_fields = array ('twitter','author_excerpt','facebook','linkedin','city','street','number','extension','postcode','country', 'mobile', 'telephone');
    /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
    foreach ($custom_fields as $value){
        update_usermeta( $user_id, $value, $_POST[$value] );
    }
}

function addHeaderCode(){
    add_action('wp_print_styles', 'stylesheet_autoloader_author_listing');
    
    function stylesheet_autoloader_author_listing(){
                        $sheets = array('author-listings'=>'all',);

                        foreach ($sheets as $name => $media){
                            stylesheet_loader_author_listing($name, $media);
                        }
                    }
    function stylesheet_loader_author_listing($name, $media){
                        
                        $myStyleUrl = WP_PLUGIN_URL . "/author-listings/".$name.".css" ;
                        $myStyleFile = WP_PLUGIN_DIR . "/author-listings/".$name.".css" ;
                            if ( file_exists($myStyleFile) ) {
                                wp_register_style("authors-listings-".$name."" , $myStyleUrl,array(),1,"".$media."" );
                                wp_enqueue_style( "authors-listings-".$name."");
                            }
                    }
}


function my_show_extra_profile_fields( $user ) { ?>
	<h3>Address information</h3>
	<table class="form-table">
                    <tr>
			<th style="vertical-align:top">Address</th>
                        <td>
                            <table style="width:auto;border-collapse:collapse">
                                <tr>
                                    <td style="padding:0">
                                        <label for="street">Street</label><br />
                                        <input type="text" name="street" id="street" value="<?php echo stripslashes(esc_attr( get_the_author_meta( 'street', $user->ID ) ) ); ?>" class="regular-text" /><br />
                                    </td>
                                    <td style="padding:0 0 0 5px">
                                        <label for="number">Number</label><br />
                                            <input type="text"  style="width:5em" name="number" id="number" value="<?php echo stripslashes(esc_attr( get_the_author_meta( 'number', $user->ID) ) ); ?>" class="regular-text" /><br />
                                    </td>
                                    <td style="padding:0 0 0 5px">
                                            <label for="extension">Extension</label><br />
                                            <input type="text" style="width:5em" name="extension" id="extension" value="<?php echo stripslashes( esc_attr( get_the_author_meta( 'extension', $user->ID )) ); ?>" class="regular-text" /><br />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <label for="city">City</label><br />
                                        <input type="text" name="city" id="city" value="<?php echo stripslashes(esc_attr( get_the_author_meta( 'city', $user->ID )) ); ?>" class="regular-text" /><br />
                                    </td>
                                    <td colspan="2"  style="padding:0 0 0 5px">
                                        <label for="postcode">Postcode</label><br />
                                            <input type="text"  style="width:7em" name="postcode" id="postcode" value="<?php echo stripslashes(esc_attr( get_the_author_meta( 'postcode', $user->ID ))); ?>" class="regular-text" /><br />
                                    </td>
                                </tr>
                                 <tr>
                                     <td colspan="3"  style="padding:0">
                                        <label for="country">Country</label><br />
                                        <select class="" id="country" name="country" style="width:155px" >
                                            <option value="-1">- Maak uw keuze -</option>
                                            <?php
                                            $country_list = array(
		"Nederlands", "Afghanistan",		"Albania",		"Algeria",		"Andorra",		"Angola",		"Antigua and Barbuda",		"Argentina",
		"Armenia",		"Australia",		"Austria",		"Azerbaijan",		"Bahamas",		"Bahrain",		"Bangladesh",
		"Barbados",		"Belarus",		"Belgium",		"Belize",		"Benin",		"Bhutan",		"Bolivia",
		"Bosnia and Herzegovina",		"Botswana",		"Brazil",		"Brunei",		"Bulgaria",		"Burkina Faso",
		"Burundi",		"Cambodia",		"Cameroon",		"Canada",		"Cape Verde",		"Central African Republic",
		"Chad",		"Chile",		"China",		"Colombi",		"Comoros",		"Congo (Brazzaville)",		"Congo",
		"Costa Rica",		"Cote d'Ivoire",		"Croatia",		"Cuba",		"Cyprus",		"Czech Republic",		"Denmark",
		"Djibouti",		"Dominica",		"Dominican Republic",		"East Timor (Timor Timur)",		"Ecuador",		"Egypt",
		"El Salvador",		"Equatorial Guinea",		"Eritrea",		"Estonia",		"Ethiopia",		"Fiji",		"Finland",
		"France",		"Gabon",		"Gambia, The",		"Georgia",		"Germany",		"Ghana",		"Greece",
		"Grenada",		"Guatemala",		"Guinea",		"Guinea-Bissau",		"Guyana",		"Haiti",		"Honduras",
		"Hungary",		"Iceland",		"India",		"Indonesia",		"Iran",		"Iraq",		"Ireland",		"Israel",
		"Italy",		"Jamaica",		"Japan",		"Jordan",		"Kazakhstan",		"Kenya",		"Kiribati",
		"Korea, North",		"Korea, South",		"Kuwait",		"Kyrgyzstan",		"Laos",		"Latvia",		"Lebanon",		"Lesotho",
		"Liberia",		"Libya",		"Liechtenstein",		"Lithuania",		"Luxembourg",		"Macedonia",		"Madagascar",
		"Malawi",		"Malaysia",		"Maldives",		"Mali",		"Malta",		"Marshall Islands",		"Mauritania",		"Mauritius",
		"Mexico",		"Micronesia",		"Moldova",		"Monaco",		"Mongolia",		"Morocco",		"Mozambique",		"Myanmar",
		"Namibia",		"Nauru",		"Nepa",				"New Zealand",		"Nicaragua",		"Niger",		"Nigeria",
		"Norway",		"Oman",		"Pakistan",		"Palau",		"Panama",		"Papua New Guinea",		"Paraguay",		"Peru",
		"Philippines",		"Poland",		"Portugal",		"Qatar",		"Romania",		"Russia",		"Rwanda",		"Saint Kitts and Nevis",
		"Saint Lucia",		"Saint Vincent",		"Samoa",		"San Marino",		"Sao Tome and Principe",		"Saudi Arabia",		"Senegal",
		"Serbia and Montenegro",		"Seychelles",		"Sierra Leone",		"Singapore",		"Slovakia",		"Slovenia",		"Solomon Islands",
		"Somalia",		"South Africa",		"Spain",		"Sri Lanka",		"Sudan",		"Suriname",		"Swaziland",		"Sweden",
		"Switzerland",		"Syria",		"Taiwan",		"Tajikistan",		"Tanzania",		"Thailand",		"Togo",		"Tonga",		"Trinidad and Tobago",
		"Tunisia",		"Turkey",		"Turkmenistan",		"Tuvalu",		"Uganda",		"Ukraine",		"United Arab Emirates",		"United Kingdom",
		"United States",		"Uruguay",		"Uzbekistan",		"Vanuatu",		"Vatican City",		"Venezuela",		"Vietnam",		"Yemen",
		"Zambia",		"Zimbabwe"	);

        foreach ($country_list as $land){
            ?><option <?php if (stripslashes(  get_the_author_meta( 'country', $user->ID )) == $land){echo "selected=\"selected\"";} ?>   value="<?php echo $land; ?>"  ><?php echo $land; ?></option> <?php
        }
                                            ?>
                                        </select>

                                        </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
			<th><label for="twitter">Telephone</label></th>
			<td>
				<input type="text" name="telephone" id="telephone" value="<?php echo esc_attr( get_the_author_meta( 'telephone', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
                    <tr>
			<th><label for="twitter">Mobile</label></th>
			<td>
				<input type="text" name="mobile" id="mobile" value="<?php echo esc_attr( get_the_author_meta( 'mobile', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>


        </table>
        <?php if (current_user_can('edit_published_posts')) { ?>
	<h3>Extra Author display information</h3>
	<table class="form-table">
                    <tr>
			<th><label for="twitter">Author excerpt</label></th>
			<td>
				<textarea name="author_excerpt" id="author_excerpt" cols="4" rows="4" ><?php echo stripslashes(esc_attr( get_the_author_meta( 'author_excerpt', $user->ID ) ) ); ?></textarea><br />
				<span class="description">Please enter your author excerpt</span>
			</td>
		</tr>

		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter URL.</span>
			</td>
		</tr>

                <tr>
			<th><label for="facebook">Facebook</label></th>

			<td>
				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your facebook URL.</span>
			</td>
		</tr>
                <tr>
			<th><label for="linkedin">Linked in</label></th>

			<td>
				<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your linked in URL.</span>
			</td>
		</tr>

	</table>
        <?php } ?>
<?php }

                    
        }
}

require_once('author-listings-widget.php');   //  includes the code for the share widget
require_once('functions.php');   //  includes functions to make things accessable

//  setup new instance of plugin
if (class_exists("AuthorListings")) {$cons_AuthorListings = new AuthorListings();}
//Actions and Filters	
if (isset($cons_AuthorListings)) {
    //Initialize the admin panel
        if (!function_exists("loginContext_ap")) {
	function loginContext_ap() {
		global $cons_AuthorListings;
		if (!isset($cons_AuthorListings)) {
			return;
		}

	}
}
//Actions
add_action('widgets_init',array(&$cons_AuthorListings, 'load_widgets'),1); // loads widgets
//        add_action ('init',array(&$cons_AuthorListings, 'loadLangauge'),1);  // add languages
// save custom user fields
add_action( 'personal_options_update', array(&$cons_AuthorListings, 'my_save_extra_profile_fields'),1);
add_action( 'edit_user_profile_update', array(&$cons_AuthorListings, 'my_save_extra_profile_fields'),1);
// custom user fields
add_action( 'show_user_profile', array(&$cons_AuthorListings, 'my_show_extra_profile_fields'),3);
add_action( 'edit_user_profile', array(&$cons_AuthorListings, 'my_show_extra_profile_fields'),3);
// unstall hooks to remove admin options
// register_uninstall_hook('share-and-follow',array(&$cons_AuthorListings, 'removeAuthorListings'));
// not working and don't know why

add_action('wp_head', array(&$cons_AuthorListings, 'addHeaderCode'),1);
}
?>
