( function ($) {
  "use strict";

  $.widget("pektsekye.pizzaToppings", {

    _create: function(){   		    

      $.extend(this, this.options);

      this.optionDiv = this.element.find('.options-list input[name="pofw_option[' + this.optionId + '][]"]').first().closest('.field');

      this.optionDiv.addClass('pt-pizza-toppings-option');
      
      this.updateHtml();
      
      this._on({
        "change .pt-pizza-toppings-option input.pofw-option" : $.proxy(this.checkToppings, this)
      });
                
    },
    
    
    updateHtml : function(){
    
      var control = this.optionDiv.find('.control');
      
      var box,ii,ll,vId,inputDiv;
      var l = this.vIdsByCol.length;
      for (var i = 0;i < l;i++){

        control.append('<div class="pofw-toppings-box"><div class="options-list"></div></div>');
        box = control.find('.pofw-toppings-box:last-child');
        
        ll = this.vIdsByCol[i].length;
        for (ii = 0;ii < ll;ii++){
          vId = this.vIdsByCol[i][ii];
          inputDiv = control.find('#pofw_option_value_'+vId).closest('.choice');
          box.append(inputDiv);
        }
      } 
       
      control.find('.options-list:first-child').remove();      
    },
    
    
    checkToppings : function(e){
    
      var element = $(e.target);
      var count = element.closest('.control').find('input[type="checkbox"]:checked:visible').length;
      
      if (count < this.minSelection && !element[0].checked){
        alert(this.minMessage);
        element[0].checked = true;              
      } else if (count > this.maxSelection && element[0].checked){ 
        alert(this.maxMessage);
        element[0].checked = false;        
      }
         	
    }       
    
  });

})(jQuery);
    


