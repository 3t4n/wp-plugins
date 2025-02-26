var connection;
var cke=null;
var charHeight=20;
var lineHeight=16;
var maxHeight=100;

var firstDown = false;

var cityAutocompleteAvailable = false;
var countryAutocompleteAvailable = false;

var rpcCallDelay = 250; // Delay (in milliseconds) before the rpc call is executed after a keystroke.

if(navigator&&navigator.userAgent.toLowerCase().indexOf("msie")!=-1)
{
	var offsetAutocompleteTop = 25;
	var offsetAutocompleteLeft = 5;	
}
else if(navigator&&navigator.userAgent.toLowerCase().indexOf("safari")!=-1)
{
	var offsetAutocompleteTop = 25;
	var offsetAutocompleteLeft = 5;	
}
else if(navigator&&navigator.userAgent.toLowerCase().indexOf("opera")!=-1)
{
	var offsetAutocompleteTop = 28;
	var offsetAutocompleteLeft = 8;	
}
else
{
	var offsetAutocompleteTop = 20;
	var offsetAutocompleteLeft = 0;	
}

function getNodeIndex(node)
{
	var children = node.parentNode.childNodes;
	for (var nodeCounter=0; nodeCounter < children.length; nodeCounter++)
	{
		if (children[nodeCounter]==node)
			return nodeCounter;
	}	
	return -1;
}

function prehandleKeys(event)
{
	if (getKeyCode(event)==8 && cke)
	{
		
		if (window.event)
		{
			window.event.cancelBubble=true;
			window.event.returnValue = false;
		}
		return false;
	}
}

function handleKeys(event)
{
	
	keyCode = getKeyCode(event);

	if (firstDown)
	{
		firstDown = false;
		return;
	}
	if (keyCode==40 && cke!=null && cke.nextSibling)
	{
		cke.className = 'resultItem';
		cke = cke.nextSibling;
		cke.className = 'resultItemHL';		
		cke.scrollIntoView(false);
		setItemFromPulldown();
	}
	else if (keyCode==38 && cke && cke.previousSibling)
	{
		cke.className = 'resultItem';
		cke = cke.previousSibling;
		cke.className = 'resultItemHL';
		setItemFromPulldown();
		cke.scrollIntoView(false);
	}
	else if (keyCode==38 && cke && !cke.previousSibling)
	{
		//BUG!!
		document.getElementById('hs_country').focus();
		cke.className='resultItem';
		cke=null;	
	}
	else if (keyCode==9 || keyCode==13)
	{
		if (cke && cke.parentNode.id=='autocompleteCountry')
		{
			tempNode=cke;
			clearAllAutocomplete();
			selectCountryItem(tempNode);
		}	
		else if (cke)
		{
			tempNode=cke;
			clearAllAutocomplete();
			selectCityItem(tempNode);			
			document.getElementById('hs_searchbutton').focus();
			
		}
		
	}
	else if (keyCode==8)
	{
		if (cke)
		{
			if (cke.parentNode.id=='autocompleteCountry')
			{
				clearAllAutocomplete();		
				setTimeout("document.getElementById('hs_country').focus()",10);
			}
			else
			{
				clearAllAutocomplete();		
				setTimeout("document.getElementById('hs_city').focus()",10);
				
			}
		}
		return false;
	}
	
}

function setItemFromPulldown()
{
	
	if (cke.parentNode.id=='autocompleteCountry')
	{

		document.getElementById('hs_country').value=cke.getAttribute('countryID');	
	}
	else
	{
		selectCityItem(cke);
	}	
}


function clearCountryAutocomplete()
{
	var autocomplete = document.getElementById('autocompleteCountry');
	autocomplete.style.visibility='hidden';
	autocomplete.style.display='none';
	var countryAutocompleteAvailable = false;	
}
		 
function clearCityAutocomplete()
{
	var autocomplete = document.getElementById('autocompleteCity');
	autocomplete.style.visibility='hidden';
	autocomplete.style.display='none';
	var cityAutocompleteAvailable = false;
}

function clearAllAutocomplete()
{
	cke=null;
	var autocomplete = document.getElementById('autocompleteCountry');
	autocomplete.style.visibility='hidden';
	autocomplete.style.display='none';
	
	var autocomplete = document.getElementById('autocompleteCity');
	autocomplete.style.visibility='hidden';
	var cityAutocompleteAvailable = false;
	var countryAutocompleteAvailable = false;	
}

