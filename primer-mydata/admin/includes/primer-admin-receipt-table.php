<?php
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

require_once PRIMER_PATH . 'views/get_receipt_list.php';

class PrimerReceipt extends WP_List_Table {

    function __construct() {

        parent::__construct(
            array(
                'singular' => __( 'Receipt', 'primer' ),
                'plural' => __( 'Receipts', 'primer' ),
                'ajax' => false,
            )
        );

        $this->prepare_items();
        add_action( 'wp_print_scripts', [ __CLASS__, '_list_table_css' ] );
    }

    public function display():void {
        $this->search_box( esc_html__( 'Search  by order id or number of invoice', 'primer' ), 'filter_action' );
        parent::display();

    }

    function get_columns():array {
        return array(
            'cb'		 	       => '<input type="checkbox" />',
            'receipt_id'		   => __( 'No.', 'primer' ),
            'invoice_type'         => __('Invoice Type', 'primer'),
            'receipt_date' 	       => __( 'Receipt Date', 'primer' ),
            'receipt_hour'	       => __( 'Hour', 'primer' ),
            'receipt_client'	   => __( 'Client', 'primer' ),
            'receipt_price'	       => __( 'Total Price', 'primer' ),
            'receipt_status'	   => __( 'Receipt Status', 'primer' ),
            'receipt_error_status' => __( 'Errors', 'primer' ),
            'credit_receipt'       => __('Credit Receipt', 'primer' ),
            'cancelled_receipt'    => __('Cancelled Receipt', 'primer' )
        );
    }

    function get_sortable_columns():array {
        return array();
    }

