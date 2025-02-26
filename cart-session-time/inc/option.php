<div class='wrap'>
  <h2>Cart Session Time</h2>
  <p>
    <?php echo esc_html($cst_current_title); ?>：<?php echo esc_html($time_val_d), esc_html($cst_day_txt), esc_html($time_val_h), esc_html($cst_hour_txt), esc_html($time_val_m), esc_html($cst_minute_txt); ?>
  </p>
  <form name='form1' method='post' class='time-set-form'>
    <input type='number' name='<?php echo esc_html($time_name_d); ?>' value='<?php echo esc_attr($time_val_d); ?>' step='1' min='0' max='999' placeholder='day' <?php echo esc_html($disabled); ?> /><?php echo esc_html($cst_day_txt); ?>
    <input type='number' name='<?php echo esc_html($time_name_h); ?>' value='<?php echo esc_attr($time_val_h); ?>' step='1' min='0' max='24' placeholder='hour' class='number' />
    <?php echo esc_html($cst_hour_txt); ?>(0~24)

    <input type='number' name='<?php echo esc_html($time_name_m); ?>' value='<?php echo esc_attr($time_val_m); ?>' step='1' min='0' max='60' placeholder='minute' class='number' <?php echo esc_html($disabled); ?> />
    <?php echo esc_html($cst_minute_txt); ?>(0~60)
    <hr />
    <p class='submit'><input type='submit' name='submit' class='button-primary' value='<?php echo esc_attr($cst_submit_txt); ?>' /></p>

    <style>
      .time-set-form .number {
        width: 70px !important;
      }

      hr {
        margin-top: 30px;
      }

      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
        opacity: 1;
      }
    </style>