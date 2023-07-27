<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Imagick;
use Spatie\PdfToImage\Pdf;
use Org_Heigl\Ghostscript\Ghostscript;

class CatalogController extends Controller
{
    public function AllCatalogs()
    {
        $catalog = Catalog::latest()->get();

        return view('backend.catalog.all_catalog', compact('catalog'));
    }

    public function AddCatalog()
    {
        return view('backend.catalog.add_catalog');
    }

    public function StoreCatalog(Request $request)
    {

        ini_set('max_execution_time', 0);

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'kata_kunci' => 'nullable',
            'penerbit' => 'required',
            'tahun' => 'required',
            'bahasa' => 'required',
            'jenis' => 'required',
            'halaman' => 'required',
            'hak_cipta' => 'required',
            'isbn' => 'nullable',
            'hak_akses' => 'required',
            'books' => 'required|mimes:pdf|max:16384'
        ]);

        $file = $request->file('books');
        $filename = $request->file('books')->getClientOriginalName();
        $flipnm = pathinfo($filename, PATHINFO_FILENAME);

        $request->request->add([
            'pdf' => $request->jenis . '/' . $filename,
            'flipbook' => 'flipbook/' . $request->jenis . '/' . $flipnm . '/'
        ]);

        Catalog::create($request->except('books'));

        $lokasi = Storage::path($request->jenis . '/');
        if (!File::isDirectory($lokasi)) {
            File::makeDirectory($lokasi, 0775, true, true);
        }

        Storage::disk('local')->put($request->jenis . '/' . $filename, File::get($file));

        $lokasiflip = Storage::path('flipbook/' . $request->jenis . '/' . $flipnm . '/');
        if (!File::isDirectory($lokasiflip)) {
            File::makeDirectory($lokasiflip, 0775, true, true);
        }

        $pdf_file = storage_path() . '\app' . '\\' . $request->jenis . '\\' . $filename;
        // $output_path = storage_path() . "\app\buku\\";

        // Ghostscript::setGsPath("C:\Program Files\gs\gs10.01.2\bin\gswin64c.exe");

        $pdf = new Pdf($pdf_file);
        $jmlpage = $pdf->getNumberOfPages();
        for ($i = 0; $i < $jmlpage; $i++) {
            $pdf->setOutputFormat('png');
            $pdf->setCompressionQuality(70);
            $pdf->setPage($i + 1)->saveImage($lokasiflip);
        }

        // dd($filename);

        $notification = array(
            'message' => 'Catalog created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.catalogs')->with($notification);
    }

    public function EditCatalog($id = null)
    {
        $catalog = Catalog::findOrFail($id);
        return view('backend.catalog.edit_catalog', compact('catalog'));
    }

    public function UpdateCatalog(Request $request)
    {
        Catalog::findOrFail($request->id)->update($request->all());

        $notification
            = array(
                'message' => 'Catalog updated successfully',
                'alert-type' => 'success'
            );

        return redirect()->route('all.catalogs')->with($notification);
    }

    public function DeleteCatalog($id = null)
    {
        Catalog::findOrFail($id)->delete();

        $notification
            = array(
                'message' => 'Catalog deleted successfully',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }
}
