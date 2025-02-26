<?php

/**
 * @var $router ExactLinks\Framework\Http\Router
 */

$router->prefix('links')->withPolicy('AdminPolicy')->group(function ($router) { 
    $router->get('/', 'LinkController@getLinks');
    $router->get('/{id}/get_link', 'LinkController@getLink')->int('id');
    $router->put('/{id}/update_link', 'LinkController@updateLink')->int('id');
    $router->get('/get_link_attributes', 'LinkController@getLinkAttributes');
    $router->post('/maybe_delete_links', 'LinkController@maybeDeleteLinks');
    $router->get('/{id}/get_analytics', 'AnalyticsController@getAnalytics');
    $router->get('/{id}/get_analytics_download', 'AnalyticsController@getAnalyticsDownload');
});

$router->prefix('create_link')->withPolicy('AdminPolicy')->group(function ($router) {
    $router->get('get_slug', 'LinkController@getSlugConfig');
    $router->post('/', 'LinkController@createLink');
    // UTM Template
    $router->get('get_all_utm_templates', 'UTMController@getAllUTMTemplates');
    $router->get('get_utm_template', 'UTMController@getUTMTemplate');
    $router->post('update_utm_template', 'UTMController@updateUTMTemplate');
    $router->post('delete_utm_template', 'UTMController@deleteUTMTemplate');
    // Subdomain
    $router->get('get_all_subdomains', 'SubdomainController@getAllSubdomains');
    $router->get('get_subdomain', 'SubdomainController@getSubdomain');
    $router->post('update_subdomain', 'SubdomainController@updateSubdomain');
    $router->post('delete_subdomain', 'SubdomainController@deleteSubdomain');
});

$router->prefix('global_settings')->withPolicy('AdminPolicy')->group(function ($router) {
    $router->get('get_settings', 'SettingsController@getSettings');
    $router->put('update_settings', 'SettingsController@updateSettings');
    // Migration
    $router->get('get_migration_links', 'IntegrationsController@getMigrationLinks');
    $router->post('run_migration_links', 'IntegrationsController@runMigrationLinks');
    $router->post('deactivate_plugin', 'IntegrationsController@deactivatePlugin');
});