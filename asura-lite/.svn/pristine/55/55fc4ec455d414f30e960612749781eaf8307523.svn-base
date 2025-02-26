<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(function_exists('wp_timezone_string') ? wp_timezone_string() : env('APP_TIMEZONE', 'UTC'));

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();

$app->withEloquent();


/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Asura\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Asura\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Config Files
|--------------------------------------------------------------------------
|
| Now we will register the "app" configuration file. If the file exists in
| your configuration directory it will be loaded; otherwise, we'll load
| the default version. You may register other files below as needed.
|
*/

$app->configure('app');
$app->configure('auth');
$app->configure('bugsnag');
$app->configure('database');
$app->configure('filesystems');
$app->configure('rest');
$app->configure('services');
$app->configure('settings');

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

// $app->middleware([
//     Asura\Http\Middleware\ExampleMiddleware::class,
// ]);

// $app->routeMiddleware([
//     'auth' => Asura\Http\Middleware\Authenticate::class,
// ]);

$app->routeMiddleware([
    'wordpress.admin' => Asura\Http\Middleware\WordPressAdmin::class,
]);

$app->routeMiddleware([
    'thelostasura.rest' => Asura\Http\Middleware\Rest::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(Bugsnag\BugsnagLaravel\BugsnagServiceProvider::class);
$app->register(Asura\Providers\AppServiceProvider::class);
$app->register(Asura\Providers\AuthServiceProvider::class);
$app->register(Spatie\LaravelSettings\LaravelSettingsServiceProvider::class);
// $app->register(Asura\Providers\EventServiceProvider::class);
if (!$app->runningInConsole()) {
    $app->register(TheLostAsura\Skynet\SkynetServiceProvider::class);
    $app->register(Asura\Providers\WordpressServiceProvider::class);
}

/*
|--------------------------------------------------------------------------
| Boot Service Providers
|--------------------------------------------------------------------------
|
| Boot all service providers
|
*/

$app->boot();

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'Asura\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
