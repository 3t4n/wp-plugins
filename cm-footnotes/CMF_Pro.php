<?php

class CMF_Pro {

    public static function init() {
        add_filter('cmf_meta_header_arr', [__CLASS__, 'meta_header_arr']);
    }

    public static function meta_header_arr($arr) {
        $arr[] = ['class' => 'dashicon', 'label' => 'Dashicons', 'default' => '', 'callback' => [__CLASS__, 'cmf_render_meta_block_dashicons']];
        $arr[] = ['class' => 'extlink', 'label' => 'External Link', 'default' => '', 'default_label' => '', 'callback' => [__CLASS__, 'cmf_render_meta_block_extlink']];
        return $arr;
    }

    public static function cmf_render_meta_block_dashicons($block_arr, $existingDefinitions, $i) {
        ob_start();
        $j = (1 + $i);
        if (empty($existingDefinitions['dashicons'][$i])) {
            $edtbtn = '<span class="selct-icon-' . $j . ' dashicons dashicons-edit"></span>';
        } else {
            $edtbtn = '';
        }
        $value = $existingDefinitions['dashicons'][$i] ?? $block_arr['default'];
        ?>
        <div class="cm-foot-settings-flex-block cm-foot-meta-dashicons-block">
            <button class="button dashicon-button_<?php echo $j; ?>  ws_select_icon" title="Select icon" data-id="<?php echo $j; ?>" disabled>
                <div class="icon16 dashicons <?php echo $value; ?> render-dash-<?php echo $j; ?>"><?php echo $edtbtn; ?></div>
            </button>
            <button class="remve-icon" data-id="<?php echo $j; ?>" title="Remove the icon" disabled>
                <span class="remv-icon-<?php echo $j; ?> dashicons dashicons-no-alt"></span>
            </button>
        </div>
        <?php
        $content = ob_get_clean();
        return $content;
    }

    public static function cmf_render_meta_block_extlink($block_arr, $existingDefinitions, $i) {
        ob_start();
        $value = (!empty($existingDefinitions['extlink'][$i]) ? $existingDefinitions['extlink'][$i] : $block_arr['default']);
        $link_label = (!empty($existingDefinitions['extlink_label'][$i]) ? $existingDefinitions['extlink_label'][$i] : $block_arr['default_label']);
        ?>
        <div class="cm_footnote_definitions_td_extlink">
            <textarea placeholder="Link url" name="cm_extlink" class="cm_footnote_definitions_row_extlink" rows="1" style="resize: none;" disabled><?php echo $value; ?></textarea>
            <input type="text" placeholder="Link label(optional)" name="cm_extlink_label" class="cm_footnote_definitions_row_extlink_label" value="<?php echo $link_label; ?>" disabled>
        </div>
        <?php
        $content = ob_get_clean();
        return $content;
    }

}