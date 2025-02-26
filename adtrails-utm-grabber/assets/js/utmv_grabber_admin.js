/*
 * 
 * utmv grabber frontend Javascript
 * 
 * @since 1.0.0
 * 
 */
var UtmvGrabberAdmin;
(function ($) {
    var $this;
    UtmvGrabberAdmin = {
        settings: {
            
        },
        initilaize: function () {
            $this = UtmvGrabberAdmin;
            $(document).ready(function () {
                $this.onInitMethods();
            });
        },
        onInitMethods: function () {
		}, 
		openProPopup: function () {
			// Get the modal
			var modal = document.getElementById("proPopup");
			
			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("ad_close")[0];
			
			// When the user clicks the button, open the modal 			
			modal.style.display = "block";			
		},		
		openActivateProPopup: function () {
			// Get the modal
			var modal = document.getElementById("proActivatePopup");
			
			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("ad_close")[0];
			
			// When the user clicks the button, open the modal 			
			modal.style.display = "block";			
		},
		spanCloseBtn: function () {
			var modal = document.getElementById("proPopup");
			modal.style.display = "none";
		}
    };
    UtmvGrabberAdmin.initilaize();
})(jQuery);