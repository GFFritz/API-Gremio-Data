<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public ?string $prefix = null;

    public function setMiddleware(string $controller, array $methods = [])
    {
        $_methods = [
            'index',
            'show',
            'store',
            'update',
            'destroy'
        ];

        $allMethods = array_merge($_methods, $methods);

        array_map(
            fn ($method) => $this->middleware(
                'permission:'. $this->prefix .'-' . $controller .'-' . $method, ['only' => $method]
            ),
            $allMethods
        );
    }
}
