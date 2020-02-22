<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Object;
use App\Models\Type;
use App\Models\Floor;
use App\Traits\GetOptions;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

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

    public function filters()
    {
        $filters = [
            'floors' => Floor::all()->toArray(),
            'proizv' =>['Lenovo', 'Msi', 'Samsung'],
            'uch' => Address::all(),
            'active' => Type::all(),
            'cabinet' => ['103', '208']
        ];

        return $filters;
    }

    public function createAddress(Request $request)
    {
        $name = $request->get('name');
        $count = Address::where('address_name', $name)->count();
        if($count == 0) {
            (new Address(['address_name' => $name]))->save();
            return response('allOk',200);
        } else {
            return response('alredyExists', 202);
        }
    }
    public function deleteAddress(Request $request)
    {
        $id = $request->get('id');
        Address::destroy($id);
        return response($id);
    }
}
