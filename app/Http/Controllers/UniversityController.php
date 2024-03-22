<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\University;
class UniversityController extends Controller
{
    public function index()
    {
        return view('university');
    }

    public function storeUniversities()
    {
        try {
            $response = Http::get('http://universities.hipolabs.com/search?country=United+States');

            if ($response->successful()) {
                $universities = $response->json();
                
                foreach ($universities as $universityData) {
                    $name = $universityData['name'];

                    // Check if the university already exists
                    $existingUniversity = University::where('name', $name)->first();
                    
                    if (!$existingUniversity) {
                        // Create a new university record if it doesn't exist
                        University::create([
                            'name' => $name
                        ]);
                    }
                }

                return response()->json(['message' => 'Universities stored successfully.']);
            } else {
                return response()->json(['error' => 'Failed to fetch universities.'], 500);
            }
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Error storing universities: ' . $e->getMessage());
    
            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}