    function column_default($item, $column_name) {
        if ($column_name == 'credit_receipt' || $column_name == 'cancelled_receipt') {
            return $item[ $column_name ];
        }
        if ($column_name == 'invoice_type') {
            $order_customer_country = get_locale() == 'el' ? 'GR' : get_locale();
            $invoice_type           = get_the_terms($item['receipt_id'], 'receipt_status');

            $invoice_type_slug = '';
            if (is_array($invoice_type)) {
                $invoice_type_slug = $invoice_type[0]->slug;
            }

            if ($invoice_type_slug == 'credit-invoice' || $invoice_type_slug == 'credit-receipt') {
                $find_invoice_in_slug = $invoice_type_slug;
            } else {
                $invoice_type_name = explode('_', $invoice_type_slug);
                $find_invoice_in_slug = '';
                if(array_key_exists(1, $invoice_type_name)){
                    $find_invoice_in_slug = $invoice_type_name[1];
                }
            }

            $is_credit_receipt = get_post_meta($item['receipt_id'], 'credit_receipt', true);
            $log_for_order     = get_post_meta($item['receipt_id'], $is_credit_receipt ? 'credit_log_id_for_order' : 'log_id_for_order', true);
            $json_send_to_api  = get_post_meta($log_for_order, 'json_send_to_api', true);
            preg_match('/"invoiceType":\s*("[^"]+"|\d+(\.\d+)?)/', $json_send_to_api, $type);
            $invoiceType       = json_decode($type[1], true);

            $invoice_texts = [
                'GR' => [
                    '11.1' => 'Απόδειξη Λιανικής',
                    '11.2' => 'Απόδειξη Παροχής Υπηρεσιών',
                    '11.4' => 'Πιστωτικό Στοιχείο Λιανικής',
                    '1.1'  => 'Τιμολόγιο Πώλησης',
                    '1.2' =>  'Τιμολόγιο Ενδοκοινοτικών Παραδόσεων',
                    '1.3' => 'Τιμολόγιο Παραδόσεων Τρίτων Χωρών',
                    '2.1'  => 'Τιμολόγιο Παροχής Υπηρεσιών',
                    '2.2' => 'Τιμολόγιο Παροχής - Ενδοκοινοτική Παροχή Υπηρεσιών',
                    '2.3' => 'Τιμολόγιο Παροχής - Παροχή Υπηρεσιών σε λήπτη Τρίτης Χώρας',
                    '5.1'  => 'Πιστωτικό Τιμολόγιο Συσχετιζόμενο'
                ],
                'NOT_GR' => [
                    '11.1' => 'Retail Receipt',
                    '11.2' => 'Service Provision Receipt',
                    '11.4' => 'Retail Credit Note',
                    '1.1'  => 'Sales Invoice',
                    '1.2' =>  'EU-Community Supply Invoice',
                    '1.3' => 'Third Country Supply Invoice',
                    '2.1'  => 'Service Provision Invoice',
                    '2.2' => 'Service Provision - EU-Community Service Supply Invoice',
                    '2.3' => 'Service Provision - Service Supply to Third Country Recipient Invoice',
                    '5.1'  => 'Related Credit Invoice'
                ]
            ];
            $invoice_type_text = $invoice_texts[$order_customer_country === 'GR' ? 'GR' : 'NOT_GR'][$invoiceType] ?? '';

            $new_url = get_permalink($item['receipt_id']) . '?receipt=view';
            if (!empty($new_url) && !empty($invoice_type_text)) {
                echo '<a href="' . esc_url($new_url) . '" target="_blank" class="order-view"><strong>' . esc_attr($invoice_type_text) . '</strong></a>';
            } else {
                echo '';
            }
        }
        $receipt_series = get_post_meta($item['receipt_id'], '_primer_receipt_series', true);
        $receipt_number = get_post_meta($item['receipt_id'], '_primer_receipt_number', true);
        if ($receipt_series != 'EMPTY') {
            $receipt_numbering = $receipt_series. ' '.$receipt_number;
        } else {
            $receipt_numbering = $receipt_number;
        }
        if ($column_name == 'receipt_id') {
            if (!empty($item[ $column_name ])) {
                $find_invoice_in_slug = '';
                $invoice_type = get_the_terms($item['receipt_id'], 'receipt_status');
                if (is_array($invoice_type)) {
                    $invoice_type_slug = $invoice_type[0]->slug;
                    $invoice_type_name = explode('_', $invoice_type_slug);
                    if(array_key_exists(1, $invoice_type_name)){
                        $find_invoice_in_slug = $invoice_type_name[1];
                    }
                }

                if ($find_invoice_in_slug == 'receipt') {
                    $new_url = get_permalink($item['receipt_id']) . '?receipt=view';
                } else {
                    $new_url = get_permalink($item['receipt_id']);
                }

                echo '<a href="' . esc_url( $new_url ) . '" target="_blank" class="order-view"><strong>' . esc_attr( $receipt_numbering ? $receipt_numbering : $item[ $column_name ] ) . '</strong></a>';
            } else {
                echo '';
            }
        } else {
            if ($column_name !== 'receipt_error_status') {
                $find_invoice_in_slug = '';
                $invoice_type         = get_the_terms($item['receipt_id'], 'receipt_status');

                if (is_array($invoice_type)) {
                    $invoice_type_slug = $invoice_type[0]->slug;
                    $invoice_type_name = explode('_', $invoice_type_slug);
                    if(array_key_exists(1, $invoice_type_name)){
                        $find_invoice_in_slug = $invoice_type_name[1];
                    }
                }

                if ($find_invoice_in_slug == 'receipt') {
                    $new_url = get_permalink($item['receipt_id']) . '?receipt=view';
                } else {
                    $new_url = get_permalink($item['receipt_id']);
                }
                echo '<a href="' . esc_url( $new_url ) . '" target="_blank" class="order-view"><strong>' . esc_attr( array_key_exists($column_name, $item)  ? $item[ $column_name ] : '' ) . '</strong></a>';
            } else {
                if (!empty($item[ $column_name ])) {
                    $allowed_html = array(
                        'a' => array(
                            'href' => array(),
                            'title' => array(),
                            'target' => array()
                        ),
                        'strong' => array(
                            'class' => array(),
                        )
                    );
                    $escpe = '<a href="' . $item[ $column_name ] . '" target="_blank" class="order-view"><strong>' . __('Log', 'primer') . '</strong></a>';
                    echo wp_kses($escpe,$allowed_html);
                } else {
                    echo '';
                }
            }
        }

    }

    private array $hidden_columns = array(
        'credit_receipt',
        'cancelled_receipt'
    );

