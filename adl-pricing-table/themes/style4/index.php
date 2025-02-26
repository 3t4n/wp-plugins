<?php
// get theme data
$pt_style4_ = get_post_meta($id, 'pt_style4_', true);
// sanitize all value
$pt_style4_ = (!empty($pt_style4_)) ? array_map('sanitize_text_field', $pt_style4_) : [];

//bg color
$pt_style4_hcolor = (!empty($pt_style4_['hcolor'])) ? $pt_style4_['hcolor'] : '#f3f8fb';
$pt_style4_btn_color = (!empty($pt_style4_['btn_color'])) ? $pt_style4_['btn_color'] : '#000';
$pt_style4_btn_hc = (!empty($pt_style4_['btn_hc'])) ? $pt_style4_['btn_hc'] : '#31aae2';
$pt_style4_divider = (!empty($pt_style4_['divider'])) ? $pt_style4_['divider'] : '#d0cccc';
// text color
$pt_style4_txt_color = (!empty($pt_style4_['txt_color'])) ? $pt_style4_['txt_color'] : '#676767';
$pt_style4_btntxt_color = (!empty($pt_style4_['btntxt_color'])) ? $pt_style4_['btntxt_color'] : '#fff';


// font size for footer p
/*it means if title font size is 24px then footer p size will be around 15px*/
$footerPFS = round(((intval($headerFS) * 62) / 100 )).'px';

?>

<section id="pricing-table-4">
    <div class="container-fluid" id="<?= $ptTblID; ?>">
        <div class="row">
            <style>
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-4 {
                    background: <?= $pt_style4_hcolor; ?>;
                }
                #<?= $ptTblID; ?> .tb-header-4 > h1{
                                      font-size: <?= $headerFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-header-4 > h1,
                #<?= $ptTblID; ?> .tb-price-4 > p,
                #<?= $ptTblID; ?> .tb-features-4 > ul > li
                                  {
                                      color: <?= $pt_style4_txt_color; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-features-4 > ul > li{
                                      font-size: <?= $featureFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-price-4 > p {
                                      font-size: <?= $planFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-price-4 > P > span {
                                      color: <?= pt_adj_brightness($pt_style4_txt_color, 10); ?>;
                                      font-size: <?= $priceFS; ?>;
                                  }

                #<?= $ptTblID; ?> .tb-4.divider {
                                      background: <?= $pt_style4_divider; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-action-4 .btn {
                                      background: <?= $pt_style4_btn_color; ?>;
                                      color: <?= $pt_style4_btntxt_color; ?>;
                                      font-size: <?= $buttonFS; ?>;

                                  }
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-4:hover
                                  {
                                      border: 5px solid <?= $pt_style4_btn_hc; ?>;
                                  }

                #<?= $ptTblID; ?> .pricing-table-wrap.tb-4:hover .btn,
                #<?= $ptTblID; ?> .tb-footer {
                                      background: <?= $pt_style4_btn_hc; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-footer {
                                      font-size: <?= $footerPFS; ?>;
                                  }



            </style>

            <?php foreach ( $package_data as $package ):
                $pt_currency = (!empty($package['pt_package_currency'])) ?  esc_html(trim($package['pt_package_currency'])) : '';
                $features = explode(',', $package['pt_package_features']);
                $features = array_map('trim', $features);

                ?>



                <div class="<?php echo $columns; ?>">

                    <div class="pricing-table-wrap tb-4">
                        <?php if ( !empty($package['pt_package_highlight']) && 'yes' == $package['pt_package_highlight'] ) { ?>
                            <div class="apt-ribbon" style="background-color: <?= (!empty($package['pt_package_ribbon_bg'])) ?  esc_attr(trim($package['pt_package_ribbon_bg'])) : '#ffeb3b'; ?>;color: <?= (!empty($package['pt_package_ribbon_color'])) ?  esc_attr(trim($package['pt_package_ribbon_color'])) : '#333'; ?>;" ><?= (!empty($package['pt_package_ribbon_text'])) ?  esc_html(trim($package['pt_package_ribbon_text'])) : 'Popular'; ?></div>
                        <?php } ?>
                        <div class="tb-header-4">
                            <h1><?php echo esc_attr($package['pt_package_title']); ?></h1>
                        </div>

                        <div class="tb-price-4">
                            <p><span><?= $pt_currency, esc_attr($package['pt_package_price']); ?></span><?php echo esc_attr($package['pt_package_time']); ?></p>
                        </div>
                        <div class="tb-4 divider"></div>
                        <div class="tb-features-4">
                            <ul>
                                <?php
                                foreach($features as $feature) {  echo '<li>'. wp_kses($feature, $allowed_html) .'</li>'; }
                                ?>
                            </ul>
                        </div>


                        <div class="tb-action-4" style="min-height: 112px">
                            <?php if ( !empty($package['pt_package_btn_url'] ) ) { ?>

                                <a href="<?php echo esc_url($package['pt_package_btn_url']); ?>" class="tb-action-4">
                                    <button class="btn"><?php echo (!empty($package['pt_package_btn_text'])) ? esc_attr($package['pt_package_btn_text']) : 'Sign Up'; ?></button>
                                </a>

                            <?php } ?>
                        </div>

                        <div class="tb-footer">
                            <p><?php echo esc_attr($package['pt_package_title']); ?></p>
                        </div>
                    </div> <!-- END pricing-table-wrap-->

                </div> <!-- END col-sm-4-->

            <?php endforeach; ?>
        </div> <!-- END row -->
    </div> <!-- END container-->

</section> <!-- END pricing-table-4-->



