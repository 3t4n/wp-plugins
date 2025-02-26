// (function() {
//   alert("A!");
//     tinymce.PluginManager.add('gavickpro_tc_button', function( editor, url ) {
//         editor.addButton( 'gavickpro_tc_button', {
//             text: 'My test button',
//             icon: false,
//             onclick: function() {
//                 editor.insertContent('Hello World!');
//             }
//         });
//     });
// })();


jQuery(document).ready(function(){

  // alert("a!");
  // var url = "https://apis.google.com/js/api.js?onload=onApiLoad";
  // jQuery.getScript(url, function(){
  //   alert("Google APIs loaded!");
  // })
  // var options = {
  //     height : "250",
  //     width : "500",
  //     title:"JQuery Modal Box Demo",
  //     description: "Example of how to create a modal box.",
  //     top: "20%",
  //     left: "30%",
  // };
        
  // jQuery("#insert-media-button").parent().append("&nbsp;<a class='button fancybox' id='add_docs_docpress' href='#'>Add Document</a>");

    jQuery("#add_docs_docpress").on("click", function(){
      var url = 'http://192.168.3.140/google-api-client/filepicker.htm';
      var w = screen.width*0.8;
      var h = screen.height*0.8;
      console.log ("width = "+w);
      window.open(url, "File Picker", "width="+w+", height="+h);
      window.onmessage = function (e) {
        alert(e.data.url);
      // if (e.data) {
      //     //Code for true
      // } else {
      //     //Code for false
      // }
      };
    });

  //   // var block_page = jQuery('<div class="paulund_block_page" style=""></div>');
  //   // jQuery(block_page).appendTo('body');
  //   // var pop_up = jQuery('<div class="paulund_modal_box"><a href="#" class="paulund_modal_close"></a><div class="paulund_inner_modal_box"><h2>' + options.title + '</h2>' + '<iframe src="http://localhost/google-api-client/filepicker.htm" width="100%" height="100%"></iframe>' + '</div></div>');
  //   // jQuery(pop_up).appendTo('.paulund_block_page');
             
  //   //    jQuery('.paulund_modal_close').click(function(){
  //   //     jQuery(this).parent().fadeOut().remove();
  //   //     jQuery('.paulund_block_page').fadeOut().remove();         
  //   //    });

  //   //    jQuery('.paulund_modal_box').css({ 
  //   //     'position':'absolute', 
  //   //     'left':options.left,
  //   //     'top':options.top,
  //   //     'display':'none',
  //   //     'height': options.height + 'px',
  //   //     'width': options.width + 'px',
  //   //     'border':'1px solid #fff',
  //   //     'box-shadow': '0px 2px 7px #292929',
  //   //     '-moz-box-shadow': '0px 2px 7px #292929',
  //   //     '-webkit-box-shadow': '0px 2px 7px #292929',
  //   //     'border-radius':'10px',
  //   //     '-moz-border-radius':'10px',
  //   //     '-webkit-border-radius':'10px',
  //   //     'background': '#f2f2f2', 
  //   //     'z-index':'500',
  //   //   });
  //   //   jQuery('.paulund_modal_close').css({
  //   //     'position':'relative',
  //   //     'top':'-25px',
  //   //     'left':'20px',
  //   //     'float':'right',
  //   //     'display':'block',
  //   //     'height':'50px',
  //   //     'width':'50px',
  //   //     'background': 'url(images/close.png) no-repeat',
  //   //   });
  //   //                     /*Block page overlay*/
  //   //   var pageHeight = jQuery(document).height();
  //   //   var pageWidth = jQuery(window).width();

  //   //   jQuery('.paulund_block_page').css({
  //   //     'position':'absolute',
  //   //     'top':'0',
  //   //     'left':'0',
  //   //     'background-color':'rgba(0,0,0,0.6)',
  //   //     'height':pageHeight,
  //   //     'width':pageWidth,
  //   //     'z-index':'400'
  //   //   });
  //   //   jQuery('.paulund_inner_modal_box').css({
  //   //     'background-color':'#fff',
  //   //     'height':(options.height - 50) + 'px',
  //   //     'width':(options.width - 50) + 'px',
  //   //     'padding':'10px',
  //   //     'margin':'15px',
  //   //     'border-radius':'10px',
  //   //     '-moz-border-radius':'10px',
  //   //     '-webkit-border-radius':'10px'
  //   //   });
  //   //   jQuery('.paulund_modal_box').fadeIn();
  //   return false;
  // });
  // QTags.addButton( 'eg_paragraph_1', 'po', '<po>', '</po>', 'poo', 'POOTAG', 1 );
});

      var developerKey = 'AIzaSyC9oviHO_GxorAGkXdnkjbl3D0s4_8FjZ4';

      // The Client ID obtained from the Google Developers Console. Replace with your own Client ID.
      var clientId = "244521111339.apps.googleusercontent.com"

      // Scope to use to access user's photos.
      var scope = ['https://www.googleapis.com/auth/docs'];

      var pickerApiLoaded = false;
      var oauthToken;
      var uploadFolder = "DocumentPress";
      var uploadFolderId = "";

      // Use the API Loader script to load google.picker and gapi.auth.
      function onApiLoad() {
        gapi.load('auth', {'callback': onAuthApiLoad});
        gapi.load('picker', {});
        // gapi.load('picker', {'callback': onPickerApiLoad});
        // gapi.client.load('drive', 'v2', listFiles);
        gapi.load('client', function(){
          gapi.client.load('drive', 'v2', function(){

            onPickerApiLoad();
            // alert("Drive API loaded!");
          });
        });
        gapi.load('drive');
      }

      function onAuthApiLoad() {
        window.gapi.auth.authorize(
            {
              'client_id': clientId,
              'scope': scope,
              'immediate': false
            },
            handleAuthResult);
      }

      function onPickerApiLoad() {
        pickerApiLoaded = true;
        createPicker();
      }

      function handleAuthResult(authResult) {
        if (authResult && !authResult.error) {
          oauthToken = authResult.access_token;
          createPicker();
        }
      }


      function createFolder(cb){
        retrieveAllFiles(function(files){
          console.log("Retrieved all folders in root");
          console.log(files);
          var found = false;
          for (var i = files.length - 1; i >= 0; i--) {
            var item = files[i];
            if (item.title == uploadFolder){
              found = true;
              uploadFolderId = item.id;
              break;
            }
          };
          // alert(uploadFolderId);
          if (!found){
            data = new Object();
        data.title = uploadFolder;
        data.parents = [{"id":"root"}];
        data.mimeType = "application/vnd.google-apps.folder";
        gapi.client.drive.files.insert({'resource': data}).execute(function(newfolder){
              uploadFolderId = newfolder.id;
          // alert(uploadFolderId)          ;
          cb(uploadFolderId);
        });
          }else{
            // alert("Folder exists");
            cb("Didn't need to create a folder");
          }

        })

    }

  function retrieveAllFiles(callback) {
    var retrievePageOfFiles = function(request, result) {
      request.execute(function(resp) {
        result = result.concat(resp.items);
        var nextPageToken = resp.nextPageToken;
        if (nextPageToken) {
          request = gapi.client.drive.files.list({
            'pageToken': nextPageToken
          });
          retrievePageOfFiles(request, result);
        } else {
          callback(result);
        }
      });
    }
    var initialRequest = gapi.client.drive.files.list({
      'q' : "mimeType = 'application/vnd.google-apps.folder'",
    });
    retrievePageOfFiles(initialRequest, []);
  }

      // Create and render a Picker object for picking user Photos.
      function createPicker() {
        // DocsView.setOwnedByMe
        if (pickerApiLoaded && oauthToken) {
          createFolder(function(){
            // alert("Folder creation code ran");
              var uploadView = new google.picker.DocsUploadView().setParent(uploadFolderId);

            console.log(google.picker);
            var simpleView = new google.picker.DocsView(google.picker.ViewId.DOCS).setParent(uploadFolderId).setOwnedByMe(true);
            // simpleView
            var picker = new google.picker.PickerBuilder().
                addView(simpleView).
                setOAuthToken(oauthToken).
                setDeveloperKey(developerKey).
                setCallback(pickerCallback).
                addView(uploadView).
                // DocsUploadView().
                build();
            picker.setVisible(true);
          })

        }
      }

      // A simple callback implementation.
      function pickerCallback(data) {
        var url = 'nothing';
        if (data[google.picker.Response.ACTION] == google.picker.Action.PICKED) {
          var doc = data[google.picker.Response.DOCUMENTS][0];
          console.log(doc);
          makePublic(doc.id);
          url = doc[google.picker.Document.URL];
        }
        var message = 'You picked: ' + url;

        document.getElementById('result').innerHTML = message;
      }

      function makePublic(fileId) {
        var resource = {
        'value': 'default',
        'type': 'anyone',
        'role': 'reader',
        'withLink' : true,
      };
      // console.log(google.drive);
      // console.log(gapi.client);
      // console.log(gapi.drive);
      // gapi.client.load('plus', 'v1').then(function() {
      var request = gapi.client.drive.permissions.insert({
        'fileId': fileId,
        'resource': resource
      }).execute(function(a) { 
        alert("file set to public")
        console.log(a);
      });
      // First retrieve the permission from the API.
      // var request = gapi.client.drive.permissions.get({
      //   'fileId': fileId,
      //   'permissionId': permissionId
      // });
      // request.execute(function(resp) {
      //   resp.role = newRole;
      //   var updateRequest = gapi.client.drive.permissions.update({
      //     'fileId': fileId,
      //     'permissionId': permissionId,
      //     'resource': resp
      //   });
      //   updateRequest.execute(function(resp) { });
      // });
    }