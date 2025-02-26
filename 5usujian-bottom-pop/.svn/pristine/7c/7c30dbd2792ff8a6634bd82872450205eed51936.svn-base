<?php
// if ( ! defined( 'ABSPATH' ) ) exit;

session_start();
//将全局脚本加入head
function wysj_pop_front_base_script() {
	global $wyBtpopOptions;
?>
	<script type="text/javascript">
		var wysj_bottom_pop = {
			ajaxurl: "<?php echo admin_url('admin-ajax.php')?>",
			captchaUrl: "<?php echo WYSJ_POP_URL.'/wysj-front/captcha.php'; ?>"
		}
	</script>
<?php
}
add_action( 'wp_head', 'wysj_pop_front_base_script' );
//渲染前台样式
function wysj_bt_pop_html()
{
	global $wyBtpopOptions;
	wp_enqueue_style('5usujian-bottom-pop-css', WYSJ_POP_URL.'/asset/css/5usujian-bottom-pop.css',array(),WYSJ_POP_VER);
	wp_enqueue_style('5usujian-bottom-pop-custom-css', WYSJ_POP_UPLOADS_URL.'/5usujian-bottom-pop-custom.css',array(),$wyBtpopOptions['cssVer']);
	wp_enqueue_script('5usujian-bottom-pop-js', WYSJ_POP_URL.'/asset/js/5usujian-bottom-pop.js',array('jquery'),WYSJ_POP_VER);
	wp_enqueue_script('5usujian-bottom-pop-custom-js', WYSJ_POP_UPLOADS_URL.'/5usujian-bottom-pop-custom.js',array('jquery'),$wyBtpopOptions['cssVer']);
	$label =  $wyBtpopOptions['formLabel'];
	$name =  $wyBtpopOptions['formName'];
	$type =  $wyBtpopOptions['formType'];
	$content =  $wyBtpopOptions['formContent'];
	$width =  $wyBtpopOptions['formWidth'];
	$required =  $wyBtpopOptions['required'];
?>
	<div id="wysj-bottom-pop">
		<div class="wysj-bp-wrap">
			<div class="wysj-bp-top">
				<div class="wysj-bp-img">
					<img class="wysj-bp-img-pc" src="<?php if($wyBtpopOptions['adimg'] =='') echo WYSJ_POP_URL.'/asset/images/top-img.png'; else echo $wyBtpopOptions["adimg"]?>">
				</div>
				<a href="javascript:;" class="wysj-bp-close"></a>
			</div>
			<div class="wysj-bp-content">
				<div class="wysj-bp-form">
					<?php
						for ($i=0; $i < count($label); $i++) {
							switch ($type[$i]) {
								case 'text':
					?>
						<div class="wysj-bp-form-item wysj-bp-width-<?php echo $width[$i]; ?>">
							<input type="text" <?php echo $required[$i] == "required" ? "required" : ""; ?> class="wysj-btpop-front-input wysj-bp-input" name="<?php echo $name[$i]; ?>" value="<?php echo $content[$i]; ?>" placeholder="<?php echo $label[$i]; ?>">
						</div>
					<?php
									break;
								case 'textarea':
					?>
						<div class="wysj-bp-form-item wysj-bp-width-<?php echo $width[$i]; ?>">
							<textarea <?php echo $required[$i] == "required" ? "required" : ""; ?> class="wysj-btpop-front-input wysj-bp-textarea" name="<?php echo $name[$i]; ?>" value="<?php echo $content[$i]; ?>" placeholder="<?php echo $label[$i]; ?>"></textarea>
						</div>
					<?php
									break;
								case 'select':
					?>
						<div class="wysj-bp-form-item wysj-bp-width-<?php echo $width[$i]; ?>">
							<select <?php echo $required[$i] == "required" ? "required" : ""; ?> class="wysj-btpop-front-input wysj-bp-select" name="<?php echo $name[$i]; ?>">
								<option disabled selected><?php echo $label[$i]; ?></option>
					<?php
						$selectItem = explode(',', $content[$i]);
						foreach($selectItem as $selector){

					?>
							<option value="<?php echo $selector; ?>"><?php echo $selector; ?></option>
					<?php
						}
					?>
						</select>
						</div>
					<?php
									break;
							
							}
					?>
						
					<?php
						}
					?>
					<div class="wysj-bp-submit-box">
					<?php 
						if($wyBtpopOptions['captcha'] == 'enable'){
					?>
						<div class="wysj-bp-form-item wysj-bp-width-three wysj-bp-veri">
							<input type="text" placeholder="请输入验证码" class="wysj-btpop-front-input wysj-bp-input" name="wysj_bp_captcha" value="">
							<div class="wysj-bp-veri-img">
								<img id="wysj-bp-captcha-img" src="<?php echo WYSJ_POP_URL.'/wysj-front/captcha.php'; ?>" onclick="this.src='<?php echo WYSJ_POP_URL.'/wysj-front/captcha.php'; ?>?'+Math.random();">
							</div>
						</div>
					<?php
						}
					?>
						<div class="wysj-bp-form-item wysj-bp-width-<?php echo $wyBtpopOptions['captcha'] == 'enable'? 'threeTwo': 'three'; ?>">
							<input type="button" class="wysj-bp-button wysj-bp-submit" id="wysj-bp-submit" value="提交">
						</div>
					</div>
				</div>
				<div class="wysj-bp-others"></div>
			</div>
		</div>
	</div>
	<div id="wysj-bp-welcome" class="wysj-preload">
		<div class="wysj-bp-welcome-content">
			<div class="wysj-bp-welcome-smile">
				<img src="<?php echo WYSJ_POP_URL.'/asset/images/smile.svg?'.WYSJ_POP_VER; ?>">
			</div>
			<div class="wysj-bp-welcome-text">
				<h3>发送成功</h3>
				<p><?php echo $wyBtpopOptions['welcome']; ?></p>
				<div class="wysj-bp-welcome-ok" onclick="wysjBpFront.closeSuccess()">好的</div>
			</div>
		</div>
	</div>
<?php
}
?>
<?php
//嵌入式
function wysj_bt_pop_html_inside()
{
	global $wyBtpopOptions;
	wp_enqueue_style('5usujian-bottom-pop-css', WYSJ_POP_URL.'/asset/css/5usujian-bottom-pop.css',array(),WYSJ_POP_VER);
	wp_enqueue_style('5usujian-bottom-pop-custom-css', WYSJ_POP_UPLOADS_URL.'/5usujian-bottom-pop-custom.css',array(),$wyBtpopOptions['cssVer']);
	wp_enqueue_script('5usujian-bottom-pop-js', WYSJ_POP_URL.'/asset/js/5usujian-bottom-pop.js',array('jquery'),WYSJ_POP_VER);
	wp_enqueue_script('5usujian-bottom-pop-custom-js', WYSJ_POP_UPLOADS_URL.'/5usujian-bottom-pop-custom.js',array('jquery'),$wyBtpopOptions['cssVer']);
	$label =  $wyBtpopOptions['formLabel'];
	$name =  $wyBtpopOptions['formName'];
	$type =  $wyBtpopOptions['formType'];
	$content =  $wyBtpopOptions['formContent'];
	$width =  $wyBtpopOptions['formWidth'];
	$required =  $wyBtpopOptions['required'];
	$wyBtpopOptions['captcha'] == 'enable'? $captchaWidth = 'threeTwo': $captchaWidth = 'three';
	$html = '';
	$html .= '<script type="text/javascript" src="'.WYSJ_POP_URL.'/asset/js/laydate.min.js"></script>';
	$html .= '
	<style>
		#wysj-bottom-pop{position: static !important;}
		#wysj-bottom-pop .wysj-bp-wrap{width:100% !important; top:0 !important;}
	</style>';
	$html .= '
	<div id="wysj-bottom-pop" class="wysj-btpop-inside">
		<div class="wysj-bp-wrap">
			<div class="wysj-bp-content">
				<div class="wysj-bp-form">
	';
	for ($i=0; $i < count($label); $i++) {
		$required[$i] == 'required' ? $required_out = 'required' : $required_out = "";
		switch ($type[$i]) {
			case 'text':
				$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-'.$width[$i].'">
							<input type="text" '.$required_out.' class="wysj-btpop-front-input wysj-bp-input" name="'.$name[$i].'" value="'.$content[$i].'" placeholder="'.$label[$i].'">
						</div>
						';
				break;
			case 'textarea':
			$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-'.$width[$i].'">
							<textarea '.$required_out.' class="wysj-btpop-front-input wysj-bp-textarea" name="'.$name[$i].'" value="'.$content[$i].'" placeholder="'.$label[$i].'"></textarea>
						</div>';
				break;
			case 'select':
			$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-'.$width[$i].'">
							<select '.$required_out.' class="wysj-btpop-front-input wysj-bp-select" name="'.$name[$i].'">
								<option disabled selected>'.$label[$i].'</option>
					';
					$selectItem = explode(',', $content[$i]);
						foreach($selectItem as $selector){
			$html .= '
							<option value="'.$selector.'">'.$selector.'</option>
							';
						}
			$html .= '
						</select>
						</div>
					';
				break;
			case 'multiselect':
			$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-'.$width[$i].'">
							<select '.$required_out.' multiple="multiple" class="wysj-bp-select wysj-bp-multi" id="wysj-bp-multi'.$i.'" name="'.$name[$i].'">
					';
					$mSelectItem = explode(',', $content[$i]);
					foreach($mSelectItem as $mselector){
			$html .= '
							<option value="'.$mselector.'">'.$mselector.'</option>
					';
						}
			$html .= '
						</select>
						</div>';
				break;
			case 'radio':
			$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-'.$width[$i].'">
							<div class="wysj-bp-input">
							'.$label[$i].'
					';
					$radioItem = explode(',', $content[$i]);
						$radioLength = count($radioItem);
						for($radioIndex = 0; $radioIndex < $radioLength; $radioIndex++){
			$html .= '
							<label class="wysj-bp-radio-label"><input class="wysj-btpop-front-radio" type="radio" '.($radioIndex == 0 ? "checked" : "").' name="'.$name[$i].'" value="'.$radioItem[$radioIndex].'"> '.$radioItem[$radioIndex].'</label>
						';
						}
			$html .= '
						</div>
					</div>';	
						
					break;
				case 'date':
			$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-'.$width[$i].'">
							<input type="text" '.$required_out.' class="wysj-btpop-front-input wysj-bp-input" id="wysj-bp-date'.$i.'" value="'.$content[$i].'" name="'.$name[$i].'" placeholder="'.$label[$i].'">
						</div>
					';
					break;
				case 'datetime':
			$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-'.$width[$i].'">
							<input type="text" '.$required_out.' class="wysj-btpop-front-input wysj-bp-input" id="wysj-bp-date'.$i.'" value="'.$content[$i].'" name="'.$name[$i].'" placeholder="'.$label[$i].'">
						</div>
						';
					break;
				case 'city':
			$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-'.$width[$i].'">
							<input type="text" '.$required_out.' readonly class="wysj-btpop-front-input wysj-bp-input" id="wysj-bp-city'.$i.'" value="'.$content[$i].'" name="'.$name[$i].'" placeholder="'.$label[$i].'">
						</div>
						';
					}
						
				}
			$html .= '
					<div class="wysj-bp-submit-box">
						';
			if($wyBtpopOptions['captcha'] == 'enable'){
			$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-three wysj-bp-veri">
							<input type="text" placeholder="请输入验证码" class="wysj-btpop-front-input wysj-bp-input" name="wysj_bp_captcha" value="">
							<div class="wysj-bp-veri-img">
								<img id="wysj-bp-captcha-img" src="'.WYSJ_POP_URL.'/wysj-front/captcha.php" onclick="this.src=\''.WYSJ_POP_URL.'/wysj-front/captcha.php?\'+Math.random();">
							</div>
						</div>
						';
			}
			$html .= '
						<div class="wysj-bp-form-item wysj-bp-width-'.$captchaWidth.'">
							<input type="button" class="wysj-bp-button wysj-bp-submit" id="wysj-bp-submit" value="提交">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="wysj-bp-welcome" class="wysj-preload">
		<div class="wysj-bp-welcome-content">
			<div class="wysj-bp-welcome-smile">
				<img src="'.WYSJ_POP_URL.'/asset/images/smile.svg?'.WYSJ_POP_VER.'">
			</div>
			<div class="wysj-bp-welcome-text">
				<h3>发送成功</h3>
				<p>'.$wyBtpopOptions['welcome'].'</p>
				<div class="wysj-bp-welcome-ok" onclick="wysjBpFront.closeSuccess()">好的</div>
			</div>
		</div>
	</div>
	';
	return $html;
}