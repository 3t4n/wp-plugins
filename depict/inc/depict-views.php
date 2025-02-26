<?php
if( ! defined( 'ABSPATH' ) ) exit;


/**
 * Attribute value for selector
 * hide or show list views
 */
function depict_list_class( $metaname ) {
        $metadat = get_the_author_meta( $metaname );
        if( $metadat == "" || $metadat == "depict-none" ) {
                    $class="depict-hidden"; }
            else {  $class="depict-group-item"; }
    return $class;
}

/**Create a grammaticality formatted gender output.
 * @string $gender translate all but "none"
 * 'none' is literal and can not be changed.
 */
function depict_display_friendly_gender() {
    $fgender = get_the_author_meta( 'gender' );

    if($fgender == "depict-male" ) {
                $gender = __( 'Male', 'depict' ); }
        elseif( $fgender == "depict-female" ) {
                $gender = __( 'Female', 'depict' ); }
        elseif( $fgender == "depict-non-binary" ) {
                $gender = __( 'Non Binary', 'depict' ); }
        elseif( $fgender == "depict-none" ) {
                $gender = "";  }
        else {
                $gender = ''; }
    return $gender;
}


/**
 * Admin panel to choose gender of author
 * @uses show_user_profile
 * @uses edit_user_profile
 */
    add_action( 'show_user_profile', 'show_depict_profile_fields' );
    add_action( 'edit_user_profile', 'show_depict_profile_fields' );

    function show_depict_profile_fields( $user ) { ?>
        <h3>Optional profile information</h3>
        <table class="form-table">
            <tr>
                <th><label for="gender">Gender</label></th>
                <td>
                    <select name="gender" id="gender" >
                        <option value="depict-male"
                            <?php selected( 'depict-male', get_the_author_meta(
                            'gender', $user->ID ) ); ?>><?php esc_html_e(
                            'Male', 'depict' ); ?></option>
                        <option value="depict-female"
                            <?php selected( 'depict-female', get_the_author_meta(
                            'gender', $user->ID ) ); ?>><?php esc_html_e(
                            'Female', 'depict' ); ?></option>
                        <option value="depict-non-binary"
                            <?php selected( 'depict-non-binary', get_the_author_meta(
                            'gender', $user->ID ) ); ?>><?php esc_html_e(
                            'Non-Binary', 'depict' ); ?></option>
                        <option value="depict-none"
                            <?php selected( 'depict-none', get_the_author_meta(
                            'gender', $user->ID ) ); ?>><?php esc_html_e(
                            'Do Not Display', 'depict' ); ?></option>
                    </select>
                </td>
            </tr>
        </table>
    <?php }


/**
 * update author/user profile
 * @uses personal_options_update
 * @uses edit_user_profile_update
 */
    add_action( 'personal_options_update', 'save_depict_profile_fields' );
    add_action( 'edit_user_profile_update', 'save_depict_profile_fields' );

    function save_depict_profile_fields( $user_id ) {
        if ( !current_user_can( 'edit_user', $user_id ) )
            return false;
        update_usermeta( $user_id, 'gender', $_POST['gender'] );
    }


/**
 * Add social links to author/user profile
 * @uses user_contactmethods
 */
function depict_add_to_author_profile( $contactmethods ) {

	$contactmethods['rss_url']       = __( 'RSS URL', 'depict' );
	$contactmethods['google_profile'] = __( 'Google Profile URL', 'depict' );
	$contactmethods['twitter_profile'] = __( 'Twitter Profile URL', 'depict' );
	$contactmethods['facebook_profile'] = __( 'Facebook Profile URL', 'depict' );
	$contactmethods['linkedin_profile']  = __( 'Linkedin Profile URL', 'depict' );

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'depict_add_to_author_profile', 10, 1);


/**render for Author page
 * @uses shortcode on any page
 * @shortcode [depict-show-author-page]
 */
