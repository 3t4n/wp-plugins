<?php
/*
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

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
 * Version 2.3.1 ( 12/09/2012 )
 * 
 * Compatible avec les sites en UTF-8 et ISO-8859-1
 * Ce fichier doit être en encodage utf-8 (toutefois aucun problème n'on été rencontré en ISO-8859-1)
 * 
 */


require_once dirname(__FILE__).'/base/conteneurMotCle.class.php';
require_once dirname(__FILE__).'/base/conteneurBaliseIgnore.class.php';
require_once dirname(__FILE__).'/base/conteneurTentativeMaj.class.php';
require_once dirname(__FILE__).'/base/conteneurParametres.class.php';
require_once dirname(__FILE__).'/base/conteneurConfig.class.php';

/**
 * fonction qui optimise le texte en entré pour le référencement
 *
 * @param string &$ptrTexte
 * @param string $charset
 * @return string le texte optimisé
 */
 

function liveoptim_action(&$ptrTexte, $charset = null) {
	
	
	$motCles = liveoptim_charger_mots_cles_restreint($registre);
	
	$nb_mot_cle=count($motCles);
	// $ lm pour liste de mots clés
	
	reset($motCles);

	// récupération des balises dont le contenu sera ignoré (en minuscule)
	$balisesNonParsable = liveoptim_charger_balises_non_parsable();
	
	// indiquez la liste des carractère à prendre en compte pour le nom des balises
	$charValidePourNomBalise = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

	// on récupère les autres parametres
	
	
	if ($charset == 'iso') {
		
		$texte = utf8_encode($ptrTexte);
		
		$texteOptimise = ''; // le texte optimisé final qui sera retourné
		//$tailleTexte = strlen($texte);
		$tailleTexte = mb_strlen($texte, 'UTF-8');
		$offset = 0; // l'offset du texte originel ($ptrTexte)
		$isOptimisable = false; // paramètre qui sera modifié par la fonction 'nextBlock', il indique si le block est optimisable.
		$block = null; // un morceau de $ptrTexte commencant à $offset qui est ou non optimisable ($isParsable)
		$baliseInvalideActuelle = null;
		
		// le texte originel ($ptrTexte) est considéré comme une agrégation de block de texte optimisable ou non
		// on récupère un à un chaqu'un de ces blocks
		while ( ( $block = liveoptim_next_block($texte, $tailleTexte, $offset, $isOptimisable, $balisesNonParsable, $baliseInvalideActuelle, $charValidePourNomBalise) ) !== false ) {
			// si le block est optimisable, on le fait et si non, on le recopie comme tel
			
			if($isOptimisable){
				$texteOptimise .= liveoptim_optimiser( $block, $motCles, $registre);
			}
			else{
				$texteOptimise .= $block;
			}
			
		}
		
		return utf8_decode( $texteOptimise );
	} else { // utf8
	
		$texteOptimise = ''; // le texte optimisé final qui sera retourné
		//$tailleTexte = strlen($ptrTexte);
		$tailleTexte = mb_strlen($ptrTexte, 'UTF-8');
		$offset = 0; // l'offset du texte originel ($ptrTexte)
		$isOptimisable = false; // paramètre qui sera modifié par la fonction 'nextBlock', il indique si le block est optimisable.
		$block = null; // un morceau de $ptrTexte commencant à $offset qui est ou non optimisable ($isParsable)
		$baliseInvalideActuelle = null;

		
		// le texte originel ($ptrTexte) est considéré comme une agrégation de block de texte optimisable ou non
		// on récupère un à un chaqu'un de ces blocks
		while ( ( $block = liveoptim_next_block($ptrTexte, $tailleTexte, $offset, $isOptimisable, $balisesNonParsable, $baliseInvalideActuelle, $charValidePourNomBalise) ) !== false ) {
			// si le block est optimisable, on le fait et si non, on le recopie comme tel
			if($isOptimisable){
				$texteOptimise .= liveoptim_optimiser( $block, $motCles,$registre);
			}
			else{
				$texteOptimise .= $block;
			}
			
		}
		
		return $texteOptimise;
	}
	
}


/**
 * fonction qui retourne le block de texte suivant en indiquant si il est ou non optimisable ($ptrIsOptimisable)
 *
 * @param string &$ptrTexte le texte originel
 * @param int $tailleTexte la taille du texte originel
 * @param int &$ptrOffset l'offset du texte originel ($ptrTexte)
 * @param boolean &$ptrIsOptimisable paramètre qui sera modifié par cette fonction, il indique si le block est optimisable.
 * @param array<string> $ptrBalisesNonParsable
 * @param string &$ptrBaliseInvalideActuelle
 * @param string &$ptrCharValidePourNomBalise
 * @return string le block de texte et false si il n'y a plus de block
 */
