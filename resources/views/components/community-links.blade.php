@props(['links'])
{{ __("Here you will see the Community Links!") }}
<ul>
    @foreach ($links as $link)
    <li>
        <strong>{{$link->title}}</strong> ||
        <span class="text-sky-400">
            <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
        </span>
    </li>
    @endforeach
</ul>
{{$links->links()}}