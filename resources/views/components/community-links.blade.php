@props(['links'])
{{ __("Here you will see the Community Links!") }}
<ul>
    @foreach ($links as $link)
    <li>
        <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
            style="background-color: {{ $link->channel->color }}">
            {{ $link->channel->title }}
        </span>
        <strong>{{$link->title}}</strong> ||
        <span class="text-sky-400">
            <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
        </span>
    </li>
    @endforeach
</ul>
{{$links->links()}}