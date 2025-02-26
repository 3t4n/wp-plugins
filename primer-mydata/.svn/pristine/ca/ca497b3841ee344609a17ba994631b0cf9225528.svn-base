<?php

if (!defined('ABSPATH')) { exit; }

function primer_display_watermark() {
	$receipt_id             = get_the_ID();
	$order_id               = get_post_meta($receipt_id, 'order_id_to_receipt', true);
	$order                  = wc_get_order( $order_id );
	$order_customer_country = $order->get_billing_country();
	$customer_country       = $order_customer_country;
	$check_api_type         = get_post_meta($receipt_id, 'send_to_api_type', true);

    $watermark_wrapper = '';
	if (empty($check_api_type)) {
		$watermark_wrapper .= '<div class="watermark_message">'.__('ΑΚΥΡΟ', 'primer').'</div>';
	}
	if ($check_api_type !== 'production') {
		if ($customer_country == 'GR') {
			$watermark_wrapper .= '<div class="watermark_message">'.__('ΑΚΥΡΟ', 'primer').'</div>';
		} else {
			$watermark_wrapper .= '<div class="watermark_message">'.__('INVALID', 'primer').'</div>';
		}
	}
	$allowed_html = array(
		'div' => array(
			'class' => array()
		)
	);

	echo wp_kses($watermark_wrapper, $allowed_html);
}

function primer_display_issuer_container() {
	$receipt_id             = get_the_ID();
	$order_id               = get_post_meta($receipt_id, 'order_id_to_receipt', true);
	$order                  = wc_get_order($order_id);
    $order_customer_country = $order->get_billing_country();
    $is_central             = true;
    $branchID               = get_post_meta($receipt_id, 'branchID', true);
    $primer_license_data    = get_option('primer_licenses');

    if ($branchID == null) {
        $branchID = "0";
    }

    if( isset($branchID) && $branchID != "0") {
        $subsidiaries    = $primer_license_data['subsidiaries'];
        $currentBranchId = $branchID;
        $foundSubsidiary = null;
        $is_central      = false;

        foreach ($subsidiaries as $subsidiary) {
            if ($subsidiary['branchId'] == $currentBranchId) {
                $foundSubsidiary = $subsidiary;
                break;
            }
        }
        if ($foundSubsidiary) {
            $subsidiaryCity     = $foundSubsidiary['city'];
            $subsidiaryStreet   = $foundSubsidiary['street'];
            $subsidiaryTk       = $foundSubsidiary['tk'];
            $subsidiaryDoy      = $foundSubsidiary['doy'];
            $subsidiaryNumber   = $foundSubsidiary['number'];
            $subsidiaryPhone    = $foundSubsidiary['phoneNumber'];
        } else {
            $subsidiaryCity   = '';
            $subsidiaryStreet = '';
            $subsidiaryTk     = '';
            $subsidiaryDoy    = '';
            $subsidiaryNumber = '';
            $subsidiaryPhone  = '';
        }
    }

    $issuer_container = '';
	if(!empty($primer_license_data)) {
        if ($is_central) {
            if (!empty($primer_license_data['companyName'])) {
                if ($order_customer_country != 'GR' && !empty($primer_license_data['translated_company_name'])) {
                    $issuer_container .= '<span class="issuer_name skin">' . $primer_license_data['translated_company_name'] . '</span>';
                } else {
                    $issuer_container .= '<span class="issuer_name skin">' . $primer_license_data['companyName'] . '</span>';
                }

            } else {
                $issuer_container .= '<span class="issuer_name skin">' . __('ISSUER\'S COMPANY NAME', 'primer') . '</span>';
            }
            if (!empty($primer_license_data['companySmallName'])) {
                if ($order_customer_country != 'GR' && !empty($primer_license_data['translated_company_small_name'])) {
                    $issuer_container .= '<p><span class="issuer_name skin">' . $primer_license_data['translated_company_small_name'] . '</span></p>';
                } else {
                    $issuer_container .= '<p><span class="issuer_name skin">' . $primer_license_data['companySmallName'] . '</span></p>';
                }
            }
            if (!empty($primer_license_data['companyActivity'])) {
                if ($order_customer_country != 'GR' && !empty($primer_license_data['translated_company_activity'])) {
                    $issuer_container .= '<p> <span class="issuer_subjectField skin company_activity">' . $primer_license_data['translated_company_activity'] . '</span></p>';
                } else {
                    $issuer_container .= '<p> <span class="issuer_subjectField skin company_activity">' . $primer_license_data['companyActivity'] . '</span></p>';
                }
            } else {
                $issuer_container .= '<p> <span class="issuer_subjectField skin">' . __('COMPANY ACTIVITY', 'primer') . '</span></p>';
            }
            if (!empty($primer_license_data['companyAddress'] && $primer_license_data['companyCity'] && $primer_license_data['companyTk'] && $primer_license_data['companyPhoneNumber'] && $primer_license_data['companyDoy'])) {
                if ($order_customer_country != 'GR' && !empty($primer_license_data['translated_company_address']) && !empty($primer_license_data['translated_company_city']) && !empty($primer_license_data['companyTk']) && !empty($primer_license_data['companyPhoneNumber']) && !empty($primer_license_data['companyDoy'])) {
                    $issuer_container .= $issuer_container .= '<p><span class="issuer_subjectFiled skin">' . $primer_license_data['translated_company_address'] . ', ' . $primer_license_data['translated_company_city'] . ', ' . $primer_license_data['companyTk'] . ',  <span>PHONE. </span>' . $primer_license_data['companyPhoneNumber'] . ', <span>DΟΥ: </span>' . $primer_license_data['translated_company_doy'] . '</span></p>';
                } else {
                    $issuer_container .= '<p><span class="issuer_subjectField skin">' . $primer_license_data['companyAddress'] . ', ' . $primer_license_data['companyCity'] . ', ' . $primer_license_data['companyTk'] . ',  <span>ΤΗΛ. </span>' . $primer_license_data['companyPhoneNumber'] . ', <span>ΔΟΥ: </span>' . $primer_license_data['companyDoy'] . '</span></p>';
                }
            } else {
                $issuer_container .= '<p><span class="issuer_subjectField skin">' . __('ISSUER\'S COMPANY ADDRESS', 'primer') . ', ' . __('ISSUER\'S COMPANY CITY', 'primer') . ', ' . __('ISSUER\'S COMPANY TK', 'primer') . ', ' . __('ISSUER\'S COMPANY PHONE', 'primer') . ', ' . __('ISSUER\'S COMPANY DOY', 'primer') . '</span></p>';
            }
            if (!empty($primer_license_data['companyVatNumber'])) {
                if ($order_customer_country == 'GR') {
                    $issuer_container .= '<p><span class="issuer_address skin">' . __('ΑΦΜ: ', 'primer') . 'EL' . $primer_license_data['companyVatNumber'] . ', ' . __('ΓΕΜΗ: ', 'primer') . '' . $primer_license_data['gemh'] ?? "" . '</span></p>';
                } else {
                    $issuer_container .= '<p><span class="issuer_address skin">' . __('VAT: ', 'primer') . 'EL' . $primer_license_data['companyVatNumber'] . ', ' . __('GEMH: ', 'primer') . '</span></p>';
                }
            } else {
                $issuer_container .= '<p><span class="issuer_address skin">ΑΦΜ: </span></p>';
            }
        } else {
            if (!empty($primer_license_data['companyName'])) {
                if ($order_customer_country != 'GR' && !empty($primer_license_data['translated_company_name'])) {
                    $issuer_container .= '<span class="issuer_name skin">' . $primer_license_data['translated_company_name'] . '</span>';
                } else {
                    $issuer_container .= '<span class="issuer_name skin">' . $primer_license_data['companyName'] . '</span>';
                }
            } else {
                $issuer_container .= '<span class="issuer_name skin">' . __('ISSUER\'S COMPANY NAME', 'primer') . '</span>';
            }
            if (!empty($primer_license_data['companySmallName'])) {
                if ($order_customer_country != 'GR' && !empty($primer_license_data['translated_company_small_name'])) {
                    $issuer_container .= '<p><span class="issuer_name skin">' . $primer_license_data['translated_company_small_name'] . '</span></p>';
                } else {
                    $issuer_container .= '<p><span class="issuer_name skin">' . $primer_license_data['companySmallName'] . '</span></p>';
                }
            }
            if (!empty($primer_license_data['companyActivity'])) {
                if ($order_customer_country != 'GR' && !empty($primer_license_data['translated_company_activity'])) {
                    $issuer_container .= '<p> <span class="issuer_subjectField skin">' . $primer_license_data['translated_company_activity'] . '</span></p>';
                } else {
                    $issuer_container .= '<p> <span class="issuer_subjectField skin">' . $primer_license_data['companyActivity'] . '</span></p>';
                }
            } else {
                $issuer_container .= '<p> <span class="issuer_subjectField skin">' . __('COMPANY ACTIVITY', 'primer') . '</span></p>';
            }
            if (!empty($primer_license_data['companyVatNumber'])) {
                if ($order_customer_country == 'GR') {
                    $issuer_container .= '<p><span class="issuer_address skin">' . __('ΑΦΜ: ', 'primer') . '' . $primer_license_data['companyVatNumber'] . '</span></p>';
                } else {
                    $issuer_container .= '<p><span class="issuer_address skin">' . __('VAT: ', 'primer') . '' . $primer_license_data['companyVatNumber'] . '</span></p>';
                }
            } else {
                $issuer_container .= '<p><span class="issuer_address skin">ΑΦΜ: </span></p>';
            }
            if ( $branchID != null && $branchID != "0") {
                if ($order_customer_country == 'GR') {
                    $issuer_container .= '<p><span class="issuer_address skin">' . __('Υποκατάστημα: ', 'primer') . '' . $subsidiaryStreet. " " . $subsidiaryNumber . '</span></p>';
                } else {
                    $issuer_container .= '<p><span class="issuer_address skin">' . __('Branch: ', 'primer') . '' . $subsidiaryStreet . " " . $subsidiaryNumber .'</span></p>';
                }
                if (!empty($subsidiaryStreet)) {
                    $issuer_container .= '<p><span class="issuer_subjectField skin">' . $subsidiaryCity .  ', ' .$subsidiaryTk. '</span>';
                }
                if (!empty($subsidiaryDoy)) {
                    if ($order_customer_country == 'GR') {
                        $issuer_container .= '<p><span class="issuer_address skin">' . __('Δ.Ο.Υ: ', 'primer') . '' . $subsidiaryDoy . '</span></p>';
                    } else {
                        $issuer_container .= '<p><span class="issuer_address skin">' . __('DOY: ', 'primer') . '' . $subsidiaryDoy . '</span></p>';
                    }
                }
                if (!empty($subsidiaryPhone)) {
                    if ($order_customer_country == 'GR') {
                        $issuer_container .= '<p><span class="issuer_address skin">' . __('ΤΗΛΕΦΩΝΟ: ', 'primer') . '' . $subsidiaryPhone . '</span></p>';
                    } else {
                        $issuer_container .= '<p><span class="issuer_address skin">' . __('PHONE: ', 'primer') . '' . $subsidiaryPhone . '</span></p>';
                    }
                }
                if (!empty($primer_license_data['gemh']) && $primer_license_data['gemh'] != 'empty') {
                    if ($order_customer_country == 'GR') {
                        $issuer_container .= '<p><span class="issuer_address skin">' . __('ΓΕΜΗ: ', 'primer') . '' . $primer_license_data['gemh'] . '</span></p>';
                    } else {
                        $issuer_container .= '<p><span class="issuer_address skin">' . __('GEMH: ', 'primer') . '' . $primer_license_data['gemh'] . '</span></p>';
                    }
                }
            }
        }
	}

	$allowed_html = array(
		'p' => array(
			'class' => array()
		),
		'span' => array(
			'class' => array()
		)
	);

	echo wp_kses($issuer_container, $allowed_html);
}

