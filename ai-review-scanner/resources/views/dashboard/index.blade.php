@php
   if ( ! defined( 'ABSPATH' ) ) exit;
   $token = $plugin->options['ars_request_settings']['ars_api_token'];
   $ars_api_url = $plugin->options['ars_request_settings']['ars_api_url'];
   $ars_enable_auto_approve = $plugin->options['ars_request_settings']['ars_enable_auto_approve'];
   $rating_threshold = $plugin->options['ars_request_settings']['rating_threshold'];
   $rule_conditions = $plugin->options['ars_request_settings']['rule_conditions'];
   $success = $variables[0]['success']??null;
   $error = $variables[0]['error']??null;
@endphp

@isset($success)
    <div id="notification-bar-success" role="alert">
        {{ $success }}
    </div>
@endisset
@isset($error)
    <div id="notification-bar-error" role="alert">
        {{ $error }}
    </div>
@endisset

<div id="wpbody" role="main">
    <div id="wpbody-content">
        <div class="wrap">
            <h1>AI Review Scanner Settings</h1>
            <form method="post" novalidate="novalidate">
                <?php wp_nonce_field('ars_request_settings'); ?>
                <table class="form-table" role="presentation">
                    <tbody>
                    <tr>
                        <th scope="row">AI Review Scanner Token</th>
                        <td>
                            <input name="ars_request_settings/ars_api_token" type="text" id="ars_api_token"
                                   value="{{$token}}"
                                   class="regular-text">
                            <p class="date-time-doc">
                                <a
                                        href="{{$ars_api_url}}">Generate
                                    AI Review Scanner Token</a></p>
                        </td>
                    </tr>


                    <tr>
                        <th scope="row">Auto Approve Review On Scan:</th>
                        <td>
                            <input type="hidden"
                                   name="ars_request_settings/ars_enable_auto_approve"
                                   value="false"/>
                            <input type="checkbox"
                                   id="ars_enable_auto_approve"
                                   name="ars_request_settings/ars_enable_auto_approve"
                                   onchange="toggleVisibility()"
                                   <?php checked('true', $ars_enable_auto_approve) ?>
                                   value="true"/>
                            <label for="ars_enable_auto_approve">Enable</label>
                        </td>
                    </tr>

                    <tr id="rating_threshold_section" style="display:none;">
                        <th scope="row">Select AI Review Rating Threshold:</th>
                        <td>
                            <input type="range" id="rating_threshold" name="ars_request_settings/rating_threshold"
                                   min="1" max="5"
                                   value="{{$rating_threshold??4}}"
                                   oninput="updateOutput(this.value)">
                            <span id="rating_value">{{$rating_threshold??4}}</span>
                        </td>
                    </tr>

                    <tr id="apply_rule_section" style="display:none;">
                        <th scope="row">Apply Rule When Rating Is:</th>
                        <td>
                            <div>
                                <input type="radio" id="rule_equal" name="ars_request_settings/rule_conditions"
                                       value="equal_to_threshold"
                                        {{ $rule_conditions == 'equal_to_threshold' ? 'checked' : '' }}>
                                <label for="rule_equal">Equal to Threshold</label>
                            </div>
                            <div>
                                <input type="radio" id="rule_above_equal" name="ars_request_settings/rule_conditions"
                                       value="greater_or_equal_to_threshold"
                                        {{ $rule_conditions == 'greater_or_equal_to_threshold' ? 'checked' :
                                 '' }}>
                                <label for="rule_above_equal">Above or Equal to Threshold</label>
                            </div>
                            <div>
                                <input type="radio" id="rule_below_equal" name="ars_request_settings/rule_conditions"
                                       value="less_than_to_threshold"
                                        {{ $rule_conditions == 'less_than_to_threshold' ? 'checked' : '' }}>
                                <label for="rule_below_equal">Below Threshold</label>
                            </div>
                            <div>
                                <input type="radio" id="rule_below" name="ars_request_settings/rule_conditions"
                                       value="less_or_equal_to_threshold"
                                        {{ $rule_conditions == 'less_or_equal_to_threshold' ? 'checked' : ''
                                 }}>
                                <label for="rule_below">Below or Equal to Threshold</label>
                            </div>
                        </td>
                    </tr>


                    </tbody>

                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary"
                           value="Save Changes"></p></form>
        </div>
        <div class="clear"></div>
    </div>
</div>
