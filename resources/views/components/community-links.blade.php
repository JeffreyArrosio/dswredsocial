@props(['links'])
{{ __("Here you will see the Community Links!") }}
<ul>
    @if ($links->isEmpty())
    <div class="flex items-center justify-center min-h-screen">
        <h1 class="text-2xl md:text-4xl font-bold text-gray-500">
            No approved contributions yet
        </h1>
    </div>
    @else
    @foreach ($links as $link)
    <li class="mt-5">
        <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
            style="background-color: {{ $link->channel->color }}">
            <a href="/dashboard/{{ $link->channel->slug }}"> {{ $link->channel->title }}</a>
        </span>
        <strong>{{$link->title}}</strong> ||
        <span class="text-sky-400">
            <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
        </span>
    </li>
    @endforeach
    @endif

</ul>
<div class="mt-5">
    {{$links->links()}}
</div>