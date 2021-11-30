{{-- Categories list --}}

<div class="my-2">
<h1 class="p-1 mb-1 font-body font-semibold">All Categories</h1>

<ul>
    @foreach($tags as $tag)
    <li class="">
        <a class="p-1 w-full hover:bg-red-500 hover:text-gray-100 flex justify-between items-center" href="{{ route('thread.index', ['tags'=>$tag->id]) }}"> 
            {{ $tag->name }}
        </a>
    </li>
    @endforeach

</ul>
</div>