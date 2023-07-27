<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HakAkses;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function AllHakAkses()
    {
        $hakakses = HakAkses::latest()->get();
        return view('backend.hakakses.all_hakakses', compact('hakakses'));
    }

    public function AddHakAkses()
    {
        return view('backend.hakakses.add_hakakses');
    }

    public function StoreHakAkses(Request $request)
    {
        $request->validate([
            'hak_akses' => 'required',
            'keterangan' => 'nullable'
        ]);

        HakAkses::create($request->all());

        $notification = array(
            'message' => 'Hak Akses created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.hakakses')->with($notification);
    }

    public function EditHakAkses($id = null)
    {
        $hakakses = HakAkses::findOrFail($id);
        return view('backend.hakakses.edit_hakakses', compact('hakakses'));
    }

    public function UpdateHakAkses(Request $request)
    {
        $id = $request->id;
        HakAkses::findOrFail($id)->update($request->all());

        $notification = array(
            'message' => 'Hak Akses updated successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.hakakses')->with($notification);
    }

    public function DeleteHakAkses($id = null)
    {
        HakAkses::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Hak Akses deleted succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
