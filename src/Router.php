<?php
namespace Waryway\UserApi;

use FastRoute\RouteCollector;
use FastRoute;
use Waryway\MicroServiceEngine\BaseRouter;


class Router extends BaseRouter
{
    public function __construct()
    {
        parent::__construct();
        $this->dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
            $r->addRoute('GET', '/authentication/{user}/{password}', 'loginHandler');
            $r->addRoute('POST', '/authentication/{user}/{password}', 'createHandler');
            $r->addRoute('PUT', '/authentication/logout', 'logoutHandler');
            $r->addRoute('DELETE', '/authentication/{user}/{password}', 'deleteHandler');
        });
    }

    public function loginHandler($vars)
    {
        return __METHOD__ . print_r($vars, true);
    }

    public function logoutHandler($vars)
    {
        return __METHOD__ . print_r($vars, true);
    }

    public function createHandler($vars)
    {
        return __METHOD__ . print_r($vars, true);
    }

    public function deleteHandler($vars)
    {
        return __METHOD__ . print_r($vars, true);
    }
}