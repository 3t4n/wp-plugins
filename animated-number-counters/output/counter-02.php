<div class="anc-6310-row">
    <div class="anc-6310-counter-<?php echo esc_attr($ids); ?>-paralax">
        <div class="anc-6310-counter-<?php echo esc_attr($ids); ?>-common-overlay">
            <div class="anc-6310-counter-<?php echo esc_attr($ids); ?>-row">
                <?php
                foreach ($allCounters as $allCounter) {
                    $numbersPosition = ['', ''];
                    if ($allCounter['commons'] != '') {
                        $numbersPosition = explode('###|||###', $allCounter['commons']);
                    }
                ?>
                    <div class="anc-6310-col-<?php echo esc_attr($cssData['item_per_row']); ?>">
                        <div class="anc-6310-counter-<?php echo esc_attr($ids); ?>">
                            <div class="anc-6310-counter-<?php echo esc_attr($ids); ?>-icon">
                                <i class="<?php echo esc_attr($allCounter['icons']); ?>"></i>
                            </div>
                            <div class="anc-6310-counter-<?php echo esc_attr($ids); ?>-count-content">
                                <div class="anc-6310-counter-<?php echo esc_attr($ids); ?>-count-content-inner">
                                    <div class="anc-6310-counter-<?php echo esc_attr($ids); ?>-count-number anc-6310-counter-number" 
                                    id="anc-6310-<?php echo esc_attr("{$ids}-{$allCounter['id']}"); ?>"
                                    data-anc-6310-start="0" 
                                    data-anc-6310-end="<?php echo esc_attr($allCounter['numbers']); ?>" 
                                    data-anc-6310-decimal="<?php echo esc_attr(anc_6310_number_format($allCounter['numbers'])); ?>" 
                                    data-anc-6310-duration=".5" 
                                    data-anc-6310-thousands-separator="<?php echo isset($cssData['thousands_separator']) ? esc_attr(anc_6310_special_character_remove($cssData['thousands_separator'])) : '' ?>"
                                >
                                        0
                                    </div>
                                </div>
                            </div>
                            <div class="anc-6310-counter-<?php echo esc_attr($ids); ?>-count-title"><?php echo anc_6310_multi_language_get('Title', $allCounter['title'], $allCounter['id']); ?></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include anc_6310_plugin_url . "output/css/_css-02.php";
?>