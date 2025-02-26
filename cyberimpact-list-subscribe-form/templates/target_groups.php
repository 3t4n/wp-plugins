<div class="wrap"> 
    <h2><?php echo __("Cyberimpact Target Groups", "wp-cyber")?></h2> 
    <form method="post" action="options.php">
        <?php @settings_fields('wp_cyber_target_groups'); ?> 
        <?php @settings_errors('wp_cyber_target_groups'); ?> 
        <?php @do_settings_fields('wp_cyber_target_groups'); ?>
        <?php $cyber_target_group_options =  get_option('cyber_target_groups');?>
        <?php if ( isset($_REQUEST['settings-updated']) && isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated'] == true && !count(get_settings_errors('wp_cyber_target_groups'))) : ?>
            <div id='message' class='updated below-h2'><p><?php echo __( 'Target groups saved', 'wp-cyber' ); ?></p></div>
        <?php endif; ?> 
        <fieldset> 
        <?php
            $cb_saved_groups = explode("|*|", $cyber_target_group_options['groups']);
            foreach($cb_saved_groups as $group) {
                $parts = explode("::", $group);
                if( count($parts) == 2) {
                    $cyber_saved_groups[$parts[0]] = $parts[1];
                }
                
            }
        ?>

        <h3><?php echo __("Target Groups", "wp-cyber")?></h3>
        <table  style="width:auto" class="form-table"> 
            <tr valign="middle"> 
                <th scope="row"><label for="cyber_group"><?php echo __("Label:", "wp-cyber")?></label></th> 
                <td width="30em"><input type="text" class='regular-text' name="cyber_target_groups[label]" id="cyber_group" value="<?php echo $cyber_target_group_options['label']?>" /></td> 
            </tr> 
            <tr valign="middle"> 
                <th width="20em" scope="row"><label for="cyber_target_groups_type"><?php echo __("Input type:", "wp-cyber")?></label></th> 
                <td><select name='cyber_target_groups[group_type]' id="cyber_target_groups_type" >
                        <option><?php echo __("Select", "wp-cyber")?></option>
                        <option value="checkbox" <?php echo $cyber_target_group_options['group_type'] == "checkbox"? "selected":""?>><?php echo __("Checkboxes", "wp-cyber")?></option>
                        <option value="dropdown" <?php echo $cyber_target_group_options['group_type'] == "dropdown"? "selected":""?>><?php echo __("Drop-down list", "wp-cyber")?></option>
                </select></td>
            </tr>
            <tr valign="middle"> 
                <th scope="row"><?php echo __("Groups", "wp-cyber")?></th> 
                <td width="30em">
                    <?php
                        $cyber_groups = $this->cyber_getGroups('wp_cyber_target_groups');
                    ?>
                    <?php if($cyber_groups->total_count):?>
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
                        <input type="hidden" name="cyber_target_groups[groups]" id="cyber_widget_groups" value="<?php echo $cyber_target_group_options['groups']?>S" />
                    <?php else:?>
                        <?php echo __("No groups defined in Cyberimpact account", "wp-cyber")?>
                    <?php endif;?>  
                </td> 
            </tr> 
        </table>
        <input type='submit' id='cyber_custom_save' value='<?php echo __("Save", "wp-cyber")?>' /> 
    </form> 
</div> 