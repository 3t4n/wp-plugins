
class SimpleBannerWidget {
  constructor(id, data = []) {
    this.id = id;
    this.widget = jQuery("#" + id);
    this.prefix = 'simple-banner-widget';
    this.data = data
    this.init();
  }
  init (){
    this.initPicker();
    this.initAdd();
  }
  initPicker(){
    this.widget.find('.upload-image-button').off("click")
    var me = this
    this.widget.find('.upload-image-button').on("click",function(e){
      e.preventDefault();      
      var aw_uploader = wp.media({
          title: 'Custom image',
          library : {
              // uploadedTo : wp.media.view.settings.post.id, 
              type : 'image',
          },
          button: {
              text: '設定',
          },
          multiple: false,
      }).on('select', function() {
          var attachment = aw_uploader.state().get('selection').first().toJSON();
          me.widget.find('.image_id').val(attachment.id); 
          me.widget.find('.image').val(attachment.sizes.thumbnail.url);  
      })
      .open();      
    }.bind(me))
  }
  initAdd() {
    this.widget.find(".add-button").off("click")
    var me = this
    this.widget.find(".add-button").on("click", function (e) {
      e.preventDefault(); 
      if (!me.widget.find('.image_id').val()) return
      var url = me.widget.find('.url').val();
      if (!url.match(/^(https?)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/)){
        url = "";
      }
      var image_id = me.widget.find('.image_id').val(); 
      var image = me.widget.find('.image').val(); 
      var dataInput = me.widget.find('.data');
      var data = dataInput.val();     
      var newData = {}

      var dataArray = (data)?JSON.parse(data):[];
      
      newData = {
        'image_id': image_id,
        'url': url,
        'order': dataArray.length,
        'thumbnail_url': image
      }
      dataArray.push(newData)


      dataInput.val(JSON.stringify(dataArray));
      me.viewDisplay(dataArray, me.widget.find('.view'));
      me.data = dataArray

      me.widget.find('.url').val("")
      me.widget.find('.image').val("")
      me.widget.find('.image_id').val("")
      me.widget.closest('form').find('.widget-control-actions .widget-control-save').prop('disabled', false).val('Save')                                    

      return false;
  }.bind(me))
  }
  viewDisplay(data, view) {

    var html = '<ul>';
    for(var i = 0; i < data.length; i++){
  
      html+= '<li>';
      html+= '<figure>';
      html+= '<a href="' + data[i]["url"] + '" rel="noopener noreferrer" target="_blank" style="height:20px;">';
      html+= '<img src="' + data[i]["thumbnail_url"] + '" alt="#" height="100%" width="100%" />';
      html+= '</a>';
      html+= '</figure>';
      html+= '<article>';
      html+= '<p>';
      if (data[i]["url"]){
        html+= '<small>URL: </small>';
        html+= '<a href="' + data[i]["url"] + '" rel="noopener noreferrer" target="_blank" style="height:20px;">';
        html+= data[i]["url"];
        html+= '</a>';          
      }
      html+= '</p>';  
      html+= '<div>';
      html+= '<button class="button-link remove-button" data-index="' + i + '">';
      html+= '<span class="dashicons dashicons-no-alt"></span>';
      html+= '</button>';
      if (data.length > 1){
        html+= '<div class="order">';    
        if (i > 0){
          html+= '<span class="dashicons dashicons-arrow-up order-up" data-index="' + i + '"></span>';                
        }
        if (i < data.length - 1){
          html+= '<span class="dashicons dashicons-arrow-down order-down" data-index="' + i + '"></span>';    
        }
        html+= '</div>';          
      }
      html+= '</div>';
      html+= '</article>'
      html+= '</li>';
    }
    html += '</ul>';
    
    view.html(html);
    this.initDeleteButton();
    this.initUpButton();
    this.initDownButton();    
  }
  initDeleteButton (){
    var me = this
    this.widget.find('.remove-button').click(function(e){
      e.preventDefault(); 
      var data = JSON.parse(me.widget.find('.data').val())
      var newData = []
      for(var i = 0; i < data.length; i++ ){

        if( i !== parseInt($(this).attr('data-index'))) {
          newData.push(data[i])
        } 
      }
      me.widget.find('.data').val(JSON.stringify(newData))
      me.viewDisplay(newData, me.widget.find('.view'))
      me.widget.closest('form').find('.widget-control-actions .widget-control-save').prop('disabled', false).val('Save')
    }).bind(me)
  }
  initUpButton (){
    var me = this
    this.widget.find('.order-up').click(function(e){
      e.preventDefault(); 
      var data = JSON.parse(me.widget.find('.data').val())
      var newData = []
      var index = parseInt($(this).attr('data-index'));
      for(var i = 0; i < data.length; i++ ){
        if( i !== index) {
          newData.push(data[i])
        } 
      }
      newData.splice(data[index].order - 1,0,data[index]);
      for (var i = 0; i < newData.length; i++ ){
        newData[i].order = i;
      }
      me.widget.find('.data').val(JSON.stringify(newData))
      me.viewDisplay(newData, me.widget.find('.view'))
      me.widget.closest('form').find('.widget-control-actions .widget-control-save').prop('disabled', false).val('Save')
    }).bind(me)    
  }
  initDownButton (){
    var me = this
    this.widget.find('.order-down').click(function(e){
      e.preventDefault(); 
      var data = JSON.parse(me.widget.find('.data').val())
      var newData = []
      var index = parseInt($(this).attr('data-index'));
      for(var i = 0; i < data.length; i++ ){
        if( i !== index) {
          newData.push(data[i])
        } 
      }
      newData.splice(data[index].order + 1,0,data[index]);
      for (var i = 0; i < newData.length; i++ ){
        newData[i].order = i;
      }
      me.widget.find('.data').val(JSON.stringify(newData))
      me.viewDisplay(newData, me.widget.find('.view'))
      me.widget.closest('form').find('.widget-control-actions .widget-control-save').prop('disabled', false).val('Save')
    }).bind(me)      
  }  
}
