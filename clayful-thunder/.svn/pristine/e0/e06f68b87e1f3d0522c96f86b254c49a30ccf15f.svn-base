<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/Clayful
 * @since      1.0.0
 *
 * @package    Clayful_Thunder
 * @subpackage Clayful_Thunder/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

	<h2><?php echo esc_html(get_admin_page_title()); ?></h2>

	<form method="post" name="clayful_thunder_options" action="options.php">

		<?php
			//Grab all options
			$thunder_options = get_option($this->plugin_name);
			$thunder_styles = $thunder_options['styles'] ? $thunder_options['styles'] : '';
			$thunder_scripts = $thunder_options['scripts'] ? $thunder_options['scripts'] : '';
		?>

		<div class="notice notice-info inline">
			<p>
				설치를 위한 코드는 <a href="https://app.clayful.io" target="_blank">클레이풀의 스토어 관리자 페이지</a> 내 <strong>연동 플러그인 > 쇼핑 위젯 (썬더)</strong>에서 생성하실 수 있습니다.
			</p>
		</div>

		<div class="notice notice-info inline">
			<p>
				사용에 궁금한 점이 있으시면 <a href="https://clayful.io/support" target="_blank">클레이풀의 서포트 페이지</a>를 통해서 연락해주세요.
			</p>
		</div>

		<?php settings_fields($this->plugin_name); ?>

		<h2>스타일 설치 코드</h2>

		<!-- Thunder Styles -->
		<textarea
			id="<?php echo $this->plugin_name; ?>-styles"
			name="<?php echo $this->plugin_name; ?>[styles]"
			cols="80"
			rows="10"
			class="large-text"
			placeholder="스타일 설치 코드를 붙여넣어주세요."><?php echo $thunder_styles; ?></textarea><br>

		<h2>스크립트 설치 코드</h2>

		<!-- Thunder Scripts -->
		<textarea
			id="<?php echo $this->plugin_name; ?>-scripts"
			name="<?php echo $this->plugin_name; ?>[scripts]"
			cols="80"
			rows="10"
			class="large-text"
			placeholder="스크립트 설치 코드를 붙여넣어주세요."><?php echo $thunder_scripts; ?></textarea><br>

		<?php submit_button('저장하기', 'primary', 'submit', TRUE); ?>

	</form>

</div>