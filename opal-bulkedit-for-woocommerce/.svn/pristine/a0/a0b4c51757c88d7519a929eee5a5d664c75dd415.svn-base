<?php
/** 
 * OPBW Process
 * 
 * @uses history_id
 * 
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly    

?>
<div id="opbw-process" class="opbw-box">
    <div class="opbw_header_settings opbw-flex opbw_flex_justify_space_between">
        <h2 class="opbw_title_page"><?php esc_html_e('Process', 'opal-bulkedit-for-woocommerce') ?></h2>
    </div>
    <form class="opbw-inner-box opbw-form" action="" method="post">
        <input type="hidden" name="opbw_history" value="<?php echo esc_attr($history_id) ?>">
        <div class="opbw-content">
            <div class="options_group">
                <h3><?php esc_html_e('Actions', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'action_run',
                                'value'       => 'now',
                                'options'     => [
                                    'now' => __( 'Now', 'opal-bulkedit-for-woocommerce' ),
                                    'later' => __( 'Later (Comming soon)', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Run', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li class="trigger-condition <?php echo esc_attr('hidden_setting') ?>" data-condition="action_run" data-condition-value="none">
                        <div class="mb">
                        <?php
                            woocommerce_wp_text_input(
                                array(
                                    'id'          => 'time_run',
                                    'value'       => '',
                                    'label'       => __( 'Scheduling Time Run', 'opal-bulkedit-for-woocommerce' ),
                                    'wrapper_class' => 'opbw_setting_form', 
                                    'class' => 'opbw_setting_field opbw_field opbw_datetime_field',
                                    'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                    'desc_tip' => true,
                                    'placeholder' => esc_html( _x( 'Run at', 'placeholder', 'opal-bulkedit-for-woocommerce' ) ) . ' YYYY-MM-DD H:i:S',
                                )
                            );
                        ?>
                        </div>
                        <div>
                        <?php
                            woocommerce_wp_select(
                                array(
                                    'id'          => 'run_after',
                                    'value'       => 'now',
                                    'options'     => array(
                                        'hourly' => __( 'Once Hourly', 'opal-bulkedit-for-woocommerce' ),
                                        'twicedaily'  => __( 'Twice Daily', 'opal-bulkedit-for-woocommerce' ),
                                        'daily'  => __( 'Once Daily', 'opal-bulkedit-for-woocommerce' ),
                                        'opbw_twodays'  => __( 'Every 2 Days', 'opal-bulkedit-for-woocommerce' ),
                                        'opbw_threedays'  => __( 'Every 3 Days', 'opal-bulkedit-for-woocommerce' ),
                                        'opbw_fourdays'  => __( 'Every 4 Days', 'opal-bulkedit-for-woocommerce' ),
                                        'opbw_fivedays'  => __( 'Every 5 Days', 'opal-bulkedit-for-woocommerce' ),
                                        'opbw_sixdays'  => __( 'Every 6 Days', 'opal-bulkedit-for-woocommerce' ),
                                        'weekly'  => __( 'Once Weekly', 'opal-bulkedit-for-woocommerce' ),
                                    ),
                                    'label'       => __( 'Run After', 'opal-bulkedit-for-woocommerce' ),
                                    'wrapper_class' => 'opbw_setting_form', 
                                    'class' => 'opbw_setting_field opbw_field',
                                    'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                    'desc_tip' => true,
                                )
                            );
                        ?>
                        </div>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_text_input(
                            array(
                                'id'          => 'edit_name',
                                'value'       => '',
                                'label'       => __( 'Bulkedit Name', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'placeholder' => __( 'Enter name ...', 'opal-bulkedit-for-woocommerce' ),
                            )
                        );
                    ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="opbw_action mt">
            <div class="opbw-flex opbw_flex_justify_space_between">
                <div class="opbw-flex">
                    <button type="button" class="opbw_back_step button button-hero button-primary" data-stepback="3" style="margin-right: 15px;"><?php esc_html_e('Back', 'opal-bulkedit-for-woocommerce') ?></button>
                </div>
                <button type="submit" id="opbw_submit_process" class="button button-hero button-primary"><?php esc_html_e('Save', 'opal-bulkedit-for-woocommerce') ?></button>
            </div>
        </div>
    </form>
</div>