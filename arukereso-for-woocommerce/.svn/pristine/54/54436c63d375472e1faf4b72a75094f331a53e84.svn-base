<?php
class waruk_feedGenerator {
public function __construct() {
			add_filter('init', array($this, 'customRSS'));
			}
	public function customRSS() {
	if (!is_feed("arukereso")){
		add_feed('arukereso', array($this, 'generateArukeresoXml'));
		}
		if (!is_feed("argep")){
add_feed('argep', array($this, 'generateArgepXml'));
}
if (!is_feed("olcsobbat")){
add_feed('olcsobbat', array($this, 'generateOlcsobbatXml'));
}
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
	public function generateArukeresoXml() {
		header("Content-type: text/xml");
$xmlGenerator =new waruk_xmlGenerator();
		echo $xmlGenerator->generateXmlHeaderForArukereso();
				$productList =new waruk_wc_productList();
		$products =$productList->getProductList();
		$free =0;
						foreach ($products as $product) {
															$product_data =$productList->getProductData ($product);
															if ($free <50 &&count($product_data) >0) {
																				foreach ($product_data as $prod) {
					echo $xmlGenerator->generateProductXmlForArukereso($prod);
										}
										$free++;
										}
							}
						echo $xmlGenerator->generateXmlFooterForArukereso();
		}
		//
		public function generateArgepXml() {
		header("Content-type: text/xml");
							$xmlGenerator =new waruk_xmlGenerator();
		echo $xmlGenerator->generateXmlHeaderForArgep();
				$productList =new waruk_wc_productList();
		$products =$productList->getProductList();
		$free =0;
						foreach ($products as $product) {
															$product_data =$productList->getProductData ($product);
															if ($free <50 &&count($product_data) >0) {
																				foreach ($product_data as $prod) {
					echo $xmlGenerator->generateProductXmlForArgep($prod);
										}
										$free++;
										}
							}
						echo $xmlGenerator->generateXmlFooterForArgep();
								}
		public function generateOlcsobbatXml() {
		header("Content-type: text/xml");
		$xmlGenerator =new waruk_xmlGenerator();
		echo $xmlGenerator->generateXmlHeaderForOlcsobbat();
				$productList =new waruk_wc_productList();
		$products =$productList->getProductList();
		$free =0;
						foreach ($products as $product) {
															$product_data =$productList->getProductData ($product);
															if ($free <50 &&count($product_data) >0) {
																				foreach ($product_data as $prod) {
					echo $xmlGenerator->generateProductXmlForOlcsobbat($prod);
										}
										$free++;
										}
							}
						echo $xmlGenerator->generateXmlFooterForOlcsobbat();
								}
		
}
new waruk_feedGenerator();