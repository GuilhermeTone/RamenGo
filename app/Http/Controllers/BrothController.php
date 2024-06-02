<?php

namespace App\Http\Controllers;

use App\Models\Broth;
use Illuminate\Http\Request;

class BrothController extends Controller
{
    public function show()
    {
        $proteins = Broth::all();
        return response()->json($proteins, 200, [], JSON_UNESCAPED_SLASHES);
    }
}
