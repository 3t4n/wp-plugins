<?php
	/*
		Plugin Name: G File Merge & Minify
		Plugin URI: https://wordpress.org/plugins/g-file-merge-minify/
		Description: A lightweight WordPress plugin that can shrink and combine CSS and JavaScript files on your website.
		Version: 1.0
		Author: Sinan Yorulmaz
		Author URI: https://sinanyorulmaz.com
		License: GNU
	*/

	if (get_option('merge_all_script_files') == 'on') {
		add_action('wp_enqueue_scripts', 'gfmm_script', 999);

		function gfmm_script() {
			global $wp_scripts;

			$wp_scripts->all_deps($wp_scripts->queue);

			// Burada yeni oluşturulacak dosyanın yolunu belirliyoruz:
			$gfmm_file_location = get_stylesheet_directory() . DIRECTORY_SEPARATOR . 'gfmm-script.js';
			$gfmm_script = '';

			if (get_option('script_exclusion_status') == 'on') {
				// Burada ise birleştirdiğimiz zaman sayfamızda bozukluklara yol açan JS dosyalarını ayrıştırıyoruz:
				$exclusions = array_map('trim', explode(PHP_EOL, trim(get_option('exclude_script'))));

				if (get_option('script_files_in_the_site') == 'on') {
					foreach ($wp_scripts->to_do as $item) {
						if (($key = array_search($item, $exclusions)) == false) {
							echo $item . '<br>';
						}
					}
				}

				foreach ($exclusions as $exclusion) {
					if (($key = array_search($exclusion, $wp_scripts->to_do)) !== false) {
						unset($wp_scripts->to_do[$key]);
					}
				}
			}

			foreach ($wp_scripts->to_do as $handle) {
				// Dosyalardaki "token"leri temizliyoruz:
				$src = strtok($wp_scripts->registered[$handle]->src, '?');

				// Buradan itibaren JS dosyalarını birleştirmeye başlıyoruz.
				if (strpos($src, 'https') !== false) {
					// Web sitemizin URL'ini çekiyoruz:
					$site_url = site_url();

					if (strpos($src, $site_url) !== false) {
						$js_file_path = str_replace($site_url, '', $src);
					} else {
						$js_file_path = $src;
					}

					// Dosyamızın sol tarafındaki slaçı kaldırıyoruz:
					$js_file_path = ltrim($js_file_path, '/');
				} else {
					$js_file_path = ltrim($src, '/');
				}

				// Dosyanın var olup olmadığını kontrol edip birleştirme işlemini uyguluyoruz:
				if (file_exists($js_file_path)) {
					$localize = '';

					if (@key_exists('data', $wp_scripts->registered[$handle]->extra)) {
						$localize = $obj->extra['data'] . ';';
					}

					$gfmm_script .= $localize . file_get_contents($js_file_path) . ';';
				}
			}

			// Birleştirdiğimiz JS dosyalarını geçerli temanın dizinine yüklüyoruz:
			file_put_contents($gfmm_file_location, $gfmm_script);

			// Burada birleştirdiğimiz JS dosyasını sisteme entegre ediyoruz:
			wp_enqueue_script('gfmm-merged-script', get_stylesheet_directory_uri() . DIRECTORY_SEPARATOR . 'gfmm-script.js');

			// Son olarak ise birleştirilen dosyalardaki dosyaları sistemden kaldırıyoruz çünkü artık tek bir dosya olarak çalışacaklar:
			foreach ($wp_scripts->to_do as $handle) {
				wp_deregister_script($handle);
			}
		}
	}

	if (get_option('merge_all_style_files') == 'on') {
		add_action('wp_print_styles', 'gfmm_style', 999);

		function gfmm_style() {
			global $wp_styles;

			$wp_styles->all_deps($wp_styles->queue);

			// Burada yeni oluşturulacak dosyanın yolunu belirliyoruz:
			$gfmm_file_location = get_stylesheet_directory() . DIRECTORY_SEPARATOR . 'gfmm-style.min.css';
			$gfmm_style = '';

			if (get_option('style_exclusion_status') == 'on'){
				// Burada ise birleştirdiğimiz zaman sayfamızda bozukluklara yol açan CSS dosyalarını ayrıştırıyoruz:
				$exclusions = array_map('trim', explode(PHP_EOL, trim(get_option('exclude_style'))));

				if (get_option('style_files_in_the_site') == 'on') {
					foreach ($wp_styles->to_do as $item) {
						if (($key = array_search($item, $exclusions)) == false) {
							echo $item . '<br>';
						}
					}
				}

				foreach ($exclusions as $exclusion) {
					if (($key = array_search($exclusion, $wp_styles->to_do)) !== false) {
						unset($wp_styles->to_do[$key]);
					}
				}
			}

			foreach ($wp_styles->to_do as $handle) {
				// Dosyalardaki "token"leri temizliyoruz:
				if (!strpos($wp_styles->registered[$handle]->src, 'googleapis')) {
					$src = strtok($wp_styles->registered[$handle]->src, '?');
				} else {
					$src = $wp_styles->registered[$handle]->src;
				}

				// Buradan itibaren CSS dosyalarını birleştirmeye başlıyoruz.
				if (strpos($src, 'https') !== false) {
					// Web sitemizin URL'ini çekiyoruz:
					$site_url = site_url();

					if (strpos($src, $site_url) !== false) {
						$css_file_path = str_replace($site_url, '', $src);
					} else {
						$css_file_path = $src;
					}

					// Dosyamızın sol tarafındaki slaçı kaldırıyoruz:
					$css_file_path = ltrim($css_file_path, '/');
				} else {
					$css_file_path = ltrim($src, '/');
				}

				// Dosyanın var olup olmadığını kontrol edip birleştirme işlemini uyguluyoruz:
				if (file_exists($css_file_path)) {
					$localize = '';

					if (@key_exists('data', $wp_styles->registered[$handle]->extra)) {
						$localize = $obj->extra['data'] . ';';
					}

					//$content = str_replace('', '', file_get_contents($css_file_path));

					$gfmm_style .= $localize . file_get_contents($css_file_path) . ';';
				}
			}

			// Birleştirdiğimiz CSS dosyalarını geçerli temanın dizinine yüklüyoruz:
			file_put_contents($gfmm_file_location, $gfmm_style);

			// Burada birleştirdiğimiz JCSS dosyasını sisteme entegre ediyoruz:
			wp_enqueue_style('gfmm-merged-style', get_stylesheet_directory_uri() . DIRECTORY_SEPARATOR . 'gfmm-style.min.css');

			// Son olarak ise birleştirilen dosyalardaki dosyaları sistemden kaldırıyoruz çünkü artık tek bir dosya olarak çalışacaklar:
			foreach ($wp_styles->to_do as $handle) {
				wp_deregister_style($handle);
			}
		}
	}

	require 'gfmm_options.php';
?>