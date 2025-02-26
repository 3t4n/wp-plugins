<?php
/**
 * Created on: 26/05/14
 * Updated on: 15/11/22
 */

// Constante pour gérer certaines facettes
define('wphal_delimiter', '_FacetSep_');
define('wphal_delimiter_join', '_JoinSep_');

// Constante pour l'API
define('wphal_api', 'https://api.archives-ouvertes.fr/search/hal/');

// Constante pour le référentiel des auteurs
define('wphal_urlauthor', 'https://api.archives-ouvertes.fr/ref/author/');

// Constante pour le CV d'un auteur ayant un IdHAL
define('cvhal', 'https://cv.hal.science/');

// Constante pour la rédirection vers l'onglet Recherche de HAL
define('halv3', 'https://hal.science/search/index/');

// Constante pour la rédirection vers la page d'accueil de HAL
define('wphal_site', 'https://hal.science/');

// Constante pour le tri par date
define('wphal_producedDateY', urlencode('producedDate_tdate desc'));

// Constante de langue
define('wphal_locale', get_locale());

// Constante de version du plugin
define('wphal_version', '2.5');
