<?php echo $email_heading; ?>

Thank you for your order!

Order Number: <?php echo esc_html( $order->get_order_number() ); ?>

Order Date: <?php echo wc_format_datetime( $order->get_date_created() ); ?>
