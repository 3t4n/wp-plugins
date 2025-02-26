jQuery(document).ready(function($) {
    
$('.set_img_list_item').click(function(event)
{
  event.preventDefault();

  var uploader = wp.media(
  {
    title : 'Add image for list item',
    button : {
      text : 'Add',
    },
    multiple : false
  })

  .on('select', function()
  {
    var selection = uploader.state().get('selection');

    var attachements = [];

    selection.map(function(attachement)
    {
      attachement = attachement.toJSON();

      attachements.push([attachement.id, attachement.url, attachement.caption]);

      set_list_item_image_data(attachement.url);
      
    })

  })
  .open();

});
function set_list_item_image_data(url)
  {
    $('.list_item_image_src').attr('src', url);
    $('.list_item_image').val(url);
  }
  
});