    function column_cb($item):string {
        return sprintf(
            '<input type="checkbox" name="receipts[]" id="receipt_'.$item['receipt_id'].'" value="%s" />',
            $item['receipt_id']
        );
    }

    protected function get_bulk_actions():array {
        return array();
    }

    function extra_tablenav($which):void {
        if ($which !== 'bottom') {
            $primer_receipts = new PrimerReceiptList();
            $primer_receipts_customers = $primer_receipts->get_users_from_receipts();

            ?>
            <div class="actions">

                <h2><?php esc_html_e('Filters', 'primer'); ?></h2>
                <h3><?php esc_html_e('Date Range:', 'primer'); ?></h3>

                <div class="filter_blocks_wrapper">
                    <div class="left_wrap">

                        <div class="filter_block">

                            <label for="primer_receipt_year" style="float: left;"><?php esc_html_e('Year: ', 'primer'); ?></label>
                            <select name="primer_receipt_year" id="primer_receipt_year">

                                <?php

                                $year_from = !empty($receipts_dates = $primer_receipts->get_dates_from_receipts()) ? date('Y', min($receipts_dates)) : '';
                                $year_to = date('Y');
                                $primer_order_year = isset($_GET['primer_receipt_year']) ? sanitize_text_field($_GET['primer_receipt_year']) : $year_to;
                                $range_years = range($year_from, $year_to);

                                foreach ($range_years as $range_year) { ?>
                                    <option value="<?php echo esc_attr($range_year); ?>" <?php selected($range_year, $primer_order_year); ?>><?php echo esc_attr($range_year); ?></option>
                                <?php }
                                ?>

                            </select>

                        </div>

                        <div class="filter_block">

                            <label for="receipt_date_from">
                                <?php esc_html_e('From: ', 'primer'); ?></label>
                            <input type="text" id="receipt_date_from" name="receipt_date_from" placeholder="Date From" value="" />
                            <label for="receipt_date_to">
                                <?php esc_html_e('To: ', 'primer'); ?></label>
                            <input type="text" id="receipt_date_to" name="receipt_date_to" placeholder="Date To" value="" />

                        </div>

                        <div class="filter_block">

                            <label for="primer_receipt_client" style="float: left;"><?php esc_html_e('Client: ', 'primer'); ?></label>
                            <select name="primer_receipt_client" id="primer_receipt_client" data-placeholder="<?php esc_html_e('Select clients', 'primer'); ?>">
                                <option value=""></option>

                                <?php
                                $primer_receipts_customers = array_unique($primer_receipts_customers, SORT_REGULAR);
                                $get_customer = isset($_GET['primer_receipt_client']) ? sanitize_text_field($_GET['primer_receipt_client']) : '';
                                foreach ( $primer_receipts_customers as $receipt_customer ) {
                                    if ( $receipt_customer['receipt_client_id'] ) { ?>
                                        <option value="<?php echo esc_attr($receipt_customer['receipt_client']); ?>" <?php selected($get_customer, $receipt_customer['receipt_client']); ?>><?php echo esc_attr($receipt_customer['receipt_client']); ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo esc_attr($receipt_customer['receipt_client']); ?>" <?php selected($get_customer, $receipt_customer['receipt_client']); ?>><?php esc_html_e( 'Guest client', 'primer' ); ?></option>
                                    <?php }
                                } ?>

                            </select>

                        </div>
                    </div>

                    <div class="right_wrap">
                        <div class="filter_block">

                            <label for="primer_receipt_status" style="float: left;"><?php esc_html_e('Receipt Status: ', 'primer'); ?></label>
                            <select name="primer_receipt_status" title="<?php esc_html_e('Select receipt status', 'primer'); ?>" id="primer_receipt_status">

                                <?php
                                $get_status = isset($_GET['primer_receipt_status']) ? sanitize_text_field($_GET['primer_receipt_status']) : '';
                                $status_of_receipts = array(
                                    'issued' => __('Issued', 'primer'),
                                    'not_issued' => __('Failed to issue', 'primer')
                                );
                                foreach ( $status_of_receipts as $status_k => $status_value ) { ?>
                                    <option value="<?php echo esc_attr($status_k); ?>" <?php selected($status_k, $get_status); ?>><?php echo esc_attr($status_value); ?></option>
                                <?php }
                                ?>

                            </select>

                        </div>

                        <div class="filter_block">

                            <label for="primer_receipt_type" style="float: left;"><?php esc_html_e('Invoice Type: ', 'primer'); ?></label>
                            <select name="primer_receipt_type" title="<?php esc_html_e('Select invoice type', 'primer'); ?>" id="primer_receipt_type">

                                <?php
                                $get_type = isset($_GET['primer_receipt_type']) ? sanitize_text_field($_GET['primer_receipt_type']) : '';

                                $type_of_receipts = array(
                                    '' => __('All', 'primer'),
                                    'greek_receipt'   => __('Receipts', 'primer'),
                                    'greek_invoice'   => __('Invoices', 'primer'),
                                    'english_invoice' => __('Invoices outside Greece', 'primer'),
                                    'credit-receipt'  => __('Credit Receipts', 'primer'),
                                    'credit-invoice'  => __('Credit Invoices', 'primer')
                                );

                                foreach ($type_of_receipts as $status_k => $status_value) { ?>
                                    <option value="<?php echo esc_attr($status_k); ?>" <?php selected($status_k, $get_type); ?>><?php echo esc_attr($status_value); ?></option>
                                <?php }
                                ?>

                            </select>

                        </div>

                        <div class="apply_btn"><input type="submit" id="filter_action_receipt" class="button" name="filter_action" value="<?php esc_html_e('Apply filter', 'primer'); ?>" /></div>
                    </div>
                </div>
            </div>

            <div class="loadingio-spinner-spinner-chyosfc7wi6" id="mySpinner"><div class="ldio-drsjmtezgls"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>

            <?php
            $formatted_max_receipt_date = '';
            $formatted_min_receipt_date = '';
            if (!empty($receipts_dates)) {
                $min_receipt_date = min($receipts_dates);
                $max_receipt_date = max($receipts_dates);
                $formatted_min_receipt_date = date('m/d/Y', $min_receipt_date);
                $formatted_max_receipt_date = date('m/d/Y', $max_receipt_date);
            }
            ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select-woo@1.0.1/dist/js/selectWoo.min.js"></script>

            <script>

                jQuery(document).ready(function ($) {
                   $.fn.selectpicker.Constructor.BootstrapVersion = '4';
                   $('.selectpicker').selectpicker();
                   $('#primer_receipt_client').selectWoo({
                       allowClear:  true,
                       placeholder: $(this).data('placeholder')
                   });
                   let select_year = $('select[name="primer_receipt_year"]').val();
                   let min_receipt_date = "<?php echo esc_attr($formatted_min_receipt_date); ?>";
                   let max_receipt_date = "<?php echo esc_attr($formatted_max_receipt_date); ?>";
                   let min_year_range = new Date(min_receipt_date).getFullYear();
                   let date_from = $('input[name="receipt_date_from"]'),
                       date_to   = $('input[name="receipt_date_to"]');
                   $('input[name="receipt_date_from"], input[name="receipt_date_to"]').datepicker({
                       changeMonth: true,
                       changeYear: true,
                       dateFormat: "yy-mm-dd",
                       minDate: new Date(min_receipt_date),
                       maxDate: "now",
                       yearRange: min_year_range + ":now",
                   });
                   $('input[name="receipt_date_from"]').datepicker("option", "minDate", new Date(min_receipt_date));
                   $('input[name="receipt_date_to"]').datepicker("option", "maxDate", new Date(max_receipt_date));

                    <?php if (isset($_GET['receipt_date_from']) && !empty($_GET['receipt_date_from'])) {
                        ?>
                    $('input[name="receipt_date_from"]').datepicker("setDate", new Date("<?php echo esc_html_e($_GET['receipt_date_from'], 'primer'); ?>"));
                    <?php } ?>

                    <?php if (isset($_GET['receipt_date_to']) && !empty($_GET['receipt_date_to'])) { ?>
                    $('input[name="receipt_date_to"]').datepicker("setDate", new Date("<?php echo esc_html_e($_GET['receipt_date_to'], 'primer'); ?>"));
                    <?php } ?>

                    $('select[name="primer_receipt_year"]').on('change', function () {
                        select_year = $(this).val();
                        $('input[name="receipt_date_from"], input[name="receipt_date_to"]').datepicker("destroy");
                        $('input[name="receipt_date_from"], input[name="receipt_date_to"]').datepicker({
                            changeMonth: true,
                            changeYear: true,
                            dateFormat: "yy-mm-dd",
                            minDate: new Date(min_receipt_date),
                            maxDate: "now",
                            yearRange: min_year_range + ":now"
                        });
                        let currentDate = new Date();
                        let currentDay = currentDate.getDate();
                        let currentMonth = currentDate.getMonth()+1;
                        let set_current_date = currentMonth + '/' + currentDay + '/' + select_year;
                        $('input[name="receipt_date_from"]').datepicker("setDate", new Date(set_current_date));
                        $('input[name="order_date_to"]').datepicker( 'option', 'minDate', date_from.val() );
                    });
                    date_from.on( 'change', function() {
                        date_to.datepicker( 'option', 'minDate', date_from.val() );
                    });
                    date_to.on('change', function () {
                        date_to.datepicker('option', 'maxDate', date_to.val());
                    });
                    var atLeastOneIsChecked = $('input[name="receipts[]"]:checked').length > 0;
                    if (atLeastOneIsChecked) {
                        $('.convert_receipts input[type="submit"]').removeAttr('disabled');
                        $('.resend_receipt_to_customer').removeAttr('disabled');
                        $('.cancel_receipt').removeAttr('disabled');
                    }
                    function checker() {
                        var length_inputs = $('input[name="receipts[]"]').length;
                        var trues = new Array();
                        $('input[name="receipts[]"]').each(function (i, el) {
                            if ($(el).prop('checked') == true || $(el).is(':checked') == true) {
                                $('.convert_receipts input[type="submit"]').removeAttr('disabled');
                                $('.resend_receipt_to_customer').removeAttr('disabled');
                                $('.cancel_receipt').removeAttr('disabled');
                                trues.push($(el));
                            }
                        })
                        if (trues.length <= 0) {
                            $('.convert_receipts input[type="submit"]').attr('disabled', true);
                            $('.resend_receipt_to_customer').attr('disabled', true);
                            $('.cancel_receipt').removeAttr('disabled');
                        }
                    }
                    $('.wp-list-table #cb input:checkbox').on('click', function () {
                        checker();
                        if ($(this).is(':checked')) {
                            $('.convert_receipts input[type="submit"]').removeAttr('disabled');
                            $('.resend_receipt_to_customer').removeAttr('disabled');
                            $('.cancel_receipt').removeAttr('disabled');
                        } else {
                            $('.convert_receipts input[type="submit"]').attr('disabled', true);
                            $('.resend_receipt_to_customer').attr('disabled', true);
                            $('.cancel_receipt').removeAttr('disabled');
                        }
                    });
                    $('.wp-list-table input[name="receipts[]"]').on('click', function () {
                        checker();
                    });
                    function popupOpenClose(popup) {
                        if ($('.popup_wrapper').length == 0) {
                            $(popup).wrapInner("<div class='popup_wrapper'></div>")
                        }
                        $(popup).show();
                        $(popup).click(function (e) {
                            if (e.target == this) {
                                if ($(popup).is(':visible')) {
                                    $(popup).hide();
                                }
                            }
                        })
                    }
                    $('#tables-receipt-filter .resend_receipt_to_customer').on('click', function (e) {
                        e.preventDefault();
                        $('.resend_receipt_to_customer').attr('disabled', true);
                        var checked_receipts_data = $('#tables-receipt-filter input[name="receipts[]"]').serialize();
                        $.ajax({
                            url: primer.ajax_url,
                            data: 'action=primer_resend_receipt_to_customer&'+checked_receipts_data,
                            type: 'post',
                            dataType: 'json',
                            beforeSend: function () {
                                var $table = $('table.table-view-list.receipts');
                                $table.css({ 'opacity': '0.5' });
                                var tableZIndex = parseInt($table.css('z-index'), 10) || 0;
                                $('.loadingio-spinner-spinner-chyosfc7wi6').css({ 'z-index': tableZIndex + 1 });
                                $('.loadingio-spinner-spinner-chyosfc7wi6').show();
                            },
                            error: function(response){
                                console.log(response);
                            },
                            success: function (response) {
                                if (response.success === 'true' && response.response !== false) {
                                    console.log(response.response_wrap);
                                    setTimeout(function () {
                                        $('.loadingio-spinner-spinner-chyosfc7wi6').hide();
                                        $('table.table-view-list.receipts').css({'opacity': '1'});
                                        $('table.table-view-list.receipts').append(response.response_wrap);
                                        popupOpenClose('.primer_popup');
                                    }, 1000);
                                    setTimeout(function () {
                                        document.location.reload();
                                    }, 1700)
                                }
                            }
                        })
                    })
                    function check_exist_receipts(receipts) {
                        var receipt_arr = new Array();
                        $(receipts).each(function (i, el) {
                            var tr_parent = $(el).parents('tr');
                            var credit_receipt = tr_parent.find('td.credit_receipt');
                            var cancelled_receipt = tr_parent.find('td.cancelled_receipt');
                            var issued_receipt = tr_parent.find('td.receipt_status');
                            if (credit_receipt) {
                                var credit_status = credit_receipt.text();
                            }
                            if (cancelled_receipt) {
                                var cancelled_status = cancelled_receipt.text();
                            }
                            if (issued_receipt) {
                                var receipt_status = issued_receipt.text();
                            }
                            if (credit_status !== '' || cancelled_status !== '' || receipt_status === 'Not Issued') {
                                $(el).prop('checked', false);
                            }
                            var receipt_id = $(el).val();
                            if (receipt_id) {
                                receipt_arr.push(receipt_id);
                            }
                        })
                    }
                    function check_request_receipts(orders) {
                        var valid = true;
                        var data_status = '';
                        var data_status_json = '';
                        var data_transmission_failure = '';
                        var data_already_running = '';
                        var stop_conversion = '';
                        var failed_48_system = '';
                        <?php
                        $mydata_options = get_option('primer_mydata');
                        if(is_array($mydata_options) && array_key_exists('last_request',$mydata_options)){
                            $last_request = $mydata_options['last_request'];
                        }
                        $transmission_failure_last_request = '';
                        if (!empty($last_request)) {
                        $order_status = get_post_meta($last_request[0], 'receipt_status', true);
                        $send_receipt_json = get_post_meta($last_request[0], 'order_id_from_receipt', true);
                        $transmission_failure_last_request = get_post_meta($last_request[0], 'transmission_failure_check', true);
                        ?>
                        data_status = '<?php echo $order_status; ?>';
                        data_status_json = '<?php echo $send_receipt_json; ?>';
                        <?php
                        }
                        ?>
                        data_transmission_failure = '<?php echo $transmission_failure_last_request; ?>';
                        failed_48_system = '<?php echo $mydata_options['timeout_check_48']; ?>';
                        $(orders).each(function (i, el) {
                            var tr_parent = $(el).parents('tr');
                            var failure48_column = tr_parent.find('td.accept_48');
                            var failed_48 = failure48_column.text();
                            if (failed_48_system === '1' && failed_48 !== 'yes') {
                                stop_conversion = 'stop';
                            }
                        });
                        if (data_status === 'not_issued' && data_status_json !== '' &&  data_transmission_failure !== '1') {
                            valid = false;
                            alert('Go to "MyData settings" and click on button "Resend last HTML"');
                            $('.submit_convert_orders').attr('disabled', true);
                        } else if (data_already_running === 'yes') {
                        } else {
                            valid = true;
                        }
                        return valid;
                    }
                    $('#tables-receipt-filter .cancel_receipt').on('click', function (e) {
                        e.preventDefault();
                        $('.cancel_receipt').attr('disabled', true);
                        check_exist_receipts($('input[name="receipts[]"]:checked'));
                        var checked_receipts_data = $('#tables-receipt-filter input[name="receipts[]"]').serialize();
                        var count_orders = $('input[name="receipts[]"]:checked').length;
                        var receipt_word = count_orders == 1 ? 'receipt' : 'receipts';
                        var confirmation = confirm('You are about to cancel ' + count_orders + ' ' + receipt_word + '. Are you sure?');
                        var validation = check_request_receipts($('input[name="receipts[]"]:checked'));
                        if (confirmation === true && count_orders > 0 && validation === true) {
                            $.ajax({
                                url: primer.ajax_url,
                                data: 'action=primer_cancel_invoice&' + checked_receipts_data,
                                type: 'POST',
                                beforeSend: function () {
                                    var table = $('table.table-view-list.receipts')
                                    table.css({'opacity': '0.5'});
                                    var tableZIndex = parseInt(table.css('z-index'), 10) || 0;
                                    $('.loadingio-spinner-spinner-chyosfc7wi6').css({ 'z-index': tableZIndex + 1 });
                                    $('.loadingio-spinner-spinner-chyosfc7wi6').show();
                                },
                                success: function (response) {
                                    var parsedResponse = JSON.parse(response);
                                    var response_data = parsedResponse.data;
                                    $('#wpbody-content').prepend(response_data);
                                    $('.loadingio-spinner-spinner-chyosfc7wi6').hide();
                                    $('table.table-view-list.receipts').css({'opacity': '1'});
                                    popupOpenClose('.primer_popup');
                                    $('.popup_ok').on('click', function () {
                                        location.reload();
                                    });
                                    popupOpenClose('.primer_popup');
                                    $(document).mouseup(function (e) {
                                        var container = $('.primer_popup > div');
                                        if (!container.is(e.target) && container.has(e.target).length === 0) {
                                            document.location.reload();
                                        }
                                    });
                                    setTimeout( function () {document.location.reload()}, 5000);
                                },
                                error: function (error) {
                                    console.log(error);
                                }
                            });
                        }
                    });
                    $('#tables-receipt-filter #zip_load').on('click', function (e) {
                        e.preventDefault();
                        $('#tables-receipt-filter #zip_load').attr('disabled', true);
                        dataObj = new Array();
                        var dat = $('#tables-receipt-filter').serializeArray();
                        $(dat).each(function (i, el) {
                            if (el.name == 'receipts[]') {
                                dataObj.push(el.value);
                            }
                        });
                        console.log('edw');
                        console.log(dataObj);
                        var datas = {
                            'action': 'primer_export_receipt_to_html',
                            'receipts': dataObj.join(', '),
                        }
                        $('.download-btn').addClass('hide');
                        $.ajax({
                            url: primer.ajax_url,
                            data: datas,
                            type: 'post',
                            dataType: 'json',
                            beforeSend: function(){
                                var table = $('table.table-view-list.receipts');
                                table.css({'opacity': '0.5'});
                                var tableZIndex = parseInt(table.css('z-index'), 10) || 0;
                                $('.loadingio-spinner-spinner-chyosfc7wi6').css({'z-index': tableZIndex + 1});
                                $('.loadingio-spinner-spinner-chyosfc7wi6').show();
                            },
                            success: function (r) {
                                if (r.success == 'true') {
                                    if (r.response) {
                                        console.log(r.response);
                                        setTimeout(function () {
                                            $('#zip_load').hide();
                                            $('.download-btn').attr('href', r.response).removeClass('hide');
                                            $('.loadingio-spinner-spinner-chyosfc7wi6').hide();
                                            $('table.table-view-list.receipts').css({'opacity': '1'});
                                            $('.download-btn').get(0).click();
                                            $('input[name="receipts[]"]:checked').prop('checked', false);
                                            $('#cb-select-all-1').prop('checked', false);
                                            $('#cb-select-all-2').prop('checked', false);

                                            $('#tables-receipt-filter #zip_load').attr('disabled', false);

                                            $('.download-btn').addClass('hide');
                                            $('#zip_load').attr('disabled', false).show();
                                        }, 1000);
                                    }
                                }
                            },
                        });
                    });

                    // Page Selector
                    $('#filter_action_receipt').on('click', function() {
                        $('#current-page-selector').val('1');
                    });

                });

            </script>

        <?php } ?>

        <?php
    }

