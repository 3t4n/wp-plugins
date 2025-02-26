jQuery(document).ready(function($) {
    $('.ec-count-number').each(function(){
    	var $this = $(this);
    	$switch = $this.data('enable');
    	$delay = $this.data('delay');
    	$duration = $this.data('duration');

    	if(typeof($delay) != "undefined" && $delay !== null){
    	}else{
    		$delay = '10';
    	}

    	if(typeof($duration) != "undefined" && $duration !== null){
    	}else{
    		$duration = '2000';
    	}

    	if($switch == 'on'){
    		$this.counterUp({
		        delay: $delay,
		        time: $duration
		    });
    	}
    });
});