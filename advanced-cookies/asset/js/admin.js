// Evenement modification du token
function ac_change_key_token(){
  var token = document.getElementById('token_hob_ac').value;

  var formData = new FormData(); 
  formData.append("token_hob_ac",token);

  var xmlHttp = new XMLHttpRequest();
      xmlHttp.onreadystatechange = function()
      {
          if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
          {
            if(xmlHttp.responseText == "true"){
              document.getElementById('success-form-ac-licence').style.display = "block";
              document.getElementById('error-form-ac-licence').style.display = "none";
              document.getElementById('token_hob_ac').style.borderColor = "green";
          
            }else{
              document.getElementById('error-form-ac-licence').style.display = "block";
              document.getElementById('success-form-ac-licence').style.display = "none";
              document.getElementById('token_hob_ac').style.borderColor = "red";
            }
          }
      }
      xmlHttp.open("post", url_ac); 
      xmlHttp.send(formData);

  setTimeout(function(){ 
    document.getElementById('error-form-ac-licence').style.display = "none";
    document.getElementById('success-form-ac-licence').style.display = "none";
  }, 5000);

}

// Evenement sur les onglet du menu de l'extension
function hob_ac_onglet_event(onglet){
  var contenus =  document.getElementsByClassName('contenu');
  var onglets =  document.getElementsByClassName('onglet');

  for (let index = 0; index < contenus.length; index++) {
      contenus[index].classList.remove("actif");
      onglets[index].classList.remove("actif");
  }
  contenus[onglet].classList.add("actif");
  onglets[onglet].classList.add("actif");
}

// Modification des inputs pour les couleurs
function change_color(value, id){
  document.getElementById(id).setAttribute("value", value);
}


// Sauvergarde des données de l'onglet configuration
function save_configuration(e){
  try{
    let Datas = new FormData(); 

    Array.prototype.forEach.call(document.getElementsByClassName('ac_input_configuration'),function( el ) {
        Datas.append(el.getAttribute("name"), el.value);
    });

    Datas.append("hod-ac-c-post-alea", document.querySelector('input[name="hod-ac-c-post-alea"]:checked').value);

    Datas.append("hod-ac-c-cookie-bouton", document.querySelector('input[name="hod-ac-c-cookie-bouton"]:checked').value);

    Array.prototype.forEach.call(document.getElementsByClassName('ac_input_configuration_select'),function( el ) {
      console.log(el.options[el.selectedIndex].value);
      Datas.append(el.getAttribute("name"), el.options[el.selectedIndex].value);
    });

    // Textes
    Datas.append("hod-ac-c-texte-du-bandeau", tinymce.get('hod-ac-c-texte-du-bandeau').getContent());
    Datas.append("hod-ac-c-cookies-fonctionnel", tinymce.get('hod-ac-c-cookies-fonctionnel').getContent());
    Datas.append("hod-ac-c-mesure-audience", tinymce.get('hod-ac-c-mesure-audience').getContent());
    Datas.append("hod-ac-c-reseaux-sociaux", tinymce.get('hod-ac-c-reseaux-sociaux').getContent());
    Datas.append("hod-ac-c-autre-cookie", tinymce.get('hod-ac-c-autre-cookie').getContent());
    Datas.append("hod-ac-c-contenus-interactifs", tinymce.get('hod-ac-c-contenus-interactifs').getContent());

    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    {
        if(xmlHttp.status == 200)
        {
          e.style.backgroundColor = 'green';
        }else{
          e.style.backgroundColor = 'orange';
        }
    }
    xmlHttp.open("post", url_ac); 
    xmlHttp.send(Datas);

  }
  catch(e){
    console.log(e);
  }
}

// Visualisation d'un element selon le choix de l'utilsiateur
function see_param_button_cookie(e){
  var see_or_not = e.value;

  if(see_or_not == "true"){
    document.getElementById('params_cookies').style.display = "none"
  }else{
    console.log(see_or_not);
    document.getElementById('params_cookies').style.display = "block"
  }
}

// Visualisation d'un element selon l input frere
function gs_see_or_not(mode,id){
  if(mode){
    document.getElementById(id + "-text").style.display = "none";
  }else{
    document.getElementById(id + "-text").style.display = "flex";
  }
}

// Modification de toute les inputs de l'onglet gestion 
function gs_all_services(mode){
  var inputs = document.getElementsByClassName("ac-gestion-radio");
  if(mode){
    Array.prototype.forEach.call(inputs,function( el ) {
      gs_see_or_not(false,el.getAttribute("name"));
      if(el.value){
        el.checked = true;
      }else{
        el.checked = false;
      }
    });
  }else{
    Array.prototype.forEach.call(inputs,function( el ) {
      gs_see_or_not(true,el.getAttribute("name"));
      if(el.getAttribute("value")){
        el.checked = false;
      }else{
        el.checked = true;
      }
    });
  }
}

// Sauvergarde des données de l'onglet gestion
function save_gestion(e){
  try{
    let Datas = new FormData(); 
    Datas.append("ac-gestion-des-services", true);

    var inputs = document.querySelectorAll('.ac-gestion-des-services .ac-switch-data input[type=radio]:checked');

    Array.prototype.forEach.call(inputs,function( el ) {
      var name = el.getAttribute("name");
      Datas.append(name, el.value);
      console.log(name + "-text", document.getElementsByName(name + '-text')[0].value);
      Datas.append(name + "-text", document.getElementsByName(name + '-text')[0].value);
    });

    var xmlHttp = new XMLHttpRequest();
      xmlHttp.onreadystatechange = function()
      {
          if(xmlHttp.status == 200)
          {
            e.style.backgroundColor = 'green';
          }else{
            e.style.backgroundColor = 'orange';
          }
      }
      xmlHttp.open("post", url_ac); 
      xmlHttp.send(Datas);

  }
  catch(e){
    console.log(e);
  }
}