/*  Copyright 2009-2010 Xaquseg (email : nightshadowz88@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

var avatarPreviewTimeout;

function attachEventListener(obj, event, func) {
  if (obj.addEventListener) {
    obj.addEventListener(event, func, false);
  } else if(obj.attachEvent) {
    obj.attachEvent('on' + event, func);
  }
}

function avatarPreview_update() {
  var emailField = document.getElementById("email");
  var previewImage = document.getElementById("avatarPreviewImage");
  var previewDescription = document.getElementById("avatarPreviewDesc");
  var previewChangeLink = document.getElementById("avatarChangeLink");
  
  previewDescription.removeChild(previewDescription.firstChild);
  clearTimeout(avatarPreviewTimeout);
  if(emailField.value != "") {
    previewImage.src = "http://www.gravatar.com/avatar/" + hex_md5(emailField.value.toLowerCase()) + "?r=" + avatarpreviewconf.rating + "&d=" + avatarpreviewconf.defaultav + "&s=" + previewImage.width;
    previewDescription.appendChild(document.createTextNode("Gravatar for '" + emailField.value.toLowerCase() + "'"));
    previewChangeLink.style.visibility = "visible";
    previewImage.style.visibility = "visible";
  } else {
    previewChangeLink.style.visibility = "hidden";
    previewImage.style.visibility = "hidden";
    previewDescription.appendChild(document.createTextNode("Enter your email to see an avatar preview."));
  }
  
}

function avatarPreview_load() {
  if (document.getElementById && md5_vm_test()) {
    var emailField = document.getElementById("email");
    var previewBox = document.getElementById("avatarPreviewBox");
    
    if(emailField == null || previewBox == null) return;
    
    var previewSize = 32;
    for (var i = previewBox.className.split(' ').length - 1; i >= 0; i--){
        var c = previewBox.className.split(' ')[i];
        if(c.substr(0, 12) == "previewsize-") {
            previewSize = parseInt(c.substr(12));
            break;
        }
    }
    if (previewSize > 512) { previewSize = 512; }
    else if (previewSize < 8) { previewSize = 8; }
    
    var previewImage = document.createElement("img");
    previewImage.src = "http://www.gravatar.com/avatar/" + hex_md5(emailField.value.toLowerCase()) + "?r=" + avatarpreviewconf.rating + "&d=" + avatarpreviewconf.defaultav + "&s=" + previewSize;
    previewImage.width = previewSize;
    previewImage.height = previewSize;
    previewImage.id = "avatarPreviewImage";
    
    var previewDescription = document.createElement("p");
    previewDescription.id = "avatarPreviewDesc";
    var previewChangeLinkP = document.createElement("p");
    var previewChangeLink = document.createElement("a");
    previewChangeLink.appendChild(document.createTextNode("Change at Gravatar.com"));
    previewChangeLink.href = "http://www.gravatar.com/";
    previewChangeLink.target = "_blank";
    previewChangeLink.id = "avatarChangeLink";
    previewChangeLinkP.appendChild(previewChangeLink);
    
    if(emailField.value != "") {
      previewDescription.appendChild(document.createTextNode("Gravatar for '" + emailField.value.toLowerCase() + "'"));
    } else {
      previewDescription.appendChild(document.createTextNode("Enter your email to see an avatar preview."));
      previewChangeLink.style.visibility = "hidden";
      previewImage.style.visibility = "hidden";
    }
    
    previewBox.appendChild(previewImage);
    previewBox.appendChild(previewDescription);
    previewBox.appendChild(previewChangeLinkP);
    
    attachEventListener(emailField, 'keypress', function() {
        clearTimeout(avatarPreviewTimeout);
        avatarPreviewTimeout = setTimeout(avatarPreview_update, 1000);
      });
    attachEventListener(emailField, 'blur', avatarPreview_update);
  }
}

attachEventListener(window, 'load', avatarPreview_load);