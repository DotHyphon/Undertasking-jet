<?php
use Carbon\Carbon;
$week = $_GET['week'] ?? 0;
$taskList = ['Voicemails', 'Afterhours', 'Call Queue', 'Emails', 'Tickets'];
?>
@props(['user', 'canEdit' => false])


<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
{{-- tailwind columns don't work without this link --}}

<div class="w-full h-full">
    <div class="p-6 bg-white rounded-lg shadow-2xl shadow-gray-500/20">
        <h2 class="block text-xl font-semibold text-gray-900">{{$user->name}}</h2>
        <div class="grid grid-cols-5 mt-4 gap-2 place-items-centre">
            @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] as $day)
            <div class="w-full shadow px-2" id="{{$day}}">
                @if ($canEdit)
                <div class="flex space-x-8 sm:-my-px sm:ml-10">
                    <x-dropdown align="left" width="24">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700" id="'{{$day}}'Trigger">
                                <span>{{$day}}</span>
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </x-slot>
                
                        <x-slot name="content">
                            <input type="text" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" placeholder="Free Text" onclick="event.stopPropagation();" onkeydown="if (event.keyCode === 13) { event.preventDefault(); addTask({{$user->id}}, this.value, '{{Carbon::now()->format('Y')}}', {{Carbon::now()->week()+$week}}, '{{$day}}'); }" />

                            @foreach ($taskList as $quickTask)
                            <button type="button" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="addTask({{$user->id}}, '{{$quickTask}}', '{{Carbon::now()->format('Y')}}', {{Carbon::now()->week()+$week}}, '{{$day}}Trigger')">{{$quickTask}}</button>
                            @endforeach
                        </x-slot>
                    </x-dropdown>
                </div>
                @else
                <div class="w-full">
                    <h1 class="text-center whitespace-nowrap"> {{$day}} </h1>
                </div>
                @endif

                @foreach ($user->tasks->where('week', Carbon::now()->week()+$week)->where('day', $day) as $task)
                <x-task-card :task="$task" />
                {{-- <div class="mt-2">
                    <p class="text-sm text-gray-600">{{$task->title}}</p>
                </div> --}}
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>

<script type="text/javascript" >

function addTask(user, title, year, week, day) {
    axios.post('/tasks/create', {
        user_id: user,
        title: title,
        year: year,
        week: week,
        day: day,
    }, {
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(function (response) {
        placeTaskinPlanner(user, title, year, week, day);
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });
}

function placeTaskinPlanner(user, title, year, week, day) {
    var task = new Object(user, title, year, week, day);
    var taskListHeader = document.getElementById(day);
    var TaskDiv = document.createElement('div');
    TaskDiv.innerHTML = '<div class="mt-2"><p class="text-center text-sm font-medium text-gray-800 bg-gray-100 rounded-md py-2 px-4">' + title + '</p></div>';
    taskListHeader.appendChild(TaskDiv);
}

</script>