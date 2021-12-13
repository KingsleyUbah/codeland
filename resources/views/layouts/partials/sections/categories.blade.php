{{-- Categories list --}}

<div class="my-2">
<a class="p-1 mb-1 font-body w-full block" href="{{ route('thread.index') }}">All Categories</a>

<ul>
    @foreach($tags as $tag)
    <li class="">
        @if($tag_name == $tag->name)
        <a class="p-1 w-full hover:bg-red-300 bg-red-500 hover:text-gray-100 text-white flex justify-between items-center" href="{{ route('thread.index', ['tags'=>$tag->id]) }}"> 
            {{ $tag->name }}
        </a>
        @else
        <a class="p-1 w-full hover:bg-red-300 hover:text-gray-100 flex justify-between items-center" href="{{ route('thread.index', ['tags'=>$tag->id]) }}"> 
            {{ $tag->name }}
        </a>
        @endif
    </li>
    @endforeach

</ul>
</div>