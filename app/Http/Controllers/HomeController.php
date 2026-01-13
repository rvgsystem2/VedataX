<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\City;
use App\Models\Enquiry;
use App\Models\HomePageMedia;
use App\Models\PriceRange;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
//    public function index(){
//        $propertyTypes = PropertyType::all();
//        $properties = Property::where('status', 'available')->with('images')->get()->map(function ($property) {
//            return [
//                'title' => $property->title,
//                'price' => '₹' . number_format($property->price),
//                'location' => $property->location,
//                'date' => $property->created_at->diffForHumans(),
//                'beds' => $property->bedrooms,
//                'baths' => $property->bathrooms,
//                'area' => $property->area . ' Sqft',
//                'images' => $property->images->map(function ($img) {
//                    return asset('storage/' . $img->filename);
//                })->toArray(),
//            ];
//        });
//        $cities = City::all();
//        $bestDeals = Property::where('best_deal', true)->get();
//        $villas = PropertyType::where('slug', 'like', "%villa%")->orWhere('slug', 'like', "%house%")->first()?->properties;
//// Option 1: PropertyType se (tumhari style)
//        $lands = PropertyType::where(function ($q) {
//                $q->where('slug', 'like', '%land%');
//            })
//                ->with(['properties.images', 'properties.city', 'properties.listedBy', 'properties.amenities'])
//                ->first()?->properties ?? collect();
//        $minPrices = PriceRange::where('type', 'min')->get();
//        $maxPrices = PriceRange::where('type', 'max')->get();
//        $homePageMedia = HomePageMedia::first();
//        return view('frontend.index', compact('propertyTypes', 'properties', 'cities', 'bestDeals', 'villas', 'lands', 'minPrices','maxPrices', 'homePageMedia'));
//    }

    public function index()
    {
        // ✅ Types + correct count (many-to-many)
        $propertyTypes = PropertyType::query()
            ->withCount('properties')  // properties_count
            ->orderBy('title')
            ->get();

        // ✅ Available properties (card data) + needed relations
        $availableProperties = Property::query()
            ->where('status', 'available')
            ->with(['images', 'city', 'propertyTypes'])
            ->latest()
            ->get();

        // ✅ Same output format as your current map (but fixed fields)
        $properties = $availableProperties->map(function ($property) {
            $images = $property->images->map(function ($img) {
                // ✅ store() me 'url' save ho raha hai
                $path = $img->url ?? $img->filename ?? null;
                return $path ? asset('storage/' . ltrim($path, '/')) : null;
            })->filter()->values()->toArray();

            return [
                'title'     => $property->title,
                'price'     => '₹' . number_format((float)$property->price),
                // ✅ aapke table me address hai; location column nahi dikh raha
                'location'  => $property->address ?? optional($property->city)->name ?? '-',
                'date'      => optional($property->created_at)->diffForHumans(),
                'beds'      => $property->bedrooms,
                'baths'     => $property->bathrooms,
                'area'      => $property->area ? ($property->area . ' Sqft') : null,
                'images'    => $images,
                // optional: show types on cards too
                'types'     => $property->propertyTypes->pluck('title')->values()->toArray(),
            ];
        });

        $cities = City::query()->orderBy('name')->get();

        // ✅ Best deals (also load relations for view)
        $bestDeals = Property::query()
            ->where('best_deal', true)
            ->with(['images', 'city', 'listedBy', 'amenities', 'propertyTypes'])
            ->latest()
            ->get();

        // ✅ Villas (many-to-many: type slug match -> properties)
        $villasType = PropertyType::query()
            ->where(function ($q) {
                $q->where('slug', 'like', '%villa%')
                    ->orWhere('slug', 'like', '%house%');
            })
            ->first();

        $villas = $villasType
            ? $villasType->properties()
                ->where('status', 'available')
                ->with(['images', 'city', 'listedBy', 'amenities', 'propertyTypes'])
                ->latest()
                ->get()
            : collect();

        // ✅ Lands (many-to-many: type slug match -> properties)
        $landsType = PropertyType::query()
            ->where(function ($q) {
                $q->where('slug', 'like', '%land%');
            })
            ->first();

        $lands = $landsType
            ? $landsType->properties()
                ->where('status', 'available')
                ->with(['images', 'city', 'listedBy', 'amenities', 'propertyTypes'])
                ->latest()
                ->get()
            : collect();

        $minPrices = PriceRange::where('type', 'min')->get();
        $maxPrices = PriceRange::where('type', 'max')->get();

        $homePageMedia = HomePageMedia::first();

        return view('frontend.index', compact(
            'propertyTypes',
            'properties',
            'cities',
            'bestDeals',
            'villas',
            'lands',
            'minPrices',
            'maxPrices',
            'homePageMedia'
        ));
    }


    public function landproperty(){
        return view('frontend.landproperty');
    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        $address = HomePageMedia::first()?->address;
        $socialLinks = SocialLink::first();
        return view('frontend.contact', compact('address', 'socialLinks'));
    }

    public function buy(){
        $properties = Property::where('type', 'sale')->get();
        return view('frontend.buy', compact('properties'));
    }


    public function typedProperty(Request $request, $type = null)
    {
        $query = Property::query()->with('propertyType');
        $recommendations = null;

        // Type filter (from route param or form input)
        $finalType = $type ?? $request->type;
        if ($finalType) {
            $query->where('type', $finalType);
            $recommendations = Property::where('type', $finalType)->get();

        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Property type filter
        if ($request->filled('property_type_id')) {
            $query->where('property_type_id', $request->property_type_id);
            $recommendations = Property::where('property_type_id', $request->property_type_id)->get();
        }

        // Location filter (partial match)
        if ($request->filled('location')) {
            $query->where('address', 'like', '%' . $request->location . '%');
        }

        // Price range filters
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Bedrooms filter
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }
        $properties = $query->where('status', 'available')->paginate();
        $propertyTypes = PropertyType::all();
        $cities = City::all();
        return view('frontend.typed-property', compact('properties', 'recommendations', 'propertyTypes', 'cities', 'finalType'));
    }


    public function rent(){
        $properties = Property::where('type', 'rent')->get();
        return view('frontend.rent', compact('properties'));
    }

    public function villa(){
        return view('frontend.villa');
    }

    public function categoryProperties(PropertyType $propertyType){
        $properties = $propertyType->properties;
        return view('frontend.category-properties', compact('properties', 'propertyType'));
    }

    public function land(){
        return view('frontend.land');
    }

    public function commercial(){
        return view('frontend.commercial');
    }

    public function blog(){
        return view('frontend.blog');
    }

