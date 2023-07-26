<?php
use Carbon\Carbon;
?>
@props(['user', 'date'])

<div class="mx-6">
    <div class="w-fit p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex">
       <div>
            <h2 class="text-xl font-semibold text-gray-900">{{$user->name}}</h2>
            <div class="grid md:grid-cols-3">
                <div>
                    @foreach ($user->tasks->where('date','>=', Carbon::now()->toDateString()) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    @foreach ($user->tasks->where('date','>=', Carbon::now()->toDateString()) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    @foreach ($user->tasks->where('date','>=', Carbon::now()->toDateString()) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    @foreach ($user->tasks->where('date','>=', Carbon::now()->toDateString()) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    @foreach ($user->tasks->where('date','>=', Carbon::now()->toDateString()) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
                <div>
                    @foreach ($user->tasks->where('date','>=', Carbon::now()->toDateString()) as $task)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">{{$task->title}}</p>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>