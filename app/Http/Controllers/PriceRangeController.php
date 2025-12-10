<?php

namespace App\Http\Controllers;

use App\Models\PriceRange;
use Illuminate\Http\Request;

class PriceRangeController extends Controller
{
    public function index()
    {
        $priceRanges = PriceRange::orderBy('value', 'asc')->paginate(20);


        return view('price_ranges.index', compact('priceRanges'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('price_ranges.create');
    }

    /**
     * Store new price range
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type'  => 'required|in:min,max',
            'label' => 'required|string|max:191',   // e.g. "฿1,000,000"
            'value' => 'nullable|integer|min:0',    // e.g. 1000000
        ]);

        PriceRange::create($data);

        return redirect()
            ->route('price-ranges.index')
            ->with('success', 'Price range added successfully.');
    }

    /**
     * Show edit form
     */


    /**
     * Delete price range
     */
    public function destroy(PriceRange $range)
    {
        $range->delete();

        return redirect()
            ->route('price-ranges.index')
            ->with('success', 'Price range deleted successfully.');
    }
}
