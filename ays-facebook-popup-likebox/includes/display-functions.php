<?php
/**********************************************************
*DISPLAY FUNCTIONS
***********************************************************/

function ays_ays_nk_show_in_page(){
	global $ays_nk_options;
    $d_tabs = array();
    if($ays_nk_options['ays_nk_fb_timeL'] == "tl"){
        $d_tabs[] = "timeline";
    }
    if($ays_nk_options['ays_nk_fb_evS'] == "evS"){
        $d_tabs[] = "events";
    }
    if($ays_nk_options['ays_nk_fb_mS'] == "mS"){
        $d_tabs[] = "messages";
    }
    $d_tabs_str = implode(",",$d_tabs);
    
	echo "<style>".$ays_nk_options['ays_nk_ccss']."</style>";

	if($ays_nk_options['soe2'] == "all")
	{
			?>					
				<div id="fb-root"></div>
				<script>
					window.fbAsyncInit = function() {
						FB.init({
						appId      : '470384213171375', // App ID

						status     : true, // check login status
						cookie     : true, // enable cookies to allow the server to access the session
						xfbml      : true  // parse XFBML
						});
					};
					(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "https://connect.facebook.net/en_US/all.js&appId=470384213171375";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>

				<div class="nar_overlay" id="nar_over"> 
				</div> 
				<div class="nar_modal1" id="nar_mod1">
					<div class="nar_modal" id="nar_mod" style="width:<?php echo $ays_nk_options['width'].'px'; ?>;
        height:<?php echo $ays_nk_options['height'].'px'; ?>;">
						<a id="ays_nk_close" class="ays_nk_cl" onclick="ays_nk_close_all()">X</a>
						<div id="ays_nk_head">
							<h4 id="user_desc"><b><i><?php echo $ays_nk_options['tbl']; ?></i></b></h4>
						</div>

						<div id="ays_nk_fb">
                            <div class="fb-page" data-href="<?php echo $ays_nk_options['fb_url']; ?>" data-tabs="<?php echo $d_tabs_str; ?>" data-small-header="<?php if($ays_nk_options['ays_nk_fb_chgs1']=="sm"){echo true;} else{echo false;} ?>" data-adapt-container-width="true" data-hide-cover="<?php if($ays_nk_options['ays_nk_fb_chgs2']=="hcf"){echo true;} else{echo false;} ?>" data-show-facepile="<?php if($ays_nk_options['ays_nk_fb_chgs3']=="sff"){echo true;} else{echo false;} ?>" data-width="<?php echo ($ays_nk_options['width']-36); ?>" data-height="<?php echo ($ays_nk_options['height']-100); ?>">
                                <div class="fb-xfbml-parse-ignore">
                                    <blockquote cite="<?php echo $ays_nk_options['fb_url']; ?>">
                                        <a href="<?php echo $ays_nk_options['fb_url']; ?>"></a>
                                    </blockquote>
                                </div>
                            </div>
						</div>
						<div class="ays_nk_timer" id="ays_nk_timer">
							<p id="ays_nk_p">It will be close after: <label id="ays_nk_time_label"></label> seconds </p>
						</div>	
					</div>
<script>
    var ev = "<?php echo $d_tabs_str; ?>";
    var dac = "<?php if(!empty($ays_nk_options['dac'])) echo "checked"; ?>";
    if(dac=="checked"){
        document.getElementById("ays_nk_p").style.display = "none";
    }
    function ays_nk_close_all(){
		jQuery("#nar_over").fadeOut(2000);
		jQuery("#nar_mod1").fadeOut(2000);
		jQuery("#nar_mod").fadeOut(3000);
    }
</script>
<script>
    var tim=<?php echo $ays_nk_options['aucl']; ?>;
    var st=setInterval(ays_nk_auto_close,1000);
    function ays_nk_auto_close(){
        document.getElementById("ays_nk_time_label").innerHTML = "<b>"+tim+"</b>";
        tim=tim-1;
        if(tim==0){
			jQuery("#nar_over").fadeOut(2000);
			jQuery("#nar_mod1").fadeOut(2000);
			jQuery("#nar_mod").fadeOut(3000);
            clearInterval(st);						
        }
    }
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#nar_over").fadeIn(2000);
		jQuery("#nar_mod1").fadeIn(2000);
		jQuery("#nar_mod").fadeIn(3000);
	});
</script>
				</div>
			<?php
	}    