function liveoptim_next_block(&$ptrTexte, $tailleTexte, &$ptrOffset, &$ptrIsOptimisable, &$ptrBalisesNonParsable, &$ptrBaliseInvalideActuelle, &$ptrCharValidePourNomBalise) {
	
	if ( $ptrOffset < $tailleTexte ) {
		// il reste des blocks
		
		if ( $ptrTexte[$ptrOffset] == '<' ) {
			// si le block est une balise
			$finBlock = strpos($ptrTexte, '>', $ptrOffset) + 1;
			$block = substr( $ptrTexte, $ptrOffset, $finBlock - $ptrOffset );
			
			// si c'est le debut d'une balise et que l'on ne se trouve pas déjà dans une balise non optimisable "$ptrBaliseInvalideActuelle"
			if ( is_null($ptrBaliseInvalideActuelle) ) {
				// si la possibilité d'optimisé est activé ( $ptrBaliseInvalideActuelle est NULL )

				// et si c'est une ouverture de balise
				if ( $block['1'] != '/' ) {
					
						// si c'est une ouverture de balise on récurère son nom
						$tailleNomBalise = strspn($block, $ptrCharValidePourNomBalise, 1);
						$balise = strtolower( substr($block, 1, $tailleNomBalise) );
						
						// si la balise est non parsable, alors on l'enregistre $ptrBaliseInvalideActuelle
						if ( in_array( $balise, $ptrBalisesNonParsable ) ) $ptrBaliseInvalideActuelle = $balise;
				}
				
			} elseif ( $block['1'] == '/' ) {
				// si on se trouve dans une balise non optimisable et que c'est une fermeture de balise
				// alors on cherche si c'est la fermeture de la balise $ptrBaliseInvalideActuelle
				
				// on récupère le nom de la balise de fermeture
				$tailleNomBaliseFermeture = strspn($block, $ptrCharValidePourNomBalise, 2);
				// si elle correspond a $ptrBaliseInvalideActuelle, cela signifi que l'on ne sera plus dans une balise non optimisable
				if ( strcasecmp( substr($block, 2, $tailleNomBaliseFermeture) , $ptrBaliseInvalideActuelle) == 0 ) $ptrBaliseInvalideActuelle = null;
			}
			
			$ptrIsOptimisable = false;
			$ptrOffset = $finBlock;
			return $block;
			
		} elseif ( ( $finBlock = strpos($ptrTexte, '<', $ptrOffset) ) !== false ) {
			// si le block n'est pas une balise
			$block = html_entity_decode( substr( $ptrTexte, $ptrOffset, $finBlock - $ptrOffset ), ENT_NOQUOTES, 'UTF-8' );
			$ptrOffset = $finBlock;
			return ( $ptrIsOptimisable = is_null($ptrBaliseInvalideActuelle) )? $block : htmlentities( $block, ENT_NOQUOTES, 'UTF-8' );

		} else {
			// si c'est le dernier block de texte
			$block = html_entity_decode( substr( $ptrTexte, $ptrOffset ), ENT_NOQUOTES, 'UTF-8' );
			$ptrOffset = $tailleTexte;
			return ( $ptrIsOptimisable = is_null($ptrBaliseInvalideActuelle) )?  $block : htmlentities( $block, ENT_NOQUOTES, 'UTF-8' );
		}
		
	} else return false; // il n'y a plus de block
}

/**
 * optimise le block de texte en entré
 *
 * @param string &$ptrBlock
 * @param array<string> &$ptrMotCles
 * @param array<char> &$ptrRegistre
 * @return string
 */