	function prepare_items():void {
		$per_page = 20;
        $current_page = $this->get_pagenum();
		$get_total_receipts = new PrimerReceiptList();

		if (isset($_GET['primer_receipt_status']) || isset($_GET['primer_receipt_client']) || isset($_GET['primer_receipt_type']) || isset($_GET['receipt_date_from']) || isset($_GET['receipt_date_to']) || (isset($_GET['s']) && !empty($_GET['s']) )) {
            $get_receipts_list = $get_total_receipts->get_with_params($current_page, $_GET['receipt_date_from'], $_GET['receipt_date_to'], $_GET['primer_receipt_client'], $_GET['primer_receipt_status'], $_GET['primer_receipt_type']);
            $total_receipts = $get_receipts_list['total_receipt'];
            array_pop($get_receipts_list);
        } else {
			$get_receipts_list = $get_total_receipts->get($current_page);
		}

		$columns  = $this->get_columns();
        $hidden   = $this->hidden_columns;
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = array( $columns, $hidden, $sortable );
		$this->items = $get_receipts_list;
		$data = $this->items;

        if (isset($total_receipts) && $total_receipts > 0 ) {
            $total_items = $total_receipts;
        } else {
            $total_items = array_sum( (array) wp_count_posts( 'primer_receipt' ) );
        }

		$this->items = $data;

		$this->set_pagination_args(
			array(
				'total_items'	=> $total_items,
				'per_page'	    => $per_page,
				'total_pages'	=> ceil( $total_items / $per_page ),
			)
		);
	}