function primer_main_info_table_head() {
	$receipt_id                  = get_the_ID();
	$order_id                    = get_post_meta($receipt_id, 'order_id_to_receipt', true);
	$order                       = wc_get_order($order_id);
	$order_customer_country      = $order->get_billing_country();

	$issuer_main_info_table_head = '<tr class="heading">';

	if ($order_customer_country == 'GR') {
		$issuer_main_info_table_head .= '<td><p>ΕΙΔΟΣ ΠΑΡΑΣΤΑΤΙΚΟΥ</p></td>';
        $issuer_main_info_table_head .= '<td><p>ΣΕΙΡΑ</p></td>';
		$issuer_main_info_table_head .= '<td><p>ΑΡΙΘΜΟΣ</p></td>';
		$issuer_main_info_table_head .= '<td><p>ΗΜΕΡ/ΝΙΑ</p></td>';
		$issuer_main_info_table_head .= '<td><p>ΩΡΑ</p></td>';
	} else {
		$issuer_main_info_table_head .= '<td><p>INVOICE TYPE</p></td>';
        $issuer_main_info_table_head .= '<td><p>SERIES</p></td>';
		$issuer_main_info_table_head .= '<td><p>INVOICE NUMBER</p></td>';
		$issuer_main_info_table_head .= '<td><p>DATE</p></td>';
		$issuer_main_info_table_head .= '<td><p>TIME</p></td>';
	}

	$issuer_main_info_table_head .= '</tr>';

	$allowed_html = array(
		'tr' => array(
			'class' => array(),
		),
		'td' => array(),
		'p' => array(
			'class' => array()
		),
		'span' => array(
			'class' => array()
		)
	);

	echo wp_kses($issuer_main_info_table_head, $allowed_html);
}

