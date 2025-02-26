
/**
 *
 * LiveOptim - Optimize the content of your articles and automatically tickets to easily improve your position in the results of search engines: Google, Baidu, Yandex, Bing ... 
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.htm
 * Copyright (C) 2012 Erwan MILBEO — All rights reserved
 * For more information see the README
 * Any question will find answer on  
 * [support@liveoptim.com](mailto:support@liveoptim.com)
 * our Timelines : [US-EN](https://twitter.com/LiveOptim_US) | [FR](https://twitter.com/LiveOptim_FR) | [ES](https://twitter.com/LiveOptim_ES)
 *
*/

function fenetreLiveoptimOuvrir() {
	var elementFenetre = document.getElementById('fenetreLiveoptim');
	elementFenetre.style.display = 'block';
}

function fenetreLiveoptimFermer() {
	var elementFenetre = document.getElementById('fenetreLiveoptim');
	elementFenetre.style.display = 'none';
}
function fenetre1LiveoptimOuvrir() {
	var elementFenetre1 = document.getElementById('fenetre1Liveoptim');
	elementFenetre1.style.display = 'block';
}

function fenetre1LiveoptimFermer() {
	var elementFenetre1 = document.getElementById('fenetre1Liveoptim');
	elementFenetre1.style.display = 'none';
}
function fenetre2LiveoptimOuvrir() {
	var elementFenetre2 = document.getElementById('fenetre2Liveoptim');
	elementFenetre2.style.display = 'block';
}

function fenetre2LiveoptimFermer() {
	var elementFenetre2 = document.getElementById('fenetre2Liveoptim');
	elementFenetre2.style.display = 'none';
}
function fenetre3LiveoptimOuvrir() {
	var elementFenetre3 = document.getElementById('fenetre3Liveoptim');
	elementFenetre3.style.display = 'block';
}

function fenetre3LiveoptimFermer() {
	var elementFenetre3 = document.getElementById('fenetre3Liveoptim');
	elementFenetre3.style.display = 'none';
}
function fenetre4LiveoptimOuvrir() {
	var elementFenetre4 = document.getElementById('fenetre4Liveoptim');
	elementFenetre4.style.display = 'block';
}

function fenetre4LiveoptimFermer() {
	var elementFenetre4 = document.getElementById('fenetre4Liveoptim');
	elementFenetre4.style.display = 'none';
}
function fenetre5LiveoptimOuvrir() {
	var elementFenetre5 = document.getElementById('fenetre5Liveoptim');
	elementFenetre5.style.display = 'block';
}

function fenetre5LiveoptimFermer() {
	var elementFenetre5 = document.getElementById('fenetre5Liveoptim');
	elementFenetre5.style.display = 'none';
}
function fenetre6LiveoptimOuvrir() {
	var elementFenetre6 = document.getElementById('fenetre6Liveoptim');
	elementFenetre6.style.display = 'block';
}

function fenetre6LiveoptimFermer() {
	var elementFenetre6 = document.getElementById('fenetre6Liveoptim');
	elementFenetre6.style.display = 'none';
}

function fenetreInfoPreniumOuvrir() {
	var elementInfoPrenium = document.getElementById('fenetreInfoPrenuim');
	elementInfoPrenium.style.display = 'block';
}

function fenetreInfoPreniumFermer() {
	var elementInfoPrenium = document.getElementById('fenetreInfoPrenuim');
	elementInfoPrenium.style.display = 'none';
}

function displayInfoPrenium(){
	var elementInfoPrenium = document.getElementById('infoPrenium');
	if (elementInfoPrenium.style.display == 'none'){
		
		jQuery('#infoPrenium').fadeIn(1000);
		
		
	}else{
		
		jQuery('#infoPrenium').fadeOut(1000);
		
	}
	
}	

function verifRequetteMotCle(msg){
	if(document.getElementsByName('requete')[0].value==''){
		alert(msg);
		return false;
	}
	return true;
}

function verifCap(msg1, msg2, msg3){

	if(document.getElementsByName('valcap')[0].value==''){
		alert(msg1);
		return false;
	}
	
	if(isNaN(document.getElementsByName('valcap')[0].value)){
		alert(msg2);
		return false;
	}
	
	if(parseInt(document.getElementsByName('valcap')[0].value)>5){
		alert(msg3);
		return true;
	}
	return true;
}


function displayRestriction(msg){
	alert(msg);
	return false;
}

function verifMerde(msg1,msg2,msg3){
	alert('merde');
}

function verifFile(msg1,msg2,msg3,file,val){

	str=file+'';
	val=Number(val)+0;
	if(str==''){
		alert(msg1);
		return false;
	}
	if(val==7){
		ext="sql";
		msg=".sql ?";
	}
	else if(val==6){
		ext="zip";
		msg=msg3;
	}
	else{
		ext='csv';
		msg=msg2;
	}
	extension=str.substring(str.length-3,str.length);

	if(extension==ext){
		booltest=false;
	}
	else{
		booltest=true;
	}
	
	if (booltest){
		alert(msg);
		resetFileInput();
		return false;
	}
	return true;
}

function resetFileInput()
{
	var valeurs = new Array();
	var i;
	for (i=0;i<document.forms['import_import'].length;i++) {
		if (document.forms['import_import'].elements[i].getAttribute('type') != 'file')
			valeurs[i] = document.forms['import_import'].elements[i].value;
	}
	document.forms['import_import'].reset();
	for (i=0;i<valeurs.length;i++) {
		if (document.forms['import_import'].elements[i].getAttribute('type') != 'file')
			document.forms['import_import'].elements[i].value = valeurs[i];
	}
}
/**
 * ajaxOuvrirFenetreNouveauRapport
 */
function ajaxOuvrirFenetreNouveauRapport() {
	// Creation de l'objet XMLHttpRequest
	get_Xhr();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// Que fera AJAX si tout se passe bien, il va inserer dans le composant HTML d'id idElement
			// le resultat de la page appellée
			document.getElementById( "rank_resultat" ).style.display = '';
			document.getElementById( "rank_attente" ).style.display = 'none';
			var id_projet=document.getElementById( "lien_so" );
			id_projet.setAttribute("href",id_projet.getAttribute("href")+xhr.responseText);
			
			
			
		}
	}
	
	// Nous allons interroger la page php souhaité pour recuperer la reponse
	xhr.open("POST", "../wp-content/plugins/liveoptim/admin_5_2/config/ranking/rank_google_bing.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	// Nous envoyons avec la requete ci dessus les parametres
	xhr.send( "" );
}


var xhr = null;
/**
 * Fonction de cr�ation d'objet XMLHttRequest
 */
function get_Xhr() {
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else if (window.ActiveXOject) {
		try {
			xhr = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (el) {
				xhr = null;
			}
		}
	} else {
		alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest\nVeuillez le mettre à jour.");
	}
	return xhr;
}


