<?php

namespace App\Http\Controllers;

use App\Models\HomePageMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageMediaController extends Controller
{
    public function index()
    {
        $media = HomePageMedia::first(); // usually 1 row only
        return view('home_page_media.index', compact('media'));
    }

    /**
     * Store or Update homepage media
     */

//    public function create()
//    {
//        $media = HomePageMedia::first();
//
//        // agar already record hai to edit pe redirect kar do
//        if ($media) {
//            return redirect()->route('home.media.edit');
//        }
//
//        return view('home_page_media.create');
//    }

    public function store(Request $request)
    {
        $allowed = [
            'hero_bg','location_1','location_2','location_3','location_4','about_image','final_cat_bg'
        ];

        $media = HomePageMedia::first() ?? new HomePageMedia();

        // ✅ If clicked "Remove"
        if ($request->filled('delete_field')) {
            $field = $request->delete_field;

            abort_unless(in_array($field, $allowed), 404);

            if ($media->$field && Storage::disk('public')->exists($media->$field)) {
                Storage::disk('public')->delete($media->$field);
            }

            $media->$field = null;
            $media->save();

            return back()->with('success', ucfirst(str_replace('_',' ', $field)).' removed');
        }

        // ✅ Normal Save (upload/replace)
        $data = $request->validate([
            'hero_bg'      => 'nullable|image|max:4096',
            'location_1'   => 'nullable|image|max:4096',
            'location_2'   => 'nullable|image|max:4096',
            'location_3'   => 'nullable|image|max:4096',
            'location_4'   => 'nullable|image|max:4096',
            'about_image'  => 'nullable|image|max:4096',
            'final_cat_bg' => 'nullable|image|max:4096',
            'address'      => 'nullable|string|max:255',
        ]);

        foreach ($allowed as $field) {
            if ($request->hasFile($field)) {
                if ($media->$field && Storage::disk('public')->exists($media->$field)) {
                    Storage::disk('public')->delete($media->$field);
                }
                $media->$field = $request->file($field)->store('homepage', 'public');
            }
        }

        $media->address = $request->address;
        $media->save();

        return back()->with('success', 'Homepage media updated successfully');
    }


    /**
     * Edit page (optional if you want separate page)
     */
    public function edit()
    {
        $media = HomePageMedia::first();
        return view('home_page_media.edit', compact('media'));
    }

    /**
     * Delete single image field
     */
    public function destroyImage(string $field)
    {
        $allowed = [
            'hero_bg',
            'location_1',
            'location_2',
            'location_3',
            'location_4',
            'about_image',
            'final_cat_bg',
        ];

        abort_unless(in_array($field, $allowed), 404);

        $media = HomePageMedia::firstOrFail();

        if ($media->$field && Storage::disk('public')->exists($media->$field)) {
            Storage::disk('public')->delete($media->$field);
        }

        $media->$field = null;
        $media->save();

        return back()->with('success', ucfirst(str_replace('_', ' ', $field)).' removed');
    }
}
