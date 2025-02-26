<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

//global variables
global $wpdb;
global $appts_pricing;

if ( isset( $_GET[ 'postid' ] ) ) {
    $postid = $_GET[ 'postid' ];
    $table_name = $wpdb -> prefix . 'appts_tables_data';
    $table_data = $wpdb -> get_row( " SELECT * FROM $table_name WHERE id='$postid'", ARRAY_A );
    $array_a = array(
        'id' => $table_data[ 'id' ],
        'name' => $table_data[ 'name' ],
        'sid' => $table_data[ 'sid' ]
    );

    $array_b = unserialize( $table_data[ 'table_data' ] );
    $table_data = array_merge( $array_a, $array_b );
}
$random_sid = self:: generateRandomString();
include('common/header.php');
?>

<?php if ( isset( $_GET[ 'message' ] ) && $_GET[ 'message' ] != '' ) { ?>
    <div class='appts-message'>
        <?php
        $msgid = $_GET[ 'message' ];
        switch ( $msgid ) {
            case '1':
                ?>
                <span class='appts-error'><?php _e( "shortcode ID Can't be empty.", 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            case '2':
                ?>
                <span class='appts-success'><?php _e( "Shortcode ID can contain only lowercase letters, numbers, hyphens and underscores.", 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            case '3':
                ?>
                <span class='appts-success'><?php _e( 'table edited Successfully.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            case '4':
                ?>
                <span class='appts-error'><?php _e( 'Something went wrong. Please try again.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            case '5':
                ?>
                <span class='appts-error'><?php _e( 'Shortcode ID already exists. Please try again.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            case '6':
                ?>
                <span class='appts-success'><?php _e( 'table saved Successfully.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            default:
                ?>
                <span class='appts-error'><?php _e( 'Something went wrong. Please try again.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;
        }
        ?>
    </div>
<?php }
?>

<form id="appts-single-form" method="post" action="<?php echo admin_url() . 'admin-post.php'; ?>">
    <!-- hidden fields -->
    <input type='hidden' name='action' value='appts_save_form_data' />
    <input type='hidden' name='appts-nonce' value='<?php echo wp_create_nonce( 'appts-nonce' ); ?>' />
    <?php if ( isset( $_GET[ 'postid' ] ) ) { ?>
        <input type="hidden" name="_action" value="table_edit_save" >
        <input type='hidden' name='postid' value='<?php echo esc_attr($_GET[ 'postid' ]); ?>' />
    <?php } else {
        ?>
        <input type="hidden" name="_action" value="table_editor" >
    <?php } ?>
    <!-- hidden fields end -->

    <!-- table-settings -->
    <div class="appts-table-settings">

        <!-- tabs wrapper -->
        <div class='appts-tabs-wrapper'>
            <span class='appts-tab appts-active' id='appts-tab-table_name'><?php _e( 'Table Name(1)', 'ap-pricing-tables-lite' ); ?></span>
            <span class='appts-tab' id='appts-tab-styles'><?php _e( 'Template Selection And Styles(2)', 'ap-pricing-tables-lite' ); ?></span>
            <span class='appts-tab' id='appts-tab-currency'><?php _e( 'Currency Settings(3)', 'ap-pricing-tables-lite' ); ?></span>
            <span class='appts-tab' id='appts-tab-custom_css'><?php _e( 'Custom CSS(Optional)', 'ap-pricing-tables-lite' ); ?></span>
        </div>
        <!-- tabs wrapper ends -->

        <!-- tabs-content-wrapper -->
        <div class='appts-tabs-content-wrapper'>
            <!-- table name -->
            <div class='appts-tab-content appts-tab-table_name' style="display:block;">
                <div class="appts-input-wrap">
                    <label><?php _e( 'Table Name', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <input type="text" name="name" value="<?php
                        if ( isset( $table_data[ 'name' ] ) && $table_data[ 'name' ] != '' ) {
                            echo esc_attr( $table_data[ 'name' ] );
                        }
                        ?>">
                        <div class='appts-info'><?php _e( 'Please enter your pricing table name here(eg Table 1). This is usable for admin area only while listing the tables.', 'ap-pricing-tables-lite' ); ?></div>
                    </div>
                </div>

                <div class="appts-input-wrap">
                    <label><?php _e( 'Shortcode ID', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <input type="text" name="sid" value="<?php
                        if ( isset( $table_data[ 'sid' ] ) && $table_data[ 'sid' ] != '' ) {
                            echo esc_attr( $table_data[ 'sid' ] );
                        } else {
                            echo esc_attr( $random_sid );
                        }
                        ?>">
                        <div class='appts-info'><?php _e( "Unique ID, used in shortcode. (e.g. If your shortcode ID is 'table_1', your shortcode will be: [appts_pricing_table sid='table_1']). This field should contains only numbers, lowercase letters, hyphen and underscore(eg table_1). If you use the uppercase letter it will be automatically converted to lowercase.", 'ap-pricing-tables-lite' ); ?></div>
                    </div>
                </div>

                        <?php if ( isset( $_GET[ 'postid' ] ) ) { ?>
                    <div class="appts-input-wrap">
                        <label><?php _e( 'Shortcode', 'ap-pricing-tables-lite' ); ?></label>
                        <div class="appts-info-wrap">
                            <input type="text" value="<?php
                               if ( isset( $table_data[ 'sid' ] ) && $table_data[ 'sid' ] != '' ) {
                                   echo esc_attr( "[appts_pricing_table sid='{$table_data[ 'sid' ]}']" );
                               }
                            ?>" readonly="readonly">
                            <div class='appts-info'><?php _e( 'Please use this shortcode in your posts/pages. <br /> Also you can use template shortcode', 'ap-pricing-tables-lite' ); ?> &#60;?php echo do_shortcode("[appts_pricing_table sid="<?php echo esc_attr( $table_data[ 'sid' ] ); ?>"]); ?></div>
                        </div>
                    </div>
<?php }
?>
            </div>
            <!-- table name ends -->

            <!-- template selection and styles -->
            <div class='appts-tab-content appts-tab-styles' style="display:none;">
                <div class="appts-input-wrap">
                    <label><?php _e( 'Template Selection', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <select name="template-selection" class="appts-img-selector">
                                    <?php $style_img_src = APPTS_IMAGE_DIR . "/templates/template_01.jpg"; ?>
                                    <?php for ( $i = 01; $i <= 5; $i ++ ) {
                                        $template_value = 'template_' . sprintf( "%02d", $i );
                                        ?>
                                <option value='<?php echo $template_value; ?>' data-src="<?php echo APPTS_IMAGE_DIR . "/templates/template_" . sprintf( "%02d", $i ) . ".jpg"; ?>" <?php
                                        if ( isset( $table_data[ 'template-selection' ] ) && $table_data[ 'template-selection' ] == "$template_value" ) {
                                            echo "selected='selected'";
                                            $style_img_src = APPTS_IMAGE_DIR . "/templates/" . $template_value . ".jpg";
                                        }
                                        ?> ><?php echo "Template $i"; ?></option>
<?php } ?>
                        </select>
                        <div class="appts-info"><?php _e( 'Template selection of a table.', 'ap-pricing-tables-lite' ); ?></div>
                    </div>
                    <div class="appts-img-selector-media">
                        <img src="<?php echo esc_url( $style_img_src ); ?>">
                    </div>
                </div>

                <div class="appts-checkbox-selection-wrap appts-checkbox-column-border-radius-settings">
                    <div class="appts-input-wrap">
                        <label><?php _e( 'Column Borders radius?', 'ap-pricing-tables-lite' ); ?></label>
                        <div class='appts-info-wrap'>
                            <input type="checkbox" class='appts-checkbox-option' id='appts-column-border-radius-enable' name="col-border" value="1" <?php
                    if ( isset( $table_data[ 'col-border' ] ) ) {
                        checked( $table_data[ 'col-border' ], 1 );
                    }
                    ?> >
                            <div class="appts-info"><?php _e( 'Option to enable the border radius of the column.', 'ap-pricing-tables-lite' ); ?></div>
                        </div>
                    </div>
                    <!-- If enabled -->
                    <div class="appts-checkbox-options-show appts-column-border-radius-options" style='<?php
                                if ( isset( $table_data[ 'col-border' ] ) ) {
                                    echo 'display:block;';
                                } else {
                                    echo "display:none;";
                                }
                                ?>'>
                        <div class="appts-input-wrap appts-input-manage">
                            <label><?php _e( 'Column Border Radius', 'ap-pricing-tables-lite' ); ?></label>
                            <div class="appts-info-wrap">
                                <input type="text" name="col-border-radius[top]" value="<?php
                                       if ( isset( $table_data[ 'col-border-radius' ][ 'top' ] ) && $table_data[ 'col-border-radius' ][ 'top' ] != '' ) {
                                           echo esc_attr( $table_data[ 'col-border-radius' ][ 'top' ] );
                                       }
                                ?>" class="appts-input-mid">
                                <input type="text" name="col-border-radius[right]" value="<?php
                                       if ( isset( $table_data[ 'col-border-radius' ][ 'right' ] ) && $table_data[ 'col-border-radius' ][ 'right' ] != '' ) {
                                           echo esc_attr( $table_data[ 'col-border-radius' ][ 'right' ] );
                                       }
                                ?>" class="appts-input-mid">
                                <input type="text" name="col-border-radius[bottom]" value="<?php
                                       if ( isset( $table_data[ 'col-border-radius' ][ 'bottom' ] ) && $table_data[ 'col-border-radius' ][ 'bottom' ] != '' ) {
                                           echo esc_attr( $table_data[ 'col-border-radius' ][ 'bottom' ] );
                                       }
                                ?>" class="appts-input-mid">
                                <input type="text" name="col-border-radius[left]" value="<?php
                                       if ( isset( $table_data[ 'col-border-radius' ][ 'left' ] ) && $table_data[ 'col-border-radius' ][ 'left' ] != '' ) {
                                           echo esc_attr( $table_data[ 'col-border-radius' ][ 'left' ] );
                                       }
                                ?>" class="appts-input-mid">
                                <div class='appts-info'><?php _e( 'Top right bottom and left border radius of the columns in pixels.', 'ap-pricing-tables-lite' ); ?></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="appts-input-wrap appts-input-manage">
                    <label><?php _e( 'Column Space (px)', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <input type="text" name="col-space" value="<?php
                               if ( isset( $table_data[ 'col-space' ] ) && $table_data[ 'col-space' ] != '' ) {
                                   echo esc_attr( $table_data[ 'col-space' ] );
                               }
                                ?>">
                        <div class="appts-info"><?php _e( 'Horizontal space between columns in pixels.', 'ap-pricing-tables-lite' ); ?></div>
                    </div>
                </div>

                <div class="appts-input-wrap appts-input-manage">
                    <label><?php _e( 'Column Width (px)', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <input type="text" name="col-width" value="<?php
                                    if ( isset( $table_data[ 'col-width' ] ) && $table_data[ 'col-width' ] != '' ) {
                                        echo esc_attr( $table_data[ 'col-width' ] );
                                    }
                                ?>">
                        <div class='appts-info'><?php _e( 'Width of the colums in pixels.', 'ap-pricing-tables-lite' ); ?></div>
                    </div>
                </div>
            </div>
            <!-- template selection and styles ends -->

            <!-- currency settings -->
            <div class='appts-tab-content appts-tab-currency' style="display:none;">
                <div class='appts-currency-selection appts-input-wrap'>
                    <label><?php _e( 'Currency', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <select name="currency[id]">
<?php
foreach ( $appts_pricing[ 'currency' ] as $key => $value ) :
    ?>
                                <option value="<?php echo $value[ 'id' ]; ?>"<?php
                            if ( isset( $table_data[ 'currency' ][ 'id' ] ) ) {
                                selected( $value[ 'id' ], $table_data[ 'currency' ][ 'id' ] );
                            }
                            ?>><?php echo $value[ 'name' ] . "( {$value[ 'symbol' ]} )"; ?></option>
    <?php
endforeach;
?>
                        </select>
                        <div class="appts-info">
<?php _e( 'Currency of the price.', 'ap-pricing-tables-lite' ); ?>
                        </div>
                    </div>
                </div>
                <div class='appts-currency-position appts-input-wrap'>
                    <label><?php _e( 'Currency Position', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <select name="currency[position]">
                            <option value="left" 	<?php
                               if ( isset( $table_data[ 'currency' ][ 'position' ] ) ) {
                                   selected( 'left', $table_data[ 'currency' ][ 'position' ] );
                               }
                               ?> 	><?php _e( 'Left (e.g. $100)', 'ap-pricing-tables-lite' ); ?></option>
                            <option value="right" 	<?php
                               if ( isset( $table_data[ 'currency' ][ 'position' ] ) ) {
                                   selected( 'right', $table_data[ 'currency' ][ 'position' ] );
                               }
                               ?> 	><?php _e( 'Right (e.g. 100$)', 'ap-pricing-tables-lite' ); ?></option>
                        </select>
                        <div class="appts-info">
<?php _e( 'Currency position of the price.', 'ap-pricing-tables-lite' ); ?>
                        </div>
                    </div>
                </div>
                <div class='appts-currency-t-separator appts-input-wrap'>
                    <label><?php _e( 'Thousand Separator', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <input type="text" name="currency[thousand_sep]" value="<?php
if ( isset( $table_data[ 'currency' ][ 'thousand_sep' ] ) && $table_data[ 'currency' ][ 'thousand_sep' ] != '' ) {
    echo esc_attr( $table_data[ 'currency' ][ 'thousand_sep' ] );
}
?>" />
                        <div class="appts-info"><?php _e( 'Thuousand separator of the price.', 'ap-pricing-tables-lite' ); ?></div>
                    </div>
                </div>
                <div class="appts-decimal-seperator appts-input-wrap">
                    <label><?php _e( 'Decimal Separator', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <input type="text" name="currency[decimal_sep]" value="<?php
if ( isset( $table_data[ 'currency' ][ 'decimal_sep' ] ) && $table_data[ 'currency' ][ 'decimal_sep' ] != '' ) {
    echo esc_attr( $table_data[ 'currency' ][ 'decimal_sep' ] );
} else {
    echo ".";
}
?>" />
                        <div class="appts-info"><?php _e( 'Decimal separator of the price.', 'ap-pricing-tables-lite' ); ?></div>
                    </div>
                </div>
                <div class="appts-currency-no-of-dec appts-input-wrap">
                    <label><?php _e( 'Number of Decimals', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-info-wrap">
                        <input type="text" name="currency[decimal_no]" value="<?php
                    if ( isset( $table_data[ 'currency' ][ 'decimal_no' ] ) && $table_data[ 'currency' ][ 'decimal_no' ] != '' ) {
                        echo esc_attr( $table_data[ 'currency' ][ 'decimal_no' ] );
                    }
                    ?>" />
                        <div class="appts-info"><?php _e( 'Maximum number of decimals to show in price.', 'ap-pricing-tables-lite' ); ?></div>
                    </div>
                </div>
            </div>
            <!-- currency settings ends -->

            <!-- custom css settings -->
            <div class="appts-tab-content appts-tab-custom_css" style="display:none;">
                <div class='appts-textarea-code'>
                    <p><?php _e( 'If you need to do custom css for this table, You can write custom CSS here for the global CSS implications for this pricing table.', 'ap-pricing-tables-lite' ); ?></p>
                    <textarea class='appts-common-textarea' name="custom-css"><?php echo isset( $table_data[ 'custom-css' ] ) ? ( esc_textarea( $table_data[ 'custom-css' ] ) ) : ''; ?></textarea>
                </div>
            </div>
            <!-- custom css ends -->
        </div>
        <!-- tabs-content-wrapper ends -->
    </div>
    <!-- table-settings ends -->

    <!-- column settings -->
    <div class='appts-columns-editor-outer-wrapper'>
        <div class='appts-columns-settings-content-wrapper-outer'>
            <div class='appts-columns-editor-header'>
                <div class="appts-columns-editor-name"><?php _e( 'Column Editor (4)', 'ap-pricing-tables-lite' ); ?>
                    <div class='appts-add-new-column' data-action='add_column'>
                        <a href='javascript:void(0);' class='appts-add-column-button'><span><?php _e( 'Add column', 'ap-pricing-tables-lite' ); ?></span></a>
                    </div>
                </div>
            </div>
            <div class="appts-column-settings-columns-wrapper">
                <!-- Columns wrapper -->
                <div class='appts-columns'>
        <?php
        if ( isset( $table_data[ 'appts-col-data' ] ) ) {
            $get_column_counts = count( $table_data[ 'appts-col-data' ] );
            $column_counts = count( $table_data[ 'appts-col-data' ] );
            if ( $column_counts != 0 ) {
                $columns = $table_data[ 'appts-col-data' ];
                $count = 0;
                foreach ( $columns as $column_index => $column ) {
                    $count ++;
                    include('column.php');
                }
            }
        } else {
            $column_index = APPTS_Class:: generateRandomIndex();
            $count = 1;
            include('column.php');
        }
        ?>
                </div>
                <!-- Columns wrapper ends -->

                <div class='appts-columns-editor-header appts-columns-editor-footer'>
                    <div class="appts-columns-editor-name"><?php _e( 'Column Editor (4)', 'ap-pricing-tables-lite' ); ?>
                        <div class='appts-add-new-column' data-action='add_column'>
                            <a href='javascript:void(0);' class='appts-add-column-button'><span><?php _e( 'Add column', 'ap-pricing-tables-lite' ); ?></span></a>
                        </div>
                    </div>
                </div>
            </div> <!-- columns wrapper ends -->
        </div>
    </div>
    <!-- column settings ends -->

    <!-- save table  -->
    <div class="appts-submit">
        <button type="submit" title="<?php _e( 'Save', 'ap-pricing-tables-lite' ); ?>"><?php _e( 'Save', 'ap-pricing-tables-lite' ); ?></button>
<?php if ( isset( $table_data[ 'sid' ] ) ) { ?>
            <a href="<?php echo site_url(); ?>?appts_form_preview=true&appts_sid=<?php echo esc_attr( $table_data[ 'sid' ] ); ?>" title="<?php _e( 'Preview', 'ap-pricing-tables-lite' ); ?>" target="_blank"><?php _e( 'Preview', 'ap-pricing-tables-lite' ); ?></a>
<?php } ?>
    </div>
    <!-- save table ends -->
</form>

<?php
include('common/footer.php');
