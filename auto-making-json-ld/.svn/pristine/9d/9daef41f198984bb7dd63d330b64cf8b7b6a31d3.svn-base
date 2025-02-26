<?php

// This function makes single form for plugin admin page.

// single form for
// - './settings/organization.php

if (!function_exists('amJL_tell_form')){
    function amJL_tell_form(){
        $value1 = get_option('tel_number1');
        $value2 = get_option('tel_number2');
        $value3 = get_option('tel_number3');
        $number = get_option('tel_country');
        ?>
        <p>顧客からの電話を受ける電話番号がある場合は記入してください。まずは国コードを選択してください。</p>
        <div>
            <span>国コード  : </span>
            <select name="tel_country" id="tel_country">
                <option value="+81" <?php if(!empty($number)){if($number === "+81"){echo 'selected'; } } ?>>+81 (日本)</option>
                <option value="+1" <?php if(!empty($number)){if($number === "+1"){echo 'selected'; } } ?>>+1 (アメリカ)</option>
                <option value="+44" <?php if(!empty($number)){if($number === "+44"){echo 'selected'; } } ?>>+44 (イギリス)</option>
                <option value="+86" <?php if(!empty($number)){if($number === "+86"){echo 'selected'; } } ?>>+86 (中国)</option>
                <option value="+7" <?php if(!empty($number)){if($number === "+7"){echo 'selected'; } } ?>>+7 (ロシア)</option>
            </select>
        </div>

        <br>
        <p>市外局番を入れて電話番号を記入してください。</p>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label>電話番号(任意)</label></th>
                <td><input type="text" size="10" name="tel_number1" id="tel_number1" value="<?php echo esc_attr($value1); ?>" placeholder="任意"><span> -</span>
                <input type="text" size="10" name="tel_number2" id="tel_number2" value="<?php echo esc_attr($value2); ?>" placeholder="任意"><span> -</span>
                <input type="text" size="10" name="tel_number3" id="tel_number3" value="<?php echo esc_attr($value3); ?>" placeholder="任意"></td>
            </tr>
        </table>
        <?php
    }
}