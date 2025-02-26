function less_than ( val1, val2 ) {
   if ( val1 < val2 ) {
      return 1;
   } else {
      return 0;
   }
}

function greater_than ( val1, val2) {
   if ( val1 > val2 ) {
      return 1;
   } else {
      return 0;
   }
}

function less_or_equal ( val1, val2 ) {
   if ( val1 <= val2 ) {
      return 1;
   } else {
      return 0;
   }
}

function greater_or_equal ( val1, val2) {
   if ( val1 >= val2 ) {
      return 1;
   } else {
      return 0;
   }
}

var add_textchars = function (target, message, interval, randomness) {
   var inatag=0;
   for ( var counter=0; counter <= message.length; counter++)  {
      randoffset = Math.random() * randomness;
      if ( message[counter] == "" ) { 
         inatag=0;
      }   
      if ( inatag == 0 ) { 
         setTimeout( appendchar, interval * counter  , target, message.substring(0, counter) );
      }   
   }   
}

function appendchar ( curtarget, curstr) {
   jQuery(curtarget).html(curstr);
}

