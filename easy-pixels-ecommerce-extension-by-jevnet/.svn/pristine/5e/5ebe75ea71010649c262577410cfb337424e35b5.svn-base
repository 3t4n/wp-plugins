<?php
class jn_WCtracking
{

	public static function getProductCategory($product='')
	{
		if($product==''){return;}
		if(is_string($product)){$product = wc_get_product( $product);}
		return ($term=get_term_by( 'id', $product->get_category_ids()[0], 'product_cat' ) )?$term->name:'';
	}
}
?>