<?php

namespace App\Http\Controllers;

use App\Models\equipment;
use Illuminate\Http\Request;

class AdminEquipmentContoller extends Controller
{
    //
    public function index(){
        $equipment = equipment::all();
        return view('admin.service', compact('equipments'));
    }
}
