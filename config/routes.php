<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Msgpool',
    ['path' => '/msgpool'],
    function (RouteBuilder $routes) {
         $routes->fallbacks(DashedRoute::class);
    }
);


/*


Router::prefix('admin', function ($routes) {
    $routes->plugin('msgpool', ['path' => '/msgpool'], function ($routes) {
        $routes->fallbacks(DashedRoute::class);
    });
});
*/