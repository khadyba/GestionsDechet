<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $devices = Device::all();
        return response()->json($devices);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
    
        $validatedData = $request->validate([
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
            'state' => 'required|string',
        ]);

        $device = Device::create($validatedData);

        return response()->json($device, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {

        $device = Device::find($id);
        if (!$device) {
            return response()->json(['message' => 'Appareil non trouvé'], 404);
        }
        return response()->json($device);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {

        $device = Device::find($id);
        if (!$device) {
            return response()->json(['message' => 'Appareil non trouvé'], 404);
        }

        $validatedData = $request->validate([
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
            'state' => 'required|string'
        ]);

        $device->update($validatedData);

        return response()->json($device);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {

        $device = Device::find($id);
        if (!$device) {
            return response()->json(['message' => 'Appareil non trouvée'], 404);
        }

        $device->delete();

        return response()->json(['message' => 'Appareil supprimée avec succés']);

    }

}
