/**** Function to check blank field when creating a new section  ****/
jQuery( document ).ready(function() {
	jQuery( "#addpostsection.button-primary" ).click(function() {
		if(jQuery("#pname").val()=='')
		{
			jQuery(".error_msg").text('List name must not be blank.');
			return false;
		}
		return true;
	});
});
 
/**** Function for Post Sorting - Drag and Drop ****/
function cpo_orderPosts() {
	var newOrder = jQuery("#PostOrderList").sortable("toArray");
	console.log( newOrder );
}

function cpo_mypostorderaddloadevent(){
	jQuery("#PostOrderList").sortable({ 
		placeholder: "sortable-placeholder", 
		revert: false,
		tolerance: "pointer" 
	});
};
addLoadEvent( cpo_mypostorderaddloadevent );

/**** Function for save Post Order on update - Page 2 ****/   
jQuery( document ).ready(function() {
	var order_posts="";
	jQuery( '#send' ).click(function() {
		/* Get Post IDs and Insert in Hidden Fiels */
		jQuery( "#PostOrderList li" ).each(function( index ) {
			order_posts = order_posts +","+jQuery(this).attr('id'); 
		});
		order_posts=order_posts.substring(1, order_posts.length);
		jQuery('input[name=postid]').val(order_posts).val();
		
	});
});
/**** Function for section delete confirmation ****/
function confirmdelete(){
	var x;
	var r=confirm("Are you sure you want to delete");
	if (r==true){ 
		return true;
	}
	else{
		return false;
	}
}
/**** Function for checkAll and UncheckAll Sections ****/
jQuery(function () {
    jQuery("#checkAll").click(function () {
        if (jQuery("#checkAll").is(':checked')) {
            jQuery(".checkItem").prop("checked", true);
        } else {
            jQuery(".checkItem").prop("checked", false);
        }
    });
});
