<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        
        $reports = Report::with('devices')->get();
        return response()->json($reports);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'quantite' => 'required|integer',
            'etat' => 'required|string',
            'adress' => 'required|string',
            'cordonneesGps' => 'required|string',
            'dateSignalement' => 'required|date',
            'status' => 'required|string',
            'users_id' => 'required|exists:users,id',
            'devices' => 'required|array',
            'devices.*' => 'required',
        ]);

    
        $report = Report::create($validatedData);

        $report->devices()->attach($request->devices);

        return response()->json($report->load('devices'), 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = Report::with('devices')->find($id); 
        if (!$report) {
            return response()->json(['message' => 'Signalement non trouvé'], 404); 
        }
        return response()->json($report);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $report = Report::find($id); 
        if (!$report) {
            return response()->json(['message' => 'Signalement non trouvé'], 404);
        }

        $validatedData = $request->validate([
            'quantite' => 'sometimes|integer',
            'etat' => 'sometimes|string',
            'adress' => 'sometimes|string',
            'cordonneesGps' => 'sometimes|string',
            'dateSignalement' => 'sometimes|date',
            'status' => 'sometimes|string',
            'users_id' => 'sometimes|exists:users,id',
            'devices' => 'sometimes|array',
            'devices.*' => 'required',
        ]);

      
        $report->update($validatedData);

      
        if ($request->has('devices')) {
            $report->devices()->sync($request->devices);
        }

        return response()->json($report->load('devices'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $report = Report::find($id);
        if (!$report) {
            return response()->json(['message' => 'Signalement non trouvé:'], 404);
        }

        $report->delete();

        return response()->json(['message' => 'Signalement avec success']);

    }

}
