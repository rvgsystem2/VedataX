<form method="POST"
      action="{{ route('profile.photo.update') }}"
      enctype="multipart/form-data"
      class="space-y-4">
    @csrf
    @method('PUT')

    <h3 class="text-lg font-medium text-gray-900">
        Profile Photo
    </h3>

    {{-- Current Photo --}}
    <div class="flex items-center gap-4">
        <img
            src="{{ auth()->user()->profile_image
                    ? asset('storage/' . auth()->user()->profile_image)
                    : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name) }}"
            class="h-20 w-20 rounded-full object-cover border"
            alt="Profile Photo"
        >

        <label class="block">
            <span class="sr-only">Choose profile photo</span>
            <input type="file"
                   name="photo"
                   accept="image/*"
                   class="block w-full text-sm text-gray-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-md file:border-0
                          file:text-sm file:font-semibold
                          file:bg-indigo-50 file:text-indigo-700
                          hover:file:bg-indigo-100">
        </label>
    </div>

    @error('photo')
    <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror

    <div>
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
            Update Photo
        </button>
    </div>
</form>
