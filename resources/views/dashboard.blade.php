<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6 mt-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($categories as $category)
                <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-xl shadow-lg hover:shadow-2xl transition-all transform hover:scale-105 p-6">
                    <h5 class="text-xl font-semibold mb-4">{{ $category->name }}</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-semibold">Contactos:</span> {{ $contacts->where('category_id', $category->id)->count() }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
