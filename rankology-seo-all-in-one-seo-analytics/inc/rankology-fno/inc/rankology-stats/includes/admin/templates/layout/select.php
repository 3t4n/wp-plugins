<?php
if (isset($list) and is_array($list) and count($list) > 0) {
    ?>
    <div class="c-pages-select-page">
        <form action="" method="get" id="rankology-stats-select-pages">
            <span class="select-title"><?php esc_html_e('Select Page', 'rankology-stats'); ?>:</span>
            <input name="page" type="hidden" value="<?php echo esc_attr($pageName); ?>">
            <?php
            if (isset($custom_get)) {
                foreach ($custom_get as $key => $val) {
                    if (in_array($key, ["ID", "page_id"])) {
                        continue;
                    }
                    ?>
                    <input name="<?php echo esc_attr($key); ?>" type="hidden" value="<?php echo esc_attr($val); ?>">
                    <?php
                }
            }
            ?>
            <select name="ID" data-type-show="select2">
                <?php
                foreach ($list as $id => $name) {
                    ?>
                    <option value="<?php echo esc_attr($id); ?>" <?php selected($_GET['ID'], $id); ?>><?php echo esc_attr($name); ?></option>
                    <?php
                }
                ?>
            </select>
            <?php if(!empty($sub_list)){ ?>
                <?php $selectStatus = apply_filters('rankology_stats_pages_page_sub_list_select', false) ?>
                <select name="page_id" data-type-show="select2">
                    <option value=""><?php esc_html_e('All', 'rankology-stats'); ?></option>
                </select>
                <?php if ($selectStatus){ ?>
                    <script>
                        jQuery(document).ready(function () {
                            jQuery('select[name="page_id"]').on('change', function () {
                                jQuery('#rankology-stats-select-pages').submit();
                            });
                        });
                    </script>
                <?php } ?>
            <?php } ?>
        </form>
    </div>
<?php } ?>