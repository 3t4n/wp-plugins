<?php
$options = get_option('auto_expire_posts_options');
$date = get_post_meta($post->ID, 'auto_expire_posts_date', true);
$tz = get_post_meta($post->ID, 'auto_expire_posts_timezone', true);
$status = get_post_meta($post->ID, 'auto_expire_posts_status', true);
$expired = get_post_meta($post->ID, 'auto_expire_posts_expired', true);
?>

<?php if ($expired) { ?>
  <p>Last expired <?php echo date('r', $expired) ?></p>
<?php } ?>

<input id="auto_expire_posts_date" name="auto_expire_posts_date" type="date" placeholder="Expire date" value="<?php echo date('Y-m-d', $date ?: time()) ?>" />

<input id="auto_expire_posts_time" name="auto_expire_posts_time" type="time" placeholder="Expire time" value="<?php echo $date ? date('H:i:s', $date - $tz * 60 * 60) : '00:00:00' ?>" />

<select id="auto_expire_posts_status" name="auto_expire_posts_status">
  <option value="disabled">Never expire</option>
  <?php
  foreach (Auto_Expire_Posts::$statuses as $key => $val) {
    echo '<option value="' . esc_attr($key) . '"' . ($status === $key ? ' selected' : '') . '>' . esc_html($val) . '</option>';
  }
  ?>
</select>

<input id="auto_expire_posts_timezone" name="auto_expire_posts_timezone" type="hidden" />
