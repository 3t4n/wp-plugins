<?php
/**
 * @package Azkar
 * @version 1.0
 */
/*
Plugin Name: Azkar
Plugin URI: http://wordpress.org/extend/plugins/Azkar/
Description:  هذه الاضافة هى محاولة لاضفاء الروح الاسلامية على واجهة استخدام الوردبرس بحيث يظهر لمدير الموقع ‫-‬أثناء عمله فيه ‫-‬ بعض الأذكار فى الركن الايمن العلوى ‫.‬ الاضافة يمكن اعتبارها تعريبا لاضافة هالو دولى الشهيرة والتى قام ببرمجتها مبتكر الوردبرس ‫:‬ مات مالنويج ولكنه آثر أن تعرض مقتطفات من أشهر الأغنيات التى تمثل جيله وحماس شبابه‫.‬


This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Mohammed Yahia
Version: 1.0
Author URI: http://3orodegy.com
*/

function get_azkar() {
	/** هذه هى قائمة الأذكار .. يمكنك تبديلها بالأذكار المفضلة لك إن أحببت */
	$lyrics = "سبحان الله وبحمده
سبحان الله العظيم
لا حول ولا قوة إلا بالله
لا إله إلا أنت سبحانك إنى كنت من الظالمين
سبحان الله والحمد لله والله أكبر
أستغفر الله وأتوب إليه
أفضل الذكر : لا إله إلا الله
سبحانك ما عبدناك حق عبادتك
يا رب لك الحمد كما ينبغى لجلال وجهك وعظيم سلطانك
اللهم صل وسلم وبارك على نبينا محمد
اللهم إنك عفو كريم تحب العفو فاعف عنا
أستغفر الله وأتوب إليه
الحمد لله رب العالمين
اللهم لا سهل إلا ما جعلته سهلا
بسم الله الرحمن الرحيم
أعوذ بكلمات الله التامات من شر ما خلق
حسبى الله ونعم الوكيل
";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function azkar() {
	$chosen = get_azkar();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'azkar' );

// We need some CSS to position the paragraph
function azkar_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 10px;
padding-bottom: 10px;		
		margin: 0;
		font-size: 15px;

text-align: center;
background:#e4f2fd;
border-bottom-right-radius: 3px;
border-bottom-left-radius: 3px;
border-color: #e6db55;
color: #000;
display: block;
line-height: 19px;
border-width: 1px;
border-style: solid;
width:25%;
margin-right: 15px;

}

	}
	</style>
	";
}

add_action( 'admin_head', 'azkar_css' );

?>