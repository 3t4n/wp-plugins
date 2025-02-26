<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Advent_Calendar
 * @author    Paul Vincent Beigang <pbeigang@gmail.com>
 * @license   GPL-2.0+
 * @link      http://paul-beigang.de
 * @copyright 2013 Paul Vincent Beigang
 */
?>

<form method="post">
	<input type="hidden" name="action" value="create">
	<label for=""><?php esc_html_e( 'Add 24 entries for calendar year ', $this->plugin_slug ); ?></label>
	<input type="text" name="year" value="<?php echo esc_attr( date( 'Y' ) ); ?>" class="small-text">
	<input type="submit" value="<?php esc_html_e( 'Create', $this->plugin_slug ); ?>" class="button-primary">
</form>
