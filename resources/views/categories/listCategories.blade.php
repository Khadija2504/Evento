<x-app-layout>
    @if(session()->has('deleteCategory'))
        <div class="bg-green-100 border text-center border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('deleteCategory') }}</span>
        </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 mt-10">
        @foreach ($categories as $category)

        <div class="card shadow-md rounded-lg p-6">
            <h4 class="text-lg font-bold"> {{$category->category_name}} </h4>
            <form action="{{route('editCategoryForm', $category->id)}}" method="get">
                @csrf
                <button type="submit">Edit</button>
            </form>
            <p> {{$category->updated_at}} </p>
            <form action="{{route('deleteCategory', $category->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">delete</button>
            </form>
        </div>
        @endforeach
    </div>
    <div class="flex flex-row justify-center items-center">
        {{$categories->links()}}
    </div>
</x-app-layout>