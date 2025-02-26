<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $appts_pricing;
?>
<div class="appts-overlay"></div>

<div class="appts-popup">
    <div class='appts-close'><i class="fa fa-close"></i></div>
    <div class="appts-popup-header"><?php _e( 'Select Font Icons', 'ap-pricing-tables-lite' ); ?></div>
    <div class='appts-popup-content-wrapper appts-inner-tab-content'>
        <div class="appts-select-common-div appts-fontawesome" style='display:block;'>
            <div class="appts-input-wrap  appts-input-manage">
                <label><?php _e( 'Color', 'ap-pricing-tables-lite' ); ?></label>
                <div class='appts-info-wrap'>
                    <input type="text" name="color" class='appts-default-colorpicker' data-alpha="true" />
                </div>
            </div>

            <div class="appts-input-wrap appts-table-row appts-input-manage">
                <label><?php _e( 'Size (px)', 'ap-pricing-tables-lite' ); ?></label>
                <div class='appts-info-wrap'>
                    <input type="text" name="size" />
                    <div class="appts-info">
                    </div>
                </div>
            </div>

            <div class='appts-icon-picker-container'>
                <div class="appts-table-row appts-input-wrap">
                    <label><?php _e( 'Icon', 'ap-pricing-tables-lite' ); ?></label>
                    <div class="appts-icon-picker">
                        <div class="appts-icon-picker-header appts-icon-container">
                            <div class="appts-icon-search-wrapper">
                                <div class="appts-input-btn appts-search-input">
                                    <input type="text" placeholder="Search Icon">
                                    <a href="javascript:void(0);" class="appts-search-icon-button" title="<?php _e( 'Search', 'ap-pricing-tables-lite' ); ?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <input type="hidden" name="icon" />
                        </div>
                    </div>
                </div>
                <div class="appts-table-row appts-icon-picker appts-icon-picker-center">
                    <div class="appts-icon-picker-content">
                        <?php
                        $fontawesome_icons_array = $appts_pricing[ 'fontawesome_icons' ];
                        foreach ( $fontawesome_icons_array as $key => $value ) {
                            ?>
                            <a href="javascript:void(0);" class="appts-icon-picker-inline"><i class="fa <?php echo $value; ?>"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='appts-fonticons-insert-button'>
        <button><?php _e( 'Insert', 'ap-pricing-tables-lite' ); ?></button>
    </div>
</div>