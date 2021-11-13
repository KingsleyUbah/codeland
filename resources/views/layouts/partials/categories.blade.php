{{-- Categories list --}}

<h1 class="mb-7 p-1 font-heading">All Categories</h1>
<ul>

    @foreach($tags as $tag)
    <li class="mb-3">
        <a class="p-1  w-60 hover:bg-red-500 hover:text-gray-100 flex justify-between items-center" href="{{ route('thread.index', ['tags'=>$tag->id]) }}"> 
            {{ $tag->name }}
            <span class="bg-yellow-50 h-6 w-6 rounded-md text-sm flex items-center">{{ $tag->threads->count() }}</span>
        </a>
    </li>
    @endforeach

</ul>