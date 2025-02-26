<?php
/**
 * Register widget with WordPress.
 */
class Depict_Widget extends WP_Widget {

function __construct() {
    parent::__construct(
    // Base ID of widget
    'Depict_Widget',

    // Widget name will appear in UI
    __( 'Depict Bio Sidebar', 'depict' ), // Name
	array(
        'description' => __( 'Adds Widget for Depict Plugin',
                            'depict' ),
        ));
}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
			if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];



	// Set some defaults for option values.
    $depict_width = get_option ( 'depict_width', '300' );
        if( $depict_width == "") $depict_width="300";
    $depict_font = get_option ( 'depict_font', 'inherit' );
        if( $depict_font == "") $depict_font="inherit";
    $depict_widgeter = get_option ( 'depict_widgeter', 'depict_full' );
        if( $depict_widgeter == "") $depict_widgeter="depict_full";

	?>

    <div class="depict-widget"
         style="font-family:<?php echo esc_attr( $depict_font ); ?>;
                max-width:<?php echo esc_attr( $depict_width ); ?>px">
        <header>
        <h4><?php echo esc_html( get_the_author_meta( 'first_name' ) ); ?>
                <span class="sepspace"> </span>
                <?php echo esc_attr(nl2br( get_the_author_meta( 'last_name' ))); ?></h4>
            <div class="depict-gravatar">
                <?php echo get_avatar( get_the_author_meta('email') , 90 ); ?>
            </div>
        </header>

        <div class="<?php echo esc_attr( $depict_widgeter ); ?>">
            <ul class="depict-group">
                <?php $descript = get_the_author_meta( 'description' );
                    if( $descript == "") { $class="depict-hidden"; }
                    else { $class = "depict-group-item"; } ?>
                <li class="<?php echo esc_attr( $class ); ?> depict-noellip">
                    <?php the_author_meta('description'); ?>
                </li>

                <li class="depict-group-item"><b><?php the_author_posts(); ?></b>
                    <?php _e( 'Articles by ', 'appeal' ); ?> <?php the_author(); ?>
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
                    <?php
                    $usespage   = get_option( 'depict_usespage', 'no' );
                    $authorpage = get_option( 'depict_authorpage', '' );
                    $nicename   = get_the_author_meta( 'nicename' );
                    $depict_widgeter = get_option ( 'depict_widgeter', 'depict_full' );
                    if( $usespage == 'yes' ) {
                        esc_html_e( 'Author page: ', 'depict' ); ?>
                        <a href="<?php echo esc_url( $authorpage ); ?>"
                           title="<?php echo esc_attr( $nicename ); ?>">
                           <?php echo esc_html( $nicename ); ?></a>

                        <?php } // usepage and full page
                        elseif( $usespage == 'yes'
                            && $depict_widgeter == 'depict_full' )  {
                            esc_html_e( 'Author page: ', 'depict' ); ?>
                            <a href="<?php echo esc_url( $authorpage ); ?>"
                            title="<?php echo esc_attr( $nicename ); ?>">
                            <?php echo esc_html( $nicename ); ?></a>

                        <?php } // use of page override by link only
                        elseif( $usespage == 'yes'
                            && $depict_widgeter == 'depict_link' ) { ?>
                            <?php esc_html_e( 'Articles by: ', 'depict' ); ?>
                            <?php the_author_posts_link(); ?>

                        <?php } // do not use full page
                        elseif ( $usespage == 'no') { ?>
                            <?php esc_html_e( 'Articles by: ', 'depict' ); ?>
                            <?php the_author_posts_link(); ?>

                        <?php } // use author link only
                        else { esc_html_e( 'Articles by: ', 'depict' ); ?>
                            <?php the_author_posts_link(); ?>
                    <?php } ?>
                </div>

    </div>
<?php
	// return after widget parts
echo $args['after_widget'];
}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'depict' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'depict' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}
} // Ends class Depict_Widget

// Register and load the widget
	function depict_load_widget() {
		register_widget( 'depict_widget' );
}

add_action( 'widgets_init', 'depict_load_widget' );
?>