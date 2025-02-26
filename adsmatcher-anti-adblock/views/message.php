<style>
.aclass-<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?> {
    font-family: "Open Sans";
    font-size: 21px;
}

.bclass-<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?> {
    font-family: "Open Sans";
    margin-bottom: 20px;
    font-size: 32px;
}

.popup<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?>wrap {
    z-index: 99999;
    width: 100%;
    height: 100%;
    display: none;
    position: fixed;
    top: 0px;
    left: 0px;
    content: "";
    background: rgba(0, 0, 0, 0.85);
}

.popup<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?>box {
    width: 400px;
    padding: 70px;
    transform: translate(-50%, -50%);
    position: fixed;
    top: 50%;
    left: 50%;
    box-shadow: 0px 2px 16px rgba(0, 0, 0, 0.5);
    border-radius: 3px;
    background: #fff;
    text-align: center;
}

.popup<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?>box h2 {
    color: #1a1a1a;
}

.popup<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?>box h3 {
    color: #888;
}

.popup<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?>box .close-<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?>-btn {
    font-family: "Open Sans";
    width: 35px;
    height: 35px;
    display: inline-block;
	position: absolute;
	top: 10px;
	right: 10px;
	-webkit-transition: all ease 0.5s;
	transition: all ease 0.5s;
	border-radius: 1000px;
	background: #cf142b;
	font-weight: bold;
	text-decoration: none;
	color: #fff;
	line-height: 190%;
}

.popup<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?>box .close-<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?>-btn:hover {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}

.refresh-<?php echo esc_attr(get_option('adsmatcher_uniqueid'));?>-btn {
    font-family: "Open Sans";
    background-color: #cf142b;
    border: none;
    color: #fff;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>

<div id="<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>" class="popup<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>wrap">
	<div class="popup<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>box">
		<h2 class="bclass-<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>"><?php echo esc_attr(get_option('adsmatcher_title')); ?></h2>
		<h3 class="aclass-<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>"><?php echo esc_attr(get_option('adsmatcher_message')); ?></h3>
		<a class="refresh-<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>-btn" onclick="location.reload();">Refresh Page</a>
		<div id="<?php echo esc_attr(get_option('adsmatcher_adblocker_dissimulation')); ?>"></div>
		<?php
		if(esc_attr(get_option('adsmatcher_display_clostebtn'))==1){
			echo "<a class='close-".esc_attr(get_option('adsmatcher_uniqueid'))."-btn' onclick='close".esc_attr(get_option('adsmatcher_uniqueid'))."pop();' href='#'>x</a>";
		}
		?>
	</div>
</div>

<script>
function close<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>pop(){
	document.getElementById("<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>").style.display = "none";
}

function fad<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>en(el, time) {
	el.style.opacity = 0;
	var last = +new Date();
	var tick = function(){
		el.style.opacity = +el.style.opacity + (new Date() - last) / time;
		last = +new Date();
		if(+el.style.opacity < 1){
		  (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
		}
	};
	tick();
}

async function de<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>ab(){
	let adBlockEnabled = false;
	const snURL = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js';
	const adsReq = new Request(snURL, {method: "HEAD",mode: "no-cors"});
	
	try{
		await fetch(adsReq).catch((err) => {adBlockEnabled = true; });
	}catch(e){
		adBlockEnabled = true;
	}finally{
		if(adBlockEnabled === true){
			var atop = document.getElementById("<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>");fad<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>en(atop, 300);
			document.getElementById("<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>").style.display = "block";
		}
	}
}

de<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>ab();
</script>