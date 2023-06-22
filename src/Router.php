<?php

namespace App;

use App\Controller\HomeController;
use App\Controller\ProjectController;
use App\Controller\TeamController;
use App\Handlers\CSRF;
use App\Handlers\Request;
use App\Template\Template;

/**
 *
 */
class Router
{
    /**
     * @var array
     */
    private array $routes = [
        '/' => ['controller' => HomeController::class, 'method' => 'index'],
        '/team' => ['controller' => TeamController::class, 'method' => 'index'],
        '/projects' => ['controller' => ProjectController::class, 'method' => 'index'],
    ];

    /**
     * @return void
     */
    public function run(): void
    {
        $request = new Request();
        $url = parse_url($_SERVER['REQUEST_URI']);
        $route = $this->routes[$url['path']] ?? null;

        if (!$route) {
            (new Template())->view('system/404');
            return;
        }

        if (!CSRF::check($request)) {
            (new Template())->view('system/403');
            return;
        }

        $controller = new $route['controller']();
        $controller->{$route['method']}($request);
    }
}