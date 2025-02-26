<?php

function admonpedidosservientrega_nombreCortoDpto($name_location)
    {
        if ( 'Valle del Cauca' === $name_location )
            $name_location =  'Valle';
		if ('Archipielago de San Andres, Providencia y Santa Catalina'=== $name_location )
            $name_location =  'Archipielago de San Andres';
        if('Distrito Capital de Bogota'=== $name_location)
            $name_location ='Cundinamarca';
        return $name_location;
    }

function admonpedidosservientrega_nombreCortoCiudad($city)
    {
		if ($city === 'Bogota D.C') $city='Bogota' ;
		if ($city === 'San andres isla') $city='San Andres' ;
		if ($city === 'Puerto inirida') $city='Inirida' ;
		
        Return $city ; 
    }


function admonpedidosservientrega_limpiar_cadena($string)
    {
        $not_permitted = array ("á","é","í","ó","ú","Á","É","Í",
            "Ó","Ú","ñ");
        $permitted = array ("a","e","i","o","u","A","E","I","O",
            "U","n");
        $text = str_replace($not_permitted, $permitted, $string);
        return $text;
    }
    
function admonpedidosservientrega_clean_cities_rate($cities)
    {
        foreach ($cities as $key => $value){
            $cities[$key] = admonpedidosservientrega_limpiar_cadena($value);
        }

        return $cities;
    }


function admonpedidosservientrega_despliegueRecursivoArray($arrayObject,$namespace,$nombreRaiz=null) {
	$abreRaiz= is_null($nombreRaiz)?"":("<".$namespace.":".$nombreRaiz.">");
	$cierraRaiz=is_null($nombreRaiz)?"":("</".$namespace.":".$nombreRaiz.">");
    $resultado= ($abreRaiz);
	foreach($arrayObject as $key=>$data) {
        if(is_array($data)) {
            $resultado=$resultado.(admonpedidosservientrega_despliegueRecursivoArray($data,$namespace,$key));
        } elseif(is_object($data)) {
            $resultado=$resultado.(admonpedidosservientrega_despliegueRecursivoArray($data,$namespace,$key));
        } else {
            $resultado=$resultado."<".$namespace.":".$key.">".$data."</".$namespace.":".$key.">";
        }
    }
	$resultado=$resultado.($cierraRaiz);
	
	return $resultado;
}

function admonpedidosservientrega_simplexml_load_string_nons($xml, $sxclass = 'SimpleXMLElement', $nsattr = false, $flags = null){
    // Validate arguments first
    if(!is_string($sxclass) or empty($sxclass) or !class_exists($sxclass)){
        trigger_error('$sxclass must be a SimpleXMLElement or a derived class.', E_USER_WARNING);
        return false;
    }
    if(!is_string($xml) or empty($xml)){
        trigger_error('$xml must be a non-empty string.', E_USER_WARNING);
        return false;
    }
    
    // Load XML if URL is provided as XML
    if(preg_match('~^https?://[^\s]+$~i', $xml) || file_exists($xml)){
        $xml = file_get_contents($xml);
    }
    
    // Let's drop namespace definitions
    if(stripos($xml, 'xmlns=') !== false){
        $xml = preg_replace('~[\s]+xmlns=[\'"].+?[\'"]~i', null, $xml);
    }
    
    // I know this looks kind of funny but it changes namespaced attributes
    if(preg_match_all('~xmlns:([a-z0-9]+)=~i', $xml, $matches)){
        foreach(($namespaces = array_unique($matches[1])) as $namespace){
            $escaped_namespace = preg_quote($namespace, '~');
            $xml = preg_replace('~[\s]xmlns:'.$escaped_namespace.'=[\'].+?[\']~i', null, $xml);
            $xml = preg_replace('~[\s]xmlns:'.$escaped_namespace.'=["].+?["]~i', null, $xml);
            $xml = preg_replace('~([\'"\s])'.$escaped_namespace.':~i', '$1'.$namespace.'_', $xml);
        }
    }
    
    // Let's change <namespace:tag to <namespace_tag ns="namespace"
    $regexfrom = sprintf('~<([a-z0-9]+):%s~is', !empty($nsattr) ? '([a-z0-9]+)' : null);
    $regexto = strlen($nsattr) ? '<$1_$2 '.$nsattr.'="$1"' : '<$1_';
    $xml = preg_replace($regexfrom, $regexto, $xml);
    // Let's change </namespace:tag> to </namespace_tag>
    $xml = preg_replace('~</([a-z0-9]+):~is', '</$1_', $xml);
    
    // Default flags I use
    if(empty($flags)) $flags = LIBXML_COMPACT | LIBXML_NOBLANKS | LIBXML_NOCDATA;
    // Now load and return (namespaceless)
    return $xml = simplexml_load_string($xml, $sxclass, $flags);
}