function primer_display_issuer_product_head() {
	$receipt_id              = get_the_ID();
	$order_id                = get_post_meta($receipt_id, 'order_id_to_receipt', true);
	$order                   = wc_get_order($order_id);
	$order_customer_country  = $order->get_billing_country();

	$issuer_product_head = '<tr class="heading ">';

	if ($order_customer_country == 'GR') {
		$issuer_product_head .= '<td class="code_head_td"><p>ΚΩΔΙΚΟΣ</p></td>';
		$issuer_product_head .= '<td class="description_head_td"><p>ΠΕΡΙΓΡΑΦΗ</p></td>';
		$issuer_product_head .= '<td class="quantity_head_td"><p>ΠΟΣΟΤΗΤΑ</p></td>';
		$issuer_product_head .= '<td class="mu_head_td"><p>Μ.Μ</p></td>';
		$issuer_product_head .= '<td class="up_head_td"><p>ΤΙΜΗ ΜΟΝΑΔΑΣ</p></td>';
		$issuer_product_head .= '<td class="vat_head_td"><p>ΦΠΑ %</p></td>';
		$issuer_product_head .= '<td class="pricenovat_head_td"><p>ΤΙΜΗ ΠΡΟ ΦΠΑ</p></td>';
        $issuer_product_head .= '<td class="pricenovat_head_td"><p>ΑΞΙΑ ΦΠΑ</p></td>';
		$issuer_product_head .= '<td class="price_head_td"><p>ΤΕΛΙΚΗ ΑΞΙΑ</p></td>';
	} else {
		$issuer_product_head .= '<td class="code_head_td"><p>PRODUCT ID</p></td>';
		$issuer_product_head .= '<td class="description_head_td"><p>DESCRIPTION</p></td>';
		$issuer_product_head .= '<td class="quantity_head_td"><p>PIECES</p></td>';
		$issuer_product_head .= '<td class="mu_head_td"><p>UNIT</p></td>';
		$issuer_product_head .= '<td class="up_head_td"><p>PRICE PER UNIT</p></td>';
		$issuer_product_head .= '<td class="vat_head_td"><p>VAT %</p></td>';
		$issuer_product_head .= '<td class="pricenovat_head_td"><p>PRICE BEFORE TAXES</p></td>';
        $issuer_product_head .= '<td class="pricenovat_head_td"><p>VAT PRICE</p></td>';
		$issuer_product_head .= '<td class="price_head_td"><p>TOTAL AMOUNT</p></td>';
	}

	$issuer_product_head .= '</tr>';

	$allowed_html = array(
		'tr' => array(
			'class' => array(),
		),
		'td' => array(
			'class' => array(),
		),
		'p' => array(
			'class' => array()
		),
		'span' => array(
			'class' => array()
		)
	);
	echo wp_kses($issuer_product_head, $allowed_html);
}
function decodeUnicodeSequences($data) {
    if (is_string($data)) {
        // Decode Unicode sequences within the string
        return preg_replace_callback('/u([0-9A-Fa-f]{4})/', function ($matches) {
            // Convert the hex code to decimal
            $code = hexdec($matches[1]);
            // Return the corresponding character
            return mb_convert_encoding("&#$code;", 'UTF-8', 'HTML-ENTITIES');
        }, $data);
    } elseif (is_array($data)) {
        // Recursively apply this function to each element in the array
        foreach ($data as $key => $value) {
            $data[$key] = decodeUnicodeSequences($value);
        }
    } elseif (is_object($data)) {
        // Recursively apply this function to each property of the object
        foreach ($data as $key => $value) {
            $data->$key = decodeUnicodeSequences($value);
        }
    }
    return $data;
}

function primer_display_issuer_product($i,$last_page) {
	$receipt_id            = get_the_ID();
    $order_id              = get_post_meta($receipt_id, 'order_id_to_receipt', true);
	$order                 = wc_get_order($order_id);
    $general_settings      = get_option('primer_generals');
    $order_country         = $order->get_billing_country();
    $tax_classes           = WC_Tax::get_tax_classes();
    $per_page_product      = 5;
    $create_json_instance        = new Create_json();
    $Vat_categories    = $create_json_instance->getVatCategories();
	if (!in_array('', $tax_classes)) {
		array_unshift($tax_classes, '');
	}

    if(isset($general_settings['products_per_page_receipt']) && $general_settings['products_per_page_receipt'] != null && $general_settings['products_per_page_receipt'] != ''){
        $per_page_product = $general_settings['products_per_page_receipt'] + 1;
    }
    $product_count          = $i*$per_page_product;
    $product_count_html     = 0;
    $product_per_page       = $product_count - $per_page_product;
    $is_credit_receipt = get_post_meta($receipt_id, 'credit_receipt', true);
    $log_for_order     = get_post_meta($receipt_id, $is_credit_receipt ? 'credit_log_id_for_order' : 'log_id_for_order', true);
    $json_send_to_api  = get_post_meta($log_for_order, 'json_send_to_api', true);
    $json_send_to_api = json_decode($json_send_to_api, true);
    $json_send_to_api = decodeUnicodeSequences($json_send_to_api);
    $issuer_product = '';
    foreach ($json_send_to_api['invoice'][0]['invoiceDetails'] as $product) {
        $product_count_html++;
        if (($product_count_html<=$product_count)&&($product_count_html>$product_per_page)) {
            if (!isset($product['quantity'])) {
                $product['quantity'] = 1;
            }
            $measurement_unit = ($order_country == 'GR') ? 'ΥΠΗΡΕΣΙΑ' : 'SERVICES';
            if ($product['incomeClassification'][0]['classificationCategory'] == 'category1_1' || $product['incomeClassification'][0]['classificationCategory'] == 'category1_2') {
                $measurement_unit = ($order_country == 'GR') ? 'ΤΕΜΑΧΙΑ' : 'PIECES';
            }
            $issuer_product .= '<tr class="products table_borders">';
            $issuer_product .= '<td class="table_borders"><span class="item_code">' . $product['code'] . '</span></td>';
            $issuer_product .= '<td class="table_borders"><span class="item_name">' . $product['name'] . '</span></td>';
            $issuer_product .= '<td class="table_borders"><span class="item_quantity">' . $product['quantity'] . '</span></td>';
            $issuer_product .= '<td class="table_borders"><span class="item_mu">' . $measurement_unit . '</span></td>';
            $issuer_product .= '<td class="table_borders"><span class="item_unit_price">' . number_format((float)($product['netValue'] / $product['quantity']), 2, '.', '') . '</span></td>';
            $issuer_product .= '<td class="table_borders"><span class="item_vat">' . $Vat_categories[$product['vatCategory']] . '</span></td>';
            $issuer_product .= '<td class="table_borders"><span class="item_price_novat">' . $product['netValue'] . '</span></td>';
            $issuer_product .= '<td class="table_borders"><span class="item_price_novat">' . $product['vatAmount'] . '</span></td>';
            $issuer_product .= '<td class="table_borders"><span class="item_price_novat">' . number_format((float)($product['netValue'] + $product['vatAmount']), 2, '.', '') . '</span></td>';
            $issuer_product .= '</tr>';
        }
    }
    $allowed_html = array(
        'tr' => array(
            'class' => array(),
        ),
        'td' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array()
        ),
        'span' => array(
            'class' => array()
        )
    );
    echo wp_kses($issuer_product, $allowed_html);
}

