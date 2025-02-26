<script>
var ab = function() {
	this.adbDetected;
	
	this.init = function() {
		this.ion();
		this.wsidn();
		this.ri();
        this.adbDetected = this.isOnScreen;
	}
	
	this.isOnScreen = function() {
    	this.adbDetected = document.getElementById("div-gpt-ad-1-0").offsetWidth === 0 || document.getElementById("div-gpt-ad-1-0").offsetHeight === 0;
		return document.getElementById("div-gpt-ad-1-0").offsetWidth === 0 || document.getElementById("div-gpt-ad-1-0").offsetHeight === 0;
	}
	
	this.ion = function() {
		document.body.insertAdjacentHTML("beforeEnd", '<div id="div-gpt-ad-1-0" style="width:1px;height:1px;margin:-1px;padding:0;border:none;"></div>');
	}
	
	this.ri = function() {
		document.getElementById("div-gpt-ad-1-0").remove();
	}
	
	this.wsidn = function() {
		if(this.isOnScreen()) {
			document.getElementsByTagName("html")[0].style.display.height =  "100%";
			document.getElementsByTagName("html")[0].style.overflow = "hidden";
			document.body.style.height = "100%";
			document.body.style.overflow = "hidden";
            
			document.body.insertAdjacentHTML("beforeEnd", '<div class="adb_overlay"><?php
            	switch(get_option("adb_display_status")) {
					case 0: echo '<div class="adb_modal"><p class="adb_detected">ADBLOCK DETECTED!</p><p class="adb_message">'.get_option("adb_display_message").'</p></div>';
						break;
					case 1: echo '<div class="adb_modal_img"><img src="'.get_option("adb_display_image").'"></div>';
						break;
				}
			
			?></div>');
		}
	}
}

var blocker = new ab();
</script>