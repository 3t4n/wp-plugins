<?php
defined('ABSPATH') or die('No script kiddies please!');

class cupri_test_gateway extends cupri_abstract_gateway
{
    static protected $instance = null;


    function add_settings($settings)
    {
        add_action('cupri_gateways_' . $this->id . '_tabs_contents', array($this, 'tab_contents'));

        return $settings;
    }

    function start($payment_data)
    {
        $order_id = $payment_data['order_id'];
        $price = $payment_data['price'];
        $callback_url_OK = add_query_arg(array('order_id' => $order_id, 'pay_status' => 'OK'), $this->callback_url);
        $callback_url_NoOK = add_query_arg(array('order_id' => $order_id, 'pay_status' => 'NoOK'), $this->callback_url);

        $Amount = $price; //Amount will be based on Toman - Required
        $Description = 'خرید با شناسه ' . $order_id; // Required


        echo '✅ ' . '<a href="' . $callback_url_OK . '">برای پرداخت موفق اینجا کلیک کنید</a>';
        echo '<br>';
        echo '❌ ' . '<a href="' . $callback_url_NoOK . '">برای پرداخت ناموفق اینجا کلیک کنید</a>';


    }

    function end($payment_data)
    {
        $order_id = sanitize_text_field($_REQUEST['order_id']);
        $pay_status = strtolower(sanitize_text_field($_REQUEST['pay_status']));
        $Amount = $this->get_price($order_id);

        $pay_status = $pay_status == 'ok';

        if ($pay_status) {
            $this->success($order_id);
            $this->set_res_code($order_id, 'test_' . mt_rand());
            echo cupri_success_msg('این یک پرداخت تست با حالت موفق است و فاقد اعتبار است', $order_id);
        } else {
            $this->failed($order_id);
            echo cupri_failed_msg('در انجام تراکنش مشکلی رخ داده است،لطفا مجددا تلاش کنید.', $order_id);
        }


    }

    function tab_contents()
    {

        echo '<p class="fields"><label><strong>این درگاه صرفا برای تست حالت موفق و ناموفق است و اعتباری ندارد و فقط قابل استفاده توسط مدیریت می باشد.</strong>';


    }

}

cupri_test_gateway::get_instance('test', 'تست');

