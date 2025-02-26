<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include 'header.php';

$id = azoads_get_param_from_url( 'id' );
$id = ( $id > 0 ) ? absint( $id ) : 0;
$aa = azoads_get_ads( $id );

$require_pro_class = ( ! defined( 'AZOADS_PRO_VERSION' ) || ! azoads_activated_pro() ) ? ' require-pro' : '';
?>

<div class="azo-ads-top">
    <?php if ( empty( $aa ) ) : ?>
    <?php esc_html_e( 'Create New Ad', 'azo-ads' ); ?>
    <?php else : ?>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M386.7 22.63C411.7-2.365 452.3-2.365 477.3 22.63L489.4 34.74C514.4 59.74 514.4 100.3 489.4 125.3L269 345.6C260.6 354.1 249.9 359.1 238.2 362.7L147.6 383.6C142.2 384.8 136.6 383.2 132.7 379.3C128.8 375.4 127.2 369.8 128.4 364.4L149.3 273.8C152 262.1 157.9 251.4 166.4 242.1L386.7 22.63zM454.6 45.26C442.1 32.76 421.9 32.76 409.4 45.26L382.6 72L440 129.4L466.7 102.6C479.2 90.13 479.2 69.87 466.7 57.37L454.6 45.26zM180.5 281L165.3 346.7L230.1 331.5C236.8 330.2 242.2 327.2 246.4 322.1L417.4 152L360 94.63L189 265.6C184.8 269.8 181.8 275.2 180.5 281V281zM208 64C216.8 64 224 71.16 224 80C224 88.84 216.8 96 208 96H80C53.49 96 32 117.5 32 144V432C32 458.5 53.49 480 80 480H368C394.5 480 416 458.5 416 432V304C416 295.2 423.2 288 432 288C440.8 288 448 295.2 448 304V432C448 476.2 412.2 512 368 512H80C35.82 512 0 476.2 0 432V144C0 99.82 35.82 64 80 64H208z"/></svg>
    <span><?php echo esc_html( $aa['post_title'] ); ?></span>
    <?php endif; ?>
</div>

