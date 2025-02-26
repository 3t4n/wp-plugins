<?php include('../../../wp-config.php');
$site_url = get_option('siteurl');?>
// JavaScript ajax jquery document
///////////////////////////////////////////////////////////////////////////////////
jQuery(document).ready(function($) { 
	////////////////////////////////////////////////////////	
	var post_string = '';
	$.post("<?php echo $site_url; ?>/wp-admin/admin-ajax.php", {
            action: "check_notes",
            'cookie': encodeURIComponent(document.cookie),
            post_string: post_string
			
        },
        function(data) { 
		
		// alert(data.slice(-2));
			
			if(data.slice(-2) === 'no'){
			document.getElementById('asterisk').innerHTML = '';
			}else{
			document.getElementById('asterisk').innerHTML = '*';
			}
				
			
        });
/////////////////////////////////////////////////////////////
		//hide all of the notes elements with class hide_show

    $(".hide_show").hide(); 
	
		//toggle the componenet with class toggle
	
    $(".toggle").click(function() {
    $(this).next(".hide_show").slideToggle(600);
	
    });
});

//////////////////////////////////////////////////////////////////////////////////

jQuery(document).ready(function($) { //set the click function to div save_notes.

    $('#save_notes').click(function() {
	
        var notes_input = $("#notes_input").val(); 
		
		//action id php function in the plugin file - cookie is authorization to access the admin-ajax.php file 
		
$.post("<?php echo $site_url; ?>/wp-admin/admin-ajax.php", {
            action: "save_notes",
            'cookie': encodeURIComponent(document.cookie),
            notes_input: notes_input
        },
       function(data) { 
	   
}); //close function(data)
		

////////////////////////////
$.post("<?php echo $site_url; ?>/wp-admin/admin-ajax.php", {
            action: "update_adminnotes_page",
            'cookie': encodeURIComponent(document.cookie),
            notes_input: notes_input
        },
        function(data) { 
	
		 // alert(data);
		
		
		    document.getElementById('notes_input').value = '';
            document.getElementById('thenotes').innerHTML = '';
            document.getElementById('thenotes').innerHTML += data;
			
			document.getElementById('asterisk').innerHTML = '*';
			
			
        });
		
/////////////////////////////		
        return false;
		
    }); //close click
	
}); //close jquery

//////////////////////////////////////////////////////////////////////////////////

jQuery(document).ready(function($) {
    $('#del_notes').click(function() {
	
        var thenotes = $("#thenotes").val();
        var post_string = '';
		
        $('div#thenotes :checkbox:checked').each(function(i, o) {
            post_string += o.id + '|';
            $(this).next().remove();
            $(this).next().remove();
            $(this).next().remove();
            $(this).remove();
			
});
		
$.post("<?php echo $site_url; ?>/wp-admin/admin-ajax.php", {
            action: "del_notes",
            'cookie': encodeURIComponent(document.cookie),
            post_string: post_string
			
        },
        function(data) { 
		
		// alert(data.slice(-2));
			
			if(data.slice(-2) === 'no'){
			document.getElementById('asterisk').innerHTML = '';
			}
				
			
        });
		      
				

		return false;
		
    }); //close click
});
// Delay for a number of milliseconds

 function sleep(delay)
 {
     var start = new Date().getTime();
     while (new Date().getTime() < start + delay);
 }