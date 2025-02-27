<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(! current_user_can('administrator')) exit;

// if this fails, check_admin_referer() will automatically print a "failed" page and die.
if ( ! empty( $_POST ) && check_admin_referer( 'nonce_verify', 'chkNonce' ) ) {
   // process form data, e.g. update fields
}

if(isset($_POST['submit']))
{
	function success($f){
		$safe_f = sanitize_text_field($f);
		update_post_meta($post->ID,'LFS_fonts',$safe_f);
		update_option("LFS_lao_font",$safe_f);
		echo '<div id="message" class="updated fade"><p><h1>ອັບເດດແລ້ວ!</h1></p></div>';
		// echo '<script>location.reload();</script>';
	}

	if($_POST['type']==="default"){
		$f = $_POST['LFS_fonts'];
		if($f=== ''){
			$f = 'phetsarath';
		}
		success($f);

	}else if($_POST['type']==="custom"){

		$target = plugin_dir_path(__FILE__)."Custom/";
		$allowed =  array('ttf');
		$count = 0;
		if(count(array_filter($_FILES['file']['name']))<2){
			echo '<div id="message" class="error notice"><p>ໄຟລ໌ Font ບໍ່ຄົບກະລຸນາເລືອກທັງ 2 Font!</p></div>';
		}else{

			foreach ($_FILES['file']['name'] as $filename) 
			{
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if(!in_array($ext,$allowed) ) {
					echo '<div id="message" class="error notice"><p>ອະນຸຍາດໃຫ້ອັບໂຫລດພຽງ font ສະກຸນ ttf ເທົ່ານັ້ນ!</p></div>';
				}else{
					$temp=$target;
					$tmp=$_FILES['file']['tmp_name'][$count];
					if($count === 0){
						$temp=$temp.'CustomEng.ttf';
					}else{
						$temp=$temp.'CustomLao.ttf';
					}
					move_uploaded_file($tmp,$temp);
					$count=$count + 1;
					$temp='';
					$tmp='';
				}
			}

		}
		$f = "Custom";
		success($f);
	}else{
		echo '<div id="message" class="error notice"><p>ຜິດພາດ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ!</p></div>';
	}

}
?>

    <?php
global $wpdb;
$tbl = $wpdb->options;
$chosen = $wpdb->get_row( "SELECT * FROM $tbl WHERE option_name='LFS_lao_font'");

if($chosen->option_value === "phetsarath")
{
	$fname = "Phetsarath OT";
}
else if($chosen->option_value === "LaoSansPro")
{
	$fname = "Lao Sans Pro";
}
else if($chosen->option_value === "Saysettha")
{
	$fname = "Saysettha OT";
}
else if($chosen->option_value === "Souliyo")
{
	$fname = "Souliyo Key";
}
else if($chosen->option_value === "Dhyana")
{
	$fname = "Dhyana";
}
else if($chosen->option_value === "NotoSerifLao"){
	$fname = "Noto Serif Lao";
}
else if($chosen->option_value === "NotoSansLao"){
	$fname = "Noto Sans Lao";
}
else if($chosen->option_value === "DefagoNotoSansLao"){
	$fname = "Defago Noto Sans Lao";
}
else if($chosen->option_value === "Custom"){
	$fname = "Custom";
}