    function no_items():void {
        esc_html_e( 'No receipts found.', 'primer' );
    }

    function process_bulk_action():void {
        $receipts = isset( $_REQUEST['receipts'] ) ?? array();
        $receipts = array_map( 'sanitize_text_field', $receipts );
        $current_action = $this->current_action();
        if (!empty($current_action)) {
            if (empty($receipts)) {
                echo '<div id="message" class="error"><p>Error! You need to select multiple records to perform a bulk action!</p></div>';
                return;
            }
        } else {
            return;
        }

    }

	function show_all_receipts():string {
		ob_start();
		$status = filter_input( INPUT_GET, 'status' );
		include_once PRIMER_PATH . 'views/admin_receipt_list.php';
		return ob_get_clean();
	}

    function handle_main_primer_receipt_admin_menu():void {
        do_action('primer_orders_menu_start');
        $action = filter_input(INPUT_GET, 'primer_action');
        $action = empty($action) ? filter_input(INPUT_POST, 'action') : $action;
        if (empty($action)) {
            $action = sanitize_text_field($_GET['page']);
        }
        $selected = $action;
        ?>
        <div class="wrap primer-admin-menu-wrap">
        <div class="plugin_caption_version"><?php echo PRIMER_NAME . ' v'. PRIMER_VERSION; ?></div>
        <?php
        if ($_GET['page'] === 'wp_ajax_list_order') { ?>
            <h2><?php esc_html_e('Orders', 'primer'); ?>
                <?php
                do_action( 'primer_menu_nav_tabs', $selected ); ?>
            </h2>
            <?php
            do_action( 'primer_menu_body_' . $action );
            $output = apply_filters( 'primer_menu_body_override', '', $action );
            if ( ! empty( $output ) ) {
                $allowed_html = wp_kses_allowed_html();
                echo wp_kses($output, $allowed_html);
                echo '</div>';
                return;
            } ?>
        <?php } elseif ($_GET['page'] === 'primer_receipts') {
            do_action( 'primer_menu_body_' . $action );
            $output = apply_filters( 'primer_menu_body_override', '', $action );
            if ( ! empty( $output ) ) {
                $allowed_html = wp_kses_allowed_html();
                echo wp_kses($output, $allowed_html);
                echo '</div>';
                return;
            }
        } ?>

        <?php
        switch ( $action ) {
            case 'orders_list':
                // Show the orders listing
                echo ($this->show_all_orders());
                break;
            case 'primer_receipts':
                echo ($this->show_all_receipts());
                break;
            default:
                echo ($this->show_all_orders());
                break;
        }

        echo '</div>';
    }

}