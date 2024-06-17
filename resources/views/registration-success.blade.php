<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Success Multi step Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Registration Completes</h1>
                hello <b>{{ request()->name }}</b>, thank you for joining us, soon we will approve your registration.
                </br>
                When your account approved, you will receive your credentials on <b>{{ request()->email }}</b> </br>
                Thank you </br></br>
                <a href="/" class="btn btn-sm btn-primary">Back to home</a>
            </div>
        </div>
    </div>
</x-app-layout>
