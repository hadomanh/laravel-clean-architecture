<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

class CleanArchitecture
{
    private $response;
    private Router $router;

    public function __construct(Router $router) {
        $this->router = $router;
    }

    public function setResponse($response) {
        $this->response = $response;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($this->response === null) {
            return $response;
        }

        return $this->router->prepareResponse($this->router->getCurrentRequest(), $this->response);
    }
}
