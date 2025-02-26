      jQuery(document).ready(function() {
        var $ = jQuery.noConflict();
        
        jQuery('#sarvWidgetForm').on('submit', function (e) {
         $("#settingform").prop('disabled', 'true');
         e.preventDefault();
          $.ajax({
            url: plugin_ajax_url.ajax_url,
            type: 'POST',
            data: $('#sarvWidgetForm').serialize()+'&action=addcontacts',
            success: function (result) {
               var resultMessage = JSON.parse(result);
               
               if(resultMessage.msg=="success"){
                  $( '#sarvWidgetForm' ).each(function(){
                      this.reset();
                  });
                  var succesmess = resultMessage.msg_text;
                  $('#errormess').hide().empty();
                  $('#successmeg').show().empty().html("<strong>Thank You Subscriber !</strong>");
               }else if(resultMessage.msg=="error"){
                  var errormess = resultMessage.msg_text;
                  var errorcode = resultMessage.error_code;
                  $("#settingform").removeAttr('disabled');
                  $('#successmeg').hide().empty();
                  $('#errormess').show().empty().html("<strong>Error "+errorcode+" !</strong> "+errormess);
               }

            }
          });

        });


        jQuery("#formsetting").on('submit', function (e) {
          $("#settingform").val('Please Wait...').prop('disabled', true);
          e.preventDefault();
          $.ajax({
            url: plugin_ajax_url.ajax_url,
            type: 'POST',
            data: $('#formsetting').serialize()+'&action=formsetting',
            success: function(result){
              var resultMessage = JSON.parse(result);
               if(resultMessage.msg=="success"){
                  var succesmess = resultMessage.msg_text;
                  $('#errormess').hide().empty();
                  $('#apiconinfo').css('display','none');
                  $("#settingform").val('Save').prop('disabled', false);
                  $('#successmeg').show().empty().html("<strong>Your information Updated. <a href='admin.php?page=manage_setting'>Click on Form Page.</a></strong>");
                  
               }else if(resultMessage.msg=="error"){
                  var errormess = resultMessage.msg_text;
                  $('#successmeg').hide().empty();
                  $('#apiconinfo').css('display','none');
                  $("#settingform").val('Save').prop('disabled', false);
                  $('#errormess').show().empty().html("<strong>Error! </strong> "+errormess);
               }
            }

          });
        });


        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();

});