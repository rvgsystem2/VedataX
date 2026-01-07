<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $query = Property::with(['propertyType', 'city'])
            ->latest();

        // Agar user Super Admin नहीं है,
        // to sirf uski listed properties दिखाओ
        if (! $user->hasRole('Super Admin')) {
            $query->where('listed_by', $user->id);
        }

        $properties = $query->paginate(10);

        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();
        $cities = City::all();
        $amenities = Amenity::all();
        $users = User::all();
        return view('properties.form', compact('propertyTypes', 'cities', 'amenities', 'users'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required|string',
            'price'             => 'required|numeric',
            'type'              => 'required|in:rent,sale',
            'status'            => 'required|in:available,sold,rented',
            'property_type_id'  => 'required|exists:property_types,id',
            'city_id'           => 'nullable|exists:cities,id',
            'address'           => 'nullable|string|max:255',
            'latitude'          => 'nullable|numeric',
            'longitude'         => 'nullable|numeric',
            'bedrooms'          => 'nullable|integer',
            'bathrooms'         => 'nullable|integer',
            'area'              => 'nullable|numeric',
            'built_in'          => 'nullable|digits:4',

            'amenities'         => 'nullable|array',
            'amenities.*'       => 'exists:amenities,id',

            'images'            => 'nullable|array',
            'images.*'          => 'image|mimes:jpg,jpeg,png|max:2048',

            'main_image_index'  => 'nullable|integer|min:0',

            'best_deal'         => 'nullable|boolean',

            // NEW: Interiors
            'interiors'                 => 'nullable|array',
            'interiors.*.name'          => 'nullable|string|max:255',
            'interiors.*.icon_class'    => 'nullable|string|max:255',

            // NEW: Utilities
            'utilities'                 => 'nullable|array',
            'utilities.*.name'          => 'nullable|string|max:255',
            'utilities.*.icon_class'    => 'nullable|string|max:255',

            // NEW: Safety & Security
            'safeties'                  => 'nullable|array',
            'safeties.*.name'           => 'nullable|string|max:255',
            'safeties.*.icon_class'     => 'nullable|string|max:255',
        ]);

        // Checkbox => true/false
        $validated['best_deal'] = $request->has('best_deal');

        // Unique slug
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (Property::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // images / amenities / main_image_index / interiors / utilities / safeties ko nikaal do
        $data = $validated;
        unset(
            $data['images'],
            $data['amenities'],
            $data['main_image_index'],
            $data['interiors'],
            $data['utilities'],
            $data['safeties']
        );

        // Create property
        $property = Property::create($data + [
                'slug'      => $slug,
                'listed_by' => auth()->id(),
            ]);

        // Amenities sync
        $property->amenities()->sync($validated['amenities'] ?? []);

        // Interiors create
        if ($request->filled('interiors')) {
            foreach ($request->interiors as $row) {
                if (!empty($row['name'])) {
                    $property->interiors()->create([
                        'name'       => $row['name'],
                        'icon_class' => $row['icon_class'] ?? null,
                    ]);
                }
            }
        }

        // Utilities create
        if ($request->filled('utilities')) {
            foreach ($request->utilities as $row) {
                if (!empty($row['name'])) {
                    $property->utilityInfrastructures()->create([
                        'name'       => $row['name'],
                        'icon_class' => $row['icon_class'] ?? null,
                    ]);
                }
            }
        }

        // Safety & Security create
        if ($request->filled('safeties')) {
            foreach ($request->safeties as $row) {
                if (!empty($row['name'])) {
                    $property->safetySecurities()->create([
                        'name'       => $row['name'],
                        'icon_class' => $row['icon_class'] ?? null,
                    ]);
                }
            }
        }

        // Images save
        if ($request->hasFile('images')) {
            $mainIndex = (int)($validated['main_image_index'] ?? 0);

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('property-images', 'public');

                $property->images()->create([
                    'url'     => $path,
                    'is_main' => $index === $mainIndex,
                ]);
            }
        }

        return redirect()
            ->route('properties.index')
            ->with('success', 'Property created with images, amenities and details.');
    }


    public function edit(Property $property)
    {
        $propertyTypes = PropertyType::all();
        $cities        = City::all();
        $amenities     = Amenity::all();
        $users = User::all();

        // relations load
        $property->load([
            'amenities',
            'images',
            'interiors',
            'utilityInfrastructures',
            'safetySecurities',
        ]);

        return view('properties.form', compact('property', 'propertyTypes', 'cities', 'amenities', 'users'));
    }

    public function show(Property $property){
        return view('properties.show', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required|string',
            'price'             => 'required|numeric',
            'type'              => 'required|in:rent,sale',
            'status'            => 'required|in:available,sold,rented',
            'property_type_id'  => 'required|exists:property_types,id',
            'city_id'           => 'nullable|exists:cities,id',
            'address'           => 'nullable|string|max:255',
            'latitude'          => 'nullable|numeric',
            'longitude'         => 'nullable|numeric',
            'bedrooms'          => 'nullable|integer',
            'bathrooms'         => 'nullable|integer',
            'area'              => 'nullable|numeric',
            'built_in'          => 'nullable|digits:4',

            'amenities'         => 'nullable|array',
            'amenities.*'       => 'exists:amenities,id',

            'images'            => 'nullable|array',
            'images.*'          => 'image|mimes:jpg,jpeg,png|max:2048',

            'main_image_index'  => 'nullable|integer|min:0',

            'best_deal'         => 'nullable|boolean',

            // NEW: Interiors
            'interiors'                 => 'nullable|array',
            'interiors.*.name'          => 'nullable|string|max:255',
            'interiors.*.icon_class'    => 'nullable|string|max:255',

            // NEW: Utilities
            'utilities'                 => 'nullable|array',
            'utilities.*.name'          => 'nullable|string|max:255',
            'utilities.*.icon_class'    => 'nullable|string|max:255',

            // NEW: Safety
            'safeties'                  => 'nullable|array',
            'safeties.*.name'           => 'nullable|string|max:255',
            'safeties.*.icon_class'     => 'nullable|string|max:255',
        ]);

        // checkbox handle
        $validated['best_deal'] = $request->has('best_deal');

        // slug change only when title changed
        if ($validated['title'] !== $property->title) {
            $slug         = Str::slug($validated['title']);
            $originalSlug = $slug;
            $counter      = 1;

            while (
            Property::where('slug', $slug)
                ->where('id', '!=', $property->id)
                ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $validated['slug'] = $slug;
        }

        // remove non-column fields
        $data = $validated;
        unset(
            $data['images'],
            $data['amenities'],
            $data['main_image_index'],
            $data['interiors'],
            $data['utilities'],
            $data['safeties']
        );

        // listed_by ko current user se override karna hai
        $data['listed_by'] = auth()->id();

        // basic update
        $property->update($data);

        // amenities sync
        $property->amenities()->sync($validated['amenities'] ?? []);

        // Interiors reset + recreate
        $property->interiors()->delete();
        if ($request->filled('interiors')) {
            foreach ($request->interiors as $row) {
                if (!empty($row['name'])) {
                    $property->interiors()->create([
                        'name'       => $row['name'],
                        'icon_class' => $row['icon_class'] ?? null,
                    ]);
                }
            }
        }

        // Utilities reset + recreate
        $property->utilityInfrastructures()->delete();
        if ($request->filled('utilities')) {
            foreach ($request->utilities as $row) {
                if (!empty($row['name'])) {
                    $property->utilityInfrastructures()->create([
                        'name'       => $row['name'],
                        'icon_class' => $row['icon_class'] ?? null,
                    ]);
                }
            }
        }

        // Safety & Security reset + recreate
        $property->safetySecurities()->delete();
        if ($request->filled('safeties')) {
            foreach ($request->safeties as $row) {
                if (!empty($row['name'])) {
                    $property->safetySecurities()->create([
                        'name'       => $row['name'],
                        'icon_class' => $row['icon_class'] ?? null,
                    ]);
                }
            }
        }

        // images handle (simple: nayi aayi to purani sab hata kar replace)
        if ($request->hasFile('images')) {
            // old files delete
//            foreach ($property->images as $img) {
//                if ($img->url) {
//                    Storage::disk('public')->delete($img->url);
//                }
//            }

            // old records delete
//            $property->images()->delete();

            // new save
            $mainIndex = (int)($validated['main_image_index'] ?? 0);

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('property-images', 'public');

                $property->images()->create([
                    'url'     => $path,
                    'is_main' => $index === $mainIndex,
                ]);
            }
        }

        return redirect()
            ->route('properties.index')
            ->with('success', 'Property updated successfully.');
    }


    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }


    public function deleteImage(Request $request, PropertyImage $image)
    {
        // (Optional but recommended) authorization check:
        // abort_if($image->property->business_id !== auth()->user()->current_business_id, 403);

        // storage file delete
        // If $image->url = 'properties/xx.jpg' type path
        if ($image->url && Storage::disk('public')->exists($image->url)) {
            Storage::disk('public')->delete($image->url);
        }

        $image->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted successfully',
            'deleted_id' => $image->id,
        ]);
    }

}
