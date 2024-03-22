<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\University;

class UniversityController extends Controller
{
    public function index()
    {
        return view('university');
    }

    public function storeUniversities()
    {
        $response = Http::get('http://universities.hipolabs.com/search?country=United+States');

        if ($response->successful()) {
            $universities = $response->json();

            foreach ($universities as $universityData) {
                $name = $universityData['name'];

                // Check if the university already exists
                $existingUniversity = University::where('name', $name)->first();

                if (!$existingUniversity) {
                    University::create([
                        'name' => $name
                    ]);
                }
            }

            return response()->json(['message' => 'Universities stored successfully.']);
        } else {
            return response()->json(['error' => 'Failed to fetch universities.'], 500);
        }
    }
}
