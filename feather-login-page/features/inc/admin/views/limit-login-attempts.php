<form method="POST" action="">

<table class="form-table" role="presentation">

<tbody>

<tr>
    <th scope="row"><label for="enable">Enable</label></th>
    <td>
        <input name="enable" type="checkbox" id="enable" value="1" <?php echo ( esc_attr($options["enabled"]) ) ? "checked":""; ?> />
    </td>
</tr>

<tr>
    <th scope="row"><label for="retries">Lockout Retries</label></th>
    <td>
        <input name="retries" type="number" id="retries" value="<?php echo esc_attr($options['retries']) ?>" class="regular-text" />
    </td>
</tr>

<tr>
    <th scope="row"><label for="lockout-time">Lockout Time in Minutes</label></th>
    <td>
        <input name="lockout-time" type="number" id="lockout-time" value="<?php echo esc_attr($options['lockout-time']) ?>" class="regular-text" />
    </td>
</tr>





</tbody></table>

<input type="hidden" value="1" name="flpp_ext_limit_login_attempts_save_data" />
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>


</form>