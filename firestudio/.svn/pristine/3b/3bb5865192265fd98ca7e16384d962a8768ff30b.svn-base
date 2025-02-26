<?php

/**
 *    __  _____   ___   __          __
 *   / / / /   | <  /  / /   ____ _/ /_  _____
 *  / / / / /| | / /  / /   / __ `/ __ `/ ___/
 * / /_/ / ___ |/ /  / /___/ /_/ / /_/ (__  )
 * `____/_/  |_/_/  /_____/`__,_/_.___/____/
 *
 * @package FireStudio
 * @author UA1 Labs Developers https://ua1.us
 * @copyright Copyright (c) UA1 Labs
 */

// injecting class dependencies
$injector = firestudio_injector();

$injector->set(\UA1Labs\Fire\Bug::class, \UA1Labs\Fire\Bug::get());

$pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
$fireSql = new \UA1Labs\Fire\Sql($pdo);
$injector->set(\UA1Labs\Fire\Sql::class, $fireSql);

$injector->set(\UA1Labs\Fire\Studio\Service\RendererService\TemplateRendererService::class, function() use ($injector) {
    $dataMapper = $injector->get(\UA1Labs\Fire\Studio\Service\DataMapperService::class);
    $renderer = $injector->get(\UA1Labs\Fire\Studio\Service\RendererService::class);
    return new \UA1Labs\Fire\Studio\Service\RendererService\TemplateRendererService($dataMapper, $renderer);
});

// enable debugging
$cookie = $injector->get(\UA1Labs\Fire\Studio\Service\CookieService::class);
$wpHelper = $injector->get(\UA1Labs\Fire\Studio\Service\WpHelperService::class);
$debugToggles = json_decode(urldecode($cookie->getCookieValue(\UA1Labs\Fire\Studio\Feature\Debug::COOKIE_FS_DEBUG_TOGGLE)));
if ($wpHelper->isAdminUser()) {
    if (
        isset($debugToggles->{\UA1Labs\Fire\Studio\Feature\Debug::TOGGLE_DEBUG_CURRENT_PAGE})
        && $debugToggles->{\UA1Labs\Fire\Studio\Feature\Debug::TOGGLE_DEBUG_CURRENT_PAGE} === true
    ) {
        define('SAVEQUERIES', true);
        $injector->get(\UA1Labs\Fire\Bug::class)->enable();
    }

    if (
        isset($debugToggles->{\UA1Labs\Fire\Studio\Feature\Debug::TOGGLE_DEBUG_DISPLAY_ERRORS})
        && $debugToggles->{\UA1Labs\Fire\Studio\Feature\Debug::TOGGLE_DEBUG_DISPLAY_ERRORS} === true
    ) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    }
}