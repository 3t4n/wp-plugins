<?php

namespace amJL_class;

class EventSetting {
    private $ID;

    public function __construct($post_id) {
        $this->ID = $post_id;
    }

    // calender
    public function calender_post($label, $DateName, $TimeName, $isBold = false){
        $date = get_post_meta($this->ID, $DateName, true);
        $time = get_post_meta($this->ID, $TimeName, true);
        $num = $isBold ? 1 : 2;
        $bold = $isBold ? "style='font-weight: bold;'" : "";
        ?>
        <div class='amJL_single_form'>
            <label class="amJL_meta_label" <?php echo $bold?>><?php echo esc_html($label) ?></label>
            <div class="amJL_calender_date"><input type="date" name="<?php echo esc_attr($DateName) ?>" min="2020-01-01" max="2100-12-31" value="<?php echo esc_attr($date)?>"></input></div>
            <div class="amJL_calender_time">（　<input type="time" id="<?php echo esc_attr($TimeName) ?>" name="<?php echo esc_attr($TimeName) ?>" min="00:00" max="23:59" value="<?php echo esc_attr($time) ?>"></input>　）<button onclick="clearTime<?php echo esc_attr($num) ?>()">時刻をクリアする</button></div>
        </div>
        <?php
    }

    // event mode
    public function event_mode(){
        $value = (int)get_post_meta($this->ID, 'eventAttendanceMode', true);
        ?>
        <div class='amJL_single_form'>
            <label class="amJL_meta_label">開催方法</label>
            <div class="amJL_meta_input" style='width: 30%;'>
            <select name="eventAttendanceMode">
                <option value=0 <?php if(!empty($value)){if($value === 0){echo 'selected'; } } ?>>未選択</option>
                <option value=1 <?php if(!empty($value)){if($value === 1){echo 'selected'; } } ?>>対面形式</option>
                <option value=2 <?php if(!empty($value)){if($value === 2){echo 'selected'; } } ?>>オンライン形式</option>
                <option value=3 <?php if(!empty($value)){if($value === 3){echo 'selected'; } } ?>>対面＋オンライン形式</option>
            </select>
            </div>
        </div>
        <?php
    }

    // event status
    public function event_status(){
        $value = get_post_meta($this->ID, 'eventStatus', true);
        ?>
        <div class='amJL_single_form'>
            <label class="amJL_meta_label">開催状況</label>
            <div class="amJL_meta_input" style='width: 30%;'>
            <select name="eventStatus">
                <option value=0 <?php if(!empty($value)){if($value === 0){echo 'selected'; } } ?>>未選択</option>
                <option value=1 <?php if(!empty($value)){if($value === 1){echo 'selected'; } } ?>>予定通り開催</option>
                <option value=2 <?php if(!empty($value)){if($value === 2){echo 'selected'; } } ?>>キャンセル</option>
                <option value=3 <?php if(!empty($value)){if($value === 3){echo 'selected'; } } ?>>日程変更</option>
                <option value=4 <?php if(!empty($value)){if($value === 4){echo 'selected'; } } ?>>延期(日程不明)</option>
                <option value=5 <?php if(!empty($value)){if($value === 5){echo 'selected'; } } ?>>オンライン開催へ変更</option>
            </select>
            </div>
        </div>
        <?php
    }

    // event location (country)
    public function location_country(){
        $value = (int)get_post_meta($this->ID, 'locCountry', true);
        ?>
        <div class='amJL_single_form'>
            <label class="amJL_meta_label" style="font-weight: bold;">イベント開催国(※必須)</label>
            <div class="amJL_meta_input" style='width: 30%;'>
            <select name="locCountry">
                <option value=0 <?php if(!empty($value)){if($value === 0){echo 'selected'; } } ?>>日本</option>
                <option value=1 <?php if(!empty($value)){if($value === 1){echo 'selected'; } } ?>>アメリカ</option>
                <option value=2 <?php if(!empty($value)){if($value === 2){echo 'selected'; } } ?>>イギリス</option>
                <option value=3 <?php if(!empty($value)){if($value === 3){echo 'selected'; } } ?>>中国</option>
                <option value=4 <?php if(!empty($value)){if($value === 4){echo 'selected'; } } ?>>韓国</option>
            </select>
            </div>
        </div>
        <?php
    }


}