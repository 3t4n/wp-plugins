<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $appts_pricing;
if ( isset( $row_index ) ) {
    $row_index = $row_index;
} else {
    $row_index = APPTS_Class:: generateRandomIndex();
}
if ( isset( $_POST[ '_column_index' ] ) ) {
    $column_index = $_POST[ '_column_index' ];
}
?>
<!-- row <?php echo $row_index; ?> -->
<div class="appts-col-box appts-footer-col-box">
    <div class="appts-inner-tab-header-title"><?php _e( 'Row', 'ap-pricing-tables-lite' ); ?></div>
    <div class='appts-row-options'>
        <a href='javascript:void(0);' class='appts-delete-row' title='Delete' data-action='delete-footer-row' data-confirm='Are you sure you want to delete this row?'><?php _e( 'Delete', 'ap-pricing-tables-lite' ); ?></a>
        <a href='javascript:void(0);' class='appts-copy-row' title='Copy' data-action='copy-footer-row' data-confirm='Are you sure you want to copy this row?'><?php _e( 'Copy', 'ap-pricing-tables-lite' ); ?></a>
    </div>
    <div class="appts-inner-tab-content" style="display:none;">
        <div class='appts-input-wrap'>
            <label><?php _e( 'Row Type', 'ap-pricing-tables-lite' ); ?></label>
            <div class="appts-info-wrap">
                <select name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][type]" class='appts-row-option'>
                    <option data-select='appts-html' value="html"		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'type' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'type' ] == 'html' ) { ?> selected="selected" <?php } ?>><?php _e( 'HTML Content', 'ap-pricing-tables-lite' ); ?></option>
                    <option data-select='appts-button' value="button"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'type' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'type' ] == 'button' ) { ?> selected="selected" <?php } ?>><?php _e( 'Button', 'ap-pricing-tables-lite' ); ?></option>
                </select>
                <div class="appts-info"><?php _e( 'Row Type (HTML Content or Button).', 'ap-pricing-tables-lite' ); ?></div>
            </div>
        </div>

        <!-- HTML Settings -->
        <div class='appts-select-common-div appts-html' <?php if ( ! isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'type' ] ) ) { ?> style='display:block' <?php } ?><?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'type' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'type' ] == 'html' ) { ?> style='display:block;' <?php } else { ?> style='display:none;' <?php } ?> >
            <!-- HTML Content -->
            <div class="appts-content-settings">
                <div class="appts-input-wrap appts-input-field-block">
                    <label><?php _e( 'Content', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-input-field-wrapper appts-input-button appts-textarea-code">
                        <textarea name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][html][content][content]" id='appts-<?php echo self:: generateRandomString(); ?>' class='appts-insert-icons'><?php
                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'content' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'content' ] != '' ) {
                                echo esc_textarea( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'content' ] );
                            }
                            ?></textarea>
                        <div class="appts-textarea-btn-top">
                            <a href="javascript:void(0);" data-popup="font-icons" title="<?php _e( 'Insert Font Icons', 'ap-pricing-tables-lite' ); ?>" class="appts-ajax-font-icons"><?php _e( 'Insert Font Icons', 'ap-pricing-tables-lite' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HTML Content ends -->

            <!-- HTML Content styles -->
            <div class='appts-style-settings'>
                <span class='appts-inline-title'><?php _e( 'Content Style', 'ap-pricing-tables-lite' ); ?></span>
                <div class="appts-input-wrap">
                    <label><?php _e( 'Font Family', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <select name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][html][content][style][font-family]">
                            <option value=''><?php _e( 'Default / Inherit', 'ap-pricing-tables-lite' ); ?></option>
                            <?php
                            foreach ( $appts_pricing[ 'google-fonts' ] as $key => $value ) :
                                ?>
                                <option value="<?php echo $key; ?>" <?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] ) ) {
                                    selected( $key, $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] );
                                }
                                ?> ><?php echo $key; ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                        </select>
                    </div>
                </div>
                <div class='appts-input-wrap appts-input-manage'>
                    <label><?php _e( 'Font Size (px)', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap appts-table-row appts-input-manage">
                        <input type="text" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][html][content][style][font-size]" value="<?php
                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-size' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-size' ] != '' ) {
                            echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-size' ] );
                        }
                        ?>">
                        <div class="appts-font-properties">
                            <a href="javascript:void(0);" title="<?php _e( 'Bold', 'ap-pricing-tables-lite' ); ?>" 			data-action="font-style-bold"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) { ?> class="appts-active" <?php } ?> >					<i class="fa fa-bold"></i>			<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][html][content][style][font-style][bold]" 			value="<?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) {
                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'bold' ];
                                }
                                ?>"></a>
                            <a href="javascript:void(0);" title="<?php _e( 'Italic', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-italic"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) { ?> class="appts-active" <?php } ?> >				<i class="fa fa-italic"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][html][content][style][font-style][italic]" 			value="<?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) {
                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'italic' ];
                                }
                                ?>"></a>
                            <a href="javascript:void(0);" title="<?php _e( 'Strikethrough', 'ap-pricing-tables-lite' ); ?>" 	data-action="font-style-strikethrough"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) { ?> class="appts-active" <?php } ?> >	<i class="fa fa-strikethrough"></i>	<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][html][content][style][font-style][strikethrough]" 	value="<?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) {
                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ];
                                }
                                ?>"></a>
                            <a href="javascript:void(0);" title="<?php _e( 'Underline', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-underline"		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) { ?> class="appts-active" <?php } ?> >			<i class="fa fa-underline"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][html][content][style][font-style][underline]" 		value="<?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) {
                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'underline' ];
                                }
                                ?>"></a>
                        </div>

                    </div>
                </div>
                <div class="appts-input-wrap">
                    <label><?php _e( 'Text Color', 'ap-pricing-tables-lite' ); ?></label>
                    <div class='appts-info-wrap'>
                        <input type="text" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][html][content][style][text-color]" class='appts-default-colorpicker' data-alpha="true" value="<?php
                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'text-color' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'text-color' ] != '' ) {
                            echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'html' ][ 'content' ][ 'style' ][ 'text-color' ] );
                        }
                        ?>">
                    </div>
                </div>
            </div>
            <!-- HTML Content styles ends -->
        </div>
        <!-- HTML settings ends -->

        <!-- button settings -->
        <div class='appts-select-common-div appts-button' <?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'type' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'type' ] == 'button' ) { ?> style='display:block;' <?php } else { ?> style='display:none;' <?php } ?>>
            <!-- Button Content -->
            <div class='appts-content-settings'>
                <div class="appts-input-wrap">
                    <label><?php _e( 'Text', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-textarea-code">
                        <input type='text' name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][button][text]" value="<?php
                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'text' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'text' ] != '' ) {
                            echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'text' ] );
                        }
                        ?>" />
                    </div>
                </div>
                <div class="appts-input-wrap">
                    <label><?php _e( 'Link', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <input type='url' name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][button][link]" value="<?php
                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'link' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'link' ] != '' ) {
                            echo esc_url( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'link' ] );
                        }
                        ?>" />
                    </div>
                </div>
                <div class="appts-input-wrap">
                    <label><?php _e( 'Open In New Window?', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <input type="checkbox" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][button][target]" value="1" <?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'target' ] ) ) { ?> checked="checked" <?php } ?> />
                        <div class="appts-info"><?php _e( 'Check this option if you want to open the link in a new window.', 'ap-pricing-tables-lite' ); ?></div>
                    </div>
                </div>
            </div>
            <!-- Button Content ends -->

            <!-- Button styles -->
            <div class='appts-style-settings'>
                <span class='appts-inline-title'><?php _e( 'Style settings', 'ap-pricing-tables-lite' ); ?></span>
                <div class="appts-input-wrap appts-table-row">
                    <label><?php _e( 'Font Family', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <select name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][button][style][font-family]">
                            <option value=''><?php _e( 'Default / Inherit', 'ap-pricing-tables-lite' ); ?></option>
                            <?php
                            foreach ( $appts_pricing[ 'google-fonts' ] as $key => $value ) :
                                ?>
                                <option value="<?php echo $key; ?>" <?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-family' ] ) ) {
                                    selected( $key, $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-family' ] );
                                }
                                ?> ><?php echo $key; ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                        </select>
                    </div>
                </div>
                <div class="appts-input-wrap appts-table-row appts-input-manage">
                    <label><?php _e( 'Font Size (px)', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap appts-table-row appts-input-manage">
                        <input type="text" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][button][style][font-size]" value="<?php
                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-size' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-size' ] != '' ) {
                            echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-size' ] );
                        }
                        ?>" class="appts-input-mid">
                        <div class="appts-font-properties">
                            <a href="javascript:void(0);" title="<?php _e( 'Bold', 'ap-pricing-tables-lite' ); ?>" 			data-action="font-style-bold"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) { ?> class="appts-active" <?php } ?> >						<i class="fa fa-bold"></i>			<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][button][style][font-style][bold]" 			value="<?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) {
                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'bold' ];
                                }
                                ?>"></a>
                            <a href="javascript:void(0);" title="<?php _e( 'Italic', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-italic"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) { ?> class="appts-active" <?php } ?> >					<i class="fa fa-italic"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][button][style][font-style][italic]" 			value="<?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) {
                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'italic' ];
                                }
                                ?>"></a>
                            <a href="javascript:void(0);" title="<?php _e( 'Strikethrough', 'ap-pricing-tables-lite' ); ?>" 	data-action="font-style-strikethrough"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) { ?> class="appts-active" <?php } ?> >	<i class="fa fa-strikethrough"></i>	<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][button][style][font-style][strikethrough]" 	value="<?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) {
                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'strikethrough' ];
                                }
                                ?>"></a>
                            <a href="javascript:void(0);" title="<?php _e( 'Underline', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-underline"		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) { ?> class="appts-active" <?php } ?> >			<i class="fa fa-underline"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][footer][<?php echo $row_index; ?>][button][style][font-style][underline]" 		value="<?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     echo $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ][ $row_index ][ 'button' ][ 'style' ][ 'font-style' ][ 'underline' ];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button style ends-->
        </div>
        <!-- button settings ends -->
    </div>
</div>
<!-- Row <?php echo $row_count; ?> ends -->