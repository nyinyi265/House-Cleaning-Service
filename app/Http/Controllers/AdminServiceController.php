<?php

namespace App\Http\Controllers;

use App\Models\equipment;
use App\Models\requiredEquipment;
use App\Models\service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = service::all();
        $equipments = equipment::all();
        $categories = ServiceCategory::all();
        return view('admin.service', compact('services', 'equipments', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'service-name' => ['required', 'string'],
            'service-description' => ['required', 'string'],
            'service-cost' => ['required', 'numeric'],
            'service-category' => ['required', 'string'],
            'service-image' => ['required'],
            'equipments' => ['required', 'array'],
            'equipments.*' => ['exists:equipments,id'],
        ]);

        if ($request->hasFile('service-image')) {

            $image = $request->file('service-image');
            $imgName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imgName);

            $service = service::create([
                'service_name' => $validated['service-name'],
                'description' => $validated['service-description'],
                'cost' => $validated['service-cost'],
                'service_image' => 'uploads/' . $imgName,
                'category_id' => $validated['service-category'],
            ]);

            $service->needEquipmentForServices()->attach($validated['equipments']);
        }
        return redirect()->route('admin-service');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services = service::all();
        $equipments = equipment::all();
        $categories = ServiceCategory::all();
        $serviceEdit = service::with('needEquipmentForServices')->find($id);
        return view('admin.service', compact('services', 'equipments', 'categories', 'serviceEdit'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $serviceUpd = service::find($id);
    
        $serviceUpd->needEquipmentForServices()->detach();
    
        $validated = $request->validate([
            'service-name' => ['required', 'string'],
            'service-description' => ['required', 'string'],
            'service-cost' => ['required', 'numeric'],
            'service-category' => ['required', 'string'],
            'equipments' => ['required', 'array'],
            'equipments.*' => ['exists:equipments,id'],
        ]);
    
        $imagePath = $request->hasFile('service-image') ? 'uploads/' . time() . '_' . $request->file('service-image') : $serviceUpd->service_image;

        if($request->hasFile('service-image')){
            $request->file('service-image')->move(public_path('uploads'), basename($imagePath));
        }

        $serviceUpd->update([
            'service_name' => $validated['service-name'],
            'description' => $validated['service-description'],
            'cost' => $validated['service-cost'],
            'service_image' => $imagePath,
            'category_id' => $validated['service-category']
        ]);
    
        $serviceUpd->needEquipmentForServices()->attach($validated['equipments']);
    
        return redirect()->route('admin-service')->with('success', 'Service updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $del = service::find($id);
        $del->delete();
        return redirect()->route('admin-service');
    }
}
