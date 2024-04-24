<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Managementdata;

use Illuminate\Support\Facades\Auth;

class ManagementDataController extends Controller
{
    public function show_data() {

        $managementdata = Managementdata::all();

        return view('managementdata.show_data', compact('managementdata'));

    }
}