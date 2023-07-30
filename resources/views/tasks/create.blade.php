<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
        <p class="text-gray-500 text-sm">
            @if (isset($_GET['week']))
            {{ now()->startOfWeek()->addWeeks($_GET['week'])->format('M d') }} - {{ now()->endOfWeek()->addWeeks($_GET['week'])->format('M d, Y') }}
            @else
            {{ now()->startOfWeek()->format('M d') }} - {{ now()->endOfWeek()->format('M d, Y') }}
            @endif
        </p>
        <div class="flex items-center">
            <form method="GET" action="/tasks/edit">
                @if (isset($_GET['week']))
                <input type="hidden" name="week" value="{{$_GET['week'] - 1}}">
                @else
                <input type="hidden" name="week" value="-1">
                @endif
                <button type="submit" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </form>
            <form method="GET" action="/tasks/edit">
                @if (isset($_GET['week']))
                <input type="hidden" name="week" value="{{$_GET['week'] + 1}}">
                @else
                <input type="hidden" name="week" value="1">
                @endif
                <button type="submit" class="ml-2 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </form>
        </div>
    </x-slot>

    <div class="m-4 max-w-2xl">
        <x-planner :user="auth()->user()" :canEdit="true" />
    </div>
    
    <!-- Rest of the content -->
</x-app-layout>