<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        // single row (latest or first)
        $social = SocialLink::first();

        return view('social-links.index', compact('social'));
    }

    /**
     * Store or Update social links (single record logic)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'facebook'  => ['nullable', 'string', 'max:255'],
            'whatsapp'  => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
        ]);

        SocialLink::updateOrCreate(
            ['id' => 1],   // ✅ always keep 1 record
            $data
        );

        return redirect()
            ->back()
            ->with('success', 'Social links updated successfully');
    }

    /**
     * Edit page (optional – agar alag page chahiye)
     */
    public function edit()
    {
        $social = SocialLink::first();
        return view('social-links.edit', compact('social'));
    }

    /**
     * Update social links (if using edit page)
     */
    public function update(Request $request, $id)
    {
        $social = SocialLink::findOrFail($id);

        $data = $request->validate([
            'facebook'  => ['nullable', 'string', 'max:255'],
            'whatsapp'  => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
        ]);

        $social->update($data);

        return redirect()
            ->route('admin.social-links.index')
            ->with('success', 'Social links updated successfully');
    }

    /**
     * Delete social links (rare case)
     */
    public function destroy($id)
    {
        SocialLink::findOrFail($id)->delete();

        return redirect()
            ->back()
            ->with('success', 'Social links deleted');
    }
}