function admonpedidosservientrega_xmlToArray($xml, $options = array()) {
    $defaults = array(
        'namespaceSeparator' => ':',//you may want this to be something other than a colon
        'attributePrefix' => '@',   //to distinguish between attributes and nodes with the same name
        'alwaysArray' => array(),   //array of xml tag names which should always become arrays
        'autoArray' => true,        //only create arrays for tags which appear more than once
        'textContent' => '$',       //key used for the text content of elements
        'autoText' => true,         //skip textContent key if node has no attributes or child nodes
        'keySearch' => false,       //optional search and replace on tag and attribute names
        'keyReplace' => false       //replace values for above search values (as passed to str_replace())
    );
    $options = array_merge($defaults, $options);
    $namespaces = $xml->getDocNamespaces();
    $namespaces[''] = null; //add base (empty) namespace
    
    //get attributes from all namespaces
    $attributesArray = array();
    foreach ($namespaces as $prefix => $namespace) {
        foreach ($xml->attributes($namespace) as $attributeName => $attribute) {
            //replace characters in attribute name
            if ($options['keySearch']) $attributeName =
            str_replace($options['keySearch'], $options['keyReplace'], $attributeName);
            $attributeKey = $options['attributePrefix']
            . ($prefix ? $prefix . $options['namespaceSeparator'] : '')
            . $attributeName;
            $attributesArray[$attributeKey] = (string)$attribute;
        }
    }
    
    //get child nodes from all namespaces
    $tagsArray = array();
    foreach ($namespaces as $prefix => $namespace) {
        foreach ($xml->children($namespace) as $childXml) {
            //recurse into child nodes
            $childArray = admonpedidosservientrega_xmlToArray($childXml, $options);
            list($childTagName, $childProperties) = each($childArray);
            
            //replace characters in tag name
            if ($options['keySearch']) $childTagName =
            str_replace($options['keySearch'], $options['keyReplace'], $childTagName);
            //add namespace prefix, if any
            if ($prefix) $childTagName = $prefix . $options['namespaceSeparator'] . $childTagName;
            
            if (!isset($tagsArray[$childTagName])) {
                //only entry with this key
                //test if tags of this type should always be arrays, no matter the element count
                $tagsArray[$childTagName] =
                in_array($childTagName, $options['alwaysArray']) || !$options['autoArray']
                ? array($childProperties) : $childProperties;
            } elseif (
                is_array($tagsArray[$childTagName]) && array_keys($tagsArray[$childTagName])
                === range(0, count($tagsArray[$childTagName]) - 1)
                ) {
                    //key already exists and is integer indexed array
                    $tagsArray[$childTagName][] = $childProperties;
            } else {
                //key exists so convert to integer indexed array with previous value in position 0
                $tagsArray[$childTagName] = array($tagsArray[$childTagName], $childProperties);
            }
        }
    }
    
    //get text content of node
    $textContentArray = array();
    $plainText = trim((string)$xml);
    if ($plainText !== '') $textContentArray[$options['textContent']] = $plainText;
    
    //stick it all together
    $propertiesArray = !$options['autoText'] || $attributesArray || $tagsArray || ($plainText === '')
    ? array_merge($attributesArray, $tagsArray, $textContentArray) : $plainText;
    
    //return node as array
    return array(
        $xml->getName() => $propertiesArray
    );
}


function admonpedidosservientrega_SanitizeArrays($tags) {
		
		
        if (is_array($tags)) {
            foreach ($tags as &$tag) {
                $tag = sanitize_text_field($tag);
            }
            unset($tag );
        } else {
            $tags = sanitize_text_field($tags);
        }
        
        return $tags;
}
function pruebarecorrer(&$item, $clave)
{
    $item=sanitize_text_field($item);
}
function admonpedidosservientrega_SanitizeKeysValuesArray($array) {

     array_walk_recursive($array, 'pruebarecorrer');
    return $array;
}

