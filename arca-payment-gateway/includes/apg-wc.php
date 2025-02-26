<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// vPOS for woocommerce
class wc_apg_gatewey extends WC_Payment_Gateway {

    public function __construct() {
        $this->id = 'wc_apg_gatewey';
        $this->has_fields = true;
        $this->method_title = 'ArCa Payment Gateway by Planet Studio';
        $this->method_description = 'Payment gateway for Armenian banks';
        $this->enabled = $this->get_option('enabled');
        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');

        // subscription supports
//        $this->supports = array(
//            'products',
//            'subscriptions', // Поддержка подписок
//            'subscription_cancellation', // Отмена подписки
//            'subscription_suspension',   // Приостановка подписки
//            'subscription_reactivation', // Возобновление подписки
//            'subscription_amount_changes', // Изменение суммы подписки
//            'subscription_date_changes',   // Изменение даты подписки
//            'multiple_subscriptions',      // Несколько подписок в одном заказе
//        );

        $this->init_form_fields();
        $this->init_settings();
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

        // subscription Хук для продления подписок
//        add_action('woocommerce_scheduled_subscription_payment_' . $this->id, array($this, 'process_subscription_payment'), 10, 2);
    }

    public function init_form_fields() {
        $this->form_fields = apply_filters( 'wc_apg_form_fields', array (
            'enabled' => array(
                'title'   => 'Enable / Disable',
                'type'    => 'checkbox',
                'label'   => 'ArCa / InecoBank / Ameria Bank Payment Gateway',
                'default' => 'yes'
            ),
            'title' => array(
                'title'       => 'Title',
                'type'        => 'text',
                'description' => '',
                'default'     => 'Credit Card',
                'desc_tip'    => true,
            ),
            'description' => array(
                'title'       => 'Description',
                'type'        => 'text',
                'description' => '',
                'default'     => 'ArCa, MasterCard, Visa, Maestro',
                'desc_tip'    => true,
            ),
        ) );
    }

    public function process_payment($wc_orderId) {
        return array(
            "result"    => "success",
            "redirect"  => get_site_url() . "?arca_process=register&wc_orderId=$wc_orderId"
        );
    }

    // subscription payment
    public function process_subscription_payment($amount_to_charge, $order) {

        $this->test();

        return array(
            "result" => "success",
        );

    }

    private function test()
    {

        // Запрос к AmeriaBank
        $requestUrl = "https://servicestest.ameriabank.am/VPOS/api/VPOS/MakeBindingPayment";

        $args = array(
            'headers' => array(
                'Content-Type' => 'application/json', // Указываем правильный Content-Type
            ),
            'body' => json_encode(array( // Преобразуем массив в JSON
                "ClientID" => "3dc2517d-8812-4276-82b0-234de0f2650d",
                "Username" => "3d19541048",
                "Password" => "lazY2k",
                "CardHolderID" => "1", // Лучше получить динамически, если это возможно
                "Amount" => 10, // Сумма из переданного аргумента
                "OrderID" => 3757007, // Используем ID подписки
                "BackURL" => "?arca_process=payment_completed&wc_orderId=3757007&language=hy&currency=051",
                "PaymentType" => 6, // Тип оплаты (например, 6 для Binding)
                "Description" => "Test Binding Payment",
                "Currency" => '051',
                "Opaque" => "",
            )),
            'method' => 'POST',
            'data_format' => 'body',
        );

        // Отправляем запрос
        $response = wp_remote_post($requestUrl, $args);

        error_log($response['body']);

        //error_log( $response['body'] );

        // Обрабатываем ответ
        if (is_wp_error($response)) {
            error_log("Ошибка запроса к AmeriaBank: " . $response->get_error_message());
            return false; // В случае ошибки не продолжаем
        }

        // Пример обработки успешного ответа (проверьте с API AmeriaBank, какой формат ответа)
        $response_body = wp_remote_retrieve_body($response);
        $response_data = json_decode($response_body, true);

        // Проверяем успешность платежа, в зависимости от ответа от банка
        if (isset($response_data['success']) && $response_data['success'] == true) {
            // Обновляем статус подписки на "оплачено"
            //$subscription->payment_complete();

            error_log("Оплата подписки прошла успешно.");
            return true;
        } else {
            // Если ошибка, обновляем статус подписки на "неудачная оплата"
            //$subscription->update_status('failed', 'Ошибка при оплате через ArCa.');
            error_log("Ошибка при оплате подписки");
            return false;
        }

        error_log( 'process_subscription_payment' );

        return true;

    }

}

// Register the payment method in WooCommerce Blocks
add_action('woocommerce_blocks_payment_method_type_registration', function ($payment_method_registry) {

    $logo_url = ARCAPG_URL . '/images/payment-icon.png';
    $gatewey_name = 'wc_apg_gatewey';
    $gatewey_title = 'ArCa Payment Gateway by Planet Studio';
    $gatewey_description = 'Payment gateway for Armenian banks';

    $payment_method_registry->register(new wc_apg_gatewey_Blocks_Support( $gatewey_name, $gatewey_title, $gatewey_description, $logo_url ));

});