<div class="azo-ads-main">

    <div class="azo-ads-card">

        <!--begin::Card body-->
        <div class="card-body">

            <div class="azo-ads-manage">
                
                <ul class="azo-ads-manage-steps">
                    <li>
                        <span class="nav-step active" href="javascript:void(0);">
                            <span class="step_num">1</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 0c17.7 0 32 14.3 32 32V42.4c93.7 13.9 167.7 88 181.6 181.6H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H469.6c-13.9 93.7-88 167.7-181.6 181.6V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V469.6C130.3 455.7 56.3 381.7 42.4 288H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H42.4C56.3 130.3 130.3 56.3 224 42.4V32c0-17.7 14.3-32 32-32zM107.4 288c12.5 58.3 58.4 104.1 116.6 116.6V384c0-17.7 14.3-32 32-32s32 14.3 32 32v20.6c58.3-12.5 104.1-58.4 116.6-116.6H384c-17.7 0-32-14.3-32-32s14.3-32 32-32h20.6C392.1 165.7 346.3 119.9 288 107.4V128c0 17.7-14.3 32-32 32s-32-14.3-32-32V107.4C165.7 119.9 119.9 165.7 107.4 224H128c17.7 0 32 14.3 32 32s-14.3 32-32 32H107.4zM256 288c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z"/></svg>
                            <?php esc_html_e( 'Position', 'azo-ads' ); ?>
                        </span>
                    </li>
                    <li>
                        <span class="nav-step" href="javascript:void(0);">
                            <span class="step_num">2</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM229.5 173.3l72 144c5.9 11.9 1.1 26.3-10.7 32.2s-26.3 1.1-32.2-10.7L253.2 328H162.8l-5.4 10.7c-5.9 11.9-20.3 16.7-32.2 10.7s-16.7-20.3-10.7-32.2l72-144c4.1-8.1 12.4-13.3 21.5-13.3s17.4 5.1 21.5 13.3zM208 237.7L186.8 280h42.3L208 237.7zM392 256c-13.3 0-24 10.7-24 24s10.7 24 24 24s24-10.7 24-24s-10.7-24-24-24zm24-43.9V184c0-13.3 10.7-24 24-24s24 10.7 24 24v96 48c0 13.3-10.7 24-24 24c-6.6 0-12.6-2.7-17-7c-9.4 4.5-19.9 7-31 7c-39.8 0-72-32.2-72-72s32.2-72 72-72c8.4 0 16.5 1.4 24 4.1z"/></svg>
                            <?php esc_html_e( 'Ad Type', 'azo-ads' ); ?>
                        </span>
                    </li>
                    <li>
                        <span class="nav-step" href="javascript:void(0);">
                            <span class="step_num">3</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M559.6 95.6c21.9-21.9 21.9-57.3 0-79.2s-57.3-21.9-79.2 0L227.7 269.1l79.2 79.2L559.6 95.6zM205 291.8c-9.3-2.5-19-3.8-29-3.8c-61.9 0-112 50.1-112 112c0 3.9 .2 7.8 .6 11.6C66.4 429.1 54.4 448 36.8 448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H176c61.9 0 112-50.1 112-112c0-10-1.3-19.8-3.8-29l.1-.1-79.2-79.2-.1 .1zm93.5-138.7L164.7 19.3c-25-25-65.5-25-90.5 0L50.7 42.7c-25 25-25 65.5 0 90.5L173.5 256c.8 0 1.7 0 2.5 0c6.2 0 12.4 .4 18.4 1.2L298.5 153.1zM320 402.5l64.6 64.6c6.7 6.7 15.1 11.6 24.2 14.2l104 29.7c8.4 2.4 17.4 .1 23.6-6.1s8.5-15.2 6.1-23.6l-29.7-104c-2.6-9.2-7.5-17.5-14.2-24.2l-75.6-75.6L318.8 381.6c.8 6 1.2 12.2 1.2 18.4c0 .8 0 1.7 0 2.5z"/></svg>
                            <?php esc_html_e( 'Configuration', 'azo-ads' ); ?>
                        </span>
                    </li>
                    <li>
                        <span class="nav-step" href="javascript:void(0);">
                            <span class="step_num">4</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z"/></svg>
                            <?php esc_html_e( 'Visibility & Targeting', 'azo-ads' ); ?>
                        </span>
                    </li>
                    <li>
                        <span class="nav-step" href="javascript:void(0);">
                            <span class="step_num">5</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            <?php esc_html_e( 'Completed', 'azo-ads' ); ?>
                        </span>
                    </li>
                </ul>

                <div class="tab-content">
                    <form method="post" id="azo-ads-manage">
                    <div class="ads-ad-step" id="ads-add-postition" style="display: block;">
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Position', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Where your ad should appear', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Select a position for your ad', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <ul class="ad-pt">
                                        <?php
                                        $list_position = azoads_get_list_position();
                                        foreach ( $list_position as $key => $value ) :
                                            $isActive = false;
                                            if ( ! empty( $aa ) && $aa['aa_position'] == $key ) $isActive = true;
                                        ?>
                                        <li id="position_<?php echo esc_html( $key ); ?>" class="item_position azo-tooltip<?php echo $isActive ? ' active' : ''; ?>" data-azo-tooltip="<?php echo esc_html( $value ); ?>">
                                            <img src="<?php echo esc_html( AZOADS_BASE_URL ); ?>assets/images/position/<?php echo esc_html( $key ); ?>.svg" alt="">
                                            <h5><?php echo esc_html( $value ); ?></h5>
                                            <input class="form-check-radio" type="radio" name="position" value="<?php echo esc_html( $key ); ?>"<?php echo $isActive ? ' checked' : ''; ?>>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                        $form_positions = azoads_get_form_position();
                        foreach ( $form_positions as $key => $form_position ) :
                            $isActive = false;
                            if ( ! empty( $aa ) && $aa['aa_position'] == $key ) $isActive = true;
                        ?>
                        <div class="form_position form_position_<?php echo esc_html( $key ); ?><?php echo $isActive ? ' active' : ''; ?>">
                            <?php
                            foreach ( $form_position as $value ) :
                                $attribute = '';
                                $attr_arr = array();
                                if ( isset( $value['attribute'] ) && ! empty( $value['attribute'] ) ) {
                                    foreach ( $value['attribute'] as $attr_key => $attr_value ) {
                                        $attr_arr[] = $attr_key . '="' . $attr_value . '"';
                                    }
                                    $attribute = implode( ' ', $attr_arr );
                                }
                            ?>
                            <div class="azo-ads-row">
                                <div class="azo-ads-row-inner">
                                    <div class="form-label">
                                        <label>
                                            <span><?php echo wp_kses( $value['title'], array( 'span' => array( 'class' => array() ) ) ); ?></span>
                                            <a class="azo-tooltip" data-azo-tooltip="<?php echo esc_attr( $value['tooltip'] ); ?>" target="_blank"></a>
                                        </label>
                                    </div>
                                    <div class="form-content">
                                        <?php
                                        if ( $value['type'] == 'select' ) :
                                        ?>
                                        <select name="<?php echo esc_attr( $value['name'] ); ?>" class="<?php echo esc_attr( $value['class'] ); ?>" <?php echo wp_kses( $attribute, array() ); ?>>
                                            <?php foreach ( $value['value'] as $opt_value => $opt_label ) : ?>
                                            <option value="<?php echo esc_attr( $opt_value ); ?>"<?php echo ( ( isset( $aa['aa_'. $value['name']] ) && ( $aa['aa_'. $value['name']] == $opt_value ) ) ? ' selected="selected"' : '' ); ?>><?php echo esc_html( $opt_label ); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php
                                        else :
                                            $value['value'] = ( ! empty( $aa['aa_'. $value['name']] ) ) ? $aa['aa_'. $value['name']] : $value['value'];
                                        ?>
                                        <input type="<?php echo esc_attr( $value['type'] ); ?>" name="<?php echo esc_attr( $value['name'] ); ?>" value="<?php echo esc_attr( $value['value'] ); ?>" class="<?php echo ( isset( $value['class'] ) ? esc_attr( $value['class'] ) : '' ); ?>"<?php echo ( ( $value['value'] == 1 && $value['type'] == 'checkbox' ) ? ' checked' : '' ); ?> <?php echo wp_kses( $attribute, array() ); ?>>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="ads-ad-step" id="ads-add-type">
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Ad Type', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'What kind of your ad?', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Choose ad type', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content" style="flex-direction: column;">
                                    <ul class="ad-pt">
                                        <?php
                                        $list_ad_type = azoads_get_list_type();
                                        foreach ( $list_ad_type as $key => $value ) :
                                            $isActive = false;
                                            if ( ! empty( $aa ) && $aa['aa_type'] == $key ) $isActive = true;

                                            $class = '';

                                            if ( ( ! defined( 'AZOADS_PRO_VERSION' ) || ! azoads_activated_pro() ) && in_array( $key, azoads_get_list_type_only_pro() ) ) {
                                                $class .= ' require-pro';
                                            }
                                        ?>
                                        <li class="azo-tooltip<?php echo esc_html( $class ); ?><?php echo $isActive ? ' active' : ''; ?>" data-azo-tooltip="<?php echo esc_attr( $value ); ?>">
                                            <img src="<?php echo esc_html( AZOADS_BASE_URL ); ?>assets/images/type/<?php echo esc_html( $key ); ?>.svg" alt="">
                                            <h5><?php echo esc_html( $value ); ?></h5>
                                            <input id="type_<?php echo esc_html( $key ); ?>" class="form-check-radio" type="radio" name="type" value="<?php echo esc_attr( $key ); ?>"<?php echo $isActive ? ' checked' : ''; ?>>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <h3 class="ad-pt-network-heading"><?php esc_html_e( 'Ad Network', 'azo-ads' ); ?></h3>
                                    <ul class="ad-pt ad-pt-network">
                                        <?php
                                        $list_ad_network = azoads_get_list_network();
                                        foreach ( $list_ad_network as $key => $value ) :
                                            $isActive = false;
                                            if ( ! empty( $aa ) && $aa['aa_type'] == $key ) $isActive = true;
                                        ?>
                                        <li class="azo-tooltip<?php echo $isActive ? ' active' : ''; ?>" data-azo-tooltip="<?php echo esc_attr( $value ); ?>">
                                            <div class="ni-wrapper"><img src="<?php echo esc_html( AZOADS_BASE_URL ); ?>assets/images/network/<?php echo esc_html( $key ); ?>.svg" alt="" class="<?php echo esc_attr( $key ); ?>"></div>
                                            <h5><?php echo esc_html( $value ); ?></h5>
                                            <input id="type_<?php echo esc_html( $key ); ?>" class="form-check-radio" type="radio" name="type" value="<?php echo esc_attr( $key ); ?>"<?php echo $isActive ? ' checked' : ''; ?>>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="ads-ad-step" id="ads-add-configuration">
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Content', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Input your ad title', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Identify your ad', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="has-azo-ads-remove-content-icon">
                                        <input type="text" class="azo-ads-form-control" name="title" value="<?php echo ( ! empty( $aa ) ) ? esc_attr( $aa['post_title'] ) : ''; ?>" placeholder="<?php esc_html_e( 'Title', 'azo-ads' ); ?>">
                                        <span class="azo-ads-remove-content-icon"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include 'manage_ads_content.php'; ?>

                        <div class="azo-ads-row row-divider">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Appearance', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Alignment', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Align your ad', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <select name="align" class="azo-ads-dropdown" data-control="select2" data-hide-search="true">
                                        <?php
                                        $alignment = array(
                                            'none'         => __( 'Default', 'azo-ads' ),
                                            'left'          => __( 'Left', 'azo-ads' ),
                                            'center'        => __( 'Center', 'azo-ads' ),
                                            'right'         => __( 'Right', 'azo-ads' ),
                                        );
                                        foreach ( $alignment as $key => $value ) :
                                        ?>
                                        <option value="<?php echo esc_attr( $key ); ?>"<?php echo ( ! empty( $aa ) && $aa['aa_align'] == $key ) ? ' selected="selected"' : ''; ?>><?php echo esc_html( $value ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Margin', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Margin value', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <?php
                                    $margin = array(
                                        'margin_top'                => __( 'Top', 'azo-ads' ),
                                        'margin_right'              => __( 'Right', 'azo-ads' ),
                                        'margin_bottom'             => __( 'Bottom', 'azo-ads' ),
                                        'margin_left'               => __( 'Left', 'azo-ads' ),
                                    );
                                    foreach ( $margin as $key => $value ) :
                                        if ( $key == 'margin_top' ) $default_value = 10;
                                        elseif ( $key == 'margin_bottom' ) $default_value = 30;
                                        else $default_value = '';
                                    ?>
                                    <input type="number" class="azo-ads-form-control mp-input" name="<?php echo esc_attr( $key ); ?>" value="<?php echo ( ! empty( $aa ) ) ? esc_attr( $aa['aa_' . $key] ) : esc_attr( $default_value ); ?>" placeholder="<?php echo esc_attr( $value ); ?>">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Padding', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Padding value', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <?php
                                    $padding = array(
                                        'padding_top'                => __( 'Top', 'azo-ads' ),
                                        'padding_right'              => __( 'Right', 'azo-ads' ),
                                        'padding_bottom'             => __( 'Bottom', 'azo-ads' ),
                                        'padding_left'               => __( 'Left', 'azo-ads' ),
                                    );
                                    foreach ( $padding as $key => $value ) :
                                    ?>
                                    <input type="number" class="azo-ads-form-control mp-input" name="<?php echo esc_attr( $key ); ?>" value="<?php echo ( ! empty( $aa ) ) ? esc_attr( $aa['aa_' . $key] ) : ''; ?>" placeholder="<?php echo esc_attr( $value ); ?>">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Ad label', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Set your ad label', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="has-azo-ads-remove-content-icon">
                                        <input type="text" class="azo-ads-form-control" name="label" value="<?php echo ( ! empty( $aa ) ) ? esc_attr( $aa['aa_label'] ) : ''; ?>" placeholder="<?php esc_html_e( 'Advertisements', 'azo-ads' ); ?>">
                                        <span class="azo-ads-remove-content-icon"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Ad label position', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Set position of ad label', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <select name="label_position" class="azo-ads-dropdown" data-control="select2" data-hide-search="true">
                                        <?php
                                        $label_position = array(
                                            'above'             => __( 'Above of the ad', 'azo-ads' ),
                                            'below'             => __( 'Below of the ad', 'azo-ads' )
                                        );
                                        foreach ( $label_position as $key => $value ) :
                                        ?>
                                        <option value="<?php echo esc_attr( $key ); ?>"<?php echo ( ! empty( $aa ) && $aa['aa_label_position'] == $key ) ? ' selected="selected"' : ''; ?>><?php echo esc_html( $value ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="azo-ads-row row-divider">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Expiration', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Set expire date', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Pick up the date and time when your ad expires', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="has-azo-ads-remove-content-icon">
                                        <input type="text" class="azo-ads-form-control azo-ads-datetimepicker azo-ads-datetime-expire" name="expire_datetime" value="<?php echo ( ! empty( $aa ) && isset( $aa['aa_expire_datetime'] ) ) ? esc_attr( $aa['aa_expire_datetime'] ) : ''; ?>" placeholder="<?php esc_html_e( 'Select date time', 'azo-ads' ); ?>">
                                        <span class="azo-ads-remove-content-icon"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="azo-ads-row row-divider">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Show Up by Days', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner<?php echo esc_html( $require_pro_class ); ?>">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Set specific days', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Showing the ad based on specific days', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <select id="show_by_days" class="azo-ads-multiple-select" name="show_by_days" data-control="select2" data-hide-search="true" data-placeholder="Select the days" multiple="multiple">
                                        <?php
                                        $days_of_week = azoads_get_day();
                                        $selected_days = ( ! empty( $aa ) && isset( $aa['aa_show_by_days'] ) ) ? $aa['aa_show_by_days'] : '';
                                        foreach ( $days_of_week as $code => $day ) : ?>
                                        <option value="<?php echo $code; ?>"<?php if ( strpos( $selected_days, $code ) !== false ) { echo ' selected'; }?>><?php echo $day; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Activate the Ad', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Make your ad to be activated', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <input class="form-check-box" type="checkbox" name="active" value="<?php echo ( ( isset( $aa['active'] ) ) ? $aa['active'] : 1 ); ?>"<?php echo ( ( isset( $aa['active'] ) && $aa['active'] == 1 ) || $id == 0 ) ? ' checked': ''; ?>>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ads-ad-step" id="ads-add-visibility-targeting">

                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Visibility', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Choose the section where your ad should appear', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Choose pages, tags, user roles... where you want the ad to be shown', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="vt-container">

                                        <div class="vt-ie" data-type="vi">
                                            <div class="vt-ie-label">
                                                <?php esc_html_e( 'Include On', 'azo-ads' ); ?> <span class="btn btn-plus"><span>
                                            </div>
                                            <div class="vt-ie-form">
                                                <select name="vi-type" id="vi-type" class="azo-ads-dropdown vt-type" data-type="visibility" data-control="select2" data-placeholder="<?php esc_html_e( 'Choose Type', 'azo-ads' ); ?>">
                                                    <option value=""></option>
                                                    <?php
                                                    $azo_ads_vt = azoads_get_list_visibility();
                                                    foreach ( $azo_ads_vt as $key => $value ) :
                                                    ?>
                                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <select name="vi-value" id="vi-value" class="azo-ads-dropdown vt-value" data-control="select2" data-placeholder="<?php esc_html_e( 'Choose Value', 'azo-ads' ); ?>">
                                                </select>
                                                <button type="button" class="azo-btn azo-btn-primary btn-add">
                                                    <span class="indicator-label">
                                                        <?php esc_html_e( 'Add', 'azo-ads' ); ?>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="vt-ie-content">
                                                <?php
                                                if ( ! empty( $aa ) && isset( $aa['aa_visibility_include'] ) && ! empty( $aa['aa_visibility_include'] ) ) :
                                                    $aa['aa_visibility_include'] = maybe_unserialize( $aa['aa_visibility_include'] );
                                                    foreach ( $aa['aa_visibility_include'] as $key => $value ) :
                                                ?>
                                                <span class="vt-ie-row">
                                                    <span class="desc">
                                                        <span class="type" data-label="<?php echo esc_attr( $value->type->label ); ?>" data-value="<?php echo esc_attr( $value->type->value ); ?>"><?php echo esc_html( $value->type->label ); ?></span>: <span class="value" data-label="<?php echo esc_attr( $value->value->label ); ?>" data-value="<?php echo esc_attr( $value->value->value ); ?>"><?php echo esc_html( $value->value->label ); ?></span>
                                                    </span>
                                                    <span class="cond">
                                                        <select class="azo-ads-dropdown vt-ie-cond" data-control="select2" data-minimum-results-for-search="Infinity">
                                                            <?php foreach ( array( 'and', 'or' ) as $cond ) : ?>
                                                            <option value="<?php echo esc_attr( $cond ); ?>"<?php echo ( $cond == $value->condition ) ? ' selected' : ''; ?>><?php echo esc_html( strtoupper( $cond ) ); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </span>
                                                    <span class="remove"></span>
                                                </span>
                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </div>
                                        </div>

                                        <div class="vt-ie" data-type="ve">
                                            <div class="vt-ie-label">
                                                <?php esc_html_e( 'Exclude On', 'azo-ads' ); ?> <span class="btn btn-minus"><span>
                                            </div>
                                            <div class="vt-ie-form">
                                                <select name="ve-type" id="ve-type" class="azo-ads-dropdown vt-type" data-type="visibility" data-control="select2" data-placeholder="<?php esc_html_e( 'Choose Type', 'azo-ads' ); ?>">
                                                    <option value=""></option>
                                                    <?php foreach ( $azo_ads_vt as $key => $value ) : ?>
                                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <select name="ve-value" id="ve-value" class="azo-ads-dropdown vt-value" data-control="select2" data-placeholder="<?php esc_html_e( 'Choose Value', 'azo-ads' ); ?>">
                                                </select>
                                                <button type="button" class="azo-btn azo-btn-primary btn-add">
                                                    <span class="indicator-label">
                                                        <?php esc_html_e( 'Add', 'azo-ads' ); ?>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="vt-ie-content">
                                                <?php
                                                if ( ! empty( $aa ) && isset( $aa['aa_visibility_exclude'] ) && ! empty( $aa['aa_visibility_exclude'] ) ) :
                                                    $aa['aa_visibility_exclude'] = maybe_unserialize( $aa['aa_visibility_exclude'] );
                                                    // print_r($aa['aa_visibility_exclude']);
                                                    foreach ( $aa['aa_visibility_exclude'] as $key => $value ) :
                                                ?>
                                                <span class="vt-ie-row">
                                                    <span class="desc">
                                                        <span class="type" data-label="<?php echo esc_attr( $value->type->label ); ?>" data-value="<?php echo esc_attr( $value->type->value ); ?>"><?php echo esc_html( $value->type->label ); ?></span>: <span class="value" data-label="<?php echo esc_attr( $value->value->label ); ?>" data-value="<?php echo esc_attr( $value->value->value ); ?>"><?php echo esc_html( $value->value->label ); ?></span>
                                                    </span>
                                                    <span class="cond">
                                                        <select class="azo-ads-dropdown vt-ie-cond" data-control="select2" data-minimum-results-for-search="Infinity">
                                                            <?php foreach ( array( 'and', 'or' ) as $cond ) : ?>
                                                            <option value="<?php echo esc_attr( $cond ); ?>"<?php echo ( $cond == $value->condition ) ? ' selected' : ''; ?>><?php echo esc_html( strtoupper( $cond ) ); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </span>
                                                    <span class="remove"></span>
                                                </span>
                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="azo-ads-row row-divider">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Targeting', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Conditions for showing your ad', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Controlling the conditions to show the ad', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="vt-container">

                                        <div class="vt-ie" data-type="ti">
                                            <div class="vt-ie-label">
                                                <?php esc_html_e( 'Include On', 'azo-ads' ); ?> <span class="btn btn-plus"><span>
                                            </div>
                                            <div class="vt-ie-form">
                                                <select name="ti-type" id="ti-type" class="azo-ads-dropdown vt-type" data-type="targeting" data-control="select2" data-placeholder="<?php esc_html_e( 'Choose Type', 'azo-ads' ); ?>">
                                                    <option value=""></option>
                                                    <?php
                                                    $azo_ads_vt = azoads_get_list_targeting();
                                                    foreach ( $azo_ads_vt as $key => $value ) :
                                                    ?>
                                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo ( ( ! defined( 'AZOADS_PRO_VERSION' ) || ! azoads_activated_pro() ) && in_array( $key, azoads_get_list_targeting_only_pro() ) ) ? esc_html( $value ) . ' (Pro)' : esc_html( $value ); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <select name="ti-value" id="ti-value" class="azo-ads-dropdown vt-value" data-control="select2" data-placeholder="<?php esc_html_e( 'Choose Value', 'azo-ads' ); ?>">
                                                </select>
                                                <button type="button" class="azo-btn azo-btn-primary btn-add">
                                                    <span class="indicator-label">
                                                        <?php esc_html_e( 'Add', 'azo-ads' ); ?>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="vt-ie-content">
                                                <?php
                                                if ( ! empty( $aa ) && isset( $aa['aa_targeting_include'] ) && ! empty( $aa['aa_targeting_include'] ) ) :
                                                    $aa['aa_targeting_include'] = maybe_unserialize( $aa['aa_targeting_include'] );
                                                    foreach ( $aa['aa_targeting_include'] as $key => $value ) :
                                                ?>
                                                <span class="vt-ie-row">
                                                    <span class="desc">
                                                        <span class="type" data-label="<?php echo esc_attr( $value->type->label ); ?>" data-value="<?php echo esc_attr( $value->type->value ); ?>"><?php echo esc_html( $value->type->label ); ?></span>: <span class="value" data-label="<?php echo esc_attr( $value->value->label ); ?>" data-value="<?php echo esc_attr( $value->value->value ); ?>"><?php echo esc_html( $value->value->label ); ?></span>
                                                    </span>
                                                    <span class="cond">
                                                        <select class="azo-ads-dropdown vt-ie-cond" data-control="select2" data-minimum-results-for-search="Infinity">
                                                            <?php foreach ( array( 'and', 'or' ) as $cond ) : ?>
                                                            <option value="<?php echo esc_attr( $cond ); ?>"<?php echo ( $cond == $value->condition ) ? ' selected' : ''; ?>><?php echo esc_html( strtoupper( $cond ) ); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </span>
                                                    <span class="remove"></span>
                                                </span>
                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </div>
                                        </div>

                                        <div class="vt-ie" data-type="te">
                                            <div class="vt-ie-label">
                                                <?php esc_html_e( 'Exclude On', 'azo-ads' ); ?> <span class="btn btn-minus"><span>
                                            </div>
                                            <div class="vt-ie-form">
                                                <select name="te-type" id="te-type" class="azo-ads-dropdown vt-type" data-type="targeting" data-control="select2" data-placeholder="<?php esc_html_e( 'Choose Type', 'azo-ads' ); ?>">
                                                    <option value=""></option>
                                                    <?php foreach ( $azo_ads_vt as $key => $value ) : ?>
                                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo ( ( ! defined( 'AZOADS_PRO_VERSION' ) || ! azoads_activated_pro() ) && in_array( $key, azoads_get_list_targeting_only_pro() ) ) ? esc_html( $value ) . ' (Pro)' : esc_html( $value ); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <select name="te-value" id="te-value" class="azo-ads-dropdown vt-value" data-control="select2" data-placeholder="<?php esc_html_e( 'Choose Value', 'azo-ads' ); ?>">
                                                </select>
                                                <button type="button" class="azo-btn azo-btn-primary btn-add">
                                                    <span class="indicator-label">
                                                        <?php esc_html_e( 'Add', 'azo-ads' ); ?>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="vt-ie-content">
                                                <?php
                                                if ( ! empty( $aa ) && isset( $aa['aa_targeting_exclude'] ) && ! empty( $aa['aa_targeting_exclude'] ) ) :
                                                    $aa['aa_targeting_exclude'] = maybe_unserialize( $aa['aa_targeting_exclude'] );
                                                    foreach ( $aa['aa_targeting_exclude'] as $key => $value ) :
                                                ?>
                                                <span class="vt-ie-row">
                                                    <span class="desc">
                                                        <span class="type" data-label="<?php echo esc_attr( $value->type->label ); ?>" data-value="<?php echo esc_attr( $value->type->value ); ?>"><?php echo esc_html( $value->type->label ); ?></span>: <span class="value" data-label="<?php echo esc_attr( $value->value->label ); ?>" data-value="<?php echo esc_attr( $value->value->value ); ?>"><?php echo esc_html( $value->value->label ); ?></span>
                                                    </span>
                                                    <span class="cond">
                                                        <select class="azo-ads-dropdown vt-ie-cond" data-control="select2" data-minimum-results-for-search="Infinity">
                                                            <?php foreach ( array( 'and', 'or' ) as $cond ) : ?>
                                                            <option value="<?php echo esc_attr( $cond ); ?>"<?php echo ( $cond == $value->condition ) ? ' selected' : ''; ?>><?php echo esc_html( strtoupper( $cond ) ); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </span>
                                                    <span class="remove"></span>
                                                </span>
                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="ads-ad-step" id="ads-add-publish">
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="ad-manage-success">
                                    <img src="<?php echo esc_html( AZOADS_BASE_URL ); ?>/assets/images/ad_manage_success.png" alt="">
                                    <h3><?php esc_html_e( 'Your ad has been published successfully.', 'azo-ads' ); ?></h3>
                                    <div class="ad-manage-nav">
                                        <a href="admin.php?page=<?php echo esc_html( AZOADS_SLUG ); ?>-manage&id=<?php echo esc_html( $id ); ?>" class="azo-btn btn-manage-nav edit-again">
                                            <span class="icon icon_edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M58.57 323.5L362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C495.8 61.87 498.5 65.24 500.9 68.79C517.3 93.63 514.6 127.4 492.7 149.3L188.5 453.4C187.2 454.7 185.9 455.1 184.5 457.2C174.9 465.7 163.5 471.1 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L58.57 323.5zM82.42 374.4L59.44 452.6L137.6 429.6C143.1 427.7 149.8 424.2 154.6 419.5L383 191L320.1 128.1L92.51 357.4C91.92 358 91.35 358.6 90.8 359.3C86.94 363.6 84.07 368.8 82.42 374.4L82.42 374.4z"></path></svg></span>
                                            <span class="label"><?php esc_html_e( 'Edit it again', 'azo-ads' ); ?></span>
                                        </a>
                                        <a href="admin.php?page=<?php echo esc_html( AZOADS_SLUG ); ?>-ads" class="azo-btn btn-manage-nav">
                                            <span class="icon icon_listing"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M120.4 64c4-36 34.5-64 71.6-64s67.6 28 71.6 64H272c20.9 0 38.7 13.4 45.3 32H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64h2.7C73.3 77.4 91.1 64 112 64h8.4zM64 112c-26.5 0-48 21.5-48 48V448c0 26.5 21.5 48 48 48H320c26.5 0 48-21.5 48-48V160c0-26.5-21.5-48-48-48v16c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V112zM192 16c-30.9 0-56 25.1-56 56c0 4.4-3.6 8-8 8H112c-17.7 0-32 14.3-32 32v16c0 8.8 7.2 16 16 16H288c8.8 0 16-7.2 16-16V112c0-17.7-14.3-32-32-32H256c-4.4 0-8-3.6-8-8c0-30.9-25.1-56-56-56zM176 80a16 16 0 1 1 32 0 16 16 0 1 1 -32 0zM160 224c0-4.4 3.6-8 8-8H312c4.4 0 8 3.6 8 8s-3.6 8-8 8H168c-4.4 0-8-3.6-8-8zm0 96c0-4.4 3.6-8 8-8H312c4.4 0 8 3.6 8 8s-3.6 8-8 8H168c-4.4 0-8-3.6-8-8zm0 96c0-4.4 3.6-8 8-8H312c4.4 0 8 3.6 8 8s-3.6 8-8 8H168c-4.4 0-8-3.6-8-8zM96 400a16 16 0 1 1 0 32 16 16 0 1 1 0-32zM80 320a16 16 0 1 1 32 0 16 16 0 1 1 -32 0zM96 208a16 16 0 1 1 0 32 16 16 0 1 1 0-32z"/></svg></span>
                                            <span class="label"><?php esc_html_e( 'Go to the ad listing', 'azo-ads' ); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- form submit -->
                    <div class="form-btn">
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content">
                                    <button type="reset" class="azo-btn azo-btn-light btn-back" style="visibility: hidden;">
                                        <span class="indicator-label">
                                            <?php esc_html_e( 'Back', 'azo-ads' ); ?>
                                        </span>
                                    </button>
                                    <button type="submit" class="azo-btn azo-btn-primary btn-continue">
                                        <span class="indicator-label">
                                            <?php esc_html_e( 'Continue', 'azo-ads' ); ?>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // form submit -->

                    <input type="hidden" name="id" id="id" value="<?php echo esc_html( $id ); ?>">
                    <?php wp_nonce_field( 'azoads-manage-ad', '_wpnonce' ); ?>
                    </form>

                </div>

            </div>

        </div>
        <!--end::Card body-->

    </div>

</div>
<?php include 'footer.php'; ?>