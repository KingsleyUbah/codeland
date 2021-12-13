{{-- Categories list --}}

<div class="my-2">
<a class="p-1 mb-1 font-body bg-red-500 w-full block text-gray-100" href="{{ route('thread.index') }}">All Categories</a>

<ul>
    @foreach($tags as $tag)
    <li class="">
        <a class="p-1 w-full hover:bg-red-300 hover:text-gray-100 flex justify-between items-center" href="{{ route('thread.index', ['tags'=>$tag->id]) }}"> 
            {{ $tag->name }}
        </a>
    </li>
    @endforeach

</ul>
</div>