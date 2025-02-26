<?php 
defined('ABSPATH') or die('No script kiddies please!');
wp_enqueue_style( 'style404' ,plugins_url("/style.css", __FILE__));
// инициализация сеанса
$ch = curl_init("https://www.random.org/integers/?num=36&min=0&max=1&col=1&base=10&format=plain&rnd=new");
if($ch){
// установка URL и других необходимых параметров
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 23);
curl_setopt($ch, CURLOPT_FAILONERROR, 23);
// загрузка страницы и выдача её браузеру
$randoms = curl_exec($ch);
curl_close($ch);
}
	
if($randoms != false){
$randoms = explode("\n",$randoms);
}

$skinFolder =  get_option('skin-404tboc').'/';
// завершение сеанса и освобождение ресурсов

?>
<?php if(!$restart){ echo '<div>';} ?>
<div id = "content404" style ="display:none ;">
<div class = "startText404">
<?php echo get_option('startText404tboc'); ?>
<p style = "float: left; text-align: center; width: 100%;"><input type="button" value ="<?php echo get_option('text-button-continue404tboc'); ?>" onClick="getRandTable404()"/></p>
</div>

<div class = "firstBlock404" style ="display:none ;">
<div class="blockRandTable404">
<div class="blockRandTable404__wrapper">
<div class= "randTable404">
<?php 
for($i=0;$i<36;$i++)
{
	echo "<div class='randblock404' onclick='clickASK404(this)' >"; 
if($randoms != false){
	$rand = $randoms[$i];

}
else{
	$rand = rand(0,1);	
}
     echo "<div class='num404' style = 'display: none;'><img src='".plugins_url('/skins/'.$skinFolder .$rand.'.png', __FILE__)."' alt=''> <div hidden >".$rand."</div></div>";
	 echo "<div class = 'ask404' ><img src='".plugins_url('/skins/'.$skinFolder.'ask.png', __FILE__)."' alt=''></div></div>";
}
?>
</div>
</div>
</div>
<div class="blockanswerTable404">
<div class="answerTable404__wrapper">
<div class="answerTable404">
<div class='answerblock404'><div id="answerblock4041"><img src='<?php echo plugins_url('/skins/'.$skinFolder.'none.png', __FILE__); ?>' alt=''></div></div>
<div class='answerblock404'><div id="answerblock4042"><img src='<?php echo plugins_url('/skins/'.$skinFolder.'none.png', __FILE__); ?>' alt=''></div></div>
<div class='answerblock404'><div id="answerblock4043"><img src='<?php echo plugins_url('/skins/'.$skinFolder.'none.png', __FILE__); ?>' alt=''></div></div>
<div class='answerblock404'><div id="answerblock4044"><img src='<?php echo plugins_url('/skins/'.$skinFolder.'none.png', __FILE__); ?>' alt=''></div></div>
<div class='answerblock404'><div id="answerblock4045"><img src='<?php echo plugins_url('/skins/'.$skinFolder.'none.png', __FILE__); ?>' alt=''></div></div>
<div class='answerblock404'><div id="answerblock4046"><img src='<?php echo plugins_url('/skins/'.$skinFolder.'none.png', __FILE__); ?>' alt=''></div></div>
</div>
</div>
</div>
</div>
</div>
<div id = "cssload-container404" class="cssload-container" style = 'display: none; width: 100%;'>
	<ul class="cssload-flex-container">
		<li>
			<span class="cssload-loading cssload-one"></span>
			<span class="cssload-loading cssload-two"></span>
			<span class="cssload-loading-center"></span>
		</li>
	</div>
	<p style = "text-align: center; width: 100%;"><input type="button" value ='<?php echo get_option('text-button-main404tboc'); ?>' onClick="getHomePage404()"/></p>

	<?php if (get_option('is-text-support404tboc') == '1') {?>
	<p style = "max-width: 23%;margin-left: auto; font-size: 75%;"><?php _e('A team ','wp-404tboc-page'); ?><a href="https://socpravo.ru">socpravo.ru</a></p>
<?php } ?>

<script>
var Ianswer = 1;
  var numful = '';
  jQuery("#content404").fadeIn(600);  // "проявится" за 600 мс
	function clickASK404(a)
	{   
	  
		if(Ianswer < 7){
		var num = jQuery(a).children(".num404");
		jQuery(a).children(".ask404").fadeOut(200 ,function() {//скрываем вопрос
			num.fadeIn(200);		//показываем цифру
		});

		jQuery("#answerblock404"+Ianswer).html(num.html());
		numful = numful+ num.children("div").html();
		jQuery(a).removeAttr("onclick");
		if(Ianswer ==6){
			
			getText404(numful)
			
		}
		Ianswer++;
		}
	}
   function getText404(n)
   {
	    jQuery(".firstBlock404").fadeOut(600 ,function() {
			jQuery("#cssload-container404").fadeIn(200);
	   jQuery.post("<?php echo admin_url('admin-ajax.php');?>",{action:"random_text_wp_404tboc",rand:n,nonce:'<?php echo  wp_create_nonce('nonce_content404tboc'); ?>'},function(data) {
		     
			jQuery('#content404').html('');
		   jQuery('#content404').append(data); 
		//   jQuery(".blockRandTable404").fadeIn(600);  // "проявится" за 600 м
		  
	   });
	   });
	   
   }   
      function getRandTable404()
	  {
		  jQuery(".startText404").fadeOut(600,function(data) { jQuery(".firstBlock404").fadeIn(600); }); 
	  }
	  function restart404()
	  {
		  jQuery(".blockRandTable404").fadeOut(600 ,function() {
			  jQuery("#cssload-container404").fadeIn(200);
	   jQuery.post("<?php echo admin_url('admin-ajax.php');?>",{action:"restart_404tboc"},function(data) {
		     parent = jQuery('#content404').parent();
			 parent.html('');
		   parent.append(data);
		  jQuery("#content404").fadeIn(600); 
	   });
	   });
	  }
	  function getHomePage404()
	  {
		 window.location = "<?php echo home_url();?>";
	  }
</script>
<?php if(!$restart){ echo '</div>';} ?>