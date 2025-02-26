
function BRAVOSP_create() {
    document.getElementById("BRAVOSPbutton").style.display='none';
    document.getElementById("BRAVOSPgif").style.display='inline';
    textTo=document.getElementById("textToId").value.trim();
    yourT=document.getElementById("YourTrId").value.trim();
    if(textTo.length<2) {
      alert(document.getElementById("BRAVOSP_min_char_message").value);
      document.getElementById("BRAVOSPbutton").style.display='inline';
    document.getElementById("BRAVOSPgif").style.display='none';
      return;
    }
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("BRAVOSP_table_container").innerHTML=this.responseText;
        document.getElementById("BRAVOSPbutton").style.display='inline';
        document.getElementById("BRAVOSPgif").style.display='none';
        document.getElementById("BRAVOSPgif").value='';
        document.getElementById("textToId").value='';
        document.getElementById("YourTrId").value='';
    }
  };
  xhttp.open("GET", "/wp-json/bravo-sp/BRAVOSP_create?searchFor="+textTo+"&replaceBy="+yourT, true);
  xhttp.send();
}

function BRAVOSP_edit(id){
    document.getElementById("BRAVOSPbutton").style.display='none';
    text=document.getElementById("forID"+id).innerHTML;;
    document.getElementById("textToId").value=text;
    text=document.getElementById("toID"+id).innerHTML;
    document.getElementById("YourTrId").value=text;
    document.getElementById("BRAVOSPbutton_edit").style.display='inline';
    document.getElementById("BRAVOSP_edit_hidden").value=id;
    document.getElementById("textToId").focus();
  };
  function BRAVOSP_edit_ajax(id) {
    id=document.getElementById("BRAVOSP_edit_hidden").value;
    document.getElementById("BRAVOSPbutton_edit").style.display='none';
    document.getElementById("BRAVOSPgif").style.display='inline';
    textTo=document.getElementById("textToId").value.trim();
    if(textTo.length<2) {
      alert(document.getElementById("BRAVOSP_min_char_message").value);
      document.getElementById("BRAVOSPbutton_edit").style.display='inline';
    document.getElementById("BRAVOSPgif").style.display='none';
      return;
    }
    yourT=document.getElementById("YourTrId").value.trim();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("BRAVOSP_table_container").innerHTML=this.responseText;
        document.getElementById("BRAVOSPbutton").style.display='inline';
        document.getElementById("BRAVOSPgif").style.display='none';
        document.getElementById("BRAVOSPgif").value='';
        document.getElementById("textToId").value='';
        document.getElementById("YourTrId").value='';
    }
  };
  xhttp.open("GET", "/wp-json/bravo-sp/BRAVOSP_update?searchFor="+textTo+"&replaceBy="+yourT+"&id="+id, true);
  xhttp.send();
}
function BRAVOSPdismiss(){
document.getElementById("message").style.display="none";
}

function BRAVOSP_delete(id) {
    document.getElementById("BRAVOSPbutton").style.display='none';
    document.getElementById("BRAVOSPbutton_edit").style.display='none';
    document.getElementById("textToId").focus();
    document.getElementById("textToId").value='';
    document.getElementById("YourTrId").value='';
    document.getElementById("BRAVOSPgif").style.display='inline';

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("BRAVOSP_table_container").innerHTML=this.responseText;
        document.getElementById("BRAVOSPbutton").style.display='inline';
        document.getElementById("BRAVOSPgif").style.display='none';
    }
  };
  xhttp.open("GET", "/wp-json/bravo-sp/BRAVOSP_delete?ID="+id, true);
  xhttp.send();
}
function BRAVOSP_dismissInfo(){
  var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
      document.getElementById("messageInfo").style.display="none";
  }
};
xhttp.open("GET", "/wp-json/bravo-sp/BRAVOSP_dismiss", true);
xhttp.send();
}