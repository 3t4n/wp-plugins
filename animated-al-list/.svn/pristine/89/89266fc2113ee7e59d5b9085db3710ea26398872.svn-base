<script>
  jQuery(function($) {

$.uniqArray = function(a) {
        return $.grep(a, function(item, pos) {
            return $.inArray(item, a) === pos;
        });
  }

var pdl = {
<?php 
  foreach ($predefined_list as $pdl)
    {
    $str = "'".$pdl['name']."':{equation:'".$pdl['equation']."'";
      if (isset($pdl['a']))$str .= ",a:".$pdl['a']."";
      if (isset($pdl['b']))$str .= ",b:".$pdl['b']."";
      if (isset($pdl['c']))$str .= ",c:".$pdl['c']."";
      if (isset($pdl['d']))$str .= ",d:".$pdl['d']."";
      if (isset($pdl['e']))$str .= ",e:".$pdl['e']."";
      if (isset($pdl['f']))$str .= ",f:".$pdl['f']."";
      if (isset($pdl['r']))$str .= ",r:".$pdl['r']."";
        $str .= ",left:".$pdl['left'].",top:".$pdl['top']."},";
      echo $str;
    }
?>
none:{}};

  $("select[name='predefined_states']").change(function(){
  var current = pdl[$("select[name='predefined_states']").val()];
    $("select[name='position_equation']").val(current['equation']);
    $("select[name='position_equation']").trigger('change');
      if (current.hasOwnProperty('a'))$('input[name="equa_addit[a]"]').val(current['a']);
      if (current.hasOwnProperty('b'))$('input[name="equa_addit[b]"]').val(current['b']);
      if (current.hasOwnProperty('c'))$('input[name="equa_addit[c]"]').val(current['c']);
      if (current.hasOwnProperty('d'))$('input[name="equa_addit[d]"]').val(current['d']);
      if (current.hasOwnProperty('e'))$('input[name="equa_addit[e]"]').val(current['e']);
      if (current.hasOwnProperty('f'))$('input[name="equa_addit[f]"]').val(current['f']);
      if (current.hasOwnProperty('r'))$('input[name="equa_addit[r]"]').val(current['r']);
            if (current.hasOwnProperty('left'))$('input[name="list_offset_left"]').val(current['left']);
            if (current.hasOwnProperty('top'))$('input[name="list_offset_top"]').val(current['top']);
  });

  $("select[name='position_equation']").change(function(){
      var equa = $("select[name='position_equation']").val();
        var regex = /([abcdefr])([^A-Za-z0-9]|$)/gi;

        match = equa.match(regex);
        if (!window.emptyel(match))
          {
          $.each(match, function(i,v){ match[i] = v.replace(/[^A-Za-z0-9]/g,""); });
            match = $.uniqArray(match);
          }
        $('.equa_rest_fields').html("");
        
        $.each(match, function(i,v){
          $('.equa_rest_fields').append(v+" <input type='text' size='10' name=\"equa_addit["+v+"]\">");
        });
    $('#positions_list_form').submit(function(event){

      flag = false;
      var inps = $('.equa_rest_fields').find('input');

        $.each(inps, function(i,v){
          if (!$.isNumeric($(v).val()))flag=true;
        });
        if (flag)
            {
              $('.position_errors').html('Fields are not filled correctly!');
              event.preventDefault();
            }

    });
  });
});
</script>

 <div id="tabs-5">
