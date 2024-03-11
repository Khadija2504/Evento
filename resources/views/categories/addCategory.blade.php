<x-app-layout>
    <x-guest-layout>
        @if(session()->has('addCategory'))
            <div class="bg-green-100 border text-center border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('addCategory') }}</span>
            </div>
        @endif
        <form method="POST" action="{{ route('addCategory') }}">
            @csrf
    
            <div>
                <x-input-label for="category_name" :value="__('category name')" />
                <x-text-input id="category_name" class="block mt-1 w-full" type="text" name="category_name" :value="old('category_name')" required/>
                <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
            </div>

            <x-primary-button class="ml-4">
                {{ __('Create') }}
            </x-primary-button>
        </form>
    </x-guest-layout>
    </x-app-layout>