function liveoptim_optimiser(&$ptrBlock, &$ptrMotCles, &$ptrRegistre) {

	// on map dans un premier temps les possibilitées
	$map = array();
	reset($ptrRegistre);
	do  {
		$pos = -1;
		while ( ( $pos = strpos( $ptrBlock, current($ptrRegistre), $pos + 1 ) ) !== false ) {
			array_push($map, $pos);
		}
		$pos = -1;
		$char = ord( current($ptrRegistre) ) - 32; // la meme lettre mais en majuscule
		while ( ( $pos = strpos( $ptrBlock, $char, $pos + 1 ) ) !== false ) {
			array_push($map, $pos);
		}
	} while ( next($ptrRegistre) !== false );
	natsort($map);
	if ( count($map) == 0 ) return $ptrBlock; // il n'y a rien a optimiser
	reset($map);

	$blockOptimise = ''; // le block de texte optimisé qui sera retourné
	//$tailleBlock = strlen($ptrBlock);
	$tailleBlock = mb_strlen($ptrBlock, 'UTF-8');
	$needle = null;
	$tailleMotCle = null;
	$offset = 0; // l'offset du block de texte originel ($ptrBlock)
	$i=0;
	// on récupère la position dans le block du prochain mot clé
	
	
	while ($i<4 && ( $pos = liveoptim_str_position($ptrMotCles, $ptrBlock, $tailleBlock, $needle, $tailleMotCle, $map) ) !== false ) {
			
		$blockOptimise .= htmlentities( substr($ptrBlock, $offset, $pos - $offset), ENT_NOQUOTES, 'UTF-8' );
		
		if((($ptrMotCles[$needle]['numAction']+1)%2)==0 && ($ptrMotCles[$needle]['numAction']+1)<3){
			$schema = '<a href="%2$s">%1$s</a>';
		}else{
			$schema = '%1$s';
		}
		
		
				
		
		//echo $_SERVER['HTTP_REFERER']."<br />";
		
		//Protection contre le bouclage	
		while(strpos( $schema, "%2\$s") !== false  &&
			  current($ptrMotCles[$needle]['lien'])!==FALSE &&(
				current( $ptrMotCles[$needle]['lien']) == 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] ||
				(isset($_SERVER['HTTP_REFERER']) && current($ptrMotCles[$needle]['lien']) == $_SERVER['HTTP_REFERER'])
			   )  
			){
			next( $ptrMotCles[$needle]['lien'] );

		}
			
		
			
			if (( $ptrMotCles[$needle]['numAction'] > 3) || (strpos( $schema, "%2\$s") !== false  && current( $ptrMotCles[$needle]['lien'] ) === false)) {
				
				$blockOptimise .= htmlentities( substr($ptrBlock, $pos, $tailleMotCle), ENT_NOQUOTES, 'UTF-8' );
			} else {
				if ( $ptrMotCles[$needle]['numAction'] < 3  ) {
					
					//echo "\$ptrMotCles[$needle]['numAction'] = ".$ptrMotCles[$needle]['numAction'];
					$ptrMotCles[$needle]['numAction']++;
				
				$motCleOP = sprintf(
						$schema, 
						htmlentities( substr($ptrBlock, $pos, $tailleMotCle), ENT_NOQUOTES, 'UTF-8' ), 
						current( $ptrMotCles[$needle]['lien'] )
						);
				
				$blockOptimise .= $motCleOP;
				//echo $motCleOP.'<br />';
				} 
				
				if ( 
					strpos( $schema , "%2\$s") !== false
					 
				){ 
					next( $ptrMotCles[$needle]['lien'] );
				}
			}
		
		++$i;
		$offset = $pos + $tailleMotCle;
		
	}
	
	// on retourne le block optimisé avec la fin non optimisable
	return $blockOptimise.htmlentities( substr($ptrBlock, $offset), ENT_NOQUOTES, 'UTF-8' );
}

/**
 * retourne la position de début du prochain mot clé
 * 
 * @param array<string> &$ptrMotCles
 * @param string &$ptrBlock
 * @param int $tailleBlock
 * @param mixed &$ptrNeedle valeur de retour
 * @param mixed &$ptrTailleMotCle valeur de retour
 * @param array<int> &$ptrMap
 * 
 * @return int 
 */
