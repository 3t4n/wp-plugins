<?php

// This function makes 

// FAQ form
if(!function_exists('amJL_faq_meta_form')){
    function amJL_faq_meta_form(){
        global $post;
        $number = (int)get_post_meta($post->ID, 'faq_number', true);
        ?>

        <label>「よくある質問」の入力欄の個数を選択</label>
        <select name="faq_number" id="faq_number">
            <option value="0" <?php if(!empty($number)){if($number === 0){echo 'selected'; } } ?>>よくある質問を表示しない</option>
            <?php
            for((int)$i=1; $i<=20; $i++){?>
                <option value="<?php echo esc_attr($i) ?>" <?php if(!empty($number)){if($number === $i){echo 'selected'; } } ?>><?php echo esc_html($i) ?>個</option>
            <?php } ?>
        </select>
        <?php

        if($number === 0){
            echo '<p><b>構造化データ「よくある質問」を利用する場合には、よくある質問の数を選択してください。</b></p>';
        }else{
        ?>
        <table class="form-table">
            <?php
            for((int)$i=1; $i<=$number; $i++){
                $question = "question_{$i}";
                $answer = "answer_{$i}";
                $QValue = get_post_meta($post->ID, $question, true);
                $AValue = get_post_meta($post->ID, $answer, true);
                ?>
                <tr valign="top">
                    <th scope="row"><label><font color="blue"><?php echo "よくある質問".esc_html($i) ?></font></label></th>
                    <td><input type="text" size="100" name="<?php echo esc_attr($question) ?>" value="<?php echo esc_attr($QValue) ?>" placeholder="※必須"></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><font color="red"><?php echo "答え".esc_html($i) ?></font></label></th>
                    <td><input type="text" size="100" name="<?php echo esc_attr($answer) ?>" value="<?php echo esc_attr($AValue) ?>" placeholder="※必須"></td>
                </tr>
            <?php } ?>
        </table>
        <?php
        }
    }
}