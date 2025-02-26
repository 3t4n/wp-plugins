<?php
function get_kwm_address_one(){
	
	$getOptions = get_kwm_all_infos('address');
	$addresvalue = $getOptions['address'];

	$address = $addresvalue['address']; //Rua
	$number = $addresvalue['number']; //Numero
	$neighborhood = $addresvalue['neighborhood']; //Bairro
	$complement = $addresvalue['complement']; //Complemento
	$zipcode = $addresvalue['zipcode']; //CEP
	$state = $addresvalue['state']; //Estado
	$contry = $addresvalue['contry']; //Pais

	$addressReturn = '';
	if($address != ''){
		$addressReturn .= $address;
	}

	//Numero
	if($address != '' && $number != ''){
		$addressReturn .= ', '.$number;
	}elseif($number != ''){
		$addressReturn .= $number;
	}
	
	//Bairro
	if(
	   $address != '' && $number != '' && $neighborhood != '' ||
	   $number != '' && $neighborhood != '' || 
	   $address != '' && $neighborhood != ''
	  )
	{
		$addressReturn .= ' - '.$neighborhood;
	}elseif($neighborhood != ''){
		$addressReturn .= $neighborhood;
	}

	//Complemento
	if(
	   $address != '' && $number != '' && $neighborhood != '' && $complement != '' ||
	   $number != '' && $complement != '' || 
	   $number != '' && $neighborhood != '' && $complement != '' || 
	   $neighborhood != '' && $complement != '' || 
	   $address != '' && $complement != '' 
	  )
	{
		$addressReturn .= ' - '.$complement;
	}elseif($complement != ''){
		$addressReturn .= $complement;
	}

	//CEP
	if(
	   $address != '' && $number != '' && $neighborhood != '' && $complement != '' && $zipcode != '' ||
	   $number != '' && $complement != '' && $zipcode != '' || 
	   $number != '' && $neighborhood != '' && $complement != '' && $zipcode != '' || 
	   $neighborhood != '' && $complement != '' && $zipcode != '' || 
	   $address != '' && $complement != '' && $zipcode != '' ||
	   $complement != '' && $zipcode != '' 
	  )
	{
		$addressReturn .= ' - '.$zipcode;
	}elseif($zipcode != ''){
		$addressReturn .= $zipcode;
	}

	$stateContry = '';
	if($state != '' && $contry != ''){
		$stateContry = $state.'/'.$contry;
	}elseif($state != ''){
		$stateContry = $state;
	}elseif($contry != ''){
		$stateContry = $contry;
	}

	//CEP
	if(
	   $address != '' && $number != '' && $neighborhood != '' && $complement != '' && $zipcode != '' && $stateContry != '' ||
	   $number != '' && $complement != '' && $zipcode != '' && $stateContry != '' || 
	   $number != '' && $neighborhood != '' && $complement != '' && $zipcode != '' && $stateContry != '' || 
	   $neighborhood != '' && $complement != '' && $zipcode != '' && $stateContry != '' || 
	   $address != '' && $complement != '' && $zipcode != '' && $stateContry != '' ||
	   $complement != '' && $zipcode != '' && $stateContry != '' ||
	   $zipcode != '' && $stateContry != ''  
	  )
	{
		$addressReturn .= ' - '.$stateContry;
	}elseif($stateContry != ''){
		$addressReturn .= $stateContry;
	}
	
	return $addressReturn;
	
}
?>