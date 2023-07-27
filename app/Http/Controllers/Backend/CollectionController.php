<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function AllCollections()
    {
        $collections = Collection::latest()->get();
        return view('backend.collection.all_collection', compact('collections'));
    }

    public function AddCollection()
    {
        return view('backend.collection.add_collection');
    }

    public function StoreCollection(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|unique:collections|max:50',
            'icon' => 'required'
        ]);

        Collection::insert([
            'name' => $request->name,
            'icon' => $request->icon
        ]);

        $notification = array(
            'message' => 'Collection create successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.collections')->with($notification);
    }

    public function EditCollection($id)
    {
        $collection = Collection::findOrFail($id);
        return view('backend.collection.edit_collection', compact('collection'));
    }

    public function UpdateCollection(Request $request)
    {
        $id = $request->id;

        Collection::findOrFail($id)->update([
            'name' => $request->name,
            'icon' => $request->icon
        ]);

        $notification = array(
            'message' => 'Collection updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.collections')->with($notification);
    }

    public function DeleteCollection($id)
    {
        Collection::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Collection deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