?>
        <div class="wrap">
            <h1><span class="dashicons dashicons-admin-customizer"></span> ຕັ້ງຄ່າ Lao Fonts</h1>
            <br>
            <br>
			
			<div style="width:100%;text-align:center">
            <img src="<?= esc_url(plugins_url('assets/banner-772x250.png',__FILE__)); ?>">
            <h1 stlye="text-shadow: 2px 2px #ff0000;"><u>ພາສາລາວ ສຳລັບ Wordpress</u></h1>
            <p style="font-size:22px">ທ່ານກຳລັງໃຊ້ຟ້ອນ <strong><span style="color:red"><?= esc_html($fname); ?></span></strong></p>
			</div>
			
            <table style="width:100%">
                <tr>
                    <td style="width:50%">
                        <table style="font-size:22px;width:100%">
                            <tr>
                                <td style="width:300px;text-align:right">ເລືອກຮູບແບບ: </td>
                                <td style="padding-left:20px">
                                    <select style="font-size:18px;width:300px;" id="Menu">
                                        <option value="defaultForm">ປົກກະຕິ</option>
                                        <option value="customForm">ກຳນົດເອງ</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <div id="defaultForm" class="Form">
                            <form method="post">
                                <table style="font-size:22px;width:100%">
                                    <tr>
                                        <td style="width:300px;text-align:right">ເລືອກ Font ທີ່ຕ້ອງການ: </td>
                                        <td style="padding-left:20px">
                                            <select style="font-size:18px;width:300px;" name="LFS_fonts" id="LFS_fonts">
                                                <option value="DefagoNotoSansLao">Defago Noto Sans Lao</option>
                                                <option value="phetsarath">Phetsarath OT</option>
                                                <option value="NotoSerifLao">Noto Serif Lao</option>
                                                <option value="NotoSansLao">Noto Sans Lao</option>
                                                <option value="LaoSansPro">Lao Sans Pro</option>
                                                <option value="Saysettha">Saysettha OT</option>
                                                <option value="Souliyo">Souliyo Key</option>
                                                <option value="Dhyana">Dhyana</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <input type="hidden" name="type" value="default" />
                                        <td>
                                            <?php wp_nonce_field( 'nonce_verify', 'chkNonce' ); ?>
                                        </td>
                                        <td style="padding-left:20px">
                                            <input type="submit" value="ປ່ຽນ Font" name="submit" style="font-size:18px">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                        <div id="customForm" class="Form">

                            <form method="post" enctype="multipart/form-data">
                                <p style="color:red">ໝາຍເຫດ: ສາມາດນຳໃຊ້ໄດ້ພຽງແຕ່ font ປະເພດ ttf ເທົ່ານັ້ນ.</p>
                                <table style="font-size:16px">
                                    <tr>
                                        <td>English Font: </td>
                                        <td>
                                            <input name="file[]" type="file" require />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lao Font: </td>
                                        <td>
                                            <input name="file[]" type="file" require />
                                        </td>
                                    </tr>
                                    <tr>
                                        <input type="hidden" name="type" value="custom" />
                                        <td>
                                            <?php wp_nonce_field( 'nonce_verify', 'chkNonce' ); ?>
                                        </td>
                                        <td>
                                            <input type="submit" value="ປ່ຽນ Font" name="submit" style="font-size:18px">
                                        </td>
                                    </tr>
                                </table>
                            </form>

                        </div>
                        <br>
                        <p style="font-weight:bold;font-size:18px;">ພັດທະນາໂດຍ : ທ. ແສງໄຊ ໄຊຍະຈັກ</p>
                        <p><a href="https://facebook.com/frank.xayachack" target="_blank"><img src="<?= esc_url(plugins_url('assets/facebook.png',__FILE__)); ?>" width="50" height="50"></a></p>
                    </td>

                    <td style="width:50%">
                        <p style="font-weight:bold;font-size:18px;">ສົ່ງເສີມການພັດທະນາ:</p>
                        <p><img src="<?= esc_url(plugins_url('assets/bcelone.png',__FILE__)); ?>" width="120px" height="120px"></p>
                        <p style="font-weight:bold;font-size:18px;">ຊື່ບັນຊີ: SENGXAY XAYACHACK MR</p>
                        <p>
                            <img src="<?= esc_url(plugins_url('assets/LAK.jpg',__FILE__)); ?>" width="185px" height="200px">
                            <img src="<?= esc_url(plugins_url('assets/THB.jpg',__FILE__)); ?>" width="200px" height="200px">
                            <img src="<?= esc_url(plugins_url('assets/USD.jpg',__FILE__)); ?>" width="200px" height="200px">
                        </p>
        </div>
        </td>
        </tr>
        </table>
        <script>
            // function getForms(){
            jQuery(document).ready(function($) {
                $('#customForm').hide();

                $(function() {
                    $('#Menu').change(function() {
                        $('.Form').hide();
                        $('#' + $(this).val()).show();
                    });
                });

            });
        </script>