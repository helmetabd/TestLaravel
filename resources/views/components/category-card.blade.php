@props(['category'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            @if (($category->gender) == 'male')
                src="images/male.png"
            @else
                src="images/female.png"
            @endif
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/categories/{{$category->id}}">{{$category->name}}</a>
            </h3>
            <div class="mt-4">
                <ul class="flex">
                    @if (($category->is_publish) == 1)
                        <li class="flex items-center justify-center bg-green-400 text-black rounded-xl py-1 px-3 mr-2 text-xs">
                            <a href="/?published={{$category->is_publish}}">Published</a>
                        </li>
                    @else
                        <li class="flex items-center justify-center bg-red-400 text-black rounded-xl py-1 px-3 mr-2 text-xs">
                            <a href="/?published={{$category->is_publish}}">Not Published Yet</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-plus-square"></i> Created {{$category->created_at}}
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-upload"></i> Updated {{$category->updated_at}}
            </div>
        </div>
    </div>
</x-card>