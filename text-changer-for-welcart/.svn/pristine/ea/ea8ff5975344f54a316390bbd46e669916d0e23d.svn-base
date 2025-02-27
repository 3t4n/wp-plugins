<?php
/*
Template Name: 設定画面
*/

if(!defined('ABSPATH')) exit;

/* Welcart有効確認 */
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (is_plugin_active('usc-e-shop/usc-e-shop.php')):

/* 全設定をクリア */
if(!empty($_POST['submit_all_settings_clear'])){
	delete_option('textChangerForWelcartData');
	$saveMessage = '<div class="saveMessage updated"><p>'.esc_html__('All settings cleared.', 'text-changer-for-welcart').'</p></div>'; //全設定をクリアしました。
}

/* 設定情報 */
//取得
$textChangerForWelcartData = get_option('textChangerForWelcartData');

/* テキスト変更 */
/* カート・メンバー共通 */
$tcwDataNameArr = array(

	'thNum', //No.
	'thProductName', //商品名
	'thProduct', //商品
	'thPrice', //単価
	'thQuantity', //数量
	'thSubTotal', //金額
	'thStock', //在庫状態
	'thTotalPrice', //商品合計
	'shippingCost', //送料
	'cashOnDelivery', //代引手数料
	'inSalesTax', //内消費税
	'salesTax', //消費税
	'totalAmount', //総合計金額
	'currentPoints', //現在のポイント
	'usedPoint', //使用ポイント
	'pointUnits', //pt
	'thEmail', //メールアドレス
	'thPassword', //パスワード
	'thName', //お名前
	'tdFirstName', //姓
	'tdLastName', //名
	'thFurigana', //フリガナ
	'tdFirstNameFurigana', //姓（フリガナ）
	'tdLastNameFurigana', //名（フリガナ）
	'thZip', //郵便番号
	'thCity', //都道府県
	'thAddress1', //市区郡町村
	'thAddress2', //番地
	'thAddress3', //ビル名
	'thPhoneNum', //電話番号
	'thFaxNum', //FAX番号
	'requiredMark', //＊
	'addressSearch', //住所検索
	'zipExample', //郵便番号入力例
	'addressExample1', //住所入力例：市区郡町村
	'addressExample2', //住所入力例：番地
	'addressExample3', //住所入力例：ビル名
	'phoneNumExample', //電話番号入力例
	'faxNumExample', //FAX番号入力例
	'backToTopPage', //トップページへ戻る

);
foreach ($tcwDataNameArr as $key => $val){
	if(!empty($_POST['submit_settings_data_1'])){
		if(!empty($_REQUEST[$val])){
			$textChangerForWelcartData[$val] = sanitize_text_field($_REQUEST[$val]);
		}else{
			unset($textChangerForWelcartData[$val]);
		}
	}
	if(!empty($textChangerForWelcartData[$val])){
		$$val = $textChangerForWelcartData[$val]; //可変変数
	}else{
		$$val = '';
	}
}

/* カート */
$tcwDataNameArr = array(

	/* カート共通 */
	'navCart', //カート
	'navCustomer', //お客様情報
	'navDelivery', //発送・支払方法
	'navConfirm', //内容確認

	/* カートの中 */
	'titleCart', //カートの中
	'cartNocart', //只今、カートに商品はございません。
	'cartUpButtonMessage', //数量を変更した場合は必ず更新ボタンを押してください。
	'cartUpButton', //数量更新
	'cartDeleteButton', //削除
	'cartCurrencyCode', //通貨
	'cartBusinessPackageDiscountMessage', //このマークがある価格は業務パック割引が適用されています。
	'cartContinueShoppingButton', //買い物を続ける
	'cartToCustomerInfoButton', //次へ

	/* お客様情報 */
	'titleCustomer', //お客様情報
	'customerMemberForm', //会員の方はこちら▼
	'customerToMemberLoginButton', //次へ
	'customerGuestForm', //会員ではない方はこちら▼
	'customerPasswordMessage', //新規会員登録する場合にご記入ください。
	'customerBackCartButton', //戻る
	'customerToDeliveryInfoButton', //次へ
	'customerToRegandDeliveryInfoButton', //会員登録しながら次へ

	/* 発送・支払方法 */
	'titleDelivery', //発送・支払方法
	'deliveryFlag1', //お客様情報と同じ
	'deliveryFlag2', //別の発送先を指定する
	'deliveryShippingAddress', //発送先
	'deliveryShippingMethod', //配送方法
	'deliveryPreferredDeliveryDate', //配送希望日
	'deliveryPreferredDeliveryTime', //配送希望時間
	'deliveryPaymentMethod', //支払方法
	'deliveryRemarks', //備考
	'deliveryBackToCustomerButton', //戻る
	'deliveryToConfirmButton', //次へ

	/* 内容確認 */
	'titleConfirm', //内容確認
	'confirmAttentionMessage', //※このページを表示したまま、別ウィンドウで商品追加や数量変更は行わないでください。
	'confirmPointsToUse', //利用するポイント
	'confirmRusePointsButton', //ポイントを使用する
	'confirmTableHeadTitle1', //お客様情報
	'confirmTableHeadTitle2', //配送先情報
	'confirmTableHeadTitle3', //その他
	'confirmReturnToDelivery', //お届けお支払方法入力に戻る
	'confirmOrderButton', //上記内容で注文する

	/* 完了 */
	'titleCompletion', //注文完了
	'headTitleCompletion', //完了
	'completionHeadMessage', //送信が完了しました
	'completionMessage', //お買い上げありがとうございました。ご不明な点などがございましたら、お問合せよりご連絡ください。

);
foreach ($tcwDataNameArr as $key => $val){
	if(!empty($_POST['submit_settings_data_2'])){
		if(!empty($_REQUEST[$val])){
			$textChangerForWelcartData[$val] = sanitize_text_field($_REQUEST[$val]);
		}else{
			unset($textChangerForWelcartData[$val]);
		}
	}
	if(!empty($textChangerForWelcartData[$val])){
		$$val = $textChangerForWelcartData[$val]; //可変変数
	}else{
		$$val = '';
	}
}

/* メンバー */
$tcwDataNameArr = array(

	/* メンバー共通 */
	'memberLogin', //ログイン
	'memberLogout', //ログアウト
	'getNewPasswordMessage', //メールの内容にしたがってパスワードを変更してください。

	/* マイページ */
	'titleMember', //会員情報
	'headTitleMember', //マイページ
	'memberNum', //会員番号
	'membershipDate', //入会日
	'toEditMemberInformation', //会員情報編集へ 》
	'purchaseHistory', //購入履歴
	'excludeCancel', //キャンセルを除外
	'historyPeriod', //期間
	'orderNum', //注文番号
	'purchaseDate', //購入日
	'responseStatus', //対応状況
	'paymentStatus', //入金状況
	'purchaseAmount', //購入金額
	'discount', //値引き
	'usedPoints', //使用ポイント
	'getPoints', //獲得ポイント
	'editMemberInformation', //会員情報編集
	'noChangeMemberInformation', ///※変更しない場合は空白
	'updateMemberInformation', //更新する
	'cancelMembership', //退会する
	'confirmDeleteMemberInformation', //会員に関する全ての情報が削除されます。よろしいですか？

	/* ログイン */
	'titleLogin', //会員ログイン
	'rememberLoginInformation', //ログイン情報を記憶
	'forgotPassword', //パスワードをお忘れですか？
	'notRegisteredMember', //会員登録されていないお客様
	'newMemberHere', //新規ご入会はこちら

	/* 新規入会フォーム */
	'titleNewMembershipForm', //新規入会フォーム
	'newMembershipFormMessage1', //新規入会フォームのメッセージ1行目
	'newMembershipFormMessage2', //新規入会フォームのメッセージ2行目
	'newMembershipFormMessage3', //新規入会フォームのメッセージ3行目
	'newMembershipFormMessage4', //新規入会フォームのメッセージ4行目
	'newMembershipSendButton', //送信する

	/* 新パスワード取得 */
	'titleNewPassword', //新パスワード取得
	'getNewPassword', //新しいパスワードを取得

	/* 新パスワード取得手続き完了 */
	'titleCompletionNewPassword', //新パスワード取得手続き完了
	'headTitleCompletionNewPassword', //完了
	'sendMailMessage', //メールを送信いたしました。
	'memberInformationHere', //会員情報ページはこちら

	/* パスワード変更 */
	'titleChangePassword', //パスワード変更
	'registrationNewePassword', //登録

	/* パスワード変更完了 */
	'changedPassword', //パスワードを変更いたしました。

);
foreach ($tcwDataNameArr as $key => $val){
	if(!empty($_POST['submit_settings_data_3'])){
		if(!empty($_REQUEST[$val])){
			$textChangerForWelcartData[$val] = sanitize_text_field($_REQUEST[$val]);
		}else{
			unset($textChangerForWelcartData[$val]);
		}
	}
	if(!empty($textChangerForWelcartData[$val])){
		$$val = $textChangerForWelcartData[$val]; //可変変数
	}else{
		$$val = '';
	}
}

