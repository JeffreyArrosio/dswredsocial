<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Here you will see the Community Links!") }}
                    @foreach ($links as $link)
                    <li><strong>{{$link->title}}</strong> || <span class="text-sky-400"><small> Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small></span></li>
                    @endforeach
                    {{$links->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>