<?php

namespace Ambikly\Gateways;

abstract class BaseGateway
{
    private static $instances = [];

    private $id;

    private $title;

    public function __construct($payment_id, $payment_title)
    {
        $this->id = $payment_id;

        $this->title = $payment_title;

        add_action('ambikly_process_' . $this->id . '_payment', [$this, 'process'], 10, 4);
    }

    // Method to get a singleton instance of each subclass
    public static function getInstance()
    {
        $class = static::class;

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static(static::getID(), static::getTitle());
        }

        return self::$instances[$class];
    }

    public function preview()
    {
        $title = ambikly_get_option($this->id . '_title', $this->title);
        $description = ambikly_get_option($this->id . '_description', '');

        $default_payment_gateway = ambikly_get_option('default_payment_gateway', 'cash_on_delivery');

        ?>
        <li class="payment-gateway-<?php echo esc_attr($this->id); ?>">
            <div class="payment-gateway-list">
                <div class="gateway-wrap">
                    <input <?php checked(1, ($default_payment_gateway == $this->id)) ?> type="radio"
                                                                                        name="payment_method"
                                                                                        id="payment-gateway-<?php echo esc_attr($this->id) ?>"
                                                                                        value="<?php echo esc_attr($this->id) ?>">
                    <label for="payment-gateway-<?php echo esc_attr($this->id) ?>"><?php echo esc_html($title); ?></label>
                </div>
                <?php if ($description) { ?>
                    <p><?php echo esc_html($description) ?></p>
                <?php }
                do_action('ambikly_payment_gateway_' . $this->id . '_preview', $this);
                ?>
            </div>

        </li>
        <?php
    }

    abstract static function getID();

    abstract static function getTitle();

    abstract function process($order_id, $payment_method, $sanitized_data, $checkout_controller);
}