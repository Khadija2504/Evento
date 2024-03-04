<x-app-layout>
<x-guest-layout>
    <form method="POST" action="{{ route('addEvent') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="titre" :value="__('titre')" />
            <x-text-input id="titre" class="block mt-1 w-full" type="text" name="titre" :value="old('titre')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('titre')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="date" :value="__('date')" />
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="lieu" :value="__('lieu')" />
            <x-text-input id="lieu" class="block mt-1 w-full" type="text" name="lieu" :value="old('lieu')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('lieu')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="places_number" :value="__('nombre des places')" />
            <x-text-input id="places_number" class="block mt-1 w-full" type="number" name="places_number" :value="old('places_number')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('places_number')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="category" :value="__('Category')" />
            <select name="category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('places_number')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="acceptation" :value="__('Acceptation')" />
            <select name="acceptation" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                    <option value="auto">automatique</option>
                    <option value="manuelle">manuelle</option>
            </select>
            <x-input-error :messages="$errors->get('places_number')" class="mt-2" />
        </div>

        <input type="hidden" name="id_organisateur" value="{{$organisateur}}" required>
        <x-primary-button class="ml-4">
            {{ __('Create') }}
        </x-primary-button>
    </form>
</x-guest-layout>
</x-app-layout>