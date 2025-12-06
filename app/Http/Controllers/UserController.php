<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('permission:view users', only: ['index']),
            new Middleware('permission:edit users', only: ['edit']),
            new Middleware('permission:delete users', only: ['delete']),
            new Middleware('permission:create users', only: ['create']),
        ];
    }
    public function index()
    {
        // Check if the logged-in user is a Super Admin
        if (Auth::user()->hasRole('Super Admin')) {
            $userData = User::all(); // Show all users
        } else {
            $userData = User::where('id', Auth::id())->get(); // Show only the logged-in user
        }

        return view('user.index', compact('userData'));
    }

    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        $selectedRoles = []; // Empty array for new users (no roles assigned)

        return view('user.edit', compact('roles', 'selectedRoles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'phone_number' => ['nullable', 'string', 'regex:/^\+?[0-9]{7,15}$/'],

            // New fields
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'facebook'      => 'nullable|string|max:255',
            'instagram'     => 'nullable|string|max:255',
            'whatsapp'      => 'nullable|string|max:20',

            'password' => 'required|min:6',
            'role'     => 'required|exists:roles,name',
        ]);

        // Prepare data for user creation
        $data = [
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'facebook'     => $request->facebook,
            'instagram'    => $request->instagram,
            'whatsapp'     => $request->whatsapp,
            'password'     => Hash::make($request->password),
        ];

        // Upload profile image if exists
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profiles', 'public');
            $data['profile_image'] = $path;
        }

        // Create user + fill all data
        $user = User::create($data);

        // Assign role (single role radio button)
        $user->syncRoles([$request->role]);

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }


    public function edit(User $user)
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        $selectedRoleName = $user->getRoleNames()->first(); // ✅ Get assigned role IDs

        return view('user.edit', compact('user', 'roles', 'selectedRoleName'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => ['nullable', 'string', 'regex:/^\+?[0-9]{7,15}$/'],

            // New fields
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'facebook'      => 'nullable|string|max:255',
            'instagram'     => 'nullable|string|max:255',
            'whatsapp'      => 'nullable|string|max:20',

            // Role (Spatie)
            'role'     => 'required|exists:roles,name',

            // Password optional on update
            'password' => 'nullable|min:6',
        ]);

        // Base data to update
        $data = [
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'facebook'     => $request->facebook,
            'instagram'    => $request->instagram,
            'whatsapp'     => $request->whatsapp,
        ];

        // Optional password change
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Profile image upload (optional)
        if ($request->hasFile('profile_image')) {

            // Purani image delete (agar ho to)
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Nayi image save
            $path = $request->file('profile_image')->store('profiles', 'public');
            $data['profile_image'] = $path;
        }

        // User update
        $user->update($data);

        // Role sync (single role)
        $user->syncRoles([$request->role]);

        return redirect()
            ->route('user.index')
            ->with('success', 'User updated successfully.');
    }


    // public function update(Request $request, User $user) {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'roles' => 'array|required',
    //         'roles.*' => 'exists:roles,id',
    //        'email' => 'required|email|unique:users,email,' . $user->id,

    //     ]);

    //     // Update user data
    //     $user->update(['name' => $request->name]);

    //     // Sync roles to update user roles correctly
    //     $user->roles()->sync($request->roles);

    //     return redirect()->route('user.index')->with('success', 'User updated successfully.');
    // }



    public function assignPermissionForm($user)
    {

        $user = User::findOrFail($user);

        // dd($user);
        $permissions = Permission::all();
        $userPermissions = $user->getDirectPermissions()->pluck('user')->toArray();

        return view('user.assign_permission', compact('user', 'permissions', 'userPermissions'));
    }


    public function assignPermissionToUser(Request $request, $user)
    {
        // dd($request);
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $user = User::findOrFail($user);

        // Convert permission IDs to names
        $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

        // Now sync by names
        $user->syncPermissions($permissionNames);

        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }


    public function delete($id)
{
    $user = User::findOrFail($id);

    // Optional: prevent deletion of currently logged-in user
    if (auth()->id() === $user->id) {
        return redirect()->back()->withErrors(['You cannot delete your own account.']);
    }

    $user->delete();

    return redirect()->route('user.index')->with('success', 'User deleted successfully.');
}

}
