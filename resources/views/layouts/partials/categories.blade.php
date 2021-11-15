{{-- Categories list --}}

<h1 class="mb-7 font-heading">All Categories</h1>

<ul>
    @foreach($tags as $tag)
    <li class="mb-3">
        <a class="p-1 w-full hover:bg-red-500 hover:text-gray-100 flex justify-between items-center" href="{{ route('thread.index', ['tags'=>$tag->id]) }}"> 
            {{ $tag->name }}
        </a>
    </li>
    @endforeach

</ul>