function primer_display_issuer_tax_total() {
    $receipt_id             = get_the_ID();
    $order_id               = get_post_meta($receipt_id, 'order_id_to_receipt', true);
    $order                  = wc_get_order($order_id);
    $order_customer_country = $order->get_billing_country();

    $is_credit_receipt = get_post_meta($receipt_id, 'credit_receipt', true);
    $log_for_order     = get_post_meta($receipt_id, $is_credit_receipt ? 'credit_log_id_for_order' : 'log_id_for_order', true);
    $json_send_to_api  = get_post_meta($log_for_order, 'json_send_to_api', true);
    $json_send_to_api = json_decode($json_send_to_api, true);
    $totals = $vat_values = $net_values = $vat_category = [];
    foreach ($json_send_to_api['invoice'][0]['invoiceDetails'] as $product) {
        $net_values[]   = $product['netValue'];
        $vat_values[]   = $product['vatAmount'];
        $vat_category[] = $product['vatCategory'];
    }

    $vatCategories    = array_fill(1,7,0);
    $netCategories    = array_fill(1,7,0);
    $totalsCategories = array_fill(1,7,0);
    $taxRate = [
        1 => '24%', 2 => '13%', 3 => '6%', 4 => '17%', 5 => '9%', 6 => '4%', 7 => '0%'
    ];

    for ($i = 0; $i < count($vat_category); $i++) {
        $category = $vat_category[$i];
        if (isset($vatCategories[$category])) {
            $vatCategories[$category]   += floatval($vat_values[$i]);
            $netCategories[$category]   += floatval($net_values[$i]);
            $totalsCategories[$category] = $vatCategories[$category] + $netCategories[$category];
            $totals[$category]           = $vatCategories[$category] + $netCategories[$category];
        }
    }

    $issuer_product_tax_total = '<tr>';
    if ($order_customer_country == 'GR') {
        $issuer_product_tax_total .= '<td class="bold table_tax" style="width: 50%"><span>Συντελεστής ΦΠΑ</span></td>';
    } else {
        $issuer_product_tax_total .= '<td class="bold table_tax" style="width: 50%"><span>VAT Rate</span></td>';
    }
    foreach ($taxRate as $category => $rate) {
        if (isset($totals[$category]) && $totals[$category] > 0) {
            $issuer_product_tax_total .= '<td class="table_tax"><span class="table_tax">' . $rate . '</span></td>';
        }
    }
    $issuer_product_tax_total .= '</tr>';

    $issuer_product_tax_total .= '<tr>';
    if ($order_customer_country == 'GR') {
        $issuer_product_tax_total .= '<td class="skin bold table_tax" style="width: 50%"><span>Καθαρή Αξία</span></td>';
    } else {
        $issuer_product_tax_total .= '<td class="skin bold table_tax" style="width: 50%"><span>Net Value</span></td>';
    }
    foreach ($netCategories as $category => $netValue) {
        if (isset($totals[$category]) && $totals[$category] > 0) {
            $issuer_product_tax_total .= '<td class="table_tax"><span class="table_tax">' . number_format($netValue, 2, '.', '') . '</span></td>';
        }
    }
    $issuer_product_tax_total .= '</tr>';

    $issuer_product_tax_total .= '<tr>';
    if ($order_customer_country == 'GR') {
        $issuer_product_tax_total .= '<td class="skin bold table_tax" style="width: 50%"><span>Αξία ΦΠΑ</span></td>';
    } else {
        $issuer_product_tax_total .= '<td class="skin bold table_tax" style="width: 50%"><span>VAT Value</span></td>';
    }
    foreach ($vatCategories as $category => $vatValue) {
        if (isset($totals[$category]) && $totals[$category] > 0) {
            $issuer_product_tax_total .= '<td class="table_tax"><span class="table_tax">' . number_format($vatValue, 2, '.', '') . '</span></td>';
        }
    }
    $issuer_product_tax_total .= '</tr>';

    $issuer_product_tax_total .= '<tr>';
    if ($order_customer_country == 'GR') {
        $issuer_product_tax_total .= '<td class="skin bold table_tax" style="width: 50%"><span>Τελική Αξία</span></td>';
    } else {
        $issuer_product_tax_total .= '<td class="skin bold table_tax" style="width: 50%"><span>Total Value</span></td>';
    }
    foreach ($totalsCategories as $category => $total) {
        if (isset($totals[$category]) && $totals[$category] > 0) {
            $issuer_product_tax_total .= '<td class="table_tax"><span class="table_tax">' . number_format($total, 2, '.', '') . '</span></td>';
        }
    }
    $issuer_product_tax_total .= '</tr>';

    $allowed_html = array(
        'tr' => array(),
        'td' => array(
            'class' => array(),
            'style' => array(),
        ),
        'span' => array(
            'class' => array(),
        )
    );

    echo wp_kses($issuer_product_tax_total, $allowed_html);
}

function primer_display_issuer_comments() {
	$issuer_comment = '';
	$receipt_id     = get_the_ID();
    $order_id       = get_post_meta($receipt_id, 'order_id_to_receipt', true);
    $log_id         = get_post_meta($order_id, 'log_id_for_order', true);
    $mydata_options = get_option('primer_mydata');

    if(array_key_exists('mydata_invoice_notes', $mydata_options)) {
        $primer_invoice_notes = $mydata_options['mydata_invoice_notes'] != null ? $mydata_options['mydata_invoice_notes'] : '';
    } else {
        $primer_invoice_notes = '';
    }

    $length_notes = strlen( (string)$primer_invoice_notes );
    if($length_notes > 1300) {
        $primer_invoice_notes = substr($primer_invoice_notes, 0, 1300);
    }

	$order                  = wc_get_order( $order_id );
	$order_customer_country = $order->get_billing_country();
	$order_comment          = $order->get_customer_note();

    $json = get_post_meta($log_id,'json_send_to_api',true);
    $data = json_decode($json, true);
    $varExemptionCategory = array();

    if (isset($data['invoice'][0]['invoiceDetails']) && is_array($data['invoice'][0]['invoiceDetails'])) {
        foreach ($data['invoice'][0]['invoiceDetails'] as $invoiceDetails) {
            if (isset($invoiceDetails['vatExemptionCategory']) && $invoiceDetails['vatExemptionCategory'] != null) {
                $varExemptionCategory[] = $invoiceDetails['vatExemptionCategory'];
            }
        }
    }

    $varExemptionCategory        = array_unique($varExemptionCategory);
    $varExemptionCategory        = array_values($varExemptionCategory);
    $count                       = count($varExemptionCategory);
    $create_json_instance        = new Create_json();
    $Vat_exemption_categories    = $create_json_instance->getVatExemptionCategories();
    $Vat_exemption_categories_en = $create_json_instance->getVatExemptionCategoriesEn();

	if ($order_customer_country == 'GR') {
        if ( $count>0 ) {
            $exception_vat = '<div><span class="skin bold">ΑΠΑΛΛΑΓΗ ΑΠΟ ΤΟ Φ.Π.Α :</span></div>';
            for ($i = 0; $i < $count; $i++){
                $exception_vat .= '<div>'.$Vat_exemption_categories[$varExemptionCategory[$i]].'</div>';
            }
        } else {
            $exception_vat = '';
        }
		$issuer_comment .= '<div class="cont_notation">' . $exception_vat .'<span class="skin bold">ΠΑΡΑΤΗΡΗΣΕΙΣ:</span>
							    <div class="cont_notation_inner">
								    <span class="notes">'.$order_comment.'&nbsp;'.$primer_invoice_notes.'</span>
							    </div>
						    </div>';
	} else {
        if ( $count>0 ) {
            $exception_vat = '<div><span class="skin bold">EXEMPTION FROM VAT :</span></div>';
            for ($i = 0; $i < $count; $i++) {
                $exception_vat .= '<div>' . $Vat_exemption_categories_en[$varExemptionCategory[$i]] . '</div>';
            }
        } else {
            $exception_vat = '';
        }
		$issuer_comment .= '<div class="cont_notation">' . $exception_vat .'<span class="skin bold">COMMENTS:</span>
							    <div class="cont_notation_inner">
								    <span class="notes">'.$order_comment.'&nbsp;'.$primer_invoice_notes.'</span>
							    </div>
						    </div>';
	}

	$allowed_html = array(
		'div' => array(
			'class' => array(),
		),
		'span' => array(
			'class' => array(),
		)
	);

	echo wp_kses($issuer_comment, $allowed_html);
}

