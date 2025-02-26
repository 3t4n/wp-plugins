<?php

namespace amJL_class;

class TextForm {
    private $ID;

    public function __construct($post_id) {
        $this->ID = $post_id;
    }

    // single text form for post
    public function form_post($label, $name, $box_size, $place, $isBold = false){
        $value = get_post_meta($this->ID, $name, true);
        $bold = $isBold ? "style='font-weight: bold;'" : '' ;
        $size = $box_size ? "style='width: $box_size%;'" : "";
        ?>
        <div class='amJL_single_form'>
          <label class="amJL_meta_label" <?php echo $bold ?>><?php echo esc_html($label) ?></label>
          <div class="amJL_meta_input" <?php echo esc_html($size) ?>><input type='text' name='<?php echo esc_attr($name) ?>' value='<?php echo esc_attr($value) ?>' placeholder='<?php echo esc_attr($place) ?>'></div>
        </div>
        <?php
    }

    // single text form for admin
    public function form_admin($label, $name, $box_size, $place, $isBold = false){
        $value = get_option($name);
        $size = $box_size ? "style='width: $box_size%;'" : "";
        ?>
        <div class='amJL_single_form'>
          <label class="amJL_meta_label" <?php echo esc_html($bold) ?>><?php echo esc_html($label) ?></label>
          <div class="amJL_meta_input" <?php echo esc_html($size) ?>><input type='text' name='<?php echo esc_attr($name) ?>' value='<?php echo esc_attr($value) ?>' placeholder='<?php echo esc_attr($place) ?>'></div>
        </div>
        <?php
    }

    public function form_url_article($arr_label, $size, $place){
        ?>
        <div class='amJL_url_form'>
        <?php
        for ($i = 0; $i < count($arr_label); $i++){
            $name = "url" . ($i+1);
            $this->form_admin($arr_label[$i], $name, $size, $place);
        }
        ?>
        </div>
        <?php
    }

    



}

class AmJL_Calendar_Form {
    private $post_id;

    public function __construct() {
        global $post;
        $this->post_id = $post->ID;
    }

    public function render_calendar_form($label, $date_name, $time_name, $bold = false) {
        $date = get_post_meta($this->post_id, $date_name, true);
        $time = get_post_meta($this->post_id, $time_name, true);
        $num = $bold ? 1 : 2;
        ?>
        <div class='amJL_single_form'>
            <label class="amJL_meta_label" <?php if($bold) echo "style='font-weight: bold;'" ?>><?php echo esc_html($label) ?></label>
            <div class="amJL_calender_date"><input type="date" name="<?php echo esc_attr($date_name) ?>" min="2020-01-01" max="2100-12-31" value="<?php echo esc_attr($date)?>"></div>
            <div class="amJL_calender_time">（　<input type="time" id="<?php echo esc_attr($time_name) ?>" name="<?php echo esc_attr($time_name) ?>" min="00:00" max="23:59" value="<?php echo esc_attr($time) ?>"></input>　）<button onclick="clearTime<?php echo esc_attr($num) ?>()">未選択</button></div>
        </div>
        <?php
    }
}

function clearTime1() {
    ?>
    document.getElementById("<?php echo esc_attr($time_name) ?>").value = "";
    <?php
}

function clearTime2() {
    ?>
    document.getElementById("<?php echo esc_attr($time_name) ?>").value = "";
    <?php
}


class TextFormAdmin {

    // text form (single form)
    private function single_form($label, $size, $name, $place){
        $value = get_option($name);
        ?>
        <table class='amJL_table'>
            <tr>
                <th><label><?php echo esc_html($label) ?></label></th>
                <td><input type="text" size="<?php echo esc_attr($size) ?>" name="<?php ?>" id="<?php echo esc_attr($name) ?>" value="<?php echo esc_attr($value) ?>"></td>
            </tr>
        </table>
        <?php
    }

    private function double_post($label, $size, $name, $place){
        $value = get_option($name);
    }

}