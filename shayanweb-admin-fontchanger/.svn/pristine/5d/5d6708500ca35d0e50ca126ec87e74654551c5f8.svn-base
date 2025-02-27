<?php
if (!defined('ABSPATH')){
  exit; // Exit if accessed directly.
}
//
function shayanweb_fontchanger_get_all_options(){
  $options = array(
    // types: onoff/txt/select/code
    'choose_font' => array(
      'name' => __('انتخاب فونت پیشخوان وردپرس', 'shayanweb-admin-fontchanger'),
      'description' => __('فونت فارسی مدنظر خود را انتخاب کنید تا در بخش مدیریتی سایت اعمال شود. (پس از ذخیره کردن، یکبار رفرش کنید تا اعمال شود.)', 'shayanweb-admin-fontchanger'),
      'type' => 'select',
      'default' => 'shabnam',
      'options' => array(
        'shabnam'=>__('شبنم', 'shayanweb-admin-fontchanger'),
        'vazir'=>__('وزیرمتن', 'shayanweb-admin-fontchanger'),
        'sahel'=>__('ساحل', 'shayanweb-admin-fontchanger'),
        'custom'=>__('جدید: فونت دلخواه (نیاز به انجام تنظیمات زیر)', 'shayanweb-admin-fontchanger')
      ),
    ),
    'custom_font_css' => array(
      'name' => __('کد CSS فونت دلخواه', 'shayanweb-admin-fontchanger'),
      'description' => __('<strong>توضیحات مهم: </strong>برای دریافت CSS مخصوص فونت دلخواه خودتان،
      ابتدا از بخش <a target="_blank" href="'.get_admin_url(null,'upload.php').'">«رسانه‌ها»</a> فایل‌های فونت خود را آپلود کنید، لینک آن‌ها را کپی کنید
      و با کمک <a style="display:inline-block;padding:5px 10px;color:#fff;background:#304FFE;border-radius:5px" href="https://shayanweb.com/font-css-generator" target="_blank">ابزار رایگان شایان وب: ساخت CSS برای فونت</a>، کد CSS را بسازید و در اینجا کد CSS ساخته شده را paste کنید. توجه: font-family (نام فونت) باید ShayanWeb-Font باشد.<br>
      ما این ابزار و این امکان را مخصوص این افزونه و با درخواست کاربران عزیز این افزونه برنامه‌نویسی کردیم. پیاده‌سازی امکان تنظیم فونت اختصاصی، پروژه‌ای بود که بسیار پرچالش و طولانی بود و کاملاً رایگان بصورت یک آپدیت افزونه به شما ارائه شد.', 'shayanweb-admin-fontchanger'),
      'type' => 'code',
      'default' => '',
    ),
    'wp_font_changer' => array(
      'name' => __('فعال بودن تغییر فونت پیشخوان وردپرس', 'shayanweb-admin-fontchanger'),
      'description' => __('با فعال بودن این تنظیم، فونت پیشخوان وردپرس (مدیریت سایت) تغییر می‌کند.', 'shayanweb-admin-fontchanger'),
      'type' => 'onoff',
      'default' => 'on',
    ),
    'elementor_font_changer' => array(
      'name' => __('فعال بودن تغییر فونت ویرایشگر المنتور', 'shayanweb-admin-fontchanger'),
      'description' => __('فونت ویرایشگر المنتور (صرفا در هنگام ویرایش به‌عنوان مدیر سایت، نه در دید کاربران) با این تنظیم به فونت فارسی تغییر می‌کند.', 'shayanweb-admin-fontchanger'),
      'type' => 'onoff',
      'default' => 'on',
    ),
    'classic_font_changer' => array(
      'name' => __('فعال بودن تغییر فونت ویرایشگر کلاسیک', 'shayanweb-admin-fontchanger'),
      'description' => __('منظور از ویرایشگر کلاسیک، ویرایشگر توضیحات محصول ووکامرس (حین ویرایش در پیشخوان وردپرس) و دیگر بخش‌ها است.', 'shayanweb-admin-fontchanger'),
      'type' => 'onoff',
      'default' => 'on',
    ),
    'wp_login_font_changer' => array(
      'name' => __('فعال بودن تغییر فونت صفحه‌ی ورود پیش‌فرض وردپرس (wp-login.php)', 'shayanweb-admin-fontchanger'),
      'description' => __('با فعال بودن این تنظیم، فونت صفحه‌ی ورود مدیر سایت (wp-login.php) تغییر می‌کند.', 'shayanweb-admin-fontchanger'),
      'type' => 'onoff',
      'default' => 'on',
    ),
    'front_font_changer' => array(
      'name' => __('🔴 تغییر فونت قالب وردپرس (برای بازدیدکنندگان) به فونت فارسی انتخابی (فرانت سایت)', 'shayanweb-admin-fontchanger'),
      'description' => __('توجه کنید که این تنظیم فونت جلوی سایت (که قالب وجود دارد و بازدیدکنندگان سایت می‌بینند) را تغییر می‌دهد. پس از فعال‌سازی، حتما ctrl+f5 بزنید و سایت را با دستگاه‌های مختلف بررسی کنید و مطمئن شوید که برای هیچ بخشی از سایت به مشکلی نخورده باشد. (این گزینه ممکن است فونت برخی بخش‌ها را به اشتباه تغییر دهد یا تغییر ندهد) اگر قالب شما فونت مناسب فارسی دارد یا روش‌هایی برای تغییر فونت از سمت خود قالب دارد، پیشنهاد می‌کنیم این تنظیم را غیرفعال کنید.', 'shayanweb-admin-fontchanger'),
      'type' => 'onoff',
      'default' => 'off',
    ),
    'front_wpadminbar_font_changer' => array(
      'name' => __('تغییر فونت نوار تنظیمات در سایت (فقط برای مدیر سایت)', 'shayanweb-admin-fontchanger'),
      'description' => __('با فعال‌سازی این تنظیم، فونت نوار ابزار بالا در فرانت سایت، فقط برای کاربران با نقش مدیر کل، تغییر می‌کند. این موضوع به این معناست که برای سایر کاربران و بازدیدکنندگان سایت، هیچ‌گونه فایل css اضافه لود نمی‌شود در نتیجه روی سرعت لود سایت هیچ تأثیری ندارد. ضمناً در صورت فعال بودن تنظیم بالایی (تغییر فونت فرانت بطور کامل)، فعال یا غیرفعال بودن این گزینه هیچ فرقی نمی‌کند.', 'shayanweb-admin-fontchanger'),
      'type' => 'onoff',
      'default' => 'on',
    ),
  );
  return $options;
}

function shayanweb_fontchanger_update_option($array){
  $old_options = get_option('shayanweb_fontchanger_options');
  $current_option = $old_options;
  if(!is_array($current_option) or $current_option == false or empty($current_option)){
    $current_option = array();
  }
  //
  $options = shayanweb_fontchanger_get_all_options();
  //
  // update or put each $array items in the saved option
  foreach ($array as $name => $value) {
    if(array_key_exists($name,$options)){
      if($name=='custom_font_css'){
        $current_option[$name]=wp_unslash($value); // css saving
      }else{ // for all
        $current_option[$name]=$value;
      }
    }
  }
  //
  // check if option not existed in saved options, put the default in it!
  foreach ($options as $option_name => $option_items) {
    if(!array_key_exists($option_name,$current_option)){
      $current_option[$option_name] = $option_items['default'];
    }
  }
  //
  if($old_options !== $current_option){
    update_option('shayanweb_fontchanger_options',$current_option);
  }
}

function shayanweb_fontchanger_option($option_name){
  shayanweb_fontchanger_update_option(array()); //add default items if not
  $options = shayanweb_fontchanger_get_all_options();
	if(!empty($option_name) and array_key_exists($option_name,$options)){
    $get_options = get_option('shayanweb_fontchanger_options');
    return $get_options[$option_name];
	}
  return false;
}

function shayanweb_fontchangeroptions_create_submenu() {
  add_submenu_page(
    'options-general.php',
    __( 'شایان وب فونت', 'shayanweb-admin-fontchanger' ),
    __( 'شایان وب فونت', 'shayanweb-admin-fontchanger' ),
    'manage_options',
    'shayanweb-fontchanger-options',
    'shayanweb_fontchangeroptions_pagecontent' );
}
add_action('admin_menu','shayanweb_fontchangeroptions_create_submenu');


function shayanweb_fontchangeroptions_pagecontent() {
	$brefore_error_html = '<div class="shayanweb_message the_error">';
	$after_error_html = '</div>';
	$brefore_okay_html = '<div class="shayanweb_message the_okay">';
	$after_okay_html = '</div>';
	?>
	<style>
	.shayanweb_message{padding:10px;margin:20px 0;border-radius:10px;color:#333;font-size:19px;line-height:2}
	.shayanweb_message.the_error{background:#f9d4e3}
	.shayanweb_message.the_okay{background:#c5f1d4}
	.shayanweb_fontchanger-settings form {padding:20px;margin:20px 0;border-radius:10px; box-shadow:0 0 50px rgba(0,0,0,0.1)}
	.shayanweb_fontchanger-settings input {border-radius:5px;padding:10px;line-height: 1.5}
	.shayanweb_fontchanger-settings input[type="submit"] {cursor:pointer;border:unset;outline:unset;color:#fff;background:#6200EA;border-radius:5px;padding:10px 30px;margin-top:20px}
	.shayanweb_fontchanger-settings span.expired {color:#F50057}
  .shayanweb-boxed{background:#fff;padding:25px;border-radius:20px;box-shadow:0 0 80px rgba(0,0,0,0.1);margin: 25px 0;}

  .shayanweb-switch {position:relative;display:inline-block;width:60px;height:34px;}
  .shayanweb-switch input {opacity: 0;width: 0;height: 0;}
  .shayanweb-switch .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 34px;
  }
  .shayanweb-switch .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 50%;
  }
  .shayanweb-switch input:checked + .slider {
    background-color: #6200EA;
  }
  .shayanweb-switch input:focus + .slider {
    box-shadow: 0 0 1px #6200EA;
  }
  .shayanweb-switch input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  .special-suggestion{
    background: #304FFE;
    border-radius: 20px;
    text-align: center;
    padding: 20px;
    color: #fff;
    font-size: 17px;
    box-shadow: 0 0 80px rgba(58,85,254,.7);
    margin: 30px 0;
  }
  .special-suggestion p{font-size:16px}
  .special-suggestion h2{
    color: #fff;
    font-size: 20px;
    margin-bottom: 20px;
  }
  .special-suggestion a{
    color: #fff !important;
    text-decoration: none !important;
    border:unset !important;
    padding: 15px 30px;
    border-radius: 33px;
    background: #F50057;
    margin: 15px auto 0 auto;
    display: block;
    width: auto;
    width: max-content;
    font-size: 17px;
    transition: all 0.3s;
		box-shadow: unset !important;
  }
  .special-suggestion a:hover{
    background: #C51162;
    transform: scale(1.1);
  }
  .special-suggestion.visit-shayanweb{
    background: #00BFA5;
    box-shadow: 0 0 80px rgba(0, 191, 165,.7);
  }
  .special-suggestion.visit-shayanweb a{
    background: #00897B;
  }
  .special-suggestion.visit-shayanweb a:hover{
    background: #00695C;
  }
  #message-container{padding:10px;margin:20px 0;border-radius:10px;color:#333;font-size:19px;line-height:2}
  #message-container.shwait{background-color:#ffe765;}
  #message-container.shsuccess{background-color:#c5f1d4}
  #message-container.sherror{background-color:#f9d4e3;}


	.shayanweb-option{border:1px solid #e0e0e0;border-radius:10px;margin:10px 0;padding:20px;box-shadow: 0 0 20px rgba(0,0,0,0.1)}
	.shayanweb-option label{display:block;margin-bottom:8px;font-size:15px;font-weight:bold;}
	.shayanweb-option input[type="text"]{display:block;width:100%}
	.shayanweb-option select{display:block;width:100%}

  .shayanweb-option .shayanweb-code-input{
    display:block;width:100%;direction:ltr
  }
	</style>
  <div class="wrap shayanweb_fontchanger-settings">
    <div class="shayanweb-boxed">
      <h1><?php _e( 'تنظیمات افزونه‌ی تغییر فونت <a href="https://shayanweb.com" style="color:#00BFA5" target="_blank">شایان وب</a>', 'shayanweb-admin-fontchanger' ) ?></h1>
      <?php
      if(!empty($_POST['save_settings'])){
        $new_options = $_POST;
        unset($new_options['save_settings']);
        //
        $real_options = shayanweb_fontchanger_get_all_options();
        foreach ($real_options as $r_name => $r_data) {
          if(!array_key_exists($r_name,$new_options) and $r_data['type'] == 'onoff'){
            $new_options[$r_name]='off';
          }
        }
        //
        shayanweb_fontchanger_update_option($new_options);
        echo $brefore_okay_html.'ذخیره‌ی تنظیمات با موفقیت انجام شد!'.$after_okay_html;
      }


      $options = shayanweb_fontchanger_get_all_options();
      echo '<form id="shayanweb_fontchanger_options" method="post" action="">';
			echo '<h2>'.__( 'تنظیمات تغییر فونت شایان وب', 'shayanweb-admin-fontchanger' ).'</h2>';
			echo '<p>'.__( 'گزینه‌های زیر را تنظیم کنید تا فونت فارسی در پیشخوان وردپرس وبسایت شما قرار گیرد. (بطور پیش‌فرض فعال است)', 'shayanweb-admin-fontchanger' ).'</p>';
      foreach ($options as $opton_name => $option) {
        $name = $opton_name;
        $fname = $option['name'];
        $type = $option['type'];
        $default = $option['default'];
        $description = $option['description'];
        $current = shayanweb_fontchanger_option($name);
        $boxclass='';
        if($name=='custom_font_css'){
          $boxclass = ' custom_font_css';
        }
        echo '<div class="shayanweb-option'.$boxclass.'">'.
        '<label for="'.$name.'">'.$fname.'</label>'.
        '<p>'.$description.'</p>';
        if($type == 'select'){
          if($name == 'choose_font'){
            echo '<div class="shayanweb-font-preview">
            <style>@media(min-width:850px){.shayanweb-font-preview{display:flex;justify-content:space-between;align-items:flex-start}}
            #font_preview{max-width:100%}</style>';
          }
          $option_options = $option['options'];
          echo '<select name="'.$name.'" id="'.$name.'">';
          foreach ($option_options as $o_slug => $o_name) {
            $selected='';
            if($o_slug==$current){
              $selected = ' selected';
            }
            echo '<option value="'.$o_slug.'"'.$selected.'>'.$o_name.'</option>';
          }
          echo '</select>';
          if($name == 'choose_font'){
            echo '<img id="font_preview" src="" alt="'.__('پیش‌نمایش فونت','shayanweb-admin-fontchanger').'" />
            <script>
              const fontPreviews = {
                shabnam: "'.plugins_url( 'img/shabnam.jpg', dirname(__FILE__) ).'",
                vazir: "'.plugins_url( 'img/vazirmatn.jpg', dirname(__FILE__) ).'",
                sahel: "'.plugins_url( 'img/sahel.jpg', dirname(__FILE__) ).'",
                custom: "'.plugins_url( 'img/custom.jpg', dirname(__FILE__) ).'",
              };
              const select = document.getElementById("choose_font");
              const fontPreview = document.getElementById("font_preview");
              select.addEventListener("change", function () {
                const selectedFont = select.value;
                fontPreview.src = fontPreviews[selectedFont];
              });
              fontPreview.src = fontPreviews[select.value];

              //
              //
            </script>
            </div>';
          }
        }elseif($type == 'code'){
          echo '<textarea rows="10"/ class="shayanweb-code-input" name="'.$name.'" id="'.$name.'" placeholder="کد را اینجا وارد کنید">'.$current.'</textarea>';
          echo '<script>
          const theselect = document.getElementById("choose_font");
          const customFontDiv = document.querySelector(".custom_font_css");

          theselect.addEventListener("change", function () {
            if (theselect.value === "custom") {
              customFontDiv.style.display = "block";
            } else {
              customFontDiv.style.display = "none";
            }
          });

          // Initial check for theselect value on page load
          if (theselect.value === "custom") {
            customFontDiv.style.display = "block";
          } else {
            customFontDiv.style.display = "none";
          }
        </script>';
        }elseif($type == 'onoff'){
          $checked='';
          if($current=='on'){
            $checked=' checked';
          }
          echo
          '<label for="'.$name.'" class="shayanweb-switch">
            <input name="'.$name.'" id="'.$name.'" value="on" type="checkbox"'.$checked.'>
            <span class="slider round"></span>
          </label>';
        }else {
          echo '<input type="text" name="'.$name.'" id="'.$name.'" value="'.$current.'">';
        }
        echo '</div>';
      }
      echo '
      <input type="submit" id="shayanweb-save-button" name="save_settings" value="'.__('ذخیره‌ی تنظیمات','shayanweb-admin-fontchanger').'">
      <div id="message-container"></div>
      </form>';
      echo "<script>
      var shweb_success_message = '".__('ذخیره‌ی تنظیمات با موفقیت انجام شد! برای مشاهده‌ی تغییرات، صفحه را رفرش کنید.','shayanweb-admin-fontchanger')."';
      var shweb_wait_message = '".__('در حال ذخیره‌ی تغییرات...','shayanweb-admin-fontchanger')."';
      var shweb_error_message = '".__('خطایی در ذخیره‌ی تنظیمات وجود داشت. مجدد تلاش کنید.','shayanweb-admin-fontchanger')."';
      var shweb_not_connected_message = '".__('خطا در اتصال به سرور... بررسی کنید وارد هستید یا خیر. صفحه را رفرش کنید و مجدد تلاش کنید.','shayanweb-admin-fontchanger')."';
      </script>";
      ?>

      <div class="special-suggestion">
        <h2><?php _e('به این افزونه امتیاز دهید و حمایت کنید💚😍🙏', 'shayanweb-admin-fontchanger'); ?></h2>
        <p><?php _e('اگر این افزونه برای شما مفید بود، بسیار ممنون می‌شویم 5 امتیاز کامل را از طریق لینک زیر به ما بدهید.', 'shayanweb-admin-fontchanger'); ?></p>
        <a href="https://login.wordpress.org/?redirect_to=https%3A%2F%2Fwordpress.org%2Fsupport%2Fplugin%2Fshayanweb-admin-fontchanger%2Freviews%2F" target="_blank"><?php
        _e('ثبت امتیاز 5 ستاره!😍⭐', 'shayanweb-admin-fontchanger');
        ?></a>
      </div>

      <div class="special-suggestion visit-shayanweb">
        <h2><?php _e('به شایان وب سری بزنید!😍💚', 'shayanweb-admin-fontchanger'); ?></h2>
        <p><?php _e('در شایان وب، آموزش‌های بروز، دوره‌های آموزشی کاربردی و محصولات وردپرسی مفیدی داریم! حتما چند وقت یکبار بهمون سری بزنید (: خوشحال می‌شیم💚', 'shayanweb-admin-fontchanger'); ?></p>
        <a href="https://shayanweb.com/" target="_blank"><?php
        _e('بریم به شایان وب!😍', 'shayanweb-admin-fontchanger');
        ?></a>
      </div>

    </div>
  </div>
  <?php
}


function shayanweb_fontchanger_enqueue_saving_admin_script() {
  if (isset($_GET['page']) && $_GET['page'] === 'shayanweb-fontchanger-options') {
      wp_enqueue_script('jquery');
      wp_enqueue_script('shayanweb-fontchanger-ajax-save', SHAYANWEB_FONT_CHANGER_URL . 'js/shayanweb-admin-saving.js', array('jquery'), SHAYANWEB_FONT_CHANGER_VERSION, true);
  }
}
add_action('admin_enqueue_scripts', 'shayanweb_fontchanger_enqueue_saving_admin_script');


function shayanweb_fontchanger_ajax_options_save() {
  if (!current_user_can('manage_options')) {
      wp_send_json_error('شما دسترسی ندارید.');
  }

  if (!empty($_POST['action'])) {
      $new_options = $_POST;
      unset($new_options['action']);
      
      $real_options = shayanweb_fontchanger_get_all_options();
      foreach ($real_options as $r_name => $r_data) {
          if (!array_key_exists($r_name, $new_options) && $r_data['type'] == 'onoff') {
              $new_options[$r_name] = 'off';
          }
      }
      
      shayanweb_fontchanger_update_option($new_options);
      wp_send_json_success();
  } else {
      wp_send_json_error();
  }
}
add_action('wp_ajax_shayanweb_fontchanger_ajax_options_save', 'shayanweb_fontchanger_ajax_options_save');