function primer_sum_unit_title() {
	$receipt_id             = get_the_ID();
	$order_id               = get_post_meta($receipt_id, 'order_id_to_receipt', true);
	$order                  = wc_get_order( $order_id );
	$order_customer_country = $order->get_billing_country();

    if ($order_customer_country == 'GR') {
		$sum_unit_title = 'ΣΥΝΟΛΟ ΤΕΜΑΧΙΩΝ: ';
	} else {
		$sum_unit_title = 'SUM OF UNITS: ';
	}

	echo esc_html__($sum_unit_title, 'primer');
}

function primer_sum_unit_count() {
    $receipt_id             = get_the_ID();
    $order_id               = get_post_meta($receipt_id, 'order_id_to_receipt', true);
    $order                  = wc_get_order($order_id);
    $invoice_products_types = get_post_meta($order_id, 'invoice_products_types', true);
    $sum_unit_count         = 0;
    $order_total            = $order->get_total();

    if ($order_total == 0) {
        $sum_unit_count = 1;
    } else {
        foreach ($order->get_items() as $item) {
            $product_id = $item->get_product_id();
            $quantity   = $item->get_quantity();
            if (isset($invoice_products_types[$product_id]) && $invoice_products_types[$product_id] === 'Services') {
                continue;
            }
            $sum_unit_count += $quantity;
        }
    }

    echo esc_html__($sum_unit_count, 'primer');
}

function primer_display_issuer_order_total_price($i,$last_page) {
	$receipt_id             = get_the_ID();
	$order_id               = get_post_meta($receipt_id, 'order_id_to_receipt', true);
    $order                  = wc_get_order($order_id);
    $is_credit_receipt      = get_post_meta($receipt_id, 'credit_receipt', true);
    $log_for_order          = get_post_meta($receipt_id, $is_credit_receipt ? 'credit_log_id_for_order' : 'log_id_for_order', true);
    $json_send_to_api       = get_post_meta($log_for_order, 'json_send_to_api', true);
    $json_receipt           = json_decode($json_send_to_api, true);
    $totalNetValue          = number_format($json_receipt['invoice'][0]['invoiceSummary']['totalNetValue'], 2, '.', '');
    $totalVatAmount         = number_format($json_receipt['invoice'][0]['invoiceSummary']['totalVatAmount'], 2, '.', '');
    $totalGrossValue        = number_format($json_receipt['invoice'][0]['invoiceSummary']['totalGrossValue'], 2, '.', '');
    $order_customer_country = $order->get_billing_country();
    $discount_total         = $order->get_discount_total();
    $currency               = $order->get_currency();
    $zero_order_total       = $order->get_total();
    $currency_symbol        = get_woocommerce_currency_symbol($currency);
    $new_discount_total     = 0;

    if ($zero_order_total > 0) {
        foreach ($order->get_items('fee') as $item_fee) {
            $new_discount_total += abs($item_fee->get_total()) + abs($item_fee->get_total_tax());
        }
        $total_before_discount = $order->get_total() - $order->get_shipping_total() - $order->get_shipping_tax() + $new_discount_total;
        $new_discount_percentage   = 100 - (bcdiv($total_before_discount - $new_discount_total, $total_before_discount, 1000) * 100) ?: 0;
        if ($new_discount_percentage > 0) {
            $discount_total += $new_discount_total;
        }
    }
    if ($zero_order_total == 0) {
        $totalGrossValue = 0.02;
        $discount_total  = 0;
    }

	$issuer_total  = '<div class="totals">';
	$issuer_total .= '<table class="totals_table">';

	$issuer_total .= '<tr>';
	if ($order_customer_country == 'GR') {
		$issuer_total .= '<td class="text-left"><p>ΑΞΙΑ ΠΡΟ ΕΚΠΤΩΣΗΣ</p></td>';
	} else {
		$issuer_total .= '<td class="text-left"><p>TOTAL NO DISCOUNT</p></td>';
	}

    if ($i == $last_page) {
        $issuer_total .= '<td class="text-right">';
        $issuer_total .= '<p><span class="total_nodiscount">' . number_format((float)$totalGrossValue + $discount_total, 2, '.', '') . ' ' . $currency_symbol . '</span> </p>';
        $issuer_total .= '</td>';
    }
	$issuer_total .= '</tr>';

	$issuer_total .= '<tr>';
	if ($order_customer_country == 'GR') {
		$issuer_total .= '<td class="text-left"><p>ΣΥΝΟΛΟ ΕΚΠΤΩΣΗΣ</p></td>';
	} else {
		$issuer_total .= '<td class="text-left"><p>TOTAL DISCOUNT</p></td>';
	}
    if ($i == $last_page) {
        $issuer_total .= '<td class="text-right">';
        $issuer_total .= '<p><span class="total_discount">' . number_format((float)$discount_total, 2, '.', '') . ' ' . $currency_symbol . '</span></p>';
        $issuer_total .= '</td>';
        $issuer_total .= '</tr>';
    }

	$issuer_total .= '<tr>';
	if ($order_customer_country == 'GR') {
		$issuer_total .= '<td class="text-left"><p>ΣΥΝΟΛΟ ΧΩΡΙΣ ΦΠΑ</p></td>';
	} else {
		$issuer_total .= '<td class="text-left"><p>TOTAL WITHOUT VAT</p></td>';
	}
    if ($i == $last_page) {
        $issuer_total .= '<td class="text-right">';
        $issuer_total .= '<p><span class="total_withoutvat">' . $totalNetValue . ' ' . $currency_symbol . '</span> </p>';
        $issuer_total .= '</td>';
        $issuer_total .= '</tr>';
    }

	$issuer_total .= '<tr>';
	if ($order_customer_country == 'GR') {
		$issuer_total .= '<td class="text-left"><p>Φ.Π.Α</p></td>';
	} else {
		$issuer_total .= '<td class="text-left"><p>TAXES</p></td>';
	}
    if ($i == $last_page) {
        $issuer_total .= '<td class="text-right">';
        $issuer_total .= '<p><span class="amounttotal">' . $totalVatAmount . ' ' . $currency_symbol . '</span> </p>';
        $issuer_total .= '</td>';
        $issuer_total .= '</tr>';
    }

	$issuer_total .= '<tr>';
	if ($order_customer_country == 'GR') {
		$issuer_total .= '<td class="text-left"><p>ΤΕΛΙΚΟ ΣΥΝΟΛΟ</p></td>';
	} else {
		$issuer_total .= '<td class="text-left"><p>TOTAL SUM</p></td>';
	}
    if ($i == $last_page) {
        $issuer_total .= '<td class="text-right">';
        $issuer_total .= '<p><span class="amounttotal">' . $totalGrossValue . ' ' . $currency_symbol . '</span> </p>';
        $issuer_total .= '</td>';
        $issuer_total .= '</tr>';
    }

	$issuer_total .= '<tr class="blank_row bordered"><td class="text-left">&nbsp;</td></tr>';
	$issuer_total .= '<tr>';
	if ($order_customer_country == 'GR') {
		$issuer_total .= '<td class="text-left finalprice"><p>ΠΛΗΡΩΤΕΟ ΠΟΣΟ</p></td>';
	} else {
		$issuer_total .= '<td class="text-left finalprice"><p>TOTAL PAYMENT</p></td>';
	}
    if ($i == $last_page) {
        $issuer_total .= '<td class="text-right">';
        $issuer_total .= '<p><span class="totalpayment">' . $totalGrossValue . ' ' . $currency_symbol . '</span> </p>';
        $issuer_total .= '</td>';
        $issuer_total .= '</tr>';
    }

	$issuer_total .= '</table>';
	$issuer_total .= '<div class="total_funny_box"></div>';
	$issuer_total .= '</div>';

	$allowed_html = array(
		'table' => array(
			'class' => array(),
		),
		'tr' => array(
			'class' => array(),
		),
		'td' => array(
			'class' => array(),
			'style' => array(),
		),
		'div' => array(
			'class' => array(),
		),
		'span' => array(
			'class' => array(),
		),
		'p' => array(
			'class' => array()
		)
	);
	echo wp_kses($issuer_total, $allowed_html);
}

