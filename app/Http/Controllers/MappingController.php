<?php

namespace App\Http\Controllers;

use App\Imports\MappingImport;
use App\Models\Mapping;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MappingController extends Controller
{
    public function index()
    {
        $mappings = Mapping::paginate(15);
        return view('mapping.index', compact('mappings'));
    }

    public function import()
    {
        Excel::import(new MappingImport, public_path('storage/mapping/mapping.csv'));

        return redirect()->route('mapping.index')->with('success', 'Mapping imported successfully.');
    }
}
