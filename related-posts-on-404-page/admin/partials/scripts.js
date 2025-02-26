jQuery(document).ready(function($) {

  var $el = $('.related-posts-404');

  $el.on('click', 'a.select-all', function(event) {

    event.preventDefault();

    var el = $(this);

    $el.find('select#post_types').find('option').prop('selected', 'true');

  });

});
