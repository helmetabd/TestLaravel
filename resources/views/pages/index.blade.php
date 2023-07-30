@extends('layout')

    @section('content')
        @include('part._hero')
        @include('part._search')
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

            @unless (count($categories) == 0)
                @foreach ($categories as $category)
                    <x-category-card :category="$category"/>
                @endforeach
                @else
                    <p>No Categories Found</p>
            @endunless
        </div>  
        <div class="mt-6 p-4">
            {{$categories->links()}}
        </div>
    @endsection
