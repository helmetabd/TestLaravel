@extends('layout')

    @section('content')
        @include('part._search')
        <a href="/" class="inline-block text-black ml-4 mb-4">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class="mx-4">
            <x-card class="p-10">
                <div class="flex flex-col items-center justify-center text-center">
                    <img
                        class="w-48 mr-6 mb-6"
                        @if (($category->gender) == 'male')
                            src="{{asset('images/male.png')}}"
                        @else
                            src="{{asset('images/female.png')}}"
                        @endif
                        alt=""/>
                    <h3 class="text-2xl mb-2">{{$category->name}}</h3>
                    <div class="text-xl font-bold mb-4 capitalize">{{$category->gender}}</div>
                    <ul class="flex">
                        @if (($category->is_publish) == 1)
                            <li class="bg-green-400 text-black rounded-xl py-1 px-3 mr-2">
                                <a href="/?published={{$category->is_publish}}">Published</a>
                            </li>
                        @else
                            <li class="bg-red-400 text-black rounded-xl py-1 px-3 mr-2">
                                <a href="/?published={{$category->is_publish}}">Not Published Yet</a>
                            </li>
                        @endif
                    </ul>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-plus-square"></i> Created {{$category->created_at}}
                    </div>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-upload"></i> Updated {{$category->updated_at}}
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">Job Description</h3>
                        <div class="text-lg space-y-6">
                          {{$category->description}}
                        </div>
                    </div>
                </div>        
            </x-card>
            <x-card class="mt-4 p-2 flex space-x-6">
                <a href="/categories/{{$category->id}}/edit">
                    <i class="fa-solid fa-pencil"></i> Edit
                </a>

                <form method="POST" action="/categories/{{$category->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            </x-card>
        </div>
    @endsection