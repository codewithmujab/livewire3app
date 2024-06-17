<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}
                <livewire:show-invoice />
                <br />
                <livewire:user-table />
                <livewire:posts.create-post />
                <hr />
                <livewire:student.multi-step-form />
                <br />
                <livewire:select-actors />
            </div>
        </div>
    </div>
</x-app-layout>
