<?php
/*
Plugin Name: WP-UTF8-Excerpt
Version: 0.8.3
Author: Betty
Author URI: http://myfairland.net/
Plugin URI: http://myfairland.net/wp-utf8-excerpt/
Description: This plugin generates a better excerpt for multi-byte language users (Chinese, for example). Besides, it keeps the html tags in the excerpt.
Text Domain: wp-utf8-excerpt
Domain Path: /languages
*/

//语言文件
load_plugin_textdomain('wp-utf8-excerpt', false, basename( dirname( __FILE__ ) ) . '/languages' );

//一般主题文件里是用 the_content() 或 the_excerpt() 来显示内容的，两个都挂上
add_filter('the_content', 'wue_get_excerpt', 20);
add_filter('the_excerpt', 'wue_get_excerpt', 20);

//后台选项菜单
add_action('admin_menu', 'utf8_excerpt_menu');


//warn them if they don't have mb_string functions
function utf8_excerpt_mb_warning() {
	$message = __( 'Your server does not seem to support the PHP <strong>mbstring</strong> library. The plugin can work, but will be extremely <strong>inefficient</strong>. It is strongly recommended to contact your server provider and ask them to enable mbstring.', 'wp-utf8-excerpt');
	echo '<div id="message" class="notice notice-warning">';
	echo '<p><strong>WP-UTF8-Excerpt: </strong>'.$message.'</p>';
	echo '</div>';
}