/* その他 */
$tcwDataNameArr = array(

	'cartButton', //カートに入れる
	'cartBusinessPackageDiscount', //業務パック割引
	'confirmCampaign', //キャンペーン割引

);
foreach ($tcwDataNameArr as $key => $val){
	if(!empty($_POST['submit_settings_data_4'])){
		if(!empty($_REQUEST[$val])){
			$textChangerForWelcartData[$val] = sanitize_text_field($_REQUEST[$val]);
		}else{
			unset($textChangerForWelcartData[$val]);
		}
	}
	if(!empty($textChangerForWelcartData[$val])){
		$$val = $textChangerForWelcartData[$val]; //可変変数
	}else{
		$$val = '';
	}
}

//DB更新
update_option('textChangerForWelcartData',$textChangerForWelcartData);

//設定保存時のメッセージ
if(isset($_POST['submit_settings'])){
	//Nonceチェック
	if(!check_admin_referer('tcw_settings_nonce')){
        wp_die(__('Security check failed', 'text-domain'));
    }
	$saveMessage = '<div class="saveMessage updated"><p>'.sprintf(esc_html__('%s saved.', 'text-changer-for-welcart'), sanitize_text_field($_POST['submit_settings'])).'</p></div>'; // ～を保存しました。
}
?>

<section class="tcwSettingsSection">
	<?php
	if(!empty($saveMessage)){
		echo $saveMessage;
	}
	?>

	<?php if(empty($textChangerForWelcartData)): //設定がされていない場合のみ表示 ?>
	<div class="firstMessage"><?php esc_html_e('You can change the text on the cart and member page of "Welcart" by entering text in the input field. Please note that most of the changes are made by string substitution, so the text may not be changed depending on the theme you are using or the specifications of your customization.', 'text-changer-for-welcart'); //入力欄にテキストを入力すると「Welcart」のカート・メンバーページのテキストを変更できます。多くを文字列の置換により変更している為、お使いのテーマやカスタマイズの仕様によって変更されない場合がございますので予めご了承ください。 ?></div>
	<?php endif; ?>

	<input id="settingsTab1" type="radio" name="tab_settings" checked><label for="settingsTab1"><span class="tabLabel"><?php esc_html_e('Cart & Member', 'text-changer-for-welcart'); //カート・メンバー共通 ?></span></label>
	<input id="settingsTab2" type="radio" name="tab_settings"><label for="settingsTab2"><span class="tabLabel"><?php esc_html_e('Cart', 'text-changer-for-welcart'); //カート ?></span></label>
	<input id="settingsTab3" type="radio" name="tab_settings"><label for="settingsTab3"><span class="tabLabel"><?php esc_html_e('Member', 'text-changer-for-welcart'); //メンバー ?></span></label>
	<input id="settingsTab4" type="radio" name="tab_settings"><label for="settingsTab4"><span class="tabLabel"><?php esc_html_e('Others', 'text-changer-for-welcart'); //その他 ?></span></label>
	<input id="settingsTab5" type="radio" name="tab_settings"><label for="settingsTab5"><span class="tabLabel"><?php esc_html_e('Other Plugins and Themes', MAINICHI_WEB_THIS_PLUGIN_NAME_TCW); //その他のプラグイン・テーマ ?></span></label>


	<?php /* カート・メンバー共通 */ ?>
	<div id="settings1" class="tab_content">
		<form class="settingsForm1" method="post" action="admin.php?page=tcw_function_settings">
			<?php wp_nonce_field('tcw_settings_nonce'); //Nonceフィールド ?>
			<div class="tcwGrayBackground">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="thNum"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：No.</label></th>
						<td>
							<input name="thNum" type="text" value="<?php echo esc_html($thNum); ?>" class="regular-text" placeholder="No.">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thProductName"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('item name', 'usces'); //商品名 ?></label></th>
						<td>
							<input name="thProductName" type="text" value="<?php echo esc_html($thProductName); ?>" class="regular-text" placeholder="<?php esc_html_e('item name', 'usces'); //商品名 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thProduct"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Items', 'usces'); //商品 ?></label></th>
						<td>
							<input name="thProduct" type="text" value="<?php echo esc_html($thProduct); ?>" class="regular-text" placeholder="<?php esc_html_e('Items', 'usces'); //商品 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thPrice"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Unit price', 'usces'); //単価 ?></label></th>
						<td>
							<input name="thPrice" type="text" value="<?php echo esc_html($thPrice); ?>" class="regular-text" placeholder="<?php esc_html_e('Unit price', 'usces'); //単価 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thQuantity"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Quant', 'usces'); //数量 ?></label></th>
						<td>
							<input name="thQuantity" type="text" value="<?php echo esc_html($thQuantity); ?>" class="regular-text" placeholder="<?php esc_html_e('Quant', 'usces'); //数量 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thSubTotal"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Amount', 'usces'); //金額 ?></label></th>
						<td>
							<input name="thSubTotal" type="text" value="<?php echo esc_html($thSubTotal); ?>" class="regular-text" placeholder="<?php esc_html_e('Amount', 'usces'); //金額 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thStock"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('stock status', 'usces'); //在庫状態 ?></label></th>
						<td>
							<input name="thStock" type="text" value="<?php echo esc_html($thStock); ?>" class="regular-text" placeholder="<?php esc_html_e('stock status', 'usces'); //在庫状態 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thTotalPrice"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('total items', 'usces'); //商品合計 ?></label></th>
						<td>
							<input name="thTotalPrice" type="text" value="<?php echo esc_html($thTotalPrice); ?>" class="regular-text" placeholder="<?php esc_html_e('total items', 'usces'); //商品合計 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="shippingCost"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Shipping', 'usces'); //送料 ?></label></th>
						<td>
							<input name="shippingCost" type="text" value="<?php echo esc_html($shippingCost); ?>" class="regular-text" placeholder="<?php esc_html_e('Shipping', 'usces'); //送料 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cashOnDelivery"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('COD fee', 'usces'); //代引手数料 ?></label></th>
						<td>
							<input name="cashOnDelivery" type="text" value="<?php echo esc_html($cashOnDelivery); ?>" class="regular-text" placeholder="<?php esc_html_e('COD fee', 'usces'); //代引手数料 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="inSalesTax"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Internal tax', 'usces'); //内消費税 ?></label></th>
						<td>
							<input name="inSalesTax" type="text" value="<?php echo esc_html($inSalesTax); ?>" class="regular-text" placeholder="<?php esc_html_e('Internal tax', 'usces'); //内消費税 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="salesTax"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Tax', 'usces'); //消費税 ?></label></th>
						<td>
							<input name="salesTax" type="text" value="<?php echo esc_html($salesTax); ?>" class="regular-text" placeholder="<?php esc_html_e('Tax', 'usces'); //消費税 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="totalAmount"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Total Amount', 'usces'); //総合計金額 ?></label></th>
						<td>
							<input name="totalAmount" type="text" value="<?php echo esc_html($totalAmount); ?>" class="regular-text" placeholder="<?php esc_html_e('Total Amount', 'usces'); //総合計金額 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="currentPoints"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('The current point', 'usces'); //現在のポイント ?></label></th>
						<td>
							<input name="currentPoints" type="text" value="<?php echo esc_html($currentPoints); ?>" class="regular-text" placeholder="<?php esc_html_e('The current point', 'usces'); //現在のポイント ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="pointUnits"><?php esc_html_e('Unit of membership points', 'text-changer-for-welcart'); //会員ポイントの単位 ?></label></th>
						<td>
							<input name="pointUnits" type="text" value="<?php echo esc_html($pointUnits); ?>" class="regular-text" placeholder="pt">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thEmail"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('e-mail adress', 'usces'); //メールアドレス ?></label></th>
						<td>
							<input name="thEmail" type="text" value="<?php echo esc_html($thEmail); ?>" class="regular-text" placeholder="<?php esc_html_e('e-mail adress', 'usces'); //メールアドレス ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thPassword"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Post Password', 'usces'); //パスワード ?></label></th>
						<td>
							<input name="thPassword" type="text" value="<?php echo esc_html($thPassword); ?>" class="regular-text" placeholder="<?php esc_html_e('password', 'usces'); //パスワード ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thName"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Full name', 'usces'); //お名前 ?></label></th>
						<td>
							<input name="thName" type="text" value="<?php echo esc_html($thName); ?>" class="regular-text" placeholder="<?php esc_html_e('Full name', 'usces'); //お名前 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tdFirstName"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Last Name', 'usces'); //姓 ?></label></th>
						<td>
							<input name="tdFirstName" type="text" value="<?php echo esc_html($tdFirstName); ?>" class="regular-text" placeholder="<?php esc_html_e('Last Name', 'usces'); //姓 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tdLastName"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('First Name', 'usces'); //名 ?></label></th>
						<td>
							<input name="tdLastName" type="text" value="<?php echo esc_html($tdLastName); ?>" class="regular-text" placeholder="<?php esc_html_e('First Name', 'usces'); //名 ?>">
						</td>
					</tr>
					<?php if(get_locale() == 'ja'): ?>
					<tr valign="top">
						<th scope="row"><label for="thFurigana"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('furigana', 'usces'); //フリガナ ?></label></th>
						<td>
							<input name="thFurigana" type="text" value="<?php echo esc_html($thFurigana); ?>" class="regular-text" placeholder="<?php esc_html_e('furigana', 'usces'); //フリガナ ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tdFirstNameFurigana"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Last Name', 'usces'); //姓 ?>（<?php esc_html_e('furigana', 'usces'); //フリガナ ?>）</label></th>
						<td>
							<input name="tdFirstNameFurigana" type="text" value="<?php echo esc_html($tdFirstNameFurigana); ?>" class="regular-text" placeholder="<?php esc_html_e('Last Name', 'usces'); //姓 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tdLastNameFurigana"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('First Name', 'usces'); //名 ?>（<?php esc_html_e('furigana', 'usces'); //フリガナ ?>）</label></th>
						<td>
							<input name="tdLastNameFurigana" type="text" value="<?php echo esc_html($tdLastNameFurigana); ?>" class="regular-text" placeholder="<?php esc_html_e('First Name', 'usces'); //名 ?>">
						</td>
					</tr>
					<?php endif; ?>
					<tr valign="top">
						<th scope="row"><label for="thZip"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Zip', 'usces'); //郵便番号 ?></label></th>
						<td>
							<input name="thZip" type="text" value="<?php echo esc_html($thZip); ?>" class="regular-text" placeholder="<?php esc_html_e('Zip', 'usces'); //郵便番号 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thCity"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Province', 'usces'); //都道府県 ?></label></th>
						<td>
							<input name="thCity" type="text" value="<?php echo esc_html($thCity); ?>" class="regular-text" placeholder="<?php esc_html_e('Province', 'usces'); //都道府県 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thAddress1"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('city', 'usces'); //市区郡町村 ?></label></th>
						<td>
							<input name="thAddress1" type="text" value="<?php echo esc_html($thAddress1); ?>" class="regular-text" placeholder="<?php esc_html_e('city', 'usces'); //市区郡町村 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thAddress2"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('numbers', 'usces'); //番地 ?></label></th>
						<td>
							<input name="thAddress2" type="text" value="<?php echo esc_html($thAddress2); ?>" class="regular-text" placeholder="<?php esc_html_e('numbers', 'usces'); //番地 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thAddress3"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('building name', 'usces'); //ビル名 ?></label></th>
						<td>
							<input name="thAddress3" type="text" value="<?php echo esc_html($thAddress3); ?>" class="regular-text" placeholder="<?php esc_html_e('building name', 'usces'); //ビル名 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thPhoneNum"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Phone number', 'usces'); //電話番号 ?></label></th>
						<td>
							<input name="thPhoneNum" type="text" value="<?php echo esc_html($thPhoneNum); ?>" class="regular-text" placeholder="<?php esc_html_e('Phone number', 'usces'); //電話番号 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="thFaxNum"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('FAX number', 'usces'); //FAX番号 ?></label></th>
						<td>
							<input name="thFaxNum" type="text" value="<?php echo esc_html($thFaxNum); ?>" class="regular-text" placeholder="<?php esc_html_e('FAX number', 'usces'); //FAX番号 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="requiredMark"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：<?php esc_html_e('Required mark', 'text-changer-for-welcart'); //必須マーク ?></label></th>
						<td>
							<input name="requiredMark" type="text" value="<?php echo esc_html($requiredMark); ?>" class="regular-text" placeholder="<?php esc_html_e('*', 'usces'); //＊ ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="addressSearch"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：「<?php esc_html_e('Address search', 'text-changer-for-welcart'); //住所検索 ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="addressSearch" type="text" value="<?php echo esc_html($addressSearch); ?>" class="regular-text" placeholder="<?php esc_html_e('Address search', 'text-changer-for-welcart'); //住所検索 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="zipExample"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：<?php esc_html_e('Example of Zip code entry', 'text-changer-for-welcart'); //郵便番号入力例 ?></label></th>
						<td>
							<input name="zipExample" type="text" value="<?php echo esc_html($zipExample); ?>" class="regular-text" placeholder="100-1000">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="addressExample1"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：<?php esc_html_e('Example of Address entry', 'text-changer-for-welcart'); //住所入力例 ?>（<?php esc_html_e('city', 'usces'); //市区郡町村 ?>）</label></th>
						<td>
							<input name="addressExample1" type="text" value="<?php echo esc_html($addressExample1); ?>" class="regular-text" placeholder="<?php esc_html_e('Kitakami Yokohama', 'usces'); //横浜市上北町 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="addressExample2"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：<?php esc_html_e('Example of Address entry', 'text-changer-for-welcart'); //住所入力例 ?>（<?php esc_html_e('numbers', 'usces'); //番地 ?>）</label></th>
						<td>
							<input name="addressExample2" type="text" value="<?php echo esc_html($addressExample2); ?>" class="regular-text" placeholder="3-24-555">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="addressExample3"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：<?php esc_html_e('Example of Address entry', 'text-changer-for-welcart'); //住所入力例 ?>（<?php esc_html_e('building name', 'usces'); //ビル名 ?>）</label></th>
						<td>
							<input name="addressExample3" type="text" value="<?php echo esc_html($addressExample3); ?>" class="regular-text" placeholder="<?php esc_html_e('tuhanbuild 4F', 'usces'); //通販ビル4F ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="phoneNumExample"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：<?php esc_html_e('Example of Phone number entry', 'text-changer-for-welcart'); //電話番号入力例 ?></label></th>
						<td>
							<input name="phoneNumExample" type="text" value="<?php echo esc_html($phoneNumExample); ?>" class="regular-text" placeholder="1000-10-1000">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="faxNumExample"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：<?php esc_html_e('Example of Fax number entry', 'text-changer-for-welcart'); //FAX番号入力例 ?></label></th>
						<td>
							<input name="faxNumExample" type="text" value="<?php echo esc_html($faxNumExample); ?>" class="regular-text" placeholder="1000-10-1000">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="backToTopPage">「<?php esc_html_e('Back to the top page.', 'usces'); //トップページへ戻る ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="backToTopPage" type="text" value="<?php echo esc_html($backToTopPage); ?>" class="regular-text" placeholder="<?php esc_html_e('Back to the top page.', 'usces'); //トップページへ戻る ?>">
						</td>
					</tr>
				</table>
			</div>
			<input type="hidden" name="submit_settings" id="submit_settings" value="<?php esc_html_e('Cart & Member text settings', 'text-changer-for-welcart'); //カート・メンバー共通テキストの設定 ?>">
			<p class="submit">
				<input type="submit" name="submit_settings_data_1" id="submit_settings_data_1" class="button-primary" value="<?php esc_html_e('Save the settings', 'text-changer-for-welcart'); //設定を保存 ?>">
			</p>
		</form>
	</div>

	<?php /* カート */ ?>
	<div id="settings2" class="tab_content">
		<form class="settingsForm2" method="post" action="admin.php?page=tcw_function_settings">
			<?php wp_nonce_field('tcw_settings_nonce'); //Nonceフィールド ?>
			<div class="tcwGrayBackground">
				<h3><?php esc_html_e('Common cart page', 'text-changer-for-welcart'); //カート共通 ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="navCart"><?php esc_html_e('Page navigation', 'text-changer-for-welcart'); //ページナビ ?>：<?php esc_html_e('1.Cart', 'usces'); //カート ?></label></th>
						<td>
							<input name="navCart" type="text" value="<?php echo esc_html($navCart); ?>" class="regular-text" placeholder="<?php esc_html_e('Cart', 'usces'); //カート ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="navCustomer"><?php esc_html_e('Page navigation', 'text-changer-for-welcart'); //ページナビ ?>：<?php esc_html_e('2.Customer Info', 'usces'); //お客様情報 ?></label></th>
						<td>
							<input name="navCustomer" type="text" value="<?php echo esc_html($navCustomer); ?>" class="regular-text" placeholder="<?php esc_html_e('2.Customer Info', 'usces'); //お客様情報 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="navDelivery"><?php esc_html_e('Page navigation', 'text-changer-for-welcart'); //ページナビ ?>：<?php esc_html_e('3.Deli. & Pay.', 'usces'); //発送・支払方法 ?></label></th>
						<td>
							<input name="navDelivery" type="text" value="<?php echo esc_html($navDelivery); ?>" class="regular-text" placeholder="<?php esc_html_e('3.Deli. & Pay.', 'usces'); //発送・支払方法 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="navConfirm"><?php esc_html_e('Page navigation', 'text-changer-for-welcart'); //ページナビ ?>：<?php esc_html_e('4.Confirm', 'usces'); //内容確認 ?></label></th>
						<td>
							<input name="navConfirm" type="text" value="<?php echo esc_html($navConfirm); ?>" class="regular-text" placeholder="<?php esc_html_e('4.Confirm', 'usces'); //内容確認 ?>">
						</td>
					</tr>
				</table>
				<h3><?php esc_html_e('In the cart', 'usces'); //カートの中 ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="titleCart"><?php esc_html_e('Title & Heading', 'text-changer-for-welcart'); //タイトル＆見出し ?>：<?php esc_html_e('In the cart', 'usces'); //カートの中 ?></label></th>
						<td>
							<input name="titleCart" type="text" value="<?php echo esc_html($titleCart); ?>" class="regular-text" placeholder="<?php esc_html_e('In the cart', 'usces'); //カートの中 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cartNocart"><?php esc_html_e('Text when cart is empty', 'text-changer-for-welcart'); //カートが空の場合の文章 ?></label></th>
						<td>
							<textarea name="cartNocart" class="regular-text" placeholder="<?php esc_html_e('There are no items in your cart.', 'usces'); //只今、カートに商品はございません。 ?>"><?php echo esc_html($cartNocart); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cartUpButtonMessage"><?php esc_html_e('Text about the Update button', 'text-changer-for-welcart'); //更新ボタンに関する文章 ?></label></th>
						<td>
							<textarea name="cartUpButtonMessage" class="regular-text" placeholder="<?php esc_html_e('Press the `update` button when you change the amount of items.', 'usces'); //数量を変更した場合は必ず更新ボタンを押してください。 ?>"><?php echo esc_html($cartUpButtonMessage); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cartUpButton">「<?php esc_html_e('Quantity renewal', 'usces'); //数量更新 ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="cartUpButton" type="text" value="<?php echo esc_html($cartUpButton); ?>" class="regular-text" placeholder="<?php esc_html_e('Quantity renewal', 'usces'); //数量更新 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cartDeleteButton">「<?php esc_html_e('Delete', 'usces'); //削除 ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="cartDeleteButton" type="text" value="<?php echo esc_html($cartDeleteButton); ?>" class="regular-text" placeholder="<?php esc_html_e('Delete', 'usces'); //削除 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cartCurrencyCode"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Currency', 'usces'); //通貨 ?></label></th>
						<td>
							<input name="cartCurrencyCode" type="text" value="<?php echo esc_html($cartCurrencyCode); ?>" class="regular-text" placeholder="<?php esc_html_e('Currency', 'usces'); //通貨 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cartBusinessPackageDiscountMessage"><?php esc_html_e('Text about Business package discount', 'text-changer-for-welcart'); //業務パック割引に関する文章 ?></label></th>
						<td>
							<textarea name="cartBusinessPackageDiscountMessage" class="regular-text" placeholder="<?php esc_html_e('The price with this mark applys to Business pack discount.', 'usces'); //このマークがある価格は業務パック割引が適用されています。 ?>"><?php echo esc_html($cartBusinessPackageDiscountMessage); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cartContinueShoppingButton">「<?php esc_html_e('continue shopping', 'usces'); //買い物を続ける ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="cartContinueShoppingButton" type="text" value="<?php echo esc_html($cartContinueShoppingButton); ?>" class="regular-text" placeholder="<?php esc_html_e('continue shopping', 'usces'); //買い物を続ける ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cartToCustomerInfoButton">「<?php esc_html_e('Next', 'usces'); //次へ ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="cartToCustomerInfoButton" type="text" value="<?php echo esc_html($cartToCustomerInfoButton); ?>" class="regular-text" placeholder="<?php esc_html_e(' Next ', 'usces'); //次へ ?>">
						</td>
					</tr>
				</table>
				<h3><?php esc_html_e('Customer Information', 'usces'); //お客様情報 ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="titleCustomer"><?php esc_html_e('Title & Heading', 'text-changer-for-welcart'); //タイトル＆見出し ?>：<?php esc_html_e('Customer Information', 'usces'); //お客様情報 ?></label></th>
						<td>
							<input name="titleCustomer" type="text" value="<?php echo esc_html($titleCustomer); ?>" class="regular-text" placeholder="<?php esc_html_e('Customer Information', 'usces'); //お客様情報 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="customerMemberForm"><?php esc_html_e('Form title', 'text-changer-for-welcart'); //フォームタイトル ?>：<?php esc_html_e('Members', 'text-changer-for-welcart'); //会員の方 ?></label></th>
						<td>
							<input name="customerMemberForm" type="text" value="<?php echo esc_html($customerMemberForm); ?>" class="regular-text" placeholder="<?php esc_html_e('The member please enter at here.', 'usces'); //会員の方はこちら▼ ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="customerToMemberLoginButton">「<?php esc_html_e('Next', 'usces'); //次へ ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?>（<?php esc_html_e('Members', 'text-changer-for-welcart'); //会員の方 ?>）</label></th>
						<td>
							<input name="customerToMemberLoginButton" type="text" value="<?php echo esc_html($customerToMemberLoginButton); ?>" class="regular-text" placeholder="<?php esc_html_e(' Next ', 'usces'); //次へ ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="customerGuestForm"><?php esc_html_e('Form title', 'text-changer-for-welcart'); //フォームタイトル ?>：<?php esc_html_e('Non-members', 'text-changer-for-welcart'); //会員ではない方 ?></label></th>
						<td>
							<input name="customerGuestForm" type="text" value="<?php echo esc_html($customerGuestForm); ?>" class="regular-text" placeholder="<?php esc_html_e('The nonmember please enter at here.', 'usces'); //会員ではない方はこちら▼ ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="customerPasswordMessage"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：<?php esc_html_e('Text about Password', 'text-changer-for-welcart'); //パスワードに関する文章 ?></label></th>
						<td>
							<textarea name="customerPasswordMessage" class="regular-text" placeholder="<?php esc_html_e('When you enroll newly, please fill it out.', 'usces'); //新規会員登録する場合にご記入ください。 ?>"><?php echo esc_html($customerPasswordMessage); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="customerBackCartButton">「<?php esc_html_e('Back', 'usces'); //戻る ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="customerBackCartButton" type="text" value="<?php echo esc_html($customerBackCartButton); ?>" class="regular-text" placeholder="<?php esc_html_e('Back', 'usces'); //戻る ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="customerToDeliveryInfoButton">「<?php esc_html_e('Next', 'usces'); //次へ ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?>（<?php esc_html_e('Non-members', 'text-changer-for-welcart'); //会員ではない方 ?>）</label></th>
						<td>
							<input name="customerToDeliveryInfoButton" type="text" value="<?php echo esc_html($customerToDeliveryInfoButton); ?>" class="regular-text" placeholder="<?php esc_html_e(' Next ', 'usces'); //次へ ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="customerToRegandDeliveryInfoButton">「<?php esc_html_e('To the next while enrolling', 'usces'); //会員登録しながら次へ ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="customerToRegandDeliveryInfoButton" type="text" value="<?php echo esc_html($customerToRegandDeliveryInfoButton); ?>" class="regular-text" placeholder="<?php esc_html_e('To the next while enrolling', 'usces'); //会員登録しながら次へ ?>">
						</td>
					</tr>
				</table>
				<h3><?php esc_html_e('Shipping / Payment options', 'usces'); //発送・支払方法 ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="titleDelivery"><?php esc_html_e('Title & Heading', 'text-changer-for-welcart'); //タイトル＆見出し ?>：<?php esc_html_e('Shipping / Payment options', 'usces'); //発送・支払方法 ?></label></th>
						<td>
							<input name="titleDelivery" type="text" value="<?php echo esc_html($titleDelivery); ?>" class="regular-text" placeholder="<?php esc_html_e('Shipping / Payment options', 'usces'); //発送・支払方法 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryFlag1"><?php esc_html_e('Form options', 'text-changer-for-welcart'); //フォーム選択肢 ?>：<?php esc_html_e('same as customer information', 'usces'); //お客様情報と同じ ?></label></th>
						<td>
							<input name="deliveryFlag1" type="text" value="<?php echo esc_html($deliveryFlag1); ?>" class="regular-text" placeholder="<?php esc_html_e('same as customer information', 'usces'); //お客様情報と同じ ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryFlag2"><?php esc_html_e('Form options', 'text-changer-for-welcart'); //フォーム選択肢 ?>：<?php esc_html_e('Chose another shipping address.', 'usces'); //別の発送先を指定する ?></label></th>
						<td>
							<input name="deliveryFlag2" type="text" value="<?php echo esc_html($deliveryFlag2); ?>" class="regular-text" placeholder="<?php esc_html_e('Chose another shipping address.', 'usces'); //別の発送先を指定する ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryShippingAddress"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('shipping address', 'usces'); //発送先 ?></label></th>
						<td>
							<input name="deliveryShippingAddress" type="text" value="<?php echo esc_html($deliveryShippingAddress); ?>" class="regular-text" placeholder="<?php esc_html_e('shipping address', 'usces'); //発送先 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryShippingMethod"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('shipping option', 'usces'); //配送方法 ?></label></th>
						<td>
							<input name="deliveryShippingMethod" type="text" value="<?php echo esc_html($deliveryShippingMethod); ?>" class="regular-text" placeholder="<?php esc_html_e('shipping option', 'usces'); //配送方法 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryPreferredDeliveryDate"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Delivery date', 'usces'); //配送希望日 ?></label></th>
						<td>
							<input name="deliveryPreferredDeliveryDate" type="text" value="<?php echo esc_html($deliveryPreferredDeliveryDate); ?>" class="regular-text" placeholder="<?php esc_html_e('Delivery date', 'usces'); //配送希望日 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryPreferredDeliveryTime"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Delivery Time', 'usces'); //配送希望時間 ?></label></th>
						<td>
							<input name="deliveryPreferredDeliveryTime" type="text" value="<?php echo esc_html($deliveryPreferredDeliveryTime); ?>" class="regular-text" placeholder="<?php esc_html_e('Delivery Time', 'usces'); //配送希望時間 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryPaymentMethod"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('payment method', 'usces'); //支払方法 ?></label></th>
						<td>
							<input name="deliveryPaymentMethod" type="text" value="<?php echo esc_html($deliveryPaymentMethod); ?>" class="regular-text" placeholder="<?php esc_html_e('payment method', 'usces'); //支払方法 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryRemarks"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Notes', 'usces'); //備考 ?></label></th>
						<td>
							<input name="deliveryRemarks" type="text" value="<?php echo esc_html($deliveryRemarks); ?>" class="regular-text" placeholder="<?php esc_html_e('Notes', 'usces'); //備考 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryBackToCustomerButton">「<?php esc_html_e('Back', 'usces'); //戻る ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="deliveryBackToCustomerButton" type="text" value="<?php echo esc_html($deliveryBackToCustomerButton); ?>" class="regular-text" placeholder="<?php esc_html_e('Back', 'usces'); //戻る ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="deliveryToConfirmButton">「<?php esc_html_e('Next', 'usces'); //次へ ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="deliveryToConfirmButton" type="text" value="<?php echo esc_html($deliveryToConfirmButton); ?>" class="regular-text" placeholder="<?php esc_html_e(' Next ', 'usces'); //次へ ?>">
						</td>
					</tr>
				</table>
				<h3><?php esc_html_e('Confirmation', 'usces'); //内容確認 ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="titleConfirm"><?php esc_html_e('Title & Heading', 'text-changer-for-welcart'); //タイトル＆見出し ?>：<?php esc_html_e('Confirmation', 'usces'); //内容確認 ?></label></th>
						<td>
							<input name="titleConfirm" type="text" value="<?php echo esc_html($titleConfirm); ?>" class="regular-text" placeholder="<?php esc_html_e('Confirmation', 'usces'); //内容確認 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmAttentionMessage"><?php esc_html_e('Note on content changes', 'text-changer-for-welcart'); //内容変更に関する注意文章 ?></label></th>
						<td>
							<textarea name="confirmAttentionMessage" class="regular-text" placeholder="<?php esc_html_e('Please do not change product addition and amount of it with the other window with displaying this page.', 'usces'); //※このページを表示したまま、別ウィンドウで商品追加や数量変更は行わないでください。 ?>"><?php echo esc_html($confirmAttentionMessage); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmPointsToUse"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Points you are using here', 'usces'); //利用するポイント ?></label></th>
						<td>
							<input name="confirmPointsToUse" type="text" value="<?php echo esc_html($confirmPointsToUse); ?>" class="regular-text" placeholder="<?php esc_html_e('Points you are using here', 'usces'); //利用するポイント ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmRusePointsButton">「<?php esc_html_e('Use the points', 'usces'); //ポイントを使用する ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="confirmRusePointsButton" type="text" value="<?php echo esc_html($confirmRusePointsButton); ?>" class="regular-text" placeholder="<?php esc_html_e('Use the points', 'usces'); //ポイントを使用する ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmTableHeadTitle1"><?php esc_html_e('Table heading', 'text-changer-for-welcart'); //テーブル見出し ?>：<?php esc_html_e('Customer Information', 'usces'); //お客様情報 ?></label></th>
						<td>
							<input name="confirmTableHeadTitle1" type="text" value="<?php echo esc_html($confirmTableHeadTitle1); ?>" class="regular-text" placeholder="<?php esc_html_e('Customer Information', 'usces'); //お客様情報 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmTableHeadTitle2"><?php esc_html_e('Table heading', 'text-changer-for-welcart'); //テーブル見出し ?>：<?php esc_html_e('Shipping address information', 'usces'); //配送先情報 ?></label></th>
						<td>
							<input name="confirmTableHeadTitle2" type="text" value="<?php echo esc_html($confirmTableHeadTitle2); ?>" class="regular-text" placeholder="<?php esc_html_e('Shipping address information', 'usces'); //配送先情報 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmTableHeadTitle3"><?php esc_html_e('Table heading', 'text-changer-for-welcart'); //テーブル見出し ?>：<?php esc_html_e('Others', 'usces'); //その他 ?></label></th>
						<td>
							<input name="confirmTableHeadTitle3" type="text" value="<?php echo esc_html($confirmTableHeadTitle3); ?>" class="regular-text" placeholder="<?php esc_html_e('Others', 'usces'); //その他 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmReturnToDelivery">「<?php esc_html_e('Back to payment method page.', 'usces'); //お届けお支払方法入力に戻る ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="confirmReturnToDelivery" type="text" value="<?php echo esc_html($confirmReturnToDelivery); ?>" class="regular-text" placeholder="<?php esc_html_e('Back to payment method page.', 'usces'); //お届けお支払方法入力に戻る ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmOrderButton">「<?php esc_html_e('Checkout', 'usces'); //上記内容で注文する ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="confirmOrderButton" type="text" value="<?php echo esc_html($confirmOrderButton); ?>" class="regular-text" placeholder="<?php esc_html_e('Checkout', 'usces'); //上記内容で注文する ?>">
						</td>
					</tr>
				</table>
				<h3><?php esc_html_e('Completion', 'usces'); //完了 ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="titleCompletion"><?php esc_html_e('Title', 'text-changer-for-welcart'); //タイトル ?>：<?php esc_html_e('Order Complete', 'usces'); //注文完了 ?></label></th>
						<td>
							<input name="titleCompletion" type="text" value="<?php echo esc_html($titleCompletion); ?>" class="regular-text" placeholder="<?php esc_html_e('Order Complete', 'usces'); //注文完了 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="headTitleCompletion"><?php esc_html_e('Heading', 'text-changer-for-welcart'); //見出し ?>：<?php esc_html_e('Completion', 'usces'); //完了 ?></label></th>
						<td>
							<input name="headTitleCompletion" type="text" value="<?php echo esc_html($headTitleCompletion); ?>" class="regular-text" placeholder="<?php esc_html_e('Completion', 'usces'); //完了 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="completionHeadMessage"><?php esc_html_e('Order completion heading text', 'text-changer-for-welcart'); //注文完了の見出し文章 ?></label></th>
						<td>
							<textarea name="completionHeadMessage" class="regular-text" placeholder="<?php esc_html_e('It has been sent succesfully.', 'usces'); //送信が完了しました ?>"><?php echo esc_html($completionHeadMessage); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="completionMessage"><?php esc_html_e('Order completion text', 'text-changer-for-welcart'); //注文完了の文章 ?></label></th>
						<td>
							<textarea name="completionMessage" class="regular-text" placeholder="<?php esc_html_e('Thank you for shopping.', 'usces');esc_html_e("If you have any questions, please contact us by 'Contact'.", 'usces'); //お買い上げありがとうございました。ご不明な点などがございましたら、お問合せよりご連絡ください。 ?>"><?php echo esc_html($completionMessage); ?></textarea>
						</td>
					</tr>
				</table>
			</div>
			<input type="hidden" name="submit_settings" id="submit_settings" value="<?php esc_html_e('Cart text settings', 'text-changer-for-welcart'); //カートテキストの設定 ?>">
			<p class="submit">
				<input type="submit" name="submit_settings_data_2" id="submit_settings_data_2" class="button-primary" value="<?php esc_html_e('Save the settings', 'text-changer-for-welcart'); //設定を保存 ?>">
			</p>
		</form>
	</div>

	<?php /* メンバー */ ?>
	<div id="settings3" class="tab_content">
		<form class="settingsForm3" method="post" action="admin.php?page=tcw_function_settings">
			<?php wp_nonce_field('tcw_settings_nonce'); //Nonceフィールド ?>
			<div class="tcwGrayBackground">
				<h3><?php esc_html_e('Common member page', 'text-changer-for-welcart'); //メンバー共通 ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="memberLogin">「<?php esc_html_e('Log-in', 'usces'); //ログイン ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="memberLogin" type="text" value="<?php echo esc_html($memberLogin); ?>" class="regular-text" placeholder="<?php esc_html_e('Log-in', 'usces'); //ログイン ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="memberLogout">「<?php esc_html_e('Log out', 'usces'); //ログアウト ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="memberLogout" type="text" value="<?php echo esc_html($memberLogout); ?>" class="regular-text" placeholder="<?php esc_html_e('Log out', 'usces'); //ログアウト ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="getNewPasswordMessage"><?php esc_html_e('Text about Password change', 'text-changer-for-welcart'); //パスワード変更に関する文章 ?></label></th>
						<td>
							<textarea name="getNewPasswordMessage" class="regular-text" placeholder="<?php esc_html_e('Change your password by following the instruction in this mail.', 'usces'); //メールの内容にしたがってパスワードを変更してください。 ?>"><?php echo esc_html($getNewPasswordMessage); ?></textarea>
						</td>
					</tr>
				</table>
				<h3><?php esc_html_e('My page', 'text-changer-for-welcart'); //マイページ ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="titleMember"><?php esc_html_e('Title', 'text-changer-for-welcart'); //タイトル ?>：<?php esc_html_e('Membership information', 'usces'); //会員情報 ?></label></th>
						<td>
							<input name="titleMember" type="text" value="<?php echo esc_html($titleMember); ?>" class="regular-text" placeholder="<?php esc_html_e('Membership information', 'usces'); //会員情報 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="headTitleMember"><?php esc_html_e('Heading', 'text-changer-for-welcart'); //見出し ?>：<?php esc_html_e('My page', 'text-changer-for-welcart'); //マイページ ?></label></th>
						<td>
							<input name="headTitleMember" type="text" value="<?php echo esc_html($headTitleMember); ?>" class="regular-text" placeholder="<?php esc_html_e('My page', 'text-changer-for-welcart'); //マイページ ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="memberNum"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('member number', 'usces'); //会員番号 ?></label></th>
						<td>
							<input name="memberNum" type="text" value="<?php echo esc_html($memberNum); ?>" class="regular-text" placeholder="<?php esc_html_e('member number', 'usces'); //会員番号 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="membershipDate"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Strated date', 'usces'); //入会日 ?></label></th>
						<td>
							<input name="membershipDate" type="text" value="<?php echo esc_html($membershipDate); ?>" class="regular-text" placeholder="<?php esc_html_e('Strated date', 'usces'); //入会日 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="toEditMemberInformation">「<?php esc_html_e('Member information editing', 'usces'); //会員情報編集 ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="toEditMemberInformation" type="text" value="<?php echo esc_html($toEditMemberInformation); ?>" class="regular-text" placeholder="<?php esc_html_e('To member information editing', 'usces'); //会員情報編集へ 》 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="purchaseHistory"><?php esc_html_e('Heading', 'text-changer-for-welcart'); //見出し ?>：<?php esc_html_e('Purchase history', 'usces'); //購入履歴 ?></label></th>
						<td>
							<input name="purchaseHistory" type="text" value="<?php echo esc_html($purchaseHistory); ?>" class="regular-text" placeholder="<?php esc_html_e('Purchase history', 'usces'); //購入履歴 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="excludeCancel"><?php esc_html_e('Exclude cancellations', 'usces'); //キャンセルを除外 ?></label></th>
						<td>
							<input name="excludeCancel" type="text" value="<?php echo esc_html($excludeCancel); ?>" class="regular-text" placeholder="<?php esc_html_e('Exclude cancellations', 'usces'); //キャンセルを除外 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="historyPeriod"><?php esc_html_e('Period', 'usces'); //期間 ?></label></th>
						<td>
							<input name="historyPeriod" type="text" value="<?php echo esc_html($historyPeriod); ?>" class="regular-text" placeholder="<?php esc_html_e('Period', 'usces'); //期間 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="orderNum"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Order number', 'usces'); //注文番号 ?></label></th>
						<td>
							<input name="orderNum" type="text" value="<?php echo esc_html($orderNum); ?>" class="regular-text" placeholder="<?php esc_html_e('Order number', 'usces'); //注文番号 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="purchaseDate"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Purchase date', 'usces'); //購入日 ?></label></th>
						<td>
							<input name="purchaseDate" type="text" value="<?php echo esc_html($purchaseDate); ?>" class="regular-text" placeholder="<?php esc_html_e('Purchase date', 'usces'); //購入日 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="responseStatus"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Processing status', 'usces'); //対応状況 ?></label></th>
						<td>
							<input name="responseStatus" type="text" value="<?php echo esc_html($responseStatus); ?>" class="regular-text" placeholder="<?php esc_html_e('Processing status', 'usces'); //対応状況 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="paymentStatus"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('transfer statement', 'usces'); //入金状況 ?></label></th>
						<td>
							<input name="paymentStatus" type="text" value="<?php echo esc_html($paymentStatus); ?>" class="regular-text" placeholder="<?php esc_html_e('transfer statement', 'usces'); //入金状況 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="purchaseAmount"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Purchase price', 'usces'); //購入金額 ?></label></th>
						<td>
							<input name="purchaseAmount" type="text" value="<?php echo esc_html($purchaseAmount); ?>" class="regular-text" placeholder="<?php esc_html_e('Purchase price', 'usces'); //購入金額 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="discount"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Discount', 'usces'); //値引き ?></label></th>
						<td>
							<input name="discount" type="text" value="<?php echo esc_html($discount); ?>" class="regular-text" placeholder="<?php esc_html_e('Discount', 'usces'); //値引き ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="usedPoints"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Used points', 'usces'); //使用ポイント ?></label></th>
						<td>
							<input name="usedPoints" type="text" value="<?php echo esc_html($usedPoints); ?>" class="regular-text" placeholder="<?php esc_html_e('Used points', 'usces'); //使用ポイント ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="getPoints"><?php esc_html_e('Subject Name', 'text-changer-for-welcart'); //項目名 ?>：<?php esc_html_e('Acquired points', 'usces'); //獲得ポイント ?></label></th>
						<td>
							<input name="getPoints" type="text" value="<?php echo esc_html($getPoints); ?>" class="regular-text" placeholder="<?php esc_html_e('Acquired points', 'usces'); //獲得ポイント ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="editMemberInformation"><?php esc_html_e('Heading', 'text-changer-for-welcart'); //見出し ?>：<?php esc_html_e('Member information editing', 'usces'); //会員情報編集 ?></label></th>
						<td>
							<input name="editMemberInformation" type="text" value="<?php echo esc_html($editMemberInformation); ?>" class="regular-text" placeholder="<?php esc_html_e('Member information editing', 'usces'); //会員情報編集 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="noChangeMemberInformation"><?php esc_html_e('Form', 'text-changer-for-welcart'); //フォーム ?>：<?php esc_html_e('Text about Password', 'text-changer-for-welcart'); //パスワードに関する文章 ?></label></th>
						<td>
							<textarea name="noChangeMemberInformation" class="regular-text" placeholder="<?php esc_html_e('Leave it blank in case of no change.', 'usces'); //※変更しない場合は空白 ?>"><?php echo esc_html($noChangeMemberInformation); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="updateMemberInformation">「<?php esc_html_e('update it', 'usces'); //更新する ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="updateMemberInformation" type="text" value="<?php echo esc_html($updateMemberInformation); ?>" class="regular-text" placeholder="<?php esc_html_e('update it', 'usces'); //更新する ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cancelMembership">「<?php esc_html_e('delete it', 'usces'); //退会する ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="cancelMembership" type="text" value="<?php echo esc_html($cancelMembership); ?>" class="regular-text" placeholder="<?php esc_html_e('delete it', 'usces'); //退会する ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmDeleteMemberInformation"><?php esc_html_e('Confirmation alert text when canceling membership', 'text-changer-for-welcart'); //退会時の確認アラート文章 ?></label></th>
						<td>
							<textarea name="confirmDeleteMemberInformation" class="regular-text" placeholder="<?php esc_html_e('All information about the member is deleted. Are you all right?', 'usces'); //会員に関する全ての情報が削除されます。よろしいですか？ ?>"><?php echo esc_html($confirmDeleteMemberInformation); ?></textarea>
						</td>
					</tr>
				</table>
				<h3><?php esc_html_e('Log-in', 'usces'); //ログイン ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="titleLogin"><?php esc_html_e('Title & Heading', 'text-changer-for-welcart'); //タイトル＆見出し ?>：<?php esc_html_e('Log-in for members', 'usces'); //会員ログイン ?></label></th>
						<td>
							<input name="titleLogin" type="text" value="<?php echo esc_html($titleLogin); ?>" class="regular-text" placeholder="<?php esc_html_e('Log-in for members', 'usces'); //会員ログイン ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="rememberLoginInformation"><?php esc_html_e('Checkbox', 'text-changer-for-welcart'); //チェック ?>：<?php esc_html_e('memorize login information', 'usces'); //ログイン情報を記憶 ?></label></th>
						<td>
							<input name="rememberLoginInformation" type="text" value="<?php echo esc_html($rememberLoginInformation); ?>" class="regular-text" placeholder="<?php esc_html_e('memorize login information', 'usces'); //ログイン情報を記憶 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="forgotPassword"><?php esc_html_e('Link', 'text-changer-for-welcart'); //リンク ?>：<?php esc_html_e('Forgotten your password', 'text-changer-for-welcart'); //パスワードをお忘れの方 ?></label></th>
						<td>
							<input name="forgotPassword" type="text" value="<?php echo esc_html($forgotPassword); ?>" class="regular-text" placeholder="<?php esc_html_e('Did you forget your password?', 'usces'); //パスワードをお忘れですか？ ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="notRegisteredMember"><?php esc_html_e('Heading', 'text-changer-for-welcart'); //見出し ?>：<?php esc_html_e('Customers who are not member registration', 'text-changer-for-welcart'); //会員登録されていないお客様 ?></label></th>
						<td>
							<input name="notRegisteredMember" type="text" value="<?php echo esc_html($notRegisteredMember); ?>" class="regular-text" placeholder="<?php esc_html_e('Customers who are not member registration', 'text-changer-for-welcart'); //会員登録されていないお客様 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="newMemberHere">「<?php esc_html_e('New enrollment for membership.', 'usces'); //新規ご入会はこちら ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="newMemberHere" type="text" value="<?php echo esc_html($newMemberHere); ?>" class="regular-text" placeholder="<?php esc_html_e('New enrollment for membership.', 'usces'); //新規ご入会はこちら ?>">
						</td>
					</tr>
				</table>
				<h3><?php esc_html_e('New enrollment form', 'usces'); //新規入会フォーム ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="titleNewMembershipForm"><?php esc_html_e('Title & Heading', 'text-changer-for-welcart'); //タイトル＆見出し ?>：<?php esc_html_e('New enrollment form', 'usces'); //新規入会フォーム ?></label></th>
						<td>
							<input name="titleNewMembershipForm" type="text" value="<?php echo esc_html($titleNewMembershipForm); ?>" class="regular-text" placeholder="<?php esc_html_e('New enrollment form', 'usces'); //新規入会フォーム ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="newMembershipFormMessage1"><?php esc_html_e('Text about New membership', 'text-changer-for-welcart'); //新規入会に関する文章 ?>：<?php esc_html_e('1st line', 'text-changer-for-welcart'); //1行目 ?></label></th>
						<td>
							<textarea name="newMembershipFormMessage1" class="regular-text" placeholder="<?php esc_html_e('All your personal information  will be protected and handled with carefull attention.', 'usces'); //この新規入会フォームより送信いただく、個人情報の取り扱いにつきましては細心の注意を払っております。 ?>"><?php echo esc_html($newMembershipFormMessage1); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="newMembershipFormMessage2"><?php esc_html_e('Text about New membership', 'text-changer-for-welcart'); //新規入会に関する文章 ?>：<?php esc_html_e('2nd line', 'text-changer-for-welcart'); //2行目 ?></label></th>
						<td>
							<textarea name="newMembershipFormMessage2" class="regular-text" placeholder="<?php esc_html_e('Your information is entrusted to us for the purpose of providing information and respond to your requests, but to be used for any other purpose. More information, please visit our Privacy  Notice.', 'usces'); //お預かりしたお客様の情報は本人様へのお問い合わせ内容についてのご返答や情報のご提供の目的であり、他の目的に使用することはございません。詳しくは「プライバシーポリシー」をご覧ください。 ?>"><?php echo esc_html($newMembershipFormMessage2); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="newMembershipFormMessage3"><?php esc_html_e('Text about New membership', 'text-changer-for-welcart'); //新規入会に関する文章 ?>：<?php esc_html_e('3rd line', 'text-changer-for-welcart'); //3行目 ?></label></th>
						<td>
							<textarea name="newMembershipFormMessage3" class="regular-text" placeholder="<?php esc_html_e('The items marked with *, are mandatory. Please complete.', 'usces'); //*印の付いている項目は必須となっております。漏れなくご記入ください。 ?>"><?php echo esc_html($newMembershipFormMessage3); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="newMembershipFormMessage4"><?php esc_html_e('Text about New membership', 'text-changer-for-welcart'); //新規入会に関する文章 ?>：<?php esc_html_e('4th line', 'text-changer-for-welcart'); //4行目 ?></label></th>
						<td>
							<textarea name="newMembershipFormMessage4" class="regular-text" placeholder="<?php esc_html_e('Please use Alphanumeric characters for numbers.', 'usces'); //英数字は半角での記入をお願いいたします。 ?>"><?php echo esc_html($newMembershipFormMessage4); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="newMembershipSendButton">「<?php esc_html_e('Send', 'usces'); //送信する ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="newMembershipSendButton" type="text" value="<?php echo esc_html($newMembershipSendButton); ?>" class="regular-text" placeholder="<?php esc_html_e('Send', 'usces'); //送信する ?>">
						</td>
					</tr>
				</table>
				<h3><?php esc_html_e('Change password', 'usces'); //パスワード変更 ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="titleNewPassword"><?php esc_html_e('Title & Heading', 'text-changer-for-welcart'); //タイトル＆見出し ?>：<?php esc_html_e('The new password acquisition', 'usces'); //新パスワード取得 ?></label></th>
						<td>
							<input name="titleNewPassword" type="text" value="<?php echo esc_html($titleNewPassword); ?>" class="regular-text" placeholder="<?php esc_html_e('The new password acquisition', 'usces'); //新パスワード取得 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="getNewPassword">「<?php esc_html_e('Obtain new password', 'usces'); //新しいパスワードを取得 ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="getNewPassword" type="text" value="<?php echo esc_html($getNewPassword); ?>" class="regular-text" placeholder="<?php esc_html_e('Obtain new password', 'usces'); //新しいパスワードを取得 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="titleCompletionNewPassword"><?php esc_html_e('Title', 'text-changer-for-welcart'); //タイトル ?>：<?php esc_html_e('New password procedures for obtaining complete', 'usces'); //新パスワード取得手続き完了 ?></label></th>
						<td>
							<input name="titleCompletionNewPassword" type="text" value="<?php echo esc_html($titleCompletionNewPassword); ?>" class="regular-text" placeholder="<?php esc_html_e('New password procedures for obtaining complete', 'usces'); //新パスワード取得手続き完了 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="headTitleCompletionNewPassword"><?php esc_html_e('Heading', 'text-changer-for-welcart'); //見出し ?>：<?php esc_html_e('Completion', 'usces'); //完了 ?></label></th>
						<td>
							<input name="headTitleCompletionNewPassword" type="text" value="<?php echo esc_html($headTitleCompletionNewPassword); ?>" class="regular-text" placeholder="<?php esc_html_e('Completion', 'usces'); //完了 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="sendMailMessage"><?php esc_html_e('Text for Completion of sending mail', 'text-changer-for-welcart'); //メール送信完了の文章 ?></label></th>
						<td>
							<textarea name="sendMailMessage" class="regular-text" placeholder="<?php esc_html_e('I transmitted an email.', 'usces'); //メールを送信いたしました。 ?>"><?php echo esc_html($sendMailMessage); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="memberInformationHere">「<?php esc_html_e('to vist membership information page', 'usces'); //会員情報ページはこちら ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="memberInformationHere" type="text" value="<?php echo esc_html($memberInformationHere); ?>" class="regular-text" placeholder="<?php esc_html_e('to vist membership information page', 'usces'); //会員情報ページはこちら ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="titleChangePassword"><?php esc_html_e('Title & Heading', 'text-changer-for-welcart'); //タイトル＆見出し ?>：<?php esc_html_e('Change password', 'usces'); //パスワード変更 ?></label></th>
						<td>
							<input name="titleChangePassword" type="text" value="<?php echo esc_html($titleChangePassword); ?>" class="regular-text" placeholder="<?php esc_html_e('Change password', 'usces'); //パスワード変更 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="registrationNewePassword">「<?php esc_html_e('Register', 'usces'); //登録 ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="registrationNewePassword" type="text" value="<?php echo esc_html($registrationNewePassword); ?>" class="regular-text" placeholder="<?php esc_html_e('Register', 'usces'); //登録 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="changedPassword"><?php esc_html_e('Password change Completion text', 'text-changer-for-welcart'); //パスワード変更完了の文章 ?></label></th>
						<td>
							<textarea name="changedPassword" class="regular-text" placeholder="<?php esc_html_e('Password has been changed.', 'usces'); //パスワードを変更いたしました。 ?>"><?php echo esc_html($changedPassword); ?></textarea>
						</td>
					</tr>
				</table>
			</div>
			<input type="hidden" name="submit_settings" id="submit_settings" value="<?php esc_html_e('Member text settings', 'text-changer-for-welcart'); //メンバーテキストの設定 ?>">
			<p class="submit">
				<input type="submit" name="submit_settings_data_3" id="submit_settings_data_3" class="button-primary" value="<?php esc_html_e('Save the settings', 'text-changer-for-welcart'); //設定を保存 ?>">
			</p>
		</form>
	</div>

	<?php /* その他 */ ?>
	<div id="settings4" class="tab_content">
		<form class="settingsForm4" method="post" action="admin.php?page=tcw_function_settings">
			<?php wp_nonce_field('tcw_settings_nonce'); //Nonceフィールド ?>
			<div class="tcwGrayBackground">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="cartButton">「<?php esc_html_e('Add to Shopping Cart', 'usces'); //カートへ入れる ?>」<?php esc_html_e('button', 'text-changer-for-welcart'); //ボタン ?></label></th>
						<td>
							<input name="cartButton" type="text" value="<?php echo esc_html($cartButton); ?>" class="regular-text" placeholder="<?php esc_html_e('Add to Shopping Cart', 'usces'); //カートへ入れる ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="cartBusinessPackageDiscount"><?php esc_html_e('Discount Name', 'text-changer-for-welcart'); //割引名 ?>：<?php esc_html_e('Business package discount', 'usces'); //業務パック割引 ?></label></th>
						<td>
							<input name="cartBusinessPackageDiscount" type="text" value="<?php echo esc_html($cartBusinessPackageDiscount); ?>" class="regular-text" placeholder="<?php esc_html_e('Business package discount', 'usces'); //業務パック割引 ?>">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="confirmCampaign"><?php esc_html_e('Discount Name', 'text-changer-for-welcart'); //割引名 ?>：<?php esc_html_e('Campaign discount', 'usces'); //キャンペーン割引 ?></label></th>
						<td>
							<input name="confirmCampaign" type="text" value="<?php echo esc_html($confirmCampaign); ?>" class="regular-text" placeholder="<?php esc_html_e('Campaign discount', 'usces'); //キャンペーン割引 ?>">
						</td>
					</tr>
				</table>
			</div>
			<input type="hidden" name="submit_settings" id="submit_settings" value="<?php esc_html_e('Others text settings', 'text-changer-for-welcart'); //その他テキストの設定 ?>">
			<p class="submit">
				<input type="submit" name="submit_settings_data_4" id="submit_settings_data_4" class="button-primary" value="<?php esc_html_e('Save the settings', 'text-changer-for-welcart'); //設定を保存 ?>">
			</p>
		</form>
	</div>

	<?php /* その他のプラグイン・テーマ */ ?>
	<div id="settings5" class="tab_content">
		<div class="tcwGrayBackground overflowHidden marginBottom16">
			<h2 class="marginBottom24"><?php esc_html_e('Plugins', MAINICHI_WEB_THIS_PLUGIN_NAME_TCW); //プラグイン ?></h2>
			<div class="flex flexStartWrap colWrap">
				<?php text_changer_for_welcart_other_plugins_contents('echo'); ?>
			</div>
		</div>
		<div class="tcwGrayBackground overflowHidden marginBottom16">
			<h2 class="marginBottom24"><?php esc_html_e('Themes', MAINICHI_WEB_THIS_PLUGIN_NAME_TCW); //テーマ ?></h2>
			<div class="flex flexStartWrap colWrap">
				<?php text_changer_for_welcart_other_theme_contents('echo'); ?>
			</div>
		</div>
		<div class="tcwGrayBackground overflowHidden">
			<h2 class="marginBottom24"><?php esc_html_e('Service', MAINICHI_WEB_THIS_PLUGIN_NAME_TCW); //サービス ?></h2>
			<div class="flex flexStartWrap colWrap">
				<?php text_changer_for_welcart_other_service_contents('echo'); ?>
			</div>
		</div>
	</div>

	<form class="settingsClearForm" method="post" action="admin.php?page=tcw_function_settings">
		<p class="submit">
			<input type="submit" name="submit_all_settings_clear" id="submit_all_settings_clear" class="button" value="<?php esc_html_e('Clear all settings', 'text-changer-for-welcart'); //全設定をクリア ?>">
		</p>
	</form>

</section>

<script>
	/* 設定保存メッセージフェードアウト */
	jQuery(function($){
		setTimeout(function(){
			$(".saveMessage").fadeOut("600");
		},3000);
	});
</script>

<?php else: //Welcartが無効の場合 ?>
<section class="tcwSettingsSection">
	<div class="error"><p><?php echo sprintf(__('To use "Text Changer for Welcart", you need to add "<a href="%s" target="_blank" rel="noopener">Welcart e-Commerce</a>" should be enabled.', 'text-changer-for-welcart'), home_url('/wp-admin/plugin-install.php?tab=plugin-information&plugin=usc-e-shop')); //Text Changer for Welcartを利用するにはWelcart e-Commerceを有効化してください。 ?></p></div>
</section>
<?php endif; ?>
<script type="text/javascript">
	jQuery(function($) {
		$('#submit_all_settings_clear').click(function() {
			if(!confirm('<?php esc_html_e('Clear all settings, okay?', 'text-changer-for-welcart'); //全ての設定をクリアします、宜しいですか？ ?>')){
				return false;
			}
		});
	});
</script>