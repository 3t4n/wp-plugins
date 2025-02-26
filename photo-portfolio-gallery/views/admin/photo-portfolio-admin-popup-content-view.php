<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<div id="web_pace_portfolio" style="display:none;" class="post-content">
    <div class="portfolio_insert_shortcode_popup">
	<h3>Select Web Pace Portfolio to insert into post</h3>
	<?php
	global $wpdb;
	$query        = "SELECT * FROM " . $wpdb->prefix . "web_paceportfolio_portfolios";
	$firstrow     = $wpdb->get_row( $query );
	$container_id = 'web_pace_portfolio';
	if ( isset( $_POST["webpace_portfolio_id"] ) ) {
		$id = absint( $_POST["webpace_portfolio_id"] );
	} else {
		$id = $firstrow->id;
	}
	$query                        = "SELECT * FROM " . $wpdb->prefix . "web_paceportfolio_portfolios order by id ASC";
	$shortcodeportfolios          = $wpdb->get_results( $query );
	$query                        = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "web_paceportfolio_portfolios WHERE id= %d", $id );
	$row                          = $wpdb->get_row( $query );
	$shortecode_change_view_nonce = wp_create_nonce( 'shortecode_change_view_nonce' );

	if ( count( $shortcodeportfolios ) ) {
		echo "<select id='web_pace_portfolio-select' class='select_portfolio_list'   name='webpace_portfolio_id' change-view-nonce='" . $shortecode_change_view_nonce . "'>";
		foreach ( $shortcodeportfolios as $shortcodeportfolio ) {
			echo "<option value='" . $shortcodeportfolio->id . "'>" . $shortcodeportfolio->name . "</option>";
		}
		echo "</select>";
		echo "<button class='insert_shortcode_button' id='webpaceportfolioinsert'>".__('Insert portfolio','photo-portfolio')."</button>";
	} else {
		echo "No slideshows found";
	}
	?>
	<!--------------------------------Option's HTML-------------------------------->
    <div class="options_wrapper">
        <h3><?php _e('Current Portfolio Options','photo-portfolio'); ?></h3>
        <ul id="portfolio-unique-options-list">
            <li style="display:none;">
                <label for="sl_width"><?php echo __( 'The requested action is not valid.', 'photo-portfolio' ); ?></label>
                <input type="text" name="sl_width" id="sl_width" value="1111" class="text_area"/>
            </li>
            <li style="display:none;">
                <label for="sl_height"><?php echo __( 'Height', 'photo-portfolio' ); ?></label>
                <input type="text" name="sl_height" id="sl_height" value="<?php echo esc_attr( $row->sl_height ); ?>"
                       class="text_area"/>
            </li>
            <li>
                <label for="portfolio_effects_list"><?php echo __( 'Select The View', 'photo-portfolio' ); ?></label>
                <select name="portfolio_effects_list" id="portfolio_effects_list">
                    <option <?php if ( $row->portfolio_list_effects_s == '0' ) {
                        echo 'selected';
                    } ?> value="0"><?php echo __( 'Content Toggle', 'photo-portfolio' ); ?></option>
                    <option <?php if ( $row->portfolio_list_effects_s == '1' ) {
                        echo 'selected';
                    } ?> value="1"><?php echo __( 'Content Full Height', 'photo-portfolio' ); ?></option>
                    <option <?php if ( $row->portfolio_list_effects_s == '2' ) {
                        echo 'selected';
                    } ?> value="2"><?php echo __( 'Content Block', 'photo-portfolio' ); ?></option>
                    <option <?php if ( $row->portfolio_list_effects_s == '3' ) {
                        echo 'selected';
                    } ?> value="3"><?php echo __( 'Content Full Width', 'photo-portfolio' ); ?></option>
                    <option <?php if ( $row->portfolio_list_effects_s == '4' ) {
                        echo 'selected';
                    } ?> value="4"><?php echo __( 'Text Block', 'photo-portfolio' ); ?></option>
                    <option <?php if ( $row->portfolio_list_effects_s == '5' ) {
                        echo 'selected';
                    } ?> value="5"><?php echo __( 'Slider', 'photo-portfolio' ); ?></option>
                    <option <?php if ( $row->portfolio_list_effects_s == '6' ) {
                        echo 'selected';
                    } ?> value="6"><?php echo __( 'Lightbox Popup', 'photo-portfolio' ); ?></option>
                    <option <?php if ( $row->portfolio_list_effects_s == '7' ) {
                        echo 'selected';
                    } ?> value="7"><?php echo __( 'Elastic Grid', 'photo-portfolio' ); ?></option>
                </select>
            </li>
            <li class="allowIsotope">
                <label for="ht_show_sorting"><?php echo __( 'Show Sorting Buttons', 'photo-portfolio' ); ?></label>
                <input type="checkbox" id="ht_show_sorting" <?php if ( $row->ht_show_sorting == 'on' ) {
                    echo 'checked="checked"';
                } ?> name="ht_show_sorting" value="<?php echo $row->ht_show_sorting; ?>"/>
            </li>
            <li style="display:none;" class="for-content-slider">
                <label for="sl_pausetime"><?php echo __( 'Pause time', 'photo-portfolio' ); ?></label>
                <input type="text" name="sl_pausetime" id="sl_pausetime"
                       value="<?php echo esc_attr( $row->description ); ?>"
                       class="text_area"/>
            </li>
            <li style="display:none;" class="for-content-slider">
                <label for="sl_changespeed"><?php echo __( 'Change speed', 'photo-portfolio' ); ?></label>
                <input type="text" name="sl_changespeed" id="sl_changespeed" value="<?php echo esc_attr( $row->param ); ?>"
                       class="text_area"/>
            <li style="display:none;margin-top:10px" class="for-content-slider">
                <label for="auto_slide_on"><?php echo __( 'Autoslide ', 'photo-portfolio' ); ?></label>
                <input type="checkbox" name="pause_on_hover" value="<?php echo esc_attr( $row->pause_on_hover ); ?>"
                       id="auto_slide_on" <?php if ( $row->pause_on_hover == 'on' ) {
                    echo 'checked="checked"';
                } ?> />
            </li>
        </ul>
    </div>
	<!--------------------------------------------------------------------------------->
    </div>
</div>
<style>
    .portfolio_insert_shortcode_popup .select_portfolio_list {
        padding: 2px;
        line-height: 28px;
        height: 28px;
        min-width: 150px;
        margin-right:10px;
        border: 0px;
        outline: none;
        box-shadow: 0px 1px 5px #ccc;
    }

    .portfolio_insert_shortcode_popup .insert_shortcode_button {
        border: 0px;
        background: #0073aa;
        color: #fff;
        border-radius: 2px;
        padding: 5px 18px;
        font-size: 15px;
        position: relative;
        top: 3px;
    }

    .options_wrapper {
        padding-top:20px;
    }
</style>