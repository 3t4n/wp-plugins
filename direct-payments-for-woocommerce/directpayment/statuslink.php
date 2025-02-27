<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
echo '<p>';
echo '<a href="' . esc_url(add_query_arg(array('page' => 'digages-direct-payments', 'status' => 'any'))) . '">All (' . esc_html($all_orders_count) . ')</a> | ';
echo '<a href="' . esc_url(add_query_arg(array('page' => 'digages-direct-payments', 'status' => 'processing'))) . '">Confirmed (' . esc_html($processing_orders_count) . ')</a> | ';
echo '<a href="' . esc_url(add_query_arg(array('page' => 'digages-direct-payments', 'status' => 'on-hold'))) . '">On hold (' . esc_html($on_hold_orders_count) . ')</a> | ';
echo '<a href="' . esc_url(add_query_arg(array('page' => 'digages-direct-payments', 'status' => 'completed'))) . '">Completed (' . esc_html($completed_orders_count) . ')</a> | ';
echo '<a href="' . esc_url(add_query_arg(array('page' => 'digages-direct-payments', 'status' => 'cancelled'))) . '">Cancelled (' . esc_html($cancelled_orders_count) . ')</a>';
echo '</p>';
?>