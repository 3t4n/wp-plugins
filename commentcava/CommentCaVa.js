/*
CommentCaVa.js
wortwart (Herbert Braun), woerter.de
DE: 
Skript für zeitverzögertes Freischalten von Kommentarfeldern
vorgestellt in meinem Artikel in c't 17/2013
EN: 
Script for delayed unlocking of comment fields
introduced in my story in c't magazine, issue 17/2013
Licence: GPLv2 or later
*/

var ccv = {
 readingspeed: 30, // letters per second
 waitmessage: "",
 timeout: null,
 hidden: false
};

switch(navigator.language) {
 case "de":
  ccv.waitmessage = 'Bitte nehmen Sie sich Zeit, den Beitrag und die bisherigen Kommentare zu lesen. Das Kommentarfeld wird rechtzeitig freigeschaltet.'
  break;
 default:
  ccv.waitmessage = 'Please take the time to read the blog post and the previous comments. The comment field will be unlocked in time.'
}

// detect Page Visibility API (optional, with vendor prefix)
if (typeof document.hidden !== "undefined") {
 ccv.hidden = "hidden";
 ccv.visibilitychange = "visibilitychange";
 ccv.pagevisibility = true;
} else if (typeof document.mozHidden !== "undefined") {
 ccv.hidden = "mozHidden";
 ccv.visibilitychange = "mozvisibilitychange";
 ccv.pagevisibility = true;
} else if (typeof document.msHidden !== "undefined") {
 ccv.hidden = "msHidden";
 ccv.visibilitychange = "msvisibilitychange";
 ccv.pagevisibility = true;
} else if (typeof document.webkitHidden !== "undefined") {
 ccv.hidden = "webkitHidden";
 ccv.visibilitychange = "webkitvisibilitychange";
 ccv.pagevisibility = true;
} else if (typeof document.oHidden !== "undefined") {
 ccv.hidden = "oHidden";
 ccv.visibilitychange = "ovisibilitychange";
 ccv.pagevisibility = true;
}

if (ccv.pagevisibility) ccv.pause = function() {
 if (document[ccv.hidden]) { // stop countdown if document is not visible
  var tmp = new Date();
  var stop = tmp.getTime();
  ccv.passedtime = stop - ccv.start;
  console.log('CommentCaVa.js: countdown interrupted at ' + ccv.passedtime + ' of ' + ccv.remainingtime + ' milliseconds');
  ccv.remainingtime -= ccv.passedtime;
  window.clearTimeout(ccv.timeout);
 } else { // document is visible again - set new countdown
  var tmp = new Date();
  ccv.start = tmp.getTime();
  console.log('CommentCaVa.js: still ' + ccv.remainingtime + ' milliseconds until unlocking');
  ccv.timeout = window.setTimeout('ccv.outit()', ccv.remainingtime);
 }
};
// listen to Page Visibility API event
if (ccv.pagevisibility) document.addEventListener(ccv.visibilitychange, ccv.pause, true);

// fix for Internet Explorer 6 to 8
// code by Douglas Crockford and Benjamin Wright
// http://ecomware.com/notes/hand-coded-javascript-getelementsbyclassname
if (typeof document.getElementsByClassName === 'undefined') {
 Object.prototype.getElementsByClassName = function(className) {
  var results = [];
  var traverse = function (node, func) {
   if (node.nodeType == 1) {
    func(node);
   }
   node = node.firstChild;
   while (node) {
    traverse(node, func);
    node = node.nextSibling;
   }
  }
  traverse(document.body, function (node) {
   var a, c = node.className, i;
   if (c) {
    a = c.split(' ');
    for (i = 0; i < a.length; i++) {
     if (a[i] === className) {
      results.push(node);
      break;
     }
    }
   }
  });
  return results;
 };
}

window.addEventListener('DOMContentLoaded', function() { // onload

 ccv.commentform = document.getElementById("commentform");
 ccv.commentarea = ccv.commentform.getElementsByTagName('textarea')[0];
 var tmp = ccv.commentform.getElementsByTagName('input');
 for (var i = 0; i<tmp.length; i++) {
  if (tmp[i].type == 'submit') break;
 }
 ccv.sendbutton = tmp[i];
 var tl = document.getElementsByClassName("entry-content")[0].innerHTML;
 tl = tl.replace(/<.+?>/g, '');
 tl = tl.replace(/\W+/g, ' ');
 ccv.textlength = tl.length;
 console.log('CommentCaVa.js: calculated text length ' + ccv.textlength + ' characters');
 ccv.waitingtime = ccv.textlength / ccv.readingspeed * 1000;
 ccv.remainingtime = ccv.waitingtime;
 ccv.commentarea.defaultBackgroundColor = ccv.commentarea.style.backgroundColor;
 ccv.commentarea.defaultColor = ccv.commentarea.style.color;
 ccv.commentarea.defaultBorder = ccv.commentarea.style.border;

 ccv.init = function() {
 ccv.commentarea.setAttributeNode(document.createAttribute('readonly'));
  ccv.commentarea.style.backgroundColor = 'lightgrey';
  ccv.commentarea.style.color = 'darkgrey';
  ccv.commentarea.style.border = 'none';
  ccv.commentarea.innerHTML = ccv.waitmessage;
  ccv.sendbutton.style.display = 'none';
  var tmp = new Date();
  ccv.start = tmp.getTime();
  console.log("CommentCaVa.js: " + ccv.waitingtime + ' milliseconds to unlocking');
  ccv.timeout = window.setTimeout('ccv.outit()', ccv.waitingtime);
 };

 ccv.outit = function() {
  if (ccv.pagevisibility) document.removeEventListener(ccv.visibilitychange, ccv.pause, true);
  console.log('CommentCaVa.js: countdown passed - releasing comment form');
  ccv.commentarea.removeAttributeNode(ccv.commentarea.getAttributeNode('readonly'));
  ccv.commentarea.style.backgroundColor = ccv.commentarea.defaultBackgroundColor;
  ccv.commentarea.style.color = ccv.commentarea.defaultColor;
  ccv.commentarea.style.border = ccv.commentarea.defaultBorder;
  ccv.commentarea.innerHTML = '';
  ccv.sendbutton.style.display = 'block';
 };

 ccv.init();
}, false);
