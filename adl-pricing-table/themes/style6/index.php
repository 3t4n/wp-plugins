<?php
// get theme data
$pt_style6_ = get_post_meta($id, 'pt_style6_', true);
// sanitize all value
$pt_style6_ = (!empty($pt_style6_)) ? array_map('sanitize_text_field', $pt_style6_) : [];

//bg color
$pt_style6_hcolor = (!empty($pt_style6_['hcolor'])) ? $pt_style6_['hcolor'] : '#3b82ea';
$pt_style6_hc = (!empty($pt_style6_['hc'])) ? $pt_style6_['hc'] : '#ff5e6b';
$pt_style6_bg = (!empty($pt_style6_['bg'])) ? $pt_style6_['bg'] : '#fff';
$pt_style6_shadow = (!empty($pt_style6_['shadow'])) ? $pt_style6_['shadow'] : '#aaa';
$pt_style6_border = (!empty($pt_style6_['border'])) ? $pt_style6_['border'] : '#dcdcdc';
// text color
$pt_style6_txt_color = (!empty($pt_style6_['txt_color'])) ? $pt_style6_['txt_color'] : '#969696';

/*it means if price font size is 45px then currency symbol font size will be around 30px*/
$CurrencyFS = round(((intval($priceFS) * 66) / 100 )).'px';
$arrowFS = (intval($buttonFS) -1 ).'px'; // if button font is 14 then arrow size will be 13 as in the static html design.
$iconFS = (intval($featureFS) -1 ).'px'; // if feature font is 14 then fontawesome icon size will be 13 as in the static html design.

?>
<section id="pricing-table-6">
    <div class="container-fluid" id="<?= $ptTblID; ?>">
        <div class="row">
            <style>
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-6{
                    background: <?= $pt_style6_bg; ?>;
                    border-left: 1px solid <?= $pt_style6_border; ?>;
                    border-right: 1px solid <?= $pt_style6_border; ?>;
                    border-bottom: 1px solid <?= $pt_style6_border; ?>;
                }
                #<?= $ptTblID; ?> .tb-header-6 > h1,
                #<?= $ptTblID; ?> .tb-price-6,
                #<?= $ptTblID; ?> .tb-action-6 .btn {
                                      background: <?= $pt_style6_hcolor; ?>;
                                      color: <?= $pt_style6_bg; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-action-6 .btn {
                                      font-size: <?= $buttonFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-action-6 .btn i {
                                      font-size: <?= $arrowFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-price-6 {
                                      box-shadow: 1px 1px 5px 1px <?= $pt_style6_shadow; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-price-6 > p,
                #<?= $ptTblID; ?> .tb-price-6 > span {
                                      color: <?= $pt_style6_bg; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-price-6 > p {
                                      font-size: <?= $priceFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-price-6 > span {
                                      font-size: <?= $planFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-price-6 > p > span {
                                      font-size: <?= $CurrencyFS; ?>;
                                  }



                #<?= $ptTblID; ?> .tb-features-6 > ul > li > i{
                                      color: <?= $pt_style6_hcolor; ?> ;
                                      font-size: <?= $iconFS; ?>;
                                  }
                #<?= $ptTblID; ?> .tb-features-6 > ul > li {
                                      color: <?= $pt_style6_txt_color; ?>;
                                      font-size: <?= $featureFS; ?>;

                                  }
                /*Hover*/
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-6:hover .tb-header-6 > h1,
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-6:hover .tb-price-6,
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-6:hover .tb-action-6 .btn {
                                      background: <?= $pt_style6_hc; ?>;
                                  }
                #<?= $ptTblID; ?> .pricing-table-wrap.tb-6:hover .tb-features-6 > ul > li > i {
                                      color: <?= $pt_style6_hc; ?>;
                                  }




            </style>
            <?php

            foreach ( $package_data as $package ):
                $pt_currency = (!empty($package['pt_package_currency'])) ?  esc_html(trim($package['pt_package_currency'])) : '';
                $features = explode(',', $package['pt_package_features']);
                $features = array_map('trim', $features);

                ?>

                <div class="<?php echo $columns; ?>">
                    <div class="pricing-table-wrap tb-6">
                        <?php if ( !empty($package['pt_package_highlight']) && 'yes' == $package['pt_package_highlight'] ) { ?>
                            <div class="apt-ribbon" style="background-color: <?= (!empty($package['pt_package_ribbon_bg'])) ?  esc_attr(trim($package['pt_package_ribbon_bg'])) : '#ffeb3b'; ?>;color: <?= (!empty($package['pt_package_ribbon_color'])) ?  esc_attr(trim($package['pt_package_ribbon_color'])) : '#333'; ?>;" ><?= (!empty($package['pt_package_ribbon_text'])) ?  esc_html(trim($package['pt_package_ribbon_text'])) : 'Popular'; ?></div>
                        <?php } ?>
                        <div class="tb-header-6">
                            <h1><?= esc_attr($package['pt_package_title']); ?></h1>
                        </div>

                        <div class="tb-price-6">
                            <p><span><?= $pt_currency; ?></span><?= esc_attr($package['pt_package_price']); ?></p>
                            <span><?= esc_attr($package['pt_package_time']); ?></span>
                        </div>
                        <div class="tb-features-6">
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



                        <div class="tb-action-6" style="min-height: 92px">
                            <?php if ( !empty($package['pt_package_btn_url'] ) ) { ?>

                                <a href="<?= esc_url($package['pt_package_btn_url']); ?>" class="tb-action-6">
                                    <button class="btn"><?= (!empty($package['pt_package_btn_text'])) ? esc_attr($package['pt_package_btn_text']) : 'Sign Up'; ?> <i class="fa fa-arrow-right"></i></button>
                                </a>

                            <?php } ?>
                        </div>

                    </div> <!-- END pricing-table-wrap-->
                </div> <!-- END col-sm-4-->



            <?php endforeach; ?>



        </div> <!-- END row -->
    </div> <!-- END container-->

</section> <!-- END pricing-table-6-->