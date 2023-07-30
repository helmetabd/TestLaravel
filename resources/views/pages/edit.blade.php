@extends('layout')
@section('content')

    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a Category
            </h2>
            <p class="mb-4">Edit: {{$category->name}}</p>
        </header>

        <form method="POST" action="/categories/{{$category->id}}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2"> 
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{$category->name}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="gender" class="inline-block text-lg mb-2">
                    Gender
                </label>
                <select data-te-select-init data-te-select-placeholder="{{$category->gender}}" class="border border-gray-200 rounded p-2 w-full"
                name="gender" value="{{$category->gender}}">
                    <option value="select">Select Gender</option>
                    <option value="male" 
                        @if ($category->gender == "male")
                            @selected(true)
                        @endif>
                        Male
                    </option>
                    <option value="female" 
                        @if ($category->gender == "female")
                            @selected(true)
                        @endif>
                        Female
                    </option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
                {{-- <label data-te-select-label-ref>Example label</label> --}}
            </div>

            <div class="mb-6">
                <label for="is_publish" class="inline-block text-lg mb-2">
                    Publish Status
                </label>
                <select data-te-select-init data-te-select-placeholder="Publish Status" class="border border-gray-200 rounded p-2 w-full"
                name="is_publish" value="{{$category->is_publish}}">
                    <option value="not a boolean">Publish Status</option>
                    <option value='0' 
                        @if ($category->is_publish == false)
                            @selected(true)
                        @endif>
                        Not Published
                    </option>
                    <option value='1' 
                        @if ($category->is_publish == true)
                            @selected(true)
                        @endif>
                        Published
                    </option>
                </select>
                @error('is_publish')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
                {{-- <label data-te-select-label-ref>Example label</label> --}}
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{$category->description}}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Category
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>    
@endsection