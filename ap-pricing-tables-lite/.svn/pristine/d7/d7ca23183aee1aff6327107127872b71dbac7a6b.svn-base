<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
if ( ! isset( $column_index ) ) {
    $column_index = APPTS_Class:: generateRandomIndex();
}
?>
<div class="appts-column-wrapper">
    <div class="appts-column-content">
        <!-- Column assets editor -->
        <div class="appts-column-assets-wrapper">
            <div class="appts-column-assets-options">
                <div class='appts-column-copy-delete'>
                    <a href="javascript:void(0);" title="Delete" class="appts-delete-column" data-action="delete-column" data-confirm="<?php _e( 'Are you sure you want to delete this column?', 'ap-pricing-tables-lite' ); ?>" ><span><?php _e( 'Delete', 'ap-pricing-tables-lite' ); ?></span></a>
                    <a href="javascript:void(0);" title="Copy" class="appts-copy-column" data-action="copy-column" data-confirm="<?php _e( 'Are you sure you want to copy this column?', 'ap-pricing-tables-lite' ); ?>" ><span><?php _e( 'Copy', 'ap-pricing-tables-lite' ); ?></span></a>
                </div>
                <div class='appts-column-count'><?php _e( 'Column ' . esc_attr( $count ), 'ap-pricing-tables-lite' ); ?></div>
            </div>
        </div>
        <!-- Column assets editor ends -->

        <div class="appts-wrap-all-column">
            <!-- General Settings -->
            <div class="appts-settings-wrapper appts-settings-wrapper-general">
                <div class="appts-column-header">
                    <div class="appts-column-title"><?php _e( 'General Settings', 'ap-pricing-tables-lite' ); ?></div>
                    <div class="appts-column-hide-show"></div>
                </div>
                <div class="appts-column-content-wrapper">
                    <div class="appts-column-content" style="display: none;">
                        <!-- Hightlight & hover settings -->
                        <div class="appts-col-box">
                            <div class="appts-inner-tab-header-title"><?php _e( 'Hightlight/Hover', 'ap-pricing-tables-lite' ); ?></div>
                            <div class="appts-inner-tab-content" style='display:none;'>
                                <div class='appts-input-wrap'>
                                    <label><?php _e( 'Highlight Column?', 'ap-pricing-tables-lite' ); ?></label>
                                    <div class='appts-info-wrap'>
                                        <input type="checkbox" name="appts-col-data[<?php echo $column_index; ?>][general][highlight-hover-settings][highlight]" value="1" <?php
                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'highlight-hover-settings' ][ 'highlight' ] ) ) {
                                            checked( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'highlight-hover-settings' ][ 'highlight' ], 1 );
                                        }
                                        ?> />
                                    </div>
                                </div>
                                <div class='appts-input-wrap'>
                                    <label><?php _e( 'Disable Hover?', 'ap-pricing-tables-lite' ); ?></label>
                                    <div class='appts-info-wrap'>
                                        <input type="checkbox" name="appts-col-data[<?php echo $column_index; ?>][general][highlight-hover-settings][disable-hover]" value="1" <?php
                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'highlight-hover-settings' ][ 'disable-hover' ] ) ) {
                                            checked( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'highlight-hover-settings' ][ 'disable-hover' ], 1 );
                                        }
                                        ?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Highlight & hover settings ends -->

                        <!-- Ribbon Settings -->
                        <div class="appts-col-box">
                            <div class="appts-inner-tab-header-title"><?php _e( 'Ribbon Settings', 'ap-pricing-tables-lite' ); ?></div>
                            <div class="appts-inner-tab-content" style="display:none;">
                                <div class='appts-input-wrap appts-input-settings-wrap'>
                                    <label><?php _e( 'Ribbon type', 'ap-pricing-tables-lite' ); ?></label>
                                    <div class="appts-info-wrap">
                                        <select name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][type]" class="appts-ribbon-settings">
                                            <option value='' 			data-select='appts--sign'			<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'type' ] ) ) {
                                                selected( '', $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'type' ] );
                                            }
                                            ?> ><?php _e( 'None', 'ap-pricing-tables-lite' ); ?></option>
                                            <option value='text' 		data-select='appts-text-sign'		<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'type' ] ) ) {
                                                selected( 'text', $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'type' ] );
                                            }
                                            ?> ><?php _e( 'Text', 'ap-pricing-tables-lite' ); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <!-- text settings options -->
                                <div class="appts-select-common-div appts-text-sign" <?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'type' ] ) ) {
                                    if ( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'type' ] == 'text' ) {
                                        ?> style='display:block;' <?php } else { ?> style='display:none;' <?php
                                         }
                                     } else {
                                         ?> style='display:none;' <?php } ?> >
                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Template', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class='appts-info-wrap'>
                                            <?php $shadow_img_src = APPTS_IMAGE_DIR . '/text-signs-templates' . '/template-1.png'; ?>
                                            <div class="appts-input-btn">
                                                <select name='appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][template]' class='appts-img-selector'>
                                                    <option data-src="<?php echo APPTS_IMAGE_DIR . '/text-signs-templates' . '/template-1.png'; ?>" value='appts-ribbon-1' <?php
                                                    if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'template' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'template' ] == 'appts-ribbon-1' ) {
                                                        echo "selected='selected';";
                                                        $shadow_img_src = APPTS_IMAGE_DIR . '/text-signs-templates' . '/template-1.png';
                                                    }
                                                    ?>><?php _e( 'Template 1', 'ap-pricing-tables-lite' ); ?></option>
                                                    <option data-src="<?php echo APPTS_IMAGE_DIR . '/text-signs-templates' . '/template-2.png'; ?>" value='appts-ribbon-2' <?php
                                                    if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'template' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'template' ] == 'appts-ribbon-2' ) {
                                                        echo "selected='selected';";
                                                        $shadow_img_src = APPTS_IMAGE_DIR . '/text-signs-templates' . '/template-2.png';
                                                    }
                                                    ?>><?php _e( 'Template 2', 'ap-pricing-tables-lite' ); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="appts-img-selector-media">
                                            <?php if ( ! empty( $shadow_img_src ) ) { ?>
                                                <img src="<?php echo esc_attr( $shadow_img_src ); ?>">
                                            <?php } else { ?>
                                                <img src="" />
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Text', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class='appts-info-wrap'>
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][content]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'content' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'content' ] != '' ) {
                                                echo esc_html( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'content' ] );
                                            }
                                            ?>">
                                            <div class="appts-info"><?php _e( 'Please Enter the text of the ribbon.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Font Family', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap">
                                            <select name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][font-family]">
                                                <option value=''><?php _e( 'Default / Inherit', 'ap-pricing-tables-lite' ); ?></option>
                                                <?php
                                                foreach ( $appts_pricing[ 'google-fonts' ] as $key => $value ) :
                                                    ?>
                                                    <option value="<?php echo $key; ?>" <?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-family' ] ) ) selected( $key, $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-family' ] ); ?> ><?php echo $key; ?></option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                            <div class="appts-info"><?php _e( 'Font family of the ribbon text.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap appts-table-row appts-input-manage">
                                        <label><?php _e( 'Font Size (px)', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap">
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][font-size]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-size' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-size' ] != '' ) {
                                                echo $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-size' ];
                                            }
                                            ?>">
                                            <div class="appts-info"><?php _e( 'Font size of the ribbon text.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                        <div class="appts-font-properties">
                                            <a href="javascript:void(0);" title="<?php _e( 'Bold', 'ap-pricing-tables-lite' ); ?>" 			data-action="font-style-bold" 			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'bold' ] == '1' ) { ?> class='appts-active' <?php } ?> > 					<i class="fa fa-bold"></i>			<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][font-style][bold]" 			value="<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'bold' ] == '1' ) {
                                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'bold' ];
                                                }
                                                ?>"></a>
                                            <a href="javascript:void(0);" title="<?php _e( 'Italic', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-italic" 		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'italic' ] == '1' ) { ?> class='appts-active' <?php } ?>> 				<i class="fa fa-italic"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][font-style][italic]" 		value="<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'italic' ] == '1' ) {
                                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'italic' ];
                                                }
                                                ?>"></a>
                                            <a href="javascript:void(0);" title="<?php _e( 'Strikethrough', 'ap-pricing-tables-lite' ); ?>" 	data-action="font-style-strikethrough"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'strikethrough' ] == '1' ) { ?> class='appts-active' <?php } ?>>	<i class="fa fa-strikethrough"></i>	<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][font-style][strikethrough]" value="<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'strikethrough' ] == '1' ) {
                                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'strikethrough' ];
                                                }
                                                ?>"></a>
                                            <a href="javascript:void(0);" title="<?php _e( 'Underline', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-underline" 		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'underline' ] == '1' ) { ?> class='appts-active' <?php } ?>>			<i class="fa fa-underline"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][font-style][underline]" 	value="<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'underline' ] == '1' ) {
                                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'font-style' ][ 'underline' ];
                                                }
                                                ?>"></a>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Text Color', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class='appts-info-wrap'>
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][color]" class='appts-default-colorpicker' data-alpha="true" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'color' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'color' ] != '' ) {
                                                echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'color' ] );
                                            }
                                            ?>">
                                            <div class="appts-info"><?php _e( 'Text color of the ribbon.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Background Color', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap">
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][text][bg-color]" class='appts-default-colorpicker' data-alpha="true" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'bg-color' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'bg-color' ] != '' ) {
                                                echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'text' ][ 'bg-color' ] );
                                            }
                                            ?>">
                                            <div class="appts-info"><?php _e( 'Background color of the ribbon.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- text settings options ends -->

                                <!-- common settings -->
                                <div class='appts-text-image-sign' <?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'type' ] ) ) {
                                    if ( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'type' ] == 'text' || $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'type' ] == 'custom-img' ) {
                                        ?> style='display:block;' <?php } else { ?> style='display:none;' <?php
                                         }
                                     } else {
                                         ?> style='display:none;' <?php } ?> >
                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Alignment', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap">
                                            <select name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][common-settings][alignment]">
                                                <option value="left"	<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'alignment' ] ) ) {
                                                    selected( 'left', $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'alignment' ] );
                                                }
                                                ?> 	><?php _e( 'Left', 'ap-pricing-tables-lite' ); ?>	</option>
                                                <option value="right"	<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'alignment' ] ) ) {
                                                    selected( 'right', $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'alignment' ] );
                                                }
                                                ?> 	><?php _e( 'Right', 'ap-pricing-tables-lite' ); ?>	</option>
                                            </select>
                                            <div class="appts-info"><?php _e( 'Alignment of the ribbon.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap appts-table-row appts-input-manage">
                                        <label> <?php _e( '(Left or Right) & Top Position (px)', 'ap-pricing-tables-lite' ); ?> </label>
                                        <div class="appts-info-wrap">
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][common-settings][posx]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'posx' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'posx' ] != '' ) {
                                                echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'posx' ] );
                                            }
                                            ?>" >
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][common-settings][posy]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'posy' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'posy' ] != '' ) {
                                                echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'posy' ] );
                                            }
                                            ?>" >
                                            <div class="appts-info"><?php _e( 'Left or Right - depending on the alignment - & Top position of the ribbon.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Width (px)', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap">
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][common-settings][width]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'width' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'width' ] != '' ) {
                                                echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'width' ] );
                                            }
                                            ?>">
                                            <div class="appts-info"><?php _e( 'Width of the ribbon.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Link', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap">
                                            <input type="url" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][common-settings][url]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'url' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'url' ] != '' ) {
                                                echo esc_url( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'url' ] );
                                            }
                                            ?>">
                                            <div class="appts-info"><?php _e( "URL of the ribbon link.(url should start from http or https) Leave blank if you don't want sign to be linkable.", 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Open In New Window?', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class='appts-info-wrap'>
                                            <input type="checkbox" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][common-settings][target]" value="1" <?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'target' ] ) ) {
                                                echo "checked='checked'";
                                            }
                                            ?> />
                                            <div class="appts-info"><?php _e( 'Whether to open the link in a new window.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>

                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Nofollow Link?', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class='appts-info-wrap'>
                                            <input type="checkbox" name="appts-col-data[<?php echo $column_index; ?>][general][ribbon-settings][common-settings][nofollow]" value="1" <?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'ribbon-settings' ][ 'common-settings' ][ 'nofollow' ] ) ) {
                                                echo "checked='checked'";
                                            }
                                            ?>>
                                            <div class="appts-info"><?php _e( 'Please enable this if you want to add nofollow attiribute to link.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- common settings ends -->

                            </div>
                        </div>
                        <!-- Ribbon Settings ends -->

                        <!-- Shadow settings ends -->
                        <div class="appts-col-box appts-shadow-settings-option">
                            <div class="appts-inner-tab-header-title"><?php _e( 'Box Shadow Settings', 'ap-pricing-tables-lite' ); ?></div>
                            <div class="appts-inner-tab-content" style="display:none;">
                                <div class="appts-input-wrap appts-table-row">
                                    <label><?php _e( 'Shadow Type', 'ap-pricing-tables-lite' ); ?></label>
                                    <div class='appts-info-wrap'>
                                        <select name="appts-col-data[<?php echo $column_index; ?>][general][shadow-settings][type]" class="appts-img-selector">
                                            <?php $shadow_img_src = ''; ?>
                                            <option value='' data-src=''><?php _e( 'None', 'ap-pricing-tables-lite' ); ?></option>
                                            <?php for ( $i = 1; $i <= 2; $i ++ ) { ?>
                                                <option value='<?php echo "shadow$i"; ?>' data-src="<?php echo APPTS_IMAGE_DIR . "/shadows/shadow_$i.png"; ?>" <?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'shadow-settings' ][ 'type' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'general' ][ 'shadow-settings' ][ 'type' ] == "shadow$i" ) {
                                                    echo "selected='selected'";
                                                    $shadow_img_src = APPTS_IMAGE_DIR . "/shadows/shadow_$i.png";
                                                }
                                                ?> ><?php echo "Shadow $i"; ?></option>
                                                    <?php } ?>
                                        </select>
                                        <div class="appts-info"><?php _e( 'Bottom box shadow of the column.', 'ap-pricing-tables-lite' ); ?></div>
                                    </div>
                                    <div class="appts-img-selector-media">
                                        <?php if ( ! empty( $shadow_img_src ) ) { ?>
                                            <img src="<?php echo esc_url( $shadow_img_src ); ?>" />
                                        <?php } else { ?>
                                            <img src='' />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Shadow settings ends -->
                    </div>
                </div>
            </div>
            <!-- General Settings ends -->

            <!-- Header Settings -->
            <div class="appts-settings-wrapper appts-settings-wrapper-header">
                <div class="appts-column-header">
                    <div class="appts-column-title"><?php _e( 'Header Settings', 'ap-pricing-tables-lite' ); ?></div>
                    <div class="appts-column-hide-show"></div>
                </div>
                <div class="appts-column-content-wrapper">
                    <div class="appts-column-content" style="display:none;">
                        <!-- Featured Item settings -->
                        <div class="appts-col-box">
                            <div class="appts-inner-tab-header-title"><?php _e( 'Featured Item', 'ap-pricing-tables-lite' ); ?></div>
                            <div class="appts-inner-tab-content" style="display:none;">
                                <input type='hidden' name='appts-col-data[<?php echo $column_index; ?>][header][featured-item][type]' value='image' />
                                <div class="appts-input-wrap appts-table-row appts-featured-item-image-option">
                                    <label><?php _e( 'Featured image', 'ap-pricing-tables-lite' ); ?></label>
                                    <!-- image upload div -->
                                    <div class="appts-image-upload">
                                        <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][featured-item][image][url]" value="<?php
                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'featured-item' ][ 'image' ][ 'url' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'featured-item' ][ 'image' ][ 'url' ] != '' ) {
                                            echo esc_url( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'featured-item' ][ 'image' ][ 'url' ] );
                                        }
                                        ?>" />
                                        <input type='button' class="appts-common-image-upload" value="<?php _e( 'Upload', 'ap-pricing-tables-lite' ); ?>" />
                                        <div class="appts-image-selection-append"></div>
                                    </div>
                                    <!-- image upload div ends -->
                                </div>
                            </div>
                        </div>
                        <!-- Featured Item settings ends -->

                        <!-- Title & Subtitle Settings -->
                        <div class="appts-col-box">
                            <div class="appts-inner-tab-header-title"><?php _e( 'Title And Subtitle Settings', 'ap-pricing-tables-lite' ); ?></div>
                            <div class="appts-inner-tab-content" style="display:none;">
                                <div class="appts-input-wrap">
                                    <label><?php _e( 'Title', 'ap-pricing-tables-lite' ); ?></label>
                                    <div class="appts-info-wrap">
                                        <div class="appts-input-button">
                                            <input class='appts-insert-icons' type="text" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][title][content]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'content' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'content' ] != '' ) {
                                                echo ( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'content' ] );
                                            }
                                            ?>">
                                            <a href="javascript:void(0);" data-popup="font-icons" title="<?php _e( 'Add Font Icons', 'ap-pricing-tables-lite' ); ?>" class='appts-ajax-font-icons'><?php _e( 'Add font icons', 'ap-pricing-tables-lite' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="appts-input-wrap">
                                    <label><?php _e( 'Subtitle', 'ap-pricing-tables-lite' ); ?></label>
                                    <div class="appts-info-wrap">
                                        <div class="appts-input-button">
                                            <input class='appts-insert-icons' type="text" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][subtitle][content]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'content' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'content' ] != '' ) {
                                                echo ( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'content' ] );
                                            }
                                            ?>">
                                            <a href="javascript:void(0);" data-popup="font-icons" title="<?php _e( 'Add Font Icons', 'ap-pricing-tables-lite' ); ?>" class='appts-ajax-font-icons'><?php _e( 'Add font icons', 'ap-pricing-tables-lite' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class='appts-style-settings'>
                                    <div class="appts-style-settings">
                                        <span class='appts-inline-title'><?php _e( 'Title Style', 'ap-pricing-tables-lite' ); ?></span>
                                        <div class='appts-input-wrap'>
                                            <label><?php _e( 'Font Family', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <select name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][title][style][font-family]">
                                                    <option value=''><?php _e( 'Default / Inherit', 'ap-pricing-tables-lite' ); ?></option>
                                                    <?php
                                                    foreach ( $appts_pricing[ 'google-fonts' ] as $key => $value ) :
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-family' ] ) ) {
                                                            selected( $key, $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-family' ] );
                                                        }
                                                        ?> ><?php echo $key; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='appts-input-wrap'>
                                            <label><?php _e( 'Font Color', 'ap-pricing-tables-lite' ); ?></label>
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][title][style][font-color]" class='appts-default-colorpicker' data-alpha="true" value="<?php echo esc_attr( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-color' ] ) ? $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-color' ] : ''  ); ?>">
                                            <div class="appts-info"><?php _e( 'Main color of the pricing table.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                        <div class="appts-input-wrap appts-table-row appts-input-manage">
                                            <label><?php _e( 'Font Size', 'ap-pricing-tables-lite' ); ?> (px)</label>
                                            <div class="appts-info-wrap">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][title][style][font-size]" value="<?php echo isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-size' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-size' ] != '' ? esc_attr( ( int ) $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-size' ] ) : ''; ?>">
                                                <div class="appts-font-properties">
                                                    <a href="javascript:void(0);" title="<?php _e( 'Bold', 'ap-pricing-tables-lite' ); ?>" 			data-action="font-style-bold"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) { ?> class="appts-active" <?php } ?> >						<i class="fa fa-bold"></i>			<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][title][style][font-style][bold]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'bold' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Italic', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-italic"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) { ?> class="appts-active" <?php } ?> >					<i class="fa fa-italic"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][title][style][font-style][italic]" 		value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'italic' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Strikethrough', 'ap-pricing-tables-lite' ); ?>" 	data-action="font-style-strikethrough"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) { ?> class="appts-active" <?php } ?> >	<i class="fa fa-strikethrough"></i>	<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][title][style][font-style][strikethrough]" 	value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'strikethrough' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Underline', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-underline"		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) { ?> class="appts-active" <?php } ?> >			<i class="fa fa-underline"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][title][style][font-style][underline]" 		value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'title' ][ 'style' ][ 'font-style' ][ 'underline' ];
                                                        }
                                                        ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="appts-style-settings">
                                        <span class='appts-inline-title'><?php _e( 'Subtitle Style', 'ap-pricing-tables-lite' ); ?></span>
                                        <div class="appts-input-wrap">
                                            <label><?php _e( 'Font Family', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <select name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][subtitle][style][font-family]">
                                                    <option value=''><?php _e( 'Default / Inherit', 'ap-pricing-tables-lite' ); ?></option>
                                                    <?php
                                                    foreach ( $appts_pricing[ 'google-fonts' ] as $key => $value ) :
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-family' ] ) ) {
                                                            selected( $key, $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-family' ] );
                                                        }
                                                        ?> ><?php echo $key; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='appts-input-wrap'>
                                            <label><?php _e( 'Font Color', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][subtitle][style][font-color]" class='appts-default-colorpicker' data-alpha="true" value="<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-color' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-color' ] != '' ) {
                                                    echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-color' ] );
                                                }
                                                ?>" />
                                            </div>
                                        </div>
                                        <div class="appts-input-wrap appts-table-row appts-input-manage">
                                            <label><?php _e( 'Font Size (px)', 'ap-pricing-tables-lite' ); ?> </label>
                                            <div class="appts-info-wrap">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][subtitle][style][font-size]" value="<?php echo isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-size' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-size' ] != '' ? esc_attr( ( int ) $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-size' ] ) : ''; ?>">
                                                <div class="appts-font-properties">
                                                    <a href="javascript:void(0);" title="<?php _e( 'Bold', 'ap-pricing-tables-lite' ); ?>" 			data-action="font-style-bold"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) { ?> class="appts-active" <?php } ?> >					<i class="fa fa-bold"></i>			<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][subtitle][style][font-style][bold]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'bold' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Italic', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-italic"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) { ?> class="appts-active" <?php } ?> >				<i class="fa fa-italic"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][subtitle][style][font-style][italic]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'italic' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Strikethrough', 'ap-pricing-tables-lite' ); ?>" 	data-action="font-style-strikethrough"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) { ?> class="appts-active" <?php } ?> >	<i class="fa fa-strikethrough"></i>	<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][subtitle][style][font-style][strikethrough]" 	value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'strikethrough' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Underline', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-underline"		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) { ?> class="appts-active" <?php } ?> >			<i class="fa fa-underline"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][title-subtitle-settings][subtitle][style][font-style][underline]" 		value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'title-subtitle-settings' ][ 'subtitle' ][ 'style' ][ 'font-style' ][ 'underline' ];
                                                        }
                                                        ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Title & Subtitle Settings ends -->

                        <!-- Price settings -->
                        <div class="appts-col-box">
                            <div class="appts-inner-tab-header-title"><?php _e( "Price settings", 'ap-pricing-tables-lite' ); ?></div>
                            <div class="appts-inner-tab-content" style="display:none;">
                                <div class='appts-input-wrap appts-table-row'>
                                    <label><?php _e( 'Price Type', 'ap-pricing-tables-lite' ); ?></label>
                                    <div class="appts-info-wrap">
                                        <select name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][type]" class="appts-price-settings">
                                            <option data-select="appts-price" value="price" <?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'type' ] ) ) {
                                                selected( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'type' ], 'price' );
                                            }
                                            ?>><?php _e( 'Price', 'ap-pricing-tables-lite' ); ?></option>
                                            <option data-select="appts-price-html" value="price-html" <?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'type' ] ) ) {
                                                selected( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'type' ], 'price-html' );
                                            }
                                            ?>><?php _e( 'HTML Content', 'ap-pricing-tables-lite' ); ?></option>
                                        </select>
                                        <div class="appts-info"><?php _e( 'Price type selection.', 'ap-pricing-tables-lite' ); ?></div>
                                    </div>
                                </div>
                                <div class="appts-select-common-div appts-price" <?php
                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'type' ] ) ) {
                                    if ( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'type' ] == 'price' ) {
                                        ?> style='display:block;' <?php } else { ?> style='display:none;' <?php
                                         }
                                     } else {
                                         ?> style='display:block;' <?php } ?> >
                                    <div class='appts-input-wrap appts-table-row'>
                                        <label><?php _e( 'Price', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap">
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][selling-price][content]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'content' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'content' ] != '' ) {
                                                echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'content' ] );
                                            }
                                            ?>" />
                                            <div class="appts-info"><?php _e( "Selling price value. Please don't use the currency symbol here. Please enter only price value.", 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>
                                    <div class='appts-input-wrap appts-table-row'>
                                        <label><?php _e( 'Payment Name', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap">
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][payment-name][content]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'content' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'content' ] != '' ) {
                                                echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'content' ] );
                                            }
                                            ?>" >
                                            <div class="appts-info"><?php _e( 'Name of the payment e.g. "per month"', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>
                                    </div>

                                    <!-- for selling price style -->
                                    <div class="appts-style-settings">
                                        <span class='appts-inline-title'><?php _e( 'Price Style', 'ap-pricing-tables-lite' ); ?></span>
                                        <div class='appts-input-wrap'>
                                            <label><?php _e( 'Font Family', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <select name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][selling-price][style][font-family]">
                                                    <option value=''><?php _e( 'Default / Inherit', 'ap-pricing-tables-lite' ); ?></option>
                                                    <?php
                                                    foreach ( $appts_pricing[ 'google-fonts' ] as $key => $value ) :
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-family' ] ) ) {
                                                            selected( $key, $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-family' ] );
                                                        }
                                                        ?> ><?php echo $key; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='appts-input-wrap'>
                                            <label><?php _e( 'Font Color', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class='appts-info-wrap'>
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][selling-price][style][font-color]" class='appts-default-colorpicker' data-alpha="true" value="<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-color' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-color' ] != '' ) {
                                                    echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-color' ] );
                                                }
                                                ?>">
                                            </div>
                                        </div>

                                        <div class="appts-input-wrap appts-table-row appts-input-manage">
                                            <label>
                                                <?php _e( 'Font Size', 'ap-pricing-tables-lite' ); ?> (px)
                                            </label>
                                            <div class="appts-info-wrap">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][selling-price][style][font-size]" value="<?php echo isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-size' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-size' ] != '' ? esc_attr( ( int ) $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-size' ] ) : ''; ?>" >
                                                <div class="appts-font-properties">
                                                    <a href="javascript:void(0);" title="<?php _e( 'Bold', 'ap-pricing-tables-lite' ); ?>" 			data-action="font-style-bold"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) { ?> class="appts-active" <?php } ?> >					<i class="fa fa-bold"></i>			<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][selling-price][style][font-style][bold]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'bold' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Italic', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-italic"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) { ?> class="appts-active" <?php } ?> >				<i class="fa fa-italic"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][selling-price][style][font-style][italic]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'italic' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Strikethrough', 'ap-pricing-tables-lite' ); ?>" 	data-action="font-style-strikethrough"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) { ?> class="appts-active" <?php } ?> >	<i class="fa fa-strikethrough"></i>	<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][selling-price][style][font-style][strikethrough]" 	value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'strikethrough' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Underline', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-underline"		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) { ?> class="appts-active" <?php } ?> >			<i class="fa fa-underline"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][selling-price][style][font-style][underline]" 		value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'underline' ];
                                                        }
                                                        ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- for selling price style ends-->

                                    <!-- for payment style -->
                                    <div class="appts-style-settings">
                                        <span class='appts-inline-title'><?php _e( 'Payment Style', 'ap-pricing-tables-lite' ); ?></span>
                                        <div class='appts-input-wrap appts-font-family'>
                                            <label><?php _e( 'Font Family', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <select name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][payment-name][style][font-family]">
                                                    <option value=''><?php _e( 'Default / Inherit', 'ap-pricing-tables-lite' ); ?></option>
                                                    <?php
                                                    foreach ( $appts_pricing[ 'google-fonts' ] as $key => $value ) :
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ] ) ) {
                                                            selected( $key, $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ] );
                                                        }
                                                        ?> ><?php echo $key; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='appts-input-wrap'>
                                            <label><?php _e( 'Font Color', 'ap-pricing-tables-lite' ); ?></label>
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][payment-name][style][font-color]" class='appts-default-colorpicker' data-alpha="true" value="<?php echo esc_attr( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-color' ] ) ? $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-color' ] : ''  ); ?>">
                                            <div class="appts-info"><?php _e( 'Main color of the pricing table.', 'ap-pricing-tables-lite' ); ?></div>
                                        </div>

                                        <div class="appts-input-wrap appts-table-row appts-input-manage">
                                            <label><?php _e( 'Font Size (px)', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][payment-name][style][font-size]" value="<?php echo isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-size' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-size' ] != '' ? esc_attr( ( int ) $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-size' ] ) : ''; ?>" >
                                                <div class="appts-font-properties">
                                                    <a href="javascript:void(0);" title="<?php _e( 'Bold', 'ap-pricing-tables-lite' ); ?>" 			data-action="font-style-bold"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) { ?> class="appts-active" <?php } ?> >						<i class="fa fa-bold"></i>			<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][payment-name][style][font-style][bold]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'bold' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Italic', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-italic"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) { ?> class="appts-active" <?php } ?> >					<i class="fa fa-italic"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][payment-name][style][font-style][italic]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'italic' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Strikethrough', 'ap-pricing-tables-lite' ); ?>" 	data-action="font-style-strikethrough"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) { ?> class="appts-active" <?php } ?> >	<i class="fa fa-strikethrough"></i>	<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][payment-name][style][font-style][strikethrough]" 	value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'strikethrough' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Underline', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-underline"		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) { ?> class="appts-active" <?php } ?> >			<i class="fa fa-underline"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][price][payment-name][style][font-style][underline]" 		value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'underline' ];
                                                        }
                                                        ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- for payment style ends -->
                                </div>

                                <div class="appts-select-common-div appts-price-html" <?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'type' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'type' ] == 'price-html' ) { ?> style='display:block;' <?php } else { ?> style='display:none;' <?php } ?>>
                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Price Content', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap appts-input-button">
                                            <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][selling-price-content][content]" value="<?php
                                            if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'content' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'content' ] != '' ) {
                                                echo esc_html( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'content' ] );
                                            }
                                            ?>" />
                                            <a href="javascript:void(0);" data-popup="font-icons" title="<?php _e( 'Insert Font Icons', 'ap-pricing-tables-lite' ); ?>" class="appts-ajax-font-icons"><?php _e( 'Insert Font Icons', 'ap-pricing-tables-lite' ); ?></a>
                                        </div>
                                    </div>
                                    <div class="appts-input-wrap">
                                        <label><?php _e( 'Payment Content', 'ap-pricing-tables-lite' ); ?></label>
                                        <div class="appts-info-wrap">
                                            <div class="appts-input-button">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][payment-content][content]" value="<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'content' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'content' ] != '' ) {
                                                    echo esc_html( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'content' ] );
                                                }
                                                ?>" />
                                                <a href="javascript:void(0);" data-popup="font-icons" title="<?php _e( 'Insert Font Icons', 'ap-pricing-tables-lite' ); ?>" class="appts-ajax-font-icons"><?php _e( 'Insert Font Icons', 'ap-pricing-tables-lite' ); ?></a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- for selling price content style -->
                                    <div class='appts-style-settings'>
                                        <span class='appts-inline-title'><?php _e( 'Price Style', 'ap-pricing-tables-lite' ); ?></span>
                                        <div class='appts-input-wrap'>
                                            <label><?php _e( 'Font Family', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <select name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][selling-price-content][style][font-family]">
                                                    <option value=''> <?php _e( 'Default / Inherit', 'ap-pricing-tables-lite' ); ?></option>
                                                    <?php
                                                    foreach ( $appts_pricing[ 'google-fonts' ] as $key => $value ) :
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-family' ] ) ) {
                                                            selected( $key, $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-family' ] );
                                                        }
                                                        ?> ><?php echo $key; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='appts-input-wrap'>
                                            <label><?php _e( 'Font Color', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][selling-price-content][style][font-color]" class='appts-default-colorpicker' data-alpha="true" value="<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-color' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-color' ] != '' ) {
                                                    echo esc_attr( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-color' ] );
                                                }
                                                ?>">
                                            </div>
                                        </div>

                                        <div class="appts-input-wrap appts-table-row appts-input-manage">
                                            <label><?php _e( 'Font Size (px)', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][selling-price-content][style][font-size]" value="<?php echo isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-size' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-size' ] != '' ? esc_attr( ( int ) $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-size' ] ) : ''; ?>" >
                                                <div class="appts-font-properties">
                                                    <a href="javascript:void(0);" title="<?php _e( 'Bold', 'ap-pricing-tables-lite' ); ?>" 			data-action="font-style-bold"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) { ?> class="appts-active" <?php } ?> >						<i class="fa fa-bold"></i>			<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][selling-price-content][style][font-style][bold]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'bold' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Italic', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-italic"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) { ?> class="appts-active" <?php } ?> >					<i class="fa fa-italic"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][selling-price-content][style][font-style][italic]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'italic' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Strikethrough', 'ap-pricing-tables-lite' ); ?>" 	data-action="font-style-strikethrough"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) { ?> class="appts-active" <?php } ?> >	<i class="fa fa-strikethrough"></i>	<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][selling-price-content][style][font-style][strikethrough]" 	value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Underline', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-underline"		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) { ?> class="appts-active" <?php } ?> >			<i class="fa fa-underline"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][selling-price-content][style][font-style][underline]" 		value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'underline' ];
                                                        }
                                                        ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- for selling price style ends-->

                                    <!-- for payment style -->
                                    <div class="appts-style-settings">
                                        <span class='appts-inline-title'><?php _e( 'Payment Style', 'ap-pricing-tables-lite' ); ?></span>
                                        <div class='appts-input-wrap appts-font-family'>
                                            <label><?php _e( 'Font Family', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <select name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][payment-content][style][font-family]">
                                                    <option value=''><?php _e( 'Default / Inherit', 'ap-pricing-tables-lite' ); ?></option>
                                                    <?php
                                                    foreach ( $appts_pricing[ 'google-fonts' ] as $key => $value ) :
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-family' ] ) ) {
                                                            selected( $key, $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-family' ] );
                                                        }
                                                        ?> ><?php echo $key; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='appts-input-wrap'>
                                            <label><?php _e( 'Font Color', 'ap-pricing-tables-lite' ); ?></label>
                                            <div class="appts-info-wrap">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][payment-content][style][font-color]" class='appts-default-colorpicker' data-alpha="true" value="<?php
                                                if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-color' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-color' ] != '' ) {
                                                    echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-color' ];
                                                }
                                                ?>" />
                                            </div>
                                        </div>

                                        <div class="appts-input-wrap appts-table-row appts-input-manage">
                                            <label><?php _e( 'Font Size', 'ap-pricing-tables-lite' ); ?> (px)</label>
                                            <div class="appts-info-wrap">
                                                <input type="text" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][payment-content][style][font-size]" value="<?php echo isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-size' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-size' ] != '' ? esc_attr( ( int ) $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-size' ] ) : ''; ?>" >
                                                <div class="appts-font-properties">
                                                    <a href="javascript:void(0);" title="<?php _e( 'Bold', 'ap-pricing-tables-lite' ); ?>" 			data-action="font-style-bold"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) { ?> class="appts-active" <?php } ?> >						<i class="fa fa-bold"></i>			<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][payment-content][style][font-style][bold]" 			value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'bold' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'bold' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Italic', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-italic"			<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) { ?> class="appts-active" <?php } ?> >					<i class="fa fa-italic"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][payment-content][style][font-style][italic]" 		value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'italic' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'italic' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Strikethrough', 'ap-pricing-tables-lite' ); ?>" 	data-action="font-style-strikethrough"	<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) { ?> class="appts-active" <?php } ?> >	<i class="fa fa-strikethrough"></i>	<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][payment-content][style][font-style][strikethrough]" 	value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ];
                                                        }
                                                        ?>"></a>
                                                    <a href="javascript:void(0);" title="<?php _e( 'Underline', 'ap-pricing-tables-lite' ); ?>" 		data-action="font-style-underline"		<?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) { ?> class="appts-active" <?php } ?> >			<i class="fa fa-underline"></i>		<input type="hidden" name="appts-col-data[<?php echo $column_index; ?>][header][marked-price-selling-price-settings][html][payment-content][style][font-style][underline]" 		value="<?php
                                                        if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'underline' ] == '1' ) {
                                                            echo $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'marked-price-selling-price-settings' ][ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'underline' ];
                                                        }
                                                        ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- for payment style ends -->
                                </div>
                            </div>
                        </div>
                        <!-- Marked Price & Selling Price settings ends -->

                        <!-- Remove Header -->
                        <div class="appts-col-box">
                            <div class="appts-inner-tab-header-title"><?php _e( 'Header Remove', 'ap-pricing-tables-lite' ); ?></div>
                            <div class="appts-inner-tab-content" style='display:none;'>
                                <div class="appts-input-wrap">
                                    <label><?php _e( 'Remove Header', 'ap-pricing-tables-lite' ); ?></label>
                                    <div class="appts-info-wrap">
                                        <input type="checkbox" value="1" name="appts-col-data[<?php echo $column_index; ?>][header][header-remove][enable]" <?php if ( isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'header' ][ 'header-remove' ][ 'enable' ] ) ) { ?> checked="checked"; <?php } ?> />
                                        <div class="appts-info"><?php _e( 'Please check this option if you want to remove the header part completely.', 'ap-pricing-tables-lite' ); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Remove Header ends -->
                    </div>
                </div>
            </div>
            <!-- Header settings ends -->

            <!-- Body Settings -->
            <div class="appts-settings-wrapper appts-settings-wrapper-body">
                <div class="appts-column-header">
                    <div class="appts-column-title"><?php _e( 'Body Settings', 'ap-pricing-tables-lite' ); ?></div>
                    <div class="appts-column-hide-show"></div>
                </div>
                <div class="appts-column-content-wrapper">
                    <div class="appts-column-content" style="display:none;">
                        <div class='appts-column-rows'><?php
                            $row_count = isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'body' ] ) ? count( $table_data[ 'appts-col-data' ][ $column_index ][ 'body' ] ) : '';
                            $rows = isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'body' ] ) ? $table_data[ 'appts-col-data' ][ $column_index ][ 'body' ] : '';
                            if ( isset( $row_count ) && $row_count != '' ) {
                                foreach ( $rows as $row_index => $row ) {
                                    include('add_row.php');
                                }
                            }
                            ?>
                        </div>
                        <div class="appts-col-box-add">
                            <a href="javascript:void(0);" data-action="add-row" data-column_index="<?php echo $column_index; ?>" title="Add Row" class="appts-btn-style"><span class="appts-icon-add"></span><?php _e( 'Add Row', 'ap-pricing-tables-lite' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Body Settings ends -->

            <!-- Footer Settings -->
            <div class="appts-settings-wrapper appts-settings-wrapper-footer">
                <div class="appts-column-header">
                    <div class="appts-column-title"><?php _e( 'Footer Settings', 'ap-pricing-tables-lite' ); ?></div>
                    <div class="appts-column-hide-show"></div>
                </div>
                <div class="appts-column-content-wrapper">
                    <div class="appts-column-content" style="display:none;">
                        <div class='appts-column-footer-rows'><?php
                            $row_count = isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ] ) ? count( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ] ) : '';
                            $rows = isset( $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ] ) ? $table_data[ 'appts-col-data' ][ $column_index ][ 'footer' ] : '';
                            if ( isset( $row_count ) && $row_count != '' ) {
                                foreach ( $rows as $row_index => $row ) {
                                    ?>
                                    <?php
                                    include('add_footer_row.php');
                                }
                            }
                            ?>
                        </div>
                        <div class="appts-col-box-add">
                            <a href="javascript:void(0);" data-action="add-footer-row" data-column_index="<?php echo $column_index; ?>"  title="Add Row" class="appts-btn-style"><span class="appts-icon-add"></span><?php _e( 'Add Row', 'ap-pricing-tables-lite' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Settings ends -->
        </div>
    </div>
</div>