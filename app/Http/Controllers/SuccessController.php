<?php

namespace App\Http\Controllers;

use App\Models\Protein;
use App\Models\Broth;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function index($proteinId, $brothId)
    {
        $data = [];
        $protein = Protein::find($proteinId);
        $broth = Broth::find($brothId);
        $data['protein'] = $protein;
        $data['broth'] = $broth;
        return view('success', $data);
    }
}
