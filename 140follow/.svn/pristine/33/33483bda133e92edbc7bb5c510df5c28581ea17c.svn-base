/*
Form field Limiter script- By Dynamic Drive
For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
This credit MUST stay intact for use
*/

var ie    =  document.all? 1 : 0;


function countlimit(maxlength,e,placeholder){
  var theform=eval(placeholder);
  var lengthleft=maxlength-theform.value.length;
  var placeholderobj=document.all? document.all[placeholder] : document.getElementById(placeholder);
  
  if (window.event || e.target && e.target == eval(placeholder)) {
    if (lengthleft < 1) {
      var kommentinfo = '<strong>Geschafft!!</strong> Dein Kommentar hat das Zeug zu einem NOFOLLOW-FREE-Kommentar! :)';
    }
    else if (lengthleft == 1) {
      var kommentinfo = 'Es fehlt nur noch <strong>'+lengthleft+'</strong> Zeichen, bis Dein Kommentar ein richtiger Backlink, ohne NOFOLLOW wird! :)';
    }
    else {
      var kommentinfo = 'Es fehlen nur noch <strong>'+lengthleft+'</strong> Zeichen, bis Dein Kommentar ein richtiger Backlink, ohne NOFOLLOW wird! :)';
    }
  
    placeholderobj.innerHTML=kommentinfo;
  }
}


function displaylimit(theform,thelimit) {
  var limit_text='<span id="'+theform.toString()+'">Es fehlen nur noch <strong>'+thelimit+'</strong> Zeichen, bis Dein Kommentar ein richtiger Backlink, ohne NOFOLLOW wird! :(</span>';

    document.write(limit_text);
    

  if (ie) {
    eval(theform).onkeyup=function(){ countlimit(thelimit,event,theform);}
  }
  else {
    document.body.addEventListener('keyup', function(event) { countlimit(thelimit,event,theform); }, true); 
  }
}