function primer_display_issuer_logo() {
	$check_use_logo = primer_get_mydata_use_logo();
	if (!empty(primer_get_mydata_logo()) && $check_use_logo == 'on') {
		$invoice_type = get_the_terms(get_the_ID(), 'receipt_status');
		if (is_array($invoice_type)) {
			$invoice_type_slug = $invoice_type[0]->slug;
		}
		$mydata_options = get_option('primer_mydata');
		$photo_id_arg   = explode(':', $mydata_options['image_api_id']);
		if (count($photo_id_arg) > 1) {
			$response_key   = $photo_id_arg[0];
			$response_value = $photo_id_arg[1];
			$response_key   = str_replace('"', '', $response_key);
			$response_value = str_replace('"', '', $response_value);
			$photo_id       = ltrim($response_value);
			if (isset($_GET['type_logo'])) {
				echo esc_attr($photo_id);
			}
		}

		if (!isset($_GET['type_logo'])) {
			echo primer_get_mydata_logo() ? '<img class="logo_img" src="'.wp_get_attachment_image_url( primer_get_mydata_logo(),'full' ).'">' : '';
		}
	} else {
		echo '';
	}
}

function primer_get_mydata_logo() {
	$mydata = PrimerSettings::get_mydata_details();
	return apply_filters( 'primer_get_mydata_logo', $mydata['logo'], $mydata );
}

function primer_get_mydata_use_logo() {
	$mydata = PrimerSettings::get_mydata_use_details();
	return apply_filters( 'primer_get_mydata_use_logo', $mydata['use_logo'], $mydata );
}

function primer_display_invoice_information() {
	$receipt_id = get_the_ID();
    $order_id   = get_post_meta($receipt_id, 'order_id_to_receipt', true);
    $order      = wc_get_order($order_id);

	$receipt_invoice_number = get_post_meta($receipt_id, '_primer_receipt_number', true);
    $receipt_invoice_series = get_post_meta($receipt_id, '_primer_receipt_series', true);
	$receipt_invoice_number = $receipt_invoice_number ?: $receipt_id;

	$invoice_type       = get_the_terms($receipt_id, 'receipt_status');
	$invoice_type_slug  = $invoice_type[0]->slug;

    if ($invoice_type_slug == 'credit-invoice' || $invoice_type_slug == 'credit-receipt') {
        $find_invoice_in_slug = $invoice_type_slug;
    } else {
        $invoice_type_name    = explode('_', $invoice_type_slug);
        $find_invoice_in_slug = $invoice_type_name[1];
    }

    $order_customer_country = $order->get_billing_country();

    $log_for_order        = get_post_meta($receipt_id, 'log_id_for_order', true);
    $is_credit_receipt    = get_post_meta($receipt_id, 'credit_receipt', true);
    $log_for_order        = $is_credit_receipt ? get_post_meta($receipt_id, 'credit_log_id_for_order', true) : $log_for_order;
    $json_send_to_api     = get_post_meta($log_for_order, 'json_send_to_api', true);

    preg_match('/"invoiceType":\s*("[^"]+"|\d+(\.\d+)?)/', $json_send_to_api, $type);
    preg_match('/"issueDate":\s*("[^"]+"|\d+(\.\d+)?)/', $json_send_to_api, $date);
    preg_match('/"time":\s*("[^"]+"|\d+(\.\d+)?)/', $json_send_to_api, $time);

    $invoiceType = json_decode($type[1], true);
    $issueDate   = json_decode($date[1], true);
    $issueTime   = json_decode($time[1], true);

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

    $invoice_information_container  = '<tr>';
	$invoice_information_container .= '<td><span class="invoice_type">'.$invoice_type_text.'</span></td>';
    if ($receipt_invoice_series != 'EMPTY') {
        $invoice_information_container .= '<td><span class="invoice_series">' . $receipt_invoice_series . '</span></td>';
    } else {
        $invoice_information_container .= '<td><span class="invoice_series"></span></td>';
    }
	$invoice_information_container .= '<td><span class="invoice_number">'.$receipt_invoice_number.'</span></td>';

    $receipt_date = date('d/m/Y', strtotime($issueDate)) ?: get_the_date('d/m/Y', $receipt_id);
    $receipt_time = date('H:i', strtotime($issueTime)) ?: get_the_date('H:i', $receipt_id);

	$invoice_information_container .= '<td><span class="invoice_date"> '.$receipt_date.'</span></td>';
	$invoice_information_container .= '<td><span class="invoice_time"> '.$receipt_time.'</span></td>';
	$invoice_information_container .= '</tr>';

	$allowed_html = array(
		'tr' => array(
			'class' => array(),
		),
		'td' => array(
			'class' => array(),
			'style' => array(),
		),

		'span' => array(
			'class' => array(),
		),
	);

	echo wp_kses($invoice_information_container, $allowed_html);
}

