<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\b;

class EnquiryController extends Controller
{
//    public function index(){
//        $enquiries = Enquiry::latest()->paginate(20);
//        return view('enquiries.index', compact('enquiries'));
//    }

    public function index()
    {
        $user = Auth::user();

        $query = Enquiry::with(['property', 'property.agent']) // eager load for less queries
        ->latest();

        // Agar user ka role "Agent" hai to sirf uski listed properties ki enquiries दिखाओ
        if ($user->hasRole('Agent')) {
            $query->whereHas('property', function ($q) use ($user) {
                $q->where('listed_by', $user->id);
            });
        }

        // (Optional) agar future में "User" ko sirf uski enquiries दिखानी हो:
        // if ($user->hasRole('User')) {
        //     $query->where('user_id', $user->id);
        // }

        $enquiries = $query->paginate(20);

        return view('enquiries.index', compact('enquiries'));
    }
    public function show(\App\Models\Enquiry $enquiry)
    {
        // relations optional (agar aapne banayi hain)
        $enquiry->load(['property']);

        return view('enquiries.show', compact('enquiry'));
    }
    public function status(Request $request, Enquiry $enquiry){
        $enquiry->update(['status' => $request->status]);
        return back()->with('success', 'Status updated successfully');
    }

    public function destroy(Enquiry $enquiry){
        $enquiry->delete();
        return back()->with('success', 'Enquiry Deleted successfully');
    }
}