function depict_render_author_page() {

    $author_id = get_the_author_meta( 'id' );

	// Set some defaults for option values.
    $depict_font = get_option ( 'depict_font', 'inherit' );
        if( $depict_font == "") $depict_font="inherit";
    $depict_widgeter = get_option ( 'depict_widgeter', 'depict_full' );
        if( $depict_widgeter == "") $depict_widgeter="depict_full";
    global $content_width;
        if( $content_width == "" ) $content_width = 680;
	?>
<section>
    <div class="depict-page"
         style="font-family:<?php echo esc_attr( $depict_font ); ?>;
                max-width:<?php echo esc_attr( $content_width ); ?>px">
        <header>
        <h4><?php echo esc_html( get_the_author_meta( 'first_name' ) ); ?>
                <span class="sepspace"> </span>
                <?php echo esc_attr(nl2br( get_the_author_meta( 'last_name' ))); ?></h4>
            <div class="depict-gravatar">
                <?php echo get_avatar( get_the_author_meta('email') , 90 ); ?>
            </div>
        </header>

        <div class="depict_fullwidth">
            <ul class="depict-group">
                <?php $descript = get_the_author_meta( 'description' );
                    if( $descript == "") { $class="depict-hidden"; }
                    else { $class = "depict-group-item"; } ?>
                <li class="<?php echo esc_attr( $class ); ?> depict-noellip">
                    <?php the_author_meta('description'); ?>
                </li>

                <li class="depict-group-item"><b><?php the_author_posts(); ?></b>
                    <?php esc_html_e( 'Articles by ', 'appeal' ); ?>
                    <?php the_author(); ?>
                </li>

                <li class="depict-group-item">
                    <?php esc_html_e( 'Author Website ', 'depict' ); ?><br>
                    <a href="<?php echo esc_url( the_author_meta( 'user_url' )); ?>"
                       title="<?php echo esc_attr( the_author_meta( 'user_url' )); ?>"
                       target="_blank"><?php echo esc_html(
                       the_author_meta('user_url')); ?></a>
                </li>

                <li class="depict-group-item">
                    <?php echo esc_url( the_author_meta( 'email' )); ?>
                </li>

                    <?php $gclass = depict_list_class( 'gender' ); ?>
                <li class="<?php echo esc_attr( $gclass ); ?>">
                    Gender: <?php echo esc_html( depict_display_friendly_gender() ); ?>
                </li>

                    <?php $fbclass = depict_list_class( 'facebook_profile' ); ?>
                <li class="<?php echo esc_attr( $fbclass ); ?>">
                    <span><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) )
                                . 'assets/img-fa-facebook.png'; ?>" alt="facebook"
                         height="30" /></span> <a href="<?php echo esc_url(
                         get_the_author_meta( 'facebook_profile' )); ?>"
                         title="<?php echo esc_attr(
                         get_the_author_meta( 'facebook_profile' )); ?>" target="_blank">
                         <?php echo esc_url(
                         get_the_author_meta( 'facebook_profile' )); ?></a>
                </li>
                    <?php $liclass = depict_list_class( 'linkedin_profile' ); ?>
                <li class="<?php echo esc_attr( $liclass ); ?>">
                    <span><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) )
                                . 'assets/img-fa-linkedin.png'; ?>" alt="linkedin"
                         height="30" /></span> <a href="<?php echo esc_url(
                         get_the_author_meta( 'linkedin_profile' )); ?>"
                         title="<?php echo esc_attr(
                         get_the_author_meta( 'linkedin_profile' )); ?>" target="_blank">
                         <?php echo esc_url(
                         get_the_author_meta( 'linkedin_profile' )); ?></a>
                </li>
                    <?php $gpclass = depict_list_class( 'google_profile' ); ?>
                <li class="<?php echo esc_attr( $gpclass ); ?>">
                    <span><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) )
                                . 'assets/img-fa-google-plus.png'; ?>" alt="linkedin"
                         height="30" /></span> <a href="<?php echo esc_url(
                         get_the_author_meta( 'google_profile' )); ?>"
                         title="<?php echo esc_attr(
                         get_the_author_meta( 'google_profile' )); ?>" target="_blank">
                         <?php echo esc_url(
                         get_the_author_meta( 'google_profile' )); ?></a>
                </li>
                    <?php $twclass = depict_list_class( 'twitter_profile' ); ?>
                <li class="<?php echo esc_attr( $twclass ); ?>">
                    <span><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) )
                                . 'assets/img-fa-twitter.png'; ?>" alt="facebook"
                         height="30" /></span> <a href="<?php echo esc_url(
                         get_the_author_meta( 'twitter_profile' )); ?>"
                         title="<?php echo esc_attr(
                         get_the_author_meta( 'twitter_profile' )); ?>" target="_blank">
                         <?php echo esc_url(
                         get_the_author_meta( 'twitter_profile' )); ?></a>

                </li>
            </ul>
        </div>
                <div class="depict-author-footer">
                    <h3><?php esc_html_e( 'Articles by: ', 'depict' ); ?>
                    <?php the_author_posts_link(); ?></h3>
                </div>
    </div></section><div style="clear:both;display: table"></div>

<?php
}
add_shortcode( 'depict-show-author-page', 'depict_render_author_page' );

?>