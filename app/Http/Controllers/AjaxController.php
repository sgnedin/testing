<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Object;
use App\Traits\GetOptions;

class AjaxController extends Controller
{
    use GetOptions;
    
    protected $user;

    public function __construct(Request $request)
    {
        $this->user = $request->get('user') ?? null;
        $this->middleware('auth');
    }

    public function addresses()
    {
        return Address::all();
    }

    public function objects()
    {
        return Object::all();
    }
}
