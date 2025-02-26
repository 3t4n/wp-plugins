<?php
//---------------------------------
// ユーザーが必要な権限を持つか確認
//---------------------------------
if (!current_user_can('manage_options')) {
  wp_die(__(esc_html__('You do not have permission for this page.', 'cart-session-time')));
}

//---------------------------------
// 初期化 変数定義
//---------------------------------
$time_name_d = 'time_name_d'; //オプション名の変数
$time_name_h = 'time_name_h'; //オプション名の変数
$time_name_m = 'time_name_m'; //オプション名の変数
$time_name_all = 'time_name_all';
$time_val_d = get_option($time_name_d); //既に保存してある値があれば取得
$time_val_h = get_option($time_name_h); //既に保存してある値があれば取得
$time_val_m = get_option($time_name_m); //既に保存してある値があれば取得
$time_val_all = get_option($time_name_all); //既に保存してある値があれば取得
$old_val_d = $time_val_d;
$old_val_h = $time_val_h;
$old_val_m = $time_val_m;
$old_val_all = $time_val_all;
$message_html = "";

// lungages
$cst_current_title = esc_html__('Current Cart Session Time', 'cart-session-time');
$cst_day_txt = esc_html__('day', 'cart-session-time');
$cst_hour_txt = esc_html__('hour', 'cart-session-time');
$cst_minute_txt = esc_html__('minute', 'cart-session-time');
$cst_submit_txt = esc_html__('save', 'cart-session-time');
$cst_change_txt = esc_html__('Session times changed', 'cart-session-time');

if (!is_plugin_active('cart-session-time-pro/cart-session-time-pro.php')) {
  $disabled = "disabled";
  $time_val_d = 0;
  $time_val_m = 0;
  $time_name_d = "";
  $time_name_m = "";
} else {
  $disabled = "";
}

// 更新されたときの処理
if (isset($_POST[$time_name_d]) or isset($_POST[$time_name_h]) or isset($_POST[$time_name_m])) {

  // 値取得
  if (isset($_POST[$time_name_d])) {
    $time_val_d = absint($_POST[$time_name_d]);
  }
  if (isset($_POST[$time_name_h])) {
    $time_val_h = absint($_POST[$time_name_h]);
  }
  if (isset($_POST[$time_name_m])) {
    $time_val_m = absint($_POST[$time_name_m]);
  }

  // 秒数計算
  if (($time_val_d == "" && $time_val_h == "" && $time_val_m == "") or ($time_val_d == 0 && $time_val_h == 0 && $time_val_m == 0)) {
    $time_val_all = 172800;
  } else if ($time_val_d == 0 || $time_val_h == 0 || $time_val_m == 0 || $time_val_d === "" || $time_val_h === "" || $time_val_m === "") {

    // 選択していない場合は0
    $time_val_d =  $time_val_d ?? 0;
    $time_val_h =  $time_val_h ?? 0;
    $time_val_m =  $time_val_m ?? 0;
    $time_val_all = ((int)$time_val_d * 86400) + ((int)$time_val_h * 3600) + ((int)$time_val_m * 60);
  } else {
    $time_val_all = ((int)$time_val_d * 86400) + ((int)$time_val_h * 3600) + ((int)$time_val_m * 60);
  }

  // POST された値を$opt_name=$opt_valでデータベースに保存(wp_options テーブル内に保存)
  update_option($time_name_d,  $time_val_d);
  update_option($time_name_h,  $time_val_h);
  update_option($time_name_m,  $time_val_m);
  update_option($time_name_all,  $time_val_all);

  require_once plugin_dir_path(__FILE__) . 'notice.php';
}

// input page
require_once plugin_dir_path(__FILE__) . 'option.php';