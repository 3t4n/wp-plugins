<?php

/**
 * Calculator display for frontend.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div id="InstaCash" style="margin-left: 1.5rem;" class="InstaCash">
    <div class="row justify-content-between mb-3 pb-3">
        <div class="rounded shadow-md col-md-8 py-3">
            <div class="overlay rounded" id="bnplOverlay" style="display: none;">
                <div class="overlay__inner">
                    <div class="overlay__content"><span class="spinner"></span></div>
                </div>
            </div>
            <div class="p-2">
                <div class="row">
                    <div class="col text-md-center my-auto">
                        <h3 class="h6 col-12 pt-2 pl-0 font-weight-bold text-secondary" style="font-size:1.8rem;font-weight:bold;">
                            <span><?php esc_html_e('Pay in', 'instacash-bnpl'); ?></span>
                            <span class="offer-installments-title">0</span>
                            <span><?php esc_html_e('pieces', 'instacash-bnpl'); ?></span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="duration-input">
                <input type="hidden" id="totalAmount" name="totalAmount" value="<?php echo esc_attr(WC()->cart->total); ?>">
                <input type="hidden" id="offerId" name="offerId" value="<?php echo esc_attr($this->info['offer']); ?>">
                <input type="hidden" id="financier" name="financier">
            </div>
            <div class="p-2 pt-2 offer-box border-bottom">
                <div class="row text-nowrap">
                    <div class="col">
                        <?php esc_html_e('APR', 'instacash-bnpl'); ?>
                    </div>
                    <div class="col mw-25 text-right text-dark">
                        <span class="offer-apr">
                        <strong>0</strong> %
                        </span>
                    </div>
                </div>
                <div class="offer-amounts">
                    <div class="row text-nowrap dp-block" style="display:none;">
                        <div class="col">
                            <?php esc_html_e('Down payment', 'instacash-bnpl'); ?>
                        </div>
                        <div class="col mw-25 text-right">
                            <span class="offer-down-payment">0</span>
                        </div>
                    </div>
                    <div class="row text-nowrap">
                        <div class="col">
                            <?php esc_html_e('Installments', 'instacash-bnpl'); ?>
                        </div>
                        <div class="col mw-25 text-right">
                            <span class="offer-installments">0</span>
                        </div>
                    </div>
                    <div class="row text-nowrap">
                        <div class="col">
                            <?php esc_html_e('Monthly repayment', 'instacash-bnpl'); ?>
                        </div>
                        <div class="col mw-25 text-right">
                            <span class="offer-repay">0</span>
                        </div>
                    </div>
                    <div class="row text-nowrap">
                        <div class="col text-dark">
                            <strong><?php  esc_html_e('Total Repayment', 'instacash-bnpl'); ?></strong>
                        </div>
                        <div class="col mw-25 text-right text-dark">
                        <span class="offer-total">
                            <strong>0</strong>
                        </span>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="offer-error text-red font-weight-bold">
                        <small class="error" style="display:none;"></small>
                    </p>
                </div>
            </div>
            <div class="payments row px-2"></div>
            <div id="payment-container" style="display:none;">
                <div class="payment col-md-6 p-2">
                    <div class="circle-wrapper">
                        <div class="payment-circle"></div>
                    </div>
                    <div>
                        <h4 class="fw-bold pay-amount"><small class="pay"></small></h4>
                        <small class="date"><?php esc_html_e('At the moment of purchase', 'instacash-bnpl'); ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded shadow-md col-md-4 py-3">
            <div class="col px-2"><h4><?php echo esc_html($this->info['usp_title']); ?></h4></div>
            <?php if ($this->info['usp_receipt_title']) : ?>
                <div class="px-2 col d-flex py-3 usp rounded">
                    <div class="d-grid border rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                            <path d="M23.0306 4.15107L21.2806 6.11961L18.8014 4.15107C18.6755 4.05912 18.5219 4.00935 18.3639 4.00935C18.206 4.00935 18.0523 4.05912 17.9264 4.15107L15.4473 6.11961L12.9681 4.15107C12.8422 4.05912 12.6886 4.00935 12.5306 4.00935C12.3726 4.00935 12.219 4.05912 12.0931 4.15107L9.61393 6.11961L7.86393 4.15107C7.38086 3.80394 6.69727 4.13349 6.69727 4.71351V25.805C6.69727 26.3851 7.38086 26.7146 7.86393 26.3675L9.61393 24.3989L12.0931 26.3675C12.219 26.4594 12.3726 26.5092 12.5306 26.5092C12.6886 26.5092 12.8422 26.4594 12.9681 26.3675L15.4473 24.3989L17.9264 26.3675C18.0523 26.4594 18.206 26.5092 18.3639 26.5092C18.5219 26.5092 18.6755 26.4594 18.8014 26.3675L21.2806 24.3989L23.0306 26.3675C23.5091 26.7146 24.1973 26.3851 24.1973 25.805V4.71351C24.1973 4.13349 23.5137 3.80394 23.0306 4.15107ZM21.2806 19.8291C21.2806 20.0224 21.1165 20.1806 20.916 20.1806H9.97852C9.77799 20.1806 9.61393 20.0224 9.61393 19.8291V19.1261C9.61393 18.9327 9.77799 18.7745 9.97852 18.7745H20.916C21.1165 18.7745 21.2806 18.9327 21.2806 19.1261V19.8291ZM21.2806 15.6108C21.2806 15.8041 21.1165 15.9623 20.916 15.9623H9.97852C9.77799 15.9623 9.61393 15.8041 9.61393 15.6108V14.9078C9.61393 14.7144 9.77799 14.5562 9.97852 14.5562H20.916C21.1165 14.5562 21.2806 14.7144 21.2806 14.9078V15.6108ZM21.2806 11.3925C21.2806 11.5858 21.1165 11.744 20.916 11.744H9.97852C9.77799 11.744 9.61393 11.5858 9.61393 11.3925V10.6894C9.61393 10.4961 9.77799 10.3379 9.97852 10.3379H20.916C21.1165 10.3379 21.2806 10.4961 21.2806 10.6894V11.3925Z" fill="var(--bnpl-primary-color)"/>
                        </svg>
                    </div>
                    <div class="d-grid px-2 ml-4">
                        <div><strong><?php echo esc_html($this->info['usp_receipt_title']); ?></strong></div>
                        <div><?php echo esc_html($this->info['usp_receipt_description']); ?></div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($this->info['usp_clock_title']) : ?>
                <div class="px-2 col d-flex py-3 usp rounded">
                    <div class="d-grid border rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                            <path d="M15.4473 2.75928C8.54202 2.75928 2.94727 8.35404 2.94727 15.2593C2.94727 22.1645 8.54202 27.7593 15.4473 27.7593C22.3525 27.7593 27.9473 22.1645 27.9473 15.2593C27.9473 8.35404 22.3525 2.75928 15.4473 2.75928ZM20.1091 18.5355L19.101 19.7956C19.0348 19.8783 18.953 19.9471 18.8603 19.9982C18.7675 20.0493 18.6656 20.0817 18.5603 20.0934C18.455 20.1051 18.3485 20.0959 18.2468 20.0664C18.1451 20.037 18.0501 19.9877 17.9674 19.9216L14.5904 17.4155C14.3545 17.2266 14.164 16.9871 14.0331 16.7146C13.9023 16.4421 13.8343 16.1437 13.8344 15.8414V8.00121C13.8344 7.78733 13.9193 7.5822 14.0706 7.43097C14.2218 7.27973 14.4269 7.19476 14.6408 7.19476H16.2537C16.4676 7.19476 16.6727 7.27973 16.824 7.43097C16.9752 7.5822 17.0602 7.78733 17.0602 8.00121V15.2593L19.9836 17.4014C20.0663 17.4676 20.1352 17.5495 20.1863 17.6423C20.2374 17.7351 20.2697 17.8371 20.2813 17.9424C20.293 18.0478 20.2838 18.1544 20.2542 18.2561C20.2247 18.3579 20.1753 18.4528 20.1091 18.5355Z" fill="var(--bnpl-primary-color)"/>
                        </svg>
                    </div>
                    <div class="d-grid px-2 ml-4">
                        <div><strong><?php echo esc_html($this->info['usp_clock_title']); ?></strong></div>
                        <div><?php echo esc_html($this->info['usp_clock_description']); ?></div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($this->info['usp_automat_title']) : ?>
                <div class="px-2 col d-flex py-3 usp rounded">
                    <div class="d-grid border rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                            <path d="M4.19727 14.0093H5.44727V21.5093H4.19727C4.03306 21.5095 3.87042 21.4773 3.71868 21.4145C3.56693 21.3518 3.42906 21.2597 3.31294 21.1436C3.19683 21.0275 3.10476 20.8896 3.04202 20.7379C2.97927 20.5861 2.94707 20.4235 2.94727 20.2593V15.2593C2.94707 15.0951 2.97927 14.9324 3.04202 14.7807C3.10476 14.6289 3.19683 14.4911 3.31294 14.375C3.42906 14.2588 3.56693 14.1668 3.71868 14.104C3.87042 14.0413 4.03306 14.0091 4.19727 14.0093ZM24.1973 12.1343V22.7593C24.1966 23.4221 23.933 24.0576 23.4643 24.5263C22.9956 24.995 22.3601 25.2586 21.6973 25.2593H9.19727C8.53443 25.2586 7.89892 24.995 7.43022 24.5263C6.96152 24.0576 6.69792 23.4221 6.69727 22.7593V12.1343C6.69713 11.7239 6.77787 11.3174 6.93487 10.9382C7.09187 10.559 7.32205 10.2145 7.61226 9.92427C7.90247 9.63406 8.24702 9.40388 8.62622 9.24688C9.00543 9.08988 9.41185 9.00914 9.82227 9.00928H14.1973V6.50928C14.1973 6.17776 14.329 5.85981 14.5634 5.62539C14.7978 5.39097 15.1157 5.25928 15.4473 5.25928C15.7788 5.25928 16.0967 5.39097 16.3311 5.62539C16.5656 5.85981 16.6973 6.17776 16.6973 6.50928V9.00928H21.0723C21.4827 9.00914 21.8891 9.08988 22.2683 9.24688C22.6475 9.40388 22.9921 9.63406 23.2823 9.92427C23.5725 10.2145 23.8027 10.559 23.9597 10.9382C24.1167 11.3174 24.1974 11.7239 24.1973 12.1343ZM13.2598 15.2593C13.2598 14.9502 13.1681 14.6481 12.9964 14.3912C12.8247 14.1342 12.5807 13.934 12.2952 13.8157C12.0097 13.6975 11.6955 13.6665 11.3924 13.7268C11.0893 13.7871 10.8109 13.9359 10.5924 14.1544C10.3739 14.3729 10.2251 14.6514 10.1648 14.9544C10.1045 15.2575 10.1354 15.5717 10.2537 15.8572C10.372 16.1427 10.5722 16.3868 10.8292 16.5584C11.0861 16.7301 11.3882 16.8218 11.6973 16.8218C11.9025 16.8218 12.1056 16.7814 12.2952 16.7029C12.4848 16.6244 12.6571 16.5093 12.8022 16.3642C12.9472 16.2191 13.0623 16.0468 13.1409 15.8572C13.2194 15.6677 13.2598 15.4645 13.2598 15.2593ZM12.9473 20.2593H10.4473V21.5093H12.9473V20.2593ZM16.6973 20.2593H14.1973V21.5093H16.6973V20.2593ZM20.7598 15.2593C20.7598 14.9502 20.6681 14.6481 20.4964 14.3912C20.3247 14.1342 20.0807 13.934 19.7952 13.8157C19.5097 13.6975 19.1955 13.6665 18.8924 13.7268C18.5893 13.7871 18.3109 13.9359 18.0924 14.1544C17.8739 14.3729 17.7251 14.6514 17.6648 14.9544C17.6045 15.2575 17.6354 15.5717 17.7537 15.8572C17.872 16.1427 18.0722 16.3868 18.3292 16.5584C18.5861 16.7301 18.8882 16.8218 19.1973 16.8218C19.4025 16.8218 19.6056 16.7814 19.7952 16.7029C19.9848 16.6244 20.1571 16.5093 20.3022 16.3642C20.4472 16.2191 20.5623 16.0468 20.6409 15.8572C20.7194 15.6677 20.7598 15.4645 20.7598 15.2593ZM20.4473 20.2593H17.9473V21.5093H20.4473V20.2593ZM27.9473 15.2593V20.2593C27.9475 20.4235 27.9153 20.5861 27.8525 20.7379C27.7898 20.8896 27.6977 21.0275 27.5816 21.1436C27.4655 21.2597 27.3276 21.3518 27.1758 21.4145C27.0241 21.4773 26.8615 21.5095 26.6973 21.5093H25.4473V14.0093H26.6973C26.8615 14.0091 27.0241 14.0413 27.1758 14.104C27.3276 14.1668 27.4655 14.2588 27.5816 14.375C27.6977 14.4911 27.7898 14.6289 27.8525 14.7807C27.9153 14.9324 27.9475 15.0951 27.9473 15.2593Z" fill="var(--bnpl-primary-color)"/>
                        </svg>
                    </div>
                    <div class="d-grid px-2 ml-4">
                        <div><strong><?php echo esc_html($this->info['usp_automat_title']); ?></strong></div>
                        <div><?php echo esc_html($this->info['usp_automat_description']); ?></div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col px-2"><h5 class="mt-0"><?php  esc_html_e('Besides', 'instacash-bnpl'); ?></h5></div>
            <div class="col px-2"><?php echo esc_html($this->info['description']); ?></div>
        </div>
    </div>
</div>
