<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

use App\Models\User;

use Session;

class MarketplaceAccountController extends Controller
{
    public function index()
    {
        $account = User::where('id', Auth::user()->id)->firstOrFail();

        return view('User.Page.Marketplace.Page.Account.Account', compact('account', ));
    }

    public function show($id)
    {
        if(Session::has('user')){
            $account = User::where('id', Auth::user()->id)->firstOrFail();

            $provinces = Province::pluck('name', 'code');

            return view('User.Page.Marketplace.Page.Account.Create', compact('account', 'provinces'));
        }
        else{
            return redirect()->route('marketplace.index')->with(['success' => 'Silahkan Login Terlebih Dahulu']);
        }
    }

    


}
