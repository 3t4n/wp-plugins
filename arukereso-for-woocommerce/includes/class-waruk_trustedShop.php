<?php
class waruk_trustedShop {
private $trusted;
private $comments;
function __construct() {
$key =get_option('waruk_webapikey');
$this->comments =str_replace("\\", "", get_option("waruk_comments"));
if (!empty($key) &&!class_exists("Wc_Arukereso_Megbizthato_Bolt")) {
		require __DIR__.'/../lib/TrustedShop.php';
$this->trusted =new TrustedShop($key);
add_action( 'woocommerce_thankyou', array($this, 'waruk_generate_trusted_code'));
}
if (!empty($this->comments)) {
	add_action('wp_footer', array($this, 'insert_comment'));
	}
}
private function getComments() {
	return $this->comments;
	}
public function waruk_generate_trusted_code($order_id) {
		$order = new WC_Order($order_id);	
	try {
	$this->trusted->SetEmail($order->get_billing_email());
	foreach( $order->get_items() as $item ) {
	$this->trusted->AddProduct(htmlspecialchars($item->get_name()));
	}
	echo $this->trusted->Prepare();
} catch (Exception $Ex) {
  $ErrorMessage = $Ex->getMessage();
  echo "hiba: ".$ErrorMessage;
}
	}
	public function insert_comment() {
		echo $this->getComments();
		}
}
new waruk_trustedShop();