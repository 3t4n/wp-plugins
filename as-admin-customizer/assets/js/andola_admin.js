// // Change tab class and display content
jQuery(document).ready(function($) {
$('.tabs-nav .andola_tab').on('click', function (event) {
    event.preventDefault();
    
    $('.tab-active').removeClass('tab-active');
    $(this).parent().addClass('tab-active');
    $('.tabs-stage div.andola_tab_sec').hide();
    $($(this).attr('href')).show();
});

$('.tabs-nav .andola_tab:first').trigger('click'); // Default

});

jQuery(document).ready(function($){
        $('a[data-toggle="tab"]').on('click', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
});
jQuery(window).load(function() {
        window.setTimeout(function(){
var activeTab = localStorage.getItem('activeTab');
jQuery('#myTab a[href="' + activeTab + '"]').trigger('click');
},1);
});

