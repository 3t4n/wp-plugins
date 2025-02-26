<select type="text" id="attendance_<?php echo $setting['key']; ?>" name="attendance_<?php echo $setting['key']; ?>" data-dependency="<?php if (isset($setting['dependency'])) echo $setting['dependency']; ?>">
<?php
    foreach ($setting['options'] as $option) {
        $label = $option;
        $value = $option;

        if (is_array($option)) {
            $label = $option['label'];
            $value = $option['value'];
        }
?>
        <option value="<?php echo $value; ?>" <?php if ($attendance[$setting['key']] == $value) echo 'selected="selected"'; ?>>
            <?php echo $label; ?>
        </option>
    <?php } ?>
</select>
