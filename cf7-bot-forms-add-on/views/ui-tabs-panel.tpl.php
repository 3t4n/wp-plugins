<?php if(!defined( 'ABSPATH')) exit; ?>
<div class="cf7bot">
    <h2> Conversational Form Settings</h2>
    <fieldset>
        <div class="cf7bot-col-5" >
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row">Activate</th>
                    <td>
                        <input type="checkbox" name="cf7bot_enabled" id="cf7bot_enabled" value="1" {enabled}>
                        <label for="cf7bot_enabled">Enable</label>
                        <p class="description">Activate Form Integration</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Toggle Button</th>
                    <td>
                        <input type="text" name="cf7bot_toggle" class="large-text code" value="{toggle}" placeholder="e.g. #toggle">
                        <p class="description">Toggle Button element (jQuery) Selector</b></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Form ID (CSS)</th>
                    <td>
                        <input type="text" name="cf7bot_form_id" class="large-text code" value="{form_id}" placeholder="e.g. conversational">
                        <p class="description">Form HTML ID (without #)</b></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Conversational Form Holder</th>
                    <td>
                        <input type="text" name="cf7bot_form_outer" class="large-text code" value="{form_outer}" placeholder="e.g. form-outer">
                        <p class="description">DIV Container ID</b></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Upload Bot Icon</th>
                    <td class="submitbox" >
                        {bot_icon_image}
                        <a title="Upload Bot image" data-input="bot_icon_image" data-image="bot_icon_img" class="add-new-h2 upload_icon_cf7bot" href="javascript:;">Upload Image</a>
                        <a title="Remove Bot image" data-input="bot_icon_image" data-image="bot_icon_img"  class="submitdelete remove_icon_cf7bot" href="javascript:;">Remove Image</a>
                        <input type="hidden" name="cf7bot_bot_icon" id="bot_icon_image" value="{bot_icon}" >
                    </td>
                </tr>
                <tr>
                    <th scope="row">Upload User Icon</th>
                    <td class="submitbox" >
                        {user_icon_image}
                        <a title="Upload User Icon" data-input="user_icon_image" data-image="user_icon_img" class="add-new-h2 upload_icon_cf7bot" href="javascript:;">Upload Image</a>
                        <a title="Remove User Icon" data-input="user_icon_image" data-image="user_icon_img" class="submitdelete remove_icon_cf7bot" href="javascript:;">Remove Image</a>
                        <input type="hidden" name="cf7bot_user_icon" id="user_icon_image" value="{user_icon}" >
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="cf7bot-col-7" >
            <table class="form-table">
                <tbody>
                <tr>
                    <td scope="row">Form Fields <b>(Required)</b></td>
                </tr>
                <tr>
                    <td class="valign-top">
                        <div class="cf7bot_form_field_names_wrap">
                            <span class="cf7bot_form_fields"></span>
                        </div>
                        {form_fields_html}
                        <p class="cf7_field_names"></p>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </fieldset>
</div>
