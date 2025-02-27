<?php

namespace fattura24;

defined('ABSPATH') || die;

require_once plugin_dir_path(__FILE__) . '../src/uty.php';

class Fattura24BillingBlock_Extend_Woo_Core {

    private $name = 'fattura24-billing-block';

    public function init() 
    {
        $this->save_f24_billing_data();
        $this->update_f24_billing_data();
        $this->show_f24_billing_data_in_order();
        $this->show_f24_billing_data_in_order_confirmation();
        $this->show_f24_billing_data_in_order_email();
    }

    private function fatt_24_fields_and_metakeys()
    {
        $fields = [
            'billing_checkbox',
            'billing_fiscalcode',
            'billing_vatcode',
            'billing_pecaddress',
            'billing_recipientcode'
        ];

        $result = array_map(
            function($field) { 
                return ['field' => $field, 'key' => "_$field"]; 
            }, $fields);

        return $result;
    }

    private function fatt_24_meta_keys()
    {
        return array_column($this->fatt_24_fields_and_metakeys(), 'key');
    }

    // add link to check fiscal code in AdE website  
    private function fatt_24_checkCFinAdE($cfValue) {
        return sprintf('<a href="https://telematici.agenziaentrate.gov.it/VerificaCF/VerificaCf.do?cf=%s" target="_blank">', $cfValue) . __('(Check fiscal code)', 'fattura24') . '</a>';
    }
    
    // add link to check vat number in AdE website  
    private function fatt_24_checkPIVAinADE($piValue) {
        return sprintf('<a href="https://telematici.agenziaentrate.gov.it/VerificaPIVA/VerificaPiva.do?piva=%s" target"_blank">', $piValue) . __('(Check vat code)', 'fattura24') . '</a>';
    }
    

    private function save_f24_billing_data()
    {
       add_action('woocommerce_store_api_checkout_update_order_from_request',
            function (\WC_Order $order, \WP_REST_Request $request) {
                $billing_country = $order->get_billing_country();
                $fields = $this->fatt_24_fields_and_metakeys();
                $fattura24_billing_request_data = $request['extensions'][$this->name];
              
                foreach ($fields as $field) {
                    // se il paese di fatturazione NON è IT salvo solo billing_checkbox e billing_vatcode svuotando gli altri campi
                    if ($billing_country !== 'IT' && !in_array($field['field'], ['billing_checkbox', 'billing_vatcode'])) {
                        $data = '';
                    } else {
                        $data = $fattura24_billing_request_data[$field['field']];
                    }
                    $order->update_meta_data($field['key'], $data);
                }
                $order->save_meta_data();
            },
            10, 
            2
        );
    }

    // update custom billing fields data in order details after editing
    private function update_f24_billing_data()
    {
        add_action('woocommerce_process_shop_order_meta', function ($post_id, $post) {
            $order = wc_get_order($post_id);
            $billing_country = $order->get_billing_country();    
            $f24_meta_keys = $this->fatt_24_meta_keys();

            foreach ($f24_meta_keys as $key) {
               
                if ($billing_country !== 'IT' && $key !== '_billing_vatcode') {
                    // svuoto gli altri campi se il paese di fatturazione NON è IT
                    $order->update_meta_data($key, '');
                } else if ($key === '_billing_checkbox') {
                    continue; 
                } else {
                    $order->update_meta_data($key, wc_clean(sanitize_text_field($_POST[ $key ])));
                }    
            }

            $order->save_meta_data();

        }, 45, 2);
    }

    private function show_f24_billing_data_in_order()
    {
        add_action('woocommerce_admin_order_data_after_billing_address',
            function (\WC_Order $order) {
                
                $f24_meta_keys = $this->fatt_24_meta_keys();
                $f24_meta_data = [];
                
                foreach ($f24_meta_keys as $meta_key) {
                    $f24_meta_data[$meta_key] = $order->get_meta($meta_key);
                }
               
                $billing_country = $order->get_billing_country();
                $cfValue = $billing_country == 'IT' ? strtoupper($f24_meta_data['_billing_fiscalcode']): '';
                $checkCf = !empty($cfValue) ? $this->fatt_24_checkCFinAdE($cfValue): '';
                $cfLabel = '';
               
                if (!empty ($cfValue)) {
                    $cfLabel = '<p><strong>' . __('Fiscal Code', 'fattura24') . ':</strong>' . $cfValue . ' ' . $checkCf . '</p>';
                }

                $piValue = strtoupper($f24_meta_data['_billing_vatcode']);
                $checkPiva = !empty($piValue) ? $this->fatt_24_checkPIVAinADE($piValue) : '';
                $piLabel = '';
                
                if (!empty($piValue)) {
                    $piLabel = '<p><strong>' . __('VAT Number', 'fattura24') . ':</strong>' . $piValue . ' ' . $checkPiva . '</p>'; 
                }
                
                $sdi_code = strtoupper($f24_meta_data['_billing_recipientcode']);
                $sdiLabel = '';
               
                if (!empty($sdi_code)) {
                    $sdiLabel = '<p><strong>' . __('Recipient Code', 'fattura24') . ':</strong>' . $sdi_code .'</p>';
                }
               
                $pec = $f24_meta_data['_billing_pecaddress'];
                $pecLabel = '';
                if (!empty($pec)) {
                    $pecLabel = '<p><strong>' . __('PEC address', 'fattura24') . ':</strong>'  . $pec . '</p>';
                }

                ?>
                <div class="address">
                    <?php 
                        echo $cfLabel; 
                        echo $piLabel;
                        echo $sdiLabel;
                        echo $pecLabel;
                    ?>
                </div>
                <div class="edit_address">
                    <?php
                        $label = '';
                        foreach ($f24_meta_keys as $meta_key) {
                            
                            if ($meta_key === '_billing_checkbox') {
                                // jump this field since a customer requires invoice while purchasing
                                continue;
                            }

                            switch($meta_key) {
                                case '_billing_fiscalcode':
                                    $label = __('Fiscal Code', 'fattura24');
                                    break;
                                case '_billing_vatcode':
                                    $label = __('VAT Number', 'fattura24');
                                    break;
                                case '_billing_recipientcode':
                                    $label = __('Recipient Code', 'fattura24');
                                    break;
                                case '_billing_pecaddress':
                                    $label = __('PEC Address', 'fattura24');
                                    break;
                                default:
                                    break;                

                            }

                            woocommerce_wp_text_input(
                                array( 
                                    'id' => $meta_key, 
                                    'label' =>$label, 
                                    'value' => $f24_meta_data[$meta_key], 
                                    'wrapper_class' => '_billing_company_field' 
                                )
                            );
                        }
                    ?>
                </div>
                <?php    
            }
        );
    }

