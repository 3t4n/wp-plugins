<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://acewebx.com
 * @since      1.0.0
 *
 * @package    Ace_Social_Chat
 * @subpackage Ace_Social_Chat/admin/partials
 */
global $post;

$post_id = $post->ID;
$data = get_post_meta($post_id, '_ace_wtp_member_acc_', true);

$wDays = (isset($data['ace_member_weekdays'])) ? $data['ace_member_weekdays'] : '';

if (!empty($data['ace_member_all_days']) == 1) : $always_online = 'checked="checked"';
endif; ?>

<div class="ace-wtm-content">
    <div class="ace-wtm-container">
        <div class="ace-wtm-row ace-wtm-no-label">
            <label for="ace_member_number">Agent WhatApp No.</label>
        </div>
        <div class="ace-wtm-row ace-wtm-column ace-wtm-no-field">
            <input type="text" name="member_number" id="ace_member_number" value="<?php (isset($data['ace_member_number'])) ? _e($data['ace_member_number']) : ''; ?>">
        </div>
    </div>
    <div class="ace-wtm-container">
        <div class="ace-wtm-row ace-wtm-position-label">
            <label for="ace_member_position">Agent Position</label>
        </div>
        <div class="ace-wtm-row ace-wtm-column ace-wtm-position-field">
            <input type="text" name="member_position" id="ace_member_position" value="<?php (isset($data['ace_member_position'])) ? _e($data['ace_member_position']) : ''; ?>">
        </div>
    </div>
    <div class="ace-wtm-container">
        <div class="ace-wtm-row ace-wtm-position-label">
            <label for="ace_member_position">Agent Message</label>
        </div>
        <div class="ace-wtm-row ace-wtm-column ace-wtm-position-field">
            <input type="text" name="member_message" id="ace_member_position" value="<?php (isset($data['ace_member_message'])) ? _e($data['ace_member_message']) : ''; ?>">
        </div>
    </div>
    <div class="ace-wtm-container">
        <div class="ace-wtm-row ace-wtm-btntext-label">
            <label for="ace_member_btntext">Button Text</label>
        </div>
        <div class="ace-wtm-row ace-wtm-column ace-wtm-btntext-field">
            <input type="text" name="member_btntext" id="ace_member_btntext" value="<?php (isset($data['ace_member_btntext'])) ? _e($data['ace_member_btntext']) : ''; ?>">
        </div>
    </div>

    <div class="ace-wtm-container">
        <div class="ace-wtm-row ace-wtm-online-label">
            <label for="ace_member_all_days">Agent Always Online</label>
        </div>
        <div class="ace-wtm-row ace-wtm-column ace-wtm-online-field">
            <label class="switch">
                <input type="checkbox" name="member_all_days" id="ace_member_all_days" value="1" <?php (isset($always_online)) ? _e($always_online) : ''; ?>>
                <span class="slider"></span>
            </label>
            </label>
        </div>
    </div>
    <div class="ace-wtm-container  ace-wtm-container-custom">
        <div class="ace-wtm-row ace-wtm-custon-label">
            <label>Custom Availability</label>
        </div>
        <div class="ace-wtm-row ace-wtm-column ace-wtm-custon-field">
            <ul>
                <?php
                $daysArr = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                foreach ($daysArr as $key => $sDay) {

                    $wDch = (isset($wDays[$sDay]['ischecked'])) ? 'checked' : '';
                    $sTime = (isset($wDays[$sDay]['start_time'])) ? $wDays[$sDay]['start_time'] : '';
                    $eTime = (isset($wDays[$sDay]['end_time'])) ? $wDays[$sDay]['end_time'] : '';

                ?>
                    <li>
                        <!-- sunday time  -->
                        <div class="ace-all-days-column">
                            <div class="ace-day-fields ace-day-checkbox">
                                <input type="checkbox" id="ace_<?php echo $sDay; ?>" name="day[<?php echo $sDay; ?>][ischecked]" value="1" <?php _e($wDch); ?>>
                            </div>
                            <div class="ace-day-fields ace-day-label ace-sun-label">
                                <label for="ace_<?php echo $sDay; ?>" class="ace-label "><?php echo $sDay; ?></label>
                            </div>
                            <div class="ace-day-fields ace-day-start-time">
                                <select name="day[<?php echo $sDay; ?>][start_time]" class="slct ace-selct-sun-start">
                                    <option value="">Start Time</option>
                                    <?php for ($i = 0; $i <= 23; $i++) {
                                        $t = $i . ":00";
                                    ?>
                                        <option value="<?php echo $t; ?>" <?php if (!empty($sTime) && $sTime == $t) echo 'selected'; ?>>
                                            <?php echo $t; ?></option>
                                    <?php     } ?>
                                </select>
                            </div>
                            <div class="ace-day-fields ace-day-end-time">
                                <select name="day[<?php echo $sDay; ?>][end_time]" class="slct ace-slct-sun-end">
                                    <option value="">End Time</option>
                                    <?php for ($i = 0; $i <= 23; $i++) {
                                        $t = $i . ':00'; ?>
                                        <option value="<?php echo $t; ?>" <?php if (!empty($eTime) && $eTime == $t) echo 'selected'; ?>>
                                            <?php echo $t; ?></option>
                                    <?php     } ?>
                                </select>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>