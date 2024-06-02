<?php

namespace App\Http\Controllers;

use App\Models\Protein;
use Illuminate\Http\Request;

class ProteinController extends Controller
{
    public function show()
    {
        $proteins = Protein::all();
        return response()->json($proteins, 200, [], JSON_UNESCAPED_SLASHES);
    }
}
