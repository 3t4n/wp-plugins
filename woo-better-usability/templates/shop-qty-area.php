<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype="multipart/form-data" onsubmit="return false;">
    <?php echo $quantityField; ?>
</form>
<?php echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
    esc_url( $product->add_to_cart_url() ),
    esc_attr( $initialQuantity ),
    esc_attr( $class ),
    'data-product_id="'.$product->get_id().'"',
    esc_html( $product->add_to_cart_text() )
); ?>
