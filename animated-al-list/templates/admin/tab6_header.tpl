 <div id="tabs-6">
<script>
  jQuery(function($) {
  var fill_effects_selectbox = function(){
  $("select[name='list_effect']").empty();
  
    var index = $("select[name='position_equation']")[0].selectedIndex;
    var res_fill=[];
    
    if (index==0)$("select[name='list_effect']").append($('<option>', {'none' : 'none'}).text('none')); 
      $.each(predefined_effects, function(i,v){
        var bounds = v[0].split("-");
        if ((bounds[0]<=index)&&(bounds[1]>=index)&&(index!=0))
          {
          var val = v[1];
          if (db_effect == val)
          $("select[name='list_effect']").append($('<option selected>', {val : val}).text(val)); 
          else
          $("select[name='list_effect']").append($('<option>', {val : val}).text(val)); 
          }
      });
      
  }
  fill_effects_selectbox();
  
  $("select[name='position_equation']").change(function(event){
    fill_effects_selectbox();
  });

  $("select[name='list_effect']").change(function(){
  var current = $("select[name='list_effect']").val();
  if (current.indexOf("long_list") != -1)
    {
    var lvn = $("input[name='list_visible_number']").val();
    $(".list_visible_number_div").html('Visible list items number : <input type="text" size="10" name="list_visible_number" value="'+lvn+'">');
    }
    else
    $(".list_visible_number_div").html('<input type="hidden" name="list_visible_number" value="0">');
  });
  
  $("input[name='list_visible_number']").change(function(){
    
  });
  
});
</script>