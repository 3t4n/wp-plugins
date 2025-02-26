<div class="wrap">
    <h2><?php echo __("Cyberimpact Subscribe Form Setup", "wp-cyber")?></h2> 
    <h2><?php echo __( 'French widget options', 'wp-cyber' ); ?></h2>
    




    <form method="post" action="options.php">
        <?php 
        @settings_fields('wp_cyber_widget_fr');  
        //@settings_fields('wp_cyber_target_groups'); 
        @settings_errors('wp_cyber_widget_fr'); 
        //@settings_errors('wp_cyber_target_groups'); 
        @do_settings_fields('wp_cyber_widget_fr');
        //@do_settings_fields('wp_cyber_target_groups'); 
 
        $cyber_widget =  get_option('cyber_widget_fr');





        $cyber_target_group_options =  get_option('cyber_target_groups_fr');
        ?>
        
        <?php if ( isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated'] == true && !count(get_settings_errors('wp_cyber_widget'))) : ?>
            <div id='message' class='updated below-h2'><p><?php echo __( 'Widget settings saved', 'wp-cyber' ); ?></p></div>
        <?php endif; ?> 

        <fieldset>
        <h3><?php echo __("Mandatory fields", "wp-cyber")?></h3>
        <p><?php echo __("These fields will always be visible", "wp-cyber")?></p>
        <table  style="width:auto" class="form-table">

            <input type="hidden" name='cyber_widget_fr[language]' value="fr_ca" />



            <tr valign="middle"> 
                <th scope="row"><label for="cyber_header"><?php echo __("Header", "wp-cyber")?></label></th> 
                <td width="30em"><input type="text" class='regular-text' name="cyber_widget_fr[header]" id="cyber_header" value="<?php echo $cyber_widget['header']?>" placeholder="<?php echo __("Form title", "wp-cyber")?>" /></td> 
                <td><i><?php echo __("Can be text, HTML markup or empty", "wp-cyber")?></i></td>
            </tr> 
            <tr valign="middle"> 
                <th scope="row"><label for="cyber_email"><?php echo __("Email:", "wp-cyber")?></label></th> 
                <td width="30em"><input type="text" class='regular-text' name="cyber_widget_fr[email]" id="cyber_email" value="<?php echo $cyber_widget['email']?>" placeholder="<?php echo __('Email', 'wp-cyber')?>" /></td> 
                <td ><i></i></td>
            </tr> 
            <tr valign="middle"> 
                <th scope="row"><label for="cyber_submit"><?php echo __("Submit button:", "wp-cyber")?></label></th> 
                <td width="30em"><input type="text" class='regular-text' name="cyber_widget_fr[submit]" id="cyber_submit" value="<?php echo $cyber_widget['submit']?>" placeholder="<?php echo __('Send', 'wp-cyber')?>" /></td> 
                <td ><i><?php echo __("Can be text, HTML markup or empty", "wp-cyber")?></i></td>
            </tr> 
        </table>
        <hr/> 
        <h3><?php echo __("Optional fields", "wp-cyber")?></h3>
        <p><?php echo __("Customize your form to show and/or change the labels for these fields.", "wp-cyber")?></p>
        <table  style="width:auto" class="form-table"> 


            <tr valign="middle"> 
                <td width="30em">
                    <div class='cyber_fld'><input type="text" class='regular-text' name="cyber_widget_fr[firstname]" value="<?php echo $cyber_widget['firstname']?>" placeholder="<?php echo __("First name:", "wp-cyber")?>" /></div>
                    <div class='cyber_mandatory'>
                    <input type="checkbox" name="cyber_widget_fr[mandatory_firstname]" id='cyber_mandatory_firstname' value="1" <?php echo isset($cyber_widget['mandatory_firstname'])?"checked":""?>/> 
                    <label for="cyber_mandatory_firstname"><?php echo __("Mandatory:", "wp-cyber")?></label>
                    </div>
                    

                </td> 
                <td width="30em">
                    <div class='cyber_fld'><input type="text" class='regular-text' name="cyber_widget_fr[lastname]" value="<?php echo $cyber_widget['lastname']?>" placeholder="<?php echo __("Last name:", "wp-cyber")?>" /></div>
                    <div class='cyber_mandatory'>
                    <input type="checkbox" name="cyber_widget_fr[mandatory_lastname]" id='cyber_mandatory_lastname' value="1" <?php echo isset($cyber_widget['mandatory_lastname'])?"checked":""?>/> 
                    <label for="cyber_mandatory_lastname"><?php echo __("Mandatory:", "wp-cyber")?></label>
                    </div>
                </td>
            </tr>



            <tr valign="middle"> 
                <td width="30em">
                    <div class='cyber_fld'>
                    <input type="text" name="cyber_widget_fr[gender]" value="<?php echo $cyber_widget['gender']?>" placeholder="<?php echo __("Gender", "wp-cyber")?>"/>
                    <?php echo __("M:", "wp-cyber")?><input type="text" name="cyber_widget_fr[gender_m]" value="<?php echo $cyber_widget['gender_m']?>" class="small-text" placeholder="<?php echo __("M:", "wp-cyber")?>" />
                    <?php echo __("F:", "wp-cyber")?><input type="text" name="cyber_widget_fr[gender_f]" value="<?php echo $cyber_widget['gender_f']?>" class="small-text" placeholder="<?php echo __("F:", "wp-cyber")?>" />
                    </div>
                    <div class='cyber_mandatory'>
                    <input type="checkbox" name="cyber_widget_fr[mandatory_gender]" id='cyber_mandatory_gender' value="1" <?php echo isset($cyber_widget['mandatory_gender'])?"checked":""?> /> 
                    <label for="cyber_mandatory_gender"><?php echo __("Mandatory:", "wp-cyber")?></label>
                    </div>
                </td> 
                <td width="30em">
                    <div class='cyber_fld'><input type="text" class='regular-text' name="cyber_widget_fr[birthdate]" value="<?php echo $cyber_widget['birthdate']?>" placeholder="<?php echo __("Date of birth", "wp-cyber")?>" /></div>
                    <div class='cyber_mandatory'>
                    <input type="checkbox" name="cyber_widget_fr[mandatory_birthdate]" id='cyber_mandatory_birthdate' value="1" <?php echo isset($cyber_widget['mandatory_birthdate'])?"checked":""?>/> 
                    <label for="cyber_mandatory_birthdate"><?php echo __("Mandatory:", "wp-cyber")?></label>
                    </div>
                </td> 
            </tr> 
            <tr valign="middle"> 
                <td width="30em">
                    <div class='cyber_fld'><input type="text" class='regular-text' name="cyber_widget_fr[postal_code]" value="<?php echo $cyber_widget['postal_code']?>" placeholder="<?php echo __("Postal code", "wp-cyber")?>" /></div>
                    <div class='cyber_mandatory'>
                    <input type="checkbox" name="cyber_widget_fr[mandatory_postal_code]" id='cyber_mandatory_postal_code' value="1" <?php echo isset($cyber_widget['mandatory_postal_code'])?"checked":""?>/> 
                    <label for="cyber_mandatory_postal_code"><?php echo __("Mandatory:", "wp-cyber")?></label>
                    </div>
                </td> 
                <td width="30em">
                    <div class='cyber_fld'><input type="text" class='regular-text' name="cyber_widget_fr[note]" value="<?php echo $cyber_widget['note']?>" placeholder="<?php echo __("Memo", "wp-cyber")?>" /></div>
                    <div class='cyber_mandatory'>
                    <input type="checkbox" name="cyber_widget_fr[mandatory_note]" id='cyber_mandatory_note' value="1" <?php echo isset($cyber_widget['mandatory_note'])?"checked":""?>/> 
                    <label for="cyber_mandatory_note"><?php echo __("Mandatory:", "wp-cyber")?></label>
                    </div>
                </td>
            </tr> 
            <tr valign="middle">
                <td>
                     <input type="checkbox" name="cyber_widget_fr[use_custom_field_1]" id='cyber_use_custom_field_1' value="1" <?php echo isset($cyber_widget['use_custom_field_1'])?"checked":""?> />
                     <label id='label_cyber_use_custom_field_1'  for="cyber_use_custom_field_1" title='<?php echo __("Custom field 1", "wp-cyber")?>'><?php echo $cyber_widget['custom_field_1']?$cyber_widget['custom_field_1']:__("Custom field 1", "wp-cyber")?></label>
                     <a rel='custom_field_1' href="#TB_inline?height=300&amp;width=400&amp;inlineId=cyber_edit_custom" title="<?php echo __("Edit custom field 1", "wp-cyber")?>" class="thickbox cyber_custom_field" ><?php echo __("Edit", "wp-cyber")?></a>
                     <input type="hidden" name="cyber_widget_fr[mandatory_custom_field_1]" id="cyber_widget_mandatory_custom_field_1" value="<?php echo $cyber_widget['mandatory_custom_field_1']?>" />
                     <input type="hidden" name="cyber_widget_fr[custom_field_1]" id="cyber_widget_custom_field_1" value="<?php echo $cyber_widget['custom_field_1']?>" />
                     <input type="hidden" name="cyber_widget_fr[type_custom_field_1]" id="cyber_widget_type_custom_field_1" value="<?php echo $cyber_widget['type_custom_field_1']?>" />
                     <input type="hidden" name="cyber_widget_fr[options_custom_field_1]" id="cyber_widget_options_custom_field_1" value="<?php echo $cyber_widget['options_custom_field_1']?>" />
                </td> 
                <td>
                     <input type="checkbox" name="cyber_widget_fr[use_custom_field_2]" id='cyber_use_custom_field_2' value="1" <?php echo isset($cyber_widget['use_custom_field_2'])?"checked":""?> />
                     <label id='label_cyber_use_custom_field_2'  for="cyber_use_custom_field_2" title='<?php echo __("Custom field 2", "wp-cyber")?>'><?php echo $cyber_widget['custom_field_2']?$cyber_widget['custom_field_2']:__("Custom field 2", "wp-cyber")?></label>
                     <a rel='custom_field_2'  href="#TB_inline?height=300&amp;width=400&amp;inlineId=cyber_edit_custom" title="<?php echo __("Edit custom field 2", "wp-cyber")?>" class="thickbox cyber_custom_field" ><?php echo __("Edit", "wp-cyber")?></a>
                     <input type="hidden" name="cyber_widget_fr[mandatory_custom_field_2]" id="cyber_widget_mandatory_custom_field_2" value="<?php echo $cyber_widget['mandatory_custom_field_2']?>" />
                     <input type="hidden" name="cyber_widget_fr[custom_field_2]" id="cyber_widget_custom_field_2" value="<?php echo $cyber_widget['custom_field_2']?>" />
                     <input type="hidden" name="cyber_widget_fr[type_custom_field_2]" id="cyber_widget_type_custom_field_2" value="<?php echo $cyber_widget['type_custom_field_2']?>" />
                     <input type="hidden" name="cyber_widget_fr[options_custom_field_2]" id="cyber_widget_options_custom_field_2" value="<?php echo $cyber_widget['options_custom_field_2']?>" />
                </td> 
            </tr>
            <tr valign="middle">
                <td>
                     <input type="checkbox" name="cyber_widget_fr[use_custom_field_3]" id='cyber_use_custom_field_3' value="1" <?php echo isset($cyber_widget['use_custom_field_3'])?"checked":""?> />
                     <label id='label_cyber_use_custom_field_3'  for="cyber_use_custom_field_3" title='<?php echo __("Custom field 3", "wp-cyber")?>'><?php echo $cyber_widget['custom_field_3']?$cyber_widget['custom_field_3']:__("Custom field 3", "wp-cyber")?></label>
                     <a rel='custom_field_3'  href="#TB_inline?height=300&amp;width=400&amp;inlineId=cyber_edit_custom" title="<?php echo __("Edit custom field 3", "wp-cyber")?>" class="thickbox cyber_custom_field" ><?php echo __("Edit", "wp-cyber")?></a>
                     <input type="hidden" name="cyber_widget_fr[mandatory_custom_field_3]" id="cyber_widget_mandatory_custom_field_3" value="<?php echo $cyber_widget['mandatory_custom_field_3']?>" />
                     <input type="hidden" name="cyber_widget_fr[custom_field_3]" id="cyber_widget_custom_field_3" value="<?php echo $cyber_widget['custom_field_3']?>" />
                     <input type="hidden" name="cyber_widget_fr[type_custom_field_3]" id="cyber_widget_type_custom_field_3" value="<?php echo $cyber_widget['type_custom_field_3']?>" />
                     <input type="hidden" name="cyber_widget_fr[options_custom_field_3]" id="cyber_widget_options_custom_field_3" value="<?php echo $cyber_widget['options_custom_field_3']?>" />
                </td> 
                <td>
                     <input type="checkbox" name="cyber_widget_fr[use_custom_field_4]" id='cyber_use_custom_field_4' value="1" <?php echo isset($cyber_widget['use_custom_field_4'])?"checked":""?> />
                     <label id='label_cyber_use_custom_field_4'  for="cyber_use_custom_field_4" title='<?php echo __("Custom field 4", "wp-cyber")?>'><?php echo $cyber_widget['custom_field_4']?$cyber_widget['custom_field_4']:__("Custom field 4", "wp-cyber")?></label>
                     <a rel='custom_field_4'  href="#TB_inline?height=300&amp;width=400&amp;inlineId=cyber_edit_custom" title="<?php echo __("Edit custom field 4", "wp-cyber")?>" class="thickbox cyber_custom_field" ><?php echo __("Edit", "wp-cyber")?></a>
                     <input type="hidden" name="cyber_widget_fr[mandatory_custom_field_4]" id="cyber_widget_mandatory_custom_field_4" value="<?php echo $cyber_widget['mandatory_custom_field_4']?>" />
                     <input type="hidden" name="cyber_widget_fr[custom_field_4]" id="cyber_widget_custom_field_4" value="<?php echo $cyber_widget['custom_field_4']?>" />
                     <input type="hidden" name="cyber_widget_fr[type_custom_field_4]" id="cyber_widget_type_custom_field_4" value="<?php echo $cyber_widget['type_custom_field_4']?>" />
                     <input type="hidden" name="cyber_widget_fr[options_custom_field_4]" id="cyber_widget_options_custom_field_4" value="<?php echo $cyber_widget['options_custom_field_4']?>" />
                </td> 
            </tr>
            <tr valign="middle">
                <td>
                     <input type="checkbox" name="cyber_widget_fr[use_custom_field_5]" id='cyber_use_custom_field_5' value="1" <?php echo isset($cyber_widget['use_custom_field_5'])?"checked":""?> />
                     <label id='label_cyber_use_custom_field_5' for="cyber_use_custom_field_5" title='<?php echo __("Custom field 5", "wp-cyber")?>'><?php echo $cyber_widget['custom_field_5']?$cyber_widget['custom_field_5']:__("Custom field 5", "wp-cyber")?></label>
                     <a rel='custom_field_5'  href="#TB_inline?height=300&amp;width=400&amp;inlineId=cyber_edit_custom" title="<?php echo __("Edit custom field 5", "wp-cyber")?>" class="thickbox cyber_custom_field" ><?php echo __("Edit", "wp-cyber")?></a>
                     <input type="hidden" name="cyber_widget_fr[mandatory_custom_field_5]" id="cyber_widget_mandatory_custom_field_5" value="<?php echo $cyber_widget['mandatory_custom_field_5']?>" />
                     <input type="hidden" name="cyber_widget_fr[custom_field_5]" id="cyber_widget_custom_field_5" value="<?php echo $cyber_widget['custom_field_5']?>" />
                     <input type="hidden" name="cyber_widget_fr[type_custom_field_5]" id="cyber_widget_type_custom_field_5" value="<?php echo $cyber_widget['type_custom_field_5']?>" />
                     <input type="hidden" name="cyber_widget_fr[options_custom_field_5]" id="cyber_widget_options_custom_field_5" value="<?php echo $cyber_widget['options_custom_field_5']?>" />
                </td> 
                <td>&nbsp;</td> 
            </tr>
            <?php /*
            <tr valign="middle">
                <td colspan="2">
                     <input type="checkbox" name="cyber_widget[use_poweredby]" id='cyber_use_poweredby' value="1" <?php echo isset($cyber_widget['use_poweredby'])?"checked":""?> />
                     <input type="hidden" name="cyber_widget[poweredby]" id="cyber_email" value="<a href='http://www.cyberimpact.com' target='_bank'>Powered by Cyberimpact</a>" placeholder="Email" />
                     <label for="cyber_use_poweredby"><?php echo __("A \"Powered by Cyberimpact\" link will be placed in your form if this box is checked. It is optional and it can be changed any time", "wp-cyber")?></label>
                </td> 
            </tr>
            */ ?>
        </table>
        <hr/>
        <?php
            if(isset($cyber_target_group_options['groups'])) {
                $cb_saved_groups = explode("|*|", $cyber_target_group_options['groups']);
                foreach($cb_saved_groups as $group) {
                    $parts = explode("::", $group);
                    if( count($parts) == 2) {
                        $cyber_saved_groups[$parts[0]] = $parts[1];
                    }
                    
                }
            }
        ?>
        <h3><?php echo __("Target Groups", "wp-cyber")?></h3>
        <table  style="width:auto" class="form-table"> 
            <tr valign="middle"> 
                <th scope="row"><label for="cyber_group"><?php echo __("Label:", "wp-cyber")?></label></th> 
                <td width="30em"><input type="text" class='regular-text' name="cyber_target_groups_fr[label]" id="cyber_group" value="<?php echo $cyber_target_group_options['label']?>" /></td> 
            </tr> 
            <tr valign="middle"> 
                <th width="20em" scope="row"><label for="cyber_target_groups_type"><?php echo __("Input type:", "wp-cyber")?></label></th> 
                <td><select name='cyber_target_groups_fr[group_type]' id="cyber_target_groups_type" >
                        <option><?php echo __("Select", "wp-cyber")?></option>
                        <option value="checkbox" <?php echo $cyber_target_group_options['group_type'] == "checkbox"? "selected":""?>><?php echo __("Checkboxes", "wp-cyber")?></option>
                        <option value="dropdown" <?php echo $cyber_target_group_options['group_type'] == "dropdown"? "selected":""?>><?php echo __("Drop-down list", "wp-cyber")?></option>
                </select></td>
            </tr>
            <tr valign="middle"> 
                <th scope="row"><?php echo __("Groups", "wp-cyber")?></th> 
                <td width="30em">
                    <?php
                        $cyber_groups = $this->cyber_getGroups('wp_cyber_target_groups', null);
                    ?>
                    <?php if($cyber_groups):?>
                    <table cellpadding='0' cellspacing='0' border='0'>
                        <?php foreach($cyber_groups->groups as $index => $cgroup):?>
                        <tr class='cyber-group'><td>
                            <input type="checkbox" class='cyber_widget_group' name="" rel='#cyber_group_<?php echo $cgroup->id?>_label' id='cyber_group_<?php echo $cgroup->id?>' value="<?php echo $cgroup->id?>" <?php echo isset($cyber_saved_groups[$cgroup->id])?"checked":""; ?> />
                            <label for="cyber_group_<?php echo $cgroup->id?>"><?php echo $cgroup->title; ?></label>
                        </td><td>
                            <label for="cyber_group_<?php echo $cgroup->id?>_label"><?php echo __("Label:", "wp-cyber")?></label>
                            <input type="text" class='medium-text cyber_group_name' rel="" id="cyber_group_<?php echo $cgroup->id?>_label" value="<?php echo isset($cyber_saved_groups[$cgroup->id])?$cyber_saved_groups[$cgroup->id]:$cgroup->title; ?>" />
                        </td></tr>
                        <?php endforeach;?>    
                    </table>                  
                        <input type="hidden" name="cyber_target_groups_fr[groups]" id="cyber_widget_groups" value="<?php echo $cyber_target_group_options['groups']?>S" />
                    <?php else:?>
                        <?php echo __("No groups defined in Cyberimpact account", "wp-cyber")?>
                    <?php endif;?>  
                </td> 
            </tr> 
        </table>

        <hr/>
        <h3><?php echo __("Confirmation pages", "wp-cyber")?></h3>
        <p><i>ex: http://www.example.com/pages.html</i></p>
        <table  style="width:auto" class="form-table"> 
            <tr valign="middle"> 
                <th scope="row"><label for="cyber_optin_sent"><?php echo __("Opt-in request sent successfully:", "wp-cyber")?></label></th> 
                <td width="50em"><input type="text" class='regular-text' name="cyber_widget_fr[optin_sent]" id="cyber_optin_sent" value="<?php echo $cyber_widget['optin_sent']?>" placeholder="http://www.example.com/pages.html" />
                    <a href="<?php echo self::CYBER_OPTIN_SENT?>" target="_blank" ><?php echo __("View the default page", "wp-cyber")?></a>
                </td> 
            </tr> 
            <tr valign="middle"> 
                <th scope="row"><label for="cyber_error"><?php echo __("Error within the form:", "wp-cyber")?></label></th> 
                <td width="50em"><input type="text" class='regular-text' name="cyber_widget_fr[error]" id="cyber_error" value="<?php echo $cyber_widget['error']?>" placeholder="http://www.example.com/pages.html" />
                    <a href="<?php echo self::CYBER_ERROR?>" target="_blank" ><?php echo __("View the default page", "wp-cyber")?></a>
                </td> 
            </tr> 
            <tr valign="middle"> 
                <th scope="row"><label for="cyber_optin_confirmation"><?php echo __("Opt-in confirmation was successful:", "wp-cyber")?></label></th> 
                <td width="50em"><input type="text" class='regular-text' name="cyber_widget_fr[optin_confirmation]" id="cyber_optin_confirmation" value="<?php echo $cyber_widget['optin_confirmation']?>" placeholder="http://www.example.com/pages.html" />
                    <a href="<?php echo self::CYBER_OPTIN_CONFIRMATION?>" target="_blank" ><?php echo __("View the default page", "wp-cyber")?></a>
                </td> 
            </tr> 
        </table>
        <?php @submit_button(); ?> 
        </fieldset>
    </form>
    <form style="display:none" id='cyber_edit_custom'>
        <br/>
        <input type="checkbox" id='cyber_mandatory_custom' /> 
        <label for="cyber_mandatory_custom"><?php echo __("Mandatory", "wp-cyber")?></label><br/> 
        
        <div class='cyber_fld'><label for="cyber_custom_label"><?php echo __("Label:", "wp-cyber")?></label><input type="text" class='regular-text' id='cyber_custom_label' /></div>
        <div class='cyber_fld'><label for="cyber_custom_type"><?php echo __("Input type:", "wp-cyber")?></label>
                    <select id="cyber_custom_type" >
                        <option><?php echo __("Select", "wp-cyber")?></option>
                        <option value="text"><?php echo __("Text Field", "wp-cyber")?></option>
                        <option value="radio"><?php echo __("Radio Buttons", "wp-cyber")?></option>
                        <option value="checkbox"><?php echo __("Checkbox", "wp-cyber")?></option>
                        <option value="textarea"><?php echo __("Textarea", "wp-cyber")?></option>
                        <option value="dropdown"><?php echo __("Drop-down List", "wp-cyber")?></option>
                    </select></div>
        <div class='cyber_fld' id='cyber_options_displayed'><label for="cyber_custom_options"><?php echo __("Options:", "wp-cyber")?></label>
            <div id='cyber_options_content'>
            </div>
            <div id='cyber_options_template'>
                <div id='__ID__'><input type='text' class='cyber_option regular-text' id='opt__ID__' value='<?php echo __("New option", "wp-cyber"); ?>' /> <a href="#" rel='__ID__' class='cyber_options_remove'><?php echo __("Remove", "wp-cyber")?></a></div>
            </div>
            <a href='#' id='cyber_add_option'><?php echo __("Add", "wp-cyber")?></a>
        </div>
        <input type='button' id='cyber_custom_save' value='<?php echo __("Save", "wp-cyber")?>' /> 
    </form> 
</div> 