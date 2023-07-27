<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class DashbookController extends Controller
{
    // public function __construct()
    // {
    //     ini_set('max_execution_time', 0);
    // }

    public function AllDashbook()
    {
        $catalogs = DB::table('catalogs')
            ->where('hak_akses', 'open-akses')
            ->get();
        return view('dashbook_all', compact('catalogs'));
    }

    public function ReadBook($id = null)
    {
        ini_set('max_execution_time', 0);
        $catalog = Catalog::findOrFail($id);
        if ($catalog->hak_akses == 'open-akses') {
            return view('read', compact('catalog'));
        } else {
            return redirect()->route('all.dashbook');
        }
    }

    public function ReadPdf($id = null)
    {
        $catalog = Catalog::findOrFail($id);
        if ($catalog->hak_akses == 'open-akses') {
            return view('read_pdf', compact('catalog'));
        } else {
            return redirect()->route('all.dashbook');
        }
    }

    public function viewFlipbook($id = null, $file)
    {
        ini_set('max_execution_time', 0);
        $catalog = Catalog::findOrFail($id);
        $filepath = storage_path('app/' . $catalog->flipbook . $file);
        // dd($filepath);
        return response()->file($filepath);
    }

    public function viewPdf($id = null, $file)
    {
        ini_set('max_execution_time', 0);
        $catalog = Catalog::findOrFail($id);
        $split = explode('/', $catalog->pdf);
        $filepath = storage_path('app/' . $split[0] . '/' . $file);
        return response()->file($filepath, ['type' => 'application/pdf']);
    }
}
