$=jQuery
$(document).on('change', 'select#exclude_ids.async', function(e){
  value = $(this).find('option:selected').attr('value')
  message = $(this).find('option:selected').attr('message')  
  html = '<div class="notice notice-success">' + message + '</div>'
  url = '/wp-admin/index.php?update_exclude_ids&ids=' + value
  $.ajax({
    url: url,
    method: 'GET',
    success: function(){
      $('.kaboom-alert').html(html)
    }
  })
})
$(document).on('click', '.leave-a-review a.dismiss', function(e){
  e.preventDefault()
  var ele = $(this)
  $.ajax({
    url: $(this).attr('href'),
    method: 'GET',
    success: function(){
      ele.parents('.leave-a-review').fadeOut()
      $('.wrap h1').append('<div class="notice notice-success"><p>Message dismissed for the XML/HTML Sitemap Generator by Kaboom plugin!</p></div>')
    }
  })
})