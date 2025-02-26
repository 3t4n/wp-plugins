function cl(c){console.log(c);}
 $(document).ready(function() {
    $('.loadmore').live('click', function(ev){
       ev.preventDefault();
       
       
       var loadmoretrigger = this;
       $.ajax($(this).attr('href'),{
            'dataType':'json',
            'success':function(rs){
               $(loadmoretrigger).prev('ul').append($(rs.payload).find('li')); 
               $(loadmoretrigger).attr('href', $(rs.payload).find('a.loadmore').attr('href'));
              
            }
       });
    });
 });