else if($ays_nk_options['soe1'] == "home")
	{
			if(is_front_page())
			{
				?>					
				<div id="fb-root"></div>
				<script>
					window.fbAsyncInit = function() {
						FB.init({
						appId      : '470384213171375', // App ID

						status     : true, // check login status
						cookie     : true, // enable cookies to allow the server to access the session
						xfbml      : true  // parse XFBML
						});
					};
					(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "https://connect.facebook.net/en_US/all.js&appId=470384213171375";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
				<div class="nar_overlay" id="nar_over"> 
				</div> 
				<div class="nar_modal1" id="nar_mod1">
					<div class="nar_modal" id="nar_mod" style="width:<?php echo $ays_nk_options['width'].'px'; ?>;
        height:<?php echo $ays_nk_options['height'].'px'; ?>;">
						<a id="ays_nk_close" class="ays_nk_cl" onclick="ays_nk_close_all()">X</a>
						<div id="ays_nk_head">
							<h4 id="user_desc"><b><i><?php echo $ays_nk_options['tbl']; ?></i></b></h4>
						</div>

						<div id="ays_nk_fb">
                            <div class="fb-page" data-href="<?php echo $ays_nk_options['fb_url']; ?>" data-tabs="<?php echo $d_tabs_str; ?>" data-small-header="<?php if($ays_nk_options['ays_nk_fb_chgs1']=="sm"){echo true;} else{echo false;} ?>" data-adapt-container-width="true" data-hide-cover="<?php if($ays_nk_options['ays_nk_fb_chgs2']=="hcf"){echo true;} else{echo false;} ?>" data-show-facepile="<?php if($ays_nk_options['ays_nk_fb_chgs3']=="sff"){echo true;} else{echo false;} ?>" data-width="<?php echo ($ays_nk_options['width']-36); ?>" data-height="<?php echo ($ays_nk_options['height']-100); ?>">
                                <div class="fb-xfbml-parse-ignore">
                                    <blockquote cite="<?php echo $ays_nk_options['fb_url']; ?>">
                                        <a href="<?php echo $ays_nk_options['fb_url']; ?>"></a>
                                    </blockquote>
                                </div>
                            </div>
						</div>
						<div class="ays_nk_timer" id="ays_nk_timer">
							<p id="ays_nk_p">It will be close after: <label id="ays_nk_time_label"></label> seconds </p>
						</div>	
					</div>
<script>
    var ev = "<?php echo $d_tabs_str; ?>";
    var dac = "<?php if(!empty($ays_nk_options['dac'])) echo "checked"; ?>";
    if(dac=="checked"){
        document.getElementById("ays_nk_p").style.display = "none";
    }
    function ays_nk_close_all(){
        document.getElementById("nar_over").style.display = "none";
        document.getElementById("nar_mod").style.display = "none";
        document.getElementById("nar_mod1").style.display = "none";
    }
</script>
<script>
    var tim=<?php echo $ays_nk_options['aucl']; ?>;
    var st=setInterval(ays_nk_auto_close,1000);
    function ays_nk_auto_close(){
        document.getElementById("ays_nk_time_label").innerHTML = "<b>"+tim+"</b>";
        tim=tim-1;
        if(tim==0){
            document.getElementById("nar_over").style.display = "none";
            document.getElementById("nar_mod").style.display = "none";
            document.getElementById("nar_mod1").style.display = "none";
            clearInterval(st);						
        }
    }
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#nar_over").fadeIn(2000);
		jQuery("#nar_mod1").fadeIn(2000);
		jQuery("#nar_mod").fadeIn(3000);
	});
</script>
				</div>
			<?php
		}
	}
 if($ays_nk_options['soe3'] == "pos"){
        if(is_singular())
			{
?>					
				<div id="fb-root"></div>
				<script>
					window.fbAsyncInit = function() {
						FB.init({
						appId      : '470384213171375', // App ID

						status     : true, // check login status
						cookie     : true, // enable cookies to allow the server to access the session
						xfbml      : true  // parse XFBML
						});
					};
					(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "https://connect.facebook.net/en_US/all.js&appId=470384213171375";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>

				<div class="nar_overlay" id="nar_over"> 
				</div> 
				<div class="nar_modal1" id="nar_mod1">
					<div class="nar_modal" id="nar_mod" style="width:<?php echo $ays_nk_options['width'].'px'; ?>;
        height:<?php echo $ays_nk_options['height'].'px'; ?>;">
						<a id="ays_nk_close" class="ays_nk_cl" onclick="ays_nk_close_all()">X</a>
						<div id="ays_nk_head">
							<h4 id="user_desc"><b><i><?php echo $ays_nk_options['tbl']; ?></i></b></h4>
						</div>

						<div id="ays_nk_fb">
                            <div class="fb-page" data-href="<?php echo $ays_nk_options['fb_url']; ?>" data-tabs="<?php echo $d_tabs_str; ?>" data-small-header="<?php if($ays_nk_options['ays_nk_fb_chgs1']=="sm"){echo true;} else{echo false;} ?>" data-adapt-container-width="true" data-hide-cover="<?php if($ays_nk_options['ays_nk_fb_chgs2']=="hcf"){echo true;} else{echo false;} ?>" data-show-facepile="<?php if($ays_nk_options['ays_nk_fb_chgs3']=="sff"){echo true;} else{echo false;} ?>" data-width="<?php echo ($ays_nk_options['width']-36); ?>" data-height="<?php echo ($ays_nk_options['height']-100); ?>">
                                <div class="fb-xfbml-parse-ignore">
                                    <blockquote cite="<?php echo $ays_nk_options['fb_url']; ?>">
                                        <a href="<?php echo $ays_nk_options['fb_url']; ?>"></a>
                                    </blockquote>
                                </div>
                            </div>
						</div>
						<div class="ays_nk_timer" id="ays_nk_timer">
							<p id="ays_nk_p">It will be close after: <label id="ays_nk_time_label"></label> seconds </p>
						</div>	
					</div>
<script>
    var ev = "<?php echo $d_tabs_str; ?>";
    var dac = "<?php if(!empty($ays_nk_options['dac'])) echo "checked"; ?>";
    if(dac=="checked"){
        document.getElementById("ays_nk_p").style.display = "none";
    }
    function ays_nk_close_all(){
        document.getElementById("nar_over").style.display = "none";
        document.getElementById("nar_mod").style.display = "none";
        document.getElementById("nar_mod1").style.display = "none";
    }
</script>
<script>
    var tim=<?php echo $ays_nk_options['aucl']; ?>;
    var st=setInterval(ays_nk_auto_close,1000);
    function ays_nk_auto_close(){
        document.getElementById("ays_nk_time_label").innerHTML = "<b>"+tim+"</b>";
        tim=tim-1;
        if(tim==0){
            document.getElementById("nar_over").style.display = "none";
            document.getElementById("nar_mod").style.display = "none";
            document.getElementById("nar_mod1").style.display = "none";
            clearInterval(st);						
        }
    }
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#nar_over").fadeIn(2000);
		jQuery("#nar_mod1").fadeIn(2000);
		jQuery("#nar_mod").fadeIn(3000);
	});
</script>
				</div>
			<?php
		}
    }
 if($ays_nk_options['soe4'] == "archives"){
        if(is_archive())
			{
?>					
				<div id="fb-root"></div>
				<script>
					window.fbAsyncInit = function() {
						FB.init({
						appId      : '470384213171375', // App ID

						status     : true, // check login status
						cookie     : true, // enable cookies to allow the server to access the session
						xfbml      : true  // parse XFBML
						});
					};
					(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "https://connect.facebook.net/en_US/all.js&appId=470384213171375";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>

				<div class="nar_overlay" id="nar_over"> 
				</div> 
				<div class="nar_modal1" id="nar_mod1">
					<div class="nar_modal" id="nar_mod" style="width:<?php echo $ays_nk_options['width'].'px'; ?>;
        height:<?php echo $ays_nk_options['height'].'px'; ?>;">
						<a id="ays_nk_close" class="ays_nk_cl" onclick="ays_nk_close_all()">X</a>
						<div id="ays_nk_head">
							<h4 id="user_desc"><b><i><?php echo $ays_nk_options['tbl']; ?></i></b></h4>
						</div>

						<div id="ays_nk_fb">
                            <div class="fb-page" data-href="<?php echo $ays_nk_options['fb_url']; ?>" data-tabs="<?php echo $d_tabs_str; ?>" data-small-header="<?php if($ays_nk_options['ays_nk_fb_chgs1']=="sm"){echo true;} else{echo false;} ?>" data-adapt-container-width="true" data-hide-cover="<?php if($ays_nk_options['ays_nk_fb_chgs2']=="hcf"){echo true;} else{echo false;} ?>" data-show-facepile="<?php if($ays_nk_options['ays_nk_fb_chgs3']=="sff"){echo true;} else{echo false;} ?>" data-width="<?php echo ($ays_nk_options['width']-36); ?>" data-height="<?php echo ($ays_nk_options['height']-100); ?>">
                                <div class="fb-xfbml-parse-ignore">
                                    <blockquote cite="<?php echo $ays_nk_options['fb_url']; ?>">
                                        <a href="<?php echo $ays_nk_options['fb_url']; ?>"></a>
                                    </blockquote>
                                </div>
                            </div>
						</div>
						<div class="ays_nk_timer" id="ays_nk_timer">
							<p id="ays_nk_p">It will be close after: <label id="ays_nk_time_label"></label> seconds </p>
						</div>	
					</div>
<script>
    var ev = "<?php echo $d_tabs_str; ?>";
    var dac = "<?php if(!empty($ays_nk_options['dac'])) echo "checked"; ?>";
    if(dac=="checked"){
        document.getElementById("ays_nk_p").style.display = "none";
    }
    function ays_nk_close_all(){
        document.getElementById("nar_over").style.display = "none";
        document.getElementById("nar_mod").style.display = "none";
        document.getElementById("nar_mod1").style.display = "none";
    }
</script>
<script>
    var tim=<?php echo $ays_nk_options['aucl']; ?>;
    var st=setInterval(ays_nk_auto_close,1000);
    function ays_nk_auto_close(){
        document.getElementById("ays_nk_time_label").innerHTML = "<b>"+tim+"</b>";
        tim=tim-1;
        if(tim==0){
            document.getElementById("nar_over").style.display = "none";
            document.getElementById("nar_mod").style.display = "none";
            document.getElementById("nar_mod1").style.display = "none";
            clearInterval(st);						
        }
    }
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#nar_over").fadeIn(2000);
		jQuery("#nar_mod1").fadeIn(2000);
		jQuery("#nar_mod").fadeIn(3000);
	});
</script>
				</div>
			<?php
		}
    }
}	
add_action('wp_head','ays_ays_nk_show_in_page');
?>