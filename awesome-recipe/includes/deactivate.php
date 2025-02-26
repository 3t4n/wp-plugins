<?php

/**
* Triggers when deactivate the plugin.
*
*@package AwesomeRecipePlugin
*/

function arpcpt_awesome_recipe_deactivation(){

	flush_rewrite_rules();
}