    private function show_f24_billing_data_in_order_confirmation()
    {
        add_action('woocommerce_thankyou', 
            function(int $order_id) 
                {
                    $order = wc_get_order($order_id);
                    $f24_meta_keys = $this->fatt_24_meta_keys();
                    $output = '';
                    $f24_meta_data = [];

                    foreach ($f24_meta_keys as $meta_key) {
                        $f24_meta_data[$meta_key] = $order->get_meta($meta_key);
                        
                    }
                    // fatt_24_trace('metadati :', $f24_meta_data);

                    $is_f24_meta_data_empty = count(array_filter($f24_meta_data, function($value) { return (!empty($value)); })) === 0;

                    if (!$is_f24_meta_data_empty) {
                        $output = sprintf("<h2 style=\"font-size: 1.5rem;\">%s</h2>", esc_html__('Other billing data', 'fattura24'));

                        if ($f24_meta_data['_billing_fiscalcode']) {
                            $output .= sprintf("<p><strong>%s</strong><br>%s</p>",
                                esc_html__(sprintf(__('Fiscal code%s', 'fattura24'), ': ')),
                                esc_html__(strtoupper($f24_meta_data['_billing_fiscalcode']))
                            );
                        }

                        if ($f24_meta_data['_billing_vatcode']) {
                            $output .= sprintf("<p><strong>%s</strong><br>%s</p>",
                                esc_html__(sprintf(__('VAT Number%s', 'fattura24'), ': ')),
                                esc_html__(strtoupper($f24_meta_data['_billing_vatcode']))
                            );
                        }
                        
                        if ($f24_meta_data['_billing_pecaddress']) {
                            $output .= sprintf("<p><strong>%s</strong><br>%s</p>",
                                esc_html__(sprintf(__('PEC address%s', 'fattura24'), ': ')),
                                esc_html__($f24_meta_data['_billing_pecaddress'])
                            );
                        }

                        if ($f24_meta_data['_billing_recipientcode']) {
                            $output .= sprintf("<p><strong>%s</strong><br>%s</p>",
                                esc_html__(sprintf(__('Recipient code%s', 'fattura24'), ': ')),
                                esc_html__(strtoupper($f24_meta_data['_billing_recipientcode']))
                            );
                        }
                    }
                echo $output;
            }, 9, 1
        );
    }

    private function show_f24_billing_data_in_order_email()
    {
        add_action('woocommerce_email_after_order_table', 
            function($order, $sent_to_admin, $plain_text, $email) 
            {
                $f24_meta_keys = $this->fatt_24_meta_keys();
                $f24_meta_data = [];
                $output = '';
              
                foreach ($f24_meta_keys as $meta_key) {
                    $f24_meta_data[$meta_key] = $order->get_meta($meta_key);    
                }

                $is_f24_meta_data_empty = count(array_filter($f24_meta_data, function($value) { return (!empty($value)); })) === 0;

                if (!$is_f24_meta_data_empty) {
                    $output = sprintf("<h2 style=\"font-size: 1.5rem;\">%s</h2>", 
                        esc_html__('Other billing data', 'fattura24')
                    );

                    if ($f24_meta_data['_billing_fiscalcode']) {
                        $output .= sprintf("<p><strong>%s</strong><br>%s</p>",
                            esc_html__(sprintf(__('Fiscal code%s', 'fattura24'), ': ')),
                            esc_html__(strtoupper($f24_meta_data['_billing_fiscalcode']))
                        );
                    }    

                    if ($f24_meta_data['_billing_vatcode']) {
                        $output .= sprintf("<p><strong>%s</strong><br>%s</p>",
                            esc_html__(sprintf(__('VAT Number%s', 'fattura24'), ': ')),
                            esc_html__(strtoupper($f24_meta_data['_billing_vatcode']))
                        );
                    }
                    
                    if ($f24_meta_data['_billing_pecaddress']) {
                        $output .= sprintf("<p><strong>%s</strong><br>%s</p>",
                            esc_html__(sprintf(__('PEC address%s', 'fattura24'), ': ')),
                            esc_html__($f24_meta_data['_billing_pecaddress'])
                        );
                    }

                    if ($f24_meta_data['_billing_recipientcode']) {
                        $output .= sprintf("<p><strong>%s</strong><br>%s</p>",
                            esc_html__(sprintf(__('Recipient code%s', 'fattura24'), ': ')),
                            esc_html__(strtoupper($f24_meta_data['_billing_recipientcode']))
                        );
                    }
                }
            echo $output;
        }, 10, 4
        );   
    }
}