function onLoad()
{
	var autocompleteCountry = document.getElementById('autocompleteCountry');
	var hsCountry = document.getElementById('hs_country');	

	autocompleteCountry.style.top = (findPosY(hsCountry) + offsetAutocompleteTop)+'px';
	autocompleteCountry.style.left = (findPosX(hsCountry) + offsetAutocompleteLeft)+'px';
	
	var autocompleteCity = document.getElementById('autocompleteCity');
	var hsCity = document.getElementById('hs_city');	

	autocompleteCity.style.top =  (findPosY(hsCity) + offsetAutocompleteTop)+'px';
	autocompleteCity.style.left = (findPosX(hsCity) + offsetAutocompleteLeft)+'px';
	document.onkeyup=handleKeys;
	document.onkeydown = prehandleKeys;
	
	var hs_name = document.getElementById('hs_name');
/*	if(hs_name.type=='text')
		hs_name.focus();
	else
		document.getElementById('hs_day').focus(); */
}

function bodyOnClick()
{
	var autocomplete = document.getElementById('autocompleteCountry');
	autocomplete.style.visibility='hidden';
	autocomplete.style.display='none';
	var autocomplete = document.getElementById('autocompleteCity');
	autocomplete.style.visibility='hidden';
	autocomplete.style.display='none';
	
}

function getKeyCode(e)
{
	
	if(window.event)
	{
		var keyCode = window.event.keyCode;
	}
	else if ( e)
	{
		var keyCode= e.keyCode;
	}
	return keyCode;

}

function setKeyCode(e,code)
{
	if(window.event)
	{
		window.event.keyCode=code;
	}
	else if (e)
	{		
		e.keyCode=code;
	}
}

function setCountryAutocompletFocus()
{
	var autocompleteCountry = document.getElementById('autocompleteCountry');
	var children =(autocompleteCountry.childNodes);
	if(children.length==0)
		return 0;

	children[0].className='resultItemHL';
	cke=children[0];
	
}

function unsetCityID()
{
	document.getElementById('hs_city').value='';
	document.getElementById('hs_city_id').value='';
	
}

function hs_country_onkeyup(object,e)
{
	var keyCode = getKeyCode(e);
	
	if (keyCode==40)
	{
		firstDown=true;
		object.blur();
		setCountryAutocompletFocus();						
		document.getElementById('hs_country').value=cke.getAttribute('countryID');	
	}
	else
	{
		var country = document.getElementById('hs_country');
		if(object.value.length>0)
		{		
			setConnectingAlert(document.getElementById('autocompleteCountry'));
			setTimeout("setCountryAutoComplete(\"" + object.value + "\")", rpcCallDelay);
		}
		else
		{
			document.getElementById('autocompleteCountry').style.visibility='hidden';
			document.getElementById('autocompleteCountry').style.display='none';
			
			cke=null;
		}
	}
}

function setCountryAutoComplete(searchString)
{
	if(document.getElementById('hs_country').value != searchString) 
	{
		return false;
	}

	connection = xmlhttpAvailable();
	connection.onreadystatechange=stateChangedCountry;
	connection.open('GET', '../country_rpc.php?search=' + escape(searchString),true);
	connection.setRequestHeader("Content-Type", 'text/html');
	connection.send('');
}

function stateChangedCountry()
{
	if (connection.readyState==4)
	{
		var autocomplete = document.getElementById('autocompleteCountry');
		autocomplete.innerHTML=buildTableCountry(connection.responseText);
		autocomplete.style.visibility='visible';
		autocomplete.style.display='block';
	}
}

function buildTableCountry(result)
{
	if (result == '0')
	{
		return '<div class="resultItem">Geen resultaten...</div>';		
	}
	
	resultFields = result.split(';');
	resultFields.sort();
	var resultHTML = '';
	if (resultFields.length>lineHeight && navigator&&navigator.userAgent.toLowerCase().indexOf("msie")!=-1)
	{
		document.getElementById('autocompleteCountry').style.height=maxHeight+'px';
	}
	else
	{
		document.getElementById('autocompleteCountry').style.height='';
	}
	
	for (var resultCount = 0; resultCount < resultFields.length; resultCount++)
	{
		resultHTML += '<div onMouseOut="return unsetFocus(this);" onMouseOver="return setFocus(this);" onClick="return selectCountryItem(this);" class="resultItem" countryID="' + resultFields[resultCount] + '" >';
		resultHTML += resultFields[resultCount];
		resultHTML += '</div>';
	}
	return resultHTML;
}

function selectCountryItem(country)
{
	document.getElementById('hs_country').value=country.getAttribute('countryID');	
	setTimeout("document.getElementById('hs_city').focus()",10);
	
}



