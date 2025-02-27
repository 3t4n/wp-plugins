<?php

/*
Plugin Name: Daisycon prijsvergelijkers
Plugin URI: https://www.daisycon.com/nl/vergelijkers/
Description: Promoot adverteerders van Daisycon eenvoudig en goed met de verschillende professionele prijsvergelijkers voor WordPress-publishers. Met deze plugin kun je eenvoudig en snel een vergelijkingssite maken. De plugin bevat op dit moment alle vergelijkers en zal regelmatig worden aangevuld met nieuwe tools, dus houd de updates in de gaten!
Author: Daisycon
Version: 4.8.4
Author URI: https://www.daisycon.com
 */

// Required files
require_once 'includes/general.php';
require_once 'includes/database.php';

// Required files for tools (alphabet)
require_once 'tools/accounting.php';
require_once 'tools/all-in-one.php';
require_once 'tools/car-insurance.php';
require_once 'tools/car-lease.php';
require_once 'tools/dating.php';
require_once 'tools/energy-be.php';
require_once 'tools/energy-nl.php';
require_once 'tools/funeral-insurance.php';
require_once 'tools/health-insurance.php';
require_once 'tools/market-research.php';
require_once 'tools/prefill-energy-be.php';
require_once 'tools/prefill-energy-nl.php';
require_once 'tools/simonly.php';
require_once 'tools/telecom.php';
require_once 'tools/uitvaart.php';
require_once 'tools/vacation.php';
require_once 'tools/wine.php';

// Activate files for tools
$plugin_accounting        = new generalDaisyconAccounting;
$plugin_all_in_one        = new generalDaisyconAllInOne;
$plugin_car_insurance     = new generalDaisyconCarInsurance;
$plugin_car_lease         = new generalDaisyconCarLease;
$plugin_dating            = new generalDaisyconDating;
$plugin_energy_be         = new generalDaisyconEnergyBE;
$plugin_energy_nl         = new generalDaisyconEnergyNL;
$plugin_funeral           = new generalDaisyconUitvaart;
$plugin_funeral_insurance = new generalDaisyconFuneralInsurance;
$plugin_general           = new generalDaisyconSettings;
$plugin_health_insurance  = new generalDaisyconHealth;
$plugin_market_research   = new generalDaisyconMarketResearch;
$plugin_prefill_energy_nl = new generalDaisyconPrefillEnergyNL;
$plugin_simonly           = new generalDaisyconSimonly;
$plugin_telecom           = new generalDaisyconTelecom;
$plugin_vacation          = new generalDaisyconVacation;
$plugin_wine              = new generalDaisyconWine;

