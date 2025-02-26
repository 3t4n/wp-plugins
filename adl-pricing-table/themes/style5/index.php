<?php
// get theme data
$pt_style5_ = get_post_meta($id, 'pt_style5_', true);
// sanitize all value
$pt_style5_ = (!empty($pt_style5_)) ? array_map('sanitize_text_field', $pt_style5_) : [];

//bg color
$pt_style5_hcolor = (!empty($pt_style5_['hcolor'])) ? $pt_style5_['hcolor'] : '#fff';
$pt_style5_border = (!empty($pt_style5_['border'])) ? $pt_style5_['border'] : '#ebebeb';

// text color
$pt_style5_txt_color = (!empty($pt_style5_['txt_color'])) ? $pt_style5_['txt_color'] : '#969696';






?>
<section id="pricing-table-5">
    <div class="container-fluid" id="<?= $ptTblID; ?>">
        <div class="row">
            <style>
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-5 {
                    background: <?= $pt_style5_hcolor; ?>;
                    border: 1px solid <?= $pt_style5_border; ?>;
                }
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-5:hover {
                                      box-shadow: 2px 5px 15px 1px <?= pt_adj_brightness($pt_style5_border, 2, false); ?>;
                                  }
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-5:hover .tb-action-5 .btn {
                                      border: 1px solid <?= $pt_style5_txt_color; ?>;
                                      color: <?= $pt_style5_hcolor; ?>;
                                      background: <?= pt_adj_brightness($pt_style5_txt_color, 20); ?>;
                                  }
                #<?= $ptTblID; ?> .tb-header-5 > h1{
                                      color: <?= pt_adj_brightness($pt_style5_txt_color, 3); ?>;
                                      font-size: <?= $headerFS; ?>;

                                  }
                #<?= $ptTblID; ?> .tb-price-5 {
                                      border-top: 1px solid <?= $pt_style5_border; ?>;
                                      border-bottom: 1px solid <?= $pt_style5_border; ?>;

                                  }
                #<?= $ptTblID; ?> .tb-price-5 span{
                                      color: <?= pt_adj_brightness($pt_style5_txt_color, 20);?>;
                                      font-size: <?= $priceFS; ?>;

                                  }
                #<?= $ptTblID; ?> .tb-price-5 > p {
                                      color: <?= pt_adj_brightness($pt_style5_txt_color, 3); ?>;
                                      font-size: <?= $planFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-features-5 > ul{
                                      color: <?= $pt_style5_txt_color; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-features-5 > ul > li {
                                      font-size: <?= $featureFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-action-5 .btn{
                                      border: 1px solid <?= pt_adj_brightness($pt_style5_txt_color, 20); ?>;
                                      color: <?= pt_adj_brightness($pt_style5_txt_color, 20); ?>;
                                      background: <?= $pt_style5_hcolor; ?>;
                                      font-size: <?= $buttonFS; ?>;
                                  }
            </style>

            <?php


            foreach ( $package_data as $package ):
                $pt_currency = (!empty($package['pt_package_currency'])) ?  esc_html(trim($package['pt_package_currency'])) : '';
                $features = explode(',', $package['pt_package_features']);
                $features = array_map('trim', $features);

                ?>
                <div class="<?php echo $columns; ?>">
                    <div class="pricing-table-wrap tb-5">
                        <?php if ( !empty($package['pt_package_highlight']) && 'yes' == $package['pt_package_highlight'] ) { ?>
                            <div class="apt-ribbon" style="background-color: <?= (!empty($package['pt_package_ribbon_bg'])) ?  esc_attr(trim($package['pt_package_ribbon_bg'])) : '#ffeb3b'; ?>;color: <?= (!empty($package['pt_package_ribbon_color'])) ?  esc_attr(trim($package['pt_package_ribbon_color'])) : '#333'; ?>;" ><?= (!empty($package['pt_package_ribbon_text'])) ?  esc_html(trim($package['pt_package_ribbon_text'])) : 'Popular'; ?></div>
                        <?php } ?>
                        <div class="tb-header-5">
                            <h1><?php echo esc_attr($package['pt_package_title']); ?></h1>
                        </div>

                        <div class="tb-price-5">
                            <p><span><?= $pt_currency, esc_attr($package['pt_package_price']); ?></span><?= (!empty($package['pt_package_time']) ) ? '/'. esc_attr($package['pt_package_time']) : ''; ?></p>
                        </div>
                        <div class="tb-features-5">
                            <ul>
                                <?php
                                foreach($features as $feature) {
                                    if ( 'x' === strtolower( $feature ) || 'no' === strtolower( $feature ) ) {
                                        echo '<li class="left-space">' . wp_kses( $feature, $allowed_html ) . '</li>';
                                    }
                                    else {
                                        echo '<li>' . wp_kses( $feature, $allowed_html ) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>



                        <div class="tb-action-5" style="min-height: 106px">
                            <?php if ( !empty($package['pt_package_btn_url'] ) ) { ?>

                                <a href="<?php echo esc_url($package['pt_package_btn_url']); ?>" class="tb-action-5">
                                    <button class="btn"><?php echo (!empty($package['pt_package_btn_text'])) ? esc_attr($package['pt_package_btn_text']) : 'Sign Up'; ?></button>
                                </a>

                            <?php } ?>
                        </div>
                    </div> <!-- END pricing-table-wrap-->
                </div> <!-- END col-sm-4-->

            <?php endforeach; ?>
        </div> <!-- END row -->
    </div> <!-- END container-->

</section> <!-- END pricing-table-5-->
