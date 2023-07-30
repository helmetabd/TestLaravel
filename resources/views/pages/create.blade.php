@extends('layout')
@section('content')

    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Category
            </h2>
            <p class="mb-4">Post a Category to find a developer</p>
        </header>

        <form method="POST" action="/categories">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2"> 
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{old('name')}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="gender" class="inline-block text-lg mb-2">
                    Gender
                </label>
                <select data-te-select-init data-te-select-placeholder="Gender" class="border border-gray-200 rounded p-2 w-full"
                name="gender" value="{{old('gender')}}">
                    <option value="select">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
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
                name="is_publish" value="{{old('is_publish')}}">
                    <option value="not a boolean">Publish Status</option>
                    <option value='0'>Not Published</option>
                    <option value='1'>Published</option>
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
                >{{old('description')}}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Category
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>    
@endsection