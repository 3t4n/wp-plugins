//
// Script anlässlich der #Prism Veröffentlichungen
//
// Autor: Horst Klier
// Übersetzung ins Englische: Lukas Fülling
//
// Kopieren und ändern ausdrücklich erlaubt. Bei sinnvollen Ergänzungen bitte auch Hinweis an mich (horst@klier.net).
// Send translations to (https://github.com/k3ll4gr0up).
//
// Danke an Edward Snowden
//



function checkBrowser(name){
   var agent = navigator.userAgent.toLowerCase();
   if (agent.indexOf(name.toLowerCase())>-1) {
     return true;
   }
   return false;
}

function isIE(){
  return checkBrowser('msie');
}
function isSafari(){
  // Achtung: Chrome und Android haben auch Kennung Safari
  if(checkBrowser('chrome'))return false;
  if(checkBrowser('android'))return false;
  return checkBrowser('safari');
}
function isChrome(){
  return checkBrowser('chrome');
}
function isFirefox(){
  return checkBrowser('firefox');
}
function isAndroid(){
  if(checkBrowser('opera'))return false;
  if(checkBrowser('firefox'))return false;
  return checkBrowser('android');
}
function isOpera(){
  return checkBrowser('opera');
}

function PrismWarning(){
		var c='';
		if(isFirefox()==false&&isOpera()==false){
		if(isIE()||isChrome()||isAndroid()||isSafari()){
			c='<div id = "scoped-content">'
			c+='<style scoped>'
			c+=' #prismgotyou{border: 1px solid #aa0000;border-radius:10px;padding:20px;background-color:#fff4f4;color:#000000;}'
			c+='</style>'
			c+='<div id="prismgotyou">You are using the '
			if(isIE())c+='Internet Explorer';
			if(isChrome())c+='Chrome';
			if(isAndroid())c+='Android';
			if(isSafari())c+='Safari';
			c+=' Browser. The creator of this browser, which is '
			if(isIE())c+='Microsoft';
			if(isChrome())c+='Google';
			if(isAndroid())c+='Google';
			if(isSafari())c+='Apple';
			c+=', works together with the NSA to achieve the total surveillance of the citizens of the world.<br />'
			c+='We think you should know this..<br />'
			c+='<a style="margin-top:-14px;float:right;font-size:13px;color:#000066;" href="https://en.wikipedia.org/wiki/PRISM" target="_blank">about PRISM</a>'
			c+='</div> </div>'
			document.writeln(c);
			}
		}
}

PrismWarning();