//    public function detail(Property $property = null){
//
//        $property->load([
//            'city',
//            'propertyType',
//            'images',
//            'interiors',
//            'utilityInfrastructures',
//            'safetySecurities',
//            'amenities',
//        ]);
//        return view('frontend.detail', compact('property'));
//    }

    public function detail(Property $property = null)
    {
        $property->load([
            'city',
            'propertyTypes',          // ✅ new many-to-many
            'images',
            'interiors',
            'utilityInfrastructures',
            'safetySecurities',
            'amenities',
            'listedBy',               // (optional but useful in detail page)
        ]);

        return view('frontend.detail', compact('property'));
    }


    public function term(){
        return view('frontend.term');
    }

    public function privacy(){
        return view('frontend.privacy');
    }

    public function refund(){
        return view('frontend.refund');
    }

    public function agent(){

        $users = User::role('agent')->get();
        return view('frontend.agent', compact('users'));
    }

    public function disclaimer(){
        return view('frontend.disclaimer');
    }

//    public function property(Request $request, $type = null)
//    {
//        // Base query
//        $query = Property::with([
//            'city',
//            'images',
//            'listedBy',     // ya 'user' agar relation ka naam woh hai
//        ])->latest();
//
//        // 1) Type filter (rent / sale) – URL se aa raha hai
//        if (!empty($type)) {
//            $query->where('slug', 'like', "%$type%");    // example: /properties/rent
//        }
//
//        // 2) Location (city name se)
//        if ($request->filled('city')) {
//
//            $cityName = $request->input('city');
//
//            $query->whereHas('city', function ($q) use ($cityName) {
//                $q->where('name', $cityName);
//            });
//        }
//
//        // 3) Property Type
//        if ($request->filled('property_type_id')) {
//            $query->where('property_type_id', $request->input('property_type_id'));
//        }
//
//        // 4) Min / Max Price
//        if ($request->filled('min_price')) {
//            $query->where('price', '>=', (float) $request->input('min_price'));
//        }
//
//        if ($request->filled('max_price')) {
//            $query->where('price', '<=', (float) $request->input('max_price'));
//        }
//
//        // 5) Bedrooms
//        $bedrooms = $request->input('bedrooms', 'any');
//        if ($bedrooms !== 'any' && $bedrooms !== null && $bedrooms !== '') {
//            $query->where('bedrooms', '>=', (int) $bedrooms);
//        }
//
//        // 6) Bathrooms
//        $bathrooms = $request->input('bathrooms', 'any');
//        if ($bathrooms !== 'any' && $bathrooms !== null && $bathrooms !== '') {
//            $query->where('bathrooms', '>=', (int) $bathrooms);
//        }
//
//        // Final result (agar chaho to paginate bhi kar sakte ho)
//        // $properties = $query->paginate(12)->appends($request->query());
//        $properties = $query->paginate(12);
//
//        // Filters ke liye dropdown data
//        $cities        = City::orderBy('name')->get();
//        $propertyTypes = PropertyType::orderBy('title')->get();
//        $minPrices = PriceRange::where('type', 'min')->orderBy('value')->get();
//        $maxPrices = PriceRange::where('type', 'max')->orderBy('value')->get();
//        return view('frontend.property', compact(
//            'properties',
//            'cities',
//            'propertyTypes',
//            'type',
//            'minPrices', 'maxPrices'
//        ));
//    }

    public function property(Request $request, $type = null)
    {
        $query = Property::query()
            ->with(['city','images','listedBy','propertyTypes'])
            ->latest();

        /**
         * ✅ If URL param matches property type slug (like villahouse, land, seaview)
         * then filter via many-to-many relation
         */
        if (!empty($type)) {
            $typeSlug = strtolower(trim($type));

            // if it's rent/sale then filter by column
            if (in_array($typeSlug, ['rent','sale'], true)) {
                $query->where('type', $typeSlug);
            } else {
                // ✅ property type slug filter (many-to-many)
                $query->whereHas('propertyTypes', function ($q) use ($typeSlug) {
                    $q->where('property_types.slug', $typeSlug);
                });
            }
        }

        // City filter
        if ($request->filled('city')) {
            $cityName = $request->input('city');
            $query->whereHas('city', fn($q) => $q->where('name', $cityName));
        }

        // ✅ Dropdown property types (single or multi)
        if ($request->filled('property_type_ids')) {
            $ids = array_filter((array) $request->input('property_type_ids'));
            $query->whereHas('propertyTypes', fn($q) => $q->whereIn('property_types.id', $ids));
        } elseif ($request->filled('property_type_id')) {
            $id = (int) $request->input('property_type_id');
            $query->whereHas('propertyTypes', fn($q) => $q->where('property_types.id', $id));
        }

        // Min / Max price
        if ($request->filled('min_price')) $query->where('price', '>=', (float)$request->min_price);
        if ($request->filled('max_price')) $query->where('price', '<=', (float)$request->max_price);

        // Bedrooms
        $bedrooms = $request->input('bedrooms', 'any');
        if ($bedrooms !== 'any' && $bedrooms !== '' && $bedrooms !== null) {
            $query->where('bedrooms', '>=', (int)$bedrooms);
        }

        // Bathrooms
        $bathrooms = $request->input('bathrooms', 'any');
        if ($bathrooms !== 'any' && $bathrooms !== '' && $bathrooms !== null) {
            $query->where('bathrooms', '>=', (int)$bathrooms);
        }

        $properties = $query->paginate(12)->appends($request->query());

        $cities        = City::orderBy('name')->get();
        $propertyTypes = PropertyType::orderBy('title')->get();
        $minPrices     = PriceRange::where('type','min')->orderBy('value')->get();
        $maxPrices     = PriceRange::where('type','max')->orderBy('value')->get();

        return view('frontend.property', compact(
            'properties','cities','propertyTypes','type','minPrices','maxPrices'
        ));
    }

    public function feature(){
        return view('frontend.feature');
    }
