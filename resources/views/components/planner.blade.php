<?php

use Carbon\Carbon;
?>
{{-- tailwind columns don't work without this link --}}
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@props(['user', 'date'])

<div class="mx-6">
    <div class="w-fit p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex">
       <div>
            <h2 class="text-xl font-semibold text-gray-900">{{$user->name}}</h2>
            <div class="grid grid-cols-7">
                <div class="shadow">
                    <a href="/"><h1 class="text-center">Monday <strong>+</strong></h1></a>
                    @foreach ($user->tasks->filter(function ($task) {
                    return Carbon::parse($task->date)->dayOfWeek === Carbon::now()->startOfWeek()->dayOfWeek;
                    }) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    <h1 class="text-center">Tuesday</h1>
                    @foreach ($user->tasks->filter(function ($task) {
                    return Carbon::parse($task->date)->dayOfWeek === Carbon::now()->startOfWeek()->addDay()->dayOfWeek;
                    }) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    <h1 class="text-center">Wednesday</h1>
                    @foreach ($user->tasks->filter(function ($task) {
                    return Carbon::parse($task->date)->dayOfWeek === Carbon::now()->startOfWeek()->addDays(2)->dayOfWeek;
                    }) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    <h1 class="text-center">Thursday</h1>
                    @foreach ($user->tasks->filter(function ($task) {
                    return Carbon::parse($task->date)->dayOfWeek === Carbon::now()->startOfWeek()->addDays(3)->dayOfWeek;
                    }) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    <h1 class="text-center">Friday</h1>
                    @foreach ($user->tasks->filter(function ($task) {
                    return Carbon::parse($task->date)->dayOfWeek === Carbon::now()->startOfWeek()->addDays(4)->dayOfWeek;
                    }) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    <h1 class="text-center">Saturday</h1>
                    @foreach ($user->tasks->filter(function ($task) {
                    return Carbon::parse($task->date)->dayOfWeek === Carbon::now()->startOfWeek()->addDays(5)->dayOfWeek;
                    }) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    <h1 class="text-center">Sunday</h1>
                    @foreach ($user->tasks->filter(function ($task) {
                    return Carbon::parse($task->date)->dayOfWeek === Carbon::now()->startOfWeek()->addDays(6)->dayOfWeek;
                    }) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>