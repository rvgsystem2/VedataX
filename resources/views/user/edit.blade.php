<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($user) ? 'Edit user' : 'Create user' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">
                    {{ isset($user) ? 'Edit user' : 'Create New user' }}
                </h2>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
{{--
                <form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}"
                    method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">user Name</label>
                        <input type="text" name="name"
                            value="{{ old('name', isset($user) ? $user->name : '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                            placeholder="Enter user name" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">user email</label>
                        <input type="email" name="email"
                    value="{{ old('email', isset($user) ? $user->email : '') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                    placeholder="Enter user email" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Roles</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            @foreach($roles as $role)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                        class="rounded border-gray-300 focus:ring-blue-500"
                                        {{ in_array($role->id, $selectedRoles) ? 'checked' : '' }}>
                                    <span>{{ $role->name }}</span> <!-- ✅ Show Role Name -->
                                </label>
                            @endforeach
                        </div>
                    </div>



                    <div>
                        <button type="submit"
                            class="px-6 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            {{ isset($user) ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </form> --}}

                <form action="{{ isset($user->id) ? route('user.update', $user->id) : route('user.store') }}"
                      method="POST" enctype="multipart/form-data" class="space-y-4">

                    @csrf

                    {{-- USER NAME --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">User Name</label>
                        <input type="text" name="name"
                               value="{{ old('name', $user->name ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter user name" required>
                    </div>

                    {{-- PHONE NUMBER --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Phone Number</label>
                        <input type="text" name="phone_number"
                               value="{{ old('phone_number', $user->phone_number ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter phone number" required>
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">User Email</label>
                        <input type="email" name="email"
                               value="{{ old('email', $user->email ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter user email" required>
                    </div>

                    {{-- PASSWORD --}}
                    @if(!isset($user->id))
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Password</label>
                            <input type="password" name="password"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                                   placeholder="Enter password" required>
                        </div>
                    @else
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">New Password (Optional)</label>
                            <input type="password" name="password"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                                   placeholder="Leave blank to keep existing password">
                        </div>
                    @endif

                    {{-- PROFILE IMAGE --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Profile Image</label>
                        <input type="file" name="profile_image"
                               class="w-full px-4 py-2 border rounded-lg bg-white focus:ring focus:ring-blue-200">

                        @if(isset($user->profile_image))
                            <img src="{{ asset('storage/' . $user->profile_image) }}"
                                 class="h-16 mt-2 rounded shadow-md" alt="Profile Image">
                        @endif
                    </div>

                    {{-- FACEBOOK --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Facebook Link</label>
                        <input type="text" name="facebook"
                               value="{{ old('facebook', $user->facebook ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter Facebook profile link">
                    </div>

                    {{-- INSTAGRAM --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Instagram Username / Link</label>
                        <input type="text" name="instagram"
                               value="{{ old('instagram', $user->instagram ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter Instagram profile link">
                    </div>

                    {{-- WHATSAPP --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">WhatsApp Number</label>
                        <input type="text" name="whatsapp"
                               value="{{ old('whatsapp', $user->whatsapp ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter WhatsApp number">
                    </div>

                    {{-- ROLES --}}
                    @php
                        $current = old('role', $selectedRoleName ?? null);
                    @endphp

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Roles</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            @foreach($roles as $role)
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="role" value="{{ $role->name }}"
                                           class="rounded border-gray-300 focus:ring-blue-500"
                                        {{ (string)$current === (string)$role->name ? 'checked' : '' }}>
                                    <span>{{ $role->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- SUBMIT BUTTON --}}
                    <div>
                        <button type="submit"
                                class="px-6 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            {{ isset($user->id) ? 'Update' : 'Submit' }}
                        </button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</x-app-layout>
