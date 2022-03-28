<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    //
    public function index() {
        return response()->json([
            'status'=>'success', 
            'data'=>Profile::orderBy('id', 'DESC')->get()
        ]);
    }
}
