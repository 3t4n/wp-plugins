<?php
class waruk_xmlGenerator {
/*
* Legenerálja az Árukereső/Árgép/Olcsobbat xml kimenetet
*/
public function generateXmlHeaderForArukereso() {
	
$xml ="<?xml version='1.0' encoding='UTF-8'?>";
$xml .="<products>\r\n";
return $xml;
	}
public function generateProductXmlForArukereso ($product) {
		$prod ="";
$prod ="<product>\r\n";
$prod .="<identifier>".$product['id']."</identifier>\r\n";
$prod .="<name><![CDATA[".strip_tags($product['title'])."]]></name>\r\n";
if (!empty($product['manufacturer'])) {
$prod .="<manufacturer>".$product['manufacturer']."</manufacturer>\r\n";
}
if (!empty($product['ean_code'])) {
$prod .="<ean_code>".$product['ean_code']."</ean_code>\r\n";
}
if (!empty($product['warranty'])) {
$prod .="<warranty>".$product['warranty']."</warranty>\r\n";
}
if (!empty($product['sku'])) {
	$prod .="<ProductNumber>".$product['sku']."</ProductNumber>\r\n";
	}
	if (empty($product['sku']) &&!empty($product['productnumber'])) {
$prod .="<ProductNumber>".$product['productnumber']."</ProductNumber>\r\n";
}

$prod .="<category>".$product['category']."</category>\r\n";
$prod .="<price>".$product['price']."</price>\r\n";
$prod .="<net_price>".$product['net_price']."</net_price>\r\n";
$prod .="<product_url><![CDATA[".$product['url']."]]></product_url>\r\n";
if (!empty($product['kep'])) {
$prod .="<image_url>".$product['kep']."</image_url>\r\n";
}
$prod .="<description><![CDATA[".strip_tags($product['excerpt'])."]]></description>\r\n";
$shipping_max_free =get_option('waruk_shipping_max_free');
if ($shipping_max_free !="" &&$shipping_max_free <$product['price'] ) {
$shipping_cost ="ingyenes";
} else {
$shipping_cost =(get_option('waruk_shipping_cost') ==0 ? 'Ingyenes' : get_option('waruk_shipping_cost'));;
}
$shipping_time =get_option('waruk_shipping_time');

if (!empty($product['shipping_cost'])) {
$prod .="<delivery_cost>".$product['shipping_cost']."</delivery_cost>\r\n";
} 
elseif (!empty($shipping_cost)){
$prod .="<delivery_cost>".$shipping_cost."</delivery_cost>\r\n";
}
if (!empty($product['shipping_time'])) {
$prod .="<delivery_time>".$product['shipping_time']."</delivery_time>\r\n";
} 
elseif (!empty($shipping_time)){
$prod .="<delivery_time>".get_option('waruk_shipping_time')."</delivery_time>\r\n";
}
if (count($product["attributes"]) >0) {
	foreach ($product["attributes"] as $attribute) {
		$prod .="<Attribute><Attribute_Name>".$attribute['name']."</Attribute_Name><Attribute_Value>".$attribute['value']."</Attribute_Value></Attribute>\r\n";
		}
	}
	$prod .="</product>\r\n";
return $prod;
}
public function generateXmlFooterForArukereso() {
$xml ="</products>";
return $xml;
	}
	public function generateXmlHeaderForArgep() {
	
$xml ="<?xml version='1.0' encoding='UTF-8'?>";
$xml .="<termeklista>\r\n";
return $xml;
	}
	public function generateProductXmlForArgep ($product) {
			$prod ="";
$prod ="<termek>\r\n";
$prod .="<cikkszam>".$product['id']."</cikkszam>\r\n";
$prod .="<nev><![CDATA[".$product['title']."]]></nev>\r\n";
$prod .="<ar>".$product['price']."</ar>\r\n";
$prod .="<termeklink><![CDATA[".$product['url']."]]></termeklink>\r\n";
if (!empty($product['kep'])) {
$prod .="<fotolink><![CDATA[".$product['kep']."]]></fotolink>\r\n";
}
$prod .="<leiras><![CDATA[".strip_tags($product['excerpt'])."]]></leiras>\r\n";
if ($shipping_max_free !="" &&$shipping_max_free <$product['price'] ) {
$shipping_cost ="ingyenes";
} else {
$shipping_cost =(get_option('waruk_shipping_cost') ==0 ? 'Ingyenes' : get_option('waruk_shipping_cost'));;
}
$shipping_time =get_option('waruk_shipping_time');

if (!empty($product['shipping_cost'])) {
$prod .="<szallitas>".$product['shipping_cost']."</szallitas>\r\n";
} 
elseif (!empty($shipping_cost)){
$prod .="<szallitas>".$shipping_cost."</szallitas>\r\n";
}
if (!empty($product['shipping_time'])) {
$prod .="<ido>".$product['shipping_time']."</ido>\r\n";
} 
elseif (!empty($shipping_time)){
$prod .="<ido>".get_option('waruk_shipping_time')."</ido>\r\n";
}

	$prod .="</termek>\r\n";
	return $prod;
	}
	public function generateXmlFooterForArgep() {
$xml ="</termeklista>";
return $xml;
	}
		public function generateXmlHeaderForOlcsobbat () {
	
$xml ="<?xml version='1.0' encoding='UTF-8'?>";
$xml .="<catalog>\r\n";
return $xml;
	}
	public function generateProductXmlForOlcsobbat ($product) {
		$prod ="";
$prod ="<product>\r\n";
$prod .="<id>".$product['id']."</id>\r\n";
$prod .="<name><![CDATA[".strip_tags($product['title'])."]]></name>\r\n";
if (!empty($product['manufacturer'])) {
$prod .="<manufacturer>".$product['manufacturer']."</manufacturer>\r\n";
}
if (!empty($product['ean_code'])) {
$prod .='<barcodes><barcode type="ean-13"><![CDATA['.$product['ean_code'].']]></barcode></barcodes>';
$prod.="\r\n";
}
if (!empty($product['warranty'])) {
$prod .="<warranty>".$product['warranty']."</warranty>\r\n";
}
	if (!empty($product['productnumber'])) {
$prod .="<itemid>".$product['productnumber']."</itemid>\r\n";
} else {
if (!empty($product['sku'])) {
	$prod .="<itemid>".$product['sku']."</itemid>\r\n";
	}
}
if (!empty($product["stock"])) {
$prod .="<stock>".$product['stock']."</stock>\r\n";
}
$prod .="<category>".str_replace("->", "/", $product['category'])."</category>\r\n";
$prod .="<grossprice>".$product['price']."</grossprice>\r\n";
$prod .="<netprice>".$product['net_price']."</netprice>\r\n";
$prod .="<urlsite><![CDATA[".$product['url']."]]></urlsite>\r\n";
if (!empty($product['kep'])) {
$prod .="<urlpicture>".$product['kep']."</urlpicture>\r\n";
}
$prod .="<describe><![CDATA[".strip_tags($product['excerpt'])."]]></describe>\r\n";
$shipping_max_free =get_option('waruk_shipping_max_free');
if ($shipping_max_free !="" &&$shipping_max_free <$product['price'] ) {
$shipping_cost ="ingyenes";
} else {
$shipping_cost =(get_option('waruk_shipping_cost') ==0 ? 'Ingyenes' : get_option('waruk_shipping_cost'));;
}
$shipping_time =get_option('waruk_shipping_time');

if (!empty($product['shipping_cost'])) {
$prod .="<deliveryprice>".$product['shipping_cost']."</deliveryprice>\r\n";
} 
elseif (!empty($shipping_cost)){
$prod .="<deliveryprice>".$shipping_cost."</deliveryprice>\r\n";
}
if (!empty($product['shipping_time'])) {
$prod .="<deliverytime>".$product['shipping_time']."</deliverytime>\r\n";
} 
elseif (!empty($shipping_time)){
$prod .="<deliverytime>".get_option('waruk_shipping_time')."</deliverytime>\r\n";
}
	$prod .="</product>\r\n";
return $prod;
}
public function generateXmlFooterForOlcsobbat() {
$xml ="</catalog>";
return $xml;
	}
}