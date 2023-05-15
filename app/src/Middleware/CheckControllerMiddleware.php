<?php

namespace App\Middleware;

use Cake\Http\Response;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;

class CheckControllerMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $route = Router::parseRequest($request);
        $controller = $route['controller'];

        $controllerClass = "App\\Controller\\" . ucfirst($controller) . "Controller";

        if (!class_exists($controllerClass)) {
            $request->getAttribute('session')->write('Flash.danger', 'Controller não encontrado!');
            return (new \Cake\Http\Response())
            ->withStatus(302)
            ->withHeader('Location', '/');           
        }

        return $handler->handle($request);
    }
}
