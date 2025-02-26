<?php
class AYSHelper{
	public static function ays_redirect($url){
		?>
			<script>
				window.location.href = "<?php echo $url;?>";
			</script>
		<?php
	}
}
?>
