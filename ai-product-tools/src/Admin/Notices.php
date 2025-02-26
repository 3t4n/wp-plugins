<?php

namespace AIPT\Admin;

class Notices {
    public function __construct() {
        add_action('admin_notices', [$this, 'check_woocommerce_dependency']);
        add_action('admin_notices', [$this, 'show_database_error']);
        add_action('admin_notices', [$this, 'show_bulk_feature_notice']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_notice_styles']);
    }

    public function enqueue_notice_styles() {
        if (!class_exists('WooCommerce')) {
            wp_add_inline_style('admin-bar', $this->get_notice_styles());
        }
    }

    private function get_notice_styles() {
        return "
            .aipt-admin-notice {
                border: none !important;
                padding: 16px 20px !important;
                background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%) !important;
                box-shadow: 0 2px 8px rgba(0,0,0,0.08) !important;
                margin: 20px 20px 20px 0 !important;
                border-radius: 8px !important;
                position: relative;
                border-left: 4px solid #2271b1 !important;
            }
            .aipt-admin-notice.notice-error {
                border-left-color: #d63638 !important;
            }
            .aipt-admin-notice.notice-info {
                border-left-color: #72aee6 !important;
            }
            .aipt-admin-notice h3 {
                font-size: 1.4em !important;
                font-weight: 600 !important;
                color: #1d2327 !important;
                margin: 0 0 0.4em 0 !important;
                display: flex !important;
                align-items: center !important;
                gap: 8px !important;
            }
            .aipt-admin-notice h3:before {
                content: '🤖';
                font-size: 1.2em;
            }
            .aipt-admin-notice p {
                font-size: 14px !important;
                margin: 0 0 12px 0 !important;
                color: #50575e !important;
                line-height: 1.5 !important;
            }
            .aipt-admin-notice .button-container {
                display: flex !important;
                align-items: center !important;
            }
            .aipt-woo-button {
                display: inline-flex !important;
                align-items: center !important;
                gap: 8px !important;
                background: #2271b1 !important;
                color: #ffffff !important;
                padding: 8px 16px !important;
                border-radius: 4px !important;
                text-decoration: none !important;
                font-weight: 500 !important;
                transition: all 0.3s ease !important;
                border: none !important;
                box-shadow: 0 2px 4px rgba(34,113,177,0.2) !important;
            }
            .aipt-woo-button:hover {
                background: #135e96 !important;
                color: #ffffff !important;
                transform: translateY(-1px) !important;
                box-shadow: 0 4px 8px rgba(34,113,177,0.3) !important;
            }
            .aipt-woo-button:focus {
                box-shadow: 0 0 0 1px #ffffff, 0 0 0 3px #2271b1 !important;
                outline: none !important;
            }
            .aipt-woo-button:before {
                content: '🛍️';
                font-size: 1.1em;
            }
        ";
    }

    public function check_woocommerce_dependency() {
        if (!class_exists('WooCommerce')) {
            $install_url = admin_url('plugin-install.php?s=woocommerce&tab=search&type=term');
            ?>
            <div class="notice notice-error is-dismissible aipt-admin-notice">
                <h3><?php esc_html_e('AI Product Tools', 'ai-product-tools'); ?></h3>
                <p><?php esc_html_e('AI Product Tools requires WooCommerce to be installed and activated.', 'ai-product-tools'); ?></p>
                <div class="button-container">
                    <a href="<?php echo esc_url($install_url); ?>" class="aipt-woo-button">
                        <?php esc_html_e('Install WooCommerce', 'ai-product-tools'); ?>
                    </a>
                </div>
            </div>
            <?php
        }
    }

    public function show_database_error() {
        $db_error = get_transient('aipt_database_error');
        if ($db_error) {
            ?>
            <div class="notice notice-error is-dismissible aipt-admin-notice">
                <h3><?php esc_html_e('AI Product Tools - Database Error', 'ai-product-tools'); ?></h3>
                <p><?php echo esc_html($db_error); ?></p>
                <div class="button-container">
                    <a href="<?php echo esc_url(admin_url('plugins.php')); ?>" class="aipt-woo-button">
                        <?php esc_html_e('Go to Plugins', 'ai-product-tools'); ?>
                    </a>
                </div>
            </div>
            <?php
            delete_transient('aipt_database_error');
        }
    }

    public function show_bulk_feature_notice() {
        $notice = get_transient('aipt_bulk_feature_notice');
        if ($notice) {
            ?>
            <div class="notice notice-info is-dismissible aipt-admin-notice">
                <h3><?php esc_html_e('AI Product Tools - New Feature!', 'ai-product-tools'); ?></h3>
                <p><?php echo esc_html($notice); ?></p>
                <div class="button-container">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=ai-product-tools')); ?>" class="aipt-woo-button">
                        <?php esc_html_e('Try Bulk Generator', 'ai-product-tools'); ?>
                    </a>
                </div>
            </div>
            <?php
            delete_transient('aipt_bulk_feature_notice');
        }
    }
} 