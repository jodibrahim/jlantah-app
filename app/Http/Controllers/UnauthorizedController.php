<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Hash;

class UnauthorizedController extends Controller
{

    public function index()
    {
        return view('unauthorized');
    }


}
