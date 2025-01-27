<?php

namespace App\Http\Controllers;

use App\Models\equipment;
use Illuminate\Http\Request;

class AdminEquipmentContoller extends Controller
{

    public function index(){
        $equipments = equipment::all();
        return view('admin.equipment', compact('equipments'));
    }
    public function store(Request $request){
        $validate = $request->validate([
            'equipment' => ['required', 'string', 'max:255'],
            'maintenance' => ['required', 'date'],
            'category' => ['required', 'string'],
            'condition' => ['required', 'string'],
        ]);

        $equipment = equipment::create([
            'equipment_name' => $validate['equipment'],
            'maintenance_date' => $validate['maintenance'],
            'equipment_category' => $validate['category'],
            'condition_status' => $validate['condition'],
        ]);

        return redirect()->route('admin-equipment');
    }

    public function edit($id){
        $equipments = equipment::all();
        $equipmentEdit = equipment::find($id);
        return view('admin.equipment', compact('equipmentEdit', 'equipments'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'equipment' => ['required', 'string', 'max:255'],
            'maintenance' => ['required', 'date'],
            'category' => ['required', 'string'],
            'condition' => ['required', 'string'],
        ]);

        $equipment = equipment::find($id);
        $equipment->equipment_name = $validate['equipment'];
        $equipment->maintenance_date = $validate['maintenance'];
        $equipment->equipment_category = $validate['category'];
        $equipment->condition_status = $validate['condition'];
        $equipment->save();

        return redirect()->route('admin-equipment');
    }

    public function destroy($id){
        $equipment = equipment::find($id);
        $equipment->delete();

        return redirect()->route('admin-equipment');
    }
}