/* if the host doesn't support the mb_ functions, we have to define them. */
if ( !function_exists('mb_strlen') ) {

	//warn them if they don't have mb_string functions
	add_action('admin_notices', 'utf8_excerpt_mb_warning');

	//From Yskin's wp-CJK-excerpt, thanks to Yskin.
	function mb_strlen ($text, $encode) {
		if ($encode=='UTF-8') {
			return preg_match_all('%(?:
					  [\x09\x0A\x0D\x20-\x7E]           # ASCII
					| [\xC2-\xDF][\x80-\xBF]            # non-overlong 2-byte
					|  \xE0[\xA0-\xBF][\x80-\xBF]       # excluding overlongs
					| [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
					|  \xED[\x80-\x9F][\x80-\xBF]       # excluding surrogates
					|  \xF0[\x90-\xBF][\x80-\xBF]{2}    # planes 1-3
					| [\xF1-\xF3][\x80-\xBF]{3}         # planes 4-15
					|  \xF4[\x80-\x8F][\x80-\xBF]{2}    # plane 16
					)%xs',$text,$out);
		}else{
			return strlen($text);
		}
	}
}

if (!function_exists('mb_substr')) {
	//warn them if they don't have mb_string functions
	add_action('admin_notices', 'utf8_excerpt_mb_warning');

	//from Internet, author unknown
	function mb_substr($str, $start, $len = '', $encoding="UTF-8"){
		$limit = strlen($str);

		for ($s = 0; $start > 0;--$start) {// found the real start
			if ($s >= $limit)
				break;

			if ($str[$s] <= "\x7F")
				++$s;
			else {
				++$s; // skip length

				while ($str[$s] >= "\x80" && $str[$s] <= "\xBF")
					++$s;
			}
		}

		if ($len == '')
			return substr($str, $s);
		else
			for ($e = $s; $len > 0; --$len) {//found the real end
				if ($e >= $limit)
					break;

				if ($str[$e] <= "\x7F")
					++$e;
				else {
					++$e;//skip length

					while ($str[$e] >= "\x80" && $str[$e] <= "\xBF" && $e < $limit)
						++$e;
				}
			}

		return substr($str, $s, $e - $s);
	}
}
/* end of mb_ functions definition */


/**
 * 生成摘要并显示
 * WP 自带的 get_the_content() 和 get_the_excerpt() 都进行了很多绕来绕去的处理，一个个适配起来不胜其烦，干脆从头获取内容，干净地处理
 * @hooked the_content & the_excerpt
 *
 * @param string $text
 *
 * @return string
 */
function wue_get_excerpt($text){
	//如果不是列表页，直接返回原文
	if ( !is_home() && !is_archive() && !is_search() ) {
		return $text;
	}

	$post = get_post();

	//如果有密码保护
	if ( post_password_required( $post ) ) {
		return get_the_password_form( $post );
	}

	//否则，获取全文和手动摘要
    $content = $post->post_content;
	$manual_excerpt = $post->post_excerpt;

	//获取插件设置
	$settings = wue_get_settings();

	//如果手动设置了摘要，则使用手动摘要
	if ( !empty($manual_excerpt) ) {
		$excerpt = $manual_excerpt;
    }
	//如果有 <!--more--> 标签，则把这个标签之前的当作摘要
    elseif ( preg_match( '/<!--more(.*?)?-->/', $content, $matches ) ) {
		$content = explode( $matches[0], $content, 2 );
	    $excerpt = $content[0];
	}
	//否则在全文的基础上根据字数和允许标签截取摘要
	else {
		$content = strip_shortcodes( $content );
		//excerpt_remove_blocks 是 WP 5.0 才加入的函数，有可能没有
        if (function_exists('excerpt_remove_blocks')){
	        $content = excerpt_remove_blocks( $content );
        }
		$content = str_replace( ']]>', ']]&gt;', $content );

		$excerpt = wue_truncate($content, $settings['length'], $settings['allowed_tag']);
	}

	//在摘要末尾添加的标记，如省略号、“阅读更多”之类
	$excerpt .= $settings['more'];

	$excerpt = force_balance_tags($excerpt);

	//允许其他 filter 发挥作用；为避免循环，这里要先移除本 filter 再加上
	remove_filter('the_excerpt', 'wue_get_excerpt' ,20);
	$excerpt = apply_filters( 'the_excerpt', $excerpt);
	add_filter('the_excerpt', 'wue_get_excerpt' ,20);

	return $excerpt;
}


/**
 * 把文本截取到需要的字数
 *
 * @param string $text 原文
 * @param int $length 需要的字数
 * @param string $allowed_tag 允许的 HTML 标签，格式如 '<a><img>'
 *
 * @return string 截取之后的文本
 */
function wue_truncate($text, $length, $allowed_tag){
	$text = strip_tags($text, $allowed_tag);
	$text = trim($text);

	//check if the character is worth counting (ie. not part of an HTML tag). From Bas van Doren's Advanced Excerpt, thanks to Bas van Doren.
	$num = 0;
	$in_tag = false;
	for ($i=0; $num<$length || $in_tag; $i++) {
		if(mb_substr($text, $i, 1) == '<')
			$in_tag = true;
        elseif(mb_substr($text, $i, 1) == '>')
			$in_tag = false;
        elseif(!$in_tag)
			$num++;
	}
	$text = mb_substr ($text,0,$i, 'utf-8');

	$text = trim($text);

	return $text;
}


/**
 * 获取用户的设置，如果用户没设则给一个默认值
 *
 * @return array 数组形式返回设置
 */
function wue_get_settings(){
	$home_length = get_option('home_excerpt_length') ? get_option('home_excerpt_length') : 300;
	$archive_length = get_option('archive_excerpt_length') ? get_option('archive_excerpt_length') : 150;
	//当年好像笔误写成了 allowd_tag，为了不影响老用户只好保留了
	$allowed_tag = get_option('allowd_tag') ? get_option('allowd_tag') : '<a><b><blockquote><br><cite><code><dd><del><div><dl><dt><em><h1><h2><h3><h4><h5><h6><i><img><li><ol><p><pre><span><strong><ul>';
	$more_token = get_option('read_more_link') ? get_option('read_more_link') : __( 'Read more', 'wp-utf8-excerpt');
	$more = '[......]'.'<p class="read-more"><a href="'.get_permalink().'">'.$more_token.'</a></p>';

	if ( is_home()) {
		$length = $home_length;
	} else {
		$length = $archive_length;
	}

	$settings = array(
		'home_length' => $home_length,
		'archive_length' => $archive_length,
		'more_token' => $more_token,
		'length' => $length,
	    'allowed_tag' => $allowed_tag,
        'more' => $more,
    );

	return $settings;
}


/* the options  */
function utf8_excerpt_menu(){
	add_options_page(__( 'Excerpt Options' , 'wp-utf8-excerpt'), __( 'Excerpt Options' , 'wp-utf8-excerpt'), 8, __FILE__, 'utf8_excerpt_options');	
}

function utf8_excerpt_options() {
	$settings = wue_get_settings();
	?>
<div class="wrap">
    <h2>
        <?php _e( 'Excerpt Options' , 'wp-utf8-excerpt'); ?>
    </h2>

<form name="form1" method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<!-- If the options are not set, load the default values.  -->
<table class="form-table">
	<tr valign="top">
		<th scope="row"><label for="home_excerpt_length"><?php _e('Length of excerpts on homepage:' , 'wp-utf8-excerpt'); ?></label></th>
		<td><input type="text" id="home_excerpt_length" name="home_excerpt_length" value="<?php echo $settings['home_length']; ?>" /><?php _e('characters' , 'wp-utf8-excerpt'); ?></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="archive_excerpt_length"><?php _e('Length of excerpts on archive pages:' , 'wp-utf8-excerpt'); ?></label></th>
		<td><input type="text" id="archive_excerpt_length" name="archive_excerpt_length" value="<?php echo $settings['archive_length']; ?>"/><?php _e('characters' , 'wp-utf8-excerpt'); ?></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="allowed_tag"><?php _e('Allow these HTML tags:' , 'wp-utf8-excerpt'); ?></label></th>
		<td><input type="text" id="allowed_tag" name="allowd_tag" value="<?php echo $settings['allowed_tag']; ?>" style="width:100%"/></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="read_more_link"><?php _e('Display the "read more" link as:' , 'wp-utf8-excerpt'); ?></label></th>
		<td><input type="text" id="read_more_link" name="read_more_link" value="<?php echo $settings['more_token']; ?>"/></td>
	</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="home_excerpt_length,archive_excerpt_length, allowd_tag, read_more_link" />

<p class="submit">
<input type="submit" class="button-primary" name="Submit" value="<?php _e('Save Changes' , 'wp-utf8-excerpt') ?>" />
</p>

</form>
</div>
<?php
}
?>