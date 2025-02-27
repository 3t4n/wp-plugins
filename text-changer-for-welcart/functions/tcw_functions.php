<?php
/* Template Name: 機能 */

if (!defined('ABSPATH')) exit;

/* Welcart有効確認 */
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (is_plugin_active('usc-e-shop/usc-e-shop.php')) {

	/* 設定情報 */
	$textChangerForWelcartData = get_option('textChangerForWelcartData');
	if(!empty($textChangerForWelcartData)){
		foreach ($textChangerForWelcartData as $key => $val) {
			$$key = esc_html($val);
		}
	}

	/* 「カートへ入れる」ボタンのテキスト変更 */
	if(!empty($cartButton)){
		function text_changer_for_welcart_filter_incart_button_label($button_label)
		{
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['cartButton']);
		}
		add_filter('usces_filter_incart_button_label',  'text_changer_for_welcart_filter_incart_button_label');
	}

	/* 「お名前」のテキスト変更 */
	if(!empty($thName)){
		function text_changer_for_welcart_filters_addressform_name_label( $label, $type, $values, $applyform ) {
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['thName']);
		}
		add_filter( 'usces_filters_addressform_name_label',  'text_changer_for_welcart_filters_addressform_name_label', 10, 4 );
	}

	/* 「住所検索」のテキスト変更 */
	if(!empty($addressSearch)){
		function text_changer_for_welcart_filter_postal_code_address_search_label($label)
		{
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['addressSearch']);
		}
		add_filter('usces_filter_postal_code_address_search_label',  'text_changer_for_welcart_filter_postal_code_address_search_label');
	}

	/* 「郵便番号入力例」のテキスト変更 */
	if(!empty($zipExample)){
		function text_changer_for_welcart_filter_after_zipcode($ex, $applyform)
		{
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['zipExample']);
		}
		add_filter('usces_filter_after_zipcode',  'text_changer_for_welcart_filter_after_zipcode', 10, 2);
	}

	/* 「住所入力例」のテキスト変更 */
	//市区郡町村
	if(!empty($addressExample1)){
		function text_changer_for_welcart_filter_after_address1($ex, $applyform)
		{
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['addressExample1']);
		}
		add_filter('usces_filter_after_address1',  'text_changer_for_welcart_filter_after_address1', 10, 2);
	}
	//番地
	if(!empty($addressExample2)){
		function text_changer_for_welcart_filter_after_address2($ex, $applyform)
		{
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['addressExample2']);
		}
		add_filter('usces_filter_after_address2',  'text_changer_for_welcart_filter_after_address2', 10, 2);
	}
	//ビル名
	if(!empty($addressExample3)){
		function text_changer_for_welcart_filter_after_address3($ex, $applyform)
		{
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['addressExample3']);
		}
		add_filter('usces_filter_after_address3',  'text_changer_for_welcart_filter_after_address3', 10, 2);
	}

	/* 「電話番号入力例」のテキスト変更 */
	if(!empty($phoneNumExample)){
		function text_changer_for_welcart_filter_after_tel($ex, $applyform)
		{
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['phoneNumExample']);
		}
		add_filter('usces_filter_after_tel',  'text_changer_for_welcart_filter_after_tel', 10, 2);
	}

	/* 「FAX番号入力例」のテキスト変更 */
	if(!empty($faxNumExample)){
		function text_changer_for_welcart_filter_after_fax($ex, $applyform)
		{
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['faxNumExample']);
		}
		add_filter('usces_filter_after_fax',  'text_changer_for_welcart_filter_after_fax', 10, 2);
	}

	/* 「業務パック割引」のテキスト変更 */
	if(!empty($cartBusinessPackageDiscount)){
		function text_changer_for_welcart_filter_itemGpExp_title($set_discount_item){
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['cartBusinessPackageDiscount']);
		}
		add_filter('usces_filter_itemGpExp_title', 'text_changer_for_welcart_filter_itemGpExp_title', 10);
	}

	/* 「キャンペーン割引」のテキスト変更 */
	if(!empty($confirmCampaign)){
		function text_changer_for_welcart_confirm_discount_label($label){
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['confirmCampaign']);
		}
		add_filter('usces_confirm_discount_label', 'text_changer_for_welcart_confirm_discount_label', 10);
		function text_changer_for_welcart_filter_disnount_label($label){
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['confirmCampaign']);
		}
		add_filter('usces_filter_disnount_label', 'text_changer_for_welcart_filter_disnount_label', 10);
	}

	/* 「ログイン」のテキスト変更 */
	if(!empty($memberLogin)){
		function text_changer_for_welcart_filter_loginlink_label(){
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['memberLogin']);
		}
		add_filter('usces_filter_loginlink_label', 'text_changer_for_welcart_filter_loginlink_label');
	}

	/* 「ログアウト」のテキスト変更 */
	if(!empty($memberLogout)){
		function text_changer_for_welcart_filter_logoutlink_label(){
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return esc_html($textChangerForWelcartData['memberLogout']);
		}
		add_filter('usces_filter_logoutlink_label', 'text_changer_for_welcart_filter_logoutlink_label');
	}

	/* 新規入会フォーム「送信する」ボタンのテキスト変更 */
	if(!empty($newMembershipSendButton)){
		function text_changer_for_welcart_filter_newmember_button( $newmemberbutton ) {
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			return '<input name="regmember" type="submit" value="'.esc_html($textChangerForWelcartData['newMembershipSendButton']).'">';
		}
		add_filter( 'usces_filter_newmember_button',  'text_changer_for_welcart_filter_newmember_button' );
	}

	/* 置換によるテキスト変更 */
	$url = $_SERVER['REQUEST_URI'];
	if(strstr($url,'/usces-cart/') == true || strstr($url,'/usces-member/') == true){

		//置換
		function text_changer_for_welcart_call_back($buffer){

			//設定情報
			$textChangerForWelcartData = get_option('textChangerForWelcartData');
			if(!empty($textChangerForWelcartData)){
				foreach ($textChangerForWelcartData as $key => $val) {
					$$key = esc_html($val);
				}
			}

			/* カート・メンバー共通 */
			if(!empty($thNum)){
				$buffer = str_replace('No.</th>',$thNum.'</th>',$buffer);
			}
			if(!empty($thProductName)){ //商品名
				$buffer = str_replace(esc_html__('item name', 'usces').'</th>',$thProductName.'</th>',$buffer);
			}
			if(!empty($thProduct)){ //商品
				$buffer = str_replace(esc_html__('Items', 'usces').'</th>',$thProduct.'</th>',$buffer);
			}
			if(!empty($thPrice)){ //単価
				$buffer = str_replace( esc_html__('Unit price', 'usces').'</th>',$thPrice.'</th>',$buffer);
			}
			if(!empty($thQuantity)){ //数量
				$buffer = str_replace(esc_html__('Quantity', 'usces').'</th>',$thQuantity.'</th>',$buffer);
			}
			if(!empty($thSubTotal)){ //金額
				$buffer = str_replace('<th class="subtotal">'.esc_html__('Amount', 'usces'),'<th class="subtotal">'.$thSubTotal,$buffer);
			}
			if(!empty($thStock)){ //在庫状態
				$buffer = str_replace(esc_html__('stock status', 'usces').'</th>',$thStock.'</th>',$buffer);
			}
			if(!empty($thTotalPrice)){ //商品合計
				$buffer = str_replace('>'.esc_html__('total items', 'usces').'<','>'.$thTotalPrice.'<',$buffer);
			}
			if(!empty($shippingCost)){ //送料
				$buffer = str_replace(esc_html__('Shipping', 'usces').'</t',$shippingCost.'</t',$buffer);
			}
			if(!empty($cashOnDelivery)){ //代引手数料
				$buffer = str_replace(esc_html__('COD fee', 'usces').'</td>',$cashOnDelivery.'</td>',$buffer);
				$buffer = str_replace(esc_html__('C.O.D', 'usces').'</th>',$cashOnDelivery.'</th>',$buffer);
			}
			if(!empty($inSalesTax)){ //内消費税
				$buffer = str_replace(esc_html__('Internal tax', 'usces').'</t',$inSalesTax.'</t',$buffer);
			}
			if(!empty($salesTax)){ //消費税
				$buffer = str_replace('>'.esc_html__('Tax', 'usces').'</t','>'.$salesTax.'</t',$buffer);
			}
			if(!empty($totalAmount)){ //総合計金額
				$buffer = str_replace(esc_html__('Total Amount', 'usces').'</th>',$totalAmount.'</th>',$buffer);
			}
			if(!empty($currentPoints)){ //現在のポイント
				$buffer = str_replace(esc_html__('The current point', 'usces').'</t',$currentPoints.'</t',$buffer);
			}
			if(!empty($usedPoint)){ //使用ポイント
				$buffer = str_replace(esc_html__('Used points', 'usces').'</t',$usedPoint.'</t',$buffer);
			}
			if(!empty($pointUnits)){
				$buffer = str_replace('pt</td>',$pointUnits.'</td>',$buffer);
			}
			if(!empty($thEmail)){ //メールアドレス
				$buffer = str_replace('<th>'.esc_html__('e-mail adress', 'usces'),'<th>'.$thEmail,$buffer);
				$buffer = str_replace('</em>'.esc_html__('e-mail adress', 'usces'),'</em>'.$thEmail,$buffer);
				$buffer = str_replace('<th scope="row">'.esc_html__('e-mail adress', 'usces'),'<th scope="row">'.$thEmail,$buffer);
				$buffer = str_replace('<label>'.esc_html__('e-mail adress', 'usces'),'<label>'.$thEmail,$buffer);
			}
			if(!empty($thPassword)){ //パスワード
				$buffer = str_replace('</em>'.esc_html__('password', 'usces'),'</em>'.$thPassword,$buffer);
				$buffer = str_replace('<th scope="row">'.esc_html__('password', 'usces'),'<th scope="row">'.$thPassword,$buffer);
				$buffer = str_replace('<label>'.esc_html__('password', 'usces'),'<label>'.$thPassword,$buffer);
			}
			if(!empty($thName)){ //お名前
				$buffer = str_replace(esc_html__('Full name', 'usces').'</th>',$thName.'</th>',$buffer);
			}
			if(!empty($tdFirstName)){ //姓
				$buffer = str_replace(esc_html__('Last Name', 'usces').'</span>',$tdFirstName.'</span>',$buffer);
				$buffer = str_replace(esc_html__('Family Name', 'usces').'</span>',$tdFirstName.'</span>',$buffer);
				$buffer = str_replace(esc_html__('Last Name', 'usces').'<input',$tdFirstName.'<input',$buffer);
				$buffer = str_replace(esc_html__('Family Name', 'usces').'<input',$tdFirstName.'<input',$buffer);
			}
			if(!empty($tdLastName)){ //名
				$buffer = str_replace(esc_html__('First Name', 'usces').'</span>',$tdLastName.'</span>',$buffer);
				$buffer = str_replace(esc_html__('Given Name', 'usces').'</span>',$tdLastName.'</span>',$buffer);
				$buffer = str_replace(esc_html__('First Name', 'usces').'<input',$tdLastName.'<input',$buffer);
				$buffer = str_replace(esc_html__('Given Name', 'usces').'<input',$tdLastName.'<input',$buffer);
			}
			if(!empty($thFurigana)){ //フリガナ
				$buffer = str_replace(esc_html__('furigana', 'usces').'</th>',$thFurigana.'</th>',$buffer);
			}
			if(!empty($tdFirstNameFurigana)){ //姓（フリガナ）
				$buffer = str_replace(esc_html__('Last Name', 'usces').'<input name="customer[name3]"',$tdFirstNameFurigana.'<input name="customer[name3]"',$buffer);
				$buffer = str_replace(esc_html__('Last Name', 'usces').'<input name="member[name3]"',$tdFirstNameFurigana.'<input name="member[name3]"',$buffer);
			}
			if(!empty($tdLastNameFurigana)){ //名（フリガナ）
				$buffer = str_replace(esc_html__('First Name', 'usces').'<input name="customer[name4]"',$tdLastNameFurigana.'<input name="customer[name4]"',$buffer);
				$buffer = str_replace(esc_html__('First Name', 'usces').'<input name="member[name4]"',$tdLastNameFurigana.'<input name="member[name4]"',$buffer);
			}
			if(!empty($thZip)){ //郵便番号
				$buffer = str_replace(esc_html__('Zip', 'usces').'</th>',$thZip.'</th>',$buffer);
				$buffer = str_replace(esc_html__('Zip/Postal Code', 'usces').'</th>',$thZip.'</th>',$buffer);
			}
			if(!empty($thCity)){ //都道府県
				$buffer = str_replace(esc_html__('Province', 'usces').'</th>',$thCity.'</th>',$buffer);
			}
			if(!empty($thAddress1)){ //市区郡町村
				$buffer = str_replace(esc_html__('city', 'usces').'</th>',$thAddress1.'</th>',$buffer);
			}
			if(!empty($thAddress2)){ //番地
				$buffer = str_replace(esc_html__('numbers', 'usces').'</th>',$thAddress2.'</th>',$buffer);
			}
			if(!empty($thAddress3)){ //ビル名
				$buffer = str_replace(esc_html__('building name', 'usces').'</th>',$thAddress3.'</th>',$buffer);
			}
			if(!empty($thPhoneNum)){ //電話番号
				$buffer = str_replace(esc_html__('Phone number', 'usces').'</th>',$thPhoneNum.'</th>',$buffer);
			}
			if(!empty($thFaxNum)){ //FAX番号
				$buffer = str_replace(esc_html__('FAX number', 'usces').'</th>',$thFaxNum.'</th>',$buffer);
			}
			if(!empty($requiredMark)){ //＊
				$buffer = str_replace(esc_html__('*', 'usces').'</em>',$requiredMark.'</em>',$buffer);
			}
			if(!empty($backToTopPage)){ //トップページへ戻る
				$buffer = str_replace('class="top" type="button" value="'.esc_html__('Back to the top page.', 'usces').'"','class="top" type="button" value="'.$backToTopPage.'"',$buffer);
				$buffer = str_replace('class="back_to_top_button">'.esc_html__('Back to the top page.', 'usces').'</a>','class="back_to_top_button">'.$backToTopPage.'</a>',$buffer);
			}
			/* カート */
			//カートの中
			if(!empty($navCart)){ //カート
				if(get_locale() != 'ja'){
					$buffer = str_replace(esc_html__('1.Cart', 'usces').'</li>',$navCart.'</li>',$buffer);
				}
				$buffer = str_replace(esc_html__('Cart', 'usces').'</li>',$navCart.'</li>',$buffer);
			}
			if(!empty($navCustomer)){ //お客様情報
				if(get_locale() != 'ja'){
					$buffer = str_replace( esc_html__('2.Customer Info', 'usces').'</li>',$navCustomer.'</li>',$buffer);
				}
				$buffer = str_replace( esc_html__('Customer Information', 'usces').'</li>',$navCustomer.'</li>',$buffer);
			}
			if(!empty($navDelivery)){ //発送・支払方法
				if(get_locale() != 'ja'){
					$buffer = str_replace(esc_html__('3.Deli. & Pay.', 'usces').'</li>',$navDelivery.'</li>',$buffer);
				}
				$buffer = str_replace(esc_html__('Shipping / Payment options', 'usces').'</li>',$navDelivery.'</li>',$buffer);
			}
			if(!empty($navConfirm)){ //内容確認
				if(get_locale() != 'ja'){
					$buffer = str_replace(esc_html__('4.Confirm', 'usces').'</li>',$navConfirm.'</li>',$buffer);
				}
				$buffer = str_replace(esc_html__('Confirmation', 'usces').'</li>',$navConfirm.'</li>',$buffer);
			}
			if(!empty($titleCart)){ //カートの中
				$buffer = str_replace('<title>'.esc_html__('In the cart', 'usces'),'<title>'.$titleCart,$buffer);
				$buffer = str_replace(esc_html__('In the cart', 'usces').'</h',$titleCart.'</h',$buffer);
			}
			if(!empty($cartNocart)){ //只今、カートに商品はございません。
				$buffer = str_replace('<div class="no_cart">'.esc_html__('There are no items in your cart.', 'usces'),'<div class="no_cart">'.$cartNocart,$buffer);
			}
			if(!empty($cartUpButtonMessage)){ //数量を変更した場合は必ず更新ボタンを押してください。
				$buffer = str_replace('>'.esc_html__('Press the `update` button when you change the amount of items.', 'usces'),'>'.$cartUpButtonMessage,$buffer);
			}
			if(!empty($cartUpButton)){ //数量更新
				$buffer = str_replace('name="upButton" type="submit" value="'.esc_html__('Quantity renewal', 'usces').'"','name="upButton" type="submit" value="'.$cartUpButton.'"',$buffer);
			}
			if(!empty($cartDeleteButton)){ //削除
				$buffer = str_replace('value="'.esc_html__('Delete', 'usces').'"','value="'.$cartDeleteButton.'"',$buffer);
			}
			if(!empty($cartCurrencyCode)){ //通貨
				$buffer = str_replace('<div class="currency_code">'.esc_html__('Currency', 'usces'),'<div class="currency_code">'.$cartCurrencyCode,$buffer);
			}

			if(!empty($cartBusinessPackageDiscount) || !empty($cartBusinessPackageDiscountMessage)){
				if(!empty($cartBusinessPackageDiscount)){
					$temp = $cartBusinessPackageDiscount;
					$buffer = str_replace('alt="'.esc_html__('Business package discount', 'usces').'"','alt="'.$cartBusinessPackageDiscount.'"',$buffer); //業務パック割引
					$buffer = str_replace('>'.esc_html__('The price with this mark applys to Business pack discount.', 'usces').'<','>'.sprintf(esc_html__('The price with this mark applys to %s.', 'text-changeer-for-welcart'), $cartBusinessPackageDiscount).'<',$buffer); //このマークがある価格は業務パック割引が適用されています。
				}else{
					$temp = esc_html__('Business pack discount', 'text-changeer-for-welcart'); //業務パック割引
				}
				if(!empty($cartBusinessPackageDiscountMessage)){
					$buffer = str_replace('>'.sprintf(esc_html__('The price with this mark applys to %s.', 'text-changeer-for-welcart'), $temp).'<','>'.$cartBusinessPackageDiscountMessage.'<',$buffer);
				}
			}

			if(!empty($cartContinueShoppingButton)){ //買い物を続ける
				$buffer = str_replace('value="'.esc_html__('continue shopping', 'usces').'"','value="'.$cartContinueShoppingButton.'"',$buffer);
			}
			if(!empty($cartToCustomerInfoButton)){ //次へ
				$buffer = str_replace('class="to_customerinfo_button" value="'.esc_html__(' Next ', 'usces').'"','class="to_customerinfo_button" value="'.$cartToCustomerInfoButton.'"',$buffer);
			}
			//お客様情報
			if(!empty($titleCustomer)){ //お客様情報
				$buffer = str_replace('<title>'.esc_html__('Customer Information', 'usces'),'<title>'.$titleCustomer,$buffer);
				$buffer = str_replace(esc_html__('Customer Information', 'usces').'</h',$titleCustomer.'</h',$buffer);
			}
			if(!empty($customerMemberForm)){ //会員の方はこちら▼
				$buffer = str_replace(esc_html__('The member please enter at here.', 'usces').'</h',$customerMemberForm.'</h',$buffer);
				$buffer = str_replace(esc_html__('The member please enter at here', 'text-changeer-for-welcart').'</h',$customerMemberForm.'</h',$buffer);
			}
			if(!empty($customerToMemberLoginButton)){ //次へ
				$buffer = str_replace('class="to_memberlogin_button" type="submit" value="'.esc_html__(' Next ', 'usces').'"','class="to_memberlogin_button" type="submit" value="'.$customerToMemberLoginButton.'"',$buffer);
			}
			if(!empty($customerGuestForm)){ //会員ではない方はこちら▼
				$buffer = str_replace(esc_html__('The nonmember please enter at here.', 'usces').'</h',$customerGuestForm.'</h',$buffer);
				$buffer = str_replace(esc_html__('The nonmember please enter at here', 'text-changeer-for-welcart').'</h',$customerGuestForm.'</h',$buffer);
			}
			if(!empty($customerPasswordMessage)){ //新規会員登録する場合にご記入ください。
				$buffer = str_replace('>'.esc_html__('When you enroll newly, please fill it out.', 'usces'),'>'.$customerPasswordMessage,$buffer);
			}
			if(!empty($customerBackCartButton)){ //戻る
				$buffer = str_replace('class="back_cart_button" value="'.esc_html__('Back', 'usces').'"','class="back_cart_button" value="'.$customerBackCartButton.'"',$buffer);
			}
			if(!empty($customerToDeliveryInfoButton)){ //次へ
				$buffer = str_replace('class="to_deliveryinfo_button" value="'.esc_html__(' Next ', 'usces').'"','class="to_deliveryinfo_button" value="'.$customerToDeliveryInfoButton.'"',$buffer);
			}
			if(!empty($customerToRegandDeliveryInfoButton)){ //会員登録しながら次へ
				$buffer = str_replace('class="to_reganddeliveryinfo_button" value="'.esc_html__('To the next while enrolling', 'usces').'"','class="to_reganddeliveryinfo_button" value="'.$customerToRegandDeliveryInfoButton.'"',$buffer);
			}
			//発送・支払方法
			if(!empty($titleDelivery)){ //発送・支払方法
				$buffer = str_replace('<title>'.esc_html__('Shipping / Payment options', 'usces'),'<title>'.$titleDelivery,$buffer);
				$buffer = str_replace(esc_html__('Shipping / Payment options', 'usces').'</h',$titleDelivery.'</h',$buffer);
			}
			if(!empty($deliveryFlag1)){ //お客様情報と同じ
				$buffer = str_replace(esc_html__('same as customer information', 'usces').'</label>',$deliveryFlag1.'</label>',$buffer);
			}
			if(!empty($deliveryFlag2)){ //別の発送先を指定する
				$buffer = str_replace(esc_html__('Chose another shipping address.', 'usces').'</label>',$deliveryFlag2.'</label>',$buffer);
			}
			if(!empty($deliveryShippingAddress)){ //発送先
				$buffer = str_replace(esc_html__('shipping address', 'usces').'</th>',$deliveryShippingAddress.'</th>',$buffer);
			}
			if(!empty($deliveryShippingMethod)){ //配送方法
				$buffer = str_replace(esc_html__('shipping option', 'usces').'</th>',$deliveryShippingMethod.'</th>',$buffer);
			}
			if(!empty($deliveryPreferredDeliveryDate)){ //配送希望日
				$buffer = str_replace(esc_html__('Delivery date', 'usces').'</th>',$deliveryPreferredDeliveryDate.'</th>',$buffer);
			}
			if(!empty($deliveryPreferredDeliveryTime)){ //配送希望時間
				$buffer = str_replace(esc_html__('Delivery Time', 'usces').'</th>',$deliveryPreferredDeliveryTime.'</th>',$buffer);
			}
			if(!empty($deliveryPaymentMethod)){ //支払方法
				$buffer = str_replace(esc_html__('payment method', 'usces').'</th>',$deliveryPaymentMethod.'</th>',$buffer);
			}
			if(!empty($deliveryRemarks)){ //備考
				$buffer = str_replace(esc_html__('Notes', 'usces').'</th>',$deliveryRemarks.'</th>',$buffer);
			}
			if(!empty($deliveryBackToCustomerButton)){
				$buffer = str_replace('class="back_to_customer_button" value="'.esc_html__('Back', 'usces').'"','class="back_to_customer_button" value="'.$deliveryBackToCustomerButton.'"',$buffer);
			}
			if(!empty($deliveryToConfirmButton)){
				$buffer = str_replace('class="to_confirm_button" value="'.esc_html__(' Next ', 'usces').'"','class="to_confirm_button" value="'.$deliveryToConfirmButton.'"',$buffer);
			}
			//内容確認
			if(!empty($titleConfirm)){ //内容確認
				$buffer = str_replace('<title>'.esc_html__('Confirmation', 'usces'),'<title>'.$titleConfirm,$buffer);
				$buffer = str_replace(esc_html__('Confirmation', 'usces').'</h',$titleConfirm.'</h',$buffer);
			}
			if(!empty($confirmAttentionMessage)){ //※このページを表示したまま、別ウィンドウで商品追加や数量変更は行わないでください。
				$buffer = str_replace(esc_html__('Please do not change product addition and amount of it with the other window with displaying this page.', 'usces'),$confirmAttentionMessage,$buffer);
			}
			if(!empty($confirmPointsToUse)){ //利用するポイント
				$buffer = str_replace(esc_html__('Points you are using here', 'usces').'</td>',$confirmPointsToUse.'</td>',$buffer);
			}
			if(!empty($confirmRusePointsButton)){ //ポイントを使用する
				$buffer = str_replace('class="use_point_button" value="'.esc_html__('Use the points', 'usces').'"','class="use_point_button" value="'.$confirmRusePointsButton.'"',$buffer);
			}
			if(!empty($confirmTableHeadTitle1)){ //お客様情報
				$buffer = str_replace(esc_html__('Customer Information', 'usces').'</h',$confirmTableHeadTitle1.'</h',$buffer);
			}
			if(!empty($confirmTableHeadTitle2)){ //配送先情報
				$buffer = str_replace(esc_html__('Shipping address information', 'usces').'</h',$confirmTableHeadTitle2.'</h',$buffer);
			}
			if(!empty($confirmTableHeadTitle3)){ //その他
				$buffer = str_replace(esc_html__('Others', 'usces').'</h',$confirmTableHeadTitle3.'</h',$buffer);
			}
			if(!empty($confirmReturnToDelivery)){ //お届けお支払方法入力に戻る
				$buffer = str_replace('class="back_to_delivery_button" value="'.esc_html__('Back to payment method page.', 'usces').'"','class="back_to_delivery_button" value="'.$confirmReturnToDelivery.'"',$buffer);
			}
			if(!empty($confirmOrderButton)){ //上記内容で注文する
				$buffer = str_replace('class="checkout_button" value="'.esc_html__('Checkout', 'usces').'"','class="checkout_button" value="'.$confirmOrderButton.'"',$buffer);
			}
			//完了
			if(!empty($titleCompletion)){ //注文完了
				$buffer = str_replace('<title>'.esc_html__('Order Complete', 'usces'),'<title>'.$titleCompletion,$buffer);
			}
			if(!empty($headTitleCompletion)){ //完了
				$buffer = str_replace('<h1 class="cart_page_title">'.esc_html__('Completion', 'usces'),'<h1 class="cart_page_title">'.$headTitleCompletion,$buffer);
			}
			if(!empty($completionHeadMessage)){ //送信が完了しました
				$buffer = str_replace(esc_html__('It has been sent succesfully.', 'usces').'</h',$completionHeadMessage.'</h',$buffer);
			}
			if(!empty($completionMessage)){ //お買い上げありがとうございました。ご不明な点などがございましたら、お問合せよりご連絡ください。
				$buffer = str_replace(esc_html__('Thank you for shopping.', 'usces').'<br />'.__("If you have any questions, please contact us by 'Contact'.", 'usces'),$completionMessage,$buffer);
			}

			/* メンバー */
			//メンバー共通
			if(!empty($memberLogin)){ //ログイン
				$buffer = str_replace('class="member_login_button" value="'.esc_html__('Log-in', 'usces').'"','class="member_login_button" value="'.$memberLogin.'"',$buffer);
				$buffer = str_replace('title="'.esc_html__('Log-in', 'usces').'">'.esc_html__('Log-in', 'usces'),'title="'.$memberLogin.'">'.$memberLogin,$buffer);
			}
			if(!empty($getNewPasswordMessage)){ //メールの内容にしたがってパスワードを変更してください。
				$buffer = str_replace('>'.esc_html__('Change your password by following the instruction in this mail.', 'usces').'<','>'.$getNewPasswordMessage.'<',$buffer);
			}
			//マイページ
			if(!empty($titleMember)){ //会員情報（メンバー）
				$buffer = str_replace('<title>'.esc_html__('Membership information', 'usces'),'<title>'.$titleMember,$buffer);
				$buffer = str_replace('<title>'.esc_html__('Membership', 'usces'),'<title>'.$titleMember,$buffer);
			}
			if(!empty($headTitleMember)){ //マイページ
				$buffer = str_replace(esc_html__('My page', 'usces').'</h',$headTitleMember.'</h',$buffer);
			}
			if(!empty($memberNum)){ //会員番号
				$buffer = str_replace(esc_html__('member number', 'usces').'</th>',$memberNum.'</th>',$buffer);
			}
			if(!empty($membershipDate)){ //入会日
				$buffer = str_replace(esc_html__('Strated date', 'usces').'</th>',$membershipDate.'</th>',$buffer);
			}
			if(!empty($toEditMemberInformation)){ //会員情報編集へ 》
				$buffer = str_replace(esc_html__('To member information editing', 'usces').'</a>',$toEditMemberInformation.'</a>',$buffer);
				$buffer = str_replace('Edit Member Information Here>></a>',$toEditMemberInformation.'</a>',$buffer);
			}
			if(!empty($purchaseHistory)){ //購入履歴
				$buffer = str_replace(esc_html__('Purchase history', 'usces').'</h',$purchaseHistory.'</h',$buffer);
			}
			if(!empty($excludeCancel)){ //キャンセルを除外
				$buffer = str_replace(esc_html__('Exclude cancellations', 'usces').'</label>',$excludeCancel.'</label>',$buffer);
			}
			if(!empty($historyPeriod)){ //期間
				$buffer = str_replace(esc_html__('Period', 'usces').'</span>',$historyPeriod.'</span>',$buffer);
			}
			if(!empty($purchaseHistory)){ //購入履歴
				$buffer = str_replace(esc_html__('Purchase history', 'usces').'</h',$purchaseHistory.'</h',$buffer);
			}
			if(!empty($orderNum)){ //注文番号
				$buffer = str_replace(esc_html__('Order number', 'usces').'</th>',$orderNum.'</th>',$buffer);
			}
			if(!empty($purchaseDate)){ //購入日
				$buffer = str_replace(esc_html__('Purchase date', 'usces').'</th>',$purchaseDate.'</th>',$buffer);
			}
			if(!empty($responseStatus)){ //対応状況
				$buffer = str_replace(esc_html__('Processing status', 'usces').'</th>',$responseStatus.'</th>',$buffer);
			}
			if(!empty($paymentStatus)){ //入金状況
				$buffer = str_replace(esc_html__('transfer statement', 'usces').'</th>',$paymentStatus.'</th>',$buffer);
			}
			if(!empty($purchaseAmount)){ //購入金額
				$buffer = str_replace(esc_html__('Purchase price', 'usces').'</th>',$purchaseAmount.'</th>',$buffer);
			}
			if(!empty($discount)){ //値引き
				$buffer = str_replace(esc_html__('Discount', 'usces').'</th>',$discount.'</th>',$buffer);
			}
			if(!empty($usedPoints)){ //使用ポイント
				$buffer = str_replace(esc_html__('Used points', 'usces').'</th>',$usedPoints.'</th>',$buffer);
			}
			if(!empty($getPoints)){ //獲得ポイント
				$buffer = str_replace(esc_html__('Acquired points', 'usces').'</th>',$getPoints.'</th>',$buffer);
			}
			if(!empty($editMemberInformation)){ //会員情報編集
				$buffer = str_replace(esc_html__('Member information editing', 'usces').'</h',$editMemberInformation.'</h',$buffer);
			}
			if(!empty($noChangeMemberInformation)){ //※変更しない場合は空白
				$buffer = str_replace(esc_html__('Leave it blank in case of no change.', 'usces').'</td>',$noChangeMemberInformation.'</td>',$buffer);
			}
			if(!empty($updateMemberInformation)){ //更新する
				$buffer = str_replace('"editmember" type="submit" value="'.esc_html__('update it', 'usces').'"','"editmember" type="submit" value="'.$updateMemberInformation.'"',$buffer);
			}
			if(!empty($cancelMembership)){ //退会する
				$buffer = str_replace('"deletemember" type="submit" value="'.esc_html__('delete it', 'usces').'"','"deletemember" type="submit" value="'.$cancelMembership.'"',$buffer);
			}
			if(!empty($confirmDeleteMemberInformation)){ //会員に関する全ての情報が削除されます。よろしいですか？
				$buffer = str_replace(esc_html__('All information about the member is deleted. Are you all right?', 'usces').'',$confirmDeleteMemberInformation,$buffer);
			}
			//ログイン
			if(!empty($titleLogin)){ //会員ログイン
				$buffer = str_replace('<title>'.esc_html__('Log-in for members', 'usces'),'<title>'.$titleLogin,$buffer);
				$buffer = str_replace(esc_html__('Log-in for members', 'usces').'</h',$titleLogin.'</h',$buffer);
			}
			if(!empty($rememberLoginInformation)){ //ログイン情報を記憶
				$buffer = str_replace(esc_html__('memorize login information', 'usces').'<',$rememberLoginInformation.'<',$buffer);
			}
			if(!empty($forgotPassword)){ //パスワードをお忘れですか？
				$buffer = str_replace('title="'.esc_html__('Did you forget your password?', 'usces').'">'.esc_html__('Did you forget your password?', 'usces'),'title="'.$forgotPassword.'">'.$forgotPassword,$buffer);
			}
			if(!empty($notRegisteredMember)){ //会員登録されていないお客様
				$buffer = str_replace(esc_html__('Customers who are not member registration', 'usces').'</h',$notRegisteredMember.'</h',$buffer);
			}
			if(!empty($newMemberHere)){ //新規ご入会はこちら
				$buffer = str_replace('title="'.esc_html__('New enrollment for membership.', 'usces').'">'.esc_html__('New enrollment for membership.', 'usces'),'title="'.$newMemberHere.'">'.$newMemberHere,$buffer);
			}
			//新規入会フォーム
			if(!empty($titleNewMembershipForm)){ //新規入会フォーム
				$buffer = str_replace('<title>'.esc_html__('New enrollment form', 'usces'),'<title>'.$titleNewMembershipForm,$buffer);
				$buffer = str_replace(esc_html__('New enrollment form', 'usces').'</h',$titleNewMembershipForm.'</h',$buffer);
			}
			if(!empty($newMembershipFormMessage1)){ //新規入会に関する文章：1行目
				$buffer = str_replace(esc_html__('All your personal information  will be protected and handled with carefull attention.', 'usces'),$newMembershipFormMessage1,$buffer);
			}
			if(!empty($newMembershipFormMessage2)){ //新規入会に関する文章：2行目
				$buffer = str_replace(__('Your information is entrusted to us for the purpose of providing information and respond to your requests, but to be used for any other purpose. More information, please visit our Privacy  Notice.', 'usces'),$newMembershipFormMessage2,$buffer);
			}
			if(!empty($newMembershipFormMessage3)){ //新規入会に関する文章：3行目
				$buffer = str_replace(esc_html__('The items marked with *, are mandatory. Please complete.', 'usces'),$newMembershipFormMessage3,$buffer);
			}
			if(!empty($newMembershipFormMessage4)){ //新規入会に関する文章：4行目
				$buffer = str_replace(esc_html__('Please use Alphanumeric characters for numbers.', 'usces'),$newMembershipFormMessage4,$buffer);
			}
			//新パスワード取得
			if(!empty($titleNewPassword)){ //新パスワード取得
				$buffer = str_replace('<title>'.esc_html__('The new password acquisition', 'usces'),'<title>'.$titleNewPassword,$buffer);
				$buffer = str_replace(esc_html__('The new password acquisition', 'usces').'</h',$titleNewPassword.'</h',$buffer);
			}
			if(!empty($getNewPassword)){ //新しいパスワードを取得
				$buffer = str_replace('id="member_login" value="'.esc_html__('Obtain new password', 'usces').'"','id="member_login" value="'.$getNewPassword.'"',$buffer);
			}			
			//新パスワード取得手続き完了
			if(!empty($titleCompletionNewPassword)){ //新パスワード取得手続き完了
				$buffer = str_replace('<title>'.esc_html__('New password procedures for obtaining complete', 'usces'),'<title>'.$titleCompletionNewPassword,$buffer);
			}
			if(!empty($headTitleCompletionNewPassword)){ //完了
				$buffer = str_replace('<h1 class="member_page_title">'.esc_html__('Completion', 'usces'),'<h1 class="member_page_title">'.$headTitleCompletionNewPassword,$buffer);
			}
			if(!empty($sendMailMessage)){ //メールを送信いたしました。
				$buffer = str_replace('>'.esc_html__('I transmitted an email.', 'usces').'<','>'.$sendMailMessage.'<',$buffer);
			}
			if(!empty($memberInformationHere)){ //会員情報ページはこちら
				$buffer = str_replace(esc_html__('to vist membership information page', 'usces').'</a>',$memberInformationHere.'</a>',$buffer);
			}
			//パスワード変更
			if(!empty($titleChangePassword)){ //パスワード変更
				$buffer = str_replace('<title>'.esc_html__('Change password', 'usces'),'<title>'.$titleChangePassword,$buffer);
				$buffer = str_replace(esc_html__('Change password', 'usces').'</h',$titleChangePassword.'</h',$buffer);
			}
			if(!empty($registrationNewePassword)){ //登録
				$buffer = str_replace('name="changepassword" id="member_login" value="'.esc_html__('Register', 'usces').'"','name="changepassword" id="member_login" value="'.$registrationNewePassword.'"',$buffer);
			}
			//パスワード変更完了
			if(!empty($changedPassword)){ //パスワードを変更いたしました。
				$buffer = str_replace('>'.esc_html__('Password has been changed.', 'usces').'<','>'.$changedPassword.'<',$buffer);
			}

			return $buffer;
		}


		function text_changer_for_welcart_buf_start() {
			ob_start("text_changer_for_welcart_call_back");
		}
		add_action('after_setup_theme', 'text_changer_for_welcart_buf_start');

		function text_changer_for_welcart_buf_end() {
			if(ob_get_length()) {
				ob_end_flush();
			}
		}
		add_action('shutdown', 'text_changer_for_welcart_buf_end');
	}

	/* 自動送信メールのテキスト置換 */
	//購入者宛
	function text_changer_for_welcart_send_ordermail_para_to_customer( $confirm_para, $entry, $data ) {
		//設定情報
		$textChangerForWelcartData = get_option('textChangerForWelcartData');
		if(!empty($textChangerForWelcartData)){
			foreach ($textChangerForWelcartData as $key => $val) {
				$$key = esc_html($val);
			}
		}

		if(!empty($thEmail)){ //メールアドレス
			$confirm_para['message'] = preg_replace('/^'.esc_html__('e-mail adress', 'usces').' : /um',$thEmail.' : ',$confirm_para['message']);
		}
		if(!empty($thZip)){ //郵便番号
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Zip', 'usces').' : /um',$thZip.' : ',$confirm_para['message']);
		}
		if(!empty($thPhoneNum)){ //電話番号
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Phone number', 'usces').' : /um',$thPhoneNum.' : ',$confirm_para['message']);
		}
		if(!empty($thFaxNum)){ //FAX番号
			$confirm_para['message'] = preg_replace('/^'.esc_html__('FAX number', 'usces').' : /um',$thFaxNum.' : ',$confirm_para['message']);
		}
		if(!empty($thProduct)){ //商品
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Items', 'usces').' :/um',$thProduct.' :',$confirm_para['message']);
		}
		if(!empty($thPrice)){ //単価
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Unit price', 'usces').' /um',$thPrice.' ',$confirm_para['message']);
		}
		if(!empty($thTotalPrice)){ //商品合計
			$confirm_para['message'] = preg_replace('/^'.esc_html__('total items', 'usces').' : /um',$thTotalPrice.' : ',$confirm_para['message']);
		}
		if(!empty($usedPoint)){ //ご利用ポイント
			$confirm_para['message'] = preg_replace('/^'.esc_html__('use of points', 'usces').' : /um',$usedPoint.' : ',$confirm_para['message']);
		}
		if(!empty($pointUnits)){ //ポイント（pt）
			$confirm_para['message'] = preg_replace('/'.esc_html__('Points', 'usces').'\r\n/um',$pointUnits."\r\n",$confirm_para['message']);
		}
		if(!empty($shippingCost)){ //送料
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Shipping', 'usces').' : /um',$shippingCost.' : ',$confirm_para['message']);
		}
		if(!empty($cashOnDelivery)){ //代引手数料
			$confirm_para['message'] = preg_replace('/^'.esc_html__('COD fee', 'usces').' : /um',$cashOnDelivery.' : ',$confirm_para['message']);
		}
		if(!empty($inSalesTax)){ //内消費税
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Internal tax', 'usces').'/um',$inSalesTax,$confirm_para['message']);
		}
		if(!empty($salesTax)){ //消費税
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Tax', 'usces').'/um',$salesTax,$confirm_para['message']);
		}
		if(!empty($cartCurrencyCode)){ //通貨
			$confirm_para['message'] = preg_replace('/'.esc_html__('Currency', 'usces').' : /um',$cartCurrencyCode.' : ',$confirm_para['message']);
		}
		if(!empty($deliveryShippingAddress)){ //【配送先】
			if(get_locale() == 'ja'){
				$confirm_para['message'] = preg_replace('/^【'.esc_html__('A shipping address', 'text-changeer-for-welcart').'】/um','【'.$deliveryShippingAddress.'】',$confirm_para['message']);
			}
		}
		if(!empty($deliveryShippingMethod)){ //配送方法
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Delivery Method', 'usces').' : /um',$deliveryShippingMethod.' : ',$confirm_para['message']);
		}
		if(!empty($deliveryPreferredDeliveryDate)){ //配送希望日
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Delivery date', 'usces').' : /um',$deliveryPreferredDeliveryDate.' : ',$confirm_para['message']);
		}
		if(!empty($deliveryPreferredDeliveryTime)){ //配送希望時間
			$confirm_para['message'] = preg_replace('/^'.esc_html__('Delivery Time', 'usces').' : /um',$deliveryPreferredDeliveryTime.' : ',$confirm_para['message']);
		}
		if(!empty($deliveryPaymentMethod)){ //【お支払方法】
			if(get_locale() == 'ja'){
				$confirm_para['message'] = preg_replace('/^【'.esc_html__('Payment method', 'text-changeer-for-welcart').'】/um','【'.$deliveryPaymentMethod.'】',$confirm_para['message']);
			}
		}
		if(!empty($deliveryRemarks)){ //【その他】
			if(get_locale() == 'ja'){
				$confirm_para['message'] = preg_replace('/^【'.esc_html__('Others', 'text-changeer-for-welcart').'】/um','【'.$deliveryRemarks.'】',$confirm_para['message']);
			}
		}

		return $confirm_para;
	}
	add_filter( 'usces_send_ordermail_para_to_customer',  'text_changer_for_welcart_send_ordermail_para_to_customer', 99, 3 );

	//管理者宛
	function text_changer_for_welcart_send_ordermail_para_to_manager( $bcc_para, $entry, $data ) {
		//設定情報
		$textChangerForWelcartData = get_option('textChangerForWelcartData');
		if(!empty($textChangerForWelcartData)){
			foreach ($textChangerForWelcartData as $key => $val) {
				$$key = esc_html($val);
			}
		}

		if(!empty($thEmail)){ //メールアドレス
			$bcc_para['message'] = preg_replace('/^'.esc_html__('e-mail adress', 'usces').' : /um',$thEmail.' : ',$bcc_para['message']);
		}
		if(!empty($thZip)){ //郵便番号
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Zip', 'usces').' : /um',$thZip.' : ',$bcc_para['message']);
		}
		if(!empty($thPhoneNum)){ //電話番号
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Phone number', 'usces').' : /um',$thPhoneNum.' : ',$bcc_para['message']);
		}
		if(!empty($thFaxNum)){ //FAX番号
			$bcc_para['message'] = preg_replace('/^'.esc_html__('FAX number', 'usces').' : /um',$thFaxNum.' : ',$bcc_para['message']);
		}
		if(!empty($thProduct)){ //商品
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Items', 'usces').' :/um',$thProduct.' :',$bcc_para['message']);
		}
		if(!empty($thPrice)){ //単価
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Unit price', 'usces').' /um',$thPrice.' ',$bcc_para['message']);
		}
		if(!empty($thTotalPrice)){ //商品合計
			$bcc_para['message'] = preg_replace('/^'.esc_html__('total items', 'usces').' : /um',$thTotalPrice.' : ',$bcc_para['message']);
		}
		if(!empty($usedPoint)){ //ご利用ポイント
			$bcc_para['message'] = preg_replace('/^'.esc_html__('use of points', 'usces').' : /um',$usedPoint.' : ',$bcc_para['message']);
		}
		if(!empty($pointUnits)){ //ポイント（pt）
			$bcc_para['message'] = preg_replace('/'.esc_html__('Points', 'usces').'\r\n/um',$pointUnits."\r\n",$bcc_para['message']);
		}
		if(!empty($shippingCost)){ //送料
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Shipping', 'usces').' : /um',$shippingCost.' : ',$bcc_para['message']);
		}
		if(!empty($cashOnDelivery)){ //代引手数料
			$bcc_para['message'] = preg_replace('/^'.esc_html__('COD fee', 'usces').' : /um',$cashOnDelivery.' : ',$bcc_para['message']);
		}
		if(!empty($inSalesTax)){ //内消費税
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Internal tax', 'usces').'/um',$inSalesTax,$bcc_para['message']);
		}
		if(!empty($salesTax)){ //消費税
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Tax', 'usces').'/um',$salesTax,$bcc_para['message']);
		}
		if(!empty($cartCurrencyCode)){ //通貨
			$bcc_para['message'] = preg_replace('/'.esc_html__('Currency', 'usces').' : /um',$cartCurrencyCode.' : ',$bcc_para['message']);
		}
		if(!empty($deliveryShippingAddress)){ //【配送先】
			if(get_locale() == 'ja'){
				$bcc_para['message'] = preg_replace('/^【'.esc_html__('A shipping address', 'text-changeer-for-welcart').'】/um','【'.$deliveryShippingAddress.'】',$bcc_para['message']);
			}
		}
		if(!empty($deliveryShippingMethod)){ //配送方法
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Delivery Method', 'usces').' : /um',$deliveryShippingMethod.' : ',$bcc_para['message']);
		}
		if(!empty($deliveryPreferredDeliveryDate)){ //配送希望日
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Delivery date', 'usces').' : /um',$deliveryPreferredDeliveryDate.' : ',$bcc_para['message']);
		}
		if(!empty($deliveryPreferredDeliveryTime)){ //配送希望時間
			$bcc_para['message'] = preg_replace('/^'.esc_html__('Delivery Time', 'usces').' : /um',$deliveryPreferredDeliveryTime.' : ',$bcc_para['message']);
		}
		if(!empty($deliveryPaymentMethod)){ //【お支払方法】
			if(get_locale() == 'ja'){
				$bcc_para['message'] = preg_replace('/^【'.esc_html__('Payment method', 'text-changeer-for-welcart').'】/um','【'.$deliveryPaymentMethod.'】',$bcc_para['message']);
			}
		}
		if(!empty($deliveryRemarks)){ //【その他】
			if(get_locale() == 'ja'){
				$bcc_para['message'] = preg_replace('/^【'.esc_html__('Others', 'text-changeer-for-welcart').'】/um','【'.$deliveryRemarks.'】',$bcc_para['message']);
			}
		}

		return $bcc_para;
	}
	add_filter( 'usces_send_ordermail_para_to_manager',  'text_changer_for_welcart_send_ordermail_para_to_manager', 99, 3 );

	//会員
	function text_changer_for_welcart_filter_send_regmembermail_message( $message, $user ) {
		//設定情報
		$textChangerForWelcartData = get_option('textChangerForWelcartData');
		if(!empty($textChangerForWelcartData)){
			foreach ($textChangerForWelcartData as $key => $val) {
				$$key = esc_html($val);
			}
		}

		if(!empty($titleMember)){ //会員情報
			if(get_locale() == 'ja'){
				$message = str_replace('/^「'.esc_html__('Membership information', 'usces').'」/um','「'.$titleMember.'」',$message);
			}
		}
		if(!empty($thEmail)){ //メールアドレス
			$message = preg_replace('/^'.esc_html__('e-mail adress', 'usces').' : /um',$thEmail.' : ',$message);
		}

		return $message;
	}
	add_filter( 'usces_filter_send_regmembermail_message',  'text_changer_for_welcart_filter_send_regmembermail_message', 99, 2 ); //登録時
	add_filter( 'usces_filter_send_updmembermail_message',  'text_changer_for_welcart_filter_send_regmembermail_message', 99, 2 ); //更新時
	add_filter( 'usces_filter_send_delmembermail_message',  'text_changer_for_welcart_filter_send_regmembermail_message', 99, 2 ); //退会時

} //Welcart有効確認END
