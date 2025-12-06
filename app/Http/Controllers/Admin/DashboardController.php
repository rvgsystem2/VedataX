<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $user = Auth::user();

        // Base queries
        $propertyQuery = Property::query();
        $enquiryQuery  = Enquiry::query()->with('property');

        // 👉 Role based filter:
        // Super Admin -> sab dekh sakta hai
        // Baaki roles -> sirf apne listed_by waali properties & unki enquiries
        if (! $user->hasRole('Super Admin')) {

            // Properties only by this user
            $propertyQuery->where('listed_by', $user->id);

            // Enquiries only for properties listed by this user
            $enquiryQuery->whereHas('property', function ($q) use ($user) {
                $q->where('listed_by', $user->id);
            });
        }

        // 🏠 Property stats
        $totalProperties      = $propertyQuery->count();
        $availableProperties  = $propertyQuery->where('status', 'available')->count();
        $soldProperties       = (clone $propertyQuery)->where('status', 'sold')->count();
        $rentedProperties     = (clone $propertyQuery)->where('status', 'rented')->count();
        $rentTypeCount        = (clone $propertyQuery)->where('type', 'rent')->count();
        $saleTypeCount        = (clone $propertyQuery)->where('type', 'sale')->count();
        $bestDealCount        = (clone $propertyQuery)->where('best_deal', true)->count();

        // 📩 Enquiry stats
        $totalEnquiries       = $enquiryQuery->count();
        $pendingEnquiries     = (clone $enquiryQuery)->where('status', 'pending')->count();
        $inProgressEnquiries  = (clone $enquiryQuery)->where('status', 'in_progress')->count();
        $closedEnquiries      = (clone $enquiryQuery)->where('status', 'closed')->count();

        // Aaj ki enquiries
        $todayEnquiries       = (clone $enquiryQuery)
            ->whereDate('created_at', today())
            ->count();

        // Recent 5 enquiries list (for table)
        $recentEnquiries = $enquiryQuery
            ->latest()
            ->take(5)
            ->get();

        // Recent 5 properties
        $recentProperties = $propertyQuery
            ->latest()
            ->with('city', 'propertyType')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalProperties',
            'availableProperties',
            'soldProperties',
            'rentedProperties',
            'rentTypeCount',
            'saleTypeCount',
            'bestDealCount',
            'totalEnquiries',
            'pendingEnquiries',
            'inProgressEnquiries',
            'closedEnquiries',
            'todayEnquiries',
            'recentEnquiries',
            'recentProperties'
        ));
    }
}
