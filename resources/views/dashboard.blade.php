<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
        <x-community-flash/>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-3 gap-4">
                    <!-- Primera Columna (2/3) -->
                    <div class="col-span-2">
                        <x-community-links :links="$links"/>
                    </div>
                    <!-- Segunda Columna (1/3) -->
                    <div class="col-span-1">
                        <!-- Aquí puedes añadir contenido adicional -->
                        <x-community-add-link :channels="$channels"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>