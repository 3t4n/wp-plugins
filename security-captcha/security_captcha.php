<?php
/*
Plugin Name: Security Captcha
Plugin URI: http://0x90.com.ar
Description: Security Captcha es un sistema para prevenir spam de cualquier tito, tanto por personas como por scripts creados por personas. 
Author: 0x90 Security Labs!
Version: 1.1
Author URI: http://0x90.com.ar
*/

class se_captcha {
	var $version = '1.0';
	function se_captcha() {
		add_action('comment_form', array("se_captcha", "draw_form"), 9999);
		add_action('comment_post', array("se_captcha", "comment_post"));
	}
	function draw_form($id) {
	
		global $newCaptcha;
		global $user_ID;
		
		if( $_POST['err'] ) {
			add_action('comment_form', array("se_captcha", "errMsg"), 4);
		}
		
		if( $user_ID ) {
			return $id;
		}
		?>
<noscript><br /><br />
<div style="background-color:#FFBFC1; border:solid 1px #B30004; color: #B30004">
You need to enable javascript in order to use Simple CAPTCHA.</div></noscript>
<script type="text/javascript">
//<![CDATA[
var count = 0;
	function reloadCaptcha() {
		frm = document.getElementById("security_captcha");
		opacity("security_captcha", 100, 0, 300);
		count++;
		frm.src = "<?php bloginfo('url'); ?>/wp-content/plugins/security_captcha/imagen.php?re=" + count;
		opacity("security_captcha", 0, 100, 300);
	}
	
	function rand (mmin, mmax) {
  		return ( Math.floor ( Math.random () * 100000 ) % mmax ) + mmin;
	}
	
	function opacity(id, opacStart, opacEnd, millisec) {
		//speed for each frame
		var speed = Math.round(millisec / 100);
		var timer = 0;
	
		//determine the direction for the blending, if start and end are the same nothing happens
		if(opacStart > opacEnd) {
			for(i = opacStart; i >= opacEnd; i--) {
				setTimeout("changeOpac(" + i + ",'" + id + "')",(timer * speed));
				timer++;
			}
		} else if(opacStart < opacEnd) {
			for(i = opacStart; i <= opacEnd; i++)
				{
				setTimeout("changeOpac(" + i + ",'" + id + "')",(timer * speed));
				timer++;
			}
		}
	}

	//change the opacity for different browsers
	function changeOpac(opacity, id) {
		var object = document.getElementById(id).style;
		object.opacity = (opacity / 100);
		object.MozOpacity = (opacity / 100);
		object.KhtmlOpacity = (opacity / 100);
		object.filter = "alpha(opacity=" + opacity + ")";
	} 
	
	function pause( milisec ) {
		sleep = milisec;
    	begin = new Date();
		start = begin.getTime();
		done = false;
		
		while( !done ) {
			alarm = new Date();
			curr = alarm.getTime();
			if( curr - start > sleep) {
				done = true;
				return;
			}
		}
 	}
	
	ff = document.getElementById("commentform");
	ff.submit.style.display = "none";
	submitVal = ff.submit.value;
	
//]]>
</script>
<div id="se_captcha" style="display:none;">
<table style="width:100%;">
	<tr>
    	<td align="left" valign="middle" width="100">
        Security Code:<br />
        <input type="text" name="publicKey" style="width:90px;" maxlength="6" tabindex="5" class="textfield" />
        </td>
        <td align="left" valign="bottom" width="100">
        <img id="security_captcha" src="<?php bloginfo('url'); ?>/wp-content/plugins/security_captcha/imagen.php?re=0" title="Security Captcha v<?php echo $newCaptcha->version; ?> by 0x90.com.ar" alt="" /></td>
        <td align="left" valign="bottom">
        <img src="<?php bloginfo('url'); ?>/wp-content/plugins/security_captcha/imagen.php?id=1" onClick="setTimeout('reloadCaptcha()', 300)" 
        style="cursor:pointer" title="Recargar Imagen" alt="" />
        </td>
	</tr>
    <tr>
    	<td colspan="3" align="center"><br /><input name="submit2" type="submit" tabindex="6" value="Dummy" /></td>
    </tr>
</table>
</div>
	<script type="text/javascript">
//<![CDATA[
	ff2 = document.getElementById("se_captcha");
	ff2.style.display = "inline";
	ff.submit2.value = submitVal;
//]]>
</script><?php 
	}
	
	function errMsg() {
		?>
<script type="text/javascript">
//<![CDATA[
	// Copy back the data into the form
	ff = document.getElementById("commentform");
	ff.author.value = "<?php echo htmlspecialchars($_POST['author1']); ?>";
	ff.email.value = "<?php echo htmlspecialchars($_POST['email1']); ?>";
	ff.url.value = "<?php echo htmlspecialchars($_POST['url1']); ?>";
	ff.comment.value = "<?php $trans = array("\r" => '\r', "\n" => '\n');
	echo strtr(htmlspecialchars($_POST['comment1']), $trans); ?>";
	alert("Codigo Incorrecto!.");
//]]>
</script><?php
	}
	   function comment_post($id) {
		global $newCaptcha;
		global $user_ID;
		
		if( $user_ID ) {
			return $id;
		}
		
		session_start();
		$publicKey = $_POST['publicKey'];
		$secretKey = $_SESSION['secret'];
		
		if( $newCaptcha->validateKey($publicKey, $secretKey) ) {
			return $id;
		}
		
		wp_set_comment_status($id, 'delete');
		
		?><html>
		    <head><title>Invalid Code</title></head>
			<body>
				<form name="data" action="<?php echo $_SERVER['HTTP_REFERER']; ?>#comments" method="post">
					<input type="hidden" name="author1" value="<?php echo htmlspecialchars($_POST['author']); ?>" />
					<input type="hidden" name="email1" value="<?php echo htmlspecialchars($_POST['email']); ?>" />
					<input type="hidden" name="url1" value="<?php echo htmlspecialchars($_POST['url']); ?>" />
					<textarea style="display:none;" name="comment1"><?php echo htmlspecialchars($_POST['comment']); ?></textarea>
					<input type="hidden" name="err" value="1" />
				</form>
				<script type="text/javascript">
				<!--
				document.forms[0].submit();
				//-->
				</script>					
			</body>
		</html>
		<?php
		exit();
	}
	
      function validateKey($pub, $sec) {
		
		if( strtolower(md5(trim($pub))) == strtolower(trim($sec)) ) {
			return true;
		}
		return false;
	}
}

$newCaptcha = new se_captcha;

?>