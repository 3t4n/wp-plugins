<!-- Start Shortcode Setting -->
<div class="modal fade" id="shortcodeModal" tabindex="-1" role="dialog" aria-labelledby="shortcodeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="shortcodeModalLabel" class="modal-title"><?php echo esc_html(__('Shortcode', 'catcbll')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo esc_attr(__('Close', 'catcbll')); ?>"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="catcbll_shortcode_tab">
                            <div class="tabpane_inner">
                                <div class="ref_lnk">
                                    <p><?php echo esc_html(__('Any Where You Can Show Product Using This Shortcode', 'catcbll')); ?></p>
                                    <p class="catcbll_stcode">[catcbll pid="" background="" font_size="" font_color="" font_awesome="" border_btn_card_color="" border_btn_card_size="" icon_position="" image=""]</p>
                                    <p>*pid => product ID</p>
                                    <p>*background => #ffffff</p>
                                    <p>*font_size => 12</p>
                                    <p>*font_color => #ooo</p>
                                    <p>*font_awesome => fas fa-adjust</p>
                                    <p>*border_btn_card_color => red</p>
                                    <p>*border_btn_card_size => 2</p>
                                    <p>*icon_position => right or left</p>
                                    <p>*image => true or false</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo esc_html(__('Close', 'catcbll')); ?></button>
            </div>
        </div>
    </div>
</div>

<!-- Start Demo Setting -->
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="demoModalLabel" class="modal-title"><?php echo esc_html(__('Demo', 'catcbll')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo esc_attr(__('Close', 'catcbll')); ?>"></button>
            </div>
            <div class="modal-body p-0">
                <div class="container-fluid">
                    <?php
                    // Columns must be a factor of 12 (1, 2, 3, 4, 6, 12)
                    $numOfCols = 3;
                    $bootstrapColWidth = 12 / $numOfCols;
                    ?>
                    <div class="row my-2">
                        <?php
                        for ($i = 1; $i <= 24; $i++) {
                            ?>
                            <div class="col-md-<?php echo esc_attr($bootstrapColWidth); ?> pl-0">
                                <div class="p-3 border btn_card text-center">
                                    <a href="JavaScript:void(0);" class="crtubtn crtubtn<?php echo esc_attr($i); ?>"><?php echo esc_html(__('Add To Cart', 'catcbll')); ?></a>
                                </div>
                            </div>
                            <?php
                            if ($i % $numOfCols == 0) echo '</div><div class="row my-2">';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><?php echo esc_html(__('OK', 'catcbll')); ?></button>
                <button type="button" class="btn btn-danger clear-selection"><?php echo esc_html(__('Clear Selection', 'catcbll')); ?></button>
            </div>
        </div>
    </div>
</div>
