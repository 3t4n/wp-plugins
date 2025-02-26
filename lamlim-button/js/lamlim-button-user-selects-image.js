//Added function for firing off Lamlim's lamlim.js for "user selects image" button type
function execLamlim() {

	var e=document.createElement('script');
	e.setAttribute('type','text/javascript');
	e.setAttribute('charset','UTF-8');
	e.setAttribute('src','http://lamlim.com/pinit?r='+Math.random()*99999999);
	document.body.appendChild(e);


}

//Add click event for user-selects-image
jQuery(document).ready(function($) {
    $("a.lamlim-button-user-selects-image").click(function(event) {
        event.preventDefault();
        execLamlim();
    });
});
