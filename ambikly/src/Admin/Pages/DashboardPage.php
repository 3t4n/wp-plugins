<?php

namespace Ambikly\Admin\Pages;


use Ambikly\Admin\UIComponents;
use Ambikly\Controllers\ReportController;

class DashboardPage extends BasePage
{
    public function __construct()
    {

    }

    public function output()
    {

        if (!current_user_can('manage_options')) {
            return;
        }


        UIComponents::breadcrumb([], false);

        echo '<div class="wrap ambikly-dashboard">';

        $this->html();

        echo '</div>';
    }

    public function html()
    {

        /**
         * @var $report ReportController
         */
        $report = ambikly()->getClass('Controllers.ReportController');

        $total_sales = $report->getTotalSales();

        $total_orders = $report->getTotalOrders();

        $customers = $report->getTotalCustomers();

        $pending_payments = $report->getPendingPayments();

        $products = $report->getTotalProducts();

        $categories = $report->getTotalCategories();

        $refunded_orders = $report->getTotalRefundedOrders();

        $processing_orders = $report->getTotalProcessingOrders();

        ?>
        <div class="ambikly-dashboard-wrapper">
            <!-- First Row of Cards -->
            <div class="ambikly-dashboard-row">
                <div class="ambikly-dashboard-card">
                    <h3><?php echo esc_html__('Total Sales', 'ambikly'); ?></h3>
                    <p><?php echo esc_html(ambikly_get_price($total_sales)) ?></p>
                </div>
                <div class="ambikly-dashboard-card">
                    <h3><?php echo esc_html__('Total Orders', 'ambikly'); ?></h3>
                    <p><?php echo absint($total_orders); ?></p>
                </div>
                <div class="ambikly-dashboard-card">
                    <h3><?php echo esc_html__('Customers', 'ambikly'); ?></h3>
                    <p><?php echo absint($customers); ?></p>
                </div>
                <div class="ambikly-dashboard-card">
                    <h3><?php echo esc_html__('Pending Payments', 'ambikly'); ?></h3>
                    <p><?php echo absint($pending_payments); ?></p>
                </div>
            </div>

            <!-- Second Row of Cards -->
            <div class="ambikly-dashboard-row">
                <div class="ambikly-dashboard-card">
                    <h3><?php echo esc_html__('Products', 'ambikly'); ?></h3>
                    <p><?php echo absint($products); ?></p>
                </div>
                <div class="ambikly-dashboard-card">
                    <h3><?php echo esc_html__('Categories', 'ambikly'); ?></h3>
                    <p><?php echo absint($categories); ?></p>
                </div>
                <div class="ambikly-dashboard-card">
                    <h3><?php echo esc_html__('Refunded Orders', 'ambikly'); ?></h3>
                    <p><?php echo absint($refunded_orders); ?></p>
                </div>
                <div class="ambikly-dashboard-card">
                    <h3><?php echo esc_html__('Processing Orders', 'ambikly'); ?></h3>
                    <p><?php echo absint($processing_orders); ?></p>
                </div>
            </div>

            <!-- Action Links Section -->
            <div class="ambikly-dashboard-links">
                <h2><?php echo esc_html__('Quick Actions', 'ambikly'); ?></h2>
                <div class="ambikly-action-link">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=ambikly&sub=add-new-product')) ?>"><?php echo esc_html__('Add New Product', 'ambikly') ?></a>
                </div>
                <div class="ambikly-action-link">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=ambikly&sub=products')) ?>"><?php echo esc_html__('View All Products', 'ambikly'); ?></a>
                </div>
                <div class="ambikly-action-link">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=ambikly&sub=categories')) ?>"><?php echo esc_html__('Manage Categories', 'ambikly') ?></a>
                </div>
                <div class="ambikly-action-link">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=ambikly&sub=payments')); ?>"><?php echo esc_html__('View Payments', 'ambikly') ?></a>
                </div>
            </div>
        </div>
        <?php
    }
}