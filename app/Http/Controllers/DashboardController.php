<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCrudResource;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {

        return view('dashboard')->with([
            'user' => new UserCrudResource(auth()->user()),
        ]);
    }
}
