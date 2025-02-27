<?php
require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-b1-accounting-base.php';

class B1_Accounting_Debugger extends B1_Accounting_Base
{
    /**
     * Test
     * @return string
     */
    public function run()
    {
        $style = "background-color:#EEE; padding: 2px; font-family: monospace";
        $result = ["Started at ".date('Y-m-d H:i:s')];
        $fatalError = false;
        global $wpdb;

        $sync_orders_from = $this->get_option('sync_orders_from');
        if (!$sync_orders_from) {
            $result[] = "<b>Exception</b>: Not set sync_orders_from";
            $fatalError = true;
        }

        if (!$this->get_option('order_date') || trim($this->get_option('order_date')) == "") {
            $result[] = "<b>Exception</b>: Empty field mapping values (order_date). You must again enable B1 plugin (disable first, if it is enabled).";
            $fatalError = true;
        }
        $sync_order_status = $this->get_option('sync_order_status');
        if (!$sync_order_status) {
            $result[] = "<b>Exception</b>: Not set status of orders to sync";
            $fatalError = true;
        }

        if(!$fatalError) {
            $accManager = new B1_Accounting_Manager($this->plugin_name, $this->version);

            $sql = "SELECT count(*) as cnt FROM {$wpdb->prefix}posts WHERE b1_reference_id IS NULL AND post_type = 'shop_order' AND `post_status` = '{$sync_order_status}'  AND `post_date` >= %s";
            $query = $wpdb->prepare($sql, $sync_orders_from);
            $cnt = $wpdb->get_var($query);
            $result[] =  "<b>Main query for select:</b><span style='{$style}'> " . $query . "</span>";

            if($cnt == 0 && $this->get_option('woocommerce_custom_orders_table_enabled') == 'yes' && $this->get_option('woocommerce_custom_orders_table_data_sync_enabled') != 'yes' ) {
                $result[] = "HPOS detected, but not enabled compatibility mode";
            } elseif ($cnt == 0) {
                $result[] = "<br><i class='fa fa-exclamation-triangle'></i>Not normal case. Try to search in database.<br>";

                $sql = "SELECT count(*) as cnt FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND `post_status` = '{$sync_order_status}'  AND `post_date` >= %s";
                $query = $wpdb->prepare($sql, $sync_orders_from);
                $cntTotal = $wpdb->get_var($query);
                $result[] = "Total orders count in DB with status <b>'{$sync_order_status}'</b>:<span style='{$style}'> " . $cntTotal . "</span>";
                $result[] =  "with query:<span style='{$style}'> " . $query . "</span>";
                if($cntTotal > 0) {
                    $result[] = "I think orders already in B1";

                    $result[] = "Get first order and look at it";

                    $sql = "SELECT p.* FROM {$wpdb->prefix}posts p inner join {$wpdb->prefix}postmeta pm on pm.post_id=p.ID and pm.meta_key='_date_completed' WHERE p.post_type = 'shop_order' AND p.post_status = '{$sync_order_status}'  AND p.post_date >= %s LIMIT 1";
                    $query = $wpdb->prepare($sql, $sync_orders_from);
                    $orders = $wpdb->get_results($query);
                    if ($orders) {
                        $orderData = $accManager->generate_order_data($orders[0]->ID, true);
                        $result[] = "Order data:<span style='{$style}'><pre>" . print_r($orderData, true) . "</pre></span>";
                        $wcOrder = wc_get_order($orders[0]->ID);
                        $orderItemsData = [];
                        foreach ($wcOrder->get_items(['line_item']) as $item) {
                            $styleItmPre = '';
                            $itemData = $accManager->generate_order_item_data($item, $orders[0]->ID, true);
                            if (isset($itemData['debug'])) {
                                $styleItmPre = "background-color:#fdeae0;";
                            }
                            $orderItemsData[] = $itemData;
                        }
                        $result[] = "Order items data: <span style='{$style}'><pre style='{$styleItmPre}'>" . print_r($orderItemsData, true) . "</pre></span>";
                    } else {
                        $result[] = "oops, order not found";
                    }
                } else {
                    $result[] = "Try to run query with different <b>where</b> clause";
                }
            } else { // normal
                $result[] = "Total orders ready for send to B1: <span style='{$style}'> " . $cnt . "</span>";
                $result[] = "Get sample order";
                // get order data
                $orders = B1_Accounting_Order::fetch_all_orders($sync_orders_from, $sync_order_status, 1);
                $orderData = $accManager->generate_order_data($orders[0]->ID);
                $result[] = "Order data:<span style='{$style}'><pre>" . print_r($orderData,true). "</pre></span>";

                $wcOrder = wc_get_order($orders[0]->ID);
                $orderItemsData = [];
                foreach ($wcOrder->get_items(['line_item']) as $item) {
                    $styleItmPre = '';
                    $itemData = $accManager->generate_order_item_data($item, $orders[0]->ID, true);
                    if(isset($itemData['debug'])) {
                        $styleItmPre = "background-color:#fdeae0;";
                    }
                    $orderItemsData[] = $itemData;
                }
                $result[] = "Order items data: <span style='{$style}'><pre style='{$styleItmPre}'>" . print_r($orderItemsData,true). "</pre></span>";
            }
        }

        return "<div>".implode("<br>",$result) ."</div>";
    }

    public function runQuery($query)
    {
        global $wpdb;
        $result = "";

        $query = trim(str_replace("\\","", $query));
        if($query) {
            $query = $wpdb->prepare($query);
            $queryResult = $wpdb->get_results($query,ARRAY_A);

            $result .="<div style='overflow-x: auto'><table style='border-spacing: 1px;border-collapse: separate;'><tr>";
            foreach($wpdb->get_col_info() as $col) {
                $result .="<th>{$col}</th>";
            }

            foreach($queryResult as $row) {
                $result .="<tr>";
                foreach($row as $_column) {
                    if(mb_strlen($_column) > 80) {
                        $_column  = mb_substr($_column, 0, 80) . '...';
                    }
                    $_column = htmlentities($_column);
                    $result .="<td>{$_column}</td>";
                }
                $result .="</tr>";
            }

            $result .="</table></div>";
        }
        return $result;

    }

}
