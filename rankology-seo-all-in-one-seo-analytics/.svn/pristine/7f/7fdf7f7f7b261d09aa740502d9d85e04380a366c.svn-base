<?php
function rankology_render_checkbox($args)
{
    $options = get_option('rankology_stats');

    $name = $args['name'];
    $checked = isset($options[$name]) ? $options[$name] : false;
    ?>
    <label for="<?php echo esc_attr($args['label_for']); ?>">
        <input id="<?php echo esc_attr($args['label_for']); ?>" name="rankology_stats[<?php echo esc_attr($name); ?>]"
               type="checkbox" value="1" <?php checked($checked, 1); ?> />
        <?php echo esc_html($args['description']); ?>
    </label>
    <?php if (isset($options[$name])) {
    esc_attr($options[$name]);
}
}

// Render select fields
function rankology_render_select($args)
{
    $options = get_option('rankology_stats');
    $name = $args['name'];
    $value = isset($options[$name]) ? $options[$name] : $args['selected'];
    ?>
    <select name="rankology_stats[<?php echo esc_attr($name); ?>]" id="<?php echo esc_attr($args['label_for']); ?>">
        <?php foreach ($args['options'] as $key => $label) : ?>
            <option value="<?php echo esc_attr($key); ?>" <?php selected($value, $key); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
    </select>
    <?php if (!empty($args['description'])) : ?>
    <p class="description"><?php echo esc_html($args['description']); ?></p>
<?php endif;
}

function rankology_render_text($args)
{
    $options = get_option('rankology_stats');
    $name = $args['name'];
    $dafule_value = isset($args['value']) ? $args['value'] : '';
    $value = isset($options[$name]) ? $options[$name] : $dafule_value;
    ?>
    <input type="text" name="rankology_stats[<?php echo esc_attr($name); ?>]"
           id="rankology_stats[<?php echo esc_attr($name); ?>]"
           value="<?php echo esc_attr($value); ?>"></input>

    <?php if (!empty($args['description'])) : ?>
    <p class="description"><?php echo esc_html($args['description']); ?></p>
<?php endif;
}

function rankology_render_textarea($args)
{
    $options = get_option('rankology_stats');
    $name = $args['name'];
    $dafule_value = isset($args['value']) ? $args['value'] : '';
    $value = isset($options[$name]) ? $options[$name] : $dafule_value;
    ?>
    <textarea id="rankology_stats[<?php echo esc_attr($name); ?>]"
              name="rankology_stats[<?php echo esc_attr($name); ?>]" rows="4" cols="50">
<?php echo esc_attr($value); ?>
</textarea>
    <div>
        <p class="description data">
            Any shortcode supported by your installation of WordPress, include shortcodes for Rankology. Here is the
            list: <br><br>
            Active/Online User:
            <code>[rankologystats stat=usersonline]</code><br>
            Today's Visitors:
            <code>[rankologystats stat=visitors time=today]</code><br>
            Today's Visits:
            <code>[rankologystats stat=visits time=today]</code><br>
            Yesterday's Visitors:
            <code>[rankologystats stat=visitors time=yesterday]</code><br>
            Yesterday's Visits:
            <code>[rankologystats stat=visits time=yesterday]</code><br>
            Total Visitors:
            <code>[rankologystats stat=visitors time=total]</code><br>
            Total Visits:
            <code>[rankologystats stat=visits time=total]</code><br>
        </p>


    </div>
    <?php if (!empty($args['description'])) : ?>
    <p class="description"><?php echo esc_html($args['description']); ?></p>
<?php endif;
}