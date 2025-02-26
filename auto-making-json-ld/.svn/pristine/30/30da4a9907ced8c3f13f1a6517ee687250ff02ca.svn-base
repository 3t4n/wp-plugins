<?php

// This function makes single form for plugin admin page.

// single form for
// - './settings/organization.php

if (!function_exists('amJL_select_country')){
    function amJL_select_country(){
        $number = get_option('address_country');
        ?>
        <p>顧客からの電話を受ける電話番号がある場合は記入してください。まずは国コードを選択してください。</p>
        <div>
            <span>国を選択する  : </span>
            <select name="address_country" id="address_country">
                <option value="JP" <?php if(!empty($number)){if($number === "JP"){echo 'selected'; } } ?>>日本</option>
                <option value="US" <?php if(!empty($number)){if($number === "US"){echo 'selected'; } } ?>>アメリカ</option>
                <option value="GB" <?php if(!empty($number)){if($number === "GB"){echo 'selected'; } } ?>>イギリス</option>
                <option value="CN" <?php if(!empty($number)){if($number === "CN"){echo 'selected'; } } ?>>中国</option>
                <option value="RU" <?php if(!empty($number)){if($number === "RU"){echo 'selected'; } } ?>>ロシア</option>
            </select>
        </div>
        <?php
    }
}