function liveoptim_str_position(&$ptrMotCles, &$ptrBlock, $tailleBlock, &$ptrNeedle, &$ptrTailleMotCle, &$ptrMap) {
	// pour chaque octet du block
	
	while ( current($ptrMap) !== false ) {
		$offset = current($ptrMap);
		next($ptrMap);

		// pour chaque mot clé
		reset($ptrMotCles);
		while ( current($ptrMotCles) !== false ) {
			$i = $offset; // à partir de l'offset de $ptrBlock on vérifie que la suite correspond au mot clé
			$j = 0; // l'offset du mot clé
			
			// on vérifi que le mot clé ne soit pas collé a un carracrère alphanumérique vers la gauche
			if (
					$i - 1 >= 0 &&
					(
							( ( $charBlock = ord( $ptrBlock[$i - 1] ) ) < 48 || $charBlock > 122 ) ||
							( $charBlock > 57 && $charBlock < 65 ) ||
							( $charBlock > 90 && $charBlock < 97 )
					) == false
			) {
				next($ptrMotCles);
				
				continue;
			}
			if(key($ptrMotCles)==""){
				continue;
			}
			
			
			do {

				// si le mot clé est fini
				if ( $j == $ptrMotCles[key($ptrMotCles)]['taille'] ) {
					// si le mot clé n'est pas collé à une lettre ou un chiffre
					if ( 
							$i >= $tailleBlock || 
//							(
//									( ord( $ptrBlock[$i] ) < 48 || ord( $ptrBlock[$i] ) > 57 ) && // de '0' à '9'
//									( ord( $ptrBlock[$i] ) < 65 || ord( $ptrBlock[$i] ) > 90 ) && // de 'A' à 'Z' 
//									( ord( $ptrBlock[$i] ) < 97 || ord( $ptrBlock[$i] ) > 122 ) // de 'a' à 'z'
//							)
							// identique mais plus optimisé
							( ( $charBlock = ord( $ptrBlock[$i] ) ) < 48 || $charBlock > 122 ) || 
							( $charBlock > 57 && $charBlock < 65 ) || 
							( $charBlock > 90 && $charBlock < 97 )
					) {
						$ptrTailleMotCle = $i - $offset; // on renvoi la taille du mot clé dans le texte
						$ptrNeedle = key($ptrMotCles); // on renvoi le mot clé
						
						while (current($ptrMap) <= $i ) {
							if ( next($ptrMap) === false ) break;
						}
						//$capping[key($ptrMotCles)]++;
						return $offset; // le mot clé est trouvé, on renvoi sa position
					} else break;
				}
			} while( 
					liveoptim_is_egal( 
							$ptrBlock, 
							$i, 
							key($ptrMotCles), 
							$j, 
							$tailleBlock 
					) 
			);
			next($ptrMotCles);
		}
	}

	// $ptrNeedle est introuvable 
	return false;
}

/**
 * fonction qui test si deux chaînes de carractères sont identique sans prendre en compte les majuscules et les accents
 * 
 * @param string &$ptrHaystack
 * @param int &$ptrOffsetHaystack
 * @param string $ptrNeedle
 * @param int &$ptrOffsetNeedle
 * 
 * @return boolean 
 */
function liveoptim_is_egal( &$ptrHaystack, &$ptrOffsetHaystack, $ptrNeedle, &$ptrOffsetNeedle, $tailleBlock ) {
	if ($ptrOffsetHaystack >= $tailleBlock) return false;
	
	// si $ptrHaystack a un accent, $ptrNeedle doit obligatoirement en avoir un aussi
	// $ptrHaystack $ptrNeedle
	//       e           e         valide
	//       é           e         valide
	//       e           é         invalide
	//       é           é         valide

	// si les octets sont identique, on passe a l'octet suivant
	if ( 
			$ptrNeedle[$ptrOffsetNeedle] == $ptrHaystack[$ptrOffsetHaystack] || 
			( ord( $ptrHaystack[$ptrOffsetHaystack] ) >= 65 && ord( $ptrHaystack[$ptrOffsetHaystack] ) <= 90 ) && 
			$ptrNeedle[$ptrOffsetNeedle] == chr( ord( $ptrHaystack[$ptrOffsetHaystack] ) + 32 )
		)
	
	{
		++$ptrOffsetNeedle;
		++$ptrOffsetHaystack;
		return true;
	} else {
		$charNeedle = $ptrNeedle[$ptrOffsetNeedle++];

		// si $ptrHaystack[$ptrOffsetHaystack] est accentué
		if ( ord( $ptrHaystack[$ptrOffsetHaystack++] ) == 195 && $ptrOffsetHaystack < $tailleBlock ) { // indique un carractère avec un accent
			$charHaystack = ord( $ptrHaystack[$ptrOffsetHaystack++] ); // on récupère l'octet suivant de $ptrHaystack en numérique
			switch ( $charNeedle ) {
				case 'a': // 'à', 'á', 'â', 'ã', 'ä', 'å'
				case 'A':
					return ( $charHaystack >= 160 && $charHaystack <= 165 || $charHaystack >= 128 && $charHaystack <= 133 );
				case 'o': // 'ò', 'ó', 'ô', 'õ', 'ö'
				case 'O':
					return ( $charHaystack >= 178 && $charHaystack <= 182 || $charHaystack >= 146 && $charHaystack <= 150 );
				case 'e': // 'è', 'é', 'ê', 'ë'
				case 'E':
					return ( $charHaystack >= 168 && $charHaystack <= 171 || $charHaystack >= 136 && $charHaystack <= 139 );
				case 'c': // 'ç'
				case 'C':
					return ( $charHaystack == 167 || $charHaystack == 135 );
				case 'i': // 'ì', 'í', 'î', 'ï'
				case 'I':
					return ( $charHaystack >= 172 && $charHaystack <= 175 || $charHaystack >= 140 && $charHaystack <= 143 );
				case 'u': // 'ù', 'ú', 'û', 'ü'
				case 'U':
					return ( $charHaystack >= 185 && $charHaystack <= 188 || $charHaystack >= 153 && $charHaystack <= 156 );
				case 'y': // 'ÿ'
				case 'Y':
					return ( $charHaystack == 191 || $charHaystack == 159 );
				case 'n': // 'ñ'
				case 'N':
					return ( $charHaystack == 177 || $charHaystack == 145  );
			}
		} else return false;
		
	}
	
}

