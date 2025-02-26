<?php
$theme_name = (array_key_exists('theme_name', $args)) ? $args['theme_name'] : array();
?>

<div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">

    <div class="cmb-row">
        <div class="cmb-th st">
            <label><?php esc_html_e('Select a Theme for Team', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>
        <?php
        $theme_name = (!empty($theme_name)) ? $theme_name : '' ;
        ?>
        <div class="cmb-td">
            <select class="adl-nice-select" id='adl_team_theme' name="gs[theme_name]">
                <?php
                $values = [
                    'style1'   => __('Elegant Square Grid', ADL_TEAM_TEXTDOMAIN),
                    'style4'  => __('Colorful Grid', ADL_TEAM_TEXTDOMAIN),
                ];
                foreach ( $values as $key => $val  ) {
                    echo '<option value="' . esc_attr($key) . '"';

                    selected($theme_name, $key);

                    echo '>' . esc_attr($val) . '</option>';
                }

                ?>
            </select>
        </div>
    </div>


</div> <!-- end cmb2-metabox -->
