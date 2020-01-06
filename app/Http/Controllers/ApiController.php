<?php

namespace App\Http\Controllers;

use App\Nedsa\Respondable;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use Respondable;


    protected $paginateLimit = 5;

    protected $user;

    protected $authenticatable;

    /**
     * ApiController constructor.
     * @internal param $paginatorLimit
     */
    public function __construct()
    {
        $this->setPaginatorLimit(request('number'));
//        $this->user = User::where('email', request()->getUser())->first();
//        $this->authenticatable = $this->user->authenticatable;
    }

    /**
     * @param int $paginateLimit
     * @internal param int $paginatorLimit
     */
    public function setPaginatorLimit($paginateLimit = 5)
    {
        if ($paginateLimit) {
            $this->paginateLimit = $paginateLimit;
        }
    }
}