function primer_display_left_customer_info() {
	$receipt_id       = get_the_ID();
	$invoice_type     = get_the_terms($receipt_id, 'receipt_status');
    $order_id         = get_post_meta($receipt_id, 'order_id_to_receipt', true);
    $total_order      = wc_get_order($order_id);
    $issuer_client_id = get_post_meta($receipt_id, 'receipt_client_id', true);

	$invoice_type_slug = $invoice_type[0]->slug;
    if ($invoice_type_slug == 'credit-invoice') {
        $find_invoice_in_slug = 'invoice';
    } elseif ($invoice_type_slug == 'credit-receipt') {
        $find_invoice_in_slug = 'receipt';
    } else {
        $invoice_type_name = explode('_', $invoice_type_slug);
        $find_invoice_in_slug = $invoice_type_name[1];
    }

	$order_customer_country = $total_order->get_billing_country();
	$customer_full_name     = $total_order->get_billing_first_name() . ' ' . $total_order->get_billing_last_name();
    $company_bil            = get_post_meta($order_id,'_billing_company', true);

	$left_customer_info  = '<table>';
	$left_customer_info .= '<tr>';

	if ($order_customer_country == 'GR') {
        $left_customer_info .= '<p class="table_titles">ΣΤΟΙΧΕΙΑ ΠΕΛΑΤΗ</p>';
		$left_customer_info .= '<td class="skin bold"><span>ΚΩΔΙΚΟΣ</span></td>';
	} else {
        $left_customer_info .= '<p class="table_titles">CUSTOMER INFORMATION</p>';
		$left_customer_info .= '<td class="skin bold"><span>CUSTOMER ID</span></td>';
	}
	$left_customer_info .= '<td class="info_value"><span>: </span><span class="counterparty_code">'.$issuer_client_id.'</span></td>';
	$left_customer_info .= '</tr>';

    if ($find_invoice_in_slug == 'invoice') {
        $profession = get_post_meta($order_id, '_billing_store', true);
        $vat_number = get_post_meta($order_id, '_billing_vat', true);
        $doy        = get_post_meta($order_id, '_billing_doy', true);
        $doy_value  = primer_return_doy_args()[$doy];
        if (empty($doy_value)) {
            $doy_value = $doy;
        }
    } else {
        $profession = '';
        $vat_number = '';
        $doy_value  = '';
    }

    $left_customer_info .= '<tr>';
    if ($order_customer_country == 'GR') {
        $left_customer_info .= '<td class="skin bold"><span>ΑΦΜ</span></td>';
    } else {
        $left_customer_info .= '<td class="skin bold"><span>VAT NUMBER</span></td>';
    }
    $left_customer_info .= '<td class="info_value"><span>: </span><span class="counterparty_vat">'.$vat_number.'</span></td>';
    $left_customer_info .= '</tr>';

	$left_customer_info .= '<tr>';
	if ($order_customer_country == 'GR') {
		$left_customer_info .= '<td class="skin bold"><span>ΕΠΩΝΥΜΙΑ</span></td>';
	} else {
		$left_customer_info .= '<td class="skin bold"><span>NAME</span></td>';
	}

    if ($find_invoice_in_slug == 'invoice') {
        $left_customer_info .= '<td class="info_value"><span>: </span><span class="counterparty_name">' . $company_bil . '</span></td>';
        $left_customer_info .= '</tr>';
    } else {
        $left_customer_info .= '<td class="info_value"><span>: </span><span class="counterparty_name">' . $customer_full_name . '</span></td>';
        $left_customer_info .= '</tr>';
    }

	$left_customer_info .= '<tr>';
	if ($order_customer_country == 'GR') {
		$left_customer_info .= '<td class="skin bold"><span>ΕΠΑΓΓΕΛΜΑ</span></td>';
	} else {
		$left_customer_info .= '<td class="skin bold"><span>ACTIVITY</span></td>';
	}
	$left_customer_info .= '<td class="info_value"><span>: </span><span class="counterparty_activity">'.$profession.'</span></td>';
	$left_customer_info .= '</tr>';

	$left_customer_info .= '<tr>';
	if ($order_customer_country == 'GR') {
        $left_customer_info .= '<td class="skin bold"><span>ΔΟΥ</span></td>';
        $left_customer_info .= '<td class="info_value"><span>:</span><span class="counterparty_doy">' . $doy_value . '</span></td>';
        $left_customer_info .= '</tr>';
    }

	$left_customer_info .= '</table>';

	$allowed_html = array(
		'table' => array(
			'class' => array(),
            ),
		'tr' => array(
			'class' => array(),
            ),
		'td' => array(
			'class' => array(),
			'style' => array(),
            ),
		'div' => array(
			'class' => array(),
            ),
		'span' => array(
			'class' => array(),
            ),
		'p' => array(
			'class' => array()
        )
    );

	echo wp_kses($left_customer_info, $allowed_html);
}

function primer_display_right_customer_info() {
	$receipt_id = get_the_ID();
	$order_id   = get_post_meta($receipt_id, 'order_id_to_receipt', true);
	$order      = wc_get_order($order_id);

	$order_customer_city      = $order->get_billing_city();
	$order_billing_address_1  = $order->get_billing_address_1();
	$order_billing_address_2  = $order->get_billing_address_2();
	$order_shipping_address_1 = $order->get_shipping_address_1();
	$order_shipping_address_2 = $order->get_shipping_address_2();
	$order_customer_country   = $order->get_billing_country();
	$customer_city            = $order_customer_city;
	$billing_address          = $order_billing_address_1 . ' ' . $order_billing_address_2;
    $order_payment_method     = $order->get_payment_method_title();

	if (!empty($order_shipping_address_1)) {
		$shipping_address    = $order_shipping_address_1 . ' ' . $order_shipping_address_2;
        $order_shipping_name = $order->get_formatted_shipping_full_name();
	} else {
		$shipping_address = $order_billing_address_1 . ' ' . $order_billing_address_2;
	}

	$right_customer_info  = '<table>';
	$right_customer_info .= '<tr>';
	if ($order_customer_country == 'GR') {
        $right_customer_info .= '<p class="table_titles">ΛΟΙΠΑ ΣΤΟΙΧΕΙΑ</p>';
		$right_customer_info .= '<td class="skin bold"><span>ΠΟΛΗ</span></td>';
	} else {
        $right_customer_info .= '<p class="table_titles">OTHER INFORMATION</p>';
		$right_customer_info .= '<td class="skin bold"><span>CITY</span></td>';
	}
	$right_customer_info .= '<td class="info_value"><span>: </span><span class="counterparty_city">'.$customer_city.'</span></td>';
	$right_customer_info .= '</tr>';

	$right_customer_info .= '<tr>';
	if ($order_customer_country == 'GR') {
		$right_customer_info .= '<td class="skin bold"><span>ΔΙΕΥΘΥΝΣΗ</span></td>';
	} else {
		$right_customer_info .= '<td class="skin bold"><span>ADDRESS</span></td>';
	}
	$right_customer_info .= '<td class="info_value"><span>: </span><span class="counterparty_address">'.$billing_address.'</span></td>';
	$right_customer_info .= '</tr>';

	$right_customer_info .= '<tr>';
    if(!empty($order_shipping_address_1)) {
        if ($order_customer_country == 'GR') {
            $right_customer_info .= '<td class="skin bold"><span>ΔΙΕΥΘΥΝΣΗ ΑΠΟΣΤΟΛΗΣ</span></td>';
        } else {
            $right_customer_info .= '<td class="skin bold"><span>SHIPPING ADDRESS</span></td>';
        }
        $right_customer_info .= '<td class="info_value"><span>: </span><span class="send_place">' . $shipping_address . '</span></td>';
        $right_customer_info .= '</tr>';
        $right_customer_info .= '<tr>';
        if ($order_customer_country == 'GR') {
            $right_customer_info .= '<td class="skin bold"><span>ΠΑΡΑΛΗΠΤΗΣ</span></td>';
        } else {
            $right_customer_info .= '<td class="skin bold"><span>RECIPIENT</span></td>';
        }
        $right_customer_info .= '<td class="info_value"><span>: </span><span class="send_place">' . $order_shipping_name . '</span></td>';
        $right_customer_info .= '</tr>';
        $right_customer_info .= '<tr>';
    }
    if ($order_customer_country == 'GR') {
        $right_customer_info .= '<td class="skin bold"><span>ΤΡΟΠΟΣ ΠΛΗΡΩΜΗΣ</span></td>';
    } else {
        $right_customer_info .= '<td class="skin bold"><span>PAYMENT METHOD</span></td>';
    }
    $right_customer_info .= '<td class="info_value"><span>: </span><span class="send_place">'.$order_payment_method.'</span></td>';
    $right_customer_info .= '</tr>';
	$right_customer_info .= '</table>';

	$allowed_html = array(
		'table' => array(
			'class' => array(),
            ),
		'tr' => array(
			'class' => array(),
            ),
		'td' => array(
			'class' => array(),
			'style' => array(),
            ),
		'div' => array(
			'class' => array(),
            ),
		'span' => array(
			'class' => array(),
            ),
		'p' => array(
			'class' => array()
        ),
    );

	echo wp_kses($right_customer_info, $allowed_html);
}