//    public function contactSave(Request $request)
//    {
//        // Validate
//        $data = $request->validate([
//            'first_name'  => 'required|string|max:100',
//            'last_name'   => 'required|string|max:100',
//            'email'       => 'required|email|max:255',
//            'phone'       => 'nullable|string|max:50',
//            'subject'     => 'required|string|max:255',
//            'message'     => 'nullable|string',
//        ]);
//
//        // Combine name
//        $data['name'] = trim($data['first_name'] . ' ' . $data['last_name']);
//        unset($data['first_name'], $data['last_name']);
//
//        // Logged in or not
//        $userId = Auth::check() ? Auth::id() : null;
//
//        // Duplicate check (global)
//        $alreadyExists = Enquiry::where(function ($q) use ($data, $userId) {
//
//            if ($userId) {
//                $q->where('user_id', $userId);
//            }
//
//            $q->orWhere('email', $data['email']);
//
//            if (!empty($data['phone'])) {
//                $q->orWhere('phone', $data['phone']);
//            }
//        })->exists();
//
//        if ($alreadyExists) {
//            return back()
//                ->withErrors(['contact' => 'You have already submitted an enquiry.'])
//                ->withInput();
//        }
//
//        // Save Enquiry
//        Enquiry::create($data + ['user_id' => $userId]);
//
//        return back()->with('success', 'Form submitted successfully, we will contact you soon!');
//    }

    public function contactSave(Request $request)
    {
        // Check: ye request property enquiry hai ya general contact?
        $isPropertyEnquiry = $request->filled('property_id');

        if ($isPropertyEnquiry) {
            // 🏠 PROPERTY PAGE WALA FORM (name, email, phone, message + property_id)
            $data = $request->validate([
                'property_id' => 'required|exists:properties,id',
                'name'        => 'required|string|max:255',
                'email'       => 'required|email|max:255',
                'phone'       => 'nullable|string|max:50',
                'message'     => 'nullable|string',
            ]);

            // final name direct aaya hai
            $name    = $data['name'];
            $subject = null; // yaha subject nahi hai (agar chaho to "Property Enquiry" set kar sakte ho)

        } else {
            // 🌍 CONTACT PAGE WALA FORM (first_name, last_name, email, phone, subject, message)
            $data = $request->validate([
                'first_name'  => 'required|string|max:100',
                'last_name'   => 'required|string|max:100',
                'email'       => 'required|email|max:255',
                'phone'       => 'nullable|string|max:50',
                'subject'     => 'required|string|max:255',
                'message'     => 'nullable|string',
            ]);

            $name    = trim($data['first_name'] . ' ' . $data['last_name']);
            $subject = $data['subject'];
        }

        $userId = Auth::check() ? Auth::id() : null;

        // 🔁 DUPLICATE CHECK

        if ($isPropertyEnquiry) {
            // Same property pe same user/email/phone se repeat enquiry na ho
            $alreadyExists = Enquiry::where('property_id', $data['property_id'])
                ->where(function ($q) use ($data, $userId) {
                    if ($userId) {
                        $q->where('user_id', $userId);
                    }

                    $q->orWhere('email', $data['email']);

                    if (!empty($data['phone'])) {
                        $q->orWhere('phone', $data['phone']);
                    }
                })
                ->exists();
        } else {
            // General contact form: site-wide ek hi baar (without property)
            $alreadyExists = Enquiry::whereNull('property_id')
                ->where(function ($q) use ($data, $userId) {
                    if ($userId) {
                        $q->where('user_id', $userId);
                    }

                    $q->orWhere('email', $data['email']);

                    if (!empty($data['phone'])) {
                        $q->orWhere('phone', $data['phone']);
                    }
                })
                ->exists();
        }

        if ($alreadyExists) {
            return back()
                ->withErrors([
                    'contact' => $isPropertyEnquiry
                        ? 'You have already sent an enquiry for this property.'
                        : 'You have already submitted an enquiry.',
                ])
                ->withInput();
        }

        // 📝 FINAL DATA SAVE
        $enquiry = Enquiry::create([
            'property_id' => $isPropertyEnquiry ? $data['property_id'] : null,
            'name'        => $name,
            'email'       => $data['email'],
            'phone'       => $data['phone'] ?? null,
            'subject'     => $subject,
            'message'     => $data['message'] ?? null,
            'user_id'     => $userId,
        ]);

        Mail::to('info@vedata.co')->send(new ContactMail($enquiry));

        return back()->with('success', 'Form submitted successfully, we will contact you soon!');
    }

    public function setCurrency(Request $request)
    {
        $codeAndSymbol = explode('-', $request->currency);
        $code   = $codeAndSymbol[0] ?? null;   // e.g. "USD"
        $symbol = $codeAndSymbol[1] ?? null;   // e.g. "$"

        // Base = THB (kyunki database price THB me hai)
        $response = Http::withoutVerifying()->get('https://api.exchangerate-api.com/v4/latest/THB');
        $data  = $response->json();
        $rates = $data['rates'] ?? [];

        // Agar THB hi select kare, to rate 1 rakho
        if ($code === 'THB') {
            $rate = 1;
        } else {
            // Agar API se rate mila to use karo, warna fallback = 1
            $rate = $rates[$code] ?? 1;
        }

        session([
            'currency' => [
                'code'     => $code,
                'rate'     => $rate,    // 1 THB = ? selected currency
                'symbol'   => $symbol,
                'flag_url' => $request->flag_url,
            ]
        ]);

        return back();
    }

    public function setLang($lang){
        Session::put('lang', $lang);
        return back();
    }


}

