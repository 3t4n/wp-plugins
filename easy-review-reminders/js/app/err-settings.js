jQuery(document).ready(function($){

    // Use Default Email Template Body
    var errDefaultContent = $('#err-show-default-template');

    $(this.body).on("click", "#err-use-default-email-content", function(e){
        e.preventDefault();
        $(errDefaultContent).slideToggle("fast");
    });
    
});