function primer_invoice_uid() {
	$receipt_id  = get_the_ID();
	$invoice_uid = get_post_meta($receipt_id, 'response_invoice_uid', true);

	echo esc_html($invoice_uid);
}

function primer_invoice_mark() {
	$receipt_id   = get_the_ID();
	$invoice_mark = get_post_meta($receipt_id, 'response_invoice_mark', true);

	echo esc_html($invoice_mark);
}

function primer_invoice_authcode() {
	$receipt_id       = get_the_ID();
	$invoice_authcode = get_post_meta($receipt_id, 'response_invoice_authcode', true);

	echo esc_html($invoice_authcode);
}

function primer_generate_qr($receipt_id, $generated_uid) {
	$upload_dir = wp_upload_dir()['basedir'];
	if (!file_exists($upload_dir . '/primer_qrs')) {
		mkdir($upload_dir . '/primer_qrs');
	}
	$is_qr_code_exist = get_post_meta($receipt_id, '_is_qr_code_exist', true);
	$primer = new Primer();
	if (empty($is_qr_code_exist) && !empty($generated_uid)) {
		$receipt_link = "https://primer.gr/mydatasearch/" . $generated_uid;
		$image_name = time() . '_' . $receipt_id . '.png';
		$image_name = sanitize_text_field($image_name);
		$qr_size = 4;
		$qr_frame_size = 2;
		$primer->QRcode->png($receipt_link, PRIMER_QR_IMAGE_DIR . $image_name, QR_ECLEVEL_M, $qr_size, $qr_frame_size);
		update_post_meta($receipt_id, '_is_qr_code_exist', 1);
		update_post_meta($receipt_id, '_product_qr_code', $image_name);
	}
}

function primer_get_generated_qr() {
	$qr_code = '';
	$receipt_id = get_the_ID();
	$receipt_qr_code = get_post_meta($receipt_id, '_product_qr_code', true);
	if (!empty($receipt_qr_code) && file_exists(PRIMER_QR_IMAGE_DIR . $receipt_qr_code)) {
		$path = PRIMER_QR_IMAGE_DIR . $receipt_qr_code;
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		$qr_code .= '<img class="product-qr-code-img" src="'.$base64.'" alt="QR Code" /img>';
	}
    echo wp_kses_normalize_entities( $qr_code, [
        'img' => [
            'src'      => true,
            'sizes'    => true,
            'class'    => true,
            'id'       => true,
            'width'    => true,
            'height'   => true,
            'alt'      => true,
            'align'    => true,
        ],
    ] );
}

function times_html(){
    $receipt_id       = get_the_ID();
    $order_id         = get_post_meta($receipt_id, 'order_id_to_receipt', true);
    $order            = wc_get_order( $order_id );
    $count_product    = 0;
    $html_time        = 1;
    $general_settings = get_option('primer_generals');
    $per_page_product = 5;
    $zero_order_total = $order->get_total();

    if (isset($general_settings['products_per_page_receipt']) && $general_settings['products_per_page_receipt'] != null && $general_settings['products_per_page_receipt'] != '') {
        $per_page_product = $general_settings['products_per_page_receipt'] + 1;
    }

    foreach ($order->get_items() as $item_id => $item) {
        $count_product ++;
    }
    if ($order->get_shipping_total()) {
        $count_product ++;
    }
    if ($zero_order_total != 0) {
        foreach( $order->get_items('fee') as $item_id => $item_fee ){
            $fee_total = $item_fee->get_total();
            if ($fee_total > 0) {
                $count_product ++;
            }
        }
    }
    if ($count_product > $per_page_product) {
        $html_time = (int)($count_product/$per_page_product) +1;
        if(($count_product % $per_page_product)==0){
            $html_time = $html_time -1;
        }
    }

    return $html_time;
}

function total_products_order(){
    $receipt_id    = get_the_ID();
    $order_id      = get_post_meta($receipt_id, 'order_id_to_receipt', true);
    $order         = wc_get_order( $order_id );
    $count_product = 0;

    foreach ($order->get_items() as $item_id => $item) {
        $count_product ++;
    }
    if ($order->get_shipping_total()) {
        $count_product ++;
    }
    $fee_total = 0;

    foreach($order->get_items('fee') as $item_id => $item_fee){
        $fee_total = $item_fee->get_total();
        $fee_total_tax = $item_fee->get_total_tax();
        $fee_net_value = $fee_total-$fee_total_tax;
        $fee_tax_rate = round($item_fee->get_total_tax() / $item_fee->get_total(), 2) * 100;
    }
    if($fee_total > 0){
        $count_product ++;
    }

    return $count_product;
}

function get_customer_country() {
    $receipt_id = get_the_ID();
    $order_id   = get_post_meta($receipt_id, 'order_id_to_receipt', true);
    $order      = wc_get_order($order_id);

    return $order->get_billing_country();
}

function get_transmission_failure(){
    $receipt_id = get_the_ID();
    $order_id   = get_post_meta($receipt_id, 'order_id_to_receipt', true);

    return get_post_meta($order_id,'transmission_failure_check',true);
}

function get_failure_message(){
    $receipt_id = get_the_ID();
    $message    = get_post_meta($receipt_id, 'connection_fail_message', true);

    echo  esc_html($message);
}

function get_credit_receipt_failed(){
    $receipt_id = get_the_ID();
    $order_id   = get_post_meta($receipt_id, 'order_id_to_receipt', true);

    return get_post_meta($order_id,'credit_receipt_failed_to_issue',true);
}

function get_date_failed(){
    $receipt_id = get_the_ID();
    $order_id   = get_post_meta($receipt_id, 'order_id_to_receipt', true);

    return get_post_meta($order_id,'order_date_failed',true);
}