// Create menu
function daisyconMenu()
{
	add_menu_page('daisycontools', 'Prijsvergelijkers', 'manage_options', 'daisycontools', array('generalDaisyconSettings', 'adminDaisyconSettings'), 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA3MjYuMTUgOTI3Ljg4Ij48ZGVmcz48c3R5bGU+LmF7ZmlsbDojYTdhYWFkO308L3N0eWxlPjwvZGVmcz48cGF0aCBjbGFzcz0iYSIgZD0iTTc1My43NSw1NS4yN2MxNy42MSw2Ljk1LDMuMjUsODYuMTktMzIuOSwxNzYuNTUtMzUuNjgsOTAuMzUtNzkuMjMsMTU4LTk3LjMsMTUxLjA2LTE3LjYxLTYuOTUtMy4yNS04Ni4xOSwzMi45LTE3Ni41NSwzNi4xNC05MC44Miw3OS43LTE1OCw5Ny4zLTE1MS4wNiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTEzNi45NiAtMzUuNjQpIi8+PHBhdGggY2xhc3M9ImEiIGQ9Ik01MzEuMzMsMzUuODFjMTkuNDctNC4xNyw0MS43MSw2OC41OCw1MCwxNjIuMThzLS45MywxNzMuMy0yMC4zOSwxNzcuNDctNDEuNy02OC41OC01MC4wNS0xNjIuMThjLTcuODctOTMuNi45My0xNzMuMywyMC4zOS0xNzcuNDciIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0xMzYuOTYgLTM1LjY0KSIvPjxwYXRoIGNsYXNzPSJhIiBkPSJNMzE5LjU3LDE0Ny40OGMxNS43Ni0xNC4zNiw2OS41MSwzMi45LDExOS41NSwxMDQuNzIsNTAuMDUsNzIuMjksNzcuODUsMTQyLjI2LDYyLjA5LDE1Ni42M3MtNjkuNS0zMi45LTExOS41NS0xMDQuNzNjLTUwLTcyLjI4LTc3Ljg0LTE0Mi4yNS02Mi4wOS0xNTYuNjIiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0xMzYuOTYgLTM1LjY0KSIvPjxwYXRoIGNsYXNzPSJhIiBkPSJNMTc0LjUzLDM1My4yMmM3Ljg4LTIwLjM5LDc4LjMxLTEyLjA1LDE1Ny4wOSwxOS40Niw3OC43NywzMS4wNSwxMzUuNzcsNzIuNzUsMTI3LjQzLDkzLjE0UzM4MC43NCw0NzcuNCwzMDIsNDQ2LjM2Yy03OC4zMS0zMS4wNS0xMzUuNzctNzIuNzUtMTI3LjQzLTkzLjE0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTM2Ljk2IC0zNS42NCkiLz48cGF0aCBjbGFzcz0iYSIgZD0iTTEzNyw2MDEuNTljLTEuODUtMjEuMzIsNjYuMjYtNTMuMjksMTUyLjQ1LTcxLjM2czE1Ny4wOS0xNS43NSwxNTguOTQsNS41Ni02Ni4yNiw1My4yOS0xNTIuNDUsNzEuMzZjLTg1LjczLDE4LjA3LTE1Ny4wOSwxNS43Ni0xNTguOTQtNS41NiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTEzNi45NiAtMzUuNjQpIi8+PHBhdGggY2xhc3M9ImEiIGQ9Ik0yMTUuNzcsODI3LjI1Yy0xMS4xMi0xNi4yMSwzNi42MS04MC4xNiwxMDctMTQzLjE4QzM5My4yNSw2MjEuNTIsNDU5LjUxLDU4NCw0NzAuNjMsNjAwLjJzLTM2LjYxLDgwLjE2LTEwNywxNDMuMThjLTcwLjQzLDYyLjU2LTEzNi43LDEwMC4wOS0xNDcuODIsODMuODciIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0xMzYuOTYgLTM1LjY0KSIvPjxwYXRoIGNsYXNzPSJhIiBkPSJNMzkyLjc4LDk2M2MtMTcuNi02Ljk1LTMuMjQtODYuMTgsMzIuOS0xNzYuNTQsMzUuNjgtOTAuMzYsNzkuMjQtMTU4LDk3LjMxLTE1MS4wNiwxNy42MSw3LDMuMjUsODYuMTgtMzIuOSwxNzYuNTRTNDEwLjM5LDk3MCwzOTIuNzgsOTYzIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTM2Ljk2IC0zNS42NCkiLz48cGF0aCBjbGFzcz0iYSIgZD0iTTc1Nyw1NTJjLTExLjU5LDctMjYsMTEuNTgtMzkuODUsMTEuNTgtMzIuNDQsMC0zOS44NS0xOS45Mi0zNi4xNS00Mi4xNiw0LjY0LTI1LjQ5LDIzLjE3LTQ2LjgxLDU3LTQ2LjgxLDEwLjY2LDAsMjYsMi43OCwzMi40NCw5LjI3Wk04NjMuMTEsMzU3LjM5SDc5Mi42OGwtMTUuNzYsODQuMzNjLTEzLTUuNTYtMjkuMTktOC44LTQ2LjMzLTguOC02Ny42NiwwLTExNC40Niw0Mi4xNy0xMjMuNzMsOTQuMDctNyw0MC43NywxNy42MSw4NC4zMyw4MS41Niw4NC4zM2ExMzUuNzgsMTM1Ljc4LDAsMCwwLDYyLjA5LTE4LjA3bC0xLjg1LDEyaDY5WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTEzNi45NiAtMzUuNjQpIi8+PC9zdmc+');
	add_submenu_page('daisycontools', 'Introductie', 'Introductie', 'manage_options', 'daisycontools');
	add_submenu_page('daisycontools', 'Alles in &eacute;&eacute;n', 'Alles in &eacute;&eacute;n', 'manage_options', 'all-in-one', array('generalDaisyconAllInOne', 'adminDaisyconAllInOne'));
	#add_submenu_page('daisycontools', 'Autoverzekering', 'Autoverzekering', 'manage_options', 'autoverzekering', array('generalDaisyconCarInsurance', 'adminDaisyconCarInsurance'));
	add_submenu_page('daisycontools', 'Boekhoudsoftware', 'Boekhoudsoftware', 'manage_options', 'accounting', array('generalDaisyconAccounting', 'adminDaisyconAccounting'));
	add_submenu_page('daisycontools', 'Dating', 'Dating', 'manage_options', 'dating', array('generalDaisyconDating', 'adminDaisyconDating'));
	add_submenu_page('daisycontools', 'Energie', 'Energie', 'manage_options', 'energy-nl', array('generalDaisyconEnergyNL', 'adminDaisyconEnergyNL'));
	add_submenu_page('daisycontools', 'Energie Belgie', 'Energie Belgie', 'manage_options', 'energy-be', array('generalDaisyconEnergyBE', 'adminDaisyconEnergyBE'));
	add_submenu_page('daisycontools', 'Leaseauto', 'Leaseauto', 'manage_options', 'car-lease', array('generalDaisyconCarLease', 'adminDaisyconCarLease'));
	add_submenu_page('daisycontools', 'Marktonderzoek', 'Marktonderzoek', 'manage_options', 'market-research', array('generalDaisyconMarketResearch', 'adminDaisyconMarketResearch'));
	add_submenu_page('daisycontools', 'Sim only', 'Sim only', 'manage_options', 'sim-only', array('generalDaisyconSimonly', 'adminDaisyconSimonly'));
	add_submenu_page('daisycontools', 'Uitvaartverzekering', 'Uitvaartverzekering', 'manage_options', 'funeral-insurance', array('generalDaisyconFuneralInsurance', 'adminDaisyconFuneralInsurance'));
	add_submenu_page('daisycontools', 'Vakantie', 'Vakantie', 'manage_options', 'vacation', array('generalDaisyconVacation', 'adminDaisyconVacation'));
	#add_submenu_page('daisycontools', 'Wijn', 'Wijn', 'manage_options', 'wijn', array('generalDaisyconWine', 'adminDaisyconWine'));
	add_submenu_page('daisycontools', 'Zorgverzekering', 'Zorgverzekering', 'manage_options', 'health-insurance', array('generalDaisyconHealth', 'adminDaisyconHealth'));
	// Prefill tools
	add_submenu_page('daisycontools', 'Prefill energie', 'Prefill energie', 'manage_options', 'prefill-energy-nl', array('generalDaisyconPrefillEnergyNL', 'adminDaisyconPrefillEnergyNL'));
}

// Add Daisycon menu to Wordpress admin interface
add_action('admin_menu', 'daisyconMenu');

// Add jQuery
function addDaisyconJquery()
{
	wp_enqueue_script('jquery');
}

// Add actions
add_action('wp_enqueue_scripts', 'addDaisyconJquery');
add_action('admin_menu', 'daisyconMenu');

// Add shortcodes
add_shortcode('daisycon_accounting', array('generalDaisyconAccounting', 'frontDaisyconAccounting'));
add_shortcode('daisycon_all_in_one', array('generalDaisyconAllInOne', 'frontDaisyconAllInOne'));
add_shortcode('daisycon_allesin1', array('generalDaisyconAllInOne', 'frontDaisyconAllInOne')); // backup old version
add_shortcode('daisycon_auto', array('generalDaisyconCarInsurance', 'frontDaisyconCarInsurance')); // backup old version
add_shortcode('daisycon_boekhoud', array('generalDaisyconAccounting', 'frontDaisyconAccounting')); // backup old version
add_shortcode('daisycon_car_insurance', array('generalDaisyconCarInsurance', 'frontDaisyconCarInsurance'));
add_shortcode('daisycon_car_lease', array('generalDaisyconCarLease', 'frontDaisyconCarLease'));
add_shortcode('daisycon_dating', array('generalDaisyconDating', 'frontDaisyconDating'));
add_shortcode('daisycon_energie', array('generalDaisyconEnergyNL', 'frontDaisyconEnergyNL')); // backup old version
add_shortcode('daisycon_energy_be', array('generalDaisyconEnergyBE', 'frontDaisyconEnergyBE'));
add_shortcode('daisycon_energy_nl', array('generalDaisyconEnergyNL', 'frontDaisyconEnergyNL'));
add_shortcode('daisycon_funeral_insurance', array('generalDaisyconFuneralInsurance', 'frontDaisyconFuneralInsurance'));
add_shortcode('daisycon_health_insurance', array('generalDaisyconHealth', 'frontDaisyconHealth'));
add_shortcode('daisycon_market_research', array('generalDaisyconMarketResearch', 'frontDaisyconMarketResearch'));
add_shortcode('daisycon_prefill_energy_nl', array('generalDaisyconPrefillEnergyNL', 'frontDaisyconPrefillEnergyNL'));
add_shortcode('daisycon_simonly', array('generalDaisyconSimonly', 'frontDaisyconSimonly'));
add_shortcode('daisycon_telecom', array('generalDaisyconTelecom', 'frontDaisyconTelecom'));
add_shortcode('daisycon_uitvaart', array('generalDaisyconUitvaart', 'frontDaisyconUitvaart')); // backup old version
add_shortcode('daisycon_vacation', array('generalDaisyconVacation', 'frontDaisyconVacation'));
add_shortcode('daisycon_wine', array('generalDaisyconWine', 'frontDaisyconWine'));
add_shortcode('daisycon_zorg', array('generalDaisyconHealth', 'frontDaisyconHealth')); // backup old version