/**
 * liveoptim_charger_balises_non_parsable
 * @return array
 */
function liveoptim_charger_balises_non_parsable() {
	$reponse = array();
	$tempTable = conteneurBaliseIgnore::getInstance()->getAll();
	foreach ($tempTable as $ligne) {
		array_push( $reponse, $ligne['nom'] );
	}
	return $reponse;
}

/**
 * liveoptim_charger_pattern
 * @return array
 */
function liveoptim_charger_pattern() {
	$reponse = array();
	$tempTable = ConteneurPattern::getInstance()->getAll();
	foreach ($tempTable as $ligne) {
		$lPattern = $ligne['structure'];
		// on transforme {mc} en %1$s
		$lPattern = str_replace('{mc}', '%1$s', $lPattern);
		// on transforme {url} en %2$s
		$lPattern = str_replace('{url}', '%2$s', $lPattern);
		
		array_push( $reponse, $lPattern );
	}
	return $reponse;
}

function liveoptim_charger_mots_cles_restreint(&$ptrRegistre) {
	$reponse = array();
	$ptrRegistre = array( chr(195) );

	$tempTable = ConteneurMotCle::getInstance()->getRestricted();

	$saveMotCle = null;
	foreach ( $tempTable as $ligne ) {
			
		//$motCle = utf8_encode( $ligne['requete'] );
		$motCle = $ligne['requete'];
			
		$ancreMotCle = liveoptim_clean_url( $ligne['requete'] );

		//update 28-04-2010 -> ajout ancre au lien pour meilleure prise en compte si liens multiples vers même page
		$destination = $ligne['destination'];
			
			
		if ( $saveMotCle != $motCle ) {
			// nouveau mot clé
			$saveMotCle = $motCle;

			if ( !in_array($saveMotCle['0'], $ptrRegistre) ) array_push($ptrRegistre, $saveMotCle['0']);

			// ajout de la taille du mot clé
			//$reponse[$saveMotCle]['taille'] = strlen($saveMotCle);
			$reponse[$saveMotCle]['taille'] = mb_strlen($saveMotCle, 'UTF-8');

			// ajout de l'idication de l'action a effectué pour ce mot clé
			$reponse[$saveMotCle]['numAction'] = -1;
			$reponse[$saveMotCle]['numActionSansLiens'] = -1;

			$reponse[$saveMotCle]['lien'] = array();
		}
			
		// ajout du lien
		array_push( $reponse[$saveMotCle]['lien'], $destination );
	}

	return $reponse;
}

/**
 * liveoptim_clean_url
 *
 * @param String $texte
 * @return String
 */
function liveoptim_clean_url($texte) {
	// Suppression des espaces en début et fin de chaîne
	$texte = trim($texte);

	// Suppression des accents
	$texte = strtr($texte,'ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËéèêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ','aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn');

	// mise en minuscule
	$texte = strtolower($texte);

	// Suppression des espaces et caracteres spéciaux
	$texte = str_replace(" ", '-', $texte);
	$texte = strtr('#([^a-z0-9-])#', '-', $texte);

	// Suppression des tirets multiples
	$texte = strtr('#([-]+)#', '-', $texte);

	// Suppression du premier caractère si c'est un tiret
	if ($texte{0} == '-')
		$texte = substr($texte, 1);

	// Suppression du dernier caractère si c'est un tiret
	if (substr($texte, -1, 1) == '-')
		$texte = substr($texte, 0, -1);

	return $texte;
}

?>


