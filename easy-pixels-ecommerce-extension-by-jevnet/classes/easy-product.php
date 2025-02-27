<?php
class jnep_WCproductList
{
	private $productList=[];


	function __construct()
	{
		add_action( 'woocommerce_shop_loop', array( $this, 'productPush' ),1 );
		add_action( 'woocommerce_after_shop_loop', array( $this, 'getProductViewList' ) );
		add_action( 'woocommerce_after_checkout_form', array( $this, 'getCartProductList' ),1 );
	}


	public function getCartProductList()
	{
		global $woocommerce;
		$items = $woocommerce->cart->get_cart();

		foreach($items as $item => $values) 
		{ 
			$prod=new jnep_WCProduct();
			$product =  wc_get_product( $values['data']->get_id());
			$cat=($term=get_term_by( 'id', $product->get_category_ids()[0], 'product_cat' ) )?$term->name:'';
			$price = get_post_meta($values['product_id'] , '_price', true);

			$prod->id=$values['data']->get_id();
			$prod->name=$product->get_title();
			$prod->category=$cat;
			$prod->price=$price;
			$prod->position=sizeof($this->productList)+1;
			$prod->quantity=$values['quantity'];

			$this->productList[]=$prod;
		}
	}

	public function productPush($prod)
	{
		global $product;
		$prod=new jnep_WCProduct();
		$cat=($term=get_term_by( 'id', $product->get_category_ids()[0], 'product_cat' ) )?$term->name:'';

		$prod->id=$product->get_id();
		$prod->name=get_the_title();
		$prod->category=$cat;
		$prod->price=$product->get_price();
		$prod->position=sizeof($this->productList)+1;

		$this->productList[]=$prod;
	}

	public function getProductViewList()
	{
		return $this->productList;
	}
}

class jnep_WCProduct
{
	public $id='';
	public $name='';
	public $list_name='Search Results';
	public $category='';
	public $position=1;
	public $quantity=1;
	public $price='';
}