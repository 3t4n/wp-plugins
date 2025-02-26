 // popup script start

function updateValue(event) {
        event.previousElementSibling.value = event.value;
}

function updateColorValue(event) {
        event.nextElementSibling.value = event.value;
}


 function showPopUp(id) {
  var popup = document.getElementById('popup'+id);
            popup.classList.remove('hidePopup');
            popup.classList.replace('animereverse','animeforward');
            document.getElementById('popmaindvnew'+id).classList.add('overlay');
            document.getElementById('popmaindvnew'+id).style.opacity='1';
            document.getElementsByTagName('BODY')[0].setAttribute('class','mainPopBody');
            // document.getElementById('popbtn').style.opacity='0';
            document.getElementsByTagName('BODY')[0].classList.add('disabledBody');
            
        }

function hidePopUp(id) {

  var popup = document.getElementById('popup'+id);
    popup.classList.replace('animeforward','animereverse');
    document.getElementById('popmaindvnew'+id).style.opacity='0';
        // document.getElementById('popbtn').style.opacity='1';
        
    setTimeout(function(){
        popup.classList.add('hidePopup');
        document.getElementById('popmaindvnew'+id).classList.remove('overlay');
        document.getElementsByTagName('BODY')[0].removeAttribute('class','mainPopBody');
        document.getElementsByTagName('BODY')[0].classList.remove('disabledBody');
    },popup.getAttribute('name').split(' ')[1])
    
}


     function hideShortCde(){

     	document.getElementById('shortcodedv').style.display='none';
     	window.location.reload();
     }   


  // popup script close   


  // update popup start

  function showupdtdata(){
    document.getElementById('all_popups_dv').style.display='none';
    document.getElementById('update_data').style.display='block';

  }  


  // update popup end


// required field script start








// required field script end


  jQuery(function($){

  jQuery("#submitdata").on("click",function(){
    document.getElementById('submitdata').classList.add('disabledElement');
     var name = document.getElementById('name').value;
 var title = document.getElementById('title').value;
 var classinput = document.getElementById('popupclass').value;
 console.log(name != '');
 if(name != '' && title != '' && classinput != ''){


var mycontent;

try {
mycontent = tinyMCE.activeEditor.getContent();
}
catch(err) {
mycontent = jQuery('#desired_id_of_textarea').val();
}

 var postdata = "action=yourpopupadding&param=save_plugin&mycontent="+mycontent+"&"+jQuery("#popupform").serialize();

      jQuery.post(ajax_object,postdata,function(response){

        var data = jQuery.parseJSON(response);
        if(data.status==1){
          var mainid = data['id'];    
                    // console.log(data);     
          // window.location.href ="?id="+mainid;
          // window.location.reload();
          
          document.getElementById('shortcdedata').children[0].innerHTML=document.getElementById('shortcdedata').children[0].innerHTML+'"'+document.getElementById('popupclass').value+'"'+']';
          document.getElementById('shortcodedv').style.display="block";
        }
      });
      }
else {
  alert('Please fill in all fields!');
}

});


// edit start

jQuery(".udtedtacls").on("click",function(){

var mycontent;
try {
mycontent = tinyMCE.activeEditor.getContent();
}
catch(err) {
mycontent = jQuery('#desired_id_of_textarea').val();
}
    // var firstid = this.id;

    // var mainid = jQuery("#"+firstid).closest('form').attr('id');

 var postdata = "action=yourpopupedit&param=save_plugin&mycontent="+mycontent+"&"+jQuery("#popupdatanew").serialize();

            // console.log(postdata);
            jQuery.post(ajax_object,postdata,function(response){

                var data = jQuery.parseJSON(response);
                if(data.status==1){
                    // var mainid = data['id'];                    
                    // window.location.href ="?page=all-popups";
                    window.location.reload();
                    // console.log(response);
                }
            });
});





// edit end


//delete start


jQuery(".closepop").on("click",function(){

        var sure = confirm('Are you sure, you want to delete this popup!');

    // console.log(editid);
        if(sure){
            var postdata = "action=yourpopupdlte&param=save_plugin&id="+this.id;
            // var postdata = "action=yourpopupdlte&param=save_plugin&id="+b;
      console.log(postdata);
                jQuery.post(ajax_object,postdata,function(response){

                    var data = jQuery.parseJSON(response);
                    if(data.status==1){
                        // console.log(response);
            window.location.reload();
                        
                    }
            });
        }
            
});

//delete end

 });

 function colorPicker(event) {
     event.previousSibling.value = event.value;
 }

 function rangepicker(event) {
     event.nextSibling.value = event.value;
 }
 
 function changeTab(event, tabOpen) {
     var btnDiv = document.getElementById('btnDiv');
     var popDiv = document.getElementById('popDiv');
     var cookieDiv = document.getElementById('cookieDiv');
    if(tabOpen == 'btn') {
        btnDiv.classList.remove('hideTab');
        popDiv.classList.add('hideTab');
        cookieDiv.classList.add('hideTab');
    }
    else if(tabOpen == 'pop') {
        popDiv.classList.remove('hideTab');
        btnDiv.classList.add('hideTab');
        cookieDiv.classList.add('hideTab');
    }

    else {
        cookieDiv.classList.remove('hideTab');
        btnDiv.classList.add('hideTab');
        popDiv.classList.add('hideTab');
    }
    document.getElementsByClassName('activeTab')[0].classList.remove('activeTab');
    event.classList.add('activeTab');
 }

 function changeBtnStyleTab(event, tabOpen) {
    var txtDiv = document.getElementById('txtDiv');
    var bgDiv = document.getElementById('bgDiv');
    var bdrDiv = document.getElementById('bdrDiv');
    var szDiv = document.getElementById('szDiv');
   if(tabOpen == 'txt') {
       txtDiv.classList.remove('hideTab');
       bgDiv.classList.add('hideTab');
       bdrDiv.classList.add('hideTab');
       szDiv.classList.add('hideTab');
   }
   if(tabOpen == 'bg') {
        bgDiv.classList.remove('hideTab');
        txtDiv.classList.add('hideTab');
        bdrDiv.classList.add('hideTab');
        szDiv.classList.add('hideTab');
    }
    if(tabOpen == 'bdr') {
        bdrDiv.classList.remove('hideTab');
        bgDiv.classList.add('hideTab');
        txtDiv.classList.add('hideTab');
        szDiv.classList.add('hideTab');
    }
    if(tabOpen == 'sz') {
        szDiv.classList.remove('hideTab');
        bgDiv.classList.add('hideTab');
        txtDiv.classList.add('hideTab');
        bdrDiv.classList.add('hideTab');
    }
   document.getElementsByClassName('activeStyleTab')[0].classList.remove('activeStyleTab');
   event.classList.add('activeStyleTab');
}

 function changePopStyleTab(event, tabOpen) {
    var txtDiv = document.getElementById('popTxtDiv');
    var bgDiv = document.getElementById('popBgDiv');
    var bdrDiv = document.getElementById('popBdrDiv');
    var szDiv = document.getElementById('popSzDiv');
    var animationDiv = document.getElementById('popanimationDiv');
    var opacityDiv = document.getElementById('popopacityDiv');
    var closebtnDiv = document.getElementById('popcloseDiv');
   if(tabOpen == 'txtpop') {
       txtDiv.classList.remove('hideTab');
       bgDiv.classList.add('hideTab');
       bdrDiv.classList.add('hideTab');
       szDiv.classList.add('hideTab');
       animationDiv.classList.add('hideTab');
       opacityDiv.classList.add('hideTab');
       closebtnDiv.classList.add('hideTab');
   }
   if(tabOpen == 'bgpop') {
        bgDiv.classList.remove('hideTab');
        txtDiv.classList.add('hideTab');
        bdrDiv.classList.add('hideTab');
        szDiv.classList.add('hideTab');
        animationDiv.classList.add('hideTab');
        opacityDiv.classList.add('hideTab');
        closebtnDiv.classList.add('hideTab');
    }
    if(tabOpen == 'bdrpop') {
        bdrDiv.classList.remove('hideTab');
        bgDiv.classList.add('hideTab');
        txtDiv.classList.add('hideTab');
        szDiv.classList.add('hideTab');
        animationDiv.classList.add('hideTab');
        opacityDiv.classList.add('hideTab');
        closebtnDiv.classList.add('hideTab');
    }
    if(tabOpen == 'szpop') {
        szDiv.classList.remove('hideTab');
        bgDiv.classList.add('hideTab');
        txtDiv.classList.add('hideTab');
        bdrDiv.classList.add('hideTab');
        animationDiv.classList.add('hideTab');
        opacityDiv.classList.add('hideTab');
        closebtnDiv.classList.add('hideTab');
    }

    if(tabOpen == 'animationpop') {
        animationDiv.classList.remove('hideTab');
        szDiv.classList.add('hideTab');
        bgDiv.classList.add('hideTab');
        txtDiv.classList.add('hideTab');
        bdrDiv.classList.add('hideTab');
        opacityDiv.classList.add('hideTab');
        closebtnDiv.classList.add('hideTab');
    }
     if(tabOpen == 'opacitypop') {
        opacityDiv.classList.remove('hideTab');
        animationDiv.classList.add('hideTab');
        szDiv.classList.add('hideTab');
        bgDiv.classList.add('hideTab');
        txtDiv.classList.add('hideTab');
        bdrDiv.classList.add('hideTab');
        closebtnDiv.classList.add('hideTab');
    }

     if(tabOpen == 'closepop') {
        closebtnDiv.classList.remove('hideTab');
        opacityDiv.classList.add('hideTab');
        animationDiv.classList.add('hideTab');
        szDiv.classList.add('hideTab');
        bgDiv.classList.add('hideTab');
        txtDiv.classList.add('hideTab');
        bdrDiv.classList.add('hideTab');
    }
   document.getElementsByClassName('activePopStyleTab')[0].classList.remove('activePopStyleTab');
   event.classList.add('activePopStyleTab');
}


function changecookieTab(event, tabOpen) {
    var cokieDiv = document.getElementById('cokieDiv');
   document.getElementsByClassName('activeStyleTab')[0].classList.remove('activeStyleTab');
   event.classList.add('activeStyleTab');
}

function checkCookie(event){
  if(event.checked){
      event.value = true;
  }
  else{
    event.value = false;
  }
 console.log (event.value);
}
