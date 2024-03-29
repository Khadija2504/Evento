<x-app-layout>
    <x-guest-layout>
        @if(session()->has('updateCategory'))
            <div class="bg-green-100 border text-center border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('updateCategory') }}</span>
            </div>
        @endif
            @foreach ($categories as $category)
        <form method="POST" action="{{ route('editCategory', $category->id) }}">
            @csrf
                @method('put')
            <div>
                <x-input-label for="category_name" :value="__('category name')" />
                <x-text-input id="category_name" class="block mt-1 w-full" type="text" name="category_name" :value="old('category_name')" value="{{$category->category_name}}" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
            </div>

            <x-primary-button class="ml-4">
                {{ __('Update') }}
            </x-primary-button>
        </form>
            @endforeach
    </x-guest-layout>
    </x-app-layout>