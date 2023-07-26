<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            @foreach (auth()->user()->currentTeam->allUsers() as $user)
                <x-planner :user="$user" />
            @endforeach
        </div>
    </div>

</x-app-layout>
