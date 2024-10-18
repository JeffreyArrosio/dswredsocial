@props(['links'])
{{ __("Here you will see your Links") }}
<ul>
    @if ($links->isEmpty())
    <div class="flex items-center justify-center min-h-screen">
        <h1 class="text-2xl md:text-4xl font-bold text-gray-500">
            No links update
        </h1>
    </div>
    @else
    @foreach ($links as $link)
    <li class="mt-5">
        <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
            style="background-color: {{ $link->channel->color }}">
            {{ $link->channel->title }}
        </span>
        <strong>{{$link->title}}</strong> ||
        <span class="text-sky-400">
            <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
        </span>
        <span>
            ||
            <small class="{{$link->approved ? 'text-green-400':'text-red-400'}}">
                {{$link->approved ? 'APPROVED':'PENDING'}}
            </small>
        </span>
    </li>
    @endforeach
    @endif
</ul>
<div class="mt-3">
    {{$links->links()}}
</div>