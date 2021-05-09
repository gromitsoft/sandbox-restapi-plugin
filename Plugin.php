<?php namespace Sandbox\RestApi;

use Backend;
use Config;
use Fruitcake\Cors\CorsServiceProvider;
use Fruitcake\Cors\HandleCors;
use Illuminate\Contracts\Http\Kernel;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails(): array
    {
        return [
            'name'        => 'RestApi',
            'description' => 'RestApi demo plugin',
            'author'      => 'Sandbox',
            'icon'        => 'icon-cogs'
        ];
    }

    public function boot(): void
    {
        Config::set('cors', Config::get('sandbox.restapi::cors'));

        $this->app->register(CorsServiceProvider::class);

        $this->app[Kernel::class]->pushMiddleware(HandleCors::class);

//        \App::error(function (ValidationException $exception) {
//            return response()->json([
//                'message' => 'validation exception',
//                'errors'  => $exception->getErrors()
//            ], 422);
//        });
    }

    public function registerNavigation(): array
    {
        return [
            'restapi' => [
                'label'       => 'Exception',
                'url'         => Backend::url('sandbox/restapi/hello'),
                'icon'        => 'icon-leaf',
                'order'       => 500,
            ],
        ];
    }
}