function setConnectingAlert(autocompleteElement)
{
	setAutocompleteMessage(autocompleteElement,'Connecting...');
}
function setAutocompleteMessage(autocompleteElement,message)
{

	autocompleteElement.innerHTML='<div class="resultItem">'+message+'</div>';
	autocompleteElement.style.visibility='visible';
	autocompleteElement.style.display='block';
	
}


function setCityAutocompletFocus()
{
	var autocompleteCity = document.getElementById('autocompleteCity');
	var children =(autocompleteCity.childNodes);
	if(children.length==0)
		return 0;

	children[0].className='resultItemHL';
	cke=children[0];
	
}


function hs_city_onkeyup(object,e)
{
	
	var keyCode = getKeyCode(e);
	var country = document.getElementById('hs_country');
	
	if (keyCode==40 && cityAutocompleteAvailable)
	{
		firstDown=true;
		object.blur();
		setCityAutocompletFocus();						
		selectCityItem(cke);
		
	}
	else
	{			
		if (country.value=='')
		{
			setAutocompleteMessage(document.getElementById('autocompleteCity'),'Kies eerst een geldig land...');		
			return;
		}
		if(object.value.length>1)
		{
			setTimeout("setAutoCompleteCity(\"" + object.value + "\")", rpcCallDelay);
		}
	}
}

function setAutoCompleteCity(searchString)
{
	if(document.getElementById('hs_city').value != searchString)
	{
		return false;
	}

	setConnectingAlert(document.getElementById('autocompleteCity'));
	connection = xmlhttpAvailable();
	connection.onreadystatechange=stateChangedCity;
	//alert('../city_rpc.php?search=' + escape(searchString)+'&country='+escape(document.getElementById('hs_country').value));
	connection.open('GET', '../city_rpc.php?search=' + escape(searchString)+'&country='+escape(document.getElementById('hs_country').value),true);
	connection.setRequestHeader("Content-Type", 'text/html');
	connection.send('');	
}

function stateChangedCity()
{
	if (connection.readyState==4)
	{
		var autocomplete = document.getElementById('autocompleteCity');
		autocomplete.innerHTML=buildTableCity(connection.responseText);
		autocomplete.style.visibility='visible';
		autocomplete.style.display='block';
	}
}



function selectCityItem(object)
{	
	document.getElementById('hs_city_id').value = object.getAttribute('cityID');
	document.getElementById('hs_city').value = object.getAttribute('cityName');
	
}

function setFocus(object)
{
	object.className='resultItemHL';
}

function unsetFocus(object)
{
	object.className='resultItem';
}



function buildTableCity(result)
{
	if (result == '0')
	{
		return '<div class="resultItem">Geen resultaten...</div>';		
	}	
	
	var results = result.split('\n');
	cityAutocompleteAvailable=true;

	if (results.length>lineHeight && navigator && navigator.userAgent.toLowerCase().indexOf("msie")!=-1)
	{
		document.getElementById('autocompleteCity').style.height=maxHeight+'px';
	}
	else
	{
		document.getElementById('autocompleteCity').style.height='';
	}
	
	var resultHTML = '';
	var sameAsPrior = false;
	var sameAsPriorb = false;
	var same
	for (resultCount = 0; resultCount < results.length; resultCount++)
	{
		
		resultFields = results[resultCount].split(';');
		resultHTML += '<div onMouseOut="return unsetFocus(this);" onMouseOver="return setFocus(this);" onClick="return selectCityItem(this);" class="resultItem" cityName="'+ resultFields[1] +'" cityID="' + resultFields[0] + '" >';
		resultHTML += resultFields[1];
		
		if (resultCount != (results.length - 1))
		{
			nextFields = results[resultCount+1].split(';');
			if (resultFields[1]==nextFields[1] && resultFields[3]==nextFields[3])
			{				
				resultHTML += ', ' + resultFields[4];
				sameAsPrior = true;
				if (resultFields[4]==nextFields[4] )
				{
					resultHTML += ', ' + resultFields[5] + ' - ' + resultFields[6];					
					sameAsPriorb = true;
				}
				else
				{
					sameAsPriorb = false;
				}
			}
			else if (sameAsPrior)
			{
				resultHTML += ', ' + resultFields[4];
				if (sameAsPriorb)
					resultHTML += ', ' + resultFields[5] + ' - ' + resultFields[6];					
				sameAsPrior = false;
				sameAsPriorb = false;
			}
			else
			{
				sameAsPrior = false;
				sameAsPriorb = false;
			}
		}
		else if (sameAsPrior)
		{
			resultHTML += ', ' + resultFields[4];			
			if (sameAsPriorb)
				resultHTML += ', ' + resultFields[5] + ' - ' + resultFields[6];					
			
		}
		
		//if (resultFields[3]>1) resultHTML += ', ' + resultFields[4];
		resultHTML += '</div>';
	}
	return resultHTML;
}

function submitHSTrouwForm(form)
{
	var formValid = true;
	if (!fsCheckCity())
	{
		document.getElementById('fout').innerHTML="Gekozen land of plaats is onjuist.";
//		alert('Gekozen land of plaats is onjuist.');
		formValid=false;
		return;
	}
	
	if (!fsCheckDate())
	{
		document.getElementById('fout').innerHTML="Datum is onjuist.";
//		alert('Datum is onjuist.');
		formValid=false;
		return;
	}
	
	if (!checkTime())
	{
		document.getElementById('fout').innerHTML="Tijd is onjuist.";
//		alert('Tijd is onjuist');
		formValid=false;
		return;
		
	}

	if (document.getElementById('hs_name').value=='')
	{
		document.getElementById('fout').innerHTML="Naam eerste partner ontbreekt.";
//		alert('Naam eerste partner ontbreekt');
		return false;
	}
	if (document.getElementById('hs_name_b').value=='')
	{
		document.getElementById('fout').innerHTML="Naam tweede partner ontbreekt.";
//		alert('Naam tweede partner ontbreekt');
		return false;
	}
	
	if (formValid)
	{
		form.submit();
	}
	
}


function submitHSForm(form)
{form.submit();
	var formValid = true;
	if (!fsCheckCity())
	{
		document.getElementById('fout').innerHTML="Gekozen geboorteland of plaats is onjuist.";
//		alert('Gekozen geboorteland of plaats is onjuist.');
		formValid=false;
		return;
	}
	
	if (!fsCheckDate())
	{
		document.getElementById('fout').innerHTML="Datum is onjuist.";
//		alert('Datum is onjuist.');
		formValid=false;
		return;
	}
	
	if (!checkTime())
	{
		document.getElementById('fout').innerHTML="Tijd is onjuist.";
//		alert('Tijd is onjuist');
		formValid=false;
		return;
		
	}

	if (document.getElementById('hs_name').value=='')
	{
		document.getElementById('fout').innerHTML="Naam ontbreekt.";
//		alert('Naam ontbreekt');
		return false;
	}
	
	if (formValid)
	{
		form.submit();
	}
}

function checkTime()
{
	var hours = document.getElementById('hs_hours').value;
	var minutes = document.getElementById('hs_minutes').value;
	
	if (hours.length<2)
		return false;
	if (minutes.length<2)
		return false;
	if (isNaN(hours))
		return false;
	if (isNaN(minutes))
		return false;
	if (parseInt(hours,10)>23)
		return false;
	if (parseInt(minutes,10)>59)
		return false;
	return true;	
}



function fsCheckDate()
{
	return parseDate(document.getElementById('hs_day').value + '-' + document.getElementById('hs_month').value+'-' + document.getElementById('hs_year').value);
}

function fsCheckCity()
{
	if (document.getElementById('hs_city_id').value!='' && document.getElementById('hs_country').value!='')
	{
		var curl = '../city_check.php?cityID=' +escape(document.getElementById('hs_city_id').value);
	}
	else
	{
		return false;
	}
	//else
	
	//{
	//	var curl = '../city_check.php?countryName=' +escape(document.getElementById('hs_country').value) + '&cityName=' +escape(document.getElementById('hs_city').value);
	//}
	connection = xmlhttpAvailable();
	//connection.onreadystatechange=stateChangedCity;
	connection.open('GET', curl,false);
	connection.setRequestHeader("Content-Type", 'text/html');
	connection.send('');		
	var valid = (connection.responseText);
	return valid == '1';
}

function xmlhttpAvailable()
{
		var xmlhttp;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		try {
			xmlhttp=new ActiveXObject("Msxml2.XMLHTTP")
		} catch (e) {
			try {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
			} catch (E) {
				xmlhttp=false
			}
		}
		@else
		xmlhttp=false
		@end @*/
		if (!xmlhttp && document.createElement) {
			try {
	  			xmlhttp = new XMLHttpRequest();
			} catch (e) {
	  		xmlhttp=false
			}
		}
		return xmlhttp;
}

function findPosX(obj)
{
	var curleft = 0;
	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curleft += obj.offsetLeft
			obj = obj.offsetParent;
		}
	}
	else if (obj.x)
		curleft += obj.x;
	return curleft;
}

function findPosY(obj)
{
	var curtop = 0;
	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curtop += obj.offsetTop
			obj = obj.offsetParent;
		}
	}
	else if (obj.y)
		curtop += obj.y;
	return curtop;
}


