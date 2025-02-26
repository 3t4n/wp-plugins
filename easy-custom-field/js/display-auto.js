function xmlHttpRequest(){
  var xmlhttp;
  var Complete = false;
  try { //try for IE 6 above 
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); 
	  }
  catch (e){ 
			  try {  //try tor the IE Version less than 6
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   
				  }
		 catch (e){
			  try {  //try for non MS browsers( i.e. firefox,opera)
				   xmlhttp = new XMLHttpRequest(); 
				  }
		 catch (e){ 
				   xmlhttp = false; 
				   }
			 }
 }
		   
  if (!xmlhttp) return null;
  
  this.connect = function(URL, Method, Vars, CallBack,Loading){
    if (!xmlhttp) return false;
    Complete = false;
    Method = Method.toUpperCase();

		try {
		  if(Method == "GET"){
			 xmlhttp.open(Method, URL+"?"+Vars, true);
			 Vars = "";
			} else {
			 xmlhttp.open(Method, URL, true);
			 xmlhttp.setRequestHeader("Method", "GET"+URL+" HTTP/1.1");
			 xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			}
			
      xmlhttp.onreadystatechange = function(){ 
				if(xmlhttp.readyState == 1 && !Complete){	  
				    Loading();
				} else if(xmlhttp.readyState == 4 && !Complete){
				   Complete = true;				  
				   CallBack(xmlhttp);
				}
		}
      xmlhttp.send(Vars);
	  
    }
    catch(z) { return false; }
    return true;
  };
 return this;
}
function Ajax(url,param){
	var newAjaxConn = new xmlHttpRequest();
	var http_vars="option="+param;
	newAjaxConn.connect(url,"POST",http_vars,setPlaintext,loading);
}

function loading(){  
	  var div = document.getElementById('dropContent');
	  div.innerHTML = "<div align='center' style='padding-top:60px'><img src='loading.gif' style='text-align:center'/></div>";
	
} 

function setPlaintext(request){	 
	var div = document.getElementById('dropContent');
	 div.innerHTML = request.responseText;
}

<!-- Second Display -->
function Ajax2(url,param){
	var newAjaxConn = new xmlHttpRequest();
	var http_vars="option="+param;
	newAjaxConn.connect(url,"POST",http_vars,setPlaintext2,loading2);
}
function loading2(){  
	  var div = document.getElementById('dropContent2');
	  div.innerHTML = "<div align='center' style='padding-top:60px'><img src='loading.gif' style='text-align:center'/></div>";
	
}
function setPlaintext2(request){	 
	var div = document.getElementById('dropContent2');
	 div.innerHTML = request